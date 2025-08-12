<?php
/*
 * **************************************************************************************
 * @tutorial: STAFF ATTENDANCE REPORT @AUTHOR:GANGADHAR-27MARCH2020
 * **************************************************************************************
 * 
 * Created on MAR 27, 2020 01:20:58 PM
 *
 * @FileName: omstaffattendancereport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:27MARCH2020
 *  AUTHOR:GANGADHAR
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
include_once 'ommpfndv.php';
?>
<div id="AttendanceDetails">
<?php
$ownerId =$_SESSION['sessionOwnerId'];
$staffId = $_REQUEST['staffId'];
//$reportType = $_REQUEST['reportType'];
$current_date = date("d-m-yy");
$current_month = date("m", strtotime($current_date));
$current_year = date("Y", strtotime($current_date));
/* START CODE TO GET SELECTED MONTH AND YEAR TO SHOW ATTWNDENCE RECORD,@AUTHOR:HEMA-16MAY2020 */
$attendanceReportMonth = $_REQUEST['attendanceReportMonth'];
$attendanceReportMonth = date("m",  strtotime($attendanceReportMonth));
$attendanceReportYear = $_REQUEST['attendanceReportYear'];
/* END CODE TO GET SELECTED MONTH AND YEAR TO SHOW ATTWNDENCE RECORD,@AUTHOR:HEMA-16MAY2020 */
/* START CODE TO GET DATA TO STORE QUARTERLY LEAVES OF STAFF,@AUTHOR:HEMA-16MAY2020 */
$firstQurterLeaves = $_REQUEST['firstQurterLeaves'];
$secondQurterLeaves = $_REQUEST['secondQurterLeaves'];
$thirdQurterLeaves = $_REQUEST['thirdQurterLeaves'];
$fourthQurterLeaves = $_REQUEST['fourthQurterLeaves'];
$currentYear = $_REQUEST['currentYear'];
/* END CODE TO GET DATA TO STORE QUARTERLY LEAVES OF STAFF,@AUTHOR:HEMA-16MAY2020 */
//ECHO '$reportType = '.$reportType.'</br>';
//
/* **************************** START CODE TO ADD QUARTERLY LEAVES OF STAFF,@AUTHOR:HEMA-16MAY2020*************************** */
if(($staffId != '' || $staffId != null) && ($currentYear != '' || $currentYear != NULL) && ($firstQurterLeaves != '' || $firstQurterLeaves != '') && ($secondQurterLeaves != '' || $secondQurterLeaves != '') && ($thirdQurterLeaves != '' || $thirdQurterLeaves != '') && ($fourthQurterLeaves != '' || $fourthQurterLeaves != '')){
    for($quarterCount=1; $quarterCount<=4; $quarterCount++){
        if($quarterCount == 1){
            $quarterlyLeavesOption = 'ONEQUARTER';
            $quarterlyLeavesValue = $firstQurterLeaves;
        }else if($quarterCount == 2){
            $quarterlyLeavesOption = 'TWOQUARTER';
            $quarterlyLeavesValue = $secondQurterLeaves;
        }else if($quarterCount == 3){
            $quarterlyLeavesOption = 'THREEQUARTER';
            $quarterlyLeavesValue = $thirdQurterLeaves;
        }else if($quarterCount == 4){
            $quarterlyLeavesOption = 'FOURQUARTER';
            $quarterlyLeavesValue = $fourthQurterLeaves;
        }
        /* START CODE TO SELECT QUARTERLY LEAVES OPTION IF ALREADY ADDED,@AUTHOR:HEMA-15MAY2020 */
        $rowquarterlyLeavesOptionSel = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM omdata WHERE omdata_option='$quarterlyLeavesOption' and omdata_year='$currentYear' and omdata_user_id='$staffId'"));
        $quarterlyLeavesOptionData = $rowquarterlyLeavesOptionSel['omdata_option'];
        /* END CODE TO SELECT QUARTERLY LEAVES OPTION IF ALREADY ADDED,@AUTHOR:HEMA-15MAY2020 */
        /* START CODE TO INSERT QUARTERLY LEAVES,@AUTHOR:HEMA-15MAY2020 */
        if($quarterlyLeavesOptionData == null || $quarterlyLeavesOptionData == ''){
            $insrtQuarterlyLeaves = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year)VALUES('$ownerId','$staffId','','$quarterlyLeavesOption','$quarterlyLeavesValue','$currentYear')";
            if (!mysqli_query($conn, $insrtQuarterlyLeaves)) {
                die('Error: ' . mysqli_error($conn));
            }
        /* END CODE TO INSERT QUARTERLY LEAVES,@AUTHOR:HEMA-15MAY2020 */
        /* START CODE TO UPDATE QUARTERLY LEAVESI F ALREADY ADDED,@AUTHOR:HEMA-15MAY2020 */
        }else{
            $updateQuaerterlyLeavesq = "UPDATE omdata SET omdata_value='$quarterlyLeavesValue' WHERE omdata_option='$quarterlyLeavesOption' and omdata_year='$currentYear' and omdata_user_id='$staffId'";
            if (!mysqli_query($conn, $updateQuaerterlyLeavesq)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
        /* END CODE TO UPDATE QUARTERLY LEAVES IF ALREADY ADDED,@AUTHOR:HEMA-15MAY2020 */
    }  
}
/* ******************************* END CODE TO ADD QUARTERLY LEAVES OF STAFF,@AUHR:HEMA-16MAY2020***************************** */
/* ********************************START CODE TO GET QUARTERLY LEAVES OF STAFF,@AUTHOR:HEMA-14MAY2020*************************** */
$selQuarterOneLeavesQ = "SELECT * FROM omdata WHERE omdata_option = 'ONEQUARTER' and omdata_year='$current_year' and omdata_user_id = '$staffId'";
$resQuarterOneLeaves = mysqli_query($conn, $selQuarterOneLeavesQ);
$rowQuarterOneLeaves = mysqli_fetch_assoc($resQuarterOneLeaves);
$quarterOneLeaves = $rowQuarterOneLeaves['omdata_value'];
$selQuarterTwoLeavesQ = "SELECT * FROM omdata WHERE omdata_option = 'TWOQUARTER' and omdata_year='$current_year' and omdata_user_id = '$staffId'";
$resQuarterTwoLeaves = mysqli_query($conn, $selQuarterTwoLeavesQ);
$rowQuarterTwoLeaves = mysqli_fetch_assoc($resQuarterTwoLeaves);
$quarterTwoLeaves = $rowQuarterTwoLeaves['omdata_value'];
$selQuarterThreeLeavesQ = "SELECT * FROM omdata WHERE omdata_option = 'THREEQUARTER' and omdata_year='$current_year' and omdata_user_id = '$staffId'";
$resQuarterThreeLeaves = mysqli_query($conn, $selQuarterThreeLeavesQ);
$rowQuarterThreeLeaves = mysqli_fetch_assoc($resQuarterThreeLeaves);
$quarterThreeLeaves = $rowQuarterThreeLeaves['omdata_value'];
$selQuarterFourLeavesQ = "SELECT * FROM omdata WHERE omdata_option = 'FOURQUARTER' and omdata_year='$current_year' and omdata_user_id = '$staffId'";
$resQuarterFourLeaves = mysqli_query($conn, $selQuarterFourLeavesQ);
$rowQuarterFourLeaves = mysqli_fetch_assoc($resQuarterFourLeaves);
$quarterFourLeaves = $rowQuarterFourLeaves['omdata_value'];
/* **********************************END COE TO GET QUARTERLY LEAVES OF STAFF,@AUTHOR:HEMA-14MAY2020************************** */
/* ****************** START CODE TO SELECT CURRENT MONTH IS IN WITCH QUARTER,@AUTHOR-HEMA-15APRIL2020**************************** */
if ($current_month == '01' || $current_month == '02' || $current_month == '03') {
    $currentMonthQuarterOption = 'ONEQUARTER';
} else if ($current_month == '04' || $current_month == '05' || $current_month == '06') {
    $currentMonthQuarterOption = 'TWOQUARTER';
} else if ($current_month == '07' || $current_month == '08' || $current_month == '09') {
    $currentMonthQuarterOption = 'THREEQUARTER';
} else if ($current_month == '10' || $current_month == '11' || $current_month == '12') {
    $currentMonthQuarterOption = 'FOURQUARTER';
}
/* *********************END CODE TO SELECT CURRENT MONTH IS IN WITCH QUARTER,@AUTHOR-HEMA-15APRIL2020****************************************** */
/* ********************START CODE FOR CUSTOMER LEAVES CALCULATION,@AUTHOR:HEMA-16MAY2020********************************************** */
/* ***********************************START CODE TO SELECT AVAILABLE LEAVES,@AUTHOR:HEMA-14MAY2020******************************* */
$selAvailableLeavesFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'AVAILABLE_LEAVES' and omdata_user_id = '$staffId'";
$resAvailableLeavesFromDB = mysqli_query($conn, $selAvailableLeavesFromDBQ);
$rowAvailableLeavesFromDB = mysqli_fetch_assoc($resAvailableLeavesFromDB);
$availableLeaves = $rowAvailableLeavesFromDB['omdata_value'];
if($availableLeaves == null || $availableLeaves == ''){
    $selAvailableLeavesQ = "SELECT * FROM omdata WHERE omdata_option = '$currentMonthQuarterOption' and omdata_user_id = '$staffId'";
    $resAvailableLeaves = mysqli_query($conn, $selAvailableLeavesQ);
    $rowAvailableLeaves = mysqli_fetch_assoc($resAvailableLeaves);
    $availableLeaves = $rowAvailableLeaves['omdata_value'];
    /* START CODE TO INSERT AVAILABLE LEAVES OF STAFF,@AUTHOR:HEMA-16MAY2020 */
    $insertavailableLeavesQ = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year)VALUES('$ownerId','$staffId','','AVAILABLE_LEAVES','$availableLeaves','$current_year')";
    if (!mysqli_query($conn, $insertavailableLeavesQ)) {
        die('Error: ' . mysqli_error($conn));
    }
    /* END CODE TO INSERT AVAILABLE LEAVES OF STAFF,@AUTHOR:HEMA-16MAY2020 */
}
/* *****************************END CODE TO SELECT AVAILABLE LEAVES,@AUTHOR:HEMA-14MAY2020************************************************** */
/* **********************************START CODE TO CACLULATE TOTAL NO OF WORKING DAY IN A MONTH,@AUTHOR:HEMA-14MAY2020*********************** */
if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == null)){
    $selTotalWorkingDayFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'TOTAL_WORKING_DAY_IN_MONTH' and omdata_user_id = '$staffId' and omdata_year='$current_year' and omdata_month='$current_month'";
}else{
    $selTotalWorkingDayFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'TOTAL_WORKING_DAY_IN_MONTH' and omdata_user_id = '$staffId' and omdata_year='$attendanceReportYear' and omdata_month='$attendanceReportMonth'";   
}
$resTotalWorkingDayFromDB = mysqli_query($conn, $selTotalWorkingDayFromDBQ);
$rowTotalWorkingDayFromDB = mysqli_fetch_assoc($resTotalWorkingDayFromDB);
$totalWorkingDayInMonthFromDB = $rowTotalWorkingDayFromDB['omdata_value'];
    if($attendanceReportMonth == 01 || ($attendanceReportYear == '' || $attendanceReportYear == null)){
        $selTotalWorkingDayInMonthQ = "SELECT attend_date FROM attendance WHERE attend_date LIKE '%-$current_month-$current_year' AND (attend_description = '' OR attend_description IS NULL) AND attend_staff_id = '$staffId'";
    }else{
        $selTotalWorkingDayInMonthQ = "SELECT attend_date FROM attendance WHERE attend_date LIKE '%-$attendanceReportMonth-$attendanceReportYear' AND (attend_description = '' OR attend_description IS NULL) AND attend_staff_id = '$staffId'";   
    }
    $resTotalWorkingDayInMonth = mysqli_query($conn, $selTotalWorkingDayInMonthQ);
    $totalWorkingDayInMonth = mysqli_num_rows($resTotalWorkingDayInMonth);
    if(($totalWorkingDayInMonthFromDB != $totalWorkingDayInMonth) && ($totalWorkingDayInMonthFromDB == '' || $totalWorkingDayInMonthFromDB == null)){
    /* START CODE TO INSERT TOTAL WORKING DAY IN MONTH,@AUTHOR:HEMA-16MAY2020 */
    if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == null)){
        $insertTotalWorkingDayQ = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year,omdata_month)VALUES('$ownerId','$staffId','','TOTAL_WORKING_DAY_IN_MONTH','$totalWorkingDayInMonth','$current_year','$current_month')";
    }else{
        $insertTotalWorkingDayQ = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year,omdata_month)VALUES('$ownerId','$staffId','','TOTAL_WORKING_DAY_IN_MONTH','$attendanceReportMonth','$attendanceReportYear','$attendanceReportMonth')";   
    }
    if (!mysqli_query($conn, $insertTotalWorkingDayQ)) {
        die('Error: ' . mysqli_error($conn));
    }
    /* END CODE TO INSERT TOTAL WORKING DAY IN MONTH,@AUTHOR:HEMA-16MAY2020 */
    /* START CODE TO UPDATE TOTAL WORKING DAY IN MONTH,@AUTHOR:HEMA-16MAY2020 */
    }else if($totalWorkingDayInMonthFromDB == $totalWorkingDayInMonth){
        if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == null)){
            $updateTotalWorkingDayQ = "UPDATE omdata SET omdata_value='$totalWorkingDayInMonth' WHERE omdata_option='TOTAL_WORKING_DAY_IN_MONTH' AND omdata_user_id = '$staffId' and omdata_year='$current_year' AND omdata_month='$current_month'";
        }else{
            $updateTotalWorkingDayQ = "UPDATE omdata SET omdata_value='$totalWorkingDayInMonth' WHERE omdata_option='TOTAL_WORKING_DAY_IN_MONTH' AND omdata_user_id = '$staffId' and omdata_year='$attendanceReportYear' AND omdata_month='$attendanceReportMonth'";
        }
        if (!mysqli_query($conn, $updateTotalWorkingDayQ)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
    /* END CODE TO UPDATE TOTAL WORKING DAY IN MONTH,@AUTHOR:HEMA-16MAY2020 */
/* **************************END CODE TO CALCULATE TOTAL NO OF WORKING DAY IN A MONTH,@AUTHOR:HEMA-14MAY2020************************* */
/* *******************************START CODE TO CALCULATE TOTAL NO OF PRESENT/WORKING DAY,@AUTHOR:HEMA-14MAY2020************************ */
if($attendanceReportMonth == 01 && $attendanceReportYear == '' || $attendanceReportYear == null){
    $selTotalPresentDayQ = "SELECT attend_del_status FROM attendance WHERE attend_del_status = 'PRESENT' AND attend_date LIKE '%-$current_month-$current_year' AND attend_staff_id = '$staffId'";
}else{
    $selTotalPresentDayQ = "SELECT attend_del_status FROM attendance WHERE attend_del_status = 'PRESENT' AND attend_date LIKE '%-$attendanceReportMonth-$attendanceReportYear' AND attend_staff_id = '$staffId'";    
}
$resTotalPresentDay = mysqli_query($conn, $selTotalPresentDayQ);
$totalPresentDay = mysqli_num_rows($resTotalPresentDay);
//
if($attendanceReportMonth == 01 && $attendanceReportYear == '' || $attendanceReportYear == null){
    $selTotalPresentDayFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'PRESENT' and omdata_user_id = '$staffId' and omdata_year='$current_year' and omdata_month='$current_month'";
}else{
    $selTotalPresentDayFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'PRESENT' and omdata_user_id = '$staffId' and omdata_year='$attendanceReportYear' and omdata_month='$attendanceReportMonth'";
}
$resTotalPresentDayFromDB = mysqli_query($conn, $selTotalPresentDayFromDBQ);
$rowTotalPresentDayFromDB = mysqli_fetch_assoc($resTotalPresentDayFromDB);
$totalPresentDayFromDB = $rowTotalPresentDayFromDB['omdata_value'];
if(($totalPresentDay != $totalPresentDayFromDB) && ($totalPresentDayFromDB == null || $totalPresentDayFromDB == '')){
  /* START CODE TO INSERT TOTAL PRESENT DAY OF STAFF,@AUTHOR:HEMA-16MAY2020 */
    if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == null)){
        $insertTotalPresentDayQ = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year,omdata_month)VALUES('$ownerId','$staffId','','PRESENT','$totalPresentDay','$attendanceReportYear','$attendanceReportMonth')";
    }else{
        $insertTotalPresentDayQ = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year,omdata_month)VALUES('$ownerId','$staffId','','PRESENT','$totalPresentDay','$current_year','$current_month')";
    }
    if (!mysqli_query($conn, $insertTotalPresentDayQ)) {
        die('Error: ' . mysqli_error($conn));
    }
    /* END CODE TO INSERT TOTAL PRESENT DAY OF STAFF,@AUTHOR:HEMA-16MAY2020 */
}else if($totalPresentDay != $totalPresentDayFromDB){
    /* START CODE TO UPDATE TOTAL PRESENT DAY OF STAFF,@AUTHOR:HEMA-16MAY2020 */
    if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == NULL)){
        $updateTotalPresentDayQ = "UPDATE omdata SET omdata_value='$totalPresentDay' WHERE omdata_option='PRESENT' AND omdata_user_id = '$staffId' and omdata_year='$attendanceReportYear' AND omdata_month='$attendanceReportMonth'";
    }else{
        $updateTotalPresentDayQ = "UPDATE omdata SET omdata_value='$totalPresentDay' WHERE omdata_option='PRESENT' AND omdata_user_id = '$staffId' and omdata_year='$current_year' AND omdata_month='$current_month'";   
    }
    if (!mysqli_query($conn, $updateTotalPresentDayQ)) {
        die('Error: ' . mysqli_error($conn));
    }
    /* END CODE TO UPDATE TOTAL PRESENT DAY OF STAFF,@AUTHOR:HEMA-16MAY2020 */
}
/* **************************************END CODE TO CALCULATE TOTAL NO OF PRESENT/WORKING DAY,@AUTHOR:HEMA-14MAY2020*********************** */
/* ***********************************START CODE TO CALCULATE TOTAL NO OF ABSENT DAY,@AUTHOR:HEMA-14MAY2020*************************** */
if($attendanceReportMonth == 01 && $attendanceReportYear == '' || $attendanceReportYear == null){
    $selTotalAbsentDayFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'ABSENT' and omdata_user_id = '$staffId' and omdata_year='$current_year' and omdata_month='$current_month'";
}else{
    $selTotalAbsentDayFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'ABSENT' and omdata_user_id = '$staffId' and omdata_year='$attendanceReportYear' and omdata_month='$attendanceReportMonth'";   
}
$resTotalAbsentDayFromDB = mysqli_query($conn, $selTotalAbsentDayFromDBQ);
$rowTotalAbsentDayFromDB = mysqli_fetch_assoc($resTotalAbsentDayFromDB);
$totalAbsentDayFromDB = $rowTotalAbsentDayFromDB['omdata_value'];
    if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == null)){
    $selTotalAbsentDayQ = "SELECT attend_del_status FROM attendance WHERE attend_del_status IN ('ABSENT','HALF DAY') AND attend_date LIKE '%-$current_month-$current_year' AND attend_staff_id = '$staffId'";
    }else{
    $selTotalAbsentDayQ = "SELECT attend_del_status FROM attendance WHERE attend_del_status IN ('ABSENT','HALF DAY') AND attend_date LIKE '%-$attendanceReportMonth-$attendanceReportYear' AND attend_staff_id = '$staffId'";
    }
    $resTotalAbsentDay = mysqli_query($conn, $selTotalAbsentDayQ);
    $totalAbsentDay = mysqli_num_rows($resTotalAbsentDay);
    if(($totalAbsentDayFromDB != $totalAbsentDay) && ($totalAbsentDayFromDB == null || $totalAbsentDayFromDB == '')){
        /* START CODE TO INSERT TOTAL ABSENT DAY OF STAFF,@AUTHOR:HEMA-16MAY2020 */
        if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == null)){
            $insertTotalAbsentDayQ = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year,omdata_month)VALUES('$ownerId','$staffId','','ABSENT','$totalAbsentDay','$current_year','$current_month')";
        }else{
            $insertTotalAbsentDayQ = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year,omdata_month)VALUES('$ownerId','$staffId','','ABSENT','$totalAbsentDay','$attendanceReportYear','$attendanceReportMonth')";
        }
       if (!mysqli_query($conn, $insertTotalAbsentDayQ)) {
           die('Error: ' . mysqli_error($conn));
       }
       /* END CODE TO INSERT TOTAL ABSENT DAY OF STAFF,@AUTHOR:HEMA-16MAY2020 */
    }else{
    /* STRAT CODE TO UPDATE TOTAL ABSENT DAY OF STAFF,@AUTHOR:HEMA-16MAY2020 */
        if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == null)){
            $updateTotalAbsentDayQ = "UPDATE omdata SET omdata_value='$totalAbsentDay' WHERE omdata_option='ABSENT' AND omdata_user_id = '$staffId' and omdata_year='$current_year' AND omdata_month='$current_month'";
        }else{
            $updateTotalAbsentDayQ = "UPDATE omdata SET omdata_value='$totalAbsentDay' WHERE omdata_option='ABSENT' AND omdata_user_id = '$staffId' and omdata_year='$attendanceReportYear' AND omdata_month='$attendanceReportMonth'";
        }
        if (!mysqli_query($conn, $updateTotalAbsentDayQ)) {
           die('Error: ' . mysqli_error($conn));
       }
    /* END CODE TO UPDATE TOTAL ABSENT DAY OF STAFF,@AUTHOR:HEMA-16MAY2020 */
    }
