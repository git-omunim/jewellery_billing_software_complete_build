<?php
/*
 * **************************************************************************************
 * @tutorial: UDHAAR MONEY DEPOSIT INVOICE CUSTOMISATION FORM @SIMRAN:15sept2023
 * **************************************************************************************

 * @FileName: omUdhaarMondepInvcufm.php
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
//        . "slpr_cust_invoice_no='$slPrInvoiceNo' and slpr_firm_id IN ($strFrmId) order by slpr_since asc LIMIT 0, 1";
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
$labelType = 'udhaarMonDepInv';
//
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div align="left" class="main_link_orange">
                CUSTOMIZED UDHAAR DEPOSIT MONEY INVOICE PANEL
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
                        $fieldName = 'topUdhaarInvMargin';
                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="Top Margin" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 139;
                    $fieldName = 'leftUdhaarInvMargin';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft20" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;"> LEFT MARGIN:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="Left Margin" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
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
                                $fieldName = 'formUdhaarInvBorderCheck';
                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td align="left" valign="middle" title="CLICK TO SELECT FORM BORDER !">
                                    <input type="checkbox" id="fontCheckId<?php echo $count; ?>" name="fontCheckId<?php echo $count; ?>" class="checkbox" <?php
                                    if ($label_field_check == 'true')
                                        echo 'checked';
                                    else
                                        echo '';
                                    ?>
                                           onclick="labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');"/>                   
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
                                                       labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                                   }"
                                           onblur="labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                                           spellcheck="false" type="text"
                                           class="input_border_grey_center" size="10" maxlength="9" style="width:100%;height:30px;border-radius:3px!important;"/>
                                </td> 
                            </tr>
                        </table>
                    </td>
                    <!-- END CODE TO ADD OPTION FOR BORDER SIZE @AUTHOR:MADHUREE-05AUGUST2021 -->
                    <?php
                    $count = 141;
                    $fieldName = 'formUdhaarInvWidth';
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
                                                       labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                                   }"
                                           onblur="labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                                           spellcheck="false" type="text"
                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                           class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                                </td> 
                            </tr>
                        </table>
                    </td>
                    <?php
                    $count = 142;
                    $fieldName = 'headerUdhaarInvTop';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;">HEADER (MM):</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="HEADER TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="8" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 143;
                    $fieldName = 'custUdhaarInvDetTop';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%" title="Select Here customer dtails margin from top !">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;">CUST DET TOP:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="CUST DET TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="8" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 144;
                    $fieldName = 'itemUdhaarInvDetTop';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%" title="Select Here customer dtails margin from top !">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> ITEM DET TOP:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="ITEM DET TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
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
                                           labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
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
                                           labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text" class="input_border_grey" size="15" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
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
                                                   labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                               }"
                                   onblur="labelsFormUdhaarInv('<?php echo $count; ?>', 'udhaarMonDepInv', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
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
                    $fieldName = 'topUdhaarInvMargin';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $topMargin = $label_field_content;

                    $fieldName = 'leftUdhaarInvMargin';
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

                            $fieldName = 'formUdhaarInvWidth';
                            $label_field_content = '';
                            parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $formWidthInMM = $label_field_content;

                            $fieldName = 'formUdhaarInvBorderCheck';
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
                                              <!--START CODE FOR ADD HEADER INFO IMG @SIMRAN:30MAR2023-->
                                <tr>
                                    <?php
                                    $count = 75;
                                    $fieldName = 'header_info_img';
                                    $label_field_content = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td valign="top">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                            <tr>
                                                <td align="center" class="cursor ff_calibri font_color_<?php echo $label_field_font_color; ?> bold font_color_blue" 
                                                    style="font-size:<?php echo $label_field_font_size; ?>px" colspan="<?php echo $colspan; ?>" width="50%">
                                                    <br/>
                                                     <div onClick="openUdhaarInvFormDiv('headerInfoImgDiv', '<?php echo $count; ?>', 'NO', 'Header Info Img!', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');"><?php echo 'Click Here to show this ad image (1280X500)'; ?></div>
                                                    <div id="headerInfoImgDiv"></div>
                                                </td>
                                                <td align="center" style="height:100px;vertical-align: middle;">
                                                    <form name="add_new_inv_image2" id="add_new_inv_image2"
                                                          enctype="multipart/form-data" method="post"
                                                          action="<?php echo $documentRootBSlash; ?>/include/php/omheaderinfoimgupload.php">
                                                        <input type="hidden" id="imageLoadOptionInv2" name="imageLoadOptionInv2" />
                                                        <input type="hidden" id="compressedImageInv2" name="compressedImageInv2" />
                                                        <input type="hidden" id="compressedImageThumbInv2" name="compressedImageThumbInv2" />
                                                        <input type="hidden" id="compressedImageSizeInv2" name="compressedImageSizeInv2" />  
                                                        <input type="hidden" id="labeltype" name="labeltype" value="<?php echo $labelType;?>" />
                                                        <div class="file_button_add_image_div" align="right" style="cursor: pointer;">
                                                            <input type="file" id="addImageAutoSub2" name="addImageAutoSub2" class="file_button_add_image"
                                                                   onclick="javascript: document.getElementById('imageLoadOptionInv').value = 'COM';"
                                                                   onchange="loadImageFileCompressAutoSub2();">
                                                            <img id="addCustomerImage" style="height: 64px;width:64px;cursor: pointer;" src="<?php echo $documentRoot; ?>/images/add-image-64.png" alt="COM">
                                                        </div>
                                                        <input type="hidden" id="fileNameInv2" name="fileNameInv2" class="lgn-txtfield-without-borderAndBackground" readonly="readonly" />
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="3">
                                        <?php parse_str(getTableValues("SELECT image_id,image_user_id,image_user_type FROM image WHERE image_snap_desc = 'SellPurchaseHeaderInfoImg'")); ?>
                                        <?php if ($image_id != '') { ?>
                                            <img width="100%" src="<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo $image_id; ?>" alt=" " class="img-responsive"/>
                                        <?php } else { ?>
                                            <img width="100%" src="<?php echo $documentRoot; ?>/images/invoice/1280x500xh.png" alt=" " class="img-responsive"/>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <!--END CODE FOR ADD HEADER INFO IMG @SIMRAN:30MAR2023-->
                                            <tr  style="background: #fff9e8;">
                                                <td align="center" valign="top" width="20%">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                        <tr valign="top">
                                                            <?php
                                                            $count = 148;
                                                            $fieldName = 'firmLeftLogoCheck';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = ''; // $label_field_font_weight ADD THIS VARIABLE FOR RETAIL INVOICCE @YUVRAJ 06102022 
                                                            $label_field_content = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));  // $label_field_font_weight ADD THIS VARIABLE FOR RETAIL INVOICCE @YUVRAJ 06102022 
                                                            ?>
                                                            <td align="left" valign="top">
                                                                <a style="cursor: pointer;"
                                                                   onClick="openUdhaarInvFormDiv('firmLeftLogoCheckDiv', '<?php echo $count; ?>', 'NO', 'LEFT LOGO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                       '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');">
                                                                    <!--// $label_field_font_weight ADD THIS VARIABLE FOR RETAIL INVOICCE @YUVRAJ 06102022--> 

                                                                    <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                                                                        <img src="<?php echo $documentRoot; ?>/images/CustomizeInvoiceLogo.png"  alt="" class="form8-logo-image" />
                                                                    <?php } else { ?>
                                                                        <img src="<?php echo $documentRoot; ?>/images/ring128.png"  alt="" class="form8-logo-image" />
                                                                    <?php } ?> 
                                                                </a>
                                                                <div id="firmLeftLogoCheckDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="center" width="60%">
                                                    <table border="0" cellpadding="0" width="100%" cellspacing="0" align="center">
                                                        <tr> 
                                                            <td align="center" colspan="14">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                                    <tr>
                                                                        <?php
                                                                        $count = 81;
                                                                        $fieldName = 'firmUdhaarInvFormHeader';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';  // $label_field_font_weight ADD THIS VARIABLE FOR RETAIL INVOICCE @YUVRAJ 06102022 
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));  // $label_field_font_weight ADD THIS VARIABLE FOR RETAIL INVOICCE @YUVRAJ 06102022 
                                                                        ?>
                                                                        <td valign="middle" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openUdhaarInvFormDiv('firmUdhaarInvFormHeaderDiv', '<?php echo $count; ?>', 'NO', 'FORM HEADER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'udhaarMonDepInv', '7', '-30');"><b>SHUBH LABH</b></div>
                                                                            <div id="firmUdhaarInvFormHeaderDiv"></div>
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
                                                                        $fieldName = 'firmUdhaarInvLongName';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openUdhaarInvFormDiv('firmUdhaarInvLongNameDiv', '<?php echo $count; ?>', 'NO', 'FIRM NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'udhaarMonDepInv', '7', '-30');">                                                                        
                                                                                     <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                                                                                    OM RETAIL STORE
                                                                                <?php } else { ?>
                                                                                    OMUNIM JEWELLERS
                                                                                <?php } ?>
                                                                            </div>
                                                                            <input id="commonId" name="commonId" type="hidden" />
                                                                            <input id="panelName" name="panelName" type="hidden" value="" />
                                                                            <div id="firmUdhaarInvLongNameDiv"></div>
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
                                                                        $fieldName = 'firmUdhaarInvDesc';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="right"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openUdhaarInvFormDiv('firmUdhaarInvDescDiv', '<?php echo $count; ?>', 'NO', 'SHOP NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'udhaarMonDepInv', '6', '36');">
                                                                                     <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                                                                                    GROCERY AND MOBILE MEGA STORE
                                                                                <?php } else { ?>
                                                                                    GOLD AND SILVER MONEY LENDER SHOP
                                                                                <?php } ?>
                                                                            </div>
                                                                            <div id="firmUdhaarInvDescDiv"></div>
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
                                                                        $fieldName = 'firmUdhaarInvRegNoLabel';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openUdhaarInvFormDiv('firmUdhaarInvRegNoLabelDiv', '<?php echo $count; ?>', 'YES', 'FIRM REGISTRATION NUMBER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?>:</div>
                                                                            <div id="firmUdhaarInvRegNoLabelDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 85;
                                                                        $fieldName = 'firmUdhaarInvRegNo';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openUdhaarInvFormDiv('firmUdhaarInvRegNoDiv', '<?php echo $count; ?>', 'NO', 'REGISTRATION NUMBER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');">C/3512/2009</div>
                                                                            <div id="firmUdhaarInvRegNoDiv"></div>
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
                                                                        $count = 84;
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        $fieldName = 'firmUdhaarInvAddressLb';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openUdhaarInvFormDiv('firmUdhaarInvAddressLbDiv', '<?php echo $count; ?>', 'YES', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?>:</div>
                                                                            <div id="firmUdhaarInvAddressLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 86;
                                                                        $fieldName = 'firmUdhaarInvAddress';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openUdhaarInvFormDiv('firmUdhaarInvAddressDiv', '<?php echo $count; ?>', 'NO', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');">P.NO.8, LAXMI ROAD,PUNE,MAHARASHTRA,INDIA,411028</div>
                                                                            <div id="firmUdhaarInvAddressDiv"></div>
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
                                                                        $fieldName = 'firmUdhaarInvPhoneLb';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openUdhaarInvFormDiv('firmUdhaarInvPhoneLbDiv', '<?php echo $count; ?>', 'YES', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?>:</div>
                                                                            <div id="firmUdhaarInvPhoneLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 86;
                                                                        $fieldName = 'firmUdhaarInvPhone';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openUdhaarInvFormDiv('firmUdhaarInvPhoneDiv', '<?php echo $count; ?>', 'NO', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');"> 8551958585</div>
                                                                            <div id="firmUdhaarInvPhoneDiv"></div>
                                                                        </td>
                                                                        <!--#################################################################################################-->
                                                                        <!--################## START LAYOUT SETTING CODE RETAIL @YUVRAJ @06082022 #########################-->
                                                                        <!--#################################################################################################-->
                                                                        <td valign="middle" align="center" class="padLeft5">
                                                                            <div> 
                                                                                <?php
                                                                                $count = 502;
                                                                                $label_field_content = '';
                                                                                $fieldName = 'firmUdhaarInvEmaillb';
                                                                                $label_field_font_size = '';
                                                                                $label_field_font_color = '';
                                                                                $label_field_font_weight = '';
                                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                                ?>
                                                                                <span onClick="openUdhaarInvFormDiv('firmUdhaarInvEmaillbDiv', '<?php echo $count; ?>', 'YES', 'EMAIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');"
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
                                                                                $fieldName = 'firmUdhaarInvEmail';
                                                                                $label_field_font_size = '';
                                                                                $label_field_font_color = '';
                                                                                $label_field_font_weight = '';
                                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                                ?>
                                                                                <span  onClick="openUdhaarInvFormDiv('firmUdhaarInvEmailDiv', '<?php echo $count; ?>', 'NO', 'EMAIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');"
                                                                                       class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;cursor: pointer;"> info@omunim.com </span> 

                                                                            </div>
                                                                            <div id="firmUdhaarInvEmailDiv"></div>
                                                                            <div id="firmUdhaarInvEmaillbDiv"></div>
                                                                        </td>
                                                                        <!--#################################################################################################-->
                                                                        <!--################## END LAYOUT SETTING CODE RETAIL @YUVRAJ @06082022 #########################-->
                                                                        <!--#################################################################################################-->                                                 
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
                                                                        $fieldName = 'firmUdhaarHeaderDetails';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openUdhaarInvFormDiv('firmUdhaarHeaderDetailsDiv', '<?php echo $count; ?>', 'NO', 'HEADER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                         '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');">PAWN TICKET FORM G(Sec 11(b)(i) and rule(12)) </div>
                                                                            <div id="firmUdhaarHeaderDetailsDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="center" valign="top" width="20%">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="center" valign="top">
                                                        <tr valign="top">
                                                            <?php
                                                            $count = 89;
                                                            $fieldName = 'firmRightLogoCheck';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" valign="top">
                                                                <a style="cursor: pointer;"
                                                                   onClick="openUdhaarInvFormDiv('firmRightLogoCheckDiv', '<?php echo $count; ?>', 'NO', 'RIGHT LOGO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                       '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');">                                                        
                                                                       <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                                                                        <img src="<?php echo $documentRoot; ?>/images/CustomizeInvoiceLogo.png"  alt="" class="form8-logo-image" />
                                                                    <?php } else { ?>
                                                                        <img src="<?php echo $documentRoot; ?>/images/ring128.png"  alt="" class="form8-logo-image" />
                                                                    <?php } ?>                                                        
                                                                </a>
                                                                <div id="firmRightLogoCheckDiv"></div>
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
                                        $fieldName = 'custUdhaarInvDetTop';
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
                                                                        $fieldName = 'userUdhaarInvNameLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openUdhaarInvFormDiv('userUdhaarInvNameLbDiv', '<?php echo $count; ?>', 'YES', 'NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userUdhaarInvNameLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 95;
                                                                        $fieldName = 'userUdhaarInvName';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>" >

                                                                            <div onClick="openUdhaarInvFormDiv('userUdhaarInvNameDiv', '<?php echo $count; ?>', 'NO', 'NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">VIRENDRA SEHWAG</div>
                                                                            <div id="userUdhaarInvNameDiv"></div>
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
                                                                        $fieldName = 'userUdhaarInvAddressLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openUdhaarInvFormDiv('userUdhaarInvAddressLbDiv', '<?php echo $count; ?>', 'YES', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userUdhaarInvAddressLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 97;
                                                                        $fieldName = 'userUdhaarInvAddress';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                            <div onClick="openUdhaarInvFormDiv('userUdhaarInvAddressDiv', '<?php echo $count; ?>', 'NO', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">3-5-125/42 KRISHANA NAGAR</div>
                                                                            <div id="userUdhaarInvAddressDiv"></div>
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
                                                                        $fieldName = 'userUdhaarInvContactLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openUdhaarInvFormDiv('userUdhaarInvContactLbDiv', '<?php echo $count; ?>', 'YES', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userUdhaarInvContactLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 99;
                                                                        $fieldName = 'userUdhaarInvContact';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openUdhaarInvFormDiv('userUdhaarInvContactDiv', '<?php echo $count; ?>', 'NO', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                                                8551958585
                                                                            </div>
                                                                            <div id="userUdhaarInvContactDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                    <!--END INVOICE NO -->
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 98;
                                                                        $fieldName = 'userUdhaarInvEmailLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openUdhaarInvFormDiv('userUdhaarInvEmailLbDiv', '<?php echo $count; ?>', 'YES', 'EMAIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userUdhaarInvEmailLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 99;
                                                                        $fieldName = 'userUdhaarInvEmail';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openUdhaarInvFormDiv('userUdhaarInvEmailDiv', '<?php echo $count; ?>', 'NO', 'EMAIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                                                omunim@gmail.com
                                                                            </div>
                                                                            <div id="userUdhaarInvEmailDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 98;
                                                                        $fieldName = 'userCityLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" >
                                                                            <div onClick="openUdhaarInvFormDiv('userCityLbDiv', '<?php echo $count; ?>', 'YES', 'USER CITY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userCityLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 99;
                                                                        $fieldName = 'userCity';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openUdhaarInvFormDiv('userCityDiv', '<?php echo $count; ?>', 'NO', 'USER CITY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                                                PUNE
                                                                            </div>
                                                                            <div id="userCityDiv"></div>
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
                                                            $fieldName = 'udhaarInvNoLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openUdhaarInvFormDiv('udhaarInvNoLbDiv', '<?php echo $count; ?>', 'YES', 'INVOICE NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="UdhaarInvNoLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 101;
                                                            $fieldName = 'udhaarInvNo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openUdhaarInvFormDiv('udhaarInvNoDiv', '<?php echo $count; ?>', 'NO', 'INVOICE NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'udhaarMonDepInv', '6', '36');">
                                                                         <?php echo 'IUM 9'; ?>
                                                                </div>
                                                                <div id="udhaarInvNoDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            $count = 100;
                                                            $fieldName = 'udhaarInvDateLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openUdhaarInvFormDiv('udhaarInvDateLbDiv', '<?php echo $count; ?>', 'YES', 'UDHAAR DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="UdhaarInvDateLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 101;
                                                            $fieldName = 'udhaarInvDate';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openUdhaarInvFormDiv('udhaarInvDateDiv', '<?php echo $count; ?>', 'NO', 'UDHAAR DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'udhaarMonDepInv', '6', '36');">
                                                                         <?php echo om_strtoupper(date('d M Y')); ?>
                                                                </div>
                                                                <div id="udhaarInvDateDiv"></div>
                                                            </td>
                                                        </tr> 
                                                         <tr>
                                                            <?php
                                                            $count = 22;
                                                            $fieldName = 'mainInvNoLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openUdhaarInvFormDiv('mainInvNoLbDiv', '<?php echo $count; ?>', 'YES', 'MAIN INV NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="mainInvNoLbDiv" ></div>
                                                            </td>
                                                            <?php
                                                            $count = 23;
                                                            $fieldName = 'mainInvNo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openUdhaarInvFormDiv('mainInvNoLbDiv', '<?php echo $count; ?>', 'NO', 'MAIN INV NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                         <?php echo 'IS1' ?>
                                                                </div>
                                                                <div id="mainInvNoLbDiv" ></div>                                                 
                                                            </td>
                                                        </tr>
                                                            <tr>
                                                                <?php
                                                            $count = 100;
                                                            $fieldName = 'StaffCodeLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openUdhaarInvFormDiv('StaffCodeLbDiv', '<?php echo $count; ?>', 'YES', 'SAFF CODE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '15', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="StaffCodeLbDiv"></div>
                                                            </td>
                                                  <?php
                                                                        $count = 99;
                                                                        $fieldName = 'StaffCode';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $label_field_font_weight = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                       <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openUdhaarInvFormDiv('StaffCodeDiv', '<?php echo $count; ?>', 'NO', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                                                ABC
                                                                            </div>
                                                                            <div id="StaffCodeDiv"></div>
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
                                        $fieldName = 'itemUdhaarInvDetTop';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        $itemDetTopVal = $label_field_content;
                                        ?>
                                        <table border="0" cellpadding="0" width="100%" cellspacing="1" style="padding-top:<?php echo $itemDetTopVal; ?>mm">
                                            <tr> 
                                                <?php
                                                $count = 104;
                                                $fieldName = 'udhaarInvTitle';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td valign="middle" align="center" colspan="14"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                    <div onClick="openUdhaarInvFormDiv('udhaarInvTitleDiv', '<?php echo $count; ?>', 'YES', 'UDHAAR MONEY DEPOSIT INVOICE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?></div>
                                                    <div id="udhaarInvTitleDiv"></div>
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
                                                $fieldName = 'udhaarAmtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="10%">
                                                    <div onClick="openUdhaarInvFormDiv('udhaarAmtLbDiv', '<?php echo $count; ?>', 'YES', 'UDHAAR AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "UDHAAR AMT";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="udhaarAmtLbDiv"></div>
                                                </td>
                                                 <?php
                                                $count = 105;
                                                $fieldName = 'udhaarDepDateLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="10%">
                                                    <div onClick="openUdhaarInvFormDiv('udhaarDepDateLbDiv', '<?php echo $count; ?>', 'YES', 'DEPOSIT DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "DEPOSIT DATE";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="udhaarDepDateLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 105;
                                                $fieldName = 'udhaarDepositAmtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="10%">
                                                    <div onClick="openUdhaarInvFormDiv('udhaarDepositAmtLbDiv', '<?php echo $count; ?>', 'YES', 'DEPOSIT AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "DEPOSIT AMT";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="udhaarDepositAmtLbDiv"></div>
                                                </td>
                                                 <?php
                                                $count = 105;
                                                $fieldName = 'udhaarWithIntAmtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="10%">
                                                    <div onClick="openUdhaarInvFormDiv('udhaarWithIntAmtLbDiv', '<?php echo $count; ?>', 'YES', 'UDHAAR INT AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "UDHAAR INT AMT";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="udhaarWithIntAmtLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 106;
                                                $fieldName = 'udhaarRemainingAmtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="10%">
                                                    <div onClick="openUdhaarInvFormDiv('udhaarRemainingAmtLb', '<?php echo $count; ?>', 'YES', 'REMAINING AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "REMAINING AMT";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="udhaarRemainingAmtLb"></div>
                                                </td>
                                                 <?php
                                                $count = 106;
                                                $fieldName = 'udhaarDiscountAmtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="10%">
                                                    <div onClick="openUdhaarInvFormDiv('udhaarDiscountAmtLbDiv', '<?php echo $count; ?>', 'YES', 'DISCOUNT AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "DISCOUNT AMT";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="udhaarDiscountAmtLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 107;
                                                $fieldName = 'udhaarOtherInfoLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="10%">
                                                    <div onClick="openUdhaarInvFormDiv('udhaarOtherInfoLbDiv', '<?php echo $count; ?>', 'YES', 'OTHER INFO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                             <?php
                                                             if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                                                 echo "OTHER INFO";
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?>
                                                    </div>
                                                    <div id="udhaarOtherInfoLbDiv"></div>
                                                </td>
                                                 <?php
                                                $count = 107;
                                                $fieldName = 'payOthInfoLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="10%">
                                                    <div onClick="openUdhaarInvFormDiv('payOthInfoLbDiv', '<?php echo $count; ?>', 'YES', 'PAYMENT OTHER INFO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                             <?php
                                                                 echo $label_field_content;
                                                             ?>
                                                    </div>
                                                    <div id="payOthInfoLbDiv"></div>
                                                </td>
                                            </tr>
                                           <tr class="marginTop10">
                                               <?php
                                                $count = 114;
                                                $fieldName = 'udhaarAmt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openUdhaarInvFormDiv('udhaarAmtDiv', '<?php echo $count; ?>', 'NO', 'UDHAAR AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                        10000
                                                    </div>
                                                    <div id="udhaarAmtDiv"></div>   
                                                </td>  
                                                 <?php
                                                $count = 114;
                                                $fieldName = 'udhaarDepDate';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openUdhaarInvFormDiv('udhaarDepDateDiv', '<?php echo $count; ?>', 'NO', 'DEPOSIT DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                        10 JAN 2023
                                                    </div>
                                                    <div id="udhaarDepDateDiv"></div>   
                                                </td>  
                                                <?php
                                                $count = 114;
                                                $fieldName = 'udhaarDepositAmt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openUdhaarInvFormDiv('udhaarDepositAmtDiv', '<?php echo $count; ?>', 'NO', 'DEPOSIT AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                        5000
                                                    </div>
                                                    <div id="udhaarDepositAmtDiv"></div>   
                                                </td>   
                                                 <?php
                                                $count = 114;
                                                $fieldName = 'udhaarWithIntAmt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openUdhaarInvFormDiv('udhaarWithIntAmtDiv', '<?php echo $count; ?>', 'NO', 'UDHAAR INT AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                        7000
                                                    </div>
                                                    <div id="udhaarWithIntAmtDiv"></div>   
                                                </td>   
                                                <?php
                                                $count = 114;
                                                $fieldName = 'udhaarRemainingAmt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openUdhaarInvFormDiv('udhaarRemainingAmtDiv', '<?php echo $count; ?>', 'NO', 'REMAINING AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                        3500
                                                    </div>
                                                    <div id="udhaarRemainingAmtDiv"></div>   
                                                </td>  
                                                <?php
                                                $count = 114;
                                                $fieldName = 'udhaarDiscountAmt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openUdhaarInvFormDiv('udhaarDiscountAmtDiv', '<?php echo $count; ?>', 'NO', 'DISCOUNT AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                        100
                                                    </div>
                                                    <div id="udhaarDiscountAmtDiv"></div>   
                                                </td> 
                                                <?php
                                                $count = 114;
                                                $fieldName = 'udhaarOtherInfo';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openUdhaarInvFormDiv('udhaarOtherInfoDiv', '<?php echo $count; ?>', 'NO', 'OTHER INFO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                        OTHER INFO
                                                    </div>
                                                    <div id="udhaarOtherInfoDiv"></div>   
                                                </td>  
                                                <?php
                                                $count = 114;
                                                $fieldName = 'payOthInfo';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" valign="top">
                                                    <div onClick="openUdhaarInvFormDiv('payOthInfoDiv', '<?php echo $count; ?>', 'NO', 'PAYMENT OTHER INFO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', 'udhaarMonDepInv', '6', '36');">
                                                       PAY OTH INFO
                                                    </div>
                                                    <div id="payOthInfoDiv"></div>   
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

<!--                                <tr>
                                    <td colspan="14" class="padLeft5">
                                        <?php
                                        $fieldName = 'termsUdhaarInvTop';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        $termsDetTopVal = $label_field_content;
                                        ?>
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top:<?php echo $termsDetTopVal; ?>mm">
                                            <?php
                                            $count = 65;
                                            $fieldName = 'tncUdhaarInvLb';
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
                                                    <div onClick="openUdhaarInvFormDiv('tncUdhaarInvLbDiv', '<?php echo $count; ?>', 'YES', 'Terms and Conditions', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_tncLabelTemp; ?></div>
                                                    <div id="tncUdhaarInvLbDiv"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="14">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <?php
//                                                        $count = 66;
//                                                        $fieldName = 'tncUdhaarInv';
//                                                        $label_field_font_size = '';
//                                                        $label_field_font_color = '';
//                                                        $label_field_font_weight = '';
//                                                        $label_field_content = '';
//                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                                                        $label_field_contentTemp = $label_field_content;
//
//                                                        $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
//                                                        $label_field_content = stripslashes(str_replace('\'', '', $label_field_content));
//                                                        $label_field_content = trim(preg_replace('/\s\s+/', '\n', $label_field_content));
                                                        // $str = strlen($label_field_content);
                                                        // $noOfRows = ceil($str / (860 / $label_field_font_size));
                                                        // $height = $noOfRows * ($label_field_font_size + ($label_field_font_size % 10) + 2);
//                                                        $noOfRows = substr_count($label_field_content, "\n") + 2;
//                                                        $height = $noOfRows * ($label_field_font_size * 3);
//                                                        ?>
                                                        <tr>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <textarea id="tncUdhaarLabel" spellcheck="false" name="tncUdhaarLabel" class="cursor textarea_1 ff_calibri font_color_<?php echo $label_field_font_color; ?>" rows="<?php echo $noOfRows; ?>"
                                                                          onClick="openUdhaarInvFormDiv('tncUdhaarInvDiv', '<?php echo $count; ?>', 'YES', 'Terms & Conditions', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                              '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-270', '10');"
                                                                          style="text-align:left;width:750px;height:<?php $height ?>px"><?php
                                                                              if (($label_field_contentTemp) != '')
                                                                                  echo $label_field_contentTemp;
                                                                              else
                                                                                  echo 'content';
                                                                              ?></textarea>  
                                                                <div id="tncUdhaarInvDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>-->

                              <tr>
                    <td>
                        <div style="width:30%">
                            <table>

                                <tr> 
                                    <?php
                                    $count = 001;
                                    $fieldName = 'cash';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    $label_field_font_weight = '';
                                    $label_field_content = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td valign="middle" align="center" colspan="14"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                        <div onClick="openUdhaarInvFormDiv('cashDiv', '<?php echo $count; ?>', 'YES', 'Cash', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?></div>
                                        <div id="cashDiv"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                    $count = 190;
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    $label_field_font_weight = '';
                                    $fieldName = 'cashPayAmtLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                        <div onClick="openUdhaarInvFormDiv('cashPayAmtLbDiv', '<?php echo $count; ?>', 'YES', 'Cash', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?>:</div>
                                        <div id="cashPayAmtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 86;
                                    $fieldName = 'cashPayAmt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    $label_field_font_weight = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td valign="middle" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                        <div onClick="openUdhaarInvFormDiv('cashPayAmtDiv', '<?php echo $count; ?>', 'NO', 'Cash', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');"> 1000</div>
                                        <div id="cashPayAmtDiv"></div>
                                    </td>
                                </tr> 
                                <tr>
                                    <?php
                                    $count = 190;
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    $label_field_font_weight = '';
                                    $fieldName = 'onlinePayAmtLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                        <div onClick="openUdhaarInvFormDiv('onlinePayAmtLbDiv', '<?php echo $count; ?>', 'YES', 'Online', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?>:</div>
                                        <div id="onlinePayAmtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 86;
                                    $fieldName = 'onlinePayAmt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    $label_field_font_weight = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td valign="middle" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                        <div onClick="openUdhaarInvFormDiv('onlinePayAmtDiv', '<?php echo $count; ?>', 'NO', 'Online', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');"> 1000</div>
                                        <div id="onlinePayAmtDiv"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                    $count = 190;
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    $label_field_font_weight = '';
                                    $fieldName = 'cardePayAmtLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                        <div onClick="openUdhaarInvFormDivopenUdhaarInvFormDiv('cardePayAmtLbDiv', '<?php echo $count; ?>', 'YES', 'Card', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?>:</div>
                                        <div id="cardePayAmtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 86;
                                    $fieldName = 'cardePayAmt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    $label_field_font_weight = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td valign="middle" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                        <div onClick="openUdhaarInvFormDiv('cardePayAmtDiv', '<?php echo $count; ?>', 'NO', 'Card', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');"> 1000</div>
                                        <div id="cardePayAmtDiv"></div>
                                    </td>
                                </tr>
                                <tr>
                                <?php
                                $count = 190;
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                $label_field_font_weight = '';
                                $fieldName = 'chequePayAmtLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                    <div onClick="openUdhaarInvFormDiv('chequePayAmtLbDiv', '<?php echo $count; ?>', 'YES', 'Cheque', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');"><?php echo $label_field_content; ?>:</div>
                                    <div id="chequePayAmtLbDiv"></div>
                                </td>
                                <?php
                                $count = 86;
                                $fieldName = 'chequePayAmt';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                $label_field_font_weight = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td valign="middle" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                    <div onClick="openUdhaarInvFormDiv('chequePayAmtDiv', '<?php echo $count; ?>', 'NO', 'Cheque', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '30', 'udhaarMonDepInv', '6', '36');"> 1000</div>
                                    <div id="chequePayAmtDiv"></div>
                                </td>
                                
                                </tr>


<!--                            END CODE TO ADD OPTION FOR METAL RATE AND METAL WEIGHT--@RENUKA04_07_2024-->
                                <!--END CODE FOR DISPLAY IMAGE : AUTHOR @DARSHANA 27 OCT 2021-->
                            </table>
                        </div>
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
                                                $fieldName = 'authUhaarInvCustSignLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="125px">
                                                    <div onClick="openUdhaarInvFormDiv('authUhaarInvCustSignLbDiv', '<?php echo $count; ?>', 'YES', 'Authorized Signatory', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'udhaarMonDepInv', '-60', '340');">
                                                             <?php
                                                             if ($label_field_content == '' || $label_field_content == NULL) {
                                                                 echo 'Authorized Signatory';
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?></div>
                                                    <div id="authUhaarInvCustSignLbDiv"></div>
                                                </td>

                                                <?php
                                                $count = 135;
                                                $fieldName = 'authUdhaarInvSignLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" width="125px">
                                                    <div onClick="openUdhaarInvFormDiv('authUdhaarInvSignLbDiv', '<?php echo $count; ?>', 'YES', 'Authorized Signatory', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_font_weight; ?>', '<?php echo $label_field_check; ?>', '20', 'udhaarMonDepInv', '-60', '340');">
                                                             <?php
                                                             if ($label_field_content == '' || $label_field_content == NULL) {
                                                                 echo 'Authorized Signatory';
                                                             } else {
                                                                 echo $label_field_content;
                                                             }
                                                             ?></div>
                                                    <div id="authUdhaarInvSignLbDiv"></div>
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
