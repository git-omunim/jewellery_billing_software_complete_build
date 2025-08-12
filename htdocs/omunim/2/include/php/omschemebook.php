<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 15 Jul, 2020 5:34:42 PM
 *
 * @FileName: omschemebook.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen Technologies
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
$labelType = 'SchemeBook';
//
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div align="left" class="main_link_orange">
                    CUSTOMIZED SCHEME PASSBOOK PANEL
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
                      <td align="left" class="ff_calibri fs_12 fw_b grey_dark" width="25%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;">SCHEME PASSBOOK FIRST PAGE TOP MARGIN (MM):</div>
                     <?php
                    $label_field_content = '';
                    $fieldName = 'FirstPageTopMargin';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    
                        <input id="fieldValue" name="fieldValue" placeholder="Margin" value="<?php echo $label_field_content; ?>"
                               onblur="labelsForm('', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                  
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft20" width="25%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;">SCHEME PASSBOOK FIRST PAGE LEFT MARGIN (MM):</div>
                   
                         <?php
                    $label_field_content = '';
                    $fieldName = 'FirstPageLeftMargin';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                   
                        <input id="fieldValue" name="fieldValue" placeholder="Margin" value="<?php echo $label_field_content; ?>"
                               onblur="labelsForm('', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    
                    
                    <td align="left" width="15%">
                        <table border="0" cellspacing="0" cellpadding="0" valign="top" align="left" width="100%">
                            <tr>
                                <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft20" width="100%">
                                    <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> TOP MARGIN (MM):</div>
                              
                                  <?php
                    $label_field_content = '';
                    $fieldName = 'topMargin';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $TopMargin = $label_field_content;
                    if ($TopMargin == '') {
                        $TopMargin = 0;
                    }
                    ?>
                    
                        <input id="fieldValue" name="fieldValue" placeholder="Top Margin" value="<?php echo $TopMargin; ?>"
                               onblur="labelsForm('', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                            </tr>
                        </table>
                    </td>
                  
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="15%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> ROW TOP MARGIN (MM):</div>                 
                       <?php
                    $label_field_content = '';
                    $fieldName = 'rowTopMargin';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                   
                        <input id="fieldValue" name="fieldValue" placeholder="Top Margin" value="<?php echo $label_field_content; ?>"
                               onblur="labelsForm('', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $fieldName = 'rowBottomMargin';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> ROW BOTTOM MARGIN (MM):</div>   
                    
                        <input id="fieldValue" name="fieldValue" placeholder="Bot Margin" value="<?php echo $label_field_content; ?>"
                               onblur="labelsForm('', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-12" style="margin-top:5px;">
            <table border="0" cellspacing="0" width="100%" cellpadding="0" valign="top" align="center">
                <tr>
                       <td align="right" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%">
                           <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;">ROW BORDER:</div>
                    </td>
                    <?php
                    $fieldName = 'formBorderCheck';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $borderCheck = $label_field_check;
                    ?>
                    <td align="left" class="frm-lbl-lnk-grey padLeft10" width="5%">
                        <input type="checkbox" id="fontCheckId" name="fontCheckId" class="checkbox" <?php
                        if ($label_field_check == 'true')
                            echo 'checked';
                        else
                            echo '';
                        ?>
                               onclick="labelsForm('', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');"/>                   
                    </td>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="20%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;">PASSBOOK WIDTH (MM): </div>
                    
                    <?php
                    $label_field_content = '';
                    $fieldName = 'passBookWidth';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $passBookWidth = $label_field_content;
                    if ($passBookWidth == '') {
                        $passBookWidth = 0;
                    }
                    ?>
                    
                        <input id="fieldValue" name="fieldValue" placeholder="Width" value="<?php echo $passBookWidth; ?>"
                               onblur="labelsForm('', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="col-md-12">
            <div class="schemePassbook" style="border:1px solid #c1c1c1;margin-top:5px;">
                <h4 style="margin-bottom: 15px;font-weight: bold;">SCHEME INVOICE</h4>
