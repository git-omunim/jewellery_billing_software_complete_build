<?php
/*
 * Created on Mar 16, 2011 7:54:34 PM
 *
 * @FileName: orgugitd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<tr>
    <td align="center" colspan="2">
        <hr color="#FD9A00" size="0.1px" />
    </td>
</tr>
<tr>
    <td align="left" width="100%" colspan="2">
        <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%">
            <tr align="left">
                <td align="left" valign="top" width="11%">
                    <h4>Item Name:&nbsp;</h4>
                </td>
                <td align="left" class="frm-r1" valign="middle" width="89%">
                    <h5><?php echo $rowGirviItem['girv_itm_name']; ?></h5>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td align="left" width="100%" colspan="2">
        <table border="0" cellpadding="0" cellspacing="0" align="left"
               width="100%">
            <tr align="left">
                <td align="left" >
                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                        <tr align="left">
                            <td align="left" valign="middle">
                                <h4>Item Type:&nbsp;</h4>
                            </td>
                            <td align="left" class="frm-r1" valign="middle">
                                <h5><?php echo $rowGirviItem['girv_itm_metal_type']; ?></h5>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="left" >
                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                        <tr align="left">
                            <td align="left" valign="middle">
                                <h4>Item Pieces:&nbsp;</h4>
                            </td>
                            <td align="left" class="frm-r1" valign="middle">
                                <h5><?php echo $rowGirviItem['girv_itm_pieces']; ?></h5>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="left">
                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                        <tr align="left">
                            <td align="right" valign="middle">
                                <h4>Gross Weight:&nbsp;</h4>
                            </td>
                            <td align="left" class="frm-r1" valign="middle">
                                <h5><?php echo $rowGirviItem['girv_itm_gross_weight']; ?>&nbsp;<?php echo $rowGirviItem['girv_itm_gross_weight_type']; ?></h5>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="left">
                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                        <tr align="left">
                            <td align="right" valign="middle">
                                <h4>Net Weight:&nbsp;</h4>
                            </td>
                            <td align="left" class="frm-r1" valign="middle">
                                <h5><?php echo $rowGirviItem['girv_itm_weight']; ?>&nbsp;<?php echo $rowGirviItem['girv_itm_weight_type']; ?></h5>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="left">
                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                        <tr align="left">
                            <td align="left" valign="middle">
                                <h4>Item Tunch:&nbsp;</h4>
                            </td>
                            <td align="left" class="frm-r1" valign="middle">
                                <h5>

                                    <?php
                                    $girviItemTunchId = $rowGirviItem['girv_itm_tunch_id'];

                                    $qSelGirviItemTunch = "SELECT itm_tunch_name,itm_tunch_value,itm_tunch_metal_type FROM item_tunch where itm_tunch_id='$girviItemTunchId' and itm_tunch_own_id='$_SESSION[sessionOwnerId]'";
                                    $resGirviItemTunch = mysqli_query($conn,$qSelGirviItemTunch);
                                    $rowGirviItemTunch = mysqli_fetch_array($resGirviItemTunch, MYSQLI_ASSOC);

                                    echo $rowGirviItemTunch['itm_tunch_name'];
                                    ?>
                                </h5>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="right" colspan="5">
                    <div id="girviItemReleaseButDiv">
                        <form name="girvi_item_release" id="girvi_item_release"
                              action="javascript:releaseGirviItem(<?php echo "$custId"; ?>,<?php echo "$girviId"; ?>,<?php echo $rowGirviItem['girv_itm_id']; ?>);"
                              method="get"><input type="submit" value="Release Item" class="frm-btn-without-border"
                                            maxlength="30" size="15" /></form>
                    </div>
                </td>
            </tr>
        </table>
    </td>
</tr>
<?php
// This code used for Girvi Calculation
// These fields are using into orggttam.php file
$girviItemWeight = $rowGirviItem['girv_itm_weight'];
$girviItemWeightType = $rowGirviItem['girv_itm_weight_type'];
$girviItemTunchMetal = $rowGirviItemTunch['itm_tunch_metal_type'];
$girviItemTunchValue = $rowGirviItemTunch['itm_tunch_value'];

//Start Code From orggttam.php file
$qSelMetalRate = "SELECT met_rate_value FROM metal_rates where met_rate_metal_name='$girviItemTunchMetal' and met_rate_own_id='$_SESSION[sessionOwnerId]' order by met_rate_ent_dat desc LIMIT 0, 1";
$resMetalRate = mysqli_query($conn,$qSelMetalRate);
$rowMetalRate = mysqli_fetch_array($resMetalRate, MYSQLI_ASSOC);

$metalRate = $rowMetalRate['met_rate_value'];

$girviItemTunchValue = $girviItemTunchValue / 100; //Tunch value

if ($girviItemTunchMetal == 'Silver') {
    if ($girviItemWeightType == 'KG') {
        $girviValuation += $girviItemWeight * $metalRate * $girviItemTunchValue;
    }
    if ($girviItemWeightType == 'GM') {
        $girviValuation += ( $girviItemWeight * $metalRate * $girviItemTunchValue) / 1000;
    }
    if ($girviItemWeightType == 'MG') {
        $girviValuation += ( $girviItemWeight * $metalRate * $girviItemTunchValue) / (1000 * 1000);
    }
} else if ($girviItemTunchMetal == 'Gold') {
    if ($girviItemWeightType == 'KG') {
        $girviValuation += ( $girviItemWeight * $metalRate * $girviItemTunchValue) * 100;
    }
    if ($girviItemWeightType == 'GM') {
        $girviValuation += ( $girviItemWeight * $metalRate * $girviItemTunchValue) / 10;
    }
    if ($girviItemWeightType == 'MG') {
        $girviValuation += ( $girviItemWeight * $metalRate * $girviItemTunchValue) / (10 * 1000);
    }
}
$girviValuation = om_round($girviValuation);
$_SESSION['girviValuation'] = $girviValuation;
//End Code From orggttam.php file
?>
