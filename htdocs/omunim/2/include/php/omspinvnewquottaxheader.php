<?php
/*
 * **************************************************************************************
 * @tutorial: Sell Invoice SAMPLE 4 FOMART
 * **************************************************************************************
 * 
 * Created on 15 APRIL 2022
 *
 * @FileName: omspinvnewquottaxheader.php
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
   $qSelCustId = "SELECT sttr_user_id, sttr_firm_id, sttr_metal_type,sttr_counter_name, sttr_transaction_type,sttr_staff_id FROM stock_transaction "
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
    $sttr_staff_id = $rowCustId['sttr_staff_id'];
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
    parse_str(getTableValues("SELECT user_type,user_fname,user_lname,user_prefix_name,user_father_name,user_pan_it_no,user_sale_tax_no,user_add,user_official_address,user_city,user_pincode,user_state,user_country,user_cst_no,user_phone,"
                    . "user_adhaar_card,user_shipping_address,user_mobile,user_shop_name, user_current_address, user_village, user_tehsil,user_ward_no FROM user where user_owner_id='$sessionOwnerId' and user_id='$directOrderAssignUserId'"));
} else {
//--------Start code for prefix by Ashwini Patil-----
    parse_str(getTableValues("SELECT user_type,user_fname,user_lname,user_prefix_name,user_father_name,user_pan_it_no,user_sale_tax_no,user_add,user_official_address,user_city,user_pincode,user_state,user_country,user_cst_no,"
                    . "user_phone,user_adhaar_card,user_shipping_address,user_shipping_fname,user_shipping_city,user_shipping_state,user_shipping_mob_no,user_shipping_gst_no,user_shipping_pan_no,user_mobile,user_shop_name,user_current_address,user_village, user_tehsil,user_ward_no FROM user where user_owner_id='$sessionOwnerId' and user_id='$userId'"));
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
$showSecPagePrint = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'showSecPagePrint'";
$resShowSecPagePrint = mysqli_query($conn, $showSecPagePrint);
$rowShowSecPagePrint = mysqli_fetch_array($resShowSecPagePrint);
$showSecPagePrint = $rowShowSecPagePrint['omly_value'];
//
$showHeaderBorderQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'showHeaderBorder'";
$resShowHeaderBorder = mysqli_query($conn, $showHeaderBorderQuery);
$rowResShowHeaderBorder = mysqli_fetch_array($resShowHeaderBorder);
$showHeaderBorder = $rowResShowHeaderBorder['omly_value'];
//
if ($showSecPagePrint == 'YES') {
    if ($showHeaderBorder == 'NO') {
        ?>
<thead>     
<?php } ?>
    <?php } ?>
<tr>
    <td valign="top">
        <table width="100%" valign="top">
            <tr style="display: flex; justify-content: space-between;"> <!--// align-items:center;  Yuvraj remove this css @yuvraj 17082022-->
                <td valign="top" width="44%">
                    <p style="color:#FD9A00;font-size:12px;font-weight: 600;margin:0;padding:0;margin-left: -28px;">
                        <?php
//                        $fieldName = 'detailsOfRec';
//                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                            $label_field_font_size = '';
//                        $detailsOfRec = $detailsOfRec_check;
                        if ($detailsOfRec_check == 'true') {
                            ?>
                                                                                                                             <!--<div class="ff_calibri fw_b font_color_<?php echo $detailsOfRec_color; ?>" style="font-size:<?php echo $detailsOfRec_size; ?>px" onClick="this.contentEditable = 'true';">-->
                            <!----START CODE TO SHOW BILL FROM FOR RAW METAL PURCHASE INVOICE,@AUTHOR:HEMA-3MAY2020----->
                            <?php if ($invName == 'metalPurchase') { ?>
                                <span class="spaceRight25" style="font-size: <?php echo $detailsOfRec_size; ?>px;"><?php echo 'Details Of Receiver ' . '  ' . ' (Bill From) ' ?></span><br>
                                <!----END CODE TO SHOW BILL FROM FOR RAW METAL PURCHASE INVOICE,@AUTHOR:HEMA-3MAY2020----->
                            <?php } else { ?>
                                <span class="spaceRight25" style="font-size: <?php echo $detailsOfRec_size; ?>px;"><?php echo 'Details Of Receiver ' . '  ' . ' (Bill To)' ?> </span><br>
                            <?php } ?>
                            <!--</div>--> 
                            <?php
                        }
                        ?>
                    </p>
                    <!--************* START YUVRAJ ADDTHIS CODE FOR SET LAYOUT INVOICE @YUVRAJ 17082022 -->
                    <table style="margin-left: 13px;">
                        <tr>
                            <td align="left" style="width:120px;" >
                                <?php
                                //
                                            parse_str(getTableValues("SELECT sttr_user_billing_name,sttr_staff_id FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                                                            . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
                                                            . "and sttr_indicator IN ('stock','stockCrystal','PURCHASE','rawMetal','APPROVAL','APPROVALREC','crystal','imitation','strsilver','RetailStock','ESTIMATE', 'PurchaseReturn') "
                                                            . "and sttr_transaction_type IN('STOCK', 'sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ESTIMATE', 'PurchaseReturn') "
                                                            . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') order by sttr_id ASC"));
                                            //
                                            $user_billing_name = $sttr_user_billing_name;
//                                $fieldName = 'userName';
//                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $userNamefontsize = $userName_size;
                                if ($user_fname != NULL && $userName_check == 'true') {
//                                    $fieldName = 'userNameLb';
//                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <span style="width:120px;  color:#D23100;font-weight: bold;font-size:<?php echo $userNameLb_size; ?>px;"><?php echo $userNameLb_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:100%;">
                                    <span style="font-size: <?php echo $userNamefontsize; ?>px; ">
                                        <?php
                                            //
                                            parse_str(getTableValues("SELECT sttr_user_billing_name,sttr_staff_id FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                                                            . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
                                                            . "and sttr_indicator IN ('stock','stockCrystal','PURCHASE','rawMetal','APPROVAL','APPROVALREC','crystal','imitation','strsilver','RetailStock','ESTIMATE', 'PurchaseReturn') "
                                                            . "and sttr_transaction_type IN('STOCK', 'sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ESTIMATE', 'PurchaseReturn') "
                                                            . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') order by sttr_id ASC"));
                                            //
                                            $user_billing_name = $sttr_user_billing_name;
                                            //
                                            if ($user_type != 'SUPPLIER') {
                                                if ($user_billing_name != '') {
                                                    if ($custNameFormat == 'allCapitals') {
                                                        echo  strtoupper($user_billing_name);
                                                    } else if ($custNameFormat == 'firstCapitals') {
                                                        echo  ucfirst($user_billing_name) ;
                                                    } else {
                                                        echo  $user_billing_name ;
                                                    }
                                                } else {
                                                    if ($user_fname != 'EBILL') {
                                                        //
                                                        if (($user_lname != '' || $user_father_name != '') && $custNameFormat == 'allCapitals')
                                                            echo  strtoupper($user_prefix_name . ' ' . $user_fname . ' ' . $user_lname);
                                                        elseif (($user_lname != '' || $user_father_name != '') && $custNameFormat == 'firstCapitals')
                                                            echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($user_prefix_name . ' ' . $user_fname . ' ' . $user_lname))));
                                                        else
                                                            echo  $user_prefix_name . ' ' . "$user_fname" . ' ' . $user_lname ;
                                                    }
                                                }
                                            } else {
                                                if ($user_fname != 'EBILL') {
                                                    if ($user_shop_name != '') {
                                                        echo $user_shop_name ;
                                                    }
                                                }
                                            }
                                            ?>
                                    </span>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <!--************************-->
                        <tr>
                            <td align="left" style="width:120px;" >
                                <?php
                                $fLetter = $user_father_name[0];
                                if ($fLetter == 'S' || $fLetter == 'F') {
//                                    $fieldName = 'userSo';
//                                    parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    $fatherNamefontsize = $userSo_size;
                                    if ($user_father_name != '' && $userSo_check == 'true') {
//                                        $fieldName = 'userSoLb';
//                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <span style="width:120px;  color:#D23100;font-weight: bold;font-size:<?php echo $userSoLb_size; ?>px;"><?php echo $userSoLb_content; ?>
                                        </span>
                                    </td>
                                    <td align="center" >
                                        <span>&nbsp;:&nbsp;</span>
                                    </td>
                                    <td align="left" style="width:100%;">
                                        <span style="font-size: <?php echo $fatherNamefontsize; ?>px; ">
                                            <?php
                                            if (preg_match("/^[a-zA-Z]$/", substr($user_father_name, 0, 1))) {
                                                echo om_strtoupper(substr($user_father_name, 1));
                                            } else {
                                                echo substr($user_father_name, 1);
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                }
                            }
                            ?>
                        </tr>
                        <!--***************************************************************-->
                        <tr>
                            <td align="left" style="width:120px;" >
                                <?php
                                $fLetter = $user_father_name[0];
                                if ($fLetter == 'D') {
//                                    $fieldName = 'userDo';
//                                    parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    $fatherNamefontsize = $userDo_size;
                                    if ($user_fname != NULL && $userDo_check == 'true') {
//                                        $fieldName = 'userDoLb';
//                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <span style="width:120px;  color:#D23100;font-weight: bold;font-size:<?php echo $userDoLb_size; ?>px;"><?php echo $userDoLb_content; ?>
                                        </span>
                                    </td>
                                    <td align="center" >
                                        <span>&nbsp;:&nbsp;</span>
                                    </td>
                                    <td align="left" style="width:100%;">
                                        <span style="font-size: <?php echo $fatherNamefontsize; ?>px; ">
                                            <?php
                                            if (preg_match("/^[a-zA-Z]$/", substr($user_father_name, 0, 1))) {
                                                echo om_strtoupper(substr($user_father_name, 1));
                                            } else {
                                                echo substr($user_father_name, 1);
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                }
                            }
                            ?>
                        </tr>
                        <!--***************************************************************-->
                        <tr>
                            <td align="left" style="width:120px;" >
                                <?php
                                $fLetter = $user_father_name[0];
                                if ($fLetter == 'W') {
//                                    $fieldName = 'userWo';
//
//                                    parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    $fatherNamefontsize = $userWo_size;
                                    if ($user_fname != NULL && $userWo_check == 'true') {
//                                        $fieldName = 'userWoLb';
//                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <span style="width:120px;  color:#D23100;font-weight: bold;font-size:<?php echo $userWoLb_size; ?>px;"><?php echo $userWoLb_content; ?>
                                        </span>
                                    </td>
                                    <td align="center" >
                                        <span>&nbsp;:&nbsp;</span>
                                    </td>
                                    <td align="left" style="width:100%;">
                                        <span style="font-size: <?php echo $fatherNamefontsize; ?>px; ">
                                            <?php
                                            if (preg_match("/^[a-zA-Z]$/", substr($user_father_name, 0, 1))) {
                                                echo om_strtoupper(substr($user_father_name, 1));
                                            } else {
                                                echo substr($user_father_name, 1);
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                }
                            }
                            ?>
                        </tr>
                        <!--***************************************************************-->
                        <!--***************************************************************-->
                        <tr>
                            <td align="left" style="width:120px;" >
                                <?php
                                $fLetter = $user_father_name[0];
                                if ($fLetter == 'C') {
//                                    $fieldName = 'userCo';
//                                    parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                                    $fatherNamefontsize = $label_field_font_size;
                                    if ($user_fname != NULL && $userCo_check == 'true') {
//                                        $fieldName = 'userCoLb';
//                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <span style="width:120px;  color:#D23100;font-weight: bold;font-size:<?php echo $userCoLb_size; ?>px;"><?php echo $userCoLb_content; ?>
                                        </span>
                                    </td>
                                    <td align="center" >
                                        <span>&nbsp;:&nbsp;</span>
                                    </td>
                                    <td align="left" style="width:100%;">
                                        <span style="font-size: <?php echo $fatherNamefontsize; ?>px; ">
                                            <?php
                                            if (preg_match("/^[a-zA-Z]$/", substr($user_father_name, 0, 1))) {
                                                echo om_strtoupper(substr($user_father_name, 1));
                                            } else {
                                                echo substr($user_father_name, 1);
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                }
                            }
                            ?>
                        </tr>
                        <!--***************************************************************-->
                        <!-- START CODE FOR ADDED USER VILLAGE, TEHSIL, CITY @SIMRAN:05AUG2023-->
                        <tr>
                            <td align="left" style="width:120px;" >
                                <?php
                                $fieldName = 'userVillage';
                                $label_field_check = '';
                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                //
                                if ($label_field_check == 'true' && $user_village != '') {
                                    $fieldName = 'userVillageLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($label_field_font_size == 0) {
                                        $label_field_font_size = 14;
                                    }
                                    ?>
                                    <span style="width:120px;  color:#D23100;font-weight: bold;font-size:<?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:100%;">
                                    <span style="font-size: <?php echo $label_field_font_size; ?>px; ">
                                        <?php echo $user_ward_no . ' ' . $user_village; ?>
                                    </span>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td align="left" style="width:120px;" >
                                <?php
                                $fieldName = 'userTaluka';
                                $label_field_check = '';
                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                //
                                if ($label_field_check == 'true' && $user_tehsil != '') {
                                    $fieldName = 'userTalukaLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($label_field_font_size == 0) {
                                        $label_field_font_size = 14;
                                    }
                                    ?>

                                    <span style="width:120px;  color:#D23100;font-weight: bold;font-size:<?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:100%;">
                                    <span style="font-size: <?php echo $label_field_font_size; ?>px; ">
                                        <?php echo $user_tehsil; ?>
                                    </span>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td align="left" style="width:120px;" >
                                <?php
                                $fieldName = 'userCity';
                                $label_field_check = '';
                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                //
                                if ($label_field_check == 'true' && $user_city != '') {
                                    $fieldName = 'userCityLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($label_field_font_size == 0) {
                                        $label_field_font_size = 14;
                                    }
                                    ?>

                                    <span style="width:120px;  color:#D23100;font-weight: bold;font-size:<?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:100%;">
                                    <span style="font-size: <?php echo $label_field_font_size; ?>px; ">
                                        <?php echo $user_city; ?>
                                    </span>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <!-- END CODE FOR ADDED USER VILLAGE, TEHSIL, CITY @SIMRAN:05AUG2023-->
                        <tr>
                            <td align="left" style="width:120px;" >
                                <?php
                                //
//                                $fieldName = 'userAddress';
//                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $addresssize = $userAddress_size;
                                if ($userAddress_check == 'true' && $user_add != NULL) {
//                                    $fieldName = 'userAddressLb';
//                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <span style="width:120px;  color:#D23100;font-weight: bold;font-size:<?php echo $userAddressLb_size; ?>px;"><?php echo $userAddressLb_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:300px;">
                                    <span style=" font-size: <?php echo $addresssize; ?>px;">
                                        <?php
                                        if (preg_match("/^[a-zA-Z]$/", substr($user_add, 0, 1))) {
                                            echo om_strtoupper($user_add);
                                        } else {
                                            echo $user_add;
                                        }
                                        ?> 
                                        <?php if ($user_city != '' || $user_pincode != '') { ?>

                                            <?php
                                            if (preg_match("/^[a-zA-Z]$/", substr($user_city, 0, 1))) {
                                                echo om_strtoupper($user_city) . ', ' . $user_pincode;
                                            } else {
                                                echo $user_city . ', ' . $user_pincode;
                                            }
                                            ?>

                                        <?php } if ($user_state != '' || $user_country != '') { ?>
                                            <?php
                                            if (preg_match("/^[a-zA-Z]$/", substr($user_state, 0, 1))) {
                                                if (preg_match("/^[a-zA-Z]$/", substr($user_country, 0, 1))) {
                                                    echo om_strtoupper($user_state . ' ' . $user_country);
                                                } else {
                                                    echo om_strtoupper($user_state) . ' ' . $user_country;
                                                }
                                            } else if ((preg_match("/^[a-zA-Z]$/", substr($user_country, 0, 1)))) {
                                                echo $user_state . ' ' . om_strtoupper($user_country);
                                            } else {
                                                echo $user_state . ' ' . $user_country;
                                            }
                                            ?></span>
                                    <?php }
                                    ?>
                                    </span>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <!--***************************************************************-->
                        <tr>
                            <td align="left" style="width:120px;" >
                                <?php
//                                $fieldName = 'userContact';
//                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $usercontact = $userContact_size;
//
                                if ($user_mobile != NULL && $userContact_check == 'true') {
//                                    $fieldName = 'userContactLb';
//                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <span style="width:120px;  color:#D23100;font-weight: bold;font-size:<?php echo $userContactLb_size; ?>px;"><?php echo $userContactLb_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:100%;">
                                    <span style="font-size: <?php echo $usercontact; ?>px; ">
                                        <?php echo $user_mobile; ?>
                                    </span>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <!--***************************************************************-->
                        <tr>
                            <td align="left" style="width:120px;" >
                                <?php
//                                $fieldName = 'userPan';
//                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                if ($user_pan_it_no != '' && $userPan_check == 'true') {
//                                    $fieldName = 'userPanLb';
//                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    $panLbFontSize = $userPanLb_size;
                                    ?>
                                    <span style="width:120px;  color:#D23100;font-weight: bold;font-size:<?php echo $userPanLb_size; ?>px;"><?php echo $userPanLb_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:100%;">
                                    <span style="font-size: <?php echo $panLbFontSize; ?>px; ">
                                        <?php echo $user_pan_it_no; ?>
                                    </span>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <!--***************************************************************-->
                        <tr>
                            <td align="left" style="width:120px;" >
                                <?php
//                                $fieldName = 'userGstIn';
//                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $usercstno = $userGstIn_size;
//echo '$usercstno=='.$usercstno.'<br>';
                                if ($user_cst_no != '' && $userGstIn_check == 'true') {
//                                    $fieldName = 'userGstInLb';
//                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                            echo '$label_field_co/ntent=='.$label_field_content.'<br>';
                                    ?>
                                    <span style="width:120px;  color:#D23100;font-weight: bold;font-size:<?php echo $userGstInLb_size; ?>px;"><?php echo $userGstInLb_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:100%;">
                                    <span style="font-size: <?php echo $usercstno; ?>px; ">
                                        <?php echo $user_cst_no; ?>
                                    </span>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                         <!--//**************************************************************************************************************************
            //START CODE TO DISPLAY IRN NUMBER && E-WAY BILL NUMBER @RENUKA26JULY2022
            //******************************************************************************************************************************-->
<?php if (($utin_einvoice_irn_no != '') && ($utin_eway_bill_no == '')) { ?>
                <tr>
                     <td align="left" style="width:120px;" >
                         <span style="font-size:<?php echo $userGstInLb_size; ?>px; color:#D23100">
                             <b>IRN NO</b>
                         </span>
                            
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                 <td align="left" style="width:100%;">
                                    <span style="font-size: <?php echo $usercstno; ?>px; ">
                                        <?php echo $utin_einvoice_irn_no; ?>
                                    </span>
                                </td>
                         
                    </td>   
                </tr>
                <tr>
                     <td align="left" style="width:120px;" >
                         <span style="font-size:<?php echo $userGstInLb_size; ?>px; color:#D23100">
                             <b>ACK. NO</b>
                         </span>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                 <td align="left" style="width:100%;">
                                    <span style="font-size: <?php echo $usercstno; ?>px; ">
                                        <?php echo $utin_einvoice_ack_no; ?>
                                    </span>
                                </td>
                        
                    </td>   
                </tr>
                  <tr>
                     <td align="left" style="width:120px;" >
                         <span style="font-size:<?php echo $userGstInLb_size; ?>px; color:#D23100">
                             <b>ACK. DATE</b>
                         </span>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                 <td align="left" style="width:100%;">
                                    <span style="font-size: <?php echo $usercstno; ?>px; ">
                                        <?php echo $utin_einvoice_ack_date; ?>
                                    </span>
                                </td>
                        
                    </td>   
                </tr>
<?php } ?>
<?php if (($utin_einvoice_irn_no != '') && ($utin_eway_bill_no != '')) { ?>
                   <tr>
                     <td align="left" style="width:120px;" >
                         <span style="font-size:<?php echo $userGstInLb_size; ?>px; color:#D23100">
                             <b>IRN NO</b>
                         </span>
                            
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                 <td align="left" style="width:100%;">
                                    <span style="font-size: <?php echo $usercstno; ?>px; ">
                                        <?php echo $utin_einvoice_irn_no; ?>
                                    </span>
                                </td>
                         
                    </td>   
                </tr>
                <tr>
                     <td align="left" style="width:120px;" >
                         <span style="font-size:<?php echo $userGstInLb_size; ?>px; color:#D23100">
                             <b>ACK. NO</b>
                         </span>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                 <td align="left" style="width:100%;">
                                    <span style="font-size: <?php echo $usercstno; ?>px; ">
                                        <?php echo $utin_einvoice_ack_no; ?>
                                    </span>
                                </td>
                        
                    </td>   
                </tr>
                  <tr>
                     <td align="left" style="width:120px;" >
                         <span style="font-size:<?php echo $userGstInLb_size; ?>px; color:#D23100">
                             <b>E-WAY BILL NO</b>
                         </span>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                 <td align="left" style="width:100%;">
                                    <span style="font-size: <?php echo $usercstno; ?>px; ">
                                        <?php echo $utin_eway_bill_no; ?>
                                    </span>
                                </td>
                        
                    </td>   
                </tr>
<?php } ?>
            <!--//**************************************************************************************************************************
            //START CODE TO DISPLAY IRN NUMBER @RENUKA26JULY2022
                        <!--***************************************************************-->
                        <tr>
                            <td align="left" style="width:35%;" >
                                <?php
//                                $fieldName = 'userAdhaar';
//                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $useradharfont = $userAdhaar_size;
                                if ($user_adhaar_card != '' && $userAdhaar_check == 'true') {
//                                    $fieldName = 'userAdhaarLb';
//                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <span style="width:120px;  color:#D23100;font-weight: bold;font-size:<?php echo $userAdhaarLb_size; ?>px;"><?php echo $userAdhaarLb_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:100%;">
                                    <span style="font-size: <?php echo $useradharfont; ?>px; ">
                                        <?php echo $user_adhaar_card; ?>
                                    </span>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                    </table>
                    <!--***************************************************************-->
                </td>
                <?php
                
                    ?>
                    <td width="39%">
                        <table width="100%" cellspacing="0" cellpadding="0" align="center">
                              <!--start shipping user name-->
                                <tr>
                                    <td>
                                        <p style="color:#FD9A00;font-size:12px;font-weight: 600;margin:0;padding:0;text-align: left;text-indent: 0;">
                                            <?php
                                            if ($user_shipping_fname != null && $user_shipping_fname != '') {
                                            $fieldName = 'shipUserName';
                                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_check == 'true') {
                                                $fieldName = 'shipUserNameLb';
                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size,label_field_font_color,label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <span class="spaceRight25" style="font-size: <?php echo $label_field_font_size; ?>px;color:#D23100; ?>"><?php echo $label_field_content . " :" ?> </span>
                                                <?php
                                                $fieldName = 'shipUserName';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <span style="text-align: center;font-weight:500;font-size:<?php echo $label_field_font_size; ?>px; color:<?php echo $label_field_font_color; ?>;">
                                                    <?php
                                                    echo $user_shipping_fname;
                                                    ?>
                                                </span>
                                                <?php
                                            }
                                            }
                                            ?>        
                                        </p>
                                    </td>
                                </tr>
                                <!--end shipping user name-->
                            <tr>
                                <td>
                                     <p style="color:#FD9A00;font-size:12px;font-weight: 600;margin:0;padding:0;text-align: left;text-indent: 0;">
                            <?php
                            if ($user_shipping_address != null && $user_shipping_address != '') {
                            $fieldName = 'shipAddress';
                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($label_field_check == 'true') {
                                $fieldName = 'shipDetTop';
                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size,label_field_font_color,label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                //$label_field_font_size = '';
                                ?>
                                <span class="spaceRight25" style="font-size: <?php echo $label_field_font_size; ?>px;color:#D23100;"><?php echo $label_field_content.":" ?> </span>

                                <?php
                            }
                            ?>
                            <?php
                                $fieldName = 'shipAddress';
                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));

                                if ($label_field_check == 'true') {
                                    ?>
                                    <!--<td align="left" style="width:100%;">-->
                                        <?php
                                        $fieldName = 'shipAddress';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <span style="text-align: center;font-weight:500;font-size:<?php echo $label_field_font_size; ?>px; color:<?php echo $label_field_font_color; ?>;">
                                            <?php
                                            echo $user_shipping_address;
                                            ?>
                                        </span>
                                    <!--</td>-->
                                    <?php
                                }
                }
                                ?>    
                        </p>
                                </td>
                            </tr>
                            <!--start shipping city-->
                                <tr>
                                    <td>
                                        <p style="color:#FD9A00;font-size:12px;font-weight: 600;margin:0;padding:0;text-align: left;text-indent: 0;">
                                            <?php
                                            if ($user_shipping_city != null && $user_shipping_city != '') {
                                            $fieldName = 'shipCity';
                                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_check == 'true') {
                                                $fieldName = 'shipCityLb';
                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size,label_field_font_color,label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <span class="spaceRight25" style="font-size: <?php echo $label_field_font_size; ?>px;color:#D23100;"><?php echo $label_field_content . " :" ?> </span>
                                                <?php
                                                $fieldName = 'shipCity';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <span style="text-align: center;font-weight:500;font-size:<?php echo $label_field_font_size; ?>px; color:<?php echo $label_field_font_color; ?>;">
                                                    <?php
                                                    echo $user_shipping_city;
                                                    ?>
                                                </span>
                                                <?php
                                            }
                                            }
                                            ?>        
                                        </p>
                                    </td>
                                </tr>
                                <!--end shipping city-->
                                
                                 <!--start shipping state-->
                                <tr>
                                    <td>
                                        <p style="color:#FD9A00;font-size:12px;font-weight: 600;margin:0;padding:0;text-align: left;text-indent: 0;">
                                            <?php
                                            if ($user_shipping_state != null && $user_shipping_state != '') {
                                            $fieldName = 'shipState';
                                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_check == 'true') {
                                                $fieldName = 'shipStateLb';
                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size,label_field_font_color,label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <span class="spaceRight25" style="font-size: <?php echo $label_field_font_size; ?>px;color:#D23100; ?>"><?php echo $label_field_content . " :" ?> </span>
                                                <?php
                                                $fieldName = 'shipState';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <span style="text-align: center;font-weight:500;font-size:<?php echo $label_field_font_size; ?>px; color:<?php echo $label_field_font_color; ?>;">
                                                    <?php
                                                    echo $user_shipping_state;
                                                    ?>
                                                </span>
                                                <?php
                                            }
                                            }
                                            ?>        
                                        </p>
                                    </td>
                                </tr>
                                <!--end shipping state-->
                                 <!--start shipping mob no-->
                                <tr>
                                    <td>
                                        <p style="color:#FD9A00;font-size:12px;font-weight: 600;margin:0;padding:0;text-align: left;text-indent: 0;">
                                            <?php
                                            if ($user_shipping_mob_no != null && $user_shipping_mob_no != '') {
                                            $fieldName = 'shipMobNo';
                                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_check == 'true') {
                                                $fieldName = 'shipMobNoLb';
                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size,label_field_font_color,label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <span class="spaceRight25" style="font-size: <?php echo $label_field_font_size; ?>px;color:#D23100;"><?php echo $label_field_content . " :" ?> </span>
                                                <?php
                                                $fieldName = 'shipMobNo';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <span style="text-align: center;font-weight:500;font-size:<?php echo $label_field_font_size; ?>px; color:<?php echo $label_field_font_color; ?>;">
                                                    <?php
                                                    echo $user_shipping_mob_no;
                                                    ?>
                                                </span>
                                                <?php
                                            }
                                            }
                                            ?>        
                                        </p>
                                    </td>
                                </tr>
                                <!--end shipping state mob no-->
                                <!--start shipping GST no-->
                                <tr>
                                    <td>
                                        <p style="color:#FD9A00;font-size:12px;font-weight: 600;margin:0;padding:0;text-align: left;text-indent: 0;">
                                            <?php
                                            if ($user_shipping_gst_no != null && $user_shipping_gst_no != '') {
                                            $fieldName = 'shipGstNo';
                                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_check == 'true') {
                                                $fieldName = 'shipGstNoLb';
                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size,label_field_font_color,label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <span class="spaceRight25" style="font-size: <?php echo $label_field_font_size; ?>px;color:#D23100;"><?php echo $label_field_content . " :" ?> </span>
                                                <?php
                                                $fieldName = 'shipGstNo';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <span style="text-align: center;font-weight:500;font-size:<?php echo $label_field_font_size; ?>px; color:<?php echo $label_field_font_color; ?>;">
                                                    <?php
                                                    echo $user_shipping_gst_no;
                                                    ?>
                                                </span>
                                                <?php
                                            }
                                            }
                                            ?>        
                                        </p>
                                    </td>
                                </tr>
                                <!--end shipping state GST no-->
                                <!--start shipping PAN no-->
                                <tr>
                                    <td>
                                        <p style="color:#FD9A00;font-size:12px;font-weight: 600;margin:0;padding:0;text-align: left;text-indent: 0;">
                                            <?php
                                            if ($user_shipping_pan_no != null && $user_shipping_pan_no != '') {
                                            $fieldName = 'shipPanNo';
                                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_check == 'true') {
                                                $fieldName = 'shipPanNoLb';
                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size,label_field_font_color,label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <span class="spaceRight25" style="font-size: <?php echo $label_field_font_size; ?>px;color:#D23100;"><?php echo $label_field_content . " :" ?> </span>
                                                <?php
                                                $fieldName = 'shipPanNo';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <span style="text-align: center;font-weight:500;font-size:<?php echo $label_field_font_size; ?>px; color:<?php echo $label_field_font_color; ?>;">
                                                    <?php
                                                    echo $user_shipping_pan_no;
                                                    ?>
                                                </span>
                                                <?php
                                            }
                                            }
                                            ?>        
                                        </p>
                                    </td>
                                </tr>
                                <!--end shipping state PAN no-->
                         
                        </table>
                    </td>
                    <?php
                    $showFinancialYrQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'showFinancialYr' and omly_own_id = '$sessionOwnerId'";
                    $resShowFinancialYr = mysqli_query($conn, $showFinancialYrQuery);
                    $rowShowFinancialYr = mysqli_fetch_array($resShowFinancialYr);
                    $showFinancialYr = $rowShowFinancialYr['omly_value'];
                    ?>
                <td class="customerDetails" style="margin-right:24px;">
                    <table style="margin-left: 1px;">
                        <!--***************************************************************-->
                        <tr>
                            <td align="right" style="width:170px;" >
                                <?php
//                                $fieldName = 'invNoTitle';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,"
//                                                . "label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' "
//                                                . "and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $invNoFont = $invNoTitle_size;
                                if ($invNoTitle_check == 'true') {
//                                    $fieldName = 'invNoTitleLb';
//                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,"
//                                                    . "label_field_font_color,label_field_check FROM labels "
//                                                    . "WHERE label_own_id = '$sessionOwnerId' and "
//                                                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <span style="width:170px;  color:#D23100;font-weight: bold;font-size:<?php echo $invNoTitleLb_size; ?>px;"><?php echo $invNoTitleLb_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:120px;">
                                    <span style="font-size: <?php echo $invNoFont; ?>px; ">
                                        <?php
                                          if ($nepaliDateIndicator == 'YES') {
                                                $date_components = explode('-', $invoiceDate);
                                                $date_d = $date_components[2];
                                                $selMnth = $date_components[1];
                                                $date_y = $date_components[0];
                                                $DOBDate = $nepali_date->validate_en($date_y, $selMnth, $date_d);
                                                if ($DOBDate != '1' || $DOBDate != 'TRUE') {
                                                    $date_ne = $nepali_date->get_eng_date($date_y, $selMnth, $date_d);
                                                    $invoiceDate = $date_ne[d] . '-' . $date_ne[m] . '-' . $date_ne[y];
                                                }
                                                $invFinMMStart = date('n', strtotime($invoiceDate));
                                                if ($invFinMMStart <= 3) {
                                                    $invFinYYStart = $date_y - 1;
                                                    $invFinYYEnd = $date_y;
                                                } else {
                                                    $invFinYYStart = $date_y;
                                                    $invFinYYEnd = $date_y + 1;
                                                }
                                                if ($showFinancialYr == 'YES') {
                                                    echo $slPrPreInvoiceNo . '/' . $slPrInvoiceNo . '/' . substr($invFinYYStart, -2) . '-' . substr($invFinYYEnd, -2);
                                                } else {
                                                    echo $slPrPreInvoiceNo . '/' . $slPrInvoiceNo;
                                                }
                                            } else {
                                        $invFinMMStart = date('n', strtotime($invoiceDate));
                                        if ($invFinMMStart <= 3) {
                                            $invFinYYStart = date('y', strtotime($invoiceDate)) - 1;
                                            $invFinYYEnd = date('y', strtotime($invoiceDate));
                                        } else {
                                            $invFinYYStart = date('y', strtotime($invoiceDate));
                                            $invFinYYEnd = date('y', strtotime($invoiceDate)) + 1;
                                        }
                                        
                                        if($showFinancialYr == 'YES' || $showFinancialYr == '' || $showFinancialYr == 'NULL'){
                                            echo $slPrPreInvoiceNo . '/' . $slPrInvoiceNo . '/' . $invFinYYStart . '-' . $invFinYYEnd;
                                        }else{
                                            echo $slPrPreInvoiceNo . '/' . $slPrInvoiceNo;
                                        }
                                            }
                                        ?>
                                    </span>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <!-------------------------------------->

                        <tr>
                            <td align="right" style="width:170px;" >
                                <?php
//                    $fieldName = 'dateTitle';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $dateFontSize = $dateTitle_size;
                                if ($dateTitle_check == 'true') {
//                        $fieldName = 'dateTitleLb';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <span style="width:170px;  color:#D23100;font-weight: bold;font-size:<?php echo $dateTitleLb_size; ?>px;"><?php echo $dateTitleLb_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:100px;">
                                    <span style="font-size: <?php echo $dateFontSize; ?>px; ">
                                        <?php
                                                  if ($nepaliDateIndicator == 'YES') {
                                        $day_en = substr($invoiceDate, 0, 2);
                                        $selMnth = substr($invoiceDate, 3, -5);  

                                        if (preg_match("/^(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)$/", $selMnth)) {
                                        // Convert the month abbreviation to its numeric representation (zero-padded)
                                            $selMnth = date('m', strtotime($selMnth));
                                        }
                                        $year_en = substr($invoiceDate, -4);
                                         //
                                        $girviDOBDate = $nepali_date->validate_en($year_en, $selMnth, $day_en);  
                                        if($girviDOBDate != '1' || $girviDOBDate != 'TRUE'){
                                            $girviDOBArray = explode(' ', $invoiceDate);
                                                  if(is_numeric($girviDOBArray[1])){
                                            $girviDOBMnth = $nepali_date->get_nepali_month($girviDOBArray[1]);
                                            }
                                             if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                echo $girviDOBArray[0] . '-' . $girviDOBArray[1] . '-' . $girviDOBArray[2];
                                            }else{
                                                echo $girviDOBArray[0] . ' ' . $girviDOBMnth . ' ' . $girviDOBArray[2];
                                            }

                                        }
                                        else{
                                        $date_ne = $nepali_date->get_nepali_date($year_en, $selMnth, $day_en);
                                        if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                echo  $date_ne[d].'-'.$date_ne[m].'-'.$date_ne[y];
                                            }else{
                                                echo  $date_ne[d].'-'.$date_ne[M].'-'.$date_ne[y];
                                            }
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
                                    </span>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <!--------------------------------------------->
                        <tr>
                            <td align="right" style="width:170px;" >
                                <?php
//                    $fieldName = 'dueDateTitle';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $duedateFont = $dueDateTitle_size;
                                if ($label_field_check == 'true' && $dueDate != '' && $dueDate != NULL) {
//                        $fieldName = 'dueDateTitleLb';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <span style="width:170px;  color:#D23100;font-weight: bold;font-size:<?php echo $dueDateTitleLb_size; ?>px;"><?php echo $dueDateTitleLb_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:100px;">
                                    <span style="font-size: <?php echo $duedateFont; ?>px; ">
                                        <?php echo strtoupper($dueDate); ?>
                                    </span>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <!--------------------------------------------->
                        <tr>
                            <td align="right" style="width:170px;" >
                                <?php
                                parse_str(getTableValues("SELECT user_fname as name ,user_lname as surname FROM user where user_owner_id='$sessionOwnerId' "
                                                . "and user_id='$sttr_staff_id' and user_type='STAFF'"));
                                $sale_staffname = $name . ' ' . $surname;
//                    $fieldName = 'firmTin';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                    $firmtinFont = $firmTin_size;
                                if ($staffname_check == 'true' && $sale_staffname != ' ') {
//                        $fieldName = 'firmTinLb';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <span style="width:170px;  color:#D23100;font-weight: bold;font-size:<?php echo $staffNameLb_size; ?>px;"><?php echo $staffNameLb_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:100px;">
                                    <span style="font-size: <?php echo $duedateFont; ?>px; ">                        
                                        <?php echo $sale_staffname; ?>
                                    </span>  
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td align="right" style="width:170px;" >
                                <?php
//                    $fieldName = 'firmTin';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $firmtinFont = $firmTin_size;
                                if ($firm_tin_no != NULL && $firmTin_check == 'true') {
//                        $fieldName = 'firmTinLb';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <span style="width:170px;  color:#D23100;font-weight: bold;font-size:<?php echo $firmTinLb_size; ?>px;"><?php echo $firmTinLb_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:100px;">
                                    <span style="font-size: <?php echo $duedateFont; ?>px; ">                        
                                        <?php echo $firm_tin_no; ?>
                                    </span>  
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <!--------------------------------------------->
                        <tr>
                            <td align="right" style="width:170px;" >
                                <?php
//                    $fieldName = 'firmPan';
//                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $firmPan = $firmPan_size;
                                if ($firm_pan_no != '' && $firmPan_check == 'true') {
//                        $fieldName = 'firmPanLb';
//                        $label_field_font_size = '';
//                        $label_field_font_color = '';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <span style="width:170px;  color:#D23100;font-weight: bold;font-size:<?php echo $firmPanLb_size; ?>px;"><?php echo $firmPanLb_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:100px;">
                                    <span style="font-size: <?php echo $firmPan; ?>px; ">   
                                        <?php echo $firm_pan_no; ?>
                                    </span>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                              <tr>
                                <td align="right" style="width:170px;" >
                                    <?php
                        parse_str(getTableValues("SELECT sttr_counter_name FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' and sttr_user_id ='$userId' and sttr_pre_invoice_no ='$slPrPreInvoiceNo' and sttr_invoice_no= '$slPrInvoiceNo' "));
//                      $fieldName = 'countername';
//                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    $countername = $countername_size;
                                    if ($sttr_counter_name != '' && $countername_check == 'true') {
//                        $fieldName = 'counternameLb';
//                        $label_field_font_size = '';
//                        $label_field_font_color = '';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <span style="width:170px;  color:#D23100;font-weight: bold;font-size:<?php echo $counternameLb_size; ?>px;"><?php echo $counternameLb_content; ?>
                                        </span>
                                    </td>
                                    <td align="center" >
                                        <span>&nbsp;:&nbsp;</span>
                                    </td>
                                    <td align="left" style="width:100px;">
                                        <span style="font-size: <?php echo $countername; ?>px; ">   
                                            <?php echo $sttr_counter_name; ?>
                                        </span>
                                    </td>
                                    <?php
                                }
                                ?>
                            </tr>
                        <tr>
                            <td align="right" style="width:249px;" >
                                <?php
                                parse_str(getTableValues( "SELECT sttr_utin_id FROM stock_transaction where sttr_owner_id='$sessionOwnerId' AND sttr_user_id ='$userId' ORDER BY sttr_id DESC"));
                                     parse_str(getTableValues("SELECT utin_sales_person_name FROM user_transaction_invoice where utin_owner_id='$sessionOwnerId' AND utin_user_id ='$userId' AND utin_pre_invoice_no='$slPrPreInvoiceNo' AND utin_invoice_no='$slPrInvoiceNo' AND"
                                            . " utin_status NOT IN('DELETED') ORDER BY utin_id ASC"));
                                $fieldName = 'salesPersonName';
                                parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($utin_sales_person_name != NULL && $label_field_check == 'true') {
                                    $fieldName = 'salesPersonNameLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <span style="width:170px;  color:#D23100;font-weight: bold;font-size:<?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?>
                                    </span>
                                </td>
                                <td align="center" >
                                    <span>&nbsp;:&nbsp;</span>
                                </td>
                                <td align="left" style="width:100px;">
                                    <span style="font-size: <?php echo $firmPan; ?>px; ">   
                                        <?php echo $utin_sales_person_name; ?>
                                    </span>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>
<?php
if ($showSecPagePrint == 'YES') {?>
</thead>
<?php }?>  
<!--************* END YUVRAJ ADDTHIS CODE FOR SET LAYOUT INVOICE @YUVRAJ 17082022 -->