<table border = "<?php
if ($borderCheck == 'true') {
    echo '1';
} else {
    echo '0';
}
?>" cellpadding = "0" align = "left" cellspacing = "0" <?php if ($passBookWidth != 0) {
    ?>style="width:<?php echo $passBookWidth . 'mm'; ?>;table-layout:fixed;margin-top: <?php echo $TopMargin . 'mm'; ?>" <?php } else { ?> width = "100%" style="margin-top: <?php echo $TopMargin . 'mm'; ?>"<?php } ?>>
    <tr style="background: #92c7ff;">
        <?php
        $label_field_content = '';
        $count = 1;
        $fieldName = 'insNoWidth';
        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14 fs_14" valign="top" style="font-weight:600;font-size:14px; width:<?php echo $label_field_content; ?>mm;">
            <div onClick="openFormDiv('insNoLbDiv', '<?php echo $count; ?>', 'YES', 'INS NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '',
                            '', '', '10', '<?php echo $labelType; ?>', '6', '36');">
                     <?php echo 'INS NO'; ?>
            </div>
            <div id="insNoLbDiv"></div> 
        </td>
        <?php
        $label_field_content = '';
        $count = 2;
        $fieldName = 'DateWidth';
        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td  align="center" class="ff_calibri cursor font_color_black fs_14" valign="top" style="font-weight:600;font-size:14px; width:<?php echo $label_field_content; ?>mm;">
            <div onClick="openFormDiv('DateLbDiv', '<?php echo $count; ?>', 'YES', 'PAYMENT DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '',
                            '', '', '10', '<?php echo $labelType; ?>', '6', '36');">
                <?php echo 'PAYMENT DATE'; ?></div>
            <div id="DateLbDiv"></div> 
        </td>
        <?php
        $label_field_content = '';
        $count = 3;
        $fieldName = 'receiptnoWidth';
        parse_str(getTableValues("SELECT label_field_content,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td  align="center" class="ff_calibri cursor font_color_black fs_14" valign="top" style="font-weight:600;font-size:14px; width:<?php echo $label_field_content; ?>mm;">
            <div onClick="openFormDiv('receiptnoLbDiv', '<?php echo $count; ?>', 'YES', 'RECEIPT NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '',
                            '', '', '10', '<?php echo $labelType; ?>', '6', '36');">
                <?php echo 'RECEIPT NO.'; ?></div>
            <div id="receiptnoLbDiv"></div> 
        </td>
        <?php
        $label_field_content = '';
        $count = 4;
        $fieldName = 'installAmtWidth';
        parse_str(getTableValues("SELECT label_field_content,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td  align="center" class="ff_calibri cursor font_color_black fs_14" valign="top" style="font-weight:600;font-size:14px; width:<?php echo $label_field_content; ?>mm;">
            <div onClick="openFormDiv('installAmtLbDiv', '<?php echo $count; ?>', 'YES', 'INSTALLMENT AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '',
                            '', '', '10', '<?php echo $labelType; ?>', '6', '36');">
                <?php echo 'INSTALLMENT AMOUNT'; ?></div>
            <div id="installAmtLbDiv"></div> 
        </td>
        <?php
        $label_field_content = '';
        $count = 5;
        $fieldName = 'collectiveAmtWidth';
        parse_str(getTableValues("SELECT label_field_content,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td  align="center" class="ff_calibri cursor font_color_black fs_14" valign="top" style="font-weight:600;font-size:14px; width:<?php echo $label_field_content; ?>mm;">
            <div onClick="openFormDiv('collectiveAmtLbDiv', '<?php echo $count; ?>', 'YES', 'COLLECTIVE AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '',
                            '', '', '10', '<?php echo $labelType; ?>', '6', '36');">
                <?php echo 'COLLECTIVE AMOUNT'; ?></div>
            <div id="collectiveAmtLbDiv"></div> 
        </td>
        <?php
        $label_field_content = '';
        $count = 6;
        $fieldName = 'paidAmtWidth';
        parse_str(getTableValues("SELECT label_field_content,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td  align="center" class="ff_calibri cursor font_color_black fs_14" valign="top" style="font-weight:600;font-size:14px; width:<?php echo $label_field_content; ?>mm;">
            <div onClick="openFormDiv('paidAmtLbDiv', '<?php echo $count; ?>', 'YES', 'PAID AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                <?php echo 'PAID AMOUNT'; ?></div>
            <div id="paidAmtLbDiv"></div> 
        </td>
        <!-- GST Amt -->
        <?php
        $label_field_content = '';
        $count = 7;
        $fieldName = 'gstAmtWidth';
        parse_str(getTableValues("SELECT label_field_content,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td  align="center" class="ff_calibri cursor font_color_black fs_14" valign="top" style="font-weight:600;font-size:14px; width:<?php echo $label_field_content; ?>mm;">
            <div onClick="openFormDiv('gstAmtLbDiv', '<?php echo $count; ?>', 'YES', 'GST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                <?php echo 'GST AMOUNT'; ?></div>
            <div id="gstAmtLbDiv"></div> 
        </td>
        <!-- Ends here -->
        <!-- Taxable Amt -->
        <?php
        $label_field_content = '';
        $count = 8;
        $fieldName = 'taxableAmtWidth';
        parse_str(getTableValues("SELECT label_field_content,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td  align="center" class="ff_calibri cursor font_color_black fs_14" valign="top" style="font-weight:600;font-size:14px; width:<?php echo $label_field_content; ?>mm;">
            <div onClick="openFormDiv('taxableAmtLbDiv', '<?php echo $count; ?>', 'YES', 'TAXABLE AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                <?php echo 'TAXABLE AMOUNT'; ?></div>
            <div id="taxableAmtLbDiv"></div> 
        </td>            
        <!-- Ends Here -->    
        <!-- Metal Rate AMt-->
         <?php
        $label_field_content = '';
        $count = 9;
        $fieldName = 'metalRateAmtWidth';
        parse_str(getTableValues("SELECT label_field_content,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td  align="center" class="ff_calibri cursor font_color_black fs_14" valign="top" style="font-weight:600;font-size:14px; width:<?php echo $label_field_content; ?>mm;">
            <div onClick="openFormDiv('metalRateAmtLbDiv', '<?php echo $count; ?>', 'YES', 'METAL RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                <?php echo 'METAL RATE'; ?></div>
            <div id="metalRateAmtLbDiv"></div> 
        </td>     
        <!-- Ends Here Metal Rate AMt-->
        <!-- Metal Wt AMt-->
         <?php
        $label_field_content = '';
        $count = 10;
        $fieldName = 'metalWtAmtWidth';
        parse_str(getTableValues("SELECT label_field_content,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td  align="center" class="ff_calibri cursor font_color_black fs_14" valign="top" style="font-weight:600;font-size:14px; width:<?php echo $label_field_content; ?>mm;">
            <div onClick="openFormDiv('metalWtAmtLbDiv', '<?php echo $count; ?>', 'YES', 'METAL WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                <?php echo 'METAL WT'; ?></div>
            <div id="metalWtAmtLbDiv"></div> 
        </td>             
        <!--Ends here Metal Wt AMt -->
        <?php
        $label_field_content = '';
        $count = 11;
        $fieldName = 'paymentModeWidth';
        parse_str(getTableValues("SELECT label_field_content,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td  align="center" class="ff_calibri cursor font_color_black fs_14 " valign="top" style="font-weight:600;font-size:14px; width:<?php echo $label_field_content; ?>mm;">
            <div onClick="openFormDiv('paymentModeLbDiv', '<?php echo $count; ?>', 'YES', 'PAYMENT MODE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                <?php echo 'PAYMENT MODE'; ?></div>
            <div id="paymentModeLbDiv"></div> 
        </td>
        <?php
        $label_field_content = '';
        $count = 12;
        $fieldName = 'statusWidth';
        parse_str(getTableValues("SELECT label_field_content,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14" valign="top" style="font-weight:600;font-size:14px; width:<?php echo $label_field_content; ?>mm;">
            <div onClick="openFormDiv('statusLbDiv', '<?php echo $count; ?>', 'YES', 'STATUS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                <?php echo 'STATUS'; ?></div>
            <div id="statusLbDiv"></div> 
        </td>
           <?php
        $label_field_content = '';
        $count = 12;
        $fieldName = 'staffNameWidth';
        parse_str(getTableValues("SELECT label_field_content,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14" valign="top" style="font-weight:600;font-size:14px; width:<?php echo $label_field_content; ?>mm;">
            <div onClick="openFormDiv('staffNameLbDiv', '<?php echo $count; ?>', 'YES', 'STAFF NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                <?php echo 'STAFF NAME'; ?></div>
            <div id="staffNameLbDiv"></div> 
        </td>
    </tr>
    
    <?php
    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = 'rowTopMargin' and label_type = '$labelType'"));
    $rowTopMargin = $label_field_content;
    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = 'rowBottomMargin' and label_type = '$labelType'"));
    $bottomMargin = $label_field_content;
    ?>
    <tr>
        <?php
        $fieldName = 'insNoCheck';
        $count = 1;
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14">
            <div onClick="openFormDiv('insNoDiv', '<?php echo $count; ?>', 'NO', 'INS NO', '<?php echo $fieldName; ?>', '', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
                1
            </div>
            <div id="insNoDiv"></div>   
        </td>
        <?php
        $fieldName = 'DateCheck';
        $count = 2;
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
            <div onClick="openFormDiv('DateDiv', '<?php echo $count; ?>', 'NO', 'PAYMENT DATE', '<?php echo $fieldName; ?>', '', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
                07 FEB 2019
            </div>
            <div id="DateDiv"></div>   
        </td>
        <?php
        $fieldName = 'receiptnoCheck';
        $count = 3;
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
            <div onClick="openFormDiv('receiptNoDiv', '<?php echo $count; ?>', 'NO', 'RECEIPT NO', '<?php echo $fieldName; ?>', '', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
                1673
            </div>
            <div id="receiptNoDiv"></div>   
        </td>
        <?php
        $fieldName = 'installAmtCheck';
        $count = 4;
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
            <div onClick="openFormDiv('installAmountDiv', '<?php echo $count; ?>', 'NO', 'INSTALLMENT AMT', '<?php echo $fieldName; ?>', '', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
                2000
            </div>
            <div id="installAmountDiv"></div>   
        </td>
        <?php
        $fieldName = 'collectiveAmtCheck';
        $count = 5;
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
            <div onClick="openFormDiv('collectiveAmountDiv', '<?php echo $count; ?>', 'NO', 'COLLECTIVE AMT', '<?php echo $fieldName; ?>', '', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
                2000
            </div>
            <div id="collectiveAmountDiv"></div>   
        </td>
        <?php
        $fieldName = 'paidAmtCheck';
        $count = 6;
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
            <div onClick="openFormDiv('paidAmountDiv', '<?php echo $count; ?>', 'NO', 'PAID AMT', '<?php echo $fieldName; ?>', '', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
                2000
            </div>
            <div id="paidAmountDiv"></div>   
        </td>
        <!-- GST AMT -->
        <?php
        $fieldName = 'gstAmtCheck';
        $count = 7;
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
            <div onClick="openFormDiv('gstAmountDiv', '<?php echo $count; ?>', 'NO', 'GST AMT', '<?php echo $fieldName; ?>', '', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
                58.26
            </div>
            <div id="gstAmountDiv"></div>   
        </td>
        <!-- Ends Here -->
        <!-- Taxable Amt -->
        <?php
        $fieldName = 'taxableAmtCheck';
        $count = 8;
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
            <div onClick="openFormDiv('taxableAmountDiv', '<?php echo $count; ?>', 'NO', 'TAXABLE AMT', '<?php echo $fieldName; ?>', '', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
                1941.74
            </div>
            <div id="taxableAmountDiv"></div>   
        </td>
        <!-- Ends Here -->
        <!-- Metal Rate Amt -->
        <?php
        $fieldName = 'metalRateAmtCheck';
        $count = 8;
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
            <div onClick="openFormDiv('metalRateAmtDiv', '<?php echo $count; ?>', 'NO', 'METAL RATE', '<?php echo $fieldName; ?>', '', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
                55000
            </div>
            <div id="metalRateAmtDiv"></div>   
        </td>
        <!-- Ends Here Metal Rate -->
        <!-- Metal Rate Wt -->
        <?php
        $fieldName = 'metalWtCheck';
        $count = 8;
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
            <div onClick="openFormDiv('metalWtDiv', '<?php echo $count; ?>', 'NO', 'METAL WT', '<?php echo $fieldName; ?>', '', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
                0.312
            </div>
            <div id="metalWtDiv"></div>   
        </td>
        <!-- Ends Here Metal Wt -->
        
        <?php
        $fieldName = 'paymentModeCheck';
        $count = 9;
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
            <div onClick="openFormDiv('paymentModeDiv', '<?php echo $count; ?>', 'NO', 'PAYMENT MODE', '<?php echo $fieldName; ?>', '', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
                CHEQUE
            </div>
            <div id="paymentModeDiv"></div>   
        </td>
        <?php
        $fieldName = 'statusCheck';
        $count = 10;
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
            <div onClick="openFormDiv('statusDiv', '<?php echo $count; ?>', 'NO', 'STATUS', '<?php echo $fieldName; ?>', '', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
                PAID
            </div>
            <div id="statusDiv"></div>   
        </td>
        <?php
        $fieldName = 'staffNameCheck';
        $count = 10;
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        ?>
        <td align="center" class="ff_calibri cursor font_color_black fs_14" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="center">
            <div onClick="openFormDiv('staffNameDiv', '<?php echo $count; ?>', 'NO', 'STAFF NAME', '<?php echo $fieldName; ?>', '', '',
                            '', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');" style="margin-top:<?php echo $rowTopMargin; ?>mm;margin-bottom: <?php echo $bottomMargin; ?>mm;" valign="left">
               STAFF NAME
            </div>
            <div id="staffNameDiv"></div>   
        </td>
    </tr>
    <tr></tr>
    <tr></tr>
    
</table>
<table width="100%" align="center" style="margin-top:10%;">
    <tbody>
        <tr>
            <td colspan="" class="padLeft5">
                <?php
                $fieldName = 'termsTop';
                $label_field_content = '';
                parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                $termsDetTopVal = $label_field_content;
                if($termsDetTopVal=='' || $termsDetTopVal==null){
                    $label_field_content = 'Terms and Conditions';
                }
                ?>
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top:<?php echo $termsDetTopVal; ?>mm">
                    <?php
                    $count = 9;
                    $fieldName = 'tncLb';
                    $label_field_font_size = '';
                    $label_field_font_color = '';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                    $label_field_tncLabelTemp = $label_field_content;
                    $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                    $label_field_content = trim(preg_replace('/\s\s+/', '\n', $label_field_content));                        
                    ?>
                    <tr>
                        <td colspan="" align="left" width="150px" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" > 
                            <div onClick="openFormDiv('tncLbDiv', '<?php echo $count; ?>', 'YES', 'Terms and Conditions', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_tncLabelTemp; ?></div>
                            <div id="tncLbDiv"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <?php
                                $count = 10;
                                $fieldName = 'tnc';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                $label_field_content = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $label_field_contentTemp = $label_field_content;

                                $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                                $label_field_content = stripslashes(str_replace('\'', '', $label_field_content));
                                $label_field_content = trim(preg_replace('/\s\s+/', '\n', $label_field_content));

                                $noOfRows = substr_count($label_field_content, "\n") + 2;
                                $height = $noOfRows * ($label_field_font_size * 3);
                                ?>
                                <tr>
                                    <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <textarea id="tncLabel" spellcheck="false" name="tncLabel" class="cursor textarea_1 ff_calibri font_color_<?php echo $label_field_font_color; ?>" rows="<?php echo $noOfRows; ?>"
                                                  onClick="openFormDiv('tncDiv', '<?php echo $count; ?>', 'YES', 'Terms & Conditions', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                          '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-270', '10');"
                                                  style="text-align:left;width:500px;height:<?php $height ?>px"><?php
                                                      if (($label_field_contentTemp) != '')
                                                          echo $label_field_contentTemp;
                                                      else
                                                          echo 'content';
                                                      ?></textarea>                                     
                                        <div id="tncDiv"></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
             <td colspan="" class="padLeft5" style="width:100%">
                <?php
                $fieldName = 'termsTopPass';
                $label_field_content = '';
                parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                $termsDetTopPassVal = $label_field_content;
                if($termsDetTopPassVal=='' || $termsDetTopPassVal==null){
                    $label_field_content = 'Passbook Terms and Conditions';
                }
                ?>
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top:<?php echo $termsDetTopPassVal; ?>mm">
                    <?php
                    $count = 11;
                    $fieldName = 'tncPassbookLb';
                    $label_field_font_size = '';
                    $label_field_font_color = '';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                    $label_field_tncLabelTemp = $label_field_content;
                    $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                    $label_field_content = trim(preg_replace('/\s\s+/', '\n', $label_field_content));
                    ?>
                    <tr>
                        <td colspan="" align="left" width="150px" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" > 
                            <div onClick="openFormDiv('tncPassLbDiv', '<?php echo $count; ?>', 'YES', 'Passbook Terms and Conditions', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '6', '-36');"><?php echo $label_field_tncLabelTemp; ?></div>
                            <div id="tncPassLbDiv"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <?php
                                $count = 12;
                                $fieldName = 'tncPassbook';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                $label_field_content = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $label_field_contentTemp = $label_field_content;

                                $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                                $label_field_content = stripslashes(str_replace('\'', '', $label_field_content));
                                $label_field_content = trim(preg_replace('/\s\s+/', '\n', $label_field_content));

                                $noOfRows = substr_count($label_field_content, "\n") + 2;
                                $height = $noOfRows * ($label_field_font_size * 3);
                                ?>
                                <tr>
                                    <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <textarea id="tncPassLabel" spellcheck="false" name="tncPassLabel" class="cursor textarea_1 ff_calibri font_color_<?php echo $label_field_font_color; ?>" rows="<?php echo $noOfRows; ?>"
                                                  onClick="openFormDiv('tncPassDiv', '<?php echo $count; ?>', 'YES', 'Passbook Terms & Conditions', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                          '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-270', '-410');"
                                                  style="text-align:left;width:500px;height:<?php $height ?>px"><?php
                                                      if (($label_field_contentTemp) != '')
                                                          echo $label_field_contentTemp;
                                                      else
                                                          echo 'content';
                                                      ?></textarea>                                     
                                        <div id="tncPassDiv"></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
    </tbody>
</table>
            </div>

        </div>
    </div>
</div>
</div>