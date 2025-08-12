<?php
/*
 * *************************************************************************************************
 * @tutorial: STOCK MANAGEMENT BY COUNTER FIELD FILE @AUTHOR:PRIYANKA-26NOV2021
 * *************************************************************************************************
 * 
 * Created on 26 NOV, 2021 03:00:00 PM
 *
 * @FileName: omStockTransferByCounter.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @AUTHOR:PRIYANKA-26NOV2021
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
// Start code to get product counter details @AUTHOR:PRIYANKA-26NOV2021
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
    //   
    //$inputStyle = 'width:125%; height:24px; margin-left:12px; text-align: left; '
    //            . 'border-color:  #007bff; color: #007bff !important; border-radius: 5px !important;';
    //   
    $inputStyle = 'width:100%; height:30px; text-align:center; font-size: 16px !important;'
                . 'border-color: #b5d8ff; color:#000080 !important;background: #bed8fd;font-weight: 600; border-radius:3px !important;padding-left:5px;';

//}
//
$inputLabel = ''; // Display Label below the text box
//       
//
// This class is for Pencil Icon                                                           
$inputIconClass = '';
//
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
//
// On Change Function
$inputOnChange = "getStockTransferSelectedOptionsFunc(this.value, document.getElementById('selectedStaff').value, 
                                                      document.getElementById('FirmName').value, '$stockTransferNavPanelName','');";
//
//
$inputKeyUpFun = '';
//
//
$inputOnBlurFun = 'getStockTransferSelectedOptionsFunc(this.value, document.getElementById("selectedStaff").value, 
                                                       document.getElementById("FirmName").value, "' . $stockTransferNavPanelName . '","");';
//
$inputDropDownCls = '';               // This is the main division class for drop down 
$inputselDropDownCls = '';            // This is class for selection in drop down
$inputMainClassButton = '';           // This is the main division for Button
// 
// 
//echo '$selectOptionLabel == ' . $selectOptionLabel . '<br />';
// 
// 
//**************************************************************************************
//* End code to get product counter details @AUTHOR:PRIYANKA-26NOV2021
//**************************************************************************************
//
//
include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
//
//
//**************************************************************************************
// End code to get product counter details @AUTHOR:PRIYANKA-26MAR2022
//**************************************************************************************
?>
<?php
////
////
////**************************************************************************************
//// Start code to get product counter details @AUTHOR:PRIYANKA-30MAR2022
////**************************************************************************************
////
////*************************************************************************************
////* Start Input Area to get details
////*************************************************************************************
////
//// // This is the main division class for input filed
//// 
//// Input Box Type and Ids
//$inputId = 'productCounter';
//$inputName = 'productCounter';
//$inputFieldColumnName = 'productCounter';
//$mainInputFieldId = 'productCounter';
////
//$inputFieldNextId = "selectedStaff";
//$inputFieldPrevId = 'productCounter';
////
//$inputType = 'text';
////
////
//if ($productCounter != '' && $productCounter != NULL && $productCounter != 'NotSelected') {
//    $inputFieldValue = $productCounter;
//}
////
////
////$inputFieldValue = '';
////
////
//// This is the main class for input flied
//$inputFieldClass = 'form-control text-center';
////
////
////if ($inputStyle === '' || $inputStyle === NULL) {    
//$inputStyle = 'width:100%; height:30px; text-align:center; font-size: 14px !important;'
//            . 'border-color: #b5d8ff; color:#000080 !important;background: #bed8fd;font-weight: 600; border-radius:3px !important;padding-left:5px;';
////}
////
////
////if ($inputTitle === '' || $inputTitle === NULL) {
////
//$inputTitle = 'SELECT COUNTER';
////
////}
////
//// This class is for Pencil Icon                                                           
//$inputIconClass = '';
//// 
//// Place Holder inside input box
////
//$selectDropdownClass = 'googleSuggestionDivClass';
////
////if ($inputPlaceHolder === '' || $inputPlaceHolder === NULL) {
////
//$inputPlaceHolder = 'SELECT COUNTER';
////
////}
////
////
//// Place Holder in span outside input box
//$spanPlaceHolderClass = '';
//$spanPlaceHolder = '';
////
////$selectDropdownDivStyle = "margin-left: 62%;";
////        
////$isAlphaNumWithSomeSpecialCharSpace = 'Y';
////
////
//// Event Options
////
//// On Change Function
//$inputGoogleSuggDivId = $inputFieldColumnName . '_google_div';
//$inputGoogleSuggDivClass = 'googleSuggestionDropdownDivClass';
//$inputOnBlurFun = 'googleSuggestionDropdownBlank("' . $inputGoogleSuggDivId . '");';
//                //. 'getStockTransferSelectedOptionsFunc(this.value, document.getElementById("selectedStaff").value, 
//                //                                       document.getElementById("FirmName").value, "' . $stockTransferNavPanelName . '");';
////                    
////
//$inputKeyUpFun = "var googleWhereCondColumns = 'AND sttr_counter_name!=\'' + 'null' + '\' AND sttr_counter_name!=\'' + '' + '\'';"
//               . " googleSuggestionDropdown('stock_transaction', 'sttr_counter_name', this.value, googleWhereCondColumns, '$inputId', '$selectDropdownClass', event.keyCode, '$inputGoogleSuggDivId', '$inputGoogleSuggDivId')";
////  
////
//$inputOnChange = "getStockTransferSelectedOptionsFunc(this.value, document.getElementById('selectedStaff').value, 
//                                                      document.getElementById('FirmName').value, '$stockTransferNavPanelName');";
////
//$inputKeyDownFun = '';
//$inputOnDoubleClickFun = '';
//$inputOnInput = '';
//$inputOnClickFun = '';
////
//$inputDropDownCls = '';               // This is the main division class for drop down 
//$inputselDropDownCls = '';            // This is class for selection in drop down
//$inputMainClassButton = '';           // This is the main division for Button
//// 
////
////* *************************************************************************************
////* End Input Area 
////***************************************************************************************
////
////
//include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
////
////
////**************************************************************************************
//// End code to get product counter details @AUTHOR:PRIYANKA-30MAR2022
////**************************************************************************************
////
////
?>