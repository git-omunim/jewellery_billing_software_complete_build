<?php
/*
 * **************************************************************************************
 * @tutorial:
 * **************************************************************************************
 * 
 * Created on Apr 30, 2012 11:57:35 PM
 *
 * @FileName: omstockTransibbc20x12.php
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
$panelName = 'MulBcPanel';
?>
<div id="SortByProdName">

    <?php
    /*     * ******Start code to add panel indiacator @Author:PRIYA16MAY14************ */
    if ($_SESSION['sessionOwnIndStr'][7] == 'Y'  || $_SESSION['sessionOwnIndStr'][7] == 'A') {
        $sessionOwnerId = $_SESSION['sessionOwnerId'];
        $omLayoutOptionTop = '20x12LBCTOPMARGIN';
        $omLayoutOptionLeft = '20x12LBCLEFTMARGIN';
        $omLayoutOptionBorder = '20x12LBCBORDER';
        $omLayOptSlipWidth = '20x12BCBLOCKSLIPWIDTH';
        $omLayOptSlipHeight = '20x12BCBLOCKSLIPHEIGHT';
        $omLayOptNoOfRows = '20X12BCBLOCKNOOFROWS';
        $omLayOptNoOfCols = '20X12BCBLOCKNOOFCols';
        $omLayoutOptionBorder = '20x12LBCBORDER';

        $omLayFontSize = '20x12BCBLOCKFONTSIZE1';
        $omLayFontSize1 = '20x12BCBLOCKFONTSIZE1';
        $omLayFontSize2 = '20x12BCBLOCKFONTSIZE2';
        $omLayFontSize3 = '20x12BCBLOCKFONTSIZE3';
        $omLayFontSize4 = '20x12BCBLOCKFONTSIZE4';
        $omLayFontSize5 = '20x12BCBLOCKFONTSIZE5';
        $omLayFontSize6 = '20x12BCBLOCKFONTSIZE6';
        $omLayFontSize7 = '20x12BCBLOCKFONTSIZE7';
        $omLayFontSize8 = '20x12BCBLOCKFONTSIZE8';
        $omLayFontSize9 = '20x12BCBLOCKFONTSIZE9';
        $omLayFontSize10 = '20x12BCBLOCKFONTSIZE10';
        $omLayBarcodeSize = '20X12BCBLOCKBARCODESIZE';

        $noOfCols = updateOptionValue($omLayOptNoOfCols, '', 'selValue', '', $panelName);
        if ($noOfCols == '') {
            updateOptionValue($omLayOptNoOfCols, '', 'selValue', 'barCode', $panelName);
            updateOptionValue($omLayFontSize, '', 'selValue', 'barCode', $panelName);
        }

        $topMargin = updateOptionValue($omLayoutOptionTop, '', 'selValue', '', $panelName);
        $leftMargin = updateOptionValue($omLayoutOptionLeft, '', 'selValue', '', $panelName);
        $slipWidth = updateOptionValue($omLayOptSlipWidth, '', 'selValue', '', $panelName);
        $slipHeight = updateOptionValue($omLayOptSlipHeight, '', 'selValue', '', $panelName);
        $noOfRows = updateOptionValue($omLayOptNoOfRows, '', 'selValue', '', $panelName);
        $noOfCols = updateOptionValue($omLayOptNoOfCols, '', 'selValue', '', $panelName);

        $fontSize = updateOptionValue($omLayFontSize, '', 'selValue', '', $panelName);
        $fontSize1 = updateOptionValue($omLayFontSize1, '', 'selValue', '', $panelName);
        if ($fontSize1 == '') {
            updateOptionValue($omLayFontSize1, '10PX', 'selValue', 'barCode', $panelName);
        }
        $fontSize2 = updateOptionValue($omLayFontSize2, '', 'selValue', '', $panelName);
        if ($fontSize2 == '') {
            updateOptionValue($omLayFontSize2, '10PX', 'selValue', 'barCode', $panelName);
        }
        $fontSize3 = updateOptionValue($omLayFontSize3, '', 'selValue', '', $panelName);
        if ($fontSize3 == '') {
            updateOptionValue($omLayFontSize3, '10PX', 'selValue', 'barCode', $panelName);
        }
        $fontSize4 = updateOptionValue($omLayFontSize4, '', 'selValue', '', $panelName);
        if ($fontSize4 == '') {
            updateOptionValue($omLayFontSize4, '10PX', 'selValue', 'barCode', $panelName);
        }
        $fontSize5 = updateOptionValue($omLayFontSize5, '', 'selValue', '', $panelName);
        if ($fontSize5 == '') {
            updateOptionValue($omLayFontSize5, '10PX', 'selValue', 'barCode', $panelName);
        }
        $fontSize6 = updateOptionValue($omLayFontSize6, '', 'selValue', '', $panelName);
        if ($fontSize6 == '') {
            updateOptionValue($omLayFontSize6, '10PX', 'selValue', 'barCode', $panelName);
        }
        $fontSize7 = updateOptionValue($omLayFontSize7, '', 'selValue', '', $panelName);
        if ($fontSize7 == '') {
            updateOptionValue($omLayFontSize7, '10PX', 'selValue', 'barCode', $panelName);
        }
        $fontSize8 = updateOptionValue($omLayFontSize8, '', 'selValue', '', $panelName);
        if ($fontSize8 == '') {
            updateOptionValue($omLayFontSize8, '10PX', 'selValue', 'barCode', $panelName);
        }
        $fontSize9 = updateOptionValue($omLayFontSize9, '', 'selValue', '', $panelName);
        if ($fontSize9 == '') {
            updateOptionValue($omLayFontSize9, '10PX', 'selValue', 'barCode', $panelName);
        }
        $fontSize10 = updateOptionValue($omLayFontSize10, '', 'selValue', '', $panelName);
        if ($fontSize10 == '') {
            updateOptionValue($omLayFontSize10, '10PX', 'selValue', 'barCode', $panelName);
        }

        $barcodeSize = updateOptionValue($omLayBarcodeSize, '', 'selValue', '', $panelName);
        if ($barcodeSize == '') {
            updateOptionValue($omLayBarcodeSize, '7PX', 'selValue', 'barCode', $panelName);
        }
//Start Code to Barcode Borders 
        $selBorder = "SELECT * FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = '$omLayoutOptionBorder'";
        $resBorder = mysqli_query($conn, $selBorder);
        $rowBorder = mysqli_num_rows($resBorder);

        if ($rowBorder == 0) {
            $query = "INSERT INTO omlayout(omly_own_id,omly_option,omly_value)
                            VALUES('$sessionOwnerId','$omLayoutOptionBorder','NO')";
            if (!mysqli_query($conn, $query)) {
                die('Error: ' . mysqli_error($conn));
            }
            $barCodeBorder = 'solid 1px #FFFFFF';
        } else {
            $rowBorder = mysqli_fetch_array($resBorder);
            $barCodeBorder = $rowBorder['omly_value'];
        }
        if ($barCodeBorder == 'YES') {
            $barCodeBorder = 'solid 1px #C7C5C8';
        } else {
            $barCodeBorder = 'solid 1px #FFFFFF';
        }
//End Code to Barcode Borders
        $deleteTopMargin = $slipHeight + 3;
        $deleteLeftMargin = $slipWidth - 3;
        include 'ombcclass.php';
        ?>

        <!--<div id="SortByProdName"></div>-->
        <!--Start Code to Add 10 search button in multilabel panel @Author:SHE23FEB15-->
        <?php
        /*         * ***********Start code to change file @Author:PRIYA03JUN14************************ */
        $tags = $_GET['tags']; //var changed @Author:PRIYA07APR15

        if ($tags != 'true') {
            ?>
            <table border="0" cellpadding="2" cellspacing="2" align="center" valign="top" class="noPrint" width="100%" style="border:1px solid #c1c1c1;background:#f5f5f5;">
                <tr style="background: #FFE34F;">
                    <td align='center'>
                        <span style="font-size:15px;font-weight: 600">1</span>
                    </td>
                    <td align='center'>
                         <span style="font-size:15px;font-weight: 600">2</span>
                    </td>
                    <td align='center'>
                         <span style="font-size:15px;font-weight: 600">3</span>
                    </td>
                    <td align='center'>
                         <span style="font-size:15px;font-weight: 600">4</span>
                    </td>
                    <td align='center'>
                         <span style="font-size:15px;font-weight: 600">5</span>
                    </td>
                      <td align='center'>
                         <span style="font-size:15px;font-weight: 600">6</span>
                    </td>
                      <td align='center'>
                         <span style="font-size:15px;font-weight: 600">7</span>
                    </td>
                      <td align='center'>
                         <span style="font-size:15px;font-weight: 600">8</span>
                    </td>
                     <td align='center'>
                         <span style="font-size:15px;font-weight: 600">9</span>
                    </td>
                      <td align='center'>
                         <span style="font-size:15px;font-weight: 600">10</span>
                    </td>
                </tr>

                <?php
                $valuePresentInTable = updateOptionValue('mulBcOption1', 'productid', 'selValue', '', $panelName);
                if ($valuePresentInTable == '') {
                    $valuePresentInTable = updateOptionValue('mulBcOption1', 'productid', 'selValue', 'barCode', $panelName);
                    updateOptionValue('mulBcOption1', 'productid', 'selValue', 'barCode', $panelName);
                    updateOptionValue('mulBcOption2', 'itemname', 'selValue', 'barCode', $panelName);
                    updateOptionValue('mulBcOption3', 'itemwt', 'selValue', 'barCode', $panelName);
                    updateOptionValue('mulBcOption4', 'itemnwt', 'selValue', 'barCode', $panelName);
                    updateOptionValue('mulBcOption5', 'cryval', 'selValue', 'barCode', $panelName);
                    updateOptionValue('mulBcOption6', 'crywt', 'selValue', 'barCode', $panelName);
                    updateOptionValue('mulBcOption7', 'mkgch', 'selValue', 'barCode', $panelName);
                    updateOptionValue('mulBcOption8', 'custMob', 'selValue', 'barCode', $panelName);
                    updateOptionValue('mulBcOption9', 'firm', 'selValue', 'barCode', $panelName);
                    updateOptionValue('mulBcOption10', 'otherInfo', 'selValue', 'barCode', $panelName);
                }
                $NewvaluePresentInTable = updateOptionValue('mulBcOption11', 'purity', 'selValue', '', $panelName);
                if ($NewvaluePresentInTable == '') {
                    updateOptionValue('mulBcOption11', 'purity', 'selValue', 'barCode', $panelName); //Add price @Author:GAUR31MAY16
                    updateOptionValue('mulBcOption12', 'itempwt', 'selValue', 'barCode', $panelName); //Add price @Author:GAUR13SEP16
                    updateOptionValue('mulBcOption13', 'itemcode', 'selValue', 'barCode', $panelName); //Add price @Author:GAUR16SEP16
                    updateOptionValue('mulBcOption14', 'itemdate', 'selValue', 'barCode', $panelName);
                    updateOptionValue('mulBcOption15', 'itemmodel', 'selValue', 'barCode', $panelName);
                    updateOptionValue('mulBcOption16', 'itemsize', 'selValue', 'barCode', $panelName);
                    updateOptionValue('mulBcOption17', 'itemImage', 'selValue', 'barCode', $panelName);
                    updateOptionValue('mulBcOption18', 'stoneInfo', 'selValue', 'barCode', $panelName);
                    updateOptionValue('mulBcBarcode', '', 'selValue', 'barCode', $panelName);
                }
                // updateOptionValue('mulBcBarcode', '', 'selValue', 'barCode', $panelName);
                $captionvalue1 = SetCaptionValue('mulBcCaption1', '', 'selValue', $panelName);
                if ($captionvalue1 == '') {
                    SetCaptionValue('mulBcCaption1', '', 'insert', $panelName);
                }
                $captionvalue2 = SetCaptionValue('mulBcCaption2', '', 'selValue', $panelName);
                if ($captionvalue2 == '') {
                    SetCaptionValue('mulBcCaption2', '', 'insert', $panelName);
                }
                $captionvalue3 = SetCaptionValue('mulBcCaption3', '', 'selValue', $panelName);
                if ($captionvalue3 == '') {
                    SetCaptionValue('mulBcCaption3', '', 'insert', $panelName);
                }
                $captionvalue4 = SetCaptionValue('mulBcCaption4', '', 'selValue', $panelName);
                if ($captionvalue4 == '') {
                    SetCaptionValue('mulBcCaption4', '', 'insert', $panelName);
                }
                $captionvalue5 = SetCaptionValue('mulBcCaption5', '', 'selValue', $panelName);
                if ($captionvalue5 == '') {
                    SetCaptionValue('mulBcCaption5', '', 'insert', $panelName);
                }
                $captionvalue6 = SetCaptionValue('mulBcCaption6', '', 'selValue', $panelName);
                if ($captionvalue6 == '') {
                    SetCaptionValue('mulBcCaption6', '', 'insert', $panelName);
                }
                $captionvalue7 = SetCaptionValue('mulBcCaption7', '', 'selValue', $panelName);
                if ($captionvalue7 == '') {
                    SetCaptionValue('mulBcCaption7', '', 'insert', $panelName);
                }
                $captionvalue8 = SetCaptionValue('mulBcCaption8', '', 'selValue', $panelName);
                if ($captionvalue8 == '') {
                    SetCaptionValue('mulBcCaption8', '', 'insert', $panelName);
                }
                $captionvalue9 = SetCaptionValue('mulBcCaption9', '', 'selValue', $panelName);
                if ($captionvalue9 == '') {
                    SetCaptionValue('mulBcCaption9', '', 'insert', $panelName);
                }
                $captionvalue10 = SetCaptionValue('mulBcCaption10', '', 'selValue', $panelName);
                if ($captionvalue10 == '') {
                    SetCaptionValue('mulBcCaption10', '', 'insert', $panelName);
                }
                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'mulBcOption1' and omin_panel='$panelName'"));
                callmulLoanBCFuncMu('mulBcOption1', $omin_value, $panelName);
                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'mulBcOption2' and omin_panel='$panelName'"));
                callmulLoanBCFuncMu('mulBcOption2', $omin_value, $panelName);
                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'mulBcOption3' and omin_panel='$panelName'"));
                callmulLoanBCFuncMu('mulBcOption3', $omin_value, $panelName);
                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'mulBcOption4' and omin_panel='$panelName'"));
                callmulLoanBCFuncMu('mulBcOption4', $omin_value, $panelName);
                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'mulBcOption5' and omin_panel='$panelName'"));
                callmulLoanBCFuncMu('mulBcOption5', $omin_value, $panelName);
                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'mulBcOption6' and omin_panel='$panelName'"));
                callmulLoanBCFuncMu('mulBcOption6', $omin_value, $panelName);
                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'mulBcOption7' and omin_panel='$panelName'"));
                callmulLoanBCFuncMu('mulBcOption7', $omin_value, $panelName);
                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'mulBcOption8' and omin_panel='$panelName'"));
                callmulLoanBCFuncMu('mulBcOption8', $omin_value, $panelName);
                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'mulBcOption9' and omin_panel='$panelName'"));
                callmulLoanBCFuncMu('mulBcOption9', $omin_value, $panelName);
                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'mulBcOption10' and omin_panel='$panelName'"));
                callmulLoanBCFuncMu('mulBcOption10', $omin_value, $panelName);
                ?>

                <tr>
                    <td align="center" valign="middle" title="ENTER CAPTION!">
                        <input type="text" id="caption1" name="caption1" 
                               value="<?php echo $captionvalue1; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="ENTER CAPTION!">
                        <input type="text" id="caption2" name="caption2" 
                               value="<?php echo $captionvalue2; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="ENTER CAPTION!">
                        <input type="text" id="caption3" name="caption3" 
                               value="<?php echo $captionvalue3; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="ENTER CAPTION!">
                        <input type="text" id="caption4" name="caption4" 
                               value="<?php echo $captionvalue4; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="ENTER CAPTION!">
                        <input type="text" id="caption5" name="caption5" 
                               value="<?php echo $captionvalue5; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="ENTER CAPTION!">
                        <input type="text" id="caption6" name="caption6" 
                               value="<?php echo $captionvalue6; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="ENTER CAPTION!">
                        <input type="text" id="caption7" name="caption7" 
                               value="<?php echo $captionvalue7; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="ENTER CAPTION!">
                        <input type="text" id="caption8" name="caption8" 
                               value="<?php echo $captionvalue8; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="ENTER CAPTION!">
                        <input type="text" id="caption9" name="caption9" 
                               value="<?php echo $captionvalue9; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="ENTER CAPTION!">
                        <input type="text" id="caption10" name="caption10" 
                               value="<?php echo $captionvalue10; ?>" placeholder="CAPTION" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !">
                        <input type="text" id="fontSizeBarCode1" name="fontSizeBarCode1" 
                               value="<?php echo $fontSize1; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !">
                        <input type="text" id="fontSizeBarCode2" name="fontSizeBarCode2" 
                               value="<?php echo $fontSize2; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !">
                        <input type="text" id="fontSizeBarCode3" name="fontSizeBarCode3" 
                               value="<?php echo $fontSize3; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !">
                        <input type="text" id="fontSizeBarCode4" name="fontSizeBarCode4" 
                               value="<?php echo $fontSize4; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !">
                        <input type="text" id="fontSizeBarCode5" name="fontSizeBarCode5" 
                               value="<?php echo $fontSize5; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !">
                        <input type="text" id="fontSizeBarCode6" name="fontSizeBarCode6" 
                               value="<?php echo $fontSize6; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !">
                        <input type="text" id="fontSizeBarCode7" name="fontSizeBarCode7" 
                               value="<?php echo $fontSize7; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !">
                        <input type="text" id="fontSizeBarCode8" name="fontSizeBarCode8" 
                               value="<?php echo $fontSize8; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !">
                        <input type="text" id="fontSizeBarCode9" name="fontSizeBarCode9" 
                               value="<?php echo $fontSize9; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                    <td align="center" valign="middle" title="CHANGE HERE FONT SIZE IN PIXELS !">
                        <input type="text" id="fontSizeBarCode10" name="fontSizeBarCode10" 
                               value="<?php echo $fontSize10; ?>" placeholder="10PX" size="9" class="input_border_blackFont_center" style="width:100%;height:30px;"/>
                    </td>
                </tr>
               
                <tr>
                    <td align="center" valign="middle" colspan="10" style="padding:20px 0;">
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
                                                       '', '',
                                                       document.getElementById('caption1').value, document.getElementById('caption2').value,
                                                       document.getElementById('caption3').value, document.getElementById('caption4').value,
                                                       document.getElementById('caption5').value, document.getElementById('caption6').value,
                                                       document.getElementById('caption7').value, document.getElementById('caption8').value,
                                                       document.getElementById('caption9').value, document.getElementById('caption10').value,
                                                       '', '<?php echo $panelName; ?>'
                                                       );"

                               value="SUBMIT" size="5" class="frm-btn" style="width:max-content;height: 32px;background: #FFDEAB;color: #A60;border-radius: 3px !important;border: 1px solid #eca02b;font-size: 18px;"/>
                    </td>
                </tr>
            </table><?php
            if (isset($_REQUEST['prodname'])) {
                $prodName = $_REQUEST['prodname'];
            }
            ?>
            <table width="70%" align="center" style="margin:12px auto;">
                <tr>
                    <td style="font-size:16px;color:#000;" width="25%" align="right">
                        <b>  SEARCH PRODUCT BY NAME:</b>
                    </td>
                    <td align="left" title="PRODUCT ID" width="50%">
                        <input style="width:100%;height:45px;border-radius:5px!important;border: 1px dashed #ef960f;box-shadow: 1px 1px 5px rgba(193, 193, 193, 0.5);padding: 10px;" id="Prod_name" name="Prod_name" type="text" placeholder="PROD NAME" value="<?php
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
                                                   getBarcodeProdName(document.getElementById('Prod_name').value, 'Prod_name', 'ProdNameDiv', 'MultiLabel');
                                               }"

                               autocomplete="off" spellcheck="false" class="form-control-height20 placeholderClass" size="4" maxlength="10"  />
                        <div id="ProdNameDiv" class="itemListDivToAddStock placeholderClass"></div>
                    </td>
                    <td width="10%" align="left">
                        <input type="button" onclick="sendProdName(document.getElementById('Prod_name').value);" value='SEARCH' class="frm-btn" style="width:100%;height:45px;background:#FFDEAB;color:#A60;border-radius: 3px !important;border: 1px solid #eca02b;font-size:16px;margin-left: -10px;">
                    </td>
                </tr>
            </table>
          2
        <?php } ?>
        <!--End Code to Add 10 search button in multilabel panel @Author:SHE23FEB15
        <!---Changes in classes @AUTHOR: SANDY10JAN14-------------->
        <style type="text/css">
            .table86{
                width: 86mm;
                text-align:center;
            }
            .table86Div{
                width: 86mm;
                padding-left: 3mm;
                padding-right: 3mm;
                padding-top: 4mm;
            }
            .block20x12{
                width: 20mm;
                height: 12mm;
            }
            .block20x12Div{
                width: <?php echo $slipWidth; ?>;
                height: <?php echo $slipHeight; ?>;
                font-weight:bold;
                font-family:  Calibri;
                font-size: 12px;
                text-align:left;
            }
            .marginLeftBarCode20x13{
                margin-left: <?php echo $leftMargin ?>;    
                margin-top:  <?php echo $topMargin ?>;
                position:relative;
            }
            .deleteButton{
                margin-left: <?php echo $deleteLeftMargin ?>mm;    
                margin-top:  -<?php echo $deleteTopMargin ?>mm;
                position: absolute;
            }
            .divWidth18MM{
                min-width: 18mm;
            }
            .marTopMin3{
                margin-top: -3px;
            }
            @media print {
                .table86{
                    width: 86mm;
                    text-align:center;
                }
                .table86Div{
                    width: 86mm;
                    padding-left: 3mm;
                    padding-right: 3mm;
                    padding-top: 4mm;
                }
                .block20x12{
                    width: 20mm;
                    height: 12mm;
                }
                .block20x12Div{
                    width: <?php echo $slipWidth; ?>;
                    height: <?php echo $slipHeight; ?>;
                    font-weight:bold;
                    font-family:  Calibri;
                    font-size: 25px;
                    text-align:left;
                    border: 0px solid;
                }
                .marginLeftBarCode20x13{
                    margin-left: <?php echo $leftMargin ?>;    
                    margin-top:  <?php echo $topMargin ?>;
                    position:relative;
                }
                .divWidth18MM{
                    min-width: 18mm;
                }
                .marTopMin3{
                    margin-top: -3px;
                }
            }
        </style>

        <div id="barCode20x12Div">
            <div id="headerItemBarCode20x12" >
                <div id="barCodePrint" style="border:0px solid;">
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

                        if (isset($_REQUEST['prodname'])) {
                            $prodName = $_REQUEST['prodname'];
                        }
                        // print_r($_REQUEST);
                        $barcodePerPage = $noOfRows * $noOfCols;
                        $checkNextBarcode = $barcodePerPage * 2;
                        $pageNum = 1;
                        if (isset($_GET['page'])) {
                            $pageNum = $_GET['page'];
                        }
                        $perOffset = ($pageNum - 1) * $barcodePerPage;
                        // echo $prodName;
                        if ($prodName == 'ALL' && $prodName != '') {
                            $qSelInItemBarCode = "SELECT * FROM stock_transaction WHERE (sttr_sttr_id IS NULL or sttr_sttr_id='') LIMIT $perOffset,$checkNextBarcode";
                            $resInItemBarCode = mysqli_query($conn, $qSelInItemBarCode);
                            $totalItemBarCode = mysqli_num_rows($resInItemBarCode);
                        } else if ($prodName != 'ALL' && $prodName != '') {
                            $qSelInItemBarCode = "SELECT * FROM stock_transaction WHERE (sttr_sttr_id IS NULL or sttr_sttr_id='') and sttr_transaction_type!='sell' and sttr_item_name='$prodName'  LIMIT $perOffset,$checkNextBarcode";
                            $resInItemBarCode = mysqli_query($conn, $qSelInItemBarCode);
                            $totalItemBarCode = mysqli_num_rows($resInItemBarCode);
                        } else {
                            $qSelInItemBarCode = "SELECT * FROM stock_transaction WHERE (sttr_sttr_id IS NULL or sttr_sttr_id='') and sttr_transaction_type!='sell' and sttr_firm_id IN ($strFrmId) order by sttr_id desc LIMIT $perOffset,$checkNextBarcode";
                            $resInItemBarCode = mysqli_query($conn, $qSelInItemBarCode);
                            $totalItemBarCode = mysqli_num_rows($resInItemBarCode);
                        }
                        // $rows = ceil($totalItemBarCode / 4);//added  @Author:PRIYA23JUN14
                        if ($prodName != 'ALL' && $prodName != '') {
                            $qSelInItemBarCode = "SELECT * FROM stock_transaction WHERE (sttr_sttr_id IS NULL or sttr_sttr_id='')"
                                    . " and sttr_item_name='$prodName' LIMIT  $perOffset,$barcodePerPage";
                        } else if ($prodName == 'ALL') {
                            $qSelInItemBarCode = "SELECT * FROM stock_transaction WHERE (sttr_sttr_id IS NULL or sttr_sttr_id='')"
                                    . "LIMIT  $perOffset,$barcodePerPage";
                        }
                        $resInItemBarCode = mysqli_query($conn, $qSelInItemBarCode);
                        $totalNextItemBarCode = mysqli_num_rows($resInItemBarCode);
                        // $rows = ceil($totalNextItemBarCode / 4); //added  @Author:PRIYA25JUN14
                        $counter = 1;
                        $checkfirstrow = 0;
                        
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
                        <tr>
                            <td valign="top">
                                <div id="printbarcode">
                                    <div id="printbarcodesub" class="marginLeftBarCode20x13">
                                        <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top">
                                            <?php include 'ombcclass.php'; ?>
                                            <?php for ($row = 1; $row <= $noOfRows; $row++) { ?>
                                                <tr> <?php
                                        for ($col = 1; $col <= $noOfCols; $col++) {
                                            $checkfirstrow++;
                                            if ($checkfirstrow == 1) {
                                                // $margin=$checkfirstrow*$slipWidth;
                                                        ?>

                                                            <td class="block20x12" valign="top">
                                                            <?php } else { ?> 
                                                            <td class="block20x12" valign="top"><?php } ?>
                                                            <?php if ($checkfirstrow == 1) { ?>
                                                                <div id="glassbox" style="border:0px solid;">
                                                                <?php } else { ?>  <div style="border:0px solid;width: 100%;"> <?php } ?> 
                                                                    <div class="block20x12Div" style="border:1px solid;">
                                                                        <?php
                                                                        $divPrinted = FALSE;
                                                                        if ($rowInItemBarCode = mysqli_fetch_array($resInItemBarCode, MYSQLI_ASSOC)) {
                                                                            $cryValuation = 0;
                                                                            $bcId = $rowInItemBarCode['sttr_id'];
                                                                            $bcFirmId = $rowInItemBarCode['sttr_firm_id'];
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
                                                                            $bcItemPrefixId = trim($rowInItemBarCode['sttr_barcode_prefix']);
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
                                                                            $valaddwt = trim($rowInItemBarCode['sttr_cust_wastage_wt']); //echo 'op:' . $valaddwt;
                                                                            $itemfnwt = trim($rowInItemBarCode['sttr_fine_weight']);
                                                                            $itemvaluation = trim($rowInItemBarCode['sttr_valuation']);
                                                                            $itemfinalvaluation = trim($rowInItemBarCode['sttr_final_valuation']);
                                                                            $itemtottax = $rowInItemBarCode['sttr_tot_tax'];
                                                                            $itemWtBy = $rowInItemBarCode['sttr_final_val_by'];
                                                                            $itemCustPrice = $rowInItemBarCode['sttr_cust_price'];
                                                                            $sttr_indicator = $rowInItemBarCode['sttr_indicator'];
                                                                            $itemshape = $rowInItemBarCode['sttr_shape'];



                                                                            if ($bcItemPrefixId == '' || $bcItemPrefixId == NULL || $bcItemPrefixId === 'undefined') {
                                                                                $bcItemPrefixId = 1;
                                                                            }


                                                                            $querySelItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_sttr_id = '$bcId' and sttr_indicator IN ('stockCrystal') and sttr_status NOT IN('SOLDOUT','DELETED') and sttr_current_status NOT IN ('Deleted')"; // Code to add Imitation Stock condition @Author:SHRI26FEB15
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
                                                                                        $cryValuation = $cryValuation + ($rowDetails['sttr_quantity']) * $rowDetails['sttr_sell_rate'];
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
                                                                                $Finalprice = $itemCustPrice * $bcItemQty;
                                                                                $UintPrice = $itemCustPrice;
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

                                                                            parse_str(getTableValues("SELECT itm_tunch_bctext FROM item_tunch WHERE itm_tunch_value = '$tunch'"));

                                                                            if ($itm_tunch_bctext != '' && $itm_tunch_bctext != NULL) {
                                                                                $tunch = $itm_tunch_bctext;
                                                                            } else {
                                                                                $tunch = $tunch . '%';
                                                                            }

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
                                                                                $getCrystalQuery = "SELECT * FROM stock_transaction WHERE sttr_sttr_id = '$bcGetCrsytal' and sttr_indicator IN ('stockCrystal')";
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

                                                                            <?php include'omstockibbc20x12dv.php'; ?>

                                                                        <?php } ?>
                                                                    </div>
                                                                    <?php if ($checkfirstrow == 1) { ?>  </div><?php } else { ?> </div> <?php } ?>

                                                            <div id="barCodeCloseDiv<?php echo $counter; ?>" style="cursor: pointer;" class="deleteButton noPrint"
                                                                 onclick="deleteItemBarCode22x12('block20x12Div<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>', '<?php echo $bcId; ?>')">
                                                                     <?php if ($divPrinted == TRUE) { ?>
                                                                    <img src="<?php echo $documentRoot; ?>/images/delete16.png" alt="" class="noPrint"  />
                                                                <?php } else { ?>
                                                                    &nbsp;
                                                                <?php } ?> 
                                                            </div>

                                                            <?php if ($checkfirstrow == 1) { ?>  </td><?php } else { ?> </td> <?php } ?>


                                                        <?php $counter++; ?>

                                                    <?php } ?>

                                                </tr> 
                                            <?php } ?> 
                                        </table>
                                    </div>
                                </div>
                            </td>
                            </div>
                        </tr>
                    </table>
                </div>
            </div>
            <?php
            //echo$totalNextItemBarCode;
            if ($totalNextItemBarCode > 0) {

                if ($prodName == '') {
                    ?>

                    <table border="0" cellpadding="0" cellspacing="0" align="right" width="100%" class="marginTop7">
                        <tr>
                            <?php
                            //echo $pageNum;
                            if ($pageNum > 1) {
                                ?>
                                <td align="right">
                                    <form name="prev_barcode" id="prev_barcode"
                                          action="javascript:navigationToNextBarcodePanel(<?php echo "$pageNum - 1"; ?>,'20x12Paging','');"
                                          method="get"><input type="submit" value="Prev Barcodes" style="background: #dceaff;color: #0a0c87;border: 1px solid #5f9df5;border-radius: 6px !important;padding: 2px 10px;font-size:16px;font-weight:600;"
                                                        maxlength="30" size="15" /></form>
                                </td>
                                <?php
                            }
                            ?>
                            <?php
                            ///echo  $totalItemBarCode.$barcodePerPage;
                            if ($totalItemBarCode > $barcodePerPage) {
                                ?>
                                <td align="right" width="110px">
                                    <form name="next_Barcodes" id="next_Barcodes"
                                          action="javascript:navigationToNextBarcodePanel(<?php echo $pageNum + 1; ?>,'20x12Paging','');"
                                          method="get"><input type="submit" value="Next Barcodes" style="background: #dceaff;color: #0a0c87;border: 1px solid #5f9df5;border-radius: 6px !important;padding: 2px 10px;font-size:16px;font-weight:600;"
                                                        maxlength="30" size="15" /></form>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                    </table>
                <?php } else {
                    ?>
                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" class="marginTop7">
                        <tr>
                            <?php
                            //echo $pageNum;
                            if ($pageNum > 1) {
                                ?>
                                <td align="right">
                                    <form name="prev_barcode" id="prev_barcode"
                                          action="javascript:navigationToNextBarcodePanel(<?php echo "$pageNum - 1"; ?>,'20x12Paging','<?php echo $prodName; ?>');"
                                          method="get"><input type="submit" value="Prev Barcodes" 
                                                        maxlength="30" size="15" style="background: #dceaff;color: #0a0c87;border: 1px solid #5f9df5;border-radius: 6px !important;padding: 2px 10px;font-size:16px;font-weight:600;"/></form>
                                </td>
                                <?php
                            }
                            ?>
                            <?php
                            ///echo  $totalItemBarCode.$barcodePerPage;
                            if ($totalItemBarCode > $barcodePerPage) {
                                ?>
                                <td align="right" width="110px">
                                    <form name="next_Barcodes" id="next_Barcodes"
                                          action="javascript:navigationToNextBarcodePanel(<?php echo $pageNum + 1; ?>,'20x12Paging','<?php echo $prodName; ?>');"
                                          method="get"><input type="submit" value="Next Barcodes" 
                                                        maxlength="30" size="15" style="background: #dceaff;color: #0a0c87;border: 1px solid #5f9df5;border-radius: 6px !important;padding: 2px 10px;font-size:16px;font-weight:600;"/></form>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <table border="0" cellspacing="5" cellpadding="5" class="noPrint" align="center">
                    <td align="center" class="noPrint">
                        <a style="cursor: pointer;" 
                           onclick="printDirectDiv('printbarcode')" id="print_link">
                            <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print'
                                 width="32px" height="32px" /> 
                            <img src="<?php echo $documentRoot; ?>/images/spacer.gif" onload="draggable_barcode_setting('<?php echo $panelName; ?>');" class="noPrint" />
                        </a> 

                    </td>
                </table>
            <?php } ?>
        </div>       
    <?php } ?>
</div>
<iframe id='ifrmPr' 
        style="width:0px; height:0px; border: none; background:transparent">
 <!--src='#' Removed by Ashwini Patil-->
</iframe>
<!-------------End code to add panel indiacator @Author:PRIYA17MAY14--------------->