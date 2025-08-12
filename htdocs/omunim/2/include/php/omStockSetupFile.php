<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK SETUP OPTION FILE
 * **************************************************************************************
 * 
 * Created on AUG 14, 2021 8:43:06 PM
 *
 * @FileName: omStockSetupFile.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:

 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
$accFileName = $currentFileName;
include 'ommpemac.php';
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
?>
<?php
// *******************************************************************************************
// START CODE TO GET VALUE OF ADD STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *******************************************************************************************
//
$querystockMkgBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'stockMkgBy'";
$resstockMkgBy = mysqli_query($conn, $querystockMkgBy);
$rowstockMkgBy = mysqli_fetch_array($resstockMkgBy);
$stockMkgBy = $rowstockMkgBy['omly_value'];
//
// *****************************************************************************************
// END CODE TO GET VALUE OF ADD STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *****************************************************************************************
// *******************************************************************************************
// START CODE TO GET VALUE OF ADD STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *******************************************************************************************
//
$querystockCsWstgBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'stockCsWstgBy'";
$resstockCsWstgBy = mysqli_query($conn, $querystockCsWstgBy);
$rowstockCsWstgBy = mysqli_fetch_array($resstockCsWstgBy);
$stockCsWstgBy = $rowstockCsWstgBy['omly_value'];
//
// *****************************************************************************************
// END CODE TO GET VALUE OF ADD STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *****************************************************************************************
// *******************************************************************************************
// START CODE TO GET VALUE OF ADD STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *******************************************************************************************
//
$querystockFineWtBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'stockFineWtBy'";
$resstockFineWtBy = mysqli_query($conn, $querystockFineWtBy);
$rowstockFineWtBy = mysqli_fetch_array($resstockFineWtBy);
$stockFineWtBy = $rowstockFineWtBy['omly_value'];
//
// *****************************************************************************************
// END CODE TO GET VALUE OF ADD STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *****************************************************************************************
// *******************************************************************************************
// START CODE TO GET VALUE OF ADD STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *******************************************************************************************
//
$querystockValBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'stockValBy'";
$resstockValBy = mysqli_query($conn, $querystockValBy);
$rowstockValBy = mysqli_fetch_array($resstockValBy);
$stockValBy = $rowstockValBy['omly_value'];
//
// *****************************************************************************************
// END CODE TO GET VALUE OF ADD STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *****************************************************************************************
// *******************************************************************************************
// START CODE TO GET VALUE OF SELL STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *******************************************************************************************
//
$querysellMkgBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellMkgBy'";
$ressellMkgBy = mysqli_query($conn, $querysellMkgBy);
$rowsellMkgBy = mysqli_fetch_array($ressellMkgBy);
$sellMkgBy = $rowsellMkgBy['omly_value'];
//
// *****************************************************************************************
// END CODE TO GET VALUE OF SELL STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *****************************************************************************************
// *******************************************************************************************
// START CODE TO GET VALUE OF SELL STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *******************************************************************************************
//
$querysellCsWstgBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellCsWstgBy'";
$ressellCsWstgBy = mysqli_query($conn, $querysellCsWstgBy);
$rowsellCsWstgBy = mysqli_fetch_array($ressellCsWstgBy);
$sellCsWstgBy = $rowsellCsWstgBy['omly_value'];
//
// *****************************************************************************************
// END CODE TO GET VALUE OF SELL STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *****************************************************************************************
// *******************************************************************************************
// START CODE TO GET VALUE OF SELL STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *******************************************************************************************
//
$querysellFineWtBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellFineWtBy'";
$ressellFineWtBy = mysqli_query($conn, $querysellFineWtBy);
$rowsellFineWtBy = mysqli_fetch_array($ressellFineWtBy);
$sellFineWtBy = $rowsellFineWtBy['omly_value'];
//
// *****************************************************************************************
// END CODE TO GET VALUE OF SELL STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *****************************************************************************************
// *******************************************************************************************
// START CODE TO GET VALUE OF SELL STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *******************************************************************************************
//
$querysellValBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellValBy'";
$ressellValBy = mysqli_query($conn, $querysellValBy);
$rowsellValBy = mysqli_fetch_array($ressellValBy);
$sellValBy = $rowsellValBy['omly_value'];
//
// *****************************************************************************************
// END CODE TO GET VALUE OF SELL STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *******************************************************************************************
// START CODE TO GET VALUE OF PURCHASE STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *******************************************************************************************
//
$querypurchaseLbrBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'purchaseLbrBy'";
$respurchaseLbrBy = mysqli_query($conn, $querypurchaseLbrBy);
$rowpurchaseLbrBy = mysqli_fetch_array($respurchaseLbrBy);
$purchaseLbrBy = $rowpurchaseLbrBy['omly_value'];
//
// *****************************************************************************************
// END CODE TO GET VALUE OF PURCHASE STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *****************************************************************************************
// 
// *********************************************************************************************
// START CODE TO GET VALUE OF PURCHASE SUPPLIER WASATGE  OPTION @AUTHOR:MADHUREE-22SEPTEMBER2021
// *********************************************************************************************
//
$queryPurchaseWastageBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'purchaseWastageBy'";
$resPurchaseWastageBy = mysqli_query($conn, $queryPurchaseWastageBy);
$rowPurchaseWastageBy = mysqli_fetch_array($resPurchaseWastageBy);
$purchaseWastageBy = $rowPurchaseWastageBy['omly_value'];
// 
// *******************************************************************************************
// END CODE TO GET VALUE OF PURCHASE SUPPLIER WASATGE  OPTION @AUTHOR:MADHUREE-22SEPTEMBER2021
// *******************************************************************************************
//
// *******************************************************************************************
// START CODE TO GET VALUE OF PURCHASE STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *******************************************************************************************
//
$querypurchaseItemCalculation = "SELECT omly_value FROM omlayout WHERE omly_option = 'purchaseItemCalculation'";
$respurchaseItemCalculation = mysqli_query($conn, $querypurchaseItemCalculation);
$rowpurchaseItemCalculation = mysqli_fetch_array($respurchaseItemCalculation);
$purchaseItemCalculation = $rowpurchaseItemCalculation['omly_value'];
//
// *****************************************************************************************
// END CODE TO GET VALUE OF PURCHASE STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-15AUGUST2021
// *****************************************************************************************
//
// *******************************************************************************************
// START CODE TO GET VALUE OF ADD STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-05APR2022
// *******************************************************************************************
//
$querystockLbrBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'stockLbrBy'";
$resstockLbrBy  = mysqli_query($conn, $querystockLbrBy);
$rowstockLbrBy  = mysqli_fetch_array($resstockLbrBy);
$stockLbrBy  = $rowstockLbrBy['omly_value'];
//
// *****************************************************************************************
// END CODE TO GET VALUE OF ADD STOCK ITEM CALCULATION BY OPTION @AUTHOR:SIMRAN-05APR2022
// *****************************************************************************************
// ************************************************************************************************
// START CODE TO GET VALUE OF REVERSE CALCULATION LESS AMOUNT OPTION @AUTHOR:MADHUREE-30AUGUST2021
// ************************************************************************************************
//
$querySaleReverseCalByForLessAmt = "SELECT omly_value FROM omlayout WHERE omly_option = 'saleReverseCalByForLessAmt'";
$resSaleReverseCalByForLessAmt = mysqli_query($conn, $querySaleReverseCalByForLessAmt);
$rowSaleReverseCalByForLessAmt = mysqli_fetch_array($resSaleReverseCalByForLessAmt);
$saleReverseCalByForLessAmt = $rowSaleReverseCalByForLessAmt['omly_value'];
//
// *********************************************************************************************
// END CODE TO GET VALUE OF REVERSE CALCULATION LESS AMOUNT OPTION @AUTHOR:MADHUREE-30AUGUST2021
// *********************************************************************************************
//
// ************************************************************************************************
// START CODE TO GET VALUE OF REVERSE CALCULATION MORE AMOUNT OPTION @AUTHOR:MADHUREE-30AUGUST2021
// ************************************************************************************************
//
$querySaleReverseCalByForMoreAmt = "SELECT omly_value FROM omlayout WHERE omly_option = 'saleReverseCalByForMoreAmt'";
$resSaleReverseCalByForMoreAmt = mysqli_query($conn, $querySaleReverseCalByForMoreAmt);
$rowSaleReverseCalByForMoreAmt = mysqli_fetch_array($resSaleReverseCalByForMoreAmt);
$saleReverseCalByForMoreAmt = $rowSaleReverseCalByForMoreAmt['omly_value'];
//
// *********************************************************************************************
// END CODE TO GET VALUE OF REVERSE CALCULATION MORE AMOUNT OPTION @AUTHOR:MADHUREE-30AUGUST2021
// *********************************************************************************************
//
// *********************************************************************************************
// START CODE TO GET VALUE OF SALES MAKING CHARGES TYPE BY OPTION @AUTHOR:MADHUREE-28OCTOBER2021
// *********************************************************************************************
//
$querySaleMakingChargesTypeBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'saleMakingChargesTypeBy'";
$resSaleMakingChargesTypeBy = mysqli_query($conn, $querySaleMakingChargesTypeBy);
$rowSaleMakingChargesTypeBy = mysqli_fetch_array($resSaleMakingChargesTypeBy);
$saleMakingChargesTypeBy = $rowSaleMakingChargesTypeBy['omly_value'];
//
// *******************************************************************************************
// END CODE TO GET VALUE OF SALES MAKING CHARGES TYPE BY OPTION @AUTHOR:MADHUREE-28OCTOBER2021
// *******************************************************************************************
//
// ******************************************************************************************
// START CODE TO GET VALUE OF OLD METAL CALCULATION BY OPTION @AUTHOR:MADHUREE-25FEBRUARY2022
// ******************************************************************************************
//
$queryURDValuationBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'urdValuationBy'";
$resURDValuationBy = mysqli_query($conn, $queryURDValuationBy);
$rowURDValuationBy = mysqli_fetch_array($resURDValuationBy);
$urdValuationBy = $rowURDValuationBy['omly_value'];
//
// ****************************************************************************************
// END CODE TO GET VALUE OF OLD METAL CALCULATION BY OPTION @AUTHOR:MADHUREE-25FEBRUARY2022
// ****************************************************************************************
// //
// SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
// START CODE FOR OLD METAL CUSTMER PURCHASE SETTING BY FINAL VALUVATION @AUTHOR-YUVRAJ KAMBLE - 09122021
// SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
//
$selCustUrdPurValuationBy= "SELECT omly_value FROM omlayout WHERE omly_option = 'CustUrdPurValuationBy'";
$resCustUrdPurValuationBy = mysqli_query($conn, $selCustUrdPurValuationBy);
$rowCustUrdPurValuationBy = mysqli_fetch_array($resCustUrdPurValuationBy);
$CustUrdPurValuationBy = $rowCustUrdPurValuationBy['omly_value'];
//
// EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
// END CODE FOR OLD METAL CUSTMER PURCHASE SETTING BY FINAL VALUVATION @AUTHOR-YUVRAJ KAMBLE - 09122021
// EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//
//
//
// *************************************************************************************************************
// START CODE FOR SELL DISCOUNT ON TOTAL AMOUNT @PRIYANKA-26FEB2022
// *************************************************************************************************************
$sellDiscountBySetupPanelQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellDiscountBySetupPanel'";
$resSellDiscountBySetupPanel = mysqli_query($conn, $sellDiscountBySetupPanelQuery);
$rowSellDiscountBySetupPanel = mysqli_fetch_array($resSellDiscountBySetupPanel);
$sellDiscountBySetupPanel = $rowSellDiscountBySetupPanel['omly_value'];
// *************************************************************************************************************
// END CODE FOR SELL DISCOUNT ON TOTAL AMOUNT @PRIYANKA-26FEB2022
// *************************************************************************************************************
// 
// *******************************************************************************************
// START CODE TO SELL METAL RATE BY PURITY @SIMRAN26NOV2022
// *******************************************************************************************
//
$querysellMetalRateByPurity = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellMetalRateByPurity'";
$ressellMetalRateByPurity = mysqli_query($conn, $querysellMetalRateByPurity);
$rowsellMetalRateByPurity = mysqli_fetch_array($ressellMetalRateByPurity);
$sellMetalRateByPurity = $rowsellMetalRateByPurity['omly_value'];
//
// *****************************************************************************************
// END CODE TO SELL METAL RATE BY PURITY @SIMRAN26NOV2022
// *****************************************************************************************
//
$querysellStockByAddMetalRate = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellStockByAddMetalRate'";
$ressellStockByAddMetalRate = mysqli_query($conn, $querysellStockByAddMetalRate);
$rowsellStockByAddMetalRate = mysqli_fetch_array($ressellStockByAddMetalRate);
$sellStockByAddMetalRate = $rowsellStockByAddMetalRate['omly_value']; 
// *******************************************************************************************
// START CODE TO ADD STOCK METAL RATE BY PURITY @SIMRAN18MAY2023
// *******************************************************************************************
//
$queryaddStockMetalRateByPurity = "SELECT omly_value FROM omlayout WHERE omly_option = 'addStockMetalRateByPurity'";
$resaddStockMetalRateByPurity = mysqli_query($conn, $queryaddStockMetalRateByPurity);
$rowaddStockMetalRateByPurity = mysqli_fetch_array($resaddStockMetalRateByPurity);
$addStockMetalRateByPurity = $rowaddStockMetalRateByPurity['omly_value'];
//
// *****************************************************************************************
// END CODE TO ADD STOCK METAL RATE BY PURITY @SIMRAN18MAY2023
// *****************************************************************************************
//
//
// *************************************************************************************************************
// START CODE TO GET HALLMARKING CHARGES, TYPE AND TOTAL HALLMARKING CHARGES @PRIYANKA-23MAY2022
// *************************************************************************************************************
//
//
// FOR HALLMARKING CHARGES @PRIYANKA-23MAY2022
$hallmarkingChargesBySetupPanelQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'hallmarkingChargesBySetupPanel'";
$resHallmarkingChargesBySetupPanel = mysqli_query($conn, $hallmarkingChargesBySetupPanelQuery);
$rowHallmarkingChargesBySetupPanel = mysqli_fetch_array($resHallmarkingChargesBySetupPanel);
$hallmarkingChargesBySetupPanel = $rowHallmarkingChargesBySetupPanel['omly_value'];
//
//
// FOR HALLMARKING CHARGES TYPE @PRIYANKA-23MAY2022
$hallmarkingChargesTypeBySetupPanelQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'hallmarkingChargesTypeBySetupPanel'";
$resHallmarkingChargesTypeBySetupPanel = mysqli_query($conn, $hallmarkingChargesTypeBySetupPanelQuery);
$rowHallmarkingChargesTypeBySetupPanel = mysqli_fetch_array($resHallmarkingChargesTypeBySetupPanel);
$hallmarkingChargesTypeBySetupPanel = $rowHallmarkingChargesTypeBySetupPanel['omly_value'];
//
//
// FOR TOTAL HALLMARKING CHARGES @PRIYANKA-23MAY2022
$totalHallmarkingChargesBySetupPanelQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'totalHallmarkingChargesBySetupPanel'";
$resTotalHallmarkingChargesBySetupPanel = mysqli_query($conn, $totalHallmarkingChargesBySetupPanelQuery);
$rowTotalHallmarkingChargesBySetupPanel = mysqli_fetch_array($resTotalHallmarkingChargesBySetupPanel);
$totalHallmarkingChargesBySetupPanel = $rowTotalHallmarkingChargesBySetupPanel['omly_value'];
//
//
// FOR HALLMARKING CGST % @PRIYANKA-25MAY2022
$hallmarkingCGSTQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'hallmarkingCGST'";
$resCGSTQuery = mysqli_query($conn, $hallmarkingCGSTQuery);
$rowCGSTQuery = mysqli_fetch_array($resCGSTQuery);
$hallmarkingCGST = $rowCGSTQuery['omly_value'];
//
//
// FOR HALLMARKING SGST % @PRIYANKA-25MAY2022
$hallmarkingSGSTQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'hallmarkingSGST'";
$resSGSTQuery = mysqli_query($conn, $hallmarkingSGSTQuery);
$rowSGSTQuery = mysqli_fetch_array($resSGSTQuery);
$hallmarkingSGST = $rowSGSTQuery['omly_value'];
//
//
// FOR HALLMARKING IGST % @PRIYANKA-25MAY2022
$hallmarkingIGSTQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'hallmarkingIGST'";
$resIGSTQuery = mysqli_query($conn, $hallmarkingIGSTQuery);
$rowIGSTQuery = mysqli_fetch_array($resIGSTQuery);
$hallmarkingIGST = $rowIGSTQuery['omly_value'];
//
//
// *************************************************************************************************************
// END CODE TO GET HALLMARKING CHARGES, TYPE AND TOTAL HALLMARKING CHARGES @PRIYANKA-23MAY2022
// *************************************************************************************************************
// *************************************************************************************************************
// START CODE FOR OPTION ON LAYOUT FOR SELL CUSTOMER WASTAGE @SIMRAN:12MAY2023
// *************************************************************************************************************
$setSellCustWastgQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellCustWastg'";
$resSetSellCustWastg = mysqli_query($conn, $setSellCustWastgQuery);
$rowSetSellCustWastg = mysqli_fetch_array($resSetSellCustWastg);
$setSellCustWastg = $rowSetSellCustWastg['omly_value'];
// *************************************************************************************************************
// END CODE FOR OPTION ON LAYOUT FOR SELL CUSTOMER WASTAGE @SIMRAN:12MAY2023
// *************************************************************************************************************
// START CODE FOR OPTION ON LAYOUT FOR ADD STOCK + KEY JRNL ENTRY @SIMRAN:22SEPT2023
// *************************************************************************************************************
$setaddStockPlusKeyJrnlEntryQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'addStockPlusKeyJrnlEntry'";
$resaddStockPlusKeyJrnlEntry = mysqli_query($conn, $setaddStockPlusKeyJrnlEntryQuery);
$rowaddStockPlusKeyJrnlEntry = mysqli_fetch_array($resaddStockPlusKeyJrnlEntry);
$addStockPlusKeyJrnlEntry = $rowaddStockPlusKeyJrnlEntry['omly_value'];

$setaddStockPlusKeyJrnlEntryQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'addStockFinalFinewt'";
$resaddStockPlusKeyJrnlEntry = mysqli_query($conn, $setaddStockPlusKeyJrnlEntryQuery);
$rowaddStockPlusKeyJrnlEntry = mysqli_fetch_array($resaddStockPlusKeyJrnlEntry);
$addStockFinalFinewt = $rowaddStockPlusKeyJrnlEntry['omly_value'];
// *************************************************************************************************************
// END CODE FOR OPTION ON LAYOUT FOR ADD STOCK + KEY JRNL ENTRY @SIMRAN:22SEPT2023
// *************************************************************************************************************
// ************************************************************************************************************
$setaddHallamrkChargOnSilverItem = "SELECT omly_value FROM omlayout WHERE omly_option = 'addHallamrkChargOnSilverItem'";
$resaddHallamrkChargOnSilverItem = mysqli_query($conn, $setaddHallamrkChargOnSilverItem);
$rowaddHallamrkChargOnSilverItem = mysqli_fetch_array($resaddHallamrkChargOnSilverItem);
$addHallamrkChargOnSilverItem = $rowaddHallamrkChargOnSilverItem['omly_value'];
// *************************************************************************************************************
// START CODE TO GET HALLMARKING GST APPLY ON WHICH PANELS @PRIYANKA-13JUNE2022
// *************************************************************************************************************
//
//
//start code for purcahse final fine weight option @omkar kalbhor
$querypurchFineWtBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'purchaseFinalFineWtBy'";
$respurchFineWtBy = mysqli_query($conn, $querypurchFineWtBy);
$rowpurchFineWtBy = mysqli_fetch_array($respurchFineWtBy);
$purchFineWtBy = $rowpurchFineWtBy['omly_value'];

