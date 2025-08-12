<?php
/*
 * **************************************************************************************
 * @tutorial: Scheme ENI Invoice @SIMRAN:25APR2023
 * **************************************************************************************
 * 
 * Created on AUG 17,2018
 *
 * @FileName: omSchemefinalInv.php
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
        <title>Online Munim Invoice</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="imagetoolbar" content="no" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/invoice.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/ogcss.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/signature-pad.css">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $documentRootBSlash; ?>/images/favicon.ico" />

        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emNavigation.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emValidate.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omMainNav.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/app.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/signature_pad.js"></script>
        <style type="text/css">
            table.blueTable {
                border: 1px solid #1C6EA4;
                background-color: #EEEEEE;
                width: 100%;
                text-align: left;
                border-collapse: collapse;
            }

            table.blueTable td,
            table.blueTable th {
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

            table.blueTable tfoot .links a {
                display: inline-block;
                background: #1C6EA4;
                color: #FFFFFF;
                padding: 2px 8px;
                border-radius: 5px;
            }

            @page {
                size: auto;
            }
        </style>
    </head>
    <body>
        <?php
        $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
        $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
        $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
        $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
        //Start Code to get Cust and Firm Details 
        //Start Code To Select FirmId

        ob_start();
        $whatsappStatus = $_GET['whatsappStatus'];

        if ($_SESSION['setFirmSession'] != '') {
            $strFrmId = $_SESSION['setFirmSession'];
        } else {
            $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
        }
        //echo "<pre>";
        //print_r($_GET);
        //echo "</pre>";
        $kittyGroup = $_GET['kittyGroup'];
        //        echo '$kittyGroup->'.$kittyGroup.'<br>';
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
        if ($nepaliDateIndicator == 'YES') {
            $kittyStartDate = $_GET['kittyStartDate'];
            $dueDate = $_GET['dueDate'];
        } else {
            $kittyStartDate = strtoupper(date("d M Y", strtotime($_GET['kittyStartDate'])));
            $dueDate = strtoupper(date("d M Y", strtotime($_GET['dueDate'])));
        }
        $emiPaidDate = $_GET['emiPaidDate'];
        $kittyEMIStatus = $_GET['kittyEMIStatus'];
        $kittyAmtLeft = $_GET['kittyAmtLeft'];
        $kittyMetalType = $_GET['kittyMetalType'];
        //Gst amount and taxable amount
        $kittyGstAmt = $_GET['kittyGstAmt'];
        $kittyChangedPaidAmt = $_GET['kittyChangedPaidAmt'];
        //
        $kitty_gst_check_status = $_GET['kittyGstCheckStatus'];
        //
        parse_str(getTableValues("SELECT * FROM user where user_owner_id='$sessionOwnerId' and user_id='$kittyCustId'"));
        $fatherOrSpouseName = om_ucfirst(substr($user_father_name, 1));

        parse_str(getTableValues("SELECT * FROM firm where firm_own_id='$sessionOwnerId' and firm_id='$kittyFirmId'"));

        if ($invoicePanel == 'sellInvLay3Inch') {
            $divIdClass = 'sell_Inv_3Inch';
            $tableClass = 'sell_Inv_table';
            $imageClass = 'form7-logo-image';
            $colspan = '10';
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
            $colspan = '10';
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
            $colspan = '10';
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
        $labelType = 'schemeInvoice';
        $fieldName = 'topSchemeMargin';
        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        $topMargin = $label_field_content;

        $label_field_content = '';
        $fieldName = 'leftSchemeMargin';
        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        $leftMargin = $label_field_content;

        $fieldName = 'formSchemeBorderCheck';
        $label_field_content = '';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $border = '#000000 1px solid';
        } else {
            $border = '#000000 0px solid';
        }
        ?>
        <?php
        $querySchemeShowAllInv = "SELECT omly_value FROM omlayout WHERE omly_option = 'showAllEmiSchemeInv'";
        $resSchemeShowAllInv = mysqli_query($conn, $querySchemeShowAllInv);
        $rowSchemeShowAllInv = mysqli_fetch_array($resSchemeShowAllInv);
        $showAllSchemeInv = $rowSchemeShowAllInv['omly_value'];
        //$query = "SELECT * FROM kitty_money_deposit where kitty_mondep_cust_id='$kittyCustId' and kitty_mondep_kitty_id='$kittyId' and ( kitty_mondep_EMI_status='Paid' || kitty_mondep_EMI_status='Payment')  and kitty_mondep_EMI_no <= $kittyNo order by kitty_mondep_id asc";
        //$result = mysqli_query($conn, $query);
        //$row = mysqli_num_rows($result);
        //while ($rowFirm = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        //    //print_r($rowFirm);
        //    $kitty_recipit_no = $rowFirm['kitty_mondepd_recipit_no'];
        //    $kitty_emi_amt = $rowFirm['kitty_mondep_EMI_total_amt'];
        //    $kitty_paid_amt += $rowFirm['kitty_paid_amt'];
        //    $kitty_id = $rowFirm['kitty_mondep_kitty_id'];
        //    $kitty_paid_date = $rowFirm['kitty_mondep_EMI_paid_date'];
        //    $Pay_Mode = $rowFirm['kitty_pay_mode'];
        //    //
        //    //
        //    $kittyGstAmt = $rowFirm['kitty_mondep_gst_amt'];
        //    $kittyChangedPaidAmt= $rowFirm['kitty_mondep_taxable_amt'];
        //    //
        //    $emiDelayDays = 0;
        //include 'omktmdatcl.php';
        //}
        // Hide Code Because Sky Gold Req Show All Paid EMI Details @Author:Vinod:25-07-2023
        //$query = "SELECT * FROM kitty_money_deposit where kitty_mondep_cust_id='$kittyCustId' and kitty_mondep_kitty_id='$kittyId' and kitty_mondep_EMI_status='Paid' and kitty_mondep_EMI_no <= $kittyNo order by kitty_mondep_id asc";
        //$result = mysqli_query($conn, $query);
        //$row = mysqli_num_rows($result);
        //while ($rowFirm = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        //    $kitty_recipit_no = $rowFirm['kitty_mondepd_recipit_no'];
        //    $kitty_emi_amt = $rowFirm['kitty_mondep_EMI_total_amt'];
        //    $kitty_paid_amt += $rowFirm['kitty_paid_amt'];
        //    $kitty_id = $rowFirm['kitty_mondep_kitty_id'];
        //    $kitty_paid_date = $rowFirm['kitty_mondep_EMI_paid_date'];
        //    $Pay_Mode = $rowFirm['kitty_pay_mode'];
        //    $kittyStaffId = $rowFirm['kitty_mondepd_staff_id'];
        //    //
        //    //
        //    $kittyGstAmt = $rowFirm['kitty_mondep_gst_amt'];
        //    $kittyChangedPaidAmt= $rowFirm['kitty_mondep_taxable_amt'];
        //}
        // GET UTIN ID FROM CURRENT KITTY MONEY DEPOSIT EMI
        $qSelUTINIDFromMonDep = "SELECT kitty_mondep_utin_id FROM kitty_money_deposit where kitty_mondep_cust_id='$kittyCustId' and kitty_mondep_id='$kittyDepId' and kitty_mondep_own_id='$sessionOwnerId'";
        $resSelUTINIDFromMonDep = mysqli_query($conn, $qSelUTINIDFromMonDep);
        $rowUTINIDFromMonDep = mysqli_fetch_array($resSelUTINIDFromMonDep, MYSQLI_ASSOC);

        // GET PAYMENT DETAILS WHEN PAY BY PAYMENT PANEL 
        $qSelUserTransSchemeEMIPayDet = "SELECT utin_cash_narratn, utin_cheque_no, utin_card_no, utin_online_pay_narratn, utin_disc_narratn, utin_courier_info, "
                . "utin_cash_amt_rec, utin_pay_cheque_amt, utin_pay_card_amt, utin_pay_trans_chrg, utin_online_pay_amt, utin_pay_comm_paid, utin_discount_amt, "
                . "utin_discount_per, utin_discount_amt_discup, utin_discount_per_discup, utin_disc_narratn_discup, utin_additional_charges, "
                . "utin_additional_charges_narratn, utin_additional_charges_acc_id, utin_courier_chgs_amt,utin_paym_oth_info "
                . "FROM user_transaction_invoice WHERE utin_id='$rowUTINIDFromMonDep[kitty_mondep_utin_id]' and utin_owner_id='$sessionOwnerId' and utin_user_id='$kittyCustId' and utin_transaction_type='scheme'";

        $resSelUserTransSchemeEMIPayDet = mysqli_query($conn, $qSelUserTransSchemeEMIPayDet);
        $payByOptionsCount = mysqli_num_rows($resSelUserTransSchemeEMIPayDet);

        if ($payByOptionsCount > 0)
            $rowUserTransSchemeEMIPayDet = mysqli_fetch_array($resSelUserTransSchemeEMIPayDet, MYSQLI_ASSOC);



        //utin_pay_cash_acc_id, utin_pay_cheque_acc_id, utin_pay_card_acc_id, utin_online_pay_acc_id, utin_pay_disc_acc_id, utin_pay_tax_acc_id, utin_courier_acc_id,
        ?>
        <div id="schemeInvDispDiv">
            <div id="<?php echo $divIdClass; ?>" style="margin-top:<?php echo $topMargin . 'mm'; ?>;margin-left:<?php echo $leftMargin . 'mm'; ?>">
                <?php
                $fieldName = 'formSchemeWidth';
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
                                        <?php ?>
                                    <tr>
                                        <!--START FIRM DETAILS-->

                                        <!--START DATE & LOGO DETAILS-->
                                        <td align="left" width="25%">
                                            <table border="0" cellpadding="0" cellspacing="0" align="left" style="margin-left:20px;">
                                                <tr>
                                                    <?php
                                                    $fieldName = 'firmSchemeLeftLogoCheck';
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
                                                        <td align="right">
                                                            <!--                                                    <img style="height:100px;width:100px;" src="<?php echo $documentRootBSlash; ?>/include/php/omffgfli.php?firm_id=<?php echo $firm_id; ?>" 
                                                                     alt="" class="<?php echo $imageClass; ?>" />-->

                                                            <img style="height:100px;width:100px;" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($firmThumb); ?>"
                                                                 alt="" class="<?php echo $imageClass; ?>" />
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                            </table>
                                        </td>
                                        <!--END DATE & LOGO DETAILS-->
                                        <td align="left" width="50%">
                                            <table border="0" cellpadding="0" width="100%" cellspacing="0" align="center">
                                                <?php
                                                $fieldName = 'firmSchemeFormHeader';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == 'true') {
                                                    ?>
                                                    <tr>
                                                        <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                            <?php echo ($firm_form_header); ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $fieldName = 'firmSchemeLongName';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($firm_long_name != NULL && $label_field_check == 'true') {
                                                    ?>
                                                    <tr>
                                                        <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                            <?php echo "<b>" . ($firm_long_name) . "</b>"; ?>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                                $fieldName = 'firmSchemeDesc';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($firm_desc != NULL && $label_field_check == 'true') {
                                                    ?>
                                                    <tr>
                                                        <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                            <?php
                                                            $fieldName = 'firmSchemeDescLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <?php echo ($firm_desc); ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $fieldName = 'firmschemeRegNo';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($firm_reg_no != NULL && $label_field_check == 'true') {
                                                    ?>
                                                    <tr>
                                                        <?php
                                                        $fieldName = 'firmschemeRegNoLabel';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?>:
                                                            <?php
                                                            $fieldName = 'firmschemeRegNo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo ($firm_reg_no); ?></span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $fieldName = 'firmschemeAddress';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($firm_address != NULL && $label_field_check == 'true') {
                                                    ?>
                                                    <tr>
                                                        <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                            <?php echo ($firm_address); ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                if ($firm_phone_details != NULL) {
                                                    ?>
                                                    <tr>
                                                        <?php
                                                        $fieldName = 'firmschemePhone';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($firm_phone_details != NULL && $label_field_check == 'true') {

                                                            $fieldName = 'firmschemePhoneLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                <?php echo $label_field_content; ?> : <?php echo $firm_phone_details; ?>
                                                            </td>

                                                        <?php } ?>
                                                    </tr>
                                                    <?php
                                                }
                                                if ($firm_phone_details != NULL) {
                                                    ?>
                                                    <tr>
                                                        <?php
                                                        $fieldName = 'firmschemeEmail';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($firm_email != NULL && $label_field_check == 'true') {
                                                            ?>

                                                            <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?> " style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                <?php echo $label_field_content; ?> : <?php echo $firm_email; ?>
                                                            </td>

                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                                <?php if ((($firm_tin_no != '') || $firm_pan_no != '')) { ?>
                                                    <?php
                                                    $fieldName = 'firmschemeTin';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($firm_tin_no != NULL && $label_field_check == 'true') {
                                                        ?>
                                                        <tr>
                                                            <?php
                                                            $fieldName = 'firmschemeTinLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                <?php echo $label_field_content; ?> :
                                                                <?php
                                                                $fieldName = 'firmschemeTin';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo ($firm_tin_no); ?></span>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php
                                                    $fieldName = 'firmschemePan';
                                                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($firm_pan_no != '' && $label_field_check == 'true') {
                                                        ?>
                                                        <?php
                                                        $fieldName = 'firmschemePanLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center">
                                                            <div class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?> :&nbsp;&nbsp;
                                                                <?php
                                                                $fieldName = 'firmschemePan';
                                                                parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $firm_pan_no; ?></span>
                                                            </div>
                                                        </td>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </table>
                                        </td>
                                        <!--START DATE & LOGO DETAILS-->
                                        <td align="left" width="25%">
                                            <table border="0" cellpadding="0" cellspacing="0" align="right" style="margin-right:20px;">
                                                <tr>
                                                    <?php
                                                    $fieldName = 'firmSchemeRightLogoCheck';
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
                                                        <td align="right">
                                                            <!--                                                    <img style="height:100px;width:100px;" src="<?php echo $documentRootBSlash; ?>/include/php/omffgfri.php?firm_id=<?php echo $firm_id; ?>" 
                                                                     alt="" class="<?php echo $imageClass; ?>" />-->
                                                            <img style="height:100px;width:100px;" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($firmThumb); ?>"
                                                                 alt="" class="<?php echo $imageClass; ?>" />
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


                        <tr>
                            <td colspan="<?php echo $colspan; ?>" class="paddingTop5">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" colspan="<?php echo $colspan; ?>">
                                <table border="0" cellpadding="0" width="100%" cellspacing="0" style="padding-top:<?php echo $custDetTopVal; ?>mm">
                                    <tr>
                                        <td align="left" valign="top">
                                            <table border="0" cellpadding="0" width="100%" cellspacing="0" align="left">
                                                <tr>
                                                    <td colspan="2" valign="top" align="left">
                                                        <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                            <!--START NAME-->
                                                            <?php
                                                            $fieldName = 'userschemeName';
                                                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            $userNamefontsize = $label_field_font_size;
                                                            if ($user_fname != NULL && $label_field_check == 'true') {
                                                                $fieldName = 'userschemeNameLb';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <div width class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                    <span class="spaceRight25">Details Of Receiver(Bill To) :</span><br>
                                                                </div>
                                                                <tr>
                                                                    <td align="left" class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div class="paddingRight10"><?php echo $label_field_content; ?> </div>
                                                                    </td>
                                                                    <td align="left" class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div class="paddingRight10"> &nbsp;: &nbsp;</div>
                                                                    </td>

                                                                    <td align="left" class="blackCalibri13Font">
                                                                        <div class="spaceRight5" style="font-size:<?php echo $userNamefontsize; ?>px;">
                                                                            <?php
                                                                            //
                                                                            if ($user_lname != '' || $user_father_name != '')
                                                                                echo '<b>' . om_strtoupper($user_fname . ' ' . $user_lname) . '</b>';
                                                                            else
                                                                                echo '<b>' . om_strtoupper($user_fname) . '</b>';
                                                                            ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                            <!--END NAME-->

                                                            <!--START Address-->
                                                            <?php
                                                            $fieldName = 'userschemeAddress';
                                                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            $addresssize = $label_field_font_size;
                                                            if ($label_field_check == 'true') {
                                                                $fieldName = 'userschemeAddressLb';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <tr>
                                                                    <td align="left" class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;border:0px solid;">
                                                                        <div class="paddingRight10"><?php echo $label_field_content; ?> </div>
                                                                    </td>
                                                                    <td align="left" class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;border:0px solid;">
                                                                        <div class="paddingRight10"> &nbsp;: &nbsp;</div>
                                                                    </td>
                                                                    <td align="left" class="blackCalibri13Font">
                                                                        <?php if ($user_add != '') { ?>
                                                                            <div title="<?php echo om_strtoupper($user_add); ?>" style="border:0px solid;width:<?php echo $custAddress; ?>;">
                                                                                <?php
                                                                                $fieldName = 'userschemeAddress';
                                                                                parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                                ?>
                                                                                <div class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                                    <?php echo om_strtoupper($user_add); ?>
                                                                                </div>
                                                                            </div>

                                                                            <?php
                                                                        }
                                                                        if ($user_city != '' || $user_pincode != '') {
                                                                            ?>
                                                                            <div style="border:0px solid;width:<?php echo $custAddress; ?>">
                                                                                <div class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $addresssize; ?>px" onClick="this.contentEditable = 'true';">
                                                                                    <?php echo om_strtoupper($user_city . ', ' . $user_pincode); ?>

                                                                                    <?php
                                                                                }
                                                                                if ($user_state != '' || $user_country != '') {
                                                                                    ?>
                                                                                    <?php echo om_strtoupper($user_state . ', ' . $user_country); ?></span>
                                                                                <?php }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                            <!--END Address-->
                                                            <!--START MOBILE-->
                                                            <?php
                                                            $fieldName = 'userschemeContact';
                                                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            $usercontact = $label_field_font_size;
                                                            if ($user_mobile != NULL && $label_field_check == 'true') {
                                                                $fieldName = 'userschemeContactLb';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <tr>
                                                                    <td align="left" class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div class="paddingRight10"><?php echo $label_field_content; ?> </div>
                                                                    </td>
                                                                    <td align="left" class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div class="paddingRight10"> &nbsp;: &nbsp;</div>
                                                                    </td>
                                                                    <td align="left" class="blackCalibri13Font" style="font-size:<?php echo $usercontact; ?>px;">
                                                                        <div class="spaceRight5"><?php echo $user_mobile; ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                            <!--END MOBILE-->
                                                            <!-- START CODE TO ADD SCHEME BARCODE DETAIL @AUTHOR:MADHUREE-01SEP2020 -->
                                                            <?php
                                                            $fieldName = 'userschemeNo';
                                                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            $usercontact = $label_field_font_size;
                                                            if ($user_mobile != NULL && $label_field_check == 'true') {
                                                                $fieldName = 'userschemeNoLb';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <tr>
                                                                    <td align="left" class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div class="paddingRight10"><?php echo $label_field_content; ?> </div>
                                                                    </td>
                                                                    <td align="left" class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div class="paddingRight10"> &nbsp;: &nbsp;</div>
                                                                    </td>
                                                                    <?php parse_str(getTableValues("SELECT kitty_barcode FROM kitty WHERE kitty_own_id='$_SESSION[sessionOwnerId]' and kitty_cust_id='$kittyCustId' and kitty_id='$kittyId' and kitty_upd_sts IN ('New','Updated','Released')")) ?>
                                                                    <td align="left" class="blackCalibri13Font" style="font-size:<?php echo $usercontact; ?>px;">
                                                                        <div class="spaceRight5"><?php echo $kitty_barcode; ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                            <!-- END CODE TO ADD SCHEME BARCODE DETAIL @AUTHOR:MADHUREE-01SEP2020 -->
                                                            <!--START PAN-->
                                                            <?php
                                                            $fieldName = 'userschemePan';
                                                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($user_pan_it_no != '' && $label_field_check == 'true') {
                                                                $fieldName = 'userschemePanLb';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <tr>
                                                                    <td align="left" class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div class="paddingRight10"><?php echo $label_field_content; ?> </div>
                                                                    </td>
                                                                    <td align="left" class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div class="paddingRight10"> &nbsp;: &nbsp;</div>
                                                                    </td>

                                                                    <td align="left" class="blackCalibri13Font">
                                                                        <div class="spaceRight5"><?php echo $user_pan_it_no; ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                            <!--END PAN-->
                                                            <!--START GSTIN-->
                                                            <?php
                                                            $fieldName = 'userschemeGst';
                                                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($user_cst_no != '' && $label_field_check == 'true') {
                                                                $fieldName = 'userschemeGstLb';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <tr>
                                                                    <td align="left" class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div class="paddingRight10"><?php echo $label_field_content; ?> </div>
                                                                    </td>
                                                                    <td align="left" class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div class="paddingRight10"> &nbsp;: &nbsp;</div>
                                                                    </td>

                                                                    <td align="left" class="blackCalibri13Font">
                                                                        <div class="spaceRight5"><?php echo $user_cst_no; ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                            <!--END GSTIN-->
                                                        </table>
                                                    </td>

                                                    <td align="left" valign="top">
                                                        <table border="0" cellpadding="0" width="100%" cellspacing="0" align="left">
                                                            <tr>
                                                            </tr>
                                                            <?php
                                                            $fieldName = 'SchemeSerialNo';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_check == 'true') {
                                                                ?>
                                                                <tr>
                                                                    <td align="right" style="padding: 2px;">
                                                                        <?php
                                                                        $fieldName = 'SchemeSerialNoLb';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <div>
                                                                            <span class="paddingRight10 ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;display:inline-block;width:75px;text-align:right;" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?></span><b>:</b>
                                                                            <?php
                                                                            $fieldName = 'SchemeSerialNo';
                                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                            parse_str(getTableValues("SELECT kitty_pre_serial_num,kitty_serial_num FROM kitty where kitty_cust_id='$kittyCustId' and kitty_id='$kittyId' and kitty_own_id='$sessionOwnerId'"));
                                                                            if ($kitty_pre_serial_num != '' && $kitty_pre_serial_num != null) {
                                                                                $kitty_pre_serial_num = $kitty_pre_serial_num . ' / ';
                                                                            }
                                                                            ?>
                                                                            <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;display:inline-block;width:80px;text-align:left;padding-left:5px;"><?php echo $kitty_pre_serial_num . ' ' . $kitty_serial_num; ?></span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                            ?>
                                                            <?php
                                                            $fieldName = 'SchemeReceiptNo';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_check == 'true' && $showAllSchemeInv != 'YES') {
                                                                ?>
                                                                <tr>
                                                                    <td align="right" style="padding: 2px;">
                                                                        <?php
                                                                        $fieldName = 'SchemeReceiptNoLb';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <div>
                                                                            <span class="paddingRight10 ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;display:inline-block;width:75px;text-align:right;" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?></span><b>:</b>
                                                                            <?php
                                                                            $fieldName = 'SchemeReceiptNo';
                                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                            parse_str(getTableValues("SELECT kitty_mondepd_recipit_no FROM kitty_money_deposit where kitty_mondep_id = '$kittyDepId' and kitty_mondep_cust_id='$kittyCustId' and kitty_mondep_kitty_id='$kittyId' and kitty_mondep_own_id='$sessionOwnerId'"));
                                                                            ?>
                                                                            <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;display:inline-block;width:80px;text-align:left;padding-left:5px;"><?php echo $kitty_mondepd_recipit_no; ?></span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                            ?>
                                                            <?php
                                                            $fieldName = 'SchemeStartDate';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_check == 'true') {
                                                                ?>
                                                                <tr>
                                                                    <td align="right" style="padding: 2px;">
                                                                        <?php
                                                                        $fieldName = 'SchemeStartDateLb';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <div>
                                                                            <span class="paddingRight10 ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;display:inline-block;width:75px;text-align:right;" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?></span><b>:</b>
                                                                            <?php
                                                                            $fieldName = 'SchemeStartDate';
                                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                            ?>
                                                                            <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;display:inline-block;width:80px;text-align:left;padding-left:5px;"><?php echo om_strtoupper($kittyStartDate); ?></span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            $fieldName = 'SchemeEndDate';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_check == 'true') {
                                                                ?>
                                                                <tr>
                                                                    <td align="right" style="padding: 2px;">
                                                                        <?php
                                                                        $fieldName = 'SchemeEndDateLb';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <div>
                                                                            <span class="paddingRight10 ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;display:inline-block;width:75px;text-align:right;" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?></span><b>:</b>
                                                                            <?php
                                                                            $fieldName = 'SchemeEndDate';
                                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                            ?>
                                                                            <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;display:inline-block;width:80px;text-align:left;padding-left:5px;"><?php echo om_strtoupper($dueDate); ?></span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            // Start Code Adding Staff Name On Invoice @Author:Vinod25-07-2023
                                                            $fieldName = 'SchemeStaffName';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_check == 'true') {
                                                                ?>
                                                                <tr>
                                                                    <td align="right" style="padding: 2px;">
                                                                        <?php
                                                                        $fieldName = 'SchemeStaffNameLb';
                                                                        parse_str(getTableValues("SELECT kitty_mondepd_staff_id as kittyStaffId from kitty_money_deposit where kitty_mondep_cust_id='$kittyCustId' and kitty_mondep_kitty_id='$kittyId' and ( kitty_mondep_EMI_status='Paid' || kitty_mondep_EMI_status='Payment')  and kitty_mondep_EMI_no = $kittyNo "));
                                                                        parse_str(getTableValues("SELECT user_login_id FROM user WHERE user_id = '$kittyStaffId'"));
                                                                        if ($user_login_id != '') {
                                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                            ?>
                                                                            <div>
                                                                                <span class="paddingRight10 ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;display:inline-block;width:75px;text-align:right;" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?></span><b>:</b>
                                                                                <?php
                                                                                $fieldName = 'SchemeStaffName';
                                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                                ?>
                                                                                <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;display:inline-block;width:80px;text-align:left;padding-left:5px;"><?php echo om_strtoupper($user_login_id); ?></span>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            }
                                                            //End Code Adding Staff Name On Invoice @Author:Vinod25-07-2023
                                                            ?>
                                                        </table>
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
                                    <tr>
                                        <td colspan="<?php echo $colspan; ?>">
                                            <table border="0" cellpadding="0" width="100%" cellspacing="0" style="padding-top:<?php echo $itemDetTopVal; ?>mm">
                                                <tr>
                                                    <td valign="middle" align="center" colspan="14">
                                                        <div class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                            <?php
                                                            parse_str(getTableValues("SELECT kitty_scheme FROM kitty where kitty_cust_id='$kittyCustId' and kitty_id='$kittyId' and kitty_own_id='$sessionOwnerId'"));
                                                            //                                                
                                                            ?>
                                                            <?php
                                                            $fieldName = 'invschemeTitle';
                                                            $label_field_check = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_check == 'true') {
                                                                ?>
                                                                <td valign="middle" align="center" colspan="14">
                                                                    <b><span style="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>;"><?php echo $kitty_scheme; ?></span></b>
                                                                <?php } ?>
                                                                <?php
                                                                $fieldName = 'invschemeInstallmentsTitle';
                                                                $label_field_check = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                if ($label_field_check == 'true') {
                                                                    ?>
                                                                    <b><span style="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>;"><?php echo $label_field_content; ?></span></b>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" colspan="<?php echo $colspan; ?>">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <table class="blueTable" style="margin-left:0px;">
                                        <thead>
                                            <tr>
                                                <?php
                                                $fieldName = 'schemeEmiNo';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == 'true') {
                                                    $totalColumns++;
                                                    $fieldName = 'schemeEmiNoLb';
                                                    $srNoPresent = 'Y';
                                                    $label_field_content = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                <?php } ?>
                                                <?php
                                                $fieldName = 'schemepaidDate';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == 'true') {
                                                    $totalColumns++;
                                                    $fieldName = 'schemepaidDateLb';
                                                    $srNoPresent = 'Y';
                                                    $label_field_content = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                <?php } ?>
                                                <?php
                                                $fieldName = 'schemeReceiptNo';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == 'true') {
                                                    $totalColumns++;
                                                    $fieldName = 'schemeReceiptNoLb';
                                                    $srNoPresent = 'Y';
                                                    $label_field_content = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                <?php } ?>
                                                <?php
                                                $fieldName = 'schemeEmiMonth';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == 'true') {
                                                    $totalColumns++;
                                                    $fieldName = 'schemeEmiMonthLb';
                                                    $srNoPresent = 'Y';
                                                    $label_field_content = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo 'EMI MONTH'; ?></th>
                                                <?php } ?>
                                                <?php
                                                $fieldName = 'schemePaidAmt';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == 'true') {
                                                    $totalColumns++;
                                                    $fieldName = 'schemePaidAmtLb';
                                                    $srNoPresent = 'Y';
                                                    $label_field_content = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                <?php } ?>
                                                <?php
                                                $fieldName = 'schemeGroupName';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == 'true') {
                                                    $totalColumns++;
                                                    $fieldName = 'schemeGroupNameLb';
                                                    $srNoPresent = 'Y';
                                                    $label_field_content = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                <?php } ?>
                                                <?php
                                                $fieldName = 'schemeTokenNo';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == 'true') {
                                                    $totalColumns++;
                                                    $fieldName = 'schemeTokenNoLb';
                                                    $srNoPresent = 'Y';
                                                    $label_field_content = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                <?php } ?>
                                                <?php
                                                $fieldName = 'schemeCumulativeAmt';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == 'true') {
                                                    $totalColumns++;
                                                    $fieldName = 'schemeCumulativeAmtLb';
                                                    $srNoPresent = 'Y';
                                                    $label_field_content = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                <?php } ?>
                                                <!-- Added New Colume name Cumulative Weight -->
                                                <?php
                                                $fieldName = 'schemeCumulativeWt';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == 'true') {
                                                    $totalColumns++;
                                                    $fieldName = 'schemeCumulativeWtLb';
                                                    $srNoPresent = 'Y';
                                                    $label_field_content = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                <?php } ?>
                                                <!-- END CODE FOR Cumulative Weight Colume -->
                                                <!-- Scheme Taxable Title Chetan@22052023-->
                                                <?php
                                                if ($kitty_gst_check_status == "true") {
                                                    $fieldName = 'schemeTaxableAmt';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == 'true') {
                                                        $totalColumns++;
                                                        $fieldName = 'schemeTaxableAmtLb';
                                                        $srNoPresent = 'Y';
                                                        $label_field_content = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <!-- Ends here Tax -->
                                                        <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                    <?php } ?>
                                                    <?php
                                                    $fieldName = 'schemeGSTAmt';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == 'true') {
                                                        $totalColumns++;
                                                        $fieldName = 'schemeGSTAmtLb';
                                                        $srNoPresent = 'Y';
                                                        $label_field_content = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <?php
                                                if ($kittyMetalType != "CASH") {
                                                    $fieldName = 'schemeAccMetalRate';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == 'true') {
                                                        $totalColumns++;
                                                        $fieldName = 'schemeAccMetalRateLb';
                                                        $srNoPresent = 'Y';
                                                        $label_field_content = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <!-- Ends here Metal Rate Title -->
                                                        <!-- Scheme Metal WT Title Chetan@22052023-->
                                                        <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                    <?php } ?>
                                                    <?php
                                                    $fieldName = 'schemeAccMetalWt';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == 'true') {
                                                        $totalColumns++;
                                                        $fieldName = 'schemeAccMetalWtLb';
                                                        $srNoPresent = 'Y';
                                                        $label_field_content = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <!-- Ends here Metal Wt Title -->
                                                        <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <?php
                                                ?>
                                                <?php
                                                $fieldName = 'schemePayment';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == 'true') {
                                                    $totalColumns++;
                                                    $fieldName = 'schemePaymentLb';
                                                    $srNoPresent = 'Y';
                                                    $label_field_content = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                <?php }
                                                ?>
                                                <?php
                                                ?>
                                                <?php
                                                $fieldName = 'schemeStatus';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == 'true') {
                                                    $totalColumns++;
                                                    $fieldName = 'schemeStatusLb';
                                                    $srNoPresent = 'Y';
                                                    $label_field_content = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                <?php } ?>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $querySchemeShowAllInv = "SELECT omly_value FROM omlayout WHERE omly_option = 'showAllEmiSchemeInv'";
                                            $resSchemeShowAllInv = mysqli_query($conn, $querySchemeShowAllInv);
                                            $rowSchemeShowAllInv = mysqli_fetch_array($resSchemeShowAllInv);
                                            $showAllSchemeInv = $rowSchemeShowAllInv['omly_value'];
                                            //
                                            if ($showAllSchemeInv == 'YES') {
                                                $ktquery = "SELECT * FROM kitty_money_deposit where kitty_mondep_cust_id='$kittyCustId' and kitty_mondep_kitty_id='$kittyId' and ( kitty_mondep_EMI_status='Paid' || kitty_mondep_EMI_status='Payment')  and kitty_mondep_EMI_no <= $kittyNo order by kitty_mondep_id asc";
                                            } else {
                                                $ktquery = "SELECT * FROM kitty_money_deposit where kitty_mondep_cust_id='$kittyCustId' and kitty_mondep_kitty_id='$kittyId' and ( kitty_mondep_EMI_status='Paid' || kitty_mondep_EMI_status='Payment')  and kitty_mondep_EMI_no = $kittyNo order by kitty_mondep_id asc";
                                            }
                                            $ktresult = mysqli_query($conn, $ktquery);
                                            $rowkt = mysqli_num_rows($ktresult);
                                            $emiDelayDays = 0;
                                            $EMINo = 1;
                                            while ($rowKTFirm = mysqli_fetch_array($ktresult, MYSQLI_ASSOC)) {
                                                //                                    echo "<pre>";
                                                //                                    print_r($rowKTFirm);
                                                //                                    echo "</pre>";
                                                $kittyStartDate = $rowKTFirm['kitty_mondep_EMI_start_DOB'];
                                                $emiPaidDate = $rowKTFirm['kitty_mondep_EMI_paid_date'];
                                                $kittyEMIStatus = $rowKTFirm['kitty_mondep_EMI_status'];
                                                include 'omktmdatcl.php';
                                                //                                  
                                                $total_metal_wt += $rowKTFirm['kitty_wt_amt'];
                                                $total_cash_amt += $rowKTFirm['kitty_mondep_EMI_total_amt'];
                                                ?>
                                                <?php
                                                // Start code skygold Req Show All details In Inv @Author : Vinod:25-07-2023
                                                $kitty_recipit_no = $rowKTFirm['kitty_mondepd_recipit_no'];
                                                $kitty_emi_amt = $rowKTFirm['kitty_mondep_EMI_total_amt'];
                                                $kitty_paid_amt += $rowKTFirm['kitty_paid_amt'];
                                                $kitty_id = $rowKTFirm['kitty_mondep_kitty_id'];
                                                $EMINo = $rowKTFirm['kitty_mondep_EMI_no'];
                                                $Pay_Mode = $rowKTFirm['kitty_pay_mode'];
                                                $kittyStaffId = $rowKTFirm['kitty_mondepd_staff_id'];
                                                //
                                                //
                                                $kittyGstAmt = $rowKTFirm['kitty_mondep_gst_amt'];
                                                $kittyChangedPaidAmt = $rowKTFirm['kitty_mondep_taxable_amt'];
                                                // End code skygold Req Show All details In Inv @Author : Vinod:25-07-2023
                                                ?>
                                                <tr>
                                                    <?php
                                                    $fieldName = 'schemeEmiNo';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == 'true') {
                                                        ?>
                                                        <td align="center">
                                                            <?php //echo $kittyNo; 
                                                            ?>
                                                            <?php //echo $rowKTFirm['kitty_mondep_EMI_no']; 
                                                            ?>
                                                            <?php //echo $kittyNo; 
                                                            ?>
                                                            <?php echo $EMINo  //echo $kittyNo; 
                                                            ?>
                                                        </td>
                                                    <?php } ?>
                                                    <?php
                                                    $fieldName = 'schemepaidDate';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == 'true') {
                                                        ?>
                                                        <td align="center">
                                                            <?php echo $rowKTFirm['kitty_mondep_EMI_paid_date']; ?>
                                                        </td>
                                                    <?php } ?>
                                                    <?php
                                                    $fieldName = 'schemeReceiptNo';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == 'true') {
                                                        ?>
                                                        <td align="center">
                                                            <?php echo $rowKTFirm['kitty_mondepd_recipit_no']; ?>
                                                        </td>
                                                    <?php } ?>
                                                    <?php
                                                    $fieldName = 'schemeEmiMonth';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == 'true') {
                                                        ?>
                                                        <td align="center">
                                                            <?php
                                                            $emiMonth = $rowKTFirm['kitty_mondep_EMI_month'];
                                                            if ($emiMonth) {
                                                                $monthAbbreviation = $emiMonth;
                                                            } else {
                                                                $dateString = $rowKTFirm['kitty_mondep_EMI_start_DOB'];
                                                                $timestamp = strtotime($dateString);
                                                                $monthAbbreviation = date('M', $timestamp);
                                                            }
                                                            ?>
                                                            <span> <?php echo strtoupper($monthAbbreviation); ?></span>
                                                        </td>
                                                    <?php } ?>
                                                    <?php
                                                    $fieldName = 'schemePaidAmt';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == 'true') {
                                                        ?>
                                                        <td align="center">
                                                            <?php echo $rowKTFirm['kitty_paid_amt']; ?>
                                                        </td>
                                                    <?php } ?>
                                                    <?php
                                                    $fieldName = 'schemeGroupName';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == 'true') {
                                                        ?>
                                                        <td align="center">
                                                            <?php echo $kittyGroup; ?>
                                                        </td>
                                                    <?php } ?>
                                                    <?php
                                                    $fieldName = 'schemeTokenNo';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == 'true') {
                                                        ?>
                                                        <td align="center">
                                                            <?php echo $kittyTokenNum; ?>
                                                        </td>
                                                    <?php } ?>
                                                    <?php
                                                    $fieldName = 'schemeCumulativeAmt';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == 'true') {
                                                        ?>
                                                        <td align="center">
                                                            <?php parse_str(getTableValues("SELECT sum(kitty_paid_amt) as allSchemePaidAmt from kitty_money_deposit where kitty_mondep_cust_id='$kittyCustId' and kitty_mondep_kitty_id='$kittyId' and ( kitty_mondep_EMI_status='Paid' || kitty_mondep_EMI_status='Payment')")); ?>
                                                            <?php
                                                            if ($showAllSchemeInv != 'YES')
                                                                echo $allSchemePaidAmt;
                                                            else
                                                                echo $kitty_paid_amt;
                                                            ?>
                                                        </td>
                                                    <?php } ?>
                                                    <!-- Added Cumulative Weight Row for showing data -->
                                                    <?php
                                                    $fieldName = 'schemeCumulativeWt';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));

                                                    if ($label_field_check == 'true') {

                                                        // Initialize cumulative variable outside the loop
                                                        if (!isset($cumulativeWeight)) {
                                                            $cumulativeWeight = 0;
                                                        }

                                                        // Inside your loop where you fetch each row like $rowKTFirm
                                                        $currentWeight = floatval($rowKTFirm['kitty_wt_amt']);
                                                        $cumulativeWeight += $currentWeight;
                                                        ?>
                                                        <td align="center">
                                                            <?php echo number_format($cumulativeWeight, 3); ?> 
                                                        </td>
                                                    <?php } ?>
                                                    <!-- END CODE FOR Cumulative Weight Row for showing data -->
                                                    <!-- Taxable Amt by Chetan@22052023   -->
                                                    <?php
                                                    if ($kitty_gst_check_status == "true") {
                                                        $fieldName = 'schemeTaxableAmt';
                                                        $label_field_check = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_check == 'true') {
                                                            ?>
                                                            <td align="center">
                                                                <?php echo $rowKTFirm['kitty_mondep_taxable_amt']; ?>
                                                            </td>
                                                        <?php } ?>
                                                        <!-- Ends HEre -->
                                                        <!-- GST AMT By Chetan@22052023 -->
                                                        <?php
                                                        $fieldName = 'schemeGSTAmt';
                                                        $label_field_check = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_check == 'true') {
                                                            ?>
                                                            <td align="center">
                                                                <?php echo $rowKTFirm['kitty_mondep_gst_amt']; ?>
                                                            </td>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <!-- Ends Here -->
                                                    <!-- Metal Rate Amt by Chetan@24052023   -->
                                                    <?php
                                                    if ($kittyMetalType != "CASH") {
                                                        $fieldName = 'schemeAccMetalRate';
                                                        $label_field_check = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_check == 'true') {
                                                            ?>
                                                            <td align="center">
                                                                <?php echo $rowKTFirm['kitty_rate_amt']; ?>
                                                            </td>
                                                        <?php } ?>
                                                        <!-- Ends HEre -->
                                                        <!-- Metal Rate Wt by Chetan@24052023   -->
                                                        <?php
                                                        $fieldName = 'schemeAccMetalWt';
                                                        $label_field_check = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_check == 'true') {
                                                            ?>
                                                            <td align="center">
                                                                <?php echo $rowKTFirm['kitty_wt_amt']; ?>
                                                            </td>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <!-- Ends HEre -->
                                                    <?php
                                                    $fieldName = 'schemePayment';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == 'true') {
                                                        ?>
                                                        <td align="center">
                                                            <?php echo $rowKTFirm['kitty_pay_mode']; ?>
                                                        </td>
                                                    <?php } ?>
                                                    <?php
                                                    $fieldName = 'schemeStatus';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == 'true') {
                                                        ?>

                                                        <td align="center"><?php if ($emiDelayDays > 0) { ?>
                                                                <span style="color:red;"><?php echo $emiDelayDays . ' days' . ' Late Paid'; ?></span>
                                                                <?php
                                                            } else {
                                                                echo "OnTime Paid";
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                $emiDelayDays = 0;
                                                $EMINo++;
                                                $kittyPaidAmt = $rowKTFirm['kitty_paid_amt'];
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php if ($kittyMetalType != "CASH") { ?>
                                        <tr>
                                            <td colspan="<?php echo $colspan; ?>">
                                                <table border="0" cellpadding="0" width="100%" cellspacing="0">
                                                    <tr>
                                                        <td align="center" colspan="<?php echo $colspan; ?>">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr align="center">

                                                        <?php
                                                        $fieldName = 'schemeMetalStatus';
                                                        $label_field_check = '';
                                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_check == 'true') {
                                                            $totalColumns++;
                                                            $fieldName = 'schemeMetalLb';
                                                            $srNoPresent = 'Y';
                                                            $label_field_content = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == 0) {
                                                                $label_field_font_size = 14;
                                                            }
                                                            ?>
                                                            <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                        <?php } ?>
                                                        <?php
                                                        $fieldName = 'schemeMetalStatus';
                                                        $label_field_check = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_check == 'true') {
                                                            ?>

                                                            <td><?php if ($total_metal_wt > 0) { ?>
                                                                    <span style="color:black;"><?php echo $total_metal_wt . ' GM'; ?></span>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                </table>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <!-- displaying cash details with bonus amt -->
                                    <?php if ($kittyMetalType == "CASH") { ?>
                                        <tr>
                                            <td colspan="<?php echo $colspan; ?>">
                                                <table border="0" cellpadding="0" width="100%" cellspacing="0">
                                                    <tr>
                                                        <td align="center" colspan="<?php echo $colspan; ?>">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr align="center">

                                                        <?php
                                                        $fieldName = 'schemeCashDetails';
                                                        $label_field_check = '';
                                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_check == 'true') {
                                                            $totalColumns++;
                                                            $fieldName = 'schemeCashDtlLb';
                                                            $srNoPresent = 'Y';
                                                            $label_field_content = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == 0) {
                                                                $label_field_font_size = 14;
                                                            }
                                                            ?>
                                                            <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th>
                                                        <?php } ?>
                                                        <?php
                                                        $fieldName = 'schemeCashDetails';
                                                        $label_field_check = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_check == 'true') {
                                                            ?>

                                                            <td><?php if ($total_cash_amt > 0) { ?>
                                                                    <span style="color:black;"><?php echo $total_cash_amt; ?></span>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                </table>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php
                                    $fieldName = 'schemePaidAmt';
                                    $label_field_check = '';
                                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($label_field_check == 'true' && $showAllSchemeInv != 'YES') {
                                        if ($payByOptionsCount > 0) {
                                            ?>
                                            <tr style="display: block;margin-bottom: 10px;">
                                                <td>
                                                    <table border="0" cellpadding="0" width="100%" cellspacing="0">
                                                        <tr>
                                                            <td align="left">
                                                                <span class="ff_calibri fw_b font_color_black" style="font-size:14px;"><b>PAYMENT DETAILS : </b></span> <br>
                                                                <?php
                                                                if ($rowUserTransSchemeEMIPayDet['utin_cash_amt_rec'] != 0 && $rowUserTransSchemeEMIPayDet['utin_cash_amt_rec'] != '') {
                                                                    echo "BY CASH Rs. " . $rowUserTransSchemeEMIPayDet['utin_cash_amt_rec'] . '<br>';
                                                                }
                                                                if ($rowUserTransSchemeEMIPayDet['utin_pay_cheque_amt'] != 0 && $rowUserTransSchemeEMIPayDet['utin_pay_cheque_amt'] != '') {
                                                                    echo "BY CHEQUE Rs. " . $rowUserTransSchemeEMIPayDet['utin_pay_cheque_amt'] . '<br>';
                                                                }
                                                                if ($rowUserTransSchemeEMIPayDet['utin_online_pay_amt'] != 0 && $rowUserTransSchemeEMIPayDet['utin_online_pay_amt'] != '') {
                                                                    echo "BY ONLINE Rs. " . $rowUserTransSchemeEMIPayDet['utin_online_pay_amt'] . '<br>';
                                                                }
                                                                if ($rowUserTransSchemeEMIPayDet['utin_pay_card_amt'] != 0 && $rowUserTransSchemeEMIPayDet['utin_pay_card_amt'] != '') {
                                                                    echo "BY CARD Rs. " . $rowUserTransSchemeEMIPayDet['utin_pay_card_amt'] . '<br>';
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($rowUserTransSchemeEMIPayDet['utin_paym_oth_info'] != '') { ?>
                                                                <td align="Right"><b>Description : </b>
                                                                    <?php
                                                                    echo $rowUserTransSchemeEMIPayDet['utin_paym_oth_info'];
                                                                    ?>
                                                                </td>
                                                            <?php } ?>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <?php
                                    $fieldName = 'totalEmiAmt';
                                    $label_field_check = '';
                                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($label_field_check == 'true') {
                                        ?>
                                        <tr style="display: block;margin-bottom: 10px;">
                                            <td>
                                                <table border="0" cellpadding="0" width="100%" cellspacing="0">
                                                    <tr>
                                                        <td align="left" colspan="2">
                                                            <?php
                                                            $fieldName = 'totalAmt';
                                                            $label_field_check = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <span class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;"><b><?php echo $label_field_content; ?> : </b></span> <br>

                                                        </td>
                                                        <td align="left">
                                                            <?php
                                                            $fieldName = 'totalEmiAmt';
                                                            $label_field_check = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            parse_str(getTableValues("SELECT sum(kitty_paid_amt) as allSchemePaidAmt from kitty_money_deposit where kitty_mondep_cust_id='$kittyCustId' and kitty_mondep_kitty_id='$kittyId' and (kitty_mondep_EMI_status='Paid' || kitty_mondep_EMI_status='Payment')"));
                                                            ?>
                                                            <span class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:<?php echo $label_field_font_weight; ?>;margin-left:10px;"> <?php echo $allSchemePaidAmt; ?></span> <br>

                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
                                    <!--start code for added for terms and condition @sarvesh sataye 6Dec2022-->
                                    <!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
                                    <tr>
                                        <td colspan="<?php echo $colspan; ?>">
                                            <?php
                                            $fieldName = 'termsschemeTop';
                                            $label_field_content = '';
                                            parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            $termsDetTopVal = $label_field_content;
                                            ?>
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top:<?php echo $termsDetTopVal; ?>mm">

                                                <tr>
                                                    <?php
                                                    $fieldName = 'tncscheme';
                                                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == 'true') {
                                                        $fieldName = 'tncschemeLb';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="left" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <?php echo $label_field_content; ?> : &nbsp;</td>
                                                    </tr>
                                                    <?php //} 
                                                    ?>
                                                    <tr>
                                                        <?php if ($label_field_check == 'true') { ?>
                                                            <?php
                                                            $fieldName = 'tncscheme';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            $noOfRows = substr_count($label_field_content, "\n") + 2;
                                                            $height = $noOfRows * ($label_field_font_size * 3);
                                                            ?>
                                                            <td align="left" class="ff_calibri fw_n font_color_<?php echo $tnc_color; ?>">
                                                                <div onClick="this.contentEditable = 'true';">
                                                                    <?php // echo '$label_field_content=='.$label_field_content.'<br>';  
                                                                    ?>
                                                                    <textarea id="tncLabel" spellcheck="false" name="tncLabel" class="textarea_a5_content ff_calibri font_color_<?php echo $tnc_color; ?>" rows="<?php echo $noOfRows + 1; ?>"
                                                                              style="text-align:left;width:90%;height:<?php echo $height; ?>;font-size:<?php echo $label_field_font_size; ?>px"><?php echo preg_replace('/\\\\/i', ' ', $label_field_content); ?></textarea>
                                                                </div>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php
                                        $fieldName = 'authSchemeCustSignLb';
                                        $qSelectCustSnap = "SELECT user_sign_snap,user_sign_update_date FROM user WHERE user_id='$kittyCustId'";
                                        $resCustSnap = mysqli_query($conn, "$qSelectCustSnap");
                                        $rowCustSnap = mysqli_fetch_array($resCustSnap);
                                        $custSnapFiletype = 'png';
                                        $custSnap = $rowCustSnap['user_sign_snap'];
                                        //header("Content-type: $custSnapFiletype");                                     
                                        //
                                        if ($custSnap != "") {
                                            $custId = $kittyCustId;
                                            $noEcho = 'Y';
                                            include('omccsnim.php');
                                            $noEcho = '';
                                            ?>
                                            <td align="left" width="50%">
                                                <!--<img src="<?php // echo $documentRootBSlash;                        
                                            ?>/include/php/omccsnim.php?cust_id=<?php // echo "$userId";                        
                                            ?>"-->
                                                <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($custSnap); ?>"
                                                     id="sign" border="0" style="border-color: #B8860B;width:150px; height:75px;" alt="" />
                                            </td>
                                            <?php
                                        } else {
                                            ?>
                                            <td align="left" width="50%"></td>
                                            <?php
                                        }
                                        ?>

                                        <?php
                                        if ($firm_owner_sign_ftype != NULL || $firm_owner_sign_ftype != '') {
                                            //                                            echo '$firm_id=='.$firm_id.'<br>';
                                            $firmId = $firm_id;
                                            $noEcho = 'Y';
                                            include('omffoteri.php');
                                            $noEcho = '';
                                            ?>
                                            <td align="right" width="50%">
                                                <!--                                                <img src="<?php echo $documentRootBSlash; ?>/include/php/omffgfowsi.php?firm_id=<?php echo $firm_id; ?>" 
                                                                                 alt="" style="border-color: #B8860B;width:230px; height:100px;" />-->
                                                <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($ownThumb); ?>"
                                                     alt="" style="border-color: #B8860B;width:230px; height:100px;" />
                                            </td>
                                            <?php
                                        } else {
                                            ?>
                                            <td align="right" width="50%">
                                                <?php
                                            }
                                            ?>
                                    </tr>
                                    <tr style="height:40px;">
                                        <td>
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php
                                        //                                        $fieldName = 'authSchemeSignLb';
                                        //                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        $fieldName = 'authSchemeCustSignLb';
                                        $label_field_check = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_check == 'true') {
                                            if ($rowCustSnap['user_sign_update_date'] != "") {
                                                ?>
                                                <td align="left" width="150px" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content . "      (" . $rowCustSnap['user_sign_update_date'] . ")"; ?></td>
                                                <?php
                                            } else {
                                                ?>
                                                <td align="left" width="150px" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?></td>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <td align="left" width="150px"></td>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        $fieldName = 'authSchemeSignLb';
                                        $label_field_check = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_check == 'true') {
                                            ?>
                                            <td align="right" width="150px" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?></td>
                                        <?php } else { ?>
                                            <td align="right" width="150px">
                                            <?php } ?>
                                    </tr>
                                    <tr>
                                        <td>
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <?php
                                    if ($_SESSION['sessionOwnIndStr'][41] == "A" || $_SESSION['sessionOwnIndStr'][41] == "B" || $_SESSION['sessionOwnIndStr'][41] == "Y") {
                                        ?>
                                        <tr>
                                            <?php
                                            $fieldName = 'authSchemeCustSignLb';
                                            $label_field_check = '';
                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_check == 'true') {
                                                ?>
                                                <td>
                                                    <div id="customerSignUpdate" class="modal" style="width:100%;height:100%;margin:auto;padding-top:15px!important;"></div>
                                                    <button class="btn1 om_btn_style btn1Hover noPrint"
                                                            style="border-radius: 5px !important;margin:unset;height:25px;width:50%;
                                                            font-weight:bold;font-size:10px;text-align:center;color:#5146D6;background-color: #F3E59A;"
                                                            name="updateCustSign" id="updateCustSign" onclick="OpenUpdateCustomerSignModal('<?php echo $kittyCustId; ?> ');">
                                                        UPDATE CUSTOMER SIGN
                                                    </button>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <!--// **************************************************************************************************************************
                                                                // END CODE UPDATE CUSTOMER SIGNATURE
                                                                // ***************************************************************************************************************************-->

                                    <?php
                                    // ****************************************************************
                                    // START CODE FOR WHATSAPP SEND PDF : AUTHOR @GANGADHAR 14 DEC 2023
                                    // ****************************************************************
                                    $slPrPreInvoiceNo = $_GET['kittyPreSerialNum'];
                                    $slPrInvoiceNo = $_GET['kittySerialNum'];
                                    $userId = $_GET['kittyCustId'];
                                    $invmessageText = 'Scheme EMI Invoice Details :';
                                    //
                                    $invoiceDate = $kittyStartDate;
                                    //
                                    //
                                    $invoiceDateTime = date("d M Y", strtotime($invoiceDate));
                                    $invoiceDate = strtoupper($invoiceDateTime);
                                    $_GET['invoiceDate'] = $invoiceDate;

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
                                        //
                                        //    echo '<br/>$cmd : ' . $cmd;
                                        //
                                        shell_exec($cmd);
                                        //
                                        include 'ogspwhatsapp.php';
                                        //
                                    }
                                    //
                                    ob_end_flush();

                                    // ****************************************************************
                                    // END  CODE FOR WHATSAPP SEND PDF : AUTHOR @GANGADHAR 14 DEC 2023
                                    // ****************************************************************
                                    ?>



                                    <tr>
                                        <?php
                                        $fieldName = 'footerSchemeLb';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_check == 'true') {
                                            ?>
                                            <td align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="<?php echo $colspan; ?>">
                                                <?php echo $label_field_content; ?>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td align="right" class="noPrint" colspan="">
                                            <a style="cursor: pointer;"
                                               onClick="window.print();">
                                                <img src="<?php echo $documentRootBSlash; ?>/images/printer32.png" alt='Print' title='Print'
                                                     width="32px" height="32px" />
                                            </a>
                                        </td>
                                        <td align="left" class="noPrint" colspan="">
                                            <a style="cursor: pointer;"
                                               onClick="var url = window.location.href;
                                                       url += '&whatsappStatus=Yes';
                                                       window.location.href = url;"" >
                                                <img src=" <?php echo $documentRootBSlash; ?>/images/whatsapp24.png" alt='Send Whatsapp' title='Send Whatsapp'
                                                     width="32px" height="32px" />
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                    </table>
            </div>
        </div>
    </body>
</html>