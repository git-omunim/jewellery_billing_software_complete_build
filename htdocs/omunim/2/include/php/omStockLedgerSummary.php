<?php
/*
 * **************************************************************************************************
 * @Description: STOCK REPORT LEDGER PANEL MAIN FILE @AUTHOR:PRIYANKA-11OCT2021
 * **************************************************************************************************
 *
 * Created on OCT 07, 2021 06:05:58 PM 
 * **************************************************************************************
 * @FileName: omStockLedgerSummary.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMRETAIL 
 * @version 2.7.84
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:07OCT2021
 *  AUTHOR: PRIYANKA
 *  REASON:
 *
 * Project Name: Online Munim ERP Accounting Software
 * Version: 2.7.84
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
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'ommpincr.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
?>
<div id="StockReportLedgerPanelMainDiv">
    <?php
    //
    //
    // FOR ALL STOCK LIST @AUTHOR:PRIYANKA-11JAN2022
    if ($_REQUEST['subPanelName'] == 'AllStockList') {
        //
        //
        // FOR ALL STOCK LIST @AUTHOR:PRIYANKA-11JAN2022
        include 'omAllStockLedgerSummaryReport.php';
        //
        //
    } else if ($_REQUEST['subPanelName'] == 'StockMismatchPanel') {
        //
        //
        // FOR STOCK MISMATCH PANEL @AUTHOR:PRIYANKA-20JAN2022
        include 'omStockLedgerStockMismatch.php';
        //
        //
    } else {
        //
        //
        // FOR AVAILABLE STOCK LIST @AUTHOR:PRIYANKA-11JAN2022
        // 
        // Added Code To GET Firm Details @AUTHOR:PRIYANKA-11OCT2021
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
        //echo 'selFirmId == ' . $selFirmId . '<br />';
        //echo 'firmId == ' . $_REQUEST['firmId'] . '<br />';
        //echo 'firmIdSelected == ' . $firmIdSelected . '<br />';
        //echo 'setFirmSession == ' . $_SESSION['setFirmSession'] . '<br />';
        //echo 'documentRoot == ' . $documentRoot . '<br />';
        //
        //
        // Start Code To GET Firm Details @AUTHOR:PRIYANKA-11OCT2021
        if (isset($_GET['selFirmId'])) {
            $selFirmId = $_GET['selFirmId'];
        } else {
            //if not selected assign session firm @AUTHOR:PRIYANKA-11OCT2021
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
            //Set String for Public Firms @AUTHOR:PRIYANKA-11OCT2021
            while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
                $strFrmId = $strFrmId . ",";
                $strFrmId = $strFrmId . "$rowFirm[firm_id]";
            }
        } else {
            $strFrmId = $selFirmId;
        }
        // End Code To GET Firm Details @AUTHOR:PRIYANKA-11OCT2021
        //
        if ($staffId && $array['stockSumryAccShowAddStockStockAccess'] == 'false') {
            $sttrTransTypeStr = "and sttr_transaction_type IN ('PURBYSUPP', 'PURONCASH', 'TAG')";
        } else {
            $sttrTransTypeStr = "and sttr_transaction_type IN ('EXISTING', 'PURBYSUPP', 'PURONCASH', 'TAG','ItemReturn')";
        }
        //
        //echo 'firmId == ' . $_REQUEST['firmId'] . '<br />';
        //echo 'strFrmId == ' . $strFrmId . '<br />';
        //echo 'selFirmId == ' . $selFirmId . '<br />';
        //
        //
        // To Get Owner Id @AUTHOR:PRIYANKA-11OCT2021
        $sessionOwnerId = $_SESSION['sessionOwnerId'];
        //***********************************************************************************************************************
        //*************************************START CODE TO ADD NEPALI DATE****************************************************//
        //***********************************************************************************************************************
        $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
        $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
        $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
        $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
        if ($nepaliDateIndicator == 'YES') {
            $FromDate = $_REQUEST['FromDate'];
            $ToDate = $_REQUEST['ToDate'];
            $startDateArr = explode('-', $FromDate);
            if (is_numeric($startDateArr[1]) || (preg_match('~[0-9]+~', $startDateArr[1]))) {
                $startDateDOB = trim($startDateArr[0]) . '-' . trim($startDateArr[1]) . '-' . trim($startDateArr[2]);
                $nepali_date = new nepali_date();
                $english_date = $nepali_date->get_eng_date($startDateArr[2], $startDateArr[1], $startDateArr[0]);
                $startDate = trim($english_date['d']) . ' ' . trim(strtoupper($english_date['M'])) . ' ' . trim($english_date['y']);
                $fromDate = date("d M Y", strtotime($startDate));
            }
            $endDateArr = explode('-', $ToDate);
            if (is_numeric($endDateArr[1]) || (preg_match('~[0-9]+~', $endDateArr[1]))) {
                $endDateDOB = trim($endDateArr[0]) . '-' . trim($endDateArr[1]) . '-' . trim($endDateArr[2]);
                $nepali_date = new nepali_date();
                $english_date = $nepali_date->get_eng_date($endDateArr[2], $endDateArr[1], $endDateArr[0]);
                $endDate = trim($english_date['d']) . ' ' . trim(strtoupper($english_date['M'])) . ' ' . trim($english_date['y']);
                $toDate = date("d M Y", strtotime($endDate));
            }
            if ($FromDate == '' || $FromDate == NULL) {
                $FromDate = date("d-m-Y");
                $fromDate = date("d M Y", strtotime($FromDate));
            }
            if ($ToDate == '' || $ToDate == NULL) {
                $ToDate = date("d-m-Y");
                $toDate = date("d M Y", strtotime($ToDate));
            }
            $todayDate = $fromDate;
            $todayStrDate = strtotime($todayDate);
            $todayFromStrDate = strtotime($fromDate);
            $todayToStrDate = strtotime($toDate);
        } else {

            //
            // START DATE @AUTHOR:PRIYANKA-11OCT2021
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
            // END DATE @AUTHOR:PRIYANKA-11OCT2021
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
            // START DATE STR @AUTHOR:PRIYANKA-11OCT2021
            $todayFromStrDate = strtotime($fromDate);
            // END DATE STR @AUTHOR:PRIYANKA-11OCT2021
            //
            $todayToStrDate = strtotime($toDate);

            //
        }
        // To Get Panel Name @AUTHOR:PRIYANKA-11OCT2021
        if ($panelName == '' || $panelName == NULL)
            $panelName = $_REQUEST['panelName'];
        //
        // Panel Name @AUTHOR:PRIYANKA-11OCT2021
        if ($panelName == '' || $panelName == NULL)
            $panelName = 'StockSummaryPanelByCategory';
        //
        //
        //print_r($_REQUEST);
        //echo '<br />';
        //echo '$todayFromStrDate == ' . $todayFromStrDate . '<br />';
        //echo '$todayToStrDate == ' . $todayToStrDate . '<br />';
        //
        //
        $startDate = $fromDate;
        $endDate = $toDate;
        //
        //
        //echo '$startDate == ' . $startDate . '<br />';
        //echo '$endDate == ' . $endDate . '<br />';
        //
        //
        $searchColumnMetal = NULL;
        $searchValueMetal = NULL;
        $searchColumnCategory = NULL;
        $searchValueCategory = NULL;
        $searchColumnName = NULL;
        $searchValueName = NULL;
        //
        if (isset($_GET['searchColumnMetal'])) {
            $searchColumnMetal = $_GET['searchColumnMetal'];
        }
        //
        if (isset($_GET['searchValueMetal'])) {
            $searchValueMetal = $_GET['searchValueMetal'];
        }
        //
        if (isset($_GET['searchColumnCategory'])) {
            $searchColumnCategory = $_GET['searchColumnCategory'];
        }
        //
        if (isset($_GET['searchValueCategory'])) {
            $searchValueCategory = $_GET['searchValueCategory'];
        }
        //
        if (isset($_GET['searchColumnName'])) {
            $searchColumnName = $_GET['searchColumnName'];
        }
        //
        if (isset($_GET['searchValueName'])) {
            $searchValueName = $_GET['searchValueName'];
        }
        // ADDED Condition FOR TYPE 
        if (isset($_REQUEST['searchColumnTypee'])) {
            $searchColumnTypee = $_REQUEST['searchColumnTypee'];
        }
        if (isset($_REQUEST['searchValueTypee'])) {
            $searchValueTypee = $_REQUEST['searchValueTypee'];
        }
        // Add Conditional for purity:
        // Change this section:
        if (isset($_GET['searchColumnPurity'])) {
            $searchColumnPurity = $_GET['searchColumnPurity'];
        }

        if (isset($_GET['searchValuePurity'])) {
            $searchValuePurity = $_GET['searchValuePurity'];
        }
        // if (isset($_POST['searchColumnPurity'])) {
        //     $searchColumnPurity = $_POST['searchColumnPurity'];
        // }
        // if (isset($_POST['searchValuePurity'])) {
        //     $searchValuePurity = $_POST['searchValuePurity'];
        // }
        //
        //
        //
        // echo '$searchColumnMetal == ' . $searchColumnMetal . '<br />';
        // echo '$searchValueMetal == ' . $searchValueMetal . '<br />';
        // echo '$searchColumnCategory == ' . $searchColumnCategory . '<br />';
        // echo '$searchValueCategory == ' . $searchValueCategory . '<br />';
        // echo '$searchColumnName == ' . $searchColumnName . '<br />';
        // echo '$searchValueName == ' . $searchValueName . '<br />';
        // echo '$searchColumnTypee == ' . $searchColumnTypee . '<br />';
        // echo '$searchValueTypee == ' . $searchValueTypee . '<br />';
        //
        //
        //
        ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: -12px;">
            <tr>
                <td valign="middle" align="left" width="32px">
                    <div class="analysis_div_rows">
                        <img src="<?php echo $documentRoot; ?>/images/retail/stockPanel.png" alt=""
                             onload="document.getElementById('FirmName').focus();" />
                    </div>
                </td>
                <td valign="middle" align="left" width="0">
                    <a class="links" style="cursor: pointer;"
                       onclick="">
                        <!-- Code To Display Stock Summary Panel Name @AUTHOR:PRIYANKA-11OCT2021-->
                        <div class="textLabelHeading">STOCK SUMMARY </div>
                    </a>
                </td>
            </tr>
            <!--<tr>
                <td align="center" class="padBott2">
                    <div class="hrGold"></div>
                </td>
                <td align="center" class="padBott2">
                    <div class="hrGold"></div>
                </td>
            </tr>-->
        </table>
        <table id="stockSummaryHeaderTableId" border="0" cellspacing="0" cellpadding="0" align="center"
               style="margin-top: 2px;">
            <tr>
                <td align="center" valign="middle" width="150px">
                    <!-- Code for Firm @AUTHOR:PRIYANKA-11OCT2021-->
                    <div class="brown brownMess13Arial" style="margin-left: 70px;">FIRM</div>
                </td>

                <td align="center" width="210px" class="padLeft25">
                    <!-- Code for Start Date @AUTHOR:PRIYANKA-11OCT2021-->
                    <div class="brown brownMess13Arial" style="margin-right: 20px;">START DATE</div>
                </td>

                <td>
                    <div></div>
                </td>

                <td align="center" width="210px">
                    <!-- Code for End Date @AUTHOR:PRIYANKA-11OCT2021-->
                    <div class="brown brownMess13Arial" style="margin-left: 4px;">END DATE</div>
                </td>
            </tr>
            <tr>
                <td align="left" valign="middle" width="150px">
                    <table border="0" cellspacing="0" cellpadding="0" align="right" style="margin-left: 68px;">
                        <tr>
                            <td valign="middle" align="right" class="textBoxCurve1px margin2pxAll backFFFFFF">
                                <div id="selectFirmDiv" class="background_transparent">
                                    <?php
                                    // Start Code for FIRM @AUTHOR:PRIYANKA-11OCT2021
                                    //
                                    include 'omStockLedgerSummaryFirm.php';
                                    //
                                    // End Code for FIRM @AUTHOR:PRIYANKA-11OCT2021
                                    ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <?php if ($nepaliDateIndicator == 'YES') { ?>
                    <td align="center" class="padLeft25">
                        <table border="0" cellspacing="0" cellpadding="0" align="center" style="margin-right: 15px; width:93%;">
                            <tr>
                                <td valign="middle" align="center" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10">
                                    <?php
                                    // Start Code for START DATE @AUTHOR:PRIYANKA-11OCT2021
                                    //
                                    $panelName = 'stockSummary';
                                    $date_nepali = $startDateDOB;

                                    include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliFromDate.php';
                                    //
                                    // End Code for START DATE @AUTHOR:PRIYANKA-11OCT2021
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td valign="middle" align="center" class="frm-lbl" width="0%">
                        <div align="right" style="margin-left: 12px">
                            --
                        </div>
                    </td>

                    <td align="center">
                        <table border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left: 15px; width:93%;">
                            <tr>
                                <td valign="middle" align="center" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10">
                                    <?php
                                    // Start Code for END DATE @AUTHOR:PRIYANKA-11OCT2021
                                    //
                                    $date_nepali = $endDateDOB;
                                    $panelName = 'stockSummary';
                                    include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliToDate.php';
                                    //
                                    // End Code for END DATE @AUTHOR:PRIYANKA-11OCT2021
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td align="center">
                        <!-- Start Code for GO Button @AUTHOR:PRIYANKA-11OCT2021-->
                        <input id="goButton" name="goButton" type="button" style="margin-left: 16px;"
                               onclick="javascript:
                                                       searchStockLedgerSummaryReportDetails(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                               document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                               document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'));
                                               return false;"
                               value="GO" class="frm-btn height_25" />
                        <!-- End Code for GO Button @AUTHOR:PRIYANKA-11OCT2021-->
                    </td>

                <?php } else { ?>
                    <td align="center" class="padLeft25">
                        <table border="0" cellspacing="0" cellpadding="0" align="center" style="margin-right: 15px; width:93%;">
                            <tr>
                                <td valign="middle" align="center" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10">
                                    <?php
                                    // Start Code for START DATE @AUTHOR:PRIYANKA-11OCT2021
                                    //
                                    $Day = 'FromDay';
                                    $Month = 'FromMonth';
                                    $Year = 'FromYear';
                                    $date = $fromDate;
                                    //
                                    include 'omstocrptfromdate.php';
                                    //
                                    // End Code for START DATE @AUTHOR:PRIYANKA-11OCT2021
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td valign="middle" align="center" class="frm-lbl" width="0%">
                        <div align="right" style="margin-left: 12px">
                            --
                        </div>
                    </td>

                    <td align="center">
                        <table border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left: 15px; width:93%;">
                            <tr>
                                <td valign="middle" align="center" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10">
                                    <?php
                                    // Start Code for END DATE @AUTHOR:PRIYANKA-11OCT2021
                                    //
                                    include 'omstocrpttodate.php';
                                    //
                                    // End Code for END DATE @AUTHOR:PRIYANKA-11OCT2021
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td align="center">
                        <!-- Start Code for GO Button @AUTHOR:PRIYANKA-11OCT2021-->
                        <input id="goButton" name="goButton" type="button" style="margin-left: 16px;"
                               onclick="javascript:
                                                       searchStockLedgerSummaryReportDetails(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                               document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                               document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'));
                                               return false;"
                               value="GO" class="frm-btn height_25" />
                        <!-- End Code for GO Button @AUTHOR:PRIYANKA-11OCT2021-->
                    </td>
                <?php } ?>
            </tr>
        </table>

        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:20px;background:#fff;">
            <tr>
                <?php
                if (
                        $staffId == '' ||
                        ($staffId && $array['stockSumryAccAvaiGoldStockAccess'] == 'true')
                ) {
                    ?>
                    <td valign="middle" align="center" width="20%">
                        <div id="stockLedgerGoldButtDiv">
                            <?php
                            //
                            //* ************************************************************************************************
                            //* START CODE FOR GOLD STOCK LEDGER @PRIYANKA-11JAN2022
                            //* ************************************************************************************************
                            // 
                            // // This is the main division class for input filed
                            // 
                            //
                            //
                            // Input Box Type and Ids
                            $inputType = 'submit';
                            $inputIdButton = 'stockLedgerGoldButt';
                            $inputNameButton = 'stockLedgerGoldButt';
                            //
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'btn btn-primary';
                            //
                            $inputStyle = 'height:33px;width:100%;font-weight:bold;font-size:15px;'
                                    . 'padding:5px;'
                                    . 'text-align:center;background-color: #ffc0cb;color:#dc143c;';
                            //
                            $inputLabel = 'AVAILABLE GOLD STOCK';
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = 'fa fa-inr';
                            // 
                            // Place Holder inside input box
                            $inputPlaceHolder = 'AVAILABLE GOLD STOCK';
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            //
                            //
                            //
                            $inputOnClickFun = 'searchStockLedgerSummaryReportDetailsByProductType(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "Gold", "AvailableStockList");';
                            //
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* END CODE FOR GOLD STOCK LEDGER @PRIYANKA-11JAN2022
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                            //
                            //
                            ?>
                        </div>
                    </td>
                    <?php
                }
                if (
                        $staffId == '' ||
                        ($staffId && $array['stockSumryAccAvaiSilverStockAccess'] == 'true')
                ) {
                    ?>
                    <td valign="middle" align="center">
                        <div id="stockLedgerSilverButtDiv">
                            <?php
                            //
                            //* ************************************************************************************************
                            //* START CODE FOR SILVER STOCK LEDGER @PRIYANKA-11JAN2022
                            //* ************************************************************************************************
                            // 
                            // // This is the main division class for input filed
                            // 
                            //
                            //
                            // Input Box Type and Ids
                            $inputType = 'submit';
                            $inputIdButton = 'stockLedgerSilverButt';
                            $inputNameButton = 'stockLedgerSilverButt';
                            //
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'btn btn-primary';
                            //
                            $inputStyle = 'height:33px;width:100%;font-weight:bold;font-size:15px;'
                                    . 'padding:5px;'
                                    . 'text-align:center;background-color: #6EE36E; color: #0C3C03;';
                            //
                            $inputLabel = 'AVAILABLE SILVER STOCK'; // Display Label 
                            //
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = 'fa fa-inr';
                            // 
                            // Place Holder inside input box
                            $inputPlaceHolder = 'AVAILABLE SILVER STOCK';
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            //
                            //
                            $inputOnClickFun = 'searchStockLedgerSummaryReportDetailsByProductType(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "Silver", "AvailableStockList");';
                            //
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* END CODE FOR SILVER STOCK LEDGER @PRIYANKA-11JAN2022
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                            //
                            //
                            ?>
                        </div>
                    </td>
                    <?php
                }
                if (
                        $staffId == '' ||
                        ($staffId && $array['stockSumryAccAvaiStoneStockAccess'] == 'true')
                ) {
                    ?>
                    <td valign="middle" align="center">
                        <div id="stockLedgersStoneButtDiv">
                            <?php
                            //
                            //* ************************************************************************************************
                            //* START CODE FOR STONE STOCK LEDGER @PRIYANKA-11JAN2022
                            //* ************************************************************************************************
                            // 
                            // // This is the main division class for input filed
                            // 
                            //
                            //
                            // Input Box Type and Ids
                            $inputType = 'submit';
                            $inputIdButton = 'stockLedgersStoneButt';
                            $inputNameButton = 'stockLedgersStoneButt';
                            //
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'btn btn-primary';
                            //
                            $inputStyle = 'height:33px;width:100%;font-weight:bold;font-size:15px;'
                                    . 'padding:5px;'
                                    . 'text-align:center;background-color: #FFC469; color: #AA6600;';
                            //
                            $inputLabel = 'AVAILABLE STONE STOCK'; // Display Label 
                            //
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = 'fa fa-inr';
                            // 
                            // Place Holder inside input box
                            $inputPlaceHolder = 'AVAILABLE STONE STOCK';
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            //
                            //
                            //
                            $inputOnClickFun = 'searchStockLedgerSummaryReportDetailsByProductType(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "crystal", "AvailableStockList");';
                            //
                            //
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* END CODE FOR STONE STOCK LEDGER @PRIYANKA-11JAN2022
                            //* **************************************************************************************
                            //
                            //
                            include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                            //
                            //
                            ?>
                        </div>
                    </td>
                    <?php
                }
                if ($staffId == '' || ($staffId && $array['stockSumryAccAllGoldStockAccess'] == 'true')) {
                    ?>
                    <td valign="middle" align="center">
                        <div id="stockLedgerGoldButtDiv">
                            <?php
                            //
                            //* ************************************************************************************************
                            //* START CODE FOR GOLD STOCK LEDGER @PRIYANKA-11JAN2022
                            //* ************************************************************************************************
                            // 
                            // // This is the main division class for input filed
                            // 
                            //
                            //
                            // Input Box Type and Ids
                            $inputType = 'submit';
                            $inputIdButton = 'stockLedgerGoldButt';
                            $inputNameButton = 'stockLedgerGoldButt';
                            //
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'btn btn-primary';
                            //
                            $inputStyle = 'height:33px;width:100%;font-weight:bold;font-size:15px;'
                                    . 'padding:5px;'
                                    . 'text-align:center;background-color: #ffc0cb;color:#dc143c;';
                            //
                            $inputLabel = 'ALL GOLD STOCK';
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = 'fa fa-inr';
                            // 
                            // Place Holder inside input box
                            $inputPlaceHolder = 'ALL GOLD STOCK';
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            //
                            //
                            //
                            $inputOnClickFun = 'searchStockLedgerSummaryReportDetailsByProductType(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "Gold", "AllStockList");';
                            //
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* END CODE FOR GOLD STOCK LEDGER @PRIYANKA-11JAN2022
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                            //
                            //
                            ?>
                        </div>
                    </td>
                    <?php
                }
                if ($staffId == '' || ($staffId && $array['stockSumryAccAllSilverStockAccess'] == 'true')) {
                    ?>
                    <td valign="middle" align="center">
                        <div id="stockLedgerSilverButtDiv">
                            <?php
                            //
                            //* ************************************************************************************************
                            //* START CODE FOR SILVER STOCK LEDGER @PRIYANKA-11JAN2022
                            //* ************************************************************************************************
                            // 
                            // // This is the main division class for input filed
                            // 
                            //
                            //
                            // Input Box Type and Ids
                            $inputType = 'submit';
                            $inputIdButton = 'stockLedgerSilverButt';
                            $inputNameButton = 'stockLedgerSilverButt';
                            //
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'btn btn-primary';
                            //
                            $inputStyle = 'height:33px;width:100%;font-weight:bold;font-size:15px;'
                                    . 'padding:5px;'
                                    . 'text-align:center;background-color: #6EE36E; color: #0C3C03;';
                            //
                            $inputLabel = 'ALL SILVER STOCK'; // Display Label 
                            //
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = 'fa fa-inr';
                            // 
                            // Place Holder inside input box
                            $inputPlaceHolder = 'ALL SILVER STOCK';
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            //
                            //
                            $inputOnClickFun = 'searchStockLedgerSummaryReportDetailsByProductType(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "Silver", "AllStockList");';
                            //
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* END CODE FOR SILVER STOCK LEDGER @PRIYANKA-11JAN2022
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                            //
                            //
                            ?>
                        </div>
                    </td>
                    <?php
                }
                if ($staffId == '' || ($staffId && $array['stockSumryAccAllStoneStockAccess'] == 'true')) {
                    ?>
                    <td valign="middle" align="center">
                        <div id="stockLedgersStoneButtDiv">
                            <?php
                            //
                            //* ************************************************************************************************
                            //* START CODE FOR STONE STOCK LEDGER @PRIYANKA-11JAN2022
                            //* ************************************************************************************************
                            // 
                            // // This is the main division class for input filed
                            // 
                            //
                            //
                            // Input Box Type and Ids
                            $inputType = 'submit';
                            $inputIdButton = 'stockLedgersStoneButt';
                            $inputNameButton = 'stockLedgersStoneButt';
                            //
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'btn btn-primary';
                            //
                            $inputStyle = 'height:33px;width:100%;font-weight:bold;font-size:15px;'
                                    . 'padding:5px;'
                                    . 'text-align:center;background-color: #FFC469; color: #AA6600;';
                            //
                            $inputLabel = 'ALL STONE STOCK'; // Display Label 
                            //
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = 'fa fa-inr';
                            // 
                            // Place Holder inside input box
                            $inputPlaceHolder = 'ALL STONE STOCK';
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            //
                            //
                            //
                            $inputOnClickFun = 'searchStockLedgerSummaryReportDetailsByProductType(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "crystal", "AllStockList");';
                            //
                            //
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* END CODE FOR STONE STOCK LEDGER @PRIYANKA-11JAN2022
                            //* **************************************************************************************
                            //
                            //
                            include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                            //
                            //
                            ?>
                        </div>
                    </td>
                    <?php
                }
                if ($staffId == '' || ($staffId && $array['stockSumryAccStockMismatchStockAccess'] == 'true')) {
                    ?>
                    <td valign="middle" align="center">
                        <div id="stockLedgersStockMismatchButtDiv">
                            <?php
                            //
                            //* ************************************************************************************************
                            //* START CODE FOR STOCK LEDGER STOCK MISMATCH BUTTON @PRIYANKA-20JAN2022
                            //* ************************************************************************************************
                            // 
                            // // This is the main division class for input filed
                            // 
                            //
                            //
                            // Input Box Type and Ids
                            $inputType = 'submit';
                            $inputIdButton = 'stockLedgersStockMismatchButt';
                            $inputNameButton = 'stockLedgersStockMismatchButt';
                            //
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'btn btn-primary';
                            //
                            $inputStyle = 'height:33px;width:100%;font-weight:bold;font-size:15px;'
                                    . 'padding:5px;'
                                    . 'text-align:center;background-color: #ffc0cb; color: #dc143c;';
                            //
                            $inputLabel = 'STOCK MISMATCH'; // Display Label 
                            //
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = 'fa fa-inr';
                            // 
                            // Place Holder inside input box
                            $inputPlaceHolder = 'STOCK MISMATCH';
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            //
                            //
                            //
                            $inputOnClickFun = 'searchStockLedgerSummaryReportDetailsByProductType(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "StockMismatchPanel", "StockMismatchPanel");';
                            //
                            //
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* END CODE FOR STOCK LEDGER STOCK MISMATCH BUTTON @PRIYANKA-20JAN2022
                            //* **************************************************************************************
                            //
                            //
                            include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                            //
                            //
                            ?>
                        </div>
                    </td>
                <?php } ?>
            </tr>
        </table>

        <table id="stockSummaryMainTableId" align="left" border="0" cellspacing="1" cellpadding="2" width="100%" 
               style="margin-top:10px; table-layout: fixed; width: 100%;border:1px solid #c1c1c1;">
                   <?php
                   //
                   //
                   $todayDate = date(d) . ' ' . date(M) . ' ' . date(Y);
                   $todayDateStr = strtotime($todayDate);
                   //
                   //
                   if ($todayFromStrDate == $todayToStrDate) {
                       //
                       $dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate ";
                       //
                       $dateStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate ";
                       //
                       // Code for DATE STR @AUTHOR:PRIYANKA-11OCT2021
                       $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
                       //
                       $dateStrForTodayOutwards = "and(UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate OR UNIX_TIMESTAMP(STR_TO_DATE(sttr_melting_date,'%d %b %Y'))=$todayFromStrDate)";
                       //
                   } else {
                       //
                       //$dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
                       //
                       //$dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<=$todayFromStrDate ";
                       //
                       //
                       //echo '$FromDate == ' . $FromDate . '<br />';
                       //
                       //
                       $arrFromDate = explode('-', $FromDate);
                       //
                       $dayFromDate = $arrFromDate[0];
                       $monthFromDate = strtoupper($arrFromDate[1]);
                       $yearFromDate = $arrFromDate[2];
                       //
                       $newDayFromDate = ($dayFromDate - 1);
                       //
                       $newTodayFromDate = $newDayFromDate . '-' . $monthFromDate . '-' . $yearFromDate;
                       //
                       //
                       //echo '$newTodayFromDate == ' . $newTodayFromDate . '<br />';
                       //
                       //
                       $newFromDate = date("d M Y", strtotime($newTodayFromDate));
                       $newTodayFromStrDate = strtotime($newFromDate);
                       //
                       //
                       $dateRangeStrForOpening = "(UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate) ";
                       //
                       $dateStrForOpening = "(UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate) ";
                       //
                       // Code for DATE STR @AUTHOR:PRIYANKA-11OCT2021
                       $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
                       //
                       // DATE STR FOR TODAY OUTWARD @AUTHOR:PRIYANKA-18DEC2021
                       $dateStrForTodayOutwards = "and ((UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate) OR (UNIX_TIMESTAMP(STR_TO_DATE(sttr_melting_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate))";
                       //
                   }
                   //
                   // 
                   // DATE STR FOR OPENING OUTWARD @AUTHOR:PRIYANKA-12JAN2022
                   $dateStrForOutwards = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate ";
                   //
                   //
                   //echo '$dateRangeStrForOpening == ' . $dateRangeStrForOpening . '<br />';
                   //echo '$dateStrForOpening == ' . $dateStrForOpening . '<br />';
                   //echo '$dateStr == ' . $dateStr . '<br />';
                   //echo '$dateStrForOutwards == ' . $dateStrForOutwards . '<br />';
                   //
                   //
                   //echo '$searchValueMetal == ' . $searchValueMetal . '<br />';
                   //
                   // SEARCH BY METAL STR @AUTHOR:PRIYANKA-21OCT2021
                   if ($searchValueMetal != 'METAL' && $searchValueMetal != '' && $searchValueMetal != NULL) {
                       $searchByColumnMetalStr = " and sttr_metal_type LIKE '$searchValueMetal%' ";
                   } else {
                       $searchByColumnMetalStr = " and sttr_metal_type LIKE 'gold%' ";
                   }
                   //
                   //echo '$searchByColumnMetalStr == ' . $searchByColumnMetalStr . '<br />';
                   //
                   //
                   // SEARCH BY CATEGORY STR @AUTHOR:PRIYANKA-21OCT2021
                   if ($searchValueCategory != 'CATEGORY' && $searchValueCategory != '' && $searchValueCategory != NULL) {
                       $searchByColumnCategoryStr = " and sttr_item_category LIKE '$searchValueCategory%' ";
                   } else {
                       $searchByColumnCategoryStr = NULL;
                   }
                   //
                   //echo '$searchByColumnCategoryStr == ' . $searchByColumnCategoryStr . '<br />';
                   //
                   //
                   // SEARCH BY NAME STR @AUTHOR:PRIYANKA-21OCT2021
                   if ($searchValueName != 'NAME' && $searchValueName != '' && $searchValueName != NULL) {
                       $searchByColumnNameStr = " and sttr_item_name LIKE '$searchValueName%' ";
                   } else {
                       $searchByColumnNameStr = NULL;
                   }
                   //
                   //echo '$searchByColumnNameStr == ' . $searchByColumnNameStr . '<br />';
                   //
                   //
                   // SEARCH BY METAL, CATEGORY AND NAME STR @AUTHOR:PRIYANKA-21OCT2021
                   $finalSearchByColumnStr = " $searchByColumnMetalStr $searchByColumnCategoryStr $searchByColumnNameStr ";
                   //
                   //echo '$finalSearchByColumnStr == ' . $finalSearchByColumnStr . '<br />';
                   //
                   //
                   //
//***********************************************************************************************************
// START CODE FOR STOCK LEDGER SUMMARY CALCULATE OPENING @AUTHOR:PRIYANKA-07DEC2021
//***********************************************************************************************************
//
//
//$dropTempOpeningStock = "DROP table TEMP_OPENING_STOCK";
//mysqli_query($conn, $dropTempOpeningStock) or die('<br/> ERROR:' . mysqli_error($conn));
//
//
//. "and ((sttr_indicator IN ('PURCHASE') and sttr_transaction_type IN ('PURCHASE') "
//. "and (sttr_user_id IS NOT NULL or sttr_user_id != '')) "
//
//
                   $openingStockDetView = "CREATE TABLE TEMP_OPENING_STOCK AS SELECT "
                           . "SUM(sttr_quantity) AS OpeningQTYOp, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_gs_weight,0)) AS OpeningGsWeightMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_gs_weight,0)) AS OpeningGsWeightGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_gs_weight,0)) AS OpeningGsWeightKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_gs_weight,0)) AS OpeningGsWeightCT, "
                           . "SUM(IF(sttr_nt_weight_type = 'MG', sttr_nt_weight,0)) AS OpeningNtWeightMG, "
                           . "SUM(IF(sttr_nt_weight_type = 'GM', sttr_nt_weight,0)) AS OpeningNtWeightGM, "
                           . "SUM(IF(sttr_nt_weight_type = 'KG', sttr_nt_weight,0)) AS OpeningNtWeightKG, "
                           . "SUM(IF(sttr_nt_weight_type = 'CT', sttr_nt_weight,0)) AS OpeningNtWeightCT, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_fine_weight,0)) AS OpeningFnWeightMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_fine_weight,0)) AS OpeningFnWeightGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_fine_weight,0)) AS OpeningFnWeightKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_fine_weight,0)) AS OpeningFnWeightCT, "
                           . "sttr_owner_id, sttr_indicator, sttr_item_category, sttr_item_name, "
                           . "sttr_stock_type, sttr_purity, sttr_metal_type, sttr_firm_id "
                           . "FROM stock_transaction "
                           . "WHERE sttr_owner_id = '$sessionOwnerId' "
                           . "and sttr_firm_id IN ($strFrmId) "
                           // . "and (sttr_melting_status NOT IN ('Y','RFM','AFM','N') OR sttr_melting_status IS NULL) "
                           . "and sttr_indicator IN ('stock', 'AddInvoice', 'RetailStock', 'ItemReturn') " //'imitation', 'crystal', 'strsilver', 'rawMetal',
                           . "$sttrTransTypeStr "
                           . "and ( ($dateStrForOpening) or ($dateRangeStrForOpening) ) "
                           . "GROUP BY sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, sttr_metal_type, sttr_purity ";
//
//echo '$openingStockDetView =@= ' . $openingStockDetView . '<br /><br /><br />';
//
                   $resOpeningStockDetView = mysqli_query($conn, $openingStockDetView);
//
//***********************************************************************************************************
// END CODE FOR STOCK LEDGER SUMMARY CALCULATE OPENING @AUTHOR:PRIYANKA-07DEC2021
//***********************************************************************************************************
//
//
//***********************************************************************************************************
// START CODE FOR STOCK LEDGER SUMMARY CALCULATE OPENING OUTWARD @AUTHOR:PRIYANKA-07DEC2021
//***********************************************************************************************************
//
//
//$dropTempOutwardStock = "DROP table TEMP_OPENING_OUTWARD_STOCK";
//mysqli_query($conn, $dropTempOutwardStock) or die('<br/> ERROR:' . mysqli_error($conn));
//
//
//. "or (sttr_transaction_type IN ('TAG') and sttr_st_id IS NOT NULL)) "
//
//. "and (sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL)) "
//
                   $outwardStockDetView = "CREATE TABLE TEMP_OPENING_OUTWARD_STOCK AS SELECT "
                           . "SUM(sttr_quantity) AS OutwardQTYOp, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_gs_weight,0)) AS OutwardGsWeightOpMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_gs_weight,0)) AS OutwardGsWeightOpGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_gs_weight,0)) AS OutwardGsWeightOpKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_gs_weight,0)) AS OutwardGsWeightOpCT, "
                           . "SUM(IF(sttr_nt_weight_type = 'MG', sttr_nt_weight,0)) AS OutwardNtWeightOpMG, "
                           . "SUM(IF(sttr_nt_weight_type = 'GM', sttr_nt_weight,0)) AS OutwardNtWeightOpGM, "
                           . "SUM(IF(sttr_nt_weight_type = 'KG', sttr_nt_weight,0)) AS OutwardNtWeightOpKG, "
                           . "SUM(IF(sttr_nt_weight_type = 'CT', sttr_nt_weight,0)) AS OutwardNtWeightOpCT, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_fine_weight,0)) AS OutwardFnWeightOpMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_fine_weight,0)) AS OutwardFnWeightOpGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_fine_weight,0)) AS OutwardFnWeightOpKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_fine_weight,0)) AS OutwardFnWeightOpCT, "
                           . "sttr_owner_id, sttr_indicator, sttr_item_category, sttr_item_name, "
                           . "sttr_stock_type, sttr_purity, sttr_metal_type, sttr_firm_id "
                           . "FROM stock_transaction "
                           . "WHERE sttr_owner_id = '$sessionOwnerId' "
                           . "and sttr_firm_id IN ($strFrmId) "
                           . "and (sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL', 'PurchaseReturn') OR ((sttr_melting_status IN ('Y','RFM','AFM','N') OR sttr_melting_status IS NOT NULL) AND sttr_melting_status!='' AND (ROUND(sttr_gs_weight,3)=ROUND(sttr_final_gs_weight,3) ))) "
                           //. "and (sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL) "
                           . "and sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone', 'EXISTING','TAG','SOLDOUT') "
                           //. "and sttr_indicator IN ('stock', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'APPROVAL', 'PurchaseReturn', 'rawMetal','stockCrystal') " // stockCrystal we can remove later
                           . "and sttr_indicator IN ('stock', 'RetailStock', 'APPROVAL', 'PurchaseReturn') "
                           . "$dateStrForOutwards "
                           . "GROUP BY sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, sttr_metal_type, sttr_purity ";
//
//echo '$outwardStockDetView == ' . $outwardStockDetView . '<br /><br />';
//
                   $resOutwardStockDetView = mysqli_query($conn, $outwardStockDetView);
//
//***********************************************************************************************************
// END CODE FOR STOCK LEDGER SUMMARY CALCULATE OPENING OUTWARD @AUTHOR:PRIYANKA-07DEC2021
//***********************************************************************************************************
//
//
//
//
//***********************************************************************************************************
// START CODE FOR STOCK LEDGER SUMMARY CALCULATE TODAY OUTWARD @AUTHOR:PRIYANKA-18DEC2021
//***********************************************************************************************************
//
//
//$dropTempTodayOutwardStock = "DROP table TEMP_TODAY_OUTWARD_STOCK";
//mysqli_query($conn, $dropTempTodayOutwardStock) or die('<br/> ERROR:' . mysqli_error($conn));
//
// DIRECT SELL ENTRIES
// "and ((sttr_transaction_type IN ('sell', 'ESTIMATESELL') and (sttr_sttr_id IS NOT NULL or sttr_sttr_id != '')) "
//
//
//. "or (sttr_transaction_type IN ('TAG') and sttr_st_id IS NOT NULL)) "
//
//
                   $todayOutwardStockDetView = "CREATE TABLE TEMP_TODAY_OUTWARD_STOCK AS SELECT "
                           . "SUM(sttr_quantity) AS OutwardQTY, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_gs_weight,0)) AS OutwardGsWeightMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_gs_weight,0)) AS OutwardGsWeightGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_gs_weight,0)) AS OutwardGsWeightKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_gs_weight,0)) AS OutwardGsWeightCT, "
                           . "SUM(IF(sttr_nt_weight_type = 'MG', sttr_nt_weight,0)) AS OutwardNtWeightMG, "
                           . "SUM(IF(sttr_nt_weight_type = 'GM', sttr_nt_weight,0)) AS OutwardNtWeightGM, "
                           . "SUM(IF(sttr_nt_weight_type = 'KG', sttr_nt_weight,0)) AS OutwardNtWeightKG, "
                           . "SUM(IF(sttr_nt_weight_type = 'CT', sttr_nt_weight,0)) AS OutwardNtWeightCT, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_fine_weight,0)) AS OutwardFnWeightMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_fine_weight,0)) AS OutwardFnWeightGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_fine_weight,0)) AS OutwardFnWeightKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_fine_weight,0)) AS OutwardFnWeightCT, "
                           . "sttr_owner_id, sttr_indicator, sttr_item_category, sttr_item_name, "
                           . "sttr_stock_type, sttr_purity, sttr_metal_type, sttr_firm_id "
                           . "FROM stock_transaction "
                           . "WHERE sttr_owner_id = '$sessionOwnerId' "
                           . "and sttr_firm_id IN ($strFrmId) "
                           . "and (sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL', 'PurchaseReturn') OR ((sttr_melting_status IN ('Y','RFM','AFM','N') OR sttr_melting_status IS NOT NULL) AND sttr_melting_status!='' AND (ROUND(sttr_gs_weight,3)=ROUND(sttr_final_gs_weight,3) ))) "
                           //. "and (sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL) "
                           . "and sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone', 'EXISTING','TAG') "
                           //. "and sttr_indicator IN ('stock', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'PurchaseReturn', 'rawMetal') "
                           . "and sttr_indicator IN ('stock', 'RetailStock','PurchaseReturn') "
                           . "$dateStrForTodayOutwards "
                           . "GROUP BY sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, sttr_metal_type, sttr_purity ";
//
//echo '$todayOutwardStockDetView == ' . $todayOutwardStockDetView . '<br /><br />';
//
                   $resTodayOutwardStockDetView = mysqli_query($conn, $todayOutwardStockDetView);
//
//
//***********************************************************************************************************
// END CODE FOR STOCK LEDGER SUMMARY CALCULATE TODAY OUTWARD @AUTHOR:PRIYANKA-18DEC2021
//***********************************************************************************************************
//
//
//
//
//***********************************************************************************************************
// START CODE FOR STOCK LEDGER SUMMARY CALCULATE INWARD @AUTHOR:PRIYANKA-07DEC2021
//***********************************************************************************************************
//
//
//$dropTempInwardStock = "DROP table TEMP_INWARD_STOCK";
//mysqli_query($conn, $dropTempInwardStock) or die('<br/> ERROR:' . mysqli_error($conn));
//
//
//. "and ((sttr_indicator IN ('PURCHASE') and sttr_transaction_type IN ('PURCHASE') "
//. "and (sttr_user_id IS NOT NULL or sttr_user_id != '')) "
//
//
                   $inwardStockDetView = "CREATE TABLE TEMP_INWARD_STOCK AS SELECT "
                           . "SUM(sttr_quantity) AS SumOfInwardQTY, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_gs_weight,0)) AS SumOfInwardGsWeightMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_gs_weight,0)) AS SumOfInwardGsWeightGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_gs_weight,0)) AS SumOfInwardGsWeightKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_gs_weight,0)) AS SumOfInwardGsWeightCT, "
                           . "SUM(IF(sttr_nt_weight_type = 'MG', sttr_nt_weight,0)) AS SumOfInwardNtWeightMG, "
                           . "SUM(IF(sttr_nt_weight_type = 'GM', sttr_nt_weight,0)) AS SumOfInwardNtWeightGM, "
                           . "SUM(IF(sttr_nt_weight_type = 'KG', sttr_nt_weight,0)) AS SumOfInwardNtWeightKG, "
                           . "SUM(IF(sttr_nt_weight_type = 'CT', sttr_nt_weight,0)) AS SumOfInwardNtWeightCT, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_fine_weight,0)) AS SumOfInwardFnWeightMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_fine_weight,0)) AS SumOfInwardFnWeightGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_fine_weight,0)) AS SumOfInwardFnWeightKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_fine_weight,0)) AS SumOfInwardFnWeightCT, "
                           . "sttr_owner_id, sttr_indicator, sttr_item_category, sttr_item_name, "
                           . "sttr_stock_type, sttr_purity, sttr_metal_type, sttr_firm_id "
                           . "FROM stock_transaction "
                           . "WHERE sttr_owner_id = '$sessionOwnerId' "
                           . "and sttr_firm_id IN ($strFrmId) "
                           //. "and sttr_indicator IN ('stock', 'AddInvoice', 'imitation', 'RetailStock', 'crystal', 'strsilver') "
                           //. "and (sttr_melting_status NOT IN ('Y','RFM','AFM','N') OR sttr_melting_status IS NULL) "
                           . "$sttrTransTypeStr "
                           //. "and sttr_indicator IN ('stock', 'AddInvoice', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'ItemReturn') "
                           . "and sttr_indicator IN ('stock', 'AddInvoice', 'RetailStock','ItemReturn') "
                           . "and sttr_status NOT IN ('DELETED','NotDelFromStock','AssignForMelting') "
                           . "$dateStr "
                           . "GROUP BY sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, sttr_metal_type, sttr_purity ";
                   //
//                   echo '$inwardStockDetView == ' . $inwardStockDetView . '<br />';
                   //
                   $resInwardStockDetView = mysqli_query($conn, $inwardStockDetView);
                   //
                   //
                   //***********************************************************************************************************
                   // END CODE FOR STOCK LEDGER SUMMARY CALCULATE INWARD @AUTHOR:PRIYANKA-07DEC2021
                   //***********************************************************************************************************
                   //
                   //
                   //
                   // Start Code To Fetch All Records - Group By sttr_item_category @AUTHOR:PRIYANKA-11OCT2021
                   $stockReportMainQuery = "SELECT sttr_id, sttr_st_id, sttr_firm_id, "
                           . "sttr_item_category, sttr_item_name, sttr_transaction_type, sttr_stock_type, "
                           . "sttr_purity, sttr_indicator, sttr_metal_type "
                           . "FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                           . "and sttr_firm_id IN ($strFrmId) "
                           //. "and sttr_indicator IN ('AddInvoice', 'stock', 'imitation', 'RetailStock', 'crystal' , 'strsilver') "
                           . "and sttr_indicator IN ('AddInvoice', 'stock', 'RetailStock') "
                           . "and sttr_status NOT IN ('DELETED','NotDelFromStock') "
                           . "and sttr_transaction_type IN ('PURONCASH', 'PURBYSUPP', 'EXISTING', 'TAG') "
                           . " $finalSearchByColumnStr "
                           . "GROUP BY sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, sttr_metal_type, sttr_purity "
                           . "ORDER BY sttr_item_category, sttr_item_name ASC ";
                   //
                   //echo '$stockReportMainQuery == ' . $stockReportMainQuery . '<br /><br />';
                   //
                   $resStockReportMainQuery = mysqli_query($conn, $stockReportMainQuery);
                   // 
                   // 
                   // Number of Records @AUTHOR:PRIYANKA-11OCT2021
                   $noOfRecordsAvailable = mysqli_num_rows($resStockReportMainQuery);
                   // 
                   //
                   if ($noOfRecordsAvailable == 0) {
                       ?>
                <tr>
                    <td valign="middle" align="center">
                        <div class="textLabelHeading" style="font-size: 16px;">~ NO RECORDS FOUND ~</div>
                    </td>
                </tr>
                <?php
            }
            //
            // COUNTER @AUTHOR:PRIYANKA-11OCT2021
            $counter = 1;
            $srNo = 1;
            //
            $totalOpeningQty = 0;
            $totalOpeningGsWt = 0;
            $totalOpeningNtWt = 0;
            $totalOpeningFnWt = 0;
            $totalInwardQty = 0;
            $totalInwardGsWt = 0;
            $totalInwardNtWt = 0;
            $totalInwardFnWt = 0;
            $totalOutwardQty = 0;
            $totalOutwardGsWt = 0;
            $totalOutwardNtWt = 0;
            $totalOutwardFnWt = 0;
            $totalClosingQty = 0;
            $totalClosingGsWt = 0;
            $totalClosingNtWt = 0;
            $totalClosingFnWt = 0;
            //
            //
            while ($rowStockReportMainQuery = mysqli_fetch_array($resStockReportMainQuery)) {
                //
                // CATEGORY @AUTHOR:PRIYANKA-11OCT2021
                $Category = $rowStockReportMainQuery['sttr_item_category'];
                //
                // NAME @AUTHOR:PRIYANKA-11OCT2021
                $Name = $rowStockReportMainQuery['sttr_item_name'];
                //
                // STOCK TYPE @AUTHOR:PRIYANKA-11OCT2021
                $StockType = $rowStockReportMainQuery['sttr_stock_type'];
                //
                // PURITY @AUTHOR:PRIYANKA-11OCT2021
                $Purity = $rowStockReportMainQuery['sttr_purity'];
                //
                // INDICATOR @AUTHOR:PRIYANKA-11OCT2021
                $Indicator = $rowStockReportMainQuery['sttr_indicator'];
                //
                // METAL TYPE @AUTHOR:PRIYANKA-11OCT2021
                $MetalType = $rowStockReportMainQuery['sttr_metal_type'];
                //
                //
                //echo '$searchColumnMetal == ' . $searchColumnMetal . '<br />';
                //echo '$searchValueMetal == ' . $searchValueMetal . '<br />';
                //
                //
                //                echo '$Category == ' . $Category . '<br />';
                //                echo '$Name == ' . $Name . '<br />';
                //                echo '$StockType == ' . $StockType . '<br />';
                //                echo '$Purity == ' . $Purity . '<br />';
                //                echo '$Indicator == ' . $Indicator . '<br />';
                //                echo '$MetalType == ' . $MetalType . '<br />';
                //                echo 'sttr_firm_id == ' . $rowStockReportMainQuery[sttr_firm_id] . '<br /><br />';
                //
                //
                if ($counter == 1) {
                    ?>
                    <tr class="bc_grey">
                        <td align="left" style="background-color: rgba(251, 184, 99, 0.84); width: 3%; ">
                            <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 5px;">SNO.</div>
                        </td>

                        <td align="left" style="background-color: rgba(251, 184, 99, 0.84); width: 4%; ">
                            <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 5px;">
                                <input id="metalType" type="text" name="metalType"
                                       placeholder="METAL" style="font-size: 15px;"
                                       value = "<?php
                                       if ($searchColumnMetal == 'sttr_metal_type')
                                           echo $searchValueMetal;
                                       else
                                           echo 'METAL';
                                       ?>"
                                       onclick = "javascript:this.value = '';"
                                       onblur = "javascript:
                                                                   if (document.getElementById('metalType').value != '') {
                                                               searchStockLedgerSummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'sttr_metal_type', document.getElementById('metalType').value,
                                                                       'sttr_item_category', document.getElementById('itemCategory').value,
                                                                       'sttr_item_name', document.getElementById('itemName').value,
                                                                       'sttr_stock_type', document.getElementById('itemTypee').value);
                                                               return false;
                                                           } else {
                                                               document.getElementById('metalType').value = '<?php
                                       if ($searchValueMetal == 'sttr_metal_type')
                                           echo $searchValueMetal;
                                       else
                                           echo 'METAL';
                                       ?>';
                                                           }"
                                       onkeyup = "if (event.keyCode == 13 && document.getElementById('metalType').value != '') {
                                                               searchStockLedgerSummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'sttr_metal_type', document.getElementById('metalType').value,
                                                                       'sttr_item_category', document.getElementById('itemCategory').value,
                                                                       'sttr_item_name', document.getElementById('itemName').value,
                                                                       'sttr_stock_type', document.getElementById('itemTypee').value);
                                                               return false;
                                                           }"
                                       size = "4" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial"/>
                            </div>
                        </td>

                        <!-- Start Code for CATEGORY @AUTHOR:PRIYANKA-11OCT2021-->
                        <td align="left" style="background-color: rgba(251, 184, 99, 0.84); width: 10%; ">
                            <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 5px;">
                                <input id="itemCategory" type="text" name="itemCategory"
                                       placeholder="CATEGORY" style="font-size: 15px;"
                                       value = "<?php
                                       if ($searchColumnCategory == 'sttr_item_category')
                                           echo $searchValueCategory;
                                       else
                                           echo 'CATEGORY';
                                       ?>"
                                       onclick = "javascript:this.value = '';"
                                       onblur = "javascript:
                                                                   if (document.getElementById('itemCategory').value != '') {
                                                               searchStockLedgerSummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'sttr_metal_type', document.getElementById('metalType').value,
                                                                       'sttr_item_category', document.getElementById('itemCategory').value,
                                                                       'sttr_item_name', document.getElementById('itemName').value,
                                                                       'sttr_stock_type', document.getElementById('itemTypee').value);
                                                               return false;
                                                           } else {
                                                               document.getElementById('itemCategory').value = '<?php
                                       if ($searchValueCategory == 'sttr_item_category')
                                           echo $searchValueCategory;
                                       else
                                           echo 'CATEGORY';
                                       ?>';
                                                           }"
                                       onkeyup="if (event.keyCode == 13 && document.getElementById('itemCategory').value != '') {
                                                               searchStockLedgerSummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'sttr_metal_type', document.getElementById('metalType').value,
                                                                       'sttr_item_category', document.getElementById('itemCategory').value,
                                                                       'sttr_item_name', document.getElementById('itemName').value,
                                                                       'sttr_stock_type', document.getElementById('itemTypee').value);
                                                               return false;
                                                           }"
                                       size="8" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial" />
                            </div>
                        </td>
                        <!-- End Code for CATEGORY @AUTHOR:PRIYANKA-11OCT2021-->

                        <td align="left" style="background-color: rgba(251, 184, 99, 0.84); width: 10%; ">
                            <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 5px;">
                                <input id="itemName" type="text" name="itemName"
                                       placeholder="NAME" style="font-size: 15px;"
                                       value="<?php
                                       if ($searchColumnName == 'sttr_item_name')
                                           echo $searchValueName;
                                       else
                                           echo 'NAME';
                                       ?>"
                                       onclick="javascript:this.value = '';"
                                       onblur="javascript:
                                                                   if (document.getElementById('itemName').value != '') {
                                                               searchStockLedgerSummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'sttr_metal_type', document.getElementById('metalType').value,
                                                                       'sttr_item_category', document.getElementById('itemCategory').value,
                                                                       'sttr_item_name', document.getElementById('itemName').value,
                                                                       'sttr_stock_type', document.getElementById('itemTypee').value);
                                                               return false;
                                                           } else {
                                                               document.getElementById('itemName').value = '<?php
                                       if ($searchValueName == 'sttr_item_name')
                                           echo $searchValueName;
                                       else
                                           echo 'NAME';
                                       ?>';
                                                               searchStockLedgerSummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'sttr_metal_type', document.getElementById('metalType').value,
                                                                       'sttr_item_category', document.getElementById('itemCategory').value,
                                                                       'sttr_item_name', document.getElementById('itemName').value,
                                                                       'sttr_stock_type', document.getElementById('itemTypee').value);
                                                               return false;
                                                           }"
                                       onkeyup="if (event.keyCode == 13 && document.getElementById('itemName').value != '') {
                                                               searchStockLedgerSummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'sttr_metal_type', document.getElementById('metalType').value,
                                                                       'sttr_item_category', document.getElementById('itemCategory').value,
                                                                       'sttr_item_name', document.getElementById('itemName').value,
                                                                       'sttr_stock_type', document.getElementById('itemTypee').value);
                                                               return false;
                                                           }"
                                       size="4" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial" />
                            </div>
                        </td>
                        <!-- Start coding for TYPE filter -->
                        <!-- <td align="left" style="background-color: rgba(251, 184, 99, 0.84); width: 3%; ">
                            <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 3px;">TYPE</div>
                        </td> -->
                        <td align="left" style="background-color: rgba(251, 184, 99, 0.84); width: 3%;">
                            <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 3px;">
                                <input id="itemTypee" type="text" name="itemTypee"
                                       placeholder="TYPE" style="font-size: 15px;"
                                       value="<?php
                                       if ($searchColumnTypee == 'sttr_stock_type')
                                           echo $searchValueTypee;
                                       else
                                           echo 'TYPE';
                                       ?>"
                                       onclick="javascript:this.value = '';"
                                       onblur="javascript:
                                                                   if (document.getElementById('itemTypee').value != '') {
                                                               searchStockLedgerSummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'sttr_metal_type', document.getElementById('metalType').value,
                                                                       'sttr_item_category', document.getElementById('itemCategory').value,
                                                                       'sttr_item_name', document.getElementById('itemName').value,
                                                                       'sttr_stock_type', document.getElementById('itemTypee').value,
                                                                       'sttr_purity', document.getElementById('purity').value);
                                                               return false;
                                                           } else {
                                                               document.getElementById('itemTypee').value = 'TYPE';
                                                           }"

                                       onkeyup="if (event.keyCode == 13 && document.getElementById('itemTypee').value != '') {
                                                               searchStockLedgerSummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'sttr_metal_type', document.getElementById('metalType').value,
                                                                       'sttr_item_category', document.getElementById('itemCategory').value,
                                                                       'sttr_item_name', document.getElementById('itemName').value,
                                                                       'sttr_stock_type', document.getElementById('itemTypee').value,
                                                                       'sttr_purity', document.getElementById('purity').value);
                                                               return false;
                                                           }"
                                       size="4" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial" />
                            </div>
                        </td>






                        <!-- END  -->

                        <!-- start code Purity filter-->


                                                <!-- <td align="left" style="background-color: rgba(251, 184, 99, 0.84); width: 4%; ">
                                                    <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 3px;">PURITY</div>
                                                </td>             -->


                        <td align="left" style="background-color: rgba(251, 184, 99, 0.84); width: 4%;">
                            <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 3px;">
                                <input id="purity" type="text" name="purity"
                                       placeholder="PURITY" style="font-size: 15px;"
                                       value="<?php
                                       if ($searchColumnName == 'sttr_purity')
                                           echo $searchValuePurity;
                                       else
                                           echo 'PURITY';
                                       ?>"
                                       onclick="javascript:this.value = '';"
                                       onblur="javascript:
                                                                   if (document.getElementById('purity').value != '') {
                                                               searchStockLedgerSummaryReportDetailsByColumn(
                                                                       document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'sttr_metal_type', document.getElementById('metalType').value,
                                                                       'sttr_item_category', document.getElementById('itemCategory').value,
                                                                       'sttr_item_name', document.getElementById('itemName').value,
                                                                       'sttr_stock_type', document.getElementById('itemTypee').value,
                                                                       'sttr_purity', document.getElementById('purity').value);
                                                               return false;
                                                           } else {
                                                               document.getElementById('purity').value = 'PURITY';
                                                               searchStockLedgerSummaryReportDetailsByColumn(
                                                                       document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'sttr_metal_type', document.getElementById('metalType').value,
                                                                       'sttr_item_category', document.getElementById('itemCategory').value,
                                                                       'sttr_item_name', document.getElementById('itemName').value,
                                                                       'sttr_stock_type', document.getElementById('itemTypee').value,
                                                                       'sttr_purity', '');
                                                               return false;
                                                           }"
                                       onkeyup="if (event.keyCode == 13 && document.getElementById('purity').value != '') {
                                                               searchStockLedgerSummaryReportDetailsByColumn(
                                                                       document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'sttr_metal_type', document.getElementById('metalType').value,
                                                                       'sttr_item_category', document.getElementById('itemCategory').value,
                                                                       'sttr_item_name', document.getElementById('itemName').value,
                                                                       'sttr_stock_type', document.getElementById('itemTypee').value,
                                                                       'sttr_purity', document.getElementById('purity').value);
                                                               return false;
                                                           }"
                                       size="4" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial" />
                            </div>
                        </td>




                        <!-- END -->


                        <!-- Start Code for OPENING BALANCE @AUTHOR:PRIYANKA-11OCT2021-->
                        <td colspan="6" align="center" style="background-color: rgb(204, 204, 204) ! important; width: 16.5%;">
                            <div class="brown brownMess13Arial" style="font-size: 16px;">OPENING</div>
                            <table align="center" border="1" cellspacing="0" cellpadding="0" width="100%" style="margin-top: 5px; table-layout: fixed; width: 100%;">
                                <tr>
                                    <td align="center" style="width: 22%;">
                                        <!-- OPENING QUANTITY @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">QTY</div>
                                    </td>

                                    <td align="center" style="width: 26%;">
                                        <!-- OPENING GS WT @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">GS WT</div>
                                    </td>

                                    <td align="center" style="width: 26%;">
                                        <!-- OPENING NT WT @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">NT WT</div>
                                    </td>

                                    <td align="center" style="width: 26%;">
                                        <!-- OPENING FN WT @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">FN WT</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- End Code for OPENING BALANCE @AUTHOR:PRIYANKA-11OCT2021-->

                        <!-- Start Code for INWARDS @AUTHOR:PRIYANKA-11OCT2021-->
                        <td colspan="6" align="center" style="background-color: rgb(183, 240, 149) ! important; width: 16.5%;">
                            <div class="brown brownMess13Arial" style="font-size: 16px;">IN</div>
                            <table align="center" border="1" cellspacing="0" cellpadding="0" width="100%" style="margin-top: 5px; table-layout: fixed; width: 100%;">
                                <tr>
                                    <td align="center" style="width: 22%;">
                                        <!-- INWARD QUANTITY @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">QTY</div>
                                    </td>

                                    <td align="center" style="width: 26%;">
                                        <!-- INWARD GS WT @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">GS WT</div>
                                    </td>

                                    <td align="center" style="width: 26%;">
                                        <!-- INWARD NT WT @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">NT WT</div>
                                    </td>

                                    <td align="center" style="width: 26%;">
                                        <!-- INWARD FN WT @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">FN WT</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- End Code for INWARDS @AUTHOR:PRIYANKA-11OCT2021-->

                        <!-- Start Code for OUTWARDS @AUTHOR:PRIYANKA-11OCT2021-->
                        <td colspan="6" align="center" style="background-color: rgb(254, 205, 163) ! important; width: 16.5%;">
                            <div class="brown brownMess13Arial" style="font-size: 16px;">OUT</div>
                            <table align="center" border="1" cellspacing="0" cellpadding="0" width="100%" style="margin-top: 5px; table-layout: fixed; width: 100%;">
                                <tr>
                                    <td align="center" style="width: 22%;">
                                        <!-- OUTWARD QUANTITY @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">QTY</div>
                                    </td>

                                    <td align="center" style="width: 26%;">
                                        <!-- OUTWARD GS WT @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">GS WT</div>
                                    </td>

                                    <td align="center" style="width: 26%;">
                                        <!-- OUTWARD NT WT @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">NT WT</div>
                                    </td>

                                    <td align="center" style="width: 26%;">
                                        <!-- OUTWARD FN WT @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">FN WT</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- End Code for OUTWARDS @AUTHOR:PRIYANKA-11OCT2021-->

                        <!-- Start Code for CLOSING BALANCE @AUTHOR:PRIYANKA-11OCT2021-->
                        <td colspan="6" align="center" style="background-color: rgb(177, 219, 255) ! important; width: 16.5%;">
                            <div class="brown brownMess13Arial" style="font-size: 16px;">CLOSING</div>
                            <table align="center" border="1" cellspacing="0" cellpadding="0" width="100%" style="margin-top: 5px; table-layout: fixed; width: 100%;">
                                <tr>
                                    <td align="center" style="width: 22%;">
                                        <!-- CLOSING QUANTITY @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">QTY</div>
                                    </td>

                                    <td align="center" style="width: 26%;">
                                        <!-- CLOSING GS WT @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">GS WT</div>
                                    </td>

                                    <td align="center" style="width: 26%;">
                                        <!-- CLOSING NT WT @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">NT WT</div>
                                    </td>

                                    <td align="center" style="width: 26%;">
                                        <!-- CLOSING FN WT @AUTHOR:PRIYANKA-11OCT2021-->
                                        <div class="brown brownMess13Arial" style="font-size: 14px;">FN WT</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- End Code for CLOSING BALANCE @AUTHOR:PRIYANKA-11OCT2021-->
                    </tr>
                    <?php
                }
                $counter = 2;
                //
                //
                //echo '$todayFromStrDate == ' . $todayFromStrDate . '<br />';
                //echo '$todayToStrDate == ' . $todayToStrDate . '<br />';
                //echo '$startDate == ' . $startDate . '<br />';
                //echo '$endDate == ' . $endDate . '<br />';
                //
                //
                //***********************************************************************************************************
                // START CODE FOR STOCK LEDGER SUMMARY CALCULATE OPENING @AUTHOR:PRIYANKA-29DEC2021
                //***********************************************************************************************************
                //
                include 'omStockLedgerSummaryOpeningCal.php';
                //
                //***********************************************************************************************************
                // END CODE FOR STOCK LEDGER SUMMARY CALCULATE OPENING @AUTHOR:PRIYANKA-29DEC2021
                //***********************************************************************************************************
                //
                //
                //
                //
                //***********************************************************************************************************
                // START CODE FOR STOCK LEDGER SUMMARY CALCULATE INWARD @AUTHOR:PRIYANKA-12JAN2022
                //***********************************************************************************************************
                //
                include 'omStockLedgerSummaryInwardCal.php';
                //                                               
                //***********************************************************************************************************
                // END CODE FOR STOCK LEDGER SUMMARY CALCULATE INWARD @AUTHOR:PRIYANKA-12JAN2022
                //***********************************************************************************************************
                //
                //
                //
                //
                //***********************************************************************************************************
                // START CODE FOR STOCK LEDGER SUMMARY CALCULATE OUTWARD @AUTHOR:PRIYANKA-12JAN2022
                //***********************************************************************************************************
                //
                include 'omStockLedgerSummaryOutwardCal.php';
                //
                //***********************************************************************************************************
                // END CODE FOR STOCK LEDGER SUMMARY CALCULATE OUTWARD @AUTHOR:PRIYANKA-12JAN2022
                //***********************************************************************************************************
                //
                //echo '$OpeningGsWeight == ' . $OpeningGsWeight . '<br />';
                //echo '$InwardGsWeight == ' . $InwardGsWeight . '<br />';
                //echo '$OutwardGsWeight == ' . $OutwardGsWeight . '<br />';
                //
                if ($OpeningGsWeight > 0 || $InwardGsWeight > 0 || $OutwardGsWeight > 0) {
                    ?>
                    <tr>
                    <div id="myModal<?php echo $rowStockReportMainQuery['sttr_id']; ?>" class="modal"></div>

                    <td align="left" style="background-color: rgb(255, 241, 203); width: 3%; ">
                        <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                            <!--<a style="cursor: pointer;">
                            <?php echo strtoupper($srNo); ?>
                        </a>-->
                            <?php echo strtoupper($srNo); ?>
                        </div>
                    </td>

                    <td align="left" style="background-color: rgb(255, 241, 203); width: 4%; ">
                        <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                            <!--<a style="cursor: pointer;">
                            <?php echo strtoupper($MetalType); ?>
                        </a>-->
                            <?php echo strtoupper($MetalType); ?>
                        </div>
                    </td>

                    <!-- Start Code for CATEGORY @AUTHOR:PRIYANKA-11OCT2021-->
                    <td align="left" style="background-color: rgb(255, 241, 203); width: 10%; ">
                        <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                            <!--<a style="cursor: pointer;">
                            <?php echo strtoupper($Category); ?>
                        </a>-->
                            <?php echo strtoupper($Category); ?>
                        </div>
                    </td>
                    <!-- End Code for CATEGORY @AUTHOR:PRIYANKA-11OCT2021-->

                    <td align="left" style="background-color: rgb(255, 241, 203); width: 10%;">
                        <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                            <!--<a style="cursor: pointer;">
                            <?php echo strtoupper($Name); ?>
                        </a>-->
                            <?php echo strtoupper($Name); ?>
                        </div>
                    </td>

                    <td align="center" style="background-color: rgb(255, 241, 203); width: 3%;">
                        <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                            <!--<a style="cursor: pointer;"> 
                            <?php
                            if ($StockType == 'wholesale') {
                                echo 'W';
                            } else {
                                echo 'R';
                            }
                            ?>
                        </a>-->
                            <?php
                            if ($StockType == 'wholesale') {
                                echo 'W';
                            } else {
                                echo 'R';
                            }
                            ?>
                        </div>
                    </td>

                    <td align="right" style="background-color: rgb(255, 241, 203); width: 4%;">
                        <div style="font-size: 13px;font-weight: bold;margin-left: 4px;margin-right: 3px;">
                            <!--<a style="cursor: pointer;">
                            <?php echo $Purity . ' %'; ?>
                        </a>-->
                            <?php echo $Purity; ?>
                        </div>
                    </td>

                    <!-- Start Code for OPENING BALANCE @AUTHOR:PRIYANKA-11OCT2021-->
                    <td colspan="6" align="center" style="font-size: 13px; background-color: rgb(242, 242, 242) ! important; width: 16.5%;">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%"
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">
                                   <?php
                                   //
                                   //
                                   //***********************************************************************************************************
                                   // START CODE FOR STOCK LEDGER SUMMARY CALCULATE OPENING @AUTHOR:PRIYANKA-14OCT2021
                                   //***********************************************************************************************************
                                   //
                                   //include 'omStockLedgerSummaryOpeningCal.php';
                                   //
                                   //***********************************************************************************************************
                                   // END CODE FOR STOCK LEDGER SUMMARY CALCULATE OPENING @AUTHOR:PRIYANKA-14OCT2021
                                   //***********************************************************************************************************
                                   //
                                   //                    
                                   ?>
                            <tr>
                                <td align="left" style="padding-left: 4px; width: 22%;">
                                    <div>
                                        <?php
                                        // OPENING QTY @AUTHOR:PRIYANKA-11OCT2021
                                        if ($OpeningQTY == 0 || $OpeningQTY < 0 || $OpeningGsWeight < 0) {
                                            echo '-';
                                        } else {
                                            echo $OpeningQTY;
                                        }
                                        ?>
                                    </div>
                                </td>

                                <?php
                                //
                                //echo 'sttr_id #==# ' . $rowStockReportMainQuery['sttr_id']; 
                                //
                                ?>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div>
                                        <?php if ($OpeningGsWeight > 0) { ?>
                                            <a style="cursor: pointer;"
                                               onclick="getStockSummaryTransactionsReportPopUp('<?php echo $rowStockReportMainQuery[sttr_id]; ?>', '<?php echo $todayFromStrDate; ?>', '<?php echo $todayToStrDate; ?>', '<?php echo strtoupper($startDate); ?>', '<?php echo strtoupper($endDate); ?>', '<?php echo $strFrmId; ?>', '<?php echo $Category; ?>', '<?php echo $Name; ?>', '<?php echo $StockType; ?>', '<?php echo $Purity; ?>', 'OpeningDetails', '<?php echo $documentRoot; ?>');">
                                                   <?php
                                                   // OPENING GS WT @AUTHOR:PRIYANKA-11OCT2021
                                                   if ($OpeningGsWeight == 0) {
                                                       echo '-';
                                                   } else {
                                                       if ($OpeningGsWeight > 0) {
                                                           echo decimalVal($OpeningGsWeight, 3);
                                                       } else {
                                                           echo '-';
                                                       }
                                                   }
                                                   ?>
                                            </a>
                                        <?php } else { ?>
                                            <!--<a 
                                            <?php if ($OpeningGsWeight > 0 && $StockType != 'wholesale') { ?>
                                                                                style="cursor: pointer;" 
                                                                                onclick="getStockSummaryTransactionsReportPopUp('<?php echo $rowStockReportMainQuery[sttr_id]; ?>', '<?php echo $todayFromStrDate; ?>', '<?php echo $todayToStrDate; ?>', '<?php echo strtoupper($startDate); ?>', '<?php echo strtoupper($endDate); ?>', '<?php echo $strFrmId; ?>', '<?php echo $Category; ?>', '<?php echo $Name; ?>', '<?php echo $StockType; ?>', '<?php echo $Purity; ?>', 'OpeningDetails', '<?php echo $documentRoot; ?>');"
                                            <?php } ?> >
                                            <?php
                                            // OPENING GS WT @AUTHOR:PRIYANKA-11OCT2021
                                            if ($OpeningGsWeight == 0) {
                                                echo '-';
                                            } else {
                                                if ($OpeningGsWeight > 0) {
                                                    echo decimalVal($OpeningGsWeight, 3);
                                                } else {
                                                    echo '-';
                                                }
                                            }
                                            ?>
                                        </a>-->
                                            <?php
                                            // OPENING GS WT @AUTHOR:PRIYANKA-11OCT2021
                                            if ($OpeningGsWeight == 0) {
                                                echo '-';
                                            } else {
                                                if ($OpeningGsWeight > 0) {
                                                    echo decimalVal($OpeningGsWeight, 3);
                                                } else {
                                                    echo '-';
                                                }
                                            }
                                            ?>
                                        <?php } ?>
                                    </div>
                                </td>

                                <?php
                                //echo 'sttr_id *==* ' . $rowStockReportMainQuery['sttr_id']; 
                                ?>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div>
                                        <?php
                                        // OPENING NT WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($OpeningNtWeight == 0) {
                                            echo '-';
                                        } else {
                                            if ($OpeningNtWeight > 0) {
                                                echo decimalVal($OpeningNtWeight, 3);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div>
                                        <?php
                                        // OPENING FN WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($OpeningFnWeight == 0) {
                                            echo '-';
                                        } else {
                                            if ($OpeningFnWeight > 0) {
                                                echo decimalVal($OpeningFnWeight, 3);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <!-- End Code for OPENING BALANCE @AUTHOR:PRIYANKA-11OCT2021-->

                    <!-- Start Code for INWARDS @AUTHOR:PRIYANKA-11OCT2021-->
                    <td colspan="6" align="center" style="font-size: 13px; background-color: rgb(226, 239, 218) ! important; width: 16.5%;">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%"
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">
                                   <?php
                                   //
                                   //
                                   //***********************************************************************************************************
                                   // START CODE FOR STOCK LEDGER SUMMARY CALCULATE INWARD @AUTHOR:PRIYANKA-25OCT2021
                                   //***********************************************************************************************************
                                   //
                                   //include 'omStockLedgerSummaryInwardCal.php';
                                   //                                               
                                   //***********************************************************************************************************
                                   // END CODE FOR STOCK LEDGER SUMMARY CALCULATE INWARD @AUTHOR:PRIYANKA-25OCT2021
                                   //***********************************************************************************************************
                                   //
                                   //
                                   ?>
                            <tr>
                                <td align="left" style="padding-left: 4px; width: 22%;">
                                    <div>
                                        <?php
                                        // INWARD QTY @AUTHOR:PRIYANKA-11OCT2021
                                        if ($InwardQTY == 0 || $InwardQTY < 0) {
                                            echo '-';
                                        } else {
                                            echo $InwardQTY;
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div>
                                        <?php if ($InwardGsWeight > 0 && $StockType != 'wholesale') { ?>
                                            <a style="cursor: pointer;"
                                               onclick="getStockSummaryTransactionsReportPopUp('<?php echo $rowStockReportMainQuery[sttr_id]; ?>', '<?php echo $todayFromStrDate; ?>', '<?php echo $todayToStrDate; ?>', '<?php echo strtoupper($startDate); ?>', '<?php echo strtoupper($endDate); ?>', '<?php echo $strFrmId; ?>', '<?php echo $Category; ?>', '<?php echo $Name; ?>', '<?php echo $StockType; ?>', '<?php echo $Purity; ?>', 'InwardDetails', '<?php echo $documentRoot; ?>');">
                                                   <?php
                                                   // INWARD GS WT @AUTHOR:PRIYANKA-11OCT2021
                                                   if ($InwardGsWeight == 0) {
                                                       echo '-';
                                                   } else {
                                                       if ($InwardGsWeight > 0) {
                                                           echo decimalVal($InwardGsWeight, 3);
                                                       } else {
                                                           echo '-';
                                                       }
                                                   }
                                                   ?>
                                            </a>
                                        <?php } else { ?>
                                            <?php
                                            // INWARD GS WT @AUTHOR:PRIYANKA-11OCT2021
                                            if ($InwardGsWeight == 0) {
                                                echo '-';
                                            } else {
                                                if ($InwardGsWeight > 0) {
                                                    echo decimalVal($InwardGsWeight, 3);
                                                } else {
                                                    echo '-';
                                                }
                                            }
                                            ?>
                                        <?php } ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div>
                                        <?php
                                        // INWARD NT WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($InwardNtWeight == 0) {
                                            echo '-';
                                        } else {
                                            if ($InwardNtWeight > 0) {
                                                echo decimalVal($InwardNtWeight, 3);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div>
                                        <?php
                                        // INWARD FN WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($InwardFnWeight == 0) {
                                            echo '-';
                                        } else {
                                            if ($InwardFnWeight > 0) {
                                                echo decimalVal($InwardFnWeight, 3);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <!-- End Code for INWARDS @AUTHOR:PRIYANKA-11OCT2021-->

                    <!-- Start Code for OUTWARDS @AUTHOR:PRIYANKA-11OCT2021-->
                    <td colspan="6" align="center" style="font-size: 13px; background-color: rgb(252, 228, 214) ! important; width: 16.5%; ">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%"
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">
                                   <?php
                                   //
                                   //
                                   //***********************************************************************************************************
                                   // START CODE FOR STOCK LEDGER SUMMARY CALCULATE OUTWARD @AUTHOR:PRIYANKA-25OCT2021
                                   //***********************************************************************************************************
                                   //
                                   //include 'omStockLedgerSummaryOutwardCal.php';
                                   //
                                   //***********************************************************************************************************
                                   // END CODE FOR STOCK LEDGER SUMMARY CALCULATE OUTWARD @AUTHOR:PRIYANKA-25OCT2021
                                   //***********************************************************************************************************
                                   //
                                   //
                                   ?>
                            <tr>
                                <td align="left" style="padding-left: 4px; width: 22%;">
                                    <div>
                                        <?php
                                        // OUTWARD QTY @AUTHOR:PRIYANKA-11OCT2021
                                        if ($OutwardQTY == 0 || $OutwardQTY < 0) {
                                            echo '-';
                                        } else {
                                            echo $OutwardQTY;
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div>
                                        <?php if ($OutwardGsWeight > 0) { ?>
                                            <a style="cursor: pointer;"
                                               onclick="getStockSummaryTransactionsReportPopUp('<?php echo $rowStockReportMainQuery[sttr_id]; ?>', '<?php echo $todayFromStrDate; ?>', '<?php echo $todayToStrDate; ?>', '<?php echo strtoupper($startDate); ?>', '<?php echo strtoupper($endDate); ?>', '<?php echo $strFrmId; ?>', '<?php echo $Category; ?>', '<?php echo $Name; ?>', '<?php echo $StockType; ?>', '<?php echo $Purity; ?>', 'OutwardDetails', '<?php echo $documentRoot; ?>');">
                                                   <?php
                                                   // OUTWARD GS WT @AUTHOR:PRIYANKA-11OCT2021
                                                   if ($OutwardGsWeight == 0) {
                                                       echo '-';
                                                   } else {
                                                       if ($OutwardGsWeight > 0) {
                                                           echo decimalVal($OutwardGsWeight, 3);
                                                       } else {
                                                           echo '-';
                                                       }
                                                   }
                                                   ?>
                                            </a>
                                        <?php } else { ?>
                                            <?php
                                            // OUTWARD GS WT @AUTHOR:PRIYANKA-11OCT2021
                                            if ($OutwardGsWeight == 0) {
                                                echo '-';
                                            } else {
                                                if ($OutwardGsWeight > 0) {
                                                    echo decimalVal($OutwardGsWeight, 3);
                                                } else {
                                                    echo '-';
                                                }
                                            }
                                            ?>
                                        <?php } ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div>
                                        <?php
                                        // OUTWARD NT WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($OutwardNtWeight == 0) {
                                            echo '-';
                                        } else {
                                            if ($OutwardNtWeight > 0) {
                                                echo decimalVal($OutwardNtWeight, 3);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div>
                                        <?php
                                        // OUTWARD FN WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($OutwardFnWeight == 0) {
                                            echo '-';
                                        } else {
                                            if ($OutwardFnWeight > 0) {
                                                echo decimalVal($OutwardFnWeight, 3);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <!-- End Code for OUTWARDS @AUTHOR:PRIYANKA-11OCT2021-->

                    <!-- Start Code for CLOSING BALANCE @AUTHOR:PRIYANKA-11OCT2021-->
                    <td colspan="6" align="center" style="font-size: 13px; background-color: rgb(221, 235, 247) ! important; width: 16.5%;">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%"
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">
                                   <?php
                                   //
                                   //
                                   //***********************************************************************************************************
                                   // START CODE FOR STOCK LEDGER SUMMARY CALCULATE CLOSING @AUTHOR:PRIYANKA-25OCT2021
                                   //***********************************************************************************************************
                                   //
                                   include 'omStockLedgerSummaryClosingCal.php';
                                   //
                                   //***********************************************************************************************************
                                   // END CODE FOR STOCK LEDGER SUMMARY CALCULATE CLOSING @AUTHOR:PRIYANKA-25OCT2021
                                   //***********************************************************************************************************
                                   //
                                   //
                                   ?>
                            <tr>
                                <td align="left" style="padding-left: 4px; width: 22%;">
                                    <div>
                                        <?php
                                        // CLOSING QTY @AUTHOR:PRIYANKA-11OCT2021
                                        if ($ClosingQTY == 0 || $ClosingQTY < 0) {
                                            echo '-';
                                        } else {
                                            echo $ClosingQTY;
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div>
                                        <?php if ($ClosingGsWeight > 0 && $StockType != 'wholesale') { ?>
                                            <a style="cursor: pointer;"
                                               onclick="getStockSummaryTransactionsReportPopUp('<?php echo $rowStockReportMainQuery[sttr_id]; ?>', '<?php echo $todayFromStrDate; ?>', '<?php echo $todayToStrDate; ?>', '<?php echo strtoupper($startDate); ?>', '<?php echo strtoupper($endDate); ?>', '<?php echo $strFrmId; ?>', '<?php echo $Category; ?>', '<?php echo $Name; ?>', '<?php echo $StockType; ?>', '<?php echo $Purity; ?>', 'ClosingDetails', '<?php echo $documentRoot; ?>');">
                                                   <?php
                                                   // CLOSING GS WT @AUTHOR:PRIYANKA-11OCT2021
                                                   if ($ClosingGsWeight == 0) {
                                                       echo '-';
                                                   } else {
                                                       if ($ClosingGsWeight > 0) {
                                                           echo decimalVal($ClosingGsWeight, 3);
                                                       } else {
                                                           echo '-';
                                                       }
                                                   }
                                                   ?>
                                            </a>
                                        <?php } else { ?>
                                            <?php
                                            //
                                            // CLOSING GS WT @AUTHOR:PRIYANKA-11OCT2021
                                            if ($ClosingGsWeight == 0) {
                                                echo '-';
                                            } else {
                                                if ($ClosingGsWeight > 0) {
                                                    echo decimalVal($ClosingGsWeight, 3);
                                                } else {
                                                    echo '-';
                                                }
                                            }
                                            //
                                            ?>
                                        <?php } ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div>
                                        <?php
                                        // CLOSING NT WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($ClosingNtWeight == 0) {
                                            echo '-';
                                        } else {
                                            if ($ClosingNtWeight > 0) {
                                                echo decimalVal($ClosingNtWeight, 3);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div>
                                        <?php
                                        // CLOSING FN WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($ClosingFnWeight == 0) {
                                            echo '-';
                                        } else {
                                            if ($ClosingFnWeight > 0) {
                                                echo decimalVal($ClosingFnWeight, 3);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <!-- End Code for CLOSING BALANCE @AUTHOR:PRIYANKA-11OCT2021-->
                    </tr>
                    <?php
                    //
                    $srNo++;
                    //
                }
            }
            //
            // End Code To Fetch All Records - Group By sttr_item_category @AUTHOR:PRIYANKA-11OCT2021 
            //
            ?>

            <?php if ($noOfRecordsAvailable > 0) { ?>
                <tr>
                    <td colspan="28">
                        <div class="hrGrey" style="width: 100%; margin-top: 1px; margin-bottom: 0px;"></div>
                    </td>
                </tr>

                <tr>
                    <!-- Start Code for TOTALS @AUTHOR:PRIYANKA-11OCT2021-->
                    <td colspan="6" align="left" width="12%">
                        <div class="brown brownMess13Arial"
                             style="font-size: 14px;font-weight: bold;margin-left: 5px;">TOTAL : </div>
                    </td>

                    <td colspan="6" align="center" style="background-color: rgb(236, 236, 236) ! important; width: 16.5%">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%"
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">
                            <tr>
                                <td align="left" style="padding-left: 4px; padding-right: 3px; width: 22%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OPENING QTY @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalOpeningQty == 0) {
                                            echo '-';
                                        } else {
                                            echo $totalOpeningQty;
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OPENING GS WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalOpeningGsWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalOpeningGsWt, 3);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OPENING NT WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalOpeningNtWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalOpeningNtWt, 3);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OPENING FN WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalOpeningFnWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalOpeningFnWt, 3);
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td colspan="6" align="center" style="background-color: rgb(208, 242, 189) ! important; width: 16.5%;">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%"
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">
                            <tr>
                                <td align="left" style="padding-left: 4px; padding-right: 3px; width: 22%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL INWARD QTY @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalInwardQty == 0) {
                                            echo '-';
                                        } else {
                                            echo $totalInwardQty;
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL INWARD GS WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalInwardGsWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalInwardGsWt, 3);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL INWARD NT WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalInwardNtWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalInwardNtWt, 3);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL INWARD FN WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalInwardFnWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalInwardFnWt, 3);
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td colspan="6" align="center" style="background-color: rgb(249, 226, 205) ! important; width: 16.5%;">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%"
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">
                            <tr>
                                <td align="left" style="padding-left: 4px; padding-right: 3px; width: 22%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OUTWARD QTY @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalOutwardQty == 0) {
                                            echo '-';
                                        } else {
                                            echo $totalOutwardQty;
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OUTWARD GS WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalOutwardGsWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalOutwardGsWt, 3);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OUTWARD NT WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalOutwardNtWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalOutwardNtWt, 3);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OUTWARD FN WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalOutwardFnWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalOutwardFnWt, 3);
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td colspan="6" align="center" style="background-color: rgb(207, 230, 251) ! important; width: 16.5%;">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%"
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">
                            <tr>
                                <td align="left" style="padding-left: 4px; padding-right: 3px; width: 22%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL CLOSING QTY @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalClosingQty == 0) {
                                            echo '-';
                                        } else {
                                            echo $totalClosingQty;
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL CLOSING GS WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalClosingGsWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalClosingGsWt, 3);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL CLOSING NT WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalClosingNtWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalClosingNtWt, 3);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 26%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL CLOSING FN WT @AUTHOR:PRIYANKA-11OCT2021
                                        if ($totalClosingFnWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalClosingFnWt, 3);
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <!-- End Code for TOTALS @AUTHOR:PRIYANKA-11OCT2021-->
                </tr>

                <tr>
                    <td colspan="28">
                        <div class="hrGrey" style="width: 100%; margin-top: 1px; margin-bottom: 0px;"></div>
                    </td>
                </tr>
                <?php
            }
            //
            //
            // DROP TEMP_OPENING_STOCK TABLE @AUTHOR:PRIYANKA-07DEC2021
            $dropTempOpStock = "DROP table TEMP_OPENING_STOCK";
            mysqli_query($conn, $dropTempOpStock) or die('<br/> ERROR:' . mysqli_error($conn));
            //
            //
            // DROP TEMP_OPENING_OUTWARD_STOCK TABLE @AUTHOR:PRIYANKA-07DEC2021
            $dropTempOpeningOutStock = "DROP table TEMP_OPENING_OUTWARD_STOCK";
            mysqli_query($conn, $dropTempOpeningOutStock) or die('<br/> ERROR:' . mysqli_error($conn));
            //
            //
            // DROP TEMP_TODAY_OUTWARD_STOCK TABLE @AUTHOR:PRIYANKA-07DEC2021
            $dropTempTodayOutStock = "DROP table TEMP_TODAY_OUTWARD_STOCK";
            mysqli_query($conn, $dropTempTodayOutStock) or die('<br/> ERROR:' . mysqli_error($conn));
            //
            //
            // DROP TEMP_INWARD_STOCK TABLE @AUTHOR:PRIYANKA-07DEC2021
            $dropTempInStock = "DROP table TEMP_INWARD_STOCK";
            mysqli_query($conn, $dropTempInStock) or die('<br/> ERROR:' . mysqli_error($conn));
            //
            //
            ?>
        </table>
    <?php } ?>
</div>
