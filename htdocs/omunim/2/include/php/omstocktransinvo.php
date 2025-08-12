<?php
/*
 * 
 * Created on sept 2, 2024
 * common file for show invoice
 * @FileName: omstocktransinvo.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: Modified by @Author: KHUSH22JAN13
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
include_once 'ommpnmwd.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Online Munim Invoice</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="imagetoolbar" content="no" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/ogcss.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/print.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/invoice.css" />
      

    </head>
    <body>
<div id="stockTransVoucherDataDiv">
    <?php
    //
    $voucherCode = $_REQUEST['voucherCode'];
    $transferedFirm = $_REQUEST['transferedFirm'];
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
    <div style="font-size: 16px;color:green;text-align:center;margin:0 0 10px;font-weight:600;">VOUCHER CODE - <?php echo$voucherCode ?></div>
    
    <table class="brdrgry-dashed" style="border:1px dashed #267810;" width="100%" cellspacing="0" cellpadding="5" align="center">
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
            
        </tbody>
    </table>
     <table width="100%" align="center">
                <tr>
                    <td align="center" class="noPrint">
                        <a style="cursor: pointer;" 
                          onclick="window.print();">
                            <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='PRINT' title='PRINT'
                                 width="32px" height="32px" /> 
                        </a> 
                    </td>
                </tr>
            </table>
</div>
    </body>
</html>