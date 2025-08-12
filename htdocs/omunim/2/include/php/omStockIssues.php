<?php
/*
 * ****************************************************************************************************
 * @tutorial: UPDATE STOCK TRANSACTION TABLE FOR SOLDOUT ENTRIES (HAYAGI CUSTOMER) @PRIYANKA-25JULY19
 * ****************************************************************************************************
 * 
 * Created on 25 JULY, 19 15:23:00 PM
 *
 * @FileName: omStockIssues.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.102
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen Technologies
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
include_once 'ommpfndv.php';
?>
<?php
$selQuery = "SELECT * FROM stock_transaction WHERE sttr_transaction_type != 'sell' "
          . "AND sttr_status = 'SOLDOUT' order by sttr_id asc";          
//
$resQuery = mysqli_query($conn, $selQuery);
$totalRows = mysqli_num_rows($resQuery);
//
$counter = 0;
while ($row = mysqli_fetch_array($resQuery)) {
       //
       $sttr_id = $row['sttr_id'];
       $sttr_item_pre_id = $row['sttr_item_pre_id'];
       $sttr_item_id = $row['sttr_item_id'];
       $sttr_item_code = $row['sttr_item_code'];
       $sttr_item_category = $row['sttr_item_category'];
       $sttr_item_name = $row['sttr_item_name'];
       $sttr_barcode_prefix = $row['sttr_barcode_prefix'];
       $sttr_barcode = $row['sttr_barcode'];
       $sttr_stock_type = $row['sttr_stock_type'];
       $sttr_indictaor = $row['sttr_indictaor'];
       $sttr_transaction_type = $row['sttr_transaction_type'];
       $sttr_status = $row['sttr_status'];
       
       $sttr_quantity = $row['sttr_quantity'];
             
//       echo '$sttr_id == ' . $sttr_id . '<br />';
//       echo '$sttr_item_pre_id == ' . $sttr_item_pre_id . '<br />';
//       echo '$sttr_item_id == ' . $sttr_item_id . '<br />';
//       echo '$sttr_item_code == ' . $sttr_item_code . '<br />';
//       echo '$sttr_item_category == ' . $sttr_item_category . '<br />';
//       echo '$sttr_item_name == ' . $sttr_item_name . '<br />';
//       echo '$sttr_barcode_prefix == ' . $sttr_barcode_prefix . '<br />';
//       echo '$sttr_barcode == ' . $sttr_barcode . '<br />';
//       echo '$sttr_stock_type == ' . $sttr_stock_type . '<br />';
//       echo '$sttr_indictaor == ' . $sttr_indictaor . '<br />';
//       echo '$sttr_transaction_type == ' . $sttr_transaction_type . '<br />';
//       echo '$sttr_status == ' . $sttr_status . '<br />';
       
//       echo '$sttr_quantity == ' . $sttr_quantity . '<br />';
       
       
       $selQuery2 = "SELECT * FROM stock_transaction WHERE sttr_transaction_type = 'sell' "
                  . "AND sttr_sttr_id = '$sttr_id' order by sttr_id asc";      
       //
       //echo '$selQuery2 == ' . $selQuery2 . '<br />';
       //
       $resQuery2 = mysqli_query($conn, $selQuery2);
       $totalRows2 = mysqli_num_rows($resQuery2);
       //
       //echo '$totalRows2 == ' . $totalRows2 . '<br />';
       //
        if ($totalRows2 > 0) {
            //
            $sttr_quantity_sum2 = 0;
            //
            while ($row2 = mysqli_fetch_array($resQuery2)) {
              //
              $sttr_id2 = $row2['sttr_id'];
              $sttr_sttr_id2 = $row2['sttr_sttr_id'];
              $sttr_item_pre_id2 = $row2['sttr_item_pre_id'];
              $sttr_item_id2 = $row2['sttr_item_id'];
              $sttr_item_code2 = $row2['sttr_item_code'];
              $sttr_item_category2 = $row2['sttr_item_category'];
              $sttr_item_name2 = $row2['sttr_item_name'];
              $sttr_barcode_prefix2 = $row2['sttr_barcode_prefix'];
              $sttr_barcode2 = $row2['sttr_barcode'];
              $sttr_stock_type2 = $row2['sttr_stock_type'];
              $sttr_indictaor2 = $row2['sttr_indictaor'];
              $sttr_transaction_type2 = $row2['sttr_transaction_type'];
              $sttr_status2 = $row2['sttr_status'];
              
              $sttr_quantity_sum2 += $row2['sttr_quantity'];
              
              //echo '$sttr_quantity_sum2 == ' . $sttr_quantity_sum2 . '<br />';
                                         
            }
            
            if ($sttr_quantity > $sttr_quantity_sum2) {
                
                $query3 = "UPDATE stock_transaction SET sttr_status = 'EXISTING' "
                        . "WHERE sttr_id = '$sttr_id' AND sttr_transaction_type != 'sell'";

                //echo '$query3 == '.$query3.'<br />';
    
                if (!mysqli_query($conn, $query3)) {
                    die("FileName:omStockIssues.php<br/>Error:" . mysqli_error($conn));
                }
                
                $counter++;
                
                //echo '$counter == ' . $counter . '<br />';
            }
        }
}
?>