<?php
/*
 * Created on Mar 19, 2011 11:53:24 PM
 *
 * @FileName: ormlttam.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
//changes in file @AUTHOR: SANDY27DEC13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';
require_once 'nepal/nepali-date.php';
    $nepali_date = new nepali_date();
?>
<?php
$ownerId = $_SESSION[sessionOwnerId];

$arrLeapYear = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
$arrYear = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

$years = 0;
$month = 0;
$days = 0;

$interest = 0;
//Start Code to check LOAN Release Details Option
if ($grvRelPayDetails == NULL || $grvRelPayDetails == '') {
    $grvRelPayDetails = trim($_POST['grvRelPayDetails']);
}
if ($grvRelPayDetails == NULL || $grvRelPayDetails == '') {
    $grvRelPayDetails = trim($_GET['grvRelPayDetails']);
}
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//End Code to check LOAN Release Details Option
if ($ROI == '' or $ROI == NULL) {
    $ROIValue = trim($_POST['ROIValue']);

    //    if ($ROIValue) { line commented @Author:PRIYA16MAR15
    if ($ROIValue != '' || $ROIValue != 0) { // line added @Author:PRIYA16MAR15
        $ROI = $ROIValue;
        if ($_POST['girviAddROINotChange'] == 'No') {
            $addPrinROIOpt = '';
        } else if ($_POST['girviAddROINotChange'] == 'Yes') {
            $addPrinROIOpt = $ROI;
        }
        $princAmount = trim($_POST['princAmount']);
        $ROIType = trim($_POST['interestType']);
        $girviNewDOB = trim($_POST['girviDate']);
        $girviId = trim($_POST['girviId']);
        $custId = trim($_POST['custId']);
        $girviType = trim($_POST['girviType']);
        $releaseDateDD = trim($_POST['relDateDDValue']);
        $releaseDateMM = trim($_POST['relDateMMValue']);
        $releaseDateYY = trim($_POST['relDateYYValue']);
        $girviUpdSts = trim($_POST['girviStatus']);
        $omPanelDiv = trim($_POST['omPanelDiv']);
        $girviIntOpt = trim($_POST['simpleOrCompIntOption']);
        $girviIntCompoundedOpt = trim($_POST['girviCompoundedOption']);
        $loanId = $girviId;
        $mlId = $custId; //assign custId to mlId @AUTHOR: SANDY30NOV13
    }
}
//$mlId = $custId;
if ($girviUpdSts == 'New') {
    $girviUpdSts = 'ACTIVE';
}
if (!$changeRelDateOpt) {
// Start Code to get LOAN Release Date 
    $qSelDORGirvi = "SELECT ml_DOR FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_lender_id='$mlId' and ml_id='$girviId' and ml_upd_sts='Released'";
    $resDORGirvi = mysqli_query($conn,$qSelDORGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelDORGirvi);
    $rowDORGirvi = mysqli_fetch_array($resDORGirvi, MYSQLI_ASSOC);
    $girviDOR = $rowDORGirvi['ml_DOR'];
// End Code to get LOAN Release Date 
}
if (!$girviDOR) {
    $girviDOR = $releaseDateDD . ' ' . $releaseDateMM . ' ' . $releaseDateYY;
    //echo 'girviDOR:' . $girviDOR; 
}

if ($gMonthIntOption == '' || $gMonthIntOption == NULL) {         // Full or Half or 7 Days or Default option
    $gMonthIntOption = trim($_POST['gMonthIntOption']);
    if ($gMonthIntOption == '' || $gMonthIntOption == NULL) {
        $gMonthIntOption = $rowAllGirvi['girv_monthly_intopt'];
        if ($gMonthIntOption == '' || $gMonthIntOption == NULL) {
            $qSelectROI = "SELECT ml_monthly_intopt FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_lender_id='$custId' and ml_id='$girviId'";
            $resultROI = mysqli_query($conn,$qSelectROI) or die("Error: " . mysqli_error($conn) . " with query " . $qSelectROI);
            $rowMonthlyIntOpt = mysqli_fetch_array($resultROI, MYSQLI_ASSOC);

            $gMonthIntOption = $rowMonthlyIntOpt['girv_monthly_intopt'];
        }
        if ($gMonthIntOption == '' || $gMonthIntOption == NULL) {
            $qSelectROI = "SELECT roi_monthly_opt FROM roi where roi_id='1' and roi_own_id='$ownerId'"; //To display data in this form
            $resultROI = mysqli_query($conn,$qSelectROI) or die("Error: " . mysqli_error($conn) . " with query " . $qSelectROI);
            $rowMonthlyIntOpt = mysqli_fetch_array($resultROI, MYSQLI_ASSOC);

            $gMonthIntOption = $rowMonthlyIntOpt['roi_monthly_opt'];
        }
        if ($gMonthIntOption == '') {
            $gMonthIntOption = 'FM';
        }
    }
}
//echo 'gMonthIntOption:' .$gMonthIntOption;
//if ($checkGirviPrincipalFile != 'Yes') {
//  include 'ormlpafc.php'; //change in filename @AUTHOR: SANDY20NOV13
//}
if ($nepaliDateIndicator == 'YES') {
     if ($girviNewDOB != '' || $girviNewDOB != null || $girviNewDOB != 'NULL') {
//
         $dateComp = explode(' ',$girviNewDOB);
         if(count($dateComp) == 1){
            $dateComp = explode('-',$girviNewDOB); 
         }
        $day_en = $dateComp[0];
        $selMnth = $dateComp[1];
        $year_en = $dateComp[2];
        if (preg_match("/^(JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC|Aug|Jan|Feb|Mar|Apr|May|Jun|Jul|Sep|Oct|Nov|Dec)$/", $selMnth)) {
            // Convert the month abbreviation to its numeric representation (zero-padded)
            $selMnth = date('m', strtotime($selMnth));
        }
        if(!is_numeric($selMnth)){
            $selMnth = $nepali_date->get_nepali_month_number($selMnth);
        }
            $girviDOBDate = $nepali_date->validate_en($year_en, $selMnth, $day_en);
            
            if ($girviDOBDate != '1' || $girviDOBDate != 'TRUE') {
               
                $date_ne = $nepali_date->get_eng_date($year_en, $selMnth, $day_en);
                $girviNewDOB = $date_ne[d] . '-' . $date_ne[m] . '-' . $date_ne[y];
                $girviDOBPrint = $date_ne[d] . ' ' . $date_ne[m] . ' ' . $date_ne[y];
            }

            $day_en = substr($girviNewDOB, 0, 2);
            $selMnth = substr($girviNewDOB, 3, -5);
            $year_en = substr($girviNewDOB, -4);
            $girviDD = $day_en;
            $girviMM = $selMnth;
            $girviYY = $year_en;
        
    }else{
       $girviDOBPrint = $girviNewDOB;
    $girviNewDOB = $girviNewDOB;
    $girviDD = substr($girviNewDOB, 0, 2);
    $girviMM = substr($girviNewDOB, 3, -5);
    $girviYY = substr($girviNewDOB, -4); 
    } 
    
}else{
    $girviDOBPrint = date('d M Y', strtotime($girviNewDOB));
$girviNewDOB = date('d-m-Y', strtotime($girviNewDOB));

$girviDD = date('d', strtotime($girviNewDOB));
$girviMM = date('m', strtotime($girviNewDOB));
$girviYY = date('Y', strtotime($girviNewDOB));
}
//$girviMainYY = date('Y', strtotime($girviNewDOB));
//
//
//Start Code to check interest days calculation by 30 day or default
$loanDaysOpt = NULL; //Check calculate for 30 days or default
$selLoanDaysOpt = "SELECT omly_value FROM omlayout WHERE omly_option = 'loanDaysOpt'";
$resLoanDaysOpt = mysqli_query($conn,$selLoanDaysOpt);
$rowLoanDaysOpt = mysqli_fetch_array($resLoanDaysOpt);
$loanDaysOpt = $rowLoanDaysOpt['omly_value'];
//End Code to check interest days calculation by 30 day or default
//
$selFormsLayoutDet = "SELECT omly_value FROM omlayout WHERE omly_option = 'lastDayInt'";
$resFormsLayoutDet = mysqli_query($conn,$selFormsLayoutDet);
$rowFormsLayoutDet = mysqli_fetch_array($resFormsLayoutDet);
$lastDayInt = $rowFormsLayoutDet['omly_value'];

/** * *************************************************************************************************** */
/*                                      Start Code for TIME ZONE for Remote Server                       */
/** * *************************************************************************************************** */
if ($changeRelDateOpt) {
    $girviDOR = $releaseDateDD . ' ' . $releaseDateMM . ' ' . $releaseDateYY;
}

