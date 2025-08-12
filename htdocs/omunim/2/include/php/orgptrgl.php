<?php
/*
 * **************************************************************************************
 * @tutorial: Transferred Girvi List
 * **************************************************************************************
 * 
 * Created on May 22, 2013 2:45:31 PM
 *
 * @FileName: orgptrgl.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
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
//Start Staff Access API @AUTHOR: SANDY09JAN14
$accFileName = $currentFileName;
include 'ommpemac.php';
//End Staff Access API @AUTHOR: SANDY09JAN14
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpincr.php';
$staffId = $_SESSION['sessionStaffId']; //condition added @Author:PRIYA28FEB15
include 'ommpsbac.php'; //file added @Author:PRIYA28FEB15
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();
?>
<!--ADDED CODE FOR PRINT BUTTON NOT WORKING ISSUE @AUTHOR:PRIYANKA-17FEB2023-->
<div id="girviTransferedGirviListPanelNewDiv">
    <div id="girviPanelTrId"></div>
    <?php
//<!---Start to add column token no @OMMODTAG SHRI_30NOV15------------->
    /*     * *************Start code to add code to update gtrans serail numnber @Author:PRIYA28JUN14********* */
    $transferLoanRepFormateQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'transferLoanRepFormate'";
    $restransferLoanRepFormate = mysqli_query($conn, $transferLoanRepFormateQuery);
    $rowtransferLoanRepFormate = mysqli_fetch_array($restransferLoanRepFormate);
    $transferLoanRepFormate = $rowtransferLoanRepFormate['omly_value'];
    if ($transferLoanRepFormate != 'datatable') {
        if ($checkColumn == 'false') {
        $qSelAllGirvi = "SELECT gtrans_id,global_gt_serial_num,gtrans_pre_serial_num,gtrans_serial_num,gtrans_trans_loan_id FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]'";
        $resAllGirvi = mysqli_query($conn, $qSelAllGirvi);
        while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {
            $gId = $rowAllGirvi['gtrans_id'];
            $globalGTransSerailNum = $rowAllGirvi['global_gt_serial_num'];
            $gPreSerialNo = $rowAllGirvi['gtrans_pre_serial_num'];
            $gSerialNo = $rowAllGirvi['gtrans_serial_num'];
            $girviTransferLoanId = $rowAllGirvi['gtrans_trans_loan_id'];
            if ($girviTransferLoanId != '') {
                $selAllTransGirvi = "SELECT ml_pre_serial_num,ml_serial_num FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]'";
                $resAllTransGirvi = mysqli_query($conn, $selAllTransGirvi);
                $rowAllTransGirvi = mysqli_fetch_array($resAllTransGirvi, MYSQLI_ASSOC);
                $gPreSerialNo = $rowAllTransGirvi['ml_pre_serial_num'];
                $gSerialNo = $rowAllTransGirvi['ml_serial_num'];
            } else {
                $gPreSerialNo = $rowAllGirvi['gtrans_pre_serial_num'];
                $gSerialNo = $rowAllGirvi['gtrans_serial_num'];
            }
            if ($globalGTransSerailNum == NULL) {
                $query = "UPDATE girvi_transfer SET global_gt_pre_serial_num='$gPreSerialNo',global_gt_serial_num='$gSerialNo'"
                        . "WHERE gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_id='$gId'";
                if (!mysqli_query($conn, $query)) {
                    die('Error: ' . mysqli_error($conn));
                }
            }
        }
    }
    /*     * *************End code to add code to update gtrans serail numnber @Author:PRIYA28JUN14********* */
    $selFirmId = NULL;
    $sortKeyword = NULL;
    $searchColumn = NULL;
    $searchValue = NULL;
    $searchKeyword = NULL;
    $columName = NULL;
    $searchColumnStr = NULL;
    $selFirmStr = NULL;
    $searchColumnPrevStr = NULL;
    if (isset($_GET['searchKeyword'])) {
        $searchKeyword = $_GET['searchKeyword'];
    }
    $gTransStatus = $_GET['gTransStatus'];
    /*     * *****Start Code To Sel Transferred Firm Id @Author:PRIYA17JUL13************ */
    $selFirmId = $_SESSION['setFirmSession'];
//echo '$selFirmId'.$selFirmId;
    /*     * ********Start code to change condition @Author:PRIYA12FEB14************ */
    if ($_GET['selTFirmId'] != '') {
        $selTFirmId = $_GET['selTFirmId'];
        $selMlName = 'TR ML';
    }
//start code @AUTHOR: SANDY28JAN14
    if ($_GET['selMlName'] != '' && $_GET['selMlName'] != 'NotSelected' && $_GET['selMlName'] != 'TR ML') {
        $selMlName = $_GET['selMlName'];
        $selTFirmId = 'Selected';
    }
    /*     * ********End code to change condition @Author:PRIYA12FEB14************ */
//end code @AUTHOR: SANDY28JAN14
    /*     * ******Start Code To Sel Transferred Firm Id @Author:PRIYA17JUL13************ */
    if (isset($_GET['sortKeyword'])) {
        $sortKeyword = $_GET['sortKeyword'];
    }
    if (isset($_GET['searchColumn'])) {
        $searchColumn = $_GET['searchColumn'];
    }
    if (isset($_GET['searchValue'])) {
        $searchValue = $_GET['searchValue'];
    }
//
    $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
    $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
    $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
    $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
    $selNepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
    $resNepaliDateMonthFormat = mysqli_query($conn, $selNepaliDateMonthFormat);
    $rowNepaliDateMonthFormat = mysqli_fetch_array($resNepaliDateMonthFormat);
    $nepaliDateMonthFormat = $rowNepaliDateMonthFormat['omly_value'];

//echo $searchValue;
//Start Code To Get Search Column Name @Author:PRIYA14JUL13
    $searchColumnName = $searchColumn;
    $searchColumnValue = $searchValue;

    $sortKeyword = stripslashes($sortKeyword);
    $sortKeyword = stripslashes($sortKeyword);
    $searchColumn = stripslashes($searchColumn);
//End Code To Get Search Column Name @Author:PRIYA14JUL13
    /*     * ****Start Code To Add $sortKeywordValue @Author:PRIYA24AUG13********* */
    $sortKeyword = stripslashes($sortKeyword);
    $sortKeywordValue = $sortKeyword;
    $sortKeywordValue = stripslashes($sortKeywordValue);
    /*     * ****End Code To Add $sortKeywordValue @Author:PRIYA24AUG13********* */
    /*     * ************Start Code To Update No Of Rows @Author:PRIYA16JUL13******************* */
    $updateRows = $_GET['updateRows'];
    if ($updateRows == 'updateRows') {
        $rowsPerPage = $_GET['rowsPerPage'];
        $ominValue = $rowsPerPage;
        $ominOption = 'indigvpnrw';
        include 'ommpindc.php';
    }
    $qSelGNoOfRows = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'indigvpnrw'";
    $resGNoOfRows = mysqli_query($conn, $qSelGNoOfRows);
    $rowGNoOfRows = mysqli_fetch_array($resGNoOfRows, MYSQLI_ASSOC);
    $rowsPerPage = $rowGNoOfRows['omin_value'];
    if ($rowsPerPage == '' || $rowsPerPage == NULL || $rowsPerPage == 0) {
        $rowsPerPage = 15;
    }
    /*     * ************End Code To Update No Of Rows @Author:PRIYA16JUL13******************* */
    $checkNextRows = $rowsPerPage * 2;
// by default we show first page
    $pageNum = 1;
    $gCounter = 0;
// if $_GET['page'] defined, use it as page number
    if (isset($_GET['page'])) {
        $pageNum = $_GET['page'];
        $gCounter = ($pageNum - 1) * $rowsPerPage;
    }
// counting the offset
    $perOffset = ($pageNum - 1) * $rowsPerPage;

    $isAtrate = strpos($searchColumn, '@');
    if ($isAtrate == true) {
        $searchColumn = explode("@", $searchColumn);
        $searchColumn1 = $searchColumn[0];
        $searchColumn2 = $searchColumn[1];
        $searchColumn3 = $searchColumn[2];

//Start Code to Get Pre and Post Girvi Serial Number
        if ($searchColumn1 == 'gtrans_pre_serial_num') {
            $grvSerialNoStr = $searchValue;
            $grvSerialNoStrLen = strlen($searchValue);
            for ($count = 0; $count <= $grvSerialNoStrLen; $count++) {
                if (is_numeric($grvSerialNoStr)) {
                    break;
                }
                $grvSerialNoStr = substr($grvSerialNoStr, 1);
            }

            $grvPreSerialNo = substr($searchValue, 0, $count);
            $grvSerialNo = $grvSerialNoStr;
            if ($grvPreSerialNo == '' && $grvSerialNo != '') {
                $searchColumnStr = " and ($searchColumn1 = '$grvPreSerialNo' OR $searchColumn1 IS NULL) and $searchColumn2 = '$grvSerialNo' ";
            } else {
                $searchColumnStr = " and $searchColumn1 = '$grvPreSerialNo' and $searchColumn2 = '$grvSerialNo' ";
            }
        }
        if ($searchColumn1 == 'girv_cust_fname') {
            $isSpace = strpos($searchValue, ' ');
            if ($isSpace == true) {
                $searchValue = explode(" ", $searchValue);
                $searchValue1 = $searchValue[0];
                $searchValue2 = $searchValue[1];
                $searchColumnStr = " and $searchColumn1 LIKE '$searchValue1%' and $searchColumn2 LIKE '$searchValue2%' ";
            } else {
                $searchColumnStr = " and ($searchColumn1 LIKE '$searchValue%' or $searchColumn2 LIKE '$searchValue%') ";
            }
        }
        if ($searchColumn1 == "DAY(STR_TO_DATE(gtrans_DOB,'%d %M %y'))") {
            $isDot = strpos($searchValue, '.');
            if ($isDot == true) {
                $searchValue = explode(".", $searchValue);
                $searchValue1 = $searchValue[0];
                $searchValue2 = $searchValue[1];
                $searchValue3 = $searchValue[2];
                /*                 * ************Start code to change condition for date @Author:PRIYA31OCT13**************** */
                if ($searchValue3 == '') {
                    $searchColumnStr = " and $searchColumn2='$searchValue1' and $searchColumn3 = '$searchValue2' ";
                } else if ($searchValue1 != '' && $searchValue2 != '' && $searchValue3 != '') {
                    $searchColumnStr = " and $searchColumn1='$searchValue1' and $searchColumn2='$searchValue2' and $searchColumn3 = '$searchValue3' ";
                }
                /*                 * ************End code to change condition for date @Author:PRIYA31OCT13**************** */
            } else {
                $searchColumnStr = " and $searchColumn3='$searchValue' ";
            }
            $dateStr = " order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') asc ";
        }
        if ($searchColumn1 == "DAY(STR_TO_DATE(gtrans_DOR,'%d %M %y'))") {
            $isDot = strpos($searchValue, '.');
            if ($isDot == true) {
                $searchValue = explode(".", $searchValue);
                $searchValue1 = $searchValue[0];
                $searchValue2 = $searchValue[1];
                $searchValue3 = $searchValue[2];
                /*                 * ************Start code to change condition for date @Author:PRIYA31OCT13**************** */
                if ($searchValue3 == '') {
                    $searchColumnStr = " and $searchColumn2='$searchValue1' and $searchColumn3 = '$searchValue2' ";
                } else if ($searchValue1 != '' && $searchValue2 != '' && $searchValue3 != '') {
                    $searchColumnStr = " and $searchColumn1='$searchValue1' and $searchColumn2='$searchValue2' and $searchColumn3 = '$searchValue3' ";
                }
                /*                 * ************End code to change condition for date @Author:PRIYA31OCT13**************** */
            } else {
                $searchColumnStr = " and $searchColumn3='$searchValue' ";
            }
            $dateStr = " order by STR_TO_DATE(gtrans_DOR,'%d %b %Y') asc ";
        }
//End Code to Get Pre and Post Girvi Serial Number
    } else {
        if ($searchColumn != NULL)
            $searchColumnStr = " and $searchColumn LIKE '$searchValue%' ";
    }
    if ($searchColumn == 'gtrans_prin_amt') {
        /*         * *****Start code To Select Prin Amnt Range @Author:PRIYA17JUL13********* */
        $prinStartRange = stristr($searchValue, '-', TRUE);
        $endRange = stristr($searchValue, '-');
        $prinEndRange = substr($endRange, 1);
        /*         * *****End code To Select Prin Amnt Range @Author:PRIYA17JUL13********* */
        if ($prinStartRange != '' && $prinEndRange != '') {
            $searchColumnStr = " and $searchColumn >= '$prinStartRange' and $searchColumn <= '$prinEndRange'";
        } else {
            $searchColumnStr = " and $searchColumn = '$searchValue' ";
        }
    }
    /*     * *********Start Code To Select Date String @Author:PRIYA19JUL13********** */
    if ($dateStr != '' || $dateStr != NULL) {
        $selDateStr = $dateStr;
    } else {
        $selDateStr = " order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc ";
    }
    /*     * *********End Code To Select Date String @Author:PRIYA19JUL13********** */
    /*     * *************Start Code To Make G Trans Status @Author:PRIYA20JUL13******* */
    if ($gTransStatus == '' || $gTransStatus == NULL) {
        $gTransStatusStr = " IN ('Transferred','Released')";
    } else {
        if ($gTransStatus == 'ACT') {
            $gTransStatusStr = " = 'Transferred'";
        } else if ($gTransStatus == 'REL') {
            $gTransStatusStr = " = 'Released'";
        }
    }
    /*     * *************Start Code To Make G Trans Status @Author:PRIYA20JUL13******* */
// Main Code for Girvi Panel
    /*     * ***********Start Code To Check Login Pass @Author:PRIYA19JUL13********* */
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]'";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' order by firm_since desc";
    }
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
//Set String for Public Firms
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
    $strGFirmId = $strFrmId;
    if (($selFirmId != NULL && $selFirmId != '' && $selFirmId != 'NotSelected')) {
        $strFrmId = $selFirmId;
    }
