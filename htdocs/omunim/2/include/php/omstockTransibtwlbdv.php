<?php
/*
 * **************************************************************************************
 * @Description:
 * **************************************************************************************
 *
 * Created on 20 Jun, 2013 11:26:25 AM
 *
 * @FileName: omstockTransibtwlbdv.php
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
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
include 'ommpemac.php';
/* * ******Start code to add panel indiacator @Author:PRIYA16MAY14************ */
if ($_SESSION['sessionOwnIndStr'][7] == 'Y'  || $_SESSION['sessionOwnIndStr'][7] == 'A') {
    $itemId = $_GET['itemId'];
    $preId = preg_replace("/[^a-zA-Z]+/", "", $itemId);
    $postId = preg_replace("/[^0-9]+/", "", $itemId);
    $itemId1 = $_GET['itemId1'];
    $preId1 = preg_replace("/[^a-zA-Z]+/", "", $itemId1);
    $postId1 = preg_replace("/[^0-9]+/", "", $itemId1);

    $omLayoutOptionTop = '55X13TWOLBCTOPMARGIN';
    $omLayoutOptionLeft = '55X13TWOLBCLEFTMARGIN';
    $omLayoutOptionBorder = '55X13TWOLBCBORDER';
    $omLayOptSlipWidth = '55X13TWOBCBLOCKSLIPWIDTH';
    $omLayOptSlipHeight = '55X13TWOBCBLOCKSLIPHEIGHT';
    $omLayOptTailLength = '55X13TWOBCBLOCKTAILLENGTH';

    $topMargin = updateOptionValue($omLayoutOptionTop, '', 'selValue', '','');
    $leftMargin = updateOptionValue($omLayoutOptionLeft, '', 'selValue', '','');
    $slipWidth = updateOptionValue($omLayOptSlipWidth, '', 'selValue', '','');
    $slipHeight = updateOptionValue($omLayOptSlipHeight, '', 'selValue', '','');
    $tailLength = updateOptionValue($omLayOptTailLength, '', 'selValue', '','');

    include 'ombcclass.php';
    $counter = 1;
    ?>
    <table border="0" cellpadding="0" cellspacing="0" align="center" valign="top" width="100%" class="marginTop10">
        <tr>
            <td valign="top" align="center">
                <div id="allLabelsThermalDiv">
                    <?php include 'ombcclass.php'; ?>
                    <div id="block81x13Div<?php echo $counter; ?>" class="block81x13Div table55L">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <div id="block40x5Div" class="block40x5Div bgcolor-label">
                                        <div class="noPrint">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0" class="block55x13Div bgcolor-label">
                                        <tr>
                                            <td align="left" width="50%" class="borderRightDotted paddingLeft2">
                                                <?php
                                                if ($itemId != '') {
                                                    $select = "SELECT * FROM stock_transaction "
                                                            . "WHERE sttr_item_pre_id = '$preId' and sttr_item_id = '$postId'";
                                                    $result = mysqli_query($conn,$select);
                                                    $row = mysqli_fetch_array($result);
                                                    $bcItemPreId = $row['sttr_item_pre_id'];
                                                    $bcItemPostId = $row['sttr_item_id'];
                                                    $bcItemName = $row['sttr_item_name'];
                                                    $bcItemWt = $row['sttr_gs_weight'];
                                                    $bcItemWtType = $row['sttr_gs_weight_type'];
                                                    $bcItemNtWt = $row['sttr_nt_weight'];
                                                    $bcItemNtWtType = $row['sttr_nt_weight_type'];
                                                    ?>
                                                    <div class="block84LText10 paddingTop1  padBottom0 marginBottom0 marginTop0">
                                                        <?php echo $bcItemPreId; ?><?php echo $bcItemPostId; ?> 
                                                    </div>
                                                    <div class="block84LText9 marTopMin2">
                                                        <?php echo $bcItemWt; ?><?php echo '' . $bcItemWtType; ?> 
                                                        <div class="block84LText9 paddingRight2 floatRight">
                                                            <?php
                                                            echo $bcItemNtWt . '' . $bcItemNtWtType;
                                                            ?> 
                                                        </div> 
                                                    </div>
                                                    <?php if ($bcItemName != '') { ?>
                                                        <div class="block84LText6 padTop0 marginTop0">
                                                            <img src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=84L&bar_id=1<?php echo $bcItemId; ?>" alt="Barcode" height="7px" />
                                                        </div>
                                                    <?php } ?>
                                                    <div class="block84LText9 paddingTop1">
                                                        <?php echo $bcItemName; ?>
                                                    </div>
                                                <?php } ?>
                                            </td>
                                            <td width="50%" align="left" valign="top" class="paddingLeft2">
                                                <?php
                                                if ($itemId1 != '') {
                                                    $select1 = "SELECT * FROM stock_transaction "
                                                            . "WHERE sttr_item_pre_id = '$preId1' and sttr_item_id = '$postId1'";
                                                    $result1 = mysqli_query($conn,$select1);
                                                    $row1 = mysqli_fetch_array($result1);
                                                    $bcItemPreId1 = $row1['sttr_item_pre_id'];
                                                    $bcItemPostId1 = $row1['sttr_item_id'];
                                                    $bcItemName1 = $row1['sttr_item_name'];
                                                    $bcItemWt1 = $row1['sttr_gs_weight'];
                                                    $bcItemWtType1 = $row1['sttr_gs_weight_type'];
                                                    $bcItemNtWt1 = $row1['sttr_nt_weight'];
                                                    $bcItemNtWtType1 = $row1['sttr_nt_weight_type'];
                                                    ?>
                                                    <div class="block84LText10  paddingTop1  padBottom0 marginBottom0 marginTop0">
                                                        <?php echo $bcItemPreId1; ?><?php echo $bcItemPostId1; ?> 
                                                    </div>
                                                    <div class="block84LText9 marTopMin2">
                                                        <?php echo $bcItemWt1; ?><?php echo '' . $bcItemWtType1; ?> 
                                                        <div class="block84LText9 paddingRight2 floatRight">
                                                            <?php
                                                            echo $bcItemNtWt1 . '' . $bcItemNtWtType1;
                                                            ?> 
                                                        </div> 
                                                    </div>
                                                    <?php if ($bcItemName1 != '') { ?>
                                                        <div class="block84LText6 padTop0 marginTop0">
                                                            <img src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=84L&bar_id=1<?php echo $bcItemId; ?>" alt="Barcode" height="7px" />
                                                        </div>
                                                    <?php } ?>
                                                    <div class="block84LText9 paddingTop1">
                                                        <?php echo $bcItemName1; ?>
                                                    </div>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr> 
    </table>
<?php } ?> 