if (trim($girviDOR) == '' or $girviDOR == NULL) {
    if ($lastDayInt == 'YES' || ($girviNewDOB == date('d-m-Y'))) { //Calculate Last Day INT
        $todayDatePrint = date('d M Y');
    } else if ($lastDayInt == 'NO' && $loanDaysOpt != '30days') { //Donot Include Last Day INT
        $todayDatePrint = date('d M Y', strtotime('-1 day'));
    } else {
        $todayDatePrint = date('d M Y');
    }
    $todayDate = date('d-m-Y');
} else {
    if ($lastDayInt == 'YES') { //Calculate Last Day INT
        if ($nepaliDateIndicator == 'YES') {
            $todayDatePrint = $girviDOR;
        } else {
            $todayDatePrint = date('d M Y', strtotime($girviDOR));
        }
    } else if ($lastDayInt == 'NO' && $loanDaysOpt != '30days') { //Donot Include Last Day INT
        $todayDatePrint = date('d M Y', strtotime('-1 day')); //change in line @AUTHOR: SANDY15JAN14
    } else {
        if ($nepaliDateIndicator == 'YES') {
            $todayDatePrint = $girviDOR;
        } else {
            $todayDatePrint = date('d M Y', strtotime($girviDOR));
        }
    }
    if ($nepaliDateIndicator == 'YES') {
         $day_en = substr($girviDOR, 0, 2);
                        $selMnth = substr($girviDOR, 3, -5);
//                        $month_en = date("m", strtotime($selMnth));
                        $year_en = substr($girviDOR, -4);
        if (preg_match("/^(JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC|Aug|Jan|Feb|Mar|Apr|May|Jun|Jul|Sep|Oct|Nov|Dec)$/", $selMnth)) {
            // Convert the month abbreviation to its numeric representation (zero-padded)
            $selMnth = date('m', strtotime($selMnth));
        }
        if(!is_numeric($selMnth)){
            $selMnth = $nepali_date->get_nepali_month_number($selMnth);
        }
        $girviDOBDate = $nepali_date->validate_en($year_en, $selMnth, $day_en);
        if ($girviDOBDate != '1' || $girviDOBDate != 'TRUE') {
            $date_ne = $nepali_date->get_eng_date($year_en, $selMnth, $day_en);
                $girviDOR = $date_ne[d] . '-' . $date_ne[m] . '-' . $date_ne[y];
            }
            $todayDate = $girviDOR;
        } else {
            $todayDate = date('d-m-Y', strtotime($girviDOR));
        }
  
}

