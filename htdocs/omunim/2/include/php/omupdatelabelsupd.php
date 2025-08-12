<?php

/*
 * **************************************************************************************
 * @tutorial: Update the labels for invoices API @shreya
 * **************************************************************************************
 * 
 * Created on 15 april 2022
 *
 * @FileName: omupdatelabelsupd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:@shreya
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include 'ommprspc.php';
include_once 'ommpfndv.php';
include_once 'ommpnmwd.php';
require_once 'ommpincr.php';
include_once 'ommpfunc.php';
?>
<?php


$fieldnamearray = array(
    'itemcategoryLb',
    'itemIdLb',
    'designLb',
    'userAddressLb',
    'itemBrandNameLb',
    'itemHallMarkLb',
    'unitPriceLb',
    'userIdLb',
    'userNameLb',
    'itemSizeLb',
    'itemPktWtLb',
    'itemProcessWtLb',
    'valAddedAmtLb',
    'itemWsWtLb',
    'itemFinalPurityLb',
    'itemFinalPurityWtCsWsLb',
    'valAddedLb',
//    'itemFfnWt',
    'itemFfnWtLb',
    'rateByPurityLb',
    'itemPurityLb',
    'itemFnWtLb',
    'labourLb',
    'discountchargeLB',
    'mkgAfterDisPerLb',
//    'mkgAfterDisGm',
    'mkgAfterDisGmLb',
    'mkgBeforeDisPerLb',
    'mkgBeforeDisAmtLb',
    'labourLbVal',
    'metal_vallb',
    'valLb',
    'taxLb',
    'QTYLB',
    'vatLb',
    'mkg_lb',
    'vatAmtLb',
    'hallmarkingChargesLb',
    'diamondWtLb',
    'othChrgLb',
    'total_valwith_mkglb',
    'totalCrystallb',
    'taxPercentageLb',
    'itemCombineGstPerLb',
//    'itemCombineGstAmt',
    'itemCombineGstAmountLb',
    'stDisPerLb',
    'stDisAmtLb',
    'stcolorLb',
    'stClarityLb',
    'stQuantityLb',
    'stoneRateLb',
    'certificatenoLb',
    'schemeDepAmtLb',
    'schemeBonusDiscLb',
    'schemeRedeemAmtLb',
    'schemePaidAmtLb',
    'schemeDateLb',
    'schemeNameLb',
    'schemeInvNoLb',
    'schemeSrNoLb',
    'diaRateLb',
    'stRateLb',
    'stoneWtLb',
    'diaWtLb',
    'cgstLb',
    'sgstLb',
    'igstLb',
    'totcgstLb',
    'totsgstLb',
    'totigstLb',
    'totgstLb',
    'totalLb',
    'discLb',
    'totalmkgbfdiscLB',
    'itemFixedMrpPriceLb',
    'diamondValuetionLb',
//    'itemBarcode',
    'tableHeight',
    'metalRecLb',
    'itemHidLb',
//    'itemWtType',
    'itemWsWtLb',
//    'itemFfnWt',
//    'metalRateByPurity',
    'itemCustWsWtLb',
    'TotalVaLb',
//    'rawMetalGsWt',
    'URDInvNoTitleLb',
    'itemOtherinfoLb',
    'cashPaidInWordsLb',
    'finalPayableAmtLb',
    'discountCouponNameLb',
    'totalGsWtLb',
//    'totalMetalLb',
    'payableAmtLb',
    'totalQtyLb',
//    'rawMetalWt',
    'totalNtwtLb',
    'firmPanLb',
    'amtLb',
    'firmPanLb',
    'forNameLb',
    'userContactLb',
    'userPanLb',
    'userGstInLb',
    'userReferenceLb',
    'userEmailLb',
    'userAdhaarLb',
    'userTehsilLb',
    'userVillageLb',
    'userAccNoLb',
    'userTalukaLb',
//    'firmTin',
    'firmTinLb',
    'usercityLb',
    'userStateLb',
    'amtsLb',
    'urdLessLb',
    'jRoundOffLb',
    'jotherChargeLb',
    'totalBalLb',
    'totalFinalAmtRecLb',
    'jCgstLb',
    'jSgstLb',
    'jIgstLb',
    'jVatLb',
    'jMkgChrgCgstLb',
    'jMkgChrgSgstLb',
    'jMkgChrgIgstLb',
    'jtotmkgCgstLb',
    'jtotmkgSgstLb',
    'jtotmkgIgstLb',
    'jOtherTaxAmtLb',
    'hallmarkChrgCgstLb',
    'hallmarkChrgSgstLb',
    'hallmarkChrgIgstLb',
    'jCourierChgsAmtLb',
    'jAdvanCashLb',
//    'jTotalAmt',
    'invNoTitleLb',
    'dateTitleLb',
    'returnInvNoLb',
    'returnMainInvNoLb',
    'itemSNoLb',
    'itemHSNLb',
    'returnInvNoDateLb',
    'invNoTitleURDLb',
    'dueDateTitleLb',
    'itemGsWtLb',
    'metalRateLb',
    'placeofsupplyLb',
    'staffNameLb',
    'salesPersonNameLb',
    'amtLb',
    'userSoLb',
    'userWoLb',
    'formWidth',
    'userDoLb',
    'userCoLb',
    'jRecCourierChgsAmtLb',
    'jTotAmtLb',
    'metalRecAmtLb',
    'jRecCashLb',
    'payableAmtLb',
    'jLtPtsLB',
    'LtPtsLB',
    'finBalLb',
    'tncLb',
    'mkgChrgLb',
    'othChPayLb',
    'discwithouttaxLb',
    'cry_lb',
    'itemNtWtLb',
    'jRecCardLb',
    'jRecOnlinePayLb',
    'jPaytmCardNoLb',
    'jPaytmPayMenthodLb',
    'jPaytmTransIdLb',
    'jRecDiscLb',
    'payInfoLb',
    'urdCashtotAmtLB',
    'itemDescLb',
    'jRecCheqLb',
    'shipUserNameLb',
    'shipDetTop',
    'shipCityLb',
    'shipStateLb',
    'shipMobNoLb',
    'shipGstNoLb',
    'shipPanNoLb',
    'additionalChrgsLb',
    'netReceivableAmtLb',
    'hallmarkChrgsLb',
    'taxableamtLb',
    'amtwithmkglb',
    'amtwithmkg_crylb',
    'cashPaidLb',
//    'afterDisctotAmt',
    'firmRegNoLabel',
    'firmTinTopLb',
    'userprefixNameLb',
    'afterDisctotAmtLb',
    'itemWstgWtLb',
    'formBorderSize',
    'tableHeadingColor',
    'cashRecLb'
);
// For integers
//echo $inClause = implode(',', $fieldnamearray);

// For strings
$inClause = "'" . implode("','", array_map('addslashes', $fieldnamearray)) . "'";

// Prepare the SQL statement
$sql = "UPDATE labels SET label_field_check = 'true' WHERE label_type IN ('SellPurchase','GoldSellPurchase','SilverSellPurchase','SUPPILER_INVOICE','RawMetalPurchase','estimateSell','APPROVAL','sellReturn','PurchaseReturn','ROUGH_ESTIMATE','PendingOrderInvoice') AND label_field_name IN ($inClause) ";

 if (!mysqli_query($conn, $sql)) {
        die('Error (Line No - ' . __LINE__ . '): ' . mysqli_error($conn));
    }
include 'ommptbupdchklbl_upd.php';
include 'ommptbupd_update_label_col_name_upd.php';
?>