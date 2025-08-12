<?php
/*
 * **************************************************************************************
 * @tutorial: SCHEME EMI INVOICE CUSTOMISATION FORM @SIMRAN:25APR2023
 * **************************************************************************************

 * @FileName: omSchemecufm.php
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
$labelType = 'schemeInvoice';
//
if ($_SESSION['sessionProdName'] == 'OMRETL') {
    $makingLabel = "LABOUR";
} else {
    $makingLabel = "MAKING";
}
//
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div align="left" class="main_link_orange">
                CUSTOMIZED SCHEME EMI INVOICE PANEL
            </div>
            <div align="right" valign="bottom" class="printVisibilityHidden">
                <div id="cuMessDisplayDiv"></div>
            </div>
        </div>   
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table border="0" cellspacing="0" cellpadding="0" valign="top" align="center" width="100%">
                <tr>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;"> TOP MARGIN (MM):</div>
                        <?php
                        $count = 138;
                        $fieldName = 'topSchemeMargin';
                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="Top Margin" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 139;
                    $fieldName = 'leftSchemeMargin';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft20" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;"> LEFT MARGIN:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="Left Margin" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
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
                                $fieldName = 'formSchemeBorderCheck';
                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td align="left" valign="middle" title="CLICK TO SELECT FORM BORDER !">
                                    <input type="checkbox" id="fontCheckId<?php echo $count; ?>" name="fontCheckId<?php echo $count; ?>" class="checkbox" <?php
                                    if ($label_field_check == 'true')
                                        echo 'checked';
                                    else
                                        echo '';
                                    ?>
                                           onclick="labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');"/>                   
                                </td>
                            </tr>
                        </table>
                    </td>
                    <!-- START CODE TO ADD OPTION FOR BORDER SIZE @AUTHOR:MADHUREE-05AUGUST2021 -->
                    <td align="right" title="Click to select form border size!" width="10%">
                        <table border="0" cellspacing="0" cellpadding="0" valign="top" align="right" width="100%">
                            <tr>
                                <td align="left" class="ff_calibri fs_12 fw_b grey_dark" >
                                    <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> BORDER SIZE:</div>
                                    <?php
                                    $count = 66;
                                    $fieldName = 'formBorderSize';
//                                echo '$fieldName='.$fieldName;
                                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>

                                    <input id="formBorderSize<?php echo $count; ?>" title="Border Size (Thickness)" name="formBorderSize<?php echo $count; ?>" placeholder="Size#Colorcode" 
                                           value="<?php echo $label_field_content; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                       labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                                   }"
                                           onblur="labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                                           spellcheck="false" type="text"
                                           class="input_border_grey_center" size="10" maxlength="9" style="width:100%;height:30px;border-radius:3px!important;"/>
                                </td> 
                            </tr>
                        </table>
                    </td>
                    <!-- END CODE TO ADD OPTION FOR BORDER SIZE @AUTHOR:MADHUREE-05AUGUST2021 -->
                    <?php
                    $count = 141;
                    $fieldName = 'formSchemeWidth';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" width="10%">
                        <table border="0" cellspacing="0" cellpadding="0" valign="top" align="left" width="100%">
                            <tr>
                                <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft20">
                                    <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> FORM WIDTH:</div>

                                    <input id="formWidth<?php echo $count; ?>" name="formWidth<?php echo $count; ?>" placeholder="Form Width(MM)" 
                                           value="<?php echo $label_field_content; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                       labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                                   }"
                                           onblur="labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                                           spellcheck="false" type="text"
                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                           class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                                </td> 
                            </tr>
                        </table>
                    </td>
                    <?php
                    $count = 142;
                    $fieldName = 'headerImtTop';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> HEADER (MM):</div>

                        <input id="fieldValue<?php echo $count; ?>" title="Select Here header margin from top !" name="fieldValue<?php echo $count; ?>" placeholder="HEADER TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="8" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 143;
                    $fieldName = 'custImtDetTop';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%" title="Select Here customer dtails margin from top !">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> CUST DET TOP:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="CUST DET TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="8" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 144;
                    $fieldName = 'itemImtDetTop';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%" title="Select Here customer dtails margin from top !">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;">ITEM DET TOP:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="ITEM DET TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
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
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark " width="20%" title="Select Here terms and conditions margin from top !">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> TERMS & CONDITIONS:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="TERMS TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
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
                                           labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
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
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;">VAL ADDED BY</div>
                        <div class="selectStyled"  title="CHANGE HERE VALUE ADDED BY OPTION!">
                            <select id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" class="textLabel14CalibriReq"
                                    onchange="labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');">
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
                            <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> ALL FONT SIZE :</div>

                            <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="FONT SIZE" value="<?php echo $label_field_content; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                               }"
                                   onblur="labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                                   spellcheck="false" type="text" class="input_border_grey" size="6" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                        </td>
                        <?php
                        $count = 146;
                        $fieldName = 'fontFamilyValue';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>
                        <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%" title="CHANGE HERE FONT STYLE!">
                            <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> FONT FAMILY/STYLE :</div>

                            <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="FONT STYLE" value="<?php echo $label_field_content; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                               }"
                                   onblur="labelsFormScheme('<?php echo $count; ?>', 'schemeInvoice', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                                   spellcheck="false" type="text" class="input_border_grey" size="12" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                        </td>
                    <?php } ?>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="col-md-12">
            <table border="0" cellpadding="0" align="center" width="100%" cellspacing="0"  style="border:1px solid #c1c1c1;margin-top:5px;">
                <tr> 
                    <?php
                    $fieldName = 'topSchemeMargin';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $topMargin = $label_field_content;

                    $fieldName = 'leftSchemeMargin';
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

                            $fieldName = 'formSchemeWidth';
                            $label_field_content = '';
                            parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $formWidthInMM = $label_field_content;

                            $fieldName = 'formSchemeBorderCheck';
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
                                            <tr style="background: #fff9e8;">
                                                <td align="right" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="right">
                                                        <tr valign="top">
                                                            <?php
                                                            $count = 148;
                                                            $fieldName = 'firmSchemeLeftLogoCheck';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = ''; // $label_field_font_weight ADD THIS VARIABLE FOR RETAIL INVOICCE @YUVRAJ 06102022 
                                                            $label_field_content = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));  // $label_field_font_weight ADD THIS VARIABLE FOR RETAIL INVOICCE @YUVRAJ 06102022 
                                                            ?>
                                                            <td align="left" valign="top">
                                                                <a style="cursor: pointer;"
                                                                   onClick="openSchemeFormDiv('firmSchemeLeftLogoDiv', '<?php echo $count; ?>', 'NO', 'LEFT LOGO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                       '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schemeInvoice', '6', '36');">
                                                                    <!--// $label_field_font_weight ADD THIS VARIABLE FOR RETAIL INVOICCE @YUVRAJ 06102022--> 

                                                                    <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                                                                        <img src="<?php echo $documentRoot; ?>/images/CustomizeInvoiceLogo.png"  alt="" class="form8-logo-image" />
                                                                    <?php } else { ?>
                                                                        <img src="<?php echo $documentRoot; ?>/images/ring128.png"  alt="" class="form8-logo-image" />
                                                                    <?php } ?> 
                                                                </a>
                                                                <div id="firmSchemeLeftLogoDiv"></div>
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
                                                                        $fieldName = 'firmSchemeFormHeader';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';  // $label_field_font_weight ADD THIS VARIABLE FOR RETAIL INVOICCE @YUVRAJ 06102022 
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));  // $label_field_font_weight ADD THIS VARIABLE FOR RETAIL INVOICCE @YUVRAJ 06102022 
                                                                        ?>
                                                                        <td valign="middle" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeFormDiv('firmSchemeFormHeaderDiv', '<?php echo $count; ?>', 'NO', 'FORM HEADER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInvoice', '7', '-30');"><b>SHUBH LABH</b></div>
                                                                            <div id="firmSchemeFormHeaderDiv"></div>
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
                                                                        $fieldName = 'firmSchemeLongName';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeFormDiv('firmSchemeLongNameDiv', '<?php echo $count; ?>', 'NO', 'FIRM NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInvoice', '7', '-30');">                                                                        
                                                                                     <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                                                                                    OM RETAIL STORE
                                                                                <?php } else { ?>
                                                                                    OMUNIM JEWELLERS
                                                                                <?php } ?>
                                                                            </div>
                                                                            <input id="commonId" name="commonId" type="hidden" />
                                                                            <input id="panelName" name="panelName" type="hidden" value="" />
                                                                            <div id="firmSchemeLongNameDiv"></div>
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
                                                                        $fieldName = 'firmSchemeDesc';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="right"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeFormDiv('firmSchemeDescDiv', '<?php echo $count; ?>', 'NO', 'SHOP NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInvoice', '6', '36');">
                                                                                     <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                                                                                    GROCERY AND MOBILE MEGA STORE
                                                                                <?php } else { ?>
                                                                                    GOLD AND SILVER MONEY LENDER SHOP
                                                                                <?php } ?>
                                                                            </div>
                                                                            <div id="firmSchemeDescDiv"></div>
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
                                                                        $fieldName = 'firmschemeRegNoLabel';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeFormDiv('firmschemeRegNoLbDiv', '<?php echo $count; ?>', 'YES', 'FIRM REGISTRATION NUMBER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?>:</div>
                                                                            <div id="firmschemeRegNoLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 85;
                                                                        $fieldName = 'firmschemeRegNo';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeFormDiv('firmschemeRegNoDiv', '<?php echo $count; ?>', 'NO', 'REGISTRATION NUMBER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schmeInvoice', '6', '36');">C/3512/2009</div>
                                                                            <div id="firmschemeRegNoDiv"></div>
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
                                                                        $fieldName = 'firmschemeAddress';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeFormDiv('firmschemeAddressDiv', '<?php echo $count; ?>', 'NO', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schemeInvoice', '6', '36');"><b>ADDRESS :</b> P.NO.8, LAXMI ROAD,PUNE,MAHARASHTRA,INDIA,411028</div>
                                                                            <div id="firmschemeAddressDiv"></div>
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
                                                                        $fieldName = 'firmschemePhoneLb';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeFormDiv('firmschemePhoneLbDiv', '<?php echo $count; ?>', 'YES', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?>:</div>
                                                                            <div id="firmschemePhoneLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 86;
                                                                        $fieldName = 'firmschemePhone';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeFormDiv('firmschemePhoneDiv', '<?php echo $count; ?>', 'NO', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schemeInvoice', '6', '36');"> 8551958585</div>
                                                                            <div id="firmschemePhoneDiv"></div>
                                                                        </td>
                                                                        <!--#################################################################################################-->
                                                                        <!--################## START LAYOUT SETTING CODE RETAIL @YUVRAJ @06082022 #########################-->
                                                                        <!--#################################################################################################-->
                                                                        <td valign="middle" align="center" class="padLeft5">
                                                                            <div> 
                                                                                <?php
                                                                                $count = 502;
                                                                                $label_field_content = '';
                                                                                $fieldName = 'firmschemeEmaillb';
                                                                                $label_field_font_size = '';
                                                                                $label_field_font_color = '';
                                                                                $label_field_font_weight = '';
                                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                                ?>
                                                                                <span onClick="openSchemeFormDiv('firmschemeEmaillbDiv', '<?php echo $count; ?>', 'YES', 'EMAIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');"
                                                                                      class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;cursor: pointer;">
                                                                                          <?php
                                                                                          if ($label_field_content == '') {
                                                                                              ?> <b>EMAIL</b> 
                                                                                        <?php
                                                                                    } else {
                                                                                        echo $label_field_content;
                                                                                    }
                                                                                    ?> : 
                                                                                </span> 
                                                                                <?php
                                                                                $count = 88;
                                                                                $fieldName = 'firmschemeEmail';
                                                                                $label_field_font_size = '';
                                                                                $label_field_font_color = '';
                                                                                $label_field_font_weight = '';
                                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                                ?>
                                                                                <span  onClick="openSchemeFormDiv('firmschemeEmailDiv', '<?php echo $count; ?>', 'NO', 'EMAIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schemeInvoice', '6', '36');"
                                                                                       class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;cursor: pointer;"> info@omunim.com </span> 

                                                                            </div>
                                                                            <div id="firmschemeEmailDiv"></div>
                                                                            <div id="firmschemeEmaillbDiv"></div>
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
                                                            $fieldName = 'firmSchemeRightLogoCheck';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" valign="top">
                                                                <a style="cursor: pointer;"
                                                                   onClick="openSchemeFormDiv('firmSchemeRightLogoDiv', '<?php echo $count; ?>', 'NO', 'RIGHT LOGO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                       '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'schemeInvoice', '6', '36');">                                                        
                                                                       <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                                                                        <img src="<?php echo $documentRoot; ?>/images/CustomizeInvoiceLogo.png"  alt="" class="form8-logo-image" />
                                                                    <?php } else { ?>
                                                                        <img src="<?php echo $documentRoot; ?>/images/ring128.png"  alt="" class="form8-logo-image" />
                                                                    <?php } ?>                                                        
                                                                </a>
                                                                <div id="firmSchemeRightLogoDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php //echo "CustomizeInvoiceLogo"; ?>
                                <tr>
                                    <td align="left" valign="top" colspan="2">
                                        <table border="0" cellpadding="0" width="100%" cellspacing="0" align="left">
                                            <tr valign="top" style="background: #e9f7f5;">
                                                <td align="left" valign="top" class="padLeft5">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                        <tr valign="top">
                                                            <?php
                                                            $count = 90;
                                                            $fieldName = 'firmschemeTinLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeFormDiv('firmschemeTinDiv', '<?php echo $count; ?>', 'YES', 'GSTIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?>&nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="firmschemeTinDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 91;
                                                            $fieldName = 'firmschemeTin';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeFormDiv('firmschemeTinDiv', '<?php echo $count; ?>', 'NO', 'TIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">1234567890</div>
                                                                <div id="firmschemeTinDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="right" valign="top" class="paddingRight5">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="right">
                                                        <tr valign="top">
                                                            <?php
                                                            $count = 92;
                                                            $fieldName = 'firmschemePanLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeFormDiv('firmImtPanLbDiv', '<?php echo $count; ?>', 'YES', 'PAN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="firmImtPanLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 93;
                                                            $fieldName = 'firmschemePan';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeFormDiv('firmschemePanDiv', '<?php echo $count; ?>', 'NO', 'PAN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">AAECM5678D</div>
                                                                <div id="firmschemePanDiv"></div>
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
                                        $fieldName = 'custschemeDetTop';
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
                                                                        $fieldName = 'userschemeNameLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openSchemeFormDiv('userschemeNameLbDiv', '<?php echo $count; ?>', 'YES', 'NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userschemeNameLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 95;
                                                                        $fieldName = 'userschemeName';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>" >

                                                                            <div onClick="openSchemeFormDiv('userschemeNameDiv', '<?php echo $count; ?>', 'NO', 'NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">VIRENDRA SEHWAG</div>
                                                                            <div id="userschemeNameDiv"></div>
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
                                                                        $fieldName = 'userschemeAddressLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeFormDiv('userschemeAddressLbDiv', '<?php echo $count; ?>', 'YES', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userschemeAddressLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 97;
                                                                        $fieldName = 'userschemeAddress';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeFormDiv('userschemeAddressDiv', '<?php echo $count; ?>', 'NO', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">3-5-125/42 KRISHANA NAGAR</div>
                                                                            <div id="userschemeAddressDiv"></div>
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
                                                                        $fieldName = 'userschemeContactLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openSchemeFormDiv('userschemeContactLbDiv', '<?php echo $count; ?>', 'YES', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userschemeContactLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 99;
                                                                        $fieldName = 'userschemeContact';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSchemeFormDiv('userschemeContactDiv', '<?php echo $count; ?>', 'NO', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                                                8551958585
                                                                            </div>
                                                                            <div id="userschemeContactDiv"></div>
                                                                        </td>
                                                                    </tr>

                                                                    <!--START INVOICE NO -->
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 185;
                                                                        $fieldName = 'userschemeNoLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openSchemeFormDiv('userschemeNoLbDiv', '<?php echo $count; ?>', 'YES', 'SCHEME NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userschemeNoLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 186;
                                                                        $fieldName = 'userschemeNo';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeFormDiv('userschemeNoDiv', '<?php echo $count; ?>', 'NO', 'SCHEME NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                                                ABC00A1
                                                                            </div>
                                                                            <div id="userschemeNoDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                    <!--END INVOICE NO -->
                                                                    <!--START PAN NO -->
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 185;
                                                                        $fieldName = 'userschemePanLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openSchemeFormDiv('userschemePanLbDiv', '<?php echo $count; ?>', 'YES', 'SCHEME NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userschemePanLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 186;
                                                                        $fieldName = 'userschemePan';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeFormDiv('userschemePanDiv', '<?php echo $count; ?>', 'NO', 'SCHEME NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                                                H0P3FRT6U
                                                                            </div>
                                                                            <div id="userschemePanDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                    <!--END INVOICE NO -->
                                                                    <!--START PAN NO -->
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 185;
                                                                        $fieldName = 'userschemeGstLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openSchemeFormDiv('userschemeGstLbDiv', '<?php echo $count; ?>', 'YES', 'SCHEME NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userschemeGstLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 186;
                                                                        $fieldName = 'userschemeGst';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openSchemeFormDiv('userschemeGstDiv', '<?php echo $count; ?>', 'NO', 'SCHEME NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                                                A0KHBFDR35GH003
                                                                            </div>
                                                                            <div id="userschemeGstDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                    <!--END INVOICE NO -->
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="right" valign="top" class="paddingRight5">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="right">                                                        
                                                        <tr>
                                                            <?php
                                                            $count = 130;
                                                            $fieldName = 'SchemeSerialNoLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeFormDiv('SchemeSerialNoLbDiv', '<?php echo $count; ?>', 'YES', 'SERIAL NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="SchemeSerialNoLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 131;
                                                            $fieldName = 'SchemeSerialNo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeFormDiv('SchemeSerialNoDiv', '<?php echo $count; ?>', 'NO', 'SERIAL NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInvoice', '6', '36');">
                                                                         <?php echo "2324 / 01"; ?>
                                                                </div>
                                                                <div id="SchemeSerialNoDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            $count = 130;
                                                            $fieldName = 'SchemeReceiptNoLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeFormDiv('SchemeReceiptNoLbDiv', '<?php echo $count; ?>', 'YES', 'SERIAL NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="SchemeReceiptNoLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 131;
                                                            $fieldName = 'SchemeReceiptNo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeFormDiv('SchemeReceiptNoDiv', '<?php echo $count; ?>', 'NO', 'RECEIPT NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInvoice', '6', '36');">
                                                                         <?php echo "01"; ?>
                                                                </div>
                                                                <div id="SchemeReceiptNoDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            $count = 100;
                                                            $fieldName = 'SchemeStartDateLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeFormDiv('SchemeStartDateLbDiv', '<?php echo $count; ?>', 'YES', 'START DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="SchemeStartDateLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 101;
                                                            $fieldName = 'SchemeStartDate';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeFormDiv('SchemeStartDateDiv', '<?php echo $count; ?>', 'NO', 'START DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInvoice', '6', '36');">
                                                                         <?php echo strtoupper(date('d M Y')); ?>
                                                                </div>
                                                                <div id="SchemeStartDateDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            $count = 102;
                                                            $fieldName = 'SchemeEndDateLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeFormDiv('SchemeEndDateLbDiv', '<?php echo $count; ?>', 'YES', 'END DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="SchemeEndDateLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 103;
                                                            $fieldName = 'SchemeEndDate';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeFormDiv('SchemeEndDateDiv', '<?php echo $count; ?>', 'NO', 'END DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                                         <?php echo strtoupper(date('d M Y')); ?>
                                                                </div>
                                                                <div id="SchemeEndDateDiv"></div>                                                 
                                                            </td>
                                                        </tr>
                                                        <!-- Start Code Adding Staff Name On Invoice @Author:Vinod25-07-2023 -->
                                                        <tr>
                                                            <?php
                                                            $count = 102;
                                                            $fieldName = 'SchemeStaffNameLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeFormDiv('SchemeStaffNameLbDiv', '<?php echo $count; ?>', 'YES', 'STAFF NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="SchemeStaffNameLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 103;
                                                            $fieldName = 'SchemeStaffName';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openSchemeFormDiv('SchemeStaffNameDiv', '<?php echo $count; ?>', 'NO', 'Rahul Sharma', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                                         <?php echo 'Rahul Sharma'; ?>
                                                                </div>
                                                                <div id="SchemeStaffNameDiv"></div>                                                 
                                                            </td>
                                                        </tr>  
                                                        <!-- End Code Adding Staff Name On Invoice @Author:Vinod25-07-2023 -->
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="14">
                                        <?php
                                        $fieldName = 'itemschemeDetTop';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        $itemDetTopVal = $label_field_content;
                                        ?>
                                        <table border="0" cellpadding="0" width="100%" cellspacing="1" style="border:1px solid #c1c1c1;padding-top:<?php echo $itemDetTopVal; ?>mm">
                                            <tr> 
                                                <?php
                                                $count = 104;
                                                $fieldName = 'invschemeTitle';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td valign="middle" align="right" colspan="6"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                    <div onClick="openSchemeFormDiv('invschemeTitleDiv', '<?php echo $count; ?>', 'NO', 'SCHEME INVOICE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInvoice', '6', '36');"><?php echo $label_field_content; ?></div>
                                                    <div id="invschemeTitleDiv"></div>
                                                </td>
                                                <?php
                                                $count = 109;
                                                $fieldName = 'invschemeInstallmentsTitle';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                $label_field_content = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td valign="middle" align="left" colspan="1"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                    <div onClick="openSchemeFormDiv('invschemeInstallmentsTitleDiv', '<?php echo $count; ?>', 'YES', 'INSTALLMENTS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInvoice', '6', '36');">&nbsp;<?php echo $label_field_content; ?></div>
                                                    <div id="invschemeInstallmentsTitleDiv"></div>
                                                </td>
                                                
                                            </tr>

                                            <tr class="bc_color_darkblue" height="20px">
                                                <?php
                                                $count = 105;
                                                $fieldName = 'schemeEmiNoLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="5%">
                                                    <div onClick="openSchemeFormDiv('schemeEmiNoLbDiv', '<?php echo $count; ?>', 'YES', 'EMI NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "EMI NO";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemeEmiNoLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 106;
                                                $fieldName = 'schemepaidDateLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="10%">
                                                    <div onClick="openSchemeFormDiv('schemepaidDateLbDiv', '<?php echo $count; ?>', 'YES', 'DATE OF PAYMENT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "DATE OF PAYMENT";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemepaidDateLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 107;
                                                $fieldName = 'schemeReceiptNoLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="8%">
                                                    <div onClick="openSchemeFormDiv('schemeReceiptNoLbDiv', '<?php echo $count; ?>', 'YES', 'RECEIPT NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "RECEIPT NO";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemeReceiptNoLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 109;
                                                $fieldName = 'schemeEmiMonthLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="8%">
                                                    <div onClick="openSchemeFormDiv('schemeEmiMonthLbDiv', '<?php echo $count; ?>', 'YES', 'EMI MONTH', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "EMI MONTH";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemeEmiMonthLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 107;
                                                $fieldName = 'schemePaidAmtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="8%">
                                                    <div onClick="openSchemeFormDiv('schemePaidAmtLbDiv', '<?php echo $count; ?>', 'YES', 'PAID AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "INST.AMT";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemePaidAmtLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 107;
                                                $fieldName = 'schemeCumulativeAmtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="12%">
                                                    <div onClick="openSchemeFormDiv('schemeCumulativeAmtLbDiv', '<?php echo $count; ?>', 'YES', 'CUMMMULATIVE AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "CUMULATIVE AMOUNT";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemeCumulativeAmtLbDiv"></div>
                                                </td>

                                                <!-- Added Cumulative Weight Colume name for showing data  -->

                                                <?php
                                                $count = 107;
                                                $fieldName = 'schemeCumulativeWtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="12%">
                                                    <div onClick="openSchemeFormDiv('schemeCumulativeAmtLbDiv', '<?php echo $count; ?>', 'YES', 'CUMULATIVE WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "CUMULATIVE WT";
                                                             } else {
                                                                 
                                                                echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemeCumulativeAmtLbDiv"></div>
                                                </td>

                                                <!-- End Code CUMULATIVE WT for column -->
                                                <!--Scheme GST Amt Label This is added by CHETAN 22052023 -->
                                                <?php
                                                $count = 107;
                                                $fieldName = 'schemeGSTAmtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="12%">
                                                    <div onClick="openSchemeFormDiv('schemeGSTAmtLbDiv', '<?php echo $count; ?>', 'YES', 'GST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "GST AMT";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemeGSTAmtLbDiv"></div>
                                                </td>       
                                                <!-- End Code --> 
                                                 <!--Scheme GST Amt Label This is added by CHETAN 22052023 -->
                                                <?php
                                                $count = 107;
                                                $fieldName = 'schemeGroupNameLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="12%">
                                                    <div onClick="openSchemeFormDiv('schemeGroupNameLbDiv', '<?php echo $count; ?>', 'YES', 'GROUP NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "GST AMT";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemeGroupNameLbDiv"></div>
                                                </td>       
                                                <!-- End Code --> 
                                                 <!--Scheme GST Amt Label This is added by CHETAN 22052023 -->
                                                <?php
                                                $count = 107;
                                                $fieldName = 'schemeTokenNoLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="12%">
                                                    <div onClick="openSchemeFormDiv('schemeTokenNoLbDiv', '<?php echo $count; ?>', 'YES', 'TOKEN NUMBER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "GST AMT";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemeTokenNoLbDiv"></div>
                                                </td>       
                                                <!-- End Code --> 
                                                <!-- Taxable Amount Charges -->
                                                <?php
                                                $count = 107;
                                                $fieldName = 'schemeTaxableAmtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="12%">
                                                    <div onClick="openSchemeFormDiv('schemeTaxableAmtLbDiv', '<?php echo $count; ?>', 'YES', 'TAXABLE AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "TAXABLE AMT";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemeTaxableAmtLbDiv"></div>
                                                </td>                                        
                                                <!-- End Code --> 
                                                <!-- Accumulated Metal Rate Amt -->
                                                <?php
                                                $count = 107;
                                                $fieldName = 'schemeAccMetalRateLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="12%">
                                                    <div onClick="openSchemeFormDiv('schemeAccMetalRateLbDiv', '<?php echo $count; ?>', 'YES', 'METAL RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "METAL RATE";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemeAccMetalRateLbDiv"></div>
                                                </td>                                        
                                                <!-- Ends here -->
                                                <!-- Accumulated Metal wt -->
                                                <?php
                                                $count = 107;
                                                $fieldName = 'schemeAccMetalWtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="12%">
                                                    <div onClick="openSchemeFormDiv('schemeAccMetalWtLbDiv', '<?php echo $count; ?>', 'YES', 'METAL WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "METAL WT";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemeAccMetalWtLbDiv"></div>
                                                </td>                                        
                                                <!-- Ends here -->
                                                <?php
                                                $count = 107;
                                                $fieldName = 'schemePaymentLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="12%">
                                                    <div onClick="openSchemeFormDiv('schemePaymentLbDiv', '<?php echo $count; ?>', 'YES', 'PAYMENT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "PAYMENT";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemePaymentLbDiv"></div>
                                                </td>    
                                                <?php
                                                $count = 107;
                                                $fieldName = 'schemeStatusLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="12%">
                                                    <div onClick="openSchemeFormDiv('schemeStatusLbDiv', '<?php echo $count; ?>', 'YES', 'STATUS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "STATUS";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="schemeStatusLbDiv"></div>
                                                </td>           

                                            </tr>
                                            <tr class="marginTop10">                                 
                                                <?php
                                                $count = 114;
                                                $fieldName = 'schemeEmiNo';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemeEmiNoDiv', '<?php echo $count; ?>', 'NO', 'EMI NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        1
                                                    </div>
                                                    <div id="schemeEmiNoDiv"></div>   
                                                </td>       
                                                <?php
                                                $count = 114;
                                                $fieldName = 'schemepaidDate';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemepaidDateDiv', '<?php echo $count; ?>', 'NO', 'DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        31 MAR 2023
                                                    </div>
                                                    <div id="schemepaidDateDiv"></div>   
                                                </td>      
                                                <?php
                                                $count = 114;
                                                $fieldName = 'schemeReceiptNo';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemeReceiptNoDiv', '<?php echo $count; ?>', 'NO', 'RECEIPT NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        1
                                                    </div>
                                                    <div id="schemeReceiptNoDiv"></div>   
                                                </td> 
                                                <?php
                                                $count = 114;
                                                $fieldName = 'schemeEmiMonth';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemeEmiMonthDiv', '<?php echo $count; ?>', 'NO', 'PAID AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        JAN
                                                    </div>
                                                    <div id="schemeEmiMonthDiv"></div>   
                                                </td> 
                                                <?php
                                                $count = 114;
                                                $fieldName = 'schemePaidAmt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemePaidAmtDiv', '<?php echo $count; ?>', 'NO', 'PAID AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        1000
                                                    </div>
                                                    <div id="schemePaidAmtDiv"></div>   
                                                </td>   

                                                <?php
                                                $count = 114;
                                                $fieldName = 'schemeCumulativeAmt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemeCumulativeAmtDiv', '<?php echo $count; ?>', 'NO', 'CUMULATIVE AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        1000
                                                    </div>
                                                    <div id="schemeCumulativeAmtDiv"></div>   
                                                </td>      
                                                
                                                <!-- Added Cumulative Weight Row for showing data  -->
                                                 <?php
                                                $count = 114;
                                                $fieldName = 'schemeCumulativeWt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemeCumulativeAmtDiv', '<?php echo $count; ?>', 'NO', 'CUMULATIVE AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        0.87
                                                    </div>
                                                    <div id="schemeCumulativeAmtDiv"></div>   
                                                </td> 

                                                <!-- END OF CODE FOR Cumulative Weight-->



                                                <!-- GST AMT -->
                                                <?php
                                                $count = 114;
                                                $fieldName = 'schemeGSTAmt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemeGSTAmtDiv', '<?php echo $count; ?>', 'NO', 'GST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        29.13
                                                    </div>
                                                    <div id="schemeGSTAmtDiv"></div>   
                                                </td>  
                                                <!-- Ends here -->
                                                 <?php
                                                $count = 114;
                                                $fieldName = 'schemeGroupName';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemeGroupNameDiv', '<?php echo $count; ?>', 'NO', 'GROUP NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        AB
                                                    </div>
                                                    <div id="schemeGroupNameDiv"></div>   
                                                </td>  
                                                <!-- Ends here -->
                                                 <?php
                                                $count = 114;
                                                $fieldName = 'schemeTokenNo';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemeTokenNoDiv', '<?php echo $count; ?>', 'NO', 'TOKEN NUMBER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        ABCD
                                                    </div>
                                                    <div id="schemeTokenNoDiv"></div>   
                                                </td>  
                                                <!-- Ends here -->
                                                <!-- Taxable Amt -->
                                                <?php
                                                $count = 114;
                                                $fieldName = 'schemeTaxableAmt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemeTaxableAmtDiv', '<?php echo $count; ?>', 'NO', 'TAXABLE AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        970.87
                                                    </div>
                                                    <div id="schemeTaxableAmtDiv"></div>   
                                                </td>  
                                                <!-- Ends Here Taxable Amt -->
                                                <!-- Metal rate Amt -->
                                                <?php
                                                $count = 114;
                                                $fieldName = 'schemeAccMetalRate';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemeAccMetalRateDiv', '<?php echo $count; ?>', 'NO', 'METAL RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        50000
                                                    </div>
                                                    <div id="schemeAccMetalRateDiv"></div>   
                                                </td>  
                                                <!-- Ends Here metal rate amt -->

                                                <!-- Metal wt  -->
                                                <?php
                                                $count = 114;
                                                $fieldName = 'schemeAccMetalWt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemeAccMetalWtDiv', '<?php echo $count; ?>', 'NO', 'METAL WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        0.184
                                                    </div>
                                                    <div id="schemeAccMetalWtDiv"></div>   
                                                </td>  
                                                <!-- Ends Here Taxable Amt -->

                                                <?php
                                                $count = 114;
                                                $fieldName = 'schemePayment';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemePaymentDiv', '<?php echo $count; ?>', 'NO', 'PAYEMENT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        CASH
                                                    </div>
                                                    <div id="schemePaymentDiv"></div>   
                                                </td>   
                                                <?php
                                                $count = 114;
                                                $fieldName = 'schemeStatus';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemeStatusDiv', '<?php echo $count; ?>', 'NO', 'PAYEMENT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        OnTime Paid
                                                    </div>
                                                    <div id="schemeStatusDiv"></div>   
                                                </td> 
                                            </tr>
                                            <tr>
                                                <?php
                                                $count = 114;
                                                $fieldName = 'totalAmt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td colspan="2" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemetotalAmtDiv', '<?php echo $count; ?>', 'YES', 'Total ', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        <?php echo $label_field_content; ?> :
                                                    </div>
                                                    <div id="schemetotalAmtDiv"></div>   
                                                </td>
                                                <td></td>
                                                <?php
                                                $count = 114;
                                                $fieldName = 'totalEmiAmt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openSchemeFormDiv('schemetotalEmiAmtDiv', '<?php echo $count; ?>', 'NO', 'Total Emi Amt', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                                        1000
                                                    </div>
                                                    <div id="schemetotalEmiAmtDiv"></div>   
                                                </td>
                                            </tr>
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
                    <tr align="center">  
                        <?php
                        $count = 107;
                        $fieldName = 'schemeMetalLb';
                        $label_field_font_size = '';
                        $label_field_font_color = '';
                        $label_field_font_weight = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>
                        <td colspan="8" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="50%">
                            <div onClick="openSchemeFormDiv('schemeMetalLbDiv', '<?php echo $count; ?>', 'YES', 'NET METAL WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                            '<?php echo $label_field_font_color; ?>','<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                   <?php  echo "NET WT"; ?>
                            </div>
                            <div id="schemeMetalLbDiv"></div>
                        </td>  
                         <?php
                            $count = 114;
                            $fieldName = 'schemeMetalStatus';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            $label_field_font_weight = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <td colspan="6" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                            <div onClick="openSchemeFormDiv('schemeMetalStatusDiv', '<?php echo $count; ?>', 'NO', 'NET METAL WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>','<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                               10.000 GM
                                            </div>
                                            <div id="schemeMetalStatusDiv"></div>   
                            </td> 
                    </tr> 
                    <!-- Displaying total cash details after emi payment -->
                    <tr align="center">  
                        <?php
                        $count = 107;
                        $fieldName = 'schemeCashDtlLb';
                        $label_field_font_size = '';
                        $label_field_font_color = '';
                        $label_field_font_weight = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>
                        <td colspan="8" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="50%">
                            <div onClick="openSchemeFormDiv('schemeCashDtlLbDiv', '<?php echo $count; ?>', 'YES', 'CASH DETAILS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                            '<?php echo $label_field_font_color; ?>','<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                   <?php  echo "CASH DETAILS"; ?>
                            </div>
                            <div id="schemeCashDtlLbDiv"></div>
                        </td>  
                         <?php
                            $count = 114;
                            $fieldName = 'schemeCashDetails';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            $label_field_font_weight = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <td colspan="6" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                            <div onClick="openSchemeFormDiv('schemeCashDetailsDiv', '<?php echo $count; ?>', 'NO', 'CASH DETAILS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>','<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'schemeInvoice', '6', '36');">
                                               10000
                                            </div>
                                            <div id="schemeCashDetailsDiv"></div>   
                            </td> 
                    </tr>                    
                    <!-- end code -->                    
                                <tr>
                                    <td colspan="14" class="padLeft5">
                                        <?php
                                        $fieldName = 'termsschemeTop';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        $termsDetTopVal = $label_field_content;
                                        ?>
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top:<?php echo $termsDetTopVal; ?>mm">
                                            <?php
                                            $count = 65;
                                            $fieldName = 'tncschemeLb';
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
                                                    <div onClick="openSchemeFormDiv('tncschemeLbDiv', '<?php echo $count; ?>', 'YES', 'Terms and Conditions', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_tncLabelTemp; ?></div>
                                                    <div id="tncschemeLbDiv"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="14">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <?php
                                                        $count = 66;
                                                        $fieldName = 'tncScheme';
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
                                                                          onClick="openSchemeFormDiv('tncSchemeDiv', '<?php echo $count; ?>', 'YES', 'Terms & Conditions', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                              '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-270', '10');"
                                                                          style="text-align:left;width:750px;height:<?php $height ?>px"><?php
                                                                              if (($label_field_contentTemp) != '')
                                                                                  echo $label_field_contentTemp;
                                                                              else
                                                                                  echo 'content';
                                                                              ?></textarea>  
                                                                <div id="tncSchemeDiv"></div>
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
                                                $fieldName = 'authSchemeCustSignLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="125px">
                                                    <div onClick="openSchemeFormDiv('authSchemeCustSignLbDiv', '<?php echo $count; ?>', 'YES', 'Authorized Signatory', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInvoice', '-60', '340');">
                                                             <?php
                                                             if ($label_field_content == '' || $label_field_content == NULL) {
                                                                 echo 'Authorized Signatory';
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?></div>
                                                    <div id="authSchemeCustSignLbDiv"></div>
                                                </td>

                                                <?php
                                                $count = 135;
                                                $fieldName = 'authSchemeSignLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="125px">
                                                    <div onClick="openSchemeFormDiv('authSchemeSignLbDiv', '<?php echo $count; ?>', 'YES', 'Authorized Signatory', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'schemeInvoice', '-60', '340');">
                                                             <?php
                                                             if ($label_field_content == '' || $label_field_content == NULL) {
                                                                 echo 'Authorized Signatory';
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?></div>
                                                    <div id="authSchemeSignLbDiv"></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <?php
                                    $count = 136;
                                    $fieldName = 'footerSchemeLb';
                                    $label_field_content = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" class="cursor ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" colspan="<?php echo $colspan; ?>">
                                        <div onClick="openSchemeFormDiv('footerSchemeLbDiv', '<?php echo $count; ?>', 'YES', 'Thank You For Your Business !', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '45', 'schemeInvoice', '-60', '36');"><?php echo $label_field_content; ?></div>
                                        <div id="footerSchemeLbDiv"></div>
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
</div>

