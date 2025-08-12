<?php
/*
 * **************************************************************************************
 * @tutorial: START CODE FOR OPEN MODEL TO UPDATE MRP VALUE 
 * **************************************************************************************
 * 
 * Created on 06 DEC 2021
 *
 * @FileName: omUpdMrpInPer.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
//include 'ommpemac.php';
include 'system/omsachsc.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';

$documentRootPath = $_GET['documentRootPath'];
$mrpPrice = $_GET['mrpPrice'];
$sttr_id = $_GET['sttr_id'];
$panelName = $_GET['panelName'];
?>
<div style="border: solid 1px; padding: 5px;">
    <div align="right" valign="top">
        <img src="<?php echo $documentRootPath; ?>/images/delete16.png" alt="close"
             onclick="javascript: closeMrpForm();"> 
    </div>
    <div class="brownMess13Arial" align="left">
        <h1>Current Mrp : <?php echo $mrpPrice; ?></h1>
    </div>
    <div>
        <table align="left" width="100%">
            <tr>
                <td align="left">
                    <input type="text" id="mrpPer" name="mrpPer" style="width: 80px;" class="form-control text-center form-control-font13"
                           onkeyup="if (event.keyCode != 8 && event.keyCode != 13) {
                                       calculateSellMrp('<?php echo $mrpPrice; ?>', document.getElementById('mrpPer').value, 'sellPanel');
                                   }"
                           > 
                </td>
                <td align="right">
                    <button id="updateMrp" class="btn btn-success" style="color: white;"
                            onclick="updateSellMrp(<?php echo $sttr_id; ?>, document.getElementById('UpdatedMrp').value, 'sellPanel', document.getElementById('documentRootPath').value);">UPDATE</button>
                </td>
            </tr>
        </table>
    </div>
    <div align="left">
        <table>
            <tr>
                <td>
                     <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootPath; ?>">
                     <h1>Updated Mrp :  <input type="text" id="UpdatedMrp" name="UpdatedMrp" style="border: none; text-align: center; color: brown; font-size: 16; font-weight: bold;" value="" size="4" readonly></h1>
                </td>
            </tr>
        </table>
       
        <!--<input type="hidden" id="panelName" name="panelName" value="sellPanel">-->

    </div>
</div>
