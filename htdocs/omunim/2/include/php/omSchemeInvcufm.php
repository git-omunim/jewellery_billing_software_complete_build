<?php
/*
 * **************************************************************************************
 * @tutorial: SCHEME INVOICE CUSTOMISATION FORM @SIMRAN:25APR2023
 * **************************************************************************************

 * @FileName: omSchemeInvcufm.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
include 'system/omsachsc.php';
include 'ommprspc.php';
include_once 'ommpfndv.php';
include_once 'ommpnmwd.php';
require_once 'ommpincr.php';
include_once 'ommpfunc.php';
?>
<?php
$sessionOwnerId = $_SESSION['sessionOwnerId'];
//Start Code To Select FirmId
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
//End Code To Select FirmId
//$qSelCustId = "SELECT slpr_cust_id,slpr_firm_id FROM salepurchase where slpr_owner_id='$sessionOwnerId' and slpr_cust_pre_invoice_no='$slPrPreInvoiceNo' and "
//            . "slpr_cust_invoice_no='$slPrInvoiceNo' and slpr_firm_id IN ($strFrmId) order by slpr_since asc LIMIT 0, 1";
//$resCustId = mysqli_query($conn, $qSelCustId);
//$rowCustId = mysqli_fetch_array($resCustId, MYSQLI_ASSOC);
//$custId = $rowCustId['slpr_cust_id'];
//$firmId = $rowCustId['slpr_firm_id'];

parse_str(getTableValues("SELECT firm_id,firm_name,firm_long_name,firm_reg_no,firm_address,firm_phone_details,firm_email,firm_desc,firm_pan_no,firm_tin_no,firm_left_thumb_ftype,firm_right_thumb_ftype FROM firm where firm_own_id='$sessionOwnerId' and firm_id='1'"));
//************************Start code for change data from customer to user Author@:SANT12JAN16***************************************

parse_str(getTableValues("SELECT user_fname,user_lname,user_add,user_city,user_pincode,user_state,user_country,user_phone,user_mobile FROM user where user_owner_id='$sessionOwnerId' and user_id='$custId'"));

//************************Start code for change data from customer to user Author@:SANT12JAN16***************************************
$counter = 1;

$totalItemsQTY;
$totalValuation;
$goldTotalWeight = 0;
$silverTotalWeight = 0;
$goldTotalWeightType = 'GM';
$silverTotalWeightType = 'GM';
$visibility = 'hidden';
$labelType = 'schemeInv';
//
if ($_SESSION['sessionProdName'] == 'OMRETL') {
    $makingLabel = "LABOUR";
} else {
    $makingLabel = "MAKING";
}
//
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div align="left" class="main_link_orange">
                CUSTOMIZED SCHEME INVOICE PANEL
            </div>
            <div align="right" valign="bottom" class="printVisibilityHidden">
                <div id="cuMessDisplayDiv"></div>
            </div>
        </div>   
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table border="0" cellspacing="0" cellpadding="0" valign="top" align="center" width="100%">
                <tr>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;"> TOP MARGIN (MM):</div>
                        <?php
                        $count = 138;
                        $fieldName = 'topSchemeInvMargin';
                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="Top Margin" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 139;
                    $fieldName = 'leftSchemeInvMargin';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft20" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;"> LEFT MARGIN:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="Left Margin" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>

                    <td align="left" title="Click to select form border !" width="14%">
                        <table border="0" cellspacing="0" cellpadding="0" valign="top" align="center">
                            <tr>
                                <td align="left" class="ff_calibri fs_12 fw_b grey_dark" >
                                    <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> FORM BORDER:</div>
                                </td>
                                <?php
                                $count = 140;
                                $fieldName = 'formSchemeInvBorderCheck';
                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td align="left" valign="middle" title="CLICK TO SELECT FORM BORDER !">
                                    <input type="checkbox" id="fontCheckId<?php echo $count; ?>" name="fontCheckId<?php echo $count; ?>" class="checkbox" <?php
                                    if ($label_field_check == 'true')
                                        echo 'checked';
                                    else
                                        echo '';
                                    ?>
                                           onclick="labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');"/>                   
                                </td>
                            </tr>
                        </table>
                    </td>
                    <!-- START CODE TO ADD OPTION FOR BORDER SIZE @AUTHOR:MADHUREE-05AUGUST2021 -->
                    <td align="right" title="Click to select form border size!" width="10%">
                        <table border="0" cellspacing="0" cellpadding="0" valign="top" align="right" width="100%">
                            <tr>
                                <td align="left" class="ff_calibri fs_12 fw_b grey_dark" title="Click to select form border size!" width="10%">
                                    <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;">BORDER SIZE:</div>

                                    <?php
                                    $count = 66;
                                    $fieldName = 'formBorderSize';
//                                echo '$fieldName='.$fieldName;
                                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>

                                    <input id="formBorderSize<?php echo $count; ?>" name="formBorderSize<?php echo $count; ?>" placeholder="Size#Colorcode" 
                                           value="<?php echo $label_field_content; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                       labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                                   }"
                                           onblur="labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                                           spellcheck="false" type="text"
                                           class="input_border_grey_center" size="10" maxlength="9" style="width:100%;height:30px;border-radius:3px!important;"/>
                                </td> 
                            </tr>
                        </table>
                    </td>
                    <!-- END CODE TO ADD OPTION FOR BORDER SIZE @AUTHOR:MADHUREE-05AUGUST2021 -->
                    <?php
                    $count = 141;
                    $fieldName = 'formSchemeInvWidth';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" width="10%">
                        <table border="0" cellspacing="0" cellpadding="0" valign="top" align="left" width="100%">
                            <tr>
                                <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" >
                                    <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;">FORM WIDTH:</div>

                                    <input id="formWidth<?php echo $count; ?>" name="formWidth<?php echo $count; ?>" placeholder="Form Width(MM)" 
                                           value="<?php echo $label_field_content; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                       labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                                   }"
                                           onblur="labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                                           spellcheck="false" type="text"
                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                           class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                                </td> 
                            </tr>
                        </table>
                    </td>
                    <?php
                    $count = 142;
                    $fieldName = 'headerSchemeInvTop';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;">HEADER (MM):</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="HEADER TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="8" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 143;
                    $fieldName = 'custSchemeInvDetTop';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%" title="Select Here customer dtails margin from top !">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;">CUST DET TOP:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="CUST DET TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="8" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 144;
                    $fieldName = 'itemSchemeInvDetTop';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%" title="Select Here customer dtails margin from top !">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> ITEM DET TOP:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="ITEM DET TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="8" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-12">
            <table border="0" cellspacing="0" cellpadding="0" valign="top" align="center" width="100%" >
                <tr>
                    <?php
                    $count = 145;
                    $fieldName = 'termsImtTop';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark" width="20%" title="Select Here terms and conditions margin from top !">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> TERMS & CONDITIONS:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="TERMS TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="8" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 146;
                    $fieldName = 'roughImtEstTitle';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="20%" title="CHANGE HERE ROUGH ESTIMATED INVOICE TITLE!">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> ROUGH ESTIMATE TITLE:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="ROUGH ESTIMATE" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text" class="input_border_grey" size="15" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 147;
                    $fieldName = 'slPrImtValueAddedOp';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $slPrValueAddedOp = $label_field_content;
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> VAL ADDED BY</div>
                        <div class="selectStyled" title="CHANGE HERE VALUE ADDED BY OPTION!">
                            <select id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" class="textLabel14CalibriReq"
                                    onchange="labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');">
                                        <?php
                                        if ($slPrValueAddedOp != '') {
                                            $valueAddBy = array(byAmount, byWeight);
                                            for ($i = 0; $i <= 1; $i++)
                                                if ($valueAddBy[$i] == $slPrValueAddedOp)
                                                    $optionValueAddSel[$i] = 'selected';
                                        }
                                        ?>
                                <option value="byAmount" <?php echo $optionValueAddSel[0]; ?>>By Amount</option>
                                <option value="byWeight" <?php echo $optionValueAddSel[1]; ?>>By weight</option>
                            </select>
                        </div>
                    </td>
                    <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                        <?php
                        $count = 146;
                        $fieldName = 'fontSizeValue';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>
                        <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%" title="CHANGE HERE ALL INVOICE FONT SIZE!">
                            <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;">ALL FONT SIZE :</div>
                        </td>
                        <td align="left" class="frm-lbl-lnk-grey">
                            <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="FONT SIZE" value="<?php echo $label_field_content; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                               }"
                                   onblur="labelsFormSchemeInv('<?php echo $count; ?>', 'schemeInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                                   spellcheck="false" type="text" class="input_border_grey" size="6" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                        </td>                   
                    <?php } ?>
                </tr>
            </table>
        </div>
        <div class="col-md-12">
            <table border="0" cellpadding="0" align="center" width="100%" cellspacing="0"  style="border:1px solid #c1c1c1;margin-top:5px;">
                <tr> 
                    <?php
                    $fieldName = 'topSchemeInvMargin';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $topMargin = $label_field_content;

                    $fieldName = 'leftSchemeInvMargin';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $leftMargin = $label_field_content;
                    ?>
                    <td align="center" colspan="14" class="ff_calibri fs_14 paddingTop5">
                        <div style="margin-top:<?php echo $topMargin . 'mm'; ?>;margin-left:<?php echo $leftMargin . 'mm'; ?>">
                            <?php
                            $fieldName = 'headerImtTop';
                            $label_field_content = '';
                            parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $headerTopVal = $label_field_content;

                            $fieldName = 'formSchemeInvWidth';
                            $label_field_content = '';
                            parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $formWidthInMM = $label_field_content;

                            $fieldName = 'formSchemeInvBorderCheck';
                            $label_field_content = '';
                            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($label_field_check == 'true') {
                                $border = '#000000 1px solid';
                            } else {
                                $border = '#000000 0px solid';
                            }
                            if ($formWidthInMM == '') {
                                $class = 'A4-Inv-Table';
                            } else {
                                $class = '';
                            }
                            ?>
                            <table border="0" cellpadding="0" align="center" width="100%" cellspacing="0" class="<?php echo $class; ?>" 
                                   style="border: <?php echo $border; ?>;width:<?php echo $formWidthInMM . 'mm'; ?>;padding-top:<?php echo $headerTopVal; ?>mm">
                                <tr> 
                                    <td align="left" colspan="14">
                                        <table border="0" cellpadding="0" width="100%" cellspacing="0">
                                            <tr  style="background: #fff9e8;">
                                                <td align="right" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="right">
                                                        <tr valign="top">
                                                            <?php
                                                            $count = 148;
                                                            $fieldName = 'firmSchemeInvLeftLogoCheck';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = ''; // $label_field_font_weight ADD THIS VARIABLE FOR RETAIL INVOICCE @YUVRAJ 06102022 
                                                            $label_field_content = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));  // $label_field_font_weight ADD THIS VARIABLE FOR RETAIL INVOICCE @YUVRAJ 06102022 
                                                            ?>
                                                            <td align="left" valign="top">
                                                                <a style="cursor: pointer;"
                                                                   onClick="openSchemeInvFormDiv('firmSchemeInvLeftLogoDiv', '<?php echo $count; ?>', 'NO', 'LEFT LOGO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                       '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schemeInv', '6', '36');">
                                                                    <!--// $label_field_font_weight ADD THIS VARIABLE FOR RETAIL INVOICCE @YUVRAJ 06102022--> 

                                                                    <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                                                                        <img src="<?php echo $documentRoot; ?>/images/CustomizeInvoiceLogo.png"  alt="" class="form8-logo-image" />
                                                                    <?php } else { ?>
                                                                        <img src="<?php echo $documentRoot; ?>/images/ring128.png"  alt="" class="form8-logo-image" />
                                                                    <?php } ?> 
                                                                </a>
                                                                <div id="firmSchemeInvLeftLogoDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="right">
                                                    <table border="0" cellpadding="0" width="100%" cellspacing="0" align="right">
                                                        <tr> 
                                                            <td align="center" colspan="14">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                                    <tr>
                                                                        <?php
                                                                        $count = 81;
                                                                        $fieldName = 'firmSchemeInvFormHeader';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';  // $label_field_font_weight ADD THIS VARIABLE FOR RETAIL INVOICCE @YUVRAJ 06102022 
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));  // $label_field_font_weight ADD THIS VARIABLE FOR RETAIL INVOICCE @YUVRAJ 06102022 
                                                                        ?>
                                                                        <td valign="middle" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeInvFormDiv('firmSchemeInvFormHeaderDiv', '<?php echo $count; ?>', 'NO', 'FORM HEADER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInv', '7', '-30');"><b>SHUBH LABH</b></div>
                                                                            <div id="firmSchemeInvFormHeaderDiv"></div>
                                                                        </td>
                                                                    </tr>                                                  
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr> 
                                                            <td align="center" colspan="14">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                                    <tr>
                                                                        <?php
                                                                        $count = 82;
                                                                        $fieldName = 'firmSchemeInvLongName';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeInvFormDiv('firmSchemeInvLongNameDiv', '<?php echo $count; ?>', 'NO', 'FIRM NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInv', '7', '-30');">                                                                        
                                                                                     <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                                                                                    OM RETAIL STORE
                                                                                <?php } else { ?>
                                                                                    OMUNIM JEWELLERS
                                                                                <?php } ?>
                                                                            </div>
                                                                            <input id="commonId" name="commonId" type="hidden" />
                                                                            <input id="panelName" name="panelName" type="hidden" value="" />
                                                                            <div id="firmSchemeInvLongNameDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    // getCustomFormField($count, $visibility, 'NO', 'firmLongNameDiv', 'SHOP NAME', $label_field_content, $label_field_font_size, $label_field_font_color, $label_field_check, '20', $fieldName, 'SellPurchase', '', '');
                                                                    //getCustomFormField($visibility, 'NO', 'firmLongNameDiv', 'SHOP NAME', '', 'firmNameFont', 'firmNameFont', 'firmNameColor', 'firmNameCheck', 'firmDescFont', '-8', '5', '', '', $rowLabelDet['label_firm_name_font'], $rowLabelDet['label_firm_name_color'], $rowLabelDet['label_firm_name_check'], '20'); 
                                                                    //}
                                                                    ?>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr> 
                                                            <td align="center" colspan="14">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                                    <tr>
                                                                        <?php
                                                                        $count = 83;
                                                                        $fieldName = 'firmSchemeInvDesc';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="right"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeInvFormDiv('firmSchemeInvDescDiv', '<?php echo $count; ?>', 'NO', 'SHOP NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInv', '6', '36');">
                                                                                     <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                                                                                    GROCERY AND MOBILE MEGA STORE
                                                                                <?php } else { ?>
                                                                                    GOLD AND SILVER MONEY LENDER SHOP
                                                                                <?php } ?>
                                                                            </div>
                                                                            <div id="firmSchemeInvDescDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align = "center" colspan = "14">
                                                                <table border = "0" cellpadding = "0" cellspacing = "0" align = "center">
                                                                    <tr>
                                                                        <?php
                                                                        $count = 84;
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        $fieldName = 'firmschemeInvRegNoLabel';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeInvFormDiv('firmschemeInvRegNoLbDiv', '<?php echo $count; ?>', 'YES', 'FIRM REGISTRATION NUMBER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?>:</div>
                                                                            <div id="firmschemeInvRegNoLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 85;
                                                                        $fieldName = 'firmschemeInvRegNo';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeInvFormDiv('firmschemeInvRegNoDiv', '<?php echo $count; ?>', 'NO', 'REGISTRATION NUMBER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schmeInvoice', '6', '36');">C/3512/2009</div>
                                                                            <div id="firmschemeInvRegNoDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr> 
                                                            <td align="center">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                                    <tr>
                                                                        <?php
                                                                        $count = 86;
                                                                        $fieldName = 'firmschemeInvAddress';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeInvFormDiv('firmschemeInvAddressDiv', '<?php echo $count; ?>', 'NO', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schemeInv', '6', '36');"><b>ADDRESS :</b> P.NO.8, LAXMI ROAD,PUNE,MAHARASHTRA,INDIA,411028</div>
                                                                            <div id="firmschemeInvAddressDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                                    <tr>
                                                                        <?php
                                                                        $count = 84;
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        $fieldName = 'firmschemeInvPhoneLb';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeInvFormDiv('firmschemeInvPhoneLbDiv', '<?php echo $count; ?>', 'YES', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?>:</div>
                                                                            <div id="firmschemeInvPhoneLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 86;
                                                                        $fieldName = 'firmschemeInvPhone';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeInvFormDiv('firmschemeInvPhoneDiv', '<?php echo $count; ?>', 'NO', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schemeInv', '6', '36');"><b>PHONE :</b> 8551958585</div>
                                                                            <div id="firmschemeInvPhoneDiv"></div>
                                                                        </td>
                                                                        <!--#################################################################################################-->
                                                                        <!--################## START LAYOUT SETTING CODE RETAIL @YUVRAJ @06082022 #########################-->
                                                                        <!--#################################################################################################-->
                                                                        <td valign="middle" align="center" class="padLeft5">
                                                                            <div> 
                                                                                <?php
                                                                                $count = 502;
                                                                                $label_field_content = '';
                                                                                $fieldName = 'firmschemeInvEmaillb';
                                                                                $label_field_font_size = '';
                                                                                $label_field_font_color = '';
                                                                                $label_field_font_weight = '';
                                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                                ?>
                                                                                <span onClick="openSchemeInvFormDiv('firmschemeInvEmaillbDiv', '<?php echo $count; ?>', 'YES', 'EMAIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');"
                                                                                      class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;cursor: pointer;">
                                                                                          <?php
                                                                                          if ($label_field_content == '') {
                                                                                              ?><b> EMAIL </b>
                                                                                        <?php
                                                                                    } else {
                                                                                        echo $label_field_content;
                                                                                    }
                                                                                    ?> : 
                                                                                </span> 
                                                                                <?php
                                                                                $count = 88;
                                                                                $fieldName = 'firmschemeInvEmail';
                                                                                $label_field_font_size = '';
                                                                                $label_field_font_color = '';
                                                                                $label_field_font_weight = '';
                                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                                ?>
                                                                                <span  onClick="openSchemeInvFormDiv('firmschemeInvEmailDiv', '<?php echo $count; ?>', 'NO', 'EMAIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schemeInv', '6', '36');"
                                                                                       class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;cursor: pointer;"> info@omunim.com </span> 

                                                                            </div>
                                                                            <div id="firmschemeInvEmailDiv"></div>
                                                                            <div id="firmschemeInvEmaillbDiv"></div>
                                                                        </td>
                                                                        <!--#################################################################################################-->
                                                                        <!--################## END LAYOUT SETTING CODE RETAIL @YUVRAJ @06082022 #########################-->
                                                                        <!--#################################################################################################-->                                                 
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="left" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top">
                                                        <tr valign="top">
                                                            <?php
                                                            $count = 89;
                                                            $fieldName = 'firmSchemeInvRightLogoCheck';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" valign="top">
                                                                <a style="cursor: pointer;"
                                                                   onClick="openSchemeInvFormDiv('firmSchemeInvRightLogoDiv', '<?php echo $count; ?>', 'NO', 'RIGHT LOGO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                       '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schemeInv', '6', '36');">                                                        
                                                                       <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                                                                        <img src="<?php echo $documentRoot; ?>/images/CustomizeInvoiceLogo.png"  alt="" class="form8-logo-image" />
                                                                    <?php } else { ?>
                                                                        <img src="<?php echo $documentRoot; ?>/images/ring128.png"  alt="" class="form8-logo-image" />
                                                                    <?php } ?>                                                        
                                                                </a>
                                                                <div id="firmSchemeInvRightLogoDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php //echo "CustomizeInvoiceLogo"; ?>
                                <tr  style="background: #e9f7f5;">
                                    <td align="left" valign="top" colspan="2">
                                        <table border="0" cellpadding="0" width="100%" cellspacing="0" align="left">
                                            <tr valign="top">
                                                <td align="left" valign="top" class="padLeft5">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                        <tr valign="top">
                                                            <?php
                                                            $count = 90;
                                                            $fieldName = 'firmschemeInvTinLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeInvFormDiv('firmschemeInvTinDiv', '<?php echo $count; ?>', 'YES', 'GSTTIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?>&nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="firmschemeInvTinDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 91;
                                                            $fieldName = 'firmschemeInvTin';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeInvFormDiv('firmschemeInvTinDiv', '<?php echo $count; ?>', 'NO', 'GSTIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">1234567890</div>
                                                                <div id="firmschemeInvTinDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="right" valign="top" class="paddingRight5">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="right">
                                                        <tr valign="top">
                                                            <?php
                                                            $count = 92;
                                                            $fieldName = 'firmschemeInvPanLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeInvFormDiv('firmschemeInvPanLbDiv', '<?php echo $count; ?>', 'YES', 'PAN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="firmschemeInvPanLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 93;
                                                            $fieldName = 'firmschemeInvPan';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeInvFormDiv('firmschemeInvPanDiv', '<?php echo $count; ?>', 'NO', 'PAN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">AAECM5678D</div>
                                                                <div id="firmschemeInvPanDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="14">
                                        <div class="hrPaleGrey"></div>
                                    </td>
                                </tr>
                                <tr> 
                                    <td align="left" colspan="14" class="padLeft5">
                                        <?php
                                        $fieldName = 'custschemeInvDetTop';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        $custDetTopVal = $label_field_content;
                                        ?>
                                        <table border="0" cellpadding="0" width="100%" cellspacing="0" style="padding-top:<?php echo $custDetTopVal; ?>mm">
                                            <tr>
                                                <td align="left" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left"> 
                                                        <tr> 
                                                            <td align="left" valign="top" colspan='2'>
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 94;
                                                                        $fieldName = 'userschemeInvNameLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvNameLbDiv', '<?php echo $count; ?>', 'YES', 'NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userschemeInvNameLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 95;
                                                                        $fieldName = 'userschemeInvName';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>" >

                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvNameDiv', '<?php echo $count; ?>', 'NO', 'NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">VIRENDRA SEHWAG</div>
                                                                            <div id="userschemeInvNameDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>

                                                        <tr> 
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 96;
                                                                        $fieldName = 'userschemeInvAddressLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvAddressLbDiv', '<?php echo $count; ?>', 'YES', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userschemeInvAddressLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 97;
                                                                        $fieldName = 'userschemeInvAddress';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvAddressDiv', '<?php echo $count; ?>', 'NO', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">3-5-125/42 KRISHANA NAGAR</div>
                                                                            <div id="userschemeInvAddressDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 98;
                                                                        $fieldName = 'userschemeInvContactLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvContactLbDiv', '<?php echo $count; ?>', 'YES', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userschemeInvContactLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 99;
                                                                        $fieldName = 'userschemeInvContact';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvContactDiv', '<?php echo $count; ?>', 'NO', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">
                                                                                8551958585
                                                                            </div>
                                                                            <div id="userschemeInvContactDiv"></div>
                                                                        </td>
                                                                    </tr>

                                                                    <!--START INVOICE NO -->
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 185;
                                                                        $fieldName = 'userschemeInvNoLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvNoLbDiv', '<?php echo $count; ?>', 'YES', 'SCHEME NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userschemeInvNoLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 186;
                                                                        $fieldName = 'userschemeInvNo';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvNoDiv', '<?php echo $count; ?>', 'NO', 'SCHEME NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">
                                                                                ABC00A1
                                                                            </div>
                                                                            <div id="userschemeInvNoDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                    <!--END INVOICE NO -->
                                                                    <!--START PAN NO -->
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 185;
                                                                        $fieldName = 'userschemeInvPanLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvPanLbDiv', '<?php echo $count; ?>', 'YES', 'SCHEME NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userschemeInvPanLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 186;
                                                                        $fieldName = 'userschemeInvPan';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvPanDiv', '<?php echo $count; ?>', 'NO', 'SCHEME NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">
                                                                                H0P3FRT6U
                                                                            </div>
                                                                            <div id="userschemeInvPanDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                    <!--END INVOICE NO -->
                                                                    <!--START PAN NO -->
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 185;
                                                                        $fieldName = 'userschemeInvGstLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvGstLbDiv', '<?php echo $count; ?>', 'YES', 'SCHEME NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userschemeInvGstLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 186;
                                                                        $fieldName = 'userschemeINvGst';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvGstDiv', '<?php echo $count; ?>', 'NO', 'SCHEME NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">
                                                                                A0KHBFDR35GH003
                                                                            </div>
                                                                            <div id="userschemeInvGstDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                    <!--END INVOICE NO -->
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 185;
                                                                        $fieldName = 'userschemeInvDobLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvDobLbDiv', '<?php echo $count; ?>', 'YES', 'SCHEME NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userschemeInvDobLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 186;
                                                                        $fieldName = 'userschemeInvDob';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvDobDiv', '<?php echo $count; ?>', 'NO', 'SCHEME NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">
                                                                                11 JAN 1999
                                                                            </div>
                                                                            <div id="userschemeInvDobDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 98;
                                                                        $fieldName = 'userschemeInvEmailLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvEmailLbDiv', '<?php echo $count; ?>', 'YES', 'EMAIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userschemeInvEmailLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 99;
                                                                        $fieldName = 'userschemeInvEmail';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvEmailDiv', '<?php echo $count; ?>', 'NO', 'EMAIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">
                                                                                omunim@gmail.com
                                                                            </div>
                                                                            <div id="userschemeInvEmailDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 98;
                                                                        $fieldName = 'userschemeInvBankLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvBankLbDiv', '<?php echo $count; ?>', 'YES', 'USER ACC NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userschemeInvBankLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 99;
                                                                        $fieldName = 'userschemeInvBank';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSchemeInvFormDiv('userschemeInvBankDiv', '<?php echo $count; ?>', 'NO', 'USER ACC NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">
                                                                                745672310067894
                                                                            </div>
                                                                            <div id="userschemeInvBankDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="right" valign="top" class="paddingRight5">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="right">
                                                        <tr>
                                                            <?php
                                                            $count = 100;
                                                            $fieldName = 'SchemeInvJoinDateLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeInvFormDiv('SchemeInvJoinDateLbDiv', '<?php echo $count; ?>', 'YES', 'START DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="SchemeInvJoinDateLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 101;
                                                            $fieldName = 'SchemeInvJoinDate';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeInvFormDiv('SchemeInvJoinDateDiv', '<?php echo $count; ?>', 'NO', 'START DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInv', '6', '36');">
                                                                         <?php echo om_strtoupper(date('d M Y')); ?>
                                                                </div>
                                                                <div id="SchemeInvJoinDateDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            $count = 100;
                                                            $fieldName = 'SchemeInvMaturityDateLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeInvFormDiv('SchemeInvMaturityDateLbDiv', '<?php echo $count; ?>', 'YES', 'START DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="SchemeInvMaturityDateLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 101;
                                                            $fieldName = 'SchemeInvMaturityDate';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeInvFormDiv('SchemeInvMaturityDateDiv', '<?php echo $count; ?>', 'NO', 'START DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInv', '6', '36');">
                                                                         <?php echo om_strtoupper(date('d M Y')); ?>
                                                                </div>
                                                                <div id="SchemeInvMaturityDateDiv"></div>
                                                            </td>
                                                        </tr>                                       
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="14">
                                        <?php
                                        $fieldName = 'itemschemeInvDetTop';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        $itemDetTopVal = $label_field_content;
                                        ?>
                                        <table border="0" cellpadding="0" width="100%" cellspacing="1" style="padding-top:<?php echo $itemDetTopVal; ?>mm">
                                            <tr> 
                                                <?php
                                                $count = 104;
                                                $fieldName = 'schemeInvTitle';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td valign="middle" align="center" colspan="14"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                    <div onClick="openSchemeInvFormDiv('schemeInvTitleDiv', '<?php echo $count; ?>', 'YES', 'SCHEME INVOICE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInv', '6', '36');"><?php echo $label_field_content; ?></div>
                                                    <div id="schemeInvTitleDiv"></div>
                                                </td>
                                            </tr>
<!--                                            <tr>
                                                <td align="center" colspan="14">
                                                    &nbsp;
                                                </td>
                                            </tr>-->
                                            <tr class="bc_color_darkblue" height="20px">
                                                <?php
                                                $count = 105;
                                                $fieldName = 'schemeInstalAmtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="30%">
                                                    <div onClick="openSchemeInvFormDiv('schemeInstalAmtLbDiv', '<?php echo $count; ?>', 'YES', 'INSTAL. AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "INSTAL. AMT";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemeInstalAmtLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 106;
                                                $fieldName = 'schemeInvNoOfInstalLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="30%">
                                                    <div onClick="openSchemeInvFormDiv('schemeInvNoOfInstalLb', '<?php echo $count; ?>', 'YES', 'NO OF INSTAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "NO OF INSTAL.";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemeInvNoOfInstalLb"></div>
                                                </td>
                                                <?php
                                                $count = 107;
                                                $fieldName = 'schemeInvTokenNoLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="30%">
                                                    <div onClick="openSchemeInvFormDiv('schemeInvTokenNoLbDiv', '<?php echo $count; ?>', 'YES', 'TOKEN NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "TOKEN NO";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemeInvTokenNoLbDiv"></div>
                                                </td>
                                            </tr>
                                            <tr class="marginTop10">                                 
                                                <?php
                                                $count = 114;
                                                $fieldName = 'schemeInstalAmt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeInvFormDiv('schemeInstalAmtDiv', '<?php echo $count; ?>', 'NO', 'INSTAL. AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">
                                                        1000
                                                    </div>
                                                    <div id="schemeInstalAmtDiv"></div>   
                                                </td>       
                                                <?php
                                                $count = 114;
                                                $fieldName = 'schemeInvNoOfInstal';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeInvFormDiv('schemeInvNoOfInstalDiv', '<?php echo $count; ?>', 'NO', 'NO OF INSTAL.', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">
                                                        10
                                                    </div>
                                                    <div id="schemeInvNoOfInstalDiv"></div>   
                                                </td>      
                                                <?php
                                                $count = 114;
                                                $fieldName = 'schemeInvTokenNo';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeInvFormDiv('schemeInvTokenNoDiv', '<?php echo $count; ?>', 'NO', 'TOKEN NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInv', '6', '36');">
                                                        1
                                                    </div>
                                                    <div id="schemeInvTokenNoDiv"></div>   
                                                </td>                 
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="14">
                                        &nbsp;
                                    </td>
                                </tr>
                            <!--                    <tr>
                                    <td align="center" colspan="14">
                                        &nbsp;
                                    </td>
                                </tr>-->

                                <tr>
                                    <td align="center" colspan="14">
                                        &nbsp;
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="14" class="padLeft5">
                                        <?php
                                        $fieldName = 'termsschemeInvTop';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        $termsDetTopVal = $label_field_content;
                                        ?>
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top:<?php echo $termsDetTopVal; ?>mm">
                                            <?php
                                            $count = 65;
                                            $fieldName = 'tncschemeInvLb';
                                            $label_field_font_size = '';
                                            $label_field_font_color = '';
                                            $label_field_font_weight = '';
                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                                            $label_field_tncLabelTemp = $label_field_content;
                                            $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                                            $label_field_content = trim(preg_replace('/\s\s+/', '\n', $label_field_content));
                                            ?>
                                            <tr>
                                                <td colspan="6" align="left" width="150px" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" > 
                                                    <div onClick="openSchemeInvFormDiv('tncschemeInvLbDiv', '<?php echo $count; ?>', 'YES', 'Terms and Conditions', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_tncLabelTemp; ?></div>
                                                    <div id="tncschemeInvLbDiv"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="14">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <?php
                                                        $count = 66;
                                                        $fieldName = 'tncSchemeInv';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        $label_field_font_weight = '';
                                                        $label_field_content = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        $label_field_contentTemp = $label_field_content;

                                                        $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                                                        $label_field_content = stripslashes(str_replace('\'', '', $label_field_content));
                                                        $label_field_content = trim(preg_replace('/\s\s+/', '\n', $label_field_content));
                                                        // $str = strlen($label_field_content);
                                                        // $noOfRows = ceil($str / (860 / $label_field_font_size));
                                                        // $height = $noOfRows * ($label_field_font_size + ($label_field_font_size % 10) + 2);
                                                        $noOfRows = substr_count($label_field_content, "\n") + 2;
                                                        $height = $noOfRows * ($label_field_font_size * 3);
                                                        ?>
                                                        <tr>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <textarea id="tncShemeLabel" spellcheck="false" name="tncSchemeLabel" class="cursor textarea_1 ff_calibri font_color_<?php echo $label_field_font_color; ?>" rows="<?php echo $noOfRows; ?>"
                                                                          onClick="openSchemeInvFormDiv('tncSchemeInvDiv', '<?php echo $count; ?>', 'YES', 'Terms & Conditions', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                              '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-270', '10');"
                                                                          style="text-align:left;width:750px;height:<?php $height ?>px"><?php
                                                                              if (($label_field_contentTemp) != '')
                                                                                  echo $label_field_contentTemp;
                                                                              else
                                                                                  echo 'content';
                                                                              ?></textarea>  
                                                                <div id="tncSchemeInvDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
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
                                    <td align="right" class="paddingRight5" width="200px" valign="middle">
                                        <table border="0" cellpadding="0" cellspacing="0" align="right" width="100%" valign="bottom">
                                            <tr>
                                                <?php
                                                $count = 135;
                                                $fieldName = 'authSchemeInvCustSignLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="125px">
                                                    <div onClick="openSchemeInvFormDiv('authSchemeInvCustSignLbDiv', '<?php echo $count; ?>', 'YES', 'Authorized Signatory', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInv', '-60', '340');">
                                                             <?php
                                                             if ($label_field_content == '' || $label_field_content == NULL) {
                                                                 echo 'Authorized Signatory';
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?></div>
                                                    <div id="authSchemeInvCustSignLbDiv"></div>
                                                </td>

                                                <?php
                                                $count = 135;
                                                $fieldName = 'authSchemeInvSignLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="125px">
                                                    <div onClick="openSchemeInvFormDiv('authSchemeInvSignLbDiv', '<?php echo $count; ?>', 'YES', 'Authorized Signatory', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInv', '-60', '340');">
                                                             <?php
                                                             if ($label_field_content == '' || $label_field_content == NULL) {
                                                                 echo 'Authorized Signatory';
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?></div>
                                                    <div id="authSchemeInvSignLbDiv"></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
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
                                    <?php
                                    $count = 136;
                                    $fieldName = 'footerSchemeInvLb';
                                    $label_field_content = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" class="cursor ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" colspan="<?php echo $colspan; ?>">
                                        <div onClick="openSchemeInvFormDiv('footerSchemeInvLbDiv', '<?php echo $count; ?>', 'YES', 'Thank You For Your Business !', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '45', 'schemeInv', '-60', '36');"><?php echo $label_field_content; ?></div>
                                        <div id="footerSchemeInvLbDiv"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        &nbsp;
                                    </td>
                                </tr>
                                <!--END CODE FOR DISPLAY IMAGE : AUTHOR @DARSHANA 27 OCT 2021-->
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
