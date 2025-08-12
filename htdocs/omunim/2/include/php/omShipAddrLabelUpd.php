<?php
include 'system/omsachsc.php';
include 'ommprspc.php';
include_once 'ommpfndv.php';
include_once 'ommpnmwd.php';
require_once 'ommpincr.php';
include_once 'ommpfunc.php';
$labelType='SellPurchase';
$query1="INSERT INTO labels(    
           label_own_id, label_type, label_field_name, label_field_content,label_field_font_size,label_field_font_color,label_field_check)
           VALUES
           ('$ownerId','$labelType','shipDetTop','','14','orange','true'),"
           ."('$ownerId','$labelType','shipAddress','','12','black','true')";

   if (!mysqli_query($conn,$query1)) {
        die('Error1: ' . mysqli_error($conn));
    }
    
$labelType='APPROVAL';
$query2="INSERT INTO labels(    
           label_own_id, label_type, label_field_name, label_field_content,label_field_font_size,label_field_font_color,label_field_check)
           VALUES
           ('$ownerId','$labelType','shipDetTop','','14','orange','true'),"
           ."('$ownerId','$labelType','shipAddress','','12','black','true')";

   if (!mysqli_query($conn,$query2)) {
        die('Error2: ' . mysqli_error($conn));
    }
    
    
$labelType='ROUGH_ESTIMATE';
$query3="INSERT INTO labels(    
           label_own_id, label_type, label_field_name, label_field_content,label_field_font_size,label_field_font_color,label_field_check)
           VALUES
           ('$ownerId','$labelType','shipDetTop','','14','orange','true'),"
           ."('$ownerId','$labelType','shipAddress','','12','black','true')";

   if (!mysqli_query($conn,$query3)) {
        die('Error3: ' . mysqli_error($conn));
    }

    
$labelType='estimateSell';
$query4="INSERT INTO labels(    
           label_own_id, label_type, label_field_name, label_field_content,label_field_font_size,label_field_font_color,label_field_check)
           VALUES
           ('$ownerId','$labelType','shipDetTop','','14','orange','true'),"
           ."('$ownerId','$labelType','shipAddress','','12','black','true')";

   if (!mysqli_query($conn,$query4)) {
        die('Error4: ' . mysqli_error($conn));
    }


$labelType='StrlleringSilver';
$query5="INSERT INTO labels(    
           label_own_id, label_type, label_field_name, label_field_content,label_field_font_size,label_field_font_color,label_field_check)
           VALUES
           ('$ownerId','$labelType','shipDetTop','','14','orange','true'),"
           ."('$ownerId','$labelType','shipAddress','','12','black','true')";

   if (!mysqli_query($conn,$query5)) {
        die('Error5: ' . mysqli_error($conn));
    }

    
$labelType='ImitationSell';
$query6="INSERT INTO labels(    
           label_own_id, label_type, label_field_name, label_field_content,label_field_font_size,label_field_font_color,label_field_check)
           VALUES
           ('$ownerId','$labelType','shipDetTop','','14','orange','true'),"
           ."('$ownerId','$labelType','shipAddress','','12','black','true')";

   if (!mysqli_query($conn,$query6)) {
        die('Error6: ' . mysqli_error($conn));
    }


?>