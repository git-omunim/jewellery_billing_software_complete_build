<?php
/*
 * **************************************************************************************
 * @tutorial: Univeral Form on Add Stock
 * **************************************************************************************
 *
 * Created on on 25 April, 2018 6:00:06 PM
 * 
 * 
 * @FileName: omUniversalForm.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 * Copyright 2018 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
// **********************************************************************************************//
// Start Code for Global Files
// **********************************************************************************************//
// Mandatory Files
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
//
include_once 'ommpfndv.php';
// Staff Access Files
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
// **********************************************************************************************//
// End Code for Global Files
// **********************************************************************************************//
//
// Start code to get Variables
// PANEL NAME
if ($panelName == '')
    $panelName = $_GET['panelName'];

// INDICATOR @PRIYANKA-12MAY18
if ($sttr_indicator == '')
    $sttr_indicator = $_REQUEST['indicator'];

// TRANSACTION TYPE @PRIYANKA-12MAY18
if ($sttr_transaction_type == '')
    $sttr_transaction_type = $_REQUEST['transactionType'];

// STOCK TYPE @PRIYANKA-12MAY18
if ($sttr_stock_type == '')
    $sttr_stock_type = $_REQUEST['stockType'];

// OPERATION @PRIYANKA-12MAY18
$operation = $_REQUEST['operation'];

// ID @PRIYANKA-12MAY18
if ($sttrId == '')
    $sttrId = $_REQUEST['sttrId'];

// End code to get Variables

$searchValue = '~';
$cookieName = 'om_google_sugg_srchstr';
$cookieExpTime = 1 * 1 * 1 * 1 + time();
setcookie($cookieName, $searchValue, $cookieExpTime, "/");
//
// **********************************************************************************************//
// Start code to get panel values 'Yes' or 'No' from omindicator table to display Stock Form
// **********************************************************************************************//
//
$queryOmindiStockFormPanel = "SELECT omin_option,omin_value,omin_input_field,omin_field_mandatory,omin_field_horizontal,omin_input_field_label FROM omindicators where omin_panel = '$panelName' order by omin_id asc";
$resOmindiStockFormPanel = mysqli_query($conn, $queryOmindiStockFormPanel);
//
$resOmindiStockFormPanelCount = mysqli_num_rows($resOmindiStockFormPanel);
//
if ($resOmindiStockFormPanelCount > 0) {
    //
    $loopCounter = 0;
    $loopMandatoryFieldsCounter = 0;
    //
    while ($rowStockFormFields = mysqli_fetch_array($resOmindiStockFormPanel)) {
        //        
        // From this array find the sequence in order of enter key work or what we will the next field to go
        $arrStockFormFieldSequence[$loopCounter] = $rowStockFormFields['omin_option'];
        //
        // From this array find the horizontal order, which will to design the form
        if ($rowStockFormFields['omin_field_horizontal'] != '' && $rowStockFormFields['omin_field_horizontal'] != NULL)
            $arrStockFormFieldHorizontal[$loopCounter] = $rowStockFormFields['omin_field_horizontal'];
        //
        if ($rowStockFormFields['omin_field_mandatory'] == 'Y') {
            // Array to find the mandatory field to check when submit the form, on form subition only it will check
            $arrStockFormFieldMandatory[$loopMandatoryFieldsCounter] = $rowStockFormFields['omin_option'];
            $arrStockFormFieldValidationMessage[$loopMandatoryFieldsCounter] = $rowStockFormFields['omin_input_field_label'];
            $loopMandatoryFieldsCounter++;
        }
        //
        // Title Messages
        $arrStockFormFieldTitle[$loopCounter] = $rowStockFormFields['omin_input_field_label'];
        //
        // Field Size
        $arrStockFormFieldSize[$loopCounter] = $rowStockFormFields['omin_input_field'];
        //
        // Array to find the field we need to add in form or not
        $arrStockFormFieldYesNo[$rowStockFormFields['omin_option']] = $rowStockFormFields['omin_value'];
        //
        $loopCounter++;
    }
}
// **********************************************************************************************//
// End code to get panel values 'Yes' or 'No' from omindicator table to display Stock Form
// **********************************************************************************************//
// START CODE TO GET PROD ENTRY DETAILS @PRIYANKA-12MAY18
if ($operation != 'update') {
    $prodEnrtyDetailsQuery = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
            . "and sttr_indicator = '$sttr_indicator' and sttr_transaction_type = '$sttr_transaction_type' "
            . "and sttr_stock_type = '$sttr_stock_type' order by sttr_id desc LIMIT 0,1";
} else {
    $prodEnrtyDetailsQuery = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' AND "
            . "sttr_id = '$sttrId'";
}

//echo '$prodEnrtyDetailsQuery == '.$prodEnrtyDetailsQuery;

