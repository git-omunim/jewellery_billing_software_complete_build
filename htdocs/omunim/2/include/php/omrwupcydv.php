<?php
/*
 * **************************************************************************************
 * @tutorial: RAW METAL PANEL DIV @Author:PRIYANKA-14MAR19
 * **************************************************************************************
 * 
 * Created on MAR 14, 2019 17:20:33 PM
 *
 * @FileName: omrwupcydv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 3.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
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
?>
<div id="suppSellPurProdSubDiv">
    <?php
    //
    $sessionOwnerId = $_SESSION[sessionOwnerId];
    $metalType = $_GET['metalType'];
    $simItem = $_GET['simItem'];
    $panelSimilarDiv = $simItem;
    //
    if ($subPanel == '')
        $subPanel = $_GET['subPanel'];
    if ($metalType == '' || $metalType == 'undefined')
        $metalType = 'Gold';
    if ($suppId == '')
        $suppId = $_GET['suppId'];
    //
    $AddItemPanel = 'AddItem';
    $UpPanel = 'AddPanel';
    //
    parse_str(getTableValues("SELECT met_rate_value FROM metal_rates where met_rate_own_id='$sessionOwnerId' and met_rate_metal_name='$metalType' order by met_rate_ent_dat desc LIMIT 0, 1"));
    $sttr_metal_rate = trim($met_rate_value);
    $sttr_metal_type = 'Gold';
    
    if ($itemSubPanel != 'addByItemsUp' && $itemSubPanel != 'itemsAddUp') {
        parse_str(getTableValues("SELECT sttr_item_pre_id,sttr_item_id FROM stock_transaction WHERE sttr_owner_id='$sessionOwnerId' order by sttr_id desc LIMIT 0,1"));
        if (($sttr_item_pre_id == '' || $sttr_item_pre_id == NULL) && $metalType == 'Gold') {
            $sttr_item_pre_id = 'PG';
        } else if (($sttr_item_pre_id == '' || $sttr_item_pre_id == NULL) && $metalType == 'Silver') {
            $sttr_item_pre_id = 'PS';
        } else if (($sttr_item_pre_id == '' || $sttr_item_pre_id == NULL) && $metalType == 'Other') {
            $sttr_item_pre_id = 'PO';
        }
        if ($sttr_item_id == '' || $sttr_item_id == NULL) {
            $sttr_item_id = 1;
        } else {
            $sttr_item_id++;
        }
    }
    $metalType = $itpr_metal_type;
    include 'ogiartdv.php';
    ?>
    <table border="0" cellspacing="0" cellpadding="0" align="center" valign="bottom" width="100%">
        <tr>
            <td align="center"valign="bottom">
                <input type="hidden" id="suppLotId" name="suppLotId" value="<?php echo $suppLotId; ?>" />
                <input type="hidden" id="stprId" name="sttrId" value="<?php echo $sttrId; ?>" />
                <input type="hidden" id="itstId" name="itstId" value="<?php echo $itpr_itst_id; ?>" />
                <input type="hidden" id="suppPanel" name="suppPanel" value="SuppPanel"/>

                <?php
                $commonPanel = 'SuppPurByItem';
                include 'ogrwaddv.php';
                ?>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="16" class="paddingTop5 paddingBott2">
                <div class="hrGrey"></div>
            </td>
        </tr>
    </table>
</div>