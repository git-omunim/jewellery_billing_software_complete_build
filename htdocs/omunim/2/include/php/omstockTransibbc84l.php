<?php
/*
 * **************************************************************************************
 * @tutorial: Item Bar Code Print Panel Div
 * **************************************************************************************
 * 
 * Created on Apr 30, 2012 11:57:35 PM
 *
 * @FileName: omstockTransibbc84l.php
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
<?php
/* * ***********Start code to change file @Author:ANUJA4FEB15************************ */
$tags = $_GET['tags']; //var changed @Author:PRIYA07APR15
$panelName = 'BclPanel';
if ($tags != 'true') {
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
                <td align='center' width="8%">
                    <span style="font-size:15px;font-weight: 600">9</span>
                </td>
                <td align='center' width="8%">
                    <span style="font-size:15px;font-weight: 600">10</span>
                </td>
                <td align='center' width="8%">
                    <span style="font-size:15px;font-weight: 600">11</span>
                </td>
                <td align='center' width="8%">
                    <span style="font-size:15px;font-weight: 600">12</span>
                </td>

            </tr>
        <?php
        $valuePresentInTable = updateOptionValue('bc84lOption1', 'productid', 'selValue', '');
        if ($valuePresentInTable == '') {
            $valuePresentInTable = updateOptionValue('bc84lOption1', 'productid', 'selValue', 'barCode');
            updateOptionValue('bc84lOption1', 'productid', 'selValue', 'barCode');
            updateOptionValue('bc84lOption2', 'itemname', 'selValue', 'barCode');
            updateOptionValue('bc84lOption3', 'itemwt', 'selValue', 'barCode');
            updateOptionValue('bc84lOption4', 'itemnwt', 'selValue', 'barCode');
            updateOptionValue('bc84lOption5', 'cryval', 'selValue', 'barCode');
            updateOptionValue('bc84lOption6', 'mkgch', 'selValue', 'barCode');
            updateOptionValue('bc84lOption7', 'crywt', 'selValue', 'barCode');
            updateOptionValue('bc84lOption8', 'firm', 'selValue', 'barCode');
            updateOptionValue('bc84lOption9', 'price', 'selValue', 'barCode');
            updateOptionValue('bc84lOption10', 'otherInfo', 'selValue', 'barCode'); // add Option @Author:ANUJA24FEB15
            updateOptionValue('bc84lOption11', 'barcodeNumber', 'selValue', 'barCode');  //START CODE FOR ADDDED BIS LOGO ON TAG AUTHPR @SIMRAN-27JUNE2022-->
            updateOptionValue('bc84lOption12', 'itmsize', 'selValue', 'barCode');  //START CODE FOR ADDDED ITEM SIZE AUTHPR @SIMRAN-09AUG2022-->
//            
        }
//        $valueMobPresentInTable = updateOptionValue('loanBcOption9', 'custMob', 'selValue', '');
//        if ($valueMobPresentInTable == '') {
//            updateOptionValue('loanBcOption8', 'custMob', 'selValue', 'barCode');
//            updateOptionValue('loanBcOption9', 'itemname', 'selValue', 'barCode');
//            updateOptionValue('loanBcOption10', 'otherInfo', 'selValue', 'barCode');
//        }
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption1'"));
        // echo "SELECT omin_value FROM omindicators where omin_option = 'loanBc65lOption1'";
        callImiLoanBCLFunc85l('bc84lOption1', $omin_value, $panelName);
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption2'"));
        callImiLoanBCLFunc85l('bc84lOption2', $omin_value, $panelName);
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption3'"));
        callImiLoanBCLFunc85l('bc84lOption3', $omin_value, $panelName);
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption4'"));
        callImiLoanBCLFunc85l('bc84lOption4', $omin_value, $panelName);
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption5'"));
        callImiLoanBCLFunc85l('bc84lOption5', $omin_value, $panelName);
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption6'"));
        callImiLoanBCLFunc85l('bc84lOption6', $omin_value, $panelName);
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption7'"));
        callImiLoanBCLFunc85l('bc84lOption7', $omin_value, $panelName);
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption8'"));
        callImiLoanBCLFunc85l('bc84lOption8', $omin_value, $panelName);
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption9'"));
        callImiLoanBCLFunc85l('bc84lOption9', $omin_value, $panelName);
        /*         * ****************** Start code to add Button @Author:ANUJA24FEB15 *********************************** */
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption10'"));
        callImiLoanBCLFunc85l('bc84lOption10', $omin_value, $panelName);
        /*         * ****************** End code to add Button @Author:ANUJA24FEB15 *********************************** */

        //START CODE FOR ADDDED BIS LOGO ON TAG AUTHPR @SIMRAN-27JUNE2022-->
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption11'"));
        callImiLoanBCLFunc85l('bc84lOption11', $omin_value, $panelName);
        //END CODE FOR ADDDED BIS LOGO ON TAG AUTHPR @SIMRAN-27JUNE2022-->
        //
        //
        //START CODE FOR ADDDED ITEM SIZE ON TAG AUTHPR @SIMRAN-09AUG2022-->
        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption12'"));
        callImiLoanBCLFunc85l('bc84lOption12', $omin_value, $panelName);
        //END CODE FOR ADDDED ITEM SIZE ON TAG AUTHPR @SIMRAN-09AUG2022-->
        ?>
    </table>
    <?php
}
/* * ******ENd code to @Author:ANUJA4FEB15************ */
?>
<?php
/* * ******Start code to add panel indiacator @Author:PRIYA16MAY14************ */
if ($_SESSION['sessionOwnIndStr'][7] == 'Y' || $_SESSION['sessionOwnIndStr'][7] == 'A') {
    ?>
    <?php
    $sessionOwnerId = $_SESSION['sessionOwnerId'];
//OPTION ID
    $omLayoutOptionTop = '84LBCTOPMARGIN';
    $omLayoutOptionLeft = '84LBCLEFTMARGIN';
    $omLayFontSize = '84LBCBLOCKFONTSIZE';
    $omLayOptBlockWidth = '84LBCBLOCKWIDTH';
    $omLayOptBlockHeight = '84LBCBLOCKHEIGHT';
    $omLayOptSlipWidth = '84LBCBLOCKSLIPWIDTH';
    $omLayOptSlipHeight = '84LBCBLOCKSLIPHEIGHT';
    $omLayoutOptionBorder = '84LBCBORDER';
    $omLayoutBCSize = '84LBCSIZE';
    $omLayoutOptionNoOfRows = '84LNOOFROWS';

//SELECT OPTION VALUE
    $noOfRows = updateOptionValue($omLayoutOptionNoOfRows, '', 'selValue', '');
    if ($noOfRows == '')
        $noOfRows = '21';
    $checkBarCodeBorder = updateOptionValue($omLayoutOptionBorder, '', 'selValue', '');
    if ($checkBarCodeBorder == 'YES') {
        $barCodeBorder = 'solid 1px #C7C5C8';
    } else {
        $barCodeBorder = 'solid 1px #FFFFFF';
    }
    $topMargin = updateOptionValue($omLayoutOptionTop, '', 'selValue', '');
    $leftMargin = updateOptionValue($omLayoutOptionLeft, '', 'selValue', '');
    $blockWidth = updateOptionValue($omLayOptBlockWidth, '', 'selValue', '');
    $blockHeight = updateOptionValue($omLayOptBlockHeight, '', 'selValue', '');
    $slipWidth = updateOptionValue($omLayOptSlipWidth, '', 'selValue', '');
    $slipHeight = updateOptionValue($omLayOptSlipHeight, '', 'selValue', '');
    $barCodeSize = updateOptionValue($omLayoutBCSize, '', 'selValue', '');
    
// *************************************************************************************************************
// START CODE FOR SHOW WHOLESALE ITEM DEATILS AT 84L STOCK @SIMRAN-01JULY2022
// *************************************************************************************************************
    $qSelwholesaleDetail84lstock = "SELECT omly_value FROM omlayout WHERE omly_option = 'wholesaleDetail84lstock'";
    $reswholesaleDetail84lstock = mysqli_query($conn, $qSelwholesaleDetail84lstock);
    $rowwholesaleDetail84lstock = mysqli_fetch_array($reswholesaleDetail84lstock);
    $wholesaleDetail84lstock = $rowwholesaleDetail84lstock['omly_value'];
// *************************************************************************************************************
// END CODE FOR SHOW WHOLESALE ITEM DEATILS AT 84L STOCK @SIMRAN-01JULY2022
// *************************************************************************************************************
// 

    
//CLASS VAR
    if ($barCodeSize == 'size') {
        $labelLeftMargin = '0MM';
        $labelRightMargin = '0MM';
        $labelTopMargin = '0MM';
        $labelBottomMargin = '0MM';
    } else if ($barCodeSize == 'large') {
//    updateOptionValue($omLayOptSlipWidth, '46MM', 'update', '');
//    updateOptionValue($omLayOptSlipHeight, '11MM', 'update', '');
        $slipWidth = '46MM';
        $slipHeight = '11MM';
        $labelLeftMargin = '0MM';
        $labelRightMargin = '0MM';
        $labelTopMargin = '0MM';
        $labelBottomMargin = '0MM';
        //  $height84l = '2.75MM';
        $deleteLeftMargin = $slipWidth - 2;
        $deleteTopMargin = $slipHeight + 2;
    } else if ($barCodeSize == 'medium') {
//    updateOptionValue($omLayOptSlipWidth, '44MM', 'update', '');
//    updateOptionValue($omLayOptSlipHeight, '1MM', 'update', '');
        $slipWidth = '44MM';
        $slipHeight = '10MM';
        $labelLeftMargin = '3MM';
        $labelRightMargin = '3MM';
        $labelTopMargin = '1MM';
        $labelBottomMargin = '1MM';
        // $height84l = '2.5MM';
    } else if ($barCodeSize == 'small') {
//    updateOptionValue($omLayOptSlipWidth, '42MM', 'update', '');
//    updateOptionValue($omLayOptSlipHeight, '9MM', 'update', '');
        $slipWidth = '42MM';
        $slipHeight = '9MM';
        $labelLeftMargin = '4MM';
        $labelRightMargin = '4MM';
        $labelTopMargin = '1.5MM';
        $labelBottomMargin = '1.5MM';
        // $height84l = '2.25MM';
    }
    $fontSize = updateOptionValue($omLayFontSize, '', 'selValue', '');

    if ($barCodeSize == 'large' || $barCodeSize == 'size') {
        $deleteLeftMargin = $slipWidth - 2;
        $deleteTopMargin = $slipHeight + 2;
    } else if ($barCodeSize == 'medium') {
        $deleteLeftMargin = $slipWidth + 1;
        $deleteTopMargin = $slipHeight + 3;
    } else if ($barCodeSize == 'small') {
        $deleteLeftMargin = $slipWidth + 2;
        $deleteTopMargin = $slipHeight + 2.7;
    }
    include 'ombcclass.php';
    ?>

    <div id="barCode84L">
        <div id="headerItemBarCode" style="margin:auto;">
            <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" class="table84L" width="100%">
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

                $barcodePerPage = 84;
                $checkNextBarcode = $barcodePerPage * 2;
                $pageNum = 1;
                if (isset($_GET['page'])) {
                    $pageNum = $_GET['page'];
                }
                $perOffset = ($pageNum - 1) * $barcodePerPage;
         //************************************************************************************************************************************************
         //  ADDED CODE FOR SHOW WHOLESALE ITEM DETAILS AT 84L STOCK @AUTHOR SIMRAN-01JULY2022
         //************************************************************************************************************************************************
              if($wholesaleDetail84lstock == 'NO'){
                  
                     $qSelInItemBarCode = "SELECT * FROM stock_transaction where sttr_gs_weight!='0' and sttr_stock_type != 'wholesale' and sttr_status NOT IN ('DELETED','SOLDOUT') and "
                            . "sttr_indicator NOT IN ('stockCrystal','imitation','rawMetal') and sttr_transaction_type NOT IN ('newOrder','sell','ESTIMATESELL','APPROVAL') and sttr_firm_id IN ($strFrmId) order by sttr_id desc LIMIT $perOffset,$checkNextBarcode"; 
              }else{

                if ($_SESSION['sessionProdName'] == 'OMRETL') {
                    $qSelInItemBarCode = "SELECT * FROM stock_transaction where "
                            . "sttr_indicator!='stockCrystal' and sttr_transaction_type!='sell'  and sttr_firm_id IN ($strFrmId) order by sttr_id desc LIMIT $perOffset,$checkNextBarcode";
                } else {
                    $qSelInItemBarCode = "SELECT * FROM stock_transaction where sttr_gs_weight!='0'  and sttr_status NOT IN ('DELETED','SOLDOUT') and "
                            . "sttr_indicator NOT IN ('stockCrystal','imitation','rawMetal') and sttr_transaction_type NOT IN ('newOrder','sell','ESTIMATESELL','APPROVAL') and sttr_firm_id IN ($strFrmId) order by sttr_id desc LIMIT $perOffset,$checkNextBarcode";
                }
                
              }
         //************************************************************************************************************************************************
         //  END CODE FOR SHOW WHOLESALE ITEM DETAILS AT 84L STOCK @AUTHOR SIMRAN-01JULY2022
         //************************************************************************************************************************************************
                $resInItemBarCode = mysqli_query($conn, $qSelInItemBarCode);
                $totalItemBarCode = mysqli_num_rows($resInItemBarCode);

                if ($_SESSION['sessionProdName'] == 'OMRETL') {
                    $qSelInItemBarCode1 = "SELECT * FROM stock_transaction where "
                            . "sttr_indicator!='stockCrystal' and sttr_transaction_type!='sell' and sttr_firm_id IN ($strFrmId) order by sttr_id desc LIMIT $perOffset,$barcodePerPage";
                } else {
                    $qSelInItemBarCode1 = "SELECT * FROM stock_transaction where sttr_gs_weight!='0' and sttr_status NOT IN ('DELETED','SOLDOUT') and "
                            . "sttr_indicator NOT IN ('stockCrystal') and sttr_transaction_type NOT IN ('newOrder','sell','ESTIMATESELL','APPROVAL') and sttr_firm_id IN ($strFrmId) order by sttr_id desc LIMIT $perOffset,$barcodePerPage";
                }

                $resInItemBarCode1 = mysqli_query($conn, $qSelInItemBarCode1);
                $totalNextItemBarCode = mysqli_num_rows($resInItemBarCode1);

                $counter = 1;
                ?>
                <tr>
                    <td valign="top" align="left">
                        <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" width="100%">
                            <?php
                            for ($row = 1; $row <= $noOfRows; $row++) {
                                ?>
                                <tr>
                                    <?php
                                    for ($col = 1; $col <= 4; $col++) {
                                        ?>
                                        <td class="block84L" valign="top" style="border:1px solid #c1c1c1;position: relative;">
                                            <div id="block84LDiv<?php echo $counter; ?>" class="block84LDiv"
                                                 ondblclick="moveBarCodeSlip84L('block84LDiv<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>')" 
                                                 title="Please Double click to move the slip!">
                                                     <?php
                                                     $divPrinted = FALSE;
                                                     if ($rowInItemBarCode = mysqli_fetch_array($resInItemBarCode, MYSQLI_ASSOC)) {
                                                         $bcId = $rowInItemBarCode['sttr_id'];
                                                         $bcFirmId = $rowInItemBarCode['sttr_firm_id'];
                                                         $bcItemId = $rowInItemBarCode['sttr_barcode'];
                                                         $bcItemPreId = trim($rowInItemBarCode['sttr_item_pre_id']);
                                                         $bcItemPostId = trim($rowInItemBarCode['sttr_item_id']);
                                                         $bcItemName = trim($rowInItemBarCode['sttr_item_name']);
                                                         $bcItemWt = trim($rowInItemBarCode['sttr_gs_weight']);
                                                         $bcItemWtType = trim($rowInItemBarCode['sttr_gs_weight_type']);
                                                         $bcItemNtWt = trim($rowInItemBarCode['sttr_nt_weight']);
                                                         $bcItemCustPri = trim($rowInItemBarCode['sttr_cust_price']);
                                                         $bcItemNtWtType = trim($rowInItemBarCode['sttr_nt_weight_type']);
                                                         $bcItemCrystalVal = intval($rowInItemBarCode['sttr_stone_amt']);
                                                         $bcItemCryNtWt = trim($rowInItemBarCode['sttr_stone_wt']);
                                                         $bcItemCryNtWtType = trim($rowInItemBarCode['sttr_stone_wt_type']);
                                                         $bcItemMkChrg = trim($rowInItemBarCode['sttr_making_charges']);
                                                         $bcItemMkChrgType = trim($rowInItemBarCode['sttr_making_charges_type']);
                                                         $bismark = trim($rowInItemBarCode['sttr_bis_mark']);
                                                         $bcItemPrefixId = trim($rowInItemBarCode['sttr_barcode_prefix']);
                                                         $girviOtherInfo = trim($rowInItemBarCode['sttr_other_info']);
                                                         $bcItemSize = trim($rowInItemBarCode['sttr_size']);                    //ADDED ITEM SIZE @AUTHOR SIMRAN-09AUG2022


                                                         if ($bcItemPrefixId == '' && $bcItemPrefixId == NULL || $bcItemPrefixId === 'undefined') {
                                                             $bcItemPrefixId = 1;
                                                         }
//                                                         if ($bcItemPrefixId == '2' && $girviOtherInfo == 'WholeSale') {
//                                                             $bcItemId = $bcItemPreId;
//                                                         }
                                                         $divPrinted = TRUE;

                                                         $qSelPerFirm = "SELECT firm_name,firm_long_name FROM firm 
                                                     where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$bcFirmId'";
                                                         $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                                                         $rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC);
                                                         $firmNameLabel = $rowPerFirm['firm_long_name'];
                                                         if ($firmNameLabel == '') {
                                                             $firmNameLabel = $rowPerFirm['firm_name'];
                                                         }
                                                         $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 19));

                                                         $tunch = $rowInItemBarCode['sttr_purity'];
                                                         $metal = $rowInItemBarCode['sttr_product_type'];
                                                         $qSelBarcodeColor = "SELECT itm_tunch_bccolor,itm_tunch_bctext FROM item_tunch where itm_tunch_own_id='$_SESSION[sessionOwnerId]' and itm_tunch_value='$tunch' and itm_tunch_metal_type='$metal'";
                                                         $resBarcodeColor = mysqli_query($conn, $qSelBarcodeColor);
                                                         $rowBarcodeColor = mysqli_fetch_array($resBarcodeColor, MYSQLI_ASSOC);
                                                         $color = $rowBarcodeColor['itm_tunch_bccolor'];
                                                         $barCodeText = $rowBarcodeColor['itm_tunch_bctext'];

                                                         if ($color == '') {
                                                             $color = 'white';
                                                         }
                                                         if ($barCodeSize == 'large') {
                                                             $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 18));
                                                             $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 12)));
                                                             $barCodeText = om_strtoupper(substr($barCodeText, 0, 16));
                                                             $bisHeight = '';
                                                             $barCodeHeight = '6px';
                                                         } else if ($barCodeSize == 'medium') {
                                                             $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 11));
                                                             $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 11)));
                                                             $barCodeText = om_strtoupper(substr($barCodeText, 0, 5));
                                                             $bisHeight = '9px';
                                                             $barCodeHeight = '6px';
                                                         } else if ($barCodeSize == 'small') {
                                                             $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 10));
                                                             $bcItemName = trim(om_strtoupper(substr($bcItemName, 0, 10)));
                                                             $barCodeText = om_strtoupper(substr($barCodeText, 0, 3));
                                                             $bisHeight = '9px';
                                                             $barCodeHeight = '6px';
                                                         }
                                                         ?>  
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%" height="100%" class="barcode_background_color_<?php echo $color; ?>" >
                                                        <tr>
                                                            <td align="left" width="50%" class="borderRightDotted" valign="middle">
                                                                <!--START CODE FOR ADDDED BIS LOGO ON TAG AUTHPR @SIMRAN-27JUNE2022-->
                                                                <?php
                                                                if ($bismark == 'FALSE' || $bismark == 'NULL' || $bismark == '') {
                                                                    '&nbsp;';
                                                                } else {
                                                                    ?>
                                                                    <div class="floatRight padBottom0 marginBottom0 paddingRight5">
                                                                        <img src="<?php echo $documentRoot; ?>/images/BIS18x12.png" alt="" height="<?php echo $bisHeight; ?>"/>
                                                                    </div>
                                                                <?php } ?>
                                                                <!--START CODE FOR ADDDED BIS LOGO ON TAG AUTHPR @SIMRAN-27JUNE2022-->
                                                                <!---------------------------Start change in code @Author:ANUJA10FEB15---------------------------------------------->  
                                                                <div class="block84LText9 paddingLeft2 padBottom0 marginBottom0 marTopMin2">
                                                                    <?php $bcItemPreId; ?><?php $bcItemPostId; ?> 
                                                                    <?php
                                                                    parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption1'"));
                                                                    callImiSwitchbcCase85l($omin_value, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $bcItemCrystalVal, $bcItemCryNtWt, $bcItemCryNtWtType, $firmNameLabel, $bcItemCustPri, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $bcItemSize, $barcodeNo);
                                                                    ?>
                                                                </div>
                                                                <div class="block84LText9 paddingLeft2 marTopMin2">
                                                                    <?php $bcItemWt; ?><?php '' . $bcItemWtType; ?> 
                                                                    <?php
                                                                    parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption2'"));
                                                                    callImiSwitchbcCase85l($omin_value, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $bcItemCrystalVal, $bcItemCryNtWt, $bcItemCryNtWtType, $firmNameLabel, $bcItemCustPri, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $bcItemSize,$barcodeNo);
                                                                    ?>
                                                                </div>
                                                                <div class="floatLeft divWidthPX">
                                                                    <div class="block84LText9 paddingLeft2 floatLeft marTopMin2">
                                                                        <?php
                                                                        if ($bcItemNtWt == NULL || $bcItemNtWt == '' || $bcItemNtWt == 0) {
                                                                            '&nbsp;';
                                                                        } else {
                                                                            $bcItemNtWt . '' . $bcItemNtWtType;
                                                                        }
                                                                        ?> 
                                                                        <?php
                                                                        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption3'"));
                                                                        callImiSwitchbcCase85l($omin_value, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $bcItemCrystalVal, $bcItemCryNtWt, $bcItemCryNtWtType, $firmNameLabel, $bcItemCustPri, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $bcItemSize,$barcodeNo);
                                                                        ?>
                                                                    </div> 
                                                                    <div class="block84LText9 paddingRight2 floatRight marTopMin2">
                                                                        <?php
                                                                        if ($bcItemCryNtWt == NULL || $bcItemCryNtWt == '' || $bcItemCryNtWt == 0) {
                                                                            '&nbsp;';
                                                                        } else {
                                                                            'CW&dash;' . $bcItemCryNtWt . '' . $bcItemCryNtWtType;
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption4'"));
                                                                        callImiSwitchbcCase85l($omin_value, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $bcItemCrystalVal, $bcItemCryNtWt, $bcItemCryNtWtType, $firmNameLabel, $bcItemCustPri, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo,$bcItemSize, $barcodeNo);
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="floatLeft divWidthPX">
                                                                    <div class="block84LText8 paddingLeft2 floatLeft marTopMin2">
                                                                        <?php
                                                                        if ($bcItemMkChrg == NULL || $bcItemMkChrg == '' || $bcItemMkChrg == 0) {
                                                                            '&nbsp;';
                                                                        } else {
                                                                            'M&dash;' . $bcItemMkChrg . '' . $bcItemMkChrgType;
                                                                        }
                                                                        ?> 
                                                                        <?php
                                                                        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption5'"));
                                                                        callImiSwitchbcCase85l($omin_value, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $bcItemCrystalVal, $bcItemCryNtWt, $bcItemCryNtWtType, $firmNameLabel, $bcItemCustPri, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo,$bcItemSize, $barcodeNo);
                                                                        ?>
                                                                    </div>
                                                                    <div class="block84LText8 paddingRight2 floatRight marTopMin2">
                                                                        <?php
                                                                        if ($bcItemCrystalVal == NULL || $bcItemCrystalVal == '' || $bcItemCrystalVal == 0) {
                                                                            '&nbsp;';
                                                                        } else {
                                                                            '&nbsp;CV&dash;' . $bcItemCrystalVal;
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption6'"));
                                                                        callImiSwitchbcCase85l($omin_value, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $bcItemCrystalVal, $bcItemCryNtWt, $bcItemCryNtWtType, $firmNameLabel, $bcItemCustPri, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo,$bcItemSize, $barcodeNo);
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td align="left" width="50%" class="paddingLeft1" valign="middle">
                                                                <div class="block84LText9 paddingLeft1 marTopMin1">
                                                                    <?php $bcItemName; ?>
                                                                    <?php
                                                                    parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption7'"));
                                                                    callImiSwitchbcCase85l($omin_value, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $bcItemCrystalVal, $bcItemCryNtWt, $bcItemCryNtWtType, $firmNameLabel, $bcItemCustPri, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo,$bcItemSize, $barcodeNo);
                                                                    ?>
                                                                </div>
                                                                <div class="block84LText9 paddingLeft1 marTopMin2">
                                                                    <?php
                                                                    if ($barCodeText == NULL || $barCodeText == '')
                                                                        echo '&nbsp;';
                                                                    else
                                                                        echo $barCodeText;
                                                                    ?>
                                                                </div>
                                                                <div class="block84LText6 paddingLeft1">
                                                                    <img src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=84L&bar_id=<?php echo $bcItemPrefixId . $bcItemId; ?>" 
                                                                         alt="BC: <?php echo $bcItemPrefixId . $bcItemId; ?>" height="<?php echo $barCodeHeight; ?>" />
                                                                         <?php
                                                                         parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption5'"));
                                                                         callImiSwitchbcCase85l($omin_value, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $bcItemCrystalVal, $bcItemCryNtWt, $bcItemCryNtWtType, $firmNameLabel, $bcItemCustPri, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo,$bcItemSize, $barcodeNo);
                                                                         ?>
                                                                </div>
                                                                <div class="block84LText8 paddingLeft1 marTopMin1">
                                                                    <?php
                                                                    $firmNameLabel = $rowPerFirm['firm_long_name'];
                                                                    if ($firmNameLabel == '') {
                                                                        $firmNameLabel = $rowPerFirm['firm_name'];
                                                                    }
                                                                    $firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 19));
                                                                    ?>
                                                                    <?php
                                                                    parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption8'"));
                                                                    callImiSwitchbcCase85l($omin_value, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $bcItemCrystalVal, $bcItemCryNtWt, $bcItemCryNtWtType, $firmNameLabel, $bcItemCustPri, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo,$bcItemSize, $barcodeNo);
                                                                    ?>
                                                                    <!---------------------------End change in code @Author:ANUJA10FEB15----------------------------------------------> 
                                                                    <!---------------------------Start add div  in code @Author:ANUJA24FEB15---------------------------------------------->  
                                                                </div>
                                                                <div class="block84LText8 paddingLeft1 marTopMin1">
                                                                    <?php
                                                                    if ($bcItemCustPri == NULL || $bcItemCustPri == '')
                                                                        '&nbsp;';
                                                                    else
                                                                        $bcItemCustPri;
                                                                    ?>
                                                                    <?php
                                                                    parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption9'"));
                                                                    callImiSwitchbcCase85l($omin_value, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $bcItemCrystalVal, $bcItemCryNtWt, $bcItemCryNtWtType, $firmNameLabel, $bcItemCustPri, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo,$bcItemSize, $barcodeNo);
                                                                    ?>
                                                                    <!---------------------------Start add div  in code @Author:ANUJA24FEB15---------------------------------------------->  
                                                                    <!---------------------------End change in code @Author:ANUJA10FEB15---------------------------------------------->  
                                                                </div>
                                                                <!--START CODE FOR ADDDED BIS LOGO ON TAG AUTHPR @SIMRAN-27JUNE2022-->
                                                                <div class="block84LText9 paddingLeft2 marTopMin2">
                                                                    <?php
                                                                    $barcodeNo = $bcItemPrefixId . $bcItemId;   
                                                                    ?>
                                                                    <?php
                                                                    parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption11'"));
                                                                    callImiSwitchbcCase85l($omin_value, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $bcItemCrystalVal, $bcItemCryNtWt, $bcItemCryNtWtType, $firmNameLabel, $bcItemCustPri, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo,$bcItemSize, $barcodeNo);
                                                                    ?>
                                                                </div>
                                                                <!--END CODE FOR ADDDED BIS LOGO ON TAG AUTHPR @SIMRAN-27JUNE2022-->
                                                                <div class="block84LText9 paddingLeft2 marTopMin2">
                                                                    <?php $bcItemSize; ?>
                                                                    <?php
                                                                    parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'bc84lOption12'"));
                                                                    callImiSwitchbcCase85l($omin_value, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $bcItemCrystalVal, $bcItemCryNtWt, $bcItemCryNtWtType, $firmNameLabel, $bcItemCustPri, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $bcItemSize, $barcodeNo);
                                                                    ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                            <div id="barCodeCloseDiv<?php echo $counter; ?>" style="cursor: pointer;right:4px;margin-top:-10mm" class="marginLeftBarCode84L noPrint"
                                                 onclick="deleteItemBarCode84L('block84LDiv<?php echo $counter; ?>', 'barCodeCloseDiv<?php echo $counter; ?>', '<?php echo $bcId; ?>')">
                                                     <?php if ($divPrinted == TRUE) { ?>
                                                    <img src="<?php echo $documentRoot; ?>/images/img/cancel.png" alt="" class="noPrint" style="height:14px;"/>
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
        if ($totalNextItemBarCode > 0) {
            ?>
            <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" class="marginTop7">
                <tr>
                    <?php
                    if ($pageNum > 1) {
                        ?>
                        <td align="right">
                            <form name="prev_barcode" id="prev_barcode"
                                  action="javascript:navigationToNextBarcodePanel(<?php echo "$pageNum - 1"; ?>,'84LPaging');"
                                  method="get"><input type="submit" value="Prev Barcodes" 
                                                maxlength="30" size="15" style="background: #dceaff;color: #0a0c87;border: 1px solid #5f9df5;border-radius: 6px !important;padding: 2px 10px;font-size:16px;font-weight:600;"/></form>
                        </td>
                        <?php
                    }
                    ?>
                    <?php
                    if ($totalItemBarCode > $barcodePerPage) {
                        ?>
                        <td align="right" width="110px">
                            <form name="next_Barcodes" id="next_Barcodes"
                                  action="javascript:navigationToNextBarcodePanel(<?php echo "$pageNum + 1"; ?>,'84LPaging');"
                                  method="get"><input type="submit" value="Next Barcodes" style="background: #dceaff;color: #0a0c87;border: 1px solid #5f9df5;border-radius: 6px !important;padding: 2px 10px;font-size:16px;font-weight:600;"
                                                maxlength="30" size="15" /></form>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
            </table>
            <table border="0" cellspacing="5" cellpadding="5" class="noPrint" width="100%" align="center">
                <td align="center" class="noPrint">
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
<?php } ?>
<!-------------End code to add panel indiacator @Author:PRIYA17MAY14---------------><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