$resProdEnrtyDetailsQuery = mysqli_query($conn, $prodEnrtyDetailsQuery);
$prodEnrtyDetailsNoOfRows = mysqli_num_rows($resProdEnrtyDetailsQuery);

if ($prodEnrtyDetailsNoOfRows > 0) {
    $prodEnrtyDetailsArray = mysqli_fetch_assoc($resProdEnrtyDetailsQuery);
}
// END CODE TO GET PROD ENTRY DETAILS @PRIYANKA-12MAY18
//print_r($arrStockFormFieldHorizontal);
//echo '<br/>';
//print_r($arrStockFormFieldSequence);
// echo '$operation == '.$operation;

if ($operation != 'update') {
    $stockFormFieldSkipArray = array("sttr_gs_weight", "sttr_pkt_weight", "sttr_nt_weight", "sttr_fine_weight", "sttr_final_fine_weight", "sttr_sell_final_fine_weight",
        "sttr_cust_wastage_wt", "sttr_value_added", "sttr_metal_amt", "sttr_valuation", "sttr_total_lab_charges", "sttr_total_lab_amt",
        "sttr_lab_discount_amt", "sttr_metal_discount_amt", "sttr_mkg_cgst_chrg", "sttr_mkg_sgst_chrg", "sttr_mkg_igst_chrg",
        "sttr_tot_price_cgst_chrg", "sttr_tot_price_sgst_chrg", "sttr_tot_price_igst_chrg", "sttr_other_tax_amt", "sttr_tot_tax",
        "sttr_final_taxable_amt", "sttr_final_valuation");
} else {
    $stockFormFieldSkipArray = array();
}
?>
<style>
    .border{
        border:1px solid black;
    }
    ::-moz-placeholder {
        font-size: 12px;
    }
</style>
<form name="add_item" id="add_item"
      enctype="multipart/form-data" method="post"
      action="<?php echo $documentRootBSlash; ?>/include/php/omadformdata_2_6_72.php"
      onsubmit='var arrStockFormFieldMandatory = <?php echo json_encode($arrStockFormFieldMandatory); ?>;
              var arrStockFormFieldValidationMessage = <?php echo json_encode($arrStockFormFieldValidationMessage); ?>;
              return stockTransValidationFunc(arrStockFormFieldMandatory, arrStockFormFieldValidationMessage, document.getElementById("sttr_noofprod").value);'> 
          <?php
//
// START CODE TO INCLUDE FOR JS CALCULATIONS @PRIYANKA-03MAY18
          include 'ogiartdv.php';
