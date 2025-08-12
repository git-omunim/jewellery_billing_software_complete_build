<?php

/*
 * **************************************************************************************
 * @tutorial: DISPLAY STONE RE-ORDER LIST  AUTHOR @DARSHANA 16 AUG 2021
 * **************************************************************************************
 * 
 * Created on 16 AUG 2021 3:50PM
 *
 * @FileName:  omstreordrfview.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
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
include 'ommprspc.php';
require_once 'system/omssopin.php';
include_once 'conversions.php';
include_once 'ommpfndv.php';
?>
<?php

//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE FOR CREATE TEMP VIEW TABLE FOR STONE RE-ORDER LIST : @DARSHANA 16 AUG 2021    //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// 
$createView = "CREATE TABLE IF NOT EXISTS temp_view ("
        . "ms_itm_id                       INT NOT NULL PRIMARY KEY AUTO_INCREMENT,"
        . "ms_itm_metal                    VARCHAR(50),"
        . "ms_itm_pre_id                   VARCHAR(50),"
        . "ms_itm_category                 VARCHAR(50),"
        . "ms_itm_name                     VARCHAR(50),"
        . "ms_itm_min_qty                  VARCHAR(20),"
        . "ms_itm_max_qty                  VARCHAR(20),"
        . "st_quantity                     VARCHAR(20),"
        . "ms_itm_from_wt                  VARCHAR(20),"
        . "ms_itm_to_wt                    VARCHAR(20),"
        . "st_gs_weight                    VARCHAR(20))";
//
$sqlTable = 'DESC temp_view';
mysqli_query($conn, $sqlTable);
//
//echo '$sqlTable == ' . $sqlTable . '<br />';
//die;
//
if (!mysqli_errno($conn) == 1146) {
    $dropView = "DROP table temp_view";
    mysqli_query($conn, $dropView) or die('<br/> ERROR:' . mysqli_error($conn));
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
} else {
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
}
//
// Table WHERE Condition
//
$viewWhere = " WHERE st_firm_id IN ($strFrmId) AND st_metal_type IN ('crystal','Crystal','CRYSTAL') ";

//table join
$viewJoin = "";

//column group by
$viewGroupBy = "";

//order by
$viewOrderBy = "";

//
$selGdSl = " SELECT * FROM stock $viewWhere ";
//     
//
$queryGdSl = mysqli_query($conn, $selGdSl) or die('<br/> ERROR:' . mysqli_error($conn));
//
//echo '<br />' . print_r($queryGdSl) . '<br />';
//
while ($resGdSlStock = mysqli_fetch_array($queryGdSl, MYSQLI_ASSOC)) {
    //
    $st_id = $resGdSlStock['st_id'];
    $st_item_code = $resGdSlStock['st_item_code'];
    $st_item_category = $resGdSlStock['st_item_category'];
    $st_item_name = $resGdSlStock['st_item_name'];
    $st_metal_type = $resGdSlStock['st_metal_type'];
    $st_stock_type = $resGdSlStock['st_stock_type'];
    $st_quantity = $resGdSlStock['st_quantity'];
    $st_gs_weight = $resGdSlStock['st_gs_weight'];
    $st_gs_weight_type = $resGdSlStock['st_gs_weight_type'];
    //
    //
    $metalTypeStr = "'crystal','Crystal','CRYSTAL'";
    if ($st_gs_weight_type == 'CT') {
        //queries for fetch data from master item @darshana 16 aug 2021
        //
    //for stock type retail @darshana 16 aug 2021
        //
        if ($st_stock_type == 'retail') {
            //
            //item min qty by pp
            $msItmUnitPp = "SELECT ms_itm_min_qty , ms_itm_min_qty_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_min_qty_type='PP' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal IN ($metalTypeStr)";

            $queryIteUnitPP = mysqli_query($conn, $msItmUnitPp);
            $resItmUnitPP = mysqli_fetch_array($queryIteUnitPP, MYSQLI_ASSOC);
            //
            $itemUnitPP = $resItmUnitPP['ms_itm_min_qty'];
            $itmUintType = $resItmUnitPP['ms_itm_min_qty_type'];
            $item_pre_id = $resItmUnitPP['ms_itm_pre_id'];
            //
            //item min qty by ct
            $msItmUnitct = "SELECT ms_itm_min_qty , ms_itm_min_qty_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_min_qty_type='CT' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal IN ($metalTypeStr)";

            $queryIteUnitCt = mysqli_query($conn, $msItmUnitct);
            $resItmUnitCt = mysqli_fetch_array($queryIteUnitCt, MYSQLI_ASSOC);
            //
            $itemUnitCt = $resItmUnitCt['ms_itm_min_qty'];
            $itmUintType = $resItmUnitCt['ms_itm_min_qty_type'];
            $item_pre_id = $resItmUnitCt['ms_itm_pre_id'];
            //
            //
        //item min qty by gm
            //
         $msItmUnitGm = "SELECT ms_itm_min_qty, ms_itm_min_qty_type,ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_min_qty_type='GM' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal IN ($metalTypeStr)";

            $queryIteUnitGm = mysqli_query($conn, $msItmUnitGm);
            $resItmUnitGm = mysqli_fetch_array($queryIteUnitGm, MYSQLI_ASSOC);

            $itmUnitInGm = $resItmUnitGm['ms_itm_min_qty'];
            $itemUnitGm = ($itmUnitInGm * 5);
            $itmUintType = $resItmUnitGm['ms_itm_min_qty_type'];
            $item_pre_id = $resItmUnitGm['ms_itm_pre_id'];
            //
            //
        //item min qty by Kg
            //
         $msItmUnitKg = "SELECT ms_itm_min_qty, ms_itm_min_qty_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_min_qty_type='KG' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal IN ($metalTypeStr)";

            $queryIteUnitKg = mysqli_query($conn, $msItmUnitKg);
            $resItmUnitKg = mysqli_fetch_array($queryIteUnitKg, MYSQLI_ASSOC);
            $itmUnitInKg = $resItmUnitKg['ms_itm_min_qty'];

            $itemUnitKg = ($itmUnitInKg * 5000);
            $itmUintType = $resItmUnitKg['ms_itm_min_qty_type'];
            $item_pre_id = $itmUnitInKg['ms_itm_pre_id'];
            //
            //
        //item min qty by Kg
            //
         $msItmUnitMg = "SELECT ms_itm_min_qty, ms_itm_min_qty_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_min_qty_type='MG' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal IN ($metalTypeStr)";

            $queryIteUnitMg = mysqli_query($conn, $msItmUnitMg);
            $resItmUnitMg = mysqli_fetch_array($queryIteUnitMg, MYSQLI_ASSOC);
            $itmUnitInKg = $resItmUnitMg['ms_itm_min_qty'];
            $itmUintType = $resItmUnitMg['ms_itm_min_qty_type'];
            $item_pre_id = $resItmUnitMg['ms_itm_pre_id'];

            $itemUnitMg = ($itmUnitInKg * 0.005);

            $itmMinWt = ($itemUnitCt + $itemUnitGm + $itemUnitKg + $itemUnitMg);
        }
        //
        //for stock type retail @darshana 16 aug 2021
        //
    if ($st_stock_type == 'wholesale') {
            //
            //item min qty by pp
            $msItmUnitPp = "SELECT ms_itm_wholesale_stock_min, ms_itm_wholesale_stock_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_wholesale_stock_type='PP' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal IN ($metalTypeStr)";
//        echo '$msItmUnitPp='.$msItmUnitPp;

            $queryIteUnitPP = mysqli_query($conn, $msItmUnitPp);
            $resItmUnitPP = mysqli_fetch_array($queryIteUnitPP, MYSQLI_ASSOC);

            $itemUnitPP = $resItmUnitPP['ms_itm_wholesale_stock_min'];
            $itmUintType = $resItmUnitPP['ms_itm_wholesale_stock_type'];
            $item_pre_id = $resItmUnitPP['ms_itm_pre_id'];
            //
            //item min qty by ct
            $msItmUnitCt = "SELECT ms_itm_wholesale_stock_min, ms_itm_wholesale_stock_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_wholesale_stock_type='CT' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal IN ($metalTypeStr)";
//        echo '$msItmUnitPp='.$msItmUnitPp;

            $queryIteUnitCT = mysqli_query($conn, $msItmUnitCt);
            $resItmUnitCT = mysqli_fetch_array($queryIteUnitCT, MYSQLI_ASSOC);

            $itemUnitCT = $resItmUnitCT['ms_itm_wholesale_stock_min'];
            $itmUintType = $resItmUnitCT['ms_itm_wholesale_stock_type'];
            $item_pre_id = $resItmUnitCT['ms_itm_pre_id'];
            //
            //item min qty by gm
            //
         $msItmUnitGm = "SELECT ms_itm_wholesale_stock_min, ms_itm_wholesale_stock_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_wholesale_stock_type='GM' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal='$st_metal_type'";
            $queryIteUnitGm = mysqli_query($conn, $msItmUnitGm);
            $resItmUnitGm = mysqli_fetch_array($queryIteUnitGm, MYSQLI_ASSOC);

            $itmInGM = $resItmUnitGm['ms_itm_wholesale_stock_min'];
            $itemUnitGm = ($itmInGM * 5);
            $itmUintType = $resItmUnitGm['ms_itm_wholesale_stock_type'];
            $item_pre_id = $resItmUnitGm['ms_itm_pre_id'];
            //
            //
        //item min qty by Kg
            //
         $msItmUnitKg = "SELECT ms_itm_wholesale_stock_min, ms_itm_wholesale_stock_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_wholesale_stock_type='KG' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal='$st_metal_type'";

            $queryIteUnitKg = mysqli_query($conn, $msItmUnitKg);
            $resItmUnitKg = mysqli_fetch_array($queryIteUnitKg, MYSQLI_ASSOC);
            $itmUnitInKg = $resItmUnitKg['ms_itm_wholesale_stock_min'];

            $itemUnitKg = ($itmUnitInKg * 5000);
            $itmUintType = $resItmUnitKg['ms_itm_wholesale_stock_type'];
            $item_pre_id = $resItmUnitKg['ms_itm_pre_id'];
            //
            //
        //item min qty by Kg
            //
        $msItmUnitMg = "SELECT ms_itm_wholesale_stock_min, ms_itm_wholesale_stock_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_wholesale_stock_type='MG' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal='$st_metal_type'";
            //
            $queryIteUnitMg = mysqli_query($conn, $msItmUnitMg);
            $resItmUnitMg = mysqli_fetch_array($queryIteUnitMg, MYSQLI_ASSOC);
            $itmUnitInKg = $resItmUnitMg['ms_itm_wholesale_stock_min'];
            $itmUintType = $resItmUnitMg['ms_itm_wholesale_stock_type'];
            $item_pre_id = $resItmUnitMg['ms_itm_pre_id'];

            $itemUnitMg = ($itmUnitInKg * 0.005);

            $itmMinWt = ($itemUnitCT + $itemUnitGm + $itemUnitKg + $itemUnitMg);
        }
    } else {
        //queries for fetch data from master item @darshana 16 aug 2021
        //
    //for stock type retail @darshana 16 aug 2021
        //
    //    echo '$st_stock_type='.$st_stock_type.'<br>';
        //
    if ($st_stock_type == 'retail') {
            //
            //item min qty by pp
            $msItmUnitPp = "SELECT ms_itm_min_qty , ms_itm_min_qty_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_min_qty_type='PP' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal IN ($metalTypeStr)";

            $queryIteUnitPP = mysqli_query($conn, $msItmUnitPp);
            $resItmUnitPP = mysqli_fetch_array($queryIteUnitPP, MYSQLI_ASSOC);
            //
            $itemUnitPP = $resItmUnitPP['ms_itm_min_qty'];
            $itmUintType = $resItmUnitPP['ms_itm_min_qty_type'];
            $item_pre_id = $resItmUnitPP['ms_itm_pre_id'];
            //
            //
        //item min qty by gm
            //
         $msItmUnitGm = "SELECT ms_itm_min_qty, ms_itm_min_qty_type,ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_min_qty_type='GM' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal IN ($metalTypeStr)";

            $queryIteUnitGm = mysqli_query($conn, $msItmUnitGm);
            $resItmUnitGm = mysqli_fetch_array($queryIteUnitGm, MYSQLI_ASSOC);

            $itemUnitGm = $resItmUnitGm['ms_itm_min_qty'];
            $itmUintType = $resItmUnitGm['ms_itm_min_qty_type'];
            $item_pre_id = $resItmUnitGm['ms_itm_pre_id'];
            //
            //
        //item min qty by Kg
            //
         $msItmUnitKg = "SELECT ms_itm_min_qty, ms_itm_min_qty_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_min_qty_type='KG' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal IN ($metalTypeStr)";

            $queryIteUnitKg = mysqli_query($conn, $msItmUnitKg);
            $resItmUnitKg = mysqli_fetch_array($queryIteUnitKg, MYSQLI_ASSOC);
            $itmUnitInKg = $resItmUnitKg['ms_itm_min_qty'];

            $itemUnitKg = ($itmUnitInKg * 1000);
            $itmUintType = $resItmUnitKg['ms_itm_min_qty_type'];
            $item_pre_id = $itmUnitInKg['ms_itm_pre_id'];
            //
            //
        //item min qty by Kg
            //
         $msItmUnitMg = "SELECT ms_itm_min_qty, ms_itm_min_qty_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_min_qty_type='MG' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal IN ($metalTypeStr)";

            $queryIteUnitMg = mysqli_query($conn, $msItmUnitMg);
            $resItmUnitMg = mysqli_fetch_array($queryIteUnitMg, MYSQLI_ASSOC);
            $itmUnitInKg = $resItmUnitMg['ms_itm_min_qty'];
            $itmUintType = $resItmUnitMg['ms_itm_min_qty_type'];
            $item_pre_id = $resItmUnitMg['ms_itm_pre_id'];

            $itemUnitMg = ($itmUnitInKg * 0.001);

            $itmMinWt = ($itemUnitGm + $itemUnitKg + $itemUnitMg);
        }
        //
        //for stock type retail @darshana 16 aug 2021
        //
    if ($st_stock_type == 'wholesale') {
            //
            //item min qty by pp
            $msItmUnitPp = "SELECT ms_itm_wholesale_stock_min, ms_itm_wholesale_stock_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_wholesale_stock_type='PP' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal IN ($metalTypeStr)";

            //echo '$msItmUnitPp='.$msItmUnitPp;

            $queryIteUnitPP = mysqli_query($conn, $msItmUnitPp);
            $resItmUnitPP = mysqli_fetch_array($queryIteUnitPP, MYSQLI_ASSOC);

            $itemUnitPP = $resItmUnitPP['ms_itm_wholesale_stock_min'];
            $itmUintType = $resItmUnitPP['ms_itm_wholesale_stock_type'];
            $item_pre_id = $resItmUnitPP['ms_itm_pre_id'];
            //
            //
        //item min qty by gm
            //
         $msItmUnitGm = "SELECT ms_itm_wholesale_stock_min, ms_itm_wholesale_stock_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_wholesale_stock_type='GM' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal='$st_metal_type'";
            $queryIteUnitGm = mysqli_query($conn, $msItmUnitGm);
            $resItmUnitGm = mysqli_fetch_array($queryIteUnitGm, MYSQLI_ASSOC);

            $itemUnitGm = $resItmUnitGm['ms_itm_wholesale_stock_min'];
            $itmUintType = $resItmUnitGm['ms_itm_wholesale_stock_type'];
            $item_pre_id = $resItmUnitGm['ms_itm_pre_id'];
            //
            //
        //item min qty by Kg
            //
         $msItmUnitKg = "SELECT ms_itm_wholesale_stock_min, ms_itm_wholesale_stock_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_wholesale_stock_type='KG' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal='$st_metal_type'";

            $queryIteUnitKg = mysqli_query($conn, $msItmUnitKg);
            $resItmUnitKg = mysqli_fetch_array($queryIteUnitKg, MYSQLI_ASSOC);
            $itmUnitInKg = $resItmUnitKg['ms_itm_wholesale_stock_min'];

            $itemUnitKg = ($itmUnitInKg * 1000);
            $itmUintType = $resItmUnitKg['ms_itm_wholesale_stock_type'];
            $item_pre_id = $resItmUnitKg['ms_itm_pre_id'];
            //
            //
        //item min qty by Kg
            //
        $msItmUnitMg = "SELECT ms_itm_wholesale_stock_min, ms_itm_wholesale_stock_type, ms_itm_pre_id FROM master_item "
                    . "WHERE ms_itm_own_id='$_SESSION[sessionOwnerId]' AND ms_itm_wholesale_stock_type='MG' "
                    . "AND ms_itm_category='$st_item_category' AND ms_itm_name='$st_item_name' "
                    . "AND ms_itm_metal='$st_metal_type'";
            //
            $queryIteUnitMg = mysqli_query($conn, $msItmUnitMg);
            $resItmUnitMg = mysqli_fetch_array($queryIteUnitMg, MYSQLI_ASSOC);
            $itmUnitInKg = $resItmUnitMg['ms_itm_wholesale_stock_min'];
            $itmUintType = $resItmUnitMg['ms_itm_wholesale_stock_type'];
            $item_pre_id = $resItmUnitMg['ms_itm_pre_id'];

            $itemUnitMg = ($itmUnitInKg * 0.001);

            $itmMinWt = ($itemUnitGm + $itemUnitKg + $itemUnitMg);
        }
    }

    if ((($st_quantity < $itemUnitPP) && ($st_quantity != '') && ($st_quantity != NULL)) ||
            (($st_gs_weight < $itmMinWt) && ($st_gs_weight != '') && ($st_gs_weight != NULL))) {

        $InserIntoTempViewReorderGdSl = "INSERT into temp_view (ms_itm_id, ms_itm_metal, ms_itm_pre_id,"
                . "ms_itm_category, ms_itm_name ,ms_itm_min_qty,st_quantity,ms_itm_from_wt, st_gs_weight)"
                . "VALUES ('$st_id', '$st_metal_type', '$item_pre_id',"
                . "'$st_item_category', '$st_item_name', '$itemUnitPP','$st_quantity','$itmMinWt','$st_gs_weight')";

        mysqli_query($conn, $InserIntoTempViewReorderGdSl) or die('<br/> ERROR:' . mysqli_error($conn));
    }
}
?>
