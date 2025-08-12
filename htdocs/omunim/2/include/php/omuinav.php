<?php
/**
 * 
 * Created on July 2, 2016
 * file for udhaar invoice
 * @FileName: omuinav.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: Modified by @Author: KHUSH22JAN13
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap');
    .quotInv{
        padding:0!important;
        font-family: 'Poppins', sans-serif;
    }
    .topbar{
        background: #FD9A00;
        width: 100%;
        height: 15px;
    }
    .logoInvImg{
        width:80px;
        height:80px;
    }
    .logoInvImg .form7-logo-image{
        object-fit: cover;
    }

</style>
<?php 
if($frm8TopMargin =='' || $frm8TopMargin == NULL){
   parse_str(getTableValues(" SELECT label_field_content FROM labels WHERE label_field_name ='topUdhaarInvMargin' "));
  $frm8TopMargin = $label_field_content;
}
//
if($frm8LeftMargin =='' || $frm8LeftMargin == NULL){
   parse_str(getTableValues(" SELECT label_field_content FROM labels WHERE label_field_name ='leftUdhaarInvMargin' "));
   $frm8LeftMargin = $label_field_content;
}
//
if($formWidth =='' || $formWidth == NULL){
   parse_str(getTableValues(" SELECT label_field_content FROM labels WHERE label_field_name ='formUdhaarInvWidth' "));
   $formWidth = $label_field_content;
}
//
$labelType = 'udhaarMonDepInv';
$fieldName = 'formUdhaarInvBorderCheck';
$label_field_content = '';
parse_str(getTableValues("SELECT label_field_check as borderCheck FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//
if($borderCheck =='true'){
    $fieldName = 'formBorderSize';
    $label_field_content = '';
    parse_str(getTableValues("SELECT label_field_content as formBorderSize FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
    $formBorder = explode("#", $formBorderSize);
    $formBorderSize = $formBorder[0];
    $formBorderColor = $formBorder[1];
}
//
?>
<div style="margin-top:<?php echo $frm8TopMargin . 'mm'; ?>;margin-left:<?php echo $frm8LeftMargin . 'mm'; ?>;">
    <div class="<?php echo $divClass; ?>">
        <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" bgcolor="#FFFFFF" style="border: <?php echo $formBorderSize;?>px solid #<?php echo $formBorderColor;?>;">
  <!--//===================================================================================================
                       //====================== START CODE FOR ADD HEADER INFO IMG @SIMRAN:30MAR2023=====================//
                       //===================================================================================================-->
                <tr>
                    <td colspan="2">
                        <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" bgcolor="#FFFFFF" 
                           style="width:<?php echo $formWidth . 'mm'; ?>;" width="100%";>
                            <tr>
                                <td>
                                    <?php     
                         $fieldName = 'header_info_img';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_check == 'true') {
                            ?>
                            <?php parse_str(getTableValues("SELECT image_id,image_user_id,image_user_type FROM image WHERE image_snap_desc = 'SellPurchaseHeaderInfoImg'")); ?>
                            <?php
                            if ($image_id != '') {
                                $imageId = $image_id;
                                $noEcho = 'Y';
                                include('omshowimage.php');
                                $noEcho = '';
                                ?>
                                <img width="100%" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($imageContent); ?>" alt=" " />
                            <?php } else { ?>
                                <img width="100%" src="<?php echo $documentRoot; ?>/images/invoice/1280x500xh.png" alt=" " />
                            <?php } ?>
                        <?php } ?>  
                                </td>
                            </tr>
                        </table>
                        
                    </td>
                </tr>
                <!--//===================================================================================================
                   //====================== END CODE FOR ADD HEADER FIRM INFO IMG @SIMRAN:30MAR2023=====================//
                   //===================================================================================================-->
            <tr>
                 
                <td>
                    <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" bgcolor="#FFFFFF" 
                           style="width:<?php echo $formWidth . 'mm'; ?>;" width="100%">
                               <?php 
                              // if ($rowFormEight['fes_header_display'] != 'notDisplay') {?>
                            <tr> 
                                
                                <td align="left" colspan="14" valign="top">
                                    <table border="0" cellpadding="0" width="100%" cellspacing="0" valign="top" style="height:<?php echo $headerSecWidth . 'mm'; ?>">                                     
    <!--                                             <tr>
                        <td align="left" colspan="3" class="paddingTop1 paddingBott1">
                            <div class="hrGrey"></div>
                        </td>
                    </tr>-->
                                        <tr>
                                            <?php 
                                            $fieldName = 'firmLeftLogoCheck';
                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            //
                                            if ($rowFormEight['fes_header_display'] != 'blank' && ($rowFormEight['fes_firm_left_logo_check'] == 'on' || $label_field_check == 'true') && ($firm_left_thumb_ftype != NULL || $firm_left_thumb_ftype != '')) { ?>
                                                <?php
                                                $firmId = $firm_id;
                                                $noEcho = 'Y';
                                                include('omffgfli.php');
                                                $noEcho = '';
                                                ?>
                                                <td align="left" valign="top" width="20%">
                                                    <div><?php  if ($label_field_check =='true') { ?>
<!--                                                        <img src="<?php echo $documentRootBSlash; ?>/include/php/omffgfli.php?firm_id=<?php echo $firm_id; ?>" 
                                                             alt="" class="<?php echo $imageClass; ?>"/>-->
                                                         <img style="max-height:120px;max-width:160px; width: 100%;height: 100%;object-fit: contain" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($firmThumb); ?>"
                                                                         alt="" class="<?php echo $imageClass; ?>"/>
                                                    <?php }?>
                                                    </div>
                                                </td>
                                           <?php } ?>
                                                
                                            <td align="center" width="60%">
                                                <table border="0" cellpadding="0" width="100%" cellspacing="0" align="center">
                                                     <?php 
                                        $fieldName = 'firmUdhaarInvFormHeader';
                                          parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        //
                                        if ($rowFormEight['fes_form_header_check'] == 'on' && $label_field_check =='true') { ?>
                                            <tr> 
                                                <td valign="top" colspan="3" align="center" class="ff_calibri font_color_<?php echo $rowFormEight['fes_form_header_color']; ?>" style="font-weight:600;padding:5px 0;font-size:<?php echo $rowFormEight['fes_form_header_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                    <?php 
                                                    
                                                    if ($rowFormEight['fes_header_display'] != 'blank') echo 'SHUBH LABH'; ?>
                                                </td>
                                                <!--echo $firm_form_header;-->
                                            </tr>
                                        <?php }?>
                                            
                                             <?php if ($rowFormEight['fes_header_display'] != 'blank' && ($rowFormEight['fes_header_left_section'] != '' || $rowFormEight['fes_header_right_section'] != '') && ($rowFormEight['fes_header_left_sec_check'] == 'on' || $rowFormEight['fes_header_right_sec_check'] == 'on')) { ?>
                                            <tr> 
                                                <td align="left" colspan="3">
                                                    <table border="0" cellpadding="0" width="100%" cellspacing="0">
                                                        <tr>
                                                            <?php if ($rowFormEight['fes_header_display'] != 'blank' && $rowFormEight['fes_header_left_sec_check'] == 'on' && $rowFormEight['fes_header_left_section'] != '') { ?>
                                                                <td align="left"  class="paddingLeft2 paddingTop5 ff_calibri font_color_<?php echo $rowFormEight['fes_header_left_section_color']; ?>" style="font-size:<?php echo $rowFormEight['fes_header_left_section_font']; ?>px">
                                                                    <?php echo $rowFormEight['fes_header_left_section']; ?>
                                                                </td>
                                                            <?php } if ($rowFormEight['fes_header_display'] != 'blank' && $rowFormEight['fes_header_right_sec_check'] == 'on' && $rowFormEight['fes_header_right_section'] != '') { ?>
                                                                <td align="right" class="paddingTop5 ff_calibri font_color_<?php echo $rowFormEight['fes_header_right_section_color']; ?>" style="font-size:<?php echo $rowFormEight['fes_header_right_section_font']; ?>px">
                                                                    <?php echo $rowFormEight['fes_header_right_section']; ?>
                                                                </td>
                                                            <?php } ?>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                            <?php 
                                         $fieldName = 'firmUdhaarHeaderDetails';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        //
                                        if ($rowFormEight['fes_header_display'] != 'notDisplay' && $label_field_check == 'true' ) { ?>
                                            <tr> 
                                                <td valign="middle" colspan="3" align="center" class="ff_calibri font_color_<?php echo $rowFormEight['fes_header_color']; ?>" style="font-size:<?php echo $rowFormEight['fes_header_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                    <?php if ($rowFormEight['fes_header_display'] != 'blank') echo $headerLabel; ?>
                                                </td>
                                            </tr>
                                        <?php } 
                                        $fieldName = 'firmUdhaarInvLongName';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        //
                                        if (($rowFormEight['fes_firm_name_check'] == 'on' && $firm_long_name != NULL) && $label_field_check == 'true') { ?>
                                            <tr> 
                                                <td valign="middle" colspan="3" align="center" class="ff_calibri font_color_<?php echo $rowFormEight['fes_firm_name_color']; ?>" style="font-size:<?php echo $rowFormEight['fes_firm_name_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                    <?php if ($rowFormEight['fes_header_display'] != 'blank') $firm_long_name=stripcslashes($firm_long_name); echo $firm_long_name; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                            
                                        <?php  
                                                    $fieldName = 'firmUdhaarInvDesc';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    //
                                                    if (($rowFormEight['fes_firm_desc_check'] == 'on' && $firm_desc != NULL) && $label_field_check == 'true') { ?>
                                                        <tr> 
                                                            <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $rowFormEight['fes_firm_desc_color']; ?>" style="font-size:<?php echo $rowFormEight['fes_firm_desc_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                                <?php if ($rowFormEight['fes_header_display'] != 'blank') echo $firm_desc; ?>
                                                            </td>
                                                        </tr>
                                                    <?php } 
                                                    $fieldName = 'firmUdhaarInvAddress';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    //
                                                    if (($rowFormEight['fes_firm_address_check'] == 'on' && $firm_address != NULL) && $label_field_check == 'true') { ?>
                                                        <tr> 
                                                            <?php
                                                            $fieldName = 'firmUdhaarInvAddressLb';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $rowFormEight['fes_firm_address_color']; ?>"  style="font-size:<?php echo $rowFormEight['fes_firm_address_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                                <b><?php echo $label_field_content.' :'; ?>&nbsp;</b>
                                                                <?php echo $firm_address; ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    if ($form8Lay != 'form8Lay4Inch' && $form8Lay != 'form8LayA6') {
                                                       
                                                      //  if (($rowFormEight['fes_firm_phone_check'] == 'on' && $firm_phone_details != NULL) || ($rowFormEight['fes_firm_email_check'] == 'on' && $firm_email != NULL) || $label_field_check == 'true') {
                                                            ?>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                                        <tr>
                                                                            <?php 
                                                                            $fieldName = 'firmUdhaarInvPhone';
                                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                            //
                                                                            if (($rowFormEight['fes_header_display'] != 'blank' && $rowFormEight['fes_firm_phone_check'] == 'on' && $firm_phone_details != NULL) && $label_field_check == 'true') { ?>
                                                                                <?php
                                                                                $fieldName = 'firmUdhaarInvPhoneLb';
                                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                                ?>
                                                                            <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $rowFormEight['fes_firm_phone_color']; ?>" style="font-size:<?php echo $rowFormEight['fes_firm_phone_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                                                    <b><?php echo $label_field_content.' :'; ?>&nbsp;</b>
                                                                                        <?php echo $firm_phone_details; ?>
                                                                                </td>
                                                                            <?php } 
                                                                            $fieldName = 'firmUdhaarInvEmail';
                                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                            //
                                                                            if (($rowFormEight['fes_header_display'] != 'blank' && $rowFormEight['fes_firm_email_check'] == 'on' && $firm_email != NULL) && $label_field_check == 'true') { ?>
                                                                                
                                                                                 <?php
                                                                                $fieldName = 'firmUdhaarInvEmaillb';
                                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                                ?>
                                                                                <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $rowFormEight['fes_firm_email_color']; ?> padLeft5" style="font-size:<?php echo $rowFormEight['fes_firm_email_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                                                    <b> <?php echo $label_field_content.' :'; ?>&nbsp; </b>
                                                                                        <?php echo $firm_email; ?>
                                                                                </td>
                                                                            <?php } ?>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                       // }
                                                    }if ($form8Lay == 'form8Lay4Inch' || $form8Lay == 'form8LayA6') {
                                                        ?>
                                                        <?php 
                                                        $fieldName = 'firmUdhaarInvPhone';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        //
                                                        if (($rowFormEight['fes_header_display'] != 'blank' && $rowFormEight['fes_firm_phone_check'] == 'on' && $firm_phone_details != NULL)|| $label_field_check == 'true') { ?>
                                                            <tr>       
                                                                <?php
                                                                 $fieldName = 'firmUdhaarInvPhoneLb';
                                                                 parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                 ?>
                                                                <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $rowFormEight['fes_firm_phone_color']; ?>" style="font-size:<?php echo $rowFormEight['fes_firm_phone_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                                    <b><?php echo $label_field_content.' :'; ?>&nbsp;</b>
                                                                        <?php echo $firm_phone_details; ?>
                                                                </td>
                                                            </tr>
                                                        <?php } 
                                                         $fieldName = 'firmUdhaarInvEmail';
                                                         parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                         //
                                                        if (($rowFormEight['fes_header_display'] != 'blank' && $rowFormEight['fes_firm_email_check'] == 'on' && $firm_email != NULL)|| $label_field_check == 'true') { ?>
                                                            <tr>
                                                                <?php
                                                                                $fieldName = 'firmUdhaarInvEmaillb';
                                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                                ?>
                                                                <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $rowFormEight['fes_firm_email_color']; ?> padLeft5" style="font-size:<?php echo $rowFormEight['fes_firm_email_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                                    <b><?php echo $label_field_content.' :'; ?>&nbsp;</b>
                                                                    <?php echo $firm_email; ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>

                                                    <?php } 
                                                    $fieldName = 'firmUdhaarInvRegNo';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    //
                                                    if ($rowFormEight['fes_firm_regno_check'] == 'on' || $label_field_check  == 'true') { ?>
                                                        <tr> 
                                                            <?php if ($rowFormEight['fes_header_display'] != 'blank') { ?>
                                                                    
                                                                    <?php
                                                                    $fieldName = 'firmUdhaarInvRegNoLabel';
                                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                    ?>
                                                                <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $rowFormEight['fes_firm_regno_color']; ?>" style="font-size:<?php echo $rowFormEight['fes_firm_regno_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                                    <b><?php echo $label_field_content.' :'; ?></b>
                                                                    <?php echo $firm_reg_no; ?>
                                                                </td>
                                                            <?php } ?>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </td>
                                            <?php if ($rowFormEight['fes_header_display'] != 'blank') { ?>
                                                <?php 
                                                $fieldName = 'firmRightLogoCheck';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                //
                                                if (($rowFormEight['fes_firm_right_logo_check'] == 'on' || $label_field_check  == 'true') && ($firm_right_thumb_ftype != NULL || $firm_right_thumb_ftype != '')) { ?>
                                            <?php
                                                    $firmId = $firm_id;
                                                    $noEcho = 'Y';
                                                    include('omffgfri.php');
                                                    $noEcho = '';
                                                    ?>
                                                    <td align="right" valign="top" width="20%">
                                                        <div align="right">
                                                            <?php 
                                                             if ($label_field_check =='true') { 
                                                            if ($rowFormEight['fes_form_right_logo'] == 'custPhoto') { ?>
                                                                <img src="<?php echo $documentRoot; ?>/include/php/omccgcim.php?user_id=<?php echo "$custId"; ?>"
                                                                     class="<?php echo $imageClass; ?>" /> 
                                                                 <?php } else { ?>
<!--                                                                <img src="<?php echo $documentRootBSlash; ?>/include/php/omffgfri.php?firm_id=<?php echo $firm_id; ?>" 
                                                                     alt="" class="<?php echo $imageClass; ?>" />-->

                                                                            <img style="max-height:120px;max-width:160px; width: 100%; height: 100%; object-fit: contain" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($firmThumb); ?>"
                                                                                 alt="" class="<?php echo $imageClass; ?>"/>
                                                                 <?php } } ?>
                                                        </div>
                                                    </td>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        <?php //} ?>

                        <tr>
                            <td align="left" colspan="2" class="paddingTop1 paddingBott1">
                            </td>
                        </tr>
                        <tr style="background: #f2f2f2;">
                            <td align="left" colspan="2" style="padding:3px;">
                                <table border="0" cellpadding="0" width="100%" cellspacing="0">
                                    <tr>
                                    <?php 
                                    $fieldName = 'udhaarInvNo';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    $gstFontSizeLb = $label_field_font_size;
                                    if ($label_field_check == 'true') {
                                    $fieldName = 'udhaarInvNoLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                              ?>
                                        <td align="left">
                                            <div class="paddingLeft2 ff_calibri font_color_black" style="font-size:13px;" onClick="this.contentEditable = 'true';"><b><?php echo $label_field_content;?>:&nbsp;</b><?php echo $udhaarPreNo . ' ' . $udhaarNo; ?></div> 
                                        </td>
                            <?php } else{
                                  $fieldName = 'udhaarInvNo';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                          
                            if ($label_field_check == 'true') { ?>
                                        <td align="left">
                                            <div class="paddingLeft2 ff_calibri font_color_black" style="font-size:13px;" onClick="this.contentEditable = 'true';"><b>UDHAAR NO:&nbsp;</b><?php echo $udhaarPreNo . ' ' . $udhaarNo; ?></div> 
                                        </td>
                                         <?php 
                            } }
                              $fieldName = 'udhaarInvDate';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $gstFontSizeLb = $label_field_font_size;
                            if ($label_field_check == 'true') {
                                $fieldName = 'udhaarInvDateLb';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                              ?> 
                                        <td align="right" class="">
                                            <div class="paddingRight2 ff_calibri font_color_black" style="font-size:13px;"onClick="this.contentEditable = 'true';"><b><?php echo $label_field_content;?>:&nbsp;</b>
                                                <?php echo $udhaarDOB; ?>
                                            </div> 
                                        </td>
                            <?php }else {
                                if ($label_field_check == 'true') { ?>
                                        <td align="right" class="">
                                            <div class="paddingRight2 ff_calibri font_color_black" style="font-size:13px;"onClick="this.contentEditable = 'true';"><b>UDHAAR DATE:&nbsp;</b>
                                                <?php echo $udhaarDOB; ?>
                                            </div> 
                                        </td>
                                <?php } } ?>
                                    </tr>
                                              <tr>
                                    <?php 
                                    $fieldName = 'mainInvNo';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    $gstFontSizeLb = $label_field_font_size;
                                    if ($label_field_check == 'true' && $udhaarMainInvNo != '') {
                                    $fieldName = 'mainInvNoLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                              ?>
                                        <td align="left">
                                            <div class="paddingLeft2 ff_calibri font_color_black" style="font-size:13px;" onClick="this.contentEditable = 'true';"><b><?php echo $label_field_content;?>:&nbsp;</b><?php echo $udhaarMainInvNo; ?></div> 
                                        </td>
                            <?php } else{
                                  $fieldName = 'mainInvNo';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                          
                            if ($label_field_check == 'true' && $udhaarMainInvNo != '') { ?>
                                        <td align="left">
                                            <div class="paddingLeft2 ff_calibri font_color_black" style="font-size:13px;" onClick="this.contentEditable = 'true';"><b>UDHAAR MAIN NO:&nbsp;</b><?php echo $udhaarMainInvNo; ?></div> 
                                        </td>
                                         <?php 
                            } }
                             ?>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                          
                        <tr>
                            <td align="left" colspan="2" class="paddingTop1 paddingBott1">
                                <div class="hrGrey"></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table border="0" cellpadding="2" cellspacing="0" width="100%" >
                                    <tr>
                                        <?php 
                                        $fieldName = 'userUdhaarInvName';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        //
                                        if ($rowCustDetails['user_fname'] != '' && $label_field_check == 'true') { ?> 
                                            <td align="left" colspan="2">
                                                <?php
                                                $fieldName = 'userUdhaarInvNameLb';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <div class="ff_calibri fw_n font_color_black" style="font-size:13px;" onClick="this.contentEditable = 'true';">
                                                    <b><?php echo $label_field_content; ?>:&nbsp;</b>
                                                    <?php echo om_strtoupper($rowCustDetails['user_fname']) . ' ' . om_strtoupper($rowCustDetails['user_lname']);
                                                    ?>
                                                </div> 
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($utin_staff_id != null && $utin_staff_id != '') {
                                            parse_str(getTableValues("SELECT user_fname as staff_fname , user_lname as staff_lname from user where user_type='STAFF' and user_id='$utin_staff_id'"));
                                            ?>
                                            <?php if ($staff_fname != '') { ?> 
                                                <td align="right" colspan="2">
                                                    <div class="ff_calibri fw_n font_color_black" style="font-size:13px;" onClick="this.contentEditable = 'true';">
                                                        <b>STAFF NAME:&nbsp;</b>
                                                        <?php echo om_strtoupper($staff_fname) . ' ' . om_strtoupper($staff_lname);
                                                        ?>
                                                    </div> 
                                                </td>
                                            <?php }
                                        } ?>
                                    </tr>
<!--
                                    <tr> 
                                           <?php // if ($fatherOrSpouseName != '') { ?> 
                                            <td align="left" class="ff_calibri fes_12 black" colspan="2" style="padding:2px 2px;">
                                                <div class="ff_calibri fw_n font_color_black" style="font-size:13px;" onClick="this.contentEditable = 'true';">
                                                    <b><?php 
                                                    //cahnges made beacause the lable spouse name is showing insted of the father name and add the new filed mother name  @omkar10JAN2024
//                                                        if ($checkFatherOrSpouse == 'F' || $checkFatherOrSpouse == 'D' || $checkFatherOrSpouse == 'S')
//                                                            echo 'FATHER NAME:';
//                                                        else if ($checkFatherOrSpouse == 'C')
//                                                            echo 'GUARDIAN NAME:';
//                                                        else if ($checkFatherOrSpouse == 'W')
//                                                            echo 'SPOUSE NAME:';
//                                                            else if ($checkFatherOrSpouse == 'M')
//                                                            echo 'MOTHER NAME:';
//                                                        ?>
                                                    </b>  <?php // echo om_strtoupper($fatherOrSpouseName); ?>
                                                </div>
                                            </td>
<?php // } ?>
                                    </tr>-->
                                    <!--Start code to change the conditiond Author:GAUR30MAY16-->
                                   
<?php 
$fieldName = 'userUdhaarInvAddress';
parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//
if ($custAddress != '' && $label_field_check == 'true') { ?>
                                    
                                   
                                            <?php if($custAddress != '' || $custAddress != null){?>
                                      <tr>
                                            <td align="left">
                                                <?php
                                                $fieldName = 'userUdhaarInvAddressLb';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <div class="ff_calibri fw_n font_color_black" style="font-size:13px;" 
                                                     onClick="this.contentEditable = 'true';">
                                                    <b><?php echo $label_field_content; ?>:&nbsp;</b>
                                                <?php echo om_strtoupper($custAddress); ?>
                                                </div> 
                                            </td>
                                        </tr>
                                        
                                            <?php } if ($custVillage != '' || $custVillage != null ) { ?> 
<!--                                        <tr>
                                            <td align="left">
                                                <div class="ff_calibri fw_n font_color_black" style="font-size:13px;" 
                                                     onClick="this.contentEditable = 'true';"><b>VILLAGE:&nbsp;</b>
                                                    <?php echo om_strtoupper($custVillage); ?>
                                                </div> 
                                            </td>
                                        </tr>-->
                                        <?php } if ($custTehsil != '' ||$custTehsil != null) { ?> 
<!--                                        <tr>
                                            <td align="left">
                                                <div class="ff_calibri fw_n font_color_black" style="font-size:13px;" 
                                                     onClick="this.contentEditable = 'true';"><b>TEHSIL:&nbsp;</b>
                                                       <?php echo om_strtoupper($custTehsil); ?>
                                                </div> 
                                            </td>
                                        </tr>-->

                            </td>     
                        </tr> 
<?php } } ?>
                        <tr>                       
                        <?php 
                        $fieldName = 'userCity';
parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='$fieldName'  and label_type = '$labelType' "));
if ($custCity != '' && $label_field_check == 'true') { ?> 
                                     <?php if($custCity != '' || $custCity != null){ ?>
                        
                                <td align="left">
                                    <?php
                                        $fieldName = 'userCityLb';
                                         parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                     ?>
                                    <div class="ff_calibri fw_n font_color_black" style="font-size:13px;" 
                                         onClick="this.contentEditable = 'true';">
                                        <b><?php echo $label_field_content;?>:&nbsp;</b>
                                        <?php echo om_strtoupper($custCity); ?>
                                    </div> 
                                </td>
                                <?php } }
//if ($custPinCode != '') { 
//    
?>
                                <?php
                        $fieldName = 'StaffCode';
                        
parse_str(getTableValues(" SELECT label_field_check,label_field_content,label_field_font_color,label_field_font_size FROM labels WHERE label_field_name ='$fieldName'  and label_type = '$labelType' "));
if ($label_field_check == 'true') { ?>
                                <?php 
                                        if ($utin_staff_id != null && $utin_staff_id != '')
                                            parse_str(getTableValues("SELECT user_fname as staff_fname , user_lname as staff_lname , user_login_id as staffc from user where user_type='STAFF' and user_id='$utin_staff_id'"));
                                            ?>
                                            <?php if ($staffc != '') { ?> 
                                                <td align="right" colspan="2">
                                                    <div class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <b>STAFF CODE:&nbsp;</b>
                                                        <?php echo $staffc;
                                                        ?>
                                                    </div> 
                                                </td>
                                            <?php 
                                            }
                                        } ?>
                        </tr>

<!--                                <tr>
                                <td align="left">
                                    <div class="ff_calibri fw_n font_color_black" style="font-size:13px;" 
                                         onClick="this.contentEditable = 'true';"><b>PIN CODE:&nbsp;</b>
    <?php // echo om_strtoupper($custPinCode); ?>
                                    </div> 
                                </td>
                                </tr>-->
                                
<?php 

$fieldName = 'userUdhaarInvContact';
parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//
if ($custPhoneNo != '' && $label_field_check == 'true') { ?>
                                <?php if ($custPhoneNo != '' || $custPhoneNo != null ) { ?> 
                                <tr>
                                <td align="left">
                                    <?php
                                        $fieldName = 'userUdhaarInvContactLb';
                                         parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                     ?>
                                    <div class="ff_calibri fw_n font_color_black" style="font-size:13px;"
                                         onClick="this.contentEditable = 'true';">
                                        <b><?php echo $label_field_content;?>:&nbsp;</b>
                                        <?php echo om_strtoupper($custPhoneNo); ?>
                                    </div> 
                                </td>

                                </tr>

                        </tr>
                        <?php }} ?>
                        <!--Start code to change the conditiond Author:GAUR30MAY16-->
                                                        
<?php 

$fieldName = 'userUdhaarInvEmail';
parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//
if ($custEmail != '' && $label_field_check == 'true') { ?>
                                <?php if ($custEmail != '' || $custEmail != null ) { ?> 
                                <tr>
                                <td align="left">
                                     <?php
                                        $fieldName = 'userUdhaarInvEmailLb';
                                         parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                     ?>
                                    <div class="ff_calibri fw_n font_color_black" style="font-size:13px;"
                                         onClick="this.contentEditable = 'true';">
                                        <b><?php echo $label_field_content;?>:&nbsp;</b>
                                         <?php echo om_strtoupper($custEmail); ?>
                                    </div> 
                                </td>

                                </tr>

                        </tr>
                        <?php }} ?>
                    </table>
                </td>
            </tr>
<!--                        <tr>
                <td align="left" colspan="2" class="paddingTop1 paddingBott1">
                    <div class="hrGrey"></div>
                </td>
            </tr>-->
             <tr style="background: #062ea6;height:26px;"> 
                <?php
                $fieldName = 'udhaarInvTitle';
                $label_field_font_size = '';
                $label_field_font_color = '';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                $gstFontSizeLb = $label_field_font_size;
                if ($label_field_check == 'true') {
                ?> 
                
                <td colspan="14" valign="middle" align="center">
                    <div class="ff_calibri fw_n font_color_blue" style="font-size:14px;color:#fff;" onclick="this.contentEditable = 'true';">
                        <b><?php echo $label_field_content; ?></b> 
                        <?php }else{ ?>
                     <b>UDHAAR DETAILS</b>
                     <?php } ?>
                    </div>
                </td>       
            </tr>
            <?php 
                $query = "SELECT utin_id,utin_utin_id,utin_type,utin_transaction_type,utin_pre_invoice_no,utin_invoice_no,utin_date,utin_firm_id,utin_cash_amt_rec,utin_pay_cheque_amt,utin_pay_card_amt,utin_online_pay_amt FROM user_transaction_invoice where utin_id='$udhaarDepId' and (utin_transaction_type ='UDHAAR DEPOSIT')";
//             echo '$query-->'.$query.'<br>';
               $res = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($res);
                                        $cashAmount = $row['utin_cash_amt_rec'];
                                       
                                        $adminOnlineAmount = $row['utin_online_pay_amt'];
                                        $adminCardAmount = $row['utin_pay_card_amt'];
                                        $chequeAmount = $row['utin_pay_cheque_amt'];
            ?>
            <tr>
                <td align="left" colspan="2">
                    <table border="0" cellpadding="0" cellspacing="2" width="100%" align="left">
                        <tr>
                            <td align="left" width="40%">
                                <table border="0" cellpadding="0" cellspacing="2" width="100%" align="left" style="">
                                           <?php
                                            $fieldName = 'cashPayAmt';
                                            parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='$fieldName' and label_type = '$labelType'"));
                                            
                                            if ($label_field_check == 'true' && $cashAmount!= '' && $cashAmount != 0 && $udhaarMainInv != 'udharMainInvoice') {
                                                
                                                ?>                                     
                                                <tr>
                                                        <td align="right" width="120">
                                                        <?php
                                                        $fieldName = 'cashPayAmtLb';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                            <div class="ff_calibri font_color_<?php echo $label_field_font_color; ?>"  style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;" onClick="this.contentEditable = 'true';">
                                                                <?php echo $label_field_content; ?>:&nbsp;
                                                                &nbsp;
                                                            </div> 
                                                        </td>
                                                        
                                                        <?php
                                            $fieldName = 'cashPayAmt';
                                            parse_str(getTableValues(" SELECT label_field_font_size,label_field_font_color FROM labels WHERE label_field_name ='$fieldName' and label_type = '$labelType'")); ?>
                                                        <td align="right" width="40%" class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                                    <?php 
                                                    echo $cashAmount.''; ?>/-
                                                         </td>
    <?php } ?>
                                                </tr>
                                                   <?php 
                                            $fieldName = 'onlinePayAmt';
                                            parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='$fieldName' and label_type = '$labelType'"));

                                            if ($label_field_check == 'true' && $adminOnlineAmount!= '0.00' && $udhaarMainInv != 'udharMainInvoice' && $adminOnlineAmount != '') {
                                                ?>                                     
                                                <tr>
                                                        <td align="right" width="120">
                                                        <?php
                                                        $fieldName = 'onlinePayAmtLb';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_type = '$labelType' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                            <div class="ff_calibri font_color_<?php echo $label_field_font_color; ?>"  style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;" onClick="this.contentEditable = 'true';">
                                                                <?php echo $label_field_content ?>:&nbsp;
                                                            </div> 
                                                        </td>
                                                        
                                                        <?php
                                            $fieldName = 'onlinePayAmt';
                                            parse_str(getTableValues(" SELECT label_field_font_size,label_field_font_color FROM labels WHERE label_field_name ='$fieldName' and label_type = '$labelType'")); ?>
                                                        <td align="right" width="40%" class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                                   <?php echo $adminOnlineAmount ?>/-
                                                        </td>
    <?php } ?>
                                                </tr>
                                                   <?php
                                            $fieldName = 'cardePayAmt';
                                            parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='$fieldName' and label_type = '$labelType'"));

                                            if ($label_field_check == 'true' && $adminCardAmount!= '0.00' && $udhaarMainInv != 'udharMainInvoice' && $adminCardAmount != '') {
                                                ?>                                     
                                                <tr>
                                                        <td align="right" width="120">
                                                        <?php
                                                        $fieldName = 'cardePayAmtLb';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_type = '$labelType'  and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                            <div class="ff_calibri font_color_<?php echo $label_field_font_color; ?>"  style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;" onClick="this.contentEditable = 'true';">
                                                                <?php echo $label_field_content ; ?> 
                                                                    :&nbsp;
                                                            </div> 
                                                        </td>
                                                        
                                                        <?php
                                            $fieldName = 'cardePayAmt';
                                            parse_str(getTableValues(" SELECT label_field_font_size,label_field_font_color FROM labels WHERE label_field_name ='$fieldName' and label_type = '$labelType'")); ?>
                                                        <td align="right" width="40%" class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                                   <?php echo $adminCardAmount ?>/-
                                                        </td>
    <?php } ?>
                                                </tr>
                                                                <?php
                                            $fieldName = 'chequePayAmt';
                                            parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='$fieldName'and label_type = '$labelType'"));
                                            if ($label_field_check == 'true' && $chequeAmount != '' && $udhaarMainInv != 'udharMainInvoice') {
                                                ?>                                     
                                                <tr>
                                                        <td align="right" width="120">
                                                        <?php
                                                        $fieldName = 'chequePayAmtLb';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_type = '$labelType' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                            <div class="ff_calibri font_color_<?php echo $label_field_font_color; ?>"  style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;" onClick="this.contentEditable = 'true';">
                                                                <?php echo $label_field_content .':'; ?> 
                                                               
                                                            </div> 
                                                        </td>
                                                        
                                                        <?php
                                            $fieldName = 'chequePayAmt';
                                            parse_str(getTableValues(" SELECT label_field_font_size,label_field_font_color FROM labels WHERE label_field_name ='$fieldName' and label_type = '$labelType' and label_type = '$labelType' ")); ?>
                                                        <td align="right" width="40%" class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                                   <?php echo $chequeAmount ?>/-
                                                        </td>
    <?php } ?>
                                                </tr>
                                </table>
                                
                            </td>
                            <td align="left" width="60%">
                                <table border="0" cellpadding="0" cellspacing="2" width="100%" align="left" style="background:#f5f5f5;">
                                    <tr>
                                <?php
                                $fieldName = 'udhaarAmt';
                                parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='$fieldName' "));
                                
                                if ($label_field_check == 'true') {
                                    ?>
                                        <td align="right" width="120">
                                    <?php
                                    $fieldName = 'udhaarAmtLb';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                            <div class="ff_calibri font_color_black"  style="font-size:12px;font-weight:600;" onClick="this.contentEditable = 'true';">
                                                <?php echo $label_field_content; ?>:&nbsp;
                                            </div> 
                                        </td>
                                        <td align="right" width="40%" class="ff_calibri  font_color_black" style="font-size:14px;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                                <?php echo (abs($udhaarAmount)); ?>/-
                                        </td>
                                                        <?php
                                                    }
                                                    ?>
                                </tr>
                                  <tr>
                                            <?php
                                            $fieldName = 'cashPayAmt';
                                            parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='$fieldName'"));
                                            
                                            if ($label_field_check == 'true' && $Udhaarcashamt!= '') {
                                                
                                                ?>                                     
                                                <tr>
                                                        <td align="right" width="120">
                                                        <?php
                                                        $fieldName = 'cashPayAmtLb';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                            <div class="ff_calibri font_color_<?php echo $label_field_font_color; ?>"  style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;" onClick="this.contentEditable = 'true';">
                                                                <?php echo $label_field_content.'(CASH)'; ?>:&nbsp;
                                                                <?php if($label_field_content!='' && $label_field_content==''){
                                            echo 'CASH AMT';}?>:&nbsp;
                                                            </div> 
                                                        </td>
                                                        
                                                        <?php
                                            $fieldName = 'cashPayAmt';
                                            parse_str(getTableValues(" SELECT label_field_font_size,label_field_font_color FROM labels WHERE label_field_name ='$fieldName'")); ?>
                                                        <td align="right" width="40%" class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                                    <?php 
                                                    echo $Udhaarcashamt.''; ?>/-
                                                         </td>
    <?php } ?>
                                                </tr>
                                                <?php 
                                            $fieldName = 'onlinePayAmt';
                                            parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='$fieldName'"));

                                            if ($label_field_check == 'true' && $udhaaronlineamt!= '0.00') {
                                                ?>                                     
                                                <tr>
                                                        <td align="right" width="120">
                                                        <?php
                                                        $fieldName = 'onlinePayAmtLb';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                            <div class="ff_calibri font_color_<?php echo $label_field_font_color; ?>"  style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;" onClick="this.contentEditable = 'true';">
                                                                <?php //echo $label_field_content ?>
                                                                  <?php if($label_field_content!='' && $label_field_content==''){
                                            echo 'ONLINE AMT'.'('.$udhaaronlinepaynarratn.')' ;}?>:&nbsp;
                                                            </div> 
                                                        </td>
                                                        
                                                        <?php
                                            $fieldName = 'onlinePayAmt';
                                            parse_str(getTableValues(" SELECT label_field_font_size,label_field_font_color FROM labels WHERE label_field_name ='$fieldName'")); ?>
                                                        <td align="right" width="40%" class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                                   <?php echo $udhaaronlineamt ?>/-
                                                        </td>
    <?php } ?>
                                                </tr>
                                                   <?php
                                            $fieldName = 'cardePayAmt';
                                            parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='$fieldName'"));

                                            if ($label_field_check == 'true' && $udhaarcardamt!= '0.00') {
                                                ?>                                     
                                                <tr>
                                                        <td align="right" width="120">
                                                        <?php
                                                        $fieldName = 'cardePayAmtLb';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                            <div class="ff_calibri font_color_<?php echo $label_field_font_color; ?>"  style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;" onClick="this.contentEditable = 'true';">
                                                                <?php //echo $label_field_content ; ?> 
                                                                    <?php 
                                                                    if($label_field_content!='' && $label_field_content==''){
                                            echo  'CARD AMT'.'('.$udhaarcardno.')'  ;}?>:&nbsp;
                                                            </div> 
                                                        </td>
                                                        
                                                        <?php
                                            $fieldName = 'cardePayAmt';
                                            parse_str(getTableValues(" SELECT label_field_font_size,label_field_font_color FROM labels WHERE label_field_name ='$fieldName'")); ?>
                                                        <td align="right" width="40%" class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                                   <?php echo $udhaarcardamt ?>/-
                                                        </td>
    <?php } ?>
                                                </tr>
                                                 <?php
                                            $fieldName = 'chequePayAmt';
                                            parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='$fieldName'"));

                                            if ($label_field_check == 'true' && $udhaarchequeamt!= '') {
                                                ?>                                     
                                                <tr>
                                                        <td align="right" width="120">
                                                        <?php
                                                        $fieldName = 'chequePayAmtLb';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                            <div class="ff_calibri font_color_<?php echo $label_field_font_color; ?>"  style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;" onClick="this.contentEditable = 'true';">
                                                                <?php //echo $label_field_content ; ?> 
                                                                  <?php  if($label_field_content!='' && $label_field_content==''){
                                            echo  'CHEQUE AMT'.'('.$udhaarchequeno.')'  ;}?>:&nbsp;
                                                            </div> 
                                                        </td>
                                                        
                                                        <?php
                                            $fieldName = 'chequePayAmt';
                                            parse_str(getTableValues(" SELECT label_field_font_size,label_field_font_color FROM labels WHERE label_field_name ='$fieldName'")); ?>
                                                        <td align="right" width="40%" class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                                   <?php echo $udhaarchequeamt ?>/-
                                                        </td>
    <?php } ?>
                                                </tr>
                                    <?php
                                     $qSelAllUdhaarDepMon = "SELECT * FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_user_id='$custId' and utin_utin_id='$udhaarId' and (utin_EMI_status  IN ('Paid') or utin_EMI_status IS NULL) order by utin_date asc";
                                    $resAllUdhaarDepMon = mysqli_query($conn, $qSelAllUdhaarDepMon)or die(mysqli_error($conn));
                                    while ($rowUdhaarDepMon = mysqli_fetch_array($resAllUdhaarDepMon, MYSQLI_ASSOC)) {
                                        $udhaarDepId = $rowUdhaarDepMon['utin_id'];
                                        if($rowUdhaarDepMon['utin_transaction_type'] == 'UDHAAR DEPOSIT' && $udhaarDepId45 >= $udhaarDepId ){
                                             $udhaarTotalDepAmount1 = $udhaarTotalDepAmount1 + $rowUdhaarDepMon['utin_total_amt_deposit'];
                                            $udhaarTotalDiscAmt1 = $udhaarTotalDiscAmt1 + $rowUdhaarDepMon['utin_discount_amt'];
                                        }
//                                        echo '$udhaarDepId==>'.$udhaarDepId."<Br>";
//                                        echo '$udhaarDepId45==>'.$udhaarDepId45."<Br>";
                                         if($udhaarMainInv == 'udharMainInvoice' || $udhaarDepId==$udhaarDepId45){
                                             
                                        $udhaarDepAmount = $rowUdhaarDepMon['utin_total_amt_deposit']; //($rowUdhaarDepMon['utin_cash_amt_rec'] + $rowUdhaarDepMon['utin_pay_cheque_amt'] + ($rowUdhaarDepMon['utin_pay_card_amt'] + $rowUdhaarDepMon['utin_pay_trans_chrg']) + ($rowUdhaarDepMon['utin_online_pay_amt'] - $rowUdhaarDepMon['utin_pay_comm_paid']) + $rowUdhaarDepMon['utin_discount_amt']);
                                        $udhaarDiscAmount = $rowUdhaarDepMon['utin_discount_amt'];
                                          if($nepaliDateIndicator == 'YES') {
                                         $udhaarDepDOB = $rowUdhaarDepMon['utin_other_lang_date'];
                                        
                                         }else{
                                        $udhaarDepDOB = $rowUdhaarDepMon['utin_date'];
                                        }
                                        $udhaarDepHistory = $udhaarDepHistory . $rowUdhaarDepMon['utin_history'];
                                        $udhaarTotalDepAmount = $udhaarTotalDepAmount + $udhaarDepAmount;
                                        $udhaarTotalDiscAmt = $udhaarTotalDiscAmt + $udhaarDiscAmount;
                                        $udhaarDepUpdStatus = $rowUdhaarDepMon['utin_status'];
                                        $udhaarDepComm = $rowUdhaarDepMon['utin_comm'];
                                        //
                                        $udhaarIntAmount = $rowUdhaarDepMon['utin_udhaar_int_amt'];
                                        //
                                        //echo '$udhaarIntAmount == ' . $udhaarIntAmount . '<br />';
                                        //
                                        ?>
                                        <tr>
                                            <td align="left" colspan="2">
                                                <table border="0" cellpadding="0" cellspacing="2" width="100%">
                        <?php 
                        $fieldName = 'udhaarDepositAmt';
                        parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='$fieldName' "));
//                        if($udhaarMainInv == 'udharMainInvoice' || $udhaarDepId==$udhaarDepId45){
                        if($label_field_check == 'true'){
                        ?>                                     <tr>
                                            <td align="right" width="120">
                                                        <?php
                                                        $fieldName = 'udhaarDepositAmtLb';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                            <div class="ff_calibri font_color_black"  style="font-size:12px;font-weight:600;" onClick="this.contentEditable = 'true';">
                                                                <?php echo $label_field_content; ?>:&nbsp;
                                                            </div> 
                                                        </td>
                                                        <td align="right" width="40%" class="ff_calibri  font_color_black" style="font-size:14px;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                                        <?php echo $udhaarDepAmount - $udhaarDiscAmount; ?>/-
                                                        </td>
                        <?php }
//                        }?>
                        </tr>
                        <?php
                        $fieldName = 'udhaarWithIntAmt';
                         parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='udhaarWithIntAmt' "));
                        if($label_field_check == 'true'){
                         if ($udhaarIntAmount > 0) { ?>
                        <tr>
                                            <td align="right" width="120">
                                                <?php
                                                $fieldName = 'udhaarWithIntAmtLb';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <div class="ff_calibri font_color_black"  style="font-size:12px;font-weight:600;" onClick="this.contentEditable = 'true';">
                                                    <?php echo $label_field_content; ?>:&nbsp;
                                                </div> 
                                                            </td>
                                                            <td align="right" width="40%" class="ff_calibri  font_color_black" style="font-size:14px;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                                            <?php echo $udhaarIntAmount; ?>/-
                                                            </td>
                        <?php } } ?>
                        </tr>
                                                        <!--                                        </tr>
                                                                                            </table>
                                                                                        </td>-->

                                            <!--                                <td align="left">
                                                                                <table border="0" cellpadding="0" cellspacing="2">-->
                                            <!--                                        <tr>-->
                                           <?php
                                                $fieldName = 'udhaarDepDate';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                            <?php parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='udhaarDepDate' "));
                                            if($label_field_check == 'true'){ ?>
                                                        <tr>
                                            <td align="right" width="120">
                                                 <?php
                                                $fieldName = 'udhaarDepDateLb';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <div class="ff_calibri font_color_black" style="font-size:12px;font-weight:600;" onClick="this.contentEditable = 'true';">
                                                    <?php echo $label_field_content; ?>:&nbsp;
                                                </div> 
                                                        </td>
                                                        <td align="right" width="40%" class="ff_calibri font_color_black" style="font-size:14px;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                                        <?php echo $udhaarDepDOB; ?>
                                                        </td>
                                     <?php } ?>
                                                        </tr>
                                            <?php // if ($udhaarDepComm != '') { ?>
                <!--                                                <td align="right" width="150"> 
                                                                <div class="ff_calibri  font_color_black" style="font-size:12px" onClick="this.contentEditable = 'true';">DEPOSIT OTHER INFO:&nbsp;
                                                                </div> 
                                                            </td>
                                                            <td align="right"  width="80" class="ff_calibri  font_color_black" style="font-size:12px" onClick="this.contentEditable = 'true';">
                                                        <?php // echo $udhaarDepComm;  ?>
                                                            </td>-->
    <?php // }  ?>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
    <?php // if ($udhaarDiscAmount != 0) {  ?>
                                            <td align="right" style="padding:3px">
                                                
                                                    <tr>
                                            <?php 
                                            $fieldName = 'udhaarDiscountAmt';
                                             parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='$fieldName' "));
                                             if($label_field_check == 'true'){
                                            if ($udhaarDiscAmount != 0) { ?>
                                                       
                                                <td align="right" width="50%">
                                                    <?php
                                                   $fieldName = 'udhaarDiscountAmtLb';
                                                   parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                   ?>
                                                    <div class="ff_calibri font_color_black" width="120"  style="font-size:12px;font-weight:600;" onClick="this.contentEditable = 'true';">
                                                            <?php echo $label_field_content; ?>:&nbsp;   
                                                    </div> 
                                                            </td>
                                                            <td align="right" width="40%" class="ff_calibri font_color_black" width="80" style="font-size:14px;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                                                <b> <?php echo $udhaarDiscAmount; ?>/-</b>
                                                            </td>
                                             <?php } } ?>
                                                       
                                            <!--                                            </tr>
                                                                                    </table>
                                                                                </td>-->

    <?php // }  ?>
                                                    </tr>
                                               
                                            </td>
    <?php // }  ?>
                                        </tr>
<!--                                        <tr>
                                            <td class="paddingTop2 padBott4" align="left" colspan="2">
                                            </td>
                                        </tr>-->
                                        <?php
                                    }
                                    }
                                    //
                                    $qSelAllUdhaar = "SELECT * FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_user_id='$custId' and utin_id='$udhaarId' and utin_status IN ('New','Updated')";
                                    //
                                    $resAllUdhaar = mysqli_query($conn, $qSelAllUdhaar) or die("FileName: omuinav.php <br/>Query: $qSelAllUdhaar <br/>Error:" . mysqli_error($conn));
                                    $rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC);
                                    //
                                    //
                                    $udhaarAmtLeft = $rowAllUdhaar['utin_total_amt'] - $udhaarTotalDepAmount1 - $udhaarTotalDiscAmt1;
                                    
                                    //                       
                                    ?>
                                    <tr style="background: #ffe7e4;">
                                        <?php 
                        $fieldName = 'udhaarRemainingAmt';
                        parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='$fieldName' "));
                        if($label_field_check == 'true'){
                        ?> 
                                        <td align="left" colspan="2" valign="top">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tr>
                                                    <td align="right" width="60%">
                                                           <?php
                                                           $fieldName = 'udhaarRemainingAmtLb';
                                                           parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                           ?>
                                                        <div class="ff_calibri fw_b  font_color_black" style="font-size:14px;font-weight:600;line-height: 1.5rem;" onClick="this.contentEditable = 'true';">
                                                            <?php echo $label_field_content; ?>:&nbsp;
                                                        </div> 
                                                    </td>
                                                    <td align="right" width="40%" class="ff_calibri fw_b font_color_black" width="50%" style="font-size:14px;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                                       <?php echo $udhaarAmtLeft; ?>/-
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                            <?php } ?>
                                    </tr>

                                </table>
                            </td> 
                        </tr>
                            <?php
                            $qSelAllUdhaarDepMon = "SELECT * FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_user_id='$custId' and (utin_utin_id='$udhaarId' or utin_id='$udhaarId') and (utin_EMI_status  IN ('Paid') or utin_EMI_status IS NULL) order by utin_date asc";
                           $resAllUdhaarDepMon = mysqli_query($conn, $qSelAllUdhaarDepMon)or die(mysqli_error($conn));
                           while ($rowUdhaarDepMonoi = mysqli_fetch_array($resAllUdhaarDepMon, MYSQLI_ASSOC)) {
                            $udhaarDepId = $rowUdhaarDepMonoi['utin_id'];
                            $utin_transaction_type = $rowUdhaarDepMonoi['utin_transaction_type'];
                            $udhaarDepOtherInfo = $rowUdhaarDepMonoi['utin_paym_oth_info'];
                            $utin_other_info = $rowUdhaarDepMonoi['utin_other_info'];
                            $fieldName = 'payOthInfo';
                            parse_str(getTableValues(" SELECT label_field_check as payOthInfoCheck,label_field_font_color as payOthInfoColor,label_field_font_size payOthInfoSize FROM labels WHERE label_field_name ='$fieldName' "));
                            // 
                             $fieldName = 'payOthInfoLb';
                           parse_str(getTableValues(" SELECT label_field_content as payOthInfoLabel,label_field_font_color as payOthInfoLbColor,label_field_font_size payOthInfoLbSize FROM labels WHERE label_field_name ='$fieldName' ")); 
//                         
                            //START OTHER INFO AND PAYMENT OTHER INFO FOR DEPOSIT INVOICE
                            if ($udhaarDepId == $udhaarDepId45 && $udharDepInv == 'udharDepInvoice') {
                                if ($payOthInfoCheck == 'true') {
                                     if ($udhaarDepOtherInfo != '') {
                                        ?>
                                        <tr>
                                            <td align="left" valign="bottom" class="ff_calibri" style="font-weight:600;height:26px;">
                                           
                                                <span class="font_color_<?php echo $payOthInfoLbColor; ?>" style="font-size:<?php echo $payOthInfoLbSize; ?>px"><?php
                                                  echo $payOthInfoLabel; ?> :
                                                </span> 
                                                 <span class="font_color_<?php echo $payOthInfoColor; ?>" style="font-size:<?php echo $payOthInfoSize; ?>px">
                                                 <?php
                                                  echo $udhaarDepOtherInfo; ?>
                                                 </span> 
                                            </td>
                                       </tr> 
                                       <?php
                                       }
                                   }
                               }
                               //START OTHER INFO AND PAYMENT OTHER INFO FOR MAIN INVOICE
                               $fieldName = 'udhaarOtherInfo';
                            parse_str(getTableValues(" SELECT label_field_check as udhaarOtherInfoCheck,label_field_font_color as udhaarOtherInfoColor,label_field_font_size udhaarOtherInfoSize FROM labels WHERE label_field_name ='$fieldName' "));
                               if ($udhaarMainInv == 'udharMainInvoice' && $utin_transaction_type == 'UDHAAR') {
                                   if($udhaarOtherInfoCheck == 'true') {
                                  $fieldName = 'udhaarOtherInfoLb';
                                parse_str(getTableValues(" SELECT label_field_content as udhaarOtherInfoLabel,label_field_font_color as udhaarOtherInfoLbColor,label_field_font_size udhaarOtherInfoLbSize FROM labels WHERE label_field_name ='$fieldName' "));
                             
                                       ?>
                                   <tr>
                                        <td align="left" valign="bottom" class="ff_calibri font_color_black" style="font-size:14px;font-weight:600;height:26px;">
                                         <span class="font_color_<?php echo $udhaarOtherInfoLbColor; ?>" style="font-size:<?php echo $udhaarOtherInfoLbSize; ?>px">
                                                   <?php  echo $udhaarOtherInfoLabel;?> :
                                               </span>
                                            <span class="font_color_<?php echo $udhaarOtherInfoColor; ?>" style="font-size:<?php echo $udhaarOtherInfoSize; ?>px">    
                                                   <?php
                                               echo $utin_other_info;
                                              ?></span> 
                                         
                                        </td>
                                   </tr>  <?php }
                                    if ($payOthInfoCheck == 'true') {

                                        if ($udhaarDepOtherInfo != '') {
                                            ?>
                                       <tr> 
                                           <td align="left" valign="bottom" class="ff_calibri font_color_black" style="font-size:14px;font-weight:600;height:26px;">
                                               <span class="font_color_<?php echo $payOthInfoLbColor; ?>" style="font-size:<?php echo $payOthInfoLbSize; ?>px">
                                                   <?php  echo $payOthInfoLabel;?> :
                                               </span>
                                               <span class="font_color_<?php echo $payOthInfoColor; ?>" style="font-size:<?php echo $payOthInfoSize; ?>px">    
                                                   <?php
                                                echo $udhaarDepOtherInfo;
                                              ?></span> 
                                           </td>
                                       </tr>
                                           <?php }
                                    } ?>

                                    <?php
                                }
                                ?>
                            <?php } ?>
                    </table>
                </td>
            </tr>

            <!--                        End code for display otherinfo @AUTH:ATHU14/1/15-->     
            <tr>
                                        <?php
                                        $fieldName = 'authUhaarInvCustSignLb';
                                        $qSelectCustSnap = "SELECT user_sign_snap,user_sign_update_date FROM user WHERE user_id='$custId'";
                                        $resCustSnap = mysqli_query($conn, "$qSelectCustSnap");
                                        $rowCustSnap = mysqli_fetch_array($resCustSnap);
                                        $custSnapFiletype = 'png';
                                        $custSnap = $rowCustSnap['user_sign_snap_fname'];
//header("Content-type: $custSnapFiletype");                                     
//                                      <?php
                                        $fieldName = 'authUhaarInvCustSignLb';
                                        $label_field_check = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($custmorSignName != ""&& $label_field_check == 'true') {
//                                            $custId = $kittyCustId;
                                            $noEcho = 'Y';
                                            include('omccsnim.php');
                                            $noEcho = '';
                                            ?>
                                            <td align="left" width="50%">
                                        <!--<img src="<?php // echo $documentRootBSlash;                        ?>/include/php/omccsnim.php?cust_id=<?php // echo "$userId";                        ?>"--> 
                                                <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($custSnap); ?>" 
                                                     id="sign" border="0" style="border-color: #B8860B;width:150px; height:75px;" alt=""/>
                                            </td>
                                            <?php
                                        } else {
                                            ?>
                                            <td align="left" width="50%"></td>
                                            <?php
                                        }
                                        ?>

                                    
                                        <?php
                                        $fieldName = 'authUdhaarInvSignLb';
                                        $label_field_check = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($firm_owner_sign_ftype != NULL && $label_field_check == 'true') {
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
                                                     alt="" style="border-color: #B8860B;width:230px; height:100px;"/>
                                            </td>
                                            <?php
                                        } else {
                                            ?>
                                            <td align="right" width="50%">
                                                <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($ownThumb); ?>"  
                                                     alt="" style="border-color: #B8860B;width:230px; height:100px;visibility:hidden;"/>
                                            </td>
                                                <?php
                                            }
                                            ?>
                                    </tr>
                                    <tr>
                                        <?php
//                                        $fieldName = 'authSchemeSignLb';
//                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        $fieldName = 'authUhaarInvCustSignLb';
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
                                            <td align="left" width="150px" ></td>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        $fieldName = 'authUdhaarInvSignLb';
                                        $label_field_check = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_check == 'true') {
                                            ?>
                                            <td align="right" width="150px" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?></td>
                                            <?php } else { ?>  
                                            <td align="right" width="150px" >
<?php } ?>
                                    </tr>
                                    <tr>
                                        <td>
                                            &nbsp;
                                        </td>
                                    </tr>

        </table>
        </td>
        </tr>

<?php if ($form8Lay == 'form8LayA42') { ?>
            <tr>
                <td>
                    <br/>   
                </td>
            </tr>     
            <tr>
                <td>
                    <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" style="width:<?php echo $formWidth . 'mm'; ?>;padding-left:1px;border: <?php echo $border; ?>" width="100%">     
                        <tr  style="background: #f2f2f2;">
                            <td align="left" colspan="2" style="padding:3px;">
                                <table border="0" cellpadding="0" width="100%" cellspacing="0">
                                    <tr>
                         <?php  
                        parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='' "));
                        if($label_field_check == 'true'){
                        ?> 
                                        <td align="left">
                                            <div class="paddingLeft2 ff_calibri font_color_black" style="font-size:14px;" onClick="this.contentEditable = 'true';">UDHAAR NO:&nbsp;<?php echo $udhaarPreNo . ' ' . $udhaarNo; ?></div> 
                                        </td>
                        <?php }  
                        parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='UdhaarInvDate' "));
                        if($label_field_check == 'true'){
                        ?> 

                                        <td align="right" class="">
                                            <div class="paddingRight2 ff_calibri font_color_black" style="font-size:14px;font-weight:600;"onClick="this.contentEditable = 'true';">UDHAAR DATE:&nbsp;
                                        <?php echo $udhaarDOB; ?>
                                            </div> 
                                        </td>
                        <?php } ?>
                                    </tr>
                                     <tr>
                         <?php  
                        parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='mainInvNo'"));
                        if($label_field_check == 'true'){
                        ?> 
                                        <td align="left">
                                            <div class="paddingLeft2 ff_calibri font_color_black" style="font-size:14px;" onClick="this.contentEditable = 'true';">UDHAAR MAIN NO:&nbsp;<?php echo $udhaarMainInvNo; ?></div> 
                                        </td>
                        <?php } ?>
                                    </tr>
                                </table>
                            </td>
                        </tr>
<!--                        <tr>
                            <td align="left" colspan="2" class="paddingTop1 paddingBott1">
                                <div class="hrGrey"></div>
                            </td>
                        </tr>-->
                        <tr>
                            <td align="left">
                                <table border="0" cellpadding="2" cellspacing="0" width="100%" >
                                    <tr>
                                        <?php 
                                        //
//                                          parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='userUdhaarInvName' "));
                                        //
                                        if ($rowCustDetails['user_fname'] != '' || $label_field_check == 'true') { ?> 
                                            <td align="left">
                                                <div class="ff_calibri fw_n font_color_black" style="font-size:13px;" onClick="this.contentEditable = 'true';">
                                                    <b> FATHER NAME:&nbsp;</b>
                                                    <?php echo om_strtoupper($rowCustDetails['user_fname']) . ' ' . om_strtoupper($rowCustDetails['user_lname']);
                                                    ?>
                                                </div> 
                                            </td>
    <?php } ?>
                                    </tr>

                                    <tr> 
                                        <?php 
                                        if ($fatherOrSpouseName != '') { ?> 
                                            <td align="left" class="ff_calibri fes_12 black">
                                                <div class="ff_calibri fw_n font_color_black" style="font-size:13px;" onClick="this.contentEditable = 'true';">
                                                    <b><?php
                                                    //cahnges made beacause the lable spouse name is showing insted of the father name @omkar10JAN2024
                                                        if ($checkFatherOrSpouse == 'F' || $checkFatherOrSpouse == 'D' || $checkFatherOrSpouse == 'S')
                                                            echo 'FATHER NAME:';
                                                        else if ($checkFatherOrSpouse == 'C')
                                                            echo 'GUARDIAN NAME:';
                                                        else if ($checkFatherOrSpouse == 'W')
                                                            echo 'SPOUSE NAME:';
                                                        ?></b>
        <?php echo om_strtoupper($fatherOrSpouseName); ?>
                                                </div>
                                            </td>
    <?php } ?>
                                    </tr>
                                    <!--Start code to change the conditiond Author:GAUR30MAY16-->
                                    <tr>
                                        <td>
                                        <?php 
                                         parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='userUdhaarInvAddress' "));
                                        if ($custAddress != '' || $label_field_check == 'true') { ?> 
                                        <tr>
                                            <td align="left">
                                                <div class="ff_calibri fw_n font_color_black" style="font-size:13px;" 
                                                     onClick="this.contentEditable = 'true';"><b>ADDRESS:&nbsp;</b>
        <?php echo om_strtoupper($custAddress); ?>
                                                </div> 
                                            </td>
                                        </tr>


    <?php } if ($custVillage != '') { ?> 
                                        <tr>
                                            <td align="left">
                                                <div class="ff_calibri fw_n font_color_black" style="font-size:13px;" 
                                                     onClick="this.contentEditable = 'true';"><b>VILLAGE:&nbsp;</b>
        <?php echo om_strtoupper($custVillage); ?>
                                                </div> 
                                            </td>
                                        </tr>
    <?php } if ($custTehsil != '') { ?> 
                                        <tr>
                                            <td align="left">
                                                <div class="ff_calibri fw_n font_color_black" style="font-size:13px;" 
                                                     onClick="this.contentEditable = 'true';"><b>TEHSIL:&nbsp;</b>
        <?php echo om_strtoupper($custTehsil); ?>
                                                </div> 
                                            </td>
                                        </tr>
    <?php } ?>
                            </td>   
                        </tr> 
                        <tr> 
                            <td>
    <?php if ($custCity != '') { ?> 
                            <tr>
                                <td align="left">
                                    <div class="ff_calibri fw_n font_color_black" style="font-size:13px;" 
                                         onClick="this.contentEditable = 'true';"><b>CITY:&nbsp;</b>
        <?php echo om_strtoupper($custCity); ?>
                                    </div> 
                                </td>
                            </tr>

    <?php } if ($custPinCode != '') { ?>

                            <tr>
                                <td align="left">
                                    <div class="ff_calibri fw_n font_color_black" style="font-size:13px;" 
                                         onClick="this.contentEditable = 'true';"><b>PIN CODE:&nbsp;</b>
        <?php echo om_strtoupper($custPinCode); ?>
                                    </div> 
                                </td>
                            </tr>

                                        <?php } 
                                         parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='userUdhaarInvContact' "));
                                        if ($custPhoneNo != '' || $label_field_check =='true') { ?>
                            <tr>
                                <td align="left">
                                    <div class="ff_calibri fw_n font_color_black" style="font-size:13px;"
                                         onClick="this.contentEditable = 'true';"><b>PHONE NO:&nbsp;</b>
        <?php echo om_strtoupper($custPhoneNo); ?>
                                    </div> 
                                </td>
                            </tr>
    <?php } ?>
                </td>    
            </tr>
            <!--Start code to change the conditiond Author:GAUR30MAY16-->
            </table>
            </td>
            </tr>
    <!--                        <tr>
                <td align="left" colspan="2" class="paddingTop1 paddingBott1">
                    <div class="hrGrey"></div>
                </td>
            </tr>-->
                        <tr style="background: #ffd942;">
                            <td align="left" colspan="2" style="padding:5px 0">
                    <table border="0" cellpadding="0" cellspacing="2" width="100%">
                        <tr>
                             <?php parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='udhaarAmt' ")); 
                                        if($label_field_check == 'true'){
                                        ?>
                            <td align="left" width="40%"></td>
                             <td align="left" width="60%">
                                  <table border="0" cellpadding="0" cellspacing="2" width="100%" align="left" style="background:#f5f5f5;">
                                      <tr>
                                              <td align="right" width="60%">
                                                  <div class="ff_calibri fw_b font_color_black" style="font-size:14px;line-height: 1.5rem;" onClick="this.contentEditable = 'true';"><b>UDHAAR AMOUNT:&nbsp;</b>
                                                  </div> 
                                              </td>
                                              <td align="right" class="ff_calibri fw_b font_color_black" width="40%" style="font-size:14px;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                                  <?php echo $udhaarAmount; ?>/-
                                              </td>
                                        <?php } ?>
                                    </tr>
                                     <?php
            $qSelAllUdhaarDepMon = "SELECT utin_id,utin_total_amt,utin_date,utin_discount_amt,utin_history,utin_status,utin_jrnl_id,utin_comm FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_user_id='$custId' and utin_utin_id='$udhaarId' and (utin_EMI_status  IN ('Paid') or utin_EMI_status IS NULL) order by utin_since asc";
            $resAllUdhaarDepMon = mysqli_query($conn, $qSelAllUdhaarDepMon)or die(mysqli_error($conn));
            while ($rowUdhaarDepMon = mysqli_fetch_array($resAllUdhaarDepMon, MYSQLI_ASSOC)) {
                $udhaarDepId1 = $rowUdhaarDepMon['utin_id'];
                $udhaarDepAmount1 = $rowUdhaarDepMon['utin_total_amt'];
                $udhaarDiscAmount1 = $rowUdhaarDepMon['utin_discount_amt'];
                $udhaarDepDOB1 = $rowUdhaarDepMon['utin_date'];
                $udhaarDepHistory1 = $udhaarDepHistory . $rowUdhaarDepMon['utin_history'];
                $udhaarTotalDepAmount1 = $udhaarTotalDepAmount1 + $udhaarDepAmount1;
                $udhaarTotalDiscAmt1 = $udhaarTotalDiscAmt1 + $udhaarDiscAmount1;
                $udhaarDepUpdStatus1 = $rowUdhaarDepMon['utin_status'];
                $udhaarDepComm1 = $rowUdhaarDepMon['utin_comm'];
                ?>
                <tr>
                    <td align="left">
                        <table border="0" cellpadding="0" cellspacing="2" width="100%">
                            <tr>
                                   <?php parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='udhaarDepositAmt' ")); 
                                        if($label_field_check == 'true'){
                                        ?>
                                <td align="right" width="60%">
                                    <div class="ff_calibri font_color_black"  style="font-size:14px;line-height: 1.5rem;" onClick="this.contentEditable = 'true';"><b>DEPOSIT AMOUNT:&nbsp;</b>
                                    </div> 
                                </td>
                                <td align="right" width="40%" class="ff_calibri  font_color_black" style="font-size:14px;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
        <?php echo $udhaarDepAmount1; ?>/-
                                </td>
                                <?php } ?>
                                <!--                                        </tr>
                                                                    </table>
                                                                </td>-->

                                                                                    <!--                                <td align="left">
                                                                                                                        <table border="0" cellpadding="0" cellspacing="2">-->
                            </tr>
                              <tr> 
<?php  parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='udhaarDepDate' "));
                        if($label_field_check == 'true'){ ?>                                                  <!--                                        <tr>-->
                                <td align="right" width="50%">
                                    <div class="ff_calibri font_color_black" style="font-size:14px;font-weight:600;line-height: 1.5rem;" onClick="this.contentEditable = 'true';"><b>DEPOSIT DATE:&nbsp;</b>
                                    </div> 
                                </td>
                                <td align="right" width="50" class="ff_calibri font_color_black" style="font-size:14px;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                <?php echo $udhaarDepDOB1; ?>
                                </td>
                                <?php } ?>
        <?php // if ($udhaarDepComm1 != '') {   ?>
        <!--                                                    <td align="right" width="150"> 
                                        <div class="ff_calibri  font_color_black" style="font-size:12px" onClick="this.contentEditable = 'true';">DEPOSIT OTHER INFO:&nbsp;
                                        </div> 
                                    </td>
                                    <td align="right"  width="80" class="ff_calibri  font_color_black" style="font-size:12px" onClick="this.contentEditable = 'true';">-->
                                <?php // echo $udhaarDepComm1;   ?>
                                <!--                                                    </td>-->
        <?php // }   ?>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
        <?php // if ($udhaarDiscAmount != 0) {   ?>
                    <td align="left">
                        <table border="0" cellpadding="0" cellspacing="2" width="100%">
                            <tr>
        <?php 
        parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='udhaarDiscountAmt' "));
        if($label_field_check == 'true'){
        if ($udhaarDiscAmount1 != 0) { ?>
                                    <td align="right" width="60%">
                                        <div class="ff_calibri font_color_black" width="100%" style="font-size:14px;font-weight:600;line-height: 1.5rem;" onClick="this.contentEditable = 'true';">DISCOUNT:&nbsp;
                                        </div> 
                                    </td>
                                    <td align="right" width="40%" class="ff_calibri font_color_black" width="80" style="font-size:14px;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
                                    <?php echo $udhaarDiscAmount1; ?>/-
                                    </td>
        <?php } }?>
                                <!--                                            </tr>
                                                                        </table>
                                                                    </td>-->

                                                                                         <!--                                    <td align="left">
                                                                                                                                 <table border="0" cellpadding="0" cellspacing="2">
                                                                                                                                     <tr>-->
                            </tr>
                        </table>
                    </td>
        <?php // }   ?>
                </tr>
                <tr>
                    <td class="paddingTop2 padBott4" align="left" colspan="2">
                    </td>
                </tr>

                <?php
            }
            if ($udhaarDiscAmount1 == '' || $udhaarDiscAmount1 == NULL) {
                $udhaarAmtLeft1 = $udhaarAmount - $udhaarTotalDepAmount1 - $udhaarTotalDiscAmt1;
            } else {
                $udhaarAmtLeft1 = $udhaarAmount - $udhaarTotalDepAmount1 - $udhaarTotalDiscAmt1;
            }
            ?>
    <!--                        <tr>
                                <td class="paddingTop2 padBott4" align="left" colspan="2">
                                    <div class="hrGrey"></div>
                                </td>
                            </tr>-->
            <tr style="background: #ffe7e4;">
                <td align="left" valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                                        <?php parse_str(getTableValues(" SELECT label_field_check FROM labels WHERE label_field_name ='udhaarRemainingAmt' ")); 
                                        if($label_field_check == 'true'){
                                        ?>
                            <td align="left" width="50%">
                                <div class="ff_calibri fw_b font_color_black"  style="font-size:14px;font-weight:600;line-height: 1.5rem;" onClick="this.contentEditable = 'true';">AMOUNT LEFT:&nbsp;
                                </div> 
                            </td>
                            <td align="right" class="ff_calibri fw_b font_color_black" width="50%" style="font-size:14px;font-weight:600;line-height: 1.5rem;border-bottom: 1px dashed #000;" onClick="this.contentEditable = 'true';">
    <?php echo $udhaarAmtLeft1; ?>/-
                            </td>
                                        <?php } ?>
                        </tr>
                    </table>
                </td>
            </tr>
                                  </table>
                             </td>
                          
                        </tr>
    <!--                                    <tr class="ff_calibri fes_12">
                            <td></td>
                        </tr>-->
                    </table>
                </td>
            </tr>
    <!--                        <tr>
                <td class="paddingTop2 padBott4" align="left" colspan="2">
                </td>
            </tr>-->

            <tr>
                <td class="paddingTop2 padBott4" align="left" colspan="2">
                    <div class="hrGrey"></div>
                </td>
            </tr>
<!--            <tr>
                <td align="center" colspan="2" style="height:15mm;padding:3px;border-top:1px solid #c1c1c1;" valign="top" class="paddingLeft2">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="left" class="ff_calibri fw_b fes_14" width="202px">  
                            </td>
                            <td align="right" class="ff_calibri fw_b fes_14" width="202px">
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="bottom" class="ff_calibri font_color_black" style="font-size:14px;font-weight:600;">CUSTOMER SIGNATURE
                            </td>

                            <td align="right" valign="bottom" class="paddingRight2 ff_calibri font_color_black" style="font-size:14px;font-weight:600;">OWNER SIGNATURE
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>     
           
            </td>
            </tr>-->
<?php } ?>
        </table>
    </div>
</div>
