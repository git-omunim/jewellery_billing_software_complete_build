<?php
/*
 * **************************************************************************************
 * @Description:
 * **************************************************************************************
 *
 * Created on 20 Jun, 2013 11:26:25 AM
 *
 * @FileName: omstockTransibbc55x13dv.php
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
//
if ($prnPrintOption == '')
    $prnPrintOption = $_GET['printOption'];
//
if ($panel == '') {
    $panel = $_GET['panel'];
}
//
//echo '$prnPrintOption:' . $prnPrintOption; //die;
//
//
if ($prod_id == '' || $prod_id == NULL)
    $prod_id = $_GET['prodid'];
//
// Add Code for DIRECT PRINT PRN - Tail Label @PRIYANKA-11MAR19
if ($sttrId == '' || $sttrId == NULL)
    $sttrId = $_GET['sttrId'];
//
?>
<?php
if ($_SESSION['sessionOwnIndStr'][7] == 'Y' || $_SESSION['sessionOwnIndStr'][7] == 'A') {


    $omLayoutOptionTop = '55X13LBCTOPMARGIN';
    $omLayoutOptionLeft = '55X13LBCLEFTMARGIN';
    $omLayoutOptionBorder = '55X13LBCBORDER';
    $omLayOptSlipWidth = '55X13BCBLOCKSLIPWIDTH';
    $omLayOptSlipHeight = '55X13BCBLOCKSLIPHEIGHT';
    $omLayOptTailLength = '55X13BCBLOCKTAILLENGTH';
    $omLayTextAlign = '55X13BCBLOCKTEXTALIGN';   // add variable  @Author:GAUR04MAY16
    $omLayBarcodeSize = '55X13BCBLOCKBARCODESIZE';   // add variable  @Author:GAUR09SEP16
    // add fontsize Author:GAUR14SEP16
    $omLayFontSize = '55X13BCBLOCKFONTSIZE1';
    $omLayFontSize1 = '55X13BCBLOCKFONTSIZE1';
    $omLayFontSize2 = '55X13BCBLOCKFONTSIZE2';
    $omLayFontSize3 = '55X13BCBLOCKFONTSIZE3';
    $omLayFontSize4 = '55X13BCBLOCKFONTSIZE4';
    $omLayFontSize5 = '55X13BCBLOCKFONTSIZE5';
    $omLayFontSize6 = '55X13BCBLOCKFONTSIZE6';
    $omLayFontSize7 = '55X13BCBLOCKFONTSIZE7';
    $omLayFontSize8 = '55X13BCBLOCKFONTSIZE8';
    $omLayFontSize9 = '55X13BCBLOCKFONTSIZE9';
    $omLayFontSize10 = '55X13BCBLOCKFONTSIZE10';
    $omLayFontSize11 = '55X13BCBLOCKFONTSIZE11';
    $omLayFontSize12 = '55X13BCBLOCKFONTSIZE12'; //@AUTHOR:MADHUREE-26JUNE2021
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
    $fontSize12 = updateOptionValue($omLayFontSize12, '', 'selValue', '', $panel); //@AUTHOR:MADHUREE-26JUNE2021
    if ($fontSize11 == '') {
        updateOptionValue($omLayFontSize11, '10PX', 'selValue', 'barCode', $panel);
    }
    if ($fontSize12 == '') {
        updateOptionValue($omLayFontSize12, '10PX', 'selValue', 'barCode', $panel);
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
    $captionvalue12 = SetCaptionValue('tailBcOption12', '', 'selValue', $panel);
    if ($captionvalue12 == '') {
        SetCaptionValue('tailBcOption12', '', 'insert', $panel);
    }

    $deleteTopMargin = $slipHeight + 1;
    $deleteLeftMargin = $slipWidth + $tailLength - 2;

    include 'ombcclass.php';
    ?>
    <?php
    /*     * **********Start code to add button to tail label @Author:SHE23FEB15************************ */
    $tags = $_GET['tags']; //var changed @Author:PRIYA07APR15

    if ($tags != 'true') {
        ?>
        <table border="0" cellpadding="1" cellspacing="1" align="center" valign="top" class="noPrint" width="100%" style="border:1px solid #c1c1c1;background:#f5f5f5;" width="100%"> <!--Add style for chrome @Author:ASHWINI PATIL-->
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
            //
            /* START CODE TO ADD ON 12TH OPTION FOR TAIL LABELS @AUTHOR:MADHUREE-26JUNE2021 */
            //
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'tailBcOption12' and omin_panel='$panel'"));
            callTailLoanBCFunc('tailBcOption12', $omin_value, $panel);
            //
            /* END CODE TO ADD ON 12TH OPTION FOR TAIL LABELS @AUTHOR:MADHUREE-26JUNE2021 */
            //
            ?> 

            <!--add fontsize Author:GAUR14SEP16-->
            <!--Table added by Ashwini Patil-->

            <tr>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption1" name="caption1" 
                           value="<?php echo $captionvalue1; ?>" placeholder="CAPTION" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center" />
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption2" name="caption2" 
                           value="<?php echo $captionvalue2; ?>" placeholder="CAPTION" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption3" name="caption3" 
                           value="<?php echo $captionvalue3; ?>" placeholder="CAPTION" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption4" name="caption4" 
                           value="<?php echo $captionvalue4; ?>" placeholder="CAPTION" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption5" name="caption5" 
                           value="<?php echo $captionvalue5; ?>" placeholder="CAPTION" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption6" name="caption6" 
                           value="<?php echo $captionvalue6; ?>" placeholder="CAPTION" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption7" name="caption7" 
                           value="<?php echo $captionvalue7; ?>" placeholder="CAPTION" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption8" name="caption8" 
                           value="<?php echo $captionvalue8; ?>" placeholder="CAPTION" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption9" name="caption9" 
                           value="<?php echo $captionvalue9; ?>" placeholder="CAPTION" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption10" name="caption10" 
                           value="<?php echo $captionvalue10; ?>" placeholder="CAPTION" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption11" name="caption11" 
                           value="<?php echo $captionvalue11; ?>" placeholder="CAPTION" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="ENTER CAPTION!" width="8%">
                    <input type="text" id="caption12" name="caption12" 
                           value="<?php echo $captionvalue12; ?>" placeholder="CAPTION" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
            </tr>
            <tr>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode1" name="fontSizeBarCode1" 
                           value="<?php echo $fontSize1; ?>" placeholder="10PX" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode2" name="fontSizeBarCode2" 
                           value="<?php echo $fontSize2; ?>" placeholder="10PX" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode3" name="fontSizeBarCode3" 
                           value="<?php echo $fontSize3; ?>" placeholder="10PX" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode4" name="fontSizeBarCode4" 
                           value="<?php echo $fontSize4; ?>" placeholder="10PX" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode5" name="fontSizeBarCode5" 
                           value="<?php echo $fontSize5; ?>" placeholder="10PX" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode6" name="fontSizeBarCode6" 
                           value="<?php echo $fontSize6; ?>" placeholder="10PX" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode7" name="fontSizeBarCode7" 
                           value="<?php echo $fontSize7; ?>" placeholder="10PX" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode8" name="fontSizeBarCode8" 
                           value="<?php echo $fontSize8; ?>" placeholder="10PX" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode9" name="fontSizeBarCode9" 
                           value="<?php echo $fontSize9; ?>" placeholder="10PX" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode10" name="fontSizeBarCode10" 
                           value="<?php echo $fontSize10; ?>" placeholder="10PX" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode11" name="fontSizeBarCode11" 
                           value="<?php echo $fontSize11; ?>" placeholder="10PX" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
                <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !" width="8%">
                    <input type="text" id="fontSizeBarCode12" name="fontSizeBarCode12" 
                           value="<?php echo $fontSize12; ?>" placeholder="10PX" size="9" style="width:100%;height:30px;" class="input_border_blackFont_center"/>
                </td>
            </tr>
            <tr>
                <td align="center" valign="middle" class="paddingLeft5" colspan="12">
                    <input type="button" id="leftMarginBarCode" name="leftMarginBarCode" 
                           onclick="updateSize55BarCode('<?php echo $omLayoutOptionTop; ?>',
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
                </td>
            </tr>
            <!--add fontsize Author:GAUR14SEP16-->
        </table>
        <?php
    }
    /*     * **********End code to add button to tail label @Author:SHE23FEB15************************ */
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
                <td  style="font-size:16px;color:#000;" width="20%" align="right">
                    <b>  SEARCH PRODUCT BY ID:</b>
                </td>
                <td align="left" title="PRODUCT ID" width="50%">
                    <input style="width:100%;height:45px;border-radius:5px!important;border: 1px dashed #ef960f;box-shadow: 1px 1px 5px rgba(193, 193, 193, 0.5);padding: 10px;" id="Prodid" name="Prodid" type="text" placeholder="PROD NAME" value="<?php
                    if ($prodName != '') {
                        echo $prodName;
                    } else {
                        echo 'ALL';
                    }
                    ?>"  onkeydown="javascript:if (event.keyCode == 13) {
                                        document.getElementById('serachBarcode').focus();
                                        return false;
                                    } else if (event.keyCode == 8 && this.value == '') {
                                        return false;
                                    }"
                           onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                       getBarcodeProdName(document.getElementById('Prodid').value, 'Prodid', 'ProdNameDiv', '<?php echo $panel; ?>');
                                   }"

                           autocomplete="off" spellcheck="false" class="form-control-height20 placeholderClass" size="10" maxlength="30"  />
                    <div id="ProdNameDiv" class="itemListDivToAddStock placeholderClass" style="position:relative"></div>
                </td>
                <td width="10%" align="left">
                    <input type="button" id="serachBarcode" onclick="sendProdId(document.getElementById('Prodid').value, '<?php echo $panel; ?>');" value='SEARCH' class="frm-btn" style="width:100%;height:45px;background:#FFDEAB;color:#A60;border-radius: 3px !important;border: 1px solid #eca02b;font-size:16px;margin-left: -10px;"/>
                </td>
            </tr>
        </table>
    <?php } ?>
    <?php
    // *************************************************************************************************************
    // START CODE FOR OPTION ON LAYOUT FOR SET BARCODE NO. TO RFID NO. IF RFID NO. IS NULL SIMRAN:17JULY2023
    // *************************************************************************************************************
    $setBarcodeToRFIDQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'setBarcodeToRFID'";
    $resSetBarcodeToRFID = mysqli_query($conn, $setBarcodeToRFIDQuery);
    $rowSetBarcodeToRFID = mysqli_fetch_array($resSetBarcodeToRFID);
    $setBarcodeToRFID = $rowSetBarcodeToRFID['omly_value'];
    // *************************************************************************************************************
    // END CODE FOR OPTION ON LAYOUT FOR SET BARCODE NO. TO RFID NO. IF RFID NO. IS NULL @SIMRAN:17JULY2023
    // *************************************************************************************************************
    ?>
    <div id="ogibbc55x13SubDiv" style="border:0px solid;"><!---div added @Author:PRIYA07APR15---->

        <table border="0" cellpadding="0" cellspacing="0" align="center" valign="top" width="100%" class="marginTop10">
            <tr>
                <td valign="top" align="center">
                    <div id="allLabelsThermalDiv" style="border:0px solid;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" valign="top">
                            <?php
                            //
                            $qSelItemDefaultGSTOption = "SELECT omly_value FROM omlayout WHERE omly_option = 'addGSTInFinalAmount'";
                            $resItemDefaultGSTOption = mysqli_query($conn, $qSelItemDefaultGSTOption);
                            $rowItemDefaultGSTOption = mysqli_fetch_array($resItemDefaultGSTOption);
                            $itemDefaultGSTOption = $rowItemDefaultGSTOption['omly_value'];
                            //
                            $selFirmId = $_GET['firmId'];
                            if (!isset($selFirmId)) {
                                $firmIdSelected = $_SESSION['setFirmSession'];
                                $selFirmId = $firmIdSelected;
                            } else if ($selFirmId == 'undefined') {
                                $selFirmId = $_SESSION['setFirmSession'];
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
                            //
                            if ($divPanel == 'AllLabels') {
                                $allLabelsSqlQuery = "and sttr_id ='$sttrId'";
                                $allLabelsSqlQueryPaging = "order by sttr_id desc LIMIT $perOffset, $checkNextBarcode";
                            } else {
                                $allLabelsSqlQuery = "order by sttr_id desc LIMIT $perOffset, $barcodePerPage";
                                $allLabelsSqlQueryPaging = "order by sttr_id desc LIMIT $perOffset, $checkNextBarcode";
                            }
                            //
                            $qSelInItemBarCode = "SELECT * FROM stock_transaction where "
                                    . "sttr_indicator NOT IN('stockCrystal') "
                                    . "and sttr_transaction_type NOT IN('sell','APPROVAL') "
                                    . "$allLabelsSqlQueryPaging";
                            //
                            $resInItemBarCode = mysqli_query($conn, $qSelInItemBarCode);
                            $totalItemBarCode = mysqli_num_rows($resInItemBarCode);
                            //
                            //exit;
                            //
                            $qSelNextInItemBarCode = "SELECT * FROM stock_transaction where "
                                    . "sttr_indicator NOT IN('stockCrystal') "
                                    . "and sttr_transaction_type NOT IN('sell','APPROVAL') "
                                    . "and sttr_firm_id IN ($strFrmId) $allLabelsSqlQuery";
                            //
                            $resNextInItemBarCode = mysqli_query($conn, $qSelNextInItemBarCode);
                            $totalNextItemBarCode = mysqli_num_rows($resNextInItemBarCode);
                            //
                            //echo '$prod_id == '.$qSelNextInItemBarCode;
                            //
                            $counter = 1;
                            //
                            $pre = preg_replace("/[^A-Za-z]+/", "", $prod_id);
                            $post = preg_replace("/[^0-9]+/", "", $prod_id);
                            //
                            if ($sttrId != '') {
                                //
                                $qSelNextInItemBarCode = "SELECT * FROM stock_transaction WHERE "
                                        . "sttr_indicator !='stockCrystal' "
                                        . "and sttr_transaction_type NOT IN('sell','APPROVAL') "
                                        . "and sttr_id='$sttrId'";
                                //
                            } else if ($prod_id != 'ALL' && $prod_id != '') {
                                //
                                $qSelNextInItemBarCode = "SELECT * FROM stock_transaction WHERE "
                                        . "(sttr_sttr_id IS NULL or sttr_sttr_id='') and "
                                        . "sttr_indicator !='stockCrystal' and sttr_transaction_type NOT IN('sell','APPROVAL') "
                                        . "and sttr_item_pre_id='$pre' and sttr_item_id='$post'";
                                //
                            } else if ($prod_id == 'ALL') {
                                //
                                $qSelNextInItemBarCode = "SELECT * FROM stock_transaction WHERE "
                                        . "(sttr_sttr_id IS NULL or sttr_sttr_id='') and "
                                        . "sttr_indicator !='stockCrystal' and sttr_transaction_type NOT IN('sell','APPROVAL') "
                                        . "$allLabelsSqlQuery";
                                //
                            }
                            //
                            //echo '$qSelNextInItemBarCode == '.$qSelNextInItemBarCode;
                            //
                            $resNextInItemBarCode = mysqli_query($conn, $qSelNextInItemBarCode);
                            $totalNextItemBarCode = mysqli_num_rows($resNextInItemBarCode);
                            //
                            if ($totalNextItemBarCode == 0) {
                                //
                                if ($prod_id != 'ALL' && $prod_id != '') {
                                    //
                                    $qSelNextInItemBarCode = "SELECT * FROM stock_transaction WHERE "
                                            . "(sttr_sttr_id IS NULL or sttr_sttr_id='') and "
                                            . "sttr_indicator !='stockCrystal' and sttr_transaction_type NOT IN('sell','APPROVAL') "
                                            . "and sttr_item_pre_id='$prod_id' "
                                            . "order by sttr_id desc LIMIT 0,1";
                                    //
                                }
                                //
                                $resNextInItemBarCode = mysqli_query($conn, $qSelNextInItemBarCode);
                                $totalNextItemBarCode = mysqli_num_rows($resNextInItemBarCode);
                                //
                            }
                            /* START CODE TO ADD CONDITION FOR SEARCHING PRODUCT BY PRE-ID CONTAINING # CHARACTER @AUTHOR: MADHUREE-31MARCH2020 */
//                            echo '$totalNextItemBarCode : ' . $totalNextItemBarCode . '<br>';
//                              echo '$prod_id : ' . $prod_id . '<br>';
                            if ($totalNextItemBarCode == 0) {
                                if ($prod_id != 'ALL' && $prod_id != '') {
                                    if (strpos($prod_id, '#') !== false) {
                                        $qSelNextInItemBarCode = "SELECT * FROM stock_transaction WHERE "
                                                . "sttr_indicator !='stockCrystal' and sttr_transaction_type NOT IN('sell','APPROVAL') "
                                                . "and sttr_item_code='$prod_id'";
                                        // 
                                    } else {
                                        $qSelNextInItemBarCode = "SELECT * FROM stock_transaction WHERE "
                                                . "sttr_indicator !='stockCrystal' and sttr_transaction_type NOT IN('sell','APPROVAL') "
                                                . "and sttr_item_pre_id='$pre#' and sttr_item_id='$post'";
                                        //  
                                    }
//                                    echo '$qSelNextInItemBarCode == ' . $qSelNextInItemBarCode;
                                    $resNextInItemBarCode = mysqli_query($conn, $qSelNextInItemBarCode);
                                    $totalNextItemBarCode = mysqli_num_rows($resNextInItemBarCode);
                                }
                            }
                            //
                            if ($totalNextItemBarCode == 0) {
                                //
                                if ($prod_id != 'ALL' && $prod_id != '') {
                                    //
                                    $qSelNextInItemBarCode = "SELECT * FROM stock_transaction WHERE "
                                            . "(sttr_sttr_id IS NULL or sttr_sttr_id='') and "
                                            . "sttr_indicator !='stockCrystal' and sttr_transaction_type NOT IN('sell','APPROVAL') "
                                            . "and sttr_item_code='$prod_id' "
                                            . "order by sttr_id desc LIMIT 0,1";
                                    //
                                }
                                //
                                $resNextInItemBarCode = mysqli_query($conn, $qSelNextInItemBarCode);
                                $totalNextItemBarCode = mysqli_num_rows($resNextInItemBarCode);
                                //
                            }
                            //
                            /* END CODE TO ADD CONDITION FOR SEARCHING PRODUCT BY PRE-ID CONTAINING # CHARACTER @AUTHOR: MADHUREE-31MARCH2020 */
                            //Start Code to get current metal rate
                            $qSelGoldRate = "SELECT met_rate_value FROM metal_rates where met_rate_own_id='$_SESSION[sessionOwnerId]' and met_rate_metal_name='Gold' order by met_rate_id desc LIMIT 0, 1";
                            $resGoldRate = mysqli_query($conn, $qSelGoldRate);
                            $rowGoldRate = mysqli_fetch_array($resGoldRate, MYSQLI_ASSOC);
                            //
                            $goldRate = $rowGoldRate['met_rate_value'];
                            $goldRate = trim($goldRate);
                            //
                            $qSelSilverRate = "SELECT * FROM metal_rates where met_rate_own_id='$_SESSION[sessionOwnerId]' and met_rate_metal_name='Silver' order by met_rate_id desc LIMIT 0, 1";
                            $resSilverRate = mysqli_query($conn, $qSelSilverRate);
                            $rowSilverRate = mysqli_fetch_array($resSilverRate, MYSQLI_ASSOC);
                            //
                            $silverRate = $rowSilverRate['met_rate_value'];
                            $silverRatePerWt = $rowSilverRate['met_rate_per_wt'];
                            $silverRatePerWtType = $rowSilverRate['met_rate_per_wt_tp'];
                            $silverRate = trim($silverRate);
                            //
                            //echo '$qSelInItemBarCode == ' . $qSelInItemBarCode . '<br />';
                            //echo '$qSelNextInItemBarCode == ' . $qSelNextInItemBarCode . '<br />';
                            //
                            include 'ogiartdv.php';
                            ?>
                            <?php
                            $rfidPrintQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'rfidText'";
                            $printResultQuery = mysqli_query($conn, $rfidPrintQuery);
                            $rfidPrintRow = mysqli_fetch_array($printResultQuery);
                            $rfidPrnPrintText = $rfidPrintRow['omly_value'];
                            //
                            $divPrinted = FALSE;
                            while ($rowInItemBarCode = mysqli_fetch_array($resNextInItemBarCode, MYSQLI_ASSOC)) {
                                //
                                $cryValuation = 0;
                                //
                                $bcId = $rowInItemBarCode['sttr_id'];
                                $bcuserId = $rowInItemBarCode['sttr_user_id'];
                                $bcFirmId = $rowInItemBarCode['sttr_firm_id'];
                                $bcItemId = $rowInItemBarCode['sttr_barcode'];

                                //echo '$bcItemId == ' . $bcItemId;
                                $ItemPktWtAdd=0;
                                $ItemPktWtLess=0;
                                for($i=1;$i<=5;$i++){
                                    if($rowInItemBarCode['sttr_pkt_wt_opration'.$i]=='ADD'){
                                      $ItemPktWtAdd+= abs($rowInItemBarCode['sttr_pkt_weight'.$i]*$rowInItemBarCode['sttr_pkt_qty'.$i]);
                                    }else{
                                       $ItemPktWtLess+=abs($rowInItemBarCode['sttr_pkt_weight'.$i]*$rowInItemBarCode['sttr_pkt_qty'.$i]);
                                    }
                                }

                                $bcItemQty = $rowInItemBarCode['sttr_quantity'];
                                $bcUnitQTY = 1;  // ADD UNIT QTY @AUTHOR:SHRIKANT 13 JAN 2023
                                //echo 'sttr_final_quantity == ' . $rowInItemBarCode['sttr_final_quantity'] . '<br />';

                                if ($rowInItemBarCode['sttr_final_quantity'] > 0) {
                                    $bcItemQty = $rowInItemBarCode['sttr_final_quantity'];
                                }

                                $bcItemPreId = trim($rowInItemBarCode['sttr_item_pre_id']);
                                $bcItemPostId = trim($rowInItemBarCode['sttr_item_id']);
                                $bcItemName = trim($rowInItemBarCode['sttr_item_name']);
                                $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 20)));
                                $bcItemCategory = trim($rowInItemBarCode['sttr_item_category']);
                                $bcItemCategory = trim(om_strtoupper(substr($bcItemCategory, 0, 20)));
                                 // ADDED FINAL WT VARIABLE @SIMRAN:13DEC2023
                                 $bcItemFinalWt = trim($rowInItemBarCode['sttr_final_gs_weight']);
                                 $bcItemFinalNtWt = trim($rowInItemBarCode['sttr_final_nt_weight']);
                                 $bcItemFinalFnWt = trim($rowInItemBarCode['sttr_final_fn_weight']);
                                //
                                if($bcItemFinalWt =='' && $bcItemFinalWt == NULL){
                                 $bcItemWt = trim($rowInItemBarCode['sttr_gs_weight']);
                                 }else{
                                  $bcItemWt = trim($rowInItemBarCode['sttr_final_gs_weight']);
                                 }
                                 //
                                $bcItemWtType = trim($rowInItemBarCode['sttr_gs_weight_type']);
                                if($bcItemFinalNtWt != '' && $bcItemFinalNtWt != NULL && $bcItemFinalNtWt != 0 ){                                  
                                           $bcItemNtWt = trim($rowInItemBarCode['sttr_final_nt_weight']);
                                    }else{
                                            $bcItemNtWt = trim($rowInItemBarCode['sttr_nt_weight']);
                                }
                                $bcItemNtWtType = trim($rowInItemBarCode['sttr_nt_weight_type']);

                                //echo 'sttr_final_gs_weight == ' . $rowInItemBarCode['sttr_final_gs_weight'] . '<br />';
                                //if ($rowInItemBarCode['sttr_final_gs_weight'] > 0) {
                                //$bcItemWt = $rowInItemBarCode['sttr_final_gs_weight'];
                                //}
                                //echo 'sttr_final_nt_weight == ' . $rowInItemBarCode['sttr_final_nt_weight'] . '<br />';
                                //if ($rowInItemBarCode['sttr_final_nt_weight'] > 0) {
                                //$bcItemNtWt = $rowInItemBarCode['sttr_final_nt_weight'];
                                //}

                                $newItemVATCharges = $rowInItemBarCode['sttr_tax'];
                                $newItemColor = $rowInItemBarCode['sttr_color'];

                                $bcItemPktWt = trim(abs($rowInItemBarCode['sttr_less_weight']));          //add variable Author:GAUR13SEP16
                                $bcItemPktWtType = trim($rowInItemBarCode['sttr_pkt_weight_type']); //add variable Author:GAUR13SEP16
                                $bcItemLessWt = trim($rowInItemBarCode['sttr_pkt_weight']);          //add variable Author:GAUR13SEP16
                                $bcItemLessWtType = trim($rowInItemBarCode['sttr_pkt_weight_type']); //add variable Author:GAUR13SEP16
                                $bcItemCustCode = trim($rowInItemBarCode['sttr_cust_itmcode']);     //add variable Author:GAUR16SEP16
                                $bcItemCustCodeNum = trim($rowInItemBarCode['sttr_cust_itmnum']);   //add variable Author:GAUR16SEP16
                                $bcItemDate = trim($rowInItemBarCode['sttr_add_barcode_date']);
                                $bcItemCrystalVal = intval($rowInItemBarCode['sttr_stone_amt']);
                                $bcItemCryNtWt = trim($rowInItemBarCode['sttr_stone_wt']);
                                $bcItemCryNtWtType = trim($rowInItemBarCode['sttr_stone_wt_type']);
                                $bcItemMkChrg = trim($rowInItemBarCode['sttr_making_charges']);
                                $bcItemMkChrgType = trim($rowInItemBarCode['sttr_making_charges_type']);
                                $bcItemMkChrgBy = trim($rowInItemBarCode['sttr_mkg_charges_by']);
                                $bcItemFinalAmtBy = trim($rowInItemBarCode['sttr_final_valuation_by']);
                                $girviOtherInfo = trim($rowInItemBarCode['sttr_item_other_info']);
                                if ($girviOtherInfo == '') {
                                    $girviOtherInfo = trim($rowInItemBarCode['sttr_other_info']);   //<-- START CODE FOR CRYSTAL OTHER INFO @AUTHOUR SIMRAN-18JULY2022-->
                                }
                                $bcItemPurRate = trim($rowInItemBarCode['sttr_purchase_rate']);
                                $bcItemPurRateType = trim($rowInItemBarCode['sttr_purchase_rate_type']);
                                $bcItemModelNo = trim($rowInItemBarCode['sttr_item_model_no']);
                                $bcItemSize = trim($rowInItemBarCode['sttr_size']);
                                $bcItemPrefixId = trim($rowInItemBarCode['sttr_barcode_prefix']);
                                $bcGetCrsytal = trim($rowInItemBarCode['sttr_id']);
                                $bcmetaltype = trim($rowInItemBarCode['sttr_product_type']);
                                $valaddamt = trim($rowInItemBarCode['sttr_value_added']);
                                $bcItemSellRate = trim($rowInItemBarCode['sttr_sell_rate']);
                                $bcItemSellRateType = trim($rowInItemBarCode['sttr_sell_rate_type']);
                                $bcItemSellRateType = trim($rowInItemBarCode['sttr_sell_rate_type']);
                                if($bcItemFinalFnWt == '' && $bcItemFinalFnWt == NULL){
                                $itemfnwt = trim($rowInItemBarCode['sttr_fine_weight']);
                                }else{
                                $itemfnwt = trim($rowInItemBarCode['sttr_final_fn_weight']);
                                }
                                $newItemFFNW = $rowInItemBarCode['sttr_final_fine_weight'];
                                $itemFFNWT = $rowInItemBarCode['sttr_final_fine_weight'];
                                $otherChrg = trim($rowInItemBarCode['sttr_other_charges']);                  //ADDED OTHER CHRG @SIMRAN:29NOV2022
                                $otherChrgType = trim($rowInItemBarCode['sttr_other_charges_type']);          //ADDED OTHER CHRG TYPE @SIMRAN:29NOV2022
                                $bcPurityCt = trim($rowInItemBarCode['sttr_purity_ct']);
                                $bcItemAddDate = trim($rowInItemBarCode['sttr_add_date']);                   // ADDED STOCK ADD DATE @SIMRAN:12JUNE2023
