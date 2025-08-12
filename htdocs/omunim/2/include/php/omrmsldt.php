<?php
/*
 * **************************************************************************************
 * @tutorial: Raw Metal Select Div
 * **************************************************************************************
 * 
 * Created on Dec 31, 2013 2:10:51 PM
 *
 * @FileName: omrmsldt.php
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
//
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
include_once 'conversions.php';
?>
<?php
//
$payMetalType1 = 'sttr_metal_type' . $metalCount;
$payRawGoldPreId = 'sttr_item_pre_id' . $metalCount;
$payRawGoldPostId = 'sttr_item_id' . $metalCount;
$payMetal1FirmId = 'firmId' . $metalCount;
$payMetal1AccId = 'sttr_account_id' . $metalCount;
$payMetal1MetalDesc = 'sttr_item_name' . $metalCount;
//
// START CODE FOR LESS WEIGHT FUNCTIONALITY ON METAL REC/PAID @PRIYANKA-16MAR2019
// GS WEIGHT AND GS WEIGHT TYPE @PRIYANKA-16MAR2019
$payMetal1RecGsWt = 'sttr_gs_weight' . $metalCount;
$payMetal1RecGsWtType = 'sttr_gs_weight_type' . $metalCount;
//
// PKT WEIGHT AND PKT WEIGHT TYPE @PRIYANKA-16MAR2019
$payMetal1PktWt = 'sttr_pkt_weight' . $metalCount;
$payMetal1PktWtType = 'sttr_pkt_weight_type' . $metalCount;
//
// END CODE FOR LESS WEIGHT FUNCTIONALITY ON METAL REC/PAID @PRIYANKA-16MAR2019
//
//
// START CODE FOR ADD NEW METAL REC/PAID ENTRY - MAIN ENTRY UPDATE TIME - NEW FUNCTIONALITY @PRIYANKA-18MAR2019 
$payMetal1RecGsWtHidden = 'sttr_gs_weight_hidden' . $metalCount;
$payMetal1PktWtHidden = 'sttr_pkt_weight_hidden' . $metalCount;
// END CODE FOR ADD NEW METAL REC/PAID ENTRY - MAIN ENTRY UPDATE TIME - NEW FUNCTIONALITY @PRIYANKA-18MAR2019
//
$payMetal1PktWeightHidden = 'sttr_pkt_wt_hidden' . $metalCount;
//
$payMetal1RecWt = 'sttr_nt_weight' . $metalCount;
$payMetal1RecWtType = 'sttr_nt_weight_type' . $metalCount;
//
$payMetal1Tunch = 'sttr_purity' . $metalCount;
$payMetal1ByTunch = 'sttr_metal_trans' . $metalCount;
$payMetal1FnWt = 'sttr_fine_weight' . $metalCount;
$lbrWtAddMinusValue = 'lbrWtAddMinusValue' . $metalCount;//ADDED FOR INDICATOR TO ADD/LESS LBR WT IN FINAL FINE WEIGHT@AUTHOR:MADHUREE-09JULY2021
$payMetal1FFnWt = 'sttr_final_fine_weight' . $metalCount;//ADDED FOR FINAL FINE WEIGHT@AUTHOR:MADHUREE-09JULY2021
$payMetal1LbrWt = 'sttr_lab_charges' . $metalCount;//ADDED FOR LABOUR CHARGES WEIGHT@AUTHOR:MADHUREE-09JULY2021
$payMetal1Rate = 'sttr_metal_rate' . $metalCount;
$payMetal1Val = 'sttr_valuation' . $metalCount;
$payMetal1Bal = 'PayMetal1Bal' . $metalCount;
$payMetal1BalType = 'PayMetalBal1Type' . $metalCount;
$payMetal1MetalType = 'sttr_item_category' . $metalCount;
$payMetal1AvgRate = 'PayMetal1AvgRate' . $metalCount;
$payMetal1Pnl = 'PayMetal1Pnl' . $metalCount;
$payMetal1Indicator = 'sttr_indicator' . $metalCount;
$payMetal1TransType = 'sttr_transaction_type' . $metalCount;
$payMetal1PreInvNo = 'sttr_pre_invoice_no';
$payMetal1PostInvNo = 'sttr_invoice_no';
$payMetal1UserId = 'sttr_user_id' . $metalCount;
$payMetal1StocType = 'sttr_stock_type' . $metalCount;
$payMetal1StockType = 'sttr_type' . $metalCount;
//
$firmPanelName = 'rawFirm';
?>