<?php
/*
 * **************************************************************************************
 * @tutorial: sell purchase STRELLERING customised form
 * **************************************************************************************
 * 
 * Created on 18 DEC, 2018
 *
 * @FileName: omstrcufm.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 2.6.92
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen, Inc
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
// 
// Start Code To Select FirmId
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
// End Code To Select FirmId
//
//$qSelCustId = "SELECT slpr_cust_id,slpr_firm_id FROM salepurchase where slpr_owner_id='$sessionOwnerId' and slpr_cust_pre_invoice_no='$slPrPreInvoiceNo' and "
//            . "slpr_cust_invoice_no='$slPrInvoiceNo' and slpr_firm_id IN ($strFrmId) order by slpr_since asc LIMIT 0, 1";
//$resCustId = mysqli_query($conn, $qSelCustId);
//$rowCustId = mysqli_fetch_array($resCustId, MYSQLI_ASSOC);
//$custId = $rowCustId['slpr_cust_id'];
//$firmId = $rowCustId['slpr_firm_id'];
//
parse_str(getTableValues("SELECT firm_id,firm_name,firm_long_name,firm_reg_no,firm_address,firm_phone_details,firm_email,firm_desc,firm_pan_no,firm_tin_no,firm_left_thumb_ftype,firm_right_thumb_ftype FROM firm where firm_own_id='$sessionOwnerId' and firm_id='1'"));
//
//************************Start code for change data from customer to user Author@:SANT12JAN16***************************************
//
parse_str(getTableValues("SELECT user_fname,user_lname,user_add,user_city,user_pincode,user_state,user_country,user_phone,user_mobile FROM user where user_owner_id='$sessionOwnerId' and user_id='$custId'"));
//
//************************Start code for change data from customer to user Author@:SANT12JAN16***************************************
$counter = 1;
//
$totalItemsQTY;
$totalValuation;
$goldTotalWeight = 0;
$silverTotalWeight = 0;
$goldTotalWeightType = 'GM';
$silverTotalWeightType = 'GM';
$visibility = 'hidden';
$labelType = 'StrlleringSilver';
?>
<table border="0" cellpadding="0" align="center" width="90%" cellspacing="0" style="border:1px solid #c1c1c1;padding:5px 2px;">
    <tr> 
        <td align="center"> 
            <table border="0" cellspacing="0"  width="100%" cellpadding="0" valign="top" align="center">
                <tr>
                    <td align="left" class="main_link_orange" >
                        CUSTOMIZED STERLING INVOICE PANEL
                    </td>
                    <td align="right" valign="bottom" class="printVisibilityHidden">
                        <div id="cuMessDisplayDiv"></div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
   
    <tr>
        <td align="left"> 
            <table border="0" cellspacing="0" cellpadding="0" valign="top" align="left" width="100%">
                <tr>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark" width="10%">
                      <div style="font-size:14px;font-weight:600;color:#9b370b;"> TOP MARGIN (MM):</div>  
                   
                    <?php
                    $count = 138;
                    $fieldName = 'topImtMargin';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                  
                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="Top Margin" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 139;
                    $fieldName = 'leftImtMargin';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft20" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;">  LEFT MARGIN:</div>
                  
                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="Left Margin" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="7" maxlength="30"  style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <td align="left" title="Click to select form border !" width="14%">
                        <table border="0" cellspacing="0" cellpadding="0" valign="top" align="center">
                            <tr>
                                <td align="left" class="ff_calibri fs_12 fw_b grey_dark" >
                                    <div style="font-size:14px;font-weight:600;color:#9b370b;"> FORM BORDER: &nbsp;</div>
                                </td>
                                <?php
                                $count = 140;
                                $fieldName = 'formImtBorderCheck';
                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td align="left" valign="middle" title="CLICK TO SELECT FORM BORDER !">
                                    <input type="checkbox" id="fontCheckId<?php echo $count; ?>" name="fontCheckId<?php echo $count; ?>" class="checkbox" <?php
                                    if ($label_field_check == 'true')
                                        echo 'checked';
                                    else
                                        echo '';
                                    ?>
                                           onclick="labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');"/>                   
                                </td>
                            </tr>
                        </table>
                    </td>
                    <!-- START CODE TO ADD OPTION FOR BORDER SIZE @AUTHOR:DNYANESHWARI -->
                    <td align="right" title="Click to select form border size!" width="10%">
                        <table border="0" cellspacing="0" cellpadding="0" valign="top" align="right" width="100%">
                            <tr>
                                <td align="left" class="ff_calibri fs_12 fw_b grey_dark" title="Click to select form border size!" width="10%">
                                    <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;">BORDER SIZE:</div>
                                 <?php
                                    $count = 66;
                                    $fieldName = 'formBorderSize';
                                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <input id="formBorderSize<?php echo $count; ?>" name="formBorderSize<?php echo $count; ?>" placeholder="Size#Colorcode" 
                                           value="<?php echo $label_field_content; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                       labelsFormStrllering('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                                   }"
                                           onblur="labelsFormStrllering('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                                           spellcheck="false" type="text"
                                           class="input_border_grey_center" size="10" maxlength="9" style="width:100%;height:30px;border-radius:3px!important;"/>
                                </td> 
                            </tr>
                        </table>
                    </td>
                    <!-- END CODE TO ADD OPTION FOR BORDER SIZE @AUTHOR:DNYANESHWARI -->
                    <?php
                    $count = 141;
                    $fieldName = 'formImtWidth';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" width="10%">
                        <table border="0" cellspacing="0" cellpadding="0" valign="top" align="left" width="100%">
                            <tr>
                                <td align="left" class="ff_calibri fs_12 fw_b grey_dark" >
                                    <div style="font-size:14px;font-weight:600;color:#9b370b;">  FORM WIDTH:</div>
                                
                                    <input id="formWidth<?php echo $count; ?>" name="formWidth<?php echo $count; ?>" placeholder="Form Width(MM)" title="Form Width(MM)"
                                           value="<?php echo $label_field_content; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                       labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                                   }"
                                           onblur="labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
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
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark  padLeft10" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;"> HEADER (MM):</div>
                        <input title="Select Here header margin from top !" id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="HEADER TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
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
                        <div style="font-size:14px;font-weight:600;color:#9b370b;"> CUST DET TOP:</div> 
                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="CUST DET TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
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
                        <div style="font-size:14px;font-weight:600;color:#9b370b;">ITEM DET TOP:</div>
                   
                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="ITEM DET TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="8" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                   
                </tr>
            </table>
        </td>
    </tr>
  
    <tr>
        <td align="left" colspan="6" > 
            <table border="0" cellspacing="0" cellpadding="0" valign="top" align="left" width="100%">
                <tr>
                    <?php
                    $count = 145;
                    $fieldName = 'termsImtTop';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark" width="20%" title="Select Here terms and conditions margin from top !">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;"> TERMS & CONDITIONS:</div>                
                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="TERMS TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
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
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="15%" title="CHANGE HERE ROUGH ESTIMATED INVOICE TITLE!">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;"> ROUGH ESTIMATE TITLE:</div>
                   
                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="ROUGH ESTIMATE" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text" class="input_border_grey" size="15" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 147;
                    $fieldName = 'slPrImtValueAddedOp';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $slPrValueAddedOp = $label_field_content;
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="15%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;"> VAL ADDED BY</div>
                        <div class="selectStyled" title="CHANGE HERE VALUE ADDED BY OPTION!" >
                            <select id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" class="textLabel14CalibriReq" style="width:100%;height:30px;border-radius:3px!important;"
                                    onchange="labelsFormStrllering('<?php echo $count; ?>', 'StrlleringSilver', '<?php echo $fieldName; ?>', this.value, '', '', '', '');">
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
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10"  width="10%"> 
                        <div style="font-size:14px;font-weight:600;color:#9b370b;">TABLE HEADING COLOR </div>
                        <?php
                        $count = 66;
                        $fieldName = 'tableHeadingColor';
                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $bcColor = $label_field_content;
                        ?>

                        <input id="tableHeadingColor<?php echo $count; ?>" name="tableHeadingColor<?php echo $count; ?>" placeholder="1B5FA8" title="Enter Color Code to change Table Heading backgroud color !"
                               value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormStrllering('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormStrllering('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               class="input_border_grey_center" size="7" maxlength="7" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr> 
        <?php
        $fieldName = 'topImtMargin';
        $label_field_content = '';
        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        $topMargin = $label_field_content;

        $fieldName = 'leftImtMargin';
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

                $fieldName = 'formImtWidth';
                $label_field_content = '';
                parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                $formWidthInMM = $label_field_content;

                $fieldName = 'formImtBorderCheck';
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
                       style="border: <?php echo $border; ?>;width:100%;padding-top:<?php echo $headerTopVal; ?>mm">
                        <!--START CODE FOR ADD HEADER INFO IMG -->
                                <tr>
                                    <?php
                        $count = 138;
                                    $fieldName = 'header_info_img';
                                    $label_field_content = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td valign="top">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" colspan="2">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="cursor ff_calibri font_color_<?php echo $label_field_font_color; ?> bold font_color_blue" 
                                                    style="font-size:<?php echo $label_field_font_size; ?>px" colspan="<?php echo $colspan; ?>" width="50%">
                                                    <br/>
                                                    <div  onClick="openStrlleringFormDiv('headerInfoImgDiv', '<?php echo $count; ?>', 'YES', 'Header Info Img!', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', 'StrlleringSilver', '-60', '340');"><?php echo 'Click Here to show this ad image (1280X500)'; ?></div>
                                                    <div id="headerInfoImgDiv"></div>
                                                </td>
                                                <td align="center" style="height:100px;vertical-align: middle; margin-left:13px;">
                                                    <form name="add_new_inv_image2" id="add_new_inv_image2"
                                                          enctype="multipart/form-data" method="post"
                                                          action="<?php echo $documentRootBSlash; ?>/include/php/omheaderinfoimgupload.php">
                                                        <input type="hidden" id="imageLoadOptionInv2" name="imageLoadOptionInv2" />
                                                        <input type="hidden" id="compressedImageInv2" name="compressedImageInv2" />
                                                        <input type="hidden" id="compressedImageThumbInv2" name="compressedImageThumbInv2" />
                                                        <input type="hidden" id="compressedImageSizeInv2" name="compressedImageSizeInv2" />  
                                                        <input type="hidden" id="labeltype" name="labeltype" value="<?php echo $labelType;?>" />
                                                        <div class="file_button_add_image_div" align="right" style="cursor: pointer; margin-left:285px;">
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
                                    <td align="center">
                                        <?php parse_str(getTableValues("SELECT image_id,image_user_id,image_user_type FROM image WHERE image_snap_desc = 'SellPurchaseHeaderInfoImg'")); ?>
                                        <?php if ($image_id != '') { ?>
                                            <img width="100%" src="<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo $image_id; ?>" alt=" " class="img-responsive" />
                                        <?php } else { ?>
                                            <img width="100%" src="<?php echo $documentRoot; ?>/images/invoice/1280x500xh.png" alt=" " class="img-responsive" />
                                        <?php } ?>
                                    </td>
                                </tr>
                                <!--END CODE FOR ADD HEADER INFO IMG-->
                </table>
            </div>
        </td>
    </tr>                
                    
                    <tr> 
                        <td align="left" colspan="14">
                            <table border="0" cellpadding="0" width="100%" cellspacing="0" style="background:#fff9e8">
                                <tr>
                                    <td align="right" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" align="right">
                                            <tr valign="top">
                                                <?php
                                                $count = 148;
                                                $fieldName = 'firmImtLeftLogoCheck';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_content = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" valign="top">
                                                    <a style="cursor: pointer;"
                                                       onClick="openStrlleringFormDiv('firmImtLeftLogoDiv', '<?php echo $count; ?>', 'NO', 'LEFT LOGO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '14',
                                                                       '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '30', 'StrlleringSilver', '6', '36');">
                                                        <img src="<?php echo $documentRoot; ?>/images/ring128.png"  alt="" class="form8-logo-image" />
                                                    </a>
                                                    <div id="firmImtLeftLogoDiv"></div>
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
                                                            $fieldName = 'firmImtFormHeader';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openStrlleringFormDiv('firmImtHeaderDiv', '<?php echo $count; ?>', 'NO', 'FORM HEADER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', 'StrlleringSilver', '7', '-30');"><b>SHUBH LABH</b></div>
                                                                <div id="firmImtHeaderDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        // getCustomFormField($count, $visibility, 'NO', 'firmLongNameDiv', 'SHOP NAME', $label_field_content, $label_field_font_size, $label_field_font_color, $label_field_check, '20', $fieldName, 'StrlleringSilver', '', '');
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
                                                            $count = 82;
                                                            $fieldName = 'firmImtLongName';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openStrlleringFormDiv('firmImtLongNameDiv', '<?php echo $count; ?>', 'NO', 'FIRM NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', 'StrlleringSilver', '7', '-30');">OMUNIM JEWELLERS</div>
                                                                <input id="commonId" name="commonId" type="hidden" />
                                                                <input id="panelName" name="panelName" type="hidden" value="" />
                                                                <div id="firmImtLongNameDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        // getCustomFormField($count, $visibility, 'NO', 'firmLongNameDiv', 'SHOP NAME', $label_field_content, $label_field_font_size, $label_field_font_color, $label_field_check, '20', $fieldName, 'StrlleringSilver', '', '');
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
                                                            $fieldName = 'firmImtDesc';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="right"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openStrlleringFormDiv('firmImtDescDiv', '<?php echo $count; ?>', 'NO', 'SHOP NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', 'StrlleringSilver', '6', '36');">GOLD AND SILVER MONEY LENDER SHOP</div>
                                                                <div id="firmImtDescDiv"></div>
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
                                                            $fieldName = 'firmImtRegNoLabel';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openStrlleringFormDiv('firmImtRegNoLbDiv', '<?php echo $count; ?>', 'YES', 'FIRM REGISTRATION NUMBER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '30', 'StrlleringSilver', '6', '36');"><b><?php echo $label_field_content; ?>:</b></div>
                                                                <div id="firmImtRegNoLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 85;
                                                            $fieldName = 'firmImtRegNo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openStrlleringFormDiv('firmImtRegNoDiv', '<?php echo $count; ?>', 'NO', 'REGISTRATION NUMBER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '30', 'StrlleringSilver', '6', '36');">C/3512/2009</div>
                                                                <div id="firmImtRegNoDiv"></div>
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
                                                            $fieldName = 'firmImtAddress';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openStrlleringFormDiv('firmImtAddressDiv', '<?php echo $count; ?>', 'NO', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '30', 'StrlleringSilver', '6', '36');"> P.NO.8, LAXMI ROAD,PUNE,MAHARASHTRA,INDIA,411028</div>
                                                                <div id="firmImtAddressDiv"></div>
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
                                                            $count = 87;
                                                            $fieldName = 'firmImtPhone';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openStrlleringFormDiv('firmImtPhoneDiv', '<?php echo $count; ?>', 'NO', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '30', 'StrlleringSilver', '6', '36');"><b>PHONE :</b> 8551958585</div>
                                                                <div id="firmImtPhoneDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 88;
                                                            $fieldName = 'firmImtEmail';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="center" class="padLeft5 ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openStrlleringFormDiv('firmImtEmailDiv', '<?php echo $count; ?>', 'NO', 'EMAIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '30', 'StrlleringSilver', '6', '36');">  <b>EMAIL :</b>  info@omunim.com</div>
                                                                <div id="firmImtEmailDiv"></div>
                                                            </td>
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
                                                $fieldName = 'firmImtRightLogoCheck';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" valign="top">
                                                    <a style="cursor: pointer;"
                                                       onClick="openStrlleringFormDiv('firmImtRightLogoDiv', '<?php echo $count; ?>', 'NO', 'RIGHT LOGO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '14',
                                                                       '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '30', 'StrlleringSilver', '6', '36');">
                                                        <img src="<?php echo $documentRoot; ?>/images/ring128.png"  alt="" class="form8-logo-image" />
                                                    </a>
                                                    <div id="firmImtRightLogoDiv"></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="background:#e9f7f5;">
                        <td align="left" valign="top" colspan="2">
                            <table border="0" cellpadding="0" width="100%" cellspacing="0" align="left">
                                <tr valign="top">
                                    <td align="left" valign="top" class="padLeft5">
                                        <table border="0" cellpadding="0" cellspacing="0" align="left">
                                            <tr valign="top">
                                                <?php
                                                $count = 90;
                                                $fieldName = 'firmImtTinTopLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" class="ff_calibri cursor fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('firmImtTinTopLbDiv', '<?php echo $count; ?>', 'YES', 'TIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                    <div id="firmImtTinTopLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 91;
                                                $fieldName = 'firmImtTinTop';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('firmImtTinTopDiv', '<?php echo $count; ?>', 'NO', 'TIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">1234567890</div>
                                                    <div id="firmImtTinTopDiv"></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align="right" valign="top" class="paddingRight5">
                                        <table border="0" cellpadding="0" cellspacing="0" align="right">
                                            <tr valign="top">
                                                <?php
                                                $count = 92;
                                                $fieldName = 'firmImtPanLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('firmImtPanLbDiv', '<?php echo $count; ?>', 'YES', 'PAN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                    <div id="firmImtPanLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 93;
                                                $fieldName = 'firmImtPan';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('firmImtPanDiv', '<?php echo $count; ?>', 'NO', 'PAN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">AAECM5678D</div>
                                                    <div id="firmImtPanDiv"></div>
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
                            $fieldName = 'custImtDetTop';
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
                                                                        $count = 15;
                                                                        $fieldName = 'detailsOfRec';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        if ($label_field_font_size == '' || $label_field_font_size == NULL) {
                                                                            $label_field_font_size = 12;
                                                                        }
                                                                        ?>
                                                                        <td colspan="2" valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openStrlleringFormDiv('detailsOfRecDiv', '<?php echo $count; ?>', 'NO', 'Details Of Receiver(Bill To)', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                    <span style="font-size:14px">Details Of Receiver(Bill To)</span>   
                                                                            </div>
                                                                            <div id="detailsOfRecDiv"></div>
                                                                        </td>
                                                        </tr>
                                                        <tr> 
                                                            <?php
                                                            $count = 94;
                                                            $fieldName = 'userImtNameLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openStrlleringFormDiv('userImtNameLbDiv', '<?php echo $count; ?>', 'YES', 'NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="userImtNameLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 95;
                                                            $fieldName = 'userImtName';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openStrlleringFormDiv('userImtNameDiv', '<?php echo $count; ?>', 'NO', 'NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">VIRENDRA SEHWAG</div>
                                                                <div id="userImtNameDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!--START SON OF-->
                                            <tr> 
                                                <td align="left" valign="top" colspan='2'>
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                        <tr> 
                                                            <?php
                                                            $count = 173;
                                                            $fieldName = 'userImtSoLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openStrlleringFormDiv('userImtSoLbDiv', '<?php echo $count; ?>', 'YES', 'FATHER NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="userImtSoLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 174;
                                                            $fieldName = 'userImtSo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openStrlleringFormDiv('userImtSoDiv', '<?php echo $count; ?>', 'NO', 'FATHER NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">RAM KUMAR</div>
                                                                <div id="userImtSoDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!--END SON OF-->
                                            <!--start D/o-->
                                            <tr> 
                                                <td align="left" valign="top" colspan='2'>
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                        <tr> 
                                                            <?php
                                                            $count = 176;
                                                            $fieldName = 'userImtDoLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openStrlleringFormDiv('userImtDoLbDiv', '<?php echo $count; ?>', 'YES', 'MOTHER NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="userImtDoLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 177;
                                                            $fieldName = 'userImtDo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openStrlleringFormDiv('userImtDoDiv', '<?php echo $count; ?>', 'NO', 'MOTHER NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">ARYVIR SEHWAG</div>
                                                                <div id="userImtDoDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!--END D/o-->
                                            <!--start W/o-->
                                            <tr> 
                                                <td align="left" valign="top" colspan='2'>
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                        <tr> 
                                                            <?php
                                                            $count = 178;
                                                            $fieldName = 'userImtWoLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openStrlleringFormDiv('userImtWoLbDiv', '<?php echo $count; ?>', 'YES', 'SPOUSE NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="userImtWoLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 179;
                                                            $fieldName = 'userImtWo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openStrlleringFormDiv('userImtWoDiv', '<?php echo $count; ?>', 'NO', 'SPOUSE NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">ARTI SEHWAG</div>
                                                                <div id="userImtWoDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!--END W/o-->
                                            <!--start C/o-->
                                            <tr> 
                                                <td align="left" valign="top" colspan='2'>
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                        <tr> 
                                                            <?php
                                                            $count = 180;
                                                            $fieldName = 'userImtCoLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openStrlleringFormDiv('userImtCoLbDiv', '<?php echo $count; ?>', 'YES', 'GUARDIAN NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="userImtCoLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 181;
                                                            $fieldName = 'userImtCo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openStrlleringFormDiv('userImtCoDiv', '<?php echo $count; ?>', 'NO', 'GUARDIAN NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');"> AMAR NARH SHARMA</div>
                                                                <div id="userImtCoDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!--END C/o-->
                                            <tr> 
                                                <td align="left" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                        <tr> 
                                                            <?php
                                                            $count = 96;
                                                            $fieldName = 'userImtAddressLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openStrlleringFormDiv('userImtAddressLb', '<?php echo $count; ?>', 'YES', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="userImtAddressLb"></div>
                                                            </td>
                                                            <?php
                                                            $count = 97;
                                                            $fieldName = 'userImtAddress';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openStrlleringFormDiv('userImtAddressDiv', '<?php echo $count; ?>', 'NO', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">3-5-125/42 KRISHANA NAGAR</div>
                                                                <div id="userImtAddressDiv"></div>
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
                                                            $fieldName = 'userImtContactLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openStrlleringFormDiv('userImtContactLb', '<?php echo $count; ?>', 'YES', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="userImtContactLb"></div>
                                                            </td>
                                                            <?php
                                                            $count = 99;
                                                            $fieldName = 'userImtContact';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openStrlleringFormDiv('userImtContactDiv', '<?php echo $count; ?>', 'NO', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                                                    8551958585
                                                                </div>
                                                                <div id="userImtContactDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <!--START PAN -->
                                                        <tr> 
                                                            <?php
                                                            $count = 181;
                                                            $fieldName = 'userImtPanLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openStrlleringFormDiv('userImtPanLbDiv', '<?php echo $count; ?>', 'YES', 'PAN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="userImtPanLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 182;
                                                            $fieldName = 'userImtPan';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openStrlleringFormDiv('userImtPanDiv', '<?php echo $count; ?>', 'NO', 'PAN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                                                    ABCD1234F
                                                                </div>
                                                                <div id="userImtPanDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <!--END PAN -->
                                                        <!--START GSTIN FOR USER-->
                                                          
                                                         <tr>
                                                            <?php
                                                            $fieldName = 'userImtGstinLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openStrlleringFormDiv('userImtGstinLbDiv', '<?php echo $count; ?>', 'YES', 'GSTIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="userImtGstinLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $fieldName = 'userImtGstin';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openStrlleringFormDiv('userImtGstinDiv', '<?php echo $count; ?>', 'NO', 'GSTIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '6', '36');">
                                                                         01AAAAA0000A1Z5
                                                                </div>
                                                                <div id="userImtGstinDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <!--END GSTIN FOR USER-->
                                                        <!--START ADHAAR -->
                                                        <tr> 
                                                            <?php
                                                            $count = 185;
                                                            $fieldName = 'userImtAdhaarLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openStrlleringFormDiv('userImtAdhaarLbDiv', '<?php echo $count; ?>', 'YES', 'GSTIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="userImtAdhaarLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 186;
                                                            $fieldName = 'userImtAdhaar';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openStrlleringFormDiv('uuserImtAdhaarDiv', '<?php echo $count; ?>', 'NO', 'GSTIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                                                    4991 1866 5246
                                                                </div>
                                                                <div id="uuserImtAdhaarDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <!--END ADHAAR -->
                                                        <!--START TABLE HEIGHT-->
                                                        <tr> 

                                                            <?php
                                                            $count = 196;
                                                            $fieldName = 'tableHeightLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openStrlleringFormDiv('tableHeightLb', '<?php echo $count; ?>', 'YES', 'TABLE HEIGHT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="tableHeightLb"></div>
                                                            </td>
                                                            <?php
                                                            $count = 197;
                                                            $fieldName = 'tableHeight';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" >
                                                                <div onClick="openStrlleringFormDiv('tableHeightDiv', '<?php echo $count; ?>', 'NO', 'TABLE HEIGHT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                    50PX
                                                                </div>
                                                                <div id="tableHeightDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <!--END TABLE HEIGHT-->
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
                                                $fieldName = 'invImtNoTitleLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('invoiceImtLbDiv', '<?php echo $count; ?>', 'YES', 'INVOICE NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                    <div id="invoiceImtLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 101;
                                                $fieldName = 'invImtNoTitle';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('invImtNoTitleDiv', '<?php echo $count; ?>', 'NO', 'INVOICE NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '6', '36');">
                                                             <?php echo 'ICP 1'; ?>
                                                    </div>
                                                    <div id="invImtNoTitleDiv"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <?php
                                                $count = 102;
                                                $fieldName = 'dateImtTitleLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('dateImtTitleLb', '<?php echo $count; ?>', 'YES', 'DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                    <div id="dateImtTitleLb"></div>
                                                </td>
                                                <?php
                                                $count = 103;
                                                $fieldName = 'dateImtTitle';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('dateImtDiv', '<?php echo $count; ?>', 'NO', 'DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                                             <?php echo om_strtoupper(date('d M Y')); ?>
                                                    </div>
                                                    <div id="dateImtDiv"></div>                                                 
                                                </td>
                                            </tr>
                                            <!-------------------------------------------------------ADD CUSTOMER ID IN STRLLERING INV AUTHOR :@DNYANESHWARI 3OCT2024-------------------------------------------------------------->
                                                        <tr>
                                                            <?php
//  $count = 104;
                                                            $fieldName = 'custImtIdTitleLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openStrlleringFormDiv('custImtIdTitleLbDiv', '<?php echo $count; ?>', 'YES', 'CUSTOMER ID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="custImtIdTitleLbDiv"></div>
                                                            </td>
                                                            <?php
//   $count = 105;
                                                            $fieldName = 'custImtIdTitle';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openStrlleringFormDiv('custImtIdTitleDiv', '<?php echo $count; ?>', 'NO', 'CUSTOMER ID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '6', '36');">
                                                                         <?php echo 'CU01'; ?>
                                                                </div>
                                                                <div id="custImtIdTitleDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <!-------------------------------------------------------------ADD CUSTOMER ID IN STRLLERING INV AUTHOR :@DNYANESHWARI 3OCT2024------------------------------------------------------>
                                                         <!--START GSTIN FOR FIRM-->
                                                          
                                                         <tr>
                                                            <?php
                                                            $fieldName = 'firmImtTinLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openStrlleringFormDiv('firmImtTinLbDiv', '<?php echo $count; ?>', 'YES', 'GSTIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="firmImtTinLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $fieldName = 'firmImtTin';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openStrlleringFormDiv('firmImtTinDiv', '<?php echo $count; ?>', 'NO', 'GSTIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '6', '36');">
                                                                         01AAAAA0000A1Z5
                                                                </div>
                                                                <div id="firmImtTinDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <!--END GSTIN FOR FIRM-->
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="14">
                            <?php
                            $fieldName = 'itemImtDetTop';
                            $label_field_content = '';
                            parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $itemDetTopVal = $label_field_content;
                            ?>
                            <table border="0" cellpadding="0" width="100%" cellspacing="1" style="padding-top:<?php echo $itemDetTopVal; ?>mm">
                                <tr> 
                                    <?php
                                    $count = 104;
                                    $fieldName = 'invImtTitle';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td valign="middle" align="center" colspan="14"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('invImtTitleDiv', '<?php echo $count; ?>', 'YES', 'CASH INVOICE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', 'StrlleringSilver', '6', '36');"><?php echo $label_field_content; ?></div>
                                        <div id="invImtTitleDiv"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="14">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr class="bc_color_darkblue" height="20px">
                                    <!--START SR NO-->
                                        <?php
                                    $count = 105;
                                    $fieldName = 'itemSNoLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px" width="50px">
                                        <div onClick="openStrlleringFormDiv('itemSNoLbDiv', '<?php echo $count; ?>', 'YES', 'SR NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-weight:600;"><?php echo $label_field_content; ?></div>
                                        <div id="itemSNoLbDiv"></div>
                                    </td>
                                    <!--END SR NO-->
                                    <?php
                                    $count = 105;
                                    $fieldName = 'itemImtIdLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px" width="50px">
                                        <div onClick="openStrlleringFormDiv('itemImtIdLbDiv', '<?php echo $count; ?>', 'YES', 'IT ID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-weight:600;"><?php echo $label_field_content; ?></div>
                                        <div id="itemImtIdLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 106;
                                    $fieldName = 'designImtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('designImtLbDiv', '<?php echo $count; ?>', 'YES', 'DESIGN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-weight:600;">
                                                            <?php echo $label_field_content; ?></div>
                                        <div id="designImtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 107;
                                    $fieldName = 'itemImtDescLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" 
                                        style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('itemImtDescLbDiv', '<?php echo $count; ?>', 'YES', 'DESC', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-weight:600;"><?php echo $label_field_content; ?></div>
                                        <div id="itemImtDescLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 107;
                                    $fieldName = 'itemImtHSNLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" 
                                        style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('itemImtHSNLbDiv', '<?php echo $count; ?>', 'YES', 'HSN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-weight:600;"><?php echo $label_field_content; ?></div>
                                        <div id="itemImtHSNLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 107;
                                    $fieldName = 'QTYLB';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" 
                                        style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('itemImtHSNLbDiv', '<?php echo $count; ?>', 'YES', 'HSN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-weight:600;">
                                                            <?php echo $label_field_content; ?>
                                        </div>
                                        <div id="itemImtHSNLbDiv"></div>
                                    </td>
                                    
                                    
                                    <?php
                                    $count = 108;
                                    $fieldName = 'itemImtGsWtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('itemImtGsWtLbDiv', '<?php echo $count; ?>', 'YES', 'GS WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-weight:600;"><?php echo $label_field_content; ?></div>
                                        <div id="itemImtGsWtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 109;
                                    $fieldName = 'metalImtRateLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('metalImtRateLbDiv', '<?php echo $count; ?>', 'YES', 'RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-weight:600;"><?php echo $label_field_content; ?></div>
                                        <div id="metalImtRateLbDiv"></div>
                                    </td>

                                    <?php
                                    $count = 110;
                                    $fieldName = 'labourImtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('labourImtLbDiv', '<?php echo $count; ?>', 'YES', 'LABOUR', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-weight:600;"><?php echo $label_field_content; ?></div>
                                        <div id="labourImtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 111;
                                    $fieldName = 'valImtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('valImtLbDiv', '<?php echo $count; ?>', 'YES', 'VAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-weight:600;"><?php echo $label_field_content; ?></div>
                                        <div id="valImtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 112;
                                    $fieldName = 'taxImtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('taxImtLbDiv', '<?php echo $count; ?>', 'YES', 'TAX', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-weight:600;"><?php echo $label_field_content; ?></div>
                                        <div id="taxImtLbDiv"></div>
                                    </td>

                                    <!--START CGST-->
                                    <?php
                                    $count = 360;
                                    $fieldName = 'cgstImtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($label_field_font_size == 0) {
                                        $label_field_font_size = 14;
                                    }
                                    ?>
                                    <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >
                                        <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                                            <tr> 
                                                <td colspan="2" class="cursor" >
                                                    <div class="suppHomeMargin" onClick="openStrlleringFormDiv('cgstImtLbDiv', '<?php echo $count; ?>', 'YES', 'CGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-weight:600;"><?php echo $label_field_content; ?></div>
                                                    <div id="cgstImtLbDiv"></div>
                                                </td>
                                            </tr>   
                                            <tr> 
                                                <td align="center" width = "50%" class="ff_calibri fs_11 cursor border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;">
                                                    RATE
                                                </td>
                                                <td align="center" width = "50%" class="ff_calibri fs_11 cursor border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;">
                                                    AMT
                                                </td>
                                            </tr>
                                        </table>  
                                    </td>
                                    <!--END CGST-->
                                    <!--START SGST-->
                                    <?php
                                    $count = 362;
                                    $fieldName = 'sgstImtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($label_field_font_size == 0) {
                                        $label_field_font_size = 14;
                                    }
                                    ?>
                                    <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >
                                        <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                                            <tr> 
                                                <td colspan="2" class="cursor">
                                                    <div class="suppHomeMargin" onClick="openStrlleringFormDiv('sgstImtLbDiv', '<?php echo $count; ?>', 'YES', 'SGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-weight:600;"><?php echo $label_field_content; ?></div>
                                                    <div id="sgstImtLbDiv"></div>
                                                </td>
                                            </tr>   
                                            <tr> 
                                                <td align="center" width = "50%" class="ff_calibri cursor fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;">
                                                    RATE
                                                </td>
                                                <td align="center" width = "50%" class="ff_calibri cursor fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;">
                                                    AMT
                                                </td>
                                            </tr>
                                        </table>  
                                    </td>
                                    <!--END SGST-->
                                    <!--START IGST-->
                                    <?php
                                    $count = 364;
                                    $fieldName = 'igstImtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($label_field_font_size == 0) {
                                        $label_field_font_size = 14;
                                    }
                                    ?>
                                    <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >
                                        <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                                            <tr> 
                                                <td colspan="2" class="cursor">
                                                    <div class="suppHomeMargin" onClick="openStrlleringFormDiv('igstImtLbDiv', '<?php echo $count; ?>', 'YES', 'IGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-weight:600;"><?php echo $label_field_content; ?></div>
                                                    <div id="igstImtLbDiv"></div>
                                                </td>
                                            </tr>   
                                            <tr> 
                                                <td align="center" width = "50%" class="ff_calibri fs_11 cursor border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;">
                                                    RATE
                                                </td>
                                                <td align="center" width = "50%" class="ff_calibri fs_11 cursor border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;">
                                                    AMT
                                                </td>
                                            </tr>
                                        </table>  
                                    </td>
                                    <!--END IGST-->

                                    <?php
                                    $count = 113;
                                    $fieldName = 'amtImtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('amtImtLbDiv', '<?php echo $count; ?>', 'YES', 'AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-weight:600;"><?php echo $label_field_content; ?></div>
                                        <div id="amtImtLbDiv"></div>
                                    </td>
                                </tr>
                                <tr class="marginTop10">
                                    <!--START SR NO-->
                                    <?php
                                    $count = 114;
                                    $fieldName = 'itemSNo';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top">
                                        <div onClick="openStrlleringFormDiv('itemSNoDiv', '<?php echo $count; ?>', 'NO', 'SR NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                            1
                                        </div>
                                        <div id="itemSNoDiv"></div>   
                                    </td>
                                    <!--END SR NO-->
                                    <?php
                                    $count = 114;
                                    $fieldName = 'itemImtId';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top">
                                        <div onClick="openStrlleringFormDiv('itemImtIdDiv', '<?php echo $count; ?>', 'NO', 'ITEM ID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                            PG1
                                        </div>
                                        <div id="itemImtIdDiv"></div>   
                                    </td>
                                    <?php
                                    $count = 115;
                                    $fieldName = 'designImt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div 
                                            <a style="cursor: pointer;" onClick="openStrlleringFormDiv('designImtDiv', '<?php echo $count; ?>', 'NO', 'DESIGN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                                <img src="<?php echo $documentRoot; ?>/images/wel_om32.png"  width="15px" height="15px" border="0" style="border-color: #B8860B"/>
                                            </a>
                                        </div>
                                        <div id="designImtDiv"></div> 
                                    </td>
                                    <?php
                                    $count = 116;
                                    $fieldName = 'itemImtDesc';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                                                    <td align="left"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div onClick="openStrlleringFormDiv('itemImtDescDiv', '<?php echo $count; ?>', 'NO', 'DESCRIPTION', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                                                            RING(1)
                                                                        </div>
                                                                        <div id="itemImtDescDiv"></div> 
                                                                        <?php
                                                                            $count = 116;
                                                                            $fieldName = 'sizeLb';
                                                                            $label_field_font_size = '';
                                                                            $label_field_font_color = '';
                                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                            ?>
                                                                        <div  onClick="openStrlleringFormDiv('sizeLbDiv', '<?php echo $count; ?>', 'NO', 'Size', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');" style="font-size:<?php echo $label_field_font_size; ?>px;" class="font_color_<?php echo $label_field_font_color; ?>">
                                                                            Size
                                                                        </div>
                                                                        <div id="sizeLbDiv"></div> 
                                                                    </td>
                                                                <?php
                                                                  $count = 116;
                                    $fieldName = 'itemImtHSN';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="left"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('itemImtHSNDiv', '<?php echo $count; ?>', 'NO', 'HSN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                            1.4.5.7
                                        </div>
                                        <div id="itemImtHSNDiv"></div> 
                                    </td>
                                    <?php
                                    $count = 116;
                                    $fieldName = 'QTY';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="left"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('itemImtHSNDiv', '<?php echo $count; ?>', 'NO', 'Qyantity', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                            1
                                        </div>
                                        <div id="itemImtHSNDiv"></div> 
                                    </td>
                                    <?php
                                    $count = 117;
                                    $fieldName = 'itemImtGsWt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('itemImtGsWtDiv', '<?php echo $count; ?>', 'NO', 'GS WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                            10GM
                                        </div>
                                        <div id="itemImtGsWtDiv"></div> 
                                    </td>
                                    <?php
                                    $count = 118;
                                    $fieldName = 'metalImtRate';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    $label_field_content = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('metalImtRateDiv', '<?php echo $count; ?>', 'NO', 'RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                            28000
                                        </div>
                                        <div id="metalImtRateDiv"></div> 
                                    </td>

                                    <?php
                                    $count = 119;
                                    $fieldName = 'labourImt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('labourImtDiv', '<?php echo $count; ?>', 'NO', 'LABOUR', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                            100PP
                                        </div>
                                        <div id="labourImtDiv"></div> 
                                    </td>
                                    <?php
                                    $count = 120;
                                    $fieldName = 'valImt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('valImtDiv', '<?php echo $count; ?>', 'NO', 'VAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                            28100
                                        </div>
                                        <div id="valImtDiv"></div> 
                                    </td>
                                    <?php
                                    $count = 121;
                                    $fieldName = 'taxImt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('taxImtDiv', '<?php echo $count; ?>', 'NO', 'TAX', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                            1405
                                        </div>
                                        <div id="taxImtDiv"></div> 
                                    </td>
                                    <!--START CGST VALUES-->
                                    <?php
                                    $count = 361;
                                    $fieldName = 'cgstImtAmt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    $label_field_content = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" class="fs_12 fw_n ff_calibri  border-color-grey-rb" colspan="2">
                                        <table border="0" cellspacing="0" cellpadding="0">   
                                            <tr> 
                                                <td align="right" class="fs_12 cursor fw_n ff_calibri border-color-grey-r" >
                                                    <div onClick="openStrlleringFormDiv('cgstImtAmtDiv', '<?php echo $count; ?>', 'NO', 'CGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                                        1.5 %
                                                    </div>
                                                    <div id="cgstImtAmtDiv"></div> 
                                                </td>
                                                <td align="right" class="cursor" >
                                                    <div onClick="openStrlleringFormDiv('cgstImtAmtDiv', '<?php echo $count; ?>', 'NO', 'CGST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                                        1000
                                                    </div>
                                                    <div id="cgstImtAmtDiv"></div> 
                                                </td>
                                            </tr>
                                        </table>  
                                    </td>
                                    <!--END CGST VALUES-->
                                    <!--START SGST VALUES-->
                                    <?php
                                    $count = 363;
                                    $fieldName = 'sgstImtAmt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    $label_field_content = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" class="fs_12 fw_n ff_calibri  border-color-grey-rb" colspan="2">
                                        <table border="0" cellspacing="0" cellpadding="0">   
                                            <tr> 
                                                <td align="right" class="fs_12 fw_n ff_calibri cursor border-color-grey-r" >
                                                    <div onClick="openStrlleringFormDiv('sgstImtAmtDiv', '<?php echo $count; ?>', 'NO', 'SGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                                        1.5 %
                                                    </div>
                                                    <div id="sgstImtAmtDiv"></div>
                                                </td>
                                                <td align="right" class="cursor" >
                                                    <div onClick="openStrlleringFormDiv('sgstImtAmtDiv', '<?php echo $count; ?>', 'NO', 'SGST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                                        1000
                                                    </div>
                                                    <div id="sgstImtAmtDiv"></div> 
                                                </td>
                                            </tr>
                                        </table>  
                                    </td>
                                    <!--END SGST VALUES-->
                                    <!--START IGST VALUES-->
                                    <?php
                                    $count = 365;
                                    $fieldName = 'igstImtAmt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    $label_field_content = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" class="fs_12 fw_n ff_calibri cursor border-color-grey-rb" colspan="2">
                                        <table border="0" cellspacing="0" cellpadding="0">   
                                            <tr> 
                                                <td align="right" class="fs_12 fw_n ff_calibri cursor border-color-grey-r" >
                                                    <div onClick="openStrlleringFormDiv('igstImtAmtDiv', '<?php echo $count; ?>', 'NO', 'IGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                                        1.5 %
                                                    </div>
                                                    <div id="igstImtAmtDiv"></div> 
                                                </td>
                                                <td align="right" class="cursor">
                                                    <div onClick="openStrlleringFormDiv('igstImtAmtDiv', '<?php echo $count; ?>', 'NO', 'IGST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                                        1000
                                                    </div>
                                                    <div id="igstImtAmtDiv"></div> 
                                                </td>
                                            </tr>
                                        </table>  
                                    </td>
                                    <!--END IGST VALUES-->

                                    <?php
                                    $count = 122;
                                    $fieldName = 'amtImt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    $label_field_content = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px"  valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('amtImtDiv', '<?php echo $count; ?>', 'NO', 'AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '6', '36');">
                                            32445.00
                                        </div>
                                        <div id="amtImtDiv"></div> 
                                    </td>
                                </tr>
                                 <tr ><!-------Start code to customize options @Author:DNYANESHWARI---------->
                                    <td colspan="14" >
                                        <table border="0" cellpadding="0" width="40%" cellspacing="0" align="center">
                                            <tr>
                                                <?php
                                                $count = 54;
                                                $fieldName = 'totalImQtyLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '600';
                                                $label_field_content = 'TOT QTY';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td width="7%" align="right" style="padding-left: 40px;font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>">
                                                    <div onClick="openStrlleringFormDiv('totalImQtyLbDiv', '<?php echo $count; ?>', 'YES', 'TOT QTY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-30', '-160');"><?php echo $label_field_content; ?> :
                                                    </div> 
                                                    <div id="totalImQtyLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 50;
                                                $fieldName = 'totalImQty';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_font_weight = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" width="3%" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                    <div onClick="openStrlleringFormDiv('totalImQtyDiv', '<?php echo $count; ?>', 'NO', 'TOT QTY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">&nbsp;2</div>
                                                    <div id="totalImQtyDiv"></div>
                                                </td>

                                            </tr>
                                        </table>
                                    </td>
                                </tr> <!-------End code to customize options @Author:DNYANESHWARI---------->
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="14" style="border-bottom: 1px solid #c1c1c1;">
                            &nbsp;
                        </td>
                    </tr>
<!--                    <tr>
                        <td align="center" colspan="14">
                            &nbsp;
                        </td>
                    </tr>-->
                    <tr style="width: 100%;background: #fff5e3;">
                        <td colspan="14" class="paddingRight5" align="right">
                            <table border="0" cellpadding="2" cellspacing="0" align="right" style="padding-top:<?php echo $middleGapVal; ?>mm;width:100%;">
                                <!-- end add middle gap and the padding top  Author:GAUR03AUG16-->
                                <tr>
                                    <?php
                                    $count = 123;
                                    $fieldName = 'totalFinImtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('totalFinImtLbDiv', '<?php echo $count; ?>', 'YES', 'TOTAL FINAL AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                        <div id="totalFinImtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 124;
                                    $fieldName = 'totalFinImt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('totalFinImtDiv', '<?php echo $count; ?>', 'NO', 'TOTAL FINAL AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">32345.00</div>
                                        <div id="totalFinImtDiv"></div>
                                    </td>
                                </tr>
                <tr style="width: 100%;background: #fff5e3;">
                    
                        <td colspan="14" class="paddingRight5" align="right">
                            <table border="0" cellpadding="2" cellspacing="0" align="right" style="padding-top:<?php echo $middleGapVal; ?>mm;width:100%;">
                                <!-- end add middle gap and the padding top  Author:GAUR03AUG16-->
                                <tr>
                                    <?php
                                    $count = 123;
                                    $fieldName = 'totalMkgImtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('totalMkgImtLbDiv', '<?php echo $count; ?>', 'YES', 'TOTAL MAKING AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                        <div id="totalFinImtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 124;
                                    $fieldName = 'totalMkgImt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('totalMkgImtDiv', '<?php echo $count; ?>', 'NO', 'TOTAL MAKING AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">32345.00</div>
                                        <div id="totalMkgImtDiv"></div>
                                    </td>
                                </tr>
                                
                                 <tr style="width: 100%;background: #fff5e3;">
                        <td colspan="14" class="paddingRight5" align="right">
                            <table border="0" cellpadding="2" cellspacing="0" align="right" style="padding-top:<?php echo $middleGapVal; ?>mm">
                                <!-- end add middle gap and the padding top  Author:GAUR03AUG16-->
                                 <!--START DISCOUNT -->
                                                        <tr>
                                                            <?php
                                                            $count = 169;
                                                            $fieldName = 'imtRecDiscLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openStrlleringFormDiv('imtRecDiscLbDiv', '<?php echo $count; ?>', 'YES', 'DISCOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                                                <div id="imtRecDiscLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 170;
                                                            $fieldName = 'imtRecDisc';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_font_weight = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="80px" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; font-weight:<?php echo $label_field_font_weight; ?>;">
                                                                <div onClick="openStrlleringFormDiv('imtRecDiscDiv', '<?php echo $count; ?>', 'NO', 'DISCOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">600.00</div>
                                                                <div id="imtRecDiscDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <!--END DISCOUNT -->
                                <tr>
                                    <?php
                                    $count = 123;
                                    $fieldName = 'imttaxableamtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('imttaxableamtLbDiv', '<?php echo $count; ?>', 'YES', 'TAXABLE AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                        <div id="imttaxableamtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 124;
                                    $fieldName = 'imttaxableamt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('imttaxableamtDiv', '<?php echo $count; ?>', 'NO', 'TAXABLE AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">32345.00</div>
                                        <div id="imttaxableamtDiv"></div>
                                        
                                </tr>
                                <!--11111111-->
                                <tr>
                                    <td colspan="4" >
                                        <table border="0" cellpadding="0" width="60%" cellspacing="0" align="left">
                                            <!--START COURIER CHARGES-->
                                            <tr>
                                                <?php
                                                $count = 159;
                                                $fieldName = 'imtRecCourierChgsAmtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtRecCourierChgsAmtLbDiv', '<?php echo $count; ?>', 'YES', 'COURIER CHARGES', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="imtRecCourierChgsAmtLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 160;
                                                $fieldName = 'imtRecCourierChgsAmt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtRecCourierChgsAmtDiv', '<?php echo $count; ?>', 'NO', 'COURIER CHARGES', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">400.00</div>
                                                    <div id="imtRecCourierChgsAmtDiv"></div>
                                                </td>
                                            </tr>
                                            <!--END COURIER CHARGES-->
                                            <!--START CASH RECEIVED-->
                                            <tr>
                                                <?php
                                                $count = 161;
                                                $fieldName = 'imtRecCashLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtRecCashLbDiv', '<?php echo $count; ?>', 'YES', 'CASH RECEIVED', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="imtRecCashLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 162;
                                                $fieldName = 'imtRecCash';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtRecCashDiv', '<?php echo $count; ?>', 'NO', 'CASH RECEIVED', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">400.00</div>
                                                    <div id="imtRecCashDiv"></div>
                                                </td>
                                            </tr>
                                            <!--END CASH RECEIVED-->
                                            <!--START CHEQUE RECEIVED -->
                                            <tr>
                                                <?php
                                                $count = 163;
                                                $fieldName = 'imtRecCheqLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtRecCheqLbDiv', '<?php echo $count; ?>', 'YES', 'CHEQUE RECEIVED', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="imtRecCheqLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 164;
                                                $fieldName = 'imtRecCheq';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtRecCheqDiv', '<?php echo $count; ?>', 'NO', 'CHEQUE RECEIVED', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">400.00</div>
                                                    <div id="imtRecCheqDiv"></div>
                                                </td>
                                            </tr>
                                            <!--END CHEQUE RECEIVED -->
                                            <!--START CARD RECEIVED -->
                                            <tr>
                                                <?php
                                                $count = 165;
                                                $fieldName = 'imtRecCardLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtRecCardLbDiv', '<?php echo $count; ?>', 'YES', 'CARD RECEIVED', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="imtRecCardLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 166;
                                                $fieldName = 'imtRecCard';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtRecCardDiv', '<?php echo $count; ?>', 'NO', 'CARD RECEIVED', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">400.00</div>
                                                    <div id="imtRecCardDiv"></div>
                                                </td>
                                            </tr>
                                            <!--END CARD RECEIVED -->
                                            <!--START ONLINE PAYMENT -->
                                            <tr>
                                                <?php
                                                $count = 167;
                                                $fieldName = 'imtRecOnlinePayLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtRecOnlinePayLbDiv', '<?php echo $count; ?>', 'YES', 'ONLINE PAYMENT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="imtRecOnlinePayLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 168;
                                                $fieldName = 'imtRecOnlinePay';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtRecOnlinePayDiv', '<?php echo $count; ?>', 'NO', 'ONLINE PAYMENT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">400.00</div>
                                                    <div id="imtRecOnlinePayDiv"></div>
                                                </td>
                                            </tr>
                                            <!--END ONLINE PAYMENT -->
                                            <!--START DISCOUNT -->
                                            <tr>
                                                <?php
                                                $count = 169;
                                                $fieldName = 'imtRecDiscLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtRecDiscLbDiv', '<?php echo $count; ?>', 'YES', 'DISCOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="imtRecDiscLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 170;
                                                $fieldName = 'imtRecDisc';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtRecDiscDiv', '<?php echo $count; ?>', 'NO', 'DISCOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">400.00</div>
                                                    <div id="imtRecDiscDiv"></div>
                                                </td>
                                            </tr>
                                            <!--END DISCOUNT -->
                                        </table>
                                        <table border="0" cellpadding="0" width="40%" cellspacing="0" align="right">
                                            <!--START CGST-->
                                            <tr>
                                                <?php
                                                $count = 140;
                                                $fieldName = 'imtCgstLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtCgstLbDiv', '<?php echo $count; ?>', 'YES', 'CGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="imtCgstLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 141;
                                                $fieldName = 'imtCgst';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtCgstDiv', '<?php echo $count; ?>', 'NO', 'CGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">400.00</div>
                                                    <div id="imtCgstDiv"></div>
                                                </td>
                                            </tr>
                                            <!--END CGST-->
                                            <!--START SGST-->
                                            <tr>
                                                <?php
                                                $count = 142;
                                                $fieldName = 'imtSgstLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtSgstLbDiv', '<?php echo $count; ?>', 'YES', 'SGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="imtSgstLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 143;
                                                $fieldName = 'imtSgst';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtSgstDiv', '<?php echo $count; ?>', 'NO', 'SGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">400.00</div>
                                                    <div id="imtSgstDiv"></div>
                                                </td>
                                            </tr>
                                            <!--END SGST-->
                                            <!--START IGST-->
                                            <tr>
                                                <?php
                                                $count = 144;
                                                $fieldName = 'imtIgstLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtIgstLbDiv', '<?php echo $count; ?>', 'YES', 'IGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="imtIgstLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 145;
                                                $fieldName = 'imtIgst';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtIgstDiv', '<?php echo $count; ?>', 'NO', 'IGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">400.00</div>
                                                    <div id="imtIgstDiv"></div>
                                                </td>
                                            </tr>
                                            <!--END IGST-->
                                            <!--START MKG CGST-->
                                            <tr>
                                                <?php
                                                $count = 146;
                                                $fieldName = 'imtMkgChrgCgstLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtMkgChrgCgstLbDiv', '<?php echo $count; ?>', 'YES', 'MAKING CHRG CGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="imtMkgChrgCgstLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 147;
                                                $fieldName = 'imtMkgChrgCgst';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtMkgChrgCgstDiv', '<?php echo $count; ?>', 'NO', 'MAKING CHRG CGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">400.00</div>
                                                    <div id="imtMkgChrgCgstDiv"></div>
                                                </td>
                                            </tr>
                                            <!--END MKG CGST-->
                                            <!--START MKG SGST-->
                                            <tr>
                                                <?php
                                                $count = 148;
                                                $fieldName = 'imtMkgChrgSgstLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtMkgChrgSgstLbDiv', '<?php echo $count; ?>', 'YES', 'MAKING CHRG SGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="imtMkgChrgSgstLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 149;
                                                $fieldName = 'imtMkgChrgSgst';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtMkgChrgSgstDiv', '<?php echo $count; ?>', 'NO', 'MAKING CHRG SGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">400.00</div>
                                                    <div id="imtMkgChrgSgstDiv"></div>
                                                </td>
                                            </tr>
                                            <!--END MKG SGST-->
                                            <!--START MKG IGST-->
                                            <tr>
                                                <?php
                                                $count = 150;
                                                $fieldName = 'imtMkgChrgIgstLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtMkgChrgIgstLbDiv', '<?php echo $count; ?>', 'YES', 'MAKING CHRG IGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="imtMkgChrgIgstLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 151;
                                                $fieldName = 'imtMkgChrgSgst';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openStrlleringFormDiv('imtMkgChrgSgstDiv', '<?php echo $count; ?>', 'NO', 'MAKING CHRG SGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">400.00</div>
                                                    <div id="imtMkgChrgSgstDiv"></div>
                                                </td>
                                            </tr>
                                            <!--END MKG IGST-->
                                        </table>
                                    </td>
                                </tr>
                                <!--111111-->
                                <!--START COURIER CHARGES -->
                                <tr>
                                    <?php
                                    $count = 152;
                                    $fieldName = 'imtCourierChgsAmtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('imtCourierChgsAmtLbDiv', '<?php echo $count; ?>', 'YES', 'COURIER CHARGES', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-50', '-210');"><?php echo $label_field_content; ?> : </div>
                                        <div id="imtCourierChgsAmtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 153;
                                    $fieldName = 'imtCourierChgsAmt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('imtCourierChgsAmtDiv', '<?php echo $count; ?>', 'NO', 'COURIER CHARGES', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-50', '-210');">400.00</div>
                                        <div id="imtCourierChgsAmtDiv"></div>
                                    </td>
                                </tr>
                                <!--END COURIER CHARGES-->
                                <tr>
                                    <?php
                                    $count = 136;
                                    $fieldName = 'totalVatImtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('totalVatImtLbDiv', '<?php echo $count; ?>', 'YES', 'VAT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-40', '-210');"><?php echo $label_field_content; ?> : </div>
                                        <div id="totalVatImtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 137;
                                    $fieldName = 'totalVatImt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('totalVatImtDiv', '<?php echo $count; ?>', 'NO', 'VAT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-40', '-210');">445.00</div>
                                        <div id="totalVatImtDiv"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                    $count = 138;
                                    $fieldName = 'totalImtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" colspan="2"  class="ff_calibri fw_b  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('totalImtLbDiv', '<?php echo $count; ?>', 'YES', 'TOTAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-30', '-210');"><?php echo $label_field_content; ?> : </div>
                                        <div id="totalImtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 139;
                                    $fieldName = 'totalImt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" width="80px" class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('totalImtDiv', '<?php echo $count; ?>', 'NO', 'TOTAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-30', '-210');">32445.00</div>
                                        <div id="totalImtDiv"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                    $count = 125;
                                    $fieldName = 'cashImtPaidLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($label_field_font_size == '')
                                        $label_field_font_size = 14;
                                    if ($label_field_font_color == '')
                                        $label_field_font_color = 'black';
                                    ?>
                                    <td align="right" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"> 
                                        <div onClick="openStrlleringFormDiv('cashImtPaidLbDiv', '<?php echo $count; ?>', 'YES', 'CASH PAID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-60', '-210');"><?php echo $label_field_content; ?> : </div>
                                        <div id="cashImtPaidLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 126;
                                    $fieldName = 'cashImtPaid';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($label_field_font_size == '')
                                        $label_field_font_size = 14;
                                    if ($label_field_font_color == '')
                                        $label_field_font_color = 'black';
                                    ?>
                                    <td width="80px" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('cashImtPaidDiv', '<?php echo $count; ?>', 'NO', 'CASH PAID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-60', '-210');">-5000.00</div>
                                        <div id="cashImtPaidDiv"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                    $count = 127;
                                    $fieldName = 'discImtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                        <div onClick="openStrlleringFormDiv('discImtLbDiv', '<?php echo $count; ?>', 'YES', 'DISCOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-60', '-210');"><?php echo $label_field_content; ?> : </div>
                                        <div id="discImtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 128;
                                    $fieldName = 'discImt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td width="80px"  align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('discImtDiv', '<?php echo $count; ?>', 'NO', 'DISCOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-60', '-210');">-500.00</div>
                                        <div id="discImtDiv"></div>
                                    </td>
                                </tr>
                                <!--START ROUND OFF-->
                                <tr>
                                    <?php
                                    $count = 154;
                                    $fieldName = 'imtRoundOffLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                        <div onClick="openStrlleringFormDiv('imtRoundOffLbDiv', '<?php echo $count; ?>', 'YES', 'ROUND OFF', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-60', '-210');"><?php echo $label_field_content; ?> : </div>
                                        <div id="imtRoundOffLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 155;
                                    $fieldName = 'imtRoundOff';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td width="80px"  align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('imtRoundOffDiv', '<?php echo $count; ?>', 'NO', 'ROUND OFF', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-60', '-210');">-500.00</div>
                                        <div id="imtRoundOffDiv"></div>
                                    </td>
                                </tr>
                                <!--END ROUND OFF-->
                                <!--<tr>-->
                                    <?php
//                                    $count = 129;
//                                    $fieldName = 'totalImtBalLb';
//                                    $label_field_font_size = '';
//                                    $label_field_font_color = '';
//                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
<!--                                    <td align="right" colspan="2" class="ff_calibri fw_b cursor border-color-grey-top font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('totalImtBalLbDiv', '<?php echo $count; ?>', 'YES', 'TOTAL BAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', 'StrlleringSilver', '-60', '-210');"><?php echo $label_field_content; ?> : </div>
                                        <div id="totalImtBalLbDiv"></div>
                                    </td>-->
                                    <?php
//                                    $count = 130;
//                                    $fieldName = 'totalImtBal';
//                                    $label_field_font_size = '';
//                                    $label_field_font_color = '';
//                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
<!--                                    <td width="80px" align="right" class="ff_calibri cursor border-color-grey-top font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                        <div onClick="openStrlleringFormDiv('totalImtBalDiv', '<?php echo $count; ?>', 'NO', 'TOTAL BAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-60', '-210');">-15845.00</div>
                                        <div id="totalImtBalDiv"></div>
                                    </td>-->
                                <!--</tr>-->
                            </table>
                        </td>
                    </tr>
<!--                    <tr>
                        <td align="center" colspan="14">
                          &nbsp;
                        </td>
                    </tr>-->
                    <tr>
                        <td colspan="14">
                            <table border="0" cellpadding="0" width="100%" cellspacing="0" class="border-color-grey-top border-color-grey-b margin2pxAll" style="background: #ddf1ff;margin-top: 5px;border: 1px solid #c1c1c1;">
                                <tr>
                                    <?php
                                    $count = 156;
                                    $fieldName = 'imtPayableAmtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="left" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('imtPayableAmtLbDiv', '<?php echo $count; ?>', 'YES', 'PAYABLE AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');"><?php echo $label_field_content; ?> : </div>
                                        <div id="imtPayableAmtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 157;
                                    $fieldName = 'imtPayableAmt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td width="400px" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                        <div onClick="openStrlleringFormDiv('imtPayableAmtDiv', '<?php echo $count; ?>', 'NO', 'PAYABLE AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '-275');">
                                                 <?php echo "$globalCurrency" . ' ' . ucwords(numToWords(om_round(15845))) . ' Only/-'; ?>
                                        </div>
                                        <div id="imtPayableAmtDiv"></div>
                                    </td>
                                    
<!--                                    <td align="left" class="padLeft5">
                                        <div class="ff_calibri fw_n fs_14" onClick="this.contentEditable = 'true';"><?php
                                            echo "$globalCurrency" . ' ' .
                                            ucwords(numToWords(om_round(32445))) . ' Only/-';
                                            ?></div>
                                    </td>-->
                                    <?php
                                    $count = 131;
                                    $fieldName = 'finImtBalLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('finImtBalLbDiv', '<?php echo $count; ?>', 'YES', 'BALANCE LEFT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-60', '-190');"><?php echo $label_field_content; ?> : </div>
                                        <div id="finImtBalLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 132;
                                    $fieldName = 'finImtBal';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                        <div onClick="openStrlleringFormDiv('finImtBalDiv', '<?php echo $count; ?>', 'NO', 'BALANCE LEFT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-60', '-240');">32445.00</div>
                                        <div id="finImtBalDiv"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                    $count = 171;
                                    $fieldName = 'imtFinalPayableAmtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="left" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openStrlleringFormDiv('imtFinalPayableAmtLbDiv', '<?php echo $count; ?>', 'YES', 'FINAL AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');"><?php echo $label_field_content; ?> : </div>
                                        <div id="imtFinalPayableAmtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 172;
                                    $fieldName = 'imtFinalPayableAmt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td width="400px" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                        <div onClick="openStrlleringFormDiv('imtFinalPayableAmtDiv', '<?php echo $count; ?>', 'NO', 'FINAL AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '-275');">
                                                 <?php echo "$globalCurrency" . ' ' . ucwords(numToWords(om_round(15845))) . ' Only/-'; ?>
                                        </div>
                                        <div id="imtFinalPayableAmtDiv"></div>
                                    </td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="14" class="padLeft5">
                            <?php
                            $fieldName = 'termsImtTop';
                            $label_field_content = '';
                            parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $termsDetTopVal = $label_field_content;
                            ?>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top:<?php echo $termsDetTopVal; ?>mm">
                                <?php
                                $count = 133;
                                $fieldName = 'tncImtLb';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                                $label_field_tncLabelTemp = $label_field_content;
                                $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                                $label_field_content = trim(preg_replace('/\s\s+/', '\n', $label_field_content));
                                ?>
                                <tr>
                                    <td colspan="6" align="left" width="150px" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" > 
                                        <div onClick="openStrlleringFormDiv('tncImtLbDiv', '<?php echo $count; ?>', 'YES', 'Terms and Conditions', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', 'StrlleringSilver', '6', '36');"><?php echo $label_field_tncLabelTemp; ?></div>
                                        <div id="tncImtLbDiv"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="14">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <?php
                                            $count = 134;
                                            $fieldName = 'tncImt';
                                            $label_field_font_size = '';
                                            $label_field_font_color = '';
                                            $label_field_content = '';
                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            $label_field_contentTemp = $label_field_content;
                                            //
                                            $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                                            $label_field_content = stripslashes(str_replace('\'', '', $label_field_content));
                                            $label_field_content = trim(preg_replace('/\s\s+/', '\n', $label_field_content));

                                           // $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                                           // $label_field_content = trim(preg_replace('/\s\s+/', '\n', $label_field_content));
                                           // $str = strlen($label_field_content);
                                            //$noOfRows = ceil($str / (860 / $label_field_font_size));
                                            //$height = $noOfRows * ($label_field_font_size + ($label_field_font_size % 10) + 2);
                                            $noOfRows = substr_count($label_field_content, "\n") + 2;
                                            $height = $noOfRows * ($label_field_font_size * 3);
                                            ?>
                                            <tr>
                                                <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                     <textarea id="tncLabel" spellcheck="false" name="tncLabel" class="cursor textarea_1 ff_calibri font_color_<?php echo $label_field_font_color; ?>" rows="<?php echo $noOfRows; ?>"
                                                          onClick="openStrlleringFormDiv('tncImtDiv', '<?php echo $count; ?>', 'YES', 'Terms & Conditions', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                          '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', 'StrlleringSilver', '-270', '10');"
                                                          style="text-align:left;width:750px;height:<?php $height ?>px"><?php
                                                              if (($label_field_contentTemp) != '')
                                                                  echo $label_field_contentTemp;
                                                              else
                                                                  echo 'content';
                                                              ?></textarea>                                      
                                                    <div id="tncImtDiv"></div>
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
                        <td align="right" class="paddingRight5" width="100%" valign="middle">
                            <table border="0" cellpadding="0" cellspacing="0" align="right" width="100%" valign="bottom">
                                <tr>
                                    <?php
                                    $count = 366;
                                    $fieldName = 'authImtCustSignLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="125px">
                                        <div onClick="openStrlleringFormDiv('authImtCustSignLbDiv', '<?php echo $count; ?>', 'NO', 'Customer Signatory', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', 'StrlleringSilver', '-60', '340');">
                                                 <?php
                                                 if ($label_field_content == '' || $label_field_content == NULL) {
                                                     echo 'Customer Signatory';
                                                 } else {
                                                     echo $label_field_content;
                                                 }
                                                 ?></div>
                                        <div id="authImtCustSignLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 135;
                                    $fieldName = 'authImtSignLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="125px">
                                        <div onClick="openStrlleringFormDiv('authImtSignLbDiv', '<?php echo $count; ?>', 'YES', 'Authorized Signatory', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', 'StrlleringSilver', '-60', '340');">
                                                 <?php
                                                 if ($label_field_content == '' || $label_field_content == NULL) {
                                                     echo 'Authorized Signatory';
                                                 } else {
                                                     echo $label_field_content;
                                                 }
                                                 ?></div>
                                        <div id="authImtSignLbDiv"></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Start Code To Add Footer Image @Author:Vinod@19Apr2023 -->
                    <tr>
                        <?php
                        $count = 136;
                        $fieldName = 'footer';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>
                        <td align="center" class="cursor ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="<?php echo $colspan; ?>">
                            <div onClick="openStrlleringFormDiv('footerImtLbDiv1', '<?php echo $count; ?>', 'YES', 'Thank You For Your Business !', '<?php echo $fieldName; ?>', '<?php if($label_field_content==null || $label_field_content==''){ echo 'Thank You For Your Business !'; }else{ echo $label_field_content;}; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', 'StrlleringSilver', '-60', '340');">
                                                 <?php
                                                 if ($label_field_content == '' || $label_field_content == NULL) {
                                                     echo 'Thank You For Your Business !';
                                                 } else {
                                                     echo $label_field_content;
                                                 }
                                                 ?></div>
                            <div id="footerImtLbDiv1"></div>

                        </td>
                    </tr>
                    <tr>
                        <?php
                        $count = 138;
                        $fieldName = 'footer_ad_img';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>
                        <td valign="top">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" colspan="2">

                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="cursor ff_calibri font_color_<?php echo $label_field_font_color; ?> bold font_color_blue" 
                                        style="font-size:<?php echo $label_field_font_size; ?>px" colspan="<?php echo $colspan; ?>" width="50%">
                                        <br/>
                                        <div onClick="openStrlleringFormDiv('footerImtLbDiv', '<?php echo $count; ?>', 'YES', 'Live Offers!', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '45', '<?php echo $labelType; ?>', '60', '20');"><?php echo 'Click Here to show this ad image (1280X500)'; ?></div>
                                        <div id="footerImtLbDiv"></div>
                                    </td>
                                    <td align="center" style="height:100px;vertical-align: middle;">
                                        <form name="add_new_inv_image" id="add_new_inv_image"
                                              enctype="multipart/form-data" method="post"
                                              action="<?php echo $documentRootBSlash; ?>/include/php/omimgupload.php">
                                            <input type="hidden" id="imageLoadOptionInv" name="imageLoadOptionInv" />
                                            <input type="hidden" id="compressedImageInv" name="compressedImageInv" />
                                            <input type="hidden" id="compressedImageThumbInv" name="compressedImageThumbInv" />
                                            <input type="hidden" id="compressedImageSizeInv" name="compressedImageSizeInv" />                                            
                                            <div class="file_button_add_image_div" align="right" style="cursor: pointer;">
                                                <input type="file" id="addImageAutoSub" name="addImageAutoSub" class="file_button_add_image"
                                                       onclick="javascript: document.getElementById('imageLoadOptionInv').value = 'COM';"
                                                       onchange="loadImageFileCompressAutoSub();">
                                                <img id="addCustomerImage" style="height: 64px;width:64px;cursor: pointer;" src="<?php echo $documentRoot; ?>/images/add-image-64.png" alt="COM">
                                            </div>
                                            <input type="hidden" id="fileNameInv" name="fileNameInv" class="lgn-txtfield-without-borderAndBackground" readonly="readonly" />
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <?php parse_str(getTableValues("SELECT image_id AS image_id2, image_user_id, image_user_type FROM image WHERE image_snap_desc = 'SellPurchaseInvAds'")); ?>
                            <?php if ($image_id2 != '') { ?>
                                <img width="100%" src="<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo $image_id2; ?>" alt=" " style="margin-left: 30px !important;" />
                            <?php } else { ?>
                                <img width="100%" src="<?php echo $documentRoot; ?>/images/invoice/1280x500xh.png" alt=" " style="margin-left: 30px !important;" />
                            <?php } ?>
                        </td>
                    </tr>
                </table>
          <!-- </div> -->
        </td>
    </tr>
                            <!-- End Code To Add Footer Image @Author:Vinod@19Apr2023 -->
</table>
</td></tr>
</table>
<br/>
</div>