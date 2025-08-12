<?php
/*
 * **************************************************************************************
 * @Description:
 * **************************************************************************************
 *
 * Created on 20 Jun, 2013 11:26:25 AM
 *
 * @FileName: omstockTransibbc55x13imidv.php
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
include_once 'ommpfndv.php';
//include_once 'ommpfunc.php';
include_once 'ommstockpfunc.php';
include_once 'conversions.php';
/******Start code to add panel indiacator @Author:PRIYA16MAY14************ */
//
if ($prnPrintOption == '')
    $prnPrintOption = $_GET['printOption'];
//
$panel = $_GET['panel'];
//
//echo '$panel=='.$panel;
//
if ($prod_id == '' || $prod_id == NULL)
    $prod_id = $_GET['prodid'];
//
// Add Code for DIRECT PRINT PRN - Tail Label @PRIYANKA-11MAR19
if ($sttrId == '' || $sttrId == NULL)
    $sttrId = $_GET['sttrId'];
//
//if ($setQuantity == '' || $setQuantity == NULL)
//    $setQuantity = $_GET['setQuantity'];
//
?>
<?php
if ($_SESSION['sessionOwnIndStr'][7] == 'Y'  || $_SESSION['sessionOwnIndStr'][7] == 'A') {
    $omLayoutOptionTop = '55X13IMLBCTOPMARGIN';
    $omLayoutOptionLeft = '55X13IMLBCLEFTMARGIN';
    $omLayoutOptionBorder = '55X13IMLBCBORDER';
    $omLayOptSlipWidth = '55X13IMBCBLOCKSLIPWIDTH';
    $omLayOptSlipHeight = '55X13IMBCBLOCKSLIPHEIGHT';
    $omLayOptTailLength = '55X13IMBCBLOCKTAILLENGTH';
    $omLayTextAlign = '55X13IMBCBLOCKTEXTALIGN';   // add variable  @Author:GAUR04MAY16
    $omLayBarcodeSize = '55X13IMBCBLOCKBARCODESIZE';   // add variable  @Author:GAUR09SEP16
    // add fontsize Author:GAUR14SEP16
    $omLayFontSize = '55X13IMBCBLOCKFONTSIZE1';
    $omLayFontSize1 = '55X13IMBCBLOCKFONTSIZE1';
    $omLayFontSize2 = '55X13IMBCBLOCKFONTSIZE2';
    $omLayFontSize3 = '55X13IMBCBLOCKFONTSIZE3';
    $omLayFontSize4 = '55X13IMBCBLOCKFONTSIZE4';
    $omLayFontSize5 = '55X13IMBCBLOCKFONTSIZE5';
    $omLayFontSize6 = '55X13IMBCBLOCKFONTSIZE6';
    $omLayFontSize7 = '55X13IMBCBLOCKFONTSIZE7';
    $omLayFontSize8 = '55X13IMBCBLOCKFONTSIZE8';
    $omLayFontSize9 = '55X13IMBCBLOCKFONTSIZE9';
    $omLayFontSize10 = '55X13IMBCBLOCKFONTSIZE10';
    $omLayFontSize11 = '55X13IMBCBLOCKFONTSIZE11';
    $omLayFontSize12 = '55X13IMBCBLOCKFONTSIZE12'; //@AUTHOR:YUVRAJ-23AYG2022

    // add fontsize Author:GAUR14SEP16
    $topMargin = updateOptionValue($omLayoutOptionTop, '', 'selValue', '', $panel);
    $leftMargin = updateOptionValue($omLayoutOptionLeft, '', 'selValue', '', $panel);
    $slipWidth = updateOptionValue($omLayOptSlipWidth, '', 'selValue', '', $panel);
    $slipHeight = updateOptionValue($omLayOptSlipHeight, '', 'selValue', '', $panel);
    $tailLength = updateOptionValue($omLayOptTailLength, '', 'selValue', '', $panel);


    $textAlign = updateOptionValue($omLayTextAlign, '', 'selValue', '', $panel); // add variable  @Author:GAUR04MAY16
    $barcodeSize = updateOptionValue($omLayBarcodeSize, '', 'selValue', '', $panel); // add variable  @Author:GAUR09SEP16
// add fontsize Author:GAUR14SEP16
    $fontSize = updateOptionValue($omLayFontSize, '', 'selValue', '', $panel);
    $fontSize1 = updateOptionValue($omLayFontSize1, '', 'selValue', '', $panel);
    $fontSize2 = updateOptionValue($omLayFontSize2, '', 'selValue', '', $panel);
    $fontSize3 = updateOptionValue($omLayFontSize3, '', 'selValue', '', $panel);
    $fontSize4 = updateOptionValue($omLayFontSize4, '', 'selValue', '', $panel);
    $fontSize5 = updateOptionValue($omLayFontSize5, '', 'selValue', '', $panel);
    $fontSize6 = updateOptionValue($omLayFontSize6, '', 'selValue', '', $panel);
    $fontSize7 = updateOptionValue($omLayFontSize7, '', 'selValue', '', $panel);
    $fontSize8 = updateOptionValue($omLayFontSize8, '', 'selValue', '', $panel);
    $fontSize9 = updateOptionValue($omLayFontSize9, '', 'selValue', '', $panel);
    $fontSize10 = updateOptionValue($omLayFontSize10, '', 'selValue', '', $panel);
    $fontSize11 = updateOptionValue($omLayFontSize11, '', 'selValue', '', $panel);
    $fontSize12 = updateOptionValue($omLayFontSize12, '', 'selValue', '', $panel); //@AUTHOR:YUVRAJ-23AYG2022
    if ($fontSize11 == '') {
        updateOptionValue($omLayFontSize11, '10PX', 'selValue', 'barCode', $panel);
    }
     if ($fontSize12 == '') {
        updateOptionValue($omLayFontSize12, '10PX', 'selValue', 'barCode', $panel); //@AUTHOR:YUVRAJ-23AYG2022
    }
    updateOptionValue('BisMark', '', 'selValue', 'barCode', $panel);
// add fontsize Author:GAUR14SEP16 
    $captionvalue1 = SetCaptionValue('tailBcOption1', '', 'selValue', $panel);
    $captionvalue2 = SetCaptionValue('tailBcOption2', '', 'selValue', $panel);
    $captionvalue3 = SetCaptionValue('tailBcOption3', '', 'selValue', $panel);
    $captionvalue4 = SetCaptionValue('tailBcOption4', '', 'selValue', $panel);
    $captionvalue5 = SetCaptionValue('tailBcOption5', '', 'selValue', $panel);
    $captionvalue6 = SetCaptionValue('tailBcOption6', '', 'selValue', $panel);
    $captionvalue7 = SetCaptionValue('tailBcOption7', '', 'selValue', $panel);
    $captionvalue8 = SetCaptionValue('tailBcOption8', '', 'selValue', $panel);
    $captionvalue9 = SetCaptionValue('tailBcOption9', '', 'selValue', $panel);

    $captionvalue10 = SetCaptionValue('tailBcOption10', '', 'selValue', $panel);
    if ($captionvalue10 == '') {
        SetCaptionValue('tailBcOption10', '', 'insert', $panel);
    }
    $captionvalue11 = SetCaptionValue('BarcodeNumberCaption', '', 'selValue', $panel);
    if ($captioncalue11 == '') {
        SetCaptionValue('BarcodeNumberCaption', '', 'insert', $panel);
    }
//    ############ START @AUTHOR:YUVRAJ-23AYG2022 ADD THIS CODE 12 OPTION ###############
     $captionvalue12 = SetCaptionValue('tailBcOption12', '', 'selValue', $panel);
    if ($captionvalue12 == '') {
        SetCaptionValue('tailBcOption12', '', 'insert', $panel);
    }
//    ############ END @AUTHOR:YUVRAJ-23AYG2022 ADD THIS CODE 12 OPTION #################
    $deleteTopMargin = $slipHeight + 1;
    $deleteLeftMargin = $slipWidth + $tailLength - 2;

    include 'ombcclass.php';
    ?>
    <?php
    /*     * ***********Start code to add button to tail label @Author:SHE23FEB15************************ */
    $tags = $_GET['tags']; //var changed @Author:PRIYA07APR15


    if ($tags != 'true') {
        ?>
        <table border="0" cellpadding="0" width="100%" cellspacing="2" align="center" valign="top" class="noPrint" style="border:1px solid #c1c1c1;background:#f5f5f5;">
            <tr style="background: #FFE34F;">
               <td align='center' width="8%">
                        <span style="font-size:15px;font-weight: 600">1</span>
                    </td>
                 <td align='center' width="8%">
                        <span style="font-size:15px;font-weight: 600">2</span>
                    </td>
                 <td align='center' width="8%">
                        <span style="font-size:15px;font-weight: 600">3</span>
                    </td>
                 <td align='center' width="8%">
                        <span style="font-size:15px;font-weight: 600">4</span>
                    </td>
                 <td align='center' width="8%">
                        <span style="font-size:15px;font-weight: 600">5</span>
                    </td>
                 <td align='center' width="8%">
                        <span style="font-size:15px;font-weight: 600">6</span>
                    </td>
                <td align='center' width="8%">
                        <span style="font-size:15px;font-weight: 600">7</span>
                    </td>
                <td align='center' width="8%">
                        <span style="font-size:15px;font-weight: 600">8</span>
                    </td>
                 <td align='center' width="8%">
                        <span style="font-size:15px;font-weight: 600">9</span>
                    </td>
                <td align='center' width="8%">
                        <span style="font-size:15px;font-weight: 600">10</span>
                    </td>
                <td align='center' width="8%">
                        <span style="font-size:15px;font-weight: 600">11</span>
                    </td>
                <!--Add td for price @Author:ANUJA27JUN15-->
                <td align='center' width="8%">
                        <span style="font-size:15px;font-weight: 600">12</span>
                    </td>
                <!--OPTION ADDED @AUTHOR:MADHUREE-26JUNE2021-->
            </tr>
            <?php
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'tailBcOption1' and omin_panel='$panel'"));
            callTailLoanBCFunc('tailBcOption1', $omin_value, $panel);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'tailBcOption2' and omin_panel='$panel'"));
            callTailLoanBCFunc('tailBcOption2', $omin_value, $panel);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'tailBcOption3' and omin_panel='$panel'"));
            callTailLoanBCFunc('tailBcOption3', $omin_value, $panel);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'tailBcOption4' and omin_panel='$panel'"));
            callTailLoanBCFunc('tailBcOption4', $omin_value, $panel);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'tailBcOption5' and omin_panel='$panel'"));
            callTailLoanBCFunc('tailBcOption5', $omin_value, $panel);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'tailBcOption6' and omin_panel='$panel'"));
            callTailLoanBCFunc('tailBcOption6', $omin_value, $panel);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'tailBcOption7' and omin_panel='$panel'"));
            callTailLoanBCFunc('tailBcOption7', $omin_value, $panel);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'tailBcOption8' and omin_panel='$panel'"));
            callTailLoanBCFunc('tailBcOption8', $omin_value, $panel);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'tailBcOption9' and omin_panel='$panel'"));
            callTailLoanBCFunc('tailBcOption9', $omin_value, $panel);
            /*             * ****************** Start code to add Button @Author:ANUJA27JUN15 *********************************** */
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'tailBcOption10' and omin_panel='$panel'"));
            callTailLoanBCFunc('tailBcOption10', $omin_value, $panel);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'tailBcOption11' and omin_panel='$panel'"));
            callTailLoanBCFunc('tailBcOption11', $omin_value, $panel);
             /* START CODE TO ADD ON 12TH OPTION FOR TAIL LABELS @AUTHOR:YUVRAJ - 23AUG2022 */
            //
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'tailBcOption12' and omin_panel='$panel'"));
            callTailLoanBCFunc('tailBcOption12', $omin_value, $panel);
            //
            /* END CODE TO ADD ON 12TH OPTION FOR TAIL LABELS @AUTHOR:YUVRAJ - 23AUG2022 */
            ?> 
            <!--add fontsize Author:GAUR14SEP16-->

            <tr>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption1" name="caption1" 
                           value="<?php echo $captionvalue1; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption2" name="caption2" 
                           value="<?php echo $captionvalue2; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption3" name="caption3" 
                           value="<?php echo $captionvalue3; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption4" name="caption4" 
                           value="<?php echo $captionvalue4; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption5" name="caption5" 
                           value="<?php echo $captionvalue5; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption6" name="caption6" 
                           value="<?php echo $captionvalue6; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption7" name="caption7" 
                           value="<?php echo $captionvalue7; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption8" name="caption8" 
                           value="<?php echo $captionvalue8; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption9" name="caption9" 
                           value="<?php echo $captionvalue9; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption10" name="caption10" 
                           value="<?php echo $captionvalue10; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption11" name="caption11" 
                           value="<?php echo $captionvalue11; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <!--//    ############ START @AUTHOR:YUVRAJ-23AYG2022 ADD THIS CODE 12 OPTION #################-->
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption12" name="caption12" 
                           value="<?php echo $captionvalue12; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <!--//    ############ START @AUTHOR:YUVRAJ-23AYG2022 ADD THIS CODE 12 OPTION #################-->
            </tr>
            <tr>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode1" name="fontSizeBarCode1" 
                           value="<?php echo $fontSize1; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode2" name="fontSizeBarCode2" 
                           value="<?php echo $fontSize2; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode3" name="fontSizeBarCode3" 
                           value="<?php echo $fontSize3; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode4" name="fontSizeBarCode4" 
                           value="<?php echo $fontSize4; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode5" name="fontSizeBarCode5" 
                           value="<?php echo $fontSize5; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode6" name="fontSizeBarCode6" 
                           value="<?php echo $fontSize6; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode7" name="fontSizeBarCode7" 
                           value="<?php echo $fontSize7; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode8" name="fontSizeBarCode8" 
                           value="<?php echo $fontSize8; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !"width="8%">
                    <input type="text" id="fontSizeBarCode9" name="fontSizeBarCode9" 
                           value="<?php echo $fontSize9; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !"width="8%">
                    <input type="text" id="fontSizeBarCode10" name="fontSizeBarCode10" 
                           value="<?php echo $fontSize10; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !"width="8%">
                    <input type="text" id="fontSizeBarCode11" name="fontSizeBarCode11" 
                           value="<?php echo $fontSize11; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <!--//    ############ START @AUTHOR:YUVRAJ-23AYG2022 ADD THIS CODE 12 OPTION #################-->
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode12" name="fontSizeBarCode12" 
                           value="<?php echo $fontSize12; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                </td>
                <!--//    ############ END @AUTHOR:YUVRAJ-23AYG2022 ADD THIS CODE 12 OPTION #################-->
            </tr>
            
            <tr>
                <td align="center" valign="middle" class="paddingLeft5" colspan="15">
                    <input type="button" id="leftMarginBarCode" name="leftMarginBarCode" 
                           onclick="updateSize55imiBarCode('<?php echo $omLayoutOptionTop; ?>',
                                           '<?php echo $omLayFontSize1; ?>', document.getElementById('fontSizeBarCode1').value,
                                           '<?php echo $omLayFontSize2; ?>', document.getElementById('fontSizeBarCode2').value,
                                           '<?php echo $omLayFontSize3; ?>', document.getElementById('fontSizeBarCode3').value,
                                           '<?php echo $omLayFontSize4; ?>', document.getElementById('fontSizeBarCode4').value,
                                           '<?php echo $omLayFontSize5; ?>', document.getElementById('fontSizeBarCode5').value,
                                           '<?php echo $omLayFontSize6; ?>', document.getElementById('fontSizeBarCode6').value,
                                           '<?php echo $omLayFontSize7; ?>', document.getElementById('fontSizeBarCode7').value,
                                           '<?php echo $omLayFontSize8; ?>', document.getElementById('fontSizeBarCode8').value,
                                           '<?php echo $omLayFontSize9; ?>', document.getElementById('fontSizeBarCode9').value,
                                           '<?php echo $omLayFontSize10; ?>', document.getElementById('fontSizeBarCode10').value,
                                           '<?php echo $omLayFontSize11; ?>', document.getElementById('fontSizeBarCode11').value,
                                           document.getElementById('caption1').value, document.getElementById('caption2').value,
                                           document.getElementById('caption3').value, document.getElementById('caption4').value,
                                           document.getElementById('caption5').value, document.getElementById('caption6').value,
                                           document.getElementById('caption7').value, document.getElementById('caption8').value,
                                           document.getElementById('caption9').value, document.getElementById('caption10').value,
                                           document.getElementById('caption11').value, '<?php echo $panel; ?>',
                                           document.getElementById('fontSizeBarCode12').value, document.getElementById('caption12').value,
                                           '<?php echo $omLayFontSize12; ?>');" 

                           value="SUBMIT" size="5" class="frm-btn" style="margin-top:10px;margin-bottom:10px;width:150px;height: 30px;background:#FFDEAB;color:#A60;border-radius: 3px !important;border: 1px solid #eca02b;"/>
                    <!--//    ############ START @AUTHOR:YUVRAJ-23AYG2022 ADD THIS CODE 12 OPTION #################-->
                </td>
            </tr>
            <!--add fontsize Author:GAUR14SEP16-->
        </table>
        <?php
    }
    /*     * * ***********End code to add button to tail label @Author:SHE23FEB15************************ */
    ?>
    <?php
    $prodname = '';
    if (isset($_GET['prodname'])) {
        $prodname = $_GET['prodname'];
    }
    ?>
    <?php if ($prodname == '') { ?>
        <table width="70%" align="center" style="margin:12px auto;">
            <tr>
                <td style="font-size:16px;color:#000;" width="25%" align="right">
                      <b>  SEARCH PRODUCT BY ID:</b>
                </td>
                <td align="left" title="PRODUCT ID" width="50%">
                    <input  id="Prodid" name="Prodid" type="text" style="width:100%;height:45px;border-radius:5px!important;border: 1px dashed #ef960f;box-shadow: 1px 1px 5px rgba(193, 193, 193, 0.5);padding: 10px;" placeholder="PROD NAME" value="<?php
                    if ($prodName != '')
                        echo $prodName;else {
                        echo 'ALL';
                    }
                    ?>"
                           onkeydown="javascript:if (event.keyCode == 13) {

                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {

                                       return false;
                                   }"
                           onblur="if (this.value == '')
                                       this.value = '<?php echo $Prod_name; ?>'"
                           onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                       getBarcodeProdName(document.getElementById('Prodid').value, 'Prodid', 'ProdNameDiv', '<?php echo $panel; ?>');
                                   }"

                           autocomplete="off" spellcheck="false" class="form-control-height20 placeholderClass" size="4" maxlength="10"  />
                    <div id="ProdNameDiv" class="itemListDivToAddStock placeholderClass" style="position:relative;"></div>
                </td>
                <td width="10%" align="left">
                    <input type="button" id="serachBarcode" onclick="sendProdIMId(document.getElementById('Prodid').value, '<?php echo $panel; ?>');" value='SEARCH'  style="width:100%;height:45px;background:#FFDEAB;color:#A60;border-radius: 3px !important;border: 1px solid #eca02b;font-size:16px;margin-left: -10px;"> <!--//    ############ START @AUTHOR:YUVRAJ-23AYG2022 ADD THIS CODE 12 OPTION #################-->
                </td>
            </tr>
        </table>
    <?php } ?>

    <div id="ogibbc55x13SubDiv" style="border:0px solid;"><!---div added @Author:PRIYA07APR15---->

        <table border="0" cellpadding="0" cellspacing="0" align="center" valign="top" width="100%" class="marginTop10">
            <tr>
                <td valign="top" align="center">
                    <div id="allLabelsThermalDiv" style="border:0px solid;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" valign="top">
                            <?php
                            $selFirmId = $_GET['firmId'];
                            if (!isset($selFirmId)) {
                                $firmIdSelected = $_SESSION['setFirmSession'];
                                $selFirmId = $firmIdSelected;
                            } else {
                                $firmIdSelected = $selFirmId;
                            }
                            //End Code To Select FirmId
                            if ($selFirmId == '' || $selFirmId == NULL) {
                                $qSelectFirm = "SELECT firm_long_name ,firm_address FROM firm where firm_id='1'";
                            } else {
                                $qSelectFirm = "SELECT firm_long_name ,firm_address FROM firm where firm_id='$selFirmId'";
                            }
                            //To display data in this form
                            $resultFirm = mysqli_query($conn, $qSelectFirm);
                            $rowFirm = mysqli_fetch_array($resultFirm);
                            //
                            if ($selFirmId != NULL) {
                                $strFrmId = $selFirmId;
                            } else {
                                $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
                            }

                            include 'ombcclass.php';
                            $barcodePerPage = 1;
                            $checkNextBarcode = $barcodePerPage * 2;

                            $pageNum = 1;
                            $bcounter = 0;

                            if (isset($_GET['page'])) {
                                $pageNum = $_GET['page'];
                                $bcounter = ($pageNum - 1) * $barcodePerPage;
                            }

                            $perOffset = ($pageNum - 1) * $barcodePerPage;
                            $allLabelsSqlQuery = '';
                            if ($divPanel == 'AllLabels') {
                                $allLabelsSqlQuery = "and sttr_id ='$sttrId'";
                                $allLabelsSqlQueryPaging = "order by sttr_id desc LIMIT $perOffset, $checkNextBarcode";
                            } else {
                                $allLabelsSqlQuery = "order by sttr_id desc LIMIT $perOffset, $barcodePerPage";
                                $allLabelsSqlQueryPaging = "order by sttr_id desc LIMIT $perOffset, $checkNextBarcode";
                            }
                            
                            $qSelInItemBarCode = "SELECT * FROM stock_transaction where sttr_indicator IN('imitation','strsilver','RetailStock','fashion') "
                                               . "and sttr_transaction_type NOT IN ('sell') and sttr_metal_type NOT IN ('Gold','Silver') $allLabelsSqlQueryPaging";
                            $resInItemBarCode = mysqli_query($conn, $qSelInItemBarCode);
                            $totalItemBarCode = mysqli_num_rows($resInItemBarCode);
                            
                            //echo '$qSelInItemBarCode @@== '.$qSelInItemBarCode . '<br />';
                            
                            $qSelNextInItemBarCode = "SELECT * FROM stock_transaction where sttr_indicator IN('imitation','strsilver','RetailStock','fashion') and sttr_transaction_type NOT IN('PURCHASE','sell','APPROVAL') and sttr_metal_type NOT IN ('Gold','Silver') and sttr_firm_id IN ($strFrmId) $allLabelsSqlQuery";
                            $resNextInItemBarCode = mysqli_query($conn, $qSelNextInItemBarCode);
                            $totalNextItemBarCode = mysqli_num_rows($resNextInItemBarCode);

                            //echo '$qSelNextInItemBarCode ##== '.$qSelNextInItemBarCode . '<br />';

                            $counter = 1;

                            $pre = preg_replace("/[^A-Za-z]+/", "", $prod_id);
                            $post = preg_replace("/[^0-9]+/", "", $prod_id);

                            if ($sttrId != '') {
                                $qSelNextInItemBarCode = "SELECT * FROM stock_transaction WHERE sttr_indicator IN('imitation','strsilver','RetailStock','fashion') " // <!--//    START @AUTHOR:YUVRAJ-23AYG2022 ADD RETAILSTCK
                                                       . "and sttr_id='$sttrId'";
                            
                                //echo '$qSelNextInItemBarCode 1== '.$qSelNextInItemBarCode . '<br />';
                            } else if ($prod_id != 'ALL' && $prod_id != '') {
                                $qSelNextInItemBarCode = "SELECT * FROM stock_transaction WHERE (sttr_sttr_id IS NULL or sttr_sttr_id='') "
                                                       . "and sttr_indicator IN('imitation','strsilver','RetailStock','fashion') and sttr_item_pre_id='$pre' " // <!--//    START @AUTHOR:YUVRAJ-23AYG2022 ADD RETAILSTCK
                                                       . "and sttr_item_id='$post' and sttr_item_code = '$prod_id'";
                            
                                //echo '$qSelNextInItemBarCode 2== '.$qSelNextInItemBarCode . '<br />';
                            } else if ($prod_id == 'ALL') {
                                $qSelNextInItemBarCode = "SELECT * FROM stock_transaction WHERE (sttr_sttr_id IS NULL or sttr_sttr_id='') "
                                                       . "and sttr_indicator IN('imitation','strsilver','RetailStock','fashion') $allLabelsSqlQuery"; // <!--//    START @AUTHOR:YUVRAJ-23AYG2022 ADD RETAILSTCK
                            
                                //echo '$qSelNextInItemBarCode 3== '.$qSelNextInItemBarCode . '<br />';
                            }

                            //echo '$qSelNextInItemBarCode @@!!== '.$qSelNextInItemBarCode . '<br />';

                            $resNextInItemBarCode = mysqli_query($conn, $qSelNextInItemBarCode);
                            $totalNextItemBarCode = mysqli_num_rows($resNextInItemBarCode);

                            if ($totalNextItemBarCode == 0) {
                                
                                if ($prod_id != 'ALL' && $prod_id != '') {
                                    $qSelNextInItemBarCode = "SELECT * FROM stock_transaction WHERE (sttr_sttr_id IS NULL or sttr_sttr_id='') and sttr_indicator NOT IN ('crystal','stock','imitation','RetailStock','fashion') and sttr_item_pre_id='$prod_id' order by sttr_id desc LIMIT 0,1"; // <!--//    START @AUTHOR:YUVRAJ-23AYG2022 ADD RETAILSTCK
                                }
                                
                                $resNextInItemBarCode = mysqli_query($conn, $qSelNextInItemBarCode);
                                $totalNextItemBarCode = mysqli_num_rows($resNextInItemBarCode);
                                
                                if ($totalNextItemBarCode == 0) {
                                    
                                    if ($prod_id != 'ALL' && $prod_id != '') {
                                                                                                                        
                                        $qSelNextInItemBarCode = "SELECT * FROM stock_transaction WHERE "
                                                               . "(sttr_sttr_id IS NULL or sttr_sttr_id='') "
                                                               . "and sttr_indicator NOT IN ('crystal','stock','imitation','RetailStock','fashion') " // <!--//    START @AUTHOR:YUVRAJ-23AYG2022 ADD RETAILSTCK
                                                               . "and sttr_item_code='$prod_id' order by sttr_id desc "
                                                               . "LIMIT 0,1";
                                    }
                                    
                                    $resNextInItemBarCode = mysqli_query($conn, $qSelNextInItemBarCode);
                                    $totalNextItemBarCode = mysqli_num_rows($resNextInItemBarCode);
                                }
                                
                            }
                            
                            //echo '$totalNextItemBarCode %%== '.$totalNextItemBarCode . '<br />';
                                                       

