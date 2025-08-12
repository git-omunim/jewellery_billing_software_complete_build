<?php
/*
 * *****************************************************************************
 * @tutorial: GET CRYSTAL DETAILS FROM CRY ID @DNYANESHWARI 
 * *****************************************************************************
 * 
 * Created on 09 JULY, 2024 12:21:22 PM
 *
 * @FileName: omsetcrystalratesdetails.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2017 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2017 SoftwareGen Technologies
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
include 'ommpfndv.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
?>
<?php
$crystalId = $_GET['crystalId'];
//parse_str(getTableValues("SELECT * FROM master_item where ms_itm_barcode = '$barcode'"));
 $query = "SELECT * FROM crystal_rates where cry_rate_crystal_id='$crystalId'";
$resQuery = mysqli_query($conn, $query);
        $rowQuery = mysqli_fetch_assoc($resQuery);
        $count = mysqli_num_rows($resQuery);
 $cry_rate_id =  $rowQuery['cry_rate_id'];
 $cry_rate_value =  $rowQuery['cry_rate_value'];
 $cry_rate_purch_wt_tp =  $rowQuery['cry_rate_purch_wt_tp'];
 $cry_rate_sell_value =  $rowQuery['cry_rate_sell_value'];  
  $cry_rate_per_wt_tp =  $rowQuery['cry_rate_per_wt_tp'];
   
    $cry_rate_clarity_color =  $rowQuery['cry_rate_clarity_color'];
     $cry_rate_color =  $rowQuery['cry_rate_color'];
      $cry_rate_shape =  $rowQuery['cry_rate_shape'];
      $cry_rate_name =  $rowQuery['cry_rate_name'];
//       $cry_rate_value =  $rowQuery['cry_rate_value'];
 //
 //
        if($cry_rate_id !='' && $cry_rate_id != null && $cry_rate_id != 'undefined'){
          echo $cry_rate_value. "*" .$cry_rate_sell_value. "*" .$cry_rate_per_wt_tp. "*" .$cry_rate_clarity_color. "*" .$cry_rate_color. "*" .$cry_rate_shape. "*" .$cry_rate_name. "*" .$cry_rate_purch_wt_tp;
        }else{
            echo 0;
        }

   ?>  

