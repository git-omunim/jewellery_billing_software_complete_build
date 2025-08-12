<?php
/*
    * **************************************************************************************
    * @tutorial: Item Bar Code Print Panel Div
    * **************************************************************************************
    * 
    * Created on Apr 30, 2012 11:57:35 PM
    *
    * @FileName: omstockTransibbc65l.php
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
<!-- Add this above your barcode table -->
<?php
// Store GET value in session
if (isset($_GET['stockTypeP1']) && $_GET['stockTypeP1'] != '') {
    $_SESSION['stockTypeP1'] = $_GET['stockTypeP1'];
}

// Set panel name based on session value
$panelTitle = '';
if (isset($_SESSION['stockTypeP1'])) {
    switch ($_SESSION['stockTypeP1']) {
        case 'fine':
            $panelTitle = 'FINE STOCK PANEL';
            break;
        case 'imitation':
            $panelTitle = 'IMITATION STOCK PANEL';
            break;
        case 'both':
            $panelTitle = 'FINE STOCK PANEL';
            break;
        default:
            $panelTitle = 'STOCK PANEL';
    }
}
?>
<!-- HTML to display centered title -->
<?php if ($panelTitle != '') { ?>
    <div style="text-align: center; font-size: 20px; font-weight: bold; margin-top: 5px;">
        <?php echo $panelTitle; ?>
    </div>
<?php } ?>
<?php
/*     * ***********Start code to change file @Author:ANUJA4FEB15************************ */
if ($_SESSION['sessionOwnIndStr'][7] == 'Y'  || $_SESSION['sessionOwnIndStr'][7] == 'A') {
    //
    $tags = $_GET['tags']; //var changed @Author:PRIYA07APR15
    $panelName = 'BcPanel';
    if ($tags != 'true') {
?>
        <table border="0" cellpadding="2" cellspacing="2" align="center" valign="top" class="noPrint" width="100%" style="margin-right: 0px;margin-left: 0px;border: 1px solid #fec0c0;background: #ffeded;">
            <tr>
                <td align='center'><span style="font-size:16px;font-weight:600;">1</span></td>
                <td align='center'><span style="font-size:16px;font-weight:600;">2</span></td>
                <td align='center'><span style="font-size:16px;font-weight:600;">3</span></td>
                <td align='center'><span style="font-size:16px;font-weight:600;">4</span></td>
                <td align='center'><span style="font-size:16px;font-weight:600;">5</span></td>
                <td align='center'><span style="font-size:16px;font-weight:600;">6</span></td>
                <td align='center'><span style="font-size:16px;font-weight:600;">7</span></td>
                <td align='center'><span style="font-size:16px;font-weight:600;">8</span></td>
                <td align='center'><span style="font-size:16px;font-weight:600;">9</span></td>
                <td align='center'><span style="font-size:16px;font-weight:600;">10</span></td>
            </tr>
            <?php
            $valuePresentInTable = updateOptionValue('bc65lOption1', 'sno', 'selValue', '', $panelName);
            if ($valuePresentInTable == '') {
                $valuePresentInTable = updateOptionValue('bc65lOption1', 'sno', 'selValue', 'barCode', $panelName);
                updateOptionValue('bc65lOption1', 'sno', 'selValue', 'barCode', $panelName);
                updateOptionValue('bc65lOption2', 'barCodeText', 'selValue', 'barCode', $panelName);
                updateOptionValue('bc65lOption3', 'itemName', 'selValue', 'barCode', $panelName);
                updateOptionValue('bc65lOption4', 'grosswt', 'selValue', 'barCode', $panelName);
                updateOptionValue('bc65lOption5', 'netwt', 'selValue', 'barCode', $panelName);
                updateOptionValue('bc65lOption6', 'firm', 'selValue', 'barCode', $panelName);
                updateOptionValue('bc65lOption7', 'makingChargs', 'selValue', 'barCode', $panelName);
                updateOptionValue('bc65lOption8', 'itmfnwt', 'selValue', 'barCode', $panelName);
                updateOptionValue('bc65lOption9', 'itmffnwt', 'selValue', 'barCode', $panelName);
                updateOptionValue('bc65lOption10', 'valaddamt', 'selValue', 'barCode', $panelName);
                updateOptionValue('bc65lOption', '', 'selValue', 'barCode', $panelName);
                updateOptionValue('BisMark', '', 'selValue', 'barCode', $panelName);
            }
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc65lOption1' and omin_panel='$panelName'"));
            // echo "SELECT omin_value FROM omindicators where omin_option = 'loanBc65lOption1'";
            callImiLoanBCFunc65l('bc65lOption1', $omin_value, $panelName);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc65lOption2' and omin_panel='$panelName'"));
            callImiLoanBCFunc65l('bc65lOption2', $omin_value, $panelName);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc65lOption3' and omin_panel='$panelName'"));
            callImiLoanBCFunc65l('bc65lOption3', $omin_value, $panelName);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc65lOption4' and omin_panel='$panelName'"));
            callImiLoanBCFunc65l('bc65lOption4', $omin_value, $panelName);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc65lOption5' and omin_panel='$panelName'"));
            callImiLoanBCFunc65l('bc65lOption5', $omin_value, $panelName);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc65lOption6' and omin_panel='$panelName'"));
            callImiLoanBCFunc65l('bc65lOption6', $omin_value, $panelName);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc65lOption7' and omin_panel='$panelName'"));
            callImiLoanBCFunc65l('bc65lOption7', $omin_value, $panelName);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc65lOption8' and omin_panel='$panelName'"));
            callImiLoanBCFunc65l('bc65lOption8', $omin_value, $panelName);
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc65lOption9' and omin_panel='$panelName'"));
            callImiLoanBCFunc65l('bc65lOption9', $omin_value, $panelName);
            /*                 * ****************** Start code to add Button @Author:ANUJA24FEB15 *********************************** */
            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc65lOption10' and omin_panel='$panelName'"));
            callImiLoanBCFunc65l('bc65lOption10', $omin_value, $panelName);
            /*                 * ****************** End code to add Button @Author:ANUJA24FEB15 *********************************** */
            ?>
        </table>
    <?php
    }
    /*         * ******ENd code to @Author:ANUJA4FEB15************ */
    ?>
    <div id="barCode65LDiv">
        <?php
        $sessionOwnerId = $_SESSION[sessionOwnerId];
        //OPTION ID
        $omLayoutOptionTop = '65LBCTOPMARGIN';
        $omLayoutOptionLeft = '65LBCLEFTMARGIN';
        $omLayFontSize = '65LBCBLOCKFONTSIZE';
        $omLayOptBlockWidth = '65LBCBLOCKWIDTH';
        $omLayOptBlockHeight = '65LBCBLOCKHEIGHT';
        $omLayOptSlipWidth = '65LBCBLOCKSLIPWIDTH';
        $omLayOptSlipHeight = '65LBCBLOCKSLIPHEIGHT';
        $omLayoutOptionBorder = '65LBCBORDER';
        $omLayoutBCSize = '65LBCSIZE';
        $omLayoutOptionNoOfRows = '65LNOOFROWS';
        //SELECT OPTION VALUE
        $noOfRows = updateOptionValue($omLayoutOptionNoOfRows, '', 'selValue', '', $panelName);
        if ($noOfRows == '')
            $noOfRows = '13';
        $checkBarCodeBorder = updateOptionValue($omLayoutOptionBorder, '', 'selValue', $panelName);
        if ($checkBarCodeBorder == 'YES') {
            $barCodeBorder = 'solid 1px #C7C5C8';
        } else {
            $barCodeBorder = 'solid 1px #FFFFFF';
        }
        $topMargin = updateOptionValue($omLayoutOptionTop, '', 'selValue', '', $panelName);
        $leftMargin = updateOptionValue($omLayoutOptionLeft, '', 'selValue', '', $panelName);
        $barCodeSize = updateOptionValue($omLayoutBCSize, '', 'selValue', '', $panelName);
        $blockWidth = updateOptionValue($omLayOptBlockWidth, '', 'selValue', '', $panelName);
        $blockHeight = updateOptionValue($omLayOptBlockHeight, '', 'selValue', '', $panelName);
        $slipWidth = updateOptionValue($omLayOptSlipWidth, '', 'selValue', '', $panelName);
        $slipHeight = updateOptionValue($omLayOptSlipHeight, '', 'selValue', '', $panelName);

        //          echo '$topMargin='.$topMargin;
        //          echo '$slipHeight='.$slipHeight;
        //    echo '$slipWidth='.$slipWidth;
        //    echo '$slipWidth='.$slipWidth;
        //CLASS VAR
        if ($barCodeSize == 'size') {
            $labelLeftMargin = '0MM';
            $labelRightMargin = '0MM';
            $labelTopMargin = '0MM';
            $labelBottomMargin = '0MM';
        } else if ($barCodeSize == 'large') {
            $slipWidth = $slipWidth; // '37.5MM';
            $slipHeight = $slipHeight; //'20.7MM';
            $labelLeftMargin = '0MM';
            $labelRightMargin = '0MM';
            $labelTopMargin = '0MM';
            $labelBottomMargin = '0MM';
        } else if ($barCodeSize == 'medium') {
            $slipWidth = '33.5MM';
            $slipHeight = '16.7MM';
            $labelLeftMargin = '2MM';
            $labelRightMargin = '2MM';
            $labelTopMargin = '2MM';
            $labelBottomMargin = '2MM';
        } else if ($barCodeSize == 'small') {
            $slipWidth = '29.5MM';
            $slipHeight = '12.7MM';
            $labelLeftMargin = '4MM';
            $labelRightMargin = '4MM';
            $labelTopMargin = '4MM';
            $labelBottomMargin = '4MM';
        }
        $fontSize = updateOptionValue($omLayFontSize, '', 'selValue', '', $panelName);

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
        <div id="headerItemBarCode65L">
            <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" width="100%" class="table65L" style="margin-top: <?php echo $topMargin; ?>;">
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

                $barcodePerPage = 65;
                $checkNextBarcode = $barcodePerPage * 2;
                $pageNum = 1;
                if (isset($_GET['page'])) {
                    $pageNum = $_GET['page'];
                }

                $perOffset = ($pageNum - 1) * $barcodePerPage;

              
                // echo $_SESSION['stockTypeP1'];

                if ($_SESSION['stockTypeP1'] === 'fine') {
                    if ($_SESSION['sessionProdName'] == 'OMRETL') {
                        $qSelInItemBarCode = "SELECT * FROM stock_transaction where "
                            . "sttr_indicator='stock' and sttr_indicator!='stockCrystal' and sttr_firm_id IN ($strFrmId) order by sttr_id desc LIMIT $perOffset,$checkNextBarcode";
                    } else {
                        $qSelInItemBarCode = "SELECT * FROM stock_transaction where sttr_gs_weight!='0' and "
                            . "sttr_indicator='stock' and sttr_indicator!='stockCrystal' and sttr_firm_id IN ($strFrmId) order by sttr_id desc LIMIT $perOffset,$checkNextBarcode";
                    }
                } elseif ($_SESSION['stockTypeP1'] === 'imitation') {

                    $qSelInItemBarCode = "SELECT * FROM stock_transaction 
                            WHERE sttr_indicator = 'imitation' 
                            AND sttr_firm_id IN ($strFrmId) 
                            ORDER BY sttr_id desc 
                            LIMIT $perOffset,$checkNextBarcode";
                } elseif ($_SESSION['stockTypeP1'] === 'both') {
                    $qSelInItemBarCode = "SELECT * FROM stock_transaction 
                     WHERE sttr_indicator = 'imitation' OR sttr_indicator = 'stock'
                     AND sttr_transaction_type != 'sell' 
                     AND sttr_firm_id IN ($strFrmId) 
                     ORDER BY sttr_id desc 
                     LIMIT $perOffset,$barcodePerPage";
                }


                // Only fetch imitation stock items


                //echo 'qSelInItemBarCode == ' . $qSelInItemBarCode . '</br>';

                $resInItemBarCode = mysqli_query($conn, $qSelInItemBarCode);
                $totalItemBarCode = mysqli_num_rows($resInItemBarCode);

                // echo"<br>stockType--".$stockType = 'imitation';


                if ($_SESSION['stockTypeP1'] === 'fine') {
                    if ($_SESSION['sessionProdName'] == 'OMRETL') {
                        $qSelInItemBarCode = "SELECT * FROM stock_transaction where "
                            . "sttr_indicator='stock' and sttr_indicator!='stockCrystal' and sttr_transaction_type!='sell' and sttr_firm_id IN ($strFrmId) order by sttr_id desc LIMIT  $perOffset,$barcodePerPage";
                    } else {
                        $qSelInItemBarCode = "SELECT * FROM stock_transaction where sttr_gs_weight!='0' and "
                            . "sttr_indicator='stock' and sttr_indicator!='stockCrystal' and sttr_transaction_type!='sell' and sttr_firm_id IN ($strFrmId) order by sttr_id desc LIMIT  $perOffset,$barcodePerPage";
                    }
                } elseif ($_SESSION['stockTypeP1'] === 'imitation') {
                     $qSelInItemBarCode = "SELECT * FROM stock_transaction 
                     WHERE sttr_indicator = 'imitation' 
                     AND sttr_transaction_type != 'sell' 
                     AND sttr_firm_id IN ($strFrmId) 
                     ORDER BY sttr_id desc 
                     LIMIT $perOffset,$barcodePerPage";
                } elseif ($_SESSION['stockTypeP1'] === 'both') {
                    //echo $stockType;
                    $qSelInItemBarCode = "SELECT * FROM stock_transaction 
                     WHERE sttr_indicator = 'imitation' OR sttr_indicator = 'stock' 
                     AND sttr_transaction_type != 'sell' 
                     AND sttr_firm_id IN ($strFrmId) 
                     ORDER BY sttr_id desc 
                     LIMIT $perOffset,$barcodePerPage";
                }
                // Only fetch imitation stock items

                //             echo 'qSelInItemBarCode == ' . $qSelInItemBarCode . '</br>';

                $resInItemBarCode = mysqli_query($conn, $qSelInItemBarCode);
                $totalNextItemBarCode = mysqli_num_rows($resInItemBarCode);
                $counter = 1;
                ?>
                <tr>
                    <td valign="top" align="left">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" valign="top" width="100%">
                            <?php
                            $margin_top_left12 = 0;
                            $margin_top_right12 = 0;
                            $margin_top_left2 = 3.5;
                            $margin_top_right2 = 10;
                            $margin_left_for_left2 = $tailLength - 33;
                            $margin_left_for_left2 = 36 - $margin_left_for_left2;
                            for ($row = 1; $row <= $noOfRows; $row++) { ?>
                                <tr>
                                    <?php for ($col = 1; $col <= 5; $col++) {
                                        if (($row == 1) && ($col == 1)) {
                                    ?>
                                            <td class="block65L" valign="top">
                                                <div style="width:<?php echo $slipWidth; ?>;margin-top: <?php echo $margin_top_left12; ?>mm;height:<?php echo $slipHeight; ?>;position: absolute;border-radius: 4px;border: <?php echo $barCodeBorder; ?>;" align="left">
                                                    <div id="block65LDiv<?php echo $counter; ?>" class="block65LDiv"
                                                        ondblclick="moveBarCodeSlip65L('block65LDiv<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>')"
                                                        title="Please Double click to move the slip!">
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
                                                            //                                                         echo '$bcItemSize=='.$bcItemSize;
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
                                                            $sttr_item_category1 = $rowInItemBarCode['sttr_item_category'];
                                                            
                                                            $sttr_item_model_no1 = $rowInItemBarCode['sttr_item_model_no'];
                                                            $sttr_item_other_info1 = $rowInItemBarCode['sttr_item_other_info'];
                                                            $sttr_price1 = $rowInItemBarCode['sttr_price'];

                                                            // 
                                                            if ($bcItemPrefixId == '' || $bcItemPrefixId == NULL || $bcItemPrefixId === 'undefined') {
                                                                $bcItemPrefixId = 1;
                                                            }
                                                            //
                                                            // $querySelItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_sttr_id = '$bcId' and sttr_indicator IN ('stockCrystal') and sttr_status NOT IN('SOLDOUT','DELETED') and sttr_current_status NOT IN ('Deleted')"; // Code to add Imitation Stock condition @Author:SHRI26FEB15
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
                                                            //
                                                            $itemCustGSW = $itemFFNWT;
                                                            //
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
                                                            //
                                                            if ($custTotalTAX == '')
                                                                $custTotalTAX = 0;
                                                            //
                                                            $totalLabNOthCharges = 0;
                                                            //
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
                                                                    //                                        echo '$totalLabNOthCharges=='.$totalLabNOthCharges;
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
                                                            //
                                                            if ($itemWtBy == 'byNetWt') {
                                                                $itemCustGSW = $bcItemNtWt;
                                                            } else {
                                                                $itemCustGSW = $itemCustGSW;
                                                            }
                                                            //
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

                                                            //echo '$sttr_indicator == ' . $sttr_indicator . '<br />';
                                                            //echo '$custFinalValuation == ' . $custFinalValuation . '<br />';
                                                            //echo '$bcItemQty == ' . $bcItemQty . '<br />';

                                                            if ($sttr_indicator == 'stock') {
                                                                $Finalprice = $custFinalValuation;
                                                                $UintPrice = $Finalprice / $bcItemQty;
                                                            } else if ($sttr_indicator == 'imitation' || $_SESSION['sessionProdName'] == 'OMRETL') {
                                                                $Finalprice = $itemCustPrice * $bcItemQty;
                                                                $UintPrice = $itemCustPrice;
                                                            }

                                                            //echo '$Finalprice == ' . $Finalprice . '<br />';
                                                            //echo '$UintPrice == ' . $UintPrice . '<br />';

                                                            $bismark = trim($rowInItemBarCode['sttr_bis_mark']); //to take value of bismark checkbox @AUTHOR: SANDY23JUL13 
                                                            //echo $bismark;
                                                            $divPrinted = TRUE;
                                                            $bcItemCustPri = trim($rowInItemBarCode['sttr_cust_price']); //Add new variable @Author:ANUJA27JUN15
                                                            $qSelPerFirm = "SELECT firm_left_thumb,firm_name,firm_long_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$bcFirmId'";
                                                            //
                                                            $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                                                            $rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC);
                                                            $firmLogo1 = $rowPerFirm['firm_left_thumb'];
                                                           

                                                            $firmNameLabel = $rowPerFirm['firm_long_name'];
                                                            if ($firmNameLabel == '') {
                                                                $firmNameLabel = $rowPerFirm['firm_name'];
                                                            }
                                                            $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 19));
                                                            //
                                                            //Start To set barcode color as per purity @AUTHOR: SANDY21OCT13
                                                            $tunch = $rowInItemBarCode['sttr_purity'];
                                                            //
                                                            parse_str(getTableValues("SELECT itm_tunch_bctext FROM item_tunch WHERE itm_tunch_value = '$tunch'"));
                                                            //
                                                            if ($itm_tunch_bctext != '' && $itm_tunch_bctext != NULL) {
                                                                $tunch = $itm_tunch_bctext;
                                                            } else {
                                                                $tunch = $tunch . '%';
                                                            }
                                                            //
                                                            $metal = $rowInItemBarCode['sttr_product_type'];
                                                            //
                                                            $imgId = $rowInItemBarCode['sttr_image_id'];
                                                            //                                echo '$imgId:'.$imgId;
                                                            $qSelBarcodeColor = "SELECT itm_tunch_bccolor,itm_tunch_bctext FROM item_tunch where itm_tunch_own_id='$_SESSION[sessionOwnerId]' and itm_tunch_value='$tunch' and itm_tunch_metal_type='$metal'";
                                                            $resBarcodeColor = mysqli_query($conn, $qSelBarcodeColor);
                                                            $rowBarcodeColor = mysqli_fetch_array($resBarcodeColor, MYSQLI_ASSOC);
                                                            $barCodeText = $rowBarcodeColor['itm_tunch_bctext'];
                                                            $barCodeText = om_strtoupper(substr($barCodeText, 0, 18));
                                                            //Start To set barcode color as per purity @AUTHOR: SANDY21OCT13                    
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

                                                            if ($barCodeSize == 'large') {
                                                                $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 22));
                                                                $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 22)));
                                                                $barCodeText = om_strtoupper(substr($barCodeText, 0, 16));
                                                                $barCodeHeight = '';
                                                                $bisHeight = '';
                                                            } else if ($barCodeSize == 'medium') {
                                                                $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 11));
                                                                $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 17)));
                                                                $barCodeText = om_strtoupper(substr($barCodeText, 0, 11));
                                                                $barCodeHeight = '7px';
                                                                $bisHeight = '9px';
                                                                if (strlen($bcItemWt) >= 8) {
                                                                    $bcItemWtType = om_strtoupper(substr($bcItemWtType, 0, 1));
                                                                    $bcItemNtWtType = om_strtoupper(substr($bcItemNtWtType, 0, 1));
                                                                }
                                                            } else if ($barCodeSize == 'small') {
                                                                $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 15));
                                                                $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 15)));
                                                                $barCodeText = om_strtoupper(substr($barCodeText, 0, 3));
                                                                $barCodeHeight = '7px';
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

                                                        ?>
                                                            <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" width="100%" height="100%"
                                                                class="barcode_background_color_<?php echo $color; ?>" style="table-layout: fixed;border: 1px solid #c1c1c1;">
                                                                <tr>
                                                                    <td align="left" width="100%">
                                                                        <?php if ($bismark != 'NULL' && $bismark != '' && $bismark != 'FALSE') {
                                                                            parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'BisMark65L' and omin_panel='$panelName'"));
                                                                        ?>
                                                                            <div class="<?php
                                                                                        if (($row == 1) && ($col == 1)) {
                                                                                            echo element;
                                                                                        }
                                                                                        ?> block84LText11 floatRight padBottom0 marginBottom0 marTopMin1 paddingRight5" id="BisMark65L" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                                                <img src="<?php echo $documentRoot; ?>/images/BIS18x12.png" alt="" height="<?php echo $bisHeight; ?>" />
                                                                            </div>
                                                                        <?php } ?>
                                                                        <!---------------------------Start change in code @Author:ANUJA24FEB15---------------------------------------------->
                                                                        <!---------------------------Start change in code @Author:ANUJA31MAR15---------------------------------------------->
                                                                        <?php
                                                                        // if ($imgId != NULL && $imgId != '') {
                                                                        // ?>
                                                                        <!-- //     <div class="floatRight padBottom0 marginBottom0 marTopMin1 paddingRight5">
                                                                                <img src="<?php echo $documentRootBSlash; ?>/include/php/ogijbimg.php?imgId=<?php echo "$imgId"; ?>"
                                                                                    width="20px" height="20px" border="0" alt="image" />
                                                                            </div> -->
                                                                         <?php //} ?>
                                                                        <div class="block84LText1 paddingLeft2 padBottom0 marginBottom0 marTopMin2">
                                                                            <?php
                                                                            $sno = $bcItemPreId . '' . $bcItemPostId;
                                                                            if ($bcItemWt != '' || $bcItemWt != NULL) {
                                                                                $gswt = 'GW&dash;' . decimalVal($bcItemWt, 2) . ' ' . $bcItemWtType;
                                                                            }
                                                                            if ($bcItemNtWt != '' || $bcItemNtWt != NULL) {
                                                                                $ntwt = 'NW&dash;' . decimalVal($bcItemNtWt, 2) . ' ' . $bcItemNtWtType;
                                                                            }
                                                                            if ($itemfnwt != '' || $itemfnwt != NULL) {
                                                                                $itemfnwt = 'FW&dash;' . $itemfnwt . ' ' . $bcItemNtWtType;
                                                                            }
                                                                            if ($newItemFFNW != '' || $newItemFFNW != NULL) {
                                                                                $newItemFFNW = 'FFW&dash;' . $newItemFFNW . ' ' . $bcItemNtWtType;
                                                                            }

                                                                            if ($bcItemMkChrg != '' || $bcItemMkChrg != NULL) {
                                                                                $mkgChrgs = 'M&dash;' . $bcItemMkChrg . ' ' . $bcItemMkChrgType;
                                                                            }
                                                                            if ($valadd != '' || $valadd != NULL) {
                                                                                $valadd = 'WST&dash;' . $valadd . '%';
                                                                            }
                                                                            if ($valaddamt != '' || $valaddamt != NULL) {
                                                                                $valaddamt = 'WAT&dash;' . $valaddamt;
                                                                            }
                                                                            if ($valaddwt != '' || $valaddwt != NULL) {
                                                                                $valaddwt = 'WWT&dash;' . $valaddwt;
                                                                            }
                                                                            ?>
                                                                            <?php
                                                                            parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption1' and omin_panel='$panelName'"));
                                                                            ?>
                                                                            <div class="<?php
                                                                                        if (($row == 1) && ($col == 1)) {
                                                                                            echo element;
                                                                                        }
                                                                                        ?> block84LText11" id="bc65lOption1" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                                                <?php
                                                                                call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="block84LText2 paddingLeft2 padBottom0 marginBottom0 marTopMin2">
                                                                            <?php
                                                                            parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption2' and omin_panel='$panelName'"));
                                                                            ?>
                                                                            <div class="<?php
                                                                                        if (($row == 1) && ($col == 1)) {
                                                                                            echo element;
                                                                                        }
                                                                                        ?> paddingLeft2" id="bc65lOption2" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                                                <?php
                                                                                call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($barCodeSize == 'large') { //echo "large";
                                                                        ?>
                                                                            <div>
                                                                                <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%" height="100%" class="block84LText10 marTopMin3">
                                                                                    <tr>
                                                                                        <div align="left" width="50%">
                                                                                            <?php
                                                                                            parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption3' and omin_panel='$panelName'"));
                                                                                            ?>
                                                                                            <div class="<?php
                                                                                                        if (($row == 1) && ($col == 1)) {
                                                                                                            echo element;
                                                                                                        }
                                                                                                        ?> paddingLeft2" id="bc65lOption3" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                                                                <?php
                                                                                                call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1,$sttr_price1);
                                                                                                ?>
                                                                                            </div>
                                                                                        </div>
                                                                                        <td align="right" width="50%">
                                                                                            <?php
                                                                                            parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption4' and omin_panel='$panelName'"));
                                                                                            ?>
                                                                                            <div class="<?php
                                                                                                        if (($row == 1) && ($col == 1)) {
                                                                                                            echo element;
                                                                                                        }
                                                                                                        ?> paddingRight2" id="bc65lOption4" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                                                                <?php
                                                                                                call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize, $firmLogo1,$imgId,$documentRootBSlash,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                                ?>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        <?php } else if ($barCodeSize == 'medium') { ?>
                                                                            <div class="block84LText3 marTopMin3">
                                                                                <?php
                                                                                parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption3' and omin_panel='$panelName'"));
                                                                                ?>
                                                                                <div class="<?php
                                                                                            if (($row == 1) && ($col == 1)) {
                                                                                                echo element;
                                                                                            }
                                                                                            ?> paddingLeft2" id="bc65lOption3" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                                                    <?php
                                                                                    call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="block84LText4 marTopMin3">
                                                                                <?php
                                                                                parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption4' and omin_panel='$panelName'"));
                                                                                ?>
                                                                                <div class="<?php
                                                                                            if (($row == 1) && ($col == 1)) {
                                                                                                echo element;
                                                                                            }
                                                                                            ?> paddingRight2" id="bc65lOption4" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                                                    <?php
                                                                                    call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                        <div class=" block84LText5 marTopMin3 div_full_width">
                                                                            <?php
                                                                            parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption5' and omin_panel='$panelName'"));
                                                                            ?>
                                                                            <div class="<?php
                                                                                        if (($row == 1) && ($col == 1)) {
                                                                                            echo element;
                                                                                        }
                                                                                        ?> paddingRight2" id="bc65lOption5" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                                                <?php
                                                                                call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize, $firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%" height="100%" class="block84LText10 marTopMin3">
                                                                                <tr>
                                                                                    <td align="left" width="50%">
                                                                                        <?php
                                                                                        parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption6' and omin_panel='$panelName'"));
                                                                                        ?>
                                                                                        <div class="<?php
                                                                                                    if (($row == 1) && ($col == 1)) {
                                                                                                        echo element;
                                                                                                    }
                                                                                                    ?> paddingLeft2" id="bc65lOption6" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                                                            <?php
                                                                                            call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                            ?>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td align="right" width="50%">
                                                                                        <?php
                                                                                        parse_str(getTableValues("SELECT  omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption7' and omin_panel='$panelName'"));
                                                                                        ?>
                                                                                        <div class="<?php
                                                                                                    if (($row == 1) && ($col == 1)) {
                                                                                                        echo element;
                                                                                                    }
                                                                                                    ?> paddingRight2" id="bc65lOption7" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                                                            <?php
                                                                                            call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                            ?>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <!--class Added @Author: SHE14APR15-->

                                                                        <?php
                                                                        parse_str(getTableValues("SELECT  omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption8' and omin_panel='$panelName'"));
                                                                        ?>
                                                                        <div class="<?php
                                                                                    if (($row == 1) && ($col == 1)) {
                                                                                        echo element;
                                                                                    }
                                                                                    ?> paddingLeft2" id="bc65lOption8" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                                            <?php
                                                                            call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                            ?>
                                                                        </div>

                                                                        <!---------------------------Start change in code @Author:ANUJA24FEB15---------------------------------------------->
                                                                        <div>
                                                                            <?php
                                                                            parse_str(getTableValues("SELECT  omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption9' and omin_panel='$panelName'"));
                                                                            ?>

                                                                            <div class="<?php
                                                                                        if (($row == 1) && ($col == 1)) {
                                                                                            echo element;
                                                                                        }
                                                                                        ?> paddingRight2" id="bc65lOption9" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                                                <?php
                                                                                call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize, $firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <?php
                                                                            parse_str(getTableValues("SELECT  omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption10' and omin_panel='$panelName'"));
                                                                            ?>
                                                                            <div class="<?php
                                                                                        if (($row == 1) && ($col == 1)) {
                                                                                            echo element;
                                                                                        }
                                                                                        ?> paddingLeft2" id="bc65lOption10" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                                                <?php
                                                                                call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize, $firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!---------------------------End change in code @Author:ANUJA24FEB15---------------------------------------------->
                                                                        <!---------------------------End change in code @Author:ANUJA24FEB15---------------------------------------------->
                                                                        <!---------------------------End change in code @Author:ANUJA31MAR15---------------------------------------------->
                                                                        <div>
                                                                            <?php parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65LOption' and omin_panel='$panelName'"));
                                                                            ?>
                                                                            <div class="<?php
                                                                                        if (($row == 1) && ($col == 1)) {
                                                                                            echo element;
                                                                                        }
                                                                                        ?> paddingLeft2" id="bc65LOption" style="position:absolute;float:left;font-size:<?php echo $barcodeSize; ?>;border:0px solid;
                                                             cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">
                                                                                <img style="width: 52px;height: 8px;" src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=84L&bar_id=<?php echo $bcItemPrefixId . $bcItemId; ?>"
                                                                                    alt="Barcode" height="<?php echo $barCodeHeight; ?>" />
                                                                            </div>

                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        <?php } ?>
                                                    </div>
                                                    <div id="barCodeCloseDiv<?php echo $counter; ?>" style="cursor: pointer;" class="marginLeftBarCode noPrint"
                                                        onclick="deleteItemBarCode65L('block65LDiv<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>', '<?php echo $bcId; ?>')">
                                                        <?php if ($divPrinted == TRUE) { ?>
                                                            <img src="<?php echo $documentRoot; ?>/images/img/cancel.png" alt="" class="noPrint" style="height:14px;" />
                                                        <?php } else { ?>
                                                            &nbsp;
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php } else {
                                            $margin_top_left12 += 0;
                                            $margin_top_right12 += 13;
                                            $margin_top_left2 += 13;
                                            $margin_top_right2 += 13;

                                        ?>
                                            <td class="block65L" valign="top">
                                                <div style="width:<?php echo $slipWidth; ?>;margin-top: <?php echo $margin_top_left12; ?>mm;height:<?php echo $slipHeight; ?>;position: absolute;border-radius: 4px;border: <?php echo $barCodeBorder; ?>;" align="left">
                                                    <div id="block65LDiv<?php echo $counter; ?>" class="block65LDiv"
                                                        ondblclick="moveBarCodeSlip65L('block65LDiv<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>')"
                                                        title="Please Double click to move the slip!">
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
                                                            //                                                         echo '$bcItemSize=='.$bcItemSize;
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
                                                            $sttr_item_category1 = $rowInItemBarCode['sttr_item_category'];
                                                            
                                                            $sttr_item_model_no1 = $rowInItemBarCode['sttr_item_model_no'];
                                                            $sttr_item_other_info1 = $rowInItemBarCode['sttr_item_other_info'];
                                                            $sttr_price1 = $rowInItemBarCode['sttr_price'];
                                                            //
                                                            if ($bcItemPrefixId == '' || $bcItemPrefixId == NULL || $bcItemPrefixId === 'undefined') {
                                                                $bcItemPrefixId = 1;
                                                            }
                                                            //
                                                            //  $querySelItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_sttr_id = '$bcId' and sttr_indicator IN ('stockCrystal') and sttr_status NOT IN('SOLDOUT','DELETED') and sttr_current_status NOT IN ('Deleted')"; // Code to add Imitation Stock condition @Author:SHRI26FEB15
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
                                                            //
                                                            $itemCustGSW = $itemFFNWT;
                                                            //
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
                                                            //
                                                            if ($custTotalTAX == '')
                                                                $custTotalTAX = 0;
                                                            //
                                                            $totalLabNOthCharges = 0;
                                                            //
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
                                                                    //                                        echo '$totalLabNOthCharges=='.$totalLabNOthCharges;
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
                                                            //
                                                            if ($itemWtBy == 'byNetWt') {
                                                                $itemCustGSW = $bcItemNtWt;
                                                            } else {
                                                                $itemCustGSW = $itemCustGSW;
                                                            }
                                                            //
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
                                                            //echo $bismark;
                                                            $divPrinted = TRUE;
                                                            $bcItemCustPri = trim($rowInItemBarCode['sttr_cust_price']); //Add new variable @Author:ANUJA27JUN15
                                                            $qSelPerFirm = "SELECT firm_name,firm_long_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$bcFirmId'";
                                                            //
                                                            $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                                                            $rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC);
                                                            $firmNameLabel = $rowPerFirm['firm_long_name'];
                                                            if ($firmNameLabel == '') {
                                                                $firmNameLabel = $rowPerFirm['firm_name'];
                                                            }
                                                            $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 19));
                                                            //
                                                            //Start To set barcode color as per purity @AUTHOR: SANDY21OCT13
                                                            $tunch = $rowInItemBarCode['sttr_purity'];
                                                            //
                                                            parse_str(getTableValues("SELECT itm_tunch_bctext FROM item_tunch WHERE itm_tunch_value = '$tunch'"));
                                                            //
                                                            if ($itm_tunch_bctext != '' && $itm_tunch_bctext != NULL) {
                                                                $tunch = $itm_tunch_bctext;
                                                            } else {
                                                                $tunch = $tunch . '%';
                                                            }
                                                            //
                                                            $metal = $rowInItemBarCode['sttr_product_type'];
                                                            //
                                                            $imgId = $rowInItemBarCode['sttr_image_id'];
                                                            //                                echo '$imgId:'.$imgId;
                                                            $qSelBarcodeColor = "SELECT itm_tunch_bccolor,itm_tunch_bctext FROM item_tunch where itm_tunch_own_id='$_SESSION[sessionOwnerId]' and itm_tunch_value='$tunch' and itm_tunch_metal_type='$metal'";
                                                            $resBarcodeColor = mysqli_query($conn, $qSelBarcodeColor);
                                                            $rowBarcodeColor = mysqli_fetch_array($resBarcodeColor, MYSQLI_ASSOC);
                                                            $barCodeText = $rowBarcodeColor['itm_tunch_bctext'];
                                                            $barCodeText = om_strtoupper(substr($barCodeText, 0, 18));
                                                            //Start To set barcode color as per purity @AUTHOR: SANDY21OCT13                    
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

                                                            if ($barCodeSize == 'large') {
                                                                $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 22));
                                                                $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 22)));
                                                                $barCodeText = om_strtoupper(substr($barCodeText, 0, 16));
                                                                $barCodeHeight = '';
                                                                $bisHeight = '';
                                                            } else if ($barCodeSize == 'medium') {
                                                                $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 11));
                                                                $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 17)));
                                                                $barCodeText = om_strtoupper(substr($barCodeText, 0, 11));
                                                                $barCodeHeight = '7px';
                                                                $bisHeight = '9px';
                                                                if (strlen($bcItemWt) >= 8) {
                                                                    $bcItemWtType = om_strtoupper(substr($bcItemWtType, 0, 1));
                                                                    $bcItemNtWtType = om_strtoupper(substr($bcItemNtWtType, 0, 1));
                                                                }
                                                            } else if ($barCodeSize == 'small') {
                                                                $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 15));
                                                                $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 15)));
                                                                $barCodeText = om_strtoupper(substr($barCodeText, 0, 3));
                                                                $barCodeHeight = '7px';
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
                                                        ?>
                                                            <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" width="100%" height="100%"
                                                                class="barcode_background_color_<?php echo $color; ?>" style="table-layout: fixed;border: 1px solid #c1c1c1;">
                                                                <tr>
                                                                    <td align="left" width="100%">
                                                                        <?php if ($bismark != 'NULL' && $bismark != '' && $bismark != 'FALSE') {
                                                                            parse_str(getTableValues("SELECT  omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'BisMark65L' and omin_panel='$panelName'"));

                                                                        ?>
                                                                            <div class="paddingLeft2" id="BisMark65L" style="font-size: <?php echo $fontSize; ?>;position:absolute;float:right;border:0px solid;
                                             cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">
                                                                                <img src="<?php echo $documentRoot; ?>/images/BIS18x12.png" alt="" height="<?php echo $bisHeight; ?>" />
                                                                            </div>
                                                                        <?php } ?>
                                                                        <!---------------------------Start change in code @Author:ANUJA24FEB15---------------------------------------------->
                                                                        <!---------------------------Start change in code @Author:ANUJA31MAR15---------------------------------------------->
                                                                        <?php
                                                                        //if ($imgId != NULL && $imgId != '') {
                                                                        ?>
                                                                            <!-- <div class="floatRight padBottom0 marginBottom0 marTopMin1 paddingRight5">
                                                                                <img src="<?php echo $documentRootBSlash; ?>/include/php/ogijbimg.php?imgId=<?php echo "$imgId"; ?>"
                                                                                    width="20px" height="20px" border="0" alt="image" />
                                                                            </div> -->
                                                                        <?php //} ?>
                                                                        <div class="paddingLeft2">
                                                                            <?php
                                                                            $sno = $bcItemPreId . '' . $bcItemPostId;
                                                                            if ($bcItemWt != '' || $bcItemWt != NULL) {
                                                                                $gswt = 'GW&dash;' . decimalVal($bcItemWt, 2) . ' ' . $bcItemWtType;
                                                                            }
                                                                            if ($bcItemNtWt != '' || $bcItemNtWt != NULL) {
                                                                                $ntwt = 'NW&dash;' . decimalVal($bcItemNtWt, 2) . ' ' . $bcItemNtWtType;
                                                                            }
                                                                            if ($itemfnwt != '' || $itemfnwt != NULL) {
                                                                                $itemfnwt = 'FW&dash;' . $itemfnwt . ' ' . $bcItemNtWtType;
                                                                            }
                                                                            if ($newItemFFNW != '' || $newItemFFNW != NULL) {
                                                                                $newItemFFNW = 'FFW&dash;' . $newItemFFNW . ' ' . $bcItemNtWtType;
                                                                            }

                                                                            if ($bcItemMkChrg != '' || $bcItemMkChrg != NULL) {
                                                                                $mkgChrgs = 'M&dash;' . $bcItemMkChrg . ' ' . $bcItemMkChrgType;
                                                                            }
                                                                            if ($valadd != '' || $valadd != NULL) {
                                                                                $valadd = 'WST&dash;' . $valadd . '%';
                                                                            }
                                                                            if ($valaddamt != '' || $valaddamt != NULL) {
                                                                                $valaddamt = 'WAT&dash;' . $valaddamt;
                                                                            }
                                                                            if ($valaddwt != '' || $valaddwt != NULL) {
                                                                                $valaddwt = 'WWT&dash;' . $valaddwt;
                                                                            }
                                                                            ?>
                                                                            <?php
                                                                            parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption1' and omin_panel='$panelName'"));
                                                                            ?>
                                                                            <div class="block84LText2" id="bc65lOption1" style="font-size: <?php echo $fontSize; ?>;position:absolute;float:right;border:0px solid;
                                             cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">
                                                                                <?php
                                                                                // echo "aaaa";
                                                                                call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="paddingLeft2">
                                                                            <?php
                                                                            parse_str(getTableValues("SELECT  omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption2' and omin_panel='$panelName'"));

                                                                            ?>
                                                                            <div class="paddingLeft2" id="bc65lOption2" style="font-size: <?php echo $fontSize; ?>;position:absolute;float:right;border:0px solid;
                                             cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">
                                                                                <?php
                                                                                call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($barCodeSize == 'large') { ?>
                                                                            <div>
                                                                                <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%" height="100%" class="block84LText10 marTopMin3">
                                                                                    <tr>
                                                                                        <td align="left" width="50%">
                                                                                            <?php
                                                                                            parse_str(getTableValues("SELECT  omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption3' and omin_panel='$panelName'"));
                                                                                            ?>
                                                                                            <div class="paddingLeft2" id="bc65lOption3" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;position:absolute;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos  . px; ?>;">
                                                                                                <?php
                                                                                                call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                                ?>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td align="right" width="50%">
                                                                                            <?php
                                                                                            parse_str(getTableValues("SELECT  omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption4' and omin_panel='$panelName'"));
                                                                                            ?>
                                                                                            <div class="paddingRight2" id="bc65lOption4" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;position:absolute;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">
                                                                                                <?php
                                                                                                call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                                ?>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        <?php } else if ($barCodeSize == 'medium') { ?>
                                                                            <div class="block84LText9 marTopMin3">
                                                                                <?php
                                                                                parse_str(getTableValues("SELECT  omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption3' and omin_panel='$panelName'"));
                                                                                ?>
                                                                                <div class="paddingLeft2" id="bc65lOption3" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;position:absolute;left:<?php echo $omx_pos . px; ?>;top:<?php echo ($omy_pos - 22) . px; ?>;">
                                                                                    <?php
                                                                                    call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                    ?>
                                                                                </div>
                                                                                <?php
                                                                                parse_str(getTableValues("SELECT  omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption4' and omin_panel='$panelName'"));
                                                                                ?>
                                                                                <div class="paddingLeft2" id="bc65lOption4" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;position:absolute;left:<?php echo ($omx_pos -69) . px; ?>;top:<?php echo $omy_pos . px; ?>;">
                                                                                    <?php
                                                                                    call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                        <div class="block84LText10 marTopMin3 div_full_width">
                                                                            <?php
                                                                            parse_str(getTableValues("SELECT  omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption5' and omin_panel='$panelName'"));
                                                                            ?>
                                                                            <div class="paddingLeft2" id="bc65lOption5" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;position:absolute;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">
                                                                                <?php
                                                                                call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%" height="100%" class="block84LText10 marTopMin3">
                                                                                <tr>
                                                                                    <td align="left" width="50%">
                                                                                        <?php
                                                                                        parse_str(getTableValues("SELECT  omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption6' and omin_panel='$panelName'"));
                                                                                        ?>
                                                                                        <div class="paddingLeft2" id="bc65lOption6" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;position:absolute;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">
                                                                                            <?php
                                                                                            call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                            ?>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td align="right" width="50%">
                                                                                        <?php
                                                                                        parse_str(getTableValues("SELECT  omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption7' and omin_panel='$panelName'"));
                                                                                        ?>
                                                                                        <div class="paddingRight2" id="bc65lOption7" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;position:absolute;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">
                                                                                            <?php
                                                                                            call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                            ?>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <!--class Added @Author: SHE14APR15-->
                                                                        <div>
                                                                            <?php
                                                                            parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption8' and omin_panel='$panelName'"));
                                                                            ?>
                                                                            <div class="paddingLeft2" id="bc65lOption8" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;position:absolute;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">
                                                                                <?php
                                                                                call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!---------------------------Start change in code @Author:ANUJA24FEB15---------------------------------------------->
                                                                        <div>
                                                                            <?php
                                                                            parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption9' and omin_panel='$panelName'"));
                                                                            ?>
                                                                            <div class="paddingLeft2" id="bc65lOption9" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;position:absolute;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">
                                                                                <?php
                                                                                call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize, $firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <?php
                                                                            parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65lOption10' and omin_panel='$panelName'"));
                                                                            ?>
                                                                            <div class="paddingLeft2" id="bc65lOption10" style="font-size: <?php echo $fontSize; ?>;border:0px solid;cursor:pointer;width:auto;position:absolute;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">
                                                                                <?php
                                                                                call65LSwitchCase($omin_value, $bcmetaltype, $captionvalue1, $sno, $bcItemName, $gswt, $ntwt, $mkgChrgs, $firmNameLabel, $tunch, $barCodeText, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $newItemFFNW, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $bcItemSize,$firmLogo1,$imgId,$documentRootBSlash,$sttr_item_category1,$sttr_item_model_no1,$sttr_item_other_info1,$sttr_price1);
                                                                                ?>
                                                                            </div>
                                                                            <!---------------------------End change in code @Author:ANUJA24FEB15---------------------------------------------->
                                                                            <!---------------------------End change in code @Author:ANUJA24FEB15---------------------------------------------->
                                                                            <!---------------------------End change in code @Author:ANUJA31MAR15---------------------------------------------->
                                                                            <div>
                                                                                <?php parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'bc65LOption' and omin_panel='$panelName'"));
                                                                                ?>
                                                                                <div class="paddingLeft2" id="bc65LOption" style="position:absolute;float:left;font-size:<?php echo $barcodeSize; ?>;border:0px solid;
                                                             cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">
                                                                                    <img style="width: 52px;height: 8px;" src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=84L&bar_id=<?php echo $bcItemPrefixId . $bcItemId; ?>"
                                                                                        alt="Barcode" height="<?php echo $barCodeHeight; ?>" />
                                                                                </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        <?php } ?>
                                                    </div>
                                                    <div id="barCodeCloseDiv<?php echo $counter; ?>" style="cursor: pointer;" class="marginLeftBarCode noPrint"
                                                        onclick="deleteItemBarCode65L('block65LDiv<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>', '<?php echo $bcId; ?>')">
                                                        <?php if ($divPrinted == TRUE) { ?>
                                                            <img src="<?php echo $documentRoot; ?>/images/img/cancel.png" alt="" class="noPrint" style="height:14px;" />
                                                        <?php } else { ?>
                                                            &nbsp;
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php } ?>
                                    <?php
                                        $counter++;
                                    }
                                    ?>
                                </tr>
                            <?php } ?>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <?php
        if ($totalNextItemBarCode > 0) {
        ?>
            <table border="0" cellpadding="0" cellspacing="0" align="center" style="width:210mm" class="marginTop7">
                <tr>
                    <?php
                    if ($pageNum > 1) {
                    ?>
                        <td align="right" class="printVisibilityHidden">
                            <form name="prev_barcode" id="prev_barcode"
                                action="javascript:navigationToNextBarcodePanel(<?php echo "$pageNum - 1"; ?>,'65LPaging');"
                                method="get"><input type="submit" value="Prev Barcodes" class="frm-btn"
                                    maxlength="30" size="15" /></form>
                        </td>
                    <?php
                    }
                    ?>
                    <?php
                    if ($totalItemBarCode > $barcodePerPage) {
                    ?>
                        <td align="right" width="110px" class="printVisibilityHidden">
                            <form name="next_Barcodes" id="next_Barcodes"
                                action="javascript:navigationToNextBarcodePanel(<?php echo $pageNum + 1; ?>,'65LPaging');"
                                method="get"><input type="submit" value="Next Barcodes" class="frm-btn"
                                    maxlength="30" size="15" /></form>
                        </td>
                    <?php
                    }
                    ?>
                </tr>
            </table>
        <?php } ?>
    <?php } ?>
    </div>
    <table border="0" cellspacing="5" cellpadding="5" class="noPrint">
        <td align="center" class="noPrint">
            <div id="a4SheetsPrintButtonDiv">
                <a style="cursor: pointer;"
                    onclick="printBarCodeA4Sheet('barCode65LDiv')" id="print_link">
                    <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print'
                        width="32px" height="32px" onload="draggable_barcode_setting('<?php echo $panelName; ?>');" class="noPrint" />
                </a>
            </div>
        </td>
    </table>

    <!-------------End code to add panel indiacator @Author:PRIYA17MAY14----------------->