//echo '$strGFirmId'.$strGFirmId;
//echo '$searchColumnStr='.$searchColumnStr;
//echo '$searchColumn='.$searchColumn;
    /*     * ***********End Code To Check Login Pass @Author:PRIYA19JUL13********* */
    if ($searchColumn1 == 'girv_cust_fname' || $searchColumn == 'girv_cust_city' || $sortKeyword == 'girv_cust_fname' || $sortKeyword == 'girv_cust_city') {
        if ($sortKeyword != NULL) {
            $qSelAllGirvi = "SELECT gtrans_id,gtrans_girvi_id,gtrans_firm_type,gtrans_cust_id,gtrans_firm_id,gtrans_DOB,gtrans_prin_amt,gtrans_paid_int,gtrans_total_amt,"
                    . "gtrans_DOR,gtrans_trans_loan_id,gtrans_pre_serial_num,gtrans_serial_num,gtrans_upd_sts,gtrans_prin_typ,gtrans_token_num FROM "
                    . "girvi_transfer JOIN girvi ON  gtrans_girvi_id = girv_id where gtrans_own_id='$_SESSION[sessionOwnerId]' "
                    . " and gtrans_upd_sts $gTransStatusStr and gtrans_firm_id IN ($strGFirmId) and gtrans_exist_firm_id IN ($strFrmId) "
                    . "order by $sortKeyword asc,STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
            $totGirviForPaging = "SELECT gtrans_id,gtrans_girvi_id,gtrans_firm_type,gtrans_cust_id,gtrans_firm_id,gtrans_DOB,gtrans_prin_amt,gtrans_paid_int,gtrans_total_amt,"
                    . "gtrans_DOR,gtrans_trans_loan_id,gtrans_pre_serial_num,gtrans_serial_num,gtrans_upd_sts,gtrans_prin_typ,gtrans_token_num FROM "
                    . "girvi_transfer JOIN girvi ON  gtrans_girvi_id = girv_id where gtrans_own_id='$_SESSION[sessionOwnerId]' "
                    . " and gtrans_upd_sts $gTransStatusStr and gtrans_firm_id IN ($strGFirmId) and gtrans_exist_firm_id IN ($strFrmId) order by $sortKeyword asc";
//  echo '$qSelAllGirvi ==1=='.$qSelAllGirvi.'<br>';
        } else if ($searchColumnStr != NULL) {
            if ($dateStr != '' || $dateStr != NULL) {
                $selDateStr = $dateStr;
            } else {
                $selDateStr = " order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc ";
            }
//        add condition and change the gtrans_firm_id in $strGFirmId to $selTFirmId Author:GAUR22JUN16
//        if($selTFirmId == ''){
//            $selTFirmId = $strGFirmId;
//        }
            $qSelAllGirvi = "SELECT gtrans_id,gtrans_girvi_id,gtrans_firm_type,gtrans_cust_id,gtrans_firm_id,gtrans_DOB,gtrans_prin_amt,gtrans_paid_int,gtrans_total_amt,"
                    . "gtrans_DOR,gtrans_trans_loan_id,gtrans_pre_serial_num,gtrans_serial_num,gtrans_upd_sts,gtrans_prin_typ,gtrans_token_num,gtrans_packet_num FROM "
                    . "girvi_transfer JOIN girvi ON  gtrans_girvi_id = girv_id where gtrans_own_id='$_SESSION[sessionOwnerId]'  $searchColumnStr "
                    . " and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strFrmId) $selDateStr, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
            $totGirviForPaging = "SELECT gtrans_id,gtrans_girvi_id,gtrans_firm_type,gtrans_cust_id,gtrans_firm_id,gtrans_DOB,gtrans_prin_amt,gtrans_paid_int,gtrans_total_amt,"
                    . "gtrans_DOR,gtrans_trans_loan_id,gtrans_pre_serial_num,gtrans_serial_num,gtrans_upd_sts,gtrans_prin_typ,gtrans_token_num,gtrans_packet_num FROM "
                    . "girvi_transfer JOIN girvi ON  gtrans_girvi_id = girv_id where gtrans_own_id='$_SESSION[sessionOwnerId]'  $searchColumnStr "
                    . " and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId)  $selDateStr, gtrans_serial_num desc";
//     echo '$qSelAllGirvi2 ==2=='.$qSelAllGirvi.'<br>';
        } else if ($selFirmId != NULL || $selFirmId != '') {
            $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($selFirmId) and  gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
            $totGirviForPaging = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($selFirmId) and gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
//        echo '$qSelAllGirvi3==3==' . $qSelAllGirvi .'<br>';
        } else {
            $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
            $totGirviForPaging = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
//    echo '$qSelAllGirvi4'.$qSelAllGirvi;
        }
    } else if (($selTFirmId == NULL || $selTFirmId == 'NotSelected' || $selTFirmId == '')) {
        if ($sortKeyword != NULL) {
            $totGirviForPaging = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strFrmId) and gtrans_firm_id IN ($strGFirmId) order by $sortKeyword asc,STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc";
            $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strFrmId)"
                    . " and gtrans_firm_id IN ($strGFirmId) order by $sortKeyword asc,STR_TO_DATE(gtrans_DOB,'%d %b %Y') asc LIMIT $perOffset, $rowsPerPage";