//                            if ($totalNextItemBarCode == 0) {
//                                $result = preg_match("/[a-zA-Z]/", $prod_id);
//                                //echo '$result:' . $result; die;
//                                if ($prod_id != 'ALL' && $prod_id != '') {
//                                    $qSelNextInItemBarCode = "SELECT * FROM item_barcode WHERE (itbc_ref_id IS NULL or itbc_ref_id='') and itbc_indicator !='stockCrystal' and itbc_pre_id='$prod_id' order by itbc_id desc LIMIT 0,1";
//                                }                                      
//                            $resNextInItemBarCode = mysqli_query($conn, $qSelNextInItemBarCode);
//                            $totalNextItemBarCode = mysqli_num_rows($resNextInItemBarCode); 
//                            }
//                            
                            //Start Code to get current metal rate
                            $qSelGoldRate = "SELECT met_rate_value FROM metal_rates where met_rate_own_id='$_SESSION[sessionOwnerId]' and met_rate_metal_name='Gold' order by met_rate_ent_dat desc LIMIT 0, 1";
                            $resGoldRate = mysqli_query($conn, $qSelGoldRate);
                            $rowGoldRate = mysqli_fetch_array($resGoldRate, MYSQLI_ASSOC);

                            $goldRate = $rowGoldRate['met_rate_value'];
                            $goldRate = trim($goldRate);

                            $qSelSilverRate = "SELECT * FROM metal_rates where met_rate_own_id='$_SESSION[sessionOwnerId]' and met_rate_metal_name='Silver' order by met_rate_ent_dat desc LIMIT 0, 1";
                            $resSilverRate = mysqli_query($conn, $qSelSilverRate);
                            $rowSilverRate = mysqli_fetch_array($resSilverRate, MYSQLI_ASSOC);

                            $silverRate = $rowSilverRate['met_rate_value'];
                            $silverRatePerWt = $rowSilverRate['met_rate_per_wt'];
                            $silverRatePerWtType = $rowSilverRate['met_rate_per_wt_tp'];
                            $silverRate = trim($silverRate);
                            ?>
                            <?php
                            $divPrinted = FALSE;
                            while ($rowInItemBarCode = mysqli_fetch_array($resNextInItemBarCode, MYSQLI_ASSOC)) {
                                $cryValuation = 0;
                                $bcId = $rowInItemBarCode['sttr_id'];
                                $bcFirmId = $rowInItemBarCode['sttr_firm_id'];
                                $prodRFIDNo = $rowInItemBarCode['sttr_rfid_no'];
                                $bcItemId = $rowInItemBarCode['sttr_barcode'];
                                $bcItemQty = $rowInItemBarCode['sttr_quantity'];
                                $bcItemPreId = trim($rowInItemBarCode['sttr_item_pre_id']);
                                $bcItemPostId = trim($rowInItemBarCode['sttr_item_id']);
                                $bcItemName = trim($rowInItemBarCode['sttr_item_name']);
                                $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 20)));
                                $bcItemWt = trim($rowInItemBarCode['sttr_gs_weight']);
                                $bcItemWtType = trim($rowInItemBarCode['sttr_gs_weight_type']);
                                $bcItemNtWt = trim($rowInItemBarCode['sttr_nt_weight']);
                                $bcItemNtWtType = trim($rowInItemBarCode['sttr_nt_weight_type']);
                                $newItemVATCharges = $rowInItemBarCode['sttr_tax'];
                                $newItemColor = $rowInItemBarCode['sttr_color'];