/* *****************************END CODE TO CALCULATE TOTAL NO OF ABSENT DAY,@AUTHOR:HEMA-14MAY2020******************************* */
/* ****************************** STRAT CODE TO CALCULATE TOTAL LEAVES,@AUTHOR:HEMA-14MAY2020********************************** */
if($attendanceReportMonth == 01 && $attendanceReportYear == '' || $attendanceReportYear == null){
    $selTotalLeavesFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'TOTAL_LEAVES' and omdata_user_id = '$staffId' and omdata_year='$current_year' and omdata_month='$current_month'";
}else{
    $selTotalLeavesFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'TOTAL_LEAVES' and omdata_user_id = '$staffId' and omdata_year='$attendanceReportYear' and omdata_month='$attendanceReportMonth'";   
}
$resTotalLeavesFromDB = mysqli_query($conn, $selTotalLeavesFromDBQ);
$rowTotalLeavesFromDB = mysqli_fetch_assoc($resTotalLeavesFromDB);
$totalLeavesFromDB = $rowTotalLeavesFromDB['omdata_value'];
//
 $totalLeaves = $totalAbsentDay;
 if($totalLeavesFromDB != $totalLeaves && ($totalLeavesFromDB == null || $totalLeavesFromDB == '')){
    /* START CODE TO INSERT TOTAL LEAVESOF STAFF,@AUTHOR:HEMA-16MAY2020 */
        if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == null)){
            $insertTotalLeavesQ = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year,omdata_month)VALUES('$ownerId','$staffId','','TOTAL_LEAVES','$totalLeaves','$current_year','$current_month')";
        }else{
            $insertTotalLeavesQ = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year,omdata_month)VALUES('$ownerId','$staffId','','TOTAL_LEAVES','$totalLeaves','$attendanceReportYear','$attendanceReportMonth')";
        }
       if (!mysqli_query($conn, $insertTotalLeavesQ)) {
           die('Error: ' . mysqli_error($conn));
       }
       /* END CODE TO INSERT TOTAL LEAVES OF STAFF,@AUTHOR:HEMA-16MAY2020 */
    }else{
    /* STRAT CODE TO UPDATE TOTAL LEAVES OF STAFF,@AUTHOR:HEMA-16MAY2020 */
        if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == null)){
            $updateTotalLeavesDayQ = "UPDATE omdata SET omdata_value='$totalLeaves' WHERE omdata_option='TOTAL_LEAVES' AND omdata_user_id = '$staffId' and omdata_year='$current_year' AND omdata_month='$current_month'";
        }else{
            $updateTotalLeavesDayQ = "UPDATE omdata SET omdata_value='$totalLeaves' WHERE omdata_option='TOTAL_LEAVES' AND omdata_user_id = '$staffId' and omdata_year='$attendanceReportYear' AND omdata_month='$attendanceReportMonth'";
        }
        if (!mysqli_query($conn, $updateTotalLeavesDayQ)) {
           die('Error: ' . mysqli_error($conn));
       }
    /* END CODE TO UPDATE TOTAL LEAVES OF STAFF,@AUTHOR:HEMA-16MAY2020 */
    }
