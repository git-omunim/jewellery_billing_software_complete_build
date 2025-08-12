<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on Oct 6, 2014 4:45:05 PM
 *
 * @FileName: omSharesTable.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
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
?>
<style>
    .alertnate {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .alertnate td, .alertnate th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .alertnate tr:nth-child(even){background-color: #f2f2f2;}

    .alertnate tr:hover {background-color: #ddd;}

    .alertnate th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color:#D8D5D5;
        color:#000;
        font-size:13px;
    }
    .alertnate1 {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        font-weight: bold;
        font-size: 14px;
    }
</style>
<table class="alertnate" style="margin-top:15px;" valign="top" align="left">
    <tr>
        <th>Date</th>
        <th>Description</th>
        <th>QTY</th>
        <th>Share Price</th>
        <th>Total Amount</th>
        <th>Status</th>
        <th>Delete</th>
    </tr>
    <?php
    //
    $queryShares = "select * from user_transaction_invoice where utin_type = 'Shares' and utin_user_id = '$custId'";
//    echo '$queryShares =='.$queryShares;
    $resultShares = mysqli_query($conn, $queryShares);
    //
//    $totalLoyalty = 0;
    while ($rowShares = mysqli_fetch_array($resultShares, MYSQLI_ASSOC)) {
        //
        $utin_id = $rowShares['utin_id'];
        //
        $transactionType = $rowShares['utin_transaction_type'];
        //
        $shareDesc = $rowShares['utin_prod_details'];
        //
        $totalQty += $rowShares['utin_prod_qty'];
        //
        //
        if ($transactionType == 'Purchased') {
            //
            $AddSharesQty += $rowShares['utin_prod_qty'];
            //                    
        }
        //
        if ($transactionType == 'Sold') {
            //
            $paySharesQty += $rowShares['utin_prod_qty'];
            //
        }
        //
        ?>
        <tr>
            <td><?php echo $rowShares['utin_date']; ?></td>
            <td><?php echo $rowShares['utin_prod_details']; ?></td>
            <td><?php echo $rowShares['utin_prod_qty']; ?></td>
            <td><?php echo $rowShares['utin_prod_unit_price']; ?></td>
            <td><?php echo $rowShares['utin_total_amt']; ?></td>
            <td><?php echo $rowShares['utin_transaction_type']; ?></td>
            <td align="center">
                <a style="cursor: pointer;"  onclick="deleteShares('sharesDelete', '<?php echo $utin_id; ?>', '<?php echo $custId; ?>');" >
                    <img src="<?php echo $documentRoot; ?>/images/delete16.png" alt="" class="marginTop5" />          
                </a>
            </td>
        </tr>
        <?php
    }
    //
    $remShares = ($AddSharesQty - $paySharesQty);
    //
    ?>
</table>
<table align="left" border="0" cellspacing="0" cellpadding="1" width="100%" style="margin-top:5px;" id="totalTable">
    <tr>
        <td colspan="0" align="left" class="alertnate1"  valign="top" style="width: 360px;">AVAILABLE SHARES : </td>
        <td align="left" class="alertnate1"  valign="top" style="width: 600px;">
            <?php echo $remShares; ?>
        <td align="left" class="alertnate1"  valign="top">
            <input id="loyaltyDeleteAll" onclick="deleteAllShares('sharesDeleteAll', '<?php echo $utin_id; ?>', '<?php echo $custId; ?>');"
                                       type="submit" value="DELETE ALL" class="frm-btn" style="margin: 5px; width: 80px; font-size: 14px;background:#cd0707;color:#fff;" />
        </td>
    </tr>
</table>
<!--<table border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
    <tr>
        <td valign="middle" align="center" class="noPrint">
            <a style="cursor: pointer;" 
               onclick="printOmgoldPageDiv('loyaltyCard', '')">
                <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print'
                     width="32px" height="32px" /> 
            </a> 
        </td>
    </tr>
</table>-->
