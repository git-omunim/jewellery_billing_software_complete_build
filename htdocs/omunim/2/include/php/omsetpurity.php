<?php
/*
 * ***********************************************************************************************
 * @tutorial: SET PURITY, LAB CHARGES, WASTAGE ACCORDING TO USER AND ITEM CODE @PRIYANKA-22AUG18
 * ***********************************************************************************************
 * 
 * Created on AUG 22, 2018 18:52:00 PM
 *
 * @FileName: omsetpurity.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 2.6.86
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-22AUG18
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
$itemCode = $_REQUEST['itemCode'];
$userId = $_REQUEST['userId'];
//
// START CODE SET PURITY, LAB CHARGES, WASTAGE ACCORDING TO USER AND ITEM CODE @PRIYANKA-22AUG18
//
$qSelect = "SELECT sttr_purity,sttr_wastage,sttr_lab_charges,sttr_lab_charges_type,sttr_item_category,sttr_item_name "
         . "FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
         . "and sttr_item_code = '$itemCode' and sttr_transaction_type = 'PURCHASE' "
         . "and sttr_user_id = '$userId' and sttr_indicator NOT IN ('stockCrystal') "
         . "order by sttr_id desc LIMIT 0,1";
//
$resultQuery = mysqli_query($conn, $qSelect);
//
//echo '$qSelect == '.$qSelect.'<br />';
//
$row = mysqli_fetch_array($resultQuery, MYSQLI_ASSOC);
//
$sttr_purity = $row['sttr_purity'];
$sttr_wastage = $row['sttr_wastage'];
$sttr_lab_charges = $row['sttr_lab_charges'];
$sttr_lab_charges_type = $row['sttr_lab_charges_type'];
$sttr_item_category = $row['sttr_item_category'];
$sttr_item_name = $row['sttr_item_name'];
//
//echo '$sttr_purity == '.$sttr_purity.'<br />';
//echo '$sttr_wastage == '.$sttr_wastage.'<br />';
//echo '$sttr_lab_charges == '.$sttr_lab_charges.'<br />';
//echo '$sttr_lab_charges_type == '.$sttr_lab_charges_type.'<br />';
//echo '$sttr_item_category == '.$sttr_item_category.'<br />';
//echo '$sttr_item_name == '.$sttr_item_name.'<br />';
//
$count = mysqli_num_rows($resultQuery);
//
//echo '$count == '.$count.'<br />';
//
if ($count == 0) {
    //
    parse_str(getTableValues("SELECT sttr_purity, sttr_wastage, sttr_lab_charges, sttr_lab_charges_type,"
                           . "sttr_item_category, sttr_item_name "
                           . "FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                           . "and sttr_item_code = '$itemCode' and sttr_stock_type = 'wholesale' "
                           . "and sttr_indicator IN ('stock','AddInvoice') "
                           . "order by sttr_id desc LIMIT 0,1"));
    //
    if ($sttr_item_category != '' && $sttr_item_category != NULL) {
        $count = 1;
    }
}
//
//
if ($count > 0) { ?>
        <img src="<?php echo $documentRootBSlash; ?>/images/abx-t.png"
         onload="purItmSetPurityDetails('<?php echo $sttr_purity; ?>', '<?php echo $sttr_wastage; ?>', '<?php echo $sttr_lab_charges; ?>', '<?php echo $sttr_lab_charges_type; ?>', '<?php echo $sttr_item_category; ?>', '<?php echo $sttr_item_name; ?>');"/>
<?php
}
//
// END CODE SET PURITY, LAB CHARGES, WASTAGE ACCORDING TO USER AND ITEM CODE @PRIYANKA-22AUG18
?>