//                                echo '$newItemColor=='.$newItemColor;
                                $bcItemPktWt = trim($rowInItemBarCode['sttr_pkt_weight']);          //add variable Author:GAUR13SEP16
                                $bcItemPktWtType = trim($rowInItemBarCode['sttr_pkt_weight_type']); //add variable Author:GAUR13SEP16
                                $bcItemCustCode = trim($rowInItemBarCode['sttr_cust_itmcode']);     //add variable Author:GAUR16SEP16
                                $bcItemCustCodeNum = trim($rowInItemBarCode['sttr_cust_itmnum']);   //add variable Author:GAUR16SEP16
                                $bcItemDate = trim($rowInItemBarCode['sttr_add_barcode_date']);
                                $bcItemCrystalVal = intval($rowInItemBarCode['sttr_stone_amt']);
                                $bcItemCryNtWt = trim($rowInItemBarCode['sttr_stone_wt']);
                                $bcItemCryNtWtType = trim($rowInItemBarCode['sttr_stone_wt_type']);
                                $bcItemMkChrg = trim($rowInItemBarCode['sttr_making_charges']);
                                $bcItemMkChrgType = trim($rowInItemBarCode['sttr_making_charges_type']);
                                $bcItemMkChrgBy = trim($rowInItemBarCode['sttr_mkg_charges_by']);
                                $girviOtherInfo = trim($rowInItemBarCode['sttr_item_other_info']);
                                $bcItemModelNo = trim($rowInItemBarCode['sttr_item_model_no']);
                                $bcItemSize = trim($rowInItemBarCode['sttr_size']);
                                $bcItemPrefixId = $rowInItemBarCode['sttr_barcode_prefix'];
                                $bcGetCrsytal = trim($rowInItemBarCode['sttr_id']);
                                $bcmetaltype = trim($rowInItemBarCode['sttr_product_type']);
                                $valaddamt = trim($rowInItemBarCode['sttr_value_added']);
                                $newItemFFNW = $rowInItemBarCode['sttr_final_fine_weight'];
                                $itemFFNWT = $rowInItemBarCode['sttr_final_fine_weight'];
                                $itemFFNWT = $itemFFNWT + $rowInItemBarCode['sttr_cust_wastage_wt'];
                                $valadd = trim($rowInItemBarCode['sttr_cust_wastage']);
                                $metalRateId = $rowInItemBarCode['sttr_metal_rate'];
                                $itemMetalType = $rowInItemBarCode['sttr_metal_type'];
                                $itemCustMetalRate = $rowInItemBarCode['sttr_metal_rate'];
                                $itemMetalRate = $rowInItemBarCode['sttr_metal_rate'];       //ADDED ITEM METAL RATE @SIMRAN:07JULY2023
