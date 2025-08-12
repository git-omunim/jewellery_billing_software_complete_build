<?php
/*
 * **************************************************************************************
 * @Description: STOCK TRANSFER REPORT @PRIYANKA-04DEC2021
 * **************************************************************************************
 *
 * Created on DEC 04, 2021 07:00:00 PM 
 * **************************************************************************************
 * @FileName: omStockTransferReport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.7.102
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * *****************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE: PRIYANKA-25NOV2021
 *  AUTHOR: 
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 2.7.102
 * Version: 2.7.102
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
$currentFileName = basename(__FILE__);
$accFileName = $currentFileName;
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include 'ommpsbac.php';
include_once 'ommpfndv.php';
include_once 'conversions.php';
require_once 'ommpincr.php';
$staffId = $_SESSION['sessionStaffId'];
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();


$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];

$selnepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
$resnepaliDateMonthFormat = mysqli_query($conn, $selnepaliDateMonthFormat);
$rownepaliDateMonthFormat = mysqli_fetch_array($resnepaliDateMonthFormat);
$nepaliDateMonthFormat = $rownepaliDateMonthFormat['omly_value'];
?>
<div id="stockManagementByCounterMainDiv">
    <?php
    //
    //print_r($_REQUEST);
    //
    $sessionOwnerId = $_SESSION['sessionOwnerId'];
    $conn = $GLOBALS['conn'];
    $currentDateTime = $GLOBALS['currentDateTime'];
    //
    //
    //echo '$sessionOwnerId == ' . $sessionOwnerId . '<br />';
    //
    //
    $stockTransferNavPanelName = 'stockTransferReportPanel';
    //
    //
    $selectedStaff = $_GET['selectedStaff'];
    //
    $productCounter = $_GET['productCounter'];
    //
    $selectedFirm = $_GET['selectedFirm'];
    //
    //
    if ($custId == '' || $custId == NULL)
        $custId = $_GET['custId'];
    //
    if ($userId == '' || $userId == NULL)
        $userId = $_GET['custId'];
    //
    if ($custId == '' || $custId == NULL)
        $custId = $_GET['userId'];
    //
    if ($userId == '' || $userId == NULL)
        $userId = $_GET['userId'];
    //
    if ($indicator == '' || $indicator == NULL)
        $indicator = $_GET['indicator'];
    //
    $indicator = 'stock';
    //
    if ($panelName == '' || $panelName == NULL)
        $panelName = $_GET['panelName'];
    //
    if ($transType == '' || $transType == NULL)
        $transType = $_GET['transactionType'];
    //
    if ($showMessageDiv == '' || $showMessageDiv == NULL)
        $showMessageDiv = $_GET['showMessageDiv'];
    //
    if ($userId != NULL && $userId != '') {
        parse_str(getTableValues("SELECT * FROM user WHERE user_id = '$userId'"));
    }
    //
    //
    $messDiv = $_GET['messDiv'];
    //    
    //    
    //print_r($_REQUEST);
    //
    //
    // Added Code To GET Firm Details @AUTHOR:PRIYANKA-04DEC2021
    $selFirmId = NULL;
    //
    $firmIdSelected = NULL;
    //
    $selFirmId = $_REQUEST['firmId'];
    //
    if (!isset($selFirmId)) {
        $firmIdSelected = $_SESSION['setFirmSession'];
        $selFirmId = $firmIdSelected;
    } else {
        $firmIdSelected = $selFirmId;
    }
    //
    //
    if ($selectedFirm != '' && $selectedFirm != NULL) {
        $firmIdSelected = $selectedFirm;
    }
    //
    //
    //echo 'selFirmId == ' . $selFirmId . '<br />';
    //echo 'firmId == ' . $_REQUEST['firmId'] . '<br />';
    //echo 'firmIdSelected == ' . $firmIdSelected . '<br />';
    //echo 'setFirmSession == ' . $_SESSION['setFirmSession'] . '<br />';
    //echo 'documentRoot == ' . $documentRoot . '<br />';
    //
    //
    // Start Code To GET Firm Details @AUTHOR:PRIYANKA-04DEC2021
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        //if not selected assign session firm @AUTHOR:PRIYANKA-04DEC2021
        $selFirmId = $_SESSION['setFirmSession'];
    }
    //
    //
    //echo 'firmId == ' . $_REQUEST['firmId'] . '<br />';
    //echo 'strFrmId == ' . $strFrmId . '<br />';
    //echo 'selFirmId == ' . $selFirmId . '<br />';
    //
    //
    if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
        if ($_REQUEST['firmId'] != NULL && $_REQUEST['firmId'] != '') {
            $selFirmId = $_REQUEST['firmId'];
        }
    }
    //
    //
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        //
        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type = 'Public' and firm_own_id = '$_SESSION[sessionOwnerId]' "
                       . "$sessionFirmStr";
        //
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        //
        $qSelFirmCount = "SELECT firm_id, firm_name, firm_type FROM firm where firm_own_id = '$_SESSION[sessionOwnerId]' "
                       . "$sessionFirmStr order by firm_since desc";
        //
    }
    //
    if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
        $resFirmCount = mysqli_query($conn, $qSelFirmCount);
        $strFrmId = '0';
        //Set String for Public Firms @AUTHOR:PRIYANKA-04DEC2021
        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
            $strFrmId = $strFrmId . ",";
            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
        }
    } else {
        $strFrmId = $selFirmId;
    }
    // End Code To GET Firm Details @AUTHOR:PRIYANKA-04DEC2021
    //
    //
    //echo 'firmId == ' . $_REQUEST['firmId'] . '<br />';
    //echo 'strFrmId == ' . $strFrmId . '<br />';
    //echo 'selFirmId == ' . $selFirmId . '<br />';
    //
    //
    // START DATE @AUTHOR:PRIYANKA-04DEC2021
$FromDate = $_REQUEST['FromDate'];
//
$DateCheck = $FromDate;
//
if ($FromDate != '') {
    $fromDate = date("d M Y", strtotime($FromDate));
}
//
if ($FromDate == '' || $FromDate == NULL) {
    $FromDate = date("d-m-Y");
    $fromDate = date("d M Y", strtotime($FromDate));
}
//
//
// END DATE @AUTHOR:PRIYANKA-04DEC2021
$ToDate = $_REQUEST['ToDate'];
//
$toDate = date("d M Y", strtotime($ToDate));
//
if ($ToDate == '' || $ToDate == NULL) {
    $ToDate = date("d-m-Y");
    $toDate = date("d M Y", strtotime($ToDate));
}
//
$todayDate = $fromDate;
//
//
$todayStrDate = strtotime($todayDate);
//
// START DATE STR @AUTHOR:PRIYANKA-04DEC2021
$todayFromStrDate = strtotime($fromDate);
// END DATE STR @AUTHOR:PRIYANKA-04DEC2021
//
$todayToStrDate = strtotime($toDate);
//
//
//print_r($_REQUEST);
//echo '<br />';
//
//echo '$todayFromStrDate == ' . $todayFromStrDate . '<br />';
//echo '$todayToStrDate == ' . $todayToStrDate . '<br />';
//
//
$startDate = strtoupper($fromDate);
$endDate = strtoupper($toDate);
//
//
//echo '$startDate == ' . $startDate . '<br />';
//echo '$endDate == ' . $endDate . '<br />';
//
//
?>
<?php
//
// ADDED CODE FOR PANEL LABELS @AUTHOR:PRIYANKA-26JULY2022
$headingNameForPanel = 'STOCK TRANSFER REPORT';
//
// ADDED CODE FOR ALL BUTTONS DISPLAY @AUTHOR:PRIYANKA-26JULY2022
include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportAllButtons.php';
//
?>
<!--<table width="100%" border="0">
        <tr>
            <td>
                <div class="textLabelHeading">
                    <img src="<?php //echo $documentRootBSlash; ?>/images/transfer24.png" alt="">
                    STOCK TRANSFER REPORT
                </div>
            </td>           
            <td valign="middle" align="left" width="15%">
                <div id="stockTransferHistoryButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK TRANSFER HISTORY PANEL @PRIYANKA-04DEC2021
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
//                    $stockTransferHistoryPanelName = 'stockTransferHistoryPanel';
//                    //
//                    // Input Box Type and Ids
//                    $inputType = 'submit';
//                    $inputIdButton = 'stockTransferHistoryButt';
//                    $inputNameButton = 'stockTransferHistoryButt';
//                    //
//                    //
//                    // This is the main class for input flied
//                    $inputFieldClass = 'btn btn-primary';
//                    //
//                    $inputStyle = 'height:22px;width:150px;font-weight:bold;font-size:12px;'
//                                . 'padding-top:0px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
//                                . 'text-align:center;margin-left:18px; background-color: #ffc0cb;color:#dc143c;';
//                    //
//                    $inputLabel = 'STOCK TRANSFER HISTORY'; // Display Label 
//                    //
//                    //
//                    // This class is for Pencil Icon                                                           
//                    $inputIconClass = 'fa fa-inr';
//                    // 
//                    // Place Holder inside input box
//                    $inputPlaceHolder = 'STOCK TRANSFER HISTORY';
//                    //
//                    // Place Holder in span outside input box
//                    $spanPlaceHolderClass = '';
//                    $spanPlaceHolder = '';
//                    // 
//                    // Event Options
//                    //
//                    // On Change Function
//                    $inputOnChange = "";
//                    $inputKeyUpFun = '';
//                    //
//                    //
//                    $inputOnClickFun = 'stockTransferHistoryFunc("' . $stockTransferHistoryPanelName . '");';
//                    //
//                    $inputDropDownCls = '';               // This is the main division class for drop down 
//                    $inputselDropDownCls = '';            // This is class for selection in drop down
//                    $inputMainClassButton = '';           // This is the main division for Button
//                    // 
//                    //* **************************************************************************************
//                    //* END CODE FOR STOCK TRANSFER HISTORY PANEL @PRIYANKA-04DEC2021
//                    //* **************************************************************************************
//                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //}
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="left" width="15%">
                <div id="stockTransferReportButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK TRANSFER REPORT @PRIYANKA-04DEC2021
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
//                    $stockTransferPanelName = 'stockTransferReportPanel';
//                    //
//                    // Input Box Type and Ids
//                    $inputType = 'submit';
//                    $inputIdButton = 'stockTransferReportButt';
//                    $inputNameButton = 'stockTransferReportButt';
//                    //
//                    //
//                    // This is the main class for input flied
//                    $inputFieldClass = 'btn btn-primary';
//                    //
//                    $inputStyle = 'height:22px;width:145px;font-weight:bold;font-size:12px;'
//                                . 'padding-top:0px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
//                                . 'text-align:center; margin-left:12px; background-color: #6EE36E; color: #0C3C03;';
//                    //
//                    $inputLabel = 'STOCK TRANSFER REPORT'; // Display Label 
//                    //
//                    //
//                    // This class is for Pencil Icon                                                           
//                    $inputIconClass = 'fa fa-inr';
//                    // 
//                    // Place Holder inside input box
//                    $inputPlaceHolder = 'STOCK TRANSFER REPORT';
//                    //
//                    // Place Holder in span outside input box
//                    $spanPlaceHolderClass = '';
//                    $spanPlaceHolder = '';
//                    // 
//                    // Event Options
//                    //
//                    // On Change Function
//                    $inputOnChange = "";
//                    $inputKeyUpFun = '';
//                    //
//                    //
//                    $inputOnClickFun = 'stockTransferReportFunc("' . $stockTransferPanelName . '");';
//                    //
//                    $inputDropDownCls = '';               // This is the main division class for drop down 
//                    $inputselDropDownCls = '';            // This is class for selection in drop down
//                    $inputMainClassButton = '';           // This is the main division for Button
//                    // 
//                    //* **************************************************************************************
//                    //* END CODE FOR STOCK TRANSFER REPORT @PRIYANKA-04DEC2021
//                    //* **************************************************************************************
//                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //}
                    ?>
                </div>
            </td>
            <td valign="middle" align="left" width="15%">
                <div id="stockTransferButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK TRANSFER @PRIYANKA-04DEC2021
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
//                    $stockTransferPanelName = 'stockTransferPanel';
//                    //
//                    // Input Box Type and Ids
//                    $inputType = 'submit';
//                    $inputIdButton = 'stockTransferButt';
//                    $inputNameButton = 'stockTransferButt';
//                    //
//                    //
//                    // This is the main class for input flied
//                    $inputFieldClass = 'btn btn-primary';
//                    //
//                    $inputStyle = 'height:22px;width:145px;font-weight:bold;font-size:12px;'
//                                . 'padding-top:0px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
//                                . 'text-align:center; margin-left:12px; background-color: #FFC469; color: #AA6600;';
//                    //
//                    $inputLabel = 'STOCK TRANSFER'; // Display Label 
//                    //
//                    //
//                    // This class is for Pencil Icon                                                           
//                    $inputIconClass = 'fa fa-inr';
//                    // 
//                    // Place Holder inside input box
//                    $inputPlaceHolder = 'STOCK TRANSFER';
//                    //
//                    // Place Holder in span outside input box
//                    $spanPlaceHolderClass = '';
//                    $spanPlaceHolder = '';
//                    // 
//                    // Event Options
//                    //
//                    // On Change Function
//                    $inputOnChange = "";
//                    $inputKeyUpFun = '';
//                    //
//                    //
//                    //
//                    $inputOnClickFun = 'stockManagementByCounter("StockManagementByCounter");';
//                    //
//                    $inputDropDownCls = '';               // This is the main division class for drop down 
//                    $inputselDropDownCls = '';            // This is class for selection in drop down
//                    $inputMainClassButton = '';           // This is the main division for Button
//                    // 
//                    //* **************************************************************************************
//                    //* END CODE FOR STOCK TRANSFER @PRIYANKA-04DEC2021
//                    //* **************************************************************************************
//                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //}
                    ?>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <div class="hrGrey"></div>
            </td>
        </tr>
    </table>-->    
    <div id="stockManagementByCounterDiv">
        <?php
            //
            //
            // DATE @AUTHOR:PRIYANKA-26NOV2021
            $todayDate = date("d M Y"); 
            //
            $todayDate = strtoupper($todayDate);
            //  
            //            
            //echo '$productCounter == ' . $productCounter . '<br />';
            //echo '$selectedStaff == ' . $selectedStaff . '<br />';
            //echo '$selectedFirm == ' . $selectedFirm . '<br />';          
            //
            //
            // NEW STAFF SELECTED VARIABLE @PRIYANKA-04DEC2021
            $selectedStaff = $_GET['selectedStaff'];
            //
            // NEW COUNTER SELECTED VARIABLE @PRIYANKA-04DEC2021
            $productCounter = $_GET['productCounter'];
            //
            // NEW FIRM SELECTED VARIABLE @PRIYANKA-04DEC2021
            $selectedFirm = $_GET['selectedFirm'];
            //
            //
            if ($productCounter == 'NotSelected') {
                $productCounter = '';
            }
            //
            if ($selectedStaff == 'NotSelected') {
                $selectedStaff = '';
            }
            //
            //
            //echo '$productCounter == ' . $productCounter . '<br />';
            //echo '$selectedStaff == ' . $selectedStaff . '<br />';
            //echo '$selectedFirm == ' . $selectedFirm . '<br />';
            //
            // 
            if ($productCounter != '' && $productCounter!= NULL) {
                $productCounterStr = " AND sttr_counter_name = '$productCounter' ";
            }
            //
            if ($selectedStaff != '' && $selectedStaff!= NULL) {
                $selectedStaffStr = " AND sttr_staff_id = '$selectedStaff' ";
            }
            //
            //
        ?>
    </div>
    <table width="100%" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                    <table id="stockTransferDateTableId" border="0" cellspacing="0" cellpadding="0" align="center" 
           style="margin-top: 0px; margin-bottom: 20px;">       
        <tr>
            <td align="center" width="210px" class="padLeft25">
                <!-- Code for Start Date @AUTHOR:PRIYANKA-04DEC2021-->
                <div class="brown brownMess13Arial" style="margin-right: -37px;">START DATE</div>
            </td>

            <td><div></div></td>

            <td align="center" width="210px">
                <!-- Code for End Date @AUTHOR:PRIYANKA-04DEC2021-->
                <div class="brown brownMess13Arial" style="margin-left: -65px;">END DATE</div>
            </td>
        </tr>

        <tr>
            <td align="center" class="padLeft25">
                <table border="0" cellspacing="0" cellpadding="0" align="center" style="margin-right: 15px;">
                    <tr>
                        <td valign="middle" align="center" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10">
                            <?php
                            // Start Code for START DATE @AUTHOR:PRIYANKA-04DEC2021
                            if($nepaliDateIndicator == 'YES'){ 
                             include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliFromDate.php';
                            }else{
                            $Day = 'FromDay';
                            $Month = 'FromMonth';
                            $Year = 'FromYear';
                            $date = $fromDate;
                            //
                            include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportFromDate.php';
                            }
                            // End Code for START DATE @AUTHOR:PRIYANKA-04DEC2021
                            ?>
                        </td>
                    </tr>
                </table>
            </td>

            <td valign="middle" align="center" class="frm-lbl" width="0%"> -- </td>

            <td align="center">
                <table border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left: 15px;">
                    <tr>
                        <td valign="middle" align="center" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10">
                            <?php
                            // Start Code for END DATE @AUTHOR:PRIYANKA-04DEC2021
                                if($nepaliDateIndicator == 'YES'){ 
                             include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliToDate.php';
                            }else{
                            include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportToDate.php';
                            }
                            // End Code for END DATE @AUTHOR:PRIYANKA-04DEC2021
                            ?>
                        </td>
                    </tr>
                </table>
            </td>

            <td align="center">
                <!-- Start Code for GO Button @AUTHOR:PRIYANKA-04DEC2021-->
                <input id="goButton" name="goButton" type="button" 
                       onclick="javascript:
                                searchStockTransferReportDetails(document.getElementById('productCounter').value, 
                                document.getElementById('selectedStaff').value,
                                document.getElementById('FirmName').value,
                                document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'));
                                return false;"
                       value="GO" class="frm-btn height_25" style="margin-left: -82px;width:50px;height:30px;border-radius:5px!important;color:#000080;background:#BED8FD;border:1px solid #BED8FD;font-size:14px;"/>
                <!-- End Code for GO Button @AUTHOR:PRIYANKA-04DEC2021-->
            </td>           
        </tr>
    </table>
            </td>
            <td>
                 <table width="100%" align="left" border="0" cellspacing="0" cellpadding="2" style="margin-top: -10px;" >
        <tr>
            <td align="left" valign="middle" width="33.33%">
                <?php
                //
                include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportCounter.php';
                //
                ?>
            </td>
            <td valign="middle" width="33.33%">
                <?php
                //
                include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportStaff.php';
                //
                ?>
            </td>
            <td valign="middle" width="33.33%">
                <?php
                //
                include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportFirm.php';
                //
                ?>
            </td>
        </tr>
    </table>    
            </td>
        </tr>
    </table>
   
    <?php
    //
    // Start Code for temp_view table @AUTHOR:PRIYANKA-04DEC2021       
    //
    include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportView.php';
    //
    // End Code for temp_view table @AUTHOR:PRIYANKA-04DEC2021
    //
    ?>
    <table align="center"  width="100%" border="0" cellspacing="0" cellpadding="0" class="paddingTop10" style="padding: 5px;">
        <?php // echo '$documentRootPath==' .$documentRoot;?>
        <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRoot; ?>">
        <div id="myModal" class="modal"></div>
        <?php
        //
        $panel = 'StockLedger';
        //
        //
        //Data Table Main Columns @AUTHOR-PRIYANKA-04DEC2021
        include $_SESSION['documentRootIncludePhp'] . 'omdatatablesUnset.php';
        //
        //
        //Data Table Main Columns @AUTHOR-PRIYANKA-04DEC2021
        $dataTableCounter = '';
        //
        $_SESSION['dataTableCounter'] = $dataTableCounter;
        //
        $_SESSION['dataTableDivId'] = 'dtTableDivId2';
        //
        //
        $dataTableColumnsFields = array(
            array('dt' . $dataTableCounter => 'FIRM'),
            array('dt' . $dataTableCounter => 'STAFF'),
            array('dt' . $dataTableCounter => 'COUNTER'),
            array('dt' . $dataTableCounter => 'METAL'),
            array('dt' . $dataTableCounter => 'CATEGORY'),
            array('dt' . $dataTableCounter => 'NAME'),
            array('dt' . $dataTableCounter => 'TYPE'),
            array('dt' . $dataTableCounter => 'PURITY'),
            array('dt' . $dataTableCounter => 'OPENING'),
            array('dt' . $dataTableCounter => 'INWARD'),
            array('dt' . $dataTableCounter => 'OUTWARD'),
            array('dt' . $dataTableCounter => 'CLOSING'));
        //
        //
        $dataTableColumnsFieldsInside = array(
            array('dt' . $dataTableCounter => 'QTY'),
            array('dt' . $dataTableCounter => 'GROSS WT'),
            array('dt' . $dataTableCounter => 'NET WT'),
            array('dt' . $dataTableCounter => 'FINE WT'),
        );
        //
        //
        $_SESSION['dataTableColumnsFields' . $dataTableCounter] = $dataTableColumnsFields; // No Change
        $_SESSION['dataTableColumnsFieldsInside' . $dataTableCounter] = $dataTableColumnsFieldsInside; // No Change
        //
        //
        // Table Parameters @AUTHOR-PRIYANKA-04DEC2021
        $_SESSION['tableName' . $dataTableCounter] = 'temp_view'; // Table Name
        $_SESSION['tableNamePK' . $dataTableCounter] = 'sttr_id'; // Primary Key
        //
        //
        // DB Table Columns Parameters @AUTHOR-PRIYANKA-04DEC2021
        $dbColumnsArray = array(
            "f.firm_name",
            "u.user_fname",
            "sttr_counter_name",
            "IF(sttr_metal_type = 'Gold','GD',IF(sttr_metal_type = 'Silver','SL',sttr_metal_type))",
            "sttr_item_category",
            "sttr_item_name",
            "IF(sttr_stock_type = 'retail','R','W')",
            "sttr_purity",
            "sttr_quantity_open",
            "sttr_gs_weight_open",
            "sttr_nt_weight_open",
            "sttr_fine_weight_open",
            "sttr_quantity_in",
            "sttr_gs_weight_in",
            "sttr_nt_weight_in",
            "sttr_fine_weight_in",
            "sttr_quantity_out",
            "sttr_gs_weight_out",
            "sttr_nt_weight_out",
            "sttr_fine_weight_out",
            "sttr_quantity_close",
            "sttr_gs_weight_close",
            "sttr_nt_weight_close",
            "sttr_fine_weight_close");
        //
        //
        $_SESSION['dbColumnsArray' . $dataTableCounter] = $dbColumnsArray;  // No Change
        //
        //
        $_SESSION['multipleColCounter' . $dataTableCounter] = 8;
        //
        //
        if ($_SESSION['sessionProdName'] == 'OMRETL') {
            $_SESSION['dtSumColumn' . $dataTableCounter] = '8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23';
        } else {
            $_SESSION['dtSumColumn' . $dataTableCounter] = '8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23';
        }
        //
        //
        $_SESSION['dtSortColumn'] = '';
        $_SESSION['dtASCDESC'] = '';
        $_SESSION['dtSortColumnName'] = "sttr_item_category,sttr_item_name";
        $_SESSION['dtASCDESCColumnName'] = 'asc,asc';
        //
        //
        // Extra direct columns we need pass in SQL Query @AUTHOR-PRIYANKA-04DEC2021
        $_SESSION['sqlQueryColumns' . $dataTableCounter] = "sttr_id, sttr_firm_id, sttr_staff_id, "
                                                         . "sttr_counter_name, sttr_metal_type, "
                                                         . "sttr_item_category, sttr_item_name, sttr_stock_type, "
                                                         . "sttr_purity, sttr_indicator,";
        //
        //
        //
        $_SESSION['colorfulColumn' . $dataTableCounter] = "";
        $_SESSION['colorfulColumnCheck' . $dataTableCounter] = '';
        $_SESSION['colorfulColumnTitle' . $dataTableCounter] = '';
        //
        //
        // On Click Function Parameters @AUTHOR-PRIYANKA-04DEC2021
        $_SESSION['onclickColumnImage' . $dataTableCounter] = "";
        $_SESSION['onclickColumn' . $dataTableCounter] = "sttr_gs_weight_open"; // On which column @AUTHOR-PRIYANKA-04DEC2021
        $_SESSION['onclickColumnId' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnValue' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnFunction' . $dataTableCounter] = "getStockCounterTransactionsReportPopUp";
        $_SESSION['onclickColumnFunctionPara1' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnFunctionPara2' . $dataTableCounter] = "sttr_stock_type";
        $_SESSION['onclickColumnFunctionPara3' . $dataTableCounter] = $strFrmId;
        $_SESSION['onclickColumnFunctionPara4' . $dataTableCounter] = "OpeningDetails"; // Panel Name - OPEN, IN, OUT, CLOSE @AUTHOR-PRIYANKA-04DEC2021
        $_SESSION['onclickColumnFunctionPara5' . $dataTableCounter] = "sttr_item_category";
        $_SESSION['onclickColumnFunctionPara6' . $dataTableCounter] = "sttr_item_name";
        $_SESSION['onclickColumnFunctionPara7' . $dataTableCounter] = "sttr_purity";
        $_SESSION['onclickColumnFunctionPara8' . $dataTableCounter] = "sttr_metal_type";
        $_SESSION['onclickColumnFunctionPara9' . $dataTableCounter] = "sttr_indicator";
        $_SESSION['onclickColumnFunctionPara10' . $dataTableCounter] = $startDate;
        $_SESSION['onclickColumnFunctionPara11' . $dataTableCounter] = $endDate;
        $_SESSION['onclickColumnFunctionPara12' . $dataTableCounter] = $documentRoot;
        $_SESSION['onclickColumnFunctionPara13' . $dataTableCounter] = "stockLedger"; // Main Panel Name @AUTHOR-PRIYANKA-04DEC2021
        //
        //
        // On Click Function Parameters @AUTHOR-PRIYANKA-04DEC2021
        $_SESSION['onclickColumnImageTwo' . $dataTableCounter] = "";
        $_SESSION['onclickColumnTwo' . $dataTableCounter] = "sttr_gs_weight_in"; // On which column @AUTHOR-PRIYANKA-04DEC2021
        $_SESSION['onclickColumnIdTwo' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnValueTwo' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnFunctionTwo' . $dataTableCounter] = "getStockCounterTransactionsReportPopUp";
        $_SESSION['onclickColumnFunctionTwoPara1' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnFunctionTwoPara2' . $dataTableCounter] = "sttr_stock_type";
        $_SESSION['onclickColumnFunctionTwoPara3' . $dataTableCounter] = $strFrmId;
        $_SESSION['onclickColumnFunctionTwoPara4' . $dataTableCounter] = "InwardDetails"; // Panel Name - OPEN, IN, OUT, CLOSE @AUTHOR-PRIYANKA-04DEC2021
        $_SESSION['onclickColumnFunctionTwoPara5' . $dataTableCounter] = "sttr_item_category";
        $_SESSION['onclickColumnFunctionTwoPara6' . $dataTableCounter] = "sttr_item_name";
        $_SESSION['onclickColumnFunctionTwoPara7' . $dataTableCounter] = "sttr_purity";
        $_SESSION['onclickColumnFunctionTwoPara8' . $dataTableCounter] = "sttr_metal_type";
        $_SESSION['onclickColumnFunctionTwoPara9' . $dataTableCounter] = "sttr_indicator";
        $_SESSION['onclickColumnFunctionTwoPara10' . $dataTableCounter] = $startDate;
        $_SESSION['onclickColumnFunctionTwoPara11' . $dataTableCounter] = $endDate;
        $_SESSION['onclickColumnFunctionTwoPara12' . $dataTableCounter] = $documentRoot;
        $_SESSION['onclickColumnFunctionTwoPara13' . $dataTableCounter] = "stockLedger"; // Main Panel Name @AUTHOR-PRIYANKA-04DEC2021
        //
        //
        // On Click Function Parameters @AUTHOR-PRIYANKA-04DEC2021
        $_SESSION['onclickColumnImageThr' . $dataTableCounter] = "";
        $_SESSION['onclickColumnThr' . $dataTableCounter] = "sttr_gs_weight_out"; // On which column @AUTHOR-PRIYANKA-04DEC2021
        $_SESSION['onclickColumnIdThr' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnValueThr' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnFunctionThr' . $dataTableCounter] = "getStockCounterTransactionsReportPopUp";
        $_SESSION['onclickColumnFunctionThrPara1' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnFunctionThrPara2' . $dataTableCounter] = "sttr_stock_type";
        $_SESSION['onclickColumnFunctionThrPara3' . $dataTableCounter] = $strFrmId;
        $_SESSION['onclickColumnFunctionThrPara4' . $dataTableCounter] = "OutwardDetails"; // Panel Name - OPEN, IN, OUT, CLOSE @AUTHOR-PRIYANKA-04DEC2021
        $_SESSION['onclickColumnFunctionThrPara5' . $dataTableCounter] = "sttr_item_category";
        $_SESSION['onclickColumnFunctionThrPara6' . $dataTableCounter] = "sttr_item_name";
        $_SESSION['onclickColumnFunctionThrPara7' . $dataTableCounter] = "sttr_purity";
        $_SESSION['onclickColumnFunctionThrPara8' . $dataTableCounter] = "sttr_metal_type";
        $_SESSION['onclickColumnFunctionThrPara9' . $dataTableCounter] = "sttr_indicator";
        $_SESSION['onclickColumnFunctionThrPara10' . $dataTableCounter] = $startDate;
        $_SESSION['onclickColumnFunctionThrPara11' . $dataTableCounter] = $endDate;
        $_SESSION['onclickColumnFunctionThrPara12' . $dataTableCounter] = $documentRoot;
        $_SESSION['onclickColumnFunctionThrPara13' . $dataTableCounter] = "stockLedger"; // Main Panel Name @AUTHOR-PRIYANKA-04DEC2021
        //
        //
        //
        // Closing On Click Function Parameters @AUTHOR:PRIYANKA-21FEB2022
        $_SESSION['onclickColumnImageFour' . $dataTableCounter] = "";
        $_SESSION['onclickColumnFour' . $dataTableCounter] = "sttr_gs_weight_close"; // On which column @AUTHOR:PRIYANKA-21FEB2022
        $_SESSION['onclickColumnIdFour' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnValueFour' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnFunctionFour' . $dataTableCounter] = "getStockCounterTransactionsReportPopUp";
        $_SESSION['onclickColumnFunctionFourPara1' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnFunctionFourPara2' . $dataTableCounter] = "sttr_stock_type";
        $_SESSION['onclickColumnFunctionFourPara3' . $dataTableCounter] = $strFrmId;
        $_SESSION['onclickColumnFunctionFourPara4' . $dataTableCounter] = "ClosingDetails"; // Panel Name - OPEN, IN, OUT, CLOSE @AUTHOR:PRIYANKA-21FEB2022
        $_SESSION['onclickColumnFunctionFourPara5' . $dataTableCounter] = "sttr_item_category";
        $_SESSION['onclickColumnFunctionFourPara6' . $dataTableCounter] = "sttr_item_name";
        $_SESSION['onclickColumnFunctionFourPara7' . $dataTableCounter] = "sttr_purity";
        $_SESSION['onclickColumnFunctionFourPara8' . $dataTableCounter] = "sttr_metal_type";
        $_SESSION['onclickColumnFunctionFourPara9' . $dataTableCounter] = "sttr_indicator";
        $_SESSION['onclickColumnFunctionFourPara10' . $dataTableCounter] = $startDate;
        $_SESSION['onclickColumnFunctionFourPara11' . $dataTableCounter] = $endDate;
        $_SESSION['onclickColumnFunctionFourPara12' . $dataTableCounter] = $documentRoot;
        $_SESSION['onclickColumnFunctionFourPara13' . $dataTableCounter] = "stockLedger"; // Main Panel Name @AUTHOR:PRIYANKA-21FEB2022
        //
        //
        //
        // Delete Function Parameters @AUTHOR-PRIYANKA-04DEC2021
        $_SESSION['deleteColumn' . $dataTableCounter] = ""; // On which column
        $_SESSION['deleteColumnId' . $dataTableCounter] = "";
        $_SESSION['deleteColumnValue' . $dataTableCounter] = "";
        $_SESSION['deleteColumnFunction' . $dataTableCounter] = "";
        $_SESSION['deleteColumnFunctionPara1' . $dataTableCounter] = ""; // Panel Name
        $_SESSION['deleteColumnFunctionPara2' . $dataTableCounter] = "";
        $_SESSION['deleteColumnFunctionPara3' . $dataTableCounter] = "";
        $_SESSION['deleteColumnFunctionPara4' . $dataTableCounter] = "";
        $_SESSION['deleteColumnFunctionPara5' . $dataTableCounter] = "";
        $_SESSION['deleteColumnFunctionPara6' . $dataTableCounter] = "";
        //
        //
        // Where Clause Condition @AUTHOR-PRIYANKA-04DEC2021
        $_SESSION['tableWhere' . $dataTableCounter] = "";
        //
        //
        // Table Joins @AUTHOR-PRIYANKA-04DEC2021
        $_SESSION['tableJoin' . $dataTableCounter] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id "
                                                   . " LEFT JOIN user AS u ON sttr_staff_id = u.user_id ";
        //
        //
        // Data Table Main File @AUTHOR-PRIYANKA-04DEC2021
        include $_SESSION['documentRootIncludePhp'] . 'omdatatables.php';
        //
        //
        ?>
    </table>
</div>