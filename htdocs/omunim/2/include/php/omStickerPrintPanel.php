<?php
/*
 * **************************************************************************************
 * @tutorial: STICKER PRINT PANEL DIV @PRIYANKA-29AUG2019
 * **************************************************************************************
 * 
 * Created on AUG 29, 2019 11:50:35 AM
 *
 * @FileName: omStickerPrintPanel.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
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
include_once 'ommpfunc.php';
include_once 'omStickerFunc.php';
?>
<?php
//
//echo 'stickers == ' . $_REQUEST['stickers'] . '<br />';
//echo 'sessionOwnIndStr7 == ' . $_SESSION['sessionOwnIndStr'][7] . '<br />';
//
$stickers = $_REQUEST['stickers'];
//
if ($stickers != 'true') {
    ?>
    <table border="0" cellpadding="2" cellspacing="2" align="center" valign="top" width="100%" class="noPrint" style="border:1px solid #c1c1c1;background:#f5f5f5;">
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
            </tr>
        <?php
        //
        $valuePresentInTable = updateOptionValue('stickerOption1', 'firm', 'selValue', '');
        //
        if ($valuePresentInTable == '') {
            $valuePresentInTable = updateOptionValue('stickerOption1', 'firm', 'selValue', 'StickerPrintPanel');
            updateOptionValue('stickerOption1', 'firm', 'selValue', 'StickerPrintPanel');
            updateOptionValue('stickerOption2', 'custFname', 'selValue', 'StickerPrintPanel');
            updateOptionValue('stickerOption3', 'custLname', 'selValue', 'StickerPrintPanel');
            updateOptionValue('stickerOption4', 'custFather', 'selValue', 'StickerPrintPanel');
            updateOptionValue('stickerOption5', 'custAdd', 'selValue', 'StickerPrintPanel');
            updateOptionValue('stickerOption6', 'custMob', 'selValue', 'StickerPrintPanel');
            updateOptionValue('stickerOption7', 'custPincode', 'selValue', 'StickerPrintPanel');
            updateOptionValue('stickerOption8', 'custEmail', 'selValue', 'StickerPrintPanel');
        }
        //
        $valueMobPresentInTable = updateOptionValue('stickerOption6', 'custMob', 'selValue', '');
        //
        if ($valueMobPresentInTable == '') {
            updateOptionValue('stickerOption6', 'custMob', 'selValue', 'StickerPrintPanel');
        }
        //
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption1'"));
        callStickerFunc('stickerOption1', $omin_value);
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption2'"));
        callStickerFunc('stickerOption2', $omin_value);
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption3'"));
        callStickerFunc('stickerOption3', $omin_value);
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption4'"));
        callStickerFunc('stickerOption4', $omin_value);
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption5'"));
        callStickerFunc('stickerOption5', $omin_value);
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption6'"));
        callStickerFunc('stickerOption6', $omin_value);
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption7'"));
        callStickerFunc('stickerOption7', $omin_value);
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption8'"));
        callStickerFunc('stickerOption8', $omin_value);
        ?>
    </table>
<?php } ?>
<div id = "barCodePrintPanelPrintDiv">
    <?php
    //
    if ($_SESSION['sessionOwnIndStr'][7] == 'Y'  || $_SESSION['sessionOwnIndStr'][7] == 'A') {
        ?>
        <?php
        //
        $sessionOwnerId = $_SESSION['sessionOwnerId'];
        //
        $omLayoutOptionTop = '24LBCTOPMARGIN';
        $omLayoutOptionLeft = '24LBCLEFTMARGIN';
        $omLayFontSize = '24LBCBLOCKFONTSIZE';
        $omLayOptBlockWidth = '24LBCBLOCKWIDTH';
        $omLayOptBlockHeight = '24LBCBLOCKHEIGHT';
        $omLayOptSlipWidth = '24LBCBLOCKSLIPWIDTH';
        $omLayOptSlipHeight = '24LBCBLOCKSLIPHEIGHT';
        $omLayoutOptionBorder = '24LBCBORDER';
        $omLayoutBCSize = '24LBCSIZE';
        $omLayoutOptionNoOfRows = '24LNOOFROWS';
        //
        $noOfRows = updateOptionValue($omLayoutOptionNoOfRows, '', 'selValue', '');
        //
        if ($noOfRows == '')
            $noOfRows = '8';
        //
        $checkBarCodeBorder = updateOptionValue($omLayoutOptionBorder, '', 'selValue', '');
        //
        if ($checkBarCodeBorder == 'YES') {
            $barCodeBorder = 'solid 1px #C7C5C8';
        } else {
            $barCodeBorder = 'solid 1px #FFFFFF';
        }
        //
        $topMargin = updateOptionValue($omLayoutOptionTop, '', 'selValue', '');
        $leftMargin = updateOptionValue($omLayoutOptionLeft, '', 'selValue', '');
        $barCodeSize = updateOptionValue($omLayoutBCSize, '', 'selValue', '');
        $blockWidth = updateOptionValue($omLayOptBlockWidth, '', 'selValue', '');
        $blockHeight = updateOptionValue($omLayOptBlockHeight, '', 'selValue', '');
        $slipWidth = updateOptionValue($omLayOptSlipWidth, '', 'selValue', '');
        $slipHeight = updateOptionValue($omLayOptSlipHeight, '', 'selValue', '');

        //CLASS VAR
        if ($barCodeSize == 'size') {
            $labelLeftMargin = '0MM';
            $labelRightMargin = '0MM';
            $labelTopMargin = '0MM';
            $labelBottomMargin = '0MM';
            $fontSize = 12;
        } else if ($barCodeSize == 'large') {
            $slipWidth = '64MM';
            $slipHeight = '33.6MM';
            $labelLeftMargin = '0MM';
            $labelRightMargin = '0MM';
            $labelTopMargin = '0MM';
            $labelBottomMargin = '0MM';
            $fontSize = 12;
        } else if ($barCodeSize == 'medium') {
            $slipWidth = '60MM';
            $slipHeight = '29.6MM';
            $labelLeftMargin = '2MM';
            $labelRightMargin = '2MM';
            $labelTopMargin = '2MM';
            $labelBottomMargin = '2MM';
            $fontSize = 12;
        } else if ($barCodeSize == 'small') {
            $slipWidth = '56MM';
            $slipHeight = '25.6MM';
            $labelLeftMargin = '4MM';
            $labelRightMargin = '4MM';
            $labelTopMargin = '4MM';
            $labelBottomMargin = '4MM';
            $fontSize = 9;
        }
        //
        $fontSize = updateOptionValue($omLayFontSize, '', 'selValue', '');
        //
        if ($barCodeSize == 'large' || $barCodeSize == 'size') {
            $deleteLeftMargin = $slipWidth - 2;
            $deleteTopMargin = $slipHeight + 3.4;
        } else if ($barCodeSize == 'medium') {
            $deleteLeftMargin = $slipWidth - 0.3;
            $deleteTopMargin = $slipHeight + 5;
        } else if ($barCodeSize == 'small') {
            $deleteLeftMargin = $slipWidth + 2.5;
            $deleteTopMargin = $slipHeight + 7;
        }
        //
        ?>
        <style type="text/css">
            #headerItemBarCode{
                margin: 0px 0px 0px 0px;
                padding: 0px 0px 0px 0px;
                width: 210mm;
                height: 297mm;
                border: <?php echo $barCodeBorder; ?>;
                background: #ffffff;
            }
            
            .table24L{
                margin-top: <?php echo $topMargin; ?>; 
                margin-left: <?php echo $leftMargin; ?>;
                margin-right: 1.5mm;
                border: none;
            }

            .block24L{
                width: <?php echo $blockWidth; ?>;
                height: <?php echo $blockHeight; ?>;
                border: none;
            }
            
            .block24LDiv{
                width: <?php echo $slipWidth; ?>;
                height: <?php echo $slipHeight; ?>;
                margin-left: <?php echo $labelLeftMargin; ?>;
                margin-right: <?php echo $labelRightMargin; ?>;
                margin-top: <?php echo $labelTopMargin; ?>; 
                margin-bottom: <?php echo $labelBottomMargin; ?>; 
                border: <?php echo $barCodeBorder; ?>;
                cursor: move;
            }
            
            .block24LText14{
                font-family: Calibri; 
                font-size: <?php echo $fontSize + 1; ?>px;
            }
            
            .block24LText12{
                font-family: Calibri; 
                font-size: <?php echo $fontSize + 0; ?>px;
            }
            
            .block24LText11{
                font-weight:normal;
                font-family: Calibri;
                font-size: 11px;
            }
            
            .block24LText10{
                font-weight:normal;
                font-family: Calibri;
                font-size: <?php echo $fontSize - 2; ?>px;
            }
            
            .marginLeftBarCode24L{
                margin-left: <?php echo $deleteLeftMargin; ?>mm;
                margin-top: -<?php echo $deleteTopMargin; ?>mm;
                position: absolute;
            }

            body {
                margin: 0px 0px 0px 0px;
                padding: 0px 0px 0px 0px;
                text-align:center;
            }
            
            @media print {
                .noPrint {
                    display:none;
                }
                
                #headerItemBarCode{
                    margin: 0px 0px 0px 0px;
                    padding: 0px 0px 0px 0px;
                    width: 210mm;
                    height: 297mm;
                    border: <?php echo $barCodeBorder; ?>;
                    background: #ffffff;
                }
                
                .table24L{
                    margin-top: <?php echo $topMargin; ?>; 
                    margin-left: <?php echo $leftMargin; ?>;
                    margin-right: 1.5mm;
                    border: none;
                }

                .block24L{
                    width: <?php echo $blockWidth; ?>;
                    height: <?php echo $blockHeight; ?>;
                    border: none;
                }
                
                .block24LDiv{

                    width: <?php echo $slipWidth; ?>;
                    height: <?php echo $slipHeight; ?>;
                    margin-left: <?php echo $labelLeftMargin; ?>;
                    margin-right: <?php echo $labelRightMargin; ?>;
                    margin-top: <?php echo $labelTopMargin; ?>; 
                    margin-bottom: <?php echo $labelBottomMargin; ?>; 
                    border: <?php echo $barCodeBorder; ?>;
                    cursor: move;
                }
                
                .block24LText14{
                    font-family: Calibri; 
                    font-size: <?php echo $fontSize + 1; ?>px;
                }
                
                .block24LText12{
                    font-family: Calibri; 
                    font-size: <?php echo $fontSize + 0; ?>px;
                }
                
                .block24LText11{
                    font-weight:bold;
                    font-family:Arial,helvetica,sans-serif; 
                    font-size: 11px;
                }
                
                .block24LText10{
                    font-weight:bold;
                    font-family: Calibri; 
                    font-size: <?php echo $fontSize - 2; ?>px;
                }
                
                .marginLeftBarCode24L{
                    margin-left: <?php echo $deleteLeftMargin; ?>mm;
                    margin-top: -<?php echo $deleteTopMargin; ?>mm;
                    position: absolute;
                }

                .paddingRight5{
                    padding-right: 5px;    
                }
                
                .paddingRight7{
                    padding-right: 7px;    
                }
                
                .paddingTop1{
                    padding-top: 1px;    
                }
            }
        </style>
        <div id="girviBarCodeDiv">
            <div id="headerItemBarCode">
                <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" class="table24L" width="100%">
                    <?php
                    $barcodePerPage = $noOfRows * 3;
                    $checkNextBarcode = $barcodePerPage * 2;
                    $pageNum = 1;
                    
                    if (isset($_GET['page'])) {
                        $pageNum = $_GET['page'];
                    }
                    
                    $perOffset = ($pageNum - 1) * $barcodePerPage;

                    $qSelQuery = "SELECT * FROM barcode_printpanel WHERE bcpp_girviid IS NULL ORDER BY bcpp_id DESC LIMIT $perOffset,$checkNextBarcode";
                    $resQuery = mysqli_query($conn,$qSelQuery);
                    $totalGirviBarCode = mysqli_num_rows($resQuery);

                    $qSelQuery = "SELECT * FROM barcode_printpanel WHERE bcpp_girviid IS NULL ORDER BY bcpp_id DESC LIMIT $perOffset,$barcodePerPage";                     
                    $resQuery = mysqli_query($conn,$qSelQuery) or die("Error: " . mysqli_error($conn) . " with query " . $qSelQuery);
                    $totalNextGirviBarCode = mysqli_num_rows($resQuery); 

                    $counter = 1;
                    ?>
                    <tr>
                        <td valign="top" align="left">
                            <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top">
                                <?php for ($row = 1; $row <= $noOfRows; $row++) { ?>
                                    <tr>
                                        <?php for ($col = 1; $col <= 3; $col++) { ?>
                                            <td valign="top" align="left" class="block24L" height="100%">
                                                <div id="barcode-box-panel<?php echo $counter; ?>" class="block24LDiv"
                                                     ondblclick="moveBarCodeSlip('barcode-box-panel<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>')" 
                                                     title="Please Double click to move the slip!">
                                                         <?php
                                                         $divPrinted = FALSE;
                                                         if ($rowQuery = mysqli_fetch_array($resQuery, MYSQLI_ASSOC)) {
                                                             $bcppId = $rowQuery['bcpp_id'];
                                                             $custId = $rowQuery['bcpp_custid'];
                                                             $divPrinted = TRUE;
                                                             ?>

                                                        <?php include 'omStickerPrintPaneldv.php'; ?>
                                                    <?php } ?>
                                                </div> 
                                                <div id="barCodeCloseDiv<?php echo $counter; ?>" style="cursor: pointer;" class="marginLeftBarCode24L noPrint"
                                                     onclick="closeBarCodeSlip('barcode-box-panel<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>', '<?php echo $bcppId; ?>')">
                                                         <?php if ($divPrinted == TRUE) { ?>
                                                        <img src="<?php echo $documentRoot; ?>/images/img/cancel.png" style="height:14px;" alt="Close" class="noPrint paddingTop2" />
                                                    <?php } else { ?>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <?php } ?> 
                                                </div>
                                            </td>
                                            <?php $counter++; ?>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </table>
                        </td>
                    </tr>
                </table>
            </div> 

            <?php
            if ($totalNextGirviBarCode > 0) {
                ?>
                <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" class="marginTop7" style="margin:12px auto;">
                    <tr>
                        <?php
                        if ($pageNum > 1) {
                            ?>
                            <td align="right">
                                <form name="prev_barcode" id="prev_barcode"
                                      action="javascript:navigationToNextBarcodePanel(<?php echo "$pageNum - 1"; ?>,'GirviBCPaging');"
                                      method="get"><input type="submit" value="Prev Barcodes" class="frm-btn"
                                                    maxlength="30" size="15" style="background: #dceaff;color: #0a0c87;border: 1px solid #5f9df5;border-radius: 6px !important;padding: 2px 10px;font-size:16px;font-weight:600;"/></form>
                            </td>
                            <?php
                        }
                        ?>
                        <?php
                        if ($totalGirviBarCode > $barcodePerPage) {
                            ?>
                            <td align="right" width="110px">
                                <form name="next_Barcodes" id="next_Barcodes"
                                      action="javascript:navigationToNextBarcodePanel(<?php echo "$pageNum + 1"; ?>,'GirviBCPaging');"
                                      method="get"><input type="submit" value="Next Barcodes" class="frm-btn"
                                                    maxlength="30" size="15" style="background: #dceaff;color: #0a0c87;border: 1px solid #5f9df5;border-radius: 6px !important;padding: 2px 10px;font-size:16px;font-weight:600;"/></form>
                            </td>
                            <?php
                        }
                        ?>
                    </tr>
                </table>
          
            <?php } ?>
        </div>
        <table border="0" cellspacing="5" cellpadding="5" class="noPrint" width="100%">
            <td align="center" class="noPrint" colspan="10" align="center">
                    <div id="a4SheetsPrintButtonDiv" >
                        <a style="cursor: pointer;" 
                           onclick="printBarCodeA4Sheet('barCodePrintPanelPrintDiv')">
                            <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print'
                                 width="32px" height="32px" /> 
                        </a> 
                    </div>
                </td>
            </table>
    <?php } ?>
</div>
