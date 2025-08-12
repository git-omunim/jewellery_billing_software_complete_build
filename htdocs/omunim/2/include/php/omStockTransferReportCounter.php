<?php
/*
 * *************************************************************************************************
 * @tutorial: STOCK TRANSFER REPORT COUNTER FIELD FILE @AUTHOR:PRIYANKA-04DEC2021
 * *************************************************************************************************
 * 
 * Created on 04 DEC, 2021 03:00:00 PM
 *
 * @FileName: omStockTransferReportCounter.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @AUTHOR:PRIYANKA-04DEC2021
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
require_once 'conversions.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
?>
<?php
//
//**************************************************************************************
// Start code to get product counter details @AUTHOR:PRIYANKA-04DEC2021
//**************************************************************************************
//
// This is the main division class for input filed
//
$inputMainDivClass = '';
$inputMainDivStyle = '';
//
// Input Box Type and Ids
$inputType = 'dropdown';
$inputId = 'productCounter';
$inputName = 'productCounter';
//
// This is the main class for input flied
$inputFieldClass = 'form-control text-center';
//
//if ($inputStyle === '' || $inputStyle === NULL) {    
    $inputStyle = 'width:100%; height:30px;text-align: left; '
                . 'border-color:#b5d8ff;background:#bed8fd; color:#000080!important; border-radius: 5px !important;text-align:center;font-weight:600;';
//}
//
$inputLabel = ''; // Display Label below the text box
//       
//
// This class is for Pencil Icon                                                           
$inputIconClass = '';
//
// Query for drop down select options
$inputFieldDBQuery = "SELECT sttr_counter_name FROM stock_transaction "
                   . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                   . "AND sttr_counter_name IS NOT NULL "
                   . "AND sttr_counter_name != '' "
                   . "AND sttr_firm_id IN ($strFrmId) GROUP BY sttr_counter_name";
//
//echo '$inputFieldDBQuery == '.$inputFieldDBQuery;
//
$inputFieldDBOptionColumnValue = 'sttr_counter_name';
$inputFieldDBOptionColumnValueDisplay = 'sttr_counter_name';
$selectFieldSelectedColumn = 'sttr_counter_name';
//
if ($productCounter != '' && $productCounter != NULL && $productCounter != 'NotSelected') {
    $selectFieldSelected = $productCounter;
}
// 
// For drop down select options
$selectOptionLabel = 'SELECT COUNTER';
//
// Place Holder inside input box
//
$len = strlen($placeHolder);
$position = strpos($placeHolder, '|');
$inputPlaceHolder = substr($placeHolder, $position, $len);
$inputLabelDivText = substr($placeHolder, 0, $position);
//
//$inputLabelBoxClass = 'hidden_box_dropdown';
//
// Place Holder in span outside input box
$spanPlaceHolderClass = '';
$spanPlaceHolder = '';
// 
//
//
// Event Options
//
// On Change Function
// On Change Function
$inputOnChange = "getStockTransferReportSelectedOptionsFunc(this.value, document.getElementById('selectedStaff').value, 
                                                            document.getElementById('FirmName').value, '$stockTransferNavPanelName', 
                                                            document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                            document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'));";
$inputKeyUpFun = '';
$inputOnBlurFun = 'getStockTransferReportSelectedOptionsFunc(this.value, document.getElementById("selectedStaff").value, 
                                                             document.getElementById("FirmName").value, "' . $stockTransferNavPanelName . '", 
                                                             document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                                             document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"));';
$inputDropDownCls = '';               // This is the main division class for drop down 
$inputselDropDownCls = '';            // This is class for selection in drop down
$inputMainClassButton = '';           // This is the main division for Button
// 
// 
//echo '$selectOptionLabel == ' . $selectOptionLabel . '<br />';
// 
//**************************************************************************************
//* End code to get product counter details @AUTHOR:PRIYANKA-04DEC2021
//**************************************************************************************
//
//
include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
//
//
?>