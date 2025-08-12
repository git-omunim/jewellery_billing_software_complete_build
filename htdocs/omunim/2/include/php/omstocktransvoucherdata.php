<?php
/*
 * *************************************************************************************************
 * @Description: STOCK TRANSFER VOUCHER DETAILS LIST  @Author:DNYANESHWARI 10SEPT2024
 * *************************************************************************************************
 *
 * Created on SEPT 10, 2024 01:33:00 PM 
 * **************************************************************************************
 * @FileName: omstocktransvoucherdata.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2.7.164
 * @version: OMUNIM 2.7.164
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:  @Author:DNYANESHWARI 10SEPT2024
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software OMUNIM 2.7.164
 * Version: OMUNIM 2.7.164
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
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
require_once 'conversions.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
?>
<div id="stockTransVoucherDataDiv">
    <?php
    //
    $voucherCode = $_REQUEST['voucherCode'];
    $transferedFirm = $_REQUEST['transferedFirm'];
    //
    // ADDED CODE FOR PANEL HEADING 
    $headingNameForPanel = 'STOCK TRANSFER VOUCHER LIST';
    include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportAllButtons.php';
    //
    $qVoucherDetails = "SELECT sttr_item_code,sttr_item_category,sttr_item_name,sttr_quantity,sttr_gs_weight,
    SUBSTRING_INDEX(SUBSTRING_INDEX(sttr_trans_date, '#', position), '#', -1) AS sttr_trans_date,
    SUBSTRING_INDEX(SUBSTRING_INDEX(sttr_stock_trans_history, '#', position), '#', -1) AS sttr_stock_trans_history
  FROM (
    SELECT
        sttr_id,
        FIND_IN_SET('$voucherCode', REPLACE(sttr_voucher_history, '#', ',')) AS position,
        sttr_item_code,
        sttr_trans_date,
        sttr_stock_trans_history,sttr_item_category,sttr_item_name,sttr_quantity,sttr_gs_weight
    FROM stock_transaction where sttr_indicator NOT IN('stockCrystal')
) AS temp
WHERE position > 0";
    //
    $resVoucherDetails = mysqli_query($conn, $qVoucherDetails);
    //
    ?>
    <div style="text-align:end;">
         <a style="cursor: pointer;cursor: pointer;height:30px;line-height:24px;background: #D8F6D8;color: #006400;border-radius: 5px !important;width: 70px;font-size: 14px;font-weight: 600;border: 0;" class="btn btn-xs default" onclick="stockTransferAllReportFunc('stocktransmainvoucherlist');">
                                <i class="fa fa-angle-double-left"></i> BACK
                            </a>
    </div>
    <div style="font-size: 16px;color:green;text-align:center;margin:0 0 10px;font-weight:600;">VOUCHER CODE - <?php echo$voucherCode ?></div>
    
    <table class="brdrgry-dashed" style="border:1px dashed #267810;" width="70%" cellspacing="0" cellpadding="5" align="center">
        <tbody>

            <tr class="height28" style="background:#edffe8">
                <td class="brwnCalibri12Font border-color-grey-rb" title="VOUCHER CODE" width="50px" align="center">
                    <div class="spaceLeft5">PROD CODE</div>
                </td>
                <td class="brwnCalibri12Font border-color-grey-rb" title="DATE" width="50px" align="center">
                    <div class="spaceLeft5">DATE</div>
                </td>
                <td class="brwnCalibri12Font border-color-grey-rb" title="DATE" width="50px" align="center">
                    <div class="spaceLeft5">ITEM NAME</div>
                </td>
                <td class="brwnCalibri12Font border-color-grey-rb" title="DATE" width="50px" align="center">
                    <div class="spaceLeft5">ITEM CATEGOTY</div>
                </td>
                <td class="brwnCalibri12Font border-color-grey-rb" title="DATE" width="50px" align="center">
                    <div class="spaceLeft5">QTY</div>
                </td>
                <td class="brwnCalibri12Font border-color-grey-rb" title="DATE" width="50px" align="center">
                    <div class="spaceLeft5">GS WT</div>
                </td>
                <td class="brwnCalibri12Font border-color-grey-rb" title="TRANSFERRED FIRM" width="50px" align="center">
                    <div class="spaceLeft5">PREVIOUS FIRM</div>
                </td>
                <td class="brwnCalibri12Font border-color-grey-rb" style="border-right:0;" title="TRANSFERRED FIRM" width="50px" align="center">
                    <div class="spaceLeft5">TRANSFERED FIRM</div>
                </td>
            </tr>
            <?php while ($rowVoucherDetails = mysqli_fetch_array($resVoucherDetails)) { ?>
                <tr style="background:#fff;">
                    <td class="border-color-grey-rb" style="font-weight: 550;" align="center">
                            <div><?php echo $rowVoucherDetails['sttr_item_code']; ?></div>
                    </td>
                    <td class="blackCalibri12Font border-color-grey-rb" align="center">
                        <div><?php
                            $transDate = $rowVoucherDetails['sttr_trans_date'];
                            $transferdDate = explode('-', $transDate);
                            $date = $transferdDate[0];
                            echo $date;
                            ?></div>
                    </td>
                    <td class="blackCalibri12Font border-color-grey-rb" align="center">
                        <div><?php echo $rowVoucherDetails['sttr_item_name']; ?></div>
                    </td>
                    <td class="blackCalibri12Font border-color-grey-rb" align="center">
                        <div><?php echo $rowVoucherDetails['sttr_item_category']; ?></div>
                    </td>
                    <td class="blackCalibri12Font border-color-grey-rb" align="center">
                        <div><?php echo $rowVoucherDetails['sttr_quantity']; ?></div>
                    </td>
                    <td class="blackCalibri12Font border-color-grey-rb" align="center">
                        <div><?php echo $rowVoucherDetails['sttr_gs_weight']; ?></div>
                    </td>
                    <td class="blackCalibri12Font border-color-grey-rb" title="" align="center">
                        <div class="spaceLeft5"><?php echo $rowVoucherDetails['sttr_stock_trans_history']; ?></div>
                    </td>
                    <td style="border-right:0;" class="blackCalibri12Font border-color-grey-rb" title="" align="center">
                        <div class="spaceLeft5"><?php echo $transferedFirm; ?></div>
                    </td>

                </tr>
                <?php
            }
            ?>
            <tr></tr>
        </tbody>
    </table>
</div>

