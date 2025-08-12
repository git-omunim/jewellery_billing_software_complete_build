<?php
/*
 * **************************************************************************************
 * @tutorial: Sell Purchase Main Division
 * **************************************************************************************
 *
 * Created on 16 Dec, 2012 5:27:17 PM
 *
 * @FileName: ogspspdv.php
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
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
if ($custId == null || $custId == '') {
    $custId = $_REQUEST['custId'];
}
?>
<div class="m-portlet__body" style="display:'<?php echo $disp; ?>';">
    <ul class="nav nav-pills nav-pills--warning nav-fill" role="tablist" style="height:30px;background:#ebedf2;margin-bottom:5px;border-bottom: 1px solid #e9e9e9;box-shadow: 1px 2px 10px rgba(214, 213, 213, 0.3);">                          
        <?php
        if ($_SESSION['sessionOwnIndStr'][20] == 'Y' ||
                $_SESSION['sessionOwnIndStr'][20] == 'A' || $_SESSION['sessionOwnIndStr'][20] == 'B') {
            if ($_SESSION['sessionProdVer'] == 'OMUNIM3.0.0') {
                ?>
                <li class="nav-item dropdown" style="z-index:0;">  
                    <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false" onclick="navigatationPanelByFileName('cust_middle_body', 'stock/omStockSearch', 'FINE_JEWELLERY_RETAIL_PUR_B4', 'stock', 'sell', '', '', 'stock', '<?php echo $custId; ?>', '', '', '', '<?php echo $firmId; ?>');" style="font-size:17.5px!important;font-family: 'Calibri', sans-serif;">
                        SELL FINE JEWELLERY
                    </button> 
                </li>
            <?php } else { ?>
                <li class="nav-item dropdown" style="z-index:0;">  
                    <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false" onclick="navigatationPanelByFileName('cust_middle_body', 'stock/omStockSearch', 'FINE_JEWELLERY_RETAIL_PUR_B4', 'stock', 'sell', '', '', 'stock', '<?php echo $custId; ?>', '', '', '', '<?php echo $firmId; ?>');" style="font-size:17.5px!important;font-family: 'Calibri', sans-serif;">
                        SELL FINE JEWELLERY
                    </button> 
                </li>
                <li class="nav-item" style="z-index:0;"> 
                    <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false" onclick="navigatationPanelByFileName('cust_middle_body', 'ogrtjsdv', 'FINE_JEWELLERY_SELL_RETURN', '', '', '', '', 'stock', '<?php echo $custId; ?>');" style="font-size:17.5px!important;font-family: 'Calibri', sans-serif;">
                        RETURN FINE JEWELLERY
                    </button> 
                </li>

                <?php
            }
        }
        ?>

        <li class="nav-item" style="z-index:0;">
            <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false" onclick="navigatationPanelByFileName('cust_middle_body', 'ogrwiadv', 'CustSell', 'rawMetal', 'sell', '', '', 'rawMetal', '<?php echo $custId; ?>', 'SELL', 'Customer', '', '<?php echo $firmId; ?>');" style="font-size:17.5px!important;font-family: 'Calibri', sans-serif;">
                RAW METAL
            </button> 
        </li> 
        <?php
        if ($_SESSION['sessionOwnIndStr'][14] == 'A' ||
                $_SESSION['sessionOwnIndStr'][14] == 'S') {
            //                           
            if ($_SESSION['sessionProdVer'] == 'OMUNIM3.0.0') {
                ?>

            <?php } else { ?>
                <li class="nav-item" style="z-index:0;">
                    <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false" onclick="resetEstimateInvNo();navigatationPanelByFileName('cust_middle_body', 'omestimate', 'Estimate', 'ESTIMATE', 'ESTIMATE', '', '', '', '<?php echo $custId; ?>', '', '', '', '<?php echo $firmId; ?>');" style="font-size:17.5px!important;font-family: 'Calibri', sans-serif;">
                        QUOTATION
                    </button> 
                </li>                          

                <?php
            }
        }
        ?>

        <?php
        if ($_SESSION['sessionOwnIndStr'][14] == 'A' ||
                $_SESSION['sessionOwnIndStr'][14] == 'S') {
            ?>
            <li class="nav-item" style="z-index:0;">
                <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false" onclick="resetEstimateInvNo();navigatationPanelByFileName('cust_middle_body', 'omestimatelist', 'estimateList', '', 'ESTIMATE', '', '', '', '<?php echo $custId; ?>', '', '', '', '<?php echo $firmId; ?>');" style="font-size:17.5px!important;font-family: 'Calibri', sans-serif;">
                    QUOTATION LIST
                </button>
            <?php } ?>                  
    </ul>
</div>