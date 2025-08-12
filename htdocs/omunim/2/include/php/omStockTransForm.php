<?php
/*
 * *************************************************************************************************************************************************************************
 * @tutorial: UNIVERSAL FORM SUB DIV FILE @PRIYANKA-29APR18
 * *************************************************************************************************************************************************************************
 *
 * Created on on 29 April, 2018 18:43:00 PM
 * 
 * @FileName: omStockTransForm.php
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
//
// MANDATORY FILES
if (!isset($_SESSION)) {
    session_start();
}
//
//echo 'sessionProdVer == ' . $_SESSION['sessionProdVer'] . '<br />';
//
//echo 'documentRootIncludePhp == '.$_SESSION['documentRootIncludePhp'];
//
//
//print_r($_REQUEST);
//
//
include $_SESSION['documentRootIncludePhp'] . 'system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . 'system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . 'system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . 'ommpfndv.php';
//
// STAFF ACCESS FILE
$staffId = $_SESSION['sessionStaffId'];
include $_SESSION['documentRootIncludePhp'] . '/ommpsbac.php';
//
// **********************************************************************************************************************************************************************
// END CODE FOR GLOBAL FILES @PRIYANKA-29APR18
// **********************************************************************************************************************************************************************
?>
<?php
//
//
//echo '$operation : ' . $operation. '<br />';
//
//
$sessionOwnerId = $_SESSION['sessionOwnerId']; // OWNER ID 
//
// MAIN PRODUCT COUNT
if ($mainProdCount === '' || $mainProdCount === NULL)
    $mainProdCount = '0';
// 
// PRODUCT COUNT
if ($prodCount === '' || $prodCount === NULL)
    $prodCount = $_REQUEST['prodCount'];
//
// STTR ID
if ($sttr_id === '' || $sttr_id === NULL) {
    //if ($wholeSaleListSttrId != '')
    //    $sttr_id = $wholeSaleListSttrId;
    //else
    $sttr_id = $main_sttr_id = $_REQUEST['sttr_id'];
}
//
if ($main_sttr_id === '' || $main_sttr_id === NULL)
    $main_sttr_id = $_REQUEST['wholeSaleListSttrId'];
//
// STTR ID
if ($sttr_sttr_id === '' || $sttr_sttr_id === NULL)
    $sttr_sttr_id = $_REQUEST['sttr_sttr_id'];
//
//
// STTR_STTRIN ID
if ($sttr_sttrin_id === '' || $sttr_sttrin_id === NULL)
    $sttr_sttrin_id = $_REQUEST['sttr_sttrin_id'];
//
// USER ID
if ($userId === '' || $userId === NULL) {

    if ($_REQUEST['userId'] != '' && $_REQUEST['userId'] != NULL) {
        $userId = $_REQUEST['userId'];
        $sttr_user_id = $userId;
        $custId = $userId;
    }
}
//
if ($prevProductPanel == '' || $prevProductPanel == NULL) {
    $prevProductPanel = $_REQUEST['panelName'];
}
//
if ($sameProduct == '' || $sameProduct == NULL) {
    $sameProduct = $_REQUEST['sameProduct'];
}
// USER ID
if ($userId === '' || $userId === NULL) {

    if ($_REQUEST['custId'] != '' && $_REQUEST['custId'] != NULL) {
        $userId = $_REQUEST['custId'];
        $sttr_user_id = $userId;
        $custId = $userId;
    }
}
//
//
if ($_REQUEST['custId'] == '' || $_REQUEST['custId'] == NULL) {
    //
    if ($_REQUEST['userId'] != '' && $_REQUEST['userId'] != NULL) {
        $_REQUEST['custId'] = $_REQUEST['userId'];
    }
}
//
//
if ($userId == 'undefined') {
    $userId = NULL;
}
//
//
//echo '$mainPanelName @== ' . $mainPanelName . '<br />';
//echo '$setupPanelName @== ' . $setupPanelName . '<br />';
//
//
// MAIN PANEL
if ($mainPanelName === '' || $mainPanelName === NULL)
    $mainPanelName = $_REQUEST['panelName'];
//
//
if ($mainPanelName == '' || $mainPanelName == NULL) {
    $mainPanelName = $_REQUEST['mainPanelName'];
}
//
//
//echo '$mainPanelName #== ' . $mainPanelName . '<br />';
//echo '$setupPanelName #== ' . $setupPanelName . '<br />';
//echo '$sttr_panel_name #== ' . $sttr_panel_name . '<br />';
//
//
// CRYSTAL PANEL
if ($crystalPanelName === '' || $crystalPanelName === NULL)
    $crystalPanelName = $_REQUEST['crystalPanelName'];
//
// FIXED PRICE PANEL
if ($fixedPricePanelName === '' || $fixedPricePanelName === NULL)
    $fixedPricePanelName = $_REQUEST['fixedPricePanelName'];
//
// Trans Type
if ($transType === '' || $transType === NULL)
    $transType = $_REQUEST['transType'];
//
//
if ($transType === '' || $transType === NULL)
    $transType = $_REQUEST['transactionType'];
//
//
if ($_REQUEST['fixedPricePanelName'] == 'RAW_METAL_WHOLESALE') {
    //
    $setupPanelName = $_REQUEST['fixedPricePanelName'];
    $_REQUEST['indicator'] = 'rawMetal';
    //
}
//
//
if ($sttr_indicator == '' || $sttr_indicator == NULL || $sttr_indicator == 'undefined') {
    //
    if ($_REQUEST['sttr_indicator'] != '' && $_REQUEST['sttr_indicator'] != NULL && $_REQUEST['sttr_indicator'] != 'undefined') {
        $sttr_indicator = $_REQUEST['sttr_indicator'];
    }
    //
    if ($sttr_indicator == '' || $sttr_indicator == NULL || $sttr_indicator == 'undefined') {
        //
        if ($_REQUEST['indicator'] != '' && $_REQUEST['indicator'] != NULL && $_REQUEST['indicator'] != 'undefined') {
            $sttr_indicator = $_REQUEST['indicator'];
        }
        //
    }
}
//
//
if ($indicator == '' || $indicator == NULL || $indicator == 'undefined') {
    //
    if ($_REQUEST['indicator'] != '' && $_REQUEST['indicator'] != NULL && $_REQUEST['indicator'] != 'undefined') {
        $indicator = $_REQUEST['indicator'];
    }
    //
    if ($indicator == '' || $indicator == NULL || $indicator == 'undefined') {
        //
        if ($_REQUEST['sttr_indicator'] != '' && $_REQUEST['sttr_indicator'] != NULL && $_REQUEST['sttr_indicator'] != 'undefined') {
            $indicator = $_REQUEST['sttr_indicator'];
        }
        //
    }
}
//
//
//echo 'sttr_indicator == ' . $_REQUEST['sttr_indicator'] . '<br />';
//echo 'indicator == ' . $_REQUEST['indicator'] . '<br />';
//echo '$retailWholesaleButtonDisp == ' . $retailWholesaleButtonDisp . '<br />';
//
//
if ($stockType === '' || $stockType === NULL)
    $stockType = $_REQUEST['stockType'];
//
//
if ($transPanelName == '' || $transPanelName == NULL)
    $transPanelName = $_REQUEST['transPanelName'];
//
if ($payPanelName == '' || $payPanelName == NULL)
    $payPanelName = $_POST['payPanelName'];
//
if ($payPanelName == '' || $payPanelName == NULL)
    $payPanelName = $_GET['payPanelName'];
//
if ($payPanelName == '' || $payPanelName == NULL)
    $payPanelName = $_REQUEST['payPanelName'];
//
//
if ($mainPanelName == 'stockIframeYes')
    $stockIframe = 'Y';
//
if ($sttr_pre_invoice_no === '' || $sttr_pre_invoice_no === NULL)
    $sttr_pre_invoice_no = $_REQUEST['prodPreInvNo'];
//
if ($sttr_invoice_no === '' || $sttr_invoice_no === NULL)
    $sttr_invoice_no = $_REQUEST['prodInvNo'];
//
//
//echo '$sttr_pre_invoice_no == ' . $sttr_pre_invoice_no . '<br />';
//echo '$sttr_invoice_no == ' . $sttr_invoice_no . '<br />';
//
//
// SET PAYMENT PANEL DISPLAY : YES/NO
$paymentPanelDisp = 'YES';
//
// SAME PRODUCT BUTTON DISPLAY : YES/NO
$sameProdButtonDisp = 'YES';
//
// ADD PRODUCT BUTTON DISPLAY : YES/NO   
$addProdButtonDisp = 'YES';
//
// PURCHASE ON CASH BUTTON DISPLAY : YES/NO
$purchaseOnCashButtonDisp = 'YES';
//
// HELP BUTTON DISPLAY : YES/NO
$helpButtonDisp = 'YES';
//
$clickHereToResetButtonDisp = 'YES';
//
$importStockButtonDisp = 'NO';
//
//
if ($makeInvoiceButtonDisp == '' || $makeInvoiceButtonDisp == NULL) {
    //
    if ($_REQUEST['makeInvoiceButtonDisp'] == '' || $_REQUEST['makeInvoiceButtonDisp'] == NULL ||
            $_REQUEST['makeInvoiceButtonDisp'] == 'undefined') {
        //
        $makeInvoiceButtonDisp = 'NO';
    }
}
//
//
//echo '$operation 1: ' . $operation. '<br />';
//
//
if ($operation == '' || $operation == NULL)
    $operation = $_REQUEST['operation'];
//
//
//print_r($_REQUEST) . '<br />';
//
//
//echo 'operation 2== ' . $operation . '<br />';
//echo 'prodPreInvNo == ' . $_REQUEST['prodPreInvNo'] . '<br />';
//echo 'prodInvNo == ' . $_REQUEST['prodInvNo'] . '<br />';
//echo 'sttr_id == ' . $_REQUEST['sttr_id'] . '<br />';
//
//
if ($_REQUEST['delChk'] == 'yes') {
    $operation = $_REQUEST['operation'] = 'update';
    $sttr_invoice_no = $_REQUEST['prodInvNo'];
    $sttr_pre_invoice_no = $_REQUEST['prodPreInvNo'];
    parse_str(getTableValues("SELECT sttr_id, sttr_sttrin_id, sttr_transaction_type as transType, sttr_utin_id FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                        . " AND sttr_status = 'PaymentDone' AND sttr_pre_invoice_no = '$sttr_pre_invoice_no' AND sttr_invoice_no = '$sttr_invoice_no' "
                        . "ORDER BY sttr_id ASC LIMIT 0,1"));
    $_REQUEST['sttr_id'] = $sttr_id;
    if ($sttr_utin_id != '') {        
        $transPanelName = 'PendingOrderUpdate';
    }
}
if (($_REQUEST['operation'] == 'update' || $operation == 'update') &&
   (($_REQUEST['prodPreInvNo'] != '' && $_REQUEST['prodPreInvNo'] != NULL && $_REQUEST['prodPreInvNo'] != 'undefined' &&
     $_REQUEST['prodInvNo'] != '' && $_REQUEST['prodInvNo'] != NULL && $_REQUEST['prodInvNo'] != 'undefined') ||
    ($_REQUEST['sttr_id'] != '' && $_REQUEST['sttr_id'] != NULL && $_REQUEST['sttr_id'] != 'undefined'))) {
    //
    //
    //print_r($_REQUEST) . '<br />';
    //
    //
    if ($_REQUEST['sttr_id'] != '' && $_REQUEST['sttr_id'] != NULL && $_REQUEST['sttr_id'] != 'undefined') {
        //
        parse_str(getTableValues("SELECT sttr_utin_id FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                        . "AND sttr_main_entry = 'M' AND sttr_status = 'PaymentDone' AND sttr_id = '$_REQUEST[sttr_id]' "
                        . "ORDER BY sttr_id ASC LIMIT 0,1"));
        //
    } else {
        //
        parse_str(getTableValues("SELECT sttr_utin_id FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                        . "AND sttr_user_id = '$_REQUEST[userId]' AND sttr_indicator = '$_REQUEST[indicator]' "
                        . "AND sttr_transaction_type = '$_REQUEST[transactionType]' "
                        . "AND sttr_pre_invoice_no = '$_REQUEST[prodPreInvNo]' AND sttr_invoice_no = '$_REQUEST[prodInvNo]' "
                        . "AND sttr_main_entry = 'M' AND sttr_status = 'PaymentDone' "
                        . "ORDER BY sttr_id ASC LIMIT 0,1"));
        //
    }
    //
    //echo '$sttr_utin_id == ' . $sttr_utin_id . '<br />';
    //
}
//
//
//echo '$operation 3: ' . $operation. '<br />';
//echo '$_REQUEST[operation]:' . $_REQUEST['operation']. '<br />';
//echo 'REQUEST - prodStatus == ' . $_REQUEST['prodStatus'] . '<br />';
//echo '$prodStatus == ' . $prodStatus . '<br />';
//
//
if ($operation == 'update') {
    //
    if ($prodStatus == '' || $prodStatus == NULL || $prodStatus == 'undefined') {
        //
        if ($_REQUEST['prodStatus'] != '' && $_REQUEST['prodStatus'] != NULL &&
            $_REQUEST['prodStatus'] != 'undefined') {
            //
            $prodStatus = $_REQUEST['prodStatus'];
            //
        }
    }
}
//
//
//echo '$mainPanelName == ' . $mainPanelName . '<br />';
//echo '$setupPanelName == ' . $setupPanelName . '<br />';
//echo '$userId == ' . $userId . '<br />';
//echo '$mainProdCount == ' . $mainProdCount . '<br />';
//echo '$wholeSaleListSttrId == ' . $wholeSaleListSttrId . '<br />';
//echo '$stockIframe == ' . $stockIframe . '<br />';
//echo '$mainPanelName == ' . $mainPanelName . '<br />';
//echo '$sttr_id == ' . $sttr_id . '<br />';
//echo '$transType == ' . $transType . '<br />';
//echo '$sttr_transaction_type == ' . $sttr_transaction_type . '<br />';
//
//echo '$sttr_indicator == ' . $sttr_indicator . '<br />';
//echo '$indicator == ' . $indicator . '<br />';
//
//
// *************************************************************************************************
// START CODE TO SET FINAL FINE WT CAL BY AND FINAL VALUATION CALCULATIONS BY @PRIYANKA-08SEP2021
// *************************************************************************************************
//
if ($transType == 'newOrder' && $operation != 'update') {
    //
    $queryFinalFineWtBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellFineWtBy'";
    $resFinalFineWtBy = mysqli_query($conn, $queryFinalFineWtBy);
    $rowFinalFineWtBy = mysqli_fetch_array($resFinalFineWtBy);
    $finalFineWtBy = $rowFinalFineWtBy['omly_value'];
    //
    if ($finalFineWtBy != '') {
        $sttr_final_fine_wt_by = $finalFineWtBy;
    }
    //
    $queryFinalValBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellValBy'";
    $resFinalValBy = mysqli_query($conn, $queryFinalValBy);
    $rowFinalValBy = mysqli_fetch_array($resFinalValBy);
    $finalValBy = $rowFinalValBy['omly_value'];
    //                                      //
    if ($finalValBy != '') {
        $sttr_final_valuation_by = $finalValBy;
    }
    //
}
//
// *************************************************************************************************
// END CODE TO SET FINAL FINE WT CAL BY AND FINAL VALUATION CALCULATIONS BY @PRIYANKA-08SEP2021
// *************************************************************************************************
//
//
//echo '$setupPanelName ####== ' . $setupPanelName . '<br />';
//echo '$sttr_panel_name ####== ' . $sttr_panel_name . '<br />';
//echo '$mainPanelHeading =@@= ' . $mainPanelHeading . '<br />';
//echo '$panelHeading =@@= ' . $panelHeading . '<br />';
//
//
//echo '$operation:' . $operation. '<br />';
//
//
// START CODE TO INCLUDE FOR HIDDEN PARAMETERS @PRIYANKA-03MAY18
include $_SESSION['documentRootIncludePhp'] . 'stock/omHiddenInputRequest.php';
// END CODE TO INCLUDE FOR HIDDEN PARAMETERS @PRIYANKA-03MAY18
//
//
//echo '$mainPanelHeading =@1@= ' . $mainPanelHeading . '<br />';
//echo '$panelHeading =@1@= ' . $panelHeading . '<br />';
//
//
$setupPanelName = $mainPanelName;
include $_SESSION['documentRootIncludePhp'] . 'stock/omFormSetupPanels.php';
//
//
//echo '$inputLabel == '.$inputLabel.'<br />';
//echo '$paymentPanelDisp == '.$paymentPanelDisp.'<br />';
//echo '$mainPanelHeading =@2@= ' . $mainPanelHeading . '<br />';
//echo '$panelHeading =@2@= ' . $panelHeading . '<br />';
//
//
include $_SESSION['documentRootIncludePhp'] . 'stock/omFormSetupArray.php';
//
//
//echo '$panelName == ' . $panelName . '<br />';
//echo '$mainPanel == ' . $mainPanel . '<br />';
//echo '$onClickFunctionPanelName == ' . $onClickFunctionPanelName . '<br />';
//echo '$onClickFunctionRetailPanelName == ' . $onClickFunctionRetailPanelName . '<br />';
//echo '$payPanelName == ' . $payPanelName . '<br />';
//echo '$transPanelName == ' . $transPanelName . '<br />';
//
//echo '$transType ##== ' . $transType . '<br />';
//echo '$sttr_transaction_type ##== ' . $sttr_transaction_type . '<br />';
//echo '$sttr_indicator ##== ' . $sttr_indicator . '<br />';
//
//echo '$userId == ' . $userId . '<br />';
//echo '$sttr_user_id == ' . $sttr_user_id . '<br />';
//echo 'userId == ' . $_REQUEST['userId'] . '<br />';
//echo 'custId == ' . $_REQUEST['custId'] . '<br />';
//
//echo '$sttr_indicator == ' . $sttr_indicator . '<br />';
//
//print_r($_REQUEST);
//
//
//echo '$setupPanelName ##== ' . $setupPanelName . '<br />';
//echo '$sttr_panel_name ##== ' . $sttr_panel_name . '<br />';
//
//
if ($operation == 'update') {
    //
    $inputFieldValueDisp = 'YES';
    //  
}
//
//
//echo '$operation:' . $operation. '<br />';
//echo '$inputFieldValueDisp:' . $inputFieldValueDisp. '<br />';
//
//
if ($transType == 'ESTIMATE' && $operation == 'update') {
    //
    if ($transPanelName == 'EstimatePayUp') {
        //
        $qSelectMainEntry = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                . "AND sttr_user_id = '$_REQUEST[userId]' AND sttr_indicator = '$_REQUEST[indicator]' "
                . "AND sttr_transaction_type = '$_REQUEST[transactionType]' "
                . "AND sttr_pre_invoice_no = '$_REQUEST[prodPreInvNo]' AND sttr_invoice_no = '$_REQUEST[prodInvNo]' "
                . "AND sttr_main_entry = 'M' AND sttr_status = 'PaymentDone' "
                . "ORDER BY sttr_id ASC LIMIT 0,1";
        //
        $resSelMainEntry = mysqli_query($conn, $qSelectMainEntry);
        $rowMainCount = mysqli_num_rows($resSelMainEntry);
        $rowMain = mysqli_fetch_assoc($resSelMainEntry);
        //
        if ($rowMainCount > 0) {
            //
            //echo '$sttr_id0 == ' . $sttr_id . '<br />';
            $sttr_id = $rowMain['sttr_id'];
            $sttr_sttr_id = $rowMain['sttr_sttr_id'];
            $sttr_sttrin_id = $rowMain['sttr_sttrin_id'];
            //
        }
        //
    }
}
//
//
if ($transType == 'ItemReturn' || $transType == 'PurchaseReturn') {
    $paymentPanelDisp = 'YES';
    $inputFieldValueDisp = 'YES';
    $retailWholesaleButtonDisp = 'NO';
    $clickHereToResetButtonDisp = 'NO';
    $sameProdButtonDisp = 'NO';
    $purchaseOnCashButtonDisp = 'NO';
    $helpButtonDisp = 'NO';
    $addProdButtonLabel = 'SUBMIT';
}
//
//
//echo '$retailWholesaleButtonDisp == ' . $retailWholesaleButtonDisp . '<br />';
//echo '$clickHereToResetButtonDisp == ' . $clickHereToResetButtonDisp . '<br />';
//echo '$sameProdButtonDisp == ' . $sameProdButtonDisp . '<br />';
//echo '$purchaseOnCashButtonDisp == ' . $purchaseOnCashButtonDisp . '<br />';
//echo '$helpButtonDisp == ' . $helpButtonDisp . '<br />';
//echo '$addProdButtonLabel == ' . $addProdButtonLabel . '<br />';
//
//
?>
<style>
    .border{
        border:1px solid black;
    }
    ::-moz-placeholder {
        font-size: 12px;
    }
</style>
<?php
if ($importStockButtonDisp == 'YES' || $stockIframe == 'Y' || $stockPackingListDisp == 'Y') {
    //
    if ($stockIframe == 'Y' && $stockPackingListDisp == 'Y') {
        $importActionURL = 'omStockPackingListImport.php';
    } else if ($stockIframe == 'Y') {
        $importActionURL = 'omStockPackingListImportFile.php';
        /* START CODE TO ADD CONDITION FOR ADD STOCK PACKING LIST @AUTHOR:MADHUREE-05MAR2020 */
    } else if ($stockPackingListDisp == 'Y') {
        $importActionURL = 'include/php/stock/omStockPackingListImport.php';
        /* END CODE TO ADD CONDITION FOR ADD STOCK PACKING LIST @AUTHOR:MADHUREE-05MAR2020 */
    } else {
        $importActionURL = 'include/php/stock/omStockMainListImport.php';
    }
    //
    ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" <?php if ($stockIframe == 'Y') { ?> style="background: #fcf3cf;" <?php } ?> >
        <tr>                                      
            <td  valign="top">
                <div class="main_link_brown16" style="margin-left: 70%;font-weight:bold;">
                    IMPORT PURCHASE STOCK
                    <!-- START CODE TO ADD SAMPLE FILE FOR PACKAGING LIST @AUTHOR:MADHUREE-27JAN2020 -->
                    <?php if ($stockIframe == 'Y' && $stockPackingListDisp == 'Y') { ?>
                        <a style="cursor: pointer;margin-left: 10px;" href="<?php echo $documentRootBSlash; ?>/include/php/stock/master/sample_files/Stock_Packing_List.csv" >Download Sample File</a>
                    <?php } else if ($stockIframe == 'Y') { ?>
                        <a style="cursor: pointer;margin-left: 10px;" href="<?php echo $documentRootBSlash; ?>/include/php/stock/master/sample_files/Packing_List.csv" >Download Sample File</a>
                    <?php } else if ($stockPackingListDisp == 'Y') { ?>
                        <a style="cursor: pointer;margin-left: 10px;" href="<?php echo $documentRootBSlash; ?>/include/php/stock/master/sample_files/Stock_Packing_List.csv" >Download Sample File</a>
                    <?php } ?>
                    <!-- END CODE TO ADD SAMPLE FILE FOR PACKAGING LIST @AUTHOR:MADHUREE-27JAN2020 -->
                </div>
            </td>
        </tr>
        <tr>
            <td align="right" class="border-color-grey-b">
                <table align="right" border="0" cellspacing="0" cellpadding="2" width="100%">
                    <tr>
                        <td align="right" class="printVisibilityHidden paddingTop4 textLabel14CalibriBrownBold">
                            <form name="fileUpload" id="fileUpload"
                                  enctype="multipart/form-data" method="post"
                                  action="<?php echo $importActionURL; ?>" >
                                <table border="0" cellspacing="0" cellpadding="0" valign="top" >
                                    <tr>                                      
                                        <td align="right" valign="top">
                                            <input type="file" name="CVSFile" id="CVSFile" required="required" />
                                            <input type="hidden" name="userId" id="userId" value="<?php echo $userId; ?>" />
                                            <input type="hidden" name="sttr_id" id="sttr_id" value="<?php echo $sttr_id; ?>" />
                                            <input type="hidden" name="panelName" id="panelName" value="<?php echo $panelName; ?>" />
                                        </td>

                                        <td align="right" valign="top">
                                            <!---Start to Changes button----->
                                            <div>
                                                <?php
                                                $inputId = "submit";
                                                $inputType = 'submit';
                                                $inputFieldValue = 'Submit';
                                                $inputIdButton = "submit";
                                                $inputNameButton = '';
                                                $inputTitle = '';
                                                // This is the main class for input flied
                                                $inputFieldClass = 'btn ' . $om_btn_style;
                                                $inputStyle = " ";
                                                $inputLabel = 'Import'; // Display Label below the text box
                                                //
                                                // This class is for Pencil Icon                                                           
                                                $inputIconClass = '';
                                                $inputPlaceHolder = '';
                                                $spanPlaceHolderClass = '';
                                                $spanPlaceHolder = '';
                                                $inputOnChange = "";
                                                $inputOnClickFun = '';
                                                $inputKeyUpFun = '';
                                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                                $inputMainClassButton = '';           // This is the main division for Button
                                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php
}
//
// =========================================================================== //
// START CODE TO GET PREVIOUS ENTRY BY OPTION VALUE @AUTHOR:MADHUREE-02DEC2020 //
// =========================================================================== //
//echo '$retailWholesaleButtonDisp == ' . $retailWholesaleButtonDisp . '<br />';
//
$qSetPrevEntryBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'setPrevEntryBy'";
$resSetPrevEntryBy = mysqli_query($conn, $qSetPrevEntryBy);
$rowSetPrevEntryBy = mysqli_fetch_array($resSetPrevEntryBy);
$setPrevEntryBy = $rowSetPrevEntryBy['omly_value'];
//
// ========================================================================= //
// END CODE TO GET PREVIOUS ENTRY BY OPTION VALUE @AUTHOR:MADHUREE-02DEC2020 //
// ========================================================================= //
//
// ============================================================================== //
// START CODE TO GET PREVIOUS ENTRY BY CUSTOMER OPTION @AUTHOR:MADHUREE-02DEC2020 //
// ============================================================================== //
//
$qPrevEntryByCustIdOption = "SELECT omly_value FROM omlayout WHERE omly_option = 'prevEntryByCustIdOption'";
$resPrevEntryByCustIdOption = mysqli_query($conn, $qPrevEntryByCustIdOption);
$rowPrevEntryByCustIdOption = mysqli_fetch_array($resPrevEntryByCustIdOption);
$prevEntryByCustIdOption = $rowPrevEntryByCustIdOption['omly_value'];
//
// ============================================================================ //
// END CODE TO GET PREVIOUS ENTRY BY CUSTOMER OPTION @AUTHOR:MADHUREE-02DEC2020 //
// ============================================================================ //
//
$calculateItemRateQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'CalculateItemRate'";
$resCalculateItemRateQuery = mysqli_query($conn, $calculateItemRateQuery) or die("Error: " . mysqli_error($conn) . " with query " . $calculateItemRateQuery);
$rowCalculateItemRate = mysqli_fetch_array($resCalculateItemRateQuery);
$calculateItemRate = $rowCalculateItemRate['omly_value'];
//
if ($setPrevEntryBy == 'byAllProduct') {
    $prevEntryByIndicator = 'Y';
} else {
    $prevEntryByIndicator = 'N';
}
//
//
//echo '$mainPanelHeading == ' . $mainPanelHeading . '<br />';
//echo '$panelHeading == ' . $panelHeading . '<br />';
//
//
?>
<div id="cust_middle_body" <?php if ($stockIframe == 'Y') { ?> style="background: #fcf3cf;" <?php } ?> >
    <div class="" <?php if ($stockIframe == 'Y') { ?> style="background: #fcf3cf;" <?php } ?> >
        <div class="portlet-title">                     
            <div class="caption" 
            <?php //if ($mainPanelHeading != '' && $mainPanelHeading != NULL && $stockIframe != 'Y') { ?>
                 style="font-size:16px;" 
                 <?php //} ?> >                       
                <span class="caption-subject font-dark bold uppercase">
                    <?php
                    if ($mainPanelHeading != '' && $mainPanelHeading != NULL && $stockIframe != 'Y') {
                        echo $mainPanelHeading . ' - ' . str_replace("_", " ", $panelHeading);
                    } else {
                        echo str_replace("_", " ", $panelHeading);
                    }
                    ?>
                </span>
            </div>
            <div align="right">
                <?php
                if ($stockIframe != 'Y') {
                    //
                    if ($retailWholesaleButtonDisp == 'YES') {
                        $inputId = "submit";
                        $inputType = 'submit';
                        $inputFieldValue = 'Submit';
                        $inputIdButton = "submit";
                        $inputNameButton = '';
                        $inputTitle = '';
                        //
                        // This is the main class for input flied
                        $inputFieldClass = 'btn btn-info';
                        if ($stockType == 'wholesale') {
                            $inputDisabled = 'true';
                            $inputStyle = 'height:24px;width:100px;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 0px;margin-bottom: 0px;text-align:center;color:green;';
                        } else {
                            $inputDisabled = 'false';
                            $inputStyle = 'height:24px;width:100px;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 0px;margin-bottom: 0px;text-align:center;color:white;';
                        }
                        $inputLabel = 'WholeSale'; // Display Label below the text box
                        //
                        // This class is for Pencil Icon                                                           
                        $inputIconClass = '';
                        $inputPlaceHolder = '';
                        $spanPlaceHolderClass = '';
                        $spanPlaceHolder = '';
                        $inputOnChange = "";
                        $inputOnClickFun = 'navigatationPanelByFileName("cust_middle_body", "stock/omStockTransForm", "' . $onClickFunctionPanelName . '", "' . $sttr_indicator . '", "' . $transType . '", "wholesale", "insert", "", "' . $userId . '", "", "", "", "");';
                        $inputKeyUpFun = '';
                        $inputDropDownCls = '';               // This is the main division class for drop down 
                        $inputselDropDownCls = '';            // This is class for selection in drop down
                        $inputMainClassButton = '';           // This is the main division for Button
                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                        //
                        //
                        // *********************************************************************************************
                        // Retail Button
                        // *********************************************************************************************
                        //
                        //
                        $inputId = "submit";
                        $inputType = 'submit';
                        $inputFieldValue = 'Submit';
                        $inputIdButton = "submit";
                        $inputNameButton = '';
                        $inputTitle = '';
                        //
                        // This is the main class for input flied
                        $inputFieldClass = 'btn btn-warning';
                        if ($stockType == 'retail') {
                            $inputDisabled = 'true';
                            $inputStyle = 'height:24px;width:100px;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 0px;margin-bottom: 0px;text-align:center;color:green;';
                        } else {
                            $inputStyle = 'height:24px;width:100px;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 0px;margin-bottom: 0px;text-align:center;color:white;';
                        }
                        $inputLabel = 'Retail'; // Display Label below the text box
                        //
                        // This class is for Pencil Icon                                                           
                        $inputIconClass = '';
                        $inputPlaceHolder = '';
                        $spanPlaceHolderClass = '';
                        $spanPlaceHolder = '';
                        $inputOnChange = "";
                        $inputOnClickFun = 'navigatationPanelByFileName("cust_middle_body", "stock/omStockTransForm", "' . $onClickFunctionRetailPanelName . '", "' . $sttr_indicator . '", "' . $transType . '", "retail", "insert", "", "' . $userId . '", "", "", "", "");';
                        $inputKeyUpFun = '';
                        $inputDropDownCls = '';               // This is the main division class for drop down 
                        $inputselDropDownCls = '';            // This is class for selection in drop down
                        $inputMainClassButton = '';           // This is the main division for Button
                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                    }
                }
                $queryratenortecutoption = "SELECT omly_value FROM omlayout WHERE omly_option = 'ratenortecutoption'";
                $resratenortecutoption = mysqli_query($conn, $queryratenortecutoption);
                $rowUratenortecutoption = mysqli_fetch_array($resratenortecutoption);
                $sttr_ratecut_norate_option = $rowUratenortecutoption['omly_value'];
                ?>
            </div>
        </div>
    </div>
    <form name="stockForm" id="stockForm" style="width:100%;"
          enctype="multipart/form-data" method="post"
          action="<?php echo $documentRootBSlash; ?>/include/php/stock/omAdFormData.php" 
          <?php if ($transType == 'RepairItem') { ?>
              onsubmit="return repairItemFormValidate(document.getElementById('sttr_noofprod').value);"
          <?php } else { ?>
              onsubmit="return stockFormValidate(document.getElementById('sttr_noofprod').value);"
          <?php } ?> > 
        <input type="hidden" id="sttr_ratecut_norate_option" name="sttr_ratecut_norate_option" value="<?php echo $sttr_ratecut_norate_option; ?>"/>                       
              <?php
              //
              // START CODE TO INCLUDE FOR JS CALCULATIONS @PRIYANKA-03MAY18
              include $_SESSION['documentRootIncludePhp'] . '/stock/omStockRateSetupFile.php';
              // END CODE TO INCLUDE FOR JS CALCULATIONS @PRIYANKA-03MAY18
              //
              $mainStockCount = 0;
              //
              //echo '<br/>$sttr_id:' . $sttr_id . '<br />';
              //echo '<br/>$sttr_sttr_id:' . $sttr_sttr_id . '<br />';
              //echo '<br/>$sttr_sttrin_id:' . $sttr_sttrin_id . '<br />';
              //echo '<br/>$prevProductPanel :' . $prevProductPanel . '<br />';
              //echo '<br/>$sameProduct :' . $sameProduct . '<br />';
              //echo '$sttr_trans_id @%==%@ ' . $sttr_trans_id . '<br />';
              //echo '$sttrTransId @%==%@ ' . $sttrTransId . '<br />';
              //                                                                       
              //if ($operation == 'update') {
              // START CODE TO GET stock count
              //
              /* START CODE FOR SAME PRODUCT BUTTON WORKING @AUTHOR:MADHUREE-25MARCH2020 */
              if (($prevProductPanel != '' || $prevProductPanel != NULL) && ($sameProduct == 'YES') && ($operation == 'insert')) {
                  //
                  if ($transType == '') {
                      $transType = $transactionType;
                  }
                  //
                  if ($transType == '') {
                      $transType = 'TAG';
                  }
                  //
                  $qSelectMainStock = "SELECT sttr_item_category,sttr_item_name,sttr_item_pre_id,sttr_size,"
                          . "sttr_purity_ct,sttr_purity,sttr_item_id,sttr_product_purchase_rate,"
                          . "sttr_product_sell_rate,sttr_quantity,sttr_wastage,sttr_cust_wastage,sttr_hsn_no,"
                          . "sttr_lab_charges, sttr_making_charges, sttr_making_charges_type, "
                          . "sttr_other_charges_by,sttr_cust_wastg_by,"
                          . "sttr_value_added_by,sttr_mkg_charges_by,sttr_final_val_by,sttr_final_valuation_by"
                          . " FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                          . "AND sttr_panel_name = '$prevProductPanel' AND sttr_main_entry='M' "
                          //CHANGED PURBYSUPP TO STOCK @AUTH:MADHUREE-23MARCH2020
                          . "AND sttr_transaction_type='$transType' AND sttr_status NOT IN('SOLDOUT') "
                          //PURBYSUPP TYPE AND sttr_status ADDED FOR HIDING MULTIPLES DIVISION ON SELL PANEL @AUTHOR:MADHUREE-31JAN2020 
                          . "ORDER BY sttr_id DESC LIMIT 0,1";
                  /* END CODE FOR SAME PRODUCT BUTTON WORKING @AUTHOR:MADHUREE-25MARCH2020 */
                  //
              } else if ($operation == 'update' && ($transType == 'sell' ||
                      $transType == 'RepairItem' || $transType == 'newOrder' ||
                      $transType == 'ESTIMATE' || $transType == 'APPROVAL')) {
                  //
                  //$options = 1;
                  $qSelectMainStock = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                          . "AND sttr_sttrin_id = '$sttr_sttrin_id' AND sttr_main_entry='M' "
                          . "AND sttr_transaction_type = '$transType' "
                          . "ORDER BY sttr_id ASC";
                  //
                  /* START CODE FOR GETTING DETAILS AT THE TIME OF TAGGING FOR WHOLESALE PURCHASE @AUTHOR:MADHUREE-25MARCH2020 */
              } else if ($stockIframe == 'Y' && ($transType == '')) {
                  //
                  //$options = 1;
                  $qSelectMainStock = "SELECT sttr_item_category,sttr_item_name,sttr_item_pre_id,sttr_size,"
                          . "sttr_purity_ct,sttr_purity,sttr_item_id,sttr_product_purchase_rate,"
                          . "sttr_product_sell_rate FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                          . "AND sttr_id = '$sttr_id' AND sttr_main_entry='M' " //CHANGED PURBYSUPP TO STOCK @AUTH:MADHUREE-23MARCH2020
                          . "AND sttr_transaction_type='PURBYSUPP' AND sttr_status NOT IN('SOLDOUT') "//PURBYSUPP TYPE AND sttr_status ADDED FOR HIDING MULTIPLES DIVISION ON SELL PANEL @AUTHOR:MADHUREE-31JAN2020 
                          . "ORDER BY sttr_id ASC";
                  /* END CODE FOR GETTING DETAILS AT THE TIME OF TAGGING FOR WHOLESALE PURCHASE @AUTHOR:MADHUREE-25MARCH2020 */
                  //
              } else if ($stockIframe == 'Y' || ($transType == 'sell' ||
                      $transType == 'ESTIMATE' || $transType == 'APPROVAL')) {
                  //
                  //$options = 1;
                  $qSelectMainStock = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                          . "AND sttr_sttrin_id = '$sttr_sttrin_id' AND sttr_main_entry='M' " //CHANGED PURBYSUPP TO STOCK @AUTH:MADHUREE-23MARCH2020
                          . "AND sttr_transaction_type NOT IN('sell','ESTIMATE','APPROVAL','STOCK') AND sttr_status NOT IN('SOLDOUT') "//PURBYSUPP TYPE AND sttr_status ADDED FOR HIDING MULTIPLES DIVISION ON SELL PANEL @AUTHOR:MADHUREE-31JAN2020 
                          . "ORDER BY sttr_id ASC";
                  //
              } else if ($transType == 'PURBYSUPP') {
                  //
                  //$options = 2;
                  $qSelectMainStock = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                          . "AND sttr_sttrin_id = '$sttr_sttrin_id' AND (sttr_sttr_id IS NULL OR sttr_sttr_id='') "
                          . "AND sttr_transaction_type = '$transType' ORDER BY sttr_id ASC";
                  //
              } else if ($sttr_status_tag == 'Y') {
                  //
                  //$options = 3;
                  $qSelectMainStock = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                          . "AND sttr_id = '$sttr_id' "
                          . "AND sttr_main_entry='M' "
                          . "AND sttr_transaction_type != 'sell' "
                          . "ORDER BY sttr_id ASC";
                  //
              } else if ($transType == 'ItemReturn') {
                  //
                  $qSelectMainStock = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                          . "AND sttr_sttrin_id = '$sttr_sttrin_id' "
                          . "AND sttr_main_entry = 'M' "
                          . "AND sttr_transaction_type = 'sell' "
                          . "ORDER BY sttr_id ASC";
                  //
              } else if ($transType == 'PurchaseReturn') {
                  //
                  $qSelectMainStock = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                          . "AND sttr_id = '$sttr_id' AND sttr_sttrin_id = '$sttr_sttrin_id' "
                          . "AND sttr_transaction_type IN ('PURBYSUPP', 'TAG', 'PURONCASH') "
                          . "AND sttr_status IN ('PaymentDone', 'PaymentPending', 'TAG', 'Available', 'EXISTING') "
                          . "ORDER BY sttr_id ASC";
                  //
              } else if ($transType == 'RepairItem' || $transType == 'newOrder') {
                  //
                  $qSelectMainStock = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                          . "AND sttr_id = '$sttr_id' "
                          . "AND sttr_transaction_type NOT IN ('sell', 'ESTIMATE', 'APPROVAL', 'STOCK') "
                          . "AND sttr_status NOT IN ('DELETED') "
                          . "ORDER BY sttr_id ASC";
                  //
              } else {
                  //
                  //$options = 3;
                  $qSelectMainStock = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                          . "AND sttr_sttrin_id = '$sttr_sttrin_id' "
                          . "AND sttr_main_entry='M' "
                          . "AND sttr_transaction_type != 'sell' "
                          . "ORDER BY sttr_id ASC";
                  //
              }
              //
              //echo '<br/>$operation:' . $operation . '<br />';
              //echo '<br/>$mainStockCount:' . $mainStockCount . '<br />';
              //echo '<br/>$qSelectMainStock:' . $qSelectMainStock . '<br />';
              //echo '<br/>$operation:' . $operation . '<br />';
              //echo '<br/>$mainStockCount:' . $mainStockCount . '<br />';
              //echo '<br/>$qSelectMainStock:' . $qSelectMainStock . '<br />';
              //echo '<br/>$qSelectMainStock:' . $qSelectMainStock . '<br />';
              //
              $resSelMainStock = mysqli_query($conn, $qSelectMainStock);
              $rowMainStockCount = mysqli_num_rows($resSelMainStock);
              $sttr_noofprod_main = $rowMainStockCount - 1; // Main no of products
              //
              if ($sttr_noofprod_main == -1) {
                  $sttr_noofprod_main = 0;
              }
              //
              //echo '<br/>$rowMainStockCount = ' . $rowMainStockCount . '<br />'; 
              //
              while ((($rowMainStock = mysqli_fetch_assoc($resSelMainStock)) &&
              ($operation == 'update' || $transType == 'sell' ||
              $transType == 'RepairItem' || $transType == 'newOrder' ||
              //CODE ADDED FOR SAME PRODUCT BUTTON WORKING@AUTHOR:MADHUREE-26MARCH2020  
              (($transType == 'TAG' || $transType == 'EXISTING') &&
              $prevProductPanel != '' && $sameProduct == 'YES') ||
              $transType == 'ESTIMATE' || $transType == 'APPROVAL' ||
              $transType == '' || $transType == 'ItemReturn' || $transType == 'PurchaseReturn')) ||
              // $transType == '' ADDED FOR GETTING DETAILS AT THE TIME OF TAGGING FOR WHOLESALE PURCHASE @AUTHOR:MADHUREE-25MARCH2020
              $mainStockCount == 0) {
                  //
                  $prodCount = NULL;
                  $subStockCount = 1;
                  //
                  //echo '$mainStockCount ==== ' . $mainStockCount . '<br />';
                  //
                  $sttr_id = $rowMainStock['sttr_id'];
                  //
                  //echo '$sttr_id ==== ' . $sttr_id . '<br />';
                  //
                  if ($transType == 'PURBYSUPP') {
                      //
                      $qSelectSubStock = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                              . "AND sttr_sttr_id = '$sttr_id' AND sttr_transaction_type = '$transType' "
                              . "AND sttr_main_entry!='M' "
                              . "ORDER BY sttr_id ASC";
                      //
                  } else if ($transType == 'ItemReturn') {
                      //
                      $qSelectSubStock = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                              . "AND ((sttr_sttr_id = '$rowMainStock[sttr_sttr_id]' AND sttr_indicator != 'stock' AND sttr_main_entry != 'M') "
                              . "OR (sttr_sttr_id = '$rowMainStock[sttr_sttr_id]' AND sttr_sttrin_id = '$rowMainStock[sttr_sttr_id]')) "
                              . "AND sttr_transaction_type = 'sell' "
                              . "ORDER BY sttr_id ASC";
                      //
                  } else if ($transType == 'sell' ||
                          $transType == 'ESTIMATE' || $transType == 'APPROVAL') {
                      //
                      $qSelectSubStock = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                              . "AND sttr_sttr_id = '$sttr_id' AND sttr_sttrin_id = '$sttr_sttrin_id' "
                              . "AND sttr_indicator!='stock' AND sttr_main_entry!='M' "
                              . "AND sttr_transaction_type NOT IN('sell','ESTIMATE','APPROVAL','STOCK') AND sttr_status NOT IN('SOLDOUT') "//PURBYSUPP TYPE AND sttr_status ADDED FOR HIDING MULTIPLES DIVISION ON SELL PANEL @AUTHOR:MADHUREE-31JAN2020 
                              . "ORDER BY sttr_id ASC";
                      //
                  } else if ($operation == 'update' && $transType == 'newOrder') {
                      //
                      $qSelectSubStock = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                              . "AND (sttr_sttr_id = '$sttr_id' OR sttr_sttrin_id = '$sttr_sttrin_id') "
                              . "AND sttr_indicator != 'stock' "
                              . "AND (sttr_trans_id != '' || sttr_trans_id != null) "
                              . "AND sttr_transaction_type NOT IN ('sell', 'ESTIMATE', 'APPROVAL', 'STOCK','EXISTING') "
                              . "AND sttr_status NOT IN ('SOLDOUT') "
                              . "ORDER BY sttr_id ASC";
                      //
                  } else if ($transType == 'RepairItem' || $transType == 'newOrder') {
                      //
                      $qSelectSubStock = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                              . "AND (sttr_sttr_id = '$sttr_id' OR sttr_sttrin_id = '$sttr_sttrin_id') "
                              . "AND sttr_indicator != 'stock' "
                              . "AND (sttr_transaction_type NOT IN ('sell', 'ESTIMATE', 'APPROVAL', 'STOCK') "
                              . "AND sttr_transaction_type IS NOT NULL AND sttr_transaction_type != '') "
                              . "AND sttr_status NOT IN ('DELETED') "
                              . "AND (sttr_sttr_id IS NOT NULL AND sttr_sttr_id != '' AND sttr_sttrin_id IS NOT NULL AND sttr_sttrin_id != '') "
                              . "ORDER BY sttr_id ASC";
                      //
                  } else {
                      //
                      $qSelectSubStock = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                              . "AND sttr_sttr_id = '$sttr_id' AND sttr_sttrin_id = '$sttr_sttrin_id' "
                              . "AND sttr_indicator!='stock' "
                              . "AND sttr_main_entry!='M' "
                              . "ORDER BY sttr_id ASC";
                      //
                  }
                  //
                  //    qecho '<br/>$qSelectSubStock:' . $qSelectSubStock . '<br />';
                  //
                  $resSelSubStock = mysqli_query($conn, $qSelectSubStock);
                  $rowSubStockCount = mysqli_num_rows($resSelSubStock);
                  //
                  $sttr_noofprod_sub = $rowSubStockCount; // Sub no of products
                  //
                  //echo '<br/>$rowSubStockCount:' . $rowSubStockCount;
                  //
                  //print_r($rowMainStock);
                  //
                  $setupPanelName = $mainPanelName;
                  //
                  //echo '$setupPanelName == ' . $setupPanelName . '<br/>';
                  //
                  //
                  if ($rowMainStockCount > 0 &&
                          ($operation == 'update' || $transType == 'sell' ||
                          $transType == 'RepairItem' || $transType == 'newOrder' ||
                          $transType == 'ESTIMATE' || $transType == 'APPROVAL' || $transType == '' ||
                          $transType == 'ItemReturn' || $transType == 'PurchaseReturn') ||
                          //CODE ADDED FOR SAME PRODUCT BUTTON WORKING@AUTHOR:MADHUREE-26MARCH2020
                          (($transType == 'TAG' || $transType == 'EXISTING') && $prevProductPanel != '' && $sameProduct == 'YES')) {
                      // $transType == '' ADDED FOR GETTING DETAILS AT THE TIME OF TAGGING FOR WHOLESALE PURCHASE @AUTHOR:MADHUREE-25MARCH2020
                      //
                      $mainProdCount = $mainStockCount;
                      //
                      //echo '<br/>$sttr_transaction_type 1 : ' . $sttr_transaction_type . '<br />';
                      //echo '<br/>$sttr_status 1 : ' . $sttr_status . '<br />';
                      //echo '<br/>$prodStatus 1 : ' . $prodStatus . '<br />';
                      //
                      foreach ($rowMainStock as $colName => $colValue) {
                          $$colName = $colValue;
                          //
                          //echo '$sttr_pre_invoice_no == ' . $sttr_pre_invoice_no . '<br />';
                          //echo '$sttr_invoice_no == ' . $sttr_invoice_no . '<br />';
                          //
                          if ($operation != 'update') {
                              //
                              if ($colName == 'sttr_transaction_type' && $transType != $sttr_transaction_type) {
                                  $sttr_transaction_type = $transType;
                              }
                              //
                              if ($colName == 'sttr_user_id') {
                                  $sttr_user_id = $userId;
                              }
                              //
                              if ($colName == 'sttr_indicator') {
                                  $sttr_indicator = $indicator;
                              }
                              //
                              /* START CODE FOR GETTING ITEM BARCODE FOR SAME PRODUCT @AUTHOR:MADHUREE-25MARCH2020 */
                              if ($colName == 'sttr_barcode' && ($prevProductPanel != '' && $sameProduct == 'YES')) {
                                  if ($sttr_barcode != '' || $sttr_barcode != null) {
                                      $sttr_barcode = $sttr_barcode + 1;
                                  }
                              }
                              /* END CODE FOR GETTING ITEM BARCODE FOR SAME PRODUCT @AUTHOR:MADHUREE-25MARCH2020 */
                              /* START CODE FOR GETTING ITEM ID FOR SELECTED PRODUCT AT TAGGING @AUTHOR:MADHUREE-25MARCH2020 */
                              if ($colName == 'sttr_item_id' && ($sameProduct == 'YES' || $sttr_item_id == '')) {
                                  if ($sttr_item_pre_id != '' || $sttr_item_pre_id != null) {
                                      parse_str(getTableValues("SELECT MAX(CAST(sttr_item_id AS SIGNED)) AS sttr_item_id FROM stock_transaction WHERE sttr_owner_id='$sessionOwnerId' AND sttr_item_pre_id='$sttr_item_pre_id' "));
                                      $sttr_item_id = $sttr_item_id + 1;
                                      //echo '$sttr_item_id : '.$sttr_item_id;
                                  } else {
                                      $sttr_item_id = 1;
                                  }
                              }
                              /* END CODE FOR GETTING ITEM ID FOR SELECTED PRODUCT AT TAGGING @AUTHOR:MADHUREE-25MARCH2020 */
                              //
                              //echo '<br/>$sttr_status 2 : ' . $sttr_status . '<br />';
                              //echo '<br/>$prodStatus 2 : ' . $prodStatus . '<br />';
                              //
                              if ($colName == 'sttr_status' && $prodStatus != $sttr_status) {
                                  //
                                  $sttr_status = $prodStatus;
                                  //
                                  //echo '<br/>$sttr_status * : ' . $sttr_status . '<br />';
                                  //echo '<br/>$prodStatus * : ' . $prodStatus . '<br />';
                              }
                              //
                              if ($colName == 'sttr_cust_wastage') {
                                  //
                                  //echo '$sttr_cust_wastage == ' . $sttr_cust_wastage . '<br />';
                              //
                              }
                              //
                              //echo '$sttr_wastage == ' . $sttr_wastage . '<br />';
                              //echo '$sttr_cust_wastage == ' . $sttr_cust_wastage . '<br />';
                              //echo '$sttr_cust_wastage_wt == ' . $sttr_cust_wastage_wt . '<br />';
                              //echo '$sttr_value_added == ' . $sttr_value_added . '<br />';
                              //
                              if ($colName == 'sttr_trans_id' && $transType == 'newOrder') {
                                  //
                                  //echo '$sttr_trans_id == ' . $sttr_trans_id . '<br />';
                                  //echo '$sttrTransId == ' . $sttrTransId . '<br />';
                                  //
                                  if ($sttr_trans_id == '' || $sttr_trans_id == NULL) {
                                      if ($sttrTransId != '' && $sttrTransId != NULL) {
                                          $sttr_trans_id = $sttrTransId;
                                      }
                                  }
                              }
                              //
                              if ($colName == 'sttr_sttr_id' &&
                                  $transType == 'newOrder' && $operation != 'update') {
                                  //
                                  //echo '$subColName == ' . $subColName . '<br />';
                                  //echo '$sttr_sttr_id == ' . $sttr_sttr_id . '<br />';
                                  //
                                    $sttr_sttr_id = NULL;
                                  //
                              }
                              //
                              if ($colName == 'sttr_sttrin_id' &&
                                  $transType == 'newOrder' && $operation != 'update') {
                                  //
                                  //echo '$subColName == ' . $subColName . '<br />';
                                  //echo '$sttr_sttrin_id == ' . $sttr_sttrin_id . '<br />';
                                  //
                                    $sttr_sttrin_id = NULL;
                                  //
                              }
                              //  
                              //  
                              // FOR NEW ORDER SEARCH ITEM DATE 
                              if ($colName == 'sttr_add_date' && $dateStr == 'Y' &&
                                  $transType == 'newOrder' && $operation != 'update') {
                                  $todayDate = date(d) . ' ' . date(M) . ' ' . date(Y);
                                  $sttr_add_date = strtoupper($todayDate);
                              }
                              //
                          }
                          // Start code to get product details from master table
                          //
                          //echo '<br/>$sttr_transaction_type 2 : ' . $sttr_transaction_type . '<br />';
                          //echo '<br/>$sttr_status 3 : ' . $sttr_status . '<br />';
                          //echo '<br/>$prodStatus 3 : ' . $prodStatus . '<br />';
                      //
                      }
                      //
                      // =============================================================================================================== //
                      // START CODE TO GET LATEST RATE AT SELL PANEL ACCORDING TO METAL RATE ID OR METAL RATE @AUTHOR:MADHUREE-14DEC2020 //
                      // =============================================================================================================== //
                      //
                      //
                      //echo '<br/>$operation : ' . $operation . '<br />';
                      //echo '<br/>$transType : ' . $transType . '<br />';
                      //
                      //
                      if ($operation != 'update' &&
                              ($transType == 'sell' || $transType == 'ESTIMATE' || $transType == 'APPROVAL' ||
                              $transType == 'RepairItem' || $transType == 'newOrder' ||
                              $transType == 'ItemReturn' || $transType == 'PurchaseReturn')) {
                          //
                          $sttr_metal_type = $rowMainStock['sttr_metal_type'];
                          $sttr_metal_rate = $rowMainStock['sttr_metal_rate'];
                          $sttr_metal_rate_id = $rowMainStock['sttr_metal_rate_id'];
                          $sttr_product_purchase_rate = $rowMainStock['sttr_product_purchase_rate'];
                          //
                          if ($sttr_metal_rate == '' && $sttr_product_purchase_rate != '') {
                              $sttr_metal_rate = $sttr_product_purchase_rate;
                          }
                          //
                          //echo '<br/>$userMetalRate : ' . $userMetalRate . '<br />';
                          //                        
                          if ($userMetalRate != '' && $userMetalRate != NULL) {
                              $sttr_metal_rate = $userMetalRate;
                              $sttr_product_sell_rate = $userMetalRate;
                              $sttr_product_purchase_rate = $userMetalRate;
                          }
                          //
                          //echo '<br/>$sttr_metal_rate : ' . $sttr_metal_rate . '<br />';
                          //echo '<br/>$sttr_product_sell_rate : ' . $sttr_product_sell_rate . '<br />';
                          //echo '<br/>$sttr_product_purchase_rate : ' . $sttr_product_purchase_rate . '<br />';
                          //
                          if ($calculateItemRate != 'byPurity') {
                              $metalRatePurityCondStr = " and (met_rate_purity IS NULL OR met_rate_purity='' OR met_rate_purity='100') ";
                          }
                          //
                          if ($sttr_metal_rate == '' || $sttr_metal_rate == NULL) {
                              parse_str(getTableValues("SELECT met_rate_metal_id, met_rate_value, met_rate_purity FROM metal_rates WHERE "
                                              . "met_rate_own_id = '$_SESSION[sessionOwnerId]' $metalRatePurityCondStr and "
                                              . "met_rate_metal_name = '$sttr_metal_type' "
                                              . "order by met_rate_ent_dat desc LIMIT 0, 1"));
                              //
                              if ($met_rate_metal_id != '' || $met_rate_metal_id != NULL) {
                                  $sttr_metal_rate_id = $met_rate_metal_id;
                              }
                              //
                              if ($met_rate_value != '' || $met_rate_value != NULL) {
                                  $sttr_product_sell_rate = $met_rate_value;
                              }
                          } else {
                              //
                              //echo '$sttr_metal_rate_id == ' . $sttr_metal_rate_id; 
                              //
                              if ($sttr_metal_rate_id != '') {
                                  parse_str(getTableValues("SELECT met_rate_value, met_rate_purity "
                                                  . "FROM metal_rates WHERE met_rate_own_id = '$_SESSION[sessionOwnerId]' $metalRatePurityCondStr "
                                                  . "and met_rate_metal_name = '$sttr_metal_type' "
                                                  . "and met_rate_metal_id = '$sttr_metal_rate_id' "
                                                  . "order by met_rate_ent_dat desc LIMIT 0, 1"));
                                  //
                                  if ($met_rate_value != '' || $met_rate_value != NULL) {
                                      if ($userMetalRate == '' || $userMetalRate == NULL) {
                                          $sttr_product_sell_rate = $met_rate_value;
                                      }
                                  }
                                  //
                              } else {
                                  parse_str(getTableValues("SELECT met_rate_metal_id, met_rate_value, met_rate_purity FROM metal_rates "
                                                  . "WHERE met_rate_own_id = '$_SESSION[sessionOwnerId]' $metalRatePurityCondStr "
                                                  . "and met_rate_metal_name = '$sttr_metal_type' and "
                                                  . "met_rate_value = '$sttr_metal_rate' "
                                                  . "order by met_rate_ent_dat asc LIMIT 0, 1"));
                                  //
                                  if ($met_rate_metal_id != '' && $sttr_metal_rate != $met_rate_value) {
                                      parse_str(getTableValues("SELECT met_rate_value, met_rate_purity "
                                                      . "FROM metal_rates WHERE met_rate_own_id = '$_SESSION[sessionOwnerId]' $metalRatePurityCondStr "
                                                      . "and met_rate_metal_name = '$sttr_metal_type' "
                                                      . "and met_rate_metal_id = '$sttr_metal_rate_id' "
                                                      . "order by met_rate_ent_dat desc LIMIT 0, 1"));
                                      //
                                      if ($met_rate_metal_id != '' || $met_rate_metal_id != NULL) {
                                          $sttr_metal_rate_id = $met_rate_metal_id;
                                      }
                                      //
                                      if ($met_rate_value != '' || $met_rate_value != NULL) {
                                          $sttr_product_sell_rate = $met_rate_value;
                                      }
                                  } else {
                                      parse_str(getTableValues("SELECT met_rate_value, met_rate_metal_id, met_rate_purity FROM metal_rates WHERE "
                                                      . "met_rate_own_id = '$_SESSION[sessionOwnerId]' $metalRatePurityCondStr and "
                                                      . "met_rate_metal_name = '$sttr_metal_type' "
                                                      . "order by met_rate_ent_dat desc LIMIT 0, 1"));


                                      if ($met_rate_value != '' || $met_rate_value != NULL) {
                                          $sttr_product_sell_rate = $met_rate_value;
                                      }
                                      //
                                      if ($met_rate_metal_id != '' || $met_rate_metal_id != NULL) {
                                          $sttr_metal_rate_id = $met_rate_metal_id;
                                      }
                                  }
                              }
                          }
                          //
                          $_REQUEST['dbName'] = $_SESSION['sessionUserDBName'];
                          $_REQUEST['dbUser'] = $_SESSION['sessionUserDBId'];
                          $_REQUEST['dbPass'] = $_SESSION['sessionUserDBPass'];
                          //
                          $_REQUEST['DB_HOST'] = $_SESSION['sessionUserDBHost'];
                          $_REQUEST['DB_DATABASE'] = $_SESSION['sessionUserDBName'];
                          $_REQUEST['DB_USER'] = $_SESSION['sessionUserDBId'];
                          $_REQUEST['DB_PASSWORD'] = $_SESSION['sessionUserDBPass'];
                          //
                          $_REQUEST['stockFunction'] = 'GetStockTransaction';
                          //
                          $_REQUEST['sttr_id'] = '';
                          //
                          if ($prevEntryByCustIdOption == 'YES') {
                              $_REQUEST['cust_id'] = $userId;
                          } else {
                              $_REQUEST['cust_id'] = '';
                          }
                          //
                          $_REQUEST['sttr_transaction_type'] = $transType;
                          //
                          if ($prevEntryByIndicator == 'Y') {
                              $_REQUEST['sttr_product_type'] = '';
                              $_REQUEST['sttr_item_category'] = '';
                          } else {
                              $_REQUEST['sttr_product_type'] = $rowMainStock['sttr_product_type'];
                              $_REQUEST['sttr_item_category'] = $rowMainStock['sttr_item_category'];
                          }
                          //
                          //echo '<br/>$prevEntryByIndicator : ' . $prevEntryByIndicator . '<br />';
                          //
                          //
                          $_REQUEST['last_prod'] = $prevEntryByIndicator;
                          //
                          //
                          $apiUrl = $_SESSION['sessionApiLink'] . "/stock/om_stock.php";
                          //
                          $apiPostFields = $_REQUEST;
                          //
                          $omAPIResult = omCallAPI($apiUrl, $apiPostFields);
                          //
                          $prevProdData = json_decode($omAPIResult, true);
                          //
                          for ($prevDataCounter = 0; $prevDataCounter < sizeof($prevProdData); $prevDataCounter++) {
                              //
                              if ($sttr_other_charges_by == '' || $sttr_other_charges_by == NULL) {
                                  $sttr_other_charges_by = $prevProdData[$prevDataCounter]['sttr_other_charges_by'];
                              }
                              //
                              if ($sttr_cust_wastg_by == '' || $sttr_cust_wastg_by == NULL) {
                                  $sttr_cust_wastg_by = $prevProdData[$prevDataCounter]['sttr_cust_wastg_by'];
                              }
                              //
                              if ($sttr_value_added_by == '' || $sttr_value_added_by == NULL) {
                                  $sttr_value_added_by = $prevProdData[$prevDataCounter]['sttr_value_added_by'];
                              }
                              //
                              if ($sttr_mkg_charges_by == '' || $sttr_mkg_charges_by == NULL) {
                                  $sttr_mkg_charges_by = $prevProdData[$prevDataCounter]['sttr_mkg_charges_by'];
                              }
                              //
                              if ($sttr_final_val_by == '' || $sttr_final_val_by == NULL) {
                                  $sttr_final_val_by = $prevProdData[$prevDataCounter]['sttr_final_val_by'];
                              }
                              //
                              if ($sttr_final_valuation_by == '' || $sttr_final_valuation_by == NULL) {
                                  $sttr_final_valuation_by = $prevProdData[$prevDataCounter]['sttr_final_valuation_by'];
                              }
                              //
                              //if ($sttr_making_charges_type == '' || $sttr_making_charges_type == NULL) {
                              //    $sttr_making_charges_type = $prevProdData[$prevDataCounter]['sttr_making_charges_type'];
                              //}
                          //
                          }
                      }
                      //
                      // ============================================================================================================= //
                      // END CODE TO GET LATEST RATE AT SELL PANEL ACCORDING TO METAL RATE ID OR METAL RATE @AUTHOR:MADHUREE-14DEC2020 //
                      // ============================================================================================================= //
                  //
                  }
                  //
                  ?>
                  <?php
                  //
                  //echo '<br/>$sttr_metal_rate @: ' . $sttr_metal_rate . '<br />';
                  //echo '<br/>$sttr_product_sell_rate @: ' . $sttr_product_sell_rate . '<br />';
                  //echo '<br/>$sttr_product_purchase_rate @: ' . $sttr_product_purchase_rate . '<br />';
                  //
                  //echo '$rowMainStockCount == ' . $rowMainStockCount . '<br />';
                  //echo '$mainStockCount == ' . $mainStockCount . '<br />';
                  //echo '$sttr_noofprod_main == ' . $sttr_noofprod_main . '<br />';
                  //echo '$mainProdCount == ' . $mainProdCount . '<br />';
                  //
                  if ($mainStockCount == 0) {
                      ?>
                <!-- In this parameter store the main product counter value -->
                <?php
                if (($operation == 'update' || $transType == 'sell' ||
                        $transType == 'ESTIMATE' || $transType == 'APPROVAL' ||
                        $transType == 'ItemReturn' || $transType == 'PurchaseReturn' || $transType == 'newOrder')) {
                    ?>
                    <input type="hidden" id="sttr_noofprod" name="sttr_noofprod" value="<?php echo $sttr_noofprod_main; ?>"/>
                <?php } else { ?> 
                    <input type="hidden" id="sttr_noofprod" name="sttr_noofprod" value="<?php echo $mainProdCount; ?>"/>
                    <?php
                }
                //
                //echo '$rowMainStockCount 2== ' . $rowMainStockCount . '<br />';
                //echo '$mainStockCount 2== ' . $mainStockCount . '<br />';
                //echo '$sttr_noofprod_main 2== ' . $sttr_noofprod_main . '<br />';
                //echo '$mainProdCount 2== ' . $mainProdCount . '<br />';
                //
                //echo '<br/>$sttr_transaction_type !!!!!!!!!!!!!!!!!!!!!! ' . $sttr_transaction_type . '<br />'; 
                //
                ?>
                    <div class="container-fluid">   
                <div class="row" >
                    <div class="col-md-12" style="padding:0;">
                        <!-- BEGIN SAMPLE FORM PORTLET -->
                        <div class="portlet" <?php if ($stockIframe == 'Y') { ?> style="background: #fcf3cf;" <?php } ?>>
                            <div id ="omStockTransFormDiv">
                                <img src="<?php echo $_SESSION['documentRoot']; ?>/images/spacer.gif" 
                                     onload="document.getElementById('prodDOBDay').focus();
                                     <?php if ($operation == 'update') { ?>
                                                         document.getElementById('same_product').disabled = false;
                                     <?php } ?>
                                     " style="position: absolute;"/>
                                     <?php
                                     if ($prodCount == '' || $prodCount == NULL || $prodCount == 0)
                                         include $_SESSION['documentRootIncludePhp'] . 'stock/omStockTransFormHeaderDiv.php';
                                     ?>
                                <div id ="omStockTransFormSubDiv">
                                    <?php
                                }
                                
                                ?>
                                <!-- ***********************************   -->    
                                <!-- Start code for Multiple Items in Loop -->
                                <!-- ***********************************   -->
                                <div id ="omStockTransFormSubDiv<?php echo $mainStockCount; ?>">
                                    <?php include $_SESSION['documentRootIncludePhp'] . 'stock/omStockTransFormSubDiv.php'; ?>
                                    <?php
                                    if ((($operation == 'update' && $transPanelName != 'PurchasePayUp') ||
                                            $transType == 'sell' || $transType == 'ESTIMATE' ||
                                            $transType == 'RepairItem' || $transType == 'newOrder' ||
                                            $transType == 'APPROVAL' || $transType == 'ItemReturn' || $transType == 'PurchaseReturn')) {
                                        //$subStockCount = $sttr_noofprod_sub;
                                        //echo '<br/>$subStockCount @@ : ' . $subStockCount . '<br />';
                                        //echo '<br/>$sttr_noofprod_sub @@ : ' . $sttr_noofprod_sub . '<br />';
                                        //if ($operation == 'update') {
                                        //START CODE TO GET stock count
                                        //                                   
                                        while (($rowSubStock = mysqli_fetch_assoc($resSelSubStock))) {
                                            //
                                            if ($rowSubStockCount > 0 && ($operation == 'update' || $transType == 'sell' ||
                                                    $transType == 'RepairItem' || $transType == 'newOrder' ||
                                                    $transType == 'ESTIMATE' || $transType == 'APPROVAL' ||
                                                    $transType == 'ItemReturn' || $transType == 'PurchaseReturn')) {
                                                //
                                                $prodCount = $subStockCount;
                                                //
                                                foreach ($rowSubStock as $subColName => $subColValue) {
                                                    //
                                                    $$subColName = $subColValue;
                                                    //                                                    
                                                    //echo '<br/>$subColValue : ' . $subColValue . '<br />';
                                                    //echo '<br/>$subColName : ' . $subColName . '<br />';
                                                    //echo '<br/>$$subColName : ' . $$subColName . '<br />';
                                                    //
                                                    //echo '<br/>$transType @@ : ' . $transType . '<br />';
                                                    //echo '<br/>$sttr_transaction_type @@ : ' . $sttr_transaction_type . '<br />';
                                                    //
                                                    if ($subColName == 'sttr_transaction_type' && $transType != $sttr_transaction_type) {
                                                        //
                                                        $sttr_transaction_type = $transType;
                                                        //
                                                    }
                                                    //
                                                    //echo '<br/>$prodStatus @@ : ' . $prodStatus . '<br />';
                                                    //echo '<br/>$sttr_status @@ : ' . $sttr_status . '<br />';
                                                    //
                                                    if ($subColName == 'sttr_status' && $prodStatus != $sttr_status) {
                                                        //
                                                        $sttr_status = $prodStatus;
                                                        //
                                                    }
                                                    //
                                                    //
                                                    //if ($subColName == 'sttr_indicator' && $transType == 'newOrder') {
                                                    //    echo '$sttr_indicator == ' . $sttr_indicator . '<br />';
                                                    //}
                                                    //
                                                    //
                                                    //echo '$subColName == ' . $subColName . '<br />';
                                                    //echo '$transType == ' . $transType . '<br />';
                                                    //echo '$sttr_product_type == ' . $sttr_product_type . '<br />';
                                                    //
                                                    //
                                                    if ($subColName == 'sttr_indicator' && $transType == 'newOrder' &&
                                                            ($sttr_product_type == '' || $sttr_product_type == NULL)) {
                                                        //
                                                        //echo '$sttr_indictaor 1== ' . $sttr_indictaor . '<br />';
                                                        //
                                                        if ($sttr_indicator == 'stockCrystal') {
                                                            $sttr_product_type = 'STONE';
                                                        }
                                                        //
                                                        //echo '$sttr_product_type == ' . $sttr_product_type . '<br />';
                                                    //
                                                    }
                                                    //
                                                    //
                                                    if ($subColName == 'sttr_indicator' && $transType == 'newOrder' &&
                                                            ($sttr_metal_type == '' || $sttr_metal_type == NULL)) {
                                                        //
                                                        //echo '$sttr_indictaor 2== ' . $sttr_indictaor . '<br />';
                                                        //
                                                        if ($sttr_indicator == 'stockCrystal') {
                                                            $sttr_metal_type = 'STONE';
                                                        }
                                                        //
                                                        //echo '$sttr_metal_type == ' . $sttr_metal_type . '<br />';
                                                    //
                                                    }
                                                    //
                                                    //echo '$sttr_indictaor == ' . $sttr_indictaor . '<br />';
                                                    //echo '$sttr_product_type == ' . $sttr_product_type . '<br />';
                                                    //echo '$sttr_metal_type == ' . $sttr_metal_type . '<br />';
                                                    //
                                                    if ($subColName == 'sttr_product_sell_rate' && $transType == 'newOrder' &&
                                                            ($sttr_product_sell_rate == '' || $sttr_product_sell_rate == NULL)) {
                                                        //
                                                        if ($sttr_sell_rate != '' && $sttr_sell_rate != NULL) {
                                                            $sttr_product_sell_rate = $sttr_sell_rate;
                                                            $sttr_product_sell_rate_type = $sttr_sell_rate_type;
                                                        }
                                                        //
                                                    }
                                                    //
                                                    //
                                                    //echo '$subColName == ' . $subColName . '<br />';
                                                    //echo '$sttr_trans_id ##== ' . $sttr_trans_id . '<br />';
                                                    //echo '$sttrTransId ##== ' . $sttrTransId . '<br />';
                                                    //
                                                    //
                                                    if ($subColName == 'sttr_trans_id' &&
                                                            $transType == 'newOrder' && $operation != 'update') {
                                                        //
                                                        //echo '$subColName == ' . $subColName . '<br />';
                                                        //echo '$sttr_trans_id == ' . $sttr_trans_id . '<br />';
                                                        //echo '$sttrTransId == ' . $sttrTransId . '<br />';
                                                        //
                                                        if ($sttr_trans_id == '' || $sttr_trans_id == NULL) {
                                                            if ($sttrTransId != '' && $sttrTransId != NULL) {
                                                                $sttr_trans_id = $sttrTransId;
                                                            }
                                                        }
                                                    }
                                                    //
                                                    //
                                                    if ($subColName == 'sttr_sttr_id' &&
                                                            $transType == 'newOrder' && $operation != 'update') {
                                                        //
                                                        //echo '$subColName == ' . $subColName . '<br />';
                                                        //echo '$sttr_sttr_id == ' . $sttr_sttr_id . '<br />';
                                                        //
                                                        $sttr_sttr_id = NULL;
                                                        //
                                                    }
                                                    //
                                                    if ($subColName == 'sttr_sttrin_id' &&
                                                            $transType == 'newOrder' && $operation != 'update') {
                                                        //
                                                        //echo '$subColName == ' . $subColName . '<br />';
                                                        //echo '$sttr_sttrin_id == ' . $sttr_sttrin_id . '<br />';
                                                        //
                                                        $sttr_sttrin_id = NULL;
                                                        //
                                                    }
                                                    //
                                                //
                                                }
                                                //
                                                //
                                                //echo '$sttr_wastage == ' . $sttr_wastage . '<br />';
                                                //echo '$sttr_cust_wastage == ' . $sttr_cust_wastage . '<br />';
                                                //echo '$sttr_cust_wastage_wt == ' . $sttr_cust_wastage_wt . '<br />';
                                                //echo '$sttr_value_added == ' . $sttr_value_added . '<br />';
                                                //
                                                //
                                                //echo '$sttr_panel_name @@== ' . $sttr_panel_name . '<br />';
                                                //
                                                //if ($transType == 'EXISTING')
                                                //    $setupPanelName = $sttr_panel_name;
                                                //else
                                                $setupPanelName = $sttr_panel_name;
                                                //
                                                //
                                                if ($rowSubStockCount > 0 && ($transType == 'RepairItem')) {
                                                    if ($sttr_panel_name == '' || $sttr_panel_name == NULL) {
                                                        $setupPanelName = 'CRYSTAL';
                                                        $sttr_panel_name = 'CRYSTAL';
                                                    }
                                                }
                                                //
                                                //
                                                if ($rowSubStockCount > 0 && ($transType == 'newOrder')) {
                                                    if ($sttr_panel_name == '' || $sttr_panel_name == NULL) {
                                                        $setupPanelName = 'CRYSTAL_ORDER';
                                                        $sttr_panel_name = 'CRYSTAL_ORDER';
                                                    }
                                                }
                                                //
                                                //
                                                //echo '$sttr_panel_name ##== ' . $sttr_panel_name . '<br />';
                                            //
                                                //
                                            }
                                            //
                                            //echo '$sttr_trans_id !!== ' . $sttr_trans_id . '<br />';
                                            //echo '$sttrTransId !!== ' . $sttrTransId . '<br />';
                                            //echo '$panelName == ' . $panelName . '<br />';
                                            //echo '$sttr_panel_name ##== ' . $sttr_panel_name . '<br />';
                                            //
                                            ?>
                                            <!-- ***********************************       -->    
                                            <!-- Start code for Multiple Sub Items in Loop -->
                                            <!-- ***********************************       -->
                                            <input type="hidden" id="sttr_noofsubprod" name="sttr_noofsubprod" value="<?php echo $sttr_noofprod_sub; ?>"/>
                                            <div id ="omStockTransFormSubDiv<?php echo $mainStockCount; ?><?php echo $subStockCount; ?>">
                                                <?php include $_SESSION['documentRootIncludePhp'] . 'stock/omStockTransFormSubDiv.php'; ?>
                                            </div>
                                            <!-- ***********************************     -->
                                            <!-- End code for Multiple Sub Items in Loop -->
                                            <!-- ***********************************     -->
                                            <?php
                                            $subStockCount++;
                                        }
                                    }
                                    //echo '$sttr_pre_invoice_no1 == ' . $sttr_pre_invoice_no . '<br />';
                                    //echo '$sttr_invoice_no1 == ' . $sttr_invoice_no . '<br />';
                                    $mainStockCount++;
                                    ?>
                                </div>
                                <?php
                                //echo '<br/>$mainStockCount:' . $mainStockCount . '<br />';
                            }
                            //
                            ?>
                            <!-- *********************************** -->
                            <!-- End code for Multiple Items in Loop -->
                            <!-- *********************************** -->
                            <?php //if ($mainStockCount == 0) {             ?>                            
                        </div>

                        <div style="border-bottom: 1px solid #ccc;margin-top: 10px;"></div>
                        <!--<div style="margin-top: 10px;text-align:right;" align="right" >-->
                            <table colspan="14" width="100%">
                                <tr>
                                    <td align="right">
                                        <table>
                                            <tr>
                                                <td style="text-align: right;font-size: 18px;display: inline;">
                                                    <span class="caption-subject font-dark bold uppercase">
                                                        <b style="color:#000">GRAND TOTAL    </b>           
                                                    </span> 
                                                </td>
                                                <td style="text-align: right;font-size: 18px;display: inline;">
                                                    <i class="fa fa-inr" style="font-size: 2rem; color: #007bff;position: absolute;margin: 6px 2px 4px 10px;"></i>
                                                    <input id="sttr_total_final_valuation" name="sttr_total_final_valuation" title="FINAL AMOUNT" placeholder="FINAL AMOUNT" type="text" class="form-control text-center font-dark " autocomplete="off" style="width:180px;height:28px;font-weight:bold;font-size:20px;" />
                                                </td>
                                                <?php  if (($transType == 'EXISTING' || $panelName == 'FINE_JEWELLERY_RETAIL_PUR_B2') && ($transType != 'sell')) {?>
                                                <td>
                                                    <i class="fa fa-inr" style="font-size: 2rem; color: #007bff;position: absolute;margin: 6px 2px 4px 10px;"></i>
                                                    <input id="sttr_total_sell_final_valuation" name="sttr_total_sell_final_valuation" title="FINAL SELL AMOUNT" placeholder="FINAL AMOUNT" type="text" class="form-control text-center font-dark " autocomplete="off" style="width:180px;height:28px;font-weight:bold;font-size:20px;" />
                                                </td>
                                                <?php } ?>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <?php
                            if (($transType == 'EXISTING' || $panelName == 'FINE_JEWELLERY_RETAIL_PUR_B2') ) {
//                                echo 'hii222';
                                ?>
                                <div id="sttr_total_sell_final_valuation_div" class="" style="display: inline;float: right; margin-left: 5px;">
                                </div>
                                <?php
                            }
                            ?>
                        <!--</div>-->
                        <div style="border-bottom: 1px solid #ccc;"></div>
                        <?php
                        //
                        //
                        if ($transType == 'ItemReturn' || $transType == 'PurchaseReturn') {
                            $sameProdButtonDisp = 'NO';
                            $purchaseOnCashButtonDisp = 'NO';
                            $helpButtonDisp = 'NO';
                            $addProdButtonLabel = 'SUBMIT';
                            $paymentPanelDisp = 'YES';
                        }
                        //
                        //
                        //echo '$sameProdButtonDisp @== ' . $sameProdButtonDisp . '<br />';
                        //echo '$purchaseOnCashButtonDisp @== ' . $purchaseOnCashButtonDisp . '<br />';
                        //echo '$helpButtonDisp @== ' . $helpButtonDisp . '<br />';
                        //echo '$addProdButtonLabel @== ' . $addProdButtonLabel . '<br />';
                        //
                        //
                        //if ($prodCount == '' || $prodCount == NULL || $prodCount == 0)
                        include $_SESSION['documentRootIncludePhp'] . 'stock/omStockTransFormButtonsDiv.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
                        </div>
        <?php
        //}
        ?>
    </form>
    <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%"> 
        <tr>
            <td align="center">
                <!-- ****************************************************************************************************************************
                     START CODE FOR PREVIOUS STOCK ADDED DETAILS @PRIYANKA-09MAY18
                    *******************************************************************************************************************************-->
                <div id="stockPreviousProdDetails" style="margin-top: 10px;margin-left: 2px;margin-right: 0px;">
                    <?php
                    //
                    //echo '$sttr_id == ' . $sttr_id . '<br />';
                    //
                    include $_SESSION['documentRootIncludePhp'] . 'stock/omPrevProdDetails.php';
                    //
                    ?>
                </div>
                <!-- ****************************************************************************************************************************
                     END CODE FOR PREVIOUS STOCK ADDED DETAILS @PRIYANKA-09MAY18
                *******************************************************************************************************************************-->
            </td>
        </tr>
        <?php
        if ($stockIframe == 'Y') {
            ?>
            <tr>
                <td align="center">
                    <!-- ****************************************************************************************************************************
                         START CODE FOR PREVIOUS STOCK ADDED DETAILS @PRIYANKA-09MAY18
                        *******************************************************************************************************************************-->
                    <div id="stockWholeSaleToRetailSummary" style="margin-top: 10px;margin-left: 2px;margin-right: 0px;">
                        <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%"> 
                            <tr>
                                <td align="center" colspan="3" width="160px" style="font-size:13px; font-weight: bold; color: #ba4a00; border-bottom: 1px solid;">PRODUCT DETAILS</td>
                                <td align="right" width="70px" style="font-size:13px; font-weight: bold; color: #ba4a00;border-bottom: 1px solid;">QTY</td>
                                <td align="right" width="72px" style="font-size:13px; font-weight: bold; color: #ba4a00;border-bottom: 1px solid;">GS WT</td>
                                <td align="right" width="70px" style="font-size:13px; font-weight: bold; color: #ba4a00;border-bottom: 1px solid;">NT WT</td>
                                <td align="right" width="78px" style="font-size:13px; font-weight: bold; color: #ba4a00;border-bottom: 1px solid;"></td>
                                <td align="right" width="70px" style="font-size:13px; font-weight: bold; color: #ba4a00;border-bottom: 1px solid;">FN WT</td>
                                <td align="right" width="160px" style="font-size:13px; font-weight: bold; color: #ba4a00;border-bottom: 1px solid;"></td>
                            </tr>
                            <?php
                            parse_str(getTableValues("SELECT sttr_product_type,sttr_item_category,sttr_item_name,"
                                            . "sttr_quantity,sttr_gs_weight,sttr_nt_weight,sttr_fine_weight "
                                            . "FROM stock_transaction WHERE sttr_id = '$wholeSaleListSttrId'"));
                            ?>
                            <tr>
                                <td align="center" colspan="3" width="160px" style="font-size:13px;  color: #000; border-bottom: 1px solid #ccc;"><?php echo $sttr_product_type . ' ' . $sttr_item_category . ' ' . $sttr_item_name; ?></td>
                                <td align="right" width="70px" style="font-size:13px;  color: #000;border-bottom: 1px solid #ccc;"><?php echo $sttr_quantity; ?></td>
                                <td align="right" width="72px" style="font-size:13px;  color: #000;border-bottom: 1px solid #ccc;"><?php echo decimalVal($sttr_gs_weight, 3); ?></td>
                                <td align="right" width="70px" style="font-size:13px;  color: #000;border-bottom: 1px solid #ccc;"><?php echo decimalVal($sttr_nt_weight, 3); ?></td>
                                <td align="right" width="78px" style="font-size:13px;  color: #000;border-bottom: 1px solid #ccc;"></td> 
                                <td align="right" width="70px" style="font-size:13px;  color: #000;border-bottom: 1px solid #ccc;"><?php echo decimalVal($sttr_fine_weight, 3); ?></td>
                                <td align="right" width="160px" style="font-size:13px;  color: #000;border-bottom: 1px solid #ccc;"></td>
                            </tr>
                            <?php
                            parse_str(getTableValues("SELECT sum(sttr_quantity) as sttr_quantity_sum, "
                                            . "sum(sttr_gs_weight) as sttr_gs_weight_sum, "
                                            . "sum(sttr_nt_weight) as sttr_nt_weight_sum, "
                                            . "sum(sttr_fine_weight) as sttr_fine_weight_sum "
                                            . "FROM stock_transaction WHERE sttr_sttr_id = '$wholeSaleListSttrId' "
                                            . "AND sttr_transaction_type='TAG'"));
                            ?>
                            <tr>
                                <td align="center" colspan="3" width="160px" style="font-size:13px;  color: #000; border-bottom: 1px solid #000;"><?php echo 'RETAIL PRODUCTS'; ?></td>
                                <td align="right" width="70px" style="font-size:13px;  color: #000;border-bottom: 1px solid #000;"><?php echo $sttr_quantity_sum; ?></td>
                                <td align="right" width="72px" style="font-size:13px;  color: #000;border-bottom: 1px solid #000;"><?php echo decimalVal($sttr_gs_weight_sum, 3); ?></td>
                                <td align="right" width="70px" style="font-size:13px;  color: #000;border-bottom: 1px solid #000;"><?php echo decimalVal($sttr_nt_weight_sum, 3); ?></td>
                                <td align="right" width="78px" style="font-size:13px;  color: #000;border-bottom: 1px solid #000;"></td>
                                <td align="right" width="70px" style="font-size:13px;  color: #000;border-bottom: 1px solid #000;"><?php echo decimalVal($sttr_fine_weight_sum, 3); ?></td>
                                <td align="right" width="160px" style="font-size:13px;  color: #000;border-bottom: 1px solid #000;"></td>
                            </tr>
                            <?php
                            $remaining_quantity = $sttr_quantity - $sttr_quantity_sum;
                            $remaining_gs_weight = $sttr_gs_weight - $sttr_gs_weight_sum;
                            $remaining_nt_weight = $sttr_nt_weight - $sttr_nt_weight_sum;
                            $remaining_fine_weight = $sttr_fine_weight - $sttr_fine_weight_sum;
                            ?>
                            <tr>
                                <td align="center" colspan="3" width="160px" style="font-size:13px; font-weight: bold; color: #000; border-bottom: 1px solid #000;"><?php echo 'REMAINING'; ?></td>
                                <td align="right" width="70px" style="font-size:13px; font-weight: bold; color: #000;border-bottom: 1px solid #000;"><?php echo $remaining_quantity; ?></td>
                                <td align="right" width="72px" style="font-size:13px; font-weight: bold; color: #000;border-bottom: 1px solid #000;"><?php echo decimalVal($remaining_gs_weight, 3); ?></td>
                                <td align="right" width="70px" style="font-size:13px; font-weight: bold; color: #000;border-bottom: 1px solid #000;"><?php echo decimalVal($remaining_nt_weight, 3); ?></td>
                                <td align="right" width="78px" style="font-size:13px; font-weight: bold; color: #000;border-bottom: 1px solid #000;"></td>
                                <td align="right" width="70px" style="font-size:13px; font-weight: bold; color: #000;border-bottom: 1px solid #000;"><?php echo decimalVal($remaining_fine_weight, 3); ?></td>
                                <td align="right" width="160px" style="font-size:13px; font-weight: bold; color: #000;border-bottom: 1px solid #000;"></td>
                            </tr>
                        </table>
                    </div>
                    <!-- ****************************************************************************************************************************
                         END CODE FOR PREVIOUS STOCK ADDED DETAILS @PRIYANKA-09MAY18
                    *******************************************************************************************************************************-->
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td align="right">
                <div id="StockResetButt"> 
                    <?php
                    //
                    //echo '$clickHereToResetButtonDisp @@== ' . $clickHereToResetButtonDisp . '<br />';
                    //
                    if ($transType == 'ItemReturn' || $transType == 'PurchaseReturn') {
                        $clickHereToResetButtonDisp = 'NO';
                    }
                    //
                    if ($clickHereToResetButtonDisp == 'YES' && $stockIframe != 'Y') {
                        //
                        //* **************************************************************************************
                        //* Start Input Button for Stock Reset
                        //* **************************************************************************************
                        // // This is the main division class for input filed
                        // 
                        //$inputMainDivId
                        //$inputMainDivClass = 'form-group col-sm-1';
                        //$inputMainDivStyle = 'width:auto;padding-left:0px;padding-right:0px;';
                        //$inputDivClass = 'input-icon';
                        //
                        // Input Box Type and Ids
                        $inputType = 'submit';
                        $inputIdButton = 'reset_product';
                        $inputNameButton = 'reset_product';
                        //$inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
                        //$inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
                        //
                        // This is the main class for input flied
                        $inputFieldClass = 'btn btn1 btn1Hover';
                        $inputStyle = 'height:30px;width:360px;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 5px;margin-bottom: 5px;text-align:center;color:white;';
                        $inputLabel = 'CLICK HERE TO ADD PRODUCTS INTO AVAILABLE LIST'; // Display Label below the text box
                        // This class is for Pencil Icon                                                           
                        $inputIconClass = 'fa fa-inr';
                        // 
                        // Place Holder inside input box
                        $inputPlaceHolder = 'CLICK HERE TO ADD PRODUCTS INTO AVAILABLE LIST';
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
                        $inputOnClickFun = 'resetProductList("' . $sttr_indicator . '");';
                        $inputDropDownCls = '';               // This is the main division class for drop down 
                        $inputselDropDownCls = '';            // This is class for selection in drop down
                        $inputMainClassButton = '';           // This is the main division for Button
                        // 
                        //* **************************************************************************************
                        //* End Input Area 
                        //* **************************************************************************************
                        include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                        //
                    }
                    ?>
                </div>
            </td>
        </tr>
        <?php
                                $check1gmwt = "SELECT omin_value FROM omindicators WHERE omin_option = 'check1gmconvertweight'";
                                $rescheck1gmwt = mysqli_query($conn, $check1gmwt);
                                $rowcheck1gmwt = mysqli_fetch_array($rescheck1gmwt);
                                $checkOnegmwt = $rowcheck1gmwt['omin_value'];
                                ?>
                                 <input type="hidden" id="checkarateonegm" name="checkarateonegm" value="<?php echo $checkOnegmwt; ?>" />

        <tr>
            <td align="center">
                <div id="StockResetButt"> 
                    <?php
                    //
                    //echo '<br/>$sttr_status  : ' . $sttr_status . '<br />';
                    //echo '<br/>$prodStatus : ' . $prodStatus . '<br />';
                    //echo '<br/>$operation : ' . $operation . '<br />';                    
                    //
                    if ($makeInvoiceButtonDisp == 'YES' && $noOfRows > 0) {
                        //
                        //* **************************************************************************************
                        //* Start Input Button for Stock Reset
                        //* **************************************************************************************
                        // // This is the main division class for input filed
                        // 
                        //$inputMainDivId
                        //$inputMainDivClass = 'form-group col-sm-1';
                        //$inputMainDivStyle = 'width:auto;padding-left:0px;padding-right:0px;';
                        //$inputDivClass = 'input-icon';
                        //
                        // Input Box Type and Ids
                        $inputType = 'submit';
                        $inputIdButton = 'reset_product';
                        $inputNameButton = 'reset_product';
                        //$inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
                        //$inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
                        //
                        // This is the main class for input flied
                        $inputFieldClass = 'btn btn-primary';
                        $inputStyle = 'height:26px;width:174px;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 5px;margin-bottom: 5px;text-align:center;color:white;';
                        //
                        if (($operation == 'update' && $sttr_status != 'PaymentPending' &&
                                ($prodStatus == NULL || $prodStatus == '')) ||
                                ($operation == 'update' && $prodStatus != 'PaymentPending' &&
                                ($sttr_status == NULL || $sttr_status == ''))) {
                            $inputLabel = 'UPDATE INVOICE'; // Display Label 
                        } else {
                            $inputLabel = 'MAKE ESTIMATE'; // Display Label 
                        }
                        //
                        // This class is for Pencil Icon                                                           
                        $inputIconClass = 'fa fa-inr';
                        // 
                        // Place Holder inside input box
                        if (($operation == 'update' && $sttr_status != 'PaymentPending' &&
                                ($prodStatus == NULL || $prodStatus == '')) ||
                                ($operation == 'update' && $prodStatus != 'PaymentPending' &&
                                ($sttr_status == NULL || $sttr_status == ''))) {
                            $inputPlaceHolder = 'UPDATE INVOICE';
                        } else {
                            $inputPlaceHolder = 'MAKE ESTIMATE';
                        }
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
                        $inputOnClickFun = 'makeInvoice("' . $userId . '", "' . $prodPreInvNo . '", "' . $prodInvNo . '", "' . $transPanelName . '", "' . $divName . '");';
                        $inputDropDownCls = '';               // This is the main division class for drop down 
                        $inputselDropDownCls = '';            // This is class for selection in drop down
                        $inputMainClassButton = '';           // This is the main division for Button
                        // 
                        //* **************************************************************************************
                        //* End Input Area 
                        //* **************************************************************************************
                        include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                        //
                    }
                    ?>
                </div>
            </td>
        </tr>
    </table>
</div>
<div id="setStockDataByMasterDataMainDiv"></div>
<?php
if ($stockPackingListImportPrintStatus === '' || $stockPackingListImportPrintStatus === NULL)
    $stockPackingListImportPrintStatus = $_REQUEST['stockPackingListImportPrintStatus'];
?>
<?php if ($stockPackingListImportPrintStatus == 'Y') { ?>
    <img src="<?php echo $documentRoot; ?>/images/spacer.gif" onload="loadImageForPRNFile()" class="noPrint" />
    <script>
        function loadImageForPRNFile() {
            setTimeout(function () {
                parent.location = 'localexplorer:C:/OMPRN/omprn.bat';
            }, 5000);
        }
    </script>
<?php } ?>