/* ************************************END CODE TO CALCULATE TOTAL LEAVES,@AUTHOR:HEMA-14MAY2020****************************** */
/* **********************************START CODE TO CALCULATE REMAINIMG LAEAVES,@AUTHOR:HEMA-14MAY2020****************************** */
if($attendanceReportMonth == 01 && $attendanceReportYear == '' || $attendanceReportYear == null){
    $selRemainingLeavesFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'REMAINING_LEAVES' and omdata_user_id = '$staffId' and omdata_year='$current_year' and omdata_month='$current_month'";
}else{
    $selRemainingLeavesFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'REMAINING_LEAVES' and omdata_user_id = '$staffId' and omdata_year='$attendanceReportYear' and omdata_month='$attendanceReportMonth'";   
}
$resRemainingLeavesFromDB = mysqli_query($conn, $selRemainingLeavesFromDBQ);
$rowRemainingLeavesFromDB = mysqli_fetch_assoc($resRemainingLeavesFromDB);
$remainingLeavesFromDB = $rowRemainingLeavesFromDB['omdata_value'];
$remainingLeaves = $availableLeaves - $totalLeaves;
if($remainingLeavesFromDB != $remainingLeaves && ($remainingLeavesFromDB == '' || $remainingLeavesFromDB == null)){
/* START CODE TO INSERT REMAINING OF STAFF,@AUTHOR:HEMA-16MAY2020 */
        if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == null)){
            $insertRemainingLeavesQ = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year,omdata_month)VALUES('$ownerId','$staffId','','REMAINING_LEAVES','$remainingLeaves','$current_year','$current_month')";
        }else{
            $insertRemainingLeavesQ = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year,omdata_month)VALUES('$ownerId','$staffId','','REMAINING_LEAVES','$remainingLeaves','$attendanceReportYear','$attendanceReportMonth')";
        }
       if (!mysqli_query($conn, $insertRemainingLeavesQ)) {
           die('Error: ' . mysqli_error($conn));
       }
       /* END CODE TO INSERT REMAINING OF STAFF,@AUTHOR:HEMA-16MAY2020 */
    }else{
    /* STRAT CODE TO UPDATE REMAINING LEAVES OF STAFF,@AUTHOR:HEMA-16MAY2020 */
        if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == null)){
            $updateRemainingLeavesDayQ = "UPDATE omdata SET omdata_value='$remainingLeaves' WHERE omdata_option='REMAINING_LEAVES' AND omdata_user_id = '$staffId' and omdata_year='$current_year' AND omdata_month='$current_month'";
        }else{
            $updateRemainingLeavesDayQ = "UPDATE omdata SET omdata_value='$remainingLeaves' WHERE omdata_option='REMAINING_LEAVES' AND omdata_user_id = '$staffId' and omdata_year='$attendanceReportYear' AND omdata_month='$attendanceReportMonth'";
        }
        if (!mysqli_query($conn, $updateRemainingLeavesDayQ)) {
           die('Error: ' . mysqli_error($conn));
       }
    /* END CODE TO UPDATE REMAINIG LEAVES OF STAFF,@AUTHOR:HEMA-16MAY2020 */
    }
