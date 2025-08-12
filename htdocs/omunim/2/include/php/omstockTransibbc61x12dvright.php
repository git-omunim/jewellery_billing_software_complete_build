<?php
/*
 * **************************************************************************************
 * @tutorial: Item Bar Code Print Panel Div
 * **************************************************************************************
 * 
 * Created on Feb 12, 2015 11:57:35 PM
 *
 * @FileName: omstockTransibbc61x12dvright.php
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
?>
<!-- ********Start code for 61L barcode panel @Author:SHRI9FEB15************* -->
<?php
/* * ******Start code to add panel indiacator @Author:PRIYA16MAY14************ */
if ($_SESSION['sessionOwnIndStr'][7] == 'Y'  || $_SESSION['sessionOwnIndStr'][7] == 'A') {
    $tags = $_GET['tags']; //var changed @Author:PRIYA07APR15
    if ($tags != 'true') {
        ?>
        <table border="0" cellpadding="2" cellspacing="2" align="center" valign="top" class="noPrint">
            <tr>
                <td align='center'>1</td>
                <td align='center'>2</td>
                <td align='center'>3</td>
                <td align='center'>4</td>
                <td align='center'>5</td>
                <td align='center'>6</td>
                <td align='center'>7</td>
                <td align='center'>8</td>
                <td align='center'>9</td>

            </tr>
            <?php
            $valuePresentInTable = updateOptionValue('loanBcOption1', 'sno', 'selValue', '', '');
            if ($valuePresentInTable == '') {
                $valuePresentInTable = updateOptionValue('loanBcOption1', 'sno', 'selValue', 'barCode', '');
                updateOptionValue('loanBcOption1', 'sno', 'selValue', 'barCode', '');
                updateOptionValue('loanBcOption2', 'barCodeText', 'selValue', 'barCode', '');
                updateOptionValue('loanBcOption3', 'firm', 'selValue', 'barCode', '');
                updateOptionValue('loanBcOption4', 'grosswt', 'selValue', 'barCode', '');
                updateOptionValue('loanBcOption5', 'netwt', 'selValue', 'barCode', '');
                updateOptionValue('loanBcOption6', 'itemName', 'selValue', 'barCode', '');
                updateOptionValue('loanBcOption7', 'crystalWT', 'selValue', 'barCode', '');
                updateOptionValue('loanBcOption8', 'crystalVal', 'selValue', 'barCode', '');
                updateOptionValue('loanBcOption9', 'makingChargs', 'selValue', 'barCode', '');
            }

            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption1'"));
            call61LLBCFunc('loanBcOption1', $omin_value);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption2'"));
            call61LLBCFunc('loanBcOption2', $omin_value);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption3'"));
            call61LLBCFunc('loanBcOption3', $omin_value);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption4'"));
            call61LLBCFunc('loanBcOption4', $omin_value);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption5'"));
            call61LLBCFunc('loanBcOption5', $omin_value);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption6'"));
            call61LLBCFunc('loanBcOption6', $omin_value);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption7'"));
            call61LLBCFunc('loanBcOption7', $omin_value);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption8'"));
            call61LLBCFunc('loanBcOption8', $omin_value);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption9'"));
            call61LLBCFunc('loanBcOption9', $omin_value);
            ?>
        </table>
    <?php } ?>
    <?php
    $sessionOwnerId = $_SESSION[sessionOwnerId];
//OPTION ID
    $omLayoutOptionTop = '61LBCTOPMARGIN';
    $omLayoutOptionLeft = '61LBCLEFTMARGIN';
    $omLayFontSize = '61LBCBLOCKFONTSIZE';
    $omLayOptBlockWidth = '61LBCBLOCKWIDTH';
    $omLayOptBlockHeight = '61LBCBLOCKHEIGHT';
    $omLayOptSlipWidth = '61LBCBLOCKSLIPWIDTH';
    $omLayOptSlipHeight = '61LBCBLOCKSLIPHEIGHT';
    $omLayoutOptionBorder = '61LBCBORDER';
    $omLayoutBCSize = '61LBCSIZE';
    $omLayoutOptionNoOfRows = '61LNOOFROWS';
    $omLayOptTailLength = '61X12BCBLOCKTAILLENGTH';

//SELECT OPTION VALUE
    $noOfRows = updateOptionValue($omLayoutOptionNoOfRows, '', 'selValue', '', '');
    if ($noOfRows == '')
        $noOfRows = '12';
    $checkBarCodeBorder = updateOptionValue($omLayoutOptionBorder, '', 'selValue', '', '');
    if ($checkBarCodeBorder == 'YES') {
        $barCodeBorder = 'solid 1px #000;';
    } else {
        $barCodeBorder = 'solid 1px #FFFFFF';
    }
    $topMargin = updateOptionValue($omLayoutOptionTop, '', 'selValue', '', '');
    $leftMargin = updateOptionValue($omLayoutOptionLeft, '', 'selValue', '', '');
//    $barCodeSize = updateOptionValue($omLayoutBCSize, '', 'selValue', '');
    $blockWidth = updateOptionValue($omLayOptBlockWidth, '', 'selValue', '', '');
    $blockHeight = updateOptionValue($omLayOptBlockHeight, '', 'selValue', '', '');
    $slipWidth = updateOptionValue($omLayOptSlipWidth, '', 'selValue', '', '');
    $slipHeight = updateOptionValue($omLayOptSlipHeight, '', 'selValue', '', '');
    $tailLength = updateOptionValue($omLayOptTailLength, '', 'selValue', '', '');
//CLASS VAR
    $fontSize = updateOptionValue($omLayFontSize, '', 'selValue', '', '');

    if ($barCodeSize == 'large' || $barCodeSize == 'size') {
        $deleteLeftMargin = $slipWidth - 2.5;
        $deleteTopMargin = $slipHeight + 1.2;
    } else if ($barCodeSize == 'medium') {
        $deleteLeftMargin = $slipWidth - 0.3;
        $deleteTopMargin = $slipHeight + 3.6;
    } else if ($barCodeSize == 'small') {
        $deleteLeftMargin = $slipWidth + 2.5;
        $deleteTopMargin = $slipHeight + 5.6;
    }
    include 'ombcclass.php';
    ?>
    <div id="barCode61RDiv">
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

        $barcodePerPage = 24;
        $checkNextBarcode = $barcodePerPage * 2;
        $pageNum = 1;
        if (isset($_GET['page'])) {
            $pageNum = $_GET['page'];
        }
        $perOffset = ($pageNum - 1) * $barcodePerPage;
        $qSelInItemBarCode = "SELECT * FROM stock_transaction where sttr_gs_weight!='0' and sttr_indicator !='stockCrystal' and sttr_firm_id IN ($strFrmId) order by sttr_id desc LIMIT $perOffset,$checkNextBarcode";
        $resInItemBarCode = mysqli_query($conn, $qSelInItemBarCode);
        $totalItemBarCode = mysqli_num_rows($resInItemBarCode);

        $qSelInItemBarCode = "SELECT * FROM stock_transaction where sttr_gs_weight!='0' and sttr_indicator !='stockCrystal' and sttr_transaction_type!='sell' and sttr_firm_id IN ($strFrmId) order by sttr_id desc LIMIT  $perOffset,$barcodePerPage";
//            echo $qSelInItemBarCode;
        $resInItemBarCode = mysqli_query($conn, $qSelInItemBarCode);
        $totalNextItemBarCode = mysqli_num_rows($resInItemBarCode);
        $counter = 1;
        ?>
        <div>
            <div style="width: <?php echo $blockWidth; ?>;height: <?php echo $blockHeight; ?>; margin-top: 10px;border:<?php echo $barCodeBorder; ?>;" class="block61LDiv" >
                <div style="margin-top: <?php echo $topMargin; ?>;margin-left: <?php echo $leftMargin; ?>;margin-right: <?php echo $leftMargin; ?>;margin-bottom: <?php // echo $topMargin;   ?>;border: none;" >

                    <?php
//                    $moreThanOneLabel = 0;
                    $margin_top_left12 = 6.1;
                    $margin_top_right12 = 0;
                    $margin_top_left2 = 10;
                    $margin_top_right2 = 4;
                    $margin_left_for_left2 = $tailLength - 33;
                    $margin_left_for_left2 = 36 - $margin_left_for_left2;
                    for ($row = 1; $row <= $noOfRows; $row++) {
                        if ($row == 1) {
                            ?>
                            <?php
                            $cryWT = 0;
                            $cryValuation = 0;
                            $divPrinted = FALSE;
                            if ($rowInItemBarCode = mysqli_fetch_array($resInItemBarCode, MYSQLI_ASSOC)) {
                                $bcId = $rowInItemBarCode['sttr_id'];
                                $bcFirmId = $rowInItemBarCode['sttr_firm_id'];
                                $bcItemId = $rowInItemBarCode['sttr_item_id'];
                                $bcItemPreId = trim($rowInItemBarCode['sttr_item_pre_id']);
                                $bcItemPostId = trim($rowInItemBarCode['sttr_item_id']);
                                $bcItemName = trim($rowInItemBarCode['sttr_item_name']);
                                $bcItemWt = trim($rowInItemBarCode['sttr_gs_weight']);
                                $bcItemWtType = trim($rowInItemBarCode['sttr_gs_weight_type']);
                                $bcItemNtWt = trim($rowInItemBarCode['sttr_nt_weight']);
                                $bcItemNtWtType = trim($rowInItemBarCode['sttr_nt_weight_type']);
                                $bcItemCrystalVal = intval($rowInItemBarCode['sttr_valuation']);
//                                $bcItemCryNtWt = trim($rowInItemBarCode['itbc_cry_net_wt']);
//                                $bcItemCryNtWtType = trim($rowInItemBarCode['itbc_cry_net_wt_tp']);
                                $bcItemMkChrg = trim($rowInItemBarCode['sttr_making_charges']);
                                $bcItemMkChrgType = trim($rowInItemBarCode['sttr_making_charges_type']);
                                $valaddamt = trim($rowInItemBarCode['sttr_value_added']);
                                $valadd = trim($rowInItemBarCode['sttr_cust_wastage']);
                                $valaddwt = trim($rowInItemBarCode['sttr_cust_wastage_wt']);
                                $bcItemCryNtWt = trim($rowInItemBarCode['sttr_stone_wt']);
                                $bcItemCryNtWtType = trim($rowInItemBarCode['sttr_stone_wt_type']);

                                $bismark = trim($rowInItemBarCode['sttr_bis_mark']);
                                $divPrinted = TRUE;
                                $qSelPerFirm = "SELECT firm_name,firm_long_name FROM firm 
                                                     where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$bcFirmId'";
                                $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                                $rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC);
                                $firmNameLabel = $rowPerFirm['firm_name'];

                                $tunch = $rowInItemBarCode['sttr_purity'];

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


                                parse_str(getTableValues("SELECT itm_tunch_bctext FROM item_tunch WHERE itm_tunch_value = '$tunch'"));

                                if ($itm_tunch_bctext != '' && $itm_tunch_bctext != NULL) {
                                    $tunch = $itm_tunch_bctext;
                                } else {
                                    $tunch = $tunch . '%';
                                }
                                $metal = $rowInItemBarCode['sttr_metal_type'];
                                $qSelBarcodeColor = "SELECT itm_tunch_bccolor,itm_tunch_bctext FROM item_tunch where itm_tunch_own_id='$_SESSION[sessionOwnerId]' and itm_tunch_value='$tunch' and itm_tunch_metal_type='$metal'";

                                $resBarcodeColor = mysqli_query($conn, $qSelBarcodeColor);
                                $rowBarcodeColor = mysqli_fetch_array($resBarcodeColor, MYSQLI_ASSOC);
                                $color = $rowBarcodeColor['itm_tunch_bccolor'];
                                $barCodeText = $rowBarcodeColor['itm_tunch_bctext'];
                                if ($barCodeSize == 'large') {
                                    $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 18));
                                    $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 12)));
                                    $barCodeText = om_strtoupper(substr($barCodeText, 0, 16));
                                    $barCodeHeight = '6px';
                                    $bisHeight = '';
                                } else if ($barCodeSize == 'medium') {
                                    $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 11));
                                    $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 11)));
                                    $barCodeText = om_strtoupper(substr($barCodeText, 0, 5));
                                    $barCodeHeight = '6px';
                                    $bisHeight = '9px';
                                    if (strlen($bcItemWt) >= 8) {
                                        $bcItemWtType = om_strtoupper(substr($bcItemWtType, 0, 1));
                                        $bcItemNtWtType = om_strtoupper(substr($bcItemNtWtType, 0, 1));
                                    }
                                } else if ($barCodeSize == 'small') {
                                    $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 10));
                                    $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 10)));
                                    $barCodeText = om_strtoupper(substr($barCodeText, 0, 3));
                                    $barCodeHeight = '6px';
                                    $bisHeight = '9px';
                                    if (strlen($bcItemWt) >= 8) {
                                        $bcItemWtType = '';
                                        $bcItemNtWtType = om_strtoupper(substr($bcItemNtWtType, 0, 1));
                                    }
                                    if (strlen($bcItemMkChrg) >= 4 && $bcItemCrystalVal != NULL && $bcItemCryNtWt != NULL) {
                                        $bcItemMkChrgType = '';
                                    }
                                }
                                if ($color == '') {
                                    $color = 'white';
                                }
                                $counter;
                                //echo 'Left:' . $slipWidth;
                                //if ($startFromRight == 'Y') {
                                ?>
                                <div style="background-color:#D8D8D8;width:<?php echo $tailLength; ?>;height: 2mm;margin-left: <?php echo $margin_left_for_left2; ?>mm;position: absolute;margin-top: <?php echo $margin_top_right2; ?>mm;border-top-left-radius: 6px;border-bottom-left-radius: 6px;border: <?php echo $barCodeBorder; ?>;" align="right">

                                </div>

                                <div style="background-color:#D8D8D8;width:<?php echo $slipWidth; ?>;margin-top: <?php echo $margin_top_right12; ?>mm;margin-left:<?php echo $slipWidth; ?>;height: <?php echo $slipHeight; ?>;position: absolute;border-radius: 4px;border: <?php echo $barCodeBorder; ?>;"  align="right">
                                    <div id="block65LDiv<?php echo $counter; ?>" 
                                         ondblclick="moveBarCodeSlip65L('block65LDiv<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>')" 
                                         title="Please Double click to move the slip!">
                                        <table width="100%" style="table-layout: fixed"><tr><td width="50%"><div class="borderRightDotted" style="height: <?php echo $slipHeight; ?>">
                                                        <?php if ($bismark != 'NULL' && $bismark != '' && $bismark != 'FALSE') { ?> 
                                                            <div class="floatRight padBottom0 marginBottom0 marTopMin1 paddingRight5">
                                                                <img src="<?php echo $documentRoot; ?>/images/BIS18x12.png" alt=""  height="<?php echo $bisHeight; ?>"/>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="block84LText10 paddingLeft2 padBottom0 marginBottom0 marTopMin2">
                                                            <?php
                                                            $sno = $bcItemPreId . '' . $bcItemPostId;
                                                            if ($bcItemWt != '' || $bcItemWt != NULL) {
                                                                $gswt = 'G&dash;' . $bcItemWt . ' ' . $bcItemWtType;
                                                            }
                                                            if ($bcItemNtWt != '' || $bcItemNtWt != NULL) {
                                                                $ntwt = 'N&dash;' . $bcItemNtWt . ' ' . $bcItemNtWtType;
                                                            }
                                                            if ($bcItemCryNtWt != '' || $bcItemCryNtWt != NULL) {
                                                                $cryWT = 'CW&dash;' . $bcItemCryNtWt . '&nbsp;' . $bcItemCryNtWtType;
                                                            }
                                                            if ($cryValuation != '' || $cryValuation != NULL) {
                                                                $cryVal = 'CV&dash;' . $cryValuation . '&nbsp;';
                                                            }
                                                            if ($bcItemMkChrg != '' || $bcItemMkChrg != NULL) {
                                                                $mkgChrgs = 'M&dash;' . $bcItemMkChrg . ' ' . $bcItemMkChrgType;
                                                            }

                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption1'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>

                                                        </div>
                                                        <div class="block84LText9 paddingLeft2">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption2'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption3'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>


                                                        <div class="floatLeft block84LText10 marTopMin3">
                                                            <div class="paddingLeft2 floatLeft">
                                                                <?php
                                                                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption4'"));
                                                                callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="floatLeft block84LText10 marTopMin3">
                                                            <div class="paddingLeft2 floatLeft">
                                                                <?php
                                                                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption5'"));
                                                                callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td><td width="50%"><div class="block84LText10 paddingLeft2 marTopMin3">
                                                        <?php
                                                        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption6'"));
                                                        callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                        ?>
                                                    </div>
                                                    <div class="floatLeft block84LText9  marTopMin3">
                                                        <div class="floatLeft paddingLeft2">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption7'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>
                                                        <div class="floatLeft paddingLeft2" style="margin-top:-4px;">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption8'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>
                                                        <div class="floatLeft paddingLeft2" style="margin-top:-5px;">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption9'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="block84LText6 floatLeft paddingLeft2 paddingRight2" >
                                                        <img style="width: 52px;height: 8px;" src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=61L&bar_id=1<?php echo $bcItemId; ?>"
                                                             alt="Barcode" height="<?php echo $barCodeHeight; ?>"/>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            <?php }
                            //} 
                            ?> 
                            <?php //if ($startFromRight == 'Y') { ?>
                            <div id="barCodeCloseDiv<?php echo $counter; ?>" style="cursor: pointer; margin-top: <?php echo $margin_top_right12 - 2; ?>mm;" class="deleteButtonRight noPrint"
                                 onclick="deleteItemBarCode61L('block65LDiv<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>', '<?php echo $bcId; ?>', '<?php echo $bcItemPreId; ?>', '<?php echo $bcItemPostId; ?> ')">
                                     <?php if ($divPrinted == TRUE) { ?>
                                    <img src="<?php echo $documentRoot; ?>/images/delete16.png" alt="" class="noPrint"  />
                                <?php } else { ?>
                                    &nbsp;
                                <?php } ?> 
                            </div>
                            <?php //} ?>
                            <?php
                            $cryWT = 0;
                            $cryValuation = 0;
                            $divPrinted = FALSE;
                            if ($rowInItemBarCode = mysqli_fetch_array($resInItemBarCode, MYSQLI_ASSOC)) {
                                $bcId = $rowInItemBarCode['sttr_id'];
                                $bcFirmId = $rowInItemBarCode['sttr_firm_id'];
                                $bcItemId = $rowInItemBarCode['sttr_item_id'];
                                $bcItemPreId = trim($rowInItemBarCode['sttr_item_pre_id']);
                                $bcItemPostId = trim($rowInItemBarCode['sttr_item_id']);
                                $bcItemName = trim($rowInItemBarCode['sttr_item_name']);
                                $bcItemWt = trim($rowInItemBarCode['sttr_gs_weight']);
                                $bcItemWtType = trim($rowInItemBarCode['sttr_gs_weight_type']);
                                $bcItemNtWt = trim($rowInItemBarCode['sttr_nt_weight']);
                                $bcItemNtWtType = trim($rowInItemBarCode['sttr_nt_weight_type']);
                                $bcItemCrystalVal = intval($rowInItemBarCode['sttr_valuation']);
//                                $bcItemCryNtWt = trim($rowInItemBarCode['itbc_cry_net_wt']);
//                                $bcItemCryNtWtType = trim($rowInItemBarCode['itbc_cry_net_wt_tp']);
                                $bcItemMkChrg = trim($rowInItemBarCode['sttr_making_charges']);
                                $bcItemMkChrgType = trim($rowInItemBarCode['sttr_making_charges_type']);
                                $valaddamt = trim($rowInItemBarCode['sttr_value_added']);
                                $valadd = trim($rowInItemBarCode['sttr_cust_wastage']);
                                $valaddwt = trim($rowInItemBarCode['sttr_cust_wastage_wt']);
                                $bcItemCryNtWt = trim($rowInItemBarCode['sttr_stone_wt']);
                                $bcItemCryNtWtType = trim($rowInItemBarCode['sttr_stone_wt_type']);

                                $bismark = trim($rowInItemBarCode['sttr_bis_mark']);
                                $divPrinted = TRUE;
                                $qSelPerFirm = "SELECT firm_name,firm_long_name FROM firm 
                                                     where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$bcFirmId'";
                                $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                                $rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC);
                                $firmNameLabel = $rowPerFirm['firm_name'];

                                $tunch = $rowInItemBarCode['sttr_purity'];

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

                                parse_str(getTableValues("SELECT itm_tunch_bctext FROM item_tunch WHERE itm_tunch_value = '$tunch'"));

                                if ($itm_tunch_bctext != '' && $itm_tunch_bctext != NULL) {
                                    $tunch = $itm_tunch_bctext;
                                } else {
                                    $tunch = $tunch . '%';
                                }

                                $metal = $rowInItemBarCode['sttr_metal_type'];
                                $qSelBarcodeColor = "SELECT itm_tunch_bccolor,itm_tunch_bctext FROM item_tunch where itm_tunch_own_id='$_SESSION[sessionOwnerId]' and itm_tunch_value='$tunch' and itm_tunch_metal_type='$metal'";
                                $resBarcodeColor = mysqli_query($conn, $qSelBarcodeColor);
                                $rowBarcodeColor = mysqli_fetch_array($resBarcodeColor, MYSQLI_ASSOC);
                                $color = $rowBarcodeColor['itm_tunch_bccolor'];
                                $barCodeText = $rowBarcodeColor['itm_tunch_bctext'];
                                if ($barCodeSize == 'large') {
                                    $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 18));
                                    $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 12)));
                                    $barCodeText = om_strtoupper(substr($barCodeText, 0, 16));
                                    $barCodeHeight = '6px';
                                    $bisHeight = '';
                                } else if ($barCodeSize == 'medium') {
                                    $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 11));
                                    $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 11)));
                                    $barCodeText = om_strtoupper(substr($barCodeText, 0, 5));
                                    $barCodeHeight = '6px';
                                    $bisHeight = '9px';
                                    if (strlen($bcItemWt) >= 8) {
                                        $bcItemWtType = om_strtoupper(substr($bcItemWtType, 0, 1));
                                        $bcItemNtWtType = om_strtoupper(substr($bcItemNtWtType, 0, 1));
                                    }
                                } else if ($barCodeSize == 'small') {
                                    $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 10));
                                    $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 10)));
                                    $barCodeText = om_strtoupper(substr($barCodeText, 0, 3));
                                    $barCodeHeight = '6px';
                                    $bisHeight = '9px';
                                    if (strlen($bcItemWt) >= 8) {
                                        $bcItemWtType = '';
                                        $bcItemNtWtType = om_strtoupper(substr($bcItemNtWtType, 0, 1));
                                    }
                                    if (strlen($bcItemMkChrg) >= 4 && $bcItemCrystalVal != NULL && $bcItemCryNtWt != NULL) {
                                        $bcItemMkChrgType = '';
                                    }
                                }
                                if ($color == '') {
                                    $color = 'white';
                                }
                                $counter++;
                                ?> 


                                <div style="background-color:#D8D8D8;width:<?php echo $slipWidth; ?>;margin-top: <?php echo $margin_top_left12; ?>mm;height:<?php echo $slipHeight; ?>;position: absolute;border-radius: 4px;border: <?php echo $barCodeBorder; ?>;" align="left">
                                    <div id="block65LDiv<?php echo $counter; ?>" 
                                         ondblclick="moveBarCodeSlip65L('block65LDiv<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>')" 
                                         title="Please Double click to move the slip!">
                                        <table width="100%" style="table-layout: fixed"><tr><td width="50%"><div class="borderRightDotted" style="height: <?php echo $slipHeight; ?>">
                                                        <?php if ($bismark != 'NULL' && $bismark != '' && $metal == 'Gold') { ?> 
                                                            <div class="floatRight padBottom0 marginBottom0 marTopMin1 paddingRight5">
                                                                <img src="<?php echo $documentRoot; ?>/images/BIS18x12.png" alt=""  height="<?php echo $bisHeight; ?>"/>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="block84LText10 paddingLeft2 padBottom0 marginBottom0 marTopMin2">
                                                            <?php
                                                            $sno = $bcItemPreId . '' . $bcItemPostId;
                                                            if ($bcItemWt != '' || $bcItemWt != NULL) {
                                                                $gswt = 'G&dash;' . $bcItemWt . ' ' . $bcItemWtType;
                                                            }
                                                            if ($bcItemNtWt != '' || $bcItemNtWt != NULL) {
                                                                $ntwt = 'N&dash;' . $bcItemNtWt . ' ' . $bcItemNtWtType;
                                                            }
                                                            if ($bcItemCryNtWt != '' || $bcItemCryNtWt != NULL) {
                                                                $cryWT = 'CW&dash;' . $bcItemCryNtWt . '&nbsp;' . $bcItemCryNtWtType;
                                                            }
                                                            if ($cryValuation != '' || $cryValuation != NULL) {
                                                                $cryVal = 'CV&dash;' . $cryValuation . '&nbsp;';
                                                            }
                                                            if ($bcItemMkChrg != '' || $bcItemMkChrg != NULL) {
                                                                $mkgChrgs = 'M&dash;' . $bcItemMkChrg . ' ' . $bcItemMkChrgType;
                                                            }

                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption1'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>

                                                        </div>



                                                        <div class="block84LText9 paddingLeft2">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption2'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption3'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>


                                                        <div class="floatLeft block84LText10 marTopMin3">
                                                            <div class="paddingLeft2 floatLeft">
                                                                <?php
                                                                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption4'"));
                                                                callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="floatLeft block84LText10 marTopMin3">
                                                            <div class="paddingLeft2 floatLeft">
                                                                <?php
                                                                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption5'"));
                                                                callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td><td width="50%"><div class="block84LText10 paddingLeft2 marTopMin3">
                                                        <?php
                                                        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption6'"));
                                                        callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                        ?>
                                                    </div>
                                                    <div class="floatLeft block84LText9  marTopMin3">
                                                        <div class="floatLeft paddingLeft2">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption7'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>
                                                        <div class="floatLeft paddingLeft2" style="margin-top:-4px;">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption8'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>
                                                        <div class="floatLeft paddingLeft2" style="margin-top:-5px;">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption9'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="block84LText6 floatLeft paddingLeft2 paddingRight2">
                                                        <img style="width: 52px;height: 8px;" src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=61L&bar_id=1<?php echo $bcItemId; ?>"
                                                             alt="Barcode" height="<?php echo $barCodeHeight; ?>"/>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table></div>
                                </div>
                                <div style="background-color:#D8D8D8;margin-top: <?php echo $margin_top_left2; ?>mm;margin-left: <?php echo $slipWidth; ?>;width:<?php echo $tailLength; ?>;height: 2mm;position: absolute;border-top-right-radius: 6px;border-bottom-right-radius: 6px;border: <?php echo $barCodeBorder; ?>;" align="left"></div>
                            <?php } ?> 

                            <div id="barCodeCloseDiv<?php echo $counter; ?>" style="cursor: pointer;margin-top: <?php echo $margin_top_left12 - 2; ?>mm;" class="deleteButtonLeft noPrint"
                                 onclick="deleteItemBarCode61L('block65LDiv<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>', '<?php echo $bcId; ?>', '<?php echo $bcItemPreId; ?>', '<?php echo $bcItemPostId; ?> ')">
                                     <?php if ($divPrinted == TRUE) { ?>
                                    <img src="<?php echo $documentRoot; ?>/images/delete16.png" alt="" class="noPrint"  />
                                <?php } else { ?>
                                    &nbsp;
                                <?php } ?> 
                            </div>

                            <?php
                        } else {
//                            if ($moreThanOneLabel > 0) {
                            $margin_top_left12+=12;
                            $margin_top_right12+=12;
                            $margin_top_left2+=12;
                            $margin_top_right2+=12;
//                            }
//                            $moreThanOneLabel++;
                            ?>
                            <div style="background-color:#D8D8D8;width:<?php echo $tailLength; ?>;height: 2mm;margin-left: <?php echo $margin_left_for_left2; ?>mm;position: absolute;margin-top: <?php echo $margin_top_right2; ?>mm;border-top-left-radius: 6px;border-bottom-left-radius: 6px;border: <?php echo $barCodeBorder; ?>;" align="right"></div>
                            <div style="background-color:#D8D8D8;width:<?php echo $slipWidth; ?>;margin-top: <?php echo $margin_top_right12; ?>mm;margin-left:<?php echo $slipWidth; ?>;height: <?php echo $slipHeight; ?>;position: absolute;border-radius: 4px;border: <?php echo $barCodeBorder; ?>;" align="right">
                                <?php
                                $cryWT = 0;
                                $cryValuation = 0;
                                $divPrinted = FALSE;
                                if ($rowInItemBarCode = mysqli_fetch_array($resInItemBarCode, MYSQLI_ASSOC)) {
                                    $bcId = $rowInItemBarCode['sttr_id'];
                                    $bcFirmId = $rowInItemBarCode['sttr_firm_id'];
                                    $bcItemId = $rowInItemBarCode['sttr_item_id'];
                                    $bcItemPreId = trim($rowInItemBarCode['sttr_item_pre_id']);
                                    $bcItemPostId = trim($rowInItemBarCode['sttr_item_id']);
                                    $bcItemName = trim($rowInItemBarCode['sttr_item_name']);
                                    $bcItemWt = trim($rowInItemBarCode['sttr_gs_weight']);
                                    $bcItemWtType = trim($rowInItemBarCode['sttr_gs_weight_type']);
                                    $bcItemNtWt = trim($rowInItemBarCode['sttr_nt_weight']);
                                    $bcItemNtWtType = trim($rowInItemBarCode['sttr_nt_weight_type']);
                                    $bcItemCrystalVal = intval($rowInItemBarCode['sttr_valuation']);
//                                  $bcItemCryNtWt = trim($rowInItemBarCode['itbc_cry_net_wt']);
//                                  $bcItemCryNtWtType = trim($rowInItemBarCode['itbc_cry_net_wt_tp']);
                                    $bcItemMkChrg = trim($rowInItemBarCode['sttr_making_charges']);
                                    $bcItemMkChrgType = trim($rowInItemBarCode['sttr_making_charges_type']);
                                    $valaddamt = trim($rowInItemBarCode['sttr_value_added']);
                                    $valadd = trim($rowInItemBarCode['sttr_cust_wastage']);
                                    $valaddwt = trim($rowInItemBarCode['sttr_cust_wastage_wt']);
                                    $bcItemCryNtWt = trim($rowInItemBarCode['sttr_stone_wt']);
                                    $bcItemCryNtWtType = trim($rowInItemBarCode['sttr_stone_wt_type']);

                                    $bismark = trim($rowInItemBarCode['sttr_bis_mark']);
                                    $divPrinted = TRUE;
                                    $qSelPerFirm = "SELECT firm_name,firm_long_name FROM firm 
                                                     where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$bcFirmId'";
                                    $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                                    $rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC);
                                    $firmNameLabel = $rowPerFirm['firm_name'];

                                    $tunch = $rowInItemBarCode['sttr_purity'];

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

                                    parse_str(getTableValues("SELECT itm_tunch_bctext FROM item_tunch WHERE itm_tunch_value = '$tunch'"));

                                    if ($itm_tunch_bctext != '' && $itm_tunch_bctext != NULL) {
                                        $tunch = $itm_tunch_bctext;
                                    } else {
                                        $tunch = $tunch . '%';
                                    }
                                    $metal = $rowInItemBarCode['sttr_metal_type'];
                                    $qSelBarcodeColor = "SELECT itm_tunch_bccolor,itm_tunch_bctext FROM item_tunch where itm_tunch_own_id='$_SESSION[sessionOwnerId]' and itm_tunch_value='$tunch' and itm_tunch_metal_type='$metal'";
                                    $resBarcodeColor = mysqli_query($conn, $qSelBarcodeColor);
                                    $rowBarcodeColor = mysqli_fetch_array($resBarcodeColor, MYSQLI_ASSOC);
                                    $color = $rowBarcodeColor['itm_tunch_bccolor'];
                                    $barCodeText = $rowBarcodeColor['itm_tunch_bctext'];
                                    if ($barCodeSize == 'large') {
                                        $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 18));
                                        $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 12)));
                                        $barCodeText = om_strtoupper(substr($barCodeText, 0, 16));
                                        $barCodeHeight = '6px';
                                        $bisHeight = '';
                                    } else if ($barCodeSize == 'medium') {
                                        $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 11));
                                        $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 11)));
                                        $barCodeText = om_strtoupper(substr($barCodeText, 0, 5));
                                        $barCodeHeight = '6px';
                                        $bisHeight = '9px';
                                        if (strlen($bcItemWt) >= 8) {
                                            $bcItemWtType = om_strtoupper(substr($bcItemWtType, 0, 1));
                                            $bcItemNtWtType = om_strtoupper(substr($bcItemNtWtType, 0, 1));
                                        }
                                    } else if ($barCodeSize == 'small') {
                                        $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 10));
                                        $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 10)));
                                        $barCodeText = om_strtoupper(substr($barCodeText, 0, 3));
                                        $barCodeHeight = '6px';
                                        $bisHeight = '9px';
                                        if (strlen($bcItemWt) >= 8) {
                                            $bcItemWtType = '';
                                            $bcItemNtWtType = om_strtoupper(substr($bcItemNtWtType, 0, 1));
                                        }
                                        if (strlen($bcItemMkChrg) >= 4 && $bcItemCrystalVal != NULL && $bcItemCryNtWt != NULL) {
                                            $bcItemMkChrgType = '';
                                        }
                                    }
                                    if ($color == '') {
                                        $color = 'white';
                                    }
                                    $counter++;
                                    ?> 
                                    <div id="block65LDiv<?php echo $counter; ?>" 
                                         ondblclick="moveBarCodeSlip65L('block65LDiv<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>')" 
                                         title="Please Double click to move the slip!">
                                        <table width="100%" style="table-layout: fixed;">
                                            <tr>
                                                <td width="50%">
                                                    <div class="borderRightDotted" style="height: <?php echo $slipHeight; ?>">
                                                        <?php if ($bismark != 'NULL' && $bismark != '' && $metal == 'Gold') { ?> 
                                                            <div class="floatRight padBottom0 marginBottom0 marTopMin1 paddingRight5">
                                                                <img src="<?php echo $documentRoot; ?>/images/BIS18x12.png" alt=""  height="<?php echo $bisHeight; ?>"/>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="block84LText10 paddingLeft2 padBottom0 marginBottom0 marTopMin2">
                                                            <?php
                                                            $sno = $bcItemPreId . '' . $bcItemPostId;
                                                            if ($bcItemWt != '' || $bcItemWt != NULL) {
                                                                $gswt = 'G&dash;' . $bcItemWt . ' ' . $bcItemWtType;
                                                            }
                                                            if ($bcItemNtWt != '' || $bcItemNtWt != NULL) {
                                                                $ntwt = 'N&dash;' . $bcItemNtWt . ' ' . $bcItemNtWtType;
                                                            }
                                                            if ($bcItemCryNtWt != '' || $bcItemCryNtWt != NULL) {
                                                                $cryWT = 'CW&dash;' . $bcItemCryNtWt . '&nbsp;' . $bcItemCryNtWtType;
                                                            }
                                                            if ($cryValuation != '' || $cryValuation != NULL) {
                                                                $cryVal = 'CV&dash;' . $cryValuation . '&nbsp;';
                                                            }
                                                            if ($bcItemMkChrg != '' || $bcItemMkChrg != NULL) {
                                                                $mkgChrgs = 'M&dash;' . $bcItemMkChrg . ' ' . $bcItemMkChrgType;
                                                            }

                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption1'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>

                                                        </div>



                                                        <div class="block84LText9 paddingLeft2">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption2'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption3'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>


                                                        <div class="floatLeft block84LText10 marTopMin3">
                                                            <div class="paddingLeft2 floatLeft">
                                                                <?php
                                                                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption4'"));
                                                                callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="floatLeft block84LText10 marTopMin3">
                                                            <div class="paddingLeft2 floatLeft">
                                                                <?php
                                                                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption5'"));
                                                                callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td width="50%">
                                                    <div class="block84LText10 paddingLeft2 marTopMin3">
                                                        <?php
                                                        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption6'"));
                                                        callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                        ?>
                                                    </div>
                                                    <div class="floatLeft block84LText9  marTopMin3">
                                                        <div class="floatLeft paddingLeft2">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption7'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>
                                                        <div class="floatLeft paddingLeft2" style="margin-top:-4px;">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption8'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>
                                                        <div class="floatLeft paddingLeft2" style="margin-top:-5px;">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption9'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="block84LText6 floatLeft paddingLeft2 paddingRight2" style="width: 52px;height: 8px;">
                                                        <img style="width: 52px;height: 8px;" src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=61L&bar_id=1<?php echo $bcItemId; ?>"
                                                             alt="Barcode" height="<?php echo $barCodeHeight; ?>"/>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table></div>
                                <?php } ?>
                            </div>
                            <div id="barCodeCloseDiv<?php echo $counter; ?>" style="cursor: pointer;margin-top: <?php echo $margin_top_right12 - 2; ?>mm" class="deleteButtonRight noPrint"
                                 onclick="deleteItemBarCode61L('block65LDiv<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>', '<?php echo $bcId; ?>', '<?php echo $bcItemPreId; ?>', '<?php echo $bcItemPostId; ?> ')">
                                     <?php if ($divPrinted == TRUE) { ?>
                                    <img src="<?php echo $documentRoot; ?>/images/delete16.png" alt="" class="noPrint"  />
                                <?php } else { ?>
                                    &nbsp;
                                <?php } ?> 
                            </div>


                            <div style="background-color:#D8D8D8;width:<?php echo $slipWidth; ?>;margin-top: <?php echo $margin_top_left12; ?>mm;height:<?php echo $slipHeight; ?>;position: absolute;border-radius: 4px;border: <?php echo $barCodeBorder; ?>;" align="left">
                                <?php
                                $cryWT = 0;
                                $cryValuation = 0;
                                $divPrinted = FALSE;
                                if ($rowInItemBarCode = mysqli_fetch_array($resInItemBarCode, MYSQLI_ASSOC)) {
                                    $bcId = $rowInItemBarCode['sttr_id'];
                                    $bcFirmId = $rowInItemBarCode['sttr_firm_id'];
                                    $bcItemId = $rowInItemBarCode['sttr_item_id'];
                                    $bcItemPreId = trim($rowInItemBarCode['sttr_item_pre_id']);
                                    $bcItemPostId = trim($rowInItemBarCode['sttr_item_id']);
                                    $bcItemName = trim($rowInItemBarCode['sttr_item_name']);
                                    $bcItemWt = trim($rowInItemBarCode['sttr_gs_weight']);
                                    $bcItemWtType = trim($rowInItemBarCode['sttr_gs_weight_type']);
                                    $bcItemNtWt = trim($rowInItemBarCode['sttr_nt_weight']);
                                    $bcItemNtWtType = trim($rowInItemBarCode['sttr_nt_weight_type']);
                                    $bcItemCrystalVal = intval($rowInItemBarCode['sttr_valuation']);
//                                  $bcItemCryNtWt = trim($rowInItemBarCode['itbc_cry_net_wt']);
//                                  $bcItemCryNtWtType = trim($rowInItemBarCode['itbc_cry_net_wt_tp']);
                                    $bcItemMkChrg = trim($rowInItemBarCode['sttr_making_charges']);
                                    $bcItemMkChrgType = trim($rowInItemBarCode['sttr_making_charges_type']);
                                    $valaddamt = trim($rowInItemBarCode['sttr_value_added']);
                                    $valadd = trim($rowInItemBarCode['sttr_cust_wastage']);
                                    $valaddwt = trim($rowInItemBarCode['sttr_cust_wastage_wt']);
                                    $bcItemCryNtWt = trim($rowInItemBarCode['sttr_stone_wt']);
                                    $bcItemCryNtWtType = trim($rowInItemBarCode['sttr_stone_wt_type']);

                                    $bismark = trim($rowInItemBarCode['sttr_bis_mark']);
                                    $divPrinted = TRUE;
                                    $qSelPerFirm = "SELECT firm_name,firm_long_name FROM firm 
                                                     where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$bcFirmId'";
                                    $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                                    $rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC);
                                    $firmNameLabel = $rowPerFirm['firm_name'];

                                    $tunch = $rowInItemBarCode['sttr_purity'];

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

                                    parse_str(getTableValues("SELECT itm_tunch_bctext FROM item_tunch WHERE itm_tunch_value = '$tunch'"));

                                    if ($itm_tunch_bctext != '' && $itm_tunch_bctext != NULL) {
                                        $tunch = $itm_tunch_bctext;
                                    } else {
                                        $tunch = $tunch . '%';
                                    }
                                    $metal = $rowInItemBarCode['sttr_metal_type'];
                                    $qSelBarcodeColor = "SELECT itm_tunch_bccolor,itm_tunch_bctext FROM item_tunch where itm_tunch_own_id='$_SESSION[sessionOwnerId]' and itm_tunch_value='$tunch' and itm_tunch_metal_type='$metal'";
                                    $resBarcodeColor = mysqli_query($conn, $qSelBarcodeColor);
                                    $rowBarcodeColor = mysqli_fetch_array($resBarcodeColor, MYSQLI_ASSOC);
                                    $color = $rowBarcodeColor['itm_tunch_bccolor'];
                                    $barCodeText = $rowBarcodeColor['itm_tunch_bctext'];
                                    if ($barCodeSize == 'large') {
                                        $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 18));
                                        $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 12)));
                                        $barCodeText = om_strtoupper(substr($barCodeText, 0, 16));
                                        $barCodeHeight = '6px';
                                        $bisHeight = '';
                                    } else if ($barCodeSize == 'medium') {
                                        $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 11));
                                        $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 11)));
                                        $barCodeText = om_strtoupper(substr($barCodeText, 0, 5));
                                        $barCodeHeight = '6px';
                                        $bisHeight = '9px';
                                        if (strlen($bcItemWt) >= 8) {
                                            $bcItemWtType = om_strtoupper(substr($bcItemWtType, 0, 1));
                                            $bcItemNtWtType = om_strtoupper(substr($bcItemNtWtType, 0, 1));
                                        }
                                    } else if ($barCodeSize == 'small') {
                                        $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 10));
                                        $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 10)));
                                        $barCodeText = om_strtoupper(substr($barCodeText, 0, 3));
                                        $barCodeHeight = '6px';
                                        $bisHeight = '9px';
                                        if (strlen($bcItemWt) >= 8) {
                                            $bcItemWtType = '';
                                            $bcItemNtWtType = om_strtoupper(substr($bcItemNtWtType, 0, 1));
                                        }
                                        if (strlen($bcItemMkChrg) >= 4 && $bcItemCrystalVal != NULL && $bcItemCryNtWt != NULL) {
                                            $bcItemMkChrgType = '';
                                        }
                                    }
                                    if ($color == '') {
                                        $color = 'white';
                                    }
                                    $counter++;
                                    ?> 
                                    <div id="block65LDiv<?php echo $counter; ?>" 
                                         ondblclick="moveBarCodeSlip65L('block65LDiv<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>')" 
                                         title="Please Double click to move the slip!">
                                        <table width="100%" style="table-layout: fixed"><tr><td width="50%"><div class="borderRightDotted" style="height: <?php echo $slipHeight; ?>">
                                                        <?php if ($bismark != 'NULL' && $bismark != '' && $metal == 'Gold') { ?> 
                                                            <div class="floatRight padBottom0 marginBottom0 marTopMin1 paddingRight5">
                                                                <img src="<?php echo $documentRoot; ?>/images/BIS18x12.png" alt=""  height="<?php echo $bisHeight; ?>"/>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="block84LText10 paddingLeft2 padBottom0 marginBottom0 marTopMin2">
                                                            <?php
                                                            $sno = $bcItemPreId . '' . $bcItemPostId;
                                                            if ($bcItemWt != '' || $bcItemWt != NULL) {
                                                                $gswt = 'G&dash;' . $bcItemWt . ' ' . $bcItemWtType;
                                                            }
                                                            if ($bcItemNtWt != '' || $bcItemNtWt != NULL) {
                                                                $ntwt = 'N&dash;' . $bcItemNtWt . ' ' . $bcItemNtWtType;
                                                            }
                                                            if ($bcItemCryNtWt != '' || $bcItemCryNtWt != NULL) {
                                                                $cryWT = 'CW&dash;' . $bcItemCryNtWt . '&nbsp;' . $bcItemCryNtWtType;
                                                            }
                                                            if ($cryValuation != '' || $cryValuation != NULL) {
                                                                $cryVal = 'CV&dash;' . $cryValuation . '&nbsp;';
                                                            }
                                                            if ($bcItemMkChrg != '' || $bcItemMkChrg != NULL) {
                                                                $mkgChrgs = 'M&dash;' . $bcItemMkChrg . ' ' . $bcItemMkChrgType;
                                                            }

                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption1'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>

                                                        </div>



                                                        <div class="block84LText9 paddingLeft2">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption2'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption3'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>


                                                        <div class="floatLeft block84LText10 marTopMin3">
                                                            <div class="paddingLeft2 floatLeft">
                                                                <?php
                                                                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption4'"));
                                                                callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="floatLeft block84LText10 marTopMin3">
                                                            <div class="paddingLeft2 floatLeft">
                                                                <?php
                                                                parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption5'"));
                                                                callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td><td width="50%"><div class="block84LText10 paddingLeft2 marTopMin3">
                                                        <?php
                                                        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption6'"));
                                                        callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                        ?>
                                                    </div>
                                                    <div class="floatLeft block84LText9  marTopMin3">
                                                        <div class="floatLeft paddingLeft2">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption7'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>
                                                        <div class="floatLeft paddingLeft2" style="margin-top:-4px;">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption8'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>
                                                        <div class="floatLeft paddingLeft2" style="margin-top:-5px;">
                                                            <?php
                                                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'loanBcOption9'"));
                                                            callSwitchCaseFor61LL($omin_value, $sno, $tunch, $firmNameLabel, $gswt, $ntwt, $bcItemName, $cryWT, $cryVal, $mkgChrgs, $itemfnwt, $newItemFFNW, $valaddamt, $valadd, $valaddwt);
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="block84LText6 floatLeft" style="width: 52px;height: 8px;">
                                                        <img style="width: 52px;height: 8px;" src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=61L&bar_id=1<?php echo $bcItemId; ?>"
                                                             alt="Barcode" height="<?php echo $barCodeHeight; ?>"/>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table></div>
                                <?php } ?>
                            </div>
                            <div style="background-color:#D8D8D8;margin-top: <?php echo $margin_top_left2; ?>mm;margin-left: <?php echo $slipWidth; ?>;width:<?php echo $tailLength; ?>;height: 2mm;position: absolute;border-top-right-radius: 6px;border-bottom-right-radius: 6px;border: <?php echo $barCodeBorder; ?>;" align="left"></div>
                            <div id="barCodeCloseDiv<?php echo $counter; ?>" style="cursor: pointer;margin-top: <?php echo $margin_top_left12 - 2; ?>mm" class="deleteButtonLeft noPrint"
                                 onclick="deleteItemBarCode61L('block65LDiv<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>', '<?php echo $bcId; ?>', '<?php echo $bcItemPreId; ?>', '<?php echo $bcItemPostId; ?> ')">
                                     <?php if ($divPrinted == TRUE) { ?>
                                    <img src="<?php echo $documentRoot; ?>/images/delete16.png" alt="" class="noPrint"  />
                                <?php } else { ?>
                                    &nbsp;
                                <?php } ?> 
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
        <?php
        if ($totalNextItemBarCode > 0) {
            ?>
            <table border="0" cellpadding="0" cellspacing="0" align="center" style="width:210mm" class="marginTop7">
                <tr>
                    <?php
                    if ($pageNum > 1) {
                        ?>
                        <td align="right" class="printVisibilityHidden noPrint">
                            <form name="prev_barcode" id="prev_barcode"
                                  action="javascript:navigationToNextBarcodePanel(<?php echo "$pageNum - 1"; ?>,'61RPaging');"
                                  method="get"><input type="submit" value="Prev Barcodes" class="frm-btn"
                                                maxlength="30" size="15" /></form>
                        </td>
                        <?php
                    }
                    ?>
                    <?php
                    if ($totalItemBarCode > $barcodePerPage) {
                        ?>
                        <td align="right" width="110px" class="printVisibilityHidden noPrint">
                            <form name="next_Barcodes" id="next_Barcodes"
                                  action="javascript:navigationToNextBarcodePanel(<?php echo $pageNum + 1; ?>,'61RPaging');"
                                  method="get"><input type="submit" value="Next Barcodes" class="frm-btn"
                                                maxlength="30" size="15" /></form>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
            </table>
        <?php } ?>
    </div>  
<?php } ?>
<!-- ********End code for 61L barcode panel @Author:SHRI9FEB15************* -->