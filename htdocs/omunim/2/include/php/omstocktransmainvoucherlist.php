<?php
/*
 * *************************************************************************************************
 * @Description: STOCK TRANSFER MAIN VOUCHER LIST  @Author:DNYANESHWARI 10SEPT2024
 * *************************************************************************************************
 *
 * Created on SEPT 10, 2024 01:33:00 PM 
 * **************************************************************************************
 * @FileName: omstocktransmainvoucherlist.php
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
<div id="stockTransMainVoucherListDiv">
    <?php
    // ADDED CODE FOR PANEL HEADING @Author:PRIYANKA-29JULY2022
    $headingNameForPanel = 'STOCK TRANSFER VOUCHER LIST';
    include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportAllButtons.php';
    if ($_SESSION['setFirmSession'] != '') {
        $strFrmId = $_SESSION['setFirmSession'];
    } else {
        $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
    }
    //
    $qGetAllVoucherCode = "SELECT * FROM stock_transfer WHERE sttrans_own_id='$sessionOwnerId' and sttrans_status='transfered' and (sttrans_prev_firm in ($strFrmId) or sttrans_new_firm in ($strFrmId)) group by sttrans_pre_voucher_no , sttrans_voucher_no";
    $resGetAllVoucherCode = mysqli_query($conn, $qGetAllVoucherCode);
    //
    ?>
    <table align="left" width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
            <td>
                <table class="brdrgry-dashed" style="border:1px dashed #e75a5a;margin-top: 20px;" width="60%" cellspacing="0" cellpadding="5" align="center">
                    <tbody>
                        <tr class="height28" style="background:#fffbe8">
                            <td class="brwnCalibri12Font border-color-grey-rb" title="ITEM NAME" width="33.33%" align="center">
                                <div class="spaceLeft5">VOUCHER CODE</div>
                            </td>
                            <td class="brwnCalibri12Font border-color-grey-rb" title="ITEM NAME" width="33.33%" align="center">
                                <div class="spaceLeft5">DATE</div>
                            </td>
                            <td  class="brwnCalibri12Font border-color-grey-rb" title="QTY" width="33.33%" align="center">
                                <div class="spaceLeft5">TRANSFERRED FIRM</div>
                            </td>
                            <td style="border-right:0;" class="brwnCalibri12Font border-color-grey-rb" title="QTY" width="33.33%" align="center">
                                <div class="spaceLeft5">Invoice</div>
                            </td>
                        </tr>
                        <?php
                        // 
                        while ($rowGetAllVoucherCode = mysqli_fetch_array($resGetAllVoucherCode)) {
                              $voucherCode = $rowGetAllVoucherCode['sttrans_pre_voucher_no'] . '|' . $rowGetAllVoucherCode['sttrans_voucher_no'];
                            //
                            $tranFirmId = $rowGetAllVoucherCode['sttrans_new_firm'];
                            $qtransferedFirmName = "select firm_name from firm where firm_own_id='$_SESSION[sessionOwnerId]' and firm_id='$tranFirmId'";
                            $restransferedFirmName = mysqli_query($conn, $qtransferedFirmName);
                            $rowtransferedFirmName = mysqli_fetch_array($restransferedFirmName);
                            $transferedFirmName = $rowtransferedFirmName['firm_name'];
                            ?>
                            <tr style="background:#fff;">
                                <td class="blackCalibri12Font border-color-grey-rb" align="center">
                                    <a style="cursor: pointer;" title="Single click to view Voucher Details!" onclick="javascript:showStockTransVoucherDetails('<?php echo $voucherCode; ?>', '<?php echo $transferedFirmName; ?>')">
                                        <div><?php echo $voucherCode; ?></div>
                                    </a>
                                </td>
                                <td class="blackCalibri12Font border-color-grey-rb" align="center">
                                    <?php
                                    echo $rowGetAllVoucherCode['sttrans_trans_date']; 
                                    ?>
                                </td>
                                <td  class="blackCalibri12Font border-color-grey-rb" title="fsdf" align="center">
                                     <div class="spaceLeft5"><?php echo $transferedFirmName; ?></div>
                                </td>
                                <td style="border-right:0;" class="blackCalibri12Font border-color-grey-rb" title="fsdf" align="center">
                                    <a href="" onclick="window.open('<?php echo $documentRoot; ?>/include/php/omstocktransinvo.php?voucherCode=<?php echo $voucherCode; ?>&transferedFirm=<?php echo $transferedFirmName; ?>&form8Lay=',
                                                                    'popup', 'width=810,height=930,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                            return false"><img src="<?php echo $documentRoot; ?>/images/img/invoice-iconf.png" alt="Item Invoice" title="Item Invoice" width="16px" height="16px"></a>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr></tr>
                    </tbody>
                </table>
            </td> 
        </tr>
    </table>
</div>