/* ************************************END CODE TO CALCULATE REMAINIMG LAEAVES,@AUTHOR:HEMA-14MAY2020****************************************************** */
/* ********************************************START CODE TO CALCULATE LOP,@AUTHOR:HEMA-14MAY2020******************************* */
if($attendanceReportMonth == 01 && $attendanceReportYear == '' || $attendanceReportYear == null){
    $selLopFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'LOP' and omdata_user_id = '$staffId' and omdata_year='$current_year' and omdata_month='$current_month'";
}else{
    $selLopFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'LOP' and omdata_user_id = '$staffId' and omdata_year='$attendanceReportYear' and omdata_month='$attendanceReportMonth'";   
}
$resLopFromDB = mysqli_query($conn, $selLopFromDBQ);
$rowLopFromDB = mysqli_fetch_assoc($resLopFromDB);
$lopFromDB = $rowLopFromDB['omdata_value'];
$remainingLeaves = $availableLeaves - $totalLeaves;
if ($totalAbsentDay > $availableLeaves) {
    $lop = $totalAbsentDay - $availableLeaves;
} else {
    $lop = 0;
}
if($lopFromDB != $lop && ($lopFromDB == '' || $lopFromDB == null)){
    /* START CODE TO INSERT LOP OF STAFF,@AUTHOR:HEMA-16MAY2020 */
        if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == null)){
            $insertLopQ = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year,omdata_month)VALUES('$ownerId','$staffId','','LOP','$lop','$current_year','$current_month')";
        }else{
            $insertLopQ = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year,omdata_month)VALUES('$ownerId','$staffId','','LOP','$lop','$attendanceReportYear','$attendanceReportMonth')";
        }
       if (!mysqli_query($conn, $insertLopQ)) {
           die('Error: ' . mysqli_error($conn));
       }
       /* END CODE TO INSERT LOP OF STAFF,@AUTHOR:HEMA-16MAY2020 */
    }else{
    /* STRAT CODE TO UPDATE LOP OF STAFF,@AUTHOR:HEMA-16MAY2020 */
        if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == null)){
            $updateLopQ = "UPDATE omdata SET omdata_value='$lop' WHERE omdata_option='LOP' AND omdata_user_id = '$staffId' and omdata_year='$current_year' AND omdata_month='$current_month'";
        }else{
            $updateLopQ = "UPDATE omdata SET omdata_value='$lop' WHERE omdata_option='LOP' AND omdata_user_id = '$staffId' and omdata_year='$attendanceReportYear' AND omdata_month='$attendanceReportMonth'";
        }
        if (!mysqli_query($conn, $updateLopQ)) {
           die('Error: ' . mysqli_error($conn));
       }
    /* END CODE TO UPDATE LOP OF STAFF,@AUTHOR:HEMA-16MAY2020 */
}
/* *************************************************END CODE TO CALCULATE LOP,@AUTHOR:HEMA-14MAY2020********************************* */
/* *******************************************START CODE TO CALCULATE PAYALE DAY,@AUTHOR:14MAY2020************************************ */
if($attendanceReportMonth == 01 && $attendanceReportYear == '' || $attendanceReportYear == null){
    $selPaybleDayFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'PAYABLE' and omdata_user_id = '$staffId' and omdata_year='$current_year' and omdata_month='$current_month'";
}else{
    $selPaybleDayFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'PAYABLE' and omdata_user_id = '$staffId' and omdata_year='$attendanceReportYear' and omdata_month='$attendanceReportMonth'";   
}
$resPayableFromDB = mysqli_query($conn, $selPaybleDayFromDBQ);
$rowPayableFromDB = mysqli_fetch_assoc($resPayableFromDB);
$PayableFromDB = $rowPayableFromDB['omdata_value'];
if ($lop == 0) {
    $payableDay = $totalPresentDay;
}
$payableDay = $totalPresentDay - $lop;
if($PayableFromDB != $payableDay && ($PayableFromDB == '' || $PayableFromDB == null)){
   /* START CODE TO INSERT PAYABLE OF STAFF,@AUTHOR:HEMA-16MAY2020 */
        if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == null)){
            $insertPayableQ = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year,omdata_month)VALUES('$ownerId','$staffId','','PAYABLE','$payableDay','$current_year','$current_month')";
        }else{
            $insertPayableQ = "INSERT INTO omdata(omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_year,omdata_month)VALUES('$ownerId','$staffId','','PAYABLE','$payableDay','$attendanceReportYear','$attendanceReportMonth')";
        }
       if (!mysqli_query($conn, $insertPayableQ)) {
           die('Error: ' . mysqli_error($conn));
       }
       /* END CODE TO INSERT PAYABLE OF STAFF,@AUTHOR:HEMA-16MAY2020 */
    }else{
    /* STRAT CODE TO UPDATE PAYABLE OF STAFF,@AUTHOR:HEMA-16MAY2020 */
        if($attendanceReportMonth == 01 && ($attendanceReportYear == '' || $attendanceReportYear == null)){
            $updatePayableQ = "UPDATE omdata SET omdata_value='$payableDay' WHERE omdata_option='PAYABLE' AND omdata_user_id = '$staffId' and omdata_year='$current_year' AND omdata_month='$current_month'";
        }else{
            $updatePayableQ = "UPDATE omdata SET omdata_value='$payableDay' WHERE omdata_option='PAYABLE' AND omdata_user_id = '$staffId' and omdata_year='$attendanceReportYear' AND omdata_month='$attendanceReportMonth'";
        }
        if (!mysqli_query($conn, $updatePayableQ)) {
           die('Error: ' . mysqli_error($conn));
       }
    /* END CODE TO UPDATE PAYABLE OF STAFF,@AUTHOR:HEMA-16MAY2020 */ 
}
/* ***********************************END CODE TO CALCULATE PAYABLE DAY,@AUTHOR:14MAY2020************************************************************ */
/* ********************START CODE FOR CUSTOMER LEAVES CALCULATION,@AUTHOR:HEMA-16MAY2020********************************************** */
?> 

    <div id="attendanceReportSubDiv">
        <div id="attendanceReportData">
        <table class="width_260mm" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top: 10px;">