//  echo '$qSelAllGirvi == 5=='.$qSelAllGirvi.'<br>';
        } else if ($searchColumnStr != NULL) {
            /*             * *********Start Code To Select Date String @Author:PRIYA19JUL13********** */
            if ($dateStr != '' || $dateStr != NULL) {
                $selDateStr = $dateStr;
            } else {
                $selDateStr = " order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc ";
            }
            /*             * *********End Code To Select Date String @Author:PRIYA19JUL13********** */
            $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and gtrans_upd_sts $gTransStatusStr and gtrans_firm_id IN ($strGFirmId) and gtrans_exist_firm_id IN ($strGFirmId) $selDateStr, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
            $totGirviForPaging = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and gtrans_upd_sts $gTransStatusStr and gtrans_firm_id IN ($strGFirmId) and gtrans_exist_firm_id IN ($strGFirmId) $selDateStr, gtrans_serial_num desc";
//echo '$qSelAllGirvi==6=='.$qSelAllGirvi.'<br>';
            //Stsrt Code To Get Search Column Name @Author: GAUR15JUN16
//        $qSelAllGirvi = "SELECT gtrans_id,gtrans_girvi_id,gtrans_firm_type,gtrans_cust_id,gtrans_firm_id,gtrans_DOB,gtrans_prin_amt,gtrans_paid_int,gtrans_total_amt,"
//                . "gtrans_DOR,gtrans_trans_loan_id,gtrans_pre_serial_num,gtrans_serial_num,gtrans_upd_sts,gtrans_prin_typ,gtrans_token_num,gtrans_packet_num FROM "
//                . "girvi_transfer JOIN girvi ON  gtrans_girvi_id = girv_id where gtrans_own_id='$_SESSION[sessionOwnerId]'  $searchColumnStr "
//                . " and gtrans_upd_sts $gTransStatusStr and gtrans_firm_id IN ($strGFirmId) and gtrans_exist_firm_id IN ($strFrmId) $selDateStr, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
//        $totGirviForPaging = "SELECT gtrans_id,gtrans_girvi_id,gtrans_firm_type,gtrans_cust_id,gtrans_firm_id,gtrans_DOB,gtrans_prin_amt,gtrans_paid_int,gtrans_total_amt,"
//                . "gtrans_DOR,gtrans_trans_loan_id,gtrans_pre_serial_num,gtrans_serial_num,gtrans_upd_sts,gtrans_prin_typ,gtrans_token_num,gtrans_packet_num FROM "
//                . "girvi_transfer JOIN girvi ON  gtrans_girvi_id = girv_id where gtrans_own_id='$_SESSION[sessionOwnerId]'  $searchColumnStr "
//                . " and gtrans_upd_sts $gTransStatusStr and gtrans_firm_id IN ($strGFirmId) and gtrans_exist_firm_id IN ($strFrmId) $selDateStr, gtrans_serial_num desc";
            //End Code To Get Search Column Name @Author: GAUR15JUN16
//       echo '$qSelAllGirvi6'.$qSelAllGirvi;
        } else {
            $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_firm_id IN ($strGFirmId) order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
            $totGirviForPaging = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_firm_id IN ($strGFirmId) order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
//    echo '$qSelAllGirvi==7=='.$qSelAllGirvi.'<br>';
        }
    }
