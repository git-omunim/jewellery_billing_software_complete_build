<?php
/*
 * **************************************************************************************
 * @tutorial: Sell Invoice SAMPLE 5 FOMART
 * @Author:   SIMRAN20DEC2022
 * **************************************************************************************
 * 
 * Created on 15 APRIL 2022
 *
 * @FileName: omspinvnewtaxRetailWholesaleheader.php
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
 *  AUTHOR: @SIMRAN SHAH
 *  REASON: 05 DEC 2022
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
$counter = 1;
$counterNew = 1;
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
    parse_str(getTableValues("SELECT user_type,user_fname,user_lname,user_prefix_name,user_father_name,user_pan_it_no,user_sale_tax_no,user_add,user_official_address,user_city,user_pincode,user_state,user_country,user_cst_no,user_phone,"
                    . "user_adhaar_card,user_mobile, user_current_address FROM user where user_owner_id='$sessionOwnerId' and user_id='$directOrderAssignUserId'"));
} else {
//--------Start code for prefix by Ashwini Patil-----
    parse_str(getTableValues("SELECT user_type,user_fname,user_lname,user_prefix_name,user_father_name,user_pan_it_no,user_sale_tax_no,user_add,user_official_address,user_city,user_pincode,user_state,user_country,user_cst_no,"
                    . "user_phone,user_adhaar_card,user_mobile,user_current_address FROM user where user_owner_id='$sessionOwnerId' and user_id='$userId'"));
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
<!-- START CODE FOR INVOICE HEADER -->
<table class="invoicecenter" width="100%">
    <tr>
        <td>
            <table width="100%" style="border-bottom:1px solid #C4C4C4;">
                <tr>

                    <?php
                    $fieldName = 'firmLeftLogoCheck';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                    echo '$label_field_check==' . $label_field_check . '<br>';
//                    echo '$firm_left_thumb_ftype==' . $firm_left_thumb_ftype . '<br>';
                    if (($firm_left_thumb_ftype != NULL || $firm_left_thumb_ftype != '') && $label_field_check == 'true') {
//                        echo 'hiii';
                        ?>
                        <td class="left-img">
                            <?php // echo '$userId==' . $userId . '<br>';    ?>
                            <img src="<?php echo $documentRootBSlash; ?>/include/php/omffgfli.php?firm_id=<?php echo $firm_id; ?>" 
                                 alt="" class="<?php
                                 if ($logoImageActualSizeOnInvoice == 'YES') {
                                     echo '';
                                 } else {
                                     echo $imageClass;
                                 }
                                 ?>" />
                        </td>
                    <?php } else { ?>
                        <td class="left-img">
                            <img src="<?php echo $documentRootBSlash; ?>/include/php/omffgfli.php?firm_id=<?php echo $firm_id; ?>"  
                                 alt="" class="<?php
                                 if ($logoImageActualSizeOnInvoice == 'YES') {
                                     echo '';
                                 } else {
                                     echo $imageClass;
                                 }
                                 ?>" style="visibility:hidden;"/>
                        </td>
                    <?php } ?>

                    <td class="center-content">

                        <table>
                            <?php
                            $fieldName = 'firmLongName';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($firm_long_name != NULL && $label_field_check == 'true') {
                                ?>
                                <tr>
                                    <td align="center">
                                        <h2 style="text-align:center;margin:0; font-size:<?php echo $label_field_font_size; ?>px; float: none;" class="heading-title font_color_<?php echo $label_field_font_color; ?>">
                                            <?php echo $firm_long_name; ?>
                                        </h2>
                                    </td>
                                </tr>
                                <?php
                            }
                            $fieldName = 'firmDesc';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($firm_desc != NULL && $label_field_check == 'true') {
                                ?>
                                <tr>
                                    <td  align="center">
                                        <p class="address font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;">
                                            <?php echo $firm_desc; ?>
                                        </p> 
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
                                    <td  class="address font_color_<?php echo $label_field_font_color; ?>" valign="middle" align="center" style="font-size:<?php echo $label_field_font_size; ?>px; text-align: center; ">
                                        <?php echo $firm_address; ?>
                                    </td>
                                </tr> 
                            <?php } ?>  
                        </table>
                    </td>
                    <td class="gst-content">
                        <div class="inner-content">
                            <?php
                            $fieldName = 'firmTin';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $gstFontSizeLb = $label_field_font_size;
                            // echo '$firm_tin_no=='.$firm_tin_no;
                            // echo '$label_field_check=='.$label_field_check;
                            if ($firm_tin_no != NULL && $label_field_check == 'true') {
                                $fieldName = 'firmTinLb';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>  
                                <p class="gstNo">
                                    <span> <?php echo $label_field_content; ?>:</span>
                                    <?php echo ($firm_tin_no); ?>
                                </p>                              
                            <?php } ?>
                            <?php
                            $fieldName = 'firmRegNo';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $firmRegiNofont = $label_field_font_size;
                            $firmReginoColor = $label_field_font_color;
                            if ($firm_reg_no != NULL && $label_field_check == 'true') {
                                $fieldName = 'firmRegNoLabel';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <p class="gstNo" style="margin-top:0px;"><span> <?php echo $label_field_content; ?> :</span><?php echo ($firm_reg_no); ?></p>
                            <?php } ?>
                            <?php
                            $fieldName = 'firmPhone';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $firmRegiNofont = $label_field_font_size;
                            $firmReginoColor = $label_field_font_color;
                            if ($firm_reg_no != NULL && $label_field_check == 'true') {
                                ?>
                                <p class="gstNo" style="margin-top:0px;"><span><?php echo $label_field_content; ?> :</span><?php echo ($firm_phone_details); ?></p>
                            <?php } ?>
                            <?php
                            $fieldName = 'firmEmail';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($firm_email != NULL && $label_field_check == 'true') {
                                ?>
                                <p class="gstNo" style="margin-top:0px;text-transform:lowercase;"><span style="text-transform:uppercase;"><?php echo $label_field_content; ?>:</span><?php echo $firm_email; ?></p>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- END CODE FOR INVOICE HEADER -->
<?php
include 'omspinvnewtaxRetailWholesalecustInfo.php';
include 'omspinvnewtaxRetailWholesaleItemDetails.php';
//include 'omspinvnewtaxRetailWholesaleTblRight.php'; 
?>