<!--            <tr>
                <td align="left" class="" style="color: red;margin-left: 15px;font-size: 15px;">
                    <select class="" style="color: red;font-size: 15px;border-color: white;font-weight: bold;" onchange="AttendanceReport('<?php echo $staffId; ?>', this.value);">
                        <option value="ATTENDANCE_REPORT " class="" style="color: red;font-size: 15px;border-color: white;font-weight: bold;">  
                            ATTENDANCE REPORT 
                        </option>
                    </select>
                </td>
            </tr>-->
            <tr>   
                <!-------START CODE TO SELECT MONTH AND YEAR OPTION TO SHOW ATTENDANCE REPORT,@AUTHOR:HEMA-16MAY2020--------->
                <td align="left" class="" style="color: red;margin-left: 15px;font-size: 15px;font-weight: bold;">
                     ATTENDANCE REPORT 
                    <!-- *************** START CODE FOR MONTH*************** -->
                    <?php
                    if($attendanceReportMonth == 01){
                    $todayMM = date("n", strtotime($current_date)) - 1;
                    }else{
                        $todayMM = ltrim($attendanceReportMonth,0) - 1;
                    }
                    $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC);
                    $arrMM = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
                    $optMonth[$todayMM] = "selected";
                    ?> 
                    <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" />
                    <select id="attendanceReportMonth" name="attendanceReportMonth" 
                            onchange="selattendanceReportMonth('<?php echo $staffId; ?>');"
                            style="color: red;font-size: 15px;font-weight: bold;width: 40px;border: none;"
                            onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('attendanceReportYear').focus();
                                        return false;
                                    } else if (event.keyCode == 8) {
                                        document.getElementById('attendanceReportMonth').focus();
                                        return false;
                                    }
                                    //START CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13
                                    var arrMonths = new Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
                                    gbMonth = document.getElementById('gbMonthId').value;
                                    if (gbMonth == 1) {
                                        if (event.keyCode) {
                                            var sel = String.fromCharCode(event.keyCode);
                                            if (sel == 0)
                                            {
                                                this.value = arrMonths[9];
                                            } else if (sel == 1)
                                            {
                                                this.value = arrMonths[10];
                                            } else if (sel == 2)
                                            {
                                                this.value = arrMonths[11];
                                            }
                                            // this.value = arrMonths[10];
                                            document.getElementById('gbMonthId').value = 0;
                                        }
                                    } else if (event.keyCode) {
                                        var sel = String.fromCharCode(event.keyCode) - 1;
                                        this.value = arrMonths[sel];
                                        if (event.keyCode == 49) {
                                            document.getElementById('gbMonthId').value = 1;
                                        }
                                    }
                            ">
                        <option value="NotSelected" class="itemAddPnLabels12">MONTH</option>
                        <?php
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
////**********************************************************************************************************************************
$queryengmonformat = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'englishMonthformat'";
$engmonformat = mysqli_query($conn, $queryengmonformat);
$rowengmonformat = mysqli_fetch_array($engmonformat);
$englishMonthFormat = $rowengmonformat['omly_value'];
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
////**********************************************************************************************************************************
                for ($mm = 0; $mm <= 11; $mm++) {
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
//************************************************************************************************************************************
                                    if ($englishMonthFormat == 'displayinnumber') {
                                        $engMonth = date('m', strtotime($arrMonths[$mm]));
                                        echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$engMonth</option>";
                                    } else {
                        echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$arrMonths[$mm]</option>";
    }                   
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022**************************
//************************************************************************************************************************************ 
                }
                        ?>
                    </select>
                    <!-- *************** START CODE FOR YEAR********** -->
                    <?php
                    $todayMaxYY = date("Y", strtotime(date("Y-m-d")));
                    if($attendanceReportYear == ''){
                    $todayYear = date("Y", strtotime($current_date));
                    }else{
                       $todayYear = $attendanceReportYear;
                    }
                    $optYear[$todayYear] = "selected";
                    ?> 
                    <select id="attendanceReportYear" name="attendanceReportYear" 
                            onchange="selattendanceReportYear('<?php echo $staffId; ?>');"
                            style="color: red;font-size: 15px;font-weight: bold;width: 40px;border: none;">
                        <option value="NotSelected" class="itemAddPnLabels12">YEAR</option>
                        <?php