//                                $valaddwt = trim($rowInItemBarCode['sttr_cust_wastage_wt']); //echo 'op:' . $valaddwt;
                                $itemfnwt = trim($rowInItemBarCode['sttr_fine_weight']);
                                $itemvaluation = trim($rowInItemBarCode['sttr_valuation']);
                                $itemfinalvaluation = trim($rowInItemBarCode['sttr_final_valuation']);
                                $itemtottax = $rowInItemBarCode['sttr_tot_tax'];
                                $itemWtBy = $rowInItemBarCode['sttr_final_val_by'];
                                $itemCustPrice = $rowInItemBarCode['sttr_cust_price'];
                                $itemPrice = $rowInItemBarCode['sttr_unit_price'];
                                $itemFinalPrice = $rowInItemBarCode['sttr_final_sell_valuation'];
                                $itemMkgPrice = $rowInItemBarCode['sttr_making_charges'];
                                $sttr_indicator = $rowInItemBarCode['sttr_indicator'];
                                $itemshape = $rowInItemBarCode['sttr_shape'];
                                $bcItemPriceCode = $rowInItemBarCode['sttr_cust_itmpricecode'];
                                $suppliername = $rowInItemBarCode['sttr_brand_id']; // ADD SUPPLIER NAME FOR IMITATION TAG @AUTHOR SIMRAN-04APR2022
                                $stocDealPric=$rowInItemBarCode['sttr_dealer_price'];
                                $stockFrnPric=$rowInItemBarCode['sttr_franchise_price'];
