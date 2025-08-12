<?php
/*
 * **************************************************************************************
 * @tutorial: MIGRATION FILE
 * **************************************************************************************
 *
 * Created on 29 JUNE, 2019
 *
 * @FileName:omtest.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.102
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
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
require_once 'conversions.php';
?>
<?php
$selQuery = "SELECT * FROM stock_transaction WHERE sttr_transaction_type != 'sell' order by sttr_id asc";          
$resQuery = mysqli_query($conn, $selQuery);
$totalRows = mysqli_num_rows($resQuery);
//
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
       //
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
       //
       $productCode = $sttr_item_pre_id . $sttr_item_id;
       //
       //echo '<br />';
       //
       $selQuery2 = "SELECT * FROM stock_transaction WHERE sttr_id = '$sttr_id' and "
                  . "sttr_item_code != '$productCode' order by sttr_id asc";      
       //
       //echo '$selQuery2 == ' . $selQuery2 . '<br />';
       //
       $resQuery2 = mysqli_query($conn, $selQuery2);
       $totalRows2 = mysqli_num_rows($resQuery2);
       //
       //echo '$totalRows2 == ' . $totalRows2 . '<br />';
       //
       //echo '<hr>';
       //
       $selQuery3 = "SELECT * FROM stock_transaction WHERE sttr_id  != '$sttr_id' "
                  . "and sttr_item_code = '$productCode' "
                  . "and sttr_item_pre_id = '$sttr_item_pre_id' and sttr_item_id = '$sttr_item_id' "
                  . "and sttr_transaction_type != 'sell' order by sttr_id asc";      
       //
       //echo '$selQuery3 == ' . $selQuery3 . '<br />';
       //
       $resQuery3 = mysqli_query($conn, $selQuery3);
       $totalRows3 = mysqli_num_rows($resQuery3);
       //
       //echo '$totalRows3 == ' . $totalRows3 . '<br />';
       //
       if ($totalRows3 > 0) {
            //
            while ($row2 = mysqli_fetch_array($resQuery3)) {
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
              //
              //
//              echo '$sttr_id2 == ' . $sttr_id2 . '<br />';
//              echo '$sttr_sttr_id2 == ' . $sttr_sttr_id2 . '<br />';
//              echo '$sttr_item_pre_id2 == ' . $sttr_item_pre_id2 . '<br />';
//              echo '$sttr_item_id2 == ' . $sttr_item_id2 . '<br />';
//              echo '$sttr_item_code2 == ' . $sttr_item_code2 . '<br />';
//              echo '$sttr_item_category2 == ' . $sttr_item_category2 . '<br />';
//              echo '$sttr_item_name2 == ' . $sttr_item_name2 . '<br />';
//              echo '$sttr_barcode_prefix2 == ' . $sttr_barcode_prefix2 . '<br />';
//              echo '$sttr_barcode2 == ' . $sttr_barcode2 . '<br />';
//              echo '$sttr_stock_type2 == ' . $sttr_stock_type2 . '<br />';
//              echo '$sttr_indictaor2 == ' . $sttr_indictaor2 . '<br />';
//              echo '$sttr_transaction_type2 == ' . $sttr_transaction_type2 . '<br />';
//              echo '$sttr_status2 == ' . $sttr_status2 . '<br />';
//              //
//              echo '**********************************************************************************************************';
              //
            }
        }
       //
       if ($totalRows2 > 0 && $totalRows3 == 0) {
           //
           $updateQuery1 = "UPDATE stock_transaction SET sttr_item_code = '$productCode' "
                         . "WHERE sttr_id = '$sttr_id'";
           //
           //echo '$updateQuery 1== ' . $updateQuery1 . '<br />';
           //
           mysqli_query($conn, $updateQuery1);
           //
       } else if ($totalRows2 > 0 && $totalRows3 > 0) {
           //
           $selQuery4 = "SELECT * FROM stock_transaction WHERE sttr_sttr_id = '$sttr_id' "
                      . "and sttr_item_code = '$sttr_item_code' "
                      . "and sttr_transaction_type = 'sell' order by sttr_id asc";
           //
           //echo '$selQuery4 == ' . $selQuery4 . '<br />';
           //
           $resQuery4 = mysqli_query($conn, $selQuery4);
           $totalRows4 = mysqli_num_rows($resQuery4);
           //
            if ($totalRows4 > 0) {
                //
                while ($row3 = mysqli_fetch_array($resQuery4)) {
                       //
                       $sttr_id3 = $row3['sttr_id'];
                       //
                       $updateQuery2 = "UPDATE stock_transaction SET sttr_item_code = '$productCode', "
                                     . "sttr_item_pre_id = '$sttr_item_pre_id', sttr_item_id = '$sttr_item_id' "
                                     . "WHERE sttr_id = '$sttr_id3' "
                                     . "and sttr_item_code = '$sttr_item_code' "
                                     . "and sttr_transaction_type = 'sell' order by sttr_id asc";
                        //
                        //echo '$updateQuery 2== ' . $updateQuery2 . '<br />';
                        //
                        mysqli_query($conn, $updateQuery2);
                        //
                }
            }
            //
            $selQuery5 = "SELECT * FROM stock_transaction WHERE sttr_item_code = '$sttr_item_code' order by sttr_id asc";
            //
            //echo '$selQuery5 == ' . $selQuery5 . '<br />';
            //
            $resQuery5 = mysqli_query($conn, $selQuery5);
            $totalRows5 = mysqli_num_rows($resQuery5);
            //
            if ($totalRows5 == 1) {
            //
            $updateQuery3 = "UPDATE stock_transaction SET sttr_item_code = '$productCode' "
                          . "WHERE sttr_id = '$sttr_id'";
            //
            //echo '$updateQuery 3== ' . $updateQuery3 . '<br />';
            //
            mysqli_query($conn, $updateQuery3);
            //
            } else {
                //
                $updateQuery4 = "UPDATE stock_transaction SET sttr_item_code = '$productCode' "
                              . "WHERE sttr_id = '$sttr_id'";
                //
                //echo '$updateQuery 4== ' . $updateQuery4 . '<br />';
                //
                mysqli_query($conn, $updateQuery4);
                // 
            }
       }
       //echo '<hr>';
       //echo '<hr>';
}

$selQuery6 = "SELECT * FROM stock_transaction WHERE sttr_transaction_type != 'sell' order by sttr_id asc";          
$resQuery6 = mysqli_query($conn, $selQuery6);
$totalRows6 = mysqli_num_rows($resQuery6);
//
while ($row6 = mysqli_fetch_array($resQuery6)) {
    
       $sttr_id6 = $row6['sttr_id'];
       $sttr_item_pre_id6 = $row6['sttr_item_pre_id'];
       $sttr_item_id6 = $row6['sttr_item_id'];
       $sttr_item_code6 = $row6['sttr_item_code'];
       $sttr_item_category6 = $row6['sttr_item_category'];
       $sttr_item_name6 = $row6['sttr_item_name'];
       $sttr_barcode_prefix6 = $row6['sttr_barcode_prefix'];
       $sttr_barcode6 = $row6['sttr_barcode'];
       $sttr_stock_type6 = $row6['sttr_stock_type'];
       $sttr_indictaor6 = $row6['sttr_indictaor'];
       $sttr_transaction_type6 = $row6['sttr_transaction_type'];
       $sttr_status6 = $row6['sttr_status'];
       $sttr_price6 = $row6['sttr_price'];
       
            $selQuery7 = "SELECT * FROM stock_transaction WHERE (sttr_item_code = '$sttr_item_code6' "
                       . "and sttr_item_pre_id = '$sttr_item_pre_id6' and sttr_item_id = '$sttr_item_id6' "
                       . "and sttr_item_category = '$sttr_item_category6' and sttr_item_name = '$sttr_item_name6' "
                       . "and sttr_transaction_type != 'sell') "
                       . "order by sttr_id asc";
            //
            //echo '$selQuery7 == ' . $selQuery7 . '<br />';
            //
            $resQuery7 = mysqli_query($conn, $selQuery7);
            $totalRows7 = mysqli_num_rows($resQuery7);
            //
            if ($totalRows7 > 1) {
                
                $counter = 0;
                
                while ($row7 = mysqli_fetch_array($resQuery7)) {
                    
                       $sttr_id7 = $row7['sttr_id'];
                       
                       if ($counter > 0) {
                        //
                        $deleteQuery = "DELETE FROM stock_transaction WHERE sttr_id = '$sttr_id7'";
                        //
                        //echo '$deleteQuery == ' . $deleteQuery . '<br />';
                        //
                        mysqli_query($conn, $deleteQuery);
                       }
                       
                       //echo '$counter == ' . $counter . '<br />';
                       
                       $counter ++;
                }
            }
            
            $selQuery8 = "SELECT * FROM stock_transaction WHERE (sttr_item_code = '$sttr_item_code6' "
                       . "and sttr_item_pre_id = '$sttr_item_pre_id6' and sttr_item_id = '$sttr_item_id6' "
                       . "and sttr_item_category = '$sttr_item_category6' and sttr_price = '$sttr_price6' "
                       . "and sttr_transaction_type != 'sell') "
                       . "order by sttr_id asc";
            //
            //echo '$selQuery8 == ' . $selQuery8 . '<br />';
            //
            $resQuery8 = mysqli_query($conn, $selQuery8);
            $totalRows8 = mysqli_num_rows($resQuery8);
            //
            if ($totalRows8 > 1) {
                
                $counter1 = 0;
                
                while ($row8= mysqli_fetch_array($resQuery8)) {
                    
                       $sttr_id8 = $row8['sttr_id'];
                       
                       if ($counter1 > 0) {
                        //
                        $deleteQuery1 = "DELETE FROM stock_transaction WHERE sttr_id = '$sttr_id8'";
                        //
                        //echo '$deleteQuery1 == ' . $deleteQuery1 . '<br />';
                        //
                        mysqli_query($conn, $deleteQuery1);
                       }
                       
                       //echo '$counter1 == ' . $counter1 . '<br />';
                       
                       $counter1 ++;
                }
            }
            
            
}
?>