/** * *************************************************************************************************** */
/*                                      End Code for TIME ZONE for Remote Server                         */
/** * *************************************************************************************************** */
if ($nepaliDateIndicator == 'YES') {
    if ($girviDOR == '  ' || $girviDOR == NULL || $girviDOR == '') {
//
        $todayDD = date('d', strtotime("now"));
        $todayMM = date('m', strtotime("now"));
        $todayYY = date('Y', strtotime("now"));
    } else {
        if ($nepaliDateIndicator == 'YES') {
            if ($loanType == 'TransLoan' && $_REQUEST['prinType'] != 'MainLoan') {
                $day_en = substr($girviDOR, 0, 2);
                $selMnth = substr($girviDOR, 3, -5);
                $year_en = substr($girviDOR, -4);
                //
                if (preg_match("/^(JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC|Aug|Jan|Feb|Mar|Apr|May|Jun|Jul|Sep|Oct|Nov|Dec)$/", $selMnth)) {
                    // Convert the month abbreviation to its numeric representation (zero-padded)
                    $selMnth = date('m', strtotime($selMnth));
                }
                $girviDOBDate = $nepali_date->validate_en($year_en, $selMnth, $day_en);
                if ($girviDOBDate != '1' || $girviDOBDate != 'TRUE') {
                    $date_ne = $nepali_date->get_eng_date($year_en, $selMnth, $day_en);
//                            print_r($date_ne);
                    $todayDD = $date_ne[d];
                    $todayMM = $date_ne[m];
                    $todayYY = $date_ne[y];
                } else {
                    $todayDD = $day_en;
                    $todayMM = $selMnth;
                    $todayYY = $year_en;
                }
            } else {
                $todayDD = substr($girviDOR, 0, 2);
                $todayMM = substr($girviDOR, 3, -5);
                $todayYY = substr($girviDOR, -4);
            }
        } else {
            $todayDD = substr($girviDOR, 0, 2);
            $todayMM = substr($girviDOR, 3, -5);
            $todayYY = substr($girviDOR, -4);
        }
    }
} else {
if ($girviDOR == '' or $girviDOR == NULL) {
    $todayDD = date('d', strtotime("now"));
    $todayMM = date('m', strtotime("now"));
    $todayYY = date('Y', strtotime("now"));
} else {
    $todayDD = date('d', strtotime($girviDOR));
    $todayMM = date('m', strtotime($girviDOR));
    $todayYY = date('Y', strtotime($girviDOR));
}
}
$totalNoOfDays = (strtotime($todayDate) - strtotime($girviNewDOB)) / 86400;

if ($lastDayInt == 'YES') {
    $totalNoOfDays = om_round($totalNoOfDays) + 1;
} else {
    $totalNoOfDays = om_round($totalNoOfDays);
}

//$totalNoOfDays = om_round($totalNoOfDays) + 1;


$totalLeftDays = $totalNoOfDays;

if ($totalNoOfDays == 0) {
    //echo 'totalNoOfDays:'.$totalNoOfDays;
    $todayDate = $girviNewDOB;
    $todayYY = $girviYY;
    $todayMM = $girviMM;
    $todayDD = $girviDD;
    $todayDatePrint = $girviDOBPrint;
}