// END CODE TO INCLUDE FOR JS CALCULATIONS @PRIYANKA-03MAY18
          ?>
    <div class="row ">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET -->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-dark bold uppercase"> ADD JEWELLERY PANEL</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <img src="<?php echo $documentRoot; ?>/images/spacer.gif" onload="datepicker('<?php echo $panel; ?>');
                            document.getElementById('sttr_firm_id').focus();"/>
                    <div class="container"> 
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="95%" 
                               style="margin-left:-30px;">
                            <tr>
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <?php if ($arrStockFormFieldYesNo['sttr_add_date'] == 'Y') { ?>
                                    <td align="center" valign="middle">
                                        <div class="text-center font-dark" ><strong>BILL DATE</strong></div>
                                    </td>
                                <?php } ?>
                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <?php if ($arrStockFormFieldYesNo['sttr_firm_id'] == 'Y') { ?>
                                    <td align="center" valign="middle">
                                        <div class="text-center font-dark" ><strong>FIRM</strong></div>
                                    </td>
                                <?php } ?>
                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <?php if ($arrStockFormFieldYesNo['sttr_product_type'] == 'Y') { ?>
                                    <td align="center" valign="middle">
                                        <div class="text-center font-dark" ><strong>PRODUCT TYPE</strong></div>
                                    </td>
                                <?php } ?>
                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <?php if ($arrStockFormFieldYesNo['sttr_item_pre_id'] == 'Y') { ?>
                                    <td align="center" valign="middle">
                                        <div class="text-center font-dark" ><strong>PROD CODE</strong></div>
                                    </td>
                                <?php } ?>

                                <td align="center" valign="middle">
                                    <?php if ($arrStockFormFieldYesNo['sttr_item_id'] == 'Y') { ?>
                                        <div class="text-center font-dark" ><strong>PROD ID</strong></div>
                                    <?php } ?>
                                </td>

                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <?php if ($arrStockFormFieldYesNo['sttr_brand_id'] == 'Y') { ?>
                                    <td align="center" valign="middle">
                                        <div class="text-center font-dark" ><strong>BRAND NAME</strong></div>
                                    </td>
                                <?php } ?>
                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <?php if ($arrStockFormFieldYesNo['sttr_barcode'] == 'Y') { ?>
                                    <td align="center" valign="middle">
                                        <div class="text-center font-dark" ><strong>BAR-CODE</strong></div>
                                    </td>
                                <?php } ?>
                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <?php if ($arrStockFormFieldYesNo['sttr_account_id'] == 'Y') { ?>
                                    <td align="center" valign="middle">
                                        <div class="text-center font-dark" ><strong>ACCOUNTS</strong></div>
                                    </td>
                                <?php } ?>
                                <!--                                                                  -->
                            </tr>
                            <tr>
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->

                                <td align="center" valign="middle">
                                    <?php if ($arrStockFormFieldYesNo['sttr_add_date'] == 'Y') { ?>

                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        //
                                        $inputMainDivClass = '';
                                        $inputMainDivStyle = '';
                                        $inputDivId = 'BillDateDiv';
                                        $inputDivClass = 'input-group date datepicker';
                                        $inputId = '';
                                        //
                                        // Input Box Type and Ids
                                        // Ids will send from input file omInputField
                                        $inputSpanId = 'sttr_add_date_span';
                                        $inputFieldColumnName = 'sttr_add_date';
                                        $inputType = 'datepicker';
                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center';
                                        $inputStyle = 'height:24px;border-color:#000;';
                                        $inputLabel = ''; // Display Label below the text box
                                        $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $position = strpos($title, '|');
                                        $inputTitle = substr($title, 0, $position);
                                        $selectDropdownClass = '';
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
                                        //
                                        //
                                        // Event Options
                                        //
                                        // On Change Function
                                        //
                                        $inputGoogleSuggDivId = '';
                                        $inputGoogleSuggDivClass = '';
                                        $inputOnBlurFun = '';
                                        //$inputKeyUpFun = "googleSuggestionFunc(this.value,$inputFieldColumnName,'item_name','itm_nm_name',$selectDropdownClass,'',$inputFieldColumnName)";
                                        $inputKeyUpFun = "";
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

                                    <?php } ?>
                                </td>

                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->

                                <td align="center" valign="middle">
                                    <!-- Start code for second field in stock form. Here Sequence is '1'.  -->
                                    <?php if ($arrStockFormFieldYesNo['sttr_firm_id'] == 'Y') { ?>
                                        <?php
                                        //
                                        $inputFieldColumnName = 'sttr_firm_id';
                                        $inputId = '';
                                        //
                                        include 'omInputFieldFirm.php';
                                        //
                                        ?>
                                    <?php } ?>
                                    <!-- End code for second field in stock form. Here Sequence is '1'.   -->
                                </td>

                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->

                                <td align="center" valign="middle">
                                    <!-- Start code for field in stock form. Here Sequence is ''.  -->
                                    <?php
                                    $inputFieldColumnName = 'sttr_product_type';
                                    if ($arrStockFormFieldYesNo[$inputFieldColumnName] == 'Y') {
                                        ?>
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        $inputMainDivClass = '';
                                        $inputMainDivStyle = '';
                                        $inputDivClass = '';
                                        //
                                        // Input Box Type and Ids
                                        $inputType = 'text';
                                        $inputFieldDBQuery = '';
                                        $inputFieldValue = '';
                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;border-color:#666;';
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

                                        // Place Holder in span outside input box
                                        $spanPlaceHolderClass = '';
                                        $spanPlaceHolder = '';
                                        // 
                                        //
                                        //
                                        // Event Options
                                        //
                                        // On Change Function
                                        $inputGoogleSuggDivId = $inputFieldColumnName . '_google_div';
                                        $inputGoogleSuggDivClass = 'googleSuggestionDropdownDivClass';
                                        $selectDropdownClass = 'googleSuggestionDivClass';
                                        $inputOnBlurFun = 'googleSuggestionDropdownBlank("' . $inputGoogleSuggDivId . '");'
                                                . 'onChangeFunction("met_rate_own_id","sttr_product_type","sttr_product_purchase_rate","metal_rates","met_rate_value","met_rate_value","met_rate_metal_name")';
                                        $inputKeyUpFun = "var googleWhereCondColumns = 'AND itm_nm_type=\'' + 'Jewellery' + '\'';"
                                                . " googleSuggestionDropdown('item_name', 'itm_nm_metal', this.value, googleWhereCondColumns,'$inputFieldColumnName$prodCount', '$selectDropdownClass', event.keyCode, '$inputGoogleSuggDivId', '$inputGoogleSuggDivId');";
//                                                    . "onChangeFunction('met_rate_own_id','sttr_product_type','sttr_product_purchase_rate','metal_rates','met_rate_value','met_rate_value','met_rate_metal_name')";

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
                                    <?php } ?>
                                    <!-- End code for field in stock form. Here Sequence is ''.     -->

                                </td>

                                <!--                                                                  -->

                                <td align="center" valign="middle">
                                    <!-- Start code for third field in stock form. Here Sequence is '2'.  -->
                                    <?php
                                    $inputFieldColumnName = 'sttr_item_pre_id';
                                    if ($arrStockFormFieldYesNo['sttr_item_pre_id'] == 'Y') {
                                        ?>
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        $inputMainDivClass = '';
                                        $inputMainDivStyle = '';
                                        $inputDivClass = '';
                                        //
                                        // Input Box Type and Ids
                                        $inputType = 'text';
                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;border-color:#666;';
                                        //"inputStyle".$inputStyle;

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
                                        $selectDropdownClass = 'googleSuggestionDivClass';
                                        $inputOnBlurFun = 'googleSuggestionDropdownBlank("' . $inputGoogleSuggDivId . '");';
//                                                . 'onChangeFunction("sttr_owner_id",this.value,"sttr_item_id","stock_transaction","COALESCE(MAX(sttr_item_id),0)+1 as sttr_item_max_id","sttr_item_max_id","sttr_item_pre_id");';
                                        $inputKeyUpFun = "var googleWhereCondColumns = 'AND itm_nm_metal=\'' + document.getElementById('sttr_product_type').value + '\'';"
                                                . " googleSuggestionDropdown('item_name', 'itm_nm_code|itm_nm_category', this.value, googleWhereCondColumns,'$inputFieldColumnName$prodCount', '$selectDropdownClass', event.keyCode, '$inputGoogleSuggDivId', '$inputGoogleSuggDivId');"
                                                . " onChangeFunction('sttr_owner_id','sttr_item_pre_id','sttr_item_id','stock_transaction','COALESCE(MAX(sttr_item_id),0)+1 as sttr_item_max_id','sttr_item_max_id','sttr_item_pre_id');";

                                        //$inputOnChange = 'onChangeFunction("sttr_owner_id",this.value,"sttr_item_id","stock_transaction","COALESCE(MAX(sttr_item_id),0)+1 as sttr_item_max_id","sttr_item_max_id","sttr_item_pre_id");';
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
                                    <?php } ?>
                                    <!-- End code for third field in stock form. Here Sequence is '2'.     -->
                                </td>
                                <td align="center" valign="middle">
                                    <?php
                                    $inputFieldColumnName = 'sttr_item_id';
                                    if ($arrStockFormFieldYesNo['sttr_item_id'] == 'Y') {
                                        ?>
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        $inputMainDivClass = '';
                                        $inputMainDivStyle = '';
                                        $inputDivClass = '';
                                        //
                                        // Input Box Type and Ids
                                        $inputType = 'text';

                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;border-color:#666;';
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
                                        //if($operation != 'update') {
//                                        $inputFieldDBQuery = "SELECT MAX(sttr_item_id)+1 as sttr_item_max_id FROM stock_transaction WHERE "
//                                                            . "sttr_owner_id = '$_SESSION[sessionOwnerId]' AND sttr_item_pre_id='$lastEnrtyDetailsArray[sttr_item_pre_id]'";
//                                        $inputFieldDBOptionColumnValue = 'sttr_item_max_id';
//                                        $inputFieldDBOptionColumnValueDisplay = 'sttr_item_max_id';
                                        //echo '$inputFieldDBQuery:' . $inputFieldDBQuery;
                                        $selectFieldSelectedColumn = '';
                                        $selectFieldSelected = '';
                                        //}
                                        //
                                        // Event Options
                                        //
                                        // On Change Function
                                        $inputOnChange = "";
                                        $inputKeyUpFun = '';
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';                                                // This is class for selection in drop down
                                        $inputMainClassButton = '';                                              // This is the main division for Button
                                        // 
                                        //* **************************************************************************************
                                        //* End Input Area 
                                        //* **************************************************************************************
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        //
                                        ?>
                                    <?php } ?>
                                </td>


                                <td align="center" valign="middle">
                                    <?php
                                    $inputFieldColumnName = 'sttr_brand_id';
                                    if ($arrStockFormFieldYesNo['sttr_brand_id'] == 'Y') {
                                        ?>
                                        <!-- Start code for fourth field in stock form. Here Sequence is '3'.  -->
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        $inputMainDivClass = '';
                                        $inputMainDivStyle = '';
                                        $inputDivClass = '';
                                        //
                                        // Input Box Type and Ids
                                        $inputType = 'text';

                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;border-color:#666;';
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
                                        $inputselDropDownCls = '';                                                // This is class for selection in drop down
                                        $inputMainClassButton = '';                                              // This is the main division for Button
                                        // 
                                        //* **************************************************************************************
                                        //* End Input Area 
                                        //* **************************************************************************************
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        //
                                        ?>
                                    <?php } ?>
                                </td>
                                <td align="center" valign="middle">
                                    <?php
                                    $inputFieldColumnName = 'sttr_barcode';
                                    if ($arrStockFormFieldYesNo['sttr_barcode'] == 'Y') {
                                        ?>
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        $inputMainDivClass = '';
                                        $inputMainDivStyle = '';
                                        $inputDivClass = '';
                                        //
                                        // Input Box Type and Ids
                                        $inputType = 'text';

                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;border-color:#666;';
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
                                        $inputselDropDownCls = '';                                                // This is class for selection in drop down
                                        $inputMainClassButton = '';                                              // This is the main division for Button
                                        // 
                                        //* **************************************************************************************
                                        //* End Input Area 
                                        //* **************************************************************************************
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        //
                                        ?>
                                    </td>
                                <?php } ?>
                                <!--                                                                  -->
                                <td align="center" valign="middle">
                                    <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                    <?php if ($arrStockFormFieldYesNo['sttr_account_id'] == 'Y') { ?>


                                        <?php
                                        //
                                        $inputMainDivId = 'sttr_account_id';
                                        $inputSelectedAccountId = 'sttr_account_id';
                                        $inputSelectedAccountName = "'Purchase Accounts'";
                                        $selectFieldSelected = 'Purchase Accounts';
                                        //$inputSelectedMainAccName = 'Sales Accounts';
                                        if ($sttr_firm_id != '')
                                            $inputSelectedFirmId = $sttr_firm_id;
                                        else
                                            $inputSelectedFirmId = $firm_id;
                                        //
                                        $inputFieldColumnName = 'sttr_account_id';
                                        //
                                        include 'omInputFieldAccount.php';
                                        //
                                        ?>


                                    <?php } ?>
                                    <!--                                                                  -->
                                </td>
                            </tr>
                            <tr align='right'>
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <td align="center" valign="middle">
                                    <?php if ($arrStockFormFieldYesNo['sttr_mfg_date'] == 'Y') { ?>
                                        <div class="text-center font-dark"><strong>MFG DATE</strong></div>
                                    <?php } ?>
                                </td>
                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <td align="center" valign="middle">
                                    <?php if ($arrStockFormFieldYesNo['sttr_exp_date'] == 'Y') { ?>
                                        <div class="text-center font-dark"><strong>EXPIRE DATE</strong></div>
                                    <?php } ?>
                                </td>
                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <td align="center" valign="middle">
                                    <?php if ($arrStockFormFieldYesNo['sttr_exp_date'] == 'Y') { ?>
                                        <div class="text-center font-dark"><strong>DELIVERY DATE</strong></div>
                                    <?php } ?>
                                </td>
                                <td align="center" valign="middle">
                                    <?php if ($arrStockFormFieldYesNo['sttr_pre_invoice_no'] == 'Y') { ?>

                                        <div class="text-center font-dark" ><strong>INV CODE</strong></div>
                                    <?php } ?>
                                </td>
                                <td align="center" valign="middle">
                                    <?php if ($arrStockFormFieldYesNo['sttr_invoice_no'] == 'Y') { ?>
                                        <div class="text-center font-dark" ><strong>INV ID</strong></div>
                                    <?php } ?>
                                </td>

                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <td align="center" valign="middle">
                                    <?php if ($arrStockFormFieldYesNo['sttr_bis_mark'] == 'Y') { ?>
                                        <div class="text-center font-dark"><strong>BIS</strong></div>
                                    <?php } ?>
                                </td>
                                <!--                                                                  -->
                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <td align="center" valign="middle">
                                    <?php if ($arrStockFormFieldYesNo['sttr_image_id'] == 'Y') { ?>
                                        <div class="text-left font-dark floatLeft">
                                            <strong>IMAGES</strong>
                                        </div>
                                        <div class="text-right font-dark">
                                            <strong>WEB CAM</strong>
                                        </div>
                                    <?php } ?>
                                </td>
                                <td align="center" valign="middle">
                                    <?php if ($arrStockFormFieldYesNo['sttr_account_id'] == 'Y') { ?>
                                        <div class="text-center font-dark"><strong>INVENTORY ACCOUNTS</strong></div>
                                    <?php } ?>
                                </td>
                                <!--                                                                  -->
                            </tr>
                            <tr align='right'>
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <td align="center" valign="middle">
                                    <?php if ($arrStockFormFieldYesNo['sttr_mfg_date'] == 'Y') { ?>


                                        <div id="MFGDATE" class="input-group date datepicker" data-date-format="mm-dd-yyyy"  >
                                            <input class="form-control text-center" type="text" style="height:31px;border-color:#27a4b0;" />
                                            <span class="input-group-addon" ><i class="glyphicon glyphicon-calendar" ></i></span>
                                        </div>


                                    <?php } ?>
                                </td>
                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <td align="center" valign="middle">
                                    <?php if ($arrStockFormFieldYesNo['sttr_exp_date'] == 'Y') { ?>

                                        <div id="EXPDATE" class="input-group date datepicker" data-date-format="mm-dd-yyyy"  >
                                            <input class="form-control text-center" type="text" style="height:31px;border-color:#27a4b0;" />
                                            <span class="input-group-addon" ><i class="glyphicon glyphicon-calendar" ></i></span>
                                        </div>

                                    <?php } ?>
                                </td>
                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <td align="center" valign="middle">
                                    <?php if ($arrStockFormFieldYesNo['sttr_exp_date'] == 'Y') { ?>

                                        <div id="DELDATE" class="input-group date datepicker" data-date-format="mm-dd-yyyy"  >
                                            <input class="form-control text-center" type="text" style="height:31px;border-color:#27a4b0;" />
                                            <span class="input-group-addon" ><i class="glyphicon glyphicon-calendar" ></i></span>
                                        </div>

                                    <?php } ?>
                                </td>

                                <td align="center" valign="middle">
                                    <!-- Start code for third field in stock form. Here Sequence is '2'.  -->
                                    <?php
                                    $inputFieldColumnName = 'sttr_pre_invoice_no';
                                    if ($arrStockFormFieldYesNo['sttr_pre_invoice_no'] == 'Y') {
                                        ?>
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        $inputMainDivClass = '';
                                        $inputMainDivStyle = '';
                                        $inputDivClass = '';
                                        //
                                        // Input Box Type and Ids
                                        $inputType = 'text';
                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;border-color:#666;';
                                        //"inputStyle".$inputStyle;

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
                                        $selectDropdownClass = 'googleSuggestionDivClass';
                                        $inputOnBlurFun = 'googleSuggestionDropdownBlank("' . $inputGoogleSuggDivId . '");';
                                        $inputKeyUpFun = "var googleWhereCondColumns = 'AND sttr_product_type=\'' + document.getElementById('sttr_product_type').value + '\'';"
                                                . " googleSuggestionDropdown('stock_transaction', 'sttr_item_pre_id', this.value, googleWhereCondColumns,'$inputFieldColumnName$prodCount', '$selectDropdownClass', event.keyCode, '$inputGoogleSuggDivId', '$inputGoogleSuggDivId')";

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
                                    <?php } ?>
                                    <!-- End code for third field in stock form. Here Sequence is '2'.     -->
                                </td>
                                <td align="center" valign="middle">
                                    <?php
                                    $inputFieldColumnName = 'sttr_invoice_no';
                                    if ($arrStockFormFieldYesNo['sttr_invoice_no'] == 'Y') {
                                        ?>
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        $inputMainDivClass = '';
                                        $inputMainDivStyle = '';
                                        $inputDivClass = '';
                                        //
                                        // Input Box Type and Ids
                                        $inputType = 'text';

                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'form-control text-center font-dark';
                                        $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:24px;border-color:#666;';
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
                                        $inputselDropDownCls = '';                                                // This is class for selection in drop down
                                        $inputMainClassButton = '';                                              // This is the main division for Button
                                        // 
                                        //* **************************************************************************************
                                        //* End Input Area 
                                        //* **************************************************************************************
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        //
                                        ?>
                                    <?php } ?>
                                </td>

                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <td align="center" valign="middle">
                                    <?php
                                    $inputFieldColumnName = 'sttr_bis_mark';
                                    if ($arrStockFormFieldYesNo['sttr_bis_mark'] == 'Y') {
                                        ?>
                                        <?php
                                        //
                                        //* **************************************************************************************
                                        //* Start Input Area to get firms details
                                        //* **************************************************************************************
                                        // // This is the main division class for input filed
                                        $inputMainDivClass = '';
                                        $inputMainDivStyle = '';
                                        $inputDivClass = '';
                                        //
                                        // Input Box Type and Ids
                                        $inputType = 'checkbox';

                                        //
                                        // This is the main class for input flied
                                        $inputFieldClass = 'text-center font-dark';
                                        $inputStyle = 'height:21px;width:50px;';
                                        $inputLabel = ''; // Display Label below the text box
                                        $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                        $position = strpos($title, '|');
                                        $inputTitle = substr($title, 0, $position);
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
                                        ?><?php } ?>
                                </td>
                                <!--                                                                  -->
                                <!--                                                                  -->
                                <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                <td align="center" valign="middle">
                                    <?php
                                    $inputFieldColumnName = 'sttr_image_id';
                                    if ($arrStockFormFieldYesNo['sttr_image_id'] == 'Y') {
                                        ?>
                                        <div style="padding-top:4px;">
                                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="imageLoadOption" name="imageLoadOption" />
                                                        <input type="hidden" id="compressedImage" name="compressedImage" />
                                                        <input type="hidden" id="compressedImageThumb" name="compressedImageThumb" />
                                                        <input type="hidden" id="compressedImageSize" name="compressedImageSize" />

                                                        <div class="file_stock_form_image_input_div" align="center">
                                                            <i  class="fa fa-picture-o" title="COM" style="font-size:20px;padding-left: 10px;"></i>

                                                            <input type="file" id="addItemSelectPhoto"
                                                                   style="cursor: pointer;" name="addItemSelectPhoto"
                                                                   class="file_stock_form_image_input_hidden"
                                                                   onclick="javascript: document.getElementById('imageLoadOption').value = 'COM';"
                                                                   onchange="loadImageFileCompress();" 
                                                                   onsubmit="return false;" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        //
                                                        //* **************************************************************************************
                                                        //* Start Input Area to get firms details
                                                        //* **************************************************************************************
                                                        // // This is the main division class for input filed
                                                        //$inputFieldColumnName = '';
                                                        $inputMainDivClass = '';
                                                        $inputMainDivStyle = '';
                                                        $inputDivClass = '';
                                                        $inputId = 'fileName';
                                                        $inputName = 'fileName';
                                                        $inputFieldNextId = $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence) + 1] . $prodCount;
                                                        $inputFieldPrevId = $arrStockFormFieldSequence[array_search($inputFieldColumnName, $arrStockFormFieldSequence) - 1] . $prodCount;
                                                        //
                                                        // Input Box Type and Ids
                                                        $inputType = 'text';
                                                        $inputFieldDBQuery = '';
                                                        $inputFieldValue = '';
                                                        //
                                                        // This is the main class for input flied
                                                        $inputFieldClass = 'form-control text-center';
                                                        $inputStyle = 'width:50px;height:20px;border-color:#666;border:0px;size:9px;';
                                                        $inputLabel = ''; // Display Label below the text box
                                                        $inputReadOnly = 'readonly';

                                                        $title = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                                        $position = strpos($title, '|');
                                                        $inputTitle = "this.value";
                                                        //
                                                        // This class is for Pencil Icon                                                           
                                                        $inputIconClass = '';
                                                        // 
                                                        // Place Holder inside input box
                                                        $placeHolder = $arrStockFormFieldTitle[array_search($inputFieldColumnName, $arrStockFormFieldSequence)];
                                                        $len = strlen($placeHolder);
                                                        $position = strpos($placeHolder, '|');
                                                        $inputPlaceHolder = substr($placeHolder, $position + 1, $len);
                                                        $inputLabelDivText = '';
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
                                                        $inputselDropDownCls = '';                                                // This is class for selection in drop down
                                                        $inputMainClassButton = '';                                              // This is the main division for Button
                                                        // 
                                                        //* **************************************************************************************
                                                        //* End Input Area 
                                                        //* **************************************************************************************
                                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                        //
                                                        ?>
                                                    <?php } ?> 
                                                </td>
                                                <td>
                                                    <div id="webcam_input_div" class="webcam_input_div_class" align="center" ></div>
                                                    <?php if ($arrStockFormFieldYesNo['sttr_image_id'] == 'Y') { ?>
                                                    <i class="fa fa-camera cursor" title="WEB" style="font-size:20px;" id="WebcamButt" name="WebcamButt" 
                                                           onclick="chngStockImgLoadOpt(this.title, '', '', '<?php echo $documentRootBSlash; ?>');
                                                                       return false;" onsubmit="return false;" ></i> 
                                                       <?php } ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                                <td align="center" valign="middle">
                                    <!-- Start code for 14th field in stock form. Here Sequence is '13'.    -->
                                    <?php if ($arrStockFormFieldYesNo['sttr_account_id'] == 'Y') { ?>


                                        <?php
                                        //
                                        $inputMainDivId = 'sttr_account_id';
                                        $inputSelectedAccountId = 'sttr_account_id';
                                        $inputSelectedAccountName = "'Purchase Accounts'";
                                        $selectFieldSelected = 'Purchase Accounts';
                                        //$inputSelectedMainAccName = 'Sales Accounts';
                                        if ($sttr_firm_id != '')
                                            $inputSelectedFirmId = $sttr_firm_id;
                                        else
                                            $inputSelectedFirmId = $firm_id;
                                        //
                                        $inputFieldColumnName = 'sttr_account_id';
                                        //
                                        include 'omInputFieldAccount.php';
                                        //
                                        ?>


                                    <?php } ?>
                                    <!--                                                                  -->
                                </td>
                                <!--                                                                  -->
                            </tr>
                        </table>

                    </div>
                    <!--                                                                    -->


                    <div id ="omStockTransFormSubDiv">

                        <?php //include 'omStockTransFormSubDiv.php'; ?>
                        <?php include 'omStockTransForm.php'; ?>

                    </div>

                    <div style="border-bottom: 1px solid #ccc;margin-top: 10px;margin-left: -15px;margin-right: -24px;"></div>
                    <div style="border-bottom: 1px solid #ccc;margin-left: -15px;margin-right: -24px;text-align:center;">
                        <div style="text-align:center;">
                            <?php
