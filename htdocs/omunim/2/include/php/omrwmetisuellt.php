<?php
/*
 * **************************************************************************************
 * @Description:  RAW METAL ISSUE LIST : @DARSHANA 22 SEPT 2021
 * **************************************************************************************
 *
 * Created on Dec 20, 2016 5:36:21 PM
 *
 * @FileName: ogrwwscsllt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 1.0.0
 * Version: 1.0.0
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'conversions.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
?>
<div id="stockPanelSellList">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="brdrgry-dashed">
        <?php
        //
        //echo '$strFrmId @@== ' . $strFrmId . '<br />';
        //echo '$userId ##== ' . $userId . '<br />';
        //Start Code To Select FirmId
        if ($_SESSION['setFirmSession'] != '') {
            $strFrmId = $_SESSION['setFirmSession'];
        } else {
            $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
        }

        if ($userId == '' || $userId == NULL) {
            $userId = $_GET['userId'];
        }

        if ($mainPanel == '') {
            $mainPanel = $_GET['mainPanel'];
        }

        if ($metType == '') {
            $metType = $_GET['transType'];
        }

        if ($metType == '') {
            $metType = $_GET['metType'];
        }

        if ($mainPanel == 'Customer') {
            $rmslType = 'CustMetalPurchase';
        } else {
            $rmslType = 'SuppMetalPurchase';
        }
        //End Code To Select FirmId

        $divName = 'cust_middle_body';

        $panel = 'MetalToCashPurchaseList';
        $rowPanelName = $_GET['stockUpdateRows'];

        if ($rowPanelName == 'StockUpdateRows') {
            $rowsPerPage = $_GET['rowsPerPage'];
            $ominValue = $rowsPerPage;
            $ominOption = 'indistpnrw';
            include 'ommpindc.php';
        }

        $qSelGNoOfRows = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'indistpnrw'";
        $resGNoOfRows = mysqli_query($conn, $qSelGNoOfRows);
        $rowGNoOfRows = mysqli_fetch_array($resGNoOfRows, MYSQLI_ASSOC);
        $rowsPerPage = $rowGNoOfRows['omin_value'];

        if ($rowsPerPage == '' || $rowsPerPage == NULL || $rowsPerPage == 0) {
            $rowsPerPage = 15;
        }

        // how many rows to show per page
        $checkNextRows = $rowsPerPage * 2;

        // by default we show first page
        $pageNum = 1;

        //print_r($_REQUEST);
        // if $_GET['page'] defined, use it as page number
        if ($_GET['page'] != '' && $_GET['page'] != NULL) {
            $pageNum = $_GET['page'];
            //echo '$pageNum 1== ' . $pageNum . '<br />';
        }

        if ($_POST['page'] != '' && $_POST['page'] != NULL) {
            $pageNum = $_POST['page'];
            //echo '$pageNum 2== ' . $pageNum . '<br />';
        }

        if ($_REQUEST['page'] != '' && $_REQUEST['page'] != NULL) {
            $pageNum = $_REQUEST['page'];
            //echo '$pageNum 3== ' . $pageNum . '<br />';
        }
        //
        //**************************************************************************************************************
        // START CODE FOR VERIFY & DELETE INVOICE OPTION @SIMRAN:30OCT2023
        //**************************************************************************************************************
        $queryInvVerifyNdDeleteOption = "SELECT omly_value FROM omlayout WHERE omly_option = 'invVerifyNdDeleteOption'";
        $resInvVerifyNdDeleteOption = mysqli_query($conn, $queryInvVerifyNdDeleteOption);
        $rowInvVerifyNdDeleteOption = mysqli_fetch_array($resInvVerifyNdDeleteOption);
        $invVerifyNdDeleteOption = $rowInvVerifyNdDeleteOption['omly_value'];
        //**************************************************************************************************************
        // END CODE FOR VERIFY & DELETE INVOICE OPTION @SIMRAN:30OCT2023
        //**************************************************************************************************************
        //echo 'page == ' . $_GET['page'] . '<br />';
        //echo '$pageNum == ' . $pageNum . '<br />';
        //echo '$strFrmId == ' . $strFrmId . '<br />';
        //echo '$userId == ' . $userId . '<br />';
        // counting the offset
        $perOffset = ($pageNum - 1) * $rowsPerPage;

        $selFirmId = NULL;
        $sortKeyword = NULL;
        $searchColumn = NULL;
        $searchValue = NULL;
        $searchKeyword = NULL;
        $columName = NULL;
        $searchColumnStr = NULL;

        if (isset($_GET['searchKeyword'])) {
            $searchKeyword = $_GET['searchKeyword'];
        }

        if (isset($_GET['selFirmId'])) {
            $selFirmId = $_GET['selFirmId'];
        } else {
            $selFirmId = $_SESSION['setFirmSession'];
        }

        if (isset($_GET['sortKeyword'])) {
            $sortKeyword = $_GET['sortKeyword'];
        }

        if (isset($_GET['searchColumn'])) {
            $searchColumn = $_GET['searchColumn'];
        }

        if (isset($_GET['searchValue'])) {
            $searchValue = $_GET['searchValue'];
        }

        $searchColumnName = $searchColumn;
        $searchColumnValue = $searchValue;

        $sortKeyword = stripslashes($sortKeyword);
        $searchColumn = stripslashes($searchColumn);
        $sortKeywordValue = $sortKeyword;
        $sortKeywordValue = stripslashes($sortKeywordValue);
        $isAtrate = strpos($searchColumn, '@');

        if ($isAtrate == true) {
            $searchColumn = explode("@", $searchColumn);
            $searchColumn1 = $searchColumn[0];
            $searchColumn2 = $searchColumn[1];
            $searchColumn3 = $searchColumn[2];

            if ($searchColumn1 == 'sttr_pre_invoice_no') {
                $noStr = $searchValue;
                $noStrLen = strlen($searchValue);
                for ($count = 0; $count <= $noStrLen; $count++) {
                    if (is_numeric($noStr)) {
                        break;
                    }
                    $noStr = substr($noStr, 1);
                }
                $preInvId = substr($searchValue, 0, $count);
                $postInvId = $noStr;
                $searchColumnStr = " and $searchColumn1 = '$preInvId' and $searchColumn2 = '$postInvId' ";
            }
            if ($searchColumn1 == 'sttr_gs_weight' || $searchColumn1 == 'sttr_nt_weight' || $searchColumn == 'sttr_lab_charges_type') {
                $noStr = $searchValue;
                $noStrLen = strlen($searchValue);
                for ($count = 0; $count <= $noStrLen; $count++) {
                    if ((ctype_alpha($noStr))) {
                        break;
                    }
                    $noStr = substr($noStr, 1);
                }
                $wt = substr($searchValue, 0, $count);
                $wtType = $noStr;
                $searchColumnStr = " and $searchColumn1 = '$wt' and $searchColumn2 = '$wtType' ";
            }
        } else if ($searchColumn == 'sttr_quantity' || $searchColumn == 'sttr_purity' || $searchColumn == 'sttr_wastage' || $searchColumn == 'sttr_final_fine_weight') {
            if ($searchColumn != NULL)
                $searchColumnStr = " and $searchColumn = '$searchValue' ";
        } else {
            if ($searchColumn != NULL)
                $searchColumnStr = " and $searchColumn LIKE '$searchValue%' ";
        }

        if ($searchColumn == 'sttr_valuation' || $searchColumn == 'sttr_final_valuation') {
            $prinStartRange = stristr($searchValue, '-', TRUE);
            $endRange = stristr($searchValue, '-');
            $prinEndRange = substr($endRange, 1);
            if ($prinStartRange != '' && $prinEndRange != '') {
                $searchColumnStr = " and $searchColumn >= '$prinStartRange' and $searchColumn <= '$prinEndRange'";
            } else {
                $searchColumnStr = " and $searchColumn = '$searchValue' ";
            }
        }
        $fromDateTime = strtotime(strtoupper($fromDate));
        $toDateTime = strtotime(strtoupper($toDate));
        if ($sortKeyword != NULL) {
            if ($sortKeyword == 'sttr_valuation' || $sortKeyword == 'sttr_final_valuation')
                $qSelItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_firm_id IN ($strFrmId) AND sttr_transaction_type = 'sell' and sttr_status NOT IN ('DELETED') and (sttr_assign_status IS NULL or sttr_assign_status = '') AND sttr_item_category IN ('RawGold','RawSilver','OldGold','OldSilver','Other') AND sttr_user_id='$userId' order by convert($sortKeyword, decimal) asc LIMIT $perOffset, $rowsPerPage";
            else
                $qSelItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_firm_id IN ($strFrmId) AND sttr_transaction_type = 'sell' and sttr_status NOT IN ('DELETED') and (sttr_assign_status IS NULL or sttr_assign_status = '') AND sttr_item_category IN ('RawGold','RawSilver','OldGold','OldSilver','Other') AND sttr_user_id='$userId' order by $sortKeyword asc,sttr_since desc LIMIT $perOffset, $rowsPerPage";
            $qSelItemDetCount = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_firm_id IN ($strFrmId) AND sttr_transaction_type = 'sell' and sttr_status NOT IN ('DELETED') and (sttr_assign_status IS NULL or sttr_assign_status = '') AND sttr_item_category IN ('RawGold','RawSilver','OldGold','OldSilver','Other') AND sttr_user_id='$userId' order by $sortKeyword asc";
        } else if ($searchColumnStr != NULL) {
            $qSelItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_firm_id IN ($strFrmId) $searchColumnStr AND sttr_transaction_type = 'sell' and sttr_status NOT IN ('DELETED') and (sttr_assign_status IS NULL or sttr_assign_status = '') AND sttr_item_category IN ('RawGold','RawSilver','OldGold','OldSilver','Other') AND sttr_user_id='$userId' order by sttr_since desc LIMIT $perOffset, $rowsPerPage";
            $qSelItemDetCount = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_firm_id IN ($strFrmId) $searchColumnStr AND sttr_transaction_type = 'sell' and sttr_status NOT IN ('DELETED') and (sttr_assign_status IS NULL or sttr_assign_status = '') AND sttr_item_category IN ('RawGold','RawSilver','OldGold','OldSilver','Other') AND sttr_user_id='$userId'";
        } else {
            $qSelItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_firm_id IN ($strFrmId) AND sttr_transaction_type = 'sell' AND sttr_panel_name='rawMetalIssue' and sttr_status NOT IN ('DELETED') and (sttr_assign_status IS NULL or sttr_assign_status = '') AND sttr_item_category IN ('RawGold','RawSilver','OldGold','OldSilver','Other') AND sttr_user_id='$userId' AND (UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $fromDateTime AND $toDateTime) order by sttr_id DESC";
            $qSelItemDetCount = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_firm_id IN ($strFrmId) AND sttr_transaction_type = 'sell' AND sttr_panel_name='rawMetalIssue' and sttr_status NOT IN ('DELETED') and (sttr_assign_status IS NULL or sttr_assign_status = '') AND sttr_item_category IN ('RawGold','RawSilver','OldGold','OldSilver','Other') AND sttr_user_id='$userId'";

//            echo '$qSelItemDetails='.$qSelItemDetails.'<br>';
//            echo '$qSelItemDetCount='.$qSelItemDetCount;
        }

        //echo '$qSelItemDetails : ' . $qSelItemDetails . '<br />';

        $resItemDetails = mysqli_query($conn, $qSelItemDetails);
        $rowNextItemDetCount = mysqli_num_rows($resItemDetails);
        $resItemDetCount = mysqli_query($conn, $qSelItemDetCount);
        $rowItemDetCount = mysqli_num_rows($resItemDetCount);

        $totalGoldNtWt = 0;
        $totalGoldGsWt = 0;
        $totalGoldGsWtTp = 'GM';
        $totalGoldNtWtTp = 'GM';
        $totalGoldFnWtTp = 'GM';
        $totalSilGsWtTp = 'GM';
        $totalSilNtWtTp = 'GM';
        $totalSilFnWtTp = 'GM';
        $totalValuation = 0.0;
        $totalSilverNtWt = 0;
        $totalSilverGsWt = 0;
        $totalSilValuation = 0;
        $totalGldValuation = 0;
        $totalGoldFnWt = 0;
        $totalSilverFnWt = 0;
        $totalStoneVal = 0;
        $displayTot = false;
        $totalFinalBalance = 0;
        $totalTax = 0;
        $totalGdFinalBalance = 0;
        $totalSlFinalBalance = 0;
        $totalOthFinalBalance = 0;
        $counter = 1;
        $gdQty = 0;
        $srQty = 0;
        $othQty = 0;
        $totalQty = 0;
        if ($rowItemDetCount <= 0) {
            ?>
            <tr>
                <td valign="middle" align="center" class="ff_calibri fs_13 fw_b brown">
                    <?php if ($searchColumn != NULL) { ?>NO RECORD FOUND<?php } else { ?> ~ LIST IS EMPTY ~ <?php } ?>
                </td>
            </tr>
            <?php if ($searchColumn != NULL) { ?>
                <tr>
                    <td valign="middle" align="center" width="58px" height="50px" title="Purchase List">
                        <a onclick="showRawStockPanel('MetalToCashPurchaseList', '<?php echo $userId; ?>');" style="cursor: pointer;">
                            <div id="SystemLog">
                                <img src="<?php echo $documentRoot; ?>/images/back32.png" alt="Purchase List" 
                                     title="Purchase List"/>
                            </div>
                        </a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        <?php
        while ($rowItemDetails = mysqli_fetch_array($resItemDetails)) {
            $stprId = $rowItemDetails['sttr_id'];
            $stprSuppId = $rowItemDetails['sttr_user_id'];
            $sttr_image_id = $rowItemDetails['sttr_image_id']; //add for image-id Author:DIKSHA15March2019
            $newInvoiceDate = $rowItemDetails['sttr_add_date'];
            $newPreInvoiceNo = $rowItemDetails['sttr_pre_invoice_no'];
            $newInvoiceNo = $rowItemDetails['sttr_invoice_no'];
            $newItemMetal = $rowItemDetails['sttr_metal_type'];
            $newItemName = $rowItemDetails['sttr_item_name'];
            $newItemQTY = $rowItemDetails['sttr_quantity'];
            $newItemGSW = $rowItemDetails['sttr_gs_weight'];
            $newItemGSQT = $rowItemDetails['sttr_gs_weight_type'];
            $newItemNTW = $rowItemDetails['sttr_nt_weight'];
            $newItemNTWT = $rowItemDetails['sttr_nt_weight_type'];
            $newItemFFNW = $rowItemDetails['sttr_final_fine_weight'];
            $newItemTunch = $rowItemDetails['sttr_purity'];
            $newItemWastage = $rowItemDetails['sttr_wastage'];
            $newItemMetalRate = $rowItemDetails['sttr_metal_rate'];
            $newItemLabChrg = $rowItemDetails['sttr_lab_charges'];
            $newItemLabChrgType = $rowItemDetails['sttr_lab_charges_type'];
            $newItemValuation = om_round($rowItemDetails['sttr_valuation']);
            $stockFirmId = $rowItemDetails['sttr_firm_id'];
            $utin_id =  $rowItemDetails['sttr_utin_id'];

            $totalQty += $newItemQTY;

            $newItemVATCharges = $rowItemDetails['sttr_tax'];

            $newItemTotalTaxChrg = om_round((($newItemValuation) * $newItemVATCharges / 100));
            if ($newItemTotalTaxChrg == '' || $newItemTotalTaxChrg == NULL) {
                $newItemTotalTaxChrg = 0;
            }

            $newItemFinalVal = om_round($rowItemDetails['sttr_final_valuation']);
            //to get total gross wt
            if ($newItemGSQT != 'GM') {
                $convGsWt = convert('GM', $newItemGSQT, $newItemGSW);
            } else {
                $convGsWt = $newItemGSW;
            }
            //to get total net wt
            if ($newItemNTWT != 'GM') {
                $convNtWt = convert('GM', $newItemNTWT, $newItemNTW);
                $convFnWt = convert('GM', $newItemNTWT, $newItemFFNW);
            } else {
                $convNtWt = $newItemNTW;
                $convFnWt = $newItemFFNW;
            }
            if ($newItemMetal == 'Gold') {
                $totalGoldGsWt = $totalGoldGsWt + $convGsWt;
                $totalGoldNtWt = $totalGoldNtWt + $convNtWt;
                $totalGldValuation = $totalGldValuation + $newItemValuation;
                $totalGoldFnWt = $totalGoldFnWt + $convFnWt;
                $totalGdFinalBalance = $totalGdFinalBalance + $newItemFinalVal;
                $gdQty += $newItemQTY;
            } else if ($newItemMetal == 'Silver') {
                $totalSilverGsWt = $totalSilverGsWt + $convGsWt;
                $totalSilverNtWt = $totalSilverNtWt + $convNtWt;
                $totalSilValuation = $totalSilValuation + $newItemValuation;
                $totalSilverFnWt = $totalSilverFnWt + $convFnWt;
                $totalSlFinalBalance = $totalSlFinalBalance + $newItemFinalVal;
                $srQty += $newItemQTY;
            } else if ($newItemMetal == 'Other') {
                $totalOthFinalBalance = $totalOthFinalBalance + $newItemFinalVal;
                $othQty += $newItemQTY;
            }
            if ($counter == $rowNextItemDetCount) {
                if ($totalGoldGsWt >= 1000) {
                    $totalGoldGsWt = $totalGoldGsWt / 1000;
                    $totalGoldGsWtTp = 'KG';
                }
                if ($totalGoldNtWt >= 1000) {
                    $totalGoldNtWt = $totalGoldNtWt / 1000;
                    $totalGoldNtWtTp = 'KG';
                }
                if ($totalGoldFnWt >= 1000) {
                    $totalGoldFnWt = $totalGoldFnWt / 1000;
                    $totalGoldFnWtTp = 'KG';
                }
                if ($totalSilverGsWt >= 1000) {
                    $totalSilverGsWt = $totalSilverGsWt / 1000;
                    $totalSilGsWtTp = 'KG';
                }
                if ($totalSilverNtWt >= 1000) {
                    $totalSilverNtWt = $totalSilverNtWt / 1000;
                    $totalSilNtWtTp = 'KG';
                }
                if ($totalSilverFnWt >= 1000) {
                    $totalSilverFnWt = $totalSilverFnWt / 1000;
                    $totalSilFnWtTp = 'KG';
                }
            }
            //to get total valuation
            $totalValuation = $totalValuation + $newItemValuation;
            $totalStoneVal = $totalStoneVal + $newCryValuation;
            $totalTax += $newItemTotalTaxChrg;
            $totalFinalBalance = $totalGdFinalBalance + $totalSlFinalBalance;

            parse_str(getTableValues("SELECT met_rate_per_wt,met_rate_per_wt_tp FROM metal_rates where met_rate_own_id='$sessionOwnerId' and met_rate_value='$newItemMetalRate' order by met_rate_id desc LIMIT 0, 1"));
            if ($met_rate_per_wt == '') {
                if ($rowItemDetails['sttr_metal_type'] == 'Gold') {
                    $ratePerWt = '/' . 10 . 'GM';
                }
                if ($rowItemDetails['sttr_metal_type'] == 'Silver') {
                    $ratePerWt = '/' . 'KG';
                }
                if ($rowItemDetails['sttr_metal_type'] != 'Gold' && $rowItemDetails['sttr_metal_type'] != 'Silver') {
                    $ratePerWt = '';
                }
            } else {
                $ratePerWt = '/' . $met_rate_per_wt . $met_rate_per_wt_tp;
            }
            if ($newItemTunch == 'NotSelected') {
                $newItemTunch = 0;
            }

            $invoiceNo = $newInvoiceNo;
            if ($invoiceNo == '' || $invoiceNo == NULL)
                $invoiceNo = "''";

            // get unique id from stock invoice 
//            $qSelUniqueId = "SELECT isin_unique_id FROM item_stock_inv WHERE isin_supp_id = '$stprSuppId ' AND isin_owner_id = '$_SESSION[sessionOwnerId]' AND isin_pre_invoice_no='$newPreInvoiceNo' AND isin_invoice_no > $invoiceNo;";
//            $resUniqueId = mysqli_query($conn,$qSelUniqueId) or die("Error: " . mysqli_error($conn));
//            $rowUniqueId = mysqli_fetch_array($resUniqueId, MYSQLI_ASSOC);
//            $newPayUniqueId = $rowUniqueId['isin_unique_id'];

            if ($newPayUniqueId == '' || $newPayUniqueId == NULL)
                $newPayUniqueId = "''";

            // get user balance details
//            $qSelUtransDet = "SELECT utrans_cash_balance FROM user_transaction WHERE utrans_user_id = '$stprSuppId' AND utrans_owner_id = '$_SESSION[sessionOwnerId]' AND (utrans_pre_invoice_no IN ('ITSW','ITSR','IMP','IWS') OR utrans_type = 'OPEN') AND utrans_unique_id > $newPayUniqueId ORDER BY utrans_id DESC LIMIT 0,1;";
//            $resUtransDet = mysqli_query($conn,$qSelUtransDet) or die("Error: " . mysqli_error($conn));
//            $rowPrevBalance = mysqli_fetch_array($resUtransDet, MYSQLI_ASSOC);
//            $suppPrevBalance = $rowPrevBalance['utrans_cash_balance'];
//
//            // check if supplier stock present
//            if ($suppPrevBalance != 0 || $suppPrevBalance != '' || $suppPrevBalance != NULL) {
//                $prevStockCount = mysqli_num_rows($resUniqueId);
//            }
            ?>
            <?php if ($counter == 1) {
                ?> 
                <tr id="stockListHeader" class="height28 goldBack">
                <input type="hidden" id="prevStockPresent" name="prevStockPresent" value="<?php echo $prevStockCount; ?>" />
                <td align="left" class="brwnCalibri13Font border-color-grey-rb" width="40px" title="METAL TYPE">
                    <div class="spaceLeft2">
                        <table border = "0" cellspacing = "0" cellpadding = "0" width="100%">
                            <tr>
                                <td align="center" class="pdnglft10">
                                    <input id="metalType" type="text" name="metalType" placeholder="METAL"
                                           value = "<?php
        if ($searchColumnName == 'sttr_metal_type')
            echo $searchColumnValue;
        else
            echo 'METAL';
                ?>"
                                           onclick = "javascript:this.value = '';"
                                           onblur = "javascript:
                                                                   if (document.getElementById('metalType').value != '') {
                                                               searchStockList('<?php echo $documentRoot; ?>', 'sttr_metal_type',
                                                                       document.getElementById('metalType').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                           } else {
                                                               document.getElementById('metalType').value = '<?php
                                           if ($searchColumnValue == 'sttr_metal_type')
                                               echo $searchColumnValue;
                                           else
                                               echo 'METAL';
                                           ?>';
                                                           }"
                                           onkeyup = "if (event.keyCode == 13 && document.getElementById('metalType').value != '') {
                                                               searchStockList('<?php echo $documentRoot; ?>', 'sttr_metal_type',
                                                                       document.getElementById('metalType').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                           }"
                                           size = "3" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial" style="width:100%"/>
                                </td>
                                <td align="center"  class="pdnglft10">
                                    <a style = "cursor: pointer;" title = "Click To View List By Item Id" class="noPrint" style="width:100%" 
                                       onclick = "sortStockList('<?php echo $documentRoot; ?>', 'sttr_metal_type', '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');">
                                           <?php if ($sortKeywordValue == "sttr_metal_type") {
                                               ?>
                                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" style="margin-right:10px;"/><?php } ?>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td align="center" class="brwnCalibri13Font border-color-grey-rb pdnglft10" width="100px" title="ITEM DETAILS">
                    <div class="spaceLeft5">
                        <table border = "0" cellspacing = "0" cellpadding = "0" width="100%">
                            <tr>
                                <td align="left">
                                    <input id="itemName" type="text" name="itemName" placeholder="ITEM DET"
                                           value = "<?php
                                        if ($searchColumnName == 'sttr_item_name')
                                            echo $searchColumnValue;
                                        else
                                            echo 'ITEM DET';
                                        ?>"
                                           onclick = "javascript:this.value = '';"
                                           onblur = "javascript:
                                                                   if (document.getElementById('itemName').value != '') {
                                                               searchStockList('<?php echo $documentRoot; ?>', 'sttr_item_name',
                                                                       document.getElementById('itemName').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                           } else {
                                                               document.getElementById('itemName').value = '<?php
                                           if ($searchColumnValue == 'sttr_item_name')
                                               echo $searchColumnValue;
                                           else
                                               echo 'ITEM DET';
                                           ?>';
                                                           }"
                                           onkeyup = "if (event.keyCode == 13 && document.getElementById('itemName').value != '') {
                                                               searchStockList('<?php echo $documentRoot; ?>', 'sttr_item_name',
                                                                       document.getElementById('itemName').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                           }"
                                           size = "10" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial" style="width:100%"/>
                                </td>
                                <td align="right">
                                    <a style = "cursor: pointer;" title = "Click To View List By Item Id" class="noPrint"
                                       onclick = "sortStockList('<?php echo $documentRoot; ?>', 'sttr_item_name', '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');">
                                           <?php if ($sortKeywordValue == "sttr_item_name") {
                                               ?>
                                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" style="margin-right:10px;"/><?php } ?>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td align="center" class="brwnCalibri13Font border-color-grey-rb pdnglft10" width="32px" title="QUANTITY">
                    <table border = "0" cellspacing = "0" cellpadding = "0" width="100%">
                        <tr>
                            <td align="left">
                                <input id="itemQty" type="text" name="itemQty" placeholder="QTY"
                                       value = "<?php
                                        if ($searchColumnName == 'sttr_quantity')
                                            echo $searchColumnValue;
                                        else
                                            echo 'QTY';
                                        ?>"
                                       onclick = "javascript:this.value = '';"
                                       onblur = "javascript:
                                                               if (document.getElementById('itemQty').value != '') {
                                                           searchStockList('<?php echo $documentRoot; ?>', 'sttr_quantity',
                                                                   document.getElementById('itemQty').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                       } else {
                                                           document.getElementById('itemQty').value = '<?php
                                       if ($searchColumnValue == 'sttr_quantity')
                                           echo $searchColumnValue;
                                       else
                                           echo 'QTY';
                                       ?>';
                                                       }"
                                       onkeyup = "if (event.keyCode == 13 && document.getElementById('itemQty').value != '') {
                                                           searchStockList('<?php echo $documentRoot; ?>', 'sttr_quantity',
                                                                   document.getElementById('itemQty').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                       }"
                                       size = "1" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial" style="width:100%"/>
                            </td>
                            <td align="right">
                                <a style = "cursor: pointer;" title = "Click To View List By Item Id" class="noPrint"
                                   onclick = "sortStockList('<?php echo $documentRoot; ?>', 'sttr_quantity', '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');">
                                       <?php if ($sortKeywordValue == "sttr_quantity") {
                                           ?>
                                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt=""  style="margin-right:10px;"/>
                                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt=""  style="margin-right:10px;"/><?php } ?>
                                </a>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="right" class="brwnCalibri13Font border-color-grey-rb pdnglft10" width="70px" title="ITEM GROSS WEIGHT">
                    <div class="paddingRight2">
                        <table border = "0" cellspacing = "0" cellpadding = "0" width="100%">
                            <tr>
                                <td align="left">
                                    <input id="itemGsWt" type="text" name="itemGsWt" placeholder="GS WT"
                                           value = "<?php
                                    if ($searchColumnName == 'sttr_gs_weight@sttr_gs_weight_type')
                                        echo $searchColumnValue;
                                    else
                                        echo 'GS WT';
                                    ?>"
                                           onclick = "javascript:this.value = '';"
                                           onblur = "javascript:
                                                                   if (document.getElementById('itemGsWt').value != '') {
                                                               searchStockList('<?php echo $documentRoot; ?>', 'sttr_gs_weight@sttr_gs_weight_type',
                                                                       document.getElementById('itemGsWt').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                           } else {
                                                               document.getElementById('itemGsWt').value = '<?php
                                           if ($searchColumnValue == 'sttr_gs_weight@sttr_gs_weight_type')
                                               echo $searchColumnValue;
                                           else
                                               echo 'GS WT';
                                           ?>';
                                                           }"
                                           onkeyup = "if (event.keyCode == 13 && document.getElementById('itemGsWt').value != '') {
                                                               searchStockList('<?php echo $documentRoot; ?>', 'sttr_gs_weight@sttr_gs_weight_type',
                                                                       document.getElementById('itemGsWt').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                           }"
                                           size = "5" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial" style="width:100%"/>
                                </td>
                                <td align="right">
                                    <a style = "cursor: pointer;" title = "Click To View List By Item Id" class="noPrint"
                                       onclick = "sortStockList('<?php echo $documentRoot; ?>', 'sttr_gs_weight', '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');">
                                           <?php if ($sortKeywordValue == "sttr_gs_weight") {
                                               ?>
                                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt=""  style="margin-right:10px;"/>
                                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt=""  style="margin-right:10px;"/><?php } ?>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td align="right" class="brwnCalibri13Font border-color-grey-rb pdnglft10"  width="70px" title="ITEM NET WEIGHT">
                    <div class="paddingRight2">
                        <table border = "0" cellspacing = "0" cellpadding = "0" width="100%">
                            <tr>
                                <td align="left">
                                    <input id="itemNtWt" type="text" name="itemNtWt" placeholder="NT WT"
                                           value = "<?php
                                        if ($searchColumnName == 'sttr_nt_weight@sttr_nt_weight_type')
                                            echo $searchColumnValue;
                                        else
                                            echo 'NT WT';
                                        ?>"
                                           onclick = "javascript:this.value = '';"
                                           onblur = "javascript:
                                                                   if (document.getElementById('itemNtWt').value != '') {
                                                               searchStockList('<?php echo $documentRoot; ?>', 'sttr_nt_weight@sttr_nt_weight_type',
                                                                       document.getElementById('itemNtWt').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                           } else {
                                                               document.getElementById('itemNtWt').value = '<?php
                                           if ($searchColumnValue == 'sttr_nt_weight@sttr_nt_weight_type')
                                               echo $searchColumnValue;
                                           else
                                               echo 'NT WT';
                                           ?>';
                                                           }"
                                           onkeyup = "if (event.keyCode == 13 && document.getElementById('itemNtWt').value != '') {
                                                               searchStockList('<?php echo $documentRoot; ?>', 'sttr_nt_weight@sttr_nt_weight_type',
                                                                       document.getElementById('itemNtWt').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                           }"
                                           size = "5" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial" style="width:100%"/>
                                </td>
                                <td align="right">
                                    <a style = "cursor: pointer;" title = "Click To View List By Item Id" class="noPrint"
                                       onclick = "sortStockList('<?php echo $documentRoot; ?>', 'sttr_nt_weight', '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');">
                                           <?php if ($sortKeywordValue == "sttr_nt_weight") {
                                               ?>
                                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt=""  style="margin-right:10px;"/>
                                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt=""  style="margin-right:10px;"/><?php } ?>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td align="right" class="brwnCalibri13Font border-color-grey-rb pdnglft10" width="40px" title="ITEM PURITY">
                    <div class="paddingRight2">
                        <table border = "0" cellspacing = "0" cellpadding = "0" width="100%">
                            <tr>
                                <td align="left">
                                    <input id="itemTunch" type="text" name="itemTunch" placeholder="P.R."
                                           value = "<?php
                                        if ($searchColumnName == 'sttr_purity')
                                            echo $searchColumnValue;
                                        else
                                            echo 'P.R.';
                                        ?>"
                                           onclick = "javascript:this.value = '';"
                                           onblur = "javascript:
                                                                   if (document.getElementById('itemTunch').value != '') {
                                                               searchStockList('<?php echo $documentRoot; ?>', 'sttr_purity',
                                                                       document.getElementById('itemTunch').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                           } else {
                                                               document.getElementById('itemTunch').value = '<?php
                                           if ($searchColumnValue == 'sttr_purity')
                                               echo $searchColumnValue;
                                           else
                                               echo 'P.R.';
                                           ?>';
                                                           }"
                                           onkeyup = "if (event.keyCode == 13 && document.getElementById('itemTunch').value != '') {
                                                               searchStockList('<?php echo $documentRoot; ?>', 'sttr_purity',
                                                                       document.getElementById('itemTunch').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                           }"
                                           size = "2" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial" style="width:100%;"/>
                                </td>
                                <td align="right">
                                    <a style = "cursor: pointer;" title = "Click To View List By Item Id" class="noPrint"
                                       onclick = "sortStockList('<?php echo $documentRoot; ?>', 'sttr_purity', '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');">
                                           <?php if ($sortKeywordValue == "sttr_purity") {
                                               ?>
                                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt=""  style="margin-right:10px;"/>
                                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt=""  style="margin-right:10px;"/><?php } ?>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td align="center" class="brwnCalibri13Font border-color-grey-rb pdnglft10" title="WASTAGE" width="38px">
                    <table border = "0" cellspacing = "0" cellpadding = "0" width="100%">
                        <tr>
                            <td align="left">
                                <input id="itemWstg" type="text" name="itemWstg" placeholder="WTG"
                                       value = "<?php
                                        if ($searchColumnName == 'sttr_wastage')
                                            echo $searchColumnValue;
                                        else
                                            echo 'WTG';
                                        ?>"
                                       onclick = "javascript:this.value = '';"
                                       onblur = "javascript:
                                                               if (document.getElementById('itemWstg').value != '') {
                                                           searchStockList('<?php echo $documentRoot; ?>', 'sttr_wastage',
                                                                   document.getElementById('itemWstg').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                       } else {
                                                           document.getElementById('itemWstg').value = '<?php
                                       if ($searchColumnValue == 'sttr_wastage')
                                           echo $searchColumnValue;
                                       else
                                           echo 'WTG';
                                       ?>';
                                                       }"
                                       onkeyup = "if (event.keyCode == 13 && document.getElementById('itemWstg').value != '') {
                                                           searchStockList('<?php echo $documentRoot; ?>', 'sttr_wastage',
                                                                   document.getElementById('itemWstg').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                       }"
                                       size = "2" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial" style="width:100%"/>
                            </td>
                            <td align="right">
                                <a style = "cursor: pointer;" title = "Click To View List By Item Wastage" class="noPrint"
                                   onclick = "sortStockList('<?php echo $documentRoot; ?>', 'sttr_wastage', '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');">
                                       <?php if ($sortKeywordValue == "sttr_wastage") {
                                           ?>
                                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt=""  style="margin-right:10px;"/>
                                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt=""  style="margin-right:10px;"/><?php } ?>
                                </a>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="right" class="brwnCalibri13Font border-color-grey-rb pdnglft10" width="70px" title="ITEM FINE WEIGHT&NewLine;Search by weight only !">
                    <div class="paddingRight2">
                        <table border = "0" cellspacing = "0" cellpadding = "0" width="100%">
                            <tr>
                                <td align="left">
                                    <input id="itemFnWt" type="text" name="itemFnWt" placeholder="FN WT"
                                           value = "<?php
                                    if ($searchColumnName == 'sttr_final_fine_weight')
                                        echo $searchColumnValue;
                                    else
                                        echo 'FN WT';
                                    ?>"
                                           onclick = "javascript:this.value = '';"
                                           onblur = "javascript:
                                                                   if (document.getElementById('itemFnWt').value != '') {
                                                               searchStockList('<?php echo $documentRoot; ?>', 'sttr_final_fine_weight',
                                                                       document.getElementById('itemFnWt').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                           } else {
                                                               document.getElementById('itemFnWt').value = '<?php
                                           if ($searchColumnValue == 'sttr_final_fine_weight')
                                               echo $searchColumnValue;
                                           else
                                               echo 'FN WT';
                                           ?>';
                                                           }"
                                           onkeyup = "if (event.keyCode == 13 && document.getElementById('itemFnWt').value != '') {
                                                               searchStockList('<?php echo $documentRoot; ?>', 'sttr_final_fine_weight',
                                                                       document.getElementById('itemFnWt').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                           }"
                                           size = "5" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial" style="width:100%"/>
                                </td>
                                <td align="right">
                                    <a style = "cursor: pointer;" title = "Click To View List By Fine Weight" class="noPrint"
                                       onclick = "sortStockList('<?php echo $documentRoot; ?>', 'sttr_final_fine_weight', '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');">
                                           <?php if ($sortKeywordValue == "sttr_final_fine_weight") {
                                               ?>
                                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt=""  style="margin-right:10px;"/>
                                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt=""  style="margin-right:10px;"/><?php } ?>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td align="center" class="brwnCalibri13Font border-color-grey-rb pdnglft10" title="LABOUR CHARGES" width="60px" >
                    <table border = "0" cellspacing = "0" cellpadding = "0" width="100%">
                        <tr>
                            <td align="left">
                                <input id="itemMkingCh" type="text" name="itemMkingCh" placeholder="LAB CHGS"
                                       value = "<?php
                                        if ($searchColumnName == 'sttr_lab_charges_type@sttr_lab_charges_type')
                                            echo $searchColumnValue;
                                        else
                                            echo 'LAB CHGS';
                                        ?>"
                                       onclick = "javascript:this.value = '';"
                                       onblur = "javascript:
                                                               if (document.getElementById('itemMkingCh').value != '') {
                                                           searchStockList('<?php echo $documentRoot; ?>', 'sttr_lab_charges_type@sttr_lab_charges_type',
                                                                   document.getElementById('itemMkingCh').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                       } else {
                                                           document.getElementById('itemMkingCh').value = '<?php
                                       if ($searchColumnValue == 'sttr_lab_charges_type@sttr_lab_charges_type')
                                           echo $searchColumnValue;
                                       else
                                           echo 'LAB CHGS';
                                       ?>';
                                                       }"
                                       onkeyup = "if (event.keyCode == 13 && document.getElementById('itemMkingCh').value != '') {
                                                           searchStockList('<?php echo $documentRoot; ?>', 'sttr_lab_charges_type@sttr_lab_charges_type',
                                                                   document.getElementById('itemMkingCh').value, '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');
                                                       }"
                                       size = "5" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial" style="width:100%"/>
                            </td>
                            <td align="right">
                                <a style = "cursor: pointer;" title = "Click To View List By Item Id" class="noPrint"
                                   onclick = "sortStockList('<?php echo $documentRoot; ?>', 'sttr_lab_charges_type', '<?php echo $selFirmId; ?>', 'stockPanelPurchaseList', '<?php echo $panel; ?>', '', '', '', '<?php echo $userId; ?>');">
                                       <?php if ($sortKeywordValue == "sttr_lab_charges_type") {
                                           ?>
                                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt=""  style="margin-right:10px;"/>
                                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt=""  style="margin-right:10px;"/><?php } ?>
                                </a>
                            </td>
                        </tr>
                    </table>
                </td>

                <!--End to Add Code for show image on Raw metal purchase list Author:DIKSHA15March2019-->
                <td align="center" class="brwnCalibri13Font border-color-grey-rb pdnglft10" title="INVOICE-TAG &NewLine;<?php echo $newPreInvoiceNo . '' . $newInvoiceNo; ?>" width="70px">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                        <tr>
                            <td class="maroonCalibri13Font lgn-txtfield-without-borderAndBackground13-Arial" align="center">TAG
                            </td>
                            <td valign="middle">
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="center" class="brwnCalibri13Font border-color-grey-b printVisibilityHidden" title="DELETE ITEM" width="30px">
                    <img src="<?php echo $documentRoot; ?>/images/img/trash.png" alt="" class="marginTop5" style="width:14px;"/>
                </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td align="left" class="blackCalibri13Font border-color-grey-rb pdnglft10" style="border-bottom:0" width="40px" title="RATE: <?php echo $newItemMetalRate . $ratePerWt; ?>">
                    <div class="spaceLeft2"><?php echo om_strtoupper($newItemMetal); ?></div>
                </td>
                <td align="left" class="blackCalibri13Font border-color-grey-rb"  title="<?php echo $newItemName; ?>" width="100px" style="border-bottom:0">
                    <a style="cursor: pointer;" title="Single click to view Item Details!"
                    <?php if ($staffId == '' || ($staffId != '' && $array['updateTransactionForAllPanel'] == 'true')) { ?>
                           onclick="showUserRawMetalIssueDetails('<?php echo $stprId; ?>', 'RawPayUp', '<?php echo $stprSuppId; ?>', '<?php echo $mainPanel; ?>', 'SELL', 'RawSell', '<?php echo $divName; ?>');"
                       <?php } ?>
                       >
                        <div class="spaceLeft5 orangeCalibriLink">
                            <?php echo om_strtoupper(substr($newItemName, 0, 14)); ?>
                        </div>
                    </a>
                </td>
                <td align="center" class="blackCalibri13Font border-color-grey-rb " width="32px" style="border-bottom:0">
                    <?php
                    if ($newItemQTY == '')
                        echo '-';
                    else
                        echo $newItemQTY;
                    ?>
                </td>
                <td align="right" class="blackCalibri13Font border-color-grey-rb pdngrght10"  width="70px" style="border-bottom:0">
                    <div class="paddingRight2"><?php echo $newItemGSW . ' ' . $newItemGSQT; ?></div>
                </td>
                <td align="right" class="blackCalibri13Font border-color-grey-rb pdngrght10" style="border-bottom:0" width="70px"  title="GROSS WT(<?php echo $newItemGSW . '' . $newItemGSQT; ?>) - PKT WT (<?php echo $newItemPKTW . '' . $newItemPKTQT; ?>)">
                    <div class="paddingRight2"><?php echo $newItemNTW . ' ' . $newItemNTWT; ?></div>
                </td>
                <td align="right" class="blackCalibri13Font border-color-grey-rb pdngrght10" width="40px" style="border-bottom:0">
                    <div class="paddingRight2"><?php echo $newItemTunch . ' %'; ?></div>
                </td>
                <td align="center" class="blackCalibri13Font border-color-grey-rb pdngrght10" width="38px" style="border-bottom:0">
                    <?php
                    if ($newItemWastage != '')
                        echo $newItemWastage . ' %';
                    else
                        echo '-';
                    ?>
                </td>
                <td align="right" class="blackCalibri13Font border-color-grey-rb pdngrght10" width="70px" style="border-bottom:0">
                    <div class="paddingRight2"><?php echo $newItemFFNW . ' ' . $newItemNTWT; ?></div>
                </td>
                <td align="center" class="blackCalibri13Font border-color-grey-rb pdngrght10" width="60px" style="border-bottom:0">
                    <?php
                    if ($newItemLabChrg != '')
                        echo $newItemLabChrg . ' /' . $newItemLabChrgType;
                    else
                        echo '-';
                    ?>
                </td>


                <!--End to Add Code for show image on Raw metal purchase list Author:DIKSHA15March2019-->
         <td align="center" class="border-color-grey-rb pdngrght10" width="70px" style="border-bottom:0">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                        <tr>
                            <td valign="middle" align="center" title="<?php echo $newPreInvoiceNo . '' . $newInvoiceNo; ?>">
                                <!--added raw metal purchase - jinesh on 12/10/2018-->
                                <a style="cursor: pointer;" 
                                   onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ogspinvo.php?userId=<?php echo "$stprSuppId"; ?>&slPrPreInvoiceNo=<?php echo "$newPreInvoiceNo"; ?>&slPrInvoiceNo=<?php echo "$newInvoiceNo"; ?>&utinId=<?php echo "$utin_id"; ?>&firmId=<?php echo "$stockFirmId"; ?>&invName=rawMetalSale&invPanel=AddStock&labelType=RawMetalPurchase&invoiceDate=<?php echo "$newInvoiceDate"; ?>',
                                                       'popup', 'width=850,height=950,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                               return false" >
                                    <div class="orangeCalibriLink"><?php echo $newPreInvoiceNo . '' . $newInvoiceNo; ?></div>
                                </a>
                            </td>
                            <!-- START CODE TO ADD DIVISION FOR SEND INVOICE MAIL OPTION @AUTHOR:AMRUTA-24MAY2022 -->
                            <td align="center" class="itemAddPnLabels11Arial printVisibilityHidden">
                                <a style="cursor: pointer;"  onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ogspinvo.php?userId=<?php echo "$stprSuppId"; ?>&slPrPreInvoiceNo=<?php echo "$newPreInvoiceNo"; ?>&slPrInvoiceNo=<?php echo "$newInvoiceNo"; ?>&slprinSubPanel=<?php echo "$slprinSubPanel"; ?>&utinId=<?php echo "$utin_id"; ?>&firmId=<?php echo "$stockFirmId"; ?>&invName=rawMetalSale&invPanel=AddStock&labelType=RawMetalPurchase&invoiceDate=<?php echo "$newInvoiceDate"; ?>&invoicePanel=<?php echo "$invLay"; ?>&labelType=SellPurchase&emailStatus=Yes',
                                                    'popup', 'width=850,height=950,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                            return false">
                                    <img src="<?php echo $documentRoot; ?>/images/img/gmail-icon.png" alt="" class="marginTop5" style="height: 18px;width: 20px;margin-bottom: 3px;"/>
                                </a>
                            </td>
                            <!-- END CODE TO ADD DIVISION FOR SEND INVOICE MAIL OPTION @AUTHOR:AMRUTA-24MAY2022  -->
                        </tr>
                    </table>
                </td>
            <div class="modal" style="display:none;padding-top:30px;" id="deleteInvVerifyPopUp" name="deleteInvVerifyPopUp"></div>
            <td align="center" class="blackCalibri13Font border-color-grey-b printVisibilityHidden" width="30px" style="border-bottom:0">
                <?php if ($staffId == '' || ($staffId != '' && $array['deleteTransactionForAllPanel'] == 'true')) { ?>
                    <a style="cursor: pointer;" onclick="deleteRawMetalToCashItem('<?php echo $stprId; ?>', '', 'RawSellList', '<?php echo $payPanelName; ?>', '', '', '<?php echo $mainPanel; ?>', 'SELL', '<?php echo $userId; ?>');">
                    <?php } else if ($staffId != '' && $invVerifyNdDeleteOption == 'YES' && $array['deleteInvoiceAccess'] == 'false') { ?>
                        <a style="cursor: pointer;" onclick="openDeleteInvVerifyPopUp('<?php echo $userId; ?>', '<?php echo $stprId; ?>', '<?php echo $payPanelName; ?>', 'RawSellList', '', '', '<?php echo $mainPanel; ?>', '<?php echo $newPreInvoiceNo; ?>', '<?php echo $newInvoiceNo; ?>');">
                        <?php } ?>
                        <img src="<?php echo $documentRoot; ?>/images/img/trash.png" alt="" class="marginTop5" style="height:14px;"/>
                    </a>
            </td>
            </tr>
            <?php
            $counter++;
            $met_rate_per_wt = '';
            $met_rate_per_wt_tp = '';
        }
        ?>
        <?php if ($totalValuation > 0) { ?>
            <tr valign="bottom">
                <td align="left" class="blackCalibri13Font"  valign="top" title="Total of all Items on this page">
                    <div class="spaceLeft5"></div>
                </td>
                <td align="left" class="blackCalibri13Font"  valign="top"> 
                    <div class="spaceLeft5">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="left" class="blackCalibri13Font" title="Gold Total Details">GOLD:</td>
                            </tr>
                            <tr>
                                <td align="left" class="blackCalibri13Font" title="Silver Total Details">SILVER:</td>
                            </tr>
                            <tr>
                                <td align="left" class="blackCalibri13Font" title=" Total Details">OTHER:</td>
                            </tr>
                            <tr>
                                <td align="left" class="blackCalibri13Font" title=" Total Details">TOTAL:</td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td align="center" class="blackCalibri13Font" valign="top" title="Total Quantity of Items on this page">
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="center" class="blackCalibri13Font" >
                                <?php echo $gdQty; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" class="blackCalibri13Font" >
                                <?php echo $srQty; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" class="blackCalibri13Font" >
                                <?php echo $othQty; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" class="blackCalibri13Font" >
                                <?php echo $totalQty; ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="right" class="blackCalibri13Font " valign="top" title="Total Gross Weight of all Items on this page">
                    <div class="paddingRight2">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="right" class="blackCalibri13Font" >
                                    <?php echo number_format($totalGoldGsWt, 3) . ' ' . $totalGoldGsWtTp; ?>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" class="blackCalibri13Font" >
                                    <?php echo number_format($totalSilverGsWt, 3) . ' ' . $totalSilGsWtTp; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td align="right" class="blackCalibri13Font" valign="top" title="Total Net Weight of all Items on this page">
                    <div class="paddingRight2">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="right" class="blackCalibri13Font" >
                                    <?php echo number_format($totalGoldNtWt, 3) . ' ' . $totalGoldNtWtTp; ?>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" class="blackCalibri13Font" >
                                    <?php echo number_format($totalSilverNtWt, 3) . ' ' . $totalSilNtWtTp; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td align="right" class="blackCalibri13Font">
                    <div class="paddingRight2"></div>
                </td>
                <td align="center" class="blackCalibri13Font">
                </td>
                <td align="right" class="blackCalibri13Font "  valign="top" title="Total Fine Weight of all Items on this page">
                    <div class="spaceRight5">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="right" class="blackCalibri13Font">
                                    <?php echo number_format($totalGoldFnWt, 3) . ' ' . $totalGoldFnWtTp; ?>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" class="blackCalibri13Font" >
                                    <?php echo number_format($totalSilverFnWt, 3) . ' ' . $totalSilFnWtTp; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td align="center" class="blackCalibri13Font" width="60px">
                </td>
                <td align="right" class="blackCalibri13Font "  width="100px" valign="top" title="Total metal valuation of all Items on this page">
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="right" class="blackCalibri13Font">
                                <div class="spaceRight5"><?php echo formatInIndianStyle($totalGldValuation); ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" class="blackCalibri13Font">
                                <div class="spaceRight5"><?php echo formatInIndianStyle($totalSilValuation); ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td align="right" class="blackCalibri13Font">
                                <div class="spaceRight5"><?php echo formatInIndianStyle($totalValuation); ?></div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="right" class="blackCalibri13Font" width="50px" valign="top">
                    <table border="0" cellspacing="0" cellpadding="0" class="blackCalibri13Font" valign="top">
                        <tr>
                            <td>
                                <div class="spaceRight5"><?php echo formatInIndianStyle($totalTax); ?></div>
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
                    </table>
                </td>
                <td align="right" class="blackCalibri13Font" width="100px" valign="top">
                    <table border="0" cellspacing="0" cellpadding="0" class="blackCalibri13Font" valign="top">
                        <tr>
                            <td align="right">
                                <div class="spaceRight5"><?php echo formatInIndianStyle($totalGdFinalBalance); ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <div class="spaceRight5"><?php echo formatInIndianStyle($totalSlFinalBalance); ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <div class="spaceRight5"><?php echo formatInIndianStyle($totalFinalBalance); ?></div>
                            </td>
                        </tr>
                    </table>
                </td>
    <!--                <td align="center" class="blackCalibri13Font" width="70px">
                </td>-->
                <td align="center" class="blackCalibri13Font" width="30px">
                </td>
            </tr>
        <?php } ?>
    </table>  
    <div id="ajaxLoadNextItemList" style="visibility: hidden" align="right">
        <?php include 'omzaajld.php'; ?>
    </div>
    <?php
    if ($rowItemDetCount > 0) {
        $noOfPagesAsLink = ceil($rowItemDetCount / $rowsPerPage);
        if ($pageNum > $noOfPagesAsLink || $pageNum < 0) {
            echo "<h1> ~ This Page is not available. ~ </h1>";
        } else {
            ?>
            <table cellpadding="2" cellspacing="2" border="0" align="right">
                <tr>
                    <td align="right">
                        <?php if (($pageNum - 1) != '0') { ?>
                            <input type="submit" id="prvPageButt" name="prvPageButt" value="PREV" class="pageNoButton"
                                   onclick="javascript:showSelectPageRawMetalList('<?php echo $pageNum - 1; ?>', '<?php echo $panel; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', '', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', 'stockPanelSellList', '', '<?php echo $userId; ?>');" />
                               <?php } ?>
                    </td>
                    <?php
                    if ($pageNum == 1 || $pageNum < 10) {
                        for ($i = 1; $i <= 10; $i++) {
                            if (($noOfPagesAsLink >= $i) && ($noOfPagesAsLink != 1)) {
                                ?>
                                <td align="right">
                                    <input type="submit" id="pageNoTextField<?php echo $i; ?>" name="pageNoTextField<?php echo $i; ?>" <?php if (($i == 1) && ($pageNum == 1)) { ?>class="currentPageNoButton" <?php } else { ?>class="pageNoButton" <?php } ?>
                                           value="<?php echo $i ?>"
                                           onclick="javascript:showSelectPageRawMetalList(this.value, '<?php echo $panel; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', '', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', 'stockPanelSellList', '', '<?php echo $userId; ?>');"/>
                                </td>
                                <?php
                            }
                        }
                    } else {
                        for ($i = 1; $i <= 10; $i++) {
                            ?>
                            <td align="right">
                                <input type="submit" id="pageNoTextField<?php echo $i; ?>" name="pageNoTextField<?php echo $i; ?>" class="pageNoButton" 
                                       onclick="javascript:showSelectPageRawMetalList(this.value, '<?php echo $panel; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', '', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', 'stockPanelSellList', '', '<?php echo $userId; ?>');"/>
                            </td>
                            <?php
                        }
                    }
                    ?>
                    <td align="right">
                        <?php if (($pageNum + 1) <= $noOfPagesAsLink) { ?>
                            <input type="submit" id="nextPageButt" name="nextPageButt" value="NEXT" class="pageNoButton"
                                   onclick="javascript:showSelectPageRawMetalList('<?php echo $pageNum + 1; ?>', '<?php echo $panel; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', '', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', 'stockPanelSellList', '', '<?php echo $userId; ?>');"
                                   />
                               <?php } ?>
                    </td>
                    <!---Start of change in code @AUTHOR: SANDY9NOV13----------------->
                    <?php if ($noOfPagesAsLink > 1) { ?>
                        <!--Start to add textfield to navigate to any page randomly @AUTHOR: SANDY31OCT13------------->
                        <td align="right" class="paddingLeft15">
                            <input type="text" id="enterPageNo" name="enterPageNo" placeholder="PAGENO" class="pageNoButton" size="5"
                                   onblur="if (this.value !== '') {
                                                           javascript:showSelectPageRawMetalList(this.value, '<?php echo $panel; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', '', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', 'stockPanelSellList', '', '<?php echo $userId; ?>');
                                                       }"
                                   onkeypress="if (event.keyCode == '13') {
                                                           if (this.value !== '') {
                                                               javascript:showSelectPageRawMetalList(this.value, '<?php echo $panel; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', '', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', 'stockPanelSellList', '', '<?php echo $userId; ?>');
                                                           }
                                                       }"
                                   onclick="this.value = '';"
                                   />
                        </td>
                        <!--End to add textfield to navigate to any page randomly @AUTHOR: SANDY31OCT13------------->
                    <?php } ?>
                    <!---End of change in code @AUTHOR: SANDY9NOV13----------------->
                </tr>
            </table>
            <?php
        }
    }
    ?>
</div>
<br/>