//*****************************************************************************************
                                //********** START CODE FOR GET STOCK ADD YEAR ******************************************//
                                //*****************************************************************************************
                                $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
                                $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
                                $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
                                $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
                                $arrAddDate = explode(' ', $bcItemAddDate);
                                //
                                $day = $arrAddDate[0];
                                $month = strtoupper($arrAddDate[1]);
                                $year = $arrAddDate[2];
                                //
                                 if ($nepaliDateIndicator == 'YES') {
                                    $nepaliDate = trim($rowInItemBarCode['sttr_other_lang_add_date']);   
                                    $nepaliExplodeDate = explode("-", $nepaliDate);
                                    $day = $nepaliExplodeDate[0];
                                    $month = $nepaliExplodeDate[1];
                                    $year = $nepaliExplodeDate[2];
                                }
                                $itemAddYear = $year;
                                //*****************************************************************************************
                                //********** END CODE FOR GET STOCK ADD YEAR ******************************************//
                                //*****************************************************************************************
                                // 
                                // if ($rowInItemBarCode['sttr_final_fn_weight'] > 0) {
                                //     $newItemFFNW = $rowInItemBarCode['sttr_final_fn_weight'];
                                //     $itemFFNWT = $rowInItemBarCode['sttr_final_fn_weight'];
                                // }
                                //
                                //
                                //$itemFFNWT = $itemFFNWT + $rowInItemBarCode['sttr_cust_wastage_wt'];
                                //
                                $valadd = trim($rowInItemBarCode['sttr_cust_wastage']);
                                $metalRateId = $rowInItemBarCode['sttr_metal_rate'];
                                $itemMetalType = $rowInItemBarCode['sttr_metal_type'];
                                $itemCustMetalRate = $rowInItemBarCode['sttr_metal_rate'];
                                $valaddwt = trim($rowInItemBarCode['sttr_cust_wastage_wt']); //echo 'op:' . $valaddwt;
                                $itemMetalRate = $rowInItemBarCode['sttr_metal_rate'];
                                $itemvaluation = trim($rowInItemBarCode['sttr_valuation']);
                                $itemfinalvaluation = trim($rowInItemBarCode['sttr_final_valuation']);
                                $itemtottax = $rowInItemBarCode['sttr_tot_tax'];
                                $itemWtBy = $rowInItemBarCode['sttr_final_val_by'];
                                $itemCustPrice = $rowInItemBarCode['sttr_cust_price'];
                                $sttr_indicator = $rowInItemBarCode['sttr_indicator'];
                                $itemshape = $rowInItemBarCode['sttr_shape'];
                                $bcItemPriceCode = $rowInItemBarCode['sttr_cust_itmpricecode'];
                                $netWtAndVaWt = $bcItemNtWt + $valaddwt;

                                $itemMfgDate = $rowInItemBarCode['sttr_mfg_date'];
                                $counterName = $rowInItemBarCode['sttr_counter_name'];   //ADDED COUNTER NAME @SIMRAN:12SEPT2023

                                $GSTTax = $rowInItemBarCode['sttr_tot_price_cgst_per'] + $rowInItemBarCode['sttr_tot_price_sgst_per'] + $rowInItemBarCode['sttr_tot_price_igst_per'];

                                //
                                // *********************************************
                                //  Start Code to make RFID NUMBER
                                // *********************************************
                                //
                                $prodIdLength = strlen($bcId);
                                //
                                $rfidPrnPrintText = substr($rfidPrnPrintText, 0, -2);
                                $prodRFIDNo = substr($rfidPrnPrintText, 0, $prodIdLength * -1) . $bcId. '05';
                                //
                                //$prodRFIDNo = substr($rfidPrnPrintText, 0, $prodIdLength * -1) . $bcId;
                                //
                                //Start Add One condition RFID Imitation stock tally for imitation
                                $upQuery = "UPDATE stock_transaction SET sttr_rfid_no = '$prodRFIDNo' WHERE sttr_owner_id = '$sessionOwnerId' "
                                        . "AND sttr_id = '$bcId' AND sttr_indicator IN ('stock','imitation') AND (sttr_rfid_no IS NULL OR sttr_rfid_no='')";
                                //End One condition RFID Imitation stock tally for imitation
                                //
                                if (!mysqli_query($conn, $upQuery)) {
                                    die('Error: ' . mysqli_error($conn));
                                }
                                // *********************************************
                                //  End Code to make RFID NUMBER
                                // *********************************************
                                //
                                //
                                //
                                // Code Commented @AUTHOR:PRIYANKA-06JUNE2023
                                // (Add Stock => Manual Barcode Enter Issue => Barcode Showing with Barcode Prefix 1) @AUTHOR:PRIYANKA-06JUNE2023
                                //if ($bcItemPrefixId == '' || $bcItemPrefixId == NULL || $bcItemPrefixId === 'undefined') {
                                //if ($_SESSION['sessionProdName'] != 'OMRETL') {
                                //$bcItemPrefixId = 1;
                                //}
                                //}
                                //$stTotWt=0;

                                $querySelItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_sttr_id = '$bcId' and sttr_indicator IN ('stockCrystal') and sttr_status NOT IN('SOLDOUT','DELETED') and sttr_current_status NOT IN ('Deleted')"; // Code to add Imitation Stock condition @Author:SHRI26FEB15
                                $resultItemDetails = mysqli_query($conn, $querySelItemDetails);
                                $numRows = mysqli_num_rows($resultItemDetails);

                                $stTotWt = 0;
                                $stType = 'CT';
                                $diaTotWt = 0;
                                $diaType = 'CT';
                                $diaTotQty = 0;
                                $stTotAmt = 0;
                                $stTotval = 0;
                                $diaTotWtInGm = 0;
                                $diamondType = 'GM';
                                //                           
                                $priceCodeArray = array();
                                $priceCodeArr = array();
                                $jind = 0;
                                while ($rowDetails = mysqli_fetch_array($resultItemDetails, MYSQLI_ASSOC)) {
                                    if ($rowDetails['sttr_sell_rate'] != '') {
                                        if ($rowDetails['sttr_sell_rate_type'] == $rowDetails['sttr_gs_weight_type']) {
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_gs_weight']) * $rowDetails['sttr_sell_rate'];
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
                                            $cryValuation = $cryValuation + ($rowDetails['sttr_quantity']) * $rowDetails['sttr_sell_rate'];
                                        }
                                    } else {
                                        $cryValuation = $cryValuation + $rowDetails['sttr_valuation'];
                                    }

                                    if ($numRows == 1) {
                                        $cryGsWt = $cryGsWt + $rowDetails['sttr_gs_weight'];
                                        $cryGsWtType = $rowDetails['sttr_gs_weight_type'];
                                    }
                                    //
                                    $stCategory = $rowDetails['sttr_item_category'];
                                    //
                                    if ($stCategory == 'stone' || $stCategory == 'STONE' || $stCategory == 'Stone') {
                                        //
                                        //$stTotWt += $rowDetails['sttr_gs_weight'];
                                        //$stType = $rowDetails['sttr_gs_weight_type'];
                                        //
                                        // ADDED CODE FOR CRYSTAL WEIGHT IN CT @AUTHOR:PRIYANKA-13JUNE2023
                                        if ($rowDetails['sttr_gs_weight_type'] == 'CT') {
                                            //
                                            $stTotWt += $rowDetails['sttr_gs_weight'];
                                            //
                                            $stType = 'CT';
                                            //
                                        } else {
                                            //
                                            if ($rowDetails['sttr_gs_weight_type'] == 'KG') {
                                                $stTotWt += ($rowDetails['sttr_gs_weight'] * 5000);
                                            } else if ($rowDetails['sttr_gs_weight_type'] == 'GM') {
                                                $stTotWt += ($rowDetails['sttr_gs_weight'] * 5);
                                            } else if ($rowDetails['sttr_gs_weight_type'] == 'MG') {
                                                $stTotWt += ($rowDetails['sttr_gs_weight'] / 200);
                                            }
                                            //
                                            $stType = 'CT';
                                            //
                                        }
                                        //
                                    }
                                    // ADDED CODE FOR DIAMOND TOTAL QTY @SIMRAN:13JUNE2023
                                    if ($stCategory == 'diamond' || $stCategory == 'Diamond' || $stCategory == 'DIAMOND' || $stCategory == 'dia' || $stCategory == 'DIA' || $stCategory == 'Dia') {
                                        $diaQty = $rowDetails['sttr_quantity'];
                                        $diaTotQty += $diaQty;
                                    }
                                    //====================================================================================================
                                    //*************START CODE TO ADDED CODE FOR DIAMOND WEIGHT IN CT @AUTHOR:SIMRAN19JUNE2023***********//
                                    //====================================================================================================
                                    if ($stCategory == 'diamond' || $stCategory == 'DIAMOND' || $stCategory == 'Diamond') {
                                        if ($rowDetails['sttr_gs_weight_type'] == 'CT') {
                                            //
                                            $diaTotWt += $rowDetails['sttr_gs_weight'];
                                            //
                                            $diaType = 'CT';
                                            //
                                        } else {
                                            //
                                            if ($rowDetails['sttr_gs_weight_type'] == 'KG') {
                                                $diaTotWt += ($rowDetails['sttr_gs_weight'] * 5000);
                                            } else if ($rowDetails['sttr_gs_weight_type'] == 'GM') {
                                                $diaTotWt += ($rowDetails['sttr_gs_weight'] * 5);
                                            } else if ($rowDetails['sttr_gs_weight_type'] == 'MG') {
                                                $diaTotWt += ($rowDetails['sttr_gs_weight'] / 200);
                                            }
                                            //
                                            $diaType = 'CT';
                                            //
                                        }
                                        //
                                    }
                                    if ($stCategory == 'stone' || $stCategory == 'STONE' || $stCategory == 'Stone') {
                                        if ($rowDetails['sttr_sell_rate'] != '') {
                                            if ($rowDetails['sttr_sell_rate_type'] == $rowDetails['sttr_gs_weight_type']) {
                                                $stTotval = ($rowDetails['sttr_gs_weight']) * $rowDetails['sttr_sell_rate'];
                                            } else if ($rowDetails['sttr_sell_rate_type'] == 'CT' && $rowDetails['sttr_gs_weight_type'] == 'GM') {
                                                $stTotval = ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] / 5));
                                            } else if ($rowDetails['sttr_sell_rate_type'] == 'KG' && $rowDetails['sttr_gs_weight_type'] == 'GM') {
                                                $stTotval = ($rowDetails['sttr_gs_weight']) * ($rowDetails['sttr_sell_rate'] * 1000);
                                            } else if ($rowDetails['sttr_sell_rate_type'] == 'MG' && $rowDetails['sttr_gs_weight_type'] == 'GM') {
                                                $stTotval = ($rowDetails['sttr_gs_weight']) * ($rowDetails['sttr_sell_rate'] / 1000);
                                            } else if ($rowDetails['sttr_sell_rate_type'] == 'CT' && $rowDetails['sttr_gs_weight_type'] == 'KG') {
                                                $stTotval = ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] / (1000 * 5)));
                                            } else if ($rowDetails['sttr_sell_rate_type'] == 'MG' && $rowDetails['sttr_gs_weight_type'] == 'KG') {
                                                $stTotval = ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] / 1000000));
                                            } else if ($rowDetails['sttr_sell_rate_type'] == 'GM' && $rowDetails['sttr_gs_weight_type'] == 'KG') {
                                                $stTotval = ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] / 1000));
                                            } else if ($rowDetails['sttr_sell_rate_type'] == 'CT' && $rowDetails['sttr_gs_weight_type'] == 'MG') {
                                                $stTotval = ($rowDetails['sttr_gs_weight'] * (($rowDetails['sttr_sell_rate'] / 5) * 1000));
                                            } else if ($rowDetails['sttr_sell_rate_type'] == 'KG' && $rowDetails['sttr_gs_weight_type'] == 'MG') {
                                                $stTotval = ($rowDetails['sttr_gs_weight'] * (($rowDetails['sttr_sell_rate'] * 1000) * 1000));
                                            } else if ($rowDetails['sttr_sell_rate_type'] == 'GM' && $rowDetails['sttr_gs_weight_type'] == 'MG') {
                                                $stTotval = ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] * 1000));
                                            } else if ($rowDetails['sttr_sell_rate_type'] == 'GM' && $rowDetails['sttr_gs_weight_type'] == 'CT') {
                                                $stTotval = ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] * 5));
                                            } else if ($rowDetails['sttr_sell_rate_type'] == 'KG' && $rowDetails['sttr_gs_weight_type'] == 'CT') {
                                                $stTotval = ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] / 5000));
                                            } else if ($rowDetails['sttr_sell_rate_type'] == 'MG' && $rowDetails['sttr_gs_weight_type'] == 'CT') {
                                                $stTotval = ($rowDetails['sttr_gs_weight'] * ($rowDetails['sttr_sell_rate'] * 200));
                                            } else if ($rowDetails['sttr_sell_rate_type'] == 'FX') {
                                                $stTotval = $rowDetails['sttr_sell_rate'];
                                            } else if ($rowDetails['sttr_sell_rate_type'] == 'PP') {
                                                $stTotval = ($rowDetails['sttr_quantity']) * $rowDetails['sttr_sell_rate'];
                                            }
                                        } else {
                                            $stTotval = $rowDetails['sttr_valuation'];
                                        }
                                        $stTotAmt += $stTotval;
                                    }

                                    //====================================================================================================
                                    //*************END CODE TO ADDED CODE FOR DIAMOND WEIGHT IN CT @AUTHOR:SIMRAN19JUNE2023***************//
                                    //====================================================================================================
                                    //
                                    //====================================================================================================
                                    //***********************START CODE FOR CALCULATE TOTAL STONE WT IN GM****************************//
                                    //====================================================================================================
                                    if ($stCategory == 'stone' || $stCategory == 'STONE' || $stCategory == 'Stone' || $stCategory == 'diamond' || $stCategory == 'Diamond' || $stCategory == 'DIAMOND') {
                                        if ($rowDetails['sttr_gs_weight_type'] == 'GM') {
                                            //
                                            $diaTotWtInGm += $rowDetails['sttr_gs_weight'];
                                            //
                                            $diamondType = 'GM';
                                            //
                                        } else {
                                            //
                                            if ($rowDetails['sttr_gs_weight_type'] == 'KG') {
                                                $diaTotWtInGm += ($rowDetails['sttr_gs_weight_type'] * 1000);
                                            } else if ($rowDetails['sttr_gs_weight_type'] == 'CT') {
                                                $diaTotWtInGm += (($rowDetails['sttr_gs_weight'] * 2) / 10);
                                            } else if ($rowDetails['sttr_gs_weight_type'] == 'MG') {
                                                $diaTotWtInGm += ($rowDetails['sttr_gs_weight'] / 1000);
                                            }
                                            //
                                            $diamondType = 'GM';
                                            //
                                        }
                                    }
                                    //====================================================================================================
                                    //***********************END CODE FOR CALCULATE TOTAL STONE WT IN GM****************************//
                                    //====================================================================================================
                                    //
                                    //====================================================================================================
                                    //*************START CODE TO ADDED PRICE CODE MAPPING @AUTHOR:SIMRAN:21SEPT2023***************//
                                    //====================================================================================================
                                    if ($rowDetails['sttr_sell_rate'] != '') {
                                        $stSellrate = $rowDetails['sttr_sell_rate'];

                                        $stSellRateArray = str_split((string) $stSellrate);
                                        $stoneSellRate = "";
                                        $stoneSellRate .= $stSellrate;
                                        $length = strlen($stoneSellRate);
                                        //$priceCodeArray = array();
                                        $index = 0;
                                        for ($i = 0; $i <= $length; $i++) {
                                            switch ($stoneSellRate[$i]) {
                                                case '0';
                                                    parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_option = 'priceCodeZero'"));
                                                    $priceCodeArray[$jind][$index] = $omly_value;
                                                    break;
                                                case '1';
                                                    parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_option = 'priceCodeone'"));
                                                    $priceCodeArray[$jind][$index] = $omly_value;
                                                    break;
                                                case '2';
                                                    parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_option = 'priceCodeTwo'"));
                                                    $priceCodeArray[$jind][$index] = $omly_value;
                                                    //$index++;
                                                    break;
                                                case '3';
                                                    parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_option = 'priceCodeThree'"));
                                                    $priceCodeArray[$jind][$index] = $omly_value;
                                                    break;
                                                case '4';
                                                    parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_option = 'priceCodeFour'"));
                                                    $priceCodeArray[$jind][$index] = $omly_value;
                                                    break;
                                                case '5';
                                                    parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_option = 'priceCodeFive'"));
                                                    $priceCodeArray[$jind][$index] = $omly_value;
                                                    break;
                                                case '6';
                                                    parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_option = 'priceCodeSix'"));
                                                    $priceCodeArray[$jind][$index] = $omly_value;
                                                    break;
                                                case '7';
                                                    parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_option = 'priceCodeSeven'"));
                                                    $priceCodeArray[$jind][$index] = $omly_value;
                                                    break;
                                                case '8';
                                                    parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_option = 'priceCodeEight'"));
                                                    $priceCodeArray[$jind][$index] = $omly_value;
                                                    break;
                                                case '9';
                                                    parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_option = 'priceCodeNine'"));
                                                    $priceCodeArray[$jind][$index] = $omly_value;
                                                    break;
                                            }
                                            $index++;
                                        }
                                    }
                                    $priceCodeArr[$jind] = implode($priceCodeArray[$jind]) . "<br>";
                                    $jind++;
                                    //====================================================================================================
                                    //*************END CODE TO ADDED PRICE CODE MAPPING @AUTHOR:SIMRAN:21SEPT2023***************//
                                    //====================================================================================================
                                }



