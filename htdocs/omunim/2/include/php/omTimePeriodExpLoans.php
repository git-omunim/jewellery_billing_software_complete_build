<?php

/* Filename: omTimePeriodExpLoans.php
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
//require_once 'system/omssopin.php';
if ($_SESSION['sessionOwnIndStr'][26] == 'S' || $_SESSION['sessionOwnIndStr'][26] == 'A') {
    $todayDate = date(d) . ' ' . date(M) . ' ' . date(Y);
    $todayDateNum = strtotime($todayDate);
    $todayDateNum = $todayDateNum + 60 * 60 * 24;
    //$queryString = "((UNIX_TIMESTAMP(STR_TO_DATE(girv_new_DOB,'%d %b %Y'))<$todayDateNum) or (girv_time_period < ((($todayDateNum - UNIX_TIMESTAMP(STR_TO_DATE(girv_new_DOB,'%d %b %Y')))/(60 * 60 * 24))/30))) and girv_time_period!='' and";
    $queryString = "girv_time_period < ((($todayDateNum - UNIX_TIMESTAMP(STR_TO_DATE(girv_new_DOB,'%d %b %Y')))/(60 * 60 * 24))/30) and (girv_time_period!='' and girv_time_period!=0) and";
    $girviQueryUpdMainPrinc = "update girvi set girv_prin_amt = girv_main_prin_final_amt where $queryString girv_upd_sts IN ('New','Updated','ReleaseCart') and (girv_processing_amt != '' OR girv_charge_amt != '')";
    //echo $girviQueryUpdMainPrinc;
    if (!mysqli_query($conn, $girviQueryUpdMainPrinc)) {
        die('Error: ' . mysqli_error($conn));
    }
}
?>