<?php
/*
 * **************************************************************************************
 * @Description: Pending Stock Transfer Table @DNYANESHWARI21AUG2024
 * **************************************************************************************
 *
 * Created on AUG 21, 2021 07:12:00 PM 
 * **************************************************************************************
 * @FileName: omtransferpendingstocktbl.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.7.102
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * *****************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: 
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 2.7.102
 * Version: 2.7.102
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
$accFileName = $currentFileName;
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include 'ommpsbac.php';
include_once 'ommpfndv.php';
include_once 'conversions.php';
require_once 'ommpincr.php';
$staffId = $_SESSION['sessionStaffId'];
$documentRoot = $_SESSION['documentRoot'];
?>
<table align="center" border="0" cellspacing="0" cellpadding="0" style="background-color: #e6f7ff;border: 1px dashed #36b0ea;border-top:0;" width="70%">
    <?php
    //
//    echo "<pre>";
//    print_r($_REQUEST);
//    echo "</pre>";
    $selectedFirm = $_REQUEST['selectedFirm'];
    $operation = $_REQUEST['operation'];
    $stTransId = $_REQUEST['stTransId'];
    $sttransPreVoucherNo = $_REQUEST['sttransPreVoucherNo'];
    $sttransVoucherNo = $_REQUEST['sttransVoucherNo'];
    //
    $sessionOwnerId = $_SESSION['sessionOwnerId'];
    //
    //WORKING OF CANCEL BUTTON WHEN WE TAKE DATA FOR TRANSFER
    if ($operation == 'cancelStockTransfer') {
        $qDelCancelStTrans = "DELETE FROM stock_transfer where sttrans_id='$stTransId' and sttrans_status='readyToTransfer'";
        //
        if (!mysqli_query($conn, $qDelCancelStTrans)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
    //WORKING OF RESET BUTTON TO RESET AT A TIME
    if ($operation == 'resetStockTransfer') {
//              echo $delCancelStTrans = "DELETE FROM stock_transfer where sttrans_id='$stTransId'";
        $qDelresetStTrans = "DELETE FROM stock_transfer where sttrans_status='readyToTransfer' and sttrans_pre_voucher_no='$sttransPreVoucherNo' and sttrans_voucher_no='$sttransVoucherNo'";
        //
        if (!mysqli_query($conn, $qDelresetStTrans)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
    //
    //START TABLE
    if ($selectedFirm == '' || $selectedFirm == NULL) {
        $qSelPerFirm = "SELECT firm_id,firm_name,firm_type FROM firm where "
                . "firm_own_id = '$_SESSION[sessionOwnerId]' and firm_id='$_SESSION[setFirmSession]' order by firm_since desc limit 0,1";
        $resSelPerFirm = mysqli_query($conn, $qSelPerFirm);
        $rowSelPerFirm = mysqli_fetch_array($resSelPerFirm);
        $selectedFirm = $rowSelPerFirm['firm_id'];
    }
    //
    if ($_SESSION['setFirmSession'] != '') {
        $strFrmId = $_SESSION['setFirmSession'];
    } else {
        $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
    }

//   echo $getTransferedStock = "SELECT sttr_id,sttr_item_code,sttr_item_name,sttr_item_category,sttr_quantity,sttr_gs_weight,sttr_stock_transfer_previous_firm_id,sttr_firm_id FROM stock_transaction where sttr_stock_transfer_success_status='transferPending' and sttr_firm_id='$selectedFirm' and sttr_indicator NOT IN ('stockCrystal')";
    $getTransferedStock = "SELECT sttrans_sttr_id,sttrans_item_code,sttrans_item_name,sttrans_item_category,sttrans_qty,sttrans_gs_wt,sttrans_prev_firm,sttrans_new_firm,sttrans_id FROM stock_transfer where sttrans_own_id='$sessionOwnerId' and sttrans_status='readyToTransfer' and sttrans_new_firm='$selectedFirm' and sttrans_prev_firm IN($strFrmId) order by sttrans_id";

// 
    $resTransferedStock = mysqli_query($conn, $getTransferedStock);
    $noOfRows = mysqli_num_rows($resTransferedStock);
    //
    ?>

    <?php
    if ($noOfRows > 0) {
        $qGetVoucherDetails = "SELECT sttrans_pre_voucher_no,sttrans_voucher_no FROM stock_transfer where sttrans_own_id='$sessionOwnerId' and sttrans_status='readyToTransfer' and sttrans_new_firm='$selectedFirm'";
        $resGetVoucherDetails = mysqli_query($conn, $qGetVoucherDetails);
        $rowGetVoucherDetails = mysqli_fetch_array($resGetVoucherDetails);
        $SttransPreVoucherNo = $rowGetVoucherDetails['sttrans_pre_voucher_no'];
        $SttransVoucherNo = $rowGetVoucherDetails['sttrans_voucher_no'];
        ?>
        <tr>
            <td colspan="6" class="itemAddPnLabels14 paddingTop5" width="550px" align="center">
                <span class="main_link_brown">VOUCHER NO: </span><span class="ff_arial fw_b fs_12 black"> <?php echo $SttransPreVoucherNo; ?> | <?php echo $SttransVoucherNo; ?></span>
            </td>
        </tr>
        <tr><td colspan="7">
                <table class="brdrgry-dashed" style="border-bottom: 0" width="80%" cellspacing="0" cellpadding="5" align="center">
                    <tbody>
                        <tr class="height28" style="background:#e3edf4;color:#000080;">
                            <td class="brwnCalibri12Font border-color-grey-rb" title="ITEM NAME" width="50px" align="center" style="color:#000080;">
                                <div class="spaceLeft5">IT ID</div>
                            </td>
                            <td class="brwnCalibri12Font border-color-grey-rb" title="ITEM NAME" width="60px" align="center" style="color:#000080;">
                                <div class="spaceLeft5">ITEM NAME</div>
                            </td>
                            <td class="brwnCalibri12Font border-color-grey-rb" title="ITEM CATEGORY" width="50px" align="center" style="color:#000080;">
                                <div class="spaceLeft5">ITEM CATEGORY</div>
                            </td>
                            <td class="brwnCalibri12Font border-color-grey-rb" title="QTY" width="50px" align="center" style="color:#000080;">
                                <div class="spaceLeft5">QTY</div>
                            </td>
                            <td class="brwnCalibri12Font border-color-grey-rb" title="GROSS WEIGHT" width="70px" align="center" style="color:#000080;">
                                GS WT
                            </td>
                            <td class="brwnCalibri12Font border-color-grey-rb" title="PREVIOUS FIRM" width="60px" align="center" style="color:#000080;">
                                <div class="spaceRight5">PREVIOUS FIRM</div>
                            </td>
                            <td class="brwnCalibri12Font border-color-grey-rb" title="NEW FIRM" width="60px" align="center" style="color:#000080;">
                                <div class="spaceRight5">NEW FIRM</div>
                            </td>
                            <td class="brwnCalibri12Font border-color-grey-rb" title="NEW FIRM" width="60px" align="center" style="color:#000080;">
                                <div class="spaceRight5">CANCEL</div>
                            </td>
                        </tr>
                        <?php while ($rowTransferedStock = mysqli_fetch_array($resTransferedStock)) { ?>
                            <tr style="background:#fff;">
                                <td class="blackCalibri12Font border-color-grey-rb" align="center">
                                    <?php echo $rowTransferedStock['sttrans_item_code'] ?>
                                </td>
                                <td class="blackCalibri12Font border-color-grey-rb" align="center">
                                    <?php echo $rowTransferedStock['sttrans_item_name'] ?>
                                </td>
                                <td class="blackCalibri12Font border-color-grey-rb" align="center">
                                    <div class="spaceLeft5"> <?php echo $rowTransferedStock['sttrans_item_category'] ?></div>
                                </td>
                                <td class="blackCalibri12Font border-color-grey-rb" title="fsdf" align="center">
                                    <div class="spaceLeft5"> <?php echo $rowTransferedStock['sttrans_qty'] ?></div>
                                </td>
                                <td class="blackCalibri12Font border-color-grey-rb" align="center">
                                    <?php echo $rowTransferedStock['sttrans_gs_wt'] ?>                 
                                </td>
                                <td class="blackCalibri12Font border-color-grey-rb" width="80px" align="center">
                                    <?php
                                    $prevFirmId = $rowTransferedStock['sttrans_prev_firm'];
                                    $qSelPerFirmPrev = "select firm_name from firm where firm_own_id='$_SESSION[sessionOwnerId]' and firm_id='$prevFirmId'";
                                    $resSelPerFirmPrev = mysqli_query($conn, $qSelPerFirmPrev);
                                    $rowSelPerFirmPrev = mysqli_fetch_array($resSelPerFirmPrev);
                                    $prevFirmName = $rowSelPerFirmPrev['firm_name'];
                                    ?>
                                    <div class="spaceRight5"> <?php echo $prevFirmName ?></div>
                                </td>
                                <td class="blackCalibri12Font border-color-grey-rb" width="80px" align="center">
                                    <?php
                                    $currFirmId = $rowTransferedStock['sttrans_new_firm'];
                                    $qSelPerFirmCurr = "select firm_name from firm where firm_own_id='$_SESSION[sessionOwnerId]' and firm_id='$currFirmId'";
                                    $resSelPerFirmCurr = mysqli_query($conn, $qSelPerFirmCurr);
                                    $rowSelPerFirmCurr = mysqli_fetch_array($resSelPerFirmCurr);
                                    $currFirmName = $rowSelPerFirmCurr['firm_name'];
                                    ?>
                                    <div class="spaceRight5"><span style="font-weight: 900;color:#4cae4c;"> <?php echo $currFirmName; ?></span></div>
                                </td>
                                <td class="blackCalibri12Font border-color-grey-rb" width="60px" align="center" style="cursor: pointer;" onclick="showTransferData('<?php echo $selectedFirm ?>', '<?php echo $rowTransferedStock['sttrans_id'] ?>', 'cancelStockTransfer');">
                                    <div class="spaceRight5"><span style="font-weight: 900;color:red;"><img src="<?php echo $documentRoot; ?>/images/delete16.png" style="vertical-align: bottom;"></span></div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                        </tr></tbody></table>
            </td>  
        </tr>
        <tr>
            <td colspan="4" align="center">
                <button type="button" id="button" name="" onclick="showTransferData('<?php echo $selectedFirm ?>', '', 'resetStockTransfer', '<?php echo $SttransPreVoucherNo ?>', '<?php echo $SttransVoucherNo ?>');" value="Submit" class="btn om_btn_style" style="width:120px;height:32px;font-size: 14px;border: 1px solid #7ab0fe;border-radius: 5px !important;font-weight: 600;text-transform: uppercase;margin-top:10px; ">
                    <span>RESET</span>
                </button>
                <button type="button" id="button" name="" onclick="stockTransManagementByCsvFile('sendData', '<?php echo $SttransPreVoucherNo ?>', '<?php echo $SttransVoucherNo ?>');
                            getStockTransferSelectedOptionsFunc(document.getElementById('productCounter').value, document.getElementById('selectedStaff').value,
                                    document.getElementById('FirmName').value, '<?php echo $stockTransferNavPanelName; ?>', '');" value="Submit" class="btn om_btn_style" style="width:120px;height:32px;font-size: 14px;border: 1px solid #7ab0fe;border-radius: 5px !important;font-weight: 600;text-transform: uppercase;margin-top:10px; ">
                    <span>SEND</span>
                </button>
            </td>
        </tr>
    <?php }
    ?>
</table>
<!--END TABLE-->