//Start to add code to search by ml name @AUTHOR: SANDY28JAN14
    else if ($selMlName != '' && $selMlName != NULL && $selMlName != 'TR ML') {
        //create string of ml code with name of selected ml 
        if ($sortKeyword != NULL) {
            $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') order by $sortKeyword asc,STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc LIMIT $perOffset, $rowsPerPage";
            //QUERY FOR PAGING @AUTHOR: SANDY28OCT13
            $totGirviForPaging = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') order by $sortKeyword asc,STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc";
//   echo '$qSelAllGirvi=8='.$qSelAllGirvi.'<br>';
        } else if ($searchColumnStr != NULL) {
            /*             * *********Start Code To Select Date String @Author:PRIYA19JUL13********** */
            if ($dateStr != '' || $dateStr != NULL) {
                $selDateStr = $dateStr;
            } else {
                $selDateStr = " order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc ";
            }
            /*             * *********End Code To Select Date String @Author:PRIYA19JUL13********** */
            $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') $selDateStr, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
            //QUERY FOR PAGING @AUTHOR: SANDY28OCT13
            $totGirviForPaging = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') $selDateStr, gtrans_serial_num desc";
//     echo '$qSelAllGirvi==9=='.$qSelAllGirvi;
        } else if ($selFirmId != NULL || $selFirmId != '') {
            $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($selFirmId) and  gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
            //QUERY FOR PAGING @AUTHOR: SANDY28OCT13
            $totGirviForPaging = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($selFirmId) and gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
//    echo '$qSelAllGirvi==10=='.$qSelAllGirvi;
        } else {
            $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
            //QUERY FOR PAGING @AUTHOR: SANDY28OCT13
            $totGirviForPaging = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
//    echo '$qSelAllGirvi==11=='.$qSelAllGirvi;
        }
    } else {
        if ($sortKeyword != NULL) {
            $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IS NULL and gtrans_firm_id IN ($selTFirmId) order by $sortKeyword asc,STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc LIMIT $perOffset, $rowsPerPage";
            $totGirviForPaging = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IS NULL and gtrans_firm_id IN ($selTFirmId) order by $sortKeyword asc";
//    echo '$qSelAllGirvi11==12=='.$qSelAllGirvi;
        } else if ($searchColumnStr != NULL) {
            /*             * *********Start Code To Select Date String @Author:PRIYA19JUL13********** */
            if ($dateStr != '' || $dateStr != NULL) {
                $selDateStr = $dateStr;
            } else {
                $selDateStr = " order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc ";
            }
            /*             * *********End Code To Select Date String @Author:PRIYA19JUL13********** */
            $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IS NULL and gtrans_firm_id IN ($selTFirmId) $selDateStr, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
//        //QUERY FOR PAGING @AUTHOR: SANDY28OCT13
            $totGirviForPaging = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IS NULL and gtrans_firm_id IN ($selTFirmId) $selDateStr, gtrans_serial_num desc";
//echo '$qSelAllGirvi=13='.$qSelAllGirvi.'<br>';
//Stsrt Code To Get Search Column Name @Author: GAUR22JUN16
//        $qSelAllGirvi = "SELECT gtrans_id,gtrans_girvi_id,gtrans_firm_type,gtrans_cust_id,gtrans_firm_id,gtrans_DOB,gtrans_prin_amt,gtrans_paid_int,gtrans_total_amt,"
//                . "gtrans_DOR,gtrans_trans_loan_id,gtrans_pre_serial_num,gtrans_serial_num,gtrans_upd_sts,gtrans_prin_typ,gtrans_token_num,gtrans_packet_num FROM "
//                . "girvi_transfer JOIN girvi ON  gtrans_girvi_id = girv_id where gtrans_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IS NULL and gtrans_firm_id IN ($selTFirmId) $selDateStr, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
//        $totGirviForPaging = "SELECT gtrans_id,gtrans_girvi_id,gtrans_firm_type,gtrans_cust_id,gtrans_firm_id,gtrans_DOB,gtrans_prin_amt,gtrans_paid_int,gtrans_total_amt,"
//                . "gtrans_DOR,gtrans_trans_loan_id,gtrans_pre_serial_num,gtrans_serial_num,gtrans_upd_sts,gtrans_prin_typ,gtrans_token_num,gtrans_packet_num FROM "
//                . "girvi_transfer JOIN girvi ON  gtrans_girvi_id = girv_id where gtrans_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IS NULL and gtrans_firm_id IN ($selTFirmId) $selDateStr, gtrans_serial_num desc";
            //End Code To Get Search Column Name @Author: GAUR22JUN16
//   echo '$qSelAllGirvi12'.$qSelAllGirvi;
        } else if ($selFirmId != NULL || $selFirmId != '') {
            $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($selFirmId) and gtrans_trans_loan_id IS NULL and gtrans_firm_id IN ($selTFirmId) order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
            //QUERY FOR PAGING @AUTHOR: SANDY28OCT13
            $totGirviForPaging = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($selFirmId) and gtrans_trans_loan_id IS NULL and gtrans_firm_id IN ($selTFirmId) order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
//    echo '$qSelAllGirvi=14='.$qSelAllGirvi.'<br>';
        } else {
            $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IS NULL and gtrans_firm_id IN ($selTFirmId) order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
            // $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strFrmId) and gtrans_firm_id IN ($strGFirmId) order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
//QUERY FOR PAGING @AUTHOR: SANDY28OCT13
            $totGirviForPaging = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and gtrans_upd_sts $gTransStatusStr and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IS NULL and gtrans_firm_id IN ($selTFirmId) order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
//      echo '$qSelAllGirvi14'.$qSelAllGirvi;
//        echo '$qSelAllGirvi=15='.$qSelAllGirvi.'<br>';
        }
    }

    $resAllGirvi = mysqli_query($conn, $qSelAllGirvi);
    $totalNextGirvi = mysqli_num_rows($resAllGirvi);
    /*     * ***Start to add code to implement paging @AUTHOR: SANDY30OCT13************ */
    $resTotGirviForPaging = mysqli_query($conn, $totGirviForPaging) or die(mysqli_error($conn));
    $totalGirviCheck = mysqli_num_rows($resTotGirviForPaging);
    /*     * ****End to add code to implement paging @AUTHOR: SANDY30OCT13************ */
    if ($totalNextGirvi == 0 && $searchColumn1 == 'gtrans_pre_serial_num') {
        $totGirviForPaging = "SELECT gtrans_id,gtrans_girvi_id,gtrans_firm_type,gtrans_cust_id,gtrans_firm_id,gtrans_DOB,gtrans_prin_amt,gtrans_paid_int,gtrans_total_amt,"
                . "gtrans_DOR,gtrans_trans_loan_id,gtrans_pre_serial_num,gtrans_serial_num,gtrans_upd_sts,gtrans_prin_typ,ml_pre_serial_num,ml_serial_num,gtrans_token_num,gtrans_packet_num  FROM "
                . "girvi_transfer JOIN ml_loan ON  gtrans_trans_loan_id = ml_id where gtrans_own_id='$_SESSION[sessionOwnerId]'  and ((ml_pre_serial_num = '$grvPreSerialNo' OR ml_pre_serial_num IS NULL) and ml_serial_num  = '$grvSerialNo')"
                . " and gtrans_upd_sts $gTransStatusStr and gtrans_firm_id IN ($strGFirmId) and gtrans_exist_firm_id IN ($strFrmId)  $selDateStr, gtrans_serial_num desc";
        $qSelAllGirvi = "SELECT gtrans_id,gtrans_girvi_id,gtrans_firm_type,gtrans_cust_id,gtrans_firm_id,gtrans_DOB,gtrans_prin_amt,gtrans_paid_int,gtrans_total_amt,"
                . "gtrans_DOR,gtrans_trans_loan_id,gtrans_pre_serial_num,gtrans_serial_num,gtrans_upd_sts,gtrans_prin_typ,gtrans_token_num,gtrans_packet_num FROM "
                . "girvi_transfer JOIN ml_loan ON  gtrans_trans_loan_id = ml_id where gtrans_own_id='$_SESSION[sessionOwnerId]'  and ((ml_pre_serial_num = '$grvPreSerialNo' OR ml_pre_serial_num IS NULL) and ml_serial_num  = '$grvSerialNo')"
                . " and gtrans_upd_sts $gTransStatusStr and gtrans_firm_id IN ($strGFirmId) and gtrans_exist_firm_id IN ($strFrmId) $selDateStr, gtrans_serial_num desc LIMIT $perOffset, $rowsPerPage";
        $resAllGirvi = mysqli_query($conn, $qSelAllGirvi);
        $totalNextGirvi = mysqli_num_rows($resAllGirvi);

        $resTotGirviForPaging = mysqli_query($conn, $totGirviForPaging) or die(mysqli_error($conn));
        $totalGirviCheck = mysqli_num_rows($resTotGirviForPaging);
    }