//CHANGES IN YEAR FORMAT @author: SANDY6AUG13
                        for ($yy = $todayMaxYY; $yy >= 1900; $yy--) {
                            echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                        }
                        ?>
                    </select>

                </td>
                <!--------END CODE TO SELECT MONTH AND YEAR OPTION TO SHOWATTENDANCE REPORT@AUTHOR:HEMA-16MAY2020------------->
            </tr>
            <tr>
                <td align="center" colspan="7" class="paddingTop4 padBott4">
                    <div class="hrGrey" style="width: 1080px;"></div>
                </td>
            </tr>
        </table>
        <div id="quartelyLeaves" style="margin-left:0px;padding-left:0px;">                               
            <!--<form enctype="multipart/form-data" action="include/php/omaddstaffquarterleaves.php"  method="post">--->
                <table border="0" cellspacing="0" cellpadding="0" align="center" >
                    <tr>
                        <td width="200px" align="center" class="textCalibri12 bold brown">FIRST QUARTER</td>
                        <td width="200px" align="center" class="textCalibri12 bold brown">SECOND QUARTER</td>
                        <td width="200px" align="center" class="textCalibri12 bold brown">THIRD QUARTER</td>
                        <td width="200px" align="center" class="textCalibri12 bold brown">FOURTH QUARTER</td>
                        <td width="200px" align="center" class="textCalibri12 bold brown"></td>
