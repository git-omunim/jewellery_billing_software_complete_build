<?php
/*
 * *************************************************************************************************************************************************************************
 * @tutorial: UNIVERSAL FORM SUB DIV FILE @PRIYANKA-29APR18
 * *************************************************************************************************************************************************************************
 *
 * Created on on 29 April, 2018 18:43:00 PM
 * 
 * @FileName: omStockTransFormSubDiv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.72
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 * Copyright 2018 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA
 *  REASON: FORM SUB DIV FILE
 *
 */
?>
<?php
// **********************************************************************************************************************************************************************
// START CODE FOR GLOBAL FILES @PRIYANKA-29APR18
// **********************************************************************************************************************************************************************
// MANDATORY FILES
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
// STAFF ACCESS FILE
$staffId = $_SESSION['sessionStaffId'];

// **********************************************************************************************************************************************************************
// END CODE FOR GLOBAL FILES @PRIYANKA-29APR18
// **********************************************************************************************************************************************************************
?>
<?php
//
if ($prodCount == '' || $prodCount == NULL)
    $prodCount = $_REQUEST['prodCount'];
//
if ($prodCount != '') {
    //
    $panelName = $_REQUEST['panelName'];
    //
    $arrStockFormFieldSequence = $_REQUEST['arrStockFormFieldSequence'];
    $arrStockFormFieldSequence = explode(",", $arrStockFormFieldSequence);
    //
    $arrStockFormFieldHorizontal = $_REQUEST['arrStockFormFieldHorizontal'];
    $arrStockFormFieldHorizontal = explode(",", $arrStockFormFieldHorizontal);
    //
    //
    $arrStockFormFieldMandatory = $_REQUEST['arrStockFormFieldMandatory'];
    $arrStockFormFieldMandatory = explode(",", $arrStockFormFieldMandatory);
    //
    $arrStockFormFieldValidationMessage = $_REQUEST['arrStockFormFieldValidationMessage'];
    $arrStockFormFieldValidationMessage = explode(",", $arrStockFormFieldValidationMessage);
    //
    $arrStockFormFieldTitle = $_REQUEST['arrStockFormFieldTitle'];
    $arrStockFormFieldTitle = explode(",", $arrStockFormFieldTitle);
    //
    $arrStockFormFieldSize = $_REQUEST['arrStockFormFieldSize'];
    $arrStockFormFieldSize = explode(",", $arrStockFormFieldSize);
    //
    $arrStockFormFieldYesNoKeys = $_REQUEST['arrStockFormFieldYesNoKeys'];
    $arrStockFormFieldYesNoKeys = explode(",", $arrStockFormFieldYesNoKeys);
    //
    $arrStockFormFieldYesNoValues = $_REQUEST['arrStockFormFieldYesNoValues'];
    $arrStockFormFieldYesNoValues = explode(",", $arrStockFormFieldYesNoValues);
    //
    $arrStockFormFieldYesNo = array_combine($arrStockFormFieldYesNoKeys, $arrStockFormFieldYesNoValues);

    $stockFormFieldSkipArray = $_REQUEST['stockFormFieldSkipArray'];
    $stockFormFieldSkipArray = explode(",", $stockFormFieldSkipArray);
}
//
//
$stockFormFieldHorizontalCounter = 0;
//
// START CODE TO INCLUDE FOR HIDDEN PARAMETERS @PRIYANKA-03MAY18
include 'omHiddenInput_2_6_72.php';
// END CODE TO INCLUDE FOR HIDDEN PARAMETERS @PRIYANKA-03MAY18
?>
<?php
//print_r($arrStockFormFieldSequence);
//echo '<br/>';
//print_r($arrStockFormFieldHorizontal);
?>
<table align="center" border="0" cellspacing="1" cellpadding="0" width="103%" 
       style="margin-left:-12px;">
    <tr>
        <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
        <td align="center" valign="middle">
            <?php if ($arrStockFormFieldYesNo['sttr_item_category'] == 'Y') { ?>
                <div class="text-center font-dark" ><strong>PROD DETAILS</strong></div>
            <?php } ?>
        </td>

        <td align="center" valign="middle">
            <?php if ($arrStockFormFieldYesNo['sttr_quantity'] == 'Y') { ?>
                <div class="text-center font-dark" ><strong>QTY</strong></div>
            <?php } ?>
        </td>

        <td align="center" valign="middle" >
            <?php if ($arrStockFormFieldYesNo['sttr_gs_weight'] == 'Y') { ?>
                <div class="text-center font-dark" > <strong> GROSS WT </strong></div>
            <?php } ?>
        </td>

        <td align="center" valign="middle" >
            <?php if ($arrStockFormFieldYesNo['sttr_pkt_weight'] == 'Y') { ?>
                <div class="text-center font-dark" > <strong> LESS WT </strong></div>
            <?php } ?>
        </td>

        <td align="center" valign="middle" >
            <?php if ($arrStockFormFieldYesNo['sttr_nt_weight'] == 'Y') { ?>
                <div class="text-center font-dark" > <strong> NET WT </strong></div>
            <?php } ?>
        </td>

        <td align="center" valign="middle" >
            <?php if ($arrStockFormFieldYesNo['sttr_fine_weight'] == 'Y') { ?>
                <div class="text-center font-dark" > <strong>FINE WT</strong></div>
            <?php } ?>
        </td>

        <td align="center" valign="middle" >
            <?php if ($arrStockFormFieldYesNo['sttr_final_fine_weight'] == 'Y') { ?>
                <div class="text-center font-dark" > <strong> FINAL WT</strong></div>
            <?php } ?>
        </td>

        <td align="center" valign="middle" >
            <?php if ($arrStockFormFieldYesNo['sttr_product_purchase_rate'] == 'Y') { ?>
                <div class="text-center font-dark" > <strong> RATE</strong></div>
            <?php } ?>
        </td>

        <td align="center" valign="middle" >
            <?php if ($arrStockFormFieldYesNo['sttr_metal_amt'] == 'Y') { ?>
                <div class="text-center font-dark" > <strong>AMOUNT</strong></div>
            <?php } ?>
        </td>

        <td align="center" valign="middle" >
            <?php if ($arrStockFormFieldYesNo['sttr_metal_discount_per'] == 'Y') { ?>
                <div class="text-center font-dark" > <strong>DISCOUNT</strong></div>
            <?php } ?>
        </td>

        <td align="center" valign="middle" >
            <?php if ($arrStockFormFieldYesNo['sttr_valuation'] == 'Y') { ?>
                <div class="text-center font-dark" > <strong>TOTAL AMOUNT</strong></div>
            <?php } ?>
        </td>

        <td align="center" valign="middle" >
            <?php if ($arrStockFormFieldYesNo['sttr_tot_price_cgst_chrg'] == 'Y') { ?>
                <div class="text-center font-dark" > <strong>CGST</strong></div>
            <?php } ?>
        </td>

        <td align="center" valign="middle" >
            <?php if ($arrStockFormFieldYesNo['sttr_tot_price_sgst_chrg'] == 'Y') { ?>
                <div class="text-center font-dark" > <strong>SGST</strong></div>
            <?php } ?>
        </td>

        <td align="center" valign="middle" >
            <?php if ($arrStockFormFieldYesNo['sttr_tot_price_igst_chrg'] == 'Y') { ?>
                <div class="text-center font-dark" > <strong>IGST</strong></div>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td colspan="14">
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                    <?php
                    // FINE JEWELLERY ITEM CATEGORY FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle">
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                            $inputMainDivClass = '';
                            $inputMainDivStyle = '';
                            $inputDivClass = '';
                            //
                            // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark input-focus';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;font-size:14px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            $selectDropdownClass = 'googleSuggestionDivClass';
                            $autoComplete = 'off';
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            $inputFieldDBQuery = '';
                            $inputFieldValue = '';
                            // 
                            $isAlphaNumWithSomeSpecialChar = 'Y';
                            //
                            // Event Options
                            //
                            // On Change Function
                            //
                            $inputGoogleSuggDivId = $inputFieldColumnName . '_google_div' . $prodCount;
                            $inputGoogleSuggDivClass = 'googleSuggestionDropdownDivClass';
                            $inputOnBlurFun = 'googleSuggestionDropdownBlank("' . $inputGoogleSuggDivId . '");';
                            $inputKeyUpFun = "var googleWhereCondColumns = 'AND itm_nm_metal=\'' + document.getElementById('sttr_product_type').value + '\' AND itm_nm_code=\'' + document.getElementById('sttr_item_pre_id').value + '\'';"
                                    . " googleSuggestionDropdown('item_name', 'itm_nm_category', this.value, googleWhereCondColumns, '$inputFieldColumnName$prodCount', '$selectDropdownClass', event.keyCode, '$inputGoogleSuggDivId', '$inputGoogleSuggDivId')";
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            //
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for 14th field in stock form. Here Sequence is '13'.    -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY QTY FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle">
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->
                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY GS WT FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                                    // Input Box Type and Ids
                            $inputType = 'text';

                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            $inputGoogleSuggDivId = $inputFieldColumnName . '_google_div' . $prodCount;
                            $inputGoogleSuggDivClass = 'googleSuggestionDropdownDivClass';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputOnClick = "";
                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            $inputOnDoubleClickFun = 'getStockTransGSWTDropdown("' . $inputGoogleSuggDivId . '", "' . $prodCount . '","IN", "' . $documentRootBSlash . '",event.keyCode);';
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                            <?php
                            $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                          echo $inputFieldColumnName . ' - ';
//                          echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                // FINE JEWELLERY GS WT TYPE FIELD
                                //
                                //* **************************************************************************************
                                //* Start Input Area to get firms details
                                //* **************************************************************************************
                                // // This is the main division class for input filed
                                //
                                $inputMainDivClass = '';
                                $inputMainDivStyle = '';
                                // Input Box Type and Ids
                                $inputType = 'dropdown';
                                //$inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
                                //
                                // This is the main class for input flied
                                $inputFieldClass = 'form-control text-center';
                                $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                $inputLabel = ''; // Display Label below the text box
                                $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $position = strpos($title, '|');
                                $inputTitle = substr($title, 0, $position);

                                //
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                //
                                // Query for drop down select options
                                $inputFieldDBQuery = "SELECT unit_type FROM units WHERE unit_own_id = '$_SESSION[sessionOwnerId]' AND unit_category = 'jewellery' order by unit_id asc";
                                $inputFieldDBOptionColumnValue = 'unit_type';
                                $inputFieldDBOptionColumnValueDisplay = 'unit_type';
                                $selectFieldSelectedColumn = 'unit_type';
                                $selectFieldSelected = 'GM';
                                // 
                                // For drop down select options
                                $selectOptionLabel = 'TYPE';
                                //
                                // Place Holder inside input box
                                $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $len = strlen($placeHolder);
                                $position = strpos($placeHolder, '|');
                                $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                $inputLabelDivText = substr($placeHolder, 0, $position);
                                $inputLabelBoxClass = 'hidden_box_dropdown';
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
                                $inputOnChange = "";
                                $inputKeyUpFun = '';
                                $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                // 
                                //* **************************************************************************************
                                //* End Input Area 
                                //* **************************************************************************************
                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                //
                            }
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY PKT WT FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                            <?php
                            $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                // FINE JEWELLERY PKT WT TYPE FIELD
                                //
                //* **************************************************************************************
                                //* Start Input Area to get firms details
                                //* **************************************************************************************
                                // // This is the main division class for input filed
                                //
                // Input Box Type and Ids
                                $inputType = 'dropdown';
                                //$inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
                                //
                                // This is the main class for input flied
                                $inputFieldClass = 'form-control text-center font-dark';
                                $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                $inputLabel = ''; // Display Label below the text box
                                $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $position = strpos($title, '|');
                                $inputTitle = substr($title, 0, $position);
                                //
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                // 
                                // Place Holder inside input box
                                $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $len = strlen($placeHolder);
                                $position = strpos($placeHolder, '|');
                                $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                $inputLabelDivText = substr($placeHolder, 0, $position);
                                $inputLabelBoxClass = 'hidden_box_dropdown';
                                //
                                // Place Holder in span outside input box
                                $spanPlaceHolderClass = '';
                                $spanPlaceHolder = '';
                                // 
                                // Query for drop down select options
                                $inputFieldDBQuery = "SELECT unit_type FROM units WHERE unit_own_id = '$_SESSION[sessionOwnerId]' AND unit_category = 'jewellery' order by unit_id asc";
                                $inputFieldDBOptionColumnValue = 'unit_type';
                                $inputFieldDBOptionColumnValueDisplay = 'unit_type';
                                $selectFieldSelectedColumn = 'unit_type';
                                $selectFieldSelected = 'GM';
                                // 
                                // For drop down select options
                                $selectOptionLabel = 'TYPE';
                                //
                                // Event Options
                                //
                // On Change Function
                                $inputOnChange = "";
                                $inputKeyUpFun = '';
                                $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                // 
                                //* **************************************************************************************
                                //* End Input Area 
                                //* **************************************************************************************
                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                //
                            }
                            ?>
                        </td>
                        <?php
                    } else {
                        $stockFormFieldHorizontalCounter++;
                    }
                    ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->
                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY NT WT FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                            <?php
                            $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                // FINE JEWELLERY NT WT TYPE FIELD
                                //
                //* **************************************************************************************
                                //* Start Input Area to get firms details
                                //* **************************************************************************************
                                // // This is the main division class for input filed
                                //
                // Input Box Type and Ids
                                $inputType = 'dropdown';
                                //$inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
                                //
                                // This is the main class for input flied
                                $inputFieldClass = 'form-control text-center font-dark';
                                $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;width:40px;';
                                $inputLabel = ''; // Display Label below the text box
                                $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $position = strpos($title, '|');
                                $inputTitle = substr($title, 0, $position);
                                //
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                // 
                                // Place Holder inside input box
                                $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $len = strlen($placeHolder);
                                $position = strpos($placeHolder, '|');
                                $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                $inputLabelDivText = substr($placeHolder, 0, $position);
                                $inputLabelBoxClass = 'hidden_box_dropdown';
                                //
                                // Place Holder in span outside input box
                                $spanPlaceHolderClass = '';
                                $spanPlaceHolder = '';
                                // 
                                // Query for drop down select options
                                $inputFieldDBQuery = "SELECT unit_type FROM units WHERE unit_own_id = '$_SESSION[sessionOwnerId]' AND unit_category = 'jewellery' order by unit_id asc";
                                $inputFieldDBOptionColumnValue = 'unit_type';
                                $inputFieldDBOptionColumnValueDisplay = 'unit_type';
                                $selectFieldSelectedColumn = 'unit_type';
                                $selectFieldSelected = 'GM';
                                // 
                                // For drop down select options
                                $selectOptionLabel = 'TYPE';
                                //
                                // Event Options
                                //
                // On Change Function
                                $inputOnChange = "";
                                $inputKeyUpFun = '';
                                $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                // 
                                //* **************************************************************************************
                                //* End Input Area 
                                //* **************************************************************************************
                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                //
                            }
                            ?>
                        </td>
                        <?php
                    } else {
                        $stockFormFieldHorizontalCounter++;
                    }
                    ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY FINE WT FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY FINAL FINE WT FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            //
                $inputGoogleSuggDivId = $inputFieldColumnName . '_google_div' . $prodCount;
                            $inputGoogleSuggDivClass = 'googleSuggestionDropdownDivClass';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputOnClick = "";
                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            $inputOnDoubleClickFun = 'var arrStockFormFieldSequence = ' . json_encode($arrStockFormFieldSequence) . '; '
                                    . 'getStockTransFFNWTDropdown("' . $inputGoogleSuggDivId . '", "' . sttr_final_fine_weight . '",  arrStockFormFieldSequence,"' . $prodCount . '","IN", "' . $documentRootBSlash . '",event.keyCode);';

                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY PURCHASE RATE FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            //
                            //
                $inputFieldDBQuery = "";
                            $inputFieldDBOptionColumnValue = '';
                            $inputFieldDBOptionColumnValueDisplay = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputGoogleSuggDivId = $inputFieldColumnName . '_google_div' . $prodCount;
                            $inputGoogleSuggDivClass = 'googleSuggestionDropdownDivClass';
                            $inputOnBlurFun = '';
                            $inputOnBlurFun = 'googleSuggestionDropdownBlank("' . $inputGoogleSuggDivId . '");'
                                    . ' stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputKeyUpFun = "var googleWhereCondColumns = 'AND met_rate_metal_name=\'' + document.getElementById('sttr_product_type').value + '\'';"
                                    . " googleSuggestionDropdown('metal_rates', 'met_rate_value|met_rate_metal_id', this.value, googleWhereCondColumns,'$inputFieldColumnName$prodCount', '$selectDropdownClass', event.keyCode, '$inputGoogleSuggDivId', '$inputGoogleSuggDivId')";
                            //
                            $inputOnChange = "";
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY TOTAL METAL AMT FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY PROD AMT DISC IN % FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                            <?php
                            $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                // FINE JEWELLERY PROD AMT DISC IN AMT FIELD
                                //
                //* **************************************************************************************
                                //* Start Input Area to get firms details
                                //* **************************************************************************************
                                // // This is the main division class for input filed
                                //
                // Input Box Type and Ids
                                $inputType = 'text';
                                //$inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
                                //
                                // This is the main class for input flied
                                $inputFieldClass = 'form-control text-center font-dark';
                                $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                $inputLabel = ''; // Display Label below the text box
                                $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $position = strpos($title, '|');
                                $inputTitle = substr($title, 0, $position);
                                //
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                // 
                                // Place Holder inside input box
                                $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $len = strlen($placeHolder);
                                $position = strpos($placeHolder, '|');
                                $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                $inputLabelDivText = substr($placeHolder, 0, $position);
                                $inputLabelBoxClass = 'hidden_box_dropdown';
                                //
                                // Place Holder in span outside input box
                                $spanPlaceHolderClass = '';
                                $spanPlaceHolder = '';
                                // 
                                $isNumOnly = 'Y';
                                //
                                // Event Options
                                //
                // On Change Function
                                $inputOnChange = "";
                                $inputKeyUpFun = '';
                                $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                // 
                                //* **************************************************************************************
                                //* End Input Area 
                                //* **************************************************************************************
                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                //
                            }
                            ?>
                        </td>
                        <?php
                    } else {
                        $stockFormFieldHorizontalCounter++;
                    }
                    ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY METAL VALUATION FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY CGST IN % FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                            <?php
                            $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                // FINE JEWELLERY CGST IN AMT FIELD
                                //
                //* **************************************************************************************
                                //* Start Input Area to get firms details
                                //* **************************************************************************************
                                // // This is the main division class for input filed
                                //
                // Input Box Type and Ids
                                $inputType = 'text';
                                //$inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
                                //
                                // This is the main class for input flied
                                $inputFieldClass = 'form-control text-center font-dark';
                                $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                $inputLabel = ''; // Display Label below the text box
                                $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $position = strpos($title, '|');
                                $inputTitle = substr($title, 0, $position);
                                //
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                // 
                                // Place Holder inside input box
                                $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $len = strlen($placeHolder);
                                $position = strpos($placeHolder, '|');
                                $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                $inputLabelDivText = substr($placeHolder, 0, $position);
                                $inputLabelBoxClass = 'hidden_box_dropdown';
                                //
                                // Place Holder in span outside input box
                                $spanPlaceHolderClass = '';
                                $spanPlaceHolder = '';
                                // 
                                $isNumOnly = 'Y';
                                //
                                // Event Options
                                //
                // On Change Function
                                $inputOnChange = "";
                                $inputKeyUpFun = '';
                                $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                // 
                                //* **************************************************************************************
                                //* End Input Area 
                                //* **************************************************************************************
                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                //
                            }
                            ?>
                        </td>
                        <?php
                    } else {
                        $stockFormFieldHorizontalCounter++;
                    }
                    ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY SGST IN % FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                            <?php
                            $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                // FINE JEWELLERY SGST IN AMT FIELD
                                //
                //* **************************************************************************************
                                //* Start Input Area to get firms details
                                //* **************************************************************************************
                                // // This is the main division class for input filed
                                //
                // Input Box Type and Ids
                                $inputType = 'text';
                                //$inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
                                //
                                // This is the main class for input flied
                                $inputFieldClass = 'form-control text-center font-dark';
                                $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                $inputLabel = ''; // Display Label below the text box
                                $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $position = strpos($title, '|');
                                $inputTitle = substr($title, 0, $position);
                                //
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                // 
                                // Place Holder inside input box
                                $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $len = strlen($placeHolder);
                                $position = strpos($placeHolder, '|');
                                $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                $inputLabelDivText = substr($placeHolder, 0, $position);
                                $inputLabelBoxClass = 'hidden_box_dropdown';
                                //
                                // Place Holder in span outside input box
                                $spanPlaceHolderClass = '';
                                $spanPlaceHolder = '';
                                // 
                                $isNumOnly = 'Y';
                                //
                                // Event Options
                                //
                // On Change Function
                                $inputOnChange = "";
                                $inputKeyUpFun = '';
                                $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                // 
                                //* **************************************************************************************
                                //* End Input Area 
                                //* **************************************************************************************
                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                //
                            }
                            ?>
                        </td>
                        <?php
                    } else {
                        $stockFormFieldHorizontalCounter++;
                    }
                    ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY IGST IN % FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                            <?php
                            $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                // FINE JEWELLERY IGST IN AMT FIELD
                                //
                //* **************************************************************************************
                                //* Start Input Area to get firms details
                                //* **************************************************************************************
                                // // This is the main division class for input filed
                                //
                // Input Box Type and Ids
                                $inputType = 'text';
                                //$inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
                                //
                                // This is the main class for input flied
                                $inputFieldClass = 'form-control text-center font-dark';
                                $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                $inputLabel = ''; // Display Label below the text box
                                $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $position = strpos($title, '|');
                                $inputTitle = substr($title, 0, $position);
                                //
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                // 
                                // Place Holder inside input box
                                $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $len = strlen($placeHolder);
                                $position = strpos($placeHolder, '|');
                                $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                $inputLabelDivText = substr($placeHolder, 0, $position);
                                $inputLabelBoxClass = 'hidden_box_dropdown';
                                //
                                // Place Holder in span outside input box
                                $spanPlaceHolderClass = '';
                                $spanPlaceHolder = '';
                                // 
                                $isNumOnly = 'Y';
                                //
                                // Event Options
                                //
                // On Change Function
                                $inputOnChange = "";
                                $inputKeyUpFun = '';
                                $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                // 
                                //* **************************************************************************************
                                //* End Input Area 
                                //* **************************************************************************************
                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                //
                            }
                            ?>
                        </td>
                        <?php
                    } else {
                        $stockFormFieldHorizontalCounter++;
                    }
                    ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="14">
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="center" valign="middle" colspan="2">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <?php
                                // FINE JEWELLERY ITEM NAME FIELD
                                $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                    ?>
                                    <td align="center" valign="middle" style="padding-right: 1px;">
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        // 
                                        // Input Box Type and Ids
                                        $inputType = 'text';
                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                        $inputLabel = ''; // Display Label below the text box
                                        $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $position = strpos($title, '|');
                                        $inputTitle = substr($title, 0, $position);
                                        //
                                        // This class is for Pencil Icon                                                           
                                        $inputIconClass = '';
                                        // 
                                        // Place Holder inside input box
                                        $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $len = strlen($placeHolder);
                                        $position = strpos($placeHolder, '|');
                                        $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                        $inputLabelDivText = substr($placeHolder, 0, $position);
                                        //
                                        // Place Holder in span outside input box
                                        $spanPlaceHolderClass = '';
                                        $spanPlaceHolder = '';
                                        // 
                                        $isAlphaNumWithSomeSpecialCharSpace = 'Y';
                                        //
                                        //
                            // Event Options
                                        //
                            // On Change Function
                                        $inputGoogleSuggDivId = $inputFieldColumnName . '_google_div' . $prodCount;
                                        $inputGoogleSuggDivClass = 'googleSuggestionDropdownDivClass';
                                        $inputOnBlurFun = 'googleSuggestionDropdownBlank("' . $inputGoogleSuggDivId . '");';
                                        $inputKeyUpFun = "var googleWhereCondColumns = 'AND itm_nm_category=\'' + document.getElementById('sttr_item_category$prodCount').value + '\''+' AND ' + 'itm_nm_metal=\'' + document.getElementById('sttr_product_type').value + '\'';"
                                                . " googleSuggestionDropdown('item_name', 'itm_nm_name', this.value, googleWhereCondColumns, '$inputFieldColumnName$prodCount', '$selectDropdownClass', event.keyCode, '$inputGoogleSuggDivId', '$inputGoogleSuggDivId')";
                                        //
                                        $inputOnChange = "";
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                        $inputMainClassButton = '';           // This is the main division for Button
                                        // 
                                        //* **************************************************************************************
                                        //* End Input Area 
                                        //* **************************************************************************************
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        //
                                        ?>    
                                    </td>
                                <?php } ?>
                                <!-- End code for 14th field in stock form. Here Sequence is '13'.    -->
                                <!-- Start code for field in stock form. Here Sequence is ''.  -->
                                <?php
                                // FINE JEWELLERY HSN FIELD
                                $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                    ?>
                                    <td align="center" valign="middle">
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        //
                            // Input Box Type and Ids
                                        $inputType = 'text';
                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'height:24px;width:40px;';
                                        $inputLabel = ''; // Display Label below the text box
                                        $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $position = strpos($title, '|');
                                        $inputTitle = substr($title, 0, $position);
                                        //
                                        // This class is for Pencil Icon                                                           
                                        $inputIconClass = '';
                                        // 
                                        // Place Holder inside input box
                                        $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $len = strlen($placeHolder);
                                        $position = strpos($placeHolder, '|');
                                        $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                        $inputLabelDivText = substr($placeHolder, 0, $position);
                                        //
                                        // Place Holder in span outside input box
                                        $spanPlaceHolderClass = '';
                                        $spanPlaceHolder = '';
                                        // 
                                        $isNumOnly = 'Y';
                                        //
                                        // Event Options
                                        //
                            // On Change Function
                                        $inputOnChange = "";
                                        $inputKeyUpFun = '';
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                        $inputMainClassButton = '';           // This is the main division for Button
                                        // 
                                        //* **************************************************************************************
                                        //* End Input Area 
                                        //* **************************************************************************************
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        //
                                        ?>
                                    </td>
                                <?php } ?>
                                <!-- End code for 14th field in stock form. Here Sequence is '13'.    -->
                            </tr>
                        </table>
                    </td>


                    <td align="center" valign="middle" colspan="5">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <?php
                                // FINE JEWELLERY PURITY FIELD
                                $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                    ?>
                                    <td align="center" valign="middle" style="padding-right: 1px;">
                                        <!-- Start code for field in stock form. Here Sequence is ''.  -->
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        //
                            // Input Box Type and Ids
                                        $inputType = 'text';
                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                        $inputLabel = ''; // Display Label below the text box
                                        $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $position = strpos($title, '|');
                                        $inputTitle = substr($title, 0, $position);
                                        //
                                        // This class is for Pencil Icon                                                           
                                        $inputIconClass = '';
                                        // 
                                        // Place Holder inside input box
                                        $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $len = strlen($placeHolder);
                                        $position = strpos($placeHolder, '|');
                                        $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                        $inputLabelDivText = substr($placeHolder, 0, $position);
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
                                        $inputGoogleSuggDivId = $inputFieldColumnName . '_google_div' . $prodCount;
                                        $inputGoogleSuggDivClass = 'googleSuggestionDropdownDivClass';
                                        $inputOnBlurFun = 'googleSuggestionDropdownBlank("' . $inputGoogleSuggDivId . '");'
                                                . ' stockTransCalcFunc("' . $prodCount . '","IN");';
                                        $inputKeyUpFun = "var googleWhereCondColumns = 'AND itm_tunch_metal_type=\'' + document.getElementById('sttr_product_type').value + '\'';"
                                                . " googleSuggestionDropdown('item_tunch', 'itm_tunch_value', this.value, googleWhereCondColumns,'$inputFieldColumnName$prodCount', '$selectDropdownClass', event.keyCode, '$inputGoogleSuggDivId', '$inputGoogleSuggDivId');"
                                                . " stockTransCalcFunc('$prodCount','IN');";
                                        $inputOnChange = '';
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                        $inputMainClassButton = '';           // This is the main division for Button
                                        // 
                                        //* **************************************************************************************
                                        //* End Input Area 
                                        //* **************************************************************************************
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        //
                                        ?>

                                    </td>
                                <?php } ?>
                                <!-- End code for 14th field in stock form. Here Sequence is '13'.    -->
                                <!-- Start code for field in stock form. Here Sequence is ''.  -->
                                <?php
                                // FINE JEWELLERY WASTAGE FIELD
                                $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                    ?>
                                    <td align="center" valign="middle" style="padding-right: 1px;">
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        //
                            // Input Box Type and Ids
                                        $inputType = 'text';
                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                        $inputLabel = ''; // Display Label below the text box
                                        $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $position = strpos($title, '|');
                                        $inputTitle = substr($title, 0, $position);
                                        //
                                        // This class is for Pencil Icon                                                           
                                        $inputIconClass = '';
                                        // 
                                        // Place Holder inside input box
                                        $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $len = strlen($placeHolder);
                                        $position = strpos($placeHolder, '|');
                                        $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                        $inputLabelDivText = substr($placeHolder, 0, $position);
                                        //
                                        // Place Holder in span outside input box
                                        $spanPlaceHolderClass = '';
                                        $spanPlaceHolder = '';
                                        // 
                                        $isNumOnly = 'Y';
                                        //
                                        // Event Options
                                        //
                            // On Change Function
                                        $inputOnChange = "";
                                        $inputKeyUpFun = '';
                                        $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                        $inputMainClassButton = '';           // This is the main division for Button
                                        // 
                                        //* **************************************************************************************
                                        //* End Input Area 
                                        //* **************************************************************************************
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        //
                                        ?>
                                    </td>
                                <?php } ?>
                                <!-- End code for 14th field in stock form. Here Sequence is '13'.    -->

                                <!-- Start code for field in stock form. Here Sequence is ''.  -->
                                <?php
                                // FINE JEWELLERY FINAL PURITY FIELD
                                $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                    ?>
                                    <td align="center" valign="middle" style="padding-right: 1px;">
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        //
                            // Input Box Type and Ids
                                        $inputType = 'text';
                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                        $inputLabel = ''; // Display Label below the text box
                                        $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $position = strpos($title, '|');
                                        $inputTitle = substr($title, 0, $position);
                                        //
                                        // This class is for Pencil Icon                                                           
                                        $inputIconClass = '';
                                        // 
                                        // Place Holder inside input box
                                        $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $len = strlen($placeHolder);
                                        $position = strpos($placeHolder, '|');
                                        $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                        $inputLabelDivText = substr($placeHolder, 0, $position);
                                        //
                                        // Place Holder in span outside input box
                                        $spanPlaceHolderClass = '';
                                        $spanPlaceHolder = '';
                                        // 
                                        $isNumOnly = 'Y';
                                        //
                                        // Event Options
                                        //
                            // On Change Function
                                        $inputOnChange = "";
                                        $inputKeyUpFun = '';
                                        $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                        $inputMainClassButton = '';           // This is the main division for Button
                                        // 
                                        //* **************************************************************************************
                                        //* End Input Area 
                                        //* **************************************************************************************
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        //
                                        ?>
                                    </td>
                                <?php } ?>
                                <!-- End code for field in stock form. Here Sequence is ''.     -->

                                <!-- Start code for field in stock form. Here Sequence is ''.  -->
                                <?php
                                // FINE JEWELLERY CUSTOMER WASTAGE IN % FIELD
                                $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                    ?>
                                    <td align="center" valign="middle" style="padding-right: 1px;">
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        //
                            // Input Box Type and Ids
                                        $inputType = 'text';
                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                        $inputLabel = ''; // Display Label below the text box
                                        $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $position = strpos($title, '|');
                                        $inputTitle = substr($title, 0, $position);
                                        //
                                        // This class is for Pencil Icon                                                           
                                        $inputIconClass = '';
                                        // 
                                        // Place Holder inside input box
                                        $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $len = strlen($placeHolder);
                                        $position = strpos($placeHolder, '|');
                                        $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                        $inputLabelDivText = substr($placeHolder, 0, $position);
                                        //
                                        // Place Holder in span outside input box
                                        $spanPlaceHolderClass = '';
                                        $spanPlaceHolder = '';
                                        // 
                                        $isNumOnly = 'Y';
                                        //
                                        // Event Options
                                        //
                            // On Change Function
                                        $inputOnChange = "";
                                        $inputKeyUpFun = '';
                                        $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");'
                                                . ' custWastgWeightValueAddCalcFunc("' . $prodCount . '");';
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                        $inputMainClassButton = '';           // This is the main division for Button
                                        // 
                                        //* **************************************************************************************
                                        //* End Input Area 
                                        //* **************************************************************************************
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        //
                                        ?>
                                    </td>
                                <?php } ?>
                                <!-- End code for field in stock form. Here Sequence is ''.     -->

                                <!-- Start code for field in stock form. Here Sequence is ''.  -->
                                <?php
                                // FINE JEWELLERY CUSTOMER WASTAGE WEIGHT FIELD
                                $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                    ?>
                                    <td align="center" valign="middle" style="padding-right: 1px;">
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        //
                            // Input Box Type and Ids
                                        $inputType = 'text';
                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                        $inputLabel = ''; // Display Label below the text box
                                        $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $position = strpos($title, '|');
                                        $inputTitle = substr($title, 0, $position);
                                        //
                                        // This class is for Pencil Icon                                                           
                                        $inputIconClass = '';
                                        // 
                                        // Place Holder inside input box
                                        $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $len = strlen($placeHolder);
                                        $position = strpos($placeHolder, '|');
                                        $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                        $inputLabelDivText = substr($placeHolder, 0, $position);
                                        //
                                        // Place Holder in span outside input box
                                        $spanPlaceHolderClass = '';
                                        $spanPlaceHolder = '';
                                        // 
                                        $isNumOnly = 'Y';
                                        //
                                        // Event Options
                                        //
                            // On Change Function
                                        $inputOnChange = "";
                                        $inputKeyUpFun = '';
                                        $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");'
                                                . ' custWastgValueAddCalcFunc("' . $prodCount . '");';
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                        $inputMainClassButton = '';           // This is the main division for Button
                                        // 
                                        //* **************************************************************************************
                                        //* End Input Area 
                                        //* **************************************************************************************
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        //
                                        ?>
                                    </td>
                                <?php } ?>
                                <!-- End code for field in stock form. Here Sequence is ''.     -->

                                <!-- Start code for field in stock form. Here Sequence is ''.  -->
                                <?php
                                // FINE JEWELLERY VALUE ADDED FIELD
                                $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                    ?>
                                    <td align="center" valign="middle" style="padding-right: 1px;">
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        //
                            // Input Box Type and Ids
                                        $inputType = 'text';
                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                        $inputLabel = ''; // Display Label below the text box
                                        $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $position = strpos($title, '|');
                                        $inputTitle = substr($title, 0, $position);
                                        //
                                        // This class is for Pencil Icon                                                           
                                        $inputIconClass = '';
                                        // 
                                        // Place Holder inside input box
                                        $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $len = strlen($placeHolder);
                                        $position = strpos($placeHolder, '|');
                                        $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                        $inputLabelDivText = substr($placeHolder, 0, $position);
                                        //
                                        // Place Holder in span outside input box
                                        $spanPlaceHolderClass = '';
                                        $spanPlaceHolder = '';
                                        // 
                                        $isNumOnly = 'Y';
                                        //
                                        // Event Options
                                        //
                            // On Change Function
                                        $inputOnChange = "";
                                        $inputKeyUpFun = '';
                                        $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                        $inputMainClassButton = '';           // This is the main division for Button
                                        // 
                                        //* **************************************************************************************
                                        //* End Input Area 
                                        //* **************************************************************************************
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        //
                                        ?>
                                    </td>
                                <?php } ?>
                                <!-- End code for field in stock form. Here Sequence is ''.     -->

                                <!-- Start code for field in stock form. Here Sequence is ''.  -->
                                <?php
                                // FINE JEWELLERY LAB CHARGES FIELD
                                $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                    ?>
                                    <td align="center" valign="middle" style="padding-right: 1px;">
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        //
                            // Input Box Type and Ids
                                        $inputType = 'text';
                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                        $inputLabel = ''; // Display Label below the text box
                                        $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $position = strpos($title, '|');
                                        $inputTitle = substr($title, 0, $position);
                                        //
                                        // This class is for Pencil Icon                                                           
                                        $inputIconClass = '';
                                        // 
                                        // Place Holder inside input box
                                        $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $len = strlen($placeHolder);
                                        $position = strpos($placeHolder, '|');
                                        $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                        $inputLabelDivText = substr($placeHolder, 0, $position);
                                        //
                                        // Place Holder in span outside input box
                                        $spanPlaceHolderClass = '';
                                        $spanPlaceHolder = '';
                                        // 
                                        $isNumOnly = 'Y';
                                        //
                                        // Event Options
                                        //
                            // On Change Function
                                        $inputOnChange = "";
                                        $inputKeyUpFun = '';
                                        $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                        $inputMainClassButton = '';           // This is the main division for Button
                                        //
                            $inputGoogleSuggDivId = $inputFieldColumnName . '_google_div' . $prodCount;
                                        $inputGoogleSuggDivClass = 'googleSuggestionDropdownDivClass';
                                        //
                                        $inputOnDoubleClickFun = 'getStockTransLabChargesDropdown("' . $inputGoogleSuggDivId . '", "' . sttr_lab_charges . '", "' . $prodCount . '","IN", "' . $documentRootBSlash . '",event.keyCode);';
                                        //
                                        // 
                                        //* **************************************************************************************
                                        //* End Input Area 
                                        //* **************************************************************************************
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        //
                                        ?>

                                        <?php
                                        $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                            // FINE JEWELLERY LAB CHARGES TYPE FIELD
                                            //
                            //* **************************************************************************************
                                            //* Start Input Area to get firms details
                                            //* **************************************************************************************
                                            // // This is the main division class for input filed
                                            //
                            // Input Box Type and Ids
                                            $inputType = 'dropdown';
                                            //$inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
                                            //
                                            // This is the main class for input flied
                                            $inputFieldClass = 'form-control text-center font-dark';
                                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                            $inputLabel = ''; // Display Label below the text box
                                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                            $position = strpos($title, '|');
                                            $inputTitle = substr($title, 0, $position);
                                            //
                                            // This class is for Pencil Icon                                                           
                                            $inputIconClass = '';
                                            // 
                                            // Place Holder inside input box
                                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                            $len = strlen($placeHolder);
                                            $position = strpos($placeHolder, '|');
                                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                            $inputLabelDivText = substr($placeHolder, 0, $position);
                                            $inputLabelBoxClass = 'hidden_box_dropdown';
                                            //
                                            // Place Holder in span outside input box
                                            $spanPlaceHolderClass = '';
                                            $spanPlaceHolder = '';
                                            // 
                                            // Query for drop down select options
                                            $inputFieldDBQuery = "SELECT unit_type FROM units WHERE unit_own_id = '$_SESSION[sessionOwnerId]' AND unit_category = 'jewellery' order by unit_id asc";
                                            $inputFieldDBOptionColumnValue = 'unit_type';
                                            $inputFieldDBOptionColumnValueDisplay = 'unit_type';
                                            $selectFieldSelectedColumn = 'unit_type';
                                            $selectFieldSelected = 'PP';
                                            // 
                                            // For drop down select options
                                            $selectOptionLabel = 'TYPE';
                                            //
                                            // Event Options
                                            //
                            // On Change Function
                                            $inputOnChange = "";
                                            $inputKeyUpFun = '';
                                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                            $inputDropDownCls = '';               // This is the main division class for drop down 
                                            $inputselDropDownCls = '';            // This is class for selection in drop down
                                            $inputMainClassButton = '';           // This is the main division for Button
                                            // 
                                            //* **************************************************************************************
                                            //* End Input Area 
                                            //* **************************************************************************************
                                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                            //
                                        }
                                        ?>
                                    </td>
                                    <?php
                                } else {
                                    $stockFormFieldHorizontalCounter++;
                                }
                                ?>
                                <!-- End code for field in stock form. Here Sequence is ''.     -->


                                <!-- Start code for field in stock form. Here Sequence is ''.  -->
                                <?php
                                // FINE JEWELLERY SELL FINAL FINAL WT FIELD
                                $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                    ?>
                                    <td align="center" valign="middle">
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        //
                            // Input Box Type and Ids
                                        $inputType = 'text';
                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                        $inputLabel = ''; // Display Label below the text box
                                        $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $position = strpos($title, '|');
                                        $inputTitle = substr($title, 0, $position);
                                        //
                                        // This class is for Pencil Icon                                                           
                                        $inputIconClass = '';
                                        // 
                                        // Place Holder inside input box
                                        $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $len = strlen($placeHolder);
                                        $position = strpos($placeHolder, '|');
                                        $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                        $inputLabelDivText = substr($placeHolder, 0, $position);
                                        //
                                        // Place Holder in span outside input box
                                        $spanPlaceHolderClass = '';
                                        $spanPlaceHolder = '';
                                        // 
                                        $isNumOnly = 'Y';
                                        //
                                        // Event Options
                                        //
                            // On Change Function
                                        $inputOnChange = "";
                                        $inputKeyUpFun = '';
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                        $inputMainClassButton = '';           // This is the main division for Button
                                        // 
                                        //* **************************************************************************************
                                        //* End Input Area 
                                        //* **************************************************************************************
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        //
                                        ?>
                                    </td>
                                <?php } ?>
                                <!-- End code for field in stock form. Here Sequence is ''.     -->

                            </tr>
                        </table>
                    </td>


                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY SELL RATE FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY TOTAL LAB AMT FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY LAB AMT DISC IN % FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>

                            <?php
                            $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                // FINE JEWELLERY LAB AMT DISC AMT FIELD
                                //
                //* **************************************************************************************
                                //* Start Input Area to get firms details
                                //* **************************************************************************************
                                // // This is the main division class for input filed
                                //
                // Input Box Type and Ids
                                $inputType = 'text';
                                //$inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
                                //
                                // This is the main class for input flied
                                $inputFieldClass = 'form-control text-center font-dark';
                                $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                $inputLabel = ''; // Display Label below the text box
                                $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $position = strpos($title, '|');
                                $inputTitle = substr($title, 0, $position);

                                //
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                // 
                                // Place Holder inside input box
                                $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $len = strlen($placeHolder);
                                $position = strpos($placeHolder, '|');
                                $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                $inputLabelDivText = substr($placeHolder, 0, $position);
                                $inputLabelBoxClass = 'hidden_box_dropdown';
                                //
                                // Place Holder in span outside input box
                                $spanPlaceHolderClass = '';
                                $spanPlaceHolder = '';
                                // 
                                $isNumOnly = 'Y';
                                //
                                // Event Options
                                //
                // On Change Function
                                $inputOnChange = "";
                                $inputKeyUpFun = '';
                                $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                // 
                                //* **************************************************************************************
                                //* End Input Area 
                                //* **************************************************************************************
                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                //
                            }
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY TOTAL LAB CHARGES FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY LAB CGST IN % FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>

                            <?php
                            $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                // FINE JEWELLERY LAB CGST AMT FIELD
                                //
                //* **************************************************************************************
                                //* Start Input Area to get firms details
                                //* **************************************************************************************
                                // // This is the main division class for input filed
                                //
                // Input Box Type and Ids
                                $inputType = 'text';
                                //$inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
                                //
                                // This is the main class for input flied
                                $inputFieldClass = 'form-control text-center font-dark';
                                $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                $inputLabel = ''; // Display Label below the text box
                                $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $position = strpos($title, '|');
                                $inputTitle = substr($title, 0, $position);
                                //
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                // 
                                // Place Holder inside input box
                                $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $len = strlen($placeHolder);
                                $position = strpos($placeHolder, '|');
                                $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                $inputLabelDivText = substr($placeHolder, 0, $position);
                                $inputLabelBoxClass = 'hidden_box_dropdown';
                                //
                                // Place Holder in span outside input box
                                $spanPlaceHolderClass = '';
                                $spanPlaceHolder = '';
                                // 
                                $isNumOnly = 'Y';
                                //
                                // Event Options
                                //
                // On Change Function
                                $inputOnChange = "";
                                $inputKeyUpFun = '';
                                $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                // 
                                //* **************************************************************************************
                                //* End Input Area 
                                //* **************************************************************************************
                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                //
                            }
                            ?>
                        </td>
                        <?php
                    } else {
                        $stockFormFieldHorizontalCounter++;
                    }
                    ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY LAB SGST IN % FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>

                            <?php
                            $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                // FINE JEWELLERY LAB SGST AMT FIELD
                                //
                //* **************************************************************************************
                                //* Start Input Area to get firms details
                                //* **************************************************************************************
                                // // This is the main division class for input filed
                                //
                // Input Box Type and Ids
                                $inputType = 'text';
                                //$inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
                                //
                                // This is the main class for input flied
                                $inputFieldClass = 'form-control text-center font-dark';
                                $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                $inputLabel = ''; // Display Label below the text box
                                $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $position = strpos($title, '|');
                                $inputTitle = substr($title, 0, $position);
                                //
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                // 
                                // Place Holder inside input box
                                $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $len = strlen($placeHolder);
                                $position = strpos($placeHolder, '|');
                                $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                $inputLabelDivText = substr($placeHolder, 0, $position);
                                $inputLabelBoxClass = 'hidden_box_dropdown';
                                //
                                // Place Holder in span outside input box
                                $spanPlaceHolderClass = '';
                                $spanPlaceHolder = '';
                                // 
                                $isNumOnly = 'Y';
                                //
                                // Event Options
                                //
                // On Change Function
                                $inputOnChange = "";
                                $inputKeyUpFun = '';
                                $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                // 
                                //* **************************************************************************************
                                //* End Input Area 
                                //* **************************************************************************************
                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                //
                            }
                            ?>
                        </td>
                        <?php
                    } else {
                        $stockFormFieldHorizontalCounter++;
                    }
                    ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY LAB IGST IN % FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'height:24px;width:30px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>


                            <?php
                            $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                // FINE JEWELLERY LAB IGST AMT FIELD
                                //
                //* **************************************************************************************
                                //* Start Input Area to get firms details
                                //* **************************************************************************************
                                // // This is the main division class for input filed
                                //
                // Input Box Type and Ids
                                $inputType = 'text';
                                //$inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
                                //
                                // This is the main class for input flied
                                $inputFieldClass = 'form-control text-center font-dark';
                                $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                $inputLabel = ''; // Display Label below the text box
                                $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $position = strpos($title, '|');
                                $inputTitle = substr($title, 0, $position);
                                //
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                // 
                                // Place Holder inside input box
                                $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $len = strlen($placeHolder);
                                $position = strpos($placeHolder, '|');
                                $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                $inputLabelDivText = substr($placeHolder, 0, $position);
                                $inputLabelBoxClass = 'hidden_box_dropdown';
                                //
                                // Place Holder in span outside input box
                                $spanPlaceHolderClass = '';
                                $spanPlaceHolder = '';
                                // 
                                $isNumOnly = 'Y';
                                //
                                // Event Options
                                //
                // On Change Function
                                $inputOnChange = "";
                                $inputKeyUpFun = '';
                                $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                // 
                                //* **************************************************************************************
                                //* End Input Area 
                                //* **************************************************************************************
                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                //
                            }
                            ?>


                        </td>
                        <?php
                    } else {
                        $stockFormFieldHorizontalCounter++;
                    }
                    ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->
                </tr>
            </table>
        </td>
    </tr>


    <tr>
        <td colspan="14">
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>

                    <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                    <?php
                    // FINE JEWELLERY SIZE FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" style="padding-right: 1px;">
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                            // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isAlphaOnlyWithSpecialChar = 'Y';
                            //
                            //
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for 14th field in stock form. Here Sequence is '13'.    -->
                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY SHAPE FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" style="padding-right: 1px;">
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                            // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isAlphaOnly = 'Y';
                            //
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for 14th field in stock form. Here Sequence is '13'.    -->

                    <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                    <?php
                    // FINE JEWELLERY LENGTH FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" style="padding-right: 1px;">
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                            // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for 14th field in stock form. Here Sequence is '13'.    -->
                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY WIDTH FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" style="padding-right: 1px;">
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                            // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for 14th field in stock form. Here Sequence is '13'.    -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY COLOR FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" style="padding-right: 1px;">
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                            // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isAlphaOnly = 'Y';
                            //
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY CLARITY FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" style="padding-right: 1px;">
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                            // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->


                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY MAKING CHARGES FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                            // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                            <?php
                            $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                // FINE JEWELLERY MAKING CHARGES TYPE FIELD
                                //
                            //* **************************************************************************************
                                //* Start Input Area to get firms details
                                //* **************************************************************************************
                                // // This is the main division class for input filed
                                //
                            // Input Box Type and Ids
                                $inputType = 'dropdown';
                                //$inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
                                //
                                // This is the main class for input flied
                                $inputFieldClass = 'form-control text-center font-dark';
                                $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                $inputLabel = ''; // Display Label below the text box
                                $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $position = strpos($title, '|');
                                $inputTitle = substr($title, 0, $position);
                                //
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                // 
                                // Place Holder inside input box
                                $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $len = strlen($placeHolder);
                                $position = strpos($placeHolder, '|');
                                $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                $inputLabelDivText = substr($placeHolder, 0, $position);
                                $inputLabelBoxClass = 'hidden_box_dropdown';
                                //
                                // Place Holder in span outside input box
                                $spanPlaceHolderClass = '';
                                $spanPlaceHolder = '';
                                // 
                                // Query for drop down select options
                                $inputFieldDBQuery = "SELECT unit_type FROM units WHERE unit_own_id = '$_SESSION[sessionOwnerId]' AND unit_category = 'jewellery' order by unit_id asc";
                                $inputFieldDBOptionColumnValue = 'unit_type';
                                $inputFieldDBOptionColumnValueDisplay = 'unit_type';
                                $selectFieldSelectedColumn = 'unit_type';
                                $selectFieldSelected = 'PP';
                                // 
                                // For drop down select options
                                $selectOptionLabel = 'TYPE';
                                //
                                // Event Options
                                //
                            // On Change Function
                                $inputOnChange = "";
                                $inputKeyUpFun = '';
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                // 
                                //* **************************************************************************************
                                //* End Input Area 
                                //* **************************************************************************************
                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                //
                            }
                            ?>
                        </td>
                        <?php
                    } else {
                        $stockFormFieldHorizontalCounter++;
                    }
                    ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->
                    <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                    <?php
                    // FINE JEWELLERY OTHER INFO FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" style="padding-right: 1px;">
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                            // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
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
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY TAXABLE AMOUNT FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                            // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;font-weight:bold;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY TAX FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                            // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                            <?php
                            $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                                // FINE JEWELLERY OTHER TAX FIELD
                                //
                            //* **************************************************************************************
                                //* Start Input Area to get firms details
                                //* **************************************************************************************
                                // // This is the main division class for input filed
                                //
                            // Input Box Type and Ids
                                $inputType = 'text';
                                //$inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
                                //
                                // This is the main class for input flied
                                $inputFieldClass = 'form-control text-center font-dark';
                                $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;';
                                $inputLabel = ''; // Display Label below the text box
                                $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $position = strpos($title, '|');
                                $inputTitle = substr($title, 0, $position);
                                //
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                // 
                                // Place Holder inside input box
                                $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                $len = strlen($placeHolder);
                                $position = strpos($placeHolder, '|');
                                $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                $inputLabelDivText = substr($placeHolder, 0, $position);
                                $inputLabelBoxClass = 'hidden_box_dropdown';
                                //
                                // Place Holder in span outside input box
                                $spanPlaceHolderClass = '';
                                $spanPlaceHolder = '';
                                // 
                                $isNumOnly = 'Y';
                                //
                                // Event Options
                                //
                            // On Change Function
                                $inputOnChange = "";
                                $inputKeyUpFun = '';
                                $inputOnBlurFun = 'stockTransCalcFunc("' . $prodCount . '","IN");';
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                // 
                                //* **************************************************************************************
                                //* End Input Area 
                                //* **************************************************************************************
                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                //
                            }
                            ?>
                        </td>
                        <?php
                    } else {
                        $stockFormFieldHorizontalCounter++;
                    }
                    ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                    <?php
                    // FINE JEWELLERY TOTAL TAX FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" >
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                            // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;font-weight:bold;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>


                        </td>
                    <?php } ?>
                    <!-- End code for field in stock form. Here Sequence is ''.     -->


                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" valign="middle" colspan="11">
            &nbsp;
        </td>
        <td align="center" valign="middle" colspan="3">
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <?php
                    // FINE JEWELLERY FINAL VALUATION FIELD
                    $inputFieldColumnName = $arrStockFormFieldHorizontal[$stockFormFieldHorizontalCounter++];
