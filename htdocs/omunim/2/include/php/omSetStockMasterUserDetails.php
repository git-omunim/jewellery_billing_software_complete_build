<?php
/*
 * ***********************************************************************************************
 * @tutorial: SET STOCK MASTER DETAILS ACCORDING TO USER @PRIYANKA-29APR19
 * ***********************************************************************************************
 * 
 * Created on APR 29, 2019 17:41:00 PM
 *
 * @FileName: omSetStockMasterUserDetails.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 2.6.100
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-29APR19
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
//
?>
<?php
//
$itemCategory = $_REQUEST['itemCategory'];
$itemName = $_REQUEST['itemName'];
$userId = $_REQUEST['userId'];
//
// START CODE SET STOCK MASTER DETAILS ACCORDING TO USER @PRIYANKA-29APR19
//
$qSelect = "SELECT * FROM master_item WHERE ms_itm_category = '$itemCategory' and ms_itm_name = '$itemName'";
//
$resultQuery = mysqli_query($conn, $qSelect);
//
//echo '$qSelect == '.$qSelect.'<br />';
//
$row = mysqli_fetch_array($resultQuery, MYSQLI_ASSOC);
//
$ms_itm_id = $row['ms_itm_id'];
$ms_itm_model_no = $row['ms_itm_model_no'];
$ms_itm_category = $row['ms_itm_category'];
$ms_itm_name = $row['ms_itm_name'];
//
$qSelectInfo = "SELECT * FROM master_subitem WHERE ms_sub_itm_ms_item_id = '$ms_itm_id' AND ms_sub_itm_user_id = '$userId'";
//
$resultQueryInfo = mysqli_query($conn, $qSelectInfo);
//
$rowInfo = mysqli_fetch_array($resultQueryInfo, MYSQLI_ASSOC);
//
$count = mysqli_num_rows($resultQueryInfo);
//
if ($count > 0) {
    //
    $ms_sub_itm_from_wt = $rowInfo['ms_sub_itm_from_wt']; 
    $ms_sub_itm_to_wt = $rowInfo['ms_sub_itm_to_wt'];
    $ms_sub_itm_wstg_max = $rowInfo['ms_sub_itm_wstg_max'];
    $ms_sub_itm_wstg_min = $rowInfo['ms_sub_itm_wstg_min'];
    $ms_sub_itm_wstg_max_per = $rowInfo['ms_sub_itm_wstg_max_per'];
    $ms_sub_itm_wstg_min_per = $rowInfo['ms_sub_itm_wstg_min_per'];
    $ms_sub_itm_mkg_max = $rowInfo['ms_sub_itm_mkg_max'];
    $ms_sub_itm_mkg_min = $rowInfo['ms_sub_itm_mkg_min'];
    $ms_sub_itm_mkg_max_pp = $rowInfo['ms_sub_itm_mkg_max_pp'];
    $ms_sub_itm_mkg_min_pp = $rowInfo['ms_sub_itm_mkg_min_pp'];
    $ms_sub_itm_mkg_max_fx = $rowInfo['ms_sub_itm_mkg_max_fx'];
    $ms_sub_itm_mkg_min_fx = $rowInfo['ms_sub_itm_mkg_min_fx'];
    $ms_sub_itm_disc_max_gm = $rowInfo['ms_sub_itm_disc_max_gm'];
    $ms_sub_itm_disc_min_gm = $rowInfo['ms_sub_itm_disc_min_gm'];
    $ms_sub_itm_disc_max_pp = $rowInfo['ms_sub_itm_disc_max_pp'];
    $ms_sub_itm_disc_min_pp = $rowInfo['ms_sub_itm_disc_min_pp'];
    $ms_sub_itm_disc_mkg_max_fx = $rowInfo['ms_sub_itm_disc_mkg_max_fx'];
    $ms_sub_itm_disc_mkg_min_fx = $rowInfo['ms_sub_itm_disc_mkg_min_fx'];
    //
} else {
//
parse_str(getTableValues("SELECT user_membership FROM user WHERE user_id = '$userId'"));
//
$qSelectInfo = "SELECT * FROM master_subitem WHERE ms_sub_itm_ms_item_id = '$ms_itm_id' AND ms_sub_itm_user_group = '$user_membership'";
//
$resultQueryInfo = mysqli_query($conn, $qSelectInfo);
//
$rowInfo = mysqli_fetch_array($resultQueryInfo, MYSQLI_ASSOC);
//
$count = mysqli_num_rows($resultQueryInfo);
    //
    $ms_sub_itm_from_wt = $rowInfo['ms_sub_itm_from_wt']; 
    $ms_sub_itm_to_wt = $rowInfo['ms_sub_itm_to_wt'];
    $ms_sub_itm_wstg_max = $rowInfo['ms_sub_itm_wstg_max'];
    $ms_sub_itm_wstg_min = $rowInfo['ms_sub_itm_wstg_min'];
    $ms_sub_itm_wstg_max_per = $rowInfo['ms_sub_itm_wstg_max_per'];
    $ms_sub_itm_wstg_min_per = $rowInfo['ms_sub_itm_wstg_min_per'];
    $ms_sub_itm_mkg_max = $rowInfo['ms_sub_itm_mkg_max'];
    $ms_sub_itm_mkg_min = $rowInfo['ms_sub_itm_mkg_min'];
    $ms_sub_itm_mkg_max_pp = $rowInfo['ms_sub_itm_mkg_max_pp'];
    $ms_sub_itm_mkg_min_pp = $rowInfo['ms_sub_itm_mkg_min_pp'];
    $ms_sub_itm_mkg_max_fx = $rowInfo['ms_sub_itm_mkg_max_fx'];
    $ms_sub_itm_mkg_min_fx = $rowInfo['ms_sub_itm_mkg_min_fx'];
    $ms_sub_itm_disc_max_gm = $rowInfo['ms_sub_itm_disc_max_gm'];
    $ms_sub_itm_disc_min_gm = $rowInfo['ms_sub_itm_disc_min_gm'];
    $ms_sub_itm_disc_max_pp = $rowInfo['ms_sub_itm_disc_max_pp'];
    $ms_sub_itm_disc_min_pp = $rowInfo['ms_sub_itm_disc_min_pp'];
    $ms_sub_itm_disc_mkg_max_fx = $rowInfo['ms_sub_itm_disc_mkg_max_fx'];
    $ms_sub_itm_disc_mkg_min_fx = $rowInfo['ms_sub_itm_disc_mkg_min_fx'];
    //
}
//
//
//echo '$ms_sub_itm_from_wt == '.$ms_sub_itm_from_wt.'<br />';
//echo '$ms_sub_itm_to_wt == '.$ms_sub_itm_to_wt.'<br />';
//echo '$ms_sub_itm_wstg_max == '.$ms_sub_itm_wstg_max.'<br />';
//echo '$ms_sub_itm_wstg_min == '.$ms_sub_itm_wstg_min.'<br />';
//echo '$ms_sub_itm_wstg_max_per == '.$ms_sub_itm_wstg_max_per.'<br />';
//echo '$ms_sub_itm_wstg_min_per == '.$ms_sub_itm_wstg_min_per.'<br />';
//echo '$ms_sub_itm_mkg_max == '.$ms_sub_itm_mkg_max.'<br />';
//echo '$ms_sub_itm_mkg_min == '.$ms_sub_itm_mkg_min.'<br />';
//echo '$ms_sub_itm_mkg_max_pp == '.$ms_sub_itm_mkg_max_pp.'<br />';
//echo '$ms_sub_itm_mkg_min_pp == '.$ms_sub_itm_mkg_min_pp.'<br />';
//echo '$ms_sub_itm_mkg_max_fx == '.$ms_sub_itm_mkg_max_fx.'<br />';
//echo '$ms_sub_itm_mkg_min_fx == '.$ms_sub_itm_mkg_min_fx.'<br />';
//echo '$ms_sub_itm_disc_max_gm == '.$ms_sub_itm_disc_max_gm.'<br />';
//echo '$ms_sub_itm_disc_min_gm == '.$ms_sub_itm_disc_min_gm.'<br />';
//echo '$ms_sub_itm_disc_max_pp == '.$ms_sub_itm_disc_max_pp.'<br />';
//echo '$ms_sub_itm_disc_min_pp == '.$ms_sub_itm_disc_min_pp.'<br />';
//echo '$ms_sub_itm_disc_mkg_max_fx == '.$ms_sub_itm_disc_mkg_max_fx.'<br />';
//echo '$ms_sub_itm_disc_mkg_min_fx == '.$ms_sub_itm_disc_mkg_min_fx.'<br />';
//
//
//echo '$count == '.$count.'<br />';
//
if ($count == 0) {
    //
    parse_str(getTableValues("SELECT * FROM master_item WHERE ms_itm_category = '$itemCategory' and ms_itm_name = '$itemName'"));
    //
    if ($ms_itm_category != '' && $ms_itm_category != NULL) {
        $count = 1;
        $ms_sub_itm_from_wt = NULL; 
        $ms_sub_itm_to_wt = NULL; 
        $ms_sub_itm_wstg_max = NULL; 
        $ms_sub_itm_wstg_min = NULL; 
        $ms_sub_itm_wstg_max_per = NULL; 
        $ms_sub_itm_wstg_min_per = NULL; 
        $ms_sub_itm_mkg_max = NULL; 
        $ms_sub_itm_mkg_min = NULL; 
        $ms_sub_itm_mkg_max_pp = NULL; 
        $ms_sub_itm_mkg_min_pp = NULL; 
        $ms_sub_itm_mkg_max_fx = NULL; 
        $ms_sub_itm_mkg_min_fx = NULL; 
        $ms_sub_itm_disc_max_gm = NULL; 
        $ms_sub_itm_disc_min_gm = NULL; 
        $ms_sub_itm_disc_max_pp = NULL; 
        $ms_sub_itm_disc_min_pp = NULL; 
        $ms_sub_itm_disc_mkg_max_fx = NULL; 
        $ms_sub_itm_disc_mkg_min_fx = NULL; 
    }
}
//
//
if ($count > 0) { ?>
        <img src="<?php echo $documentRootBSlash; ?>/images/abx-t.png"
         onload="stockMasterUserDetailsDisplay('<?php echo $ms_sub_itm_from_wt; ?>', '<?php echo $ms_sub_itm_to_wt; ?>', 
                                               '<?php echo $ms_sub_itm_wstg_max; ?>', '<?php echo $ms_sub_itm_wstg_min; ?>', 
                                               '<?php echo $ms_sub_itm_wstg_max_per; ?>', '<?php echo $ms_sub_itm_wstg_min_per; ?>',                                                
                                               '<?php echo $ms_sub_itm_mkg_max; ?>', '<?php echo $ms_sub_itm_mkg_min; ?>', 
                                               '<?php echo $ms_sub_itm_mkg_max_pp; ?>', '<?php echo $ms_sub_itm_mkg_min_pp; ?>',                                              
                                               '<?php echo $ms_sub_itm_mkg_max_fx; ?>', '<?php echo $ms_sub_itm_mkg_min_fx; ?>', 
                                               '<?php echo $ms_sub_itm_disc_max_gm; ?>', '<?php echo $ms_sub_itm_disc_min_gm; ?>',                                              
                                               '<?php echo $ms_sub_itm_disc_max_pp; ?>', '<?php echo $ms_sub_itm_disc_min_pp; ?>', 
                                               '<?php echo $ms_sub_itm_disc_mkg_max_fx; ?>', '<?php echo $ms_sub_itm_disc_mkg_min_fx; ?>',                                               
                                               '<?php echo $ms_itm_category; ?>', '<?php echo $ms_itm_name; ?>', '<?php echo $ms_itm_model_no; ?>');"/>
<?php
}
//
// END CODE SET STOCK MASTER DETAILS ACCORDING TO USER @PRIYANKA-29APR19
?>

