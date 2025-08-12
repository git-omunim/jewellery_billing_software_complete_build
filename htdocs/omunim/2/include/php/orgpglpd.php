<?php
/*
 * ***************************************************************************************
 * @tutorial: This segment used to display Active Girvi List in Girvi Panel.
 * **************************************************************************************
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: orgpglpd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMunim
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
$currentFileName = basename(__FILE__);
//Start Staff Access API @AUTHOR: SANDY09JAN14
$accFileName = $currentFileName;
include 'ommpemac.php';
//End Staff Access API @AUTHOR: SANDY09JAN14
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<!--ADDED CODE FOR PRINT BUTTON NOT WORKING ISSUE @AUTHOR:PRIYANKA-17FEB2023-->
<div id="girviListPanelNewDiv">
    <div id="girviPanelTrId"></div>
    <!--Start code for father last name @Author : AshwiniPatil 15Feb2021-->
    <?php
    $selfatherLastName = "SELECT omly_value FROM omlayout WHERE omly_option = 'setFatherLastName'";
    $resfatherLastName = mysqli_query($conn, $selfatherLastName);
    $rowfatherLastName = mysqli_fetch_array($resfatherLastName);
    $fatherLastName = $rowfatherLastName['omly_value'];
    ?>
    <!--Start code for father last name @Author : AshwiniPatil 15Feb2021-->
    <?php
    $staffId = $_SESSION['sessionStaffId'];
    /************ Start Code To GET Firm Details ********* */
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        //if not selected assign session firm @AUTHOR: SANDY10JUL13
        $selFirmId = $_SESSION['setFirmSession'];
    }
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
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
        $loan_date_col = "STR_TO_DATE(girv_other_lang_DOB, '%e-%c-%Y')";
    } else {
        $loan_date_col = "STR_TO_DATE(girv_DOB,'%d %b %Y')";
    }
    // Start Staff loan panel delete column access 
    $staffDelColAcc = "select acc_access from access where acc_emp_id = '$staffId' and acc_check_id='deleteGirviAccess' and acc_name='Delete Girvi'";
    $resStaffDelColAcc = mysqli_query($conn, $staffDelColAcc);
    $rowStaffDelColAcc = mysqli_fetch_array($resStaffDelColAcc);
    $getStaffDelColAcc = $rowStaffDelColAcc['acc_access'];
    //End Staff loan panel delete column access 
    //
    // ********************************************************************************
    // END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
    // ********************************************************************************
    //
    /************ End Code To GET Firm Details ********* */
    //Data Table Main Columns
    include 'omdatatablesUnset.php';
    //
    $dataTableColumnsFields = array(
        array('dt' => 'S.NO.'),
        array('dt' => 'ST. DATE'),
        array('dt' => 'PRIN.AMT.'),
        array('dt' => 'CUSTOMER NAME'),
        array('dt' => 'MOBILE'),
        array('dt' => 'VILLAGE'),
        array('dt' => 'CITY'),
        array('dt' => 'EX. FIRM'),
        array('dt' => 'TR. FIRM'),
        array('dt' => 'ML. FIRM'),
        array('dt' => 'LOAN TYPE'),
        array('dt' => 'ADHAAR NO.'),
        array('dt' => 'WARD NO.'),
        array('dt' => 'CASTE'),
        array('dt' => 'DELETE')
    );
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    //
    // Table Parameters
    $_SESSION['tableName'] = 'girvi'; // Table Name
    $_SESSION['tableNamePK'] = 'girv_id'; // Primary Key
    // DB Table Columns Parameters 
    //<!--Start code for father last name @Author : AshwiniPatil 15Feb2021-->
    if ($fatherLastName == YES) {
        $dbColumnsArray = array(
            "CONCAT(COALESCE(girv_pre_serial_num, ''), CONVERT(girv_serial_num, CHAR(12)))",
            "$loan_date_col",
            "CAST(girv_prin_amt AS SIGNED)",
            "CONCAT(UCASE(girv_cust_fname) ,' ', UCASE(SUBSTRING(u.user_father_name, 2)),' ', UCASE(girv_cust_lname))",
            "u.user_mobile",
            "u.user_village",
            "girv_cust_city",
            "f.firm_name",
            "t.firm_name",
            "s.user_unique_code",
            "girv_type",
            "u.user_adhaar_card",
            "u.user_ward_no",
            "u.user_caste",
            "girv_id"
        );
    } else {

        $dbColumnsArray = array(
            "CONCAT(COALESCE(girv_pre_serial_num, ''), CONVERT(girv_serial_num, CHAR(12)))",
            "$loan_date_col",
            "CAST(girv_prin_amt AS SIGNED)",
            "CONCAT(UCASE(girv_cust_fname),' ', UCASE(girv_cust_lname))",
            "u.user_mobile",
            "u.user_village",
            "girv_cust_city",
            "f.firm_name",
            "t.firm_name",
            "s.user_unique_code",
            "girv_type",
            "u.user_adhaar_card",
            "u.user_ward_no",
            "u.user_caste",
            "girv_id"
        );
    }
    //<!--End code for father last name @Author : AshwiniPatil 15Feb2021-->
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
    $_SESSION['dtSumColumn'] = '2';
    $_SESSION['dtDeleteColumn'] = '9';
    //
    // Extra direct columns we need pass in SQL Query
    $_SESSION['sqlQueryColumns'] = "girv_id, girv_cust_id,";
    ////start code to include all session@auth:ATHU29may17
    $_SESSION['colorfulColumn'] = "";
    $_SESSION['colorfulColumnCheck'] = '';
    $_SESSION['colorfulColumnTitle'] = '';
    // On Click Function Parameters
    $_SESSION['onclickColumnImage'] = "";
    $_SESSION['onclickColumn'] = "CONCAT(COALESCE(girv_pre_serial_num, ''), CONVERT(girv_serial_num, CHAR(12)))"; // On which column
    $_SESSION['onclickColumnId'] = "girv_id"; //input type id
    $_SESSION['onclickColumnValue'] = "girv_id"; //input type value
    $_SESSION['onclickColumnFunction'] = "getGirviInfoPopUp";
    $_SESSION['onclickColumnFunctionPara1'] = "girv_cust_id";
    $_SESSION['onclickColumnFunctionPara2'] = "girv_id";
    $_SESSION['onclickColumnFunctionPara3'] = "";
    $_SESSION['onclickColumnFunctionPara4'] = "";
    $_SESSION['onclickColumnFunctionPara5'] = "";
    $_SESSION['onclickColumnFunctionPara6'] = "";
    //
    // Delete Function Parameters
    if ($getStaffDelColAcc == 'true' || ($getStaffDelColAcc == '' && $staffId == '')) {
        $_SESSION['deleteColumn'] = "girv_id"; // On which column
        $_SESSION['deleteColumnId'] = "girv_id";
        $_SESSION['deleteColumnValue'] = "girv_id";
        $_SESSION['deleteColumnFunction'] = "deleteRecordId";
        $_SESSION['deleteColumnFunctionPara1'] = "loanPanel"; // Panel Name Direct Value
        $_SESSION['deleteColumnFunctionPara2'] = "girv_id"; // DB Value
        $_SESSION['deleteColumnFunctionPara3'] = "";
        $_SESSION['deleteColumnFunctionPara4'] = "";
        $_SESSION['deleteColumnFunctionPara5'] = "";
        $_SESSION['deleteColumnFunctionPara6'] = "";
    } else {
        $_SESSION['deleteColumn'] = "girv_id"; // On which column
        $_SESSION['deleteColumnId'] = "girv_id";
        $_SESSION['deleteColumnValue'] = "girv_id";
        $_SESSION['deleteColumnFunction'] = "";
        $_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name Direct Value
        $_SESSION['deleteColumnFunctionPara2'] = ""; // DB Value
        $_SESSION['deleteColumnFunctionPara3'] = "";
        $_SESSION['deleteColumnFunctionPara4'] = "";
        $_SESSION['deleteColumnFunctionPara5'] = "";
        $_SESSION['deleteColumnFunctionPara6'] = "";
    }
    // 
    // Where Clause Condition 
    $_SESSION['tableWhere'] = "girv_upd_sts IN ('New', 'Updated') and (girv_firm_id IN ($strFrmId) or girv_trans_firm_id IN($strFrmId))";
    // 
    // Table Joins
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON girv_firm_id=f.firm_id "
        . "LEFT JOIN user AS u ON girv_cust_id=u.user_id "
        . "LEFT JOIN user AS s ON girv_transfer_ml_id=s.user_id "
        . "LEFT JOIN firm AS t ON girv_trans_firm_id=t.firm_id";
    //
    //echo '$_SESSION[tableJoin]=='.$_SESSION['tableJoin'].'<br>';
    //echo '$_SESSION[tableWhere]=='.$_SESSION['tableWhere'].'<br>';
    // 
    // Data Table Main File
    include 'omdatatables.php';
    ?>
</div>