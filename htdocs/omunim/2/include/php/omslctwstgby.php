<?php
/*
 * **************************************************************************************
 * @tutorial: SELL CUSTOMER WASTAGE BY GS/NT/FN WEIGHT @RUTUJA-02JAN2020
 * **************************************************************************************
 * 
 * Created on JAN 03, 2020 12:46:30 PM
 *
 * @FileName: omslctwstgby.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.6.86
 * @version 2.6.86
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:Rutuja
 *  REASON:
 *
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
$panel = $_GET['panel'];
//
//echo '$id =='.$id.'<br />';
//echo '$div =='.$div.'<br />';
//echo '$panel =='.$panel.'<br />';die;
//
?>
<?php if ($panel == 'MetalFormB2') { ?>
<select class="itemListDivToAddGirviSelect" id="sellCustWastgBy"  name="sellCustWastgBy" 
        onchange="javascript: if (document.getElementById('sttr_purity').value != '') {
                    document.getElementById('sttr_cust_wastg_by').value = this.value;
                    calculateSellCustWastageWt();
                    calculateSellPrice();
                    return false;
                }"
        onclick="clearDivision('<?php echo $div; ?>');"
        multiple="multiple" size="8" >
    <option value="custWastgByFineWt" title="CUST WASTG BY FINE WT">FINE WT</option>
    <option value="custWastgByNetWt" title="CUST WASTG BY NET WT">NET WT</option>
    <option value="custWastgByGrossWt" title="CUST WASTG BY GROSS WT">GROSS WT</option>
</select>
<?php } else { ?>
<select class="itemListDivToAddGirviSelect" id="sellCustWastgBy"  name="sellCustWastgBy" 
        onchange="javascript: if (document.getElementById('sttr_purity').value != '') {
                    document.getElementById('sttr_cust_wastg_by').value = this.value;
                    calculateSellCustWastageWt();
                    calculateSellPrice();
                    return false;
                }"
        onclick="clearDivision('<?php echo $div; ?>');"
        multiple="multiple" size="3" style="width:90px;">
    <option value="custWastgByFineWt" title="CUST WASTG BY FINE WT">FINE WT</option>
    <option value="custWastgByNetWt" title="CUST WASTG BY NET WT">NET WT</option>
    <option value="custWastgByGrossWt" title="CUST WASTG BY GROSS WT">GROSS WT</option>
</select>
<?php } ?>

