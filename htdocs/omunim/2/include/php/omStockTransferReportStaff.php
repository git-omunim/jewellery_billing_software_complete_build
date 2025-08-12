<?php
/*
 * *************************************************************************************************
 * @tutorial: STOCK TRANSFER REPORT STAFF FIELD FILE @AUTHOR:PRIYANKA-04DEC2021
 * *************************************************************************************************
 * 
 * Created on 04 DEC, 2021 03:45:00 PM
 *
 * @FileName: omStockTransferReportStaff.php
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
// Start code to get selected staff details @AUTHOR:PRIYANKA-04DEC2021
//**************************************************************************************
// 
// This is the main division class for input filed
//
$inputMainDivClass = '';
$inputMainDivStyle = '';
//
// Input Box Type and Ids
$inputType = 'dropdown';
$inputId = 'selectedStaff';
$inputName = 'selectedStaff';
//
// This is the main class for input flied
$inputFieldClass = 'form-control text-center';
//
if ($inputStyle === '' || $inputStyle === NULL) {   
    $inputStyle = 'width:100%; height:30px;text-align:center;font-weight:600; '
                . 'border-color:#D8F6D8; color:#006400;background:#D8F6D8;border-radius: 5px !important;';
}
//
$inputLabel = ''; // Display Label below the text box
//       
//
// This class is for Pencil Icon                                                           
$inputIconClass = '';
//
// Query for drop down select options
$inputFieldDBQuery = "SELECT user_id, user_fname FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
                   . "AND user_type = 'STAFF' AND user_firm_id IN ($strFrmId) ORDER BY user_fname ASC";
//
//echo '$inputFieldDBQuery == '.$inputFieldDBQuery;
//
$inputFieldDBOptionColumnValue = 'user_id';
$inputFieldDBOptionColumnValueDisplay = 'user_fname';
$selectFieldSelectedColumn = 'user_fname';
//
//echo '$selectedStaff == ' . $selectedStaff . '<br />';
//
if ($selectedStaff != '' && $selectedStaff != NULL && $selectedStaff != 'NotSelected') {
    //
    parse_str(getTableValues("SELECT user_fname AS selectedStaffName FROM user WHERE user_id = '$selectedStaff'"));
    //
    //echo '$selectedStaffName == ' . $selectedStaffName . '<br />';
    //
    $selectFieldSelected = $selectedStaffName;
    //
}
// 
// For drop down select options
$selectOptionLabel = 'SELECT STAFF';
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
$inputOnChange = "getStockTransferReportSelectedOptionsFunc(document.getElementById('productCounter').value, this.value, 
                                                            document.getElementById('FirmName').value, '$stockTransferNavPanelName',
                                                            document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                            document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'));";
$inputKeyUpFun = '';
$inputOnBlurFun = 'getStockTransferReportSelectedOptionsFunc(document.getElementById("productCounter").value, this.value, 
                                                             document.getElementById("FirmName").value, "' . $stockTransferNavPanelName . '", 
                                                             document.getElementById("FromDay"), document.getElementById("FromMonth"), document.getElementById("FromYear"),
                                                             document.getElementById("ToDateDay"), document.getElementById("ToDateMonth"), document.getElementById("ToDateYear"));';
$inputDropDownCls = '';               // This is the main division class for drop down 
$inputselDropDownCls = '';            // This is class for selection in drop down
$inputMainClassButton = '';           // This is the main division for Button
// 
//**************************************************************************************
//* End code to get selected staff details @AUTHOR:PRIYANKA-04DEC2021
//**************************************************************************************
//
//
include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
//
//
?>