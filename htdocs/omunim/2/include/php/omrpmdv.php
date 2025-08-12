<?php
/*
 * **************************************************************************************
 * @Description: REPAIR PANEL FILE @Author-PRIYANKA-19OCT2020
 * **************************************************************************************
 *
 * Created on 19 OCT 2020 02:43:32 PM
 *
 * @FileName: omrpsdv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim 2.7.21
 * @version 2.7.21
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @Author-PRIYANKA-19OCT2020
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
$staffId = $_SESSION['sessionStaffId'];
include_once 'ommpfndv.php';
?>
<?php
//
$subPanel = $_GET['subPanel'];
//
$custId = $_GET['custId'];
//
if ($custId == '') {
    $custId = $_POST['custId'];
    $firmId = $_POST['firmId'];
}
//
?>
<?php if ($_SESSION['sessionOwnIndStr'][12] == 'Y') { ?>
    <div class="main_middle_common" id="itemRepairSubDiv">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="left" class="border-color-grey-b">
                    <table align="left" border="0" cellspacing="0" cellpadding="2" width="100%">
                        <tr>
                            <!--<td valign="middle" align="left" width="20px">
                                <div class="analysis_div_rows">
                                    <img src="<?php echo $documentRoot; ?>/images/repair32.png" 
                                         alt="Repair Panel" width="25px" height="25px"/>
                                </div>
                            </td>
                            <td align="left" valign="middle">
                                <div id="SellPurchase" class="textLabelHeading">
                                    REPAIR PANEL
                                </div>
                            </td> -->
                            <td align="right" valign="right">
                                <div id="messDisplayDiv">
                                </div>
                            </td>
                            <td align="right" class="printVisibilityHidden">
                                <input type="submit" id="repairList" name="repairList" value="REPAIR LIST" class="frm-btn"
                                       onclick="showRepairListPanel('<?php echo $custId; ?>')" />
                                <input type="submit" id="addNewRepairItem" name="addNewRepairItem" 
                                       value="ADD NEW ITEM" class="frm-btn"
                                       onclick="showAddRepairItemPanelForm('<?php echo $custId; ?>')" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <div id="itemRepairDiv" class="main_middle_common">
        <?php
        //
        // ADDED CODE FOR @PRIYANKA-18JAN2021
        $setupPanelName = 'ADD_REPAIR_ITEMS';
        //
        include $_SESSION['documentRootIncludePhp'] . '/stock/omStockTransForm.php';
        //
        //include 'omrpsdv.php';
        //
        ?>
    </div>
<?php } ?>