//                                echo '$bcItemPriceCode=='.$bcItemPriceCode;
                                
                                //echo '$bcId== '.$bcId . '<br />';
                                //echo '$bcItemPreId== '.$bcItemPreId . '<br />';
                                //echo '$bcItemPostId== '.$bcItemPostId . '<br />';
                                
                                //echo '$bcItemPrefixId 1== '.$bcItemPrefixId . '<br />';

//                                if ($bcItemPrefixId == '' || $bcItemPrefixId == NULL || $bcItemPrefixId === 'undefined') {
//                                    $bcItemPrefixId = 1;
//                                }

                                //echo '$bcItemPrefixId 2== '.$bcItemPrefixId . '<br />';
                                

                                $querySelItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_sttr_id = '$bcId' and sttr_indicator NOT IN ('crystal','stock','imitation','RetailStock') and sttr_status NOT IN('SOLDOUT','DELETED') and sttr_current_status NOT IN ('Deleted')"; // Code to add Imitation Stock condition @Author:SHRI26FEB15
                               // <!--//    START @AUTHOR:YUVRAJ-23AYG2022 ADD RETAILSTCK
                                $resultItemDetails = mysqli_query($conn, $querySelItemDetails);
                                $numRows = mysqli_num_rows($resultItemDetails);

                                while ($rowDetails = mysqli_fetch_array($resultItemDetails, MYSQLI_ASSOC)) {

                                    if ($rowDetails['sttr_sell_rate'] != '') {
                                        if ($rowDetails['sttr_sell_rate_type'] == $rowDetails['sttr_gs_weight_type']) {
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_gs_weight']) * $rowDetails['sttr_sell_rate'];
//                                             echo '$cryValuation=='.$cryValuation;
                                        } else if ($rowDetails['sttr_sell_rate_type'] == 'CT' && $rowDetails['sttr_gs_weight_type'] == 'GM') {
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] / 5));
                                        } else if ($rowDetails['sttr_sell_rate_type'] == 'KG' && $rowDetails['sttr_gs_weight_type'] == 'GM') {
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_gs_weight']) * ($rowDetails['sttr_sell_rate'] * 1000);
                                        } else if ($rowDetails['sttr_sell_rate_type'] == 'MG' && $rowDetails['sttr_gs_weight_type'] == 'GM') {
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_gs_weight']) * ($rowDetails['sttr_sell_rate'] / 1000);
                                        } else if ($rowDetails['sttr_sell_rate_type'] == 'CT' && $rowDetails['sttr_gs_weight_type'] == 'KG') {
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] / (1000 * 5)));
                                        } else if ($rowDetails['sttr_sell_rate_type'] == 'MG' && $rowDetails['sttr_gs_weight_type'] == 'KG') {
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] / 1000000));
                                        } else if ($rowDetails['sttr_sell_rate_type'] == 'GM' && $rowDetails['sttr_gs_weight_type'] == 'KG') {
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] / 1000));
                                        } else if ($rowDetails['sttr_sell_rate_type'] == 'CT' && $rowDetails['sttr_gs_weight_type'] == 'MG') {
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_gs_weight'] * (($rowDetails['sttr_sell_rate'] / 5) * 1000));
                                        } else if ($rowDetails['sttr_sell_rate_type'] == 'KG' && $rowDetails['sttr_gs_weight_type'] == 'MG') {
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_gs_weight'] * (($rowDetails['sttr_sell_rate'] * 1000) * 1000));
                                        } else if ($rowDetails['sttr_sell_rate_type'] == 'GM' && $rowDetails['sttr_gs_weight_type'] == 'MG') {
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] * 1000));
                                        } else if ($rowDetails['sttr_sell_rate_type'] == 'GM' && $rowDetails['sttr_gs_weight_type'] == 'CT') {
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] * 5));
                                        } else if ($rowDetails['sttr_sell_rate_type'] == 'KG' && $rowDetails['sttr_gs_weight_type'] == 'CT') {
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] / 5000));
                                        } else if ($rowDetails['sttr_sell_rate_type'] == 'MG' && $rowDetails['sttr_gs_weight_type'] == 'CT') {
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] * 200));
                                        } else if ($rowDetails['sttr_sell_rate_type'] == 'PP') {
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_quantity']) * $bcItem['sttr_sell_rate'];
                                        }
                                    } else {
                                        $cryValuation = $cryValuation + $rowDetails['sttr_valuation'];
                                       
                                    }

                                    if ($numRows == 1) {
                                        $cryGsWt = $cryGsWt + $rowDetails['sttr_gs_weight'];
                                        $cryGsWtType = $rowDetails['sttr_gs_weight_type'];
                                    }
                                }
                                $itemCustGSW = $itemFFNWT;

                                $itemCustMetalRate = $metalRateId;
                                $custMetalIdSelected = $itemCustMetalRate;

