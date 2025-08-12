<?php
/*
 * **************************************************************************************
 * @tutorial: Sell Invoice SAMPLE 4 FOMART
 * **************************************************************************************
 *
 * @FileName: omspinvItemReturnheader.php
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
 *  AUTHOR:@SANSKRUTI
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
//    $qSelCustId = "SELECT xrf_user_id,xrf_firm_id,xrf_metal_type FROM xrf_entries WHERE xrf_owner_id = '$sessionOwnerId' "
//            . "and xrf_pre_invoice_no = '$slPrPreInvoiceNo' and "
//            . "xrf_invoice_no = '$slPrInvoiceNo' and xrf_firm_id IN ($strFrmId) AND xrf_status NOT IN ('DELETED') AND "
//            . "xrf_user_id = '$userId' order by xrf_id asc";
//
////echo '$qSelCustId == '.$qSelCustId;
//
//    $resCustId = mysqli_query($conn, $qSelCustId);
//    $rowCustId = mysqli_fetch_array($resCustId, MYSQLI_ASSOC);
//    $firmId = $rowCustId['xrf_firm_id'];
//    $metal_type = $rowCustId['xrf_metal_type'];
//    $sttr_transaction_type = 'sell';
//
} else if ($invName == 'TRANS_PAYMENT') {
//
//    $qSelCustId = "SELECT transaction_firm_id FROM transaction WHERE transaction_own_id = '$sessionOwnerId' "
//            . "and transaction_pre_vch_id = '$slPrPreInvoiceNo' and "
//            . "transaction_post_vch_id = '$slPrInvoiceNo' and transaction_firm_id IN ($strFrmId) "
//            . "AND transaction_upd_sts IN ('PaymentDone') "
//            . "order by transaction_id asc";
//
////echo '$qSelCustId == '.$qSelCustId;
//
//    $resCustId = mysqli_query($conn, $qSelCustId);
//    $rowCustId = mysqli_fetch_array($resCustId, MYSQLI_ASSOC);
    $firmId = $getUserTransDetails['invoice'][0]['utin_firm_id'];
    $metal_type = "TransPayment";
    $sttr_transaction_type = "TransPayment";
//
} else {
//
//
//    $qSelCustId = "SELECT sttr_user_id, sttr_firm_id, sttr_metal_type, sttr_transaction_type,sttr_staff_id FROM stock_transaction "
//            . "WHERE sttr_owner_id='$sessionOwnerId' and sttr_pre_invoice_no='$slPrPreInvoiceNo' and "
//            . "sttr_invoice_no='$slPrInvoiceNo' and sttr_firm_id IN ($strFrmId) AND sttr_status NOT IN ('DELETED') "
//            . "and sttr_indicator IN ('stock','PURCHASE','rawMetal','crystal','imitation','strsilver','ItemReturn','APPROVAL', 'PurchaseReturn') "
//            . "and sttr_transaction_type IN('STOCK', 'newOrder','sell','ESTIMATESELL','PURCHASE','PURBYSUPP','ESTIMATE','ItemReturn','APPROVAL', 'PurchaseReturn') "
//            . "and sttr_user_id='$userId' order by sttr_id asc";
//
//    $resCustId = mysqli_query($conn, $qSelCustId);
//    $resDet = mysqli_query($conn, $qSelCustId);
//    $rowCustId = mysqli_fetch_array($resCustId, MYSQLI_ASSOC);
    $firmId =$getStockTransDetails[0]['sttr_firm_id'];
    $metal_type = $getStockTransDetails[0]['sttr_metal_type'];
    $sttr_transaction_type = $getStockTransDetails[0]['sttr_transaction_type'];
    $sttr_staff_id = $getStockTransDetails[0]['sttr_staff_id'];
//
//   
}
//
//
//parse_str(getTableValues("SELECT firm_id,firm_reg_no,firm_form_header,firm_name,firm_long_name,firm_address,firm_phone_details,firm_email,firm_desc,firm_pan_no,"
//                . "firm_owner_sign_ftype,firm_tin_no,firm_left_thumb_ftype,firm_right_thumb_ftype,"
//                . "firm_bank_details, firm_bank_acc_no, firm_bank_ifsc_code, firm_bank_declaration "
//                . " FROM firm where firm_own_id='$sessionOwnerId' and firm_id='$firmId' $sessionFirmStr"));

$firm_id = $getFirmDetails['firm_id'];
$firm_reg_no = $getFirmDetails['firm_reg_no'];
$firm_form_header = $getFirmDetails['firm_form_header'];
$firm_name = $getFirmDetails['firm_name'];
$firm_long_name = $getFirmDetails['firm_long_name'];
$firm_address = $getFirmDetails['firm_address'];
$firm_phone_details = $getFirmDetails['firm_phone_details'];
$firm_email = $getFirmDetails['firm_email'];
$firm_desc = $getFirmDetails['firm_desc'];
$firm_pan_no = $getFirmDetails['firm_pan_no'];
$firm_owner_sign_ftype = $getFirmDetails['firm_owner_sign_ftype'];
$firm_tin_no = $getFirmDetails['firm_tin_no'];
$firm_left_thumb_ftype = $getFirmDetails['firm_left_thumb_ftype'];
$firm_right_thumb_ftype = $getFirmDetails['firm_right_thumb_ftype'];
$firm_bank_details = $getFirmDetails['firm_bank_details'];
$firm_bank_acc_no = $getFirmDetails['firm_bank_acc_no'];
$firm_bank_ifsc_code = $getFirmDetails['firm_bank_ifsc_code'];
$firm_bank_declaration = $getFirmDetails['firm_bank_declaration'];

//************************Start change code for data from customer to user Author@:SANT12JAN16******************************************************************************************
//
//$qSelFirm = "SELECT firm_id,firm_reg_no,firm_form_header,firm_name,firm_long_name,firm_address,firm_phone_details,firm_email,firm_desc,firm_pan_no,"
//        . "firm_tin_no,firm_left_thumb_ftype,firm_right_thumb_ftype FROM firm where firm_own_id='$sessionOwnerId' and firm_id='$firmId' $sessionFirmStr";
//$resFirmCount = mysqli_query($conn, $qSelFirm);
////
//while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
//    $firm_long_name = $rowFirm['firm_long_name'];
//}
if ($_REQUEST['directOrderAssign'] == 'YES') {
    $directOrderAssignUserId = $_REQUEST['directOrderAssignUserId'];
//    parse_str(getTableValues("SELECT user_type,user_fname,user_lname,user_prefix_name,user_father_name,user_pan_it_no,user_sale_tax_no,user_add,"
//            . "user_official_address,user_city,user_pincode,user_state,user_country,user_cst_no,user_phone,"
//                    . "user_adhaar_card,user_shipping_address,user_mobile,user_shop_name, user_current_address, user_village, "
//            . "user_tehsil,user_ward_no FROM user where user_owner_id='$sessionOwnerId' and user_id='$directOrderAssignUserId'"));
   foreach($getUserDetails as $getUserDet){
   if($getUserDet['user_id'] == $directOrderAssignUserId){
   $user_type = $getUserDet['user_type'];
   $user_fname = $getUserDet['user_fname'];
   $user_lname = $getUserDet['user_lname'];
   $user_prefix_name = $getUserDet['user_prefix_name'];
   $user_father_name = $getUserDet['user_father_name'];
   $user_pan_it_no = $getUserDet['user_pan_it_no'];
   $user_sale_tax_no = $getUserDet['user_sale_tax_no'];
   $user_add = $getUserDet['user_add'];
   $user_official_address = $getUserDetails['user_official_address'];
   $user_city = $getUserDet['user_city'];
   $user_pincode = $getUserDet['user_pincode'];
   $user_state = $getUserDet['user_state'];
   $user_country = $getUserDet['user_country'];
   $user_cst_no = $getUserDet['user_cst_no'];
   $user_phone = $getUserDet['user_phone'];
   $user_adhaar_card = $getUserDet['user_adhaar_card'];
   $user_shipping_address = $getUserDet['user_shipping_address'];
   $user_mobile = $getUserDet['user_mobile'];
   $user_shop_name = $getUserDet['user_shop_name'];
   $user_current_address = $getUserDet['user_current_address'];
   $user_village = $getUserDet['user_village'];
   $user_tehsil = $getUserDet['user_tehsil'];
   $user_ward_no = $getUserDet['user_ward_no'];
    }
}
} else {
//--------Start code for prefix by Ashwini Patil-----
//    parse_str(getTableValues("SELECT user_type,user_fname,user_lname,user_prefix_name,user_father_name,user_pan_it_no,user_sale_tax_no,"
//            . "user_add,user_official_address,user_city,user_pincode,user_state,user_country,user_cst_no,"
//                    . "user_phone,user_adhaar_card,user_shipping_address,user_mobile,user_shop_name,user_current_address,user_village,"
//            . " user_tehsil,user_ward_no FROM user where user_owner_id='$sessionOwnerId' and user_id='$userId'"));
   $user_type = $getUserDetails['user_type'];
   $user_fname = $getUserDetails['user_fname'];
   $user_lname = $getUserDetails['user_lname'];
   $user_prefix_name = $getUserDetails['user_prefix_name'];
   $user_father_name = $getUserDetails['user_father_name'];
   $user_pan_it_no = $getUserDetails['user_pan_it_no'];
   $user_sale_tax_no = $getUserDetails['user_sale_tax_no'];
   $user_add = $getUserDetails['user_add'];
   $user_official_address = $getUserDetails['user_official_address'];
   $user_city = $getUserDetails['user_city'];
   $user_pincode = $getUserDetails['user_pincode'];
   $user_state = $getUserDetails['user_state'];
   $user_country = $getUserDetails['user_country'];
   $user_cst_no = $getUserDetails['user_cst_no'];
   $user_phone = $getUserDetails['user_phone'];
   $user_adhaar_card = $getUserDetails['user_adhaar_card'];
   $user_shipping_address = $getUserDetails['user_shipping_address'];
   $user_mobile = $getUserDetails['user_mobile'];
   $user_shop_name = $getUserDetails['user_shop_name'];
   $user_current_address = $getUserDetails['user_current_address'];
   $user_village = $getUserDetails['user_village'];
   $user_tehsil = $getUserDetails['user_tehsil'];
   $user_ward_no = $getUserDetails['user_ward_no'];
   
      
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

//$showSecPagePrint = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'showSecPagePrint'";
//$resShowSecPagePrint = mysqli_query($conn, $showSecPagePrint);
//$rowShowSecPagePrint = mysqli_fetch_array($resShowSecPagePrint);
$showSecPagePrint = $getLayoutDetails['showSecPagePrint'];
?>

<style>
    .invoicecenter .left-content img{
        float: left;
        width: 101.1%;
        height: 48px;
        margin-left: -5px;
        margin-top:-5px;
    }
</style>
<?php if ($showSecPagePrint == 'YES') { ?>
<thead>
    <?php } ?>
<tr>
    <td>
            <table width="100%">
                <tr>
                    <td class="left-content">
                        <p style="text-align:right">
                            <?php
//                        $fieldName = 'firmPhone';
//                        $label_field_font_size = '';
//                        $label_field_font_color = '';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($firm_phone_details != NULL && $firmPhone_check == 'true') {
                                ?>
                                <b><?php echo $firmPhone_content ?>:</b> <?php echo $firm_phone_details; ?></br>
                                <?php
                            }
//                        $fieldName = 'firmEmail';
//                        $label_field_font_size = '';
//                        $label_field_font_color = '';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($firm_email != NULL && $firmEmail_check == 'true') {
                                ?>
                                <b><?php echo $firmEmail_content; ?>:</b> <?php echo $firm_email; ?>
                            <?php } ?>
                        </p>
                        <img src="<?php echo $documentRootBSlash; ?>/images/invoice/inv-topImg.png" alt="">
                    </td>
                </tr>
        </table>
    </td>
</tr>
<tr>
    <td>
            <table width="100%">
            <tr>
                <?php
                $fieldName = 'firmLeftLogoCheck';
//                parse_str(getTableValues("SELECT label_field_check as firmLeftLogoCheck_check  FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
              
                $firmLeftLogoCheck_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];                
//echo '$label_field_check==' . $label_field_check . '<br>';
                //echo '$firm_left_thumb_ftype==' . $firm_left_thumb_ftype . '<br>';
                if ($firmLeftLogoCheck_check == 'true') {
                    if ($firm_left_thumb_ftype != NULL || $firm_left_thumb_ftype != '') {
                        $firmId = $firm_id;
                        $noEcho = 'Y';
                        include('omffgfli.php');
                        $noEcho = '';
                        ?>
                        <td class="left-img">
                            <?php // echo '$userId==' . $userId . '<br>';     ?>
                            <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($firmThumb); ?>" 
                                 alt="" style="margin-top:5px;"  class="<?php
                                 if ($logoImageActualSizeOnInvoice == 'YES') {
                                     echo '';
                                 } else {
                                     echo $imageClass;
                                 }
                                 ?>" />
                        </td>
                        <?php
                    } else {
                        $firmId = $firm_id;
                        $noEcho = 'Y';
                        include('omffgfli.php');
                        $noEcho = '';
                        ?>
                        <td class="left-img">
                            <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($firmThumb); ?>"  
                                 alt="" style="margin-top:5px;"  class="<?php
                                 if ($logoImageActualSizeOnInvoice == 'YES') {
                                     echo '';
                                 } else {
                                     echo $imageClass;
                                 }
                                 ?>" style="visibility:hidden;"/>
                        </td>
                        <?php
                    }
                }
                ?>
                    <td class="center-content">
                        <table width="60%" style="margin-left: 34px;">
                        <?php
//                        $fieldName = 'firmLongName';
//                        $label_field_font_size = '';
//                        $label_field_font_color = '';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($firm_long_name != NULL && $firmLongName_check == 'true') {
                            ?>
                            <tr>
                                <td align="center">
                                        <h2 style="text-align:center;font-size:<?php echo $firmLongName_size; ?>px;margin-left:30px;float:none;" class="heading-title font_color_<?php echo $firmLongName_color; ?>">
                                        <?php echo $firm_long_name; ?>
                                    </h2>
                                </td>
                            </tr>
                            <?php
                        }
//                        $fieldName = 'firmDesc';
//                        $label_field_font_size = '';
//                        $label_field_font_color = '';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($firm_desc != NULL && $firmDesc_check == 'true') {
                            ?>
                            <tr>
                                <td  align="center">
                                        <p class="address font_color_<?php echo $firmDesc_color; ?>" style="font-size:<?php echo $firmDesc_size; ?>px;">
                                        <?php echo $firm_desc; ?>
                                    </p> 
                                </td>
                            </tr>
                            <?php
                        }
//                        $fieldName = 'firmRegNo';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                        $firmRegiNofont = $label_field_font_size;
//                        $firmReginoColor = $label_field_font_color;
                        if ($firm_reg_no != NULL && $firmRegNo_check == 'true') {
                            ?>
                            <tr>
                                <?php
//                                $fieldName = 'firmRegNoLabel';
//                                $label_field_font_size = '';
//                                $label_field_font_color = '';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td  class="address font_color_<?php echo $firmRegNoLabel_color; ?>" align="center" style="font-size:<?php echo $firmRegNoLabel_size; ?>px;">
                                    <?php echo $firmRegNoLabel_content; ?> : 
                                    <span class="address font_color_<?php echo $firmReginoColor; ?>" style="font-size:<?php echo $firmRegiNofont; ?>px;" ><?php echo ($firm_reg_no); ?></span>
                                </td>
                            </tr>
                            <?php
                        }
//                        $fieldName = 'firmAddress';
//                        $label_field_font_size = '';
//                        $label_field_font_color = '';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($firm_address != NULL && $firmAddress_check == 'true') {
                            ?>
                            <tr> 
                                <td  class="address font_color_<?php echo $firmAddress_color; ?>" valign="middle" align="center" style="font-size:<?php echo $firmAddress_size; ?>px; text-align: center; ">
                                    <?php echo $firm_address; ?>
                                </td>
                            </tr> 
                        <?php } ?> 
<!--<p class="trust">(A sign of trust)</p>-->
                    </table>
                </td>
                <td class="gst-content">
                    <div class="inner-content" style="text-align: right;" valign="bottom">
                        <?php
//                        $fieldName = 'firmTinTop';
//                        $label_field_font_size = '';
//                        $label_field_font_color = '';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $gstFontSizeLb = $firmTinTop_size;
                        if ($firm_tin_no != NULL && $firmTinTop_check == 'true') {
//                            $fieldName = 'firmTinTopLb';
//                            $label_field_font_size = '';
//                            $label_field_font_color = '';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>          
                                <p class="gstNo" style="padding-bottom:unset; margin-bottom: -5px; float: right; padding: unset !important; margin-right: 12px; font-size: <?php echo $gstFontSizeLb; ?>px; ">
                                <span font_color_<?php echo $firmGstNocolor; ?> style="font-size: <?php echo $firmTinTopLb_size; ?>px; ">
                                    <?php echo $firmTinTopLb_content; ?>:</span>
                                <?php echo ($firm_tin_no); ?></p>
                        <?php } else { ?>
                            <p class="gstNo"> </p>
                        <?php } ?>
                    </div>
                </td>
                <?php 
                $fieldName = 'firmRightLogoCheck';
//                $label_field_font_size = '';
//                $label_field_font_color = '';
//                parse_str(getTableValues("SELECT label_field_check as firmRightLogoCheck_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                
                $firmRightLogoCheck_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
                if ($firmRightLogoCheck_check == 'true') {
                    if ($firm_right_thumb_ftype != NULL || $firm_right_thumb_ftype != '') {
//                        echo 'hiii';
                        ?>
                        <td class="left-img" style="margin-top:10px;">
                            <?php
                            // echo '$userId==' . $userId . '<br>';
                            //
                            $firmId = $firm_id;
                            $noEcho = 'Y';
                            include('omffgfri.php');
                            $noEcho = '';
                            ?>
                            <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($firmThumb); ?>"  
                                 alt=""  style="margin-top:8px;" class="<?php
                                 if ($logoImageActualSizeOnInvoice == 'YES') {
                                     echo '';
                                 } else {
                                     echo $imageClass;
                                 }
                                 ?>" />
                        </td>
                        <?php
                    } else {
                        $firmId = $firm_id;
                        $noEcho = 'Y';
                        include('omffgfri.php');
                        $noEcho = '';
                        ?>
                        <td class="left-img" style="margin-top:10px;">
                            <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($firmThumb); ?>"  
                                 alt="" style="margin-top:8px;"  class="<?php
                                 if ($logoImageActualSizeOnInvoice == 'YES') {
                                     echo '';
                                 } else {
                                     echo $imageClass;
                                 }
                                 ?>" style="visibility:hidden;"/>
                        </td>
                        <?php
                    }
                }
                ?>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td width="100%" style="border-bottom:1px solid #C4C4C4">
       <!--<table ></table>-->
    </td>
</tr>