//
//* **************************************************************************************
//* Start Input Area to get firms details
//* **************************************************************************************
// // This is the main division class for input filed
// $inputMainDivId
//                                $inputMainDivClass = 'form-group col-sm-1';
//                                $inputMainDivStyle = 'width:auto;padding-left:0px;padding-right:0px;';
//                    $inputDivClass = 'input-icon';
//
                            // Input Box Type and Ids
                            $inputType = 'submit';
                            $inputIdButton = 'same_product';
                            $inputNameButton = 'same_product';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                            // This is the main class for input flied
                            $inputFieldClass = 'btn btn-info';
                            $inputStyle = 'height:26px;width:150px;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 5px;margin-bottom: 5px;text-align:center;color:white;';
                            $inputLabel = 'SAME PRODUCT'; // Display Label below the text box
//
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = 'fa fa-inr';
// 
// Place Holder inside input box
                            $inputPlaceHolder = 'SAME PRODUCT';
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
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            // $inputMainDivId
//                                $inputMainDivClass = 'form-group col-sm-1';
//                                $inputMainDivStyle = 'width:auto;padding-left:0px;padding-right:0px;';
//                    $inputDivClass = 'input-icon';
                            //
                    // Input Box Type and Ids
                            $inputType = 'submit';
                            $inputIdButton = 'add_product';
                            $inputNameButton = 'add_product';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
                            //
                    // This is the main class for input flied
                            $inputFieldClass = 'btn btn-success';
                            $inputStyle = 'height:26px;width:150px;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 5px;margin-bottom: 5px;text-align:center;color:white;';
                            $inputLabel = 'ADD PRODUCT'; // Display Label below the text box
                            //
                                // This class is for Pencil Icon                                                           
                            $inputIconClass = 'fa fa-inr';
                            // 
                            // Place Holder inside input box
                            $inputPlaceHolder = 'ADD PRODUCT';
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
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            // $inputMainDivId
//                                $inputMainDivClass = 'form-group col-sm-1';
//                                $inputMainDivStyle = 'width:auto;padding-left:0px;padding-right:0px;';
//                    $inputDivClass = 'input-icon';
                            //
                    // Input Box Type and Ids
                            $inputType = 'submit';
                            $inputIdButton = 'purchase_on_cash';
                            $inputNameButton = 'purchase_on_cash';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
                            //
                    // This is the main class for input flied
                            $inputFieldClass = 'btn';
                            $inputStyle = 'height:26px;width:150px;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 5px;margin-bottom: 5px;'
                                    . 'text-align:center;color:white;background-color: #f0ad4e;border-color: #eea236;';
                            $inputLabel = 'PURCHASE ON CASH'; // Display Label below the text box
                            //
                                // This class is for Pencil Icon                                                           
                            $inputIconClass = 'fa fa-inr';
                            // 
                            // Place Holder inside input box
                            $inputPlaceHolder = 'PURCHASE ON CASH';
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
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Input Area to get firms details
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            // $inputMainDivId
//                                $inputMainDivClass = 'form-group col-sm-1';
//                                $inputMainDivStyle = 'width:auto;padding-left:0px;padding-right:0px;';
//                    $inputDivClass = 'input-icon';
                            //
                    // Input Box Type and Ids
                            $inputType = 'button';
                            $inputIdButton = 'help';
                            $inputNameButton = 'help';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'btn grey';
                            $inputStyle = 'width:' . $arrStockFormFieldSize[array_search($inputFieldColumnName, $arrStockFormFieldSequence)] . ';height:26px;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 5px;margin-bottom: 5px;text-align:center;color:#444;';
                            $inputLabel = 'HELP'; // Display Label below the text box
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = 'fa fa-inr';
                            // 
                            // Place Holder inside input box
                            $inputPlaceHolder = 'TOTAL AMOUNT';
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
                            <!--                                                                    -->
                            <!-- Start code for 12th field in stock form. Here Sequence is '11'.    -->
                        </div></div>
                </div>

                <!-- ****************************************************************************************************************************
                     START CODE FOR PREVIOUS STOCK ADDED DETAILS @PRIYANKA-09MAY18
                *******************************************************************************************************************************-->
                <div style="margin-top: 10px;margin-left: -15px;margin-right: -24px;"></div>
                <div id="stockPreviousProdDetails">
                    <?php
                    include 'omPrevProdDetails.php';
                    ?>
                </div>
                <!-- ****************************************************************************************************************************
                     END CODE FOR PREVIOUS STOCK ADDED DETAILS @PRIYANKA-09MAY18
                *******************************************************************************************************************************-->
            </div>
        </div>
    </div>
</form>