//                                include 'ogiamtrt.php';
                                $metalRate = callMetalRateTable('select', 'metalRateByRateId', $metalRateId, '', '');
                                if ($metalRate == '') {  
                                    if ($itemMetalType == 'Gold')
                                        $metalRate = $goldRate;
                                    else
                                        $metalRate = $silverRate;
                                }
                                $totalItemTaxChrg = om_round($newItemVATCharges);

                                if ($cryValuation == '' || $cryValuation == NULL) {
                                    $cryValuation = 0;
                                }

                                if ($custTotalTAX == '')
                                    $custTotalTAX = 0;

                                $totalLabNOthCharges = 0;

                                //$bcItemMkChrgBy
                                //Start Code to calculate the valuation of Item


                                if ($bcItemMkChrg != '') {

                                    if ($bcItemMkChrgBy == 'mkgByGrossWt') {
                                        $itemCustGSW = $bcItemWt;
                                    } elseif ($bcItemMkChrgBy == 'mkgByNetWt') {
                                        $itemCustGSW = $bcItemNtWt;
                                    } elseif ($bcItemMkChrgBy == 'mkgByFineWt') {
                                        $itemCustGSW = $itemFFNWT;
                                    } else {
                                        $itemCustGSW = $bcItemWt;
                                    }


                                    if ($bcItemMkChrgType == 'KG') {
                                        if ($bcItemWtType == 'KG')
                                            $totalLabNOthCharges = $bcItemMkChrg * $itemCustGSW;
                                        else if ($bcItemWtType == 'GM')
                                            $totalLabNOthCharges = ($bcItemMkChrg / 1000) * $itemCustGSW;
                                        else
                                            $totalLabNOthCharges = ($bcItemMkChrg / (1000 * 1000)) * $itemCustGSW;
                                    }
                                    else if ($bcItemMkChrgType == 'GM') {
                                        if ($bcItemWtType == 'KG')
                                            $totalLabNOthCharges = $bcItemMkChrg * 1000 * $itemCustGSW;
                                        else if ($bcItemWtType == 'GM')
                                            $totalLabNOthCharges = $bcItemMkChrg * $itemCustGSW;
                                        else
                                            $totalLabNOthCharges = ($bcItemMkChrg / 1000) * $itemCustGSW;
//                                        echo '$totalLabNOthCharges=='.$totalLabNOthCharges;
                                    }
                                    else if ($bcItemMkChrgType == 'MG') {
                                        if ($bcItemWtType == 'KG')
                                            $totalLabNOthCharges = $bcItemMkChrg * 1000 * 1000 * $itemCustGSW;
                                        else if ($bcItemWtType == 'GM')
                                            $totalLabNOthCharges = $bcItemMkChrg * 1000 * $itemCustGSW;
                                        else
                                            $totalLabNOthCharges = $bcItemMkChrg * $itemCustGSW;
                                    }
                                    else if ($bcItemMkChrgType == 'PP') {
                                        $totalLabNOthCharges = $bcItemMkChrg * $bcItemQty;
                                    } else if ($bcItemMkChrgType == 'per') {
                                        $labNOthCharges = ($bcItemMkChrg * $itemCustGSW) / 100;
                                        if ($itemMetalType == 'Gold') {
                                            if ($bcItemWtType == 'KG') {
                                                $totalLabNOthCharges = (($labNOthCharges * $metalRate) * $gmWtInKg);
                                            } else if ($bcItemWtType == 'GM') {
                                                $totalLabNOthCharges = (($labNOthCharges * $metalRate) / $gmWtInGm);
                                            } else if ($bcItemWtType == 'MG') {
                                                $totalLabNOthCharges = (($labNOthCharges * $metalRate) / $gmWtInMg);
                                            }
                                        } else if ($itemMetalType == 'Silver') {
                                            if ($bcItemWtType == 'KG') {
                                                $totalLabNOthCharges = ($labNOthCharges * $metalRate * $srGmWtInKg);
                                            } else if ($bcItemWtType == 'GM') {
                                                $totalLabNOthCharges = (($labNOthCharges * $metalRate) / $srGmWtInGm);
                                            } else if ($bcItemWtType == 'MG') {
                                                $totalLabNOthCharges = (($labNOthCharges * $metalRate) / $srGmWtInMg);
                                            }
                                        }
                                    }
                                }

                                if ($itemWtBy == 'byNetWt') {
                                    $itemCustGSW = $bcItemNtWt;
                                } else {
                                    $itemCustGSW = $itemCustGSW;
                                }

                                if ($itemMetalType == 'Gold') {
                                    if ($bcItemWtType == 'KG') {
                                        $custValWithOutMake = (($newItemFFNW * $metalRate) * 100);
                                    } else if ($bcItemWtType == 'GM') {
                                        $custValWithOutMake = (($newItemFFNW * $metalRate) / 10);
                                    } else if ($bcItemWtType == 'MG') {
                                        $custValWithOutMake = (($newItemFFNW * $metalRate) / 10000);
                                    }
//                                    echo '$custValWithOutMake=='.$custValWithOutMake;
                                } else if ($itemMetalType == 'Silver') {
                                    if ($bcItemWtType == 'KG') {
                                        $custValWithOutMake = (($newItemFFNW * $metalRate));
                                    } else if ($bcItemWtType == 'GM') {

                                        if ($silverRatePerWtType == 'KG')
                                            $custValWithOutMake = ($newItemFFNW * $metalRate / 1000);
                                        else
                                            $custValWithOutMake = ($newItemFFNW * $metalRate / $silverRatePerWt);
                                    } else if ($bcItemWtType == 'MG') {
                                        $custValWithOutMake = (($newItemFFNW * $metalRate) / (1000 * 1000));
                                    }
                                }
                                $custFinalValuation = om_round($custValWithOutMake + $totalLabNOthCharges);