if ($totalNoOfDays < 0) {
    ?>
    <table border="0" cellpadding="2" cellspacing="2" width="100%">
        <tr>
            <td align="center" valign="top" class="main_link_red">
                Please Select Correct Release Date!
            </td>
        </tr>
    </table>
    <?php
} else {

    //Start Code to Calculate Dates Difference
    $startDate = array('year' => $girviYY, 'month' => $girviMM, 'day' => $girviDD);
    $endDate = array('year' => $todayYY, 'month' => $todayMM, 'day' => $todayDD);

    include 'ommpdtdf.php';

    $years = $totalYears;
    $month = $totalMonths;
    /*     * *Start to add code to take default value of last day int @AUTHOR: SANDY21JAN14**** */
    if ($lastDayInt == 'YES') {
        $days = $totalDays + 1;
    } if ($lastDayInt == 'NO') {
        $days = $totalDays;
    } else {
        $days = $totalDays + 1;
    }
    /*     * *End to add code to take default value of last day int @AUTHOR: SANDY21JAN14**** */


    //Start Code to check interest days calculation by 30 day or default
    if ($loanDaysOpt == '30days') {
        if ($girviDD > $todayDD && ($todayMM == '01' || $todayMM == '02' || $todayMM == '04' || $todayMM == '06' || $todayMM == '08' || $todayMM == '09' || $todayMM == '11')) {
            $days = $days - 1;
        } else if ($girviDD == '31') {
            $days = $days - 1;
        } else if ($girviDD > $todayDD && ($todayMM == '03') && $girviDD != '30') {
            $days = $days + 2;
        }
    }
    //End Code to check interest days calculation by 30 day or default
    //echo 'days:' . $days;
    if (($days >= 28) && ($girviDD == '01') && ($todayMM == '02') && ($todayYY % 4 != 0)) {
        $month++;
        $days = $days - 28;
    } else if (($days >= 28) && ($girviDD != '01') && ($todayDD == '28') && ($todayMM == '02') && ($todayYY % 4 != 0)) {
        $month++;
        $days = $days - 28;
    } else if (($days == 28) && ($girviMM == '02') && ($girviDD != '01') && ($todayMM == '03') && ($todayYY % 4 != 0)) {
        $month++;
        $days = 0;
    } else if (($days >= 29) && ($todayMM == '02') && ($todayYY % 4 == 0)) {
        $month++;
        $days = $days - 29;
    } else if (($days == 29) && ($girviMM == '02') && ($girviDD != '01') && ($todayMM == '03') && ($todayYY % 4 == 0)) {
        $month++;
        $days = 0;
    } else if (($days == 30) && ($todayMM == '04' || $todayMM == '06' || $todayMM == '11') && ($girviDD == '01')) {
        $month++;
        $days = 0;
    } else if (($days == 30) && ($todayMM == '05' || $todayMM == '07' || $todayMM == '10' || $todayMM == '12') && ($girviDD != '01')) {
        if ($girviDD == '02') {
            if ($todayDD == '01') {
                $month++;
                $days = 0;
            }
        } else {
            $month++;
            $days = 0;
        }
    } else if (($days == 31)) {
        $month++;
        $days = 0;
    }
    if ($month == 12) {
        $years++;
        $month = 0;
    }
    //End Code to Calculate Dates Difference
    //echo $years . " Years " . $month . " Months " . $days . " Days";
    //Set Year Month Days for Print

    $yearPrint = $years;
    $monthPrint = $month;
    $daysPrint = $days;

    $girviTimePeriodVar = '';
    if ($years > 1) {
        $girviTimePeriodVar = $years . " YY ";
    } else if ($years == 1) {
        $girviTimePeriodVar .= $years . " YY ";
    }
    if ($month > 1) {
        $girviTimePeriodVar .= $month . " MM ";
    } else if ($month == 1) {
        $girviTimePeriodVar .= $month . " MM ";
    }
    if ($days > 1) {
        $girviTimePeriodVar .= $days . " DD";
    }
    if ($days == 1 || $days == 0) {
        $girviTimePeriodVar .= $days . " DD";
    }
    if ($totalNoOfDays <= 0) {
        $girviTimePeriodVar .= $days . " DD";
    }
    ?>
    <!--START GIRVI TIME PERIOD -->
    <input id="girviTimePeriodVar" name="girviTimePeriodVar" value="<?php echo $girviTimePeriodVar; ?>" type="hidden" />
    <!--END GIRVI GIRVI TIME PERIOD -->


    <?php
    if ($todayYY % 400 == 0 || ($todayYY % 4 == 0 && $todayYY % 100 != 0)) {
        $noOfDaysInMM = $arrLeapYear[$todayMM - 1];
    } else {
        $noOfDaysInMM = $arrYear[$todayMM - 1];
    }

    if ($loanDaysOpt == '30days') {
        $noOfDaysInMM = 30;
    }
    //End Code to check interest days calculation by 30 day or default

    if ($girviIntOpt != 'Compound') {
        //Start Code to calculate Simple Interest
        if ($ROIType == 'Monthly') {
            $perYearInt = (($princAmount * $ROI) / 100) * 12;
            $perMonthInt = ($princAmount * $ROI) / 100;
            $perDayInt = ($princAmount * ($ROI / $noOfDaysInMM)) / 100;
        } else if ($ROIType == 'Annually') {
            $perDayIntAnnually = ($princAmount * ($ROI / 365)) / 100; //LOVE05MAR2013
        }

        if ($ROIType == 'Monthly') {

            $interest = $perYearInt * $years;

            include 'olggmpin.php'; //change in filename @AUTHOR: SANDY20NOV13
        } else if ($ROIType == 'Annually') { //LOVE05MAR2013
            if ($gMonthIntOption == 'FM') {             //Full Month Interest
                $totalNoOfDays = $totalNoOfDays - $days + 30;
                $interest = $perDayIntAnnually * $totalNoOfDays;
            } else if ($gMonthIntOption == 'HM') {      //Half Month Interest
                if ($days > 15) {
                    $totalNoOfDays = $totalNoOfDays - $days + 30;
                    $interest = $perDayIntAnnually * $totalNoOfDays;
                } else {
                    $totalNoOfDays = $totalNoOfDays - $days + 15;
                    $interest = $perDayIntAnnually * $totalNoOfDays;
                }
            } else if ($gMonthIntOption == '7D') {      //7 Days Interest
                if ($days > 21) {
                    $totalNoOfDays = $totalNoOfDays - $days + 30;
                    $interest = $perDayIntAnnually * $totalNoOfDays;
                } else if ($days > 14) {
                    $totalNoOfDays = $totalNoOfDays - $days + 21;
                    $interest = $perDayIntAnnually * $totalNoOfDays;
                } else if ($days > 7) {
                    $totalNoOfDays = $totalNoOfDays - $days + 14;
                    $interest = $perDayIntAnnually * $totalNoOfDays;
                } else {
                    $totalNoOfDays = $totalNoOfDays - $days + 7;
                    $interest = $perDayIntAnnually * $totalNoOfDays;
                }
            } else {      //Default Days Interest
                $interest = $perDayIntAnnually * $totalNoOfDays;
            }
        }
        //End Code to calculate Simple Interest
    } else if ($girviIntOpt == 'Compound') {
        //Start Code to calculate Compound Interest
        if ($ROIType == 'Monthly') {
            $ROI = $ROI * 12;
        }
        if ($girviIntCompoundedOpt == 'After3Y') {
            if ($years >= 3) {
                $newYears = $years - 3;
                $finalAmount = $princAmount * ($ROI / 100) * 3;
            } else if ($years == 1 || $years == 2) {
                $newYears = $years;
                $finalAmount = 0;
            } else if ($years <= 0) {
                $newYears = 0;
                $finalAmount = 0;
            }
            $newPrincAmt = $princAmount + $finalAmount;
            $finalAmount = $newPrincAmt * pow(( 1 + ($ROI / 100)), $newYears);
            $interest = om_round($finalAmount) - $princAmount; //Int calculated for years
        } else if ($girviIntCompoundedOpt == 'BiYearly') {
            if ($years >= 2) {
                $newYears = $years - 2;
                $finalAmount = $princAmount * ($ROI / 100) * 2;
            } else if ($years == 1) {
                $newYears = $years;
                $finalAmount = 0;
            } else if ($years <= 0) {
                $newYears = 0;
                $finalAmount = 0;
            }
            $newPrincAmt = $princAmount + $finalAmount;
            $finalAmount = $newPrincAmt * pow(( 1 + ($ROI / 100)), $newYears);
            $interest = om_round($finalAmount) - $princAmount; //Int calculated for years
        } else if ($girviIntCompoundedOpt == 'Yearly') {
            $finalAmount = $princAmount * pow(( 1 + ($ROI / 100)), $years);
            $interest = om_round($finalAmount) - $princAmount; //Int calculated for years
        } else if ($girviIntCompoundedOpt == 'HalfYearly') {
            $finalAmount = $princAmount * pow(( 1 + ($ROI / (2 * 100))), 2 * $years);
            $interest = om_round($finalAmount) - $princAmount; //Int calculated for years
            if ($month >= 6) {
                $newInterest = $finalAmount * ($ROI / (12 * 100)) * 6;
                $finalAmount = $finalAmount + om_round($newInterest);
                $interest += om_round($newInterest);
                $month = $month - 6;
            }
        } else if ($girviIntCompoundedOpt == 'Quarterly') {
            $finalAmount = $princAmount * pow(( 1 + ($ROI / (4 * 100))), 4 * $years);
            $interest = om_round($finalAmount) - $princAmount; //Int calculated for years
            while ($month >= 3) {
                $newInterest = $finalAmount * ($ROI / (12 * 100)) * 3;
                $finalAmount = $finalAmount + om_round($newInterest);
                $interest += om_round($newInterest);
                $month = $month - 3;
            }
        } else if ($girviIntCompoundedOpt == 'Monthly') {
            $finalAmount = $princAmount * pow(( 1 + ($ROI / (12 * 100))), 12 * $years);
            $interest = om_round($finalAmount) - $princAmount; //Int calculated for years
            while ($month >= 1) {
                $newInterest = $finalAmount * ($ROI / (12 * 100)) * 1;
                $finalAmount = $finalAmount + om_round($newInterest);
                $interest += om_round($newInterest);
                $month = $month - 1;
            }
        } else {
            $finalAmount = $princAmount * pow(( 1 + ($ROI / 100)), $years);
            $interest = om_round($finalAmount) - $princAmount; //Int calculated for years
        }
        $compPrincAmount = om_round($finalAmount);
        $perMonthInt = ($compPrincAmount * ($ROI / 12)) / 100;
        $perDayInt = ($compPrincAmount * (($ROI / 12) / $noOfDaysInMM)) / 100;
        include 'olggmpin.php'; //change in filename @AUTHOR: SANDY20NOV13
        //End Code to calculate Compound Interest
    }

    $totalAmount = $princAmount + $interest;

    $princAmount = number_format($princAmount, 2, '.', '');

    $totalInterest = om_round($interest);

    $totalInterest = number_format($totalInterest, 2, '.', '');

    $totalAmount = om_round($totalAmount);

    $totalAmount = number_format($totalAmount, 2, '.', '');

    if ($girviType == 'Sec.Loan' || $girviType == 'secured') {
        $girviValuation = $_SESSION['girviValuation'];
    } else {
        $girviValuation = 0;
    }

    $girviValuation = number_format($girviValuation, 2, '.', '');

    $totalDepositPrincipalAmount = 0;
    $totalDepositIntAmount = 0;
    $totalDepositAmount = 0;
    $totalDepositCount = 0;

//echo "Rs. " . $totalAmount;
//echo " NOD " . $totalNoOfDays;
    ?>
    <?php
    if ($totalPrincipalAmounts > 0) {
        ?>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="brdrgry-dashed margtp10">
            <tr class="height28 trbggry">
                <td align="right" valign="middle" class="girvi_head_maron">PRINCIPAL AMOUNT</td>
                <td align="right" valign="middle" class="girvi_head_maron">ROI</td>
                <td align="right" valign="middle" class="girvi_head_maron">
                    <?php
                    if ($girviIntOpt == 'Compound') {
                        echo 'C.';
                    } else {
                        echo 'S.';
                    }
                    ?>&nbsp;INTEREST
                </td>
                <td align="right" valign="middle" class="girvi_head_maron">START DATE</td>
                <td align="right" valign="middle" class="girvi_head_maron">END DATE</td>
                <td align="right" valign="middle" class="girvi_head_maron">TIME PERIOD</td>
                <td align="right" valign="middle" class="girvi_head_maron">STATUS</td>
            </tr>
            <tr>
                <td align="right" valign="middle" class="girvi_head_black"><?php echo $princAmount; ?></td>
                <td align="right" valign="middle" class="girvi_head_black"><?php echo $ROI; ?>&nbsp;%</td>
                <td align="right" valign="middle" class="girvi_head_black"><?php echo $totalInterest; ?></td>
                <td align="right" valign="middle" class="girvi_head_black"><?php echo om_strtoupper($girviDOBPrint); ?></td>
                <td align="right" valign="middle" class="girvi_head_black"><?php echo om_strtoupper($todayDatePrint); ?></td>
                <td align="right" valign="middle" class="girvi_head_black">
                    <?php
                    if ($yearPrint > 1) {
                        echo $yearPrint . " Years ";
                    } else if ($yearPrint == 1) {
                        echo $yearPrint . " Year ";
                    }
                    if ($monthPrint > 1) {
                        echo $monthPrint . " Months ";
                    } else if ($monthPrint == 1) {
                        echo $monthPrint . " Month ";
                    }
                    if ($daysPrint > 1) {
                        echo $daysPrint . " Days";
                    }
                    if ($daysPrint == 1) {
                        echo $daysPrint . " Day";
                    }
                    if ($daysPrint == 0 && $yearPrint == 0 && $monthPrint == 0) {
                        echo $daysPrint . " Days";
                    }
                    ?>
                </td>
                <td align="right" valign="middle" class="girvi_head_black"><?php echo om_strtoupper($girviUpdSts); ?></td>
            </tr>
            <?php //include 'olggprac.php'; //changes in new filename @AUTHOR: SANDY20NOV13     ?>     

            <?php
            $totalPrincipalAmount = $princAmount + $totalMorePrincipalAmount;

            $totalPrincipalAmount = number_format($totalPrincipalAmount, 2, '.', '');

            $totalFinalInterest = $totalInterest + $totalMorePrincipalInterest;

            $totalFinalInterest = number_format($totalFinalInterest, 2, '.', '');

            $totalAmount = $totalPrincipalAmount + $totalFinalInterest;

            $totalAmount = number_format($totalAmount, 2, '.', '');

            $girviValuation = number_format($girviValuation, 2, '.', '');

            include 'ormlntda.php'; //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
            ?>
            <tr>
                <td align="center" colspan="8">
                    <hr color="#C0C0C0" size="0.1px" />
                </td>
            </tr>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background: #eaffea;border: 1px solid #c1c1c1;"> 
            <tr>
                <td class="girvi_head_green_left">FINAL CALCULATION</td>
            </tr>
            <tr>
                <td align="left" valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="right" valign="middle" class="girvi_head_maron">TOTAL PRINCIPAL</td>
                            <td align="right" valign="middle" class="girvi_head_maron">TOTAL INTEREST</td>
                            <td align="right" valign="middle" class="girvi_head_maron">TOTAL AMOUNT</td>

                        </tr>
                        <tr>
                            <td align="right" valign="middle" class="girvi_head_black"><?php
        $totalPrincipalAmount = $totalPrincipalAmount - $totalDepositPrincipalAmount;
        $totalPrincipalAmount = number_format($totalPrincipalAmount, 2, '.', '');
        echo $totalPrincipalAmount;
            ?></td>
                            <td align="right" valign="middle" class="girvi_head_black"><?php
                        $totalFinalInterest = $totalFinalInterest - $totalDepositIntAmount;
                        $totalFinalInterest = number_format($totalFinalInterest, 2, '.', '');
                        echo $totalFinalInterest;
            ?></td>
                            <td align="right" valign="middle" class="girvi_head_blue_16">
                                <?php
                                $totalAmount = $totalAmount - $totalDepositAmount;

                                $totalAmount = number_format($totalAmount, 2, '.', '');

                                echo $totalAmount;
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <?php
    } else {
        $totalPrincipalAmount = $princAmount + $totalMorePrincipalAmount;

        $totalPrincipalAmount = number_format($totalPrincipalAmount, 2, '.', '');

        $totalFinalInterest = $totalInterest + $totalMorePrincipalInterest;

        $totalFinalInterest = number_format($totalFinalInterest, 2, '.', '');
        ?>
        <table border="0" cellpadding="0" cellspacing="0" width="100%"  class="bgWhite brdrgry-dashed" style="margin-top:5px;border-radius:5px;">
            <tr class="height28" style="background: #f2f2f2;">
                <td align="right" valign="middle" class="girvi_head_maron">PRINCIPAL</td>
                <td align="right" valign="middle" class="girvi_head_maron">ROI</td>
                <td align="right" valign="middle" class="girvi_head_maron">
                    <?php
                    if ($girviIntOpt == 'Compound') {
                        echo 'C.';
                    } else {
                        echo 'S.';
                    }
                    ?>&nbsp;INTEREST
                </td>
                <td align="right" valign="middle" class="girvi_head_maron">TOTAL</td>
                <td align="right" valign="middle" class="girvi_head_maron">START DATE</td>   
                <td align="right" valign="middle" class="girvi_head_maron">END DATE</td> 
                <td align="right" valign="middle" class="girvi_head_maron">TIME PERIOD</td>
                <td align="right" valign="middle" class="girvi_head_maron">STATUS</td>
            </tr>
            <tr>
                <td align="right" valign="middle" class="girvi_head_black"><?php echo $totalPrincipalAmount; ?></td>
                <td align="right" valign="middle" class="girvi_head_black"><?php echo $ROI; ?>&nbsp;%</td>
                <td align="right" valign="middle" class="girvi_head_black"><?php echo $totalFinalInterest; ?></td>
                <td align="right" valign="middle" class="girvi_head_blue_15">
                    <?php
                    $totalAmount = $totalAmount - $totalDepositAmount;

                    $totalAmount = number_format($totalAmount, 2, '.', '');

                    echo $totalAmount;
                    ?>
                </td>
                <td align="right" valign="middle" class="girvi_head_black"><?php 
                if ($nepaliDateIndicator == 'YES') {
                        $day_en = substr($girviDOBPrint, 0, 2);
                        $selMnth = substr($girviDOBPrint, 3, -5);
                        $year_en = substr($girviDOBPrint, -4);
                        if (preg_match("/^(JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC|Aug|Jan|Feb|Mar|Apr|May|Jun|Jul|Sep|Oct|Nov|Dec)$/", $selMnth)) {
                            // Convert the month abbreviation to its numeric representation (zero-padded)
                            $selMnth = date('m', strtotime($selMnth));
                        }
                        $girviDOBDate = $nepali_date->validate_en($year_en, $selMnth, $day_en);
                        if ($girviDOBDate != '1' || $girviDOBDate != 'TRUE') {
                            $girviDOBArray = explode(' ', $girviDOBPrint);
                            if (is_numeric($girviDOBArray[1])) {
                                $girviDOBMnth = $nepali_date->get_nepali_month($girviDOBArray[1]);
                            }
                            //
                            if ($nepaliDateMonthFormat == 'displayInNumber') {
                                echo $girviDOBArray[0] . ' ' . $girviDOBArray[1] . ' ' . $girviDOBArray[2];
                            } else {
                                echo $girviDOBArray[0] . ' ' . $girviDOBMnth . ' ' . $girviDOBArray[2];
                            }
                        } else {
                            $date_ne = $nepali_date->get_nepali_date($year_en, $selMnth, $day_en);
//                            echo $date_ne[d].' '.$date_ne[M].' '.$date_ne[y];
//                            print_r($date_ne);
                            if ($nepaliDateMonthFormat == 'displayInNumber') {
                                echo $date_ne[d] . '-' . $date_ne[m] . '-' . $date_ne[y];
                            } else {
                                echo $date_ne[d] . '-' . $date_ne[M] . '-' . $date_ne[y];
                            }
                        }
                    }else{
                        echo om_strtoupper($girviDOBPrint);} ?></td>
                <td align="right" valign="middle" class="girvi_head_black"><?php 
                if ($nepaliDateIndicator == 'YES') {
                        $day_en = substr($todayDatePrint, 0, 2);
                        $selMnth = substr($todayDatePrint, 3, -5);
                        $year_en = substr($todayDatePrint, -4);
                        if (preg_match("/^(JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC|Aug|Jan|Feb|Mar|Apr|May|Jun|Jul|Sep|Oct|Nov|Dec)$/", $selMnth)) {
                            // Convert the month abbreviation to its numeric representation (zero-padded)
                            $selMnth = date('m', strtotime($selMnth));
                        }
                        $girviDOBDate = $nepali_date->validate_en($year_en, $selMnth, $day_en);
                        if ($girviDOBDate != '1' || $girviDOBDate != 'TRUE') {
                            $girviDOBArray = explode(' ', $todayDatePrint);
                            if (is_numeric($girviDOBArray[1])) {
                                $girviDOBMnth = $nepali_date->get_nepali_month($girviDOBArray[1]);
                            }
                            //
                            if ($nepaliDateMonthFormat == 'displayInNumber') {
                                echo $girviDOBArray[0] . ' ' . $girviDOBArray[1] . ' ' . $girviDOBArray[2];
                            } else {
                                echo $girviDOBArray[0] . ' ' . $girviDOBMnth . ' ' . $girviDOBArray[2];
                            }
                        } else {
                            $date_ne = $nepali_date->get_nepali_date($year_en, $selMnth, $day_en);
//                            echo $date_ne[d].' '.$date_ne[M].' '.$date_ne[y];
//                            print_r($date_ne);
                            if ($nepaliDateMonthFormat == 'displayInNumber') {
                                echo $date_ne[d] . '-' . $date_ne[m] . '-' . $date_ne[y];
                            } else {
                                echo $date_ne[d] . '-' . $date_ne[M] . '-' . $date_ne[y];
                            }
                        }
                    }else{
                        echo om_strtoupper($todayDatePrint);} ?></td>
                <td align="right" valign="middle" class="girvi_head_black">
                    <?php
                    if ($yearPrint > 1) {
                        echo $yearPrint . " Years ";
                    } else if ($yearPrint == 1) {
                        echo $yearPrint . " Year ";
                    }
                    if ($monthPrint > 1) {
                        echo $monthPrint . " Months ";
                    } else if ($monthPrint == 1) {
                        echo $monthPrint . " Month ";
                    }
                    if ($daysPrint > 1) {
                        echo $daysPrint . " Days";
                    }
                    if ($daysPrint == 1) {
                        echo $daysPrint . " Day";
                    }
                    if ($daysPrint == 0 && $yearPrint == 0 && $monthPrint == 0) {
                        echo $daysPrint . " Days";
                    }
                    //Code to set time period var @AUTHOR: SANDY08JAN14
                    if ($years > 0) {
                        $completeTime = $years . 'YY';
                    }
                    if ($month > 0) {
                        $completeTime = $completeTime . $month . 'MM';
                    }
                    if ($days > 0) {
                        $completeTime = $completeTime . $days . 'DD';
                    }

                    //Code to set time period var @AUTHOR: SANDY08JAN14
                    ?>
                    <!----Start to ADD hidden fields @AUTHOR: SANDY08JAN14 ---->
                    <input type="hidden" id="timePeriodVar" name="timePeriodVar" value="<?php echo $completeTime; ?>" />
                    <!---- End to add  hidden fields  @AUTHOR: SANDY08JAN14-->
                </td>
                <td align="right" valign="middle" class="girvi_head_black"><?php echo om_strtoupper($girviUpdSts); ?></td>
            </tr>
            <?php include 'ormlntda.php'; ?>

        </table>
        <?php if ($totalDepositCount > 0) { ?>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
<!--                <tr>
                    <td align="center" colspan="11">
                        <hr color="#C0C0C0" size="0.1px" />
                    </td>
                </tr>-->
                <tr>
                    <td class="girvi_head_green_left">
                        FINAL CALCULATION
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background: #eaffea;border: 1px dashed #c1c1c1;border-radius:3px;">
                            <tr>
                                <td align="right" valign="middle" class="girvi_head_maron">TOTAL PRINCIPAL</td>
                                <td align="right" valign="middle" class="girvi_head_maron">TOTAL INTEREST</td>
                                <td align="right" valign="middle" class="girvi_head_maron">TOTAL AMOUNT</td>
                            </tr>
                            <tr>
                                <td align="right" valign="middle" class="girvi_head_black">
                                    <?php
                                    $totalPrincipalAmount = $totalPrincipalAmount - $totalDepositPrincipalAmount;
                                    $totalPrincipalAmount = number_format($totalPrincipalAmount, 2, '.', '');
                                    echo $totalPrincipalAmount;
                                    ?>
                                </td>
                                <td align="right" valign="middle" class="girvi_head_black">
                                    <?php
                                    $totalFinalInterest = $totalFinalInterest - $totalDepositIntAmount;
                                    $totalFinalInterest = number_format($totalFinalInterest, 2, '.', '');
                                    echo $totalFinalInterest;
                                    ?>
                                </td>
                                <td align="right" valign="middle" class="girvi_head_blue_16">
                                    <?php
                                    $totalAmount = $totalAmount - $totalDepositAmount;

                                    $totalAmount = number_format($totalAmount, 2, '.', '');

                                    echo $totalAmount;
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <?php
        }
    }
    $_SESSION['girviTotalFinalInterest'] = $totalFinalInterest;
    ?>
    <?php
    if ($grvRelPayDetails == "TRUE" && $girviUpdSts != 'Released') { //change in condition @AUTHOR: SANDY22JAN14
        /*         * *******Start code to add code @Author:PRIYA23MAY14************** */
        $qSelGirviAccId = "SELECT ml_cr_acc_id,ml_firm_id,ml_acc_id,ml_ln_cr_dr FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and  ml_id='$girviId'";
        $resGirviAccId = mysqli_query($conn,$qSelGirviAccId) or die("Error: " . mysqli_error($conn) . " with query " . $qSelGirviCrAccId);
        $rowGirviAccId = mysqli_fetch_array($resGirviAccId, MYSQLI_ASSOC);
        $mlDrAccId = $rowGirviAccId['ml_acc_id'];
        $mlCrAccId = $rowGirviAccId['ml_cr_acc_id'];
        $firmId = $rowGirviAccId['ml_firm_id'];
        $mlCrdrType = $rowGirviAccId['ml_ln_cr_dr'];
        if ($mlCrdrType == 'CR') {
            $girvDrAccId = $mlCrAccId;
            $girvCrAccId = $mlDrAccId;
        } else {
            $girvDrAccId = $mlDrAccId;
            $girvCrAccId = $mlCrAccId;
        }


        /*         * *******End code to add code @Author:PRIYA23MAY14************** */
        include 'olgrpydd.php';
    }
    if ($girviUpdSts == 'Released') {
        include 'ormlrrdd.php';
    }
}
?>
<input id="totalPrincipalAmount" name="totalPrincipalAmount" type="hidden" value="<?php echo $totalPrincipalAmount; ?>" /><!----var changed @Author:PRIYA27SEP14---------><!---Change in line @AUTHOR: SANDY22JAN14--->