<!--                        <td width="200px" align="center" class="textCalibri12 bold brown"></td>
                        <td width="200px" align="center" class="textCalibri12 bold brown"></td>
                        <td width="200px" align="center" class="textCalibri12 bold brown"></td>-->
                    </tr>
                    <tr>
                        <td style="padding-bottom:5px;">
                            <input id="firstQurterLeaves" name="firstQurterLeaves" placeholder="" value="<?php echo $quarterOneLeaves; ?>"
                                   accept="" onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('secondQurterLeaves').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('firstQurterLeaves').focus();
                                               return false;
                                           }"
                                   type="text" spellcheck="false" class="input_border_grey"
                                   maxlength="50" style="text-transform:uppercase;width: 100%;padding-left: 50%;"/>
                        </td>
                        <td style="padding-bottom:5px;">
                            <input id="secondQurterLeaves" name="secondQurterLeaves" placeholder="" value="<?php echo $quarterTwoLeaves; ?>"
                                   accept="" onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('thirdQurterLeaves').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('firstQurterLeaves').focus();
                                               return false;
                                           }"
                                   type="text" spellcheck="false" class="input_border_grey"
                                   maxlength="50" style="text-transform:uppercase;width: 100%;padding-left: 50%;"/>
                        </td>
                        <td style="padding-bottom:5px;">
                            <input id="thirdQurterLeaves" name="thirdQurterLeaves" placeholder="" value="<?php echo $quarterThreeLeaves; ?>"
                                   accept="" onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('fourthQurterLeaves').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('secondQurterLeaves').focus();
                                               return false;
                                           }"
                                   type="text" spellcheck="false" class="input_border_grey"
                                   maxlength="50" style="text-transform:uppercase;width: 100%;padding-left: 50%;"/>
                        </td>
                        <td style="padding-bottom:5px;">
                            <input id="fourthQurterLeaves" name="fourthQurterLeaves" placeholder="" value="<?php echo $quarterFourLeaves; ?>"
                                   accept="" onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('qurterLeaveSubButton').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('thirdQurterLeaves').focus();
                                               return false;
                                           }"
                                   type="text" spellcheck="false" class="input_border_grey"
                                   maxlength="50" style="text-transform:uppercase;width: 100%;padding-left: 50%;"/>
                        </td>
                        <td width="200px" align="center">
                            <input type="hidden" id="currentYear" name="currentYear" value="<?php echo $current_year; ?>" />
                            <input type="hidden" id="staffId" name="staffId" value="<?php echo $staffId; ?>" />
                            <input type="button" id="qurterLeaveSubButton" name="qurterLeaveSubButton" class="btn btn-success" value="Submit"
                                   onclick="addQuarterlyLeavesOfStaff('<?php echo $staffId; ?>');" style="height:25px;width:120px;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 5px;margin-bottom: 5px;text-align:center;color:white;"/>
                        </td>
<!--                        <td width="200px" align="center" class="textCalibri12 bold brown"></td>
                        <td width="200px" align="center" class="textCalibri12 bold brown"></td>
                        <td width="200px" align="center" class="textCalibri12 bold brown"></td>-->
                    </tr>
                </table>
            <!--</form>-->
        </div>
        <table border="0" cellspacing="0" cellpadding="0" align="center">  
            <tr>
                <td align="center" colspan="8" class="paddingTop4 padBott4">
                    <div class="hrGrey" style="width: 1080px;"></div>
                </td>
            </tr>
            <tr>
                <td width="200px" align="center" class="textCalibri12 bold brown">AVAILABLE LEAVES&nbsp;&nbsp;</td>
                <td width="200px" align="center" class="textCalibri12 bold brown">TOTAL LEAVES&nbsp;&nbsp;</td>
                <td width="200px" align="center" class="textCalibri12 bold brown">REMAINING LEAVES&nbsp;&nbsp;</td>
                <td width="200px" align="center" class="textCalibri12 bold brown">ABSENT&nbsp;&nbsp;</td>
                <td width="200px" align="center" class="textCalibri12 bold brown">WORKING&nbsp;&nbsp;</td>
                <td width="200px" align="center" class="textCalibri12 bold brown">LOP&nbsp;&nbsp;</td>
                <td width="200px" align="center" class="textCalibri12 bold brown">PAYABLE&nbsp;&nbsp;</td>
                <td width="200px" align="center" class="textCalibri12 bold brown">TOTAL WORKING DAY&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td width="200px" align="center" style="padding-bottom:5px;" class="textCalibri12 bold brown"><?php echo $availableLeaves; ?></td>
                <td width="200px" align="center" style="padding-bottom:5px;" class="textCalibri12 bold brown"><?php echo $totalLeaves; ?></td>
                <td width="200px" align="center" style="padding-bottom:5px;" class="textCalibri12 bold brown"><?php echo $remainingLeaves; ?></td>
                <td width="200px" align="center" style="padding-bottom:5px;" class="textCalibri12 bold brown"><?php echo $totalAbsentDay; ?></td>
                <td width="200px" align="center" style="padding-bottom:5px;" class="textCalibri12 bold brown"><?php echo $totalPresentDay; ?></td>
                <td width="200px" align="center" style="padding-bottom:5px;" class="textCalibri12 bold brown"><?php echo $lop; ?></td>
                <td width="200px" align="center" style="padding-bottom:5px;" class="textCalibri12 bold brown"><?php echo $payableDay; ?></td>
                <td width="200px" align="center" style="padding-bottom:5px;" class="textCalibri12 bold brown"><?php echo $totalWorkingDayInMonth; ?></td>
            </tr>
            <tr>
                <td align="center" colspan="8">
                    <div class="hrGrey" style="width: 1080px;"></div>
                </td>
            </tr>
        </table>
        </div>
        <div id="attendanceDetailsSubDiv">
            <?php
            //Data Table Main Columns
            include 'omdatatablesUnset.php';

            mysqli_query($conn, "set @num:=0");
            $dataTableColumnsFields = array(
                //  array('dt' => 'S.NO.'),
                array('dt' => 'MONTH'),
                array('dt' => 'DATE'),
                array('dt' => 'LOGIN TIME'),
                array('dt' => 'LOGOUT TIME'),
//                array('dt' => 'BREAK TIME'),
                array('dt' => 'TOTAL LOGIN TIME'),
                array('dt' => 'PRESENT STATUS'),
                array('dt' => 'HOLIDAY'),
            );
            if ($_SESSION['sessionProdName'] == 'OMRETL')
                array_splice($dataTableColumnsFields, 8, 2);
            $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
//
// Table Parameters
            $_SESSION['tableName'] = 'attendance'; // Table Name
            $_SESSION['tableNamePK'] = 'attend_id'; // Primary Key
// DB Table Columns Parameters
            $dbColumnsArray = array(
                // "attend_id",
                "MONTHNAME(STR_TO_DATE(attend_date ,'%d-%c-%Y'))",
                "STR_TO_DATE(attend_date ,'%d-%c-%Y')",
                //"attend_date",
                "attend_login_time",
                "attend_logout_time",
//                "attend_break_time",
                "attend_total_hrs",
                "attend_del_status",
//                "IF(attend_total_hrs < '240 minute','ABSENT', IF(attend_total_hrs >= '240 minute'  AND attend_total_hrs < '480 minute' ,'HALF DAY',IF(attend_total_hrs >= '480 minute','PRESENT',0)))"   
                "attend_description"
            );
            if ($_SESSION['sessionProdName'] == 'OMRETL')
                array_splice($dbColumnsArray, 8, 2);
            $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
//            if ($_SESSION['sessionProdName'] == 'OMRETL') {
//                $_SESSION['dtSumColumn'] = '6,7,9';
//            } else {
//                $_SESSION['dtSumColumn'] = '6,7,9';
//            }
            $_SESSION['dtSortColumn'] = '0,0';
            $_SESSION['dtDeleteColumn'] = '';
            $_SESSION['dtASCDESC'] = 'desc,desc';

/// Extra direct columns we need pass in SQL Query
            $_SESSION['sqlQueryColumns'] = "attend_id,";
//
//start code to include all session@auth:ATHU29may17
            $_SESSION['colorfulColumn'] = "";
            $_SESSION['colorfulColumnCheck'] = '';
            $_SESSION['colorfulColumnTitle'] = '';
//
// On Click Function Parameters
            $_SESSION['onclickColumnImage'] = "";
            $_SESSION['onclickColumn'] = ""; // On which column
            $_SESSION['onclickColumnId'] = "attend_id";
            $_SESSION['onclickColumnValue'] = "attend_id";
            $_SESSION['onclickColumnFunction'] = "";
            $_SESSION['onclickColumnFunctionPara1'] = "";
            $_SESSION['onclickColumnFunctionPara2'] = "";
            $_SESSION['onclickColumnFunctionPara3'] = "";
            $_SESSION['onclickColumnFunctionPara4'] = "";
            $_SESSION['onclickColumnFunctionPara5'] = "";
            $_SESSION['onclickColumnFunctionPara6'] = "";
//
// Where Clause Condition 
            /* START CONDITION ADDED TO SHOW ATTENDANCE RECORED OF SELECTED MONTH FROM OUTSIDE THE DATATABLE,@AUTHOR:HEMA-16MAY2020 */
            if($attendanceReportMonth != 01 && ($attendanceReportYear != '' || $attendanceReportYear != null)){
            /* END CONDITION ADDED TO SHOW ATTENDANCE RECORED OF SELECTED MONTH FROM OUTSIDE THE DATATABLE,@AUTHOR:HEMA-16MAY2020 */
                $_SESSION['tableWhere'] = "attend_staff_id='$staffId' and attend_date LIKE '%-$attendanceReportMonth-$attendanceReportYear'";  
            }else{
                $_SESSION['tableWhere'] = "attend_staff_id='$staffId' and attend_date<='$current_date' and attend_date LIKE '%-$current_month-%'";
            }
            //Table Joins
            $_SESSION['tableJoin'] = "  JOIN user AS u ON attend_staff_id = u.user_id"
                    . "  JOIN user AS b ON attend_staff_id = b.user_id";

// Data Table Main File
            include 'omdatatables.php';
            ?>  
        </div>
    </div>
</div>