//$unitPriceCode = implode($priceCodeArray);

                                $itemCustGSW = $itemFFNWT;

                                $itemCustMetalRate = $metalRateId;
                                $custMetalIdSelected = $itemCustMetalRate;

//                                include 'ogiamtrt.php';
                                if ($sttr_indicator == 'crystal') {
                                    $metalRate = $rowInItemBarCode['sttr_sell_rate'];
                                    $metalRateType = $rowInItemBarCode['sttr_sell_rate_type'];
                                    if ($metalRate == '' || $metalRate == 0) {
                                        $metalRate = $rowInItemBarCode['sttr_purchase_rate'];
                                        $metalRateType = $rowInItemBarCode['sttr_purchase_rate_type'];
                                    }
                                } else {
                                    $metalRate = callMetalRateTable('select', 'metalRateByRateId', $metalRateId, '', '');
                                    if ($metalRate == '') {
                                        //ADD THIS ($itemMetalType == 'GOLD' || $itemMetalType == 'gold') CONDITION YUVRAJ @17112022
                                        if ($itemMetalType == 'Gold' || $itemMetalType == 'GOLD' || $itemMetalType == 'gold')
                                            $metalRate = $goldRate;
                                        else
                                            $metalRate = $silverRate;
                                    }
                                }
                                //
                                //echo '$metalRate : '.$metalRate.'<br>';
                                //
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
                                    } else if ($bcItemMkChrgType == 'GM') {
                                        if ($bcItemWtType == 'KG')
                                            $totalLabNOthCharges = $bcItemMkChrg * 1000 * $itemCustGSW;
                                        else if ($bcItemWtType == 'GM')
                                            $totalLabNOthCharges = $bcItemMkChrg * $itemCustGSW;
                                        else
                                            $totalLabNOthCharges = ($bcItemMkChrg / 1000) * $itemCustGSW;
                                    } else if ($bcItemMkChrgType == 'MG') {
                                        if ($bcItemWtType == 'KG')
                                            $totalLabNOthCharges = $bcItemMkChrg * 1000 * 1000 * $itemCustGSW;
                                        else if ($bcItemWtType == 'GM')
                                            $totalLabNOthCharges = $bcItemMkChrg * 1000 * $itemCustGSW;
                                        else
                                            $totalLabNOthCharges = $bcItemMkChrg * $itemCustGSW;
                                    } else if ($bcItemMkChrgType == 'PP') {
                                        $totalLabNOthCharges = $bcItemMkChrg * $bcItemQty;
                                    } else if ($bcItemMkChrgType == 'per') {
                                        $labNOthCharges = ($bcItemMkChrg * $itemCustGSW) / 100;
                                        //ADD THIS ($itemMetalType == 'GOLD' || $itemMetalType == 'gold') CONDITION YUVRAJ @17112022
                                        if ($itemMetalType == 'Gold' || $itemMetalType == 'GOLD' || $itemMetalType == 'gold') {
                                            if ($bcItemWtType == 'KG') {
                                                $totalLabNOthCharges = (($labNOthCharges * $metalRate) * $gmWtInKg);
                                            } else if ($bcItemWtType == 'GM') {
                                                $totalLabNOthCharges = (($labNOthCharges * $metalRate) / $gmWtInGm);
                                            } else if ($bcItemWtType == 'MG') {
                                                $totalLabNOthCharges = (($labNOthCharges * $metalRate) / $gmWtInMg);
                                            }
                                            //ADD THIS ($itemMetalType == 'SILVER' || $itemMetalType == 'silver') CONDITION YUVRAJ @17112022
                                        } else if ($itemMetalType == 'Silver' || $itemMetalType == 'SILVER' || $itemMetalType == 'silver') {
                                            if ($bcItemWtType == 'KG') {
                                                $totalLabNOthCharges = ($labNOthCharges * $metalRate * $srGmWtInKg);
                                            } else if ($bcItemWtType == 'GM') {
                                                $totalLabNOthCharges = (($labNOthCharges * $metalRate) / $srGmWtInGm);
                                            } else if ($bcItemWtType == 'MG') {
                                                $totalLabNOthCharges = (($labNOthCharges * $metalRate) / $srGmWtInMg);
                                            }
                                        }
                                    } else if ($bcItemMkChrgType == 'Fixed') {
                                        $totalLabNOthCharges = $bcItemMkChrg;
                                    }
                                }
                                $totalLabNOthCharges = round($totalLabNOthCharges, 2);
                                if ($itemWtBy == 'byNetWt') {
                                    $itemCustGSW = $bcItemNtWt;
                                } else {
                                    $itemCustGSW = $itemCustGSW;
                                }
                                //
                                if ($sttr_indicator == 'crystal') {
                                    $newItemCalWt = $bcItemWt;
                                } else {
                                    if ($bcItemFinalAmtBy == 'byGrossWt') {
                                        $newItemCalWt = $bcItemWt;
                                    } else if ($bcItemFinalAmtBy == 'byNetWt') {
                                        $newItemCalWt = $bcItemNtWt;
                                    } else if ($bcItemFinalAmtBy == 'byFineWt') {
                                        $newItemCalWt = $itemfnwt;
                                    } else if ($bcItemFinalAmtBy == 'byFFineWt') {
                                        $newItemCalWt = $newItemFFNW;
                                    } else {
                                        $newItemCalWt = $newItemFFNW;
                                    }
                                }
                                //
                                if ($sttr_indicator == 'crystal') {
                                    if ($metalRateType == $bcItemWtType) {
                                        $custValWithOutMake = ($newItemCalWt) * $metalRate;
                                    } else if ($metalRateType == 'CT' && $bcItemWtType == 'GM') {
                                        $custValWithOutMake = ($newItemCalWt * ($metalRate / 5));
                                    } else if ($metalRateType == 'KG' && $bcItemWtType == 'GM') {
                                        $custValWithOutMake = ($newItemCalWt) * ($metalRate * 1000);
                                    } else if ($metalRateType == 'MG' && $bcItemWtType == 'GM') {
                                        $custValWithOutMake = ($newItemCalWt) * ($metalRate / 1000);
                                    } else if ($metalRateType == 'CT' && $bcItemWtType == 'KG') {
                                        $custValWithOutMake = ($newItemCalWt * ($metalRate / (1000 * 5)));
                                    } else if ($metalRateType == 'MG' && $bcItemWtType == 'KG') {
                                        $custValWithOutMake = ($newItemCalWt * ($metalRate / 1000000));
                                    } else if ($metalRateType == 'GM' && $bcItemWtType == 'KG') {
                                        $custValWithOutMake = ($newItemCalWt * ($metalRate / 1000));
                                    } else if ($metalRateType == 'CT' && $bcItemWtType == 'MG') {
                                        $custValWithOutMake = ($newItemCalWt * (($metalRate / 5) * 1000));
                                    } else if ($metalRateType == 'KG' && $bcItemWtType == 'MG') {
                                        $custValWithOutMake = ($newItemCalWt * (($metalRate * 1000) * 1000));
                                    } else if ($metalRateType == 'GM' && $bcItemWtType == 'MG') {
                                        $custValWithOutMake = ($newItemCalWt * ($metalRate * 1000));
                                    } else if ($metalRateType == 'GM' && $bcItemWtType == 'CT') {
                                        $custValWithOutMake = ($newItemCalWt * ($metalRate * 5));
                                    } else if ($metalRateType == 'KG' && $bcItemWtType == 'CT') {
                                        $custValWithOutMake = ($newItemCalWt * ($metalRate / 5000));
                                    } else if ($metalRateType == 'MG' && $bcItemWtType == 'CT') {
                                        $custValWithOutMake = ($newItemCalWt * ($metalRate * 200));
                                    } else if ($metalRateType == 'PP') {
                                        $custValWithOutMake = ($bcItemQty) * $metalRate;
                                    }
                                } else {
                                    //ADD THIS ($itemMetalType == 'GOLD' || $itemMetalType == 'gold') CONDITION YUVRAJ @17112022
                                    if ($itemMetalType == 'Gold' || $itemMetalType == 'GOLD' || $itemMetalType == 'gold') {
                                        if ($bcItemWtType == 'KG') {
                                            $custValWithOutMake = (($newItemCalWt * $metalRate) * 100);
                                        } else if ($bcItemWtType == 'GM') {
                                            $custValWithOutMake = (($newItemCalWt * $metalRate) / 10);
                                        } else if ($bcItemWtType == 'MG') {
                                            $custValWithOutMake = (($newItemCalWt * $metalRate) / 10000);
                                        }
                                        //ADD THIS ($itemMetalType == 'silver' || $itemMetalType == 'SILVER') CONDITION YUVRAJ @17112022
                                    } else if ($itemMetalType == 'Silver' || $itemMetalType == 'SILVER' || $itemMetalType == 'silver') {
                                        if ($bcItemWtType == 'KG') {
                                            $custValWithOutMake = (($newItemCalWt * $metalRate));
                                        } else if ($bcItemWtType == 'GM') {
                                            if ($silverRatePerWtType == 'KG') {
                                                $custValWithOutMake = ($newItemCalWt * $metalRate / 1000);
                                            } else {
                                                $custValWithOutMake = ($newItemCalWt * $metalRate / $silverRatePerWt);
                                            }
                                        } else if ($bcItemWtType == 'MG') {
                                            $custValWithOutMake = (($newItemCalWt * $metalRate) / (1000 * 1000));
                                        }
                                    }
                                }
                                ///ADD THIS ($itemMetalType == 'GOLD' || $itemMetalType == 'gold') CONDITION YUVRAJ @17112022
                                if ($itemMetalType == 'Gold' || $itemMetalType == 'GOLD' || $itemMetalType == 'gold') {
                                    if ($bcItemWtType == 'KG') {
                                        $valaddamt = (($valaddwt * $metalRate) * 100);
                                    } else if ($bcItemWtType == 'GM') {
                                        $valaddamt = (($valaddwt * $metalRate) / 10);
                                    } else if ($bcItemWtType == 'MG') {
                                        $valaddamt = (($valaddwt * $metalRate) / 10000);
                                    }
                                    //ADD THIS ($itemMetalType == 'silver' || $itemMetalType == 'SILVER') CONDITION YUVRAJ @17112022
                                } else if ($itemMetalType == 'Silver' || $itemMetalType == 'SILVER' || $itemMetalType == 'silver') {
                                    if ($bcItemWtType == 'KG') {
                                        $valaddamt = ($valaddwt * $metalRate);
                                    } else if ($bcItemWtType == 'GM') {
                                        if ($silverRatePerWtType == 'KG') {
                                            $valaddamt = (($valaddwt * $metalRate) / 1000);
                                        } else {
                                            $valaddamt = (($valaddwt * $metalRate) / $silverRatePerWt);
                                        }
                                    } else if ($bcItemWtType == 'MG') {
                                        $valaddamt = ((($valaddwt * $metalRate) / $silverRatePerWt) / (1000 * 1000));
                                    }
                                }
                                //
                                //
                                $custFinalValuation = om_round($custValWithOutMake + $totalLabNOthCharges);
                                if ($valaddamt != '') {
                                    $custFinalValuation = $custFinalValuation + $valaddamt;
                                }
                                $custValWithOutMake = om_round($custValWithOutMake);
                                //
                                //
                                if ($cryValuation != '')
                                    $custFinalValuation = $custFinalValuation + $cryValuation;
                                //
                                if ($totalItemTaxChrg != '') {
                                    $custTotalTAX = om_round(($custFinalValuation * $totalItemTaxChrg) / 100);
                                    $custFinalValuation = om_round($custFinalValuation + $custTotalTAX);
                                } else if ($itemDefaultGSTOption == 'YES') {
                                    if ($sttr_indicator == 'crystal') {
                                        $GSTTax = 0;
                                    } else {
                                        $GSTTax = 3;
                                    }
                                    $custTotalTAX = om_round(($custFinalValuation * $GSTTax) / 100);
                                    $custFinalValuation = om_round($custFinalValuation + $custTotalTAX);
                                } else if ($itemtottax != '') {
                                    $custFinalValuation = $custFinalValuation + $itemtottax;
                                }
                                //
                                $custFinalValuation = $custFinalValuation;
                                //
                                $totalValuation = $custValWithOutMake + $cryValuation; //Line Added @Author:PRIYA16AUG13
                                //
                                $bcPrice = $custFinalValuation; //add bcPrice @Author:ANUJA03JULY15
                                //
                                //
                                if ($sttr_indicator == 'stock' || $sttr_indicator == 'crystal') {
                                    if ($itemCustPrice != '') {
                                        $Finalprice = $itemCustPrice;
                                        $UintPrice = $itemCustPrice;
                                    } else {
                                        $Finalprice = $custFinalValuation;
                                        $UintPrice = $Finalprice / $bcItemQty;
                                    }
                                } else if ($sttr_indicator == 'imitation' || $sttr_indicator == 'PURCHASE' ||
                                        $sttr_indicator == 'RetailStock') {
                                    //
                                    $Finalprice = $itemCustPrice * $bcItemQty;
                                    $UintPrice = $itemCustPrice;
                                    //
                                }else if($sttr_indicator == 'strsilver'){
                                     $UintPrice = $rowInItemBarCode['sttr_final_sell_valuation'];
                                }
                                //
                                //
                                //echo '$Finalprice == ' . $Finalprice . '<br />';
                                //echo '$GSTTax 1== ' . $GSTTax . '<br />';
                                //
                                //
                                if ($newItemVATCharges > 0) {
                                    $FPriceTax = (($Finalprice * $newItemVATCharges) / 100);
                                    $UPriceTax = (($UintPrice * $newItemVATCharges) / 100);
                                    $FPriceWithTax = ($Finalprice + $FPriceTax);
                                    $UPriceWithTax = ($UintPrice + $UPriceTax);
                                } else if ($GSTTax > 0) {
                                    $FPriceTax = (($Finalprice * $GSTTax) / 100);
                                    $UPriceTax = (($UintPrice * $GSTTax) / 100);
                                    $FPriceWithTax = ($Finalprice + $FPriceTax);
                                    $UPriceWithTax = ($UintPrice + $UPriceTax);
                                } else {
                                    $FPriceWithTax = om_round($Finalprice);
                                    $UPriceWithTax = om_round($UintPrice);
                                }
                                //
                                $FPriceWithTax = intval($FPriceWithTax);
                                $UPriceWithTax = number_format((float) $UPriceWithTax, 2, '.', '');
                                //        
                                //
                                //echo '$UPriceWithTax 2== ' . $UPriceWithTax . '<br />';
                                //echo '$FPriceWithTax 2== ' . $FPriceWithTax . '<br />';
                                //
                                //$Finalprice = number_format((float) $Finalprice, 2, '.', '');
                                //
                                $Finalprice = intval($Finalprice);
                                $UintPrice = number_format((float) $UintPrice, 2, '.', '');

