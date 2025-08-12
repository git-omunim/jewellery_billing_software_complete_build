<?php
/*
 * **************************************************************************************
 * @Description: ADD STERLING PURCHASE ON ADD STOCK PANEL  - SHOW DROPDOWN FIELDS.
 * **************************************************************************************
 *
 * Created on DEC 28, 2018 06:24:58 PM 
 * **************************************************************************************getCrystalPreId
 * @FileName: omstraidsl.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 2.6.94
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen, Inc
 * *****************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: 
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 1.0.0
 * Version: 2.6.14
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
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php

$sessionOwnerId = $_SESSION['sessionOwnerId'];
$id = $_GET['id'];
$div = $_GET['div'];
$mainPanel = $_GET['mainPanel'];
$itemPreId = trim($_GET['itemPreId']);
$stockType = $_GET['stockType'];

//echo '$stockType == '.$stockType.'<br />';
//echo '$itemPreId == '.$itemPreId.'<br />';
//echo '$mainPanel == '.$mainPanel.'<br />';
//echo '$div == '.$div.'<br />';
//echo '$id == '.$id.'<br />';

if ($stockType == 'retailStock' || $stockType == 'retail') {
    $stockType = 'retail';
}

$list = 'true';

    if ($stockType == 'retailStock' || $stockType == 'retail') {
        $selItemPreId = "SELECT sttr_item_pre_id from stock_transaction where sttr_owner_id ='$sessionOwnerId' and sttr_stock_type = 'retail' and sttr_indicator = 'strsilver' and sttr_item_pre_id LIKE '$itemPreId%' GROUP BY(sttr_item_pre_id) order by sttr_id desc";
        $resItemPreId = mysqli_query($conn,$selItemPreId);
        $noOfItems = mysqli_num_rows($resItemPreId);
        if ($noOfItems == 0) {
            $list = 'false';
        }
    } else {
        $selItemPreId = "SELECT sttr_item_pre_id from stock_transaction where sttr_owner_id ='$sessionOwnerId' and sttr_stock_type = 'wholesale' and sttr_indicator = 'strsilver' and sttr_item_pre_id LIKE '$itemPreId%' GROUP BY(sttr_item_pre_id) order by sttr_id desc";
        $resItemPreId = mysqli_query($conn,$selItemPreId);
        $noOfItems = mysqli_num_rows($resItemPreId);
        if ($noOfItems == 0) {
            $list = 'false';
        }
    }
    
if ($list == 'true') {
    ?>
    <SELECT class="goldIdListDivToAddGoldIdSelect" id="itemPreIdListToSel" name="itemPreIdListToSel" 
            onclick="this.value = '';
                     clearDivision('<?php echo $div; ?>');"
            onkeyup ="if (event.keyCode == 13) {
                          document.getElementById('sttr_item_pre_id').value = this.value;
                          document.getElementById('changedItemPreId').value = this.value;
                          document.getElementById('sttr_item_pre_id').focus();
                          clearDivision('<?php echo $div; ?>');
                        }"     
            onkeyup ="if (event.keyCode == 13) {
                          document.getElementById('sttr_item_pre_id').value = this.value;
                          document.getElementById('changedItemPreId').value = this.value;
                          document.getElementById('sttr_item_pre_id').focus();
                          clearDivision('<?php echo $div; ?>');
                       }"
            onkeypress="if (event.keyCode == 13) {
                            var str = this.value;
                            document.getElementById('sttr_item_pre_id').value = str;
                            document.getElementById('changedItemPreId').value = str;
                            document.getElementById('sttr_item_pre_id').focus();
                            clearDivision('<?php echo $div; ?>');
                        }"
            onblur="getSterlingPreId(this.value, 'StrelleringStock', 'stockPanelFormDiv');"
            multiple="multiple" size="8" <?php if ($stockType == 'retailStock' || $stockType == 'retail') { ?> style="width:90px;" <?php } else { ?> style="width:160px;" <?php } ?>>
        <?php
            if ($stockType == 'retailStock' || $stockType == 'retail') {
                $selItemPreId = "SELECT sttr_item_pre_id from stock_transaction where sttr_owner_id ='$sessionOwnerId' and sttr_stock_type = 'retail' and sttr_indicator = 'strsilver' GROUP BY(sttr_item_pre_id) order by sttr_id desc";
                $resItemPreId = mysqli_query($conn,$selItemPreId);
                while ($row = mysqli_fetch_array($resItemPreId, MYSQLI_ASSOC)) {
                    $itemPreIdNew = $row['sttr_item_pre_id'];
                    echo "<OPTION  VALUE=" . "\"{$row['sttr_item_pre_id']}\"" . " class=" . "\"content-mess-maron-arial\"" . " >{$itemPreIdNew}</OPTION>";
                }
            } else {
                $selItemPreId = "SELECT sttr_item_pre_id from stock_transaction where sttr_owner_id ='$sessionOwnerId' and sttr_stock_type = 'wholesale' and sttr_indicator = 'strsilver' GROUP BY(sttr_item_pre_id) order by sttr_id desc";
                $resItemPreId = mysqli_query($conn,$selItemPreId);
                while ($row = mysqli_fetch_array($resItemPreId, MYSQLI_ASSOC)) {
                    $itemPreIdNew = $row['sttr_item_pre_id'];
                    echo "<OPTION  VALUE=" . "\"{$row['sttr_item_pre_id']}\"" . " class=" . "\"content-mess-maron-arial\"" . " >{$itemPreIdNew}</OPTION>";
                }
            }
        ?>
    </SELECT>
<?php } ?>
