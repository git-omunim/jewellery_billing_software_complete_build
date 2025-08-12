<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
include_once 'conversions.php';
require_once 'ommpincr.php';
include 'ogiamtrts.php';
?>
<?php
//
//
//sprint_r($_REQUEST);die;
//
//
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$sellPanelName = trim($_POST['panelName']);
//
//echo '$sellPanelName=='.$sellPanelName.'<br>';
//
$autoEntry = trim($_POST['autoEntry']);
$newEntry = trim($_POST['newEntry']);
$redirectionPanelName = trim($_REQUEST['redirectionPanelName']);
$indicator = trim($_POST['indicator']);
//
//echo '$redirectionPanelName=='.$redirectionPanelName.'<br>';
//
//echo '$indicator=='.$indicator.'<br>';
//
// Start Code to Check Demo Mode
$qSelItemCount = "SELECT sttr_id FROM stock_transaction WHERE sttr_transaction_type IN ('sell','ESTIMATESELL') and sttr_owner_id='$_SESSION[sessionOwnerId]'"; //change table 25MAY16
$resItemCount = mysqli_query($conn, $qSelItemCount);
$totalItem = mysqli_num_rows($resItemCount);
//
//echo '<pre>';
//print_r($_REQUEST);
//echo '</pre>';
//
if ((($_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) ||
        ($_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO)) && $totalItem >= 10) {
    $message = "In Demo, You can not add more than five Items!";
    header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=False&message=' . $message);
}
// End Code to Check Demo Mode
else if ($_SESSION['sessionDongleStatus'] != NULL &&
        ((($_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) && $totalItem < 10) ||
        ((($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM) ||
        ($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD)) &&
        $_SESSION['sessionDongleStatus'] == $gbDongleRegStatus))) {

    $sellPanelName = trim($_POST['panelName']);
    $slPrPreInvoice = trim($_POST['sttr_pre_invoice_no']);
    $slPrInvoiceNo = trim($_POST['sttr_invoice_no']);
    $slPrCustomerId = trim($_POST['sttr_user_id']);
    $custId = trim($_POST['sttr_user_id']);

    $slPrId = trim($_POST['slPrId']);

    $slPrDOBDay = trim($_POST['slPrDOBDay']);
    $slPrDOBMonth = trim($_POST['slPrDOBMonth']);
    $slPrDOBYear = trim($_POST['slPrDOBYear']);
    $slPrSellDate = $slPrDOBDay . ' ' . $slPrDOBMonth . ' ' . $slPrDOBYear;
    $slPrFirmId = trim($_POST['firmId']);
    $slPrAccountId = trim($_POST['accountId']);
    $accountId = trim($_POST['sttr_account_id']);
    $slPrItemMetal = trim($_POST['sttr_metal_type']);
    $slPrItemName = trim($_POST['sttr_item_name']);
    $slPrItemCategory = trim($_POST['sttr_item_category']);
    $slPrItemPieces = trim($_POST['sttr_quantity']);
    $slPrItemGSW = trim($_POST['sttr_gs_weight']);
    $slPrItemGSWT = trim($_POST['sttr_gs_weight_type']);
    $slPrItemPKTW = trim($_POST['sttr_pkt_weight']);
    $slPrItemPKTWT = trim($_POST['sttr_pkt_weight_type']);
    $slPrItemNTW = trim($_POST['sttr_nt_weight']);
    $slPrItemNTWT = trim($_POST['sttr_nt_weight_type']);
    
    $imageLoadOption = $_POST['imageLoadOption'];
    $compressedImage = $_POST['compressedImage'];
    $compressedImageThumb = $_POST['compressedImageThumb'];
    $compressedImageSize = $_POST['compressedImageSize'];
    
    // Common Image file @Author:PRIYANKA -13-06-17 
    include 'omimgmsqlinj.php';
    //

    //echo '<br/>$sellPanelName: ' . $sellPanelName;
    
    //print_r($_REQUEST);

    if ($sellPanelName == 'SellDetUpPanel' || $sellPanelName == 'EstimateUpdate' || $sellPanelName == 'EstimatePayUp' ||
        $sellPanelName == 'SellPayUp' || $sellPanelName == 'ItemApprovalUp' || $sellPanelName == 'FINE_JEWELLERY_SELL_B2_UPDATE' || $sellPanelName == 'MetalValuationUp') {

        $divSubPanel = NULL;

        include 'omspiaupgoldval.php';
        
    } else {
        //
        $divSubPanel = NULL;
        //
        $todayDOBMonth = strtoupper(date(M));
        $currentFinancialDay = '01';
        $currentFinancialMonth = 'APR';
        if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR') {
            $currentFinancialYear = date(Y) - 1;
        } else {
            $currentFinancialYear = date(Y);
        }
        $currentFinancialYearDate = $currentFinancialDay . ' ' . $currentFinancialMonth . ' ' . $currentFinancialYear;
        //
        $nextFinancialDay = '01';
        $nextFinancialMonth = 'APR';
        if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR') {
            $nextFinancialYear = date(Y);
        } else {
            $nextFinancialYear = date(Y) + 1;
        }
        $nextFinancialYearDate = $nextFinancialDay . ' ' . $nextFinancialMonth . ' ' . $nextFinancialYear;
        //
        // CURRENT AND NEXT FINANCIAL YEAR DATE STR 
        $currentFinancialYearDateStr = strtotime($currentFinancialYearDate);
        $nextFinancialYearDateStr = strtotime($nextFinancialYearDate);
        //
        $qSelEntryExist = "SELECT utin_id FROM user_transaction_invoice where utin_owner_id='$sessionOwnerId' AND utin_pre_invoice_no='$slPrPreInvoice' AND utin_invoice_no='$slPrInvoiceNo' AND utin_firm_id='$slPrFirmId' AND $currentFinancialYearDateStr < UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) "
                . "AND UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) < $nextFinancialYearDateStr ";
        $resSelEntryExist = mysqli_query($conn, $qSelEntryExist);

        if (mysqli_fetch_array($resSelEntryExist, MYSQLI_ASSOC)) {
            $divSubPanel = 'InvAlreadyExists';
        } else {
            include 'omspiaadgoldval.php';
        }
    }
    //
    //
    $invoiceNumber = $slPrPreInvoice . " " . $slPrInvoiceNo;
    //
    //echo '$slPrPreInvoice == '.$slPrPreInvoice;
    //
    // Added code for Stock Transfer Panel Name @AUTHOR:PRIYANKA-11MAR2022 ----->
    $stockTransferPanelName = trim($_POST['stockTransferPanelName']);
    //
    //echo '$sellPanelName=='.$sellPanelName.'<br>';
    //
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) && $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        if ($sellPanelName == 'MetalValuationPayUp') {
            header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custId=' . $slPrCustomerId . '&panelDivName=SellPurchase' . '&mainPanel=StockPurchasePanel' . '&panelName=' . $sellPanelName . '&slPrId=' . $slPrId . '&redirectionPanelName=MetalValuationPayUp&divSubPanel=' . $divSubPanel);
        } else {
            header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custId=' . $slPrCustomerId . '&panelDivName=SellPurchase' . '&mainPanel=StockPurchasePanel&divSubPanel=' . $divSubPanel . '&accCrId=' . $accountId . '&redirectionPanelName=MetalValuation');
        }
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) && $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        if ($sellPanelName == 'MetalValuationPayUp') {
            header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custId=' . $slPrCustomerId . '&panelDivName=SellPurchase' . '&mainPanel=StockPurchasePanel' . '&panelName=' . $sellPanelName . '&slPrId=' . $slPrId . '&redirectionPanelName=MetalValuationPayUp');
        } else {
            header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custId=' . $slPrCustomerId . '&panelDivName=SellPurchase' . '&mainPanel=StockPurchasePanel&divSubPanel=' . $divSubPanel . '&accCrId=' . $accountId . '&redirectionPanelName=MetalValuation');
        }
        }
        else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) && $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        if ($sellPanelName == 'MetalValuation') {
            header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custId=' . $slPrCustomerId . '&panelDivName=SellPurchase' . '&mainPanel=StockPurchasePanel' . '&panelName=' . $sellPanelName . '&slPrId=' . $slPrId . '&redirectionPanelName=MetalValuationPayUp');
        } else {
            header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custId=' . $slPrCustomerId . '&panelDivName=SellPurchase' . '&mainPanel=StockPurchasePanel&divSubPanel=' . $divSubPanel . '&accCrId=' . $accountId . '&redirectionPanelName=MetalValuation');
        }
    }
}
?>