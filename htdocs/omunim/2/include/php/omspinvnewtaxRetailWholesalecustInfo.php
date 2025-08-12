<?php
/*
 * **************************************************************************************
 * @tutorial: Sell Invoice SAMPLE 5 FOMART
 * @Author:   SIMRAN20DEC2022
 * **************************************************************************************
 * 
 * Created on 15 APRIL 2022
 *
 * @FileName: omspinvnewtaxRetailWholesalecustInfo.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: 05 DEC 2022
 *  AUTHOR: @SIMRAN SHAH
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
<?php
//
//Start Code to get Cust and Firm Details 
//Start Code To Select FirmId
//echo '<pre>';
//print_r($_SESSION);
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
// salepurchase to  stock_sell @Author: GAUR18MAR16
$userId = $_GET['userId'];
//echo '$userId=='.$userId.'<br>';
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
//
    $qSelCustId = "SELECT sttr_user_id, sttr_firm_id, sttr_metal_type, sttr_transaction_type FROM stock_transaction "
            . "WHERE sttr_owner_id='$sessionOwnerId' and sttr_pre_invoice_no='$slPrPreInvoiceNo' and "
            . "sttr_invoice_no='$slPrInvoiceNo' and sttr_firm_id IN ($strFrmId) AND sttr_status NOT IN ('DELETED') "
            . "and sttr_indicator IN ('stock','PURCHASE','rawMetal','crystal','imitation','strsilver','ItemReturn','APPROVAL', 'PurchaseReturn') "
            . "and sttr_transaction_type IN('STOCK', 'newOrder','sell','ESTIMATESELL','PURCHASE','PURBYSUPP','ESTIMATE','ItemReturn','APPROVAL', 'PurchaseReturn') "
            . "and sttr_user_id='$userId' order by sttr_id asc";
//
    $resCustId = mysqli_query($conn, $qSelCustId);
    $resDet = mysqli_query($conn, $qSelCustId);
    $rowCustId = mysqli_fetch_array($resCustId, MYSQLI_ASSOC);
    $firmId = $rowCustId['sttr_firm_id'];
    $metal_type = $rowCustId['sttr_metal_type'];
    $sttr_transaction_type = $rowCustId['sttr_transaction_type'];
//
//   
}
//
//
parse_str(getTableValues("SELECT firm_id,firm_reg_no,firm_form_header,firm_name,firm_long_name,firm_address,firm_phone_details,firm_email,firm_desc,firm_pan_no,"
                . "firm_owner_sign_ftype,firm_tin_no,firm_left_thumb_ftype,firm_right_thumb_ftype,"
                . "firm_bank_details, firm_bank_acc_no, firm_bank_ifsc_code, firm_bank_declaration "
                . " FROM firm where firm_own_id='$sessionOwnerId' and firm_id='$firmId' $sessionFirmStr"));
//************************Start change code for data from customer to user Author@:SANT12JAN16******************************************************************************************
//
$qSelFirm = "SELECT firm_id,firm_reg_no,firm_form_header,firm_name,firm_long_name,firm_address,firm_phone_details,firm_email,firm_desc,firm_pan_no,"
        . "firm_tin_no,firm_left_thumb_ftype,firm_right_thumb_ftype FROM firm where firm_own_id='$sessionOwnerId' and firm_id='$firmId' $sessionFirmStr";
$resFirmCount = mysqli_query($conn, $qSelFirm);
//
while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
    $firm_long_name = $rowFirm['firm_long_name'];
}
if ($_REQUEST['directOrderAssign'] == 'YES') {
    $directOrderAssignUserId = $_REQUEST['directOrderAssignUserId'];
    parse_str(getTableValues("SELECT user_type,user_fname,user_lname,user_prefix_name,user_father_name,user_pan_it_no,user_sale_tax_no,user_add,user_official_address,user_city,user_pincode,user_email,user_state,user_country,user_cst_no,user_phone,"
                    . "user_adhaar_card,user_mobile, user_current_address,user_pid,user_uid,user_tehsil,user_reference,user_bank_acc_number FROM user where user_owner_id='$sessionOwnerId' and user_id='$directOrderAssignUserId'"));
} else {
//--------Start code for prefix by Ashwini Patil-----
    parse_str(getTableValues("SELECT user_type,user_fname,user_lname,user_prefix_name,user_father_name,user_pan_it_no,user_sale_tax_no,user_add,user_official_address,user_city,user_pincode,user_email,user_state,user_country,user_cst_no,"
                    . "user_phone,user_adhaar_card,user_mobile,user_current_address,user_pid,user_uid,user_tehsil,user_reference,user_bank_acc_number FROM user where user_owner_id='$sessionOwnerId' and user_id='$userId'"));
//--------Start code for USER ADDRESS by RUTUJA KORPE 20NOV2020-----
}
if ($user_type == 'CUSTOMER') {
    if ($user_add == '' || $user_add == NULL) {
        $user_add = $user_current_address;
    } else {
        $user_add = $user_add;
    }
}

if ($user_type == 'SUPPLIER') {
    if ($user_add == '' || $user_add == NULL) {
        $user_add = $user_official_address;
    } else {
        $user_add = $user_add;
    }
}
?>
<table class="invoicecenter" width="100%;" style="border:0;">
    <tr>
        <td>
            <table style="padding:0px 20px" width="100%">
                <tr>
                <h2 style="color:#000;margin:0px;text-align:center;text-transform: uppercase;">Tax Invoice</h2>
    </tr>
    <tr>   
        <td>
            <table class="billing-table" width="95%" style="margin-top:5px;">
                <thead class="table-head custAdd">
                    <tr>
                        <th style="border-right: 0;">
                            <p style="color:#000;font-weight:bold;text-align:left;">
                                <?php
                                $fieldName = 'userName';
                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $userNamefontsize = $label_field_font_size;
                                if ($user_fname != NULL && $label_field_check == 'true') {
                                    $fieldName = 'userNameLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                <span style="font-weight:normal; font-size:<?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?>
                                    </span>
                               
                            </p>
                                <?php } ?>
                        </th>
                        <th style="border-right: 0;">
                              <?php
                                $fieldName = 'userAccNO';
                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $userNamefontsize = $label_field_font_size;
                                if ($user_fname != NULL && $label_field_check == 'true') {
                                    $fieldName = 'userAccNOLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                            <p style="color:#363636;font-size:<?php echo $label_field_font_size; ?>px;text-align:right;font-weight:500;"><b style="color:#000;"><?php echo $label_field_content; ?>: </b><?php echo $user_bank_acc_number; ?></p>
                                <?php } ?>
                        </th>
                    </tr>
                    <tr>
                        <td style="border-right: 0;" colspan="2">
                            <p style="color:#000;font-size:<?php echo $label_field_font_size; ?>px;text-align:left;font-weight:500;"><b><?php echo om_strtoupper($user_fname . ' ' . $user_lname)?></b></p>
                        </td>
                    </tr>
                </thead>
                <tbody class="table-innerSec">
                    <tr>
                        <td style="padding: 15px 5px;" colspan="2">
                            <?php
                                //
                                $fieldName = 'userId';
                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $addresssize = $label_field_font_size;
                                if ($label_field_check == 'true') {
                                    $fieldName = 'userIdLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                            <p style="color:#363636;font-size:<?php echo $label_field_font_size; ?>px;text-align:left;font-weight: 500;margin-bottom:5px;"><b style="color:#000;"><?php echo $label_field_content; ?>: </b><?php echo om_strtoupper($user_pid .''. $user_uid); ?></p>
                                <?php } ?>
                            <?php
                                //
                                $fieldName = 'userAddress';
                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $addresssize = $label_field_font_size;
                                if ($label_field_check == 'true' && $user_add != NULL) {
                                    $fieldName = 'userAddressLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                            <p style="color:#363636;font-size:<?php echo $label_field_font_size; ?>px; text-align:left;font-weight: 500;margin-bottom:5px;"><b style="color:#000;"><?php echo $label_field_content; ?> : </b> <?php echo om_strtoupper($user_add .','. $user_city); ?> </p>
                                <?php } ?>
                            <?php
                                $fieldName = 'userContact';
                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $usercontact = $label_field_font_size;
                                //
                                if ($user_mobile != NULL && $label_field_check == 'true') {
                                    $fieldName = 'userContactLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                            <p style="color:#363636;font-size:<?php echo $label_field_font_size; ?>px; text-align:left;font-weight: 500;margin-bottom:5px;"><b style="color:#000;"><?php echo $label_field_content; ?> : </b> <?php echo $user_mobile; ?></p>
                           <?php } ?>
                             <?php
                                //$label_field_content= '';
                                $fieldName = 'userTehsil';
                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $userTehsil = $label_field_font_size;
                                //
                                if ($user_tehsil != NULL && $label_field_check == 'true') {
                                    $fieldName = 'userTehsilLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                            <p style="color:#363636;font-size:<?php echo $label_field_font_size; ?>px; text-align:left;font-weight: 500;margin-bottom:5px;"><b style="color:#000;"><?php echo $label_field_content; ?>: </b><?php echo $user_tehsil; ?></p>
                                <?php } ?>
                            <?php
                                //$label_field_content= '';
                                $fieldName = 'userEmail';
                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $userEmail = $label_field_font_size;
                                //
                                if ($user_email != NULL && $label_field_check == 'true') {
                                    $fieldName = 'userEmailLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                            <p style="color:#363636;font-size:<?php echo $label_field_font_size; ?>px; text-align:left;font-weight: 500;margin-bottom:5px;text-transform: lowercase;"><b style="color:#000;text-transform:uppercase;"><?php echo $label_field_content; ?>: </b><?php echo $user_email; ?></p>
                         <?php } ?>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="table-foot">
                        <td style="padding:5px 5px;" colspan="2">
                             <?php
                                $fieldName = 'userGstIn';
                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $usercstno = $label_field_font_size;
                                //
                                if ($user_cst_no != '' && $label_field_check == 'true') {
                                    $fieldName = 'userGstInLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                            echo '$label_field_co/ntent=='.$label_field_content.'<br>';
                                    ?>
                            <p style="color:#363636;font-size:<?php echo $label_field_font_size; ?>px;text-align:left;font-weight: 500;margin-bottom:5px;"><b style="color:#000;"><?php echo $label_field_content; ?>: </b> <?php echo $user_cst_no; ?></p>
                         <?php } ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </td>
        <!--- customer details -->
        <td width="48%">
            <table class="billing-table" width="100%" style="margin-top:5px;">
                <tr class="table-head">
                     <?php
                                $fieldName = 'invNoTitle';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,"
                                                . "label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' "
                                                . "and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $invNoFont = $label_field_font_size;
                                if ($label_field_check == 'true') {
                                    $fieldName = 'invNoTitleLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,"
                                                    . "label_field_font_color,label_field_check FROM labels "
                                                    . "WHERE label_own_id = '$sessionOwnerId' and "
                                                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                    <th><?php echo $label_field_content; ?>.</th>
                      <?php
                    $fieldName = 'dateTitle';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $dateFontSize = $label_field_font_size;
                    if ($label_field_check == 'true') {
                        $fieldName = 'dateTitleLb';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>
                    <th><?php echo $label_field_content; ?></th>
                    
                </tr>
                <tbody class="table-innerSec">
                    <tr>
                        <td> <?php
                                        $invFinMMStart = date('n', strtotime($invoiceDate));
                                        if ($invFinMMStart <= 3) {
                                            $invFinYYStart = date('y', strtotime($invoiceDate)) - 1;
                                            $invFinYYEnd = date('y', strtotime($invoiceDate));
                                        } else {
                                            $invFinYYStart = date('y', strtotime($invoiceDate));
                                            $invFinYYEnd = date('y', strtotime($invoiceDate)) + 1;
                                        }
                                        echo $slPrPreInvoiceNo . '/' . $slPrInvoiceNo . '/' . $invFinYYStart . '-' . $invFinYYEnd;
                                        ?>
                        </td>
                                <?php } ?>
                        <td>
                             <?php
                                if ($nepaliDateIndicator == 'YES') {
                                    if ($nepaliDateMonthFormat == 'displayInNumber') {
                                        $invoiceDate = date_create($invoiceDate);
                                        $invoiceDate = date_format($invoiceDate, "d-m-Y");
                                        echo $invoiceDate;
                                    } else {
                                        $invoiceDate = date_create($invoiceDate);
                                        $invoiceDate = date_format($invoiceDate, "d-m-Y");
                                        $invoiceDateArray = explode('-', $invoiceDate);
                                        $invoiceMonthName = $nepali_date->get_nepali_month($invoiceDateArray[1]);
                                        echo $invoiceDateArray[0] . ' ' . $invoiceMonthName . ' ' . $invoiceDateArray[2];
                                    }
                                } else {
                                    if ($dateOpt == 'customizedDate') {
                                        $invoiceDate = date_create($invoiceDate);
                                        $invoiceDate = date_format($invoiceDate, "m/d/y");
                                        echo $invoiceDate;
                                    } else if ($dateOpt == 'normalDateFormat') {
                                        $invoiceDate = date_create($invoiceDate);
                                        $invoiceDate = date_format($invoiceDate, "d-m-Y");
                                        echo $invoiceDate;
                                    } else {
                                        $invoiceDate = date_create($invoiceDate);
                                        $invoiceDate = date_format($invoiceDate, "d M Y");
                                        echo strtoupper($invoiceDate);
                                    }
                                }
                                ?>
                        </td>
                        <?php } ?>
                        
                    </tr>
                </tbody>
            </table>
            <?php
        $getSellMetalRate = "SELECT sttr_metal_type,sttr_metal_rate,sttr_assign_status, sttr_transaction_type FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
                . "and sttr_indicator IN ('stock','stockCrystal','PURCHASE','rawMetal','APPROVAL','APPROVALREC','crystal','imitation','strsilver','RetailStock','ESTIMATE', 'PurchaseReturn') "
                . "and sttr_transaction_type IN('STOCK', 'sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ESTIMATE', 'PurchaseReturn') "
                . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') AND sttr_firm_id='$utin_firm_id' order by sttr_id ASC";
        //
        $resSellMetalRate = mysqli_query($conn, $getSellMetalRate);
        while ($rowSellMetalRate = mysqli_fetch_array($resSellMetalRate)) {
            //

            $sttr_metal_rate = $rowSellMetalRate['sttr_metal_rate'];
            $sttr_metal_type = $rowSellMetalRate['sttr_metal_type'];
            $sttr_assign_status = $rowSellMetalRate['sttr_assign_status'];
            if ($sttr_metal_rate != '') {

                parse_str(getTableValues("SELECT met_rate_value, met_rate_purity FROM metal_rates "
                                . "where met_rate_own_id = '$sessionOwnerId' and met_rate_metal_name = 'Gold' and met_rate_purity = '100' "
                                . "order by met_rate_ent_dat desc LIMIT 0, 1"));

                $metalRate24k = $met_rate_value;
                $metPurity24k = $met_rate_purity;

                parse_str(getTableValues("SELECT met_rate_value, met_rate_purity FROM metal_rates "
                                . "where met_rate_own_id = '$sessionOwnerId' and met_rate_metal_name = 'Gold' and met_rate_purity IN('91.67') "
                                . "order by met_rate_ent_dat desc LIMIT 0, 1"));

                $metalRate22k = $met_rate_value;
                $metPurity22k = $met_rate_purity;

                parse_str(getTableValues("SELECT met_rate_value, met_rate_purity FROM metal_rates "
                                . "where met_rate_own_id = '$sessionOwnerId' and met_rate_metal_name = 'Gold' and met_rate_purity IN('75') "
                                . "order by met_rate_ent_dat desc LIMIT 0, 1"));

                $metalRate75k = $met_rate_value;
                $metPurity75k = $met_rate_purity;

                if (($metPurity24k == '100' && $metalRate24k != '') && ($metPurity22k == '' || $metPurity75k == '')) {
                    $gold24kRate = $metalRate24k;

                    $gold18kRate = $gold24kRate * 0.75;
                    $gold18kRate = om_round($gold18kRate, 0);

                    $gold22kRate = $gold24kRate * 0.916;
                    $gold22kRate = om_round($gold22kRate, 0);
                    break;
                } else if (($metPurity22k == '91.67' && $metalRate22k != '') && ($metPurity24k == '' || $metPurity75k == '')) {
//                            echo '$metalRate22k=='.$metalRate22k.'<br>';
                    $gold22kRate = $metalRate22k;
//
                    $gold24kRate = ($gold22kRate / 22) * 24;
                    $gold24kRate = om_round($gold24kRate, 0);
                    $gold18kRate = $gold24kRate * 0.75;
                    $gold18kRate = om_round($gold18kRate, 0);

                    break;
                } else if (($metPurity75k == '75' && $metalRate75k != '') && ($metPurity22k == '' || $metPurity24k == '')) {
                    $gold18kRate = $metalRate75k;
                    $gold18kRate = om_round($gold18kRate, 0);

                    $gold24kRate = ($gold18kRate / 18) * 24;
                    $gold24kRate = om_round($gold24kRate, 0);

                    $gold22kRate = $gold24kRate * 0.916;
                    $gold22kRate = om_round($gold22kRate, 0);

                    break;
                } else {
                    $gold24kRate = $metalRate24k;
                    $gold22kRate = $metalRate22k;
                    $gold18kRate = $metalRate75k;
                }

                $silverRate = $sttr_metal_rate;
                if ($silverRate != '') {
                    $met_rate_value = '';
                    parse_str(getTableValues("SELECT met_rate_value FROM metal_rates "
                                    . "where met_rate_own_id = '$sessionOwnerId' and met_rate_metal_name = 'Silver' and met_rate_purity IN('100') "
                                    . "order by met_rate_ent_dat desc LIMIT 0, 1"));
                    $silverRate = $met_rate_value;
                }
            }
        }
        
        ?>
            <table class="billing-table" width="100%">
                <tr class="table-head">
                     <?php
                        $fieldName = '22kRate';
                        $label_field_check = '';
                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $gold22kRateDisplay = $label_field_check;
                        if ($label_field_check == 'true' && $gold22kRate != '') {
                            $fieldName = '22kRateLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($label_field_font_size == 0) {
                                $label_field_font_size = 14;
                            }                        
                   if($fieldName != ''){?>
                    <th colspan="10" style="border-right:0;">Gold Rate</th>
                   <?php } ?>
                </tr>
                <tbody class="table-innerSec">
                    <tr>                    
                        <td>
                            <?php
                                    if ($label_field_content != '') {
                                        echo $label_field_content;
                                    } else {
                                        echo '22K GOLD RATE';
                                    }
                                    ?>
                        </td>                     
                        <td style="text-align:left;"><?php echo formatInIndianStyle($gold22kRate); ?></td>
                        <?php } ?>
                          <?php
                        $fieldName = '24kRate';
                        $label_field_check = '';
                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $gold22kRateDisplay = $label_field_check;
                        if ($label_field_check == 'true' && $gold22kRate != '') {
                            $fieldName = '24kRateLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($label_field_font_size == 0) {
                                $label_field_font_size = 14;
                            }
                            ?>
                        <td>
                            <?php
                                    if ($label_field_content != '') {
                                        echo $label_field_content;
                                    } else {
                                        echo '24K GOLD RATE';
                                    }
                                    ?>
                        </td>
                        
                        <td style="text-align:right;"><?php echo formatInIndianStyle($gold24kRate); ?></td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
             <table class="billing-table" width="100%">
                <tr class="table-head">
                    <?php
                        $fieldName = 'silverRate';
                        $label_field_check = '';
                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $gold22kRateDisplay = $label_field_check;
                        if ($label_field_check == 'true' && $gold22kRate != '') {
                            $fieldName = 'silverRateLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($label_field_font_size == 0) {
                                $label_field_font_size = 14;
                            }
                            if($fieldName != ''){
                            ?>
                    <th colspan="10" style="border-right:0;">Silver Rate</th>
                            <?php } ?>
                </tr>
                <tbody class="table-innerSec">
                    <tr>                 
                        <td>
                            <?php
                                    if ($label_field_content != '') {
                                        echo $label_field_content;
                                    } else {
                                        echo 'SILVER RATE';
                                    }
                                    ?>
                        </td>
                       <td style="border-right:0;text-align:left;"><?php echo formatInIndianStyle($silverRate); ?></td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
            <table class="billing-table" width="100%">
                <tr class="table-head">
                     <?php
                    $fieldName = 'userReference';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $dateFontSize = $label_field_font_size;
                    if ($label_field_check == 'true') {
                        $fieldName = 'userReferenceLb';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>
                    <th style="border-right:0;"><?php echo $label_field_content; ?></th>
                    <?php } ?>
<!--                    <th style="border-right:0;">Whole sales Voucher</th>-->
                </tr>
                <tbody class="table-innerSec">
                    <tr>
                        <td colspan="10"><?php echo $user_reference; ?></td>
                    </tr>
                </tbody>
            </table>
        </td>
        <!--- right side table section -->
    </tr>
</table>
</td>
</tr>
<!--- upper section -->
</table>