//                    echo $inputFieldColumnName . ' - ';
//                    echo $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                    if ($inputFieldColumnName == $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence)]) {
                        ?>
                        <td align="center" valign="middle" style="padding-right: 1px;">
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            $inputDivId = 'sttr_final_valuation_div';
                            $inputDivClass = 'input-icon';
                            //
                            // Input Box Type and Ids
                            $inputType = 'text';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'form-control text-center font-dark';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:30px;font-weight:bold;font-size:18px;';
                            $inputLabel = ''; // Display Label below the text box
                            $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $position = strpos($title, '|');
                            $inputTitle = substr($title, 0, $position);
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = 'fa fa-inr';
                            // 
                            // Place Holder inside input box
                            $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                            $len = strlen($placeHolder);
                            $position = strpos($placeHolder, '|');
                            $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                            $inputLabelDivText = substr($placeHolder, 0, $position);
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            $isNumOnly = 'Y';
                            //
                            // Event Options
                            //
                            // On Change Function
                            $inputOnChange = "";
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            //* **************************************************************************************
                            //* End Input Area 
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>
                            <!--                                                                    -->
                            <!-- Start code for 12th field in stock form. Here Sequence is '11'.    -->





                            <!-- End code for 12th field in stock form. Here Sequence is '11'.      -->
                            <!--                                                                    -->
                        </td>
                    <?php } ?>
                    <td align="right" valign="middle">

                        <?php if ($prodCount > 0) { ?>
                            <i class="fa fa-minus-square" style="font-size:20px;margin-top: 6px;color: #D00000;cursor: pointer;"
                               onclick='var arrStockFormFieldSequence = <?php echo json_encode($arrStockFormFieldSequence); ?>;
                                           var arrStockFormFieldHorizontal = <?php echo json_encode($arrStockFormFieldHorizontal); ?>;
                                           var arrStockFormFieldMandatory = <?php echo json_encode($arrStockFormFieldMandatory); ?>;
                                           var arrStockFormFieldValidationMessage = <?php echo json_encode($arrStockFormFieldValidationMessage); ?>;
                                           var arrStockFormFieldTitle = <?php echo json_encode($arrStockFormFieldTitle); ?>;
                                           var arrStockFormFieldSize = <?php echo json_encode($arrStockFormFieldSize); ?>;
                                           var arrStockFormFieldYesNoKeys = <?php echo '["' . implode('", "', array_keys($arrStockFormFieldYesNo)) . '"]'; ?>;
                                           var arrStockFormFieldYesNoValues = <?php echo '["' . implode('", "', $arrStockFormFieldYesNo) . '"]'; ?>;
                                           //
                                           closeFormFunc_2_6_72("<?php echo $prodCount; ?>", "omStockTransFormSubDiv",
                                                   arrStockFormFieldSequence, arrStockFormFieldHorizontal,
                                                   arrStockFormFieldMandatory, arrStockFormFieldValidationMessage,
                                                   arrStockFormFieldTitle, arrStockFormFieldSize,
                                                   arrStockFormFieldYesNoKeys,
                                                   arrStockFormFieldYesNoValues,
                                                   "<?php echo $panelName; ?>");'></i>
                           <?php } else { ?>
                            <i class="fa fa-minus-square" style="font-size:20px;margin-top: 6px;color: #D00000;cursor: pointer;visibility: hidden;"></i>
                        <?php } ?>
                        &nbsp;
                        <i class="fa fa-plus-square" style="font-size:20px;margin-top: 6px;color: #00A000;cursor: pointer;"
                           onclick='var arrStockFormFieldSequence = <?php echo json_encode($arrStockFormFieldSequence); ?>;
                                   var arrStockFormFieldHorizontal = <?php echo json_encode($arrStockFormFieldHorizontal); ?>;
                                   var arrStockFormFieldMandatory = <?php echo json_encode($arrStockFormFieldMandatory); ?>;
                                   var arrStockFormFieldValidationMessage = <?php echo json_encode($arrStockFormFieldValidationMessage); ?>;
                                   var arrStockFormFieldTitle = <?php echo json_encode($arrStockFormFieldTitle); ?>;
                                   var arrStockFormFieldSize = <?php echo json_encode($arrStockFormFieldSize); ?>;
                                   var arrStockFormFieldYesNoKeys = <?php echo '["' . implode('", "', array_keys($arrStockFormFieldYesNo)) . '"]'; ?>;
                                   var arrStockFormFieldYesNoValues = <?php echo '["' . implode('", "', $arrStockFormFieldYesNo) . '"]'; ?>;
                                   var stockFormFieldSkipArray = <?php echo json_encode($stockFormFieldSkipArray); ?>;
                                   //
                                   addFormFunc_2_6_72("<?php echo $prodCount + 1; ?>", "omStockTransFormSubDiv",
                                           arrStockFormFieldSequence, arrStockFormFieldHorizontal,
                                           arrStockFormFieldMandatory, arrStockFormFieldValidationMessage,
                                           arrStockFormFieldTitle, arrStockFormFieldSize,
                                           arrStockFormFieldYesNoKeys,
                                           arrStockFormFieldYesNoValues,
                                           stockFormFieldSkipArray,
                                           "<?php echo $panelName; ?>");'></i>
                    </td>

                </tr> 
            </table>
        </td>
    </tr>
</table>