// FOR HALLMARKING GST APPLY ON ADD STOCK PANEL @PRIYANKA-13JUNE2022
$hallmarkingGSTAddStockQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'hallmarkingGSTAddStock'";
$resGSTAddStockQuery = mysqli_query($conn, $hallmarkingGSTAddStockQuery);
$noOfRowsGSTAddStock = mysqli_num_rows($resGSTAddStockQuery);
//
$queryratenortecutoption = "SELECT omly_value FROM omlayout WHERE omly_option = 'ratenortecutoption'";
$resratenortecutoption = mysqli_query($conn, $queryratenortecutoption);
$rowUratenortecutoption = mysqli_fetch_array($resratenortecutoption);
$ratenortecutoption = $rowUratenortecutoption['omly_value'];
//
if ($noOfRowsGSTAddStock == 0) {
    //
    $hallmarkingGSTAddStockInsertQuery = "INSERT INTO omlayout (omly_own_id, omly_option, omly_value) "
                                       . "VALUES ('$_SESSION[sessionOwnerId]', 'hallmarkingGSTAddStock', 'NO') ";
    //
    if (!mysqli_query($conn,$hallmarkingGSTAddStockInsertQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
    parse_str(getTableValues("SELECT omly_value AS hallmarkingGSTAddStock FROM omlayout "
                           . "WHERE omly_option = 'hallmarkingGSTAddStock'"));
    //
} else {
    //
    $rowGSTAddStockQuery = mysqli_fetch_array($resGSTAddStockQuery);
    //
    $hallmarkingGSTAddStock = $rowGSTAddStockQuery['omly_value'];
    //
}
//
//
//
// FOR HALLMARKING GST APPLY ON SELL PANEL @PRIYANKA-13JUNE2022
$hallmarkingGSTSellQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'hallmarkingGSTSell'";
$resGSTSellQuery = mysqli_query($conn, $hallmarkingGSTSellQuery);
$noOfRowsGSTSell = mysqli_num_rows($resGSTSellQuery);
//
//
if ($noOfRowsGSTSell == 0) {
    //
    $hallmarkingGSTSellInsertQuery = "INSERT INTO omlayout (omly_own_id, omly_option, omly_value) "
                                   . "VALUES ('$_SESSION[sessionOwnerId]', 'hallmarkingGSTSell', 'YES') ";
    //
    if (!mysqli_query($conn,$hallmarkingGSTSellInsertQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
    parse_str(getTableValues("SELECT omly_value AS hallmarkingGSTSell FROM omlayout "
                           . "WHERE omly_option = 'hallmarkingGSTSell'"));
    //
} else {
    //
    $rowGSTSellQuery = mysqli_fetch_array($resGSTSellQuery);
    //
    $hallmarkingGSTSell = $rowGSTSellQuery['omly_value'];
    //
}
//
//
//
// FOR HALLMARKING GST APPLY ON PURCHASE PANEL @PRIYANKA-13JUNE2022
$hallmarkingGSTPurchaseQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'hallmarkingGSTPurchase'";
$resGSTPurchaseQuery = mysqli_query($conn, $hallmarkingGSTPurchaseQuery);
$noOfRowsGSTPurchase = mysqli_num_rows($resGSTPurchaseQuery);
//
//
if ($noOfRowsGSTPurchase == 0) {
    //
    $hallmarkingGSTPurchaseInsertQuery = "INSERT INTO omlayout (omly_own_id, omly_option, omly_value) "
                                       . "VALUES ('$_SESSION[sessionOwnerId]', 'hallmarkingGSTPurchase', 'YES') ";
    //
    if (!mysqli_query($conn,$hallmarkingGSTPurchaseInsertQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
    parse_str(getTableValues("SELECT omly_value AS hallmarkingGSTPurchase FROM omlayout "
                           . "WHERE omly_option = 'hallmarkingGSTPurchase'"));
    //
} else {
    //
    $rowGSTPurchaseQuery = mysqli_fetch_array($resGSTPurchaseQuery);
    //
    $hallmarkingGSTPurchase = $rowGSTPurchaseQuery['omly_value'];
    //
}
//
// *************************************************************************************************************
// END CODE TO GET HALLMARKING GST APPLY ON WHICH PANELS @PRIYANKA-13JUNE2022
// *************************************************************************************************************
//
//
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;margin-bottom: 15px;">
    <tr>
        <td class="textLabel18CalibriNormal" colspan="5">
            <div style="margin-left:10px;font-weight:bold;font-size:18px;">ADD STOCK OPTIONS</div>
        </td>
    </tr>
    <tr>
        <td class="textLabel18CalibriNormal" colspan="5">
            <div class="hrGrey" style="margin-top:5px;margin-bottom:10px;"></div>
        </td>
    </tr>
    <tr>
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" 
                                        style="background-color:#edf2ff;border-bottom:thin solid;border-color: #F9F9F9;color:#025cbc;padding-top:5px;padding-bottom:5px;">
                                        ADD STOCK MAKING CHARGES
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="ADD STOCK MAKING CHARGE CALCULATION BY STOCK FINAL FINE WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;margin-top:10px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="stockMkgBy" name="stockMkgBy" 
                                                           value="mkgByFFineWt" onchange="setLayoutFieldInDb('stockMkgBy', this.value);"
                                                           <?php
                                                           if ($stockMkgBy == 'mkgByFFineWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINAL FINE WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="ADD STOCK MAKING CHARGE CALCULATION BY STOCK FINE WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="stockMkgBy" name="stockMkgBy" 
                                                           value="mkgByFineWt" onchange="setLayoutFieldInDb('stockMkgBy', this.value);"
                                                           <?php
                                                           if ($stockMkgBy == 'mkgByFineWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINE WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="ADD STOCK MAKING CHARGE CALCULATION BY STOCK NET WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="stockMkgBy" name="stockMkgBy" 
                                                           value="mkgByNetWt" onchange="setLayoutFieldInDb('stockMkgBy', this.value);"
                                                           <?php
                                                           if ($stockMkgBy == 'mkgByNetWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY NET WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="ADD STOCK MAKING CHARGE CALCULATION BY STOCK GROSS WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="stockMkgBy" name="stockMkgBy" 
                                                           value="mkgByGrossWt" onchange="setLayoutFieldInDb('stockMkgBy', this.value);"
                                                           <?php
                                                           if ($stockMkgBy == 'mkgByGrossWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY GROSS WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table border="0" cellspacing="0" cellpadding="0"  align="center" width="100%">
                    <tr>
                        <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                            ADD STOCK WASTAGE
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="ADD STOCK CUST WSTG CALCULATION BY STOCK FINE WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;padding-top:10px;">
                                        <input type="RADIO" id="stockCsWstgBy" NAME="stockCsWstgBy" value="custWastgByFineWt" onchange="setLayoutFieldInDb('stockCsWstgBy', this.value);"
                                        <?php
                                        if ($stockCsWstgBy == 'custWastgByFineWt') {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;FINE WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="ADD STOCK CUST WSTG CALCULATION BY NET WT!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="stockCsWstgBy" NAME="stockCsWstgBy" value="custWastgByNetWt" onchange="setLayoutFieldInDb('stockCsWstgBy', this.value);"
                                        <?php
                                        if ($stockCsWstgBy == 'custWastgByNetWt') {
                                            echo 'checked';
                                        } else
                                            echo '';
                                        ?>/>
                                    </td>
                                    <td align="right" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;NET WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="ADD STOCK CUST WSTG CALCULATION BY GROSS WT!">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="stockCsWstgBy" NAME="stockCsWstgBy" value="custWastgByGrossWt" onchange="setLayoutFieldInDb('stockCsWstgBy', this.value);"
                                        <?php
                                        if ($stockCsWstgBy == 'custWastgByGrossWt')
                                            echo 'checked';
                                        else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption stockSetOption">&nbsp;&nbsp;GROSS WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
           
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table border="0" cellspacing="0" cellpadding="0"  align="center" width="100%">
                    <tr>
                        <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                            ADD STOCK FINAL VALUATION
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="ADD STOCK FINAL CALCULATION BY FINAL FINE WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;padding-top:10px;">
                                        <input type="RADIO" id="stockValBy" NAME="stockValBy" value="byFFineWt" onchange="setLayoutFieldInDb('stockValBy', this.value);"
                                        <?php
                                        if ($stockValBy == 'byFFineWt') {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption stockSetOption">&nbsp;&nbsp;BY FINAL FINE WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="ADD STOCK FINAL CALCULATION BY FINE WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="stockValBy" NAME="stockValBy" value="byFineWt" onchange="setLayoutFieldInDb('stockValBy', this.value);"
                                        <?php
                                        if ($stockValBy == 'byFineWt') {
                                            echo 'checked';
                                        } else
                                            echo '';
                                        ?>/>
                                    </td>
                                    <td align="right" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINE WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="ADD STOCK FINAL CALCULATION BY NET WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="stockValBy" NAME="stockValBy" value="byNetWt" onchange="setLayoutFieldInDb('stockValBy', this.value);"
                                        <?php
                                        if ($stockValBy == 'byNetWt')
                                            echo 'checked';
                                        else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY NET WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" class="padBott4" title="ADD STOCK FINAL CALCULATION BY GROSS WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" valign="middle">
                                <tr>
                                    <td align="left" valign="middle"  style="padding-left: 30px;">
                                        <input type="RADIO" id="stockValBy" NAME="stockValBy" value="byGrossWt" onchange="setLayoutFieldInDb('stockValBy', this.value);"
                                        <?php
                                        if ($stockValBy == 'byGrossWt')
                                            echo 'checked';
                                        else
                                            echo '';
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY GROSS WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>    
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold"  title="SET ADD STOCK METAL RATE BY PURITY!"
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom:10px;">
                                        ADD STOCK METAL RATE BY PURITY
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;margin-top:10px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="addStockMetalRateByPurity" name="addStockMetalRateByPurity" 
                                                           value="YES" onchange="setLayoutFieldInDb('addStockMetalRateByPurity', this.value);"
                                                           <?php
                                                           if ($addStockMetalRateByPurity == 'YES')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue">&nbsp;&nbsp;YES</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="addStockMetalRateByPurity" name="addStockMetalRateByPurity" 
                                                           value="NO" onchange="setLayoutFieldInDb('addStockMetalRateByPurity', this.value);"
                                                           <?php
                                                           if ($addStockMetalRateByPurity == 'NO')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue">&nbsp;&nbsp;NO</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                   style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" 
                                        style="background-color:#edf2ff;border-bottom:thin solid;color:#025cbc;border-color:#e6eeff;padding-top:5px;padding-bottom:5px;">
                                        ADD STOCK LABOUR CHARGES
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="ADD STOCK LABOUR CHARGE CALCULATION BY STOCK FINAL FINE WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;margin-top:10px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="stockLbrBy" name="stockLbrBy" 
                                                           value="lbrByFFineWt" onchange="setLayoutFieldInDb('stockLbrBy', this.value);"
                                                           <?php
                                                           if ($stockLbrBy == 'lbrByFFineWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINAL FINE WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="ADD STOCK LABOUR CHARGE CALCULATION BY STOCK FINE WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="stockLbrBy" name="stockLbrBy" 
                                                           value="lbrByFineWt" onchange="setLayoutFieldInDb('stockLbrBy', this.value);"
                                                           <?php
                                                           if ($stockLbrBy == 'lbrByFineWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINE WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="ADD STOCK LABOUR CHARGE CALCULATION BY STOCK NET WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="stockLbrBy" name="stockLbrBy" 
                                                           value="lbByNetWt" onchange="setLayoutFieldInDb('stockLbrBy', this.value);"
                                                           <?php
                                                           if ($stockLbrBy == 'lbByNetWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY NET WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="ADD STOCK LABOUR CHARGE CALCULATION BY STOCK GROSS WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="stockLbrBy" name="stockLbrBy" 
                                                           value="lbByGrossWt" onchange="setLayoutFieldInDb('stockLbrBy', this.value);"
                                                           <?php
                                                           if ($stockLbrBy == 'lbByGrossWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY GROSS WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>        
        <?php
        //
        //echo '$hallmarkingChargesBySetupPanel 2== ' . $hallmarkingChargesBySetupPanel . '<br />';
        //echo '$hallmarkingChargesTypeBySetupPanel 2== ' . $hallmarkingChargesTypeBySetupPanel . '<br />';
        //echo '$totalHallmarkingChargesBySetupPanel 2== ' . $totalHallmarkingChargesBySetupPanel . '<br />';
        //
        ?>
        <!-- START CODE TO SET HALLMARKING CHARGES, TYPE AND TOTAL HALLMARKING CHARGES @PRIYANKA-23MAY2022 -->
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%; height:200px; padding: 0px;margin-bottom:15px">
                <form name="hallmarkingCharges" id="hallmarkingCharges" method="post">
                    <table  border="0" cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" 
                                style="background-color:#edf2ff;border-bottom:thin solid;
                                       border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;color:#025cbc;">
                                HALLMARKING CHARGES
                            </td>
                        </tr>                       
                        <tr>
                            <td align="left" class="padBott4" title="Hallmarking Charges!" style="padding-top: 0px;"> 
                                <table border="0" cellspacing="1" cellpadding="0" align="left" valign="top">
                                    <tr>
                                        <td align="left" valign="top" title="Hallmarking Charges!">
                                            <input type="text" 
                                                   style="width:120px; margin-right: 2px; margin-left: 8px; height: 24px;"
                                                   id="hallmarkingChargesBySetupPanel" 
                                                   name="hallmarkingChargesBySetupPanel" 
                                                   value ="<?php echo $hallmarkingChargesBySetupPanel; ?>" 
                                                   placeholder="Hallmarking C." 
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                        document.getElementById('hallmarkingChargesTypeBySetupPanel').focus();
                                                                        return false;
                                                                    }"
                                                   ondblclick="this.value='';"  
                                                   class="lgn-txtfield-middle" 
                                                   size="20" maxlength="20"/>             
                                        </td>                                          
                                        <td align="right" valign="top" title="Hallmarking Charges Type!">
                                            <div class="selectStyled" 
                                                 style="height: 24px; width:120px; border: solid 1px #AF7817;">
                                                <?php
                                                //
                                                //This is the main division class for input filed
                                                //
                                                $inputMainDivClass = '';
                                                $inputMainDivStyle = '';
                                                //
                                                // Input Box Type and Ids
                                                $inputType = 'dropdown';
                                                $inputId = 'hallmarkingChargesTypeBySetupPanel';
                                                $inputName = 'hallmarkingChargesTypeBySetupPanel';
                                                //
                                                $inputFieldNextId = 'totalHallmarkingChargesBySetupPanel';
                                                $inputFieldPrevId = 'hallmarkingChargesBySetupPanel';
                                                //
                                                // This is the main class for input flied
                                                $inputFieldClass = 'form-control text-center';
                                                $inputStyle = 'width:88px; height:24px; 
                                                               background-color: #F9F9F9;
                                                               color: #804000;';
                                                $inputLabel = ''; // Display Label below the text box
                                                //
                                                $selectOptionLabel = 'TYPE';
                                                $selectStaticDropDown = 'Y';
                                                $selectStaticDropDownArray = array(FX, PP, GM, MG, KG, CT);
                                                $staticDropDownArrayCount = count($selectStaticDropDownArray);
                                                //
                                                if ($hallmarkingChargesTypeBySetupPanel != NULL && $hallmarkingChargesTypeBySetupPanel != '') {
                                                    $selectFieldSelected = $hallmarkingChargesTypeBySetupPanel;
                                                    $optionSelected = "selected";
                                                } else {
                                                    $selectFieldSelected = 'FX';
                                                    $optionSelected = "selected";
                                                }
                                                //
                                                //
                                                //echo '$selectFieldSelected:' . $selectFieldSelected;
                                                //
                                                //
                                                // This class is for Pencil Icon                                                           
                                                $inputIconClass = '';
                                                //
                                                //$inputPlaceHolder = 'Select Type!';
                                                //
                                                $inputLabelDivText = $inputPlaceHolder;
                                                //
                                                // Place Holder in span outside input box
                                                $spanPlaceHolderClass = '';
                                                $spanPlaceHolder = '';
                                                //
                                                // Event Options
                                                //
                                                $inputKeyUpFun = '';
                                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                                $inputMainClassButton = '';           // This is the main division for Button
                                                // 
                                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                //
                                                ?> 
                                            </div>           
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" class="padBott4" title="Hallmarking GST %!" width="100%">
                                <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%" valign="top" 
                                       style="padding-top: 5px;">
                                    <tr>
                                        <td align="center" colspan="3" width="101%"
                                            class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" 
                                            style="background-color:#edf2ff;border-bottom:thin solid;
                                            border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;color:#025cbc;">
                                            HALLMARKING GST %
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top" title="CGST %!">
                                            <input type="text" style="height: 24px;width:80px"
                                                   id="hallmarkingCGST" 
                                                   name="hallmarkingCGST" 
                                                   placeholder="CGST %"
                                                   value="<?php echo $hallmarkingCGST; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                        document.getElementById('hallmarkingSGST').focus();
                                                                        return false;
                                                                    } else if (event.keyCode == 8 && this.value == '') {
                                                                        document.getElementById('hallmarkingChargesTypeBySetupPanel').focus();
                                                                        return false;
                                                                    }"
                                                   ondblclick="this.value='';"                  
                                                   class="lgn-txtfield-middle" size="8" maxlength="5"/>
                                        </td>
                                        <td align="center" valign="top" title="SGST %!">
                                            <input type="text" style="height: 24px;width:80px"
                                                   id="hallmarkingSGST" 
                                                   name="hallmarkingSGST" 
                                                   placeholder="SGST %"
                                                   value="<?php echo $hallmarkingSGST; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                        document.getElementById('hallmarkingIGST').focus();
                                                                        return false;
                                                                    } else if (event.keyCode == 8 && this.value == '') {
                                                                        document.getElementById('hallmarkingSGST').focus();
                                                                        return false;
                                                                    }"
                                                   ondblclick="this.value='';"                  
                                                   class="lgn-txtfield-middle" size="7.5" maxlength="5"/>
                                        </td>
                                        <td align="center" valign="top" title="IGST %!">
                                            <input type="text" style="height: 24px;width:80px"
                                                   id="hallmarkingIGST" 
                                                   name="hallmarkingIGST" 
                                                   placeholder="IGST %" 
                                                   value="<?php echo $hallmarkingIGST; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                        document.getElementById('hallmarkSubmitBtn').focus();
                                                                        return false;
                                                                    } else if (event.keyCode == 8 && this.value == '') {
                                                                        document.getElementById('hallmarkingSGST').focus();
                                                                        return false;
                                                                    }"
                                                   ondblclick="this.value='';"                  
                                                   class="lgn-txtfield-middle" size="7.5" maxlength="5"/>
                                        </td>
                                        <!--<td align="center" valign="top">-->
                                            <input type="hidden" style="height: 24px;"
                                                   id="totalHallmarkingChargesBySetupPanel" 
                                                   name="totalHallmarkingChargesBySetupPanel" 
                                                   placeholder="Enter Total Hallmarking Charges" 
                                                   value="<?php echo $totalHallmarkingChargesBySetupPanel; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                        document.getElementById('hallmarkSubmitBtn').focus();
                                                                        return false;
                                                                    } else if (event.keyCode == 8 && this.value == '') {
                                                                        document.getElementById('hallmarkingIGST').focus();
                                                                        return false;
                                                                    }"
                                                   ondblclick="this.value='';"                  
                                                   class="lgn-txtfield-middle" size="25" maxlength="20"/>
                                        <!--</td>-->
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top: 3px;" align="center">
                                <div>
                                    <?php
                                    $inputId = "hallmarkSubmitBtn";
                                    $inputType = 'submit';
                                    $inputFieldValue = 'hallmarkSubmitBtn';
                                    $inputIdButton = "hallmarkSubmitBtn";
                                    $inputNameButton = '';
                                    //
                                    //$inputFieldPrevId = 'hallmarkingSGST';
                                    //
                                    $inputTitle = '';
                                    //                    
                                    // This is the main class for input flied
                                    $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style;
                                    $inputStyle = " padding-top: 2px;height:30px;width:70px;font-size:14px;background-color: #BED8FD;color: #0F118A;border: 1px solid #bed8fd;border-radius: 5px !important; ";
                                    $inputLabel = 'Submit'; // Display Label below the text box
                                    //
                                    // This class is for Pencil Icon                                                           
                                    $inputIconClass = '';
                                    $inputPlaceHolder = '';
                                    $spanPlaceHolderClass = '';
                                    $spanPlaceHolder = '';
                                    $inputOnChange = "";
                                    $inputOnClickFun = 'setLayoutFieldInDb("hallmarkingCharges", this.form);';
                                    $inputKeyUpFun = '';
                                    $inputDropDownCls = '';  // This is the main division class for drop down 
                                    $inputselDropDownCls = '';  // This is class for selection in drop down
                                    $inputMainClassButton = ''; // This is the main division for Button
                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                    ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </td>
        <!-- END CODE TO SET HALLMARKING CHARGES, TYPE AND TOTAL HALLMARKING CHARGES @PRIYANKA-23MAY2022 -->
        <?php
        //
        //echo '$hallmarkingGSTAddStock == ' . $hallmarkingGSTAddStock . '<br />';
        //echo '$hallmarkingGSTSell == ' . $hallmarkingGSTSell . '<br />';
        //echo '$hallmarkingGSTPurchase == ' . $hallmarkingGSTPurchase . '<br />';
        //
        ?>
        <!-- START CODE TO SET HALLMARKING GST PANELS @PRIYANKA-13JUNE2022 -->
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%; height:200px; padding: 0px;margin-bottom:15px">
                <table border="0" cellspacing="0" cellpadding="0"  align="center" width="100%">
                    <tr>
                        <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" 
                            style="background-color:#edf2ff;border-bottom:thin solid;
                                   border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;color:#025cbc;">
                            ADD STOCK HALLMARK GST
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="ADD STOCK HALLMARK GST OPTION YES!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;padding-top:5px;">
                                        <input type="RADIO" id="hallmarkingGSTAddStock" name="hallmarkingGSTAddStock" 
                                               value="YES" 
                                               onchange="setLayoutFieldInDb('hallmarkingGSTAddStock', this.value);"
                                        <?php
                                        if ($hallmarkingGSTAddStock == 'YES') {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;YES</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="ADD STOCK HALLMARK GST OPTION NO!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="hallmarkingGSTAddStock" name="hallmarkingGSTAddStock" 
                                               value="NO" 
                                               onchange="setLayoutFieldInDb('hallmarkingGSTAddStock', this.value);"
                                        <?php
                                        if ($hallmarkingGSTAddStock == 'NO') {
                                            echo 'checked';
                                        } else
                                            echo '';
                                        ?>/>
                                    </td>
                                    <td align="right" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;NO</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" 
                            style="background-color:#edf2ff;border-bottom:thin solid;
                                   border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;color:#025cbc;">
                            SELL HALLMARK GST
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL HALLMARK GST OPTION YES!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;padding-top:5px;">
                                        <input type="RADIO" id="hallmarkingGSTSell" name="hallmarkingGSTSell" 
                                               value="YES" 
                                               onchange="setLayoutFieldInDb('hallmarkingGSTSell', this.value);"
                                        <?php
                                        if ($hallmarkingGSTSell == 'YES') {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;YES</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL HALLMARK GST OPTION NO!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="hallmarkingGSTSell" name="hallmarkingGSTSell" 
                                               value="NO" 
                                               onchange="setLayoutFieldInDb('hallmarkingGSTSell', this.value);"
                                        <?php
                                        if ($hallmarkingGSTSell == 'NO') {
                                            echo 'checked';
                                        } else
                                            echo '';
                                        ?>/>
                                    </td>
                                    <td align="right" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;NO</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%; height:200px; padding: 0px;margin-bottom:15px">
                <table border="0" cellspacing="0" cellpadding="0"  align="center" width="100%">
                    <tr>
                        <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" 
                            style="background-color:#edf2ff;border-bottom:thin solid;
                                   border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;color: #025cbc;">
                            PURCHASE HALLMARK GST
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="PURCHASE HALLMARK GST OPTION YES!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;padding-top:5px;">
                                        <input type="RADIO" id="hallmarkingGSTPurchase" name="hallmarkingGSTPurchase" 
                                               value="YES" 
                                               onchange="setLayoutFieldInDb('hallmarkingGSTPurchase', this.value);"
                                        <?php
                                        if ($hallmarkingGSTPurchase == 'YES') {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;YES</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="PURCHASE HALLMARK GST OPTION NO!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="hallmarkingGSTPurchase" name="hallmarkingGSTPurchase" 
                                               value="NO" 
                                               onchange="setLayoutFieldInDb('hallmarkingGSTPurchase', this.value);"
                                        <?php
                                        if ($hallmarkingGSTPurchase == 'NO') {
                                            echo 'checked';
                                        } else
                                            echo '';
                                        ?>/>
                                    </td>
                                    <td align="right" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;NO</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <!-- END CODE TO SET HALLMARKING GST PANELS @PRIYANKA-13JUNE2022 -->
        <!-- **************************************************************** -->
        <!-- START CODE FOR ADD STOCK METAL RATE BY PURITY @SIMRAN:18MAY2023  -->
        <!-- **************************************************************** -->
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold"  title="SET ADD STOCK METAL RATE BY PURITY!"
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom:10px;">
                                        ADD HALLMARK CHARG ON SILVER ITEM
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;margin-top:10px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="addHallamrkChargOnSilverItem" name="addHallamrkChargOnSilverItem" 
                                                           value="YES" onchange="setLayoutFieldInDb('addHallamrkChargOnSilverItem', this.value);"
                                                           <?php
                                                           if ($addHallamrkChargOnSilverItem == 'YES')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue">&nbsp;&nbsp;YES</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="addHallamrkChargOnSilverItem" name="addHallamrkChargOnSilverItem" 
                                                           value="NO" onchange="setLayoutFieldInDb('addHallamrkChargOnSilverItem', this.value);"
                                                           <?php
                                                           if ($addHallamrkChargOnSilverItem == 'NO')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue">&nbsp;&nbsp;NO</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <!-- **************************************************************** -->
        <!-- END CODE FOR ADD STOCK METAL RATE BY PURITY @SIMRAN:18MAY2023    -->
        <!-- **************************************************************** -->
    </tr>  
    <tr>
        <!-- **************************************************************** -->
         <!-- START CODE FOR ADD STOCK METAL RATE BY PURITY @SIMRAN:18MAY2023  -->
        <!-- **************************************************************** -->
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold"  title="SET ADD STOCK METAL RATE BY PURITY!"
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom:10px;">
                                        ADD STOCK PLUS(+) KEY BUTTON JOURNAL ENTRY
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;margin-top:10px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="addStockPlusKeyJrnlEntry" name="addStockPlusKeyJrnlEntry" 
                                                           value="YES" onchange="setLayoutFieldInDb('addStockPlusKeyJrnlEntry', this.value);"
                                                           <?php
                                                           if ($addStockPlusKeyJrnlEntry == 'YES')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue">&nbsp;&nbsp;YES</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="addStockPlusKeyJrnlEntry" name="addStockPlusKeyJrnlEntry" 
                                                           value="NO" onchange="setLayoutFieldInDb('addStockPlusKeyJrnlEntry', this.value);"
                                                           <?php
                                                           if ($addStockPlusKeyJrnlEntry == 'NO')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue">&nbsp;&nbsp;NO</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <!-- **************************************************************** -->
        <!-- END CODE FOR ADD STOCK METAL RATE BY PURITY @SIMRAN:18MAY2023    -->
        <!-- **************************************************************** -->
          <!-- **************************************************************** -->
         <!-- START CODE FOR ADD STOCK FINAL FINE WEIGHT BY @omkar:10MAY2023  -->
        <!-- **************************************************************** -->
        <td align="center" valign="middle" colspan="2">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold"  title="SET ADD STOCK METAL RATE BY PURITY!"
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom:10px;">
                                        ADD STOCK FINAL FINE WEIGHT BY
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;margin-top:10px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="addStockFinalFinewt" name="addStockFinalFinewt" 
                                                           value="byDefault" onchange="setLayoutFieldInDb('addStockFinalFinewt', this.value);"
                                                           <?php
                                                           if ($addStockFinalFinewt == 'byDefault')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue">&nbsp;&nbsp;BY DEFAULT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="addStockFinalFinewt" name="addStockFinalFinewt" 
                                                           value="byFineWt" onchange="setLayoutFieldInDb('addStockFinalFinewt', this.value);"
                                                           <?php
                                                           if ($addStockFinalFinewt == 'byFineWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue">&nbsp;&nbsp;BY FINE WT ( FFINE WT = FINE WT + WSTG WT )</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="addStockFinalFinewt" name="addStockFinalFinewt" 
                                                           value="byNetWt" onchange="setLayoutFieldInDb('addStockFinalFinewt', this.value);"
                                                           <?php
                                                           if ($addStockFinalFinewt == 'byNetWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue">&nbsp;&nbsp;BY NET WT ( FFINE WT = NET WT + WSTG WT )</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="addStockFinalFinewt" name="addStockFinalFinewt" 
                                                           value="byGrossWt" onchange="setLayoutFieldInDb('addStockFinalFinewt', this.value);"
                                                           <?php
                                                           if ($addStockFinalFinewt == 'byGrossWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue">&nbsp;&nbsp;BY GROSS WT ( FFINE WT = GROSS WT + WSTG WT )</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <!-- **************************************************************** -->
        <!-- END CODE FOR ADD STOCK METAL RATE BY PURITY @SIMRAN:18MAY2023    -->
        <!-- **************************************************************** -->
    </tr>   
    <tr>
        <td class="textLabel18CalibriNormal" colspan="5">
            <div class="hrGrey" style="margin-top: 15px;margin-bottom: 5px;"></div>
        </td>
    </tr>
    <tr>
        <td class="textLabel18CalibriNormal" colspan="5">
            <div style="margin-left:10px;margin-bottom: 10px;font-weight:bold;">SELL STOCK OPTIONS</div>
        </td>
    </tr>
    <tr>
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" 
                                        style="background-color:#edf2ff;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;color:#025cbc">
                                        SELL STOCK MAKING CHARGES
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="SELL STOCK MAKING CHARGE CALCULATION BY STOCK FINAL FINE WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;margin-top:10px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="sellMkgBy" name="sellMkgBy" 
                                                           value="mkgByFFineWt" onchange="setLayoutFieldInDb('sellMkgBy', this.value);"
                                                           <?php
                                                           if ($sellMkgBy == 'mkgByFFineWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINAL FINE WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="SELL STOCK MAKING CHARGE CALCULATION BY STOCK FINE WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="sellMkgBy" name="sellMkgBy" 
                                                           value="mkgByFineWt" onchange="setLayoutFieldInDb('sellMkgBy', this.value);"
                                                           <?php
                                                           if ($sellMkgBy == 'mkgByFineWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINE WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="SELL STOCK MAKING CHARGE CALCULATION BY STOCK NET WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="sellMkgBy" name="sellMkgBy" 
                                                           value="mkgByNetWt" onchange="setLayoutFieldInDb('sellMkgBy', this.value);"
                                                           <?php
                                                           if ($sellMkgBy == 'mkgByNetWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY NET WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="SELL STOCK MAKING CHARGE CALCULATION BY STOCK GROSS WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="sellMkgBy" name="sellMkgBy" 
                                                           value="mkgByGrossWt" onchange="setLayoutFieldInDb('sellMkgBy', this.value);"
                                                           <?php
                                                           if ($sellMkgBy == 'mkgByGrossWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY GROSS WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="SELL STOCK MAKING CHARGE CALCULATION BY 24K MKG METAL RATE !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <?php 
                                              $getSellMkgByPer = "SELECT omly_value FROM omlayout where omly_option='sellMkgByPer'"; 
                                              $resSellMkgByPer = mysqli_query($conn, $getSellMkgByPer);
                                              $rowSellMkgByPer = mysqli_fetch_array($resSellMkgByPer);
                                              $sellMkgByPerInd = $rowSellMkgByPer['omly_value'];    
                                            ?>
                                                <td align="center" valign="middle">
                                                    <input type="checkbox" id="sttr_mkg_per" name="sttr_mkg_per" 
                                                           onchange="setLayoutFieldInDb('sellMkgByPer', this.checked);" value="<?php echo $sellMkgByPerInd; ?>"               
                                                           <?php
                                                           if ($sellMkgByPerInd == 'true') {
                                                               echo 'checked';
                                                           } else
                                                               echo '';
                                                           ?>  />
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue">&nbsp;&nbsp;BY VALUATION 24K RATE</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> 

                </table>
            </div>
        </td>
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table border="0" cellspacing="0" cellpadding="0"  align="center" width="100%">
                    <tr>
                        <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                            SELL STOCK CUSTOMER WASTAGE
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL STOCK CUST WSTG CALCULATION BY FINE WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;padding-top:10px;">
                                        <input type="RADIO" id="sellCsWstgBy" NAME="sellCsWstgBy" value="custWastgByFineWt" onchange="setLayoutFieldInDb('sellCsWstgBy', this.value);"
                                        <?php
                                        if ($sellCsWstgBy == 'custWastgByFineWt') {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;FINE WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL STOCK CUST WSTG CALCULATION BY NET WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="sellCsWstgBy" NAME="sellCsWstgBy" value="custWastgByNetWt" onchange="setLayoutFieldInDb('sellCsWstgBy', this.value);"
                                        <?php
                                        if ($sellCsWstgBy == 'custWastgByNetWt') {
                                            echo 'checked';
                                        } else
                                            echo '';
                                        ?>/>
                                    </td>
                                    <td align="right" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;NET WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL STOCK CUST WSTG CALCULATION BY GROSS WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="sellCsWstgBy" NAME="sellCsWstgBy" value="custWastgByGrossWt" onchange="setLayoutFieldInDb('sellCsWstgBy', this.value);"
                                        <?php
                                        if ($sellCsWstgBy == 'custWastgByGrossWt')
                                            echo 'checked';
                                        else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;GROSS WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td align="center" valign="middle" colspan="2">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table border="0" cellspacing="0" cellpadding="0"  align="center" width="100%">
                    <tr>
                        <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                            SELL STOCK FINAL FINE WEIGHT                        
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL STOCK FINAL FINE WEIGHT CALCULATION BY DEFAULT">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;padding-top:10px;">
                                        <input type="RADIO" id="sellFineWtBy" NAME="sellFineWtBy" value="byDefault" onchange="setLayoutFieldInDb('sellFineWtBy', this.value);"
                                        <?php
                                        if ($sellFineWtBy == 'byDefault') {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY DEFAULT ( CUST WS WT WILL NOT ADD INTO WT )</span>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL STOCK FINAL FINE WEIGHT CALCULATION BY GROSS WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="sellFineWtBy" NAME="sellFineWtBy" value="byFFineWt" onchange="setLayoutFieldInDb('sellFineWtBy', this.value);"
                                        <?php
                                        if ($sellFineWtBy == 'byFFineWt') {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FFINE WT ( FFINE WT = FINAL FINE WT + CUST WS WT ) </span>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL STOCK FINAL FINE WEIGHT CALCULATION BY FINE WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="sellFineWtBy" NAME="sellFineWtBy" value="byFineWt" onchange="setLayoutFieldInDb('sellFineWtBy', this.value);"
                                        <?php
                                        if ($sellFineWtBy == 'byFineWt') {
                                            echo 'checked';
                                        } else
                                            echo '';
                                        ?>/>
                                    </td>
                                    <td align="right" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINE WT ( FFINE WT = FINE WT + CUST WS WT ) </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL STOCK FINAL FINE WEIGHT CALCULATION BY NET WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="sellFineWtBy" NAME="sellFineWtBy" value="byNetWt" onchange="setLayoutFieldInDb('sellFineWtBy', this.value);"
                                        <?php
                                        if ($sellFineWtBy == 'byNetWt')
                                            echo 'checked';
                                        else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY NET WT ( FFINE WT = NET WT + CUST WS WT ) </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL STOCK FINAL FINE WEIGHT CALCULATION BY GROSS WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" valign="middle">
                                <tr>
                                    <td align="left" valign="middle"  style="padding-left: 30px;">
                                        <input type="RADIO" id="sellFineWtBy" NAME="sellFineWtBy" value="byGrossWt" onchange="setLayoutFieldInDb('sellFineWtBy', this.value);"
                                        <?php
                                        if ($sellFineWtBy == 'byGrossWt')
                                            echo 'checked';
                                        else
                                            echo '';
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY GROSS WT ( FFINE WT = GROSS WT + CUST WS WT ) </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <tr>
                        <td align="left" title="SELL STOCK FINAL FINE WEIGHT CALCULATION BY NET WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="sellFineWtBy" NAME="sellFineWtBy" value="byNetWtWstg" onchange="setLayoutFieldInDb('sellFineWtBy', this.value);"
                                        <?php
                                        if ($sellFineWtBy == 'byNetWtWstg')
                                            echo 'checked';
                                        else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY NET WT ( FFINE WT = NET WT + CUST WS WT + WSTG ) </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" class="padBott4" title="SELL STOCK FINAL FINE WEIGHT CALCULATION BY GROSS WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" valign="middle">
                                <tr>
                                    <td align="left" valign="middle"  style="padding-left: 30px;">
                                        <input type="RADIO" id="sellFineWtBy" NAME="sellFineWtBy" value="byGrossWtWstg" onchange="setLayoutFieldInDb('sellFineWtBy', this.value);"
                                        <?php
                                        if ($sellFineWtBy == 'byGrossWtWstg')
                                            echo 'checked';
                                        else
                                            echo '';
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY GROSS WT ( FFINE WT = GROSS WT + CUST WS WT + WSTG ) </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </td> 
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table border="0" cellspacing="0" cellpadding="0"  align="center" width="100%">
                    <tr>
                        <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                            SELL STOCK FINAL VALUATION
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL STOCK FINAL CALCULATION BY FINAL FINE WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;padding-top:10px;">
                                        <input type="RADIO" id="sellValBy" NAME="sellValBy" value="byFFineWt" onchange="setLayoutFieldInDb('sellValBy', this.value);"
                                        <?php
                                        if ($sellValBy == 'byFFineWt') {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINAL FINE WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL STOCK FINAL CALCULATION BY FINE WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="sellValBy" NAME="sellValBy" value="byFineWt" onchange="setLayoutFieldInDb('sellValBy', this.value);"
                                        <?php
                                        if ($sellValBy == 'byFineWt') {
                                            echo 'checked';
                                        } else
                                            echo '';
                                        ?>/>
                                    </td>
                                    <td align="right" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINE WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL STOCK FINAL CALCULATION BY NET WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="sellValBy" NAME="sellValBy" value="byNetWt" onchange="setLayoutFieldInDb('sellValBy', this.value);"
                                        <?php
                                        if ($sellValBy == 'byNetWt')
                                            echo 'checked';
                                        else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY NET WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" class="padBott4" title="SELL STOCK FINAL CALCULATION BY GROSS WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" valign="middle">
                                <tr>
                                    <td align="left" valign="middle"  style="padding-left: 30px;">
                                        <input type="RADIO" id="sellValBy" NAME="sellValBy" value="byGrossWt" onchange="setLayoutFieldInDb('sellValBy', this.value);"
                                        <?php
                                        if ($sellValBy == 'byGrossWt')
                                            echo 'checked';
                                        else
                                            echo '';
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY GROSS WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>    
    </tr>
    <tr>
        <td class="textLabel18CalibriNormal" colspan="5">
            <div style="margin-top: 15px;margin-bottom: 5px;"></div>
        </td>
    </tr>
    <tr>
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption"  title="SET SALES REVERSE CALCULATION ADJUSTMENT OPTION HERE!"
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                                        SALES REVERSE CALCULATION
                                        (WHEN ENTERED AMT IS LESS)
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 30px;margin-top:10px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="saleReverseCalByForLessAmt" name="saleReverseCalByForLessAmt" 
                                                           value="byMetalDiscount" onchange="setLayoutFieldInDb('saleReverseCalByForLessAmt', this.value);"
                                                           <?php
                                                           if ($saleReverseCalByForLessAmt == 'byMetalDiscount')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY METAL DISCOUNT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 30px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="saleReverseCalByForLessAmt" name="saleReverseCalByForLessAmt" 
                                                           value="byMakingDiscount" onchange="setLayoutFieldInDb('saleReverseCalByForLessAmt', this.value);"
                                                           <?php
                                                           if ($saleReverseCalByForLessAmt == 'byMakingDiscount')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY MAKING DISCOUNT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 30px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="saleReverseCalByForLessAmt" name="saleReverseCalByForLessAmt" 
                                                           value="byCustWastage" onchange="setLayoutFieldInDb('saleReverseCalByForLessAmt', this.value);"
                                                           <?php
                                                           if ($saleReverseCalByForLessAmt == 'byCustWastage')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY CUST. WASTAGE</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 30px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="saleReverseCalByForLessAmt" name="saleReverseCalByForLessAmt" 
                                                           value="byMetalRate" onchange="setLayoutFieldInDb('saleReverseCalByForLessAmt', this.value);"
                                                           <?php
                                                           if ($saleReverseCalByForLessAmt == 'byMetalRate')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY METAL RATE</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption"  title="SET SALES REVERSE CALCULATION ADJUSTMENT OPTION HERE!"
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                                        SALES REVERSE CALCULATION
                                        (WHEN ENTERED AMT IS MORE)
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 30px;margin-top:10px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="saleReverseCalByForMoreAmt" name="saleReverseCalByForMoreAmt" 
                                                           value="byMakingCharges" onchange="setLayoutFieldInDb('saleReverseCalByForMoreAmt', this.value);"
                                                           <?php
                                                           if ($saleReverseCalByForMoreAmt == 'byMakingCharges')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY MAKING CHARGES</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
<!--                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 30px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="saleReverseCalByForMoreAmt" name="saleReverseCalByForMoreAmt" 
                                                           value="byMetalDiscount" onchange="setLayoutFieldInDb('saleReverseCalByForMoreAmt', this.value);"
                                <?php
                                if ($saleReverseCalByForMoreAmt == 'byWastage')
                                    echo 'checked';
                                else
                                    echo '';
                                ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY WASTAGE</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>-->
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 30px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="saleReverseCalByForLessAmt" name="saleReverseCalByForMoreAmt" 
                                                           value="byCustWastage" onchange="setLayoutFieldInDb('saleReverseCalByForMoreAmt', this.value);"
                                                           <?php
                                                           if ($saleReverseCalByForMoreAmt == 'byCustWastage')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY CUST. WASTAGE</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 30px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="saleReverseCalByForLessAmt" name="saleReverseCalByForMoreAmt" 
                                                           value="byMetalRate" onchange="setLayoutFieldInDb('saleReverseCalByForMoreAmt', this.value);"
                                                           <?php
                                                           if ($saleReverseCalByForMoreAmt == 'byMetalRate')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY METAL RATE</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption"  title="SET SALES MAKING CHARGES TYPE BY OPTION HERE!"
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                                        SALE MAKING CHARGES TYPE
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;margin-top:10px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="saleMakingChargesTypeBy" name="saleMakingChargesTypeBy" 
                                                           value="byAddStock" onchange="setLayoutFieldInDb('saleMakingChargesTypeBy', this.value);"
                                                           <?php
                                                           if ($saleMakingChargesTypeBy == 'byAddStock')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY ADD STOCK</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="saleMakingChargesTypeBy" name="saleMakingChargesTypeBy" 
                                                           value="byLastEntry" onchange="setLayoutFieldInDb('saleMakingChargesTypeBy', this.value);"
                                                           <?php
                                                           if ($saleMakingChargesTypeBy == 'byLastEntry')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY LAST ENTRY</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="saleMakingChargesTypeBy" name="saleMakingChargesTypeBy" 
                                                           value="byUserWiseLastEntry" onchange="setLayoutFieldInDb('saleMakingChargesTypeBy', this.value);"
                                                           <?php
                                                           if ($saleMakingChargesTypeBy == 'byUserWiseLastEntry')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY USER WISE LAST ENTRY</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <!-- **************************************************************** -->
        <!-- START CODE FOR SELL DISCOUNT ON TOTAL AMOUNT @PRIYANKA-26FEB2022 -->
        <!-- **************************************************************** -->
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption"  title="SET SELL DISCOUNT BY OPTION HERE!"
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                                        SELL DISCOUNT
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;margin-top:10px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="sellDiscountBySetupPanel" name="sellDiscountBySetupPanel" 
                                                           value="default" onchange="setLayoutFieldInDb('sellDiscountBySetupPanel', this.value);"
                                                           <?php
                                                           if ($sellDiscountBySetupPanel == 'default')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;DEFAULT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="sellDiscountBySetupPanel" name="sellDiscountBySetupPanel" 
                                                           value="discountOnTotalAmount" onchange="setLayoutFieldInDb('sellDiscountBySetupPanel', this.value);"
                                                           <?php
                                                           if ($sellDiscountBySetupPanel == 'discountOnTotalAmount')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;DISC ON TOTAL AMOUNT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <!-- **************************************************************** -->
        <!-- END CODE FOR SELL DISCOUNT ON TOTAL AMOUNT @PRIYANKA-26FEB2022   -->
        <!-- **************************************************************** -->
         <!-- **************************************************************** -->
        <!-- START CODE FOR SELL METAL RATE BY PURITY @SIMRAN:26NOV2022 -->
        <!-- **************************************************************** -->
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption"  title="SET SELL METAL RATE BY PURITY!"
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                                        SELL METAL RATE BY PURITY
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;margin-top:10px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="sellMetalRateByPurity" name="sellMetalRateByPurity" 
                                                           value="YES" onchange="setLayoutFieldInDb('sellMetalRateByPurity', this.value);"
                                                           <?php
                                                           if ($sellMetalRateByPurity == 'YES')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;YES</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="sellMetalRateByPurity" name="sellMetalRateByPurity" 
                                                           value="NO" onchange="setLayoutFieldInDb('sellMetalRateByPurity', this.value);"
                                                           <?php
                                                           if ($sellMetalRateByPurity == 'NO')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;NO</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <!-- **************************************************************** -->
        <!-- END  CODE FOR SELL METAL RATE BY PURITY @SIMRAN:26NOV2022    -->
        <!-- **************************************************************** -->
        
    </tr>
    <tr>
        <td class="textLabel18CalibriNormal" colspan="5">
            <div style="margin-top: 15px;margin-bottom: 5px;"></div>
        </td>
    </tr>
  <!--START CODE TO ADDED SELL CUST WASTAGE OPTION @SIMEAN:12MAY2023-->
    <tr>
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption"  title="SET SALES REVERSE CALCULATION ADJUSTMENT OPTION HERE!"
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                                       SELL CUST WASTAGE
                                    </td>
                                </tr>
                                <tr>
                                                    <td align="left" title="Click here to Select Customer Wastage!">
                                                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top" style="padding-left: 30px;">
                                                            <tr>
                                                                <td align="right" valign="top">
                                                                    <input type="RADIO" id="sellCustWastg" name="sellCustWastg" 
                                                                           value="addStock"  onchange="setLayoutFieldInDb('sellCustWastg', this.value);"
                                                                           <?php
                                                                           if ($setSellCustWastg == 'addStock')
                                                                               echo 'checked';
                                                                           else
                                                                               echo '';
                                                                           ?>/>
                                                                </td>
                                                                <td align="left" valign="bottom">
                                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;ADD STOCK</span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="" title="Click here to Select Customer Wastage!">
                                                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top" style="padding-left: 30px;">
                                                            <tr>
                                                                <td align="right" valign="top">
                                                                    <input type="RADIO" id="sellCustWastg" name="sellCustWastg" 
                                                                           value="lastEntry"  onchange="setLayoutFieldInDb('sellCustWastg', this.value);"
                                                                           <?php
                                                                           if ($setSellCustWastg == 'lastEntry')
                                                                               echo 'checked';
                                                                           else
                                                                               echo '';
                                                                           ?>/>
                                                                </td>
                                                                <td align="left" valign="bottom">
                                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;LAST ENTRY</span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td align="left" class="" title="Click here to Select Customer Wastage!">
                                                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top" style="padding-left: 30px;">
                                                            <tr>
                                                                <td align="left" valign="top">
                                                                    <input type="RADIO" id="sellCustWastg" name="sellCustWastg" 
                                                                           value="userWiselastEntry"  onchange="setLayoutFieldInDb('sellCustWastg', this.value);"
                                                                           <?php
                                                                           if ($setSellCustWastg == 'userWiselastEntry')
                                                                               echo 'checked';
                                                                           else
                                                                               echo '';
                                                                           ?>/>
                                                                </td>
                                                                <td align="left" valign="bottom">
                                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;USER WISE LAST ENTRY</span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="padBott4" title="Click here to Select Customer Wastage!">
                                                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top" style="padding-left: 30px;">
                                                            <tr>
                                                                <td align="left" valign="top">
                                                                    <input type="RADIO" id="sellCustWastg" name="sellCustWastg" 
                                                                           value="blank"  onchange="setLayoutFieldInDb('sellCustWastg', this.value);"
                                                                           <?php
                                                                           if ($setSellCustWastg == 'blank')
                                                                               echo 'checked';
                                                                           else
                                                                               echo '';
                                                                           ?>/>
                                                                </td>
                                                                <td align="left" valign="bottom">
                                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BLANK</span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td> 
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption"  title="SELL STOCK BY ADDED METAL RATE!"
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                                        SELL STOCK BY ADDED METAL RATE
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;margin-top:10px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="sellStockByAddMetalRate" name="sellStockByAddMetalRate" 
                                                           value="YES" onchange="setLayoutFieldInDb('sellStockByAddMetalRate', this.value);"
                                                           <?php
                                                           if ($sellStockByAddMetalRate == 'YES')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;YES</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 20px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="sellStockByAddMetalRate" name="sellStockByAddMetalRate" 
                                                           value="NO" onchange="setLayoutFieldInDb('sellStockByAddMetalRate', this.value);"
                                                           <?php
                                                           if ($sellStockByAddMetalRate == 'NO')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;NO</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
  <!-- END CODE TO ADDED SELL CUST WASTAGE OPTION @SIMEAN:12MAY2023-->
    <tr>
        <td class="textLabel18CalibriNormal" colspan="5">
            <div class="hrGrey" style="margin-top: 15px;margin-bottom: 5px;"></div>
        </td>
    </tr>
    <tr>
        <td class="textLabel18CalibriNormal" colspan="5">
            <div style="margin-left:10px;margin-bottom: 10px;font-weight:bold;">PURCHASE STOCK OPTIONS</div>
        </td>
    </tr>
    <tr>
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" 
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                                        PURCHASE LABOUR CHARGES
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="ADD STOCK MAKING CHARGE CALCULATION BY STOCK FINAL FINE WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;margin-top:10px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="purchaseLbrBy" name="purchaseLbrBy" 
                                                           value="$stockLbrBy" onchange="setLayoutFieldInDb('purchaseLbrBy', this.value);"
                                                           <?php
                                                           if ($purchaseLbrBy == 'lbByFFineWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINAL FINE WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="ADD STOCK MAKING CHARGE CALCULATION BY STOCK FINE WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="purchaseLbrBy" name="purchaseLbrBy" 
                                                           value="lbByFineWt" onchange="setLayoutFieldInDb('purchaseLbrBy', this.value);"
                                                           <?php
                                                           if ($purchaseLbrBy == 'lbByFineWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINE WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="ADD STOCK MAKING CHARGE CALCULATION BY STOCK NET WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="purchaseLbrBy" name="purchaseLbrBy" 
                                                           value="lbByNetWt" onchange="setLayoutFieldInDb('purchaseLbrBy', this.value);"
                                                           <?php
                                                           if ($purchaseLbrBy == 'lbByNetWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY NET WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="ADD STOCK MAKING CHARGE CALCULATION BY STOCK GROSS WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="purchaseLbrBy" name="purchaseLbrBy" 
                                                           value="lbByGrossWt" onchange="setLayoutFieldInDb('purchaseLbrBy', this.value);"
                                                           <?php
                                                           if ($purchaseLbrBy == 'lbByGrossWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY GROSS WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                            </table>
                        </td>
                    </tr> 
                </table>
            </div>
        </td>
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" 
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                                        PURCHASE WASTAGE 
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="SET OPTION TO CALCULATE PURCHASE WASTAGE BY FINE WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;margin-top:10px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="purchaseWastageBy" name="purchaseWastageBy" 
                                                           value="wastageByFineWt" onchange="setLayoutFieldInDb('purchaseWastageBy', this.value);"
                                                           <?php
                                                           if ($purchaseWastageBy == 'wastageByFineWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINE WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="SET OPTION TO CALCULATE PURCHASE WASTAGE BY NET WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="purchaseWastageBy" name="purchaseWastageBy" 
                                                           value="wastageByNetWt" onchange="setLayoutFieldInDb('purchaseWastageBy', this.value);"
                                                           <?php
                                                           if ($purchaseWastageBy == 'wastageByNetWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY NET WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="SET OPTION TO CALCULATE PURCHASE WASTAGE BY GROSS WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="purchaseWastageBy" name="purchaseWastageBy" 
                                                           value="wastageByGrossWt" onchange="setLayoutFieldInDb('purchaseWastageBy', this.value);"
                                                           <?php
                                                           if ($purchaseWastageBy == 'wastageByGrossWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY GROSS WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                            </table>
                        </td>
                    </tr> 
                </table>
            </div>
        </td>
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom: 15px;">
                <table border="0" cellspacing="0" cellpadding="0"  align="center" width="100%">
                    <tr>
                        <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                            PURCHASE FINAL VALUATION
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="ADD STOCK CUST WSTG CALCULATION BY STOCK GROSS WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;padding-top:10px;">
                                        <input type="RADIO" id="purchaseItemCalculation" NAME="purchaseItemCalculation" value="byFFineWt" onchange="setLayoutFieldInDb('purchaseItemCalculation', this.value);"
                                        <?php
                                        if ($purchaseItemCalculation == 'byFFineWt') {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;FINAL FINE WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="ADD STOCK CUST WSTG CALCULATION BY STOCK GROSS WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="purchaseItemCalculation" NAME="purchaseItemCalculation" value="byFineWt" onchange="setLayoutFieldInDb('purchaseItemCalculation', this.value);"
                                        <?php
                                        if ($purchaseItemCalculation == 'byFineWt') {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;FINE WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="ADD STOCK CUST WSTG CALCULATION BY NET WT!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="purchaseItemCalculation" NAME="purchaseItemCalculation" value="byNetWt" onchange="setLayoutFieldInDb('purchaseItemCalculation', this.value);"
                                        <?php
                                        if ($purchaseItemCalculation == 'byNetWt') {
                                            echo 'checked';
                                        } else
                                            echo '';
                                        ?>/>
                                    </td>
                                    <td align="right" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;NET WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="ADD STOCK CUST WSTG CALCULATION BY GROSS WT!">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="purchaseItemCalculation" NAME="purchaseItemCalculation" value="byGrossWt" onchange="setLayoutFieldInDb('purchaseItemCalculation', this.value);"
                                        <?php
                                        if ($purchaseItemCalculation == 'byGrossWt')
                                            echo 'checked';
                                        else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;GROSS WEIGHT</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td align="center" valign="middle" colspan="2">
            <div style="width:98%;height:200px;padding: 0px;margin-bottom:15px">
              <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table border="0" cellspacing="0" cellpadding="0"  align="center" width="100%">
                    <tr>
                        <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                            PURCHASE STOCK FINAL FINE WEIGHT                        
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL STOCK FINAL FINE WEIGHT CALCULATION BY DEFAULT">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;padding-top:10px;">
                                        <input type="RADIO" id="purchaseFinalFineWtBy" NAME="sellFineWtBy" value="byDefault" onchange="setLayoutFieldInDb('purchaseFinalFineWtBy', this.value);"
                                        <?php
                                        if ($purchFineWtBy == 'byDefault') {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY DEFAULT</span>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL STOCK FINAL FINE WEIGHT CALCULATION BY FINE WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0"  align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="purchaseFineWtBy" NAME="sellFineWtBy" value="byFineWt" onchange="setLayoutFieldInDb('purchaseFinalFineWtBy', this.value);"
                                        <?php
                                        if ($purchFineWtBy == 'byFineWt') {
                                            echo 'checked';
                                        } else
                                            echo '';
                                        ?>/>
                                    </td>
                                    <td align="right" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINE WT ( FFINE WT = FINE WT + WSTG WT ) </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL STOCK FINAL FINE WEIGHT CALCULATION BY NET WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" valign="middle">
                                <tr>       
                                    <td align="left" valign="middle" style="padding-left: 30px;">
                                        <input type="RADIO" id="purchaseFineWtBy" NAME="sellFineWtBy" value="byNetWt" onchange="setLayoutFieldInDb('purchaseFinalFineWtBy', this.value);"
                                        <?php
                                        if ($purchFineWtBy == 'byNetWt')
                                            echo 'checked';
                                        else {
                                            echo '';
                                        }
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY NET WT ( FFINE WT = NET WT + WSTG WT ) </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" title="SELL STOCK FINAL FINE WEIGHT CALCULATION BY GROSS WEIGHT!">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" valign="middle">
                                <tr>
                                    <td align="left" valign="middle"  style="padding-left: 30px;">
                                        <input type="RADIO" id="purchaseFineWtBy" NAME="sellFineWtBy" value="byGrossWt" onchange="setLayoutFieldInDb('purchaseFinalFineWtBy', this.value);"
                                        <?php
                                        if ($purchFineWtBy == 'byGrossWt')
                                            echo 'checked';
                                        else
                                            echo '';
                                        ?>/>
                                    </td>
                                    <td align="left" valign="bottom">
                                        <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY GROSS WT ( FFINE WT = GROSS WT + WSTG WT ) </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            </div>
        </td>
        <td align="center" valign="middle" width="20%">
            <div style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">

            </div>
        </td>
    </tr>
    <tr>
        <td class="textLabel18CalibriNormal" colspan="5">
            <div class="hrGrey" style="margin-top: 15px;margin-bottom: 5px;"></div>
        </td>
    </tr>
    <tr>
        <td class="textLabel18CalibriNormal" colspan="5">
            <div style="margin-left:10px;margin-bottom: 10px;font-weight:bold;">OLD METAL OPTIONS</div>
        </td>
    </tr>
    <tr>
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" 
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                                        OLD METAL/URD RECEIVED VALUATION
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="OLD METAL/URD RECEIVED CALCULATION BY PRODUCT FINAL FINE WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="urdValuationBy" name="urdValuationBy" 
                                                           value="byFFineWt" onchange="setLayoutFieldInDb('urdValuationBy', this.value);"
                                                           <?php
                                                           if ($urdValuationBy == 'byFFineWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINAL FINE WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="OLD METAL/URD RECEIVED CALCULATION BY PRODUCT FINE WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="urdValuationBy" name="urdValuationBy" 
                                                           value="byFineWt" onchange="setLayoutFieldInDb('urdValuationBy', this.value);"
                                                           <?php
                                                           if ($urdValuationBy == 'byFineWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINE WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="OLD METAL/URD RECEIVED CALCULATION BY PRODUCT NET WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="urdValuationBy" name="urdValuationBy" 
                                                           value="byNetWt" onchange="setLayoutFieldInDb('urdValuationBy', this.value);"
                                                           <?php
                                                           if ($urdValuationBy == 'byNetWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY NET WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="OLD METAL/URD RECEIVED CALCULATION BY PRODUCT GROSS WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="urdValuationBy" name="urdValuationBy" 
                                                           value="byGrossWt" onchange="setLayoutFieldInDb('urdValuationBy', this.value);"
                                                           <?php
                                                           if ($urdValuationBy == 'byGrossWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY GROSS WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                            </table>
                        </td>
                    </tr> 
                </table>
            </div>
        </td>
<!--sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss-->
<!--// START ADD THIS TD FOR RAW METAL FINAL VALUVATION INDICATOR FOR CUSTOMER PURCHASE RAW METAL @YUVRAJ KAMBLE 0912022 -->
<!--sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss-->
        <td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" 
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                                        RAW METAL PURCHASE FINAL VALUATION
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="OLD METAL/URD RECEIVED CALCULATION BY PRODUCT FINAL FINE WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="CustUrdPurValuationBy" name="CustUrdPurValuationBy" 
                                                           value="byFFineWt" onchange="setLayoutFieldInDb('CustUrdPurValuationBy', this.value);"
                                                           <?php
                                                           if ($CustUrdPurValuationBy == 'byFFineWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINAL FINE WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="OLD METAL/URD RECEIVED CALCULATION BY PRODUCT FINE WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="CustUrdPurValuationBy" name="CustUrdPurValuationBy" 
                                                           value="byFineWt" onchange="setLayoutFieldInDb('CustUrdPurValuationBy', this.value);"
                                                           <?php
                                                           if ($CustUrdPurValuationBy == 'byFineWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINE WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="OLD METAL/URD RECEIVED CALCULATION BY PRODUCT NET WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="CustUrdPurValuationBy" name="CustUrdPurValuationBy" 
                                                           value="byNetWt" onchange="setLayoutFieldInDb('CustUrdPurValuationBy', this.value);"
                                                           <?php
                                                           if ($CustUrdPurValuationBy == 'byNetWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY NET WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="OLD METAL/URD RECEIVED CALCULATION BY PRODUCT GROSS WEIGHT !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="CustUrdPurValuationBy" name="CustUrdPurValuationBy" 
                                                           value="byGrossWt" onchange="setLayoutFieldInDb('CustUrdPurValuationBy', this.value);"
                                                           <?php
                                                           if ($CustUrdPurValuationBy == 'byGrossWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY GROSS WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                            </table>
                        </td>
                    </tr> 
                </table>
            </div>
        </td>
<!--EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE-->
<!--// END ADD THIS TD FOR RAW METAL FINAL VALUVATION INDICATOR FOR CUSTOMER PURCHASE RAW METAL @YUVRAJ KAMBLE 0912022 -->
<!--EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE-->
        <td align="center" valign="middle" width="20%">
            <div style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">

            </div>
        </td>
        <td align="center" valign="middle" width="20%">
            <div style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">

            </div>
        </td>
        <td align="center" valign="middle" width="20%">
            <div style="width:98%;height:200px;padding: 0px;margin-bottom: 15px;">

            </div>
        </td>
    </tr>
    <tr>
        <td class="textLabel18CalibriNormal" colspan="5">
            <div style="margin-left:10px;margin-bottom: 10px;font-weight:bold;">RATECUT AND NORATECUT OPTIONS</div>
        </td>
    </tr>
        <tr>
<td align="center" valign="middle" width="20%">
            <div class="product-item" style="width:98%;height:200px;padding: 0px;margin-bottom:15px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" valign="middle" style="padding-top: 0px;">
                                <tr>
                                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold stockSetheadOption" 
                                        style="background-color:#edf2ff;color:#025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:5px;padding-bottom:5px;">
                                        RATECUT AND NORATECUT OPTIONS
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="RATECUT AND NORATECUT OPTIONS !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="ratenortecutoption" name="ratenortecutoption" 
                                                           value="byFFineWt" onchange="setLayoutFieldInDb('ratenortecutoption', this.value);"
                                                           <?php
                                                           if ($ratenortecutoption == 'byFFineWt' || $ratenortecutoption=='')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY FINAL FINE WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="RATECUT AND NORATECUT OPTIONS !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="ratenortecutoption" name="ratenortecutoption" 
                                                           value="byGsWt" onchange="setLayoutFieldInDb('ratenortecutoption', this.value);"
                                                           <?php
                                                           if ($ratenortecutoption == 'byGsWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY GS WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" title="RATECUT AND NORATECUT OPTIONS !">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" 
                                               style="margin-left: 35px;">
                                            <tr>
                                                <td align="left" valign="middle">
                                                    <input type="RADIO" id="ratenortecutoption" name="ratenortecutoption" 
                                                           value="byNetWt" onchange="setLayoutFieldInDb('ratenortecutoption', this.value);"
                                                           <?php
                                                           if ($ratenortecutoption == 'byNetWt')
                                                               echo 'checked';
                                                           else
                                                               echo '';
                                                           ?>/>
                                                </td>
                                                <td align="left" valign="bottom">
                                                    <span class="textLabel14CalibriBlue stockSetOption">&nbsp;&nbsp;BY NET WT</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> 
                </table>
            </div>
        </td>
    </tr>
</table>