<?php
/*
 *
 * Created on on 2 AUG 2021 : 5:30 PM
 * 
 * @FileName: omsttranreport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.92
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 * Copyright 2018 SoftwareGen, Inc
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
<?php
//
if ($suppPanelName == '')
    $suppPanelName = $_GET['panel'];
//
if ($suppPanelName == '')
    $suppPanelName = $_GET['panelName'];
//
$PanelLabelType = $_GET['indicator'];
//
$custId = $_GET['custId'];
//
$firmId = $_GET['firmId'];
//
?>
<style>
    .thBorder .trBorder{
        border: 1px solid black; 
    }
</style>
<div class="card " id="stoneReport" style="border-radius: 5px !important; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;">
    <div class="card-body">
        <div class="card" style="padding: 10px;" style="border-radius: 5px !important;">
            <div class="card-header" style="border-radius: 5px;color:#E56717; font-size: 18px; font-weight:bold; background: #f1f1f1;">
                <table width="100%">
                    <tr>
                        <td align="left" width="50%"> STONE CONSOLIDATE REPORT </td>
                        <td align="right" style="float:right;" width="50%"> 
                            <button align="right" class="btn" style="padding:7px; border-radius: 4px !important; background-color: #add779; color:#fff;font-weight: bold;"
                                    onclick="openStoneReport('<?php echo $custId; ?>', '<?php echo $firmId ?>');">
                                STONE TRANSACTION
                            </button>
                        </td>
                    </tr>
                </table>
            </div>

            <div class='card-body'>
                <div class="table">
                    <table class="textBoxCurve1px" width='100%' style="padding: 5px; border: 1px solid #dfdfdf; border-collapse: collapse;">
                        <tr style="font-size: 16px; font-weight: bold;color:#E56717; border: 1px solid #dfdfdf;">

                            <td class="padLeft5" align='left' style="border:solid 1px #dfdfdf;">STONE CATEGORY</td>
                            <td class="padLeft5" align='left' style="border:solid 1px #dfdfdf;">DETAILS</td>
                            <td align='right' style="border:solid 1px #dfdfdf; padding-right: 5px;">OPENING / PREV</td>
                            <td align='right' style="border:solid 1px #dfdfdf; padding-right: 5px;">IN</td>
                            <td align='right' style="border:solid 1px #dfdfdf; padding-right: 5px;">OUT</td>
                            <td align='right' style="border:solid 1px #dfdfdf; padding-right: 5px;">CLOSING</td>
                        </tr>
                        <!--START CODE FOR STONE REPORT CALCULATIONS : AUTHOR @DARSHANA 2 AUG 2021-->
                        <?php
                        //
                        //
                        $qselect = "SELECT * FROM stock_transaction "
                                . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' AND sttr_user_id = '$custId' "
                                . "AND sttr_firm_id = '$firmId' AND"
                                . " ((sttr_transaction_type IN ('PURCHASE', 'sell') "
                                . "AND sttr_metal_type IN ('STONE','crystal') "
                                . "AND sttr_indicator IN ('crystal','PURCHASE')) "
                                . "OR"
                                . "(sttr_transaction_type IN ('PURCHASE', 'sell') "
                                . "AND sttr_indicator IN ('stockCrystal')) "
                                . "OR "
                                . "(sttr_transaction_type IN ('PAID','RECEIVED') "
                                . "AND sttr_metal_type IN ('STONE','crystal','rawMetal') "
                                . "AND sttr_indicator IN ('crystal','rawMetal'))) "
                                . "GROUP BY sttr_item_category, sttr_item_name";
                        //
//                        echo '$qselect='.$qselect;
                        $queryStone = mysqli_query($conn, $qselect);
                        //
                        //echo '$qselect=' . $qselect;
                        //$num = mysqli_num_rows($queryStone);
                        //echo '$num'.$num.'<br>';
                        //
                        if (mysqli_num_rows($queryStone) > 0) {
                            //                          
                            $totalGsWtCtPur = 0;
                            $totalGsWtCtSell = 0;
                            $closingTotGs = 0;
                            while ($resStone = mysqli_fetch_array($queryStone)) {
                                //
                                $sttr_id = $resStone['sttr_id'];
                                $sttr_item_category = $resStone['sttr_item_category'];
                                $sttr_item_name = $resStone['sttr_item_name'];
                                //
                                //if ($resStone['sttr_transaction_type'] == 'PURCHASE') {
                                //
                                //echo '$sttr_item_category='.$sttr_item_category.'<br>';
                                //
                                //
                                $qselectPurGsCt = "SELECT SUM(sttr_gs_weight) as total_gs_weight,sttr_gs_weight_type "
                                        . "FROM stock_transaction "
                                        . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                        . "AND sttr_user_id = '$custId' AND sttr_firm_id = '$firmId' "
                                        . "AND ((sttr_transaction_type IN ('PURCHASE') "
                                        . "AND sttr_indicator IN ('crystal','PURCHASE') "
                                        . "AND sttr_metal_type IN ('STONE','crystal')) "
                                        . "OR "
                                        . "(sttr_transaction_type IN ('PURCHASE') AND sttr_indicator IN ('stockCrystal'))"
                                        . "OR "
                                        . "(sttr_transaction_type IN ('RECEIVED') "
                                        . "AND sttr_indicator IN ('crystal','rawMetal'))) "
                                        . "AND sttr_gs_weight_type='CT' "
                                        . "AND sttr_item_category = '$sttr_item_category' "
                                        . "AND sttr_item_name = '$sttr_item_name'";
                                //
                                //echo '$qselectPurGsCt=='.$qselectPurGsCt;
                                //
                                $queryStGsCt = mysqli_query($conn, $qselectPurGsCt);
                                $resStonPurCt = mysqli_fetch_array($queryStGsCt, MYSQLI_ASSOC);
                                //
                                $totPurGsWtInCt = $resStonPurCt['total_gs_weight'];
                                $sttr_gs_weight_type = $resStonPurCt['sttr_gs_weight_type'];
                                //
                                //
                                //weight type in GM
                                $gsSelectGm = "SELECT SUM(sttr_gs_weight) as total_gs_weight,sttr_gs_weight_type "
                                        . "FROM stock_transaction "
                                        . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                        . "AND sttr_user_id = '$custId' AND sttr_firm_id = '$firmId' "
                                        . "AND ((sttr_transaction_type IN ('PURCHASE') "
                                        . "AND sttr_indicator IN ('crystal','PURCHASE') "
                                        . "AND sttr_metal_type IN ('STONE','crystal')) "
                                        . "OR "
                                        . "(sttr_transaction_type IN ('PURCHASE') AND sttr_indicator IN ('stockCrystal'))"
                                        . "OR "
                                        . "(sttr_transaction_type IN ('RECEIVED') "
                                        . "AND sttr_indicator IN ('crystal','rawMetal'))) "
                                        . "AND sttr_gs_weight_type='GM' "
                                        . "AND sttr_item_category = '$sttr_item_category' "
                                        . "AND sttr_item_name = '$sttr_item_name'";
                                //
                                $qGsGm = mysqli_query($conn, $gsSelectGm);
                                $resGsInGm = mysqli_fetch_array($qGsGm, MYSQLI_ASSOC);
                                //
                                $GsWtInGm = $resGsInGm['total_gs_weight'];
                                $GsWtInGmType = $resGsInGm['sttr_gs_weight_type'];
                                $totPurGsWtInGm = ($GsWtInGmType * 5);
                                //
                                //
                                //weight type in Kg
                                $gsSelectKg = "SELECT SUM(sttr_gs_weight) as total_gs_weight,sttr_gs_weight_type "
                                        . "FROM stock_transaction "
                                        . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                        . "AND sttr_user_id = '$custId' AND sttr_firm_id = '$firmId' "
                                        . "AND ((sttr_transaction_type IN ('PURCHASE') "
                                        . "AND sttr_indicator IN ('crystal','PURCHASE') "
                                        . "AND sttr_metal_type IN ('STONE','crystal')) "
                                        . "OR "
                                        . "(sttr_transaction_type IN ('PURCHASE') AND sttr_indicator IN ('stockCrystal'))"
                                        . "OR "
                                        . "(sttr_transaction_type IN ('RECEIVED') "
                                        . "AND sttr_indicator IN ('crystal','rawMetal'))) "
                                        . "AND sttr_gs_weight_type='KG' "
                                        . "AND sttr_item_category = '$sttr_item_category' "
                                        . "AND sttr_item_name = '$sttr_item_name'";
                                //
                                $queryGsWtKg = mysqli_query($conn, $gsSelectKg);
                                $resGsWtKg = mysqli_fetch_array($queryGsWtKg, MYSQLI_ASSOC);
                                //
                                $GsWtInKg = $resGsWtKg['total_gs_weight'];
                                $GsWtInGmType = $resGsWtKg['sttr_gs_weight_type'];
                                $totPurGsWtInKg = ($GsWtInKg * 5000);
                                //
                                //
                                //weight type in Mg
                                $gsSelectMg = "SELECT SUM(sttr_gs_weight) as total_gs_weight,sttr_gs_weight_type "
                                        . "FROM stock_transaction "
                                        . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                        . "AND sttr_user_id = '$custId' AND sttr_firm_id = '$firmId' "
                                        . "AND ((sttr_transaction_type IN ('PURCHASE') "
                                        . "AND sttr_indicator IN ('crystal','PURCHASE') "
                                        . "AND sttr_metal_type IN ('STONE','crystal')) "
                                        . "OR "
                                        . "(sttr_transaction_type IN ('PURCHASE') AND sttr_indicator IN ('stockCrystal'))"
                                        . "OR "
                                        . "(sttr_transaction_type IN ('RECEIVED') "
                                        . "AND sttr_indicator IN ('crystal','rawMetal'))) "
                                        . "AND sttr_gs_weight_type='MG' "
                                        . "AND sttr_item_category = '$sttr_item_category' "
                                        . "AND sttr_item_name = '$sttr_item_name'";
                                //
                                $queryGsWtMg = mysqli_query($conn, $gsSelectMg);
                                $resGsWtMg = mysqli_fetch_array($queryGsWtMg, MYSQLI_ASSOC);
                                //
                                $GsWtInMg = $resGsWtMg['total_gs_weight'];
                                $GsWtInGmType = $resGsWtKg['sttr_gs_weight_type'];
                                $totPurGsWtInMg = ($GsWtInMg * 0.005);
                                //
                                $totalGsWtCtPur = ($totPurGsWtInCt + $totPurGsWtInGm + $totPurGsWtInKg + $totPurGsWtInMg);
                                //
                                //
                                //if ($resStone['sttr_transaction_type'] == 'sell') {
                                //
                                //sell weight type in CT 
                                $qselectSellGsCt = "SELECT SUM(sttr_gs_weight) as total_gs_weight,sttr_gs_weight_type "
                                        . "FROM stock_transaction "
                                        . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                        . "AND sttr_user_id = '$custId' AND sttr_firm_id = '$firmId' "
                                        . "AND ((sttr_transaction_type IN ('sell') "
                                        . "AND sttr_indicator IN ('crystal') "
                                        . "AND sttr_metal_type IN ('STONE','crystal')) "
                                        . "OR "
                                        . "(sttr_transaction_type IN ('sell') AND sttr_indicator IN ('stockCrystal'))"
                                        . "OR "
                                        . "(sttr_transaction_type IN ('PAID') "
                                        . "AND sttr_indicator IN ('crystal','rawMetal'))) "
                                        . "AND sttr_gs_weight_type='CT' "
                                        . "AND sttr_item_category = '$sttr_item_category' "
                                        . "AND sttr_item_name = '$sttr_item_name'";
                                //
                                $querySellStone = mysqli_query($conn, $qselectSellGsCt);
                                $resSellStone = mysqli_fetch_array($querySellStone, MYSQLI_ASSOC);
                                //
                                $totalSellGsWtCt = $resSellStone['total_gs_weight'];
                                $sttr_gs_weight_type_sell = $resSellStone['sttr_gs_weight_type'];
                                //
                                //
                                //weight type in GM
                                $qselectSellGsGm = "SELECT SUM(sttr_gs_weight) as total_gs_weight,sttr_gs_weight_type "
                                        . "FROM stock_transaction "
                                        . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                        . "AND sttr_user_id = '$custId' AND sttr_firm_id = '$firmId' "
                                        . "AND ((sttr_transaction_type IN ('sell') "
                                        . "AND sttr_indicator IN ('crystal') "
                                        . "AND sttr_metal_type IN ('STONE','crystal')) "
                                        . "OR "
                                        . "(sttr_transaction_type IN ('sell') AND sttr_indicator IN ('stockCrystal'))"
                                        . "OR "
                                        . "(sttr_transaction_type IN ('PAID') "
                                        . "AND sttr_indicator IN ('crystal','rawMetal'))) "
                                        . "AND sttr_gs_weight_type='GM' "
                                        . "AND sttr_item_category = '$sttr_item_category' "
                                        . "AND sttr_item_name = '$sttr_item_name'";
                                //
                                $querySellStoneGm = mysqli_query($conn, $qselectSellGsGm);
                                $resSellStoneGm = mysqli_fetch_array($querySellStoneGm, MYSQLI_ASSOC);
                                //
                                $SellGsWtGm = $resSellStoneGm['total_gs_weight'];
                                $sttr_gs_weight_type_sell = $resSellStoneGm['sttr_gs_weight_type'];
                                $totalSellGsWtGm = ($SellGsWtGm * 5);
                                //
                                //
                                //weight type in KG
                                $qselectSellGsKg = "SELECT SUM(sttr_gs_weight) as total_gs_weight,sttr_gs_weight_type "
                                        . "FROM stock_transaction "
                                        . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                        . "AND sttr_user_id = '$custId' AND sttr_firm_id = '$firmId' "
                                        . "AND ((sttr_transaction_type IN ('sell') "
                                        . "AND sttr_indicator IN ('crystal') "
                                        . "AND sttr_metal_type IN ('STONE','crystal')) "
                                        . "OR "
                                        . "(sttr_transaction_type IN ('sell') AND sttr_indicator IN ('stockCrystal'))"
                                        . "OR "
                                        . "(sttr_transaction_type IN ('PAID') "
                                        . "AND sttr_indicator IN ('crystal','rawMetal'))) "
                                        . "AND sttr_gs_weight_type='KG' "
                                        . "AND sttr_item_category = '$sttr_item_category' "
                                        . "AND sttr_item_name = '$sttr_item_name'";

                                $querySellStoneKg = mysqli_query($conn, $qselectSellGsKg);
                                $resSellStoneKg = mysqli_fetch_array($querySellStoneKg, MYSQLI_ASSOC);
                                //
                                $SellGsWtKg = $resSellStoneKg['total_gs_weight'];
                                $sttr_gs_weight_type_sell = $resSellStoneGm['sttr_gs_weight_type'];
                                $totalSellGsWtKg = ($SellGsWtKg * 5000);
                                //
                                //
                                //weight type in Mg
                                $qselectSellGsMg = "SELECT SUM(sttr_gs_weight) as total_gs_weight,sttr_gs_weight_type "
                                        . "FROM stock_transaction "
                                        . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                        . "AND sttr_user_id = '$custId' AND sttr_firm_id = '$firmId' "
                                        . "AND ((sttr_transaction_type IN ('sell') "
                                        . "AND sttr_indicator IN ('crystal') "
                                        . "AND sttr_metal_type IN ('STONE','crystal')) "
                                        . "OR "
                                        . "(sttr_transaction_type IN ('sell') AND sttr_indicator IN ('stockCrystal'))"
                                        . "OR "
                                        . "(sttr_transaction_type IN ('PAID') "
                                        . "AND sttr_indicator IN ('crystal','rawMetal'))) "
                                        . "AND sttr_gs_weight_type='MG' "
                                        . "AND sttr_item_category = '$sttr_item_category' "
                                        . "AND sttr_item_name = '$sttr_item_name'";
                                //
                                $querySellStoneMg = mysqli_query($conn, $qselectSellGsMg);
                                $resSellStoneMg = mysqli_fetch_array($querySellStoneMg, MYSQLI_ASSOC);
                                //
                                $SellGsWtMg = $resSellStoneMg['total_gs_weight'];
                                $sttr_gs_weight_type_sell = $resSellStoneMg['sttr_gs_weight_type'];
                                $totalSellGsWtMg = ($SellGsWtMg * 0.005);
                                //
                                //echo '$total_gs_weightSell='.$total_gs_weightSell;
                                // 
                                //
                                $totalGsWtCtSell = ($totalSellGsWtCt + $totalSellGsWtGm + $totalSellGsWtKg + $totalSellGsWtMg);
                                $closingTotGs = ($totalGsWtCtPur - $totalGsWtCtSell);
                                //
                                //
                                ?>
                                <tr style="font-size: 14px;border:solid 1px black; color: black;">

                                    <td class="padLeft5" align='left' style="border:solid 1px #dfdfdf;"> <?php echo strtoupper($sttr_item_category); ?></td>
                                    <td class="padLeft5" align='left' style="border:solid 1px #dfdfdf;"> <?php echo strtoupper($sttr_item_name); ?></td>
                                    <td align='right' style="border:solid 1px #dfdfdf; padding-right: 5px;"> <?php echo '-'; ?></td>
                                    <td align='right' style="border:solid 1px #dfdfdf; padding-right: 5px;"> <?php echo abs(number_format($totalGsWtCtPur, 3)) . ' CT'; ?></td>
                                    <td align='right' style="border:solid 1px #dfdfdf; padding-right: 5px;"> <?php echo abs(number_format($totalGsWtCtSell, 3)) . ' CT'; ?></td>
                                    <td align='right' style="border:solid 1px #dfdfdf; padding-right: 5px;"> <?php echo abs(number_format($closingTotGs, 3)) . ' CT'; ?></td>
                                </tr>
                                <?php
                                //
                                $totalGsWtCtPur = 0;
                                $totalGsWtCtSell = 0;
                                $closingTotGs = 0;
                                //
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
