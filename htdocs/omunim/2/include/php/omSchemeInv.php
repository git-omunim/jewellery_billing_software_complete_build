<?php
/*
 * **************************************************************************************
 * @tutorial: Sell Invoice A5 Sheet Format
 * **************************************************************************************
 * 
 * Created on May 23, 2016
 *
 * @FileName: omSchemeInv.php
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
 *  AUTHOR:Bajrang and Swapnil @5-8-2017
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
?>

<style type="text/css">
    table.blueTable {
        border: 1px solid #1C6EA4;
        background-color: #EEEEEE;
        width: 100%;
        text-align: left;
        border-collapse: collapse;
    }
    table.blueTable td, table.blueTable th {
        border: 1px solid #AAAAAA;
        padding: 3px 2px;
    }
    table.blueTable tbody td {
        font-size: 13px;
    }
    table.blueTable tr:nth-child(even) {
        background: #D0E4F5;
    }
    table.blueTable thead {
        background: #1C6EA4;
        background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        border-bottom: 2px solid #444444;
    }
    table.blueTable thead th {
        font-size: 15px;
        font-weight: bold;
        color: #FFFFFF;
        border-left: 2px solid #D0E4F5;
    }
    table.blueTable thead th:first-child {
        border-left: none;
    }

    table.blueTable tfoot {
        font-size: 14px;
        font-weight: bold;
        color: #FFFFFF;
        background: #D0E4F5;
        background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        border-top: 2px solid #444444;
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
<?php
//Start Code to get Cust and Firm Details 
//Start Code To Select FirmId
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
$custId = $rowCustId['sttr_user_id'];
if ($custId == '') {
    $custId = $_GET['custId'];
}

$srNo = $_GET['srNo'];
$kScheme = $_GET['kScheme'];
$Ktotaldp = $_GET['Ktotaldp'];
$kName = $_GET['kName'];
$kemi = $_GET['kemi'];
$fullName = explode(" ", $kName);
$fName = $fullName[0];
$lName = $fullName[1];
//End Code To Select FirmId
$qSelCustId = "SELECT sttr_user_id,sttr_firm_id FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_pre_invoice_no='$slPrPreInvoiceNo' and "
        . "sttr_invoice_no='$slPrInvoiceNo' and sttr_user_id='$custId' and sttr_indicator='imitation' and sttr_transaction_type='sell' and sttr_firm_id IN ($strFrmId) and sttr_current_status!='Deleted' order by sttr_id asc LIMIT 0, 1";
$resCustId = mysqli_query($conn, $qSelCustId);
$rowCustId = mysqli_fetch_array($resCustId, MYSQLI_ASSOC);
$firmId = $rowCustId['sttr_firm_id'];

//$qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' and sttr_other_info NOT IN('WholesalePurchase')order by sttr_id asc"; 
//$resSlPrItemDetails = mysqli_query($conn,$qSelSlPrItemDetails);
$counter = 1;
//Select Inv Present
$qRowSlrn = noOfRows2('slprrn_id', 'slpr_return_inv', 'slprrn_pre_invoice_no', 'slprrn_invoice_no', $slPrPreInvoiceNo, $slPrInvoiceNo);

parse_str(getTableValues("SELECT firm_id,firm_reg_no,firm_form_header,firm_name,firm_long_name,firm_address,firm_phone_details,firm_email,firm_desc,firm_pan_no,"
                . "firm_tin_no,firm_left_thumb_ftype,firm_right_thumb_ftype FROM firm where firm_own_id='$sessionOwnerId' and firm_id='$firmId' $sessionFirmStr"));
//************************Start change code for data from customer to user Author@:SANT12JAN16******************************************************************************************
parse_str(getTableValues("SELECT user_fname,user_lname,user_add,user_city,user_pincode,user_state,user_country,user_phone,user_pan_it_no,user_cst_no,user_mobile FROM user where user_owner_id='$sessionOwnerId' and user_id='$custId'"));
//*************************End change code for data from customer to user Author@:SANT12JAN16******************************************************************************************
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
<?php
//                    parse_str(getTableValues("SELECT kitty_id,kitty_firm_id FROM kitty where kitty_cust_fname='$kName' and kitty_serial_num='$srNo'"));
//                    $k_firm_id =$kitty_firm_id;
//                    echo '$k_firm_id';
//                $query="SELECT * FROM kitty as k INNER JOIN firm AS f ON kitty_firm_id = f.firm_id LEFT JOIN kitty_money_deposit AS kmd ON kitty_total_amt = kmd.kitty_paid_amt where kitty_firm_id='$k_firm_id'" ;
$query = "SELECT * FROM kitty where kitty_cust_fname='$fName' and kitty_cust_lname='$lName' and kitty_serial_num='$srNo'";

$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);
while ($rowFirm = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $k_firm_id = $rowFirm['kitty_firm_id'];
    $k_tot_amt = $rowFirm['kitty_EMI_tot_amt'];
    $k_bon_amt = $rowFirm['kitty_bonus_amt'];
    $k_st_dt = $rowFirm['kitty_DOB'];
    $k_end_dt = $rowFirm['kitty_end_DOB'];
}

$query1 = "SELECT * FROM firm where firm_id='$k_firm_id'";
// echo '$k_end_dt='.$k_end_dt;
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_num_rows($result1);
while ($rowFirm1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
    $k_firm_name = $rowFirm1['firm_name'];
    $k_firm_address = $rowFirm1['firm_address'];
}
//echo '$k_firm_address'.$k_firm_address;
?>
<div id="schemeInvDispDiv">
    <div id="<?php echo $divIdClass; ?>" style="margin-top:<?php echo $topMargin . 'mm'; ?>;margin-left:<?php echo $leftMargin . 'mm'; ?>">
        <?php
        $fieldName = 'formItmWidth';
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
                    <td align="left" colspan="<?php echo $colspan; ?>">
                        <table border="0" cellpadding="0" width="100%" cellspacing="0">
                            <tr>
                                <!-- Start Invoice Number Details -->

                                <!-- End Invoice Number Details -->

                                <!-- Start Firm Details -->
                                <td align="center">
                                    <table border="0" cellpadding="0" width="100%" cellspacing="0" align="center">
                                        <?php
                                        $fieldName = 'firmImtRightLogoCheck';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if (($firm_right_thumb_ftype != NULL || $firm_right_thumb_ftype != '') && $label_field_check == 'true') {
                                            ?>
                                            <td align="center" valign="top">
                                                <br>
                                                <img src="<?php echo $documentRootBSlash; ?>/include/php/omffgfri.php?firm_id=<?php echo $firm_id; ?>" 
                                                     alt="" class="<?php echo $imageClass; ?>" />
                                            </td>
                                        <?php }
                                        ?>
                                        <?php
                                        //start firm_form_header
                                        $fieldName = 'firmImtFormHeader';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <tr> 
                                            <td valign="middle" align="center" class="ff_calibri fw_n font_color_black" style="font-size:<?php echo $label_field_font_size; ?>px"  onClick="this.contentEditable = 'true';">
                                                <?php echo ($firm_form_header); ?>
                                            </td>
                                        </tr>
                                        <?php
                                        //End firm_form_header
                                        //start firm_long_name
                                        $fieldName = 'firmImtLongName';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($firm_long_name != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <td valign="middle" align="center" class="ff_calibri fw_n font_color_black" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                    <?php echo ($firm_long_name); ?>
                                                </td>
                                            </tr>

                                            <?php
                                        }
                                        //End firm_long_name
                                        //start firm_desc
                                        $fieldName = 'firmImtDesc';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($firm_desc != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <td valign="middle" align="center"  class="ff_calibri fw_n font_color_black" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                    <?php echo ($firm_desc); ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        //End firm_desc
                                        //start $firm_reg_no
                                        $fieldName = 'firmImtRegNo';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($roughEstimate != 'roughEstimate' && $firm_reg_no != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <?php
                                                $fieldName = 'firmImtRegNoLabel';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td valign="middle" align="center"  class="ff_calibri fw_n font_color_black" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?>:
                                                    <?php
                                                    $fieldName = 'firmImtRegNo';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <span class="ff_calibri fw_n font_color_black" style="font-size:<?php echo $label_field_font_size; ?>px" ><?php echo ($firm_reg_no); ?></span>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        //End firm_reg_no
                                        // start firm_address
                                        $fieldName = 'firmImtAddress';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($firm_address != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <td valign="middle" align="center"  class="ff_calibri fw_n font_color_black" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                    <?php echo ($firm_address); ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        // End firm_address
                                        if ((($firm_phone_details != NULL) || $firm_email != NULL)) {
                                            ?>
                                            <tr>
                                                <td colspan="2">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                        <?php
                                                        // start firm_phone_details
                                                        $fieldName = 'firmImtPhone';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($firm_phone_details != NULL && $label_field_check == 'true') {
                                                            ?>
                                                            <tr>
                                                                <td valign="middle" align="center"  class="ff_calibri fw_n font_color_black" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                    PHONE : <?php echo $firm_phone_details; ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        // End firm_phone_details
                                                        // start firm_email
                                                        $fieldName = 'firmImtEmail';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($firm_email != NULL && $label_field_check == 'true') {
                                                            ?>
                                                            <tr>
                                                                <td valign="middle" align="center"  class="ff_calibri fw_n font_color_black> " style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                    EMAIL : <?php echo $firm_email; ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        // End firm_email
                                                        ?>
                                                    </table>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        // start firm_tin_no
                                        $fieldName = 'firmTin';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($roughEstimate != 'roughEstimate' && $firm_tin_no != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <?php
                                                $fieldName = 'firmTinLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td valign="middle" align="center"  class="ff_calibri fw_n font_color_black" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo "GSTIN"; ?>:
                                                    <?php
                                                    $fieldName = 'firmTin';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <span class="ff_calibri fw_n font_color_black" style="font-size:<?php echo $label_field_font_size; ?>px" ><?php echo ($firm_tin_no); ?></span>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        // End $firm_tin_no
                                        // Start firm_pan_no
                                        if ($roughEstimate != 'roughEstimate' && ($firm_pan_no != '')) {
                                            ?>
                                            <tr valign="top">
                                                <?php
                                                $fieldName = 'firmImtPan';
                                                parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($firm_pan_no != '' && $label_field_check == 'true') {
                                                    ?>
                                                    <?php
                                                    $fieldName = 'firmImtPanLb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="center">
                                                        <div class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?> :&nbsp;&nbsp;
                                                            <?php
                                                            $fieldName = 'firmPan';
                                                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $firm_pan_no; ?></span></div>  
                                                    </td>
                                                <?php }
                                                ?>
                                            </tr>
                                            <?php
                                        }
// End firm_pan_no 
                                        ?>
                                    </table>
                                </td>
                                <!-- End Firm Details -->
                                <!-- Start Date & right logo Details -->

                                <!-- End Date & right logo Details -->
                            </tr>
                        </table>
                    </td>
                </tr>


                <tr> 
                    <td align="left" colspan="<?php echo $colspan; ?>">
                        <?php
                        $count = 69;
                        $fieldName = 'custImtDetTop';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $custDetTopVal = $label_field_content;
                        ?>
                        <table border="0" cellpadding="0" width="100%" cellspacing="0" style="padding-top:<?php echo $custDetTopVal; ?>mm">
                            <tr>
                                <td align="left" valign="top">
                                    <table border="0" cellpadding="0" width="100%" cellspacing="0" align="left">
                                        <!--*************************Start change code for data from customer to user Author@:SANT12JAN16******************************************************************************************-->
                                        <?php
                                        //start user_fname
                                        $fieldName = 'userImtName';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($user_fname != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <td valign="middle" align="left">
                                                    <?php
                                                    $fieldName = 'userImtNameLb';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <div class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?>:
                                                        <?php
                                                        $fieldName = 'userImtName';
                                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <?php
                                                            if ($user_lname != '')
                                                                echo om_strtoupper($user_fname . ' ' . $user_lname);
                                                            else
                                                                echo om_strtoupper($user_fname);
                                                            ?>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        //End user_fname
                                        //start user_address
                                        //$fieldName = 'userImtAddress';
                                        //parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <td  valign="top" align="left">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left"> 
                                                        <tr>
                                                            <td valign="top" align="left" title="<?php echo om_strtoupper($user_add); ?>">
                                                                <?php
                                                                // $fieldName = 'userImtAddressLb';
                                                                // parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
    <!--                                                                <div class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?>:&nbsp;
                                                                </div>-->
                                                            </td>
                                                            <td rowspan="3" valign="top" align="left">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left"> 
                                                                    <?php if ($user_add != '') { ?>
                                                                        <tr>
                                                                            <td valign="middle" align="left" title="<?php echo om_strtoupper($user_add); ?>">
                                                                                <?php
                                                                                //$fieldName = 'userImtAddress';
                                                                                // parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                                ?> 
                                                                                <div class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                                    <?php echo om_strtoupper(substr($user_add, 0, $addressSubStr)); ?>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } if ($user_city != '' || $user_pincode != '') { ?>
                                                                        <tr> 
                                                                            <td valign="middle" align="left">
                                                                                <div class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                                    <?php echo om_strtoupper($user_city . ', ' . $user_pincode); ?></div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } if ($user_state != '' || $user_country != '') { ?>
                                                                        <tr> 
                                                                            <td valign="middle" align="left">
                                                                                <div class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo om_strtoupper($user_state . ', ' . $user_country); ?></span></div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php }
                                                                    ?>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        //End user_address
                                        //start user_mobile
                                        $fieldName = 'userImtContact';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if (($user_mobile != '') && $label_field_check == 'true') {
                                            ?>
                                            <tr>
                                                <td valign="middle" align="left">
                                                    <?php
                                                    $fieldName = 'userImtContactLb';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <div class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                        <?php echo $label_field_content; ?>:
                                                        <?php
                                                        $fieldName = 'userImtContact';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <?php echo $user_mobile; ?>
                                                            <!--*************************End change code for data from customer to user Author@:SANT12JAN16******************************************************************************************-->
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        //End user_mobile
                                        //start user_pan_it_no
                                        $fieldName = 'PAN NO';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if (($user_mobile != '') && $label_field_check == 'true') {
                                            ?>
                                            <tr>
                                                <td valign="middle" align="left">
                                                    <?php
                                                    $fieldName = 'PAN NO';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <div class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                        <?php echo "PAN NO "; ?>:
                                                        <?php
                                                        $fieldName = 'PAN NO';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <?php echo $user_pan_it_no; ?>
                                                            <!--*************************End change code for data from customer to user Author@:SANT12JAN16******************************************************************************************-->
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        //End user_pan_it_no
                                        //start user_cst_no
                                        $fieldName = 'GSTIN';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if (($user_mobile != '') && $label_field_check == 'true') {
                                            ?>
                                            <tr>
                                                <td valign="middle" align="left">
                                                    <?php
                                                    $fieldName = 'GSTIN';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <div class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                        <?php echo "GSTIN "; ?>:
                                                        <?php
                                                        $fieldName = 'GSTIN';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <?php echo $user_cst_no; ?>
                                                            <!--*************************End change code for data from customer to user Author@:SANT12JAN16******************************************************************************************-->
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
//End user_cst_no
                                        ?>
                                    </table>
                                </td>
                                <td align="center" valign="top">
                                    <table border="0" cellpadding="0" width="100%" cellspacing="0" align="right">
                                        <?php
                                        $fieldName = 'invImtNoTitle';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_check == 'true') {
                                            ?>  
                                            <tr>
                                                <?php
                                                //$fieldName = 'invImtNoTitleLb';
                                                // parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>  
    <!--                                                <td align="right">
                                                    <div class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" 
                                                         onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?>:&nbsp;
                                                <?php
                                                $fieldName = 'invNoTitle';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>  
                                                        <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $slPrPreInvoiceNo . ' ' . $slPrInvoiceNo; ?></span></div> 
                                                </td>-->
                                            </tr>
                                            <?php
                                        }
                                        // $fieldName = 'dateImtTitle';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_check == 'true') {
                                            ?>
                                            <tr>
                                                <td align="right">
                                                    <?php
                                                    // $fieldName = 'dateImtTitleLb';
                                                    // parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?> 
    <!--                                                    <div class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?>:&nbsp;-->
                                                    <?php
//                                                        $fieldName = 'dateImtTitle';
//                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>  
                                                    <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo om_strtoupper($invoiceDate); ?></span></div> 
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan="<?php echo $colspan; ?>">
                        <?php
                        $fieldName = 'itemImtDetTop';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $itemDetTopVal = $label_field_content;
                        ?>
                        <table border="0" cellpadding="0" width="100%" cellspacing="0" style="padding-top:<?php echo $itemDetTopVal; ?>mm;margin-top: 5%;margin-left: 10%">
                            <?php
                            $fieldName = 'invImtTitle';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($label_field_check == 'true') {
                                ?>
                                <tr> 
                                    <td valign="middle" align="center"  colspan="<?php echo $colspan; ?>">

                                        <div class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                            <?php
                                            if ($roughEstimate == 'roughEstimate') {
                                                $fieldName = 'roughImtEstTitle';
                                                $label_field_content = '';
                                                parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_content != '')
                                                    echo $label_field_content;
                                                else
                                                    echo 'ROUGH ESTIMATE';
                                            }else {
                                                if ($label_field_content != '')
                                                    echo "CASH / METAL INVOICE";
                                                else
                                                    echo 'CASH / METAL INVOICE';
                                            }
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td align="center" colspan="<?php echo $colspan; ?>">
                                    &nbsp;
                                </td>
                            </tr>

                            <?php
                            $totalFinalBalance = 0;
                            $stockType = 'imitation';
                            $transType = 'sell';
                            $userId = $custId;
                            //
                            include 'ogtxcalq.php';
//                        parse_str(getTableValues("SELECT IF(utin_pay_cgst_chk='checked',utin_pay_cgst_amt,'') as cgstAmt,IF(utin_pay_sgst_chk='checked',utin_pay_sgst_amt,'') as sgstAmt,IF(utin_pay_igst_chk='checked',utin_pay_igst_amt,'') as igstAmt,"
//                                        . "IF(utin_pay_cgst_chk='checked',utin_pay_cgst_chrg,0) as cgstChrg,IF(utin_pay_sgst_chk='checked',utin_pay_sgst_chrg,0) as sgstChrg,IF(utin_pay_igst_chk='checked',utin_pay_igst_chrg,0) as igstChrg,utin_payment_mode FROM user_transaction_invoice where utin_owner_id='$sessionOwnerId' and "
//                                        . "utin_pre_invoice_no='$slPrPreInvoiceNo' and utin_invoice_no='$slPrInvoiceNo' and utin_type='imitation' and utin_transaction_type='sell' and utin_user_id='$custId' and utin_firm_id IN ($strFrmId)"));

                            $qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_pre_invoice_no ='$slPrPreInvoiceNo' and sttr_invoice_no ='$slPrInvoiceNo' and sttr_user_id='$custId' and sttr_indicator='imitation' and sttr_transaction_type='sell' and sttr_current_status!='Deleted' group by sttr_cust_itmnum order by sttr_id asc";
                            $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
                            while ($rowSlPrItemDetails = mysqli_fetch_array($resSlPrItemDetails)) {
                                $slPrId = $rowSlPrItemDetails['sttr_id'];
                                // $slPrItstId = $rowSlPrItemDetails['slpr_itst_id'];
                                $slPreId = $rowSlPrItemDetails['sttr_item_pre_id'];
                                $slPostId = $rowSlPrItemDetails['sttr_item_id'];
                                $slPrItemId = $rowSlPrItemDetails['sttr_item_pre_id'] . ' ' . $rowSlPrItemDetails['sttr_item_id'];
                                $slPrMetalType = $rowSlPrItemDetails['sttr_metal_type'];
                                $slPrItemName = $rowSlPrItemDetails['sttr_item_name'];
                                $slPrItmCode = $rowSlPrItemDetails['sttr_item_code'];
                                $slPrItemQty = $rowSlPrItemDetails['sttr_quantity'];
                                $chkslPrItemGSW = $rowSlPrItemDetails['sttr_gs_weight'];
                                $slPrItemGSW = $rowSlPrItemDetails['sttr_gs_weight'] . ' ' . $rowSlPrItemDetails['sttr_gs_weight_type'];
                                $slPrItemNTW = $rowSlPrItemDetails['sttr_nt_weight'] . ' ' . $rowSlPrItemDetails['sttr_nt_weight_type'];
                                $slprFfnWt = $rowSlPrItemDetails['sttr_fine_weight'] . ' ' . $rowSlPrItemDetails['sttr_nt_weight_type'];
                                $slPrMetalRate = $rowSlPrItemDetails['sttr_metal_rate'];
                                $slPrItemRate = $rowSlPrItemDetails['sttr_valuation'];
                                $slPrMetalPutity = $rowSlPrItemDetails['sttr_purity'];
                                $slPrItemVal = $rowSlPrItemDetails['sttr_valuation'];
                                $slPrItemFinVal = $rowSlPrItemDetails['sttr_final_valuation'];
                                $slPrItemLabChargs = $rowSlPrItemDetails['sttr_making_charges'];
                                $slPrItemLabChrgsType = $rowSlPrItemDetails['sttr_making_charges_type'];
                                $slPrItemValueAdded = $rowSlPrItemDetails['sttr_value_add_use'];
                                $slPrItemCode = $rowSlPrItemDetails['sttr_cust_itmcode'];
                                $slPrItemNum = $rowSlPrItemDetails['sttr_cust_itmnum'];
                                $slPrItemHSN = $rowSlPrItemDetails['sttr_hsn_no'];
//                          $totalFinalBalance += $slPrItemFinVal;
                                $valueByWeight = ($rowSlPrItemDetails['sttr_final_purity'] - 100) / 100;
                                parse_str(getTableValues("SELECT itst_stock_type FROM item_stock WHERE itst_id='$slPrItstId'"));
                                $slPrItemTotalTaxChrg = ($slPrItemVal * $rowSlPrItemDetails['sttr_tax'] / 100);

                                if ($counter == 1) {
                                    if ($qRowSlrn > 0) {
                                        ?>
                                        <tr> 
                                            <td valign="middle" align="center" colspan="<?php echo $colspan; ?>">
                                                <div class="ff_arial fs_14  reddish padBott3" onClick="this.contentEditable = 'true';">ORIGINAL INVOICE</div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                $select = "SELECT sttr_gs_weight,SUM(sttr_quantity) as qty, SUM(sttr_gs_weight) as gswt , SUM(sttr_valuation) as val, SUM(sttr_making_charges) as lab, SUM(sttr_final_valuation) as fval, SUM(sttr_tot_tax) as tax, SUM(sttr_valuation) as cval FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' and sttr_current_status!='Deleted' and sttr_cust_itmnum = '$slPrItemNum'";
//                            echo '$select'.$select;
                                $res = mysqli_query($conn, $select);
                                while ($row = mysqli_fetch_array($res)) {
                                    $slPrItemQty = $row['qty'];
                                    $slPrItemGSW = $row['gswt'] . ' ' . $row['sttr_gs_weight_type'];
                                    $slPrItemVal = $row['cval'];
                                    $slPrItemLabChargs = $row['lab'];
                                    $slPrItemFinVal = $row['fval'];
                                    $slPrItemTotalTaxChrg = $row['tax'];
                                    $slPrItemRate = $row['val'];
                                }
                                $select = "SELECT GROUP_CONCAT(sttr_item_name) as sttr_item_name FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' and sttr_cust_itmnum = '$slPrItemNum' and sttr_current_status!='Deleted'";
                                $res = mysqli_query($conn, $select);
                                while ($row = mysqli_fetch_array($res)) {
                                    $slPrItemName = $row['sttr_item_name'];
                                }
                                $totalFinalBalance += $slPrItemFinVal;

                                $slPrItemCGSTTotalTaxChrg = $rowSlPrItemDetails['sttr_valuation'] * ($cgstChrg / 100);
                                $slPrItemSGSTTotalTaxChrg = $rowSlPrItemDetails['sttr_valuation'] * ($sgstChrg / 100);
                                $slPrItemIGSTTotalTaxChrg = $rowSlPrItemDetails['sttr_valuation'] * ($igstChrg / 100);

                                include 'ogijspindtCenter.php';
                            }
                            parse_str(getTableValues("SELECT * FROM user_transaction_invoice where utin_owner_id='$sessionOwnerId' and "
                                            . "utin_pre_invoice_no='$slPrPreInvoiceNo' and utin_invoice_no='$slPrInvoiceNo' and utin_type='imitation' and utin_transaction_type='sell' and utin_user_id='$custId' and utin_firm_id IN ($strFrmId)"));
                            $netTotal = $utin_cash_amt_rec + $utin_pay_cheque_amt + ($utin_pay_card_amt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid);
                            ?>
                        </table>
                    </td>
                </tr>

                <table class="blueTable" style="margin-left:100px; margin-right: 20px; margin-top:15px ">
                    <thead>
                        <tr>
                            <th>SCHEME NO</th>
                            <th>NAME</th>
                            <th>SCHEME</th>
                            <th>TOTAL AMOUNT</th>
                            <th>EMI AMOUNT</th>
<!--                            <th>FIRM NAME</th>-->

                            <th>TOTAL DEPOSIT</th>
                            <?php if ($k_bon_amt != '' && $k_bon_amt != NULL && $k_bon_amt != '0') { ?>
                                <th>BONUS AMOUNT</th>
                            <?php } ?>
                            <th>INVOICE</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td> 

                                <a style="cursor: pointer;" 
                                   onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omktInvWin.php?srNo=<?php echo "$srNo"; ?>&kScheme=<?php echo "$kScheme"; ?>&Ktotaldp=<?php echo "$Ktotaldp"; ?>&kName=<?php echo "$kName"; ?>&kemi=<?php echo "$kemi"; ?>&invoicePanel=formatA41',
                                                   'popup', 'width=850,height=850,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                           return false" >
                                    <div class="itemAddPnLabels11ArialLink" style="margin-bottom: -12px;"><?php echo $srNo; ?></div>
                                </a>
                            </td>
                            <td><?php echo $kName; ?></td>
                            <td><?php echo $kScheme; ?></td>
                            <td><?php echo $k_tot_amt; ?></td>
                            <td><?php echo $kemi; ?></td>
<!--                            <td><?php //echo $k_firm_name;  ?></td>-->

                            <td><?php echo $Ktotaldp; ?></td>
                            <?php if ($k_bon_amt != '' && $k_bon_amt != NULL && $k_bon_amt != '0') { ?>
                                <td><?php echo $k_bon_amt; ?></td>
                            <?php } ?>
                            <td>
                                <a style="cursor: pointer;" 
                                   onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omktInvWin.php?srNo=<?php echo "$srNo"; ?>&kScheme=<?php echo "$kScheme"; ?>&Ktotaldp=<?php echo "$Ktotaldp"; ?>&kName=<?php echo "$kName"; ?>&kemi=<?php echo "$kemi"; ?>&invoicePanel=formatA41',
                                                   'popup', 'width=850,height=850,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                           return false" >
                                    <img src="<?php echo $documentRoot; ?>/images/pdf16.png" alt='Item Invoice' title='Item Invoice'
                                         width="16px" height="16px" style="margin-left: 8px;margin-top: -3px;" />
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <tr>
                    <td colspan="<?php echo $colspan; ?>">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="<?php echo $colspan; ?>">
                        &nbsp;
                    </td>
                </tr>

                <tr>
                    <td width="65%" valign="bottom">
                        <table border="0" cellpadding="1" cellspacing="0" align="right">
                            <?php if ($utin_courier_chgs_amt != '' && $utin_courier_chgs_amt != 0) { ?>
                                <tr>
                                    <td align="right" class="blackCalibri13FontBold">
                                        <div class="spaceRight5"> COURIER CHARGES : </div>
                                    </td>
                                    <td align="center" class="blackCalibri13Font">
                                        <div class="spaceRight5"><?php echo $utin_courier_info; ?></div>
                                    </td>
                                    <td align="right" class="blackCalibri13Font">
                                        <div class="spaceRight5"><?php echo $utin_courier_chgs_amt; ?></div>
                                    </td> 
                                </tr>
                            <?php } ?>
                            <?php if ($utin_cash_amt_rec != '' && $utin_cash_amt_rec != 0) { ?>
                                <tr>
                                    <td align="right" class="blackCalibri13FontBold">
                                        <div class="spaceRight5"> CASH RECEIVED : </div>
                                    </td>
                                    <td align="center" class="blackCalibri13Font">
                                        <div class="spaceRight5"><?php echo $utin_cash_narratn; ?></div>
                                    </td>
                                    <td align="right" class="blackCalibri13Font">
                                        <div class="spaceRight5"><?php echo $utin_cash_amt_rec; ?></div>
                                    </td> 
                                </tr>
                            <?php } if ($utin_pay_cheque_amt != '' && $utin_pay_cheque_amt != 0) { ?>
                                <tr>
                                    <td align="right" class="blackCalibri13FontBold">
                                        <div class="spaceRight5"> CHEQUE RECEIVED : </div>
                                    </td>
                                    <td align="center" class="blackCalibri13Font">
                                        <div class="spaceRight5"><?php echo $utin_cheque_no; ?></div>
                                    </td>
                                    <td align="right" class="blackCalibri13Font">
                                        <div class="spaceRight5"><?php echo $utin_pay_cheque_amt; ?></div>
                                    </td> 
                                </tr>
                            <?php } ?>
                            <?php if ($utin_pay_card_amt != '' && $utin_pay_card_amt != 0) { ?>
                                <tr>
                                    <td align="right" class="blackCalibri13FontBold">
                                        <div class="spaceRight5"> CARD RECEIVED : </div>
                                    </td>
                                    <td align="center" class="blackCalibri13Font">
                                        <div class="spaceRight5"><?php echo $utin_card_no; ?></div>
                                    </td>
                                    <td align="right" class="blackCalibri13Font">
                                        <div class="spaceRight5"><?php echo ($utin_pay_card_amt + $utin_pay_trans_chrg); ?></div>
                                    </td> 
                                </tr>
                            <?php } ?>
                            <?php if ($utin_online_pay_amt != '' && $utin_online_pay_amt != 0) { ?>
                                <tr>
                                    <td align="right" class="blackCalibri13FontBold">
                                        <div class="spaceRight5"> ONLINE PAYMENT : </div>
                                    </td>
                                    <td align="center" class="blackCalibri13Font">
                                        <div class="spaceRight5"><?php echo $utin_online_pay_narratn; ?></div>
                                    </td>
                                    <td align="right" class="blackCalibri13Font">
                                        <div class="spaceRight5"><?php echo ($utin_online_pay_amt - $utin_pay_comm_paid); ?></div>
                                    </td> 
                                </tr>
                            <?php } ?>
                            <?php if ($utin_discount_amt != '' && $utin_discount_amt != 0) { ?>
                                <tr>
                                    <td align="right" class="blackCalibri13FontBold">
                                        <div class="spaceRight5"> DISCOUNT : </div>
                                    </td>
                                    <td align="center" class="blackCalibri13Font">
                                        <div class="spaceRight5"><?php echo $utin_disc_narratn; ?></div>
                                    </td>
                                    <td align="right" class="blackCalibri13Font">
                                        <div class="spaceRight5"><?php echo $utin_discount_amt; ?></div>
                                    </td> 
                                </tr>
                            <?php } ?>
                        </table>
                    </td>
                    <td colspan="<?php echo $colspan; ?>">
                        <table border="0" cellpadding="2" width="100%" cellspacing="0">
                            <?php if ($customerPrevCashBal != 0 && $customerPrevCashBal != '') { ?>
                                <tr>
                                    <td align="right" class="ff_calibri fw_b" style="font-size:14px">
                                        PREV CASH BALNCE :&nbsp;
                                    </td>
                                    <td align="right" class="ff_calibri fw_n" style="font-size:14px">
                                        <?php echo formatInIndianStyle(doubleval($customerPrevCashBal)); ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php
                            $fieldName = 'totalFinImt';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($totalFinalBalance != 0 && $label_field_check == 'true') {
                                ?>       
                                <tr>
                                    <?php
                                    $fieldName = 'totalFinImtLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?> 
                                    <td align="right" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" 
                                        style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?> :&nbsp;
                                    </td>
                                    <?php
                                    $fieldName = 'totalFinImt';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?> 
                                    <td align="right" width="<?php echo $totalWidth; ?>" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" 
                                        style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                            <?php echo formatInIndianStyle($totalFinalBalance); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            $fieldName = 'totalVatImt';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($utin_pay_tax_amt != 0 && $label_field_check == 'true') {
                                ?>       
                                <tr>
                                    <?php
                                    $fieldName = 'totalVatImtLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?> 
                                    <td align="right" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" 
                                        style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?> :&nbsp;
                                    </td>
                                    <?php
                                    $fieldName = 'totalVatImt';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?> 
                                    <td align="right" width="<?php echo $totalWidth; ?>" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" 
                                        style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                            <?php echo formatInIndianStyle($utin_pay_tax_amt); ?>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                            <?php if ($cgstAmt != 0) { ?>
                                <tr>
                                    <td align="right" width="670px" class="ff_calibri fw_b" style="font-size:14px">
                                        <div class="paddingRight5">
                                            CGST : 
                                        </div>
                                    </td>
                                    <td align="right" class="ff_calibri" style="font-size:14px">
                                        <div class="paddingRight2"><?php echo formatInIndianStyle($cgstAmt); ?></div>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php if ($sgstAmt != 0) { ?>
                                <tr>
                                    <td align="right" width="670px" class="ff_calibri fw_b" style="font-size:14px">
                                        <div class="paddingRight5">
                                            SGST : 
                                        </div>
                                    </td>
                                    <td align="right" class="ff_calibri" style="font-size:14px">
                                        <div class="paddingRight2"><?php echo formatInIndianStyle($sgstAmt); ?></div>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php if ($igstAmt != 0) { ?>
                                <tr>
                                    <td align="right" width="670px" class="ff_calibri fw_b" style="font-size:14px">
                                        <div class="paddingRight5">
                                            IGST : 
                                        </div>
                                    </td>
                                    <td align="right" class="ff_calibri fw_b" style="font-size:14px">
                                        <div class="paddingRight2"><?php echo formatInIndianStyle($igstAmt); ?></div>
                                    </td>
                                </tr>
                            <?php } ?>
<!--                        <td align="right" class="ff_calibri fw_b" style="font-size:14px">
            TOTAL AMOUNT :&nbsp;
        </td>
        <td align="right" class="ff_calibri fw_n" style="font-size:14px">
                            <?php // echo formatInIndianStyle(doubleval($utin_courier_chgs_amt));  ?>
        </td>-->
                            <?php
                            $fieldName = 'totalImt';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($totalFinalBalance != 0 && $label_field_check == 'true') {
                                ?>       
                                <tr>
                                    <?php
                                    $fieldName = 'totalImtLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?> 
                                    <td align="right" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" 
                                        style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                        <?php echo $label_field_content; ?> :&nbsp;
                                    </td>
                                    <?php
                                    $fieldName = 'totalImt';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?> 
                                    <td align="right" width="<?php echo $totalWidth; ?>" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" 
                                        style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                            <?php echo formatInIndianStyle($customerPrevCashBal + $totalFinalBalance + $utin_pay_tax_amt + $cgstAmt + $sgstAmt + $igstAmt + $utin_courier_chgs_amt); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            $fieldName = 'cashImtPaid';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if (($utin_cash_amt_rec != 0 || $utin_pay_cheque_amt != 0 || $utin_pay_card_amt != 0 || $utin_online_pay_amt != 0) && $label_field_check == 'true') {
                                ?>
                                <tr>
                                    <?php
                                    $fieldName = 'cashImtPaidLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?> 
                                    <td align="right" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" 
                                        style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?> :&nbsp;
                                    </td>
                                    <?php
                                    $fieldName = 'cashImtPaid';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?> 
                                    <td align="right" width="<?php echo $totalWidth; ?>" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" 
                                        style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                            <?php echo formatInIndianStyle($netTotal); ?>

                                    </td>
                                </tr>
                                <?php
                            }
                            $fieldName = 'discImt';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($utin_discount_amt != 0 && $label_field_check == 'true') {
                                ?>
                                <tr>
                                    <?php
                                    $fieldName = 'discImtLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?> 
                                    <td align="right" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" 
                                        style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?> :&nbsp;
                                    </td>
                                    <?php
                                    $fieldName = 'discImt';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?> 
                                    <td align="right" width="<?php echo $totalWidth; ?>" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" 
                                        style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                            <?php echo formatInIndianStyle($utin_discount_amt); ?>
                                    </td>                                  
                                </tr>
                            <?php } ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="<?php echo $colspan; ?>">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <!--START CODE TO REMOVE IF CONDITION OF $slprin_fnl_due_bal @OMMODTAG SHRI_19OCT15-->
<!--                    <td colspan="<?php echo $colspan; ?>"><?php // echo '$totalFinalBalance=='.$totalFinalBalance;                                       ?>
                        <table border="0" cellpadding="0" width="100%" cellspacing="0" class="border-color-grey-top border-color-grey-b margin2pxAll">-->
                    <?php
                    // $fieldName = 'finBal';
                    //parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        ?>
                    <tr>
                        <td align="left">
                            <div class="ff_calibri fw_n <?php //echo $balanceInWordsFs;     ?>" onClick="this.contentEditable = 'true';"><?php
                                //echo 'Rs.' . ' ' .
                                ucwords(numToWords(abs(om_round($utin_cash_balance)))) . ' Only/-';
                                ?></div>
                        </td>
                        <td align="right">
                            <?php
                            //  $fieldName = 'finBalLb';
                            // parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <div class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?> &nbsp;
                                <?php
                                //$fieldName = 'finBal';
                                //parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <span class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                    <?php
                                    if ($totUdhaDepAmtCalc != 0) {
                                        echo formatInIndianStyle(abs($totUdhaDepAmtCalc));
                                    } else {
                                        echo formatInIndianStyle(($utin_cash_balance));
                                    }
                                    ?></span>
                            </div>
                        </td>
                    </tr>
                </table>
                </td>
                <!--END CODE TO REMOVE IF CONDITION OF $slprin_fnl_due_bal @OMMODTAG SHRI_19OCT15-->
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
            <?php } ?>
            <tr>
<!--                    <td colspan="<?php echo $colspan; ?>">-->
                <?php
//                        $fieldName = 'termsTop';
//                        $label_field_content = '';
//                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                        $termsDetTopVal = $label_field_content;
                ?>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top:<?php echo $termsDetTopVal; ?>mm">
                <?php
//                            $fieldName = 'tnc';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_check == 'true') {
                    ?>
                                    <!--<tr>-->
                    <?php
//                                    $fieldName = 'tncLb';
//                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                <!--                                    <td align="left" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                    <?php //echo $label_field_content;  ?> : &nbsp;</td>
                                    </tr>-->
                <?php } ?>
                <tr>
                    <?php if ($label_field_check == 'true') { ?>
                        <?php
//                                    $fieldName = 'tnc';
//                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                                    $str = strlen($label_field_content);
//                                    $noOfRows = ceil($str / ($wd / $label_field_font_size));
//                                    $height = $noOfRows * ($label_field_font_size + ($label_field_font_size % 10) + 2);
                        ?>
                <!--                                    <td align="left"  class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="">
                                            <div onClick="this.contentEditable = 'true';">
                                                <textarea id="tncLabel" spellcheck="false" name="tncLabel" class="textarea_a5_content ff_calibri" rows="<?php echo $noOfRows; ?>"
                                                          style="text-align:left;width:<?php echo $textAreaWidth; ?>;height:<?php echo $height; ?>;font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?></textarea>                                   
                                            </div>
                                        </td>-->
                    <?php } ?>  
                </tr>
            </table>
            </td>
            </tr>
            <?php
//                $fieldName = 'authSignLb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                ?>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
    <!--                    <tr>
                    <td align="right" width="150px" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;margin-left:200px;"><?php echo $label_field_content; ?></td>
                </tr>-->
            <?php } ?>  
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <?php
//                    $fieldName = 'footer';
//                    $label_field_content = '';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_check == 'true') {
                    ?>
                <!--                        <td align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="<?php echo $colspan; ?>">
                    <?php echo $label_field_content; ?>
                                    </td>-->
                <?php } ?>  
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
        </table>
    </div> 

</div>