//echo $qSelAllGirvi;
    ?>
    <div>
        <table border="0" cellspacing="0" cellpadding="0" width="99%" align="center">
            <tr>
                <td valign="middle" align="left" width="18px" >
                    <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/img/transfer.png" height="28px" onLoad="setScrollIdFun('girviPanelTrId')"/></div>
                </td>
                <td valign="middle" align="left">
                    <div class="main_link_red" style="font-size:16px;"><b>&nbsp;TRANSFERRED LOAN LIST</b></div><!-- changes @AUTHOR: SANDY29DEC13 -->
                </td>
                <!--------Start code to add div @Author:PRIYA29OCT13 ------------------>
                <td align="right" valign="middle">
                    <?php
                    $showStatusAddedDiv = $_GET['getMessage'];
                    ?>
                    <div id="ajaxLoadGirviDetailsDiv" class="analysis_div_rows" <?php if ($showStatusAddedDiv != 'girviDeleted') { ?>style="visibility: hidden" <?php } ?>>
                        <?php
                        if ($showStatusAddedDiv != 'girviDeleted') {
                            include 'omzaajld.php';
                        }
                        $showStatusAddedDiv = $_GET['getMessage'];
                        if ($showStatusAddedDiv == "girviDeleted") {
                            echo "<div class=" . "greenFont" . ">~ Deleted Successfully ~ </div>";
                        }
                        ?>
                    </div>
                    <!--------Start code to add div @Author:PRIYA29OCT13 ------------------>
                </td>
                <!-- ************************************************************************ -->
                <!-- Start Code to Show Number of Girvi per page  @AUTHOR: LINA5JUN13 -->
                <!-- ************************************************************************ -->
                <!-- code modified for search option  @AUTHOR: LINA27JUN13 -->
                <!-- Start code To Add onkeyPress event for No of rows Author:PRIYA08AUG13-->
                <!---Start of changes in function parameter to show selected no of rows @AUTHOR: SANDY31OCT13------------------>
                <!---Start code to add  $selMlName @Author:PRIYA30MAY14------------------>
                <td align="right" valign="top" class="noPrint" width="50px">
                    <input id="rowsPerPage" name="rowsPerPage" type="text" value="<?php echo $rowsPerPage; ?>" placeholder="No Of Rows" title="Enter number of girvi in List"
                           class="border-no textLabel14CalibriGreyMiddle background_transparent" size="10" maxlength="6"onkeyup="if (event.keyCode == 13 && document.getElementById('rowsPerPage').value != '') {
                                       numberOfRowsofTrasferPanel('<?php echo $documentRoot; ?>', document.getElementById('rowsPerPage').value, '<?php echo $selFirmId; ?>', '<?php echo $sortKeyword; ?>', '1', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', 'updateRows', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                       document.getElementById('rowsPerPage').value = '';
                                   }"
                           onkeypress="javascript:return valKeyPressedForNumber(event);"
                           onclick="this.value = ''" style="height: 25px;border: 1px solid #c1c1c1;border-radius: 3px 0 0 3px !important;"/>
                </td>
                <!-- End code To Add onkeyPress event for No of rows Author:PRIYA08AUG13-->
                <td align="right" valign="top" width="17px" class="noPrint">
                    <div id="CustomerListButton" style="width: 30px;height: 25px;line-height: 25px;text-align: center;background: #f59d05;margin-left: -4px;border-radius: 0 3px 3px 0;border: 1px solid #f8d206;">
                        <a style="cursor: pointer;height: 30px;display: block;line-height: 25px;color: #fff;font-size: 12px;" onclick="javascript:numberOfRowsofTrasferPanel('<?php echo $documentRoot; ?>', document.getElementById('rowsPerPage').value, '<?php echo $selFirmId; ?>', '<?php echo $sortKeyword; ?>', '1', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', 'updateRows', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>');">
                            <!--<img src="<?php // echo $documentRootBSlash;      ?>/images/submit16.png"  title="Click Here to Display Number of Customers in this List" />-->
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </td>
                <!---End code to add $selMlName @Author:PRIYA30MAY14------------------>
                <!---End of changes in function parameter to show selected no of rows @AUTHOR: SANDY31OCT13------------------>
                <!-- ************************************************************************ -->
                <!-- End Code to Show Number of Girvi Per Page  @AUTHOR: LINA5JUN13 -->
                <!-- ************************************************************************ -->
            </tr>
            <tr>
                <td colspan="5" align="center">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center" class="ShadowFrm bgWhite" style="position:relative;z-index:1;width:100%;">
                        <tr> 
                            <td colspan="5" align="center">
                                <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center" class=" brdrgry-dashed">
                                    <?php
                                    if ($totalGirviCheck <= 0) {
                                        echo "<div class=" . "spaceLeft40" . "><div class=" . "h7" . "> ~ Transferred Girvi List is empty. ~ </div></div>";
                                    } else {
                                        ?>
                                        <tr>
                                            <td></td><td></td><td></td><td></td>
                                            <td colspan="9">
                                                <div id="display_girvi_info_popup" class="display-girvi-info-popup"></div>
                                            </td>
                                        </tr>
                                        <tr id="girviPanelTrId" class="height28 trbggry">
                                            <?php include 'orgptrglvd.php'; ?><!--FileName Changed @Author:PRIYA24AUG13-->
                                        </tr>
                                        <?php
                                    }
                                    $totGTransInt = 0;
                                    $totGTransAmt = 0;
                                    while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {

                                        $gId = $rowAllGirvi['gtrans_id'];
                                        $gTransGirviId = $rowAllGirvi['gtrans_girvi_id'];
                                        $gTransFirmType = $rowAllGirvi['gtrans_firm_type']; //get firm type @AUTHOR: SANDY14JAN14
                                        $custId = $rowAllGirvi['gtrans_cust_id'];
                                        $gFirmId = $rowAllGirvi['gtrans_firm_id'];
                                        $girviDOB = $rowAllGirvi['gtrans_DOB'];
                                        $gMainPrinAmt = $rowAllGirvi['gtrans_prin_amt'];
                                        $gMainInt = $rowAllGirvi['gtrans_paid_int'];
                                        $gTotalAmt = $rowAllGirvi['gtrans_paid_amt'];
                                        $girviDOR = $rowAllGirvi['gtrans_DOR'];
                                        $girviTransferLoanId = $rowAllGirvi['gtrans_trans_loan_id'];
                                        $globalGTransSerailNum = $rowAllGirvi['global_gt_serial_num'];
                                        $gOtherInfo = $rowAllGirvi['gtrans_comm'];   //ADD VARIABLE AUTHOR:GAUR08JUNE16
//                    $girviTokenNo = $rowAllGirvi['gtrans_token_num'];
                                        $girviPktNo = $rowAllGirvi['gtrans_packet_num'];

                                        if ($girviTransferLoanId != '') {
                                            $selAllTransGirvi = "SELECT ml_pre_serial_num,ml_serial_num FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]'";
                                            $resAllTransGirvi = mysqli_query($conn, $selAllTransGirvi);
                                            $rowAllTransGirvi = mysqli_fetch_array($resAllTransGirvi, MYSQLI_ASSOC);
                                            $gPreSerialNo = $rowAllTransGirvi['ml_pre_serial_num'];
                                            $gSerialNo = $rowAllTransGirvi['ml_serial_num'];
                                        } else {
                                            $gPreSerialNo = $rowAllGirvi['gtrans_pre_serial_num'];
                                            $gSerialNo = $rowAllGirvi['gtrans_serial_num'];
                                        }

                                        $girviTransStatus = $rowAllGirvi['gtrans_upd_sts'];
                                        //Start to get principal type @AUTHOR: SANDY18DEC13
                                        $prinType = $rowAllGirvi['gtrans_prin_typ'];
                                        //sTART to set girvi id depending on aprin or prin @AUTHOR: SANDY04JAN14
                                        if ($prinType == 'MainPrin' || $prinType == null) { //change in condition @AUTHOR: SANDY10JAN14
                                            $prinType = 'PRN';
                                            $prinTitle = "Main Principle"; //to set title @AUTHOR: SANDY14JAN14
                                            $gTransGirviId = $rowAllGirvi['gtrans_girvi_id'];
                                        } else {
                                            $prinType = 'APRN';
                                            $prinTitle = "Additional Principle"; //to set title @AUTHOR: SANDY14JAN14
                                            $gTransGirviId = $rowAllGirvi['gtrans_girvi_id']; //change in line @AUTHOR: SANDY31JAN14
                                        }
                                        //End to set girvi id depending on aprin or prin @AUTHOR: SANDY04JAN14
                                        //End to get principal type @AUTHOR: SANDY18DEC13
                                        $totTransPrin += $gMainPrinAmt;
                                        $totGTransInt += $gMainInt;
                                        $totGTransAmt += $gTotalAmt;
                                        //echo '$gFirmId:' . $gFirmId; 
                                        $qSelFirm = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' and firm_id='$gFirmId'";
                                        $resFirm = mysqli_query($conn, $qSelFirm);
                                        $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
                                        $gFirmName = $rowFirm['firm_name'];
                                        //***********************************************Start to add code for customer father name @AUTHOR: SANT12JAN16 ************************************************************************
                                        $selFatherName = "SELECT user_father_name,user_fname,user_lname,user_city FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$custId'";
                                        $resFatherName = mysqli_query($conn, $selFatherName);
                                        $rowFatherName = mysqli_fetch_array($resFatherName, MYSQLI_ASSOC);
                                        $gCustName = $rowFatherName['user_fname'] . ' ' . $rowFatherName['user_lname']; //to access cust name from cust table to avoid mismatch after update @AUTHOR: SANDY28JAN14
                                        $fatherName = $rowFatherName['user_father_name'];
                                        if ($fatherName[0] == 'S' || $fatherName[0] == 's') {
                                            $fatherName = 'W/o  ' . substr($fatherName, 1);
                                        } else {
                                            $fatherName = 'S/o  ' . substr($fatherName, 1);
                                        }
                                        $gCustCity = om_strtoupper($rowFatherName['user_city']);
                                        //End to add code for cust father name @AUTHOR: SANDY28JAN14 

                                        $qSelCustInfo = "SELECT girv_cust_fname,girv_cust_lname,girv_cust_city,girv_firm_id FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_id = '$gTransGirviId'";
                                        $resCustInfo = mysqli_query($conn, $qSelCustInfo);
                                        $rowCustInfo = mysqli_fetch_array($resCustInfo);
                                        //$gCustName = $rowAllGirvi['girv_cust_fname'] . ' ' . $rowAllGirvi['girv_cust_lname'];comment by @AUTHOR: SANDY28JAN14
                                        //  $gCustCity = $rowCustInfo['girv_cust_city'];
                                        $girviFirmId = $rowCustInfo['girv_firm_id'];

                                        $qSelFirm = "SELECT firm_name FROM firm where firm_id='$girviFirmId' and firm_own_id='$_SESSION[sessionOwnerId]'";
                                        $resFirm = mysqli_query($conn, $qSelFirm);
                                        $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
                                        $girviFirmName = $rowFirm['firm_name'];
                                        //START CODE  if loan transferred to ml get ml code @AUTHOR: SANDY14JAN14
                                        if ($gTransFirmType == 'MoneyLender') {
                                            $selMlCode = "SELECT user_unique_code FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id IN(SELECT ml_lender_id FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]')";
                                            $resMlCode = mysqli_query($conn, $selMlCode);
                                            $rowMlCode = mysqli_fetch_array($resMlCode, MYSQLI_ASSOC);
                                        }
                                        if ($rowAllGirvi['gtrans_DOR'] != '')
                                            $releaseDate = date('d M y', strtotime($rowAllGirvi['gtrans_DOR']));
                                        //END CODE  if loan transferred to ml get ml code @AUTHOR: SANDY14JAN14
                                        ?>
                                        <tr>
                                            <?php
                                            $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpSno' and omin_contents = 'transferred'";
                                            $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                            while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                                $panelVal = $rowLpLayoutDet['omin_value'];
                                                if ($panelVal == 'true') {
                                                    ?>    
                                                    <!--START Code To Add Function To Click On Girvi Id @AUTHOIR:PRIYA26FEB13-->
                                                    <td align="center" class="" width="60px">
                                                        <input type="submit" name="sNo" id="sNo" title="Single Click To View Girvi / Double Click To Select Girvi"
                                                               ondblclick="searchTransGirviByGirviId('<?php echo $custId; ?>', '<?php echo $gTransGirviId; ?>', 'mlLoanDetailsNavi');"
                                                               onclick="getGirviInfoPopUp(<?php echo $custId; ?>,<?php echo $gTransGirviId; ?>, '<?php echo $documentRootBSlash; ?>')"
                                                               value="<?php echo $gPreSerialNo . $gSerialNo; ?>"class="frm-btn-lnk-arial-Normal" readonly="true"/><!--Class Changed @Author:PRIYA26AUG13-->
                                                        <input type="hidden" name="girviId<?php echo $gCounter; ?>" id="girviId<?php echo $gCounter; ?>" value="<?php echo $gTransGirviId; ?>"/>
                                                    </td>
                                                <div id="display_girvi_info_popup" class="girvi_info_popup_trans_list"></div>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpPktno' and omin_contents = 'transferred'";
                                        $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                            $panelVal = $rowLpLayoutDet['omin_value'];
                                            if ($panelVal == 'true') {
                                                ?> 
                                                <!--END Code To Add Function To Click On Girvi Id @AUTHOIR:PRIYA26FEB13-->
                                                <td align="center" width="100px" class="">
                                                    <div class="h5 spaceLeftRight2"><?php
                                                        if ($girviPktNo != '')
                                                            echo $girviPktNo;
                                                        else
                                                            echo '-';
                                                        ?></div>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpPrinAmt' and omin_contents = 'transferred'";
                                        $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                            $panelVal = $rowLpLayoutDet['omin_value'];
                                            if ($panelVal == 'true') {
                                                ?> 
                                                <td align="right" class="" width="100px">
                                                    <div class="h5-no-pad spaceRight5"><?php echo formatInIndianStyle($gMainPrinAmt); ?></div>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpIntAmt' and omin_contents = 'transferred'";
                                        $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                            $panelVal = $rowLpLayoutDet['omin_value'];
                                            if ($panelVal == 'true') {
                                                ?> 
                                                <td align="right" class="" width="100px">
                                                    <div class="h5-no-pad spaceRight5"><?php
                                                        if ($gMainInt != '')
                                                            echo formatInIndianStyle($gMainInt);
                                                        else
                                                            echo '-';
                                                        ?></div>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpTotAmt' and omin_contents = 'transferred'";
                                        $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                            $panelVal = $rowLpLayoutDet['omin_value'];
                                            if ($panelVal == 'true') {
                                                ?> 
                                                <td align="right"  width="120px" class="pdngright20">
                                                    <div class="h5-no-pad spaceRight5"><?php
                                                        if ($gTotalAmt != '')
                                                            echo formatInIndianStyle($gTotalAmt);
                                                        else
                                                            echo '-';
                                                        ?></div>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpCustName' and omin_contents = 'transferred'";
                                        $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                            $panelVal = $rowLpLayoutDet['omin_value'];
                                            if ($panelVal == 'true') {
                                                ?> 
                                                <td align="left" class="pdngleft20" title="<?php echo $fatherName; ?>" width="100px">
                                                    <div class="h5 spaceLeftRight2"><?php echo substr($gCustName, 0, 25); ?></div>
                                                </td>
                                <!--                        <td align="left"  class="border-color-grey-rb" width="97px">
                                                    <div class="h5 spaceLeftRight2"><?php
//                                if ($custMobNo != '' || $custMobNo != NULL)
//                                    echo $custMobNo;
//                                else
//                                    echo '-';
                                                ?></div>
                                                </td>-->
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpFatherName' and omin_contents = 'transferred'";
                                        $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                            $panelVal = $rowLpLayoutDet['omin_value'];
                                            if ($panelVal == 'true') {
                                                ?> 
                                                <td align="left" class="" title="<?php echo substr($fatherName, 3); ?>" width="155px">
                                                    <div class="h5 spaceLeftRight2"><?php echo substr($fatherName, 3); ?></div>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpCity' and omin_contents = 'transferred'";
                                        $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                            $panelVal = $rowLpLayoutDet['omin_value'];
                                            if ($panelVal == 'true') {
                                                ?> 
                                                <td align="left" class="" title="<?php echo $gCustCity; ?>" width="40px">
                                                    <div class="h5 spaceLeftRight2"><?php echo substr($gCustCity, 0, 25); ?></div>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpEfirm' and omin_contents = 'transferred'";
                                        $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                            $panelVal = $rowLpLayoutDet['omin_value'];
                                            if ($panelVal == 'true') {
                                                ?> 
                                                <td align="left" class=""  width="90px">
                                                    <div class="h5 spaceLeftRight2"><?php echo $girviFirmName; ?></div>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpTfirm' and omin_contents = 'transferred'";
                                        $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                            $panelVal = $rowLpLayoutDet['omin_value'];
                                            if ($panelVal == 'true') {
                                                ?> 
                                                <!----Start to check transfer type and show ml code or firm @AUTHOR: SANDY14JAN14---->
                                                <?php if ($gTransFirmType == 'MoneyLender') { ?>
                                                    <td align="left" class="" width="70px">
                                                        <div class="h5 spaceLeftRight2"><?php echo $rowMlCode['user_unique_code']; ?></div>
                                                        <!---***********************************************Start to add code for customer father name @AUTHOR: SANT12JAN16 **********************************************------>               
                                                    </td>
                                                <?php } else { ?>
                                                    <td align="left" class="" width="70px">
                                                        <div class="h5 spaceLeftRight2"><?php echo $gFirmName; ?></div>
                                                    </td>
                                                <?php } ?>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpOtherIn' and omin_contents = 'transferred'";
                                        $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                            $panelVal = $rowLpLayoutDet['omin_value'];
                                            if ($panelVal == 'true') {
                                                ?> 
                                                <td align="left" class="" title="<?php echo $gOtherInfo; ?>" width="100px">
                                                    <div class="h5 spaceLeftRight2"><?php echo $gOtherInfo; ?></div>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpSdate' and omin_contents = 'transferred'";
                                        $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                            $panelVal = $rowLpLayoutDet['omin_value'];
                                            if ($panelVal == 'true') {
                                                ?> 
                                                <!----End to check transfer type and show ml code or firm @AUTHOR: SANDY14JAN14---->
                                                <!----------Start code to add title @Author:PRIYA29APR14----------------->
                                                <td align="right" width="74px" class="" <?php if ($releaseDate != '') { ?>title="RELEASE DATE : <?php echo om_strtoupper($releaseDate); ?>"<?php } ?>>
                                                    <div class="h5 spaceRight5"><?php
                                                        if ($nepaliDateIndicator == 'YES') {
                                                            echo $girviDOB;
                                                        } else {
                                                            echo om_strtoupper(date('d  M  y', strtotime($girviDOB)));
                                                        }
                                                        ?></div>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpRdate' and omin_contents = 'transferred'";
                                        $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                            $panelVal = $rowLpLayoutDet['omin_value'];
                                            if ($panelVal == 'true') {
                                                ?> 
                                                <!----------End code to add title @Author:PRIYA29APR14----------------->
                                                <td align="right" class=" widthPX96" <?php if ($releaseDate != '') { ?>title="RELEASE DATE : <?php echo om_strtoupper($releaseDate); ?>"<?php } ?>>
                                                    <div class="h5 spaceRight5"><?php
                                                        if ($girviDOR != '') {
                                                            if ($nepaliDateIndicator == 'YES') {
                                                                echo $girviDOR;
                                                            } else {
                                                                echo om_strtoupper(date('d  M  y', strtotime($girviDOR)));
                                                            }
                                                        } else {
                                                            echo '-';
                                                        }
                                                        ?></div>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpTyp' and omin_contents = 'transferred'";
                                        $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                            $panelVal = $rowLpLayoutDet['omin_value'];
                                            if ($panelVal == 'true') {
                                                ?> 
                                                <!-----Start to add column principal type @AUTHOR: SANDY18DEC13------------->
                                                <td align="center" width="30px" class="" title="<?php echo $prinTitle; ?>" ><!---Change in line to set Title @AUTHOR: SANDY14JAN14--->
                                                    <div class="h5"><?php echo $prinType; ?></div>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpSt' and omin_contents = 'transferred'";
                                        $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                            $panelVal = $rowLpLayoutDet['omin_value'];
                                            if ($panelVal == 'true') {
                                                ?> 
                                                <!-----End to add column principal type @AUTHOR: SANDY18DEC13------------->
                                                <!--------Start code to add column @Author:PRIYA29OCT13 ------------------>
                                                <td align="center" width="55px" class="" >
                                                    <div class="h5"><?php if ($girviTransStatus == 'Transferred') { ?>
                                                            <img src="<?php echo $documentRoot; ?>/images/active.png" alt=""/>
                                                        <?php } else { ?>
                                                            <img src="<?php echo $documentRoot; ?>/images/released.png" alt=""/>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpDel' and omin_contents = 'transferred'";
                                        $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                            $panelVal = $rowLpLayoutDet['omin_value'];
                                            if ($panelVal == 'true') {
                                                ?> 
                                                <!---------Start code to add staff access condition @Author:PRIYA28FEB15----------->
                                                <?php if ($staffId && $array['delTransLoan'] == 'false') { ?>
                                                <?php } else { ?>
                                                    <td align="center" width="22px" class=" paddingTop1 noPrint" valign="middle">
                                                        <div id="transGirviDeleteButDiv">
                                                            <img src="<?php echo $documentRoot; ?>/images/img/trash.png" width="13px" alt="" style="cursor: pointer;" 
                                                                 onclick="javascript:deleteTransGirvi('<?php echo "$gId"; ?>', 'girviTransPanel', '<?php echo $selFirmId; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $pageNum ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $gTransGirviId; ?>', '<?php echo $prinType; ?>');" />
                                                        </div>
                                                    </td>
                                                <?php } ?>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <!---------End code to add staff access condition @Author:PRIYA28FEB15----------->
                                        <!--------End code to add column @Author:PRIYA29OCT13 ------------------>
                            </tr>
                            <?php
                            $gCounter++;
                        } if ($totTransPrin != 0) {
                            ?>
                            <tr align="right" class="totlBg height28">
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpSno' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td class="h5  heightPX15 bold">
                                            <div class="spaceRight5">TOTAL</div>
                                        </td>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpPktno' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td class="h5  heightPX15 bold"></td>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpPrinAmt' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td title="Total Principal Amount of This Page!" class="h5  heightPX15 bold">
                                            <div class="spaceRight5"><?php echo formatInIndianStyle($totTransPrin); ?></div>
                                        </td>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpIntAmt' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td title="Total Interest Amount of This Page!" class="h5  heightPX15 bold">
                                            <div class="spaceRight5"><?php echo formatInIndianStyle($totGTransInt); ?></div>
                                        </td>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpTotAmt' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td title="Total Amount of This Page!" class="h5 heightPX15 bold">
                                            <div class="spaceRight5"><?php echo formatInIndianStyle($totGTransAmt); ?></div>
                                        </td>
                                        <?php
                                    }
                                }
                                ?>
    <!--            <td colspan="11" class="h5 border-color-grey-b heightPX15">&nbsp;
    </td>-->
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpCustName' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td class=""></td>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpFatherName' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td class=""></td>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpCity' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td class=""></td>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpEfirm' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td class=""></td>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpTfirm' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td class=""></td>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpOtherIn' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td class=""></td>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpSdate' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td class=""></td>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpRdate' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td class=""></td>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpTyp' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td class=""></td>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpSt' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td class=""></td>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpDel' and omin_contents = 'transferred'";
                                $resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
                                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                    $panelVal = $rowLpLayoutDet['omin_value'];
                                    if ($panelVal == 'true') {
                                        ?> 
                                        <td class=""></td>
                                        <?php
                                    }
                                }
                                ?>
                            </tr>
                        <?php } ?>
                        <!----Start to implement paging @AUTHOR: SANDY28OCT13------->
                        <!---Start of Changes in paging part @AUTHOR: SANDY30OCT13 --------------------->
                        <!----Start of Changes in code to add new field @AUTHOR: SANDY6NOV13--------------->
                        <table width="100%">
                            <?php
                            if ($totalGirviCheck > 0) {
                                $noOfPagesAsLink = ceil($totalGirviCheck / $rowsPerPage);
                                if ($pageNum > $noOfPagesAsLink || $pageNum < 0) {
                                    echo "<h1> ~ This Page is not available. ~ </h1>";
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="13" align="right" class="noPrint">
                                            <table cellpadding="2" cellspacing="2" border="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                        <?php if (($pageNum - 1) != '0') { ?>
                                                            <input type="submit" id="prvPageButt" name="prvPageButt" value="PREV" class="pageNoButton"
                                                            <?php if ($selMlName == 'TR ML') { ?>
                                                                       onclick="javascript:showSelectedPage('<?php echo $pageNum - 1; ?>', 'TransferredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('searchGirviByMlName').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '');"
                                                                   <?php } else { ?>
                                                                       onclick="javascript:showSelectedPage('<?php echo $pageNum - 1; ?>', 'TransferredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('searchGirviByMlName').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $selMlName; ?>', '<?php echo $gTransStatus; ?>', '');"
                                                                   <?php } ?> /><!---Change in function parameter @AUTHOR: SANDY05FEB14--->
                                                               <?php } ?>
                                                    </td>
                                                    <?php
                                                    if ($pageNum == 1 || $pageNum < 10) {
                                                        for ($i = 1; $i <= 10; $i++) {
                                                            if (($noOfPagesAsLink >= $i) && ($noOfPagesAsLink != 1)) {
                                                                ?>
                                                                <td align="right">
                                                                    <input type="submit" id="pageNoTextField<?php echo $i; ?>" name="pageNoTextField<?php echo $i; ?>" <?php if (($i == 1) && ($pageNum == 1)) { ?>class="currentPageNoButton" <?php } else { ?>class="pageNoButton" <?php } ?>
                                                                           value="<?php echo $i ?>"
                                                                           <?php if ($selMlName == 'TR ML') { ?>
                                                                               onclick="javascript:showSelectedPage(this.value, 'TransferredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('searchGirviByMlName').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '');"
                                                                           <?php } else { ?>
                                                                               onclick="javascript:showSelectedPage(this.value, 'TransferredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('searchGirviByMlName').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $selMlName; ?>', '<?php echo $gTransStatus; ?>', '');"
                                                                           <?php } ?> 
                                                                           /><!---Change in function parameter @AUTHOR: SANDY05FEB14--->
                                                                </td>
                                                                <?php
                                                            }
                                                        }
                                                    } else {
                                                        for ($i = 1; $i <= 10; $i++) {
                                                            ?>
                                                            <td align="right">
                                                                <input type="submit" id="pageNoTextField<?php echo $i; ?>" name="pageNoTextField<?php echo $i; ?>" class="pageNoButton" 
                                                                <?php if ($selMlName == 'TR ML') { ?>
                                                                           onclick="javascript:showSelectedPage(this.value, 'TransferredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('searchGirviByMlName').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '');"
                                                                       <?php } else { ?>
                                                                           onclick="javascript:showSelectedPage(this.value, 'TransferredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('searchGirviByMlName').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $selMlName; ?>', '<?php echo $gTransStatus; ?>', '');"
                                                                       <?php } ?> 
                                                                       /><!---Change in function parameter @AUTHOR: SANDY05FEB14--->
                                                            </td>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <td align="right">
                                                        <?php if (($pageNum + 1) <= $noOfPagesAsLink) { ?>
                                                            <input type="submit" id="nextPageButt" name="nextPageButt" value="NEXT" class="pageNoButton"
                                                            <?php if ($selMlName == 'TR ML') { ?>
                                                                       onclick="javascript:showSelectedPage('<?php echo $pageNum + 1; ?>', 'TransferredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('searchGirviByMlName').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '');"
                                                                   <?php } else { ?>
                                                                       onclick="javascript:showSelectedPage('<?php echo $pageNum + 1; ?>', 'TransferredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('searchGirviByMlName').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $selMlName; ?>', '<?php echo $gTransStatus; ?>', '');"
                                                                   <?php } ?> 
                                                                   /><!---Change in function parameter @AUTHOR: SANDY05FEB14--->
                                                               <?php } ?>
                                                    </td>
                                                    <?php if ($noOfPagesAsLink > 1) { ?>
                                                        <!--Start to add textfield to navigate to any page randomly @AUTHOR: SANDY31OCT13------------->
                                                        <!---Change in value of input field @AUTHOR: SANDY9NOV13------------------>
                                                        <td align="right" class="paddingLeft15">
                                                            <input type="text" id="enterPageNo" name="enterPageNo" placeholder="PAGE NO" class="pageNoButton" size="7"
                                                            <?php if ($selMlName == 'TR ML') { ?>  
                                                                       onblur="if (this.value !== '') {
                                                                                                   javascript:showSelectedPage(this.value, 'TransferredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('searchGirviByMlName').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '');
                                                                                               }"
                                                                       onkeypress="if (event.keyCode == '13') {
                                                                                                   if (this.value !== '') {
                                                                                                       javascript:showSelectedPage(this.value, 'TransferredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('searchGirviByMlName').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '');
                                                                                                   }
                                                                                               }"
                                                                   <?php } else { ?>     
                                                                       onblur="if (this.value !== '') {
                                                                                                   javascript:showSelectedPage(this.value, 'TransferredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('searchGirviByMlName').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $selMlName; ?>', '<?php echo $gTransStatus; ?>', '');
                                                                                               }"
                                                                       onkeypress="if (event.keyCode == '13') {
                                                                                                   if (this.value !== '') {
                                                                                                       javascript:showSelectedPage(this.value, 'TransferredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('searchGirviByMlName').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $selMlName; ?>', '<?php echo $gTransStatus; ?>', '');
                                                                                                   }
                                                                                               }"
                                                                   <?php } ?> 
                                                                   onclick="this.value = '';"
                                                                   /><!---Change in function parameter @AUTHOR: SANDY05FEB14--->
                                                        </td>
                                                        <!--End to add textfield to navigate to any page randomly @AUTHOR: SANDY31OCT13------------->
                                                    <?php } ?>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?> 
                        </table>          
                        <!----End of Changes in code to add new field @AUTHOR: SANDY6NOV13--------------->
                        <!----End of Changes in paging part @AUTHOR: SANDY30OCT13 --------------------->
                        <!-----End Code to implement paging @AUTHOR: SANDY28OCT13  ----------------->
                        <!---End to add token no @OMMODTAG SHRI_30NOV15------------->
                    </table>
                    <div id="ajaxLoadNextGirviPanelList" style="visibility: hidden" align="right">
                        <?php include 'omzaajld.php'; ?>
                    </div>
                </td>
            </tr>
        </table>
        </td>
        </tr>
        </table>
    </div>
    <?php }else{ ?>
    <table border="0" cellspacing="0" cellpadding="5" align="center" width="100%"><!------noPrint removed @Author:PRIYA29MAY14----------->
    <tr>
        <td valign="middle" align="left" width="18px">
            <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/active.png" alt=""  onLoad="setScrollIdFun('girviPanelTrId')"/></div>
        </td>
        <td valign="middle" align="left">
            <div class="main_link_green"><b>TRANSFER LOANS LIST</b></div><!--Change @AUTHOR: SANDY29DEC13---->
        </td>
    </tr>
</table>
<?php
/************ Start Code To GET Firm Details ********* */
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR: SANDY10JUL13
    $selFirmId = $_SESSION['setFirmSession'];
}
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    $INT = 'girv_pl_total_final_intrest';
    $AMT = 'girv_pl_total_amt';
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
    $INT = 'girv_pl_total_final_iintrest';
    $AMT = 'girv_pl_total_iamt';
}
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
    //Set String for Public Firms
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}
/* * *********** End Code To GET Firm Details ********* */
$noOfMonths = $_POST['expMonths'];
if ($noOfMonths == '') {
    $noOfMonths = $_GET['expMonths'];
}
if ($noOfMonths == '') {
    $noOfMonths = 11;
}
//
// **********************************************************************************
// START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// **********************************************************************************
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
if ($nepaliDateIndicator == 'YES') {
    $loan_date_col = "STR_TO_DATE(girv_other_lang_DOB,'%d-%m-%Y')";
} else {
    $loan_date_col = "STR_TO_DATE(girv_new_DOB,'%d %b %Y')";
}
//
// ********************************************************************************
// END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// ********************************************************************************
//
include 'omdatatablesUnset.php';
//Data Table Main Columns
$dataTableColumnsFields = array(
    array('dt' => 'S.NO.'),
    array('dt' => 'PKT NO'),
    array('dt' => 'PRIN.AMT'),
    array('dt' => 'TOTAL PRIN'),
    array('dt' => 'INTEREST'),
    array('dt' => 'TOTAL AMT'),
    array('dt' => 'CUST NAME'),
    array('dt' => 'MOB NO'),
    array('dt' => 'CITY'),
    array('dt' => 'EFIRM'),
    array('dt' => 'TFIRM'),
    array('dt' => 'TYP'),
    array('dt' => 'S. DATE'),//OTHER INFORMATION COLUMN ADDED @AUTHOR:MADHUREE-24JULY2020
    array('dt' => 'TRANSFER DATE'), //transfer date column is addded 
    array('dt' => 'R. DATE'),//LOCATION INFORMATION COLUMN ADDED @AUTHOR:MARUTI-31MAY2022
    array('dt' => 'ML NAME'),
    array('dt' => 'TRANSFER AMT'),
    array('dt' => 'T.AMT INT') //transfer amt interest column is added 
);
$_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
//
// Table Parameters
$_SESSION['tableName'] = 'girvi'; // Table Name
$_SESSION['tableNamePK'] = 'girv_id'; // Primary Key
// DB Table Columns Parameters 
    $dbColumnsArray = array(
        "CONCAT(girv_pre_serial_num, CONVERT(girv_serial_num, CHAR(12)))",
        "girv_packet_num",
        "girv_main_prin_amt",
        "girv_pl_total_prin_amt",
        "$INT",
        "$AMT ",
        "CONCAT(girv_cust_fname, ' ', girv_cust_lname)",
        "t.user_mobile",
        "girv_cust_city",
        "f.firm_name",
        "frm.firm_name",
        "gtrans_trans_type",
        "$loan_date_col",//OTHER INFORMATION COLUMN ADDED @AUTHOR:MADHUREE-24JULY2020
        "gtrans_DOB", //transfer date value
        "girv_DOR",  //LOCATION INFORMATION COLUMN ADDED @AUTHOR:MARUTI-31MAY2022
        "CONCAT(m.user_fname, ' ', m.user_lname)",
        "gt.gtrans_prin_amt", 
        "gtrans_interest_amt" //transfer interest amount value
        );
$_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
if ($staffId != '') {
$_SESSION['dtSumColumn'] = '';
}else{
    $_SESSION['dtSumColumn'] = '2,3,4,5';
}
$_SESSION['dtDeleteColumn'] = '';
//
// Extra direct columns we need pass in SQL Query
$_SESSION['sqlQueryColumns'] = "girv_id, girv_cust_id,girv_transfer_ml_id,";
////start code to include all session@auth:ATHU29may17
$_SESSION['colorfulColumn'] = "";
$_SESSION['colorfulColumnCheck'] = '';
$_SESSION['colorfulColumnTitle'] = '';
//
// On Click Function Parameters
$_SESSION['onclickColumnImage'] = "";
$_SESSION['onclickColumn'] = "CONCAT(girv_pre_serial_num, CONVERT(girv_serial_num, CHAR(12)))"; // On which column
$_SESSION['onclickColumnId'] = "girv_id";
$_SESSION['onclickColumnValue'] = "girv_id";
$_SESSION['onclickColumnFunction'] = "getGirviInfoPopUp";
$_SESSION['onclickColumnFunctionPara1'] = "girv_cust_id";
$_SESSION['onclickColumnFunctionPara2'] = "girv_id";
$_SESSION['onclickColumnFunctionPara3'] = "";
$_SESSION['onclickColumnFunctionPara4'] = "";
$_SESSION['onclickColumnFunctionPara5'] = "";
$_SESSION['onclickColumnFunctionPara6'] = "";
//
// Delete Function Parameters
$_SESSION['deleteColumn'] = "gtrans_id"; // On which column
$_SESSION['deleteColumnId'] = "";
$_SESSION['deleteColumnValue'] = "";
$_SESSION['deleteColumnFunction'] = "";
$_SESSION['deleteColumnFunctionPara1'] = "gtrans_id"; // Panel Name
$_SESSION['deleteColumnFunctionPara2'] = "girviTransPanel";
$_SESSION['deleteColumnFunctionPara3'] = "";
$_SESSION['deleteColumnFunctionPara4'] = "";
$_SESSION['deleteColumnFunctionPara5'] = "";
$_SESSION['deleteColumnFunctionPara6'] = "";
// 
// Where Clause Condition 
$_SESSION['tableWhere'] = "girv_upd_sts IN ('New','Updated','ReleaseCart','Released','FReleased') and (girv_firm_id IN ($strFrmId) or girv_trans_firm_id IN($strFrmId)) and girv_transfer_id is not null";
// girv_upd_sts IN ('New','Updated','ReleaseCart') and girv_firm_id IN ($strFrmId)
// Table Joins
$_SESSION['tableJoin'] = " INNER JOIN firm AS f ON girv_firm_id=f.firm_id "
        . "LEFT JOIN user AS t ON t.user_id=girv_cust_id LEFT JOIN user AS m ON m.user_id=girv_transfer_ml_id  LEFT JOIN girvi_transfer AS gt ON gtrans_id=girv_transfer_id  LEFT JOIN firm AS frm ON frm.firm_id=gtrans_firm_id ";
// 
// Data Table Main File
include 'omdatatables.php';
?>
    <?php } ?>
</div>