//                                echo '$sttr_indicator=='.$sttr_indicator.'<br />';
//                                echo '$Finalprice=='.$Finalprice.'<br />';
//                                echo '$UintPrice='.$UintPrice.'<br />';
                                
                                $Finalprice = $itemfinalvaluation;

                                $bismark = trim($rowInItemBarCode['sttr_bis_mark']); //to take value of bismark checkbox @AUTHOR: SANDY23JUL13 
                                $bcHallmarkUId = $rowInItemBarCode['sttr_hallmark_uid'];
                                $sttr_fixed_price_status = $rowInItemBarCode['sttr_fixed_price_status']; //TO GET FIXED PRICE STATUS @AUTHOR:MADHUREE-20MAY2021

                                $divPrinted = TRUE;

                                $bcItemCustPri = trim($rowInItemBarCode['sttr_cust_price']); //Add new variable @Author:ANUJA27JUN15
                                $qSelPerSupplier = "SELECT user_fname,user_lname FROM user where user_id='$bcuserId' and user_type='SUPPLIER'";

                                $resPerSupplier = mysqli_query($conn, $qSelPerSupplier);
                                $rowPerSupplier = mysqli_fetch_array($resPerSupplier, MYSQLI_ASSOC);
                                $Suppliername = $rowPerSupplier['user_fname'];
                                if ($Suppliername == '') {
                                    $Suppliername = $rowInItemBarCode['sttr_brand_id'];
                                }

                                $Suppliername = om_strtoupper(substr($Suppliername, 0, 19));

                                $qSelPerFirm = "SELECT firm_name,firm_long_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$bcFirmId'";

                                $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                                $rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC);
                                $firmNameLabel = $rowPerFirm['firm_long_name'];

                                if ($firmNameLabel == '') {
                                    $firmNameLabel = $rowPerFirm['firm_name'];
                                }

                                $firmNameLabel = om_strtoupper($firmNameLabel);

                                //Start To set barcode color as per purity @AUTHOR: SANDY21OCT13
                                $tunch = $rowInItemBarCode['sttr_purity'];
                                $metal = $rowInItemBarCode['sttr_metal_type'];

                                parse_str(getTableValues("SELECT itm_tunch_bctext FROM item_tunch WHERE itm_tunch_value = '$tunch' and itm_tunch_metal_type='$metal'"));

                                if ($itm_tunch_bctext != '' && $itm_tunch_bctext != NULL) {
                                    $tunch = $itm_tunch_bctext;
                                } else {
                                    $tunch = $tunch . '%';
                                }

                                $metal = $rowInItemBarCode['sttr_product_type'];

                                $imgId = $rowInItemBarCode['sttr_image_id'];

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
                                    $getCrystalQuery = "SELECT * FROM stock_transaction WHERE sttr_sttr_id = '$bcGetCrsytal' "
                                            . "and sttr_indicator IN ('stockCrystal')";
                                    $resInItemBarCodeCrystal = mysqli_query($conn, $getCrystalQuery);
                                    $stoneinfopresentcnt = mysqli_num_rows($resInItemBarCodeCrystal);
                                    $bcItemCrystal = '';
                                    if ($stoneinfopresentcnt > 0) {
                                        $bcItemCrystal = array();
                                        while ($rowInItemBarCodeCrystal = mysqli_fetch_array($resInItemBarCodeCrystal, MYSQLI_ASSOC)) {
                                            $bcItemCrystal[] = $rowInItemBarCodeCrystal;
                                        }
                                    }
                                }

                                //echo '<br/> Q:' . $bcItemCrystal;
                                //echo '<br/>';
                                //print_r($bcItemCrystal);
                                //echo '$bcItemCrystal == ' . $bcItemCrystal . '<br/>';
                                //echo '$bcItemWt == ' . $bcItemWt . '<br/>';
                                //echo '$bcItemWtType == ' . $bcItemWtType . '<br/>';
                                //echo '$bcItemNtWt == ' . $bcItemNtWt . '<br/>';
                                //echo '$bcItemNtWtType == ' . $bcItemNtWtType . '<br/>';
                                //echo '$newItemFFNW == ' . $newItemFFNW . '<br/>';
                                //echo '$totalLabNOthCharges == ' . $totalLabNOthCharges . '<br/>';
                                ?>
                                <tr>
                                    <td>
        <?php
        //
        include 'omstock55x13sbdv.php';
        ?>
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
                            <table border="0" cellpadding="2" cellspacing="0" align="right" valign="middle" width="100%" align="center" style="margin:12px auto;">
                                <tr>
            <?php
            if ($pageNum > 1) {
                ?>
                                        <td align="right">
                                            <form name="prev_barcode" id="prev_barcode"
                                                  action="javascript:navigationToNextBarcodePanel(<?php echo $pageNum - 1; ?>,'<?php echo $panel; ?>','');"
                                                  method="get"><input type="submit" value=" PREVIOUS " style="background: #dceaff;color: #0a0c87;border: 1px solid #5f9df5;border-radius: 6px !important;padding: 2px 10px;font-size:16px;font-weight:600;"
                                                                maxlength="30" size="15" /></form>
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
                                                  method="get"><input type="submit" value=" NEXT " class="frm-btn" style="background: #dceaff;color: #0a0c87;border: 1px solid #5f9df5;border-radius: 6px !important;padding: 2px 10px;font-size:16px;font-weight:600;"
                                                                maxlength="30" size="15" /></form>
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
