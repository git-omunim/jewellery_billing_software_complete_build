<?php
/*
 * **************************************************************************************************
 * @Description: STOCK LEDGER STOCK MISMATCH PANEL MAIN FILE @AUTHOR:PRIYANKA-20JAN2022
 * **************************************************************************************************
 *
 * Created on JAN 20, 2022 12:30:58 PM 
 * **************************************************************************************
 * @FileName: omStockLedgerStockMismatch.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMRETAIL 
 * @version 2.7.118
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:PRIYANKA-20JAN2022
 *  AUTHOR: PRIYANKA
 *  REASON:
 *
 * Project Name: Online Munim ERP Accounting Software
 * Version: 2.7.118
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
?>
<?php
    $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
    $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
    $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
    $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
    $nepaliDate =  $rowNepaliDateIndicator['omly_value'];
// FOR STOCK LEDGER STOCK MISMATCH @AUTHOR:PRIYANKA-20JAN2022
// 
// Added Code To GET Firm Details @AUTHOR:PRIYANKA-20JAN2022
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
// Start Code To GET Firm Details @AUTHOR:PRIYANKA-20JAN2022
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR:PRIYANKA-20JAN2022
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
    //Set String for Public Firms @AUTHOR:PRIYANKA-20JAN2022
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}
// End Code To GET Firm Details @AUTHOR:PRIYANKA-20JAN2022
//
//
//echo 'firmId == ' . $_REQUEST['firmId'] . '<br />';
//echo 'strFrmId == ' . $strFrmId . '<br />';
//echo 'selFirmId == ' . $selFirmId . '<br />';
//
//
// To Get Owner Id @AUTHOR:PRIYANKA-20JAN2022
$sessionOwnerId = $_SESSION['sessionOwnerId'];
//
//
// START DATE @AUTHOR:PRIYANKA-20JAN2022
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
// END DATE @AUTHOR:PRIYANKA-20JAN2022
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
// START DATE STR @AUTHOR:PRIYANKA-20JAN2022
$todayFromStrDate = strtotime($fromDate);
// END DATE STR @AUTHOR:PRIYANKA-20JAN2022
//
$todayToStrDate = strtotime($toDate);
//
//
// To Get Panel Name @AUTHOR:PRIYANKA-20JAN2022
if ($panelName == '' || $panelName == NULL)
    $panelName = $_REQUEST['panelName'];
//
// Panel Name @AUTHOR:PRIYANKA-20JAN2022
if ($panelName == '' || $panelName == NULL)
    $panelName = 'StockSummaryPanelByCategory';
//
//
//print_r($_REQUEST);
//echo '<br />';
//
//
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
//
//
//
//echo '$searchColumnMetal == ' . $searchColumnMetal . '<br />';
//echo '$searchValueMetal == ' . $searchValueMetal . '<br />';
//echo '$searchColumnCategory == ' . $searchColumnCategory . '<br />';
//echo '$searchValueCategory == ' . $searchValueCategory . '<br />';
//echo '$searchColumnName == ' . $searchColumnName . '<br />';
//echo '$searchValueName == ' . $searchValueName . '<br />';
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
                    <!-- Code To Display Stock Summary Panel Name @AUTHOR:PRIYANKA-20JAN2022-->
                    <div class="textLabelHeading">STOCK MISMATCH</div>
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
                <!-- Code for Firm @AUTHOR:PRIYANKA-20JAN2022-->
                <div class="brown brownMess13Arial" style="margin-left: 70px;">FIRM</div>
            </td>
            
            <td align="center" width="210px" class="padLeft25">
                <!-- Code for Start Date @AUTHOR:PRIYANKA-20JAN2022-->
                <div class="brown brownMess13Arial" style="margin-right: 20px;">START DATE</div>
            </td>
            
            <td><div></div></td>
            
            <td align="center" width="210px">
                <!-- Code for End Date @AUTHOR:PRIYANKA-20JAN2022-->
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
                                // Start Code for FIRM @AUTHOR:PRIYANKA-20JAN2022
                                //
                                include 'omStockLedgerSummaryFirm.php';
                                //
                                // End Code for FIRM @AUTHOR:PRIYANKA-20JAN2022
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>          
            </td>
            
            <td align="center" class="padLeft25">
                <table border="0" cellspacing="0" cellpadding="0" align="center" style="margin-right: 15px; width:93%;">
                    <tr>
                        <td valign="middle" align="center" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10">
                            <?php
                            // Start Code for START DATE @AUTHOR:PRIYANKA-20JAN2022
                            //
                            $Day = 'FromDay';
                            $Month = 'FromMonth';
                            $Year = 'FromYear';
                            $date = $fromDate;
                            //
                            include 'omstocrptfromdate.php';
                            //
                            // End Code for START DATE @AUTHOR:PRIYANKA-20JAN2022
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
                            // Start Code for END DATE @AUTHOR:PRIYANKA-20JAN2022
                            //
                                   include 'omstocrpttodate.php';
                            //
                            // End Code for END DATE @AUTHOR:PRIYANKA-20JAN2022
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
            
            <td align="center">
                <!-- Start Code for GO Button @AUTHOR:PRIYANKA-20JAN2022-->
                <input id="goButton" name="goButton" type="button" style="margin-left: 16px;"
                       onclick="javascript:
                                searchStockLedgerSummaryReportDetails(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                         document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                         document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'));
                                                         return false;"
                       value="GO" class="frm-btn height_25" />
                <!-- End Code for GO Button @AUTHOR:PRIYANKA-20JAN2022-->
            </td>
            
        </tr>
    </table>
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" 
           style="margin-top: 10px;">
        <tr>           
            <td valign="middle" align="center" width="20%">
                <div id="stockLedgerGoldButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR GOLD STOCK LEDGER @PRIYANKA-20JAN2022
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
                    $inputStyle = 'height:25px;width:180px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center;margin-left:110px; margin-right:0px; background-color: #ffc0cb;color:#dc143c;';
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
                    //* END CODE FOR GOLD STOCK LEDGER @PRIYANKA-20JAN2022
                    //* **************************************************************************************
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="center" width="20%">
                <div id="stockLedgerSilverButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR SILVER STOCK LEDGER @PRIYANKA-20JAN2022
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
                    $inputStyle = 'height:25px;width:180px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-left:5px; background-color: #6EE36E; color: #0C3C03;';
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
                    //* END CODE FOR SILVER STOCK LEDGER @PRIYANKA-20JAN2022
                    //* **************************************************************************************
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            <td valign="middle" align="center" width="20%">
                <div id="stockLedgersStoneButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STONE STOCK LEDGER @PRIYANKA-20JAN2022
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
                    $inputStyle = 'height:25px;width:180px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-left:0px; background-color: #FFC469; color: #AA6600;';
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
                    //* END CODE FOR STONE STOCK LEDGER @PRIYANKA-20JAN2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="center" width="20%">
                <div id="stockLedgerGoldButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR GOLD STOCK LEDGER @PRIYANKA-20JAN2022
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
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center;margin-left:0px; margin-right:0px; background-color: #ffc0cb;color:#dc143c;';
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
                    //* END CODE FOR GOLD STOCK LEDGER @PRIYANKA-20JAN2022
                    //* **************************************************************************************
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="center" width="20%">
                <div id="stockLedgerSilverButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR SILVER STOCK LEDGER @PRIYANKA-20JAN2022
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
                    $inputStyle = 'height:25px;width:145px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right: 5px; background-color: #6EE36E; color: #0C3C03;';
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
                    //* END CODE FOR SILVER STOCK LEDGER @PRIYANKA-20JAN2022
                    //* **************************************************************************************
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            <td valign="middle" align="center" width="20%">
                <div id="stockLedgersStoneButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STONE STOCK LEDGER @PRIYANKA-20JAN2022
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
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:10px; background-color: #FFC469; color: #AA6600;';
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
                    //* END CODE FOR STONE STOCK LEDGER @PRIYANKA-20JAN2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="center" width="20%">
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
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:55px; background-color: #ffc0cb; color: #dc143c;';
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
        </tr>
    </table>
    
    <?php if ($_REQUEST['subPanelName'] == 'StockMismatchPanel') { ?>

    <table id="stockSummaryMainTableId" align="left" border="0" cellspacing="1" cellpadding="2" width="100%" 
           style="margin-top: 5px;">
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
            // Code for DATE STR @AUTHOR:PRIYANKA-20JAN2022
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
            //
            $dateStrForTodayOutwards = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
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
            // Code for DATE STR @AUTHOR:PRIYANKA-20JAN2022
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
            //
            // DATE STR FOR TODAY OUTWARD @AUTHOR:PRIYANKA-18DEC2021
            $dateStrForTodayOutwards  = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
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
        // SEARCH BY METAL STR @AUTHOR:PRIYANKA-20JAN2022
        if ($searchValueMetal != 'METAL' && $searchValueMetal != '' && $searchValueMetal != NULL) {
            $searchByColumnMetalStr = " and sttr_metal_type LIKE '$searchValueMetal%' ";
        } else {
            $searchByColumnMetalStr = NULL;
        }        
        //
        //echo '$searchByColumnMetalStr == ' . $searchByColumnMetalStr . '<br />';
        //
        //
        // SEARCH BY CATEGORY STR @AUTHOR:PRIYANKA-20JAN2022
        if ($searchValueCategory != 'CATEGORY' && $searchValueCategory != '' && $searchValueCategory != NULL) {
            $searchByColumnCategoryStr = " and sttr_item_category LIKE '$searchValueCategory%' ";
        } else {
            $searchByColumnCategoryStr = NULL;
        }         
        //
        //echo '$searchByColumnCategoryStr == ' . $searchByColumnCategoryStr . '<br />';
        //
        //
        // SEARCH BY NAME STR @AUTHOR:PRIYANKA-20JAN2022
        if ($searchValueName != 'NAME' && $searchValueName != '' && $searchValueName != NULL) {
            $searchByColumnNameStr = " and sttr_item_name LIKE '$searchValueName%' ";
        } else {
            $searchByColumnNameStr = NULL;
        }         
        //
        //echo '$searchByColumnNameStr == ' . $searchByColumnNameStr . '<br />';
        //
        //
        // SEARCH BY METAL, CATEGORY AND NAME STR @AUTHOR:PRIYANKA-20JAN2022
        $finalSearchByColumnStr = " $searchByColumnMetalStr $searchByColumnCategoryStr $searchByColumnNameStr ";
        //
        //
        //echo '$finalSearchByColumnStr == ' . $finalSearchByColumnStr . '<br />';
        //
        //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // START CODE FOR CREATE TEMP VIEW TABLE @AUTHOR:PRIYANKA-20JAN2022                                  //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // 
        $createView = "CREATE TABLE IF NOT EXISTS temp_view ("                  
                       . "srNo                            INT NOT NULL PRIMARY KEY AUTO_INCREMENT,"
                       . "sttr_id                         VARCHAR(50),"
                       . "sttr_sttr_id                    VARCHAR(50),"
                       . "sttr_firm_id                    VARCHAR(50),"
                       . "sttr_user_id                    VARCHAR(50),"
                       . "sttr_item_pre_id                VARCHAR(50),"
                       . "sttr_item_id                    VARCHAR(50),"
                       . "sttr_item_code                  VARCHAR(50),"
                       . "sttr_add_date                   VARCHAR(50),"
                       . "sttr_metal_type                 VARCHAR(50),"
                       . "sttr_metal_rate                 VARCHAR(50),"
                       . "sttr_item_category              VARCHAR(100),"
                       . "sttr_item_name                  VARCHAR(100),"
                       . "sttr_stock_type                 VARCHAR(50),"
                       . "sttr_quantity                   VARCHAR(50),"
                       . "sttr_gs_weight                  VARCHAR(50),"
                       . "sttr_gs_weight_type             VARCHAR(50),"
                       . "sttr_pkt_weight                 VARCHAR(50),"
                       . "sttr_pkt_weight_type            VARCHAR(50),"
                       . "sttr_nt_weight                  VARCHAR(50),"
                       . "sttr_nt_weight_type             VARCHAR(50),"
                       . "sttr_purity                     VARCHAR(50),"
                       . "sttr_fine_weight                VARCHAR(50),"
                       . "sttr_final_purity               VARCHAR(50),"
                       . "sttr_final_fine_weight          VARCHAR(50),"                
                       . "sttr_transaction_type           VARCHAR(50),"
                       . "sttr_indicator                  VARCHAR(50),"
                       . "sttr_status                     VARCHAR(50),"
                       . "sttr_sell_status                VARCHAR(50),"
                       . "sttr_final_quantity             VARCHAR(50),"
                       . "sttr_final_gs_weight            VARCHAR(50),"
                       . "sttr_final_nt_weight            VARCHAR(50),"
                       . "sttr_final_fn_weight            VARCHAR(50))";
        // 
        $sqlTable = 'DESC temp_view';
        //
        mysqli_query($conn, $sqlTable);
        //
        if (!mysqli_errno($conn) == 1146) {
            $dropView = "DROP table temp_view";
            mysqli_query($conn, $dropView) or die('<br/> ERROR:' . mysqli_error($conn));
            mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
        } else {
            mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
        }
        //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // END CODE FOR CREATE TEMP VIEW TABLE @AUTHOR:PRIYANKA-20JAN2022                                    //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // 
        // 
//        //
//        //
//        $qSelStockItemDetails1 = "SELECT * FROM stock_transaction "
//                               . "WHERE sttr_transaction_type IN ('PURONCASH', 'PURBYSUPP', 'EXISTING', 'TAG', 'sell', 'ESTIMATESELL', 'APPROVAL') "
//                               . "AND sttr_indicator NOT IN ('stockCrystal') "
//                               . "GROUP BY sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, sttr_metal_type, sttr_purity "
//                               . "ORDER BY sttr_item_category, sttr_item_name ASC ";
//        //
//        //echo '$qSelStockItemDetails1 : ' . $qSelStockItemDetails1 . '<br /><br />';
//        //
//        $resStockItemDetails1 = mysqli_query($conn, $qSelStockItemDetails1);
//        //
//        $noOfStockAvailable1 = mysqli_num_rows($resStockItemDetails1);
//        //
//        //
//    while ($rowStockItemDetails1 = mysqli_fetch_array($resStockItemDetails1)) {
//    //
//    //
//    $firm_id = $rowStockItemDetails1['sttr_firm_id'];
//    $metal_type = $rowStockItemDetails1['sttr_metal_type'];
//    $item_category = $rowStockItemDetails1['sttr_item_category'];
//    $item_name = $rowStockItemDetails1['sttr_item_name'];
//    $stock_type = $rowStockItemDetails1['sttr_stock_type'];
//    $purity = $rowStockItemDetails1['sttr_purity'];
//    //
//    //
//    //echo '$firm_id : ' . $firm_id . '<br />';
//    //echo '$metal_type : ' . $metal_type . '<br />';
//    //echo '$item_category : ' . $item_category . '<br />';
//    //echo '$item_name : ' . $item_name . '<br />';
//    //echo '$stock_type : ' . $stock_type . '<br />';
//    //echo '$purity : ' . $purity . '<br />';
//    //
//    //
//    if ($rowStockItemDetails1['sttr_indicator'] == 'AddInvoice') {
//        $sttr_indicator = 'stock';
//    } else {
//        $sttr_indicator = $rowStockItemDetails1['sttr_indicator'];
//    }
//    //
//    //
//    $qSelStockItemDetails = "SELECT sum(sttr_quantity) as sttr_quantity,"
//        . "sum(case when sttr_gs_weight_type='KG' then sttr_gs_weight*1000  when sttr_gs_weight_type='MG' then sttr_gs_weight/1000 when sttr_gs_weight_type='CT' then sttr_gs_weight/5 else sttr_gs_weight end) as sttr_gs_weight, sttr_gs_weight_type,"
//        . "sum(case when sttr_nt_weight_type='KG' then sttr_nt_weight*1000  when sttr_nt_weight_type='MG' then sttr_nt_weight/1000 when sttr_nt_weight_type='CT' then sttr_nt_weight/5 else sttr_nt_weight end) as sttr_nt_weight, sttr_nt_weight_type,"
//        . "sum(case when sttr_pkt_weight_type='KG' then sttr_pkt_weight*1000  when sttr_pkt_weight_type='MG' then sttr_pkt_weight/1000 when sttr_pkt_weight_type='CT' then sttr_pkt_weight/5 else sttr_pkt_weight end) as sttr_pkt_weight, sttr_pkt_weight_type,"
//        . "sum(sttr_fine_weight) as sttr_fine_weight,"
//        . "sum(sttr_final_quantity) as sttr_final_quantity,"
//        . "sum(sttr_final_gs_weight) as sttr_final_gs_weight,"
//        . "sum(sttr_final_nt_weight) as sttr_final_nt_weight,"
//        . "sum(sttr_final_fn_weight) as sttr_final_fn_weight,"
//        . "sum(sttr_final_fine_weight) as sttr_final_fine_weight,"
//        . "sum(sttr_lab_charges) as sttr_lab_charges, sttr_lab_charges_type,"
//        . "sum(sttr_making_charges) as sttr_making_charges, sttr_making_charges_type,"
//        . "sum(sttr_tax) as sttr_tax, sum(sttr_tot_tax) as sttr_tot_tax,"
//        . "sum(sttr_valuation) as sttr_valuation, sum(sttr_final_valuation) as sttr_final_valuation,"
//        . "sttr_owner_id, sttr_firm_id, sttr_metal_type, sttr_metal_rate, sttr_item_category, sttr_item_name, sttr_item_model_no,"
//        . "sttr_stock_type, sttr_indicator, sttr_item_code, sttr_item_pre_id, sttr_item_id, sttr_purity, sttr_wastage, sttr_final_purity,"
//        . "sttr_price, sttr_cust_price, sttr_purchase_rate, sttr_purchase_rate_type, sttr_sell_rate, sttr_sell_rate_type,"
//        . "sttr_cust_itmcalby, sttr_cust_itmcode, sttr_cust_itmnum, sttr_item_sales_pkg "
//        . "FROM stock_transaction "
//        . "WHERE sttr_transaction_type IN ('PURONCASH', 'PURBYSUPP', 'EXISTING', 'TAG') "
//        . "AND sttr_status NOT IN ('Deleted','DELETED') "
//        . "AND sttr_indicator NOT IN ('stockCrystal') "
//        . "AND sttr_owner_id='$_SESSION[sessionOwnerId]' "
//        . "AND sttr_firm_id='$firm_id' "
//        . "AND sttr_metal_type='$metal_type' "
//        . "AND sttr_item_category='$item_category' "
//        . "AND sttr_item_name='$item_name' "
//        . "AND sttr_stock_type='$stock_type' "
//        . "AND sttr_purity='$purity' ";
//    //
//    //echo '$qSelStockItemDetails : ' . $qSelStockItemDetails . '<br /><br />';
//    //
//    $resStockItemDetails = mysqli_query($conn, $qSelStockItemDetails);
//    //
//    $noOfStockAvailable = mysqli_num_rows($resStockItemDetails);
//    //
//    $rowStockItemDetails = mysqli_fetch_array($resStockItemDetails);
//    //
//    //
//    //if ($noOfStockAvailable) {
//    //    echo '$noOfStockAvailable @@:@@ ' . $noOfStockAvailable . '<br /><br />';
//    //}
//    //
//    //
//    $sttr_main_prod_firm_id = $rowStockItemDetails['sttr_firm_id'];
//    $sttr_main_prod_metal_type = $rowStockItemDetails['sttr_metal_type'];
//    $sttr_main_prod_item_category = $rowStockItemDetails['sttr_item_category'];
//    $sttr_main_prod_item_name = $rowStockItemDetails['sttr_item_name'];
//    $sttr_main_prod_stock_type = $rowStockItemDetails['sttr_stock_type'];    
//    $sttr_main_prod_purity = $rowStockItemDetails['sttr_purity'];
//    //
//    //             
//    $sttr_main_metal_rate = $rowStockItemDetails['sttr_metal_rate'];
//    $sttr_main_item_code = $rowStockItemDetails['sttr_item_code'];
//    $sttr_main_indicator = $rowStockItemDetails['sttr_indicator'];
//    //
//    //
//    //echo '$sttr_main_metal_rate 1== ' . $sttr_main_metal_rate . '<br />';
//    //echo '$sttr_main_item_code 1== ' . $sttr_main_item_code . '<br />';
//    //echo '$sttr_main_indicator 1== ' . $sttr_main_indicator . '<br />';
//    //
//    //
//    $sttr_main_prod_quantity = $rowStockItemDetails['sttr_quantity'];
//    //
//    if ($sttr_main_prod_quantity == '' || $sttr_main_prod_quantity == NULL) {
//        $sttr_main_prod_quantity = 0;
//    }
//    //
//    $sttr_main_prod_gs_weight = om_round($rowStockItemDetails['sttr_gs_weight'],3);
//    $sttr_gs_weight_type = 'GM';
//    //
//    $sttr_main_prod_pkt_weight = om_round($rowStockItemDetails['sttr_pkt_weight'],3);
//    $sttr_pkt_weight_type = 'GM';
//    //
//    $sttr_main_prod_nt_weight = om_round($rowStockItemDetails['sttr_nt_weight'],3);
//    $sttr_nt_weight_type = 'GM';
//    //
//    $sttr_main_prod_fine_weight = om_round($rowStockItemDetails['sttr_fine_weight'],3);
//    $sttr_main_prod_final_fine_weight = om_round($rowStockItemDetails['sttr_final_fine_weight'],3);
//    //
//    //
//    // IF TRANSACTION TYPE IS PURBYSUPP @AUTHOR:PRIYANKA-12JAN2022
//    if (($rowStockItemDetails1['sttr_transaction_type'] == 'PURBYSUPP') || 
//        ($rowStockItemDetails1['sttr_transaction_type'] == 'EXISTING' && 
//         $rowStockItemDetails1['sttr_stock_type'] == 'wholesale')) {
//        //
//        //
//        $whereStr = " sttr_owner_id='$_SESSION[sessionOwnerId]' AND "
//                  . "((sttr_transaction_type = 'TAG' AND "
//                  . " sttr_st_id = '$rowStockItemDetails1[sttr_st_id]' AND "
//                  . " sttr_stock_type = 'retail') "
//                  . " OR "
//                  . "(sttr_firm_id='$firm_id' AND "
//                  . " sttr_metal_type='$metal_type' AND "
//                  . " sttr_item_category='$item_category' AND "
//                  . " sttr_item_name='$item_name' AND "
//                  . " sttr_stock_type='$stock_type' AND "
//                  . " sttr_purity='$purity' AND "
//                  . " sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL') AND "
//                  . " sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone') AND "
//                  . "(sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL) AND "
//                  . " sttr_indicator NOT IN ('stockCrystal'))) ";
//        //
//        //
//    } else {
//        //
//        //
//        $whereStr = " sttr_owner_id='$_SESSION[sessionOwnerId]' AND "
//                  . " sttr_firm_id='$firm_id' AND "
//                  . " sttr_metal_type='$metal_type' AND "
//                  . " sttr_item_category='$item_category' AND "
//                  . " sttr_item_name='$item_name' AND "
//                  . " sttr_stock_type='$stock_type' AND "
//                  . " sttr_purity='$purity' AND "
//                  . " sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL') AND "
//                  . " sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone') AND "
//                  . " (sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL) AND "
//                  . " sttr_indicator NOT IN ('stockCrystal') ";
//        //
//        //
//    }
//    //
//    //
//    $qSelSellStockItemDetails = "SELECT sum(sttr_quantity) as sttr_sell_quantity,"
//            . "sum(case when sttr_gs_weight_type='KG' then sttr_gs_weight*1000  when sttr_gs_weight_type='MG' then sttr_gs_weight/1000 when sttr_gs_weight_type='CT' then sttr_gs_weight/5 else sttr_gs_weight end) as sttr_sell_gs_weight, sttr_gs_weight_type,"
//            . "sum(case when sttr_nt_weight_type='KG' then sttr_nt_weight*1000  when sttr_nt_weight_type='MG' then sttr_nt_weight/1000 when sttr_nt_weight_type='CT' then sttr_nt_weight/5 else sttr_nt_weight end) as sttr_sell_nt_weight, sttr_nt_weight_type,"
//            . "sum(case when sttr_pkt_weight_type='KG' then sttr_pkt_weight*1000  when sttr_pkt_weight_type='MG' then sttr_pkt_weight/1000 when sttr_pkt_weight_type='CT' then sttr_pkt_weight/5 else sttr_pkt_weight end) as sttr_sell_pkt_weight, sttr_pkt_weight_type,"
//            . "sum(sttr_fine_weight) as sttr_sell_fine_weight,"
//            . "sum(sttr_final_fine_weight) as sttr_sell_final_fine_weight,"
//            . "sum(sttr_lab_charges) as sttr_sell_lab_charges, "
//            . "sttr_lab_charges_type as sttr_sell_lab_charges_type,"
//            . "sum(sttr_making_charges) as sttr_sell_making_charges, "
//            . "sttr_making_charges_type as sttr_sell_making_charges_type,"
//            . "sum(sttr_tax) as sttr_sell_tax, sum(sttr_tot_tax) as sttr_sell_tot_tax,"
//            . "sum(sttr_valuation) as sttr_sell_valuation, sum(sttr_final_valuation) as sttr_sell_final_valuation,"
//            . "sttr_owner_id, sttr_firm_id, sttr_metal_type, sttr_metal_rate, sttr_item_category, sttr_item_name, sttr_item_model_no,"
//            . "sttr_stock_type, sttr_indicator, sttr_item_code, sttr_item_pre_id, sttr_item_id, sttr_purity, sttr_wastage, sttr_final_purity,"
//            . "sttr_price, sttr_cust_price, sttr_purchase_rate, sttr_purchase_rate_type, sttr_sell_rate, sttr_sell_rate_type,"
//            . "sttr_cust_itmcalby, sttr_cust_itmcode, sttr_cust_itmnum, sttr_item_sales_pkg "
//            . "FROM stock_transaction "
//            . "WHERE $whereStr ";
//    //
//    //
//    //echo '$qSelSellStockItemDetails : ' . $qSelSellStockItemDetails . '<br /><br />';
//    //
//    //
//    $resSellStockItemDetails = mysqli_query($conn, $qSelSellStockItemDetails);
//    //
//    $noOfSellStockAvailable = mysqli_num_rows($resSellStockItemDetails);
//    //
//    //
//    //echo '$noOfSellStockAvailable : ' . $noOfSellStockAvailable . '<br /><br />';
//    //
//    //
//    //if ($noOfSellStockAvailable > 0) {
//        //
//        $rowSellStockItemDetails = mysqli_fetch_array($resSellStockItemDetails);
//        //
//        //
//        $sttr_sell_firm_id = $rowSellStockItemDetails['sttr_firm_id'];
//        $sttr_sell_metal_type = $rowSellStockItemDetails['sttr_metal_type'];
//        $sttr_sell_item_category = $rowSellStockItemDetails['sttr_item_category'];
//        $sttr_sell_item_name = $rowSellStockItemDetails['sttr_item_name'];
//        $sttr_sell_stock_type = $rowSellStockItemDetails['sttr_stock_type'];        
//        $sttr_sell_purity = $rowSellStockItemDetails['sttr_purity'];
//        //
//        //
//        $sttr_sell_indicator = $rowSellStockItemDetails['sttr_indicator'];
//        $sttr_sell_metal_rate = $rowSellStockItemDetails['sttr_metal_rate'];
//        $sttr_sell_item_code = $rowSellStockItemDetails['sttr_item_code'];               
//        //
//        //echo '$sttr_sell_item_code : ' . $sttr_sell_item_code . '<br />';
//        //
//        $sttr_sell_quantity = $rowSellStockItemDetails['sttr_sell_quantity'];
//        //
//        if ($sttr_sell_quantity == '' || $sttr_sell_quantity == NULL) {
//            $sttr_sell_quantity = 0;
//        }
//        //
//        $sttr_sell_gs_weight = om_round($rowSellStockItemDetails['sttr_sell_gs_weight'],3);
//        $sttr_sell_pkt_weight = om_round($rowSellStockItemDetails['sttr_sell_pkt_weight'],3);
//        $sttr_sell_nt_weight = om_round($rowSellStockItemDetails['sttr_sell_nt_weight'],3);
//        //
//        $sttr_sell_fine_weight = om_round($rowSellStockItemDetails['sttr_sell_fine_weight'],3);
//        $sttr_sell_final_fine_weight = om_round($rowSellStockItemDetails['sttr_sell_final_fine_weight'],3);
//        //
//        $sttr_sell_lab_charges = om_round($rowSellStockItemDetails['sttr_sell_lab_charges'],2);
//        $sttr_sell_making_charges = om_round($rowSellStockItemDetails['sttr_sell_making_charges'],2);
//        //
//        $sttr_sell_tax = om_round($rowSellStockItemDetails['sttr_sell_tax'],2);
//        $sttr_sell_tot_tax = om_round($rowSellStockItemDetails['sttr_sell_tot_tax'],2);
//        //
//        $sttr_sell_valuation = om_round($rowSellStockItemDetails['sttr_sell_valuation'],2);
//        $sttr_sell_final_valuation = om_round($rowSellStockItemDetails['sttr_sell_final_valuation'],2);
//        //
//        //
//        $sttr_calc_quantity = om_round($sttr_main_prod_quantity - $sttr_sell_quantity, 3);
//        //
//        $sttr_calc_gs_weight = om_round($sttr_main_prod_gs_weight - $sttr_sell_gs_weight, 3);
//        $sttr_gs_weight_type = 'GM';
//        //
//        $sttr_calc_pkt_weight = om_round($sttr_main_prod_pkt_weight - $sttr_sell_pkt_weight, 3);
//        $sttr_pkt_weight_type = 'GM';
//        //
//        $sttr_calc_nt_weight = om_round($sttr_main_prod_nt_weight - $sttr_sell_nt_weight, 3);
//        $sttr_nt_weight_type = 'GM';
//        //
//        $sttr_calc_fine_weight = om_round($sttr_main_prod_fine_weight - $sttr_sell_fine_weight, 3);
//        $sttr_calc_final_fine_weight = om_round($sttr_main_prod_final_fine_weight - $sttr_sell_final_fine_weight, 3);
//        //
//        //
//        if ($sttr_calc_quantity < 0 || $sttr_calc_gs_weight < 0) {
//        //
//        // 
//        $query = "INSERT INTO temp_view (sttr_id, sttr_sttr_id, sttr_firm_id, sttr_user_id, sttr_item_pre_id, sttr_item_id, 
//                  sttr_item_code, sttr_add_date, sttr_metal_type, sttr_metal_rate, sttr_item_category, sttr_item_name, 
//                  sttr_stock_type, sttr_quantity, sttr_gs_weight, sttr_gs_weight_type, sttr_pkt_weight, sttr_pkt_weight_type, 
//                  sttr_nt_weight, sttr_nt_weight_type, sttr_purity, sttr_fine_weight, sttr_final_purity, sttr_final_fine_weight, 
//                  sttr_transaction_type, sttr_indicator, sttr_status, sttr_sell_status, 
//                  sttr_final_quantity, sttr_final_gs_weight, sttr_final_nt_weight, sttr_final_fn_weight)    
//                  SELECT sttr_id, sttr_sttr_id, sttr_firm_id, sttr_user_id, sttr_item_pre_id, sttr_item_id, 
//                  sttr_item_code, sttr_add_date,  sttr_metal_type, sttr_metal_rate, sttr_item_category, sttr_item_name, 
//                  sttr_stock_type, sttr_quantity, sttr_gs_weight, sttr_gs_weight_type, sttr_pkt_weight, sttr_pkt_weight_type, 
//                  sttr_nt_weight, sttr_nt_weight_type, sttr_purity, sttr_fine_weight, sttr_final_purity, sttr_final_fine_weight, 
//                  sttr_transaction_type, sttr_indicator, sttr_status, sttr_sell_status, 
//                  sttr_final_quantity, sttr_final_gs_weight, sttr_final_nt_weight, sttr_final_fn_weight 
//                  FROM stock_transaction WHERE sttr_id = '$sttrId'";
//        //
//        //
//        //echo '$query == ' . $query . '<br /><br />';
//        //
//        //
//        if (!mysqli_query($conn, $query)) {
//            die("FileName:omStockLedgerStockMismatch.php<br/>Error:" . mysqli_error($conn));
//        }
//        //
//        //
//        }
//        //
//        //
//        }
        //
        //
        //
        //. "AND sttr_item_code = 'CHAIN266' "
        //       
        //
        // Start Code To Fetch All Records - Group By sttr_item_category @AUTHOR:PRIYANKA-21JAN2022
        $stockMainQuery = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                        . "AND sttr_firm_id IN ($strFrmId) "
                        . "AND sttr_indicator IN ('AddInvoice', 'stock', 'imitation', 'RetailStock', 'crystal' , 'strsilver') "
                        . "AND sttr_status NOT IN ('DELETED','NotDelFromStock') "                              
                        . "AND sttr_transaction_type IN ('PURONCASH', 'PURBYSUPP', 'EXISTING', 'TAG') "
                        . "AND (sttr_final_quantity < 0 || sttr_final_gs_weight < 0) "
                        . "ORDER BY sttr_metal_type, sttr_item_category, sttr_item_name  ASC ";
        //
        //echo '$stockMainQuery == ' . $stockMainQuery . '<br />';
        //
        $resStockMainQuery = mysqli_query($conn, $stockMainQuery);
        // 
        // Number of Records @AUTHOR:PRIYANKA-21JAN2022
        $noOfRecordsAvailableStockMainQuery = mysqli_num_rows($resStockMainQuery);
        //
        //
        //echo '$noOfRecordsAvailableStockMainQuery == ' . $noOfRecordsAvailableStockMainQuery . '<br />';
        //
        //
        if ($noOfRecordsAvailableStockMainQuery > 0) {
            //
            //
            while ($rowStockMainQuery = mysqli_fetch_array($resStockMainQuery)) {
                //
                //                
                $stockSellQuery = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                . "AND sttr_sttr_id = '$rowStockMainQuery[sttr_id]' "
                                . "AND sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL') "
                                . "AND sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone') "
                                . "AND (sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL) "
                                . "AND sttr_indicator NOT IN ('stockCrystal') ";
                //
                //echo '$stockSellQuery == ' . $stockSellQuery . '<br />';
                //
                $resStockSellQuery = mysqli_query($conn, $stockSellQuery);
                // 
                // Number of Records @AUTHOR:PRIYANKA-21JAN2022
                $noOfRecordsAvailableStockSellQuery = mysqli_num_rows($resStockSellQuery);
                //
                //
                //echo '$noOfRecordsAvailableStockSellQuery == ' . $noOfRecordsAvailableStockSellQuery . '<br />';
                //
                //
                if ($noOfRecordsAvailableStockSellQuery == 0) {
                    //
                    //
                    $updateStocQuery = "UPDATE stock_transaction SET  "
                                     . "sttr_final_quantity = 0, sttr_final_gs_weight = 0, "
                                     . "sttr_final_nt_weight = 0, sttr_final_fn_weight = 0 "
                                     . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                     . "AND sttr_id = '$rowStockMainQuery[sttr_id]' ";
                    //
                    //echo '$updateStocQuery == ' . $updateStocQuery . '<br />';
                    //
                    if (!mysqli_query($conn, $updateStocQuery)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                }
            }
        }
        //
        //
        //
        //
        // Start Code To Fetch All Records - Group By sttr_item_category @AUTHOR:PRIYANKA-20JAN2022
        $stockReportMainQuery = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                              . "and sttr_firm_id IN ($strFrmId) "
                              . "and sttr_indicator IN ('AddInvoice', 'stock', 'imitation', 'RetailStock', 'crystal' , 'strsilver') "
                              . "and sttr_status NOT IN ('DELETED','NotDelFromStock') "                              
                              . "and sttr_transaction_type IN ('PURONCASH', 'PURBYSUPP', 'EXISTING', 'TAG') "
                              . "and (sttr_final_quantity < 0 || sttr_final_gs_weight < 0) "
                              . "ORDER BY sttr_metal_type, sttr_item_category, sttr_item_name  ASC ";
        //
        //echo '$stockReportMainQuery == ' . $stockReportMainQuery . '<br />';
        //
        $resStockReportMainQuery = mysqli_query($conn, $stockReportMainQuery);
        // 
        // Number of Records @AUTHOR:PRIYANKA-20JAN2022
        $noOfRecordsAvailable = mysqli_num_rows($resStockReportMainQuery);
        // 
        // 
        //
        //
        ?>        
        <?php if ($noOfRecordsAvailable == 0) { ?>
        <tr>
            <td valign="middle" align="center" colspan="13">
               <div class="textLabelHeading" style="font-size: 16px;">~ NO RECORDS FOUND ~</div>
            </td>
        </tr>
        <?php } ?>        
        <tr>
        <td valign="middle" align="right" width="20%" colspan="8">
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
                    //
                    if ($noOfRecordsAvailable == 0) {
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right: -157px; color:#000080; background-color: #89B2ED;';
                    //    
                    } else {
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:-79px; color:#000080; background-color: #89B2ED;';
                    //
                    }
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
            
            <td valign="middle" align="right" width="20%">
                <div id="stockLedgersStockFirmChangeButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK MISMATCH => STOCK WRONG FIRM BUTTON @PRIYANKA-28FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersStockFirmChangeButt';
                    $inputNameButton = 'stockLedgersStockFirmChangeButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    //
                    if ($noOfRecordsAvailable == 0) {
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:-43px; color:#225b5b; background-color: #13F9D8C2;';
                    //    
                    } else {
                    //    
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:4px; color:#225b5b; background-color: #13F9D8C2;';
                    //
                    }
                    //
                    //
                    $inputLabel = 'STOCK WRONG FIRM'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'STOCK WRONG FIRM';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "StockFirmChangePanel", "StockFirmChangePanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER STOCK MISMATCH => STOCK WRONG FIRM BUTTON @PRIYANKA-28FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="right" width="20%">
                <div id="stockLedgersStockPurityButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK PURITY CORRECTION BUTTON @PRIYANKA-07FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersStockPurityButt';
                    $inputNameButton = 'stockLedgersStockPurityButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    //
                    if ($noOfRecordsAvailable == 0) {
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:71px; color:#000080; background-color: #7FFF00;';    
                    //    
                    } else {
                    //    
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:116px; color:#000080; background-color: #7FFF00;';
                    //
                    }
                    //
                    $inputLabel = 'STOCK WRONG PURITY'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'STOCK WRONG PURITY';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "StockPurityCorrectionPanel", "StockPurityCorrectionPanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER STOCK PURITY CORRECTION BUTTON @PRIYANKA-07FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="left" width="20%">
                <div id="stockLedgersDeletedStockListButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER DELETED STOCK LIST BUTTON @PRIYANKA-07FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersDeletedStockListButt';
                    $inputNameButton = 'stockLedgersDeletedStockListButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    //
                    if ($noOfRecordsAvailable == 0) {
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:0px; margin-left: -67px; '
                                . 'color:white; background-color:#F42B2B;';
                    //
                    } else {
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:0px; margin-left: -110px; '
                                . 'color:white; background-color:#F42B2B;';
                    //    
                    }
                    //
                    $inputLabel = 'DELETED STOCK LIST'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'DELETED STOCK LIST';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "DeletedStockListPanel", "DeletedStockListPanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER DELETED STOCK LIST BUTTON @PRIYANKA-07FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="left" width="20%">
                <div id="stockLedgersStockRecreationButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK RECREATION BUTTON @PRIYANKA-11FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersStockRecreationButt';
                    $inputNameButton = 'stockLedgersStockRecreationButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    //
                    if ($noOfRecordsAvailable == 0) {
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:0px; margin-left: -181px; '
                                . 'color:white; background-color:#007bff;';
                    //
                    } else {
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:0px; margin-left: -166px; '
                                . 'color:white; background-color:#007bff;';
                    //    
                    }
                    //
                    //
                    $inputLabel = 'STOCK RECREATION'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'STOCK RECREATION';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "StockRecreationPanel", "StockRecreationPanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER STOCK RECREATION BUTTON @PRIYANKA-11FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
        </tr>
        
        <tr></tr>    
        
        <tr>
            <td valign="middle" align="left" width="20%" colspan="13">
                <a class="links" style="cursor: pointer;" onclick="">
                    <!-- Code To Display Stock Mismatch @AUTHOR:PRIYANKA-07FEB2022-->
                    <div class="textLabelHeading" style="margin-bottom: 5px !important;">STOCK MISMATCH PANEL</div>
                </a>
            </td>
        </tr>        
        <?php
        //
        // COUNTER @AUTHOR:PRIYANKA-20JAN2022
        $counter = 1;
        $srNo = 1;
        //
        if ($searchValueMetal == 'StockMismatchPanel') {
            $searchValueMetal = 'METAL';
        }
        //
        //
        while ($rowStockReportMainQuery = mysqli_fetch_array($resStockReportMainQuery)) {
        //
        //
        // CATEGORY @AUTHOR:PRIYANKA-20JAN2022
        $Category = $rowStockReportMainQuery['sttr_item_category'];
        //
        // NAME @AUTHOR:PRIYANKA-20JAN2022
        $Name = $rowStockReportMainQuery['sttr_item_name'];
        //
        // STOCK TYPE @AUTHOR:PRIYANKA-20JAN2022
        $StockType = $rowStockReportMainQuery['sttr_stock_type'];
        //
        // INDICATOR @AUTHOR:PRIYANKA-20JAN2022
        $Indicator = $rowStockReportMainQuery['sttr_indicator'];
        //
        // METAL TYPE @AUTHOR:PRIYANKA-20JAN2022
        $MetalType = $rowStockReportMainQuery['sttr_metal_type'];
        //
        //
        $prodCode = $rowStockReportMainQuery['sttr_item_code'];
        //
        $prodQty = $rowStockReportMainQuery['sttr_quantity'];
        //
        $prodGsWt = $rowStockReportMainQuery['sttr_gs_weight'];
        $prodGsWtType = $rowStockReportMainQuery['sttr_gs_weight_type'];
        //
        $prodPktWt = $rowStockReportMainQuery['sttr_pkt_weight'];
        $prodPktWtType = $rowStockReportMainQuery['sttr_pkt_weight_type'];
        //
        $prodNtWt = $rowStockReportMainQuery['sttr_nt_weight'];
        $prodNtWtType = $rowStockReportMainQuery['sttr_nt_weight_type'];
        //
        $prodFineWt = $rowStockReportMainQuery['sttr_fine_weight'];
        //
        $prodPurity = $rowStockReportMainQuery['sttr_purity'];
        //
        $prodFfineWt = $rowStockReportMainQuery['sttr_final_fine_weight'];
        //
        //
        if ($counter == 1) { ?>
        <tr class="bc_grey">
            <td align="right" style="background-color: rgba(251, 184, 99, 0.84); " width="1%">
                <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 3px;"></div>
            </td>
            
            <td align="left" style="background-color: rgba(251, 184, 99, 0.84); " width="1%">
                <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 5px;">SNO.</div>
            </td>
            
            <td align="left" style="background-color: rgba(251, 184, 99, 0.84); " width="1%">
                <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 5px;">
                    <input id="metalType" type="text" name="metalType" 
                           placeholder="METAL" style="font-size: 15px;"
                           value = "<?php if ($searchColumnMetal == 'sttr_metal_type')
                                            echo $searchValueMetal;
                                          else
                                            echo 'METAL';
                                    ?>"
                            onclick = "javascript:this.value = '';"
                            onblur = ""
                            onkeyup = ""
                            size = "4" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial"/>
                </div>
            </td>
                                  
            <td align="left" style="background-color: rgba(251, 184, 99, 0.84);  " width="1%">
                <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 3px;">TYPE</div>
            </td>
            
            <td align="left" style="background-color: rgba(251, 184, 99, 0.84);  " width="4%">
                <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 3px;">PID</div>
            </td>
            
            <!-- Start Code for CATEGORY @AUTHOR:PRIYANKA-20JAN2022-->
            <td align="left" style="background-color: rgba(251, 184, 99, 0.84);  " width="10%">
                <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 5px;">
                    <input id="itemCategory" type="text" name="itemCategory" 
                           placeholder="CATEGORY" style="font-size: 15px;"
                           value = "<?php if ($searchColumnCategory == 'sttr_item_category')
                                            echo $searchValueCategory;
                                          else
                                            echo 'CATEGORY';
                                    ?>"
                            onclick = "javascript:this.value = '';"
                            onblur = ""
                            onkeyup = ""
                            size = "8" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial"/>
                </div>
            </td>
            <!-- End Code for CATEGORY @AUTHOR:PRIYANKA-20JAN2022-->
            
            <td align="left" style="background-color: rgba(251, 184, 99, 0.84);  " width="10%">
                <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 5px;">
                    <input id="itemName" type="text" name="itemName" 
                           placeholder="NAME" style="font-size: 15px;"
                           value = "<?php if ($searchColumnName == 'sttr_item_name')
                                            echo $searchValueName;
                                          else
                                            echo 'NAME';
                                    ?>"
                            onclick = "javascript:this.value = '';"
                            onblur = ""
                            onkeyup = ""
                            size = "4" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial"/>
                </div>
            </td>
            
            <td align="right" style="background-color: rgba(251, 184, 99, 0.84);  " width="3%">
                <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 3px;">QTY</div>
            </td>            
                        
            <td align="right" style="background-color: rgba(251, 184, 99, 0.84);  " width="3%">
                <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 3px;">GS WT</div>
            </td>
            
            <td align="right" style="background-color: rgba(251, 184, 99, 0.84);  " width="3%">
                <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 3px;">NT WT</div>
            </td>
            
            <td align="right" style="background-color: rgba(251, 184, 99, 0.84);  " width="3%">
                <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 3px;">PURITY</div>
            </td>
            
            <td align="right" style="background-color: rgba(251, 184, 99, 0.84);  " width="3%">
                <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 3px;">FN WT</div>
            </td>
            
            <td align="right" style="background-color: rgba(251, 184, 99, 0.84);  " width="3%">
                <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 3px;">FFN WT</div>
            </td>
            
            <td align="right" style="background-color: rgba(251, 184, 99, 0.84);  " width="1%">
                <div class="brown brownMess13Arial" style="font-size: 15px; margin-left: 3px;"></div>
            </td>
        </tr>
        <?php } $counter = 2; 
        //
        //
        //echo '$todayFromStrDate == ' . $todayFromStrDate . '<br />';
        //echo '$todayToStrDate == ' . $todayToStrDate . '<br />';
        //echo '$startDate == ' . $startDate . '<br />';
        //echo '$endDate == ' . $endDate . '<br />';
        //
        //
        ?>
            <tr>
                <div id = "myModal<?php echo $rowStockReportMainQuery['sttr_id']; ?>" class = "modal"></div>
                <td align="left" style="background-color: rgb(255, 241, 203);  ">
                    <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                    </div>
                </td>
                
                <td align="left" style="background-color: rgb(255, 241, 203);  ">
                    <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                        <!--<a style="cursor: pointer;">
                        <?php echo strtoupper($srNo); ?>
                        </a>-->
                        <?php echo strtoupper($srNo); ?>
                    </div>
                </td>

                <td align="left" style="background-color: rgb(255, 241, 203);  ">
                    <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                        <!--<a style="cursor: pointer;">
                        <?php echo strtoupper($MetalType); ?>
                        </a>-->
                        <?php echo strtoupper($MetalType); ?>
                    </div>
                </td>
                
                <td align="center" style="background-color: rgb(255, 241, 203); ">
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
                
                <td align="left" style="background-color: rgb(255, 241, 203);  ">
                    <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                        <a style="cursor: pointer;" 
                           onclick="getStockSummaryTransactionsReportPopUp('<?php echo $rowStockReportMainQuery[sttr_id]; ?>', '<?php echo $todayFromStrDate; ?>', '<?php echo $todayToStrDate; ?>', '<?php echo strtoupper($startDate); ?>', '<?php echo strtoupper($endDate); ?>', '<?php echo $strFrmId; ?>', '<?php echo $Category; ?>', '<?php echo $Name; ?>', '<?php echo $StockType; ?>', '<?php echo $Purity; ?>', 'ShowMismatchProductDetails', '<?php echo $documentRoot; ?>');">                                   
                        <?php echo strtoupper($prodCode); ?>
                        </a>
                        <?php //echo strtoupper($prodCode); ?>
                    </div>
                </td>

                <!-- Start Code for CATEGORY @AUTHOR:PRIYANKA-20JAN2022-->
                <td align="left" style="background-color: rgb(255, 241, 203);  ">
                    <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                        <!--<a style="cursor: pointer;">
                        <?php echo strtoupper($Category); ?>
                        </a>-->
                        <?php echo strtoupper($Category); ?>
                    </div>
                </td>
                <!-- End Code for CATEGORY @AUTHOR:PRIYANKA-20JAN2022-->

                <td align="left" style="background-color: rgb(255, 241, 203); ">
                    <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                        <!--<a style="cursor: pointer;">
                        <?php echo strtoupper($Name); ?>
                        </a>-->
                        <?php echo strtoupper($Name); ?>
                    </div>
                </td>
                              
                <td align="right" style="background-color: rgb(255, 241, 203); ">
                    <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                        <!--<a style="cursor: pointer;">
                        <?php echo strtoupper($prodQty); ?>
                        </a>-->
                        <?php echo strtoupper($prodQty); ?>
                    </div>
                </td>
                
                <td align="right" style="background-color: rgb(255, 241, 203); ">
                    <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                        <!--<a style="cursor: pointer;">
                        <?php echo strtoupper($prodGsWt); ?>
                        </a>-->
                        <?php echo strtoupper($prodGsWt); ?>
                    </div>
                </td>
                
                <td align="right" style="background-color: rgb(255, 241, 203); ">
                    <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                        <!--<a style="cursor: pointer;">
                        <?php echo strtoupper($prodNtWt); ?>
                        </a>-->
                        <?php echo strtoupper($prodNtWt); ?>
                    </div>
                </td>
                
                <td align="right" style="background-color: rgb(255, 241, 203); ">
                    <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                        <!--<a style="cursor: pointer;">
                        <?php echo strtoupper($prodPurity); ?>
                        </a>-->
                        <?php echo strtoupper($prodPurity); ?>
                    </div>
                </td>
                
                <td align="right" style="background-color: rgb(255, 241, 203); ">
                    <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                        <!--<a style="cursor: pointer;">
                        <?php echo strtoupper($prodFineWt); ?>
                        </a>-->
                        <?php echo strtoupper($prodFineWt); ?>
                    </div>
                </td>
                
                <td align="right" style="background-color: rgb(255, 241, 203); ">
                    <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                        <!--<a style="cursor: pointer;">
                        <?php echo strtoupper($prodFfineWt); ?>
                        </a>-->
                        <?php echo strtoupper($prodFfineWt); ?>
                    </div>
                </td>
                
                <td align="left" style="background-color: rgb(255, 241, 203);  ">
                    <div style="font-size: 13px;font-weight: bold;margin-left: 2px;">
                    </div>
                </td>
            </tr>
        <?php
        // 
        //
        $srNo++;
        //
        } 
        ?>
    </table>

<?php } else if ($_REQUEST['subPanelName'] == 'StockPurityCorrectionPanel') { ?>

<table id="stockSummaryMainTableId" align="left" border="0" cellspacing="1" cellpadding="2" width="100%" 
       style="margin-top: 5px;">
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
            // Code for DATE STR @AUTHOR:PRIYANKA-20JAN2022
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
            //
            $dateStrForTodayOutwards = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
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
            // Code for DATE STR @AUTHOR:PRIYANKA-20JAN2022
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
            //
            // DATE STR FOR TODAY OUTWARD @AUTHOR:PRIYANKA-18DEC2021
            $dateStrForTodayOutwards  = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
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
        ?>
    <tr>
        <td valign="middle" align="right" width="30%">
                <div id="stockLedgersStockMismatchButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK MISMATCH BUTTON @PRIYANKA-20JAN2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
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
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:0px; color:#000080; background-color: #89B2ED;';
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
            
            <td valign="middle" align="left" width="20%">
                <div id="stockLedgersStockPurityButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK MISMATCH => STOCK PURITY CORRECTION BUTTON @PRIYANKA-07FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersStockPurityButt';
                    $inputNameButton = 'stockLedgersStockPurityButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:0px; color:#000080; background-color: #7FFF00;';
                    //
                    $inputLabel = 'STOCK WRONG PURITY'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'STOCK WRONG PURITY';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "StockPurityCorrectionPanel", "StockPurityCorrectionPanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER STOCK MISMATCH => STOCK PURITY CORRECTION BUTTON @PRIYANKA-07FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="left" width="20%">
                <div id="stockLedgersDeletedStockListButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK MISMATCH => DELETED STOCK LIST BUTTON @PRIYANKA-07FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersDeletedStockListButt';
                    $inputNameButton = 'stockLedgersDeletedStockListButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:0px; margin-left: -231px; '
                                . 'color:white; background-color:#F42B2B;';
                    //
                    $inputLabel = 'DELETED STOCK LIST'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'DELETED STOCK LIST';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "DeletedStockListPanel", "DeletedStockListPanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER STOCK MISMATCH => DELETED STOCK LIST BUTTON @PRIYANKA-07FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td valign="middle" align="left" width="20%" colspan="10">
                <a class="links" style="cursor: pointer;" onclick="">
                    <!-- Code To Display Stock Purity @AUTHOR:PRIYANKA-07FEB2022-->
                    <div class="textLabelHeading" style="margin-bottom: 5px !important;">STOCK WRONG PURITY PANEL</div>
                </a>
            </td>
        </tr> 
</table>
<?php 
//
//
//**************************************************************************************
// START CODE FOR STOCK MISMATCH => STOCK PURITY LIST @PRIYANKA-08FEB2022
//**************************************************************************************
include $_SESSION['documentRootIncludePhp'] . 'omStockMismatchStockPurityList.php';
//**************************************************************************************
// END CODE FOR STOCK MISMATCH => STOCK PURITY LIST @PRIYANKA-08FEB2022
//**************************************************************************************
//
//
?>
<?php } else if ($_REQUEST['subPanelName'] == 'DeletedStockListPanel') { ?>
<table id="stockSummaryMainTableId" align="left" border="0" cellspacing="1" cellpadding="2" width="100%" 
       style="margin-top: 5px;">
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
            // Code for DATE STR @AUTHOR:PRIYANKA-20JAN2022
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
            //
            $dateStrForTodayOutwards = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
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
            // Code for DATE STR @AUTHOR:PRIYANKA-20JAN2022
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
            //
            // DATE STR FOR TODAY OUTWARD @AUTHOR:PRIYANKA-18DEC2021
            $dateStrForTodayOutwards  = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
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
        ?>
    <tr>
        <td valign="middle" align="right" width="30%">
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
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:0px; color:#000080; background-color: #89B2ED;';
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
            
            <td valign="middle" align="left" width="20%">
                <div id="stockLedgersStockPurityButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK MISMATCH => STOCK PURITY CORRECTION BUTTON @PRIYANKA-07FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersStockPurityButt';
                    $inputNameButton = 'stockLedgersStockPurityButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:0px; color:#000080; background-color: #7FFF00;';
                    //
                    $inputLabel = 'STOCK WRONG PURITY'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'STOCK WRONG PURITY';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "StockPurityCorrectionPanel", "StockPurityCorrectionPanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER STOCK MISMATCH => STOCK PURITY CORRECTION BUTTON @PRIYANKA-07FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="left" width="20%">
                <div id="stockLedgersDeletedStockListButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK MISMATCH => DELETED STOCK LIST BUTTON @PRIYANKA-07FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersDeletedStockListButt';
                    $inputNameButton = 'stockLedgersDeletedStockListButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:0px; margin-left: -231px; '
                                . 'color:white; background-color:#F42B2B;';
                    //
                    $inputLabel = 'DELETED STOCK LIST'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'DELETED STOCK LIST';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "DeletedStockListPanel", "DeletedStockListPanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER STOCK MISMATCH => DELETED STOCK LIST BUTTON @PRIYANKA-07FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
        </tr>
</table>
<?php 
//
//
//**************************************************************************************
// START CODE FOR STOCK LEDGER STOCK MISMATCH => DELETED STOCK LIST @PRIYANKA-08FEB2022
//**************************************************************************************
include $_SESSION['documentRootIncludePhp'] . 'omStockMismatchDeletedStockList.php';
//**************************************************************************************
// END CODE FOR STOCK LEDGER STOCK MISMATCH => DELETED STOCK LIST @PRIYANKA-08FEB2022
//**************************************************************************************
//
//
?>
<?php } else if ($_REQUEST['subPanelName'] == 'StockRecreationPanel') { ?>
<table id="stockSummaryMainTableId" align="left" border="0" cellspacing="1" cellpadding="2" width="100%" 
       style="margin-top: 5px;">
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
            // Code for DATE STR @PRIYANKA-11FEB2022
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
            //
            $dateStrForTodayOutwards = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
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
            // Code for DATE STR @PRIYANKA-11FEB2022
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
            //
            // DATE STR FOR TODAY OUTWARD @PRIYANKA-11FEB2022
            $dateStrForTodayOutwards  = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
            //
        }
        //
        // 
        // DATE STR FOR OPENING OUTWARD @PRIYANKA-11FEB2022
        $dateStrForOutwards = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate ";
        //
        //
        //echo '$dateRangeStrForOpening == ' . $dateRangeStrForOpening . '<br />';
        //echo '$dateStrForOpening == ' . $dateStrForOpening . '<br />';
        //echo '$dateStr == ' . $dateStr . '<br />';
        //echo '$dateStrForOutwards == ' . $dateStrForOutwards . '<br />';
        //
        //
        ?>
    <tr>
        <td valign="middle" align="right" width="30%">
                <div id="stockLedgersStockMismatchButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK MISMATCH BUTTON @PRIYANKA-11FEB2022
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
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:-105px; color:#000080; background-color: #89B2ED;';
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
                    //* END CODE FOR STOCK LEDGER STOCK MISMATCH BUTTON @PRIYANKA-11FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="right" width="20%">
                <div id="stockLedgersStockFirmChangeButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK MISMATCH => STOCK WRONG FIRM BUTTON @PRIYANKA-28FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersStockFirmChangeButt';
                    $inputNameButton = 'stockLedgersStockFirmChangeButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:5px; color:#225b5b; background-color: #13F9D8C2;';
                    //
                    $inputLabel = 'STOCK WRONG FIRM'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'STOCK WRONG FIRM';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "StockFirmChangePanel", "StockFirmChangePanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER STOCK MISMATCH => STOCK WRONG FIRM BUTTON @PRIYANKA-28FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="right" width="20%">
                <div id="stockLedgersStockPurityButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK MISMATCH => STOCK PURITY CORRECTION BUTTON @PRIYANKA-11FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersStockPurityButt';
                    $inputNameButton = 'stockLedgersStockPurityButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:114px; color:#000080; background-color: #7FFF00;';
                    //
                    $inputLabel = 'STOCK WRONG PURITY'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'STOCK WRONG PURITY';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "StockPurityCorrectionPanel", "StockPurityCorrectionPanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER STOCK MISMATCH => STOCK PURITY CORRECTION BUTTON @PRIYANKA-11FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="left" width="20%">
                <div id="stockLedgersDeletedStockListButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK MISMATCH => DELETED STOCK LIST BUTTON @PRIYANKA-11FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersDeletedStockListButt';
                    $inputNameButton = 'stockLedgersDeletedStockListButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:0px; margin-left: -109px; '
                                . 'color:white; background-color:#F42B2B;';
                    //
                    $inputLabel = 'DELETED STOCK LIST'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'DELETED STOCK LIST';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "DeletedStockListPanel", "DeletedStockListPanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER STOCK MISMATCH => DELETED STOCK LIST BUTTON @PRIYANKA-11FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            <td valign="middle" align="left" width="20%">
                <div id="stockLedgersStockRecreationButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK RECREATION BUTTON @PRIYANKA-11FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersStockRecreationButt';
                    $inputNameButton = 'stockLedgersStockRecreationButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:0px; margin-left: -219px; '
                                . 'color:white; background-color:#007bff;';
                    //
                    $inputLabel = 'STOCK RECREATION'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'STOCK RECREATION';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "StockRecreationPanel", "StockRecreationPanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER STOCK RECREATION BUTTON @PRIYANKA-11FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
        </tr>
</table>
<?php 
//
//
//**************************************************************************************
// START CODE FOR STOCK LEDGER STOCK RECREATION @PRIYANKA-11FEB2022
//**************************************************************************************
//
include $_SESSION['documentRootIncludePhp'] . 'omStockMismatchStockRecreation.php';
//
//**************************************************************************************
// END CODE FOR STOCK LEDGER STOCK RECREATION @PRIYANKA-11FEB2022
//**************************************************************************************
//
//
?>
<?php } else if ($_REQUEST['subPanelName'] == 'StockFirmChangePanel') { ?>
<table id="stockSummaryMainTableId" align="left" border="0" cellspacing="1" cellpadding="2" width="100%" 
       style="margin-top: 5px;">
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
            // Code for DATE STR @PRIYANKA-28FEB2022
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
            //
            $dateStrForTodayOutwards = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
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
            // Code for DATE STR @PRIYANKA-28FEB2022
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
            //
            // DATE STR FOR TODAY OUTWARD @PRIYANKA-28FEB2022
            $dateStrForTodayOutwards  = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
            //
        }
        //
        // 
        // DATE STR FOR OPENING OUTWARD @PRIYANKA-28FEB2022
        $dateStrForOutwards = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate ";
        //
        //
        //echo '$dateRangeStrForOpening == ' . $dateRangeStrForOpening . '<br />';
        //echo '$dateStrForOpening == ' . $dateStrForOpening . '<br />';
        //echo '$dateStr == ' . $dateStr . '<br />';
        //echo '$dateStrForOutwards == ' . $dateStrForOutwards . '<br />';
        //
        //
        ?>
    <tr>
        <td valign="middle" align="right" width="30%">
                <div id="stockLedgersStockMismatchButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK MISMATCH BUTTON @PRIYANKA-28FEB2022
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
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:-105px; color:#000080; background-color: #89B2ED;';
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
                    //* END CODE FOR STOCK LEDGER STOCK MISMATCH BUTTON @PRIYANKA-28FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="right" width="20%">
                <div id="stockLedgersStockFirmChangeButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK MISMATCH => STOCK WRONG FIRM BUTTON @PRIYANKA-28FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersStockFirmChangeButt';
                    $inputNameButton = 'stockLedgersStockFirmChangeButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:5px; color:#225b5b; background-color: #13F9D8C2;';
                    //
                    $inputLabel = 'STOCK WRONG FIRM'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'STOCK WRONG FIRM';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "StockFirmChangePanel", "StockFirmChangePanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER STOCK MISMATCH => STOCK WRONG FIRM BUTTON @PRIYANKA-28FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="right" width="20%">
                <div id="stockLedgersStockPurityButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK MISMATCH => STOCK PURITY CORRECTION BUTTON @PRIYANKA-28FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersStockPurityButt';
                    $inputNameButton = 'stockLedgersStockPurityButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:114px; color:#000080; background-color: #7FFF00;';
                    //
                    $inputLabel = 'STOCK WRONG PURITY'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'STOCK WRONG PURITY';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "StockPurityCorrectionPanel", "StockPurityCorrectionPanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER STOCK MISMATCH => STOCK PURITY CORRECTION BUTTON @PRIYANKA-28FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="left" width="20%">
                <div id="stockLedgersDeletedStockListButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK MISMATCH => DELETED STOCK LIST BUTTON @PRIYANKA-28FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersDeletedStockListButt';
                    $inputNameButton = 'stockLedgersDeletedStockListButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:0px; margin-left: -109px; '
                                . 'color:white; background-color:#F42B2B;';
                    //
                    $inputLabel = 'DELETED STOCK LIST'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'DELETED STOCK LIST';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "DeletedStockListPanel", "DeletedStockListPanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER STOCK MISMATCH => DELETED STOCK LIST BUTTON @PRIYANKA-28FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
            <td valign="middle" align="left" width="20%">
                <div id="stockLedgersStockRecreationButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK LEDGER STOCK RECREATION BUTTON @PRIYANKA-28FEB2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'stockLedgersStockRecreationButt';
                    $inputNameButton = 'stockLedgersStockRecreationButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn-primary';
                    //
                    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:12px;'
                                . 'padding-top:3px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
                                . 'text-align:center; margin-right:0px; margin-left: -219px; '
                                . 'color:white; background-color:#007bff;';
                    //
                    $inputLabel = 'STOCK RECREATION'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'STOCK RECREATION';
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
                    $inputOnClickFun = 'searchStockLedgerSummarySubPanel(document.getElementById("FirmName").value, 
                                        document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                        document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"),
                                      "' . $panelName . '", "StockRecreationPanel", "StockRecreationPanel");';
                    //
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR STOCK LEDGER STOCK RECREATION BUTTON @PRIYANKA-28FEB2022
                    //* **************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                </div>
            </td>
        </tr>
</table>
<?php 
//
//
//**************************************************************************************
// START CODE FOR STOCK LEDGER - STOCK WRONG FIRM @PRIYANKA-28FEB2022
//**************************************************************************************
//
include $_SESSION['documentRootIncludePhp'] . 'omStockMismatchStockFirmChange.php';
//
//**************************************************************************************
// END CODE FOR STOCK LEDGER- STOCK WRONG FIRM @PRIYANKA-28FEB2022
//**************************************************************************************
//
//
?>
<?php } ?>