//                                echo '$custFinalValuation=='.$custFinalValuation;

                                $custValWithOutMake = om_round($custValWithOutMake);
                                if ($cryValuation != '')
                                    $custFinalValuation = $custFinalValuation + $cryValuation;
                                if ($totalItemTaxChrg != '') {
                                    $custTotalTAX = om_round(($custFinalValuation * $totalItemTaxChrg) / 100);
                                    $custFinalValuation = om_round($custFinalValuation + $custTotalTAX);
                                }
                                if ($valaddamt != '') {
                                    $custFinalValuation = $custFinalValuation + $valaddamt;
                                }
                                if ($itemtottax != '') {
                                    $custFinalValuation = $custFinalValuation + $itemtottax;
                                }
                                $custFinalValuation = $custFinalValuation;

                                $totalValuation = $custValWithOutMake + $cryValuation; //Line Added @Author:PRIYA16AUG13

                                $bcPrice = $custFinalValuation; //add bcPrice @Author:ANUJA03JULY15

                                if ($sttr_indicator == 'stock') {
                                    $Finalprice = $custFinalValuation;
                                    $UintPrice = $Finalprice / $bcItemQty;
                                } else if ($sttr_indicator == 'imitation') {
//                                    $Finalprice = $itemCustPrice * $bcItemQty;
                                    $Finalprice = $itemCustPrice + $bcItemMkChrg;
                                    $UintPrice = $itemCustPrice;
                                } else if ($sttr_indicator == 'strsilver'){
                                    $Finalprice = $itemFinalPrice;
                                    $UintPrice = $itemPrice + $itemMkgPrice;
                                }

                                //echo '$Finalprice=='.$Finalprice.'<br />';
                                //echo '$UintPrice='.$UintPrice.'<br />';

                                $bismark = trim($rowInItemBarCode['sttr_bis_mark']); //to take value of bismark checkbox @AUTHOR: SANDY23JUL13 
                                $divPrinted = TRUE;
                                $bcItemCustPri = trim($rowInItemBarCode['sttr_cust_price']); //Add new variable @Author:ANUJA27JUN15
                                $qSelPerFirm = "SELECT firm_name,firm_long_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$bcFirmId'";

                                $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                                $rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC);
                                $firmNameLabel = $rowPerFirm['firm_long_name'];
                                if ($firmNameLabel == '') {
                                    $firmNameLabel = $rowPerFirm['firm_name'];
                                }
                                $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 19));

                                //Start To set barcode color as per purity @AUTHOR: SANDY21OCT13
                                $tunch = $rowInItemBarCode['sttr_purity'];
                                $metal = $rowInItemBarCode['sttr_product_type'];

                                $imgId = $rowInItemBarCode['sttr_image_id'];

//                                echo '$imgId:'.$imgId;
                                $qSelBarcodeColor = "SELECT itm_tunch_bccolor,itm_tunch_bctext FROM item_tunch where itm_tunch_own_id='$_SESSION[sessionOwnerId]' and itm_tunch_value='$tunch' and itm_tunch_metal_type='$metal'";
                                $resBarcodeColor = mysqli_query($conn, $qSelBarcodeColor);
                                $rowBarcodeColor = mysqli_fetch_array($resBarcodeColor, MYSQLI_ASSOC);
                                $barCodeText = $rowBarcodeColor['itm_tunch_bctext'];
                                $barCodeText = om_strtoupper(substr($barCodeText, 0, 18));
                                //Start To set barcode color as per purity @AUTHOR: SANDY21OCT13
//                                if($bcItemPrefixId == '2' && $girviOtherInfo == 'WholeSale'){
//                                    $bcItemId = $bcItemPreId;
//                                }
//                                echo '<br/> Q:' . $bcGetCrsytal;
                                if ($bcGetCrsytal != '') {
                                    $getCrystalQuery = "SELECT * FROM stock_transaction WHERE sttr_sttr_id ='$bcGetCrsytal'";
                                    //echo '<br/> Q:' . $getCrystalQuery;
                                    $resInItemBarCodeCrystal = mysqli_query($conn, $getCrystalQuery);
                                    $stoneinfopresentcnt = mysqli_num_rows($resInItemBarCodeCrystal);
                                    $bcItemCrystal = '';
                                    //echo '<br/> Q:' . $bcItemCrystal;
                                    if ($stoneinfopresentcnt > 0) {
                                        $bcItemCrystal = array();
                                        while ($rowInItemBarCodeCrystal = mysqli_fetch_array($resInItemBarCodeCrystal, MYSQLI_ASSOC)) {
                                            //$bcItemCrystalName = $rowInItemBarCodeCrystal['itbc_name'];
                                            //echo '<br/> Name:' . $bcItemCrystalName;
                                            $bcItemCrystal[] = $rowInItemBarCodeCrystal;
//                                            print_r($bcItemCrystal);
                                        }
                                    }
                                }
                                //echo '<br/> Q:' . $bcItemCrystal;
                                //echo '<br/>';
                                //print_r($bcItemCrystal);
                                ?>
                                <tr>
                                    <td>
                                        <?php include 'omstock55x13imisbdv.php'; ?>
                                        <div id="barCodeCloseDiv<?php echo $counter; ?>" style="cursor: pointer;border:0px solid;" class="marginLeftBarCode55x13 noPrint"
                                             onclick="deleteItemBarCode84L('block81x13Div<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>', '<?php echo $bcId; ?>');">
                                                 <?php if ($divPrinted == TRUE) { ?>
                                                <img src="<?php echo $documentRoot; ?>/images/img/cancel.png" alt="" class="noPrint marTop6" style="height:14px;"/>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr> 
                                <?php if ($counter != $totalItemBarCode && $counter != 10 && $divPanel != 'AllLabels') { ?>
                                            <!--                                    <tr>
                                                                            <td>
                                                                                <div class="block3MMDiv"></div>
                                                                            </td>
                                                                        </tr>-->
                                    <?php
                                }$counter++;
                                $bcounter++;
                            }
                            ?>
                        </table>
                    </div>
                </td>
            </tr>
            <?php if ($prod_id == 'ALL' || $prod_id == '') { ?>
                <?php if ($totalNextItemBarCode > 0) { ?>
                    <tr>
                        <td>
                            <table border="0" cellpadding="2" cellspacing="0" align="right" width="100%"  style="margin:12px auto;">
                                <tr>
                                    <?php
                                    if ($pageNum > 1) {
                                        ?>
                                        <td align="right">
                                            <form name="prev_barcode" id="prev_barcode"
                                                  action="javascript:navigationToNextBarcodePanel(<?php echo "$pageNum - 1"; ?>,'<?php echo $panel; ?>','');"
                                                  method="get"><input type="submit" value=" PREVIOUS " class="frm-btn"
                                                                maxlength="30" size="15" style="background: #dceaff;color: #0a0c87;border: 1px solid #5f9df5;border-radius: 6px !important;padding: 2px 10px;font-size:16px;font-weight:600;"/></form>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($totalItemBarCode > $barcodePerPage) {
                                        ?>
                                        <td align="right">
                                            <form name="next_Barcodes" id="next_Barcodes"
                                                  action="javascript:navigationToNextBarcodePanel(<?php echo $pageNum + 1; ?>,'<?php echo $panel; ?>','');"
                                                  method="get"><input type="submit" value=" NEXT " class="frm-btn"
                                                                maxlength="30" size="15" style="background: #dceaff;color: #0a0c87;border: 1px solid #5f9df5;border-radius: 6px !important;padding: 2px 10px;font-size:16px;font-weight:600;"/></form>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
<?php } ?>