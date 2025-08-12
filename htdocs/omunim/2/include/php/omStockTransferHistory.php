<?php
/*
 * **************************************************************************************
 * @Description: STOCK TRANSFER HISTORY @PRIYANKA-02DEC2021
 * **************************************************************************************
 *
 * Created on DEC 02, 2021 05:43:00 PM 
 * **************************************************************************************
 * @FileName: omStockTransferHistory.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.7.102
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * *****************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE: @PRIYANKA-02DEC2021
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
    $messDiv = $_GET['messDiv'];
    //    
    //    
    //print_r($_REQUEST);
    //
    //
    // Added Code To GET Firm Details @PRIYANKA-02DEC2021
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
    // Start Code To GET Firm Details @PRIYANKA-02DEC2021
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        //if not selected assign session firm @PRIYANKA-02DEC2021
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
        //Set String for Public Firms @PRIYANKA-02DEC2021
        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
            $strFrmId = $strFrmId . ",";
            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
        }
    } else {
        $strFrmId = $selFirmId;
    }
    // End Code To GET Firm Details @PRIYANKA-02DEC2021
    //
    //
    //echo 'firmId == ' . $_REQUEST['firmId'] . '<br />';
    //echo 'strFrmId == ' . $strFrmId . '<br />';
    //echo 'selFirmId == ' . $selFirmId . '<br />';
    //
    //
    ?>
    <?php
    //
    // ADDED CODE FOR PANEL LABELS @AUTHOR:PRIYANKA-26JULY2022
    $headingNameForPanel = 'STOCK TRANSFER HISTORY';
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
                    STOCK TRANSFER HISTORY
                </div>
            </td>           
            <td valign="middle" align="left" width="15%">
                <div id="stockTransferHistoryButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK TRANSFER HISTORY PANEL @PRIYANKA-02DEC2021
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
//                    //* END CODE FOR STOCK TRANSFER HISTORY PANEL @PRIYANKA-02DEC2021
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
                    //* START CODE FOR STOCK TRANSFER REPORT @PRIYANKA-02DEC2021
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
//                    //* END CODE FOR STOCK TRANSFER REPORT @PRIYANKA-02DEC2021
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
                    //* START CODE FOR STOCK TRANSFER @PRIYANKA-02DEC2021
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
//                    //* END CODE FOR STOCK TRANSFER @PRIYANKA-02DEC2021
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
        // ADDED CODE BY FOR ORDER PANEL @AUTHOR:PRIYANKA-25NOV2021
        include $_SESSION['documentRootIncludePhp'] . 'omStockStatusCheckForStockManagementByCounter.php';
        //
        $newProdCode = $newProductPreId . $newProductPostId;
        //
        //echo '$newProdCode == ' . $newProdCode . '<br />';
        //echo '$newProductPreId == ' . $newProductPreId . '<br />';
        //echo '$newProductPostId == ' . $newProductPostId . '<br />';
        //
        $stockTransferHistoryDisplay = '';
        //
        if ($newProdCode != '') {
            //
            if ($newProductPreId == '' && $newProductPostId != '') {
                //
                $qSelItemDetails = "SELECT * FROM stock_transaction WHERE sttr_indicator = 'stock' "
                                 . "AND sttr_barcode_prefix = '$productBarCodePreId' AND sttr_barcode = '$productBarCode'";
                //
                $resItemDetails = mysqli_query($conn, $qSelItemDetails);
                $stockCount = mysqli_num_rows($resItemDetails);
                //
            } else {
                //
                $qSelItemDetails = "SELECT * FROM stock_transaction "
                                 . "WHERE sttr_item_pre_id = '$newProductPreId' AND sttr_item_id = '$newProductPostId' "
                                 . "AND sttr_indicator IN ('stock', 'PURCHASE') and sttr_stock_type = 'retail' "
                                 . "AND sttr_transaction_type NOT IN ('sell','ESTIMATESELL') "
                                 . "AND sttr_status NOT IN('DELETED')";
                //
                $resItemDetails = mysqli_query($conn, $qSelItemDetails);
                $stockCount = mysqli_num_rows($resItemDetails);
                //
            }
            //            
            // If Stock Available Count is Zero then check with RFID No. @AUTHOR:PRIYANKA-25NOV2021
            if ($stockCount == 0 && $prodScanWithRFID != '') {
                //
                $qSelItemDetails = "SELECT * FROM stock_transaction WHERE sttr_indicator = 'stock' "
                                 . "AND sttr_rfid_no = '$newProdCode' AND sttr_transaction_type NOT IN ('sell','ESTIMATESELL')";
                //
                $resItemDetails = mysqli_query($conn, $qSelItemDetails);
                $stockCount = mysqli_num_rows($resItemDetails);
                //
            }
            //
            // START CODE FOR SCAN PRODUCT WITH BARCODE NUMBER (STARTS WITH ZERO) @AUTHOR:PRIYANKA-25NOV2021
            if ($stockCount == 0) {
                //
                if ($newProductPreId == '' && $newProductPostId != '') {
                    //
                    $productBarCodePreId = substr($newProductPostId, 0, 2);
                    $productBarCode = substr($newProductPostId, 2);
                    //
                    $qSelItemDetails = "SELECT * FROM stock_transaction WHERE sttr_indicator = 'stock' "
                                     . "AND sttr_barcode_prefix = '$productBarCodePreId' AND sttr_barcode = '$productBarCode' "
                                     . "AND sttr_transaction_type NOT IN ('sell','ESTIMATESELL')";
                    //
                    $resItemDetails = mysqli_query($conn, $qSelItemDetails);
                    $stockCount = mysqli_num_rows($resItemDetails);
                    //
                }
            }
            //
            //
            //echo '$qSelItemDetails == ' . $qSelItemDetails . '<br />';
            //echo '$stockCount == ' . $stockCount . '<br />';
            //                 
            //
            // DATE @AUTHOR:PRIYANKA-26NOV2021
            $todayDate = date("d M Y"); 
            //
            $todayDate = strtoupper($todayDate);
            //
            $rowItemDetails = mysqli_fetch_array($resItemDetails, MYSQLI_ASSOC);
            //
            // 
            $sttrId = $rowItemDetails['sttr_id'];
            //    
            //              
            //echo '$sttrId == ' . $sttrId . '<br />';
            //echo '$productBarCodePreId == ' . $productBarCodePreId . '<br />';
            //echo '$productBarCode == ' . $productBarCode . '<br />';
            //echo '$newProdCode == ' . $newProdCode . '<br />';
            //echo '$newProductPreId == ' . $newProductPreId . '<br />';
            //echo '$newProductPostId == ' . $newProductPostId . '<br />';
            //
            //
            $sttrIdStr = "(sttr_id = '$sttrId')";
            //
            //
            // BARCODE CONDITION STR @AUTHOR:PRIYANKA-26NOV2021
            if (($productBarCodePreId != '' && $productBarCodePreId != NULL) || 
                ($productBarCode != '' && $productBarCode != NULL)) {
                 $barcodeStr = " OR (sttr_barcode_prefix = '$productBarCodePreId' AND sttr_barcode = '$productBarCode')";
            }
            //
            //
            // PRODUCT CODE CONDITION STR @AUTHOR:PRIYANKA-26NOV2021
            if (($newProductPreId != '' && $newProductPreId != NULL) || 
                ($newProductPostId != '' && $newProductPostId != NULL)) {
                 $prodCodeStr = " OR (sttr_item_pre_id = '$newProductPreId' AND sttr_item_id = '$newProductPostId')";
            }
            //
            //
            // RFID CONDITION STR @AUTHOR:PRIYANKA-26NOV2021
            if ($newProdCode != '' && $newProdCode != NULL) {
                $rfidStr = " OR (sttr_rfid_no = '$newProdCode')" ;
            }
            //   
            //                   
            //             
            // WHERE CONDITION STR @AUTHOR:PRIYANKA-26NOV2021
            $conditionStr = " AND ($sttrIdStr $barcodeStr $prodCodeStr $rfidStr) ";
            //            
            //
            // PRODUCT DETAILS @PRIYANKA-27NOV2021
            parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                   . "AND sttr_transaction_type IN ('EXISTING','PURONCASH','TAG','PURBYSUPP') "
                                   . "$conditionStr"));
            // 
            //
            $stockTransferHistoryDisplay = 'YES';
            //           
            //
        }
        ?>
    </div>
    <table align="center" border="0" cellspacing="0" cellpadding="2" style="margin-top: 2px;" width="100%">
        <tr>
            <td align="center" valign="middle" width="25%"></td>
            <td align="center" valign="middle" width="50%">   
                <div style="margin-top: 5px; width:100%;">
                    <?php
                    //
                    //echo '$indicator == ' . $indicator . '<br />';
                    //echo '$userId == ' . $userId . '<br />';
                    //echo '$panelName == ' . $panelName . '<br />';
                    //echo '$transType == ' . $transType . '<br />';
                    //
                    //*************************************************************************************
                    //* Start Input Area to get firms details
                    //*************************************************************************************
                    //
                    // // This is the main division class for input filed
                    // 
                    // Input Box Type and Ids
                    $inputId = 'searchProduct';
                    $inputName = 'searchProduct';
                    $inputFieldColumnName = 'searchProduct';
                    $mainInputFieldId = 'searchProduct';
                    //
                    $inputFieldNextId = "goButton";
                    $inputFieldPrevId = 'searchProduct'; 
                    //
                    $inputType = 'text';
                    //
                    //$inputFieldValue = '';
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'textLabel16CalibriNormalGreyMiddle form-control font-dark';
                    //
                    //if ($inputStyle === '' || $inputStyle === NULL) {
                    $inputStyle = 'width:100%; height:40px; text-align: center;font-weight:600;font-size:16px;';
                    //}
                    //
                    //
                    //if ($inputTitle === '' || $inputTitle === NULL) {
                        //
                        $inputTitle = 'SEARCH PRODUCT ID / BARCODE / RFID';                        
                        //
                    //}
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = '';
                    // 
                    // Place Holder inside input box
                    //
                    $selectDropdownClass = 'googleSuggestionDivClass';
                    //
                    //if ($inputPlaceHolder === '' || $inputPlaceHolder === NULL) {
                        //
                        $inputPlaceHolder = 'SEARCH PRODUCT ID / BARCODE / RFID';                        
                        //
                    //}
                    //
                    //
                    // Place Holder in span outside input box
                    $spanPlaceHolderClass = '';
                    $spanPlaceHolder = '';
                    //
                    //$selectDropdownDivStyle = "margin-left: 62%;";
                    //        
                    //$isAlphaNumWithSomeSpecialCharSpace = 'Y';
                    //
                    //
                    // Event Options
                    //
                    // On Change Function
                    $inputGoogleSuggDivId = $inputFieldColumnName . '_google_div';
                    $inputGoogleSuggDivClass = 'googleSuggestionDropdownDivClass';
                    $inputOnBlurFun = 'googleSuggestionDropdownBlank("' . $inputGoogleSuggDivId . '");';
                    //                    
                    //
                    $inputKeyUpFun = "var googleWhereCondColumns = 'AND sttr_transaction_type NOT IN (\'' + 'sell\',\'' +  'newOrder\',\'' + 'ESTIMATESELL' + '\') AND sttr_status!=\'' + 'SOLDOUT' + '\' AND sttr_item_code!=\'' + '' + '\' AND sttr_indicator=\'' + '$indicator' + '\'';"
                                   . " googleSuggestionDropdown('stock_transaction', 'sttr_item_code', this.value, googleWhereCondColumns, '$inputId', '$selectDropdownClass', event.keyCode, '$inputGoogleSuggDivId', '$inputGoogleSuggDivId')";
                    //  
                    //
                    $inputKeyDownFun = "";
                    //
                    $inputOnChange = "";
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //
                    //* *************************************************************************************
                    //* End Input Area 
                    //***************************************************************************************
                    //
                    //
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //
                    ?>
                    &nbsp;
                    <input type="hidden" id="searchProductPreId" name="searchProductPreId" />
                    <input type="hidden" id="searchProductPostId" name="searchProductPostId" />
                    <input type="hidden" id="productCounter" name="productCounter" />
                    <input type="hidden" id="selectedStaff" name="selectedStaff" />
                    <input type="hidden" id="FirmName" name="FirmName" />
                    <input type="hidden" id="documentRootPath" name="documentRootPath" 
                           value="<?php echo $documentRootBSlash; ?>" />
                    <img src="<?php echo $documentRoot; ?>/images/sell_Purchase16.png" width="0.01px" 
                         onload="document.getElementById('searchProduct').focus();"/>
                </div>
            </td>

            <td align="" valign="top"> 
                <!---Start to Changes button ----->
                <div>
                    <?php
                    //
                    $inputId = "goButton";
                    $inputIdButton = "goButton";
                    $inputNameButton = 'goButton';
                    $inputFieldValue = 'GO';                    
                    //
                    $inputFieldNextId = "goButton";
                    $inputFieldPrevId = 'goButton'; 
                    //
                    $inputType = 'button';
                    //
                    $inputTitle = '';
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn ' . $om_btn_style;
                    $inputStyle = "margin-left:-5px;background-color: #DCEAFF;color: #0F118A;border: 1px solid #7ab0fe;height:40px;width: 50px;border-radius: 0 5px 5px 0 !important;font-size: 16px;box-shadow: 0 1px 3px rgba(0,0,0,0.2);font-size:16px;font-weight:600;";
                    $inputLabel = 'GO'; // Display Label below the text box
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = '';
                    $inputPlaceHolder = '';
                    $spanPlaceHolderClass = '';
                    $spanPlaceHolder = '';
                    $inputOnChange = "";
                    $inputOnClickFun = 'javascript:searchProductDetailsByIdBarcodeRFIDForStockManagementByCounter(document.getElementById("searchProduct").value, "' . $autoEntry . '", "' . $userId . '", "' . $transType . '", "' . $indicator . '", document.getElementById("productCounter").value, document.getElementById("selectedStaff").value, document.getElementById("FirmName").value, document.getElementById("sttr_pre_voucher_no").value, document.getElementById("sttr_voucher_no").value);
                                                   showProductDetailsDivForStockManagementByCounter(document.getElementById("searchProductPreId").value, document.getElementById("searchProductPostId").value, "' . $userId . '",  "stockTransferHistoryPanel",  "' . $transType . '",  "' . $indicator . '", document.getElementById("productCounter").value, document.getElementById("selectedStaff").value, document.getElementById("FirmName").value, document.getElementById("sttr_pre_voucher_no").value, document.getElementById("sttr_voucher_no").value);
                                                   return false;';
                    $inputKeyUpFun = '';
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                    ?>
                </div>
                <!---End to Changes button ----->
            </td>
        </tr>
    </table>    
    <?php
    //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    // START CODE FOR STOCK TRANSFER HISTORY @AUTHOR:PRIYANKA-02DEC2021
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    //
    if ($stockTransferHistoryDisplay == 'YES') {
        //
        $transCount = noOfRowsCheck('sttr_id', 'stock_transaction', 
                                    "(sttr_stock_trans_history IS NOT NULL OR "
                                  . " sttr_stock_trans_counter_history IS NOT NULL OR "
                                  . " sttr_stock_trans_staff_history IS NOT NULL) "
                                  . " $conditionStr ");
        //
    }
    //
    //
    //echo '$conditionStr == ' . $conditionStr . '<br />';
    //echo '$transCount == ' . $transCount . '<br />';
    //
    //
    if ($transCount > 0) { ?>
        <table align="center" style="margin-left: 381px;">
            <tr align="center">
                <td class="ff_tnr fs_18 brown" align="center" style="font-weight: bold;">
                    STOCK TRANSFER HISTORY
                </td>
            </tr>
        </table>
        <br>
        <table align="center" border="1 px solid black" cellspacing="0" cellpadding="0" width="60%" style="margin-left: 166px;">
            <tr>
                <th width="15%" class="ff_calibri fs_14 brown fw_b" style="background-color: #F9C99A"><center>Date & Time</center></th>
                <th width="45%" class="ff_calibri fs_14 brown fw_b" style="background-color: #F9C99A"><center>History</center></th>
            </tr>
            <?php
            //
            $qSelAllStTransHis = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                               . "AND (sttr_stock_trans_history IS NOT NULL "
                               . "OR sttr_stock_trans_counter_history IS NOT NULL "
                               . "OR sttr_stock_trans_staff_history IS NOT NULL) $conditionStr ";
            //
            $resAllStTransHis = mysqli_query($conn, $qSelAllStTransHis);
            //
            //echo '$qSelAllStTransHis == ' . $qSelAllStTransHis . '<br />';
            //
            $rowAllStTransHis = mysqli_fetch_array($resAllStTransHis, MYSQLI_ASSOC);
            //
            //
            $History = $rowAllStTransHis['sttr_stock_trans_history'];
            $CounterHistory = $rowAllStTransHis['sttr_stock_trans_counter_history'];
            $StaffHistory = $rowAllStTransHis['sttr_stock_trans_staff_history'];
            //
            $ItemCode = $rowAllStTransHis['sttr_item_code'];
            //
            $strTransHisTime = $rowAllStTransHis['sttr_trans_date'];
            //
            $stCurrentFirm = $rowAllStTransHis['sttr_firm_id'];
            //
            $counterNameNew = $rowAllStTransHis['sttr_counter_name'];
            //
            $staffIdNew = $rowAllStTransHis['sttr_staff_id'];
            //
            parse_str(getTableValues("SELECT firm_name FROM firm WHERE firm_id = '$stCurrentFirm'"));
            //
            parse_str(getTableValues("SELECT user_fname AS staffNameNew FROM user WHERE user_id = '$staffIdNew'"));
            //
            //
            //
            if ($History != '' && $History != NULL) {
                //
                $StockFirmHistory = explode('#', $History);
                //
                $firmCount = count($StockFirmHistory);
                //
                $prevFirm = end($StockFirmHistory);
                //
                $stTransFirmHist = array_reverse($StockFirmHistory);
                //
            }
            //
            //
            //echo '<pre>';
            //print_r($StockFirmHistory);
            //echo '<br />';
            //
            //echo '$staffNameNew == ' . $staffNameNew . '<br />';
            //echo '$History == ' . $History . '<br />';
            //echo '$CounterHistory == ' . $CounterHistory . '<br />';
            //echo '$StaffHistory == ' . $StaffHistory . '<br />';
            //
            //
            if ($CounterHistory != '' && $CounterHistory != NULL) {
                //
                $StockCounterHistory = explode('#', $CounterHistory);
                //
                $counterCount = count($StockCounterHistory);
                //
                $prevCounter = end($StockCounterHistory);
                //
                $stTransCounterHist = array_reverse($StockCounterHistory);
                //
            }
            //
            //
            //echo '<pre>';
            //print_r($StockCounterHistory);
            //echo '<br />';
            //
            //echo '$prevCounter == ' . $prevCounter . '<br />';
            //echo '$stTransCounterHist == ' . $stTransCounterHist . '<br />';
            //
            //
            if ($StaffHistory != '' && $StaffHistory != NULL) {
                //
                $StockStaffHistory = explode('#', $StaffHistory);
                //
                $staffCount = count($StockStaffHistory);
                //
                $prevStaff = end($StockStaffHistory);
                //
                parse_str(getTableValues("SELECT user_fname AS prevStaffName FROM user WHERE user_id = '$prevStaff'"));
                //
                $stTransStaffHist = array_reverse($StockStaffHistory);
                //
            }
            //
            //
            //echo '<pre>';
            //print_r($StockStaffHistory);
            //echo '<br />';
            //
            //
            $stTransHist = explode('#', $strTransHisTime);
            //
            //
            //print_r($StockFirmHistory);
            //
            //
            $prevdate = end($stTransHist);
            //
            $stTransDateHist = array_reverse($stTransHist);
            //
            //
            //echo '$counterCount == ' . $counterCount . '<br />';
            //echo '$staffCount == ' . $staffCount . '<br />';           
            //echo '$firmCount == ' . $firmCount . '<br />';
            //
            //
            ?>
            <tr>
                <td align="center" class="ff_calibri fs_14">
                    <?php echo $prevdate; ?>
                </td>
                <td align="left" class="ff_calibri fs_14" style="padding-left: 5px;">
                    <?php 
                    //
                    if ($prevCounter != '') {
                        //if ($prevCounter != $counterNameNew) {
                            echo 'Product Code : ' . $ItemCode . '&nbsp;&nbsp;' . '( Previous Counter : ' . $prevCounter . '&nbsp;&nbsp;' . 'and Current Counter : ' . $counterNameNew . ' )' . '<br />'; 
                        //}
                    } 
                    //
                    if ($prevStaffName != '') {
                        //if ($prevStaffName != $staffNameNew) {
                            echo 'Product Code : ' . $ItemCode . '&nbsp;&nbsp;' . '( Previous Staff : ' . $prevStaffName . '&nbsp;&nbsp;' . 'and Current Staff : ' . $staffNameNew . ' )' . '<br />'; 
                        //}                       
                    }
                    //
                    if ($prevFirm != '') {
                        //if ($prevFirm != $firm_name) {
                            echo 'Product Code : ' . $ItemCode . '&nbsp;&nbsp;' . '( Previous Firm : ' . $prevFirm . '&nbsp;&nbsp;' . 'and Current Firm : ' . $firm_name . ' )'; 
                        //}
                    }
                    //
                    ?>
                </td>
            </tr>
            <?php
            //
            $firmHistarrayLength = count($stTransFirmHist);
            //
            $counterHistarrayLength = count($stTransCounterHist);
            //
            $staffHistarrayLength = count($stTransStaffHist);
            //
            $dateHistarrayLength = count($stTransDateHist);
            //
            //echo $firmHistarrayLength;
            //
            $firmHist = 1;
            $dateHist = 1;
            $counterHist = 1;
            $counterDateHist = 1;
            $staffHist = 1;
            $staffDateHist = 1;
            //
            //print_r($stTransFirmHist);
            //print_r($stTransDateHist);
            //
            ?>                
            <tr>
                <?php while ($counterHist < ($counterHistarrayLength - 1) && $counterDateHist < ($dateHistarrayLength - 1)) { ?>
                    <td align="center" class="ff_calibri fs_14">
                        <?php echo $stTransDateHist[$counterDateHist]; ?>
                    </td>
                    <td align="left" class="ff_calibri fs_14" style="padding-left: 5px;">
                        <?php echo 'Product Code : ' . $newProdCode . '&nbsp;&nbsp;' . '( Previous Counter : ' . $stTransCounterHist[$counterHist] . '&nbsp;&nbsp;' . 'and New Counter : ' . $stTransCounterHist[$counterHist - 1] . ' )'; ?>
                    </td>
                </tr>
                <?php 
                $counterHist++;
                $counterDateHist++;
                }
                ?>
                <tr>
                <?php while ($staffHist < ($staffHistarrayLength - 1) && $staffDateHist < ($dateHistarrayLength - 1)) { ?>
                    <td align="center" class="ff_calibri fs_14">
                        <?php echo $stTransDateHist[$staffDateHist]; ?>
                    </td>
                    <?php 
                    //
                    $oldStaffIdName = $stTransStaffHist[$staffHist];
                    //
                    parse_str(getTableValues("SELECT user_fname AS prevStaffIdName FROM user WHERE user_id = '$oldStaffIdName'"));
                    //
                    $newStaffIdName = $stTransStaffHist[$staffHist - 1];
                    //
                    parse_str(getTableValues("SELECT user_fname AS currentStaffIdName FROM user WHERE user_id = '$newStaffIdName'"));
                    //
                    ?>
                    <td align="left" class="ff_calibri fs_14" style="padding-left: 5px;">
                        <?php echo 'Product Code : ' . $newProdCode . '&nbsp;&nbsp;' . '( Previous Staff : ' . $prevStaffIdName . '&nbsp;&nbsp;' . 'and New Staff : ' . $currentStaffIdName . ' )'; ?>
                    </td>
                </tr>
                <?php
                $staffHist++;
                $staffDateHist++;
                } 
                ?>
                <tr>
                <?php while ($firmHist < ($firmHistarrayLength - 1) && $dateHist < ($dateHistarrayLength - 1)) { ?>
                    <td align="center" class="ff_calibri fs_14">
                        <?php echo $stTransDateHist[$dateHist]; ?>
                    </td>
                    <td align="left" class="ff_calibri fs_14" style="padding-left: 5px;">
                        <?php echo 'Product Code : ' . $newProdCode . '&nbsp;&nbsp;' . '( Previous Firm : ' . $stTransFirmHist[$firmHist] . '&nbsp;&nbsp;' . 'and New Firm : ' . $stTransFirmHist[$firmHist - 1] . ' )'; ?>
                    </td>
                </tr>
                <?php 
                $firmHist++;
                $dateHist++;
            }                
        }
        //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // END CODE FOR STOCK TRANSFER HISTORY @AUTHOR:PRIYANKA-02DEC2021
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        //
        ?>
    </table>
</div>