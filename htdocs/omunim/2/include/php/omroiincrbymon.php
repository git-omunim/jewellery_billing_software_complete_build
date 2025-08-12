<?php

/*
 * Created on OCT 14, 2021 7:22PM
 *
 * @FileName: omroiincrbymon.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: Modified by @Author: DARSHANA 14 OCT 2021
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();
if ($globalProcess != 'YES') {
    $currentFileName = basename(__FILE__);
    include 'system/omsachsc.php';
    require_once 'system/omsgeagb.php';
    require_once 'system/omssopin.php';
} else {
    $conn = $GLOBALS['conn'];
}
require_once 'ommpincr.php';
include_once 'ommpfndv.php';

$ownerId = $_SESSION['sessionOwnerId'];
?>
<?php

//
//********************************************************************************************
//START CODE FOR UPDATE ROI AND IROI OF GIRVI AS PER TIME SLOT : AUTHOR @DARSHANA 18 OCT 2021
//********* ***********************************************************************************
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
$girvId = $_GET['girvId'];
if ($girvId == null || $girvId == '') {
    $girvId = $_GET['girviId'];
}
$currentDate = $TodayDate = strtoupper(date('d M Y'));
if ($girvId != '' && $girvId != NULL) {
    $girv_ROI_Id = '';
    parse_str(getTableValues("SELECT girv_ROI_Id FROM girvi WHERE girv_id='$girvId' AND girv_own_id='$ownerId' AND (girv_updated_roi_DOB != '$TodayDate' OR girv_updated_roi_DOB IS NULL)"));
    $roiId = $girv_ROI_Id;
} else {
    $roiId = '';
}
//
if ($roiId != '' && $roiId != NULL) {
    $selectRoiMonth = "SELECT roi_month, roi_increse_by, roi_comm,roi_value,iroi_value,roi_id FROM roi WHERE roi_id='$roiId' AND roi_own_id='$ownerId'";
} else {
    $selectRoiMonth = "SELECT roi_month, roi_increse_by, roi_comm,roi_value,iroi_value,roi_id FROM roi WHERE roi_own_id='$ownerId'";
}
$queryMonth = mysqli_query($conn, $selectRoiMonth);
while ($resMonth = mysqli_fetch_array($queryMonth, MYSQLI_ASSOC)) {
    $roi_month = $resMonth['roi_month'];
    $roi_id = $resMonth['roi_id'];
    $roi_increse_by = $resMonth['roi_increse_by'];
    $roi_comm = $resMonth['roi_comm'];
    $roi_value = $resMonth['roi_value'];
    $iroi_value = $resMonth['iroi_value'];
    //
    $monthArray = explode("#", $roi_month);
    //
    $time_slot_1 = $monthArray[0];
    $time_slot_2 = $monthArray[1];
    $time_slot_3 = $monthArray[2];
    $time_slot_4 = $monthArray[3];
    //
    $increse_by = explode("#", $roi_increse_by);
    $increse_by_1 = $increse_by[0];
    $increse_by_2 = $increse_by[1];
    $increse_by_3 = $increse_by[2];
    $increse_by_4 = $increse_by[3];
    //
    $arrayRecuroiroi = explode('#', $roi_comm);
    //
    $recurssing = $arrayRecuroiroi[0];
    $roi = $arrayRecuroiroi[1];
    $iroi = $arrayRecuroiroi[2];
    //
    if ($girvId != '' && $girvId != NULL) {
        $selectLoandate = "SELECT girv_DOB,girv_ROI,girv_IROI,girv_updated_roi_DOB,girv_ROI_Id FROM girvi WHERE (girv_omprocess_date='' OR girv_omprocess_date IS NULL OR girv_omprocess_date!='$todayOmprocessDate') AND girv_id='$girvId' AND girv_own_id='$ownerId'";
    } else {
        $selectLoandate = "SELECT girv_DOB,girv_ROI,girv_IROI,girv_updated_roi_DOB,girv_ROI_Id FROM girvi WHERE (girv_omprocess_date='' OR girv_omprocess_date IS NULL OR girv_omprocess_date!='$todayOmprocessDate') AND girv_own_id='$ownerId'  ORDER BY girv_id DESC LIMIT 0,50";
    }
    //
    //echo '$selectLoandate : '.$selectLoandate.'<br><br>';
    //
    $queryLoanDate = mysqli_query($conn, $selectLoandate);
    //
    while ($resSelectRoi = mysqli_fetch_array($queryLoanDate, MYSQLI_ASSOC)) {
        $girv_DOB = $resSelectRoi['girv_DOB'];
        $girv_updated_roi_DOB = $resSelectRoi['girv_updated_roi_DOB'];
        if ($girvId == '' || $girvId == NULL) {
            $girv_id = $resSelectRoi['girv_id'];
        } else {
            $girv_id = $girvId;
        }

         $girv_ROI = $resSelectRoi['girv_ROI'];
        $girv_IROI = $resSelectRoi['girv_IROI'];
        $girv_ROI_Id = $resSelectRoi['girv_ROI_Id'];
        $date_diff = abs(strtotime($currentDate) - strtotime($girv_DOB));

        //start code to calculate month
        $todaysDate = date('d M Y');
        //
        if($nepaliDateIndicator == 'YES'){
            $day =  substr($girv_DOB, 0, 2);
            $selMnth = substr($girv_DOB, 3, -5);
            $year_en = substr($girv_DOB, -4);
            if (preg_match("/^(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)$/", $selMnth)) {
            $selMnth = (int) date('m', strtotime($selMnth));
            } 
            $startdate = $nepali_date->validate_en($year_en, $selMnth, $day);
            if ($startdate != '1' || $startdate != 'TRUE') {
                $eng_date = $nepali_date->get_eng_date($year_en, $selMnth, $day);
                $girviDOB1 = $eng_date['d'] . ' '.$eng_date['m'] .' '.$eng_date['y'];
            }else{
                $girviDOB1 = $girv_DOB;
            }    
            
            $diff = $todaysDate - $girviDOB1;
            $years = floor($diff / 365);
            $remainingDays = $diff % 365;
            $months = floor($remainingDays / 30);
            $days = $remainingDays % 30;
        }else{
        // Convert to DateTime objects
        $datetime1 = new DateTime($girv_DOB);
        $datetime2 = new DateTime($todaysDate);
        // Calculate the difference
        $interval = $datetime1->diff($datetime2);
        // Get the total number of years and months
        $years = $interval->y;
        $months = $interval->m + ($years * 12); 
        }
        
        //end code to calculate month
        //
        //FOR TIME SLOT 1
        //
        if ($girv_ROI_Id == $roi_id) {
            if (($months == $time_slot_1 || $months >= $time_slot_1) && ($months < $time_slot_2 || $time_slot_2 == null || $time_slot_2 == 0) && ($months != '' && $months != NULL && $months != 0) && ($time_slot_1 != '' && $time_slot_1 != NULL && $time_slot_1 != 0)) {
                $selectGirviDeposit = "SELECT * FROM girvi_money_deposit WHERE girv_mondep_girv_id='$girv_id' AND girv_mondep_own_id='$ownerId' "
                        . " AND girv_mondep_date BETWEEN '$girv_DOB' AND '$currentDate'";

                $queryGirviDeposit = mysqli_query($conn, $selectGirviDeposit);
                $rowGorviDeposit = mysqli_num_rows($queryGirviDeposit);
                $resGirviDeposit = mysqli_fetch_array($queryGirviDeposit, MYSQLI_ASSOC);

                if ($rowGorviDeposit <= 0) {

                    if ($roi == 'roi') {
                        $updateRoi = $roi_value + $increse_by_1;
//                    echo '$updateRoi=' . $updateRoi;
                        $updateGirviRoi_time_slot_1 = "UPDATE girvi SET girv_ROI='$updateRoi',girv_updated_roi_DOB='$TodayDate' "
                                . "WHERE girv_id='$girv_id' AND girv_own_id='$ownerId'";
                        mysqli_query($conn, $updateGirviRoi_time_slot_1);
                    }
                    if ($iroi == 'iroi') {
                        $updateIRoi = $iroi_value + $increse_by_1;
                        $updateGirviIRoi_time_slot_1 = "UPDATE girvi SET girv_IROI='$updateIRoi',girv_updated_roi_DOB='$TodayDate' "
                                . "WHERE girv_id='$girv_id' AND girv_own_id='$ownerId'";
                        mysqli_query($conn, $updateGirviIRoi_time_slot_1);
                    }
                }
            }
            //FOR TIME SLOT 2
            else if (($months == $time_slot_2 || $months >= $time_slot_2) && ($months < $time_slot_3 || $time_slot_3 == null || $time_slot_3 == 0) && ($months != '' && $months != NULL && $months != 0) && ($time_slot_2 != '' && $time_slot_2 != NULL && $time_slot_2 != 0)) {
                $selectGirviDeposit = "SELECT * FROM girvi_money_deposit WHERE girv_mondep_girv_id='$girv_id' AND girv_mondep_own_id='$ownerId' "
                        . " AND girv_mondep_date BETWEEN '$girv_DOB' AND '$currentDate'";

                $queryGirviDeposit = mysqli_query($conn, $selectGirviDeposit);
                $rowGorviDeposit = mysqli_num_rows($queryGirviDeposit);
                $resGirviDeposit = mysqli_fetch_array($queryGirviDeposit, MYSQLI_ASSOC);

                if ($rowGorviDeposit <= 0) {

                    if ($roi == 'roi') {
                        $updateRoi_2 = $roi_value + $increse_by_1 + $increse_by_2;
                        $updateGirviRoi_time_slot_2 = "UPDATE girvi SET girv_ROI='$updateRoi_2',girv_updated_roi_DOB='$TodayDate' "
                                . "WHERE girv_id='$girv_id' AND girv_own_id='$ownerId'";

                        mysqli_query($conn, $updateGirviRoi_time_slot_2);
                    }
                    if ($iroi == 'iroi') {
                        $updateIRoi_2 = $iroi_value + $increse_by_1 + $increse_by_2;

                        $updateGirviIRoi_time_slot_2 = "UPDATE girvi SET girv_IROI='$updateIRoi_2',girv_updated_roi_DOB='$TodayDate' "
                                . "WHERE girv_id='$girv_id' AND girv_own_id='$ownerId'";

                        mysqli_query($conn, $updateGirviIRoi_time_slot_2);
                    }
                }
            }
            //FOR TIME SLOT 3
            else if (($months == $time_slot_3 || $months >= $time_slot_3) && ($months < $time_slot_4 || $time_slot_4 == null || $time_slot_4 == 0) && ($months != '' && $months != NULL && $months != 0) && ($time_slot_3 != '' && $time_slot_3 != NULL && $time_slot_3 != 0)) {
                $selectGirviDeposit = "SELECT * FROM girvi_money_deposit WHERE girv_mondep_girv_id='$girv_id' AND girv_mondep_own_id='$ownerId' "
                        . " AND girv_mondep_date BETWEEN '$girv_DOB' AND '$currentDate'";

                $queryGirviDeposit = mysqli_query($conn, $selectGirviDeposit);
                $rowGorviDeposit = mysqli_num_rows($queryGirviDeposit);
                $resGirviDeposit = mysqli_fetch_array($queryGirviDeposit, MYSQLI_ASSOC);

                if ($rowGorviDeposit <= 0) {

                    if ($roi == 'roi') {
                        $updateRoi_3 = $roi_value + $increse_by_1 + $increse_by_2 + $increse_by_3;

                        $updateGirviRoi_time_slot_3 = "UPDATE girvi SET girv_ROI='$updateRoi_3',girv_updated_roi_DOB='$TodayDate' "
                                . "WHERE girv_id='$girv_id' AND girv_own_id='$ownerId'";

                        mysqli_query($conn, $updateGirviRoi_time_slot_3);
                    }
                    if ($iroi == 'iroi') {
                        $updateIRoi_3 = $iroi_value + $increse_by_1 + $increse_by_2 + $increse_by_3;

                        $updateGirviIRoi_time_slot_3 = "UPDATE girvi SET girv_IROI='$updateIRoi_3',girv_updated_roi_DOB='$TodayDate' "
                                . "WHERE girv_id='$girv_id' AND girv_own_id='$ownerId'";

                        mysqli_query($conn, $updateGirviIRoi_time_slot_3);
                    }
                }
            }
            //FOR TIME SLOT 4
            else if (($months == $time_slot_4 || $months >= $time_slot_4) && ($months != '' && $months != NULL && $months != 0) && ($time_slot_4 != '' && $time_slot_4 != NULL && $time_slot_4 != 0)) {
                $selectGirviDeposit = "SELECT * FROM girvi_money_deposit WHERE girv_mondep_girv_id='$girv_id' AND girv_mondep_own_id='$ownerId' "
                        . " AND girv_mondep_date BETWEEN '$girv_DOB' AND '$currentDate'";

                $queryGirviDeposit = mysqli_query($conn, $selectGirviDeposit);
                $rowGorviDeposit = mysqli_num_rows($queryGirviDeposit);
                $resGirviDeposit = mysqli_fetch_array($queryGirviDeposit, MYSQLI_ASSOC);

                if ($rowGorviDeposit <= 0) {

                    if ($roi == 'roi') {
                        $updateRoi_4 = $roi_value + $increse_by_1 + $increse_by_2 + $increse_by_3 + $increse_by_4;

                        $updateGirviRoi_time_slot_4 = "UPDATE girvi SET girv_ROI='$updateRoi_4',girv_updated_roi_DOB='$TodayDate' "
                                . "WHERE girv_id='$girv_id' AND girv_own_id='$ownerId'";

                        mysqli_query($conn, $updateGirviRoi_time_slot_4);
                    }
                    if ($iroi == 'iroi') {
                        $updateIRoi_4 = $iroi_value + $increse_by_1 + $increse_by_2 + $increse_by_3 + $increse_by_4;

                        $updateGirviIRoi_time_slot_4 = "UPDATE girvi SET girv_IROI='$updateIRoi_4',girv_updated_roi_DOB='$TodayDate' "
                                . "WHERE girv_id='$girv_id' AND girv_own_id='$ownerId'";

                        mysqli_query($conn, $updateGirviIRoi_time_slot_4);
                    }
                }
            } else {
                $updateGirviRoi_time_slot_4 = "UPDATE girvi SET girv_ROI='$roi_value'"
                        . "WHERE girv_id='$girv_id' AND girv_own_id='$ownerId'";

                mysqli_query($conn, $updateGirviRoi_time_slot_4);

                $updateGirviRoi_time_slot_4 = "UPDATE girvi SET girv_IROI='$iroi_value'"
                        . "WHERE girv_id='$girv_id' AND girv_own_id='$ownerId'";

                mysqli_query($conn, $updateGirviRoi_time_slot_4);
            }
            //
            $todayOmprocessDate = date("Y-m-d");
            //
            $qUpdateGirvProcessDate = "UPDATE girvi SET girv_omprocess_date='$todayOmprocessDate' WHERE girv_id='$girv_id' AND girv_own_id='$ownerId'";
            //
            if (!mysqli_query($conn, $qUpdateGirvProcessDate)) {
                die('Error: ' . mysqli_error($conn));
            }
            //
        }
    }
}
//********************************************************************************************
//END CODE FOR UPDATE ROI AND IROI OF GIRVI AS PER TIME SLOT : AUTHOR @DARSHANA 18 OCT 2021
//********************************************************************************************
//
?>

