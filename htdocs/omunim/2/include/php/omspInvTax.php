<?php
/*
 * **************************************************************************************
 * @tutorial: START CODE FOR TAX INVOICE ITEM TABLE 
 * **************************************************************************************
 * 
 * Created on 1ST OCT 2021
 *
 * @FileName: omspInvTax.php
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
 *  AUTHOR:
 *  REASON:
 */
?>
<?php
//header start
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpnmwd.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
include_once 'conversions.php';
?>
<style>
    .border-color-grey-rb{
        border-bottom: 1px solid #000000;
        border-right: 1px solid #000000;
    }
    .border-color-grey-r{
        border-right: 1px solid #000000;
    }
    .border-color-grey-rbu{
        border-right: 1px solid #000000;
        border-bottom: 1px solid #000000;
        border-top: 1px solid #000000;
    }
    .border-color-grey-left{
        border-left:1px solid #000000;
    }
    .border-color-grey-top{
        border-up:1px solid #000000;
    }
    .border-color-grey-ru{
        border-top: 1px solid #000000;
        border-right: 1px solid #000000;
    }
    .border-color-grey-u{
        border-top: 1px solid #000000;
    }
    .border-color-grey-bot-no{
        border-top: 0px solid #000000;
    }
    .border-color-grey-bot-yes{
        border-top: 1px solid #000000;
    }
</style>
<?php
//*******************************************************************************
//START CODE FOR TAX INVOICE ITEM TABLE : AUTHOR @ DARSHANA 30 SEPT 2021
//*******************************************************************************
parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'productBorder'"));
if ($slPrindicator == 'stockCrystal') {
    if ($omly_value == 'showBorder')
        $border_color_grey_bot = 'border-color-grey-bot-yes';
    else
        $border_color_grey_bot = 'border-color-grey-bot-no';
} else {
    if ($omly_value == 'showBorder' || $omly_value == 'prodBorder')
        $border_color_grey_bot = 'border-color-grey-bot-yes';
    else
        $border_color_grey_bot = 'border-color-grey-bot-no';
}
?>
<?php
$fieldName = 'sNo';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemSNoLb = $label_field_check;
// $itemSNoLb   $itemDescLb   $itemHsnLb
$fieldName = 'itemDesc';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemDescLb = $label_field_check;
//
$fieldName = 'itemHSN';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemHsnLb = $label_field_check;

//echo '$itemHsnLb='.$itemHsnLb;
//
$fieldName = 'itemGsWt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemGsWtLb = $label_field_check;
//
$fieldName = 'itemNtWt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemntLb = $label_field_check;
//
$fieldName = 'QTY';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemQtyLb = $label_field_check;
//
$fieldName = 'brandName';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemBrandNameLb = $label_field_check;
//
$fieldName = 'amt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemAmtLb = $label_field_check;
//
$fieldName = 'mkg_chrg_val';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemMakingChrgValLb = $label_field_check;

$fieldName = 'labour';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemLabourLb = $label_field_check;

$fieldName = 'itemPktWt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itempktLb = $label_field_check;

$fieldName = 'diamondWt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$diamondWtLb = $label_field_check;

$fieldName = 'diamondValuetion';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$diamondValuationLb = $label_field_check;

$fieldName = 'itemFfnWt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemFfnWt = $label_field_check;

$fieldName = 'itemId';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemId = $label_field_check;

$fieldName = 'metalRate';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$MetalRate = $label_field_check;

$fieldName = 'design';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$design = $label_field_check;

//brandNameDiv
$fieldName = 'brandName';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$brandName = $label_field_check;

$fieldName = 'hallMarkUid';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$hallMarkUid = $label_field_check;

$fieldName = 'unitPrice';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$unitPrice = $label_field_check;

$fieldName = 'OtherInfo';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$OtherInfoLb = $label_field_check;

$fieldName = 'itemProcessWt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemProcessWt = $label_field_check;

$fieldName = 'itemPurity';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemPurity = $label_field_check;

$fieldName = 'itemWSWt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemWSWt = $label_field_check;

$fieldName = 'itemFinalPurity';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemFinalPurity = $label_field_check;

$fieldName = 'itemFinalPurityWtCsWs';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$itemFinalPurityWtCsWs = $label_field_check;

$fieldName = 'valAdded';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$valAdded = $label_field_check;

$fieldName = 'labour';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$labour = $label_field_check;

$fieldName = 'totalmkgbfdisc';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$totalmkgbfdisc = $label_field_check;

$fieldName = 'discountchargePer';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$discountchargePer = $label_field_check;

$fieldName = 'discountchargeAmt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$discountchargeAmt = $label_field_check;

$fieldName = 'mkgAfterDisPer';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$mkgAfterDisPer = $label_field_check;

$fieldName = 'mkgAfterDisGm';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$mkgAfterDisGm = $label_field_check;

$fieldName = 'val';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$valLb = $label_field_check;

$fieldName = 'labourVal';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$labourVal = $label_field_check;

$fieldName = 'metal_val';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$metal_val = $label_field_check;

$fieldName = 'othChrg';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$othChrg = $label_field_check;

$fieldName = 'TotalVa';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$TotalVa = $label_field_check;

$fieldName = 'total_valwithmkg';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$total_valwithmkg = $label_field_check;

$fieldName = 'totalCrystal';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$totalCrystal = $label_field_check;

$fieldName = 'cgstAmt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$cgstAmt = $label_field_check;

$fieldName = 'totcgstAmt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$totcgstAmt = $label_field_check;

$fieldName = 'sgstAmt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$sgstAmt = $label_field_check;

$fieldName = 'totsgstAmt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$totsgstAmt = $label_field_check;

$fieldName = 'igstAmt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$igstAmt = $label_field_check;

$fieldName = 'totigstAmt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$totigstAmt = $label_field_check;

$fieldName = 'totgstAmt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$totgstAmt = $label_field_check;
//
//
//START CODE FOR GET FEILD NAME FOR CRYSTAL INVOICE : AUTHOR @DARSHANA 21 DEC 2021

$fieldName = 'itemId';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$cryitemId = $label_field_check;

$fieldName = 'design';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$crydesign = $label_field_check;

$fieldName = 'itemDesc';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$cryitemDesc = $label_field_check;

$fieldName = 'itemQty';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$cryitemQty = $label_field_check;

$fieldName = 'itemShape';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$cryitemShape = $label_field_check;

$fieldName = 'itemSize';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$cryitemSize = $label_field_check;

$fieldName = 'itemColor';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$cryitemColor = $label_field_check;

$fieldName = 'itemClarity';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$cryitemClarity = $label_field_check;

$fieldName = 'itemOtherInfo';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$cryitemOtherInfo = $label_field_check;

$fieldName = 'itemImtGsWt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$cryitemImtGsWt = $label_field_check;

$fieldName = 'metalImtRate';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$crymetalImtRate = $label_field_check;

$fieldName = 'val';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$cryVal = $label_field_check;

$fieldName = 'amt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$cryamt = $label_field_check;

$fieldName = 'tax';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$crytax = $label_field_check;

$fieldName = 'cgst';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$crycgst = $label_field_check;

$fieldName = 'sgst';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$crysgst = $label_field_check;

$fieldName = 'igst';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$cryigst = $label_field_check;

$fieldName = 'valAddedAmt';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$cryValAddedAmt = $label_field_check;
//Changes made for adding Stone Quantity and Rate option @Renuka_OCT_2022

$fieldName = 'stQuantity';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$stQuantityLb = $label_field_check;
//
$fieldName = 'stRate';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$stRateLb = $label_field_check;
//
?>
<table style="margin-top: 20px; width: 100%; border: solid 0px #000;border-collapse: collapse;" border="0">
    <tr>
        <td>
            <table style="border: solid 1px #000;border-collapse: collapse;width: 100%;" border="1">
                <?php
                if ($indicator == 'crystalSoldOutInv') {
                    $selectQuery = "SELECT * FROM stock_transaction WHERE sttr_pre_invoice_no ='$slPrPreInvoiceNo' and sttr_invoice_no = $slPrInvoiceNo and sttr_user_id='$userId' and "
                            . "sttr_indicator IN('crystal','Crysstal','CRYSTAL') and sttr_transaction_type IN('STOCK', 'sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ESTIMATE', 'PurchaseReturn')";
                } else if ($indicator == 'URDInv') {
                    $selectQuery = "SELECT * FROM stock_transaction WHERE sttr_pre_invoice_no ='$slPrPreInvoiceNo' and sttr_invoice_no = $slPrInvoiceNo and sttr_user_id='$userId' and "
                            . "sttr_indicator IN ('rawMetal') and sttr_transaction_type IN ('RECEIVED') and sttr_status NOT IN('DELETED') order by sttr_id ASC";
                } else {
                    $selectQuery = "SELECT * FROM stock_transaction WHERE sttr_pre_invoice_no ='$slPrPreInvoiceNo' and sttr_invoice_no = $slPrInvoiceNo and sttr_user_id='$userId' $sttr_date_str and "
                            . "sttr_indicator NOT IN('crystal','rawMetal','stockCrystal') and sttr_transaction_type IN('STOCK', 'sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ESTIMATE', 'PurchaseReturn')";
                }

                //  echo '$selectQuery=' . $selectQuery;
                $resultQuery = mysqli_query($conn, $selectQuery);
                if (mysqli_num_rows($resultQuery) > 0) {
                    $SrNo = 1;

                    while ($resSelectQuery = mysqli_fetch_array($resultQuery)) {
                        $slPrId = $resSelectQuery['sttr_id'];
                        //**************************************************************************
                        //Start code to fetch Stone Quantity and Rate  @Renuka_OCT_2022************
                        //**************************************************************************
                        $stonedetails = "SELECT * FROM stock_transaction WHERE sttr_sttr_id= '$slPrId' and sttr_indicator='stockCrystal'";
                        // echo $stonedetails;
                        $resstone = mysqli_query($conn, $stonedetails);
                        $rowstone = mysqli_fetch_array($resstone);
                        $slstQuantity = $rowstone['sttr_quantity'];
                        //echo '$slstQuantity' . $slstQuantity;
                        $slstRate = $rowstone['sttr_sell_rate'];

                        if ($slstQuantity != '') {
                            $qtytpresent = 'yes';
                        }
                        $slstRate = $rowstone['sttr_sell_rate'];
                        if ($slstRate != '') {
                            $rtpresent = 'yes';
                        }
                        //**************************************************************************
                        //End code to fetch Stone Quantity and Rate  @Renuka_OCT_2022
                        //**************************************************************************
                        $slPrItemPKTWT = $resSelectQuery['sttr_pkt_weight'];
                        $slPrItemPKTW = $resSelectQuery['sttr_pkt_weight'] . ' ' . $resSelectQuery['sttr_pkt_weight_type'];

                        if ($$slPrItemPKTWT != '') {
                            $pkwtpresent = 'yes';
                        }

                        $slPrMetalPutity = $resSelectQuery['sttr_purity'];
                        if ($slPrMetalPutity != '') {
                            $puritypresent = 'yes';
                        }

                        $slPrItemLabChargs = $resSelectQuery['sttr_making_charges'];
                        if ($slPrItemLabChargs != '') {
                            $labpresent = 'yes';
                        }

                        $slPrItemLabChargsVal = $resSelectQuery['sttr_total_lab_charges'];
                        if ($slPrItemLabChargsVal != '') {
                            $labchargepresent = 'yes';
                        }

                        $slPrOtherInfo = $resSelectQuery['sttr_other_info'];
                        if ($slPrOtherInfo != '') {
                            $labpresent = 'yes';
                        }

                        $slPrItemHSN = $resSelectQuery['sttr_hsn_no'];
                        if ($slPrItemHSN != '') {
                            $hsnpresent = 'yes';
                        }
                        $slPrHallMark = $resSelectQuery['sttr_hallmark_uid'];
                        if ($slPrHallMark != '' && $slPrHallMark != NULL) {
                            $hallMark = 'yes';
                        }

                        $other_info = $resSelectQuery['sttr_other_info'];

                        if ($other_info != '' && $other_info != NULL) {
                            $otherinfo = 'yes';
                        }

                        $productSize = $resSelectQuery['sttr_size'];

                        if ($productSize != '' && $productSize != NULL) {
                            $sizePresent = 'yes';
                        }

                        $sttr_tot_price_cgst_chrg = $resSelectQuery['sttr_tot_price_cgst_chrg'];
                        if ($sttr_tot_price_cgst_chrg != 0 || $sttr_tot_price_cgst_chrg != 0.00) {
                            $cgstpresent = 'yes';
                        }

                        $sttr_tot_price_sgst_chrg = $resSelectQuery['sttr_tot_price_sgst_chrg'];
                        if ($sttr_tot_price_sgst_chrg != 0 || $sttr_tot_price_sgst_chrg != 0.00) {
                            $sgstpresent = 'yes';
                        }

                        $sttr_tot_price_igst_chrg = $resSelectQuery['sttr_tot_price_igst_chrg'];
                        if ($sttr_tot_price_igst_chrg != '' || $sttr_tot_price_igst_chrg != 0 || $sttr_tot_price_igst_chrg != 0.00) {
                            $igstpresent = 'yes';
                        }

                        $sttr_total_making_charges = $resSelectQuery['sttr_total_making_charges'];
                        if ($sttr_total_making_charges != '') {
                            $sttrtotalmkgpresent = 'yes';
                        }

                        $sttr_making_charges = $resSelectQuery['sttr_making_charges'];
                        if ($sttr_making_charges != '') {
                            $mkgresent = 'yes';
                        }

                        $slPrItemLabChargs = $rowSlPrItemDetails['sttr_making_charges'];
                        if ($slPrItemLabChargs != '') {
                            $labpresent = 'yes';
                        }

                        $slcustPrWastage = $resSelectQuery['sttr_cust_wastage'];

                        if ($slcustPrWastage != '' && $slcustPrWastage <> 0) {
                            $custwasatagepresent = 'yes';
                        }
                        if ($resSelectQuery['sttr_cust_wastage_wt'] != '' && $resSelectQuery['sttr_cust_wastage_wt'] != NULL) {
                            $slPrItemProcessWeightNew = decimalVal($resSelectQuery['sttr_cust_wastage_wt'], 3);
                        } else {
                            $slPrItemProcessWeightNew = decimalVal($resSelectQuery['sttr_final_fine_weight'] - $resSelectQuery['sttr_nt_weight'], 3);
                        }

                        if ($slPrItemProcessWeightNew > 0) {
                            $processwtpresent = 'yes';
                        }
                        $otherCharges = $resSelectQuery['sttr_other_charges'];

                        if ($otherCharges != '' && $otherCharges != NULL) {
                            $otherChargesPresent = 'yes';
                        }

                        if ($resSelectQuery['sttr_metal_discount_amt'] > 0) {
                            $metalDiscountPresent = 'YES';
                        }
                        if ($resSelectQuery['sttr_mkg_discount_amt'] > 0) {
                            $mkgDiscountPresent = 'YES';
                        }
                        if ($resSelectQuery['sttr_stone_discount_amt'] > 0) {
                            $stoneDiscountPresent = 'YES';
                        }
                        if ($resSelectQuery['sttr_mkg_discount_amt'] > 0) {
                            $mkgAfterDiscInGmPresent = 'YES';
                            $mkgAfterDiscInPerPresent = 'YES';
                        }

                        if ($slPrBrandName != '' && $slPrBrandName != NULL) {
                            $brand = 'yes';
                        }
                        if ($sltranstype == 'ESTIMATESELL') {
                            parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'sellEstimateItemPayamentDetails'"));
                            if ($omly_value == 'YES') {
                                $sellEstimateDetails = 'YES';
                            } else {
                                $sellEstimateDetails = 'NO';
                            }
                        }
                        $slPrId = $resSelectQuery['sttr_id'];
                        $slPrItemId = $resSelectQuery['sttr_item_pre_id'] . ' ' . $resSelectQuery['sttr_item_id'];
                        $slPrMetalType = $resSelectQuery['sttr_metal_type'];
                        $slPrItemName = $resSelectQuery['sttr_item_name'];
                        $slPrItemQty = $resSelectQuery['sttr_quantity'];
                        $slPrItemGSW = $resSelectQuery['sttr_gs_weight'] . ' ' . $resSelectQuery['sttr_gs_weight_type'];
                        $slPrItemPKTW = $resSelectQuery['sttr_pkt_weight'] . ' ' . $resSelectQuery['sttr_pkt_weight_type']; //add code for pkt wt Author:SANT08APR17
                        $slPrItemNTW = $resSelectQuery['sttr_nt_weight'] . ' ' . $resSelectQuery['sttr_nt_weight_type'];
                        $slprFfnWt = $resSelectQuery['sttr_final_fine_weight'] . ' ' . $resSelectQuery['sttr_nt_weight_type'];
                        $slPrMetalRate = $resSelectQuery['sttr_metal_rate'];
                        $slPrPurchaseRate = $resSelectQuery['sttr_sell_rate'];

                        $sttr_metal_discount_amt = $resSelectQuery['sttr_metal_discount_amt'];
                        $sttr_mkg_discount_amt = $resSelectQuery['sttr_mkg_discount_amt'];
                        $sttr_metal_discount_per = $resSelectQuery['sttr_metal_discount_per'];
                        $sttr_mkg_discount_per = $resSelectQuery['sttr_mkg_discount_per'];
                        $sttr_stone_discount_amt = $resSelectQuery['sttr_stone_discount_amt'];
                        $sttr_stone_discount_per = $resSelectQuery['sttr_stone_discount_per'];
                        $slPrindicator = $resSelectQuery['sttr_indicator'];
                        $slPrMetalPutity = $resSelectQuery['sttr_purity'];
                        $slPrMetalFinalPutity = $resSelectQuery['sttr_final_purity'];
                        $slPrWastage = $resSelectQuery['sttr_wastage'];
                        $slcustPrWastage = $resSelectQuery['sttr_cust_wastage'];
                        $slPrItemVal = $resSelectQuery['sttr_valuation'];
                        $slPrItemFinVal = $resSelectQuery['sttr_final_valuation'];
//                        echo '$slPrItemFinVal=='.$slPrItemFinVal.'<br>';
                        $slPrItemLabChargs = $resSelectQuery['sttr_making_charges'];
                        $stone_valuation = $resSelectQuery['sttr_stone_valuation'];
                        $sttr_total_making_amt = $resSelectQuery['sttr_total_making_amt'];
                        $sttr_metal_amt = $resSelectQuery['sttr_metal_amt'];
                        $sttr_stone_amt = $resSelectQuery['sttr_stone_amt'];

                        $slPrItemLabChrgsType = $resSelectQuery['sttr_making_charges_type'];
                        $slPrItemValueAdded = $resSelectQuery['sttr_value_add'];
                        $totalFinalBalance += $slPrItemFinVal;
                        $valueByWeight = ($resSelectQuery['sttr_final_purity'] - 100) / 100;
                        $slpr_value_added = $resSelectQuery['sttr_value_added'];
                        $slPrItemLabourChgsBy = $resSelectQuery['sttr_other_charges_by'];
                        $slPrItemWtBy = $resSelectQuery['sttr_final_valuation_by'];
                        $slPrCryValuation = $resSelectQuery['sttr_stone_valuation'];
                        $sttrIndicator = $resSelectQuery['sttr_indicator'];
                        $slPrItemLabChargsVal = $resSelectQuery['sttr_total_lab_charges'];
                        $slPrItemLabType = $resSelectQuery['sttr_lab_charges_type'];
                        $slPrItemHSN = $resSelectQuery['sttr_hsn_no'];
                        $slPrItmCode = $resSelectQuery['sttr_item_code'];
                        $sltranstype = $resSelectQuery['sttr_transaction_type'];
                        $slPrHallMark = $resSelectQuery['sttr_hallmark_uid'];

                        $sttr_valuation = $resSelectQuery['sttr_valuation'];

                        $sttr_mkg_cgst_per = $resSelectQuery['sttr_mkg_cgst_per'];
                        $sttr_mkg_cgst_chrg = $resSelectQuery['sttr_mkg_cgst_chrg'];
                        $sttr_mkg_sgst_per = $resSelectQuery['sttr_mkg_sgst_per'];
                        $sttr_mkg_sgst_chrg = $resSelectQuery['sttr_mkg_sgst_chrg'];
                        $sttr_mkg_igst_per = $resSelectQuery['sttr_mkg_igst_per'];
                        $sttr_mkg_igst_chrg = $resSelectQuery['sttr_mkg_igst_chrg'];

                        //ON TOTAL PRICE CGST,SGST,IGST
                        $sttr_tot_price_cgst_per = $resSelectQuery['sttr_tot_price_cgst_per'];
                        $sttr_tot_price_cgst_chrg = $resSelectQuery['sttr_tot_price_cgst_chrg'];
                        $sttr_tot_price_sgst_per = $resSelectQuery['sttr_tot_price_sgst_per'];
                        $sttr_tot_price_sgst_chrg = $resSelectQuery['sttr_tot_price_sgst_chrg'];
                        $sttr_tot_price_igst_per = $resSelectQuery['sttr_tot_price_igst_per'];
                        $sttr_tot_price_igst_chrg = $resSelectQuery['sttr_tot_price_igst_chrg'];

                        $sttr_total_making_charges = $resSelectQuery['sttr_total_making_charges'];
                        $sttr_making_charges = $resSelectQuery['sttr_making_charges'];
                        $sttr_making_charges_type = $resSelectQuery['sttr_making_charges_type'];

                        $sttr_total_cust_price = $resSelectQuery['sttr_total_cust_price'];
                        $sttr_item_other_info = $resSelectQuery['sttr_item_other_info'];

                        $OtherCharges = $resSelectQuery['sttr_other_charges']; // OTHER CHARGES
                        $sttr_other_info = $resSelectQuery['sttr_other_info']; // OTHER INFO
                        $OtherChargesType = $resSelectQuery['sttr_other_charges_type']; // OTHER CHARGES TYPE
                        $OtherChargesBy = $resSelectQuery['sttr_nt_weight']; // OTHER CHARGES BY NET WEIGHT
                        $otherWeightType = $resSelectQuery['sttr_nt_weight_type']; // NET WEIGHT TYPE
                        $sttr_stone_wt = $resSelectQuery['sttr_stone_wt'];
                        $sttr_stone_wt_type = $resSelectQuery['sttr_stone_wt_type'];
                        $sttr_stone_valuation = $resSelectQuery['sttr_stone_valuation'];
                        $sttr_final_valuation = $resSelectQuery['sttr_final_valuation'];
//                        echo '$sttr_final_valuation=='.$sttr_final_valuation.'<br>';
                        $sttr_brand_id = $resSelectQuery['sttr_brand_id'];

                        $sttr_valuation = $resSelectQuery['sttr_valuation'];

                        $sttr_mkg_cgst_per = $resSelectQuery['sttr_mkg_cgst_per'];
                        $sttr_mkg_cgst_chrg = $resSelectQuery['sttr_mkg_cgst_chrg'];
                        $sttr_mkg_sgst_per = $resSelectQuery['sttr_mkg_sgst_per'];
                        $sttr_mkg_sgst_chrg = $resSelectQuery['sttr_mkg_sgst_chrg'];
                        $sttr_mkg_igst_per = $resSelectQuery['sttr_mkg_igst_per'];
                        $sttr_mkg_igst_chrg = $resSelectQuery['sttr_mkg_igst_chrg'];

                        //ON TOTAL PRICE CGST,SGST,IGST
                        $sttr_tot_price_cgst_per = $resSelectQuery['sttr_tot_price_cgst_per'];
                        $sttr_tot_price_cgst_chrg = $resSelectQuery['sttr_tot_price_cgst_chrg'];
                        $sttr_tot_price_sgst_per = $resSelectQuery['sttr_tot_price_sgst_per'];
                        $sttr_tot_price_sgst_chrg = $resSelectQuery['sttr_tot_price_sgst_chrg'];
                        $sttr_tot_price_igst_per = $resSelectQuery['sttr_tot_price_igst_per'];
                        $sttr_tot_price_igst_chrg = $resSelectQuery['sttr_tot_price_igst_chrg'];

                        $sttr_total_making_charges = $resSelectQuery['sttr_total_making_charges'];
                        $sttr_making_charges = $resSelectQuery['sttr_making_charges'];
                        $sttr_making_charges_type = $resSelectQuery['sttr_making_charges_type'];

                        $sttr_total_cust_price = $resSelectQuery['sttr_total_cust_price'];
                        $sttr_item_other_info = $resSelectQuery['sttr_item_other_info'];

                        //
                        $sttr_shape = $resSelectQuery['sttr_shape'];
                        $sttr_size = $resSelectQuery['sttr_size'];
                        $sttr_color = $resSelectQuery['sttr_color'];
                        $sttr_clarity = $resSelectQuery['sttr_clarity'];
                        $sttr_other_info = $resSelectQuery['sttr_other_info'];
                        $totalURDamount += $resSelectQuery['sttr_valuation'];

                        $totalOtherCharges = 0;
                        //
                        //echo '$OtherCharges @@##== '.$OtherCharges.'<br />';
                        //echo '$OtherChargesType @@##== ' . $OtherChargesType . '<br />';
                        if ($sttr_brand_id != '' && $sttr_brand_id != NULL) {
                            $brand = 'yes';
                        }

                        if ($slPrItemQty > 0) {
                            $slUnitPrice = $slPrItemVal / $slPrItemQty;
                        } else {
                            $slUnitPrice = $slPrItemVal;
                        }
                        //
                        if ($OtherCharges > 0) {
                            //
                            if ($OtherChargesType == 'KG') {
                                //
                                if ($otherWeightType == 'KG')
                                    $totalOtherCharges = $OtherCharges * $OtherChargesBy;
                                else if ($otherWeightType == 'GM')
                                    $totalOtherCharges = ($OtherCharges / 1000) * $OtherChargesBy;
                                else
                                    $totalOtherCharges = ($OtherCharges / (1000 * 1000)) * $OtherChargesBy;
                                //
                            } else if ($OtherChargesType == 'GM') {
                                //
                                if ($otherWeightType == 'KG')
                                    $totalOtherCharges = $OtherCharges * 1000 * $OtherChargesBy;
                                else if ($otherWeightType == 'GM')
                                    $totalOtherCharges = $OtherCharges * $OtherChargesBy;
                                else
                                    $totalOtherCharges = ($OtherCharges / 1000) * $OtherChargesBy;
                                //
                            } else if ($OtherChargesType == 'MG') {
                                //
                                if ($otherWeightType == 'KG')
                                    $totalOtherCharges = $OtherCharges * 1000 * 1000 * $OtherChargesBy;
                                else if ($otherWeightType == 'GM')
                                    $totalOtherCharges = $OtherCharges * 1000 * $OtherChargesBy;
                                else
                                    $totalOtherCharges = $OtherCharges * $OtherChargesBy;
                                //
                            } else if ($OtherChargesType == 'PP') {
                                $totalOtherCharges = $OtherCharges * $slPrItemQty;
                            } else if ($OtherChargesType == 'per') {
                                //
                                $OthCharges = ($OtherCharges * $OtherChargesBy) / 100;
                                //
                                if ($slPrMetalType == 'Gold') {
                                    if ($otherWeightType == 'KG') {
                                        $totalOtherCharges = (($OthCharges * $slPrMetalRate) * 100);
                                    } else if ($otherWeightType == 'GM') {
                                        $totalOtherCharges = (($OthCharges * $slPrMetalRate) / 10);
                                    } else if ($otherWeightType == 'MG') {
                                        $totalOtherCharges = (($OthCharges * $slPrMetalRate) / (100 * 100));
                                    }
                                } else if ($slPrMetalType == 'Silver') {
                                    if ($otherWeightType == 'KG') {
                                        $totalOtherCharges = ($OthCharges * $slPrMetalRate);
                                    } else if ($otherWeightType == 'GM') {
                                        $totalOtherCharges = (($OthCharges * $slPrMetalRate) / 1000);
                                    } else if ($otherWeightType == 'MG') {
                                        $totalOtherCharges = (($OthCharges * $slPrMetalRate) / (1000 * 1000));
                                    }
                                }
                                //
                            } else if ($OtherChargesType == 'Fixed') {
                                $totalOtherCharges = $OtherCharges;
                            }

                            $totalOthChgs += $totalOtherCharges;
                        }

                        if ($resSelectQuery['sttr_image_id'] != '') {
                            $designpresent = 'yes';
                        } else if ($resSelectQuery['sttr_sttr_id'] != '') {
                            parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction "
                                            . "WHERE sttr_id='$resSelectQuery[sttr_sttr_id]' $sttr_date_str and sttr_transaction_type NOT IN ('sell','ESTIMATESELL')"));
                            if ($sttr_image_id != '') {
                                $designpresent = 'yes';
                            }
                        }

                        $totalLabNOthCharges = 0;
                        $totMkgAfterDisInGm = 0;
                        $totMkgAfterDiscInPer = 0;
                        if ($sttr_mkg_discount_per != '' && $sttr_mkg_discount_per != '0' && $sttr_mkg_discount_per != NULL && $sttrIndicator != 'stockCrystal') {
                            if ($itemCustLabChrgT == 'per') {
                                $mkgAfterDiscInPer = round(($itemCustLabChrg * $sttr_mkg_discount_per) / 100, 2);
                                $totMkgAfterDiscInPer = round($itemCustLabChrg - $mkgAfterDiscInPer, 2);
                                $labNOthCharges = ($totMkgAfterDiscInPer * $itemWeight) / 100;
                                //
                                if ($itemMetalType == 'Gold' || $itemMetalType == 'GOLD') {
                                    if ($itemGSWT == 'KG') {
                                        $totalLabNOthCharges = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) * 100);
                                    } else if ($itemGSWT == 'GM') {
                                        $totalLabNOthCharges = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / 10);
                                    } else if ($itemGSWT == 'MG') {
                                        $totalLabNOthCharges = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / (100 * 100));
                                    }
                                } else if ($itemMetalType == 'Silver' || $itemMetalType == 'SILVER') {
                                    if ($itemGSWT == 'KG') {
                                        $totalLabNOthCharges = ($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate'] );
                                    } else if ($itemGSWT == 'GM') {
                                        $totalLabNOthCharges = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / 1000);
                                    } else if ($itemGSWT == 'MG') {
                                        $totalLabNOthCharges = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / (1000 * 1000));
                                    }
                                }
                                //
                                $totMkgAfterDisInGm = round(($totalLabNOthCharges / $itemGSW), 2);
                            } else if ($itemCustLabChrgT == 'KG') {
                                if ($itemGSWT == 'KG') {
                                    $totalLabNOthCharges = $itemCustLabChrg * $itemWeight;
                                } else if ($itemGSWT == 'GM') {
                                    $totalLabNOthCharges = ($itemCustLabChrg / 1000) * $itemWeight;
                                } else {
                                    $totalLabNOthCharges = ($itemCustLabChrg / (1000 * 1000)) * $itemWeight;
                                }
                                //
                                $makingDiscInKg = round(($itemCustLabChrg * $sttr_mkg_discount_per) / 100, 2);
                                $totMkgAfterDisInGm = $itemCustLabChrg - $makingDiscInKg;
                                $totalMkgInPer = round($itemMetalValution / $totalLabNOthCharges, 2);
                                $mkgAfterDiscInPer = round(($totalMkgInPer * $sttr_mkg_discount_per) / 100, 2);
                                $totMkgAfterDiscInPer = round($totalMkgInPer - $mkgAfterDiscInPer, 2);
                                //
                            } else if ($itemCustLabChrgT == 'GM') {
                                if ($itemGSWT == 'KG') {
                                    $totalLabNOthCharges = $itemCustLabChrg * 1000 * $itemWeight;
                                } else if ($itemGSWT == 'GM') {
                                    $totalLabNOthCharges = $itemCustLabChrg * $itemWeight;
                                } else {
                                    $totalLabNOthCharges = ($itemCustLabChrg / 1000) * $itemWeight;
                                }
                                //
                                $makingDiscInGm = round(($itemCustLabChrg * $sttr_mkg_discount_per) / 100, 2);
                                $totMkgAfterDisInGm = $itemCustLabChrg - $makingDiscInGm;
                                $totalMkgInPer = round($itemMetalValution / $totalLabNOthCharges, 2);
                                $mkgAfterDiscInPer = round(($totalMkgInPer * $sttr_mkg_discount_per) / 100, 2);
                                $totMkgAfterDiscInPer = round($totalMkgInPer - $mkgAfterDiscInPer, 2);
                                //
                            } else if ($itemCustLabChrgT == 'MG') {
                                if ($itemGSWT == 'KG') {
                                    $totalLabNOthCharges = $itemCustLabChrg * 1000 * 1000 * $itemWeight;
                                } else if ($itemGSWT == 'GM') {
                                    $totalLabNOthCharges = $itemCustLabChrg * 1000 * $itemWeight;
                                } else {
                                    $totalLabNOthCharges = $itemCustLabChrg * $itemWeight;
                                }
                                //
                                $makingDiscInMg = round(($itemCustLabChrg * $sttr_mkg_discount_per) / 100, 2);
                                $totMkgAfterDisInGm = $itemCustLabChrg - $makingDiscInMg;
                                $totalMkgInPer = round($itemMetalValution / $totalLabNOthCharges, 2);
                                $mkgAfterDiscInPer = round(($totalMkgInPer * $sttr_mkg_discount_per) / 100, 2);
                                $totMkgAfterDiscInPer = round($totalMkgInPer - $mkgAfterDiscInPer, 2);
                                //
                            }
                        }
                        if ($counter == 1) {
                            ?>
                            <tr style="background-color:#<?php echo $tableHeadingColor; ?>;">
                                <?php
                                if ($indicator == 'crystalSoldOutInv') {
                                    if ($cryitemId == 'true') {
                                        $fieldName = 'itemIdLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($crydesign == 'true' && $designpresent == 'yes') {
                                        $fieldName = 'designLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($cryitemDesc == 'true') {
                                        $fieldName = 'itemDescLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($cryitemQty == 'true') {
                                        $fieldName = 'itemQtyLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($cryitemImtGsWt == 'true') {
                                        $fieldName = 'itemImtGsWtLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($cryitemShape == 'true' && $sttr_shape != '' && $sttr_shape != NULL) {
                                        $fieldName = 'itemShapeLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($cryitemSize == 'true' && $sttr_size != '' && $sttr_size != NULL) {
                                        $fieldName = 'itemSizeLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($cryitemColor == 'true' && $sttr_color != '' && $sttr_color != NULL) {
                                        $fieldName = 'itemColorLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($cryitemClarity == 'true' && $sttr_clarity != '' && $sttr_clarity != NULL) {
                                        $fieldName = 'itemClarityLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($cryitemOtherInfo == 'true' && $sttr_other_info != '' && $sttr_other_info != NULL) {
                                        $fieldName = 'itemOtherInfoLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($crymetalImtRate == 'true' && $slPrPurchaseRate != '' && $slPrPurchaseRate != NULL) {
                                        $fieldName = 'metalImtRateLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($cryVal == 'true' && $sttr_valuation != 0) {
                                        $fieldName = 'valLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($crytax == 'true') {
                                        $fieldName = 'tax';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($cryValAddedAmt == 'true' && $slpr_value_added != '' && $slpr_value_added != NULL) {
                                        $fieldName = 'valAddedAmt';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($crycgst == 'true' && $cgstpresent == 'yes') {
                                        $fieldName = 'cgstLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($crysgst == 'true' && $sgstpresent == 'yes') {
                                        $fieldName = 'sgstLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($cryigst == 'true' && $igstpresent == 'yes') {
                                        $fieldName = 'igstLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($cryamt == 'true' && $sttr_final_valuation != 0) {
                                        $fieldName = 'amtLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                } else {
                                    if ($itemSNoLb == 'true') {
                                        $fieldName = 'itemSNoLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    //$itemId
                                    if ($itemId == 'true') {
                                        $fieldName = 'itemIdLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    //$design
                                    if ($design == 'true' && $designpresent == 'yes') {
                                        $fieldName = 'designLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_black" align="center" 
                                            style="font-size: <?php
                                            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                echo $label_field_font_size;
                                            } else {
                                                ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($itemDescLb == 'true') {
                                        $fieldName = 'itemDescLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    //$brandName
                                    if ($brandName == 'true' && $brand == 'yes') {
                                        $fieldName = 'itemBrandNameLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($hallMarkUid == 'true' && $hallMark == 'yes') {
                                        $fieldName = 'itemHallMarkLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($itemHsnLb == 'true') {
                                        $fieldName = 'itemHSNLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($OtherInfoLb == 'true' && $otherinfo == 'yes') {
                                        $fieldName = 'itemotherinfoLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($itemQtyLb == 'true') {
                                        $fieldName = 'QTYLB';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($unitPrice == 'true') {
                                        $fieldName = 'unitPriceLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>  
                                    <?php
                                    if ($itemGsWtLb == 'true') {
                                        $fieldName = 'itemGsWtLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($itemntLb == 'true') {
                                        $fieldName = 'itemNtWtLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($itempktLb == 'true' && $pkwtpresent == 'yes') {
                                        $fieldName = 'itemPktWtLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                    <?php } ?>

                                    <?php
                                    if ($itemProcessWt == 'true' && $processwtpresent == 'yes' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                                        $fieldName = 'itemProcessWtLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                    <?php } ?>
                                    <?php
                                    if ($itemPurity == 'true') {
                                        $fieldName = 'itemPurityLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($itemWSWt == 'true') {
                                        $fieldName = 'itemWsWtLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td> 
                                    <?php } ?>
                                    <?php
                                    if ($itemFinalPurity == 'true') {
                                        $fieldName = 'itemFinalPurityLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td> 
                                    <?php } ?>

                                    <?php
                                    if ($itemFinalPurityWtCsWs == 'true') {
                                        $fieldName = 'itemFinalPurityWtCsWsLb';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php // echo 'diamond=' .$label_field_content;?>
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($valAdded == 'true' && $custwasatagepresent == 'yes') {
                                        $fieldName = 'valAddedLb';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php //echo 'diamond=' .$label_field_content;?>
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($itemFfnWt == 'true') {
                                        $fieldName = 'itemFfnWtLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($diamondWtLb == 'true') {
                                        $fieldName = 'diamondWtLb';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php //echo 'diamond=' .$label_field_content;?>
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($diamondValuationLb == 'true') {
                                        $fieldName = 'diamondValuetionLb';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php // echo 'diamond=' .$label_field_content;?>
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <!---------------------Start code fro adding Stone Quantity and Rate @RENUKA_OCT2022-------->
                                    <?php
                                    if (($stQuantityLb == 'true') && ($qtytpresent == 'yes')) {
                                        $fieldName = 'stQuantity';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            $diamondValuationLb
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php //echo 'diamond=' .$label_field_content;?>
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if (($stRateLb == 'true') && ($rtpresent == 'yes')) {
                                        $fieldName = 'stRate';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php //echo 'diamond=' .$label_field_content;?>
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?><!---------------------End code fro adding Stone Quantity and Rate @RENUKA_OCT2022-------->
                                    <?php
                                    if ($labour == 'true' && ($mkgresent == 'yes' || $labpresent == 'yes')) {
                                        $fieldName = 'labourLb';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php // echo 'diamond=' .$label_field_content;?>
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($totalmkgbfdisc == 'true') {
                                        $fieldName = 'totalmkgbfdiscLB';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php //echo 'diamond=' .$label_field_content;?>
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if (($discountchargePer == 'true' || $discountchargeAmt == 'true') && (($sttr_stone_discount_amt != 0 && $sttr_stone_discount_amt != '') || ($sttr_metal_discount_amt != 0 && $sttr_metal_discount_amt != '') || ($sttr_mkg_discount_amt != '' && $sttr_mkg_discount_amt != 0) || ($mkgDiscountPresent == 'YES') || ($metalDiscountPresent == 'YES') || ($stoneDiscountPresent == 'YES'))) {
                                        $fieldName = 'discountchargeLB';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php // echo 'diamond=' .$label_field_content;?>
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($mkgAfterDisPer == 'true' && $mkgAfterDiscInPerPresent == 'YES') {
                                        $fieldName = 'mkgAfterDisPerLb';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php // echo 'diamond=' .$label_field_content;?>
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($mkgAfterDisGm == 'true' && $mkgAfterDiscInGmPresent == 'YES') {
                                        $fieldName = 'mkgAfterDisGmLb';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php // echo 'diamond=' .$label_field_content;?>
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?> 
                                    <?php
                                    if ($valLb == 'true') {
                                        $fieldName = 'valLb';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php // echo 'diamond=' .$label_field_content;?>
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($labourVal == 'true') {
                                        $fieldName = 'labourLbVal';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php // echo 'diamond=' .$label_field_content;?>
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($metal_val == 'true') {
                                        $fieldName = 'metal_vallb';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php // echo 'diamond=' .$label_field_content;?>
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($itemMakingChrgValLb == 'true') {
                                        $fieldName = 'mkg_lb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">

                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($othChrg == 'true') {
                                        $fieldName = 'othChrgLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>   
                                    <?php } ?>
                                    <?php
                                    if ($TotalVa == 'true') {
                                        $fieldName = 'TotalVaLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>   
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($total_valwithmkg == 'true') {
                                        $fieldName = 'total_valwith_mkglb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>   
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($totalCrystal == 'true') {
                                        $fieldName = 'totalCrystallb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>   
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($cgstAmt == 'true' && $cgstpresent == 'yes') {
                                        $fieldName = 'cgstLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>   

                                    <?php } ?>
                                    <?php
                                    if ($totcgstAmt == 'true' && $sttr_tot_price_cgst_per > 0 && $sttr_tot_price_cgst_chrg > 0) {
                                        $fieldName = 'totcgstLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>   

                                    <?php } ?>
                                    <?php
                                    if ($sgstAmt == 'true' && $sgstpresent == 'yes') {
                                        $fieldName = 'sgstLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($totsgstAmt == 'true' && $sttr_tot_price_sgst_per > 0 && $sttr_tot_price_sgst_chrg > 0) {
                                        $fieldName = 'totsgstLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($igstAmt == 'true' && $igstpresent == 'yes') {
                                        $fieldName = 'igstLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($totigstAmt == 'true' && $sttr_tot_price_igst_per > 0 && $sttr_tot_price_igst_chrg > 0) {
                                        $fieldName = 'totigstLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($totgstAmt == 'true') {
                                        $fieldName = 'totgstLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($MetalRate == 'true') {
                                        $fieldName = 'metalRateLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($itemAmtLb == 'true' && $sttr_final_valuation != 0) {
                                        $fieldName = 'amtLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu   font_color_black" align="center" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px; color: <?php echo $label_field_font_color; ?>;padding: 5px;">
                                            <?php echo $label_field_content; ?> 
                                        </td>
                                        <?php
                                    }
                                }
                                ?>
                            </tr>
                            <?php
                        } $counter = 2;
                        {
                            ?>
                            <tr class="marginTop10" style="height: 40px;border-bottom: solid 1px #000;">
                                <?php
                                if ($indicator == 'crystalSoldOutInv') {
                                    if ($cryitemId == 'true') {
                                        $fieldName = 'itemId';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>  
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                        <?php echo $SrNo; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($crydesign == 'true' && $designpresent == 'yes') {
                                        ?>
                                        <td align="center" class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?>" valign="top">
                                            <?php if ($rowSlPrItemDetails['slpr_snap_fname'] != '') { ?>
                                                <a style="cursor: pointer;" onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ogsprsim.php?itst_id=<?php echo "$resSelectQuery[slpr_id]"; ?>&panelName=sellInvPanel&imgPanelName=snap',
                                                                                        'popup', 'width=400,height=400,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                                                return false" >
                                                    <img src="<?php echo $documentRootBSlash; ?>/include/php/ogsprsim.php?itst_id=<?php echo $rowSlPrItemDetails['slpr_id']; ?>&panelName=sellInvPanel" 
                                                         width="64px" height="64px" border="0" style="border-color: #B8860B"/>
                                                </a>
                                                <?php
                                            }

                                            $imageFName = '';
                                            if ($invName == 'metalPurchase' || $invName == 'rawMetalSale') {
                                                parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction WHERE sttr_id='$slPrId'"));
                                            } else {
                                                parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction "
                                                                . "WHERE sttr_id='$resSelectQuery[sttr_sttr_id]' and sttr_transaction_type NOT IN ('sell','ESTIMATESELL')"));
                                            }
                                            if ($sttr_image_id != NULL && $sttr_image_id != '') {
                                                parse_str(getTableValues("SELECT image_snap_fname FROM image WHERE image_id='$sttr_image_id'"));
                                                $imageFName = $image_snap_fname;
                                            }
                                            if ($imageFName == '')
                                                parse_str(getTableValues("SELECT itm_nm_id,itm_nm_snap_fname FROM item_name WHERE itm_nm_name='$slPrItemName'"));

                                            if ($imageFName != '' && $sttrIndicator != 'stockCrystal') {
                                                ?>
                                                <a style="cursor: pointer;" 
                                                   onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ogsprsim.php?itst_id=<?php echo "$sttr_image_id"; ?>',
                                                                                           'popup', 'width=600,height=600,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                                                   return false" >
                                                    <img src="<?php echo $documentRootBSlash; ?>/include/php/ogspicim.php?itst_id=<?php echo "$sttr_image_id"; ?>" 
                                                         width="64px" height="64px" alt ="Item Design" border="0" style="border-color: #B8860B"/>
                                                </a>
                                                <?php
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                        <?php
                                    }
                                    if ($cryitemDesc == 'true') {
                                        $fieldName = 'itemDesc';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">
                    <?php echo $slPrItemName; ?> 

                                        </td>
                                        <?php
                                    }
                                    if ($cryitemQty == 'true') {
                                        $totQty += $slPrItemQty;
                                        $fieldName = 'itemQty';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                    <?php echo $slPrItemQty; ?> 
                                        </td>

                                        <?php
                                    }
                                    if ($cryitemImtGsWt == 'true') {
                                        $totGsWt += $slPrItemGSW;
                                        $fieldName = 'itemImtGsWt';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                        <?php echo $slPrItemGSW; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($cryitemShape == 'true' && $sttr_shape != '' && $sttr_shape != NULL) {
                                        $fieldName = 'itemShape';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                    <?php echo $sttr_shape; ?> 
                                        </td>

                                        <?php
                                    }
                                    if ($cryitemSize == 'true' && $sttr_size != '' && $sttr_size != NULL) {
                                        $fieldName = 'itemSize';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                    <?php echo $sttr_size; ?> 
                                        </td>

                                        <?php
                                    }
                                    if ($cryitemColor == 'true' && $sttr_color != '' && $sttr_color != NULL) {
                                        $fieldName = 'itemColor';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                    <?php echo $sttr_color; ?> 
                                        </td>

                                        <?php
                                    }
                                    if ($cryitemClarity == 'true' && $sttr_clarity != '' && $sttr_clarity != NULL) {
                                        $fieldName = 'itemClarity';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                    <?php echo $sttr_clarity; ?> 
                                        </td>

                                        <?php
                                    }
                                    if ($cryitemOtherInfo == 'true' && $sttr_other_info != '' && $sttr_other_info != NULL) {
                                        $fieldName = 'itemOtherInfo';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                    <?php echo $sttr_other_info; ?> 
                                        </td>

                                        <?php
                                    }
                                    if ($crymetalImtRate == 'true' && $slPrPurchaseRate != '' && $slPrPurchaseRate != NULL) {
//                                        echo '$crymetalImtRate=' . $crymetalImtRate;
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                        <?php echo number_format($slPrPurchaseRate, 2); ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($cryVal == 'true' && $sttr_valuation != 0) {
                                        $fieldName = 'val';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                        <?php echo number_format($sttr_valuation, 2); ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($crytax == 'true') {
                                        $fieldName = 'tax';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                        <?php echo $sttr_tot_tax; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($cryValAddedAmt == 'true' && $slpr_value_added != '' && $slpr_value_added != NULL) {
                                        $fieldName = 'valAddedAmt';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                        <?php echo $slpr_value_added; ?> 
                                        </td>
                                        <?php
                                    }
                                    if ($crycgst == 'true' && $cgstpresent == 'yes') {
                                        $fieldName = 'cgstAmt';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <table>
                                                <tr> 
                                                    <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                        <div class="paddingRight5 <?php
                                                        if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                            echo"border-color-grey-b";
                                                        }
                                                        ?>">
                                                                 <?php
                                                                 echo '$sttr_tot_price_cgst_per=' . $sttr_tot_price_cgst_per;
                                                                 if ($sttr_tot_price_cgst_per != 0 && $sttr_tot_price_cgst_per != '') {
                                                                     echo ($sttr_tot_price_cgst_per) . '%';
                                                                 } else {
                                                                     echo"-";
                                                                 }
                                                                 ?></div>
                                                    </td>
                                                    <td align="right" valign="top" width = "50%">
                                                        <div class="paddingRight5  <?php
                                                        if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                            echo"border-color-grey-b";
                                                        }
                                                        ?>">

                                                            <?php
                                                            if ($sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '') {
                                                                echo decimalVal($sttr_tot_price_cgst_chrg, 2);
                                                            } else {
                                                                echo"-";
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr> 
                                                    <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                        <div class="paddingRight5 ">
                                                            <?php
                                                            if ($sttr_mkg_cgst_per != '' && $sttr_mkg_cgst_per != 0) {
                                                                echo ($sttr_mkg_cgst_per) . '%';
                                                            }
                                                            ?></div>
                                                    </td>
                                                    <td align="right" valign="top" width = "50%">
                                                        <div class="paddingRight5 ff_calibri">
                                                            <?php
                                                            if ($sttr_mkg_cgst_chrg != 0 && $sttr_mkg_cgst_chrg != '') {
                                                                echo decimalVal($sttr_mkg_cgst_chrg, 2);
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <?php
                                    }
                                    if ($crysgst == 'true' && $sgstpresent == 'yes') {
                                        $fieldName = 'sgstAmt';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <table>
                                                <tr> 
                                                    <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                        <div class="paddingRight5 <?php
                                                        if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                            echo"border-color-grey-b";
                                                        }
                                                        ?>">
                                                                 <?php
                                                                 if ($sttr_tot_price_sgst_per != '' && $sttr_tot_price_sgst_per != 0) {
                                                                     echo ($sttr_tot_price_sgst_per) . '%';
                                                                 } else {
                                                                     echo"-";
                                                                 }
                                                                 ?>
                                                        </div>
                                                    </td>
                                                    <td align="right" valign="top" width = "50%">
                                                        <div class="paddingRight5  <?php
                                                        if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                            echo"border-color-grey-b";
                                                        }
                                                        ?> ">


                                                            <?php
                                                            if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '') {
                                                                echo decimalVal($sttr_tot_price_sgst_chrg, 2);
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr> 
                                                    <td align="right" width = "50%" valign="top" class="fw_n ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                        <div class="paddingRight5 ">
                                                            <?php
                                                            if ($sttr_mkg_sgst_per != '' && $sttr_mkg_sgst_per != 0) {
                                                                echo ($sttr_mkg_sgst_per) . '%';
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td align="right" valign="top" width = "50%">
                                                        <div class="paddingRight5">
                                                            <?php
                                                            if ($sttr_mkg_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != '') {
                                                                echo decimalVal($sttr_mkg_sgst_chrg, 2);
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <?php
                                    }
                                    if ($cryigst == 'true' && $igstpresent == 'yes') {
                                        $fieldName = 'igstAmt';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <table>

                    <?php if ($sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0) { ?>

                                                    <tr> 
                                                        <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                            <div class="paddingRight5 <?php
                                                            if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                                echo"border-color-grey-b";
                                                            }
                                                            ?>">
                                                                     <?php
                                                                echo ($sttr_tot_price_igst_per) . '%';
                                                                ?></div>
                                                        </td>
                                                        <td align="right" valign="top" width = "50%">
                                                            <div class="paddingRight5 <?php
                                                            if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                                echo"border-color-grey-b";
                                                            }
                                                            ?>">
                                                                     <?php
                                                                echo decimalVal($sttr_tot_price_igst_chrg, 2);
                                                                ?></div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                    <?php if ($sttr_mkg_igst_per != '' && $sttr_mkg_igst_per != 0) { ?>

                                                    <tr> 
                                                        <td align="right" width = "50%" valign="top" class="fw_n ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                            <div class="paddingRight5 ">
                                                                <?php
                                                                echo ($sttr_mkg_igst_per) . '%';
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <td align="right" valign="top" width = "50%">
                                                            <div class="paddingRight5 ">
                                                                <?php
                                                                echo decimalVal($sttr_mkg_igst_chrg, 2);
                                                                ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                    <?php } ?>
                                            </table>
                                        </td>
                                        <?php
                                    }
                                    if ($cryamt == 'true' && $sttr_final_valuation != 0) {
                                        $totFinalVal += $sttr_final_valuation;
                                        $fieldName = 'amt';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                        <?php echo number_format($sttr_final_valuation, 2); ?> 
                                        </td>
                                        <?php
                                    }
                                } else {
                                    if ($itemSNoLb == 'true') {
                                        $fieldName = 'sNo';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                        <?php echo $SrNo; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($itemId == 'true') {
                                        $fieldName = 'itemId';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                        <?php echo $slPrItemId; ?> 
                                        </td> 
                                    <?php } ?>

                                        <?php if ($design == 'true' && $designpresent == 'yes') { ?>
                                        <td align="center" class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?>" valign="top">
                                            <?php if ($rowSlPrItemDetails['slpr_snap_fname'] != '') { ?>
                                                <a style="cursor: pointer;" onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ogsprsim.php?itst_id=<?php echo "$resSelectQuery[slpr_id]"; ?>&panelName=sellInvPanel&imgPanelName=snap',
                                                                                        'popup', 'width=400,height=400,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                                                return false" >
                                                    <img src="<?php echo $documentRootBSlash; ?>/include/php/ogsprsim.php?itst_id=<?php echo $rowSlPrItemDetails['slpr_id']; ?>&panelName=sellInvPanel" 
                                                         width="64px" height="64px" border="0" style="border-color: #B8860B"/>
                                                </a>
                                                <?php
                                            }
//         parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction WHERE sttr_item_code='$slPrItmCode' and sttr_transaction_type!='sell'"));
//            parse_str(getTableValues("SELECT * FROM image WHERE image_id='$sttr_image_id'"));
                                            $imageFName = '';
                                            if ($invName == 'metalPurchase' || $invName == 'rawMetalSale') {
                                                parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction WHERE sttr_id='$slPrId'"));
                                            } else {
                                                parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction "
                                                                . "WHERE sttr_id='$resSelectQuery[sttr_sttr_id]' and sttr_transaction_type NOT IN ('sell','ESTIMATESELL')"));
                                            }
                                            if ($sttr_image_id != NULL && $sttr_image_id != '') {
                                                parse_str(getTableValues("SELECT image_snap_fname FROM image WHERE image_id='$sttr_image_id'"));
                                                $imageFName = $image_snap_fname;
                                            }
                                            if ($imageFName == '')
                                                parse_str(getTableValues("SELECT itm_nm_id,itm_nm_snap_fname FROM item_name WHERE itm_nm_name='$slPrItemName'"));

                                            if ($imageFName != '' && $sttrIndicator != 'stockCrystal') {
                                                ?>
                                                <a style="cursor: pointer;" 
                                                   onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ogsprsim.php?itst_id=<?php echo "$sttr_image_id"; ?>',
                                                                                           'popup', 'width=600,height=600,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                                                   return false" >
                                                    <img src="<?php echo $documentRootBSlash; ?>/include/php/ogspicim.php?itst_id=<?php echo "$sttr_image_id"; ?>" 
                                                         width="64px" height="64px" alt ="Item Design" border="0" style="border-color: #B8860B"/>
                                                </a>
                                                <?php
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                    <?php } ?>

                                    <?php
                                    if ($itemDescLb == 'true') {
                                        $fieldName = 'itemDesc';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">
                    <?php echo $slPrItemName; ?> 

                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($brandName == 'true' && $brand == 'yes') {
                                        $fieldName = 'brandName';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">
                                        <?php echo $sttr_brand_id; ?> 
                                        </td>
                                    <?php } ?>
                                    <?php if ($hallMarkUid == 'true' && $hallMark == 'yes') { ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">
                                            <?php
                                            if ($slPrHallMark != '' || $slPrHallMark != NULL) {
                                                echo $slPrHallMark;
                                            } else {
                                                ?> - <?php } ?> 
                                        </td> 
                                    <?php }
                                    ?>
                                    <?php
                                    if ($itemHsnLb == 'true') {
                                        $fieldName = 'itemHSN';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <?php
                                            if ($slPrItemHSN != '') {
                                                echo $slPrItemHSN;
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php if ($OtherInfoLb == 'true' && $otherinfo == 'yes') { ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <?php
                                            if ($sttr_other_info != '') {
                                                echo $sttr_other_info;
                                            } else {
                                                echo "-";
                                            }
                                            ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($itemQtyLb == 'true') {
                                        $totQty += $slPrItemQty;
                                        $fieldName = 'QTY';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                        <?php echo $slPrItemQty; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php if ($unitPrice == 'true') { ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <?php
                                            if ($slUnitPrice != '') {
                                                echo formatInIndianStyle($slUnitPrice);
                                            } else {
                                                echo "-";
                                            }
                                            ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($itemGsWtLb == 'true') {
                                        $totGsWt += $slPrItemGSW;
                                        $fieldName = 'itemGsWt';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                        <?php echo $slPrItemGSW; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($itemntLb == 'true') {
                                        $totNetWt += $slPrItemNTW;
                                        $fieldName = 'itemNtWt';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                        <?php echo $slPrItemNTW; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($itempktLb == 'true' && $pkwtpresent == 'yes') {
                                        $totPktWt += $slPrItemPKTW;
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <?php
                                            if ($slPrItemPKTW != 0) {
                                                echo $slPrItemPKTW;
                                            } else {
                                                echo"-";
                                            }
                                            ?>
                                        </td>
                                    <?php } ?>
                                    <?php
                                    if ($itemProcessWt == 'true' && $processwtpresent == 'yes' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <?php
                                            echo $slPrItemProcessW;
                                            $totProcessWt += $slPrItemProcessW;
                                            ?>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($itemPurity == 'true') {
                                        $selReqTunch = "SELECT itm_tunch_bctext FROM item_tunch WHERE itm_tunch_value = '$slPrMetalPutity' and itm_tunch_metal_type = '$slPrMetalType'";
                                        $resReqTunch = mysqli_query($conn, $selReqTunch);
                                        $rowReqTunch = mysqli_fetch_array($resReqTunch);
                                        $reqTunch = $rowReqTunch['itm_tunch_bctext'];
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <?php
                                            if ($reqTunch == '' && $reqTunch == NULL) {
                                                if ($slPrMetalPutity != '') {
                                                    echo $slPrMetalPutity . ' %';
                                                }
                                            } else {
                                                echo $reqTunch;
                                            }
                                            ?>
                                        </td>
                                    <?php } ?>

                                    <?php if ($itemWSWt == 'true') { ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <?php
                                            if ($slPrWastage != 0) {
                                                echo $slPrWastage . ' %';
                                            } else {
                                                echo"-";
                                            }
                                            $totWsWt += $slPrWastage;
                                            ?>
                                        </td> 
                                    <?php } ?>
                                    <?php
                                    if ($itemFinalPurity == 'true') {
                                        $selReqTunch = "SELECT itm_tunch_bctext FROM item_tunch WHERE itm_tunch_value = '$slPrMetalFinalPutity' and itm_tunch_metal_type = '$slPrMetalType'";
                                        $resReqTunch = mysqli_query($conn, $selReqTunch);
                                        $rowReqTunch = mysqli_fetch_array($resReqTunch);
                                        $reqTunch = $rowReqTunch['itm_tunch_bctext'];
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <?php
                                            if ($reqTunch == '' && $reqTunch == NULL) {
                                                if ($slPrMetalFinalPutity != '') {
                                                    echo $slPrMetalFinalPutity . ' %';
                                                }
                                            } else {
                                                echo $reqTunch;
                                            }
                                            ?>
                                        </td>
                                    <?php } ?>

                                    <?php if ($itemFinalPurityWtCsWs == 'true') { ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <?php
                                            if ($slPrWastage != '' || $rowSlPrItemDetails['sttr_cust_wastage'] != '') {
                                                echo $slPrWastage + $rowSlPrItemDetails['sttr_cust_wastage'] . ' %';
                                                $add = $slPrWastage + $rowSlPrItemDetails['sttr_cust_wastage'];
                                                $totFinPurWtWs += $add;
                                            } else {
                                                echo '-';
                                            }
                                            ?> 
                                        </td>

                                    <?php } ?>

                                    <?php if ($valAdded == 'true' && $custwasatagepresent == 'yes') { ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <?php
                                            if ($slcustPrWastage != '' || $rowSlPrItemDetails['sttr_cust_wastage'] != '') {
                                                echo $slcustPrWastage . ' %';
                                            } else {
                                                echo '-';
                                            }
                                            ?> 
                                        </td>   
                                    <?php } ?>
                                    <?php
                                    if ($itemFfnWt == 'true') {
                                        $totFineWt += $slprFfnWt;
                                        $fieldName = 'itemFfnWt';
                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                        <?php echo $slprFfnWt; ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>   
                                    <?php
                                    if ($diamondWtLb == 'true') {
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <?php
                                            if ($sttr_stone_wt != '' && $sttr_stone_wt != NULL && $sttr_stone_wt > 0) {
                                                echo number_format($sttr_stone_wt, 2) . ' ' . $sttr_stone_wt_type;
                                                $totStoneWt += $sttr_stone_wt;
                                            } else {
                                                echo ' - ';
                                            }
                                            ?> 
                                        </td>

                                    <?php } ?>
                                    <?php
                                    if ($diamondValuationLb == 'true') {
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <?php
                                            if ($sttr_stone_valuation != '' && $sttr_stone_valuation != NULL && $sttr_stone_valuation > 0) {
                                                echo number_format($sttr_stone_valuation, 2);
                                                $totStoneValue += $sttr_stone_valuation;
                                            } else {
                                                echo ' - ';
                                            }
                                            ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <!----------------- START CODE TO ADD STONE QUANTITY @RENUKA OCT2022------------->
                                    <?php
                                    if (($stQuantityLb == 'true') && ($qtytpresent == 'yes')) {
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <?php
                                            if ($slstQuantity != '' && $slstQuantity != NULL && $slstQuantity > 0) {
                                                echo $slstQuantity;
                                                $totQuantity += $slstQuantity;
                                            } else {
                                                echo ' - ';
                                            }
                                            ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <!----------------- END CODE TO ADD STONE QUANTITY @RENUKA OCT2022------------->
                                    <!----------------- START CODE TO ADD STONE RATE @RENUKA OCT2022------------->
                                    <?php
                                    if (($stRateLb == 'true') && ($rtpresent == 'yes')) {
                                        ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <?php
                                            if ($slstRate != '' && $slstRate != NULL && $slstRate > 0) {
                                                echo $slstRate;
                                            } else {
                                                echo ' - ';
                                            }
                                            ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <!-----------------------------END CODE TO ADD STONE RATE @RENUKA OCT2022---->

                                    <?php if ($labour == 'true' && ($mkgresent == 'yes' || $labpresent == 'yes')) { ?>
                                        <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                        if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                            echo $label_field_font_size;
                                        } else {
                                            ?> 14<?php } ?>px;
                                            color: <?php
                                            if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                echo $label_field_font_color;
                                            } else {
                                                ?> black<?php } ?>">

                                            <?php
                                            if ($slPrItemLabChargsval != '') {
                                                if ($slPrItemLabChrgsType == 'per')
                                                    echo $slPrItemLabChargs . ' %';
                                                else
                                                    echo $slPrItemLabChargs . ' ' . $slPrItemLabChrgsType;
                                            } else if ($sttr_making_charges != '') {
                                                if ($sttr_making_charges_type == 'per')
                                                    echo $sttr_making_charges . ' %';
                                                else
                                                    echo $sttr_making_charges . ' ' . $sttr_making_charges_type;
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                    <?php } ?>
                                    <?php
                                    if ($totalmkgbfdisc == 'true') {
                                        if ($sttr_metal_amt != 0 || $sttr_metal_amt != '') {
                                            ?>

                                        <tr> 
                                            <td align="center" valign="top" width = "20%" class="ff_calibri ">
                                                <div class="paddingRight5 ">
                                                    (V)
                                                </div>
                                            </td>
                                            <td align="center" valign="top" width = "80%" class="ff_calibri ">
                                                <div class="paddingRight5">
                                                    <?php
                                                    echo "(" . formatInIndianStyle($sttr_metal_amt) . ")";
                                                    ?></div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    if ($sttr_total_making_amt != '' && $sttr_total_making_amt != 0) {
                                        ?>

                                        <tr> 
                                            <td align="center" valign="top" width = "20%" class="ff_calibri ">
                                                <div class="paddingRight5">
                                                    (M)
                                                </div>
                                            </td>
                                            <td align="center" valign="top" width = "80%" class="ff_calibri ">
                                                <div class="paddingRight5 ">

                                                    <?php
                                                    echo "(" . formatInIndianStyle($sttr_total_making_amt - $totalOtherCharges) . ")"; // Code for Other Charges @Author:PRIYANKA-12OCT2018
                                                    ?></div>


                                            </td>

                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                if (($discountchargePer == 'true' || $discountchargeAmt == 'true') && (($sttr_stone_discount_amt != 0 && $sttr_stone_discount_amt != '') || ($sttr_metal_discount_amt != 0 && $sttr_metal_discount_amt != '') || ($sttr_mkg_discount_amt != '' && $sttr_mkg_discount_amt != 0) || ($mkgDiscountPresent == 'YES') || ($metalDiscountPresent == 'YES') || ($stoneDiscountPresent == 'YES'))) {
                                    ?>
                                    <td align="right" class="ff_calibri fs_13  border-color-grey-r <?php echo $border_color_grey_bot; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top">

                                        <table border="0"  cellspacing="0" cellpadding="0" width="100%" height="100%">  
                                            <?php if ($slPrindicator == 'stockCrystal') { ?> 
                        <?php if ($sttr_stone_discount_amt != 0 && $sttr_stone_discount_amt != '') { ?>
                                                    <tr> 
                                                        <td align="center" valign="top" width = "20%" class="ff_calibri ">
                                                            <div class="paddingRight5 ">
                                                                (V)
                                                            </div>
                                                        </td>
                                                        <td align="center" valign="top" width = "80%" class="ff_calibri ">
                                                            <div class="paddingRight5">
                                                                <?php
                                                                if ($label_field_check_per == 'true')
                                                                    echo formatInIndianStyle($sttr_stone_discount_per) . "%" . " ";
                                                                if ($label_field_check_amt == 'true')
                                                                    echo formatInIndianStyle($sttr_stone_discount_amt);
                                                                ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else if ($stoneDiscountPresent == 'YES') {
                                                    ?>
                                                    <tr> 
                                                        <td align="center" valign="top" width = "20%" class="ff_calibri ">
                            <?php echo '-'; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else if ($slPrindicator != 'stockCrystal') {
                                                if ($sttr_metal_discount_amt != 0 && $sttr_metal_discount_amt != '') {
                                                    ?>
                                                    <tr> 
                                                        <td align="center" valign="top" width = "20%" class="ff_calibri ">
                                                            <div class="paddingRight5 ">
                                                                (V)
                                                            </div>
                                                        </td>
                                                        <td align="center" valign="top" width = "80%" class="ff_calibri ">
                                                            <div class="paddingRight5">
                                                                <?php
                                                                if ($label_field_check_per == 'true')
                                                                    echo formatInIndianStyle($sttr_metal_discount_per) . "%" . " ";
                                                                if ($label_field_check_amt == 'true')
                                                                    echo formatInIndianStyle($sttr_metal_discount_amt);
                                                                ?></div>
                                                        </td>
                                                    </tr>
                                                <?php } else if ($metalDiscountPresent == 'YES') {
                                                    ?>
                                                    <tr> 
                                                        <td align="center" valign="top" width = "20%" class="ff_calibri ">
                            <?php echo '-'; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                            if ($sttr_mkg_discount_amt != '' && $sttr_mkg_discount_amt != 0) {
                                                ?>
                                                <tr> 
                                                    <td align="center" valign="top" width = "20%" class="ff_calibri ">
                                                        <div class="paddingRight5">
                                                            (M)
                                                        </div>
                                                    </td>
                                                    <td align="center" valign="top" width = "80%" class="ff_calibri ">
                                                        <div class="paddingRight5 ">
                                                            <?php
                                                            if ($label_field_check_per == 'true')
                                                                echo formatInIndianStyle($sttr_mkg_discount_per) . "%" . " ";
                                                            if ($label_field_check_amt == 'true')
                                                                echo formatInIndianStyle($sttr_mkg_discount_amt);
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } else if ($mkgDiscountPresent == 'YES') {
                                                ?>
                                                <tr> 
                                                    <td align="center" valign="top" width = "20%" class="ff_calibri ">
                        <?php echo '-'; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                    </td>
                                <?php } ?>
                                <?php if ($mkgAfterDisPer == 'true' && $mkgAfterDiscInPerPresent == 'YES') { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                        <?php
                                        if ($totMkgAfterDiscInPer > 0 && $sttrIndicator != 'stockCrystal') {
                                            echo $totMkgAfterDiscInPer . ' %';
                                        } else {
                                            echo '-';
                                        }
                                        ?> 
                                    </td> 
                                <?php } ?>
                                <?php if ($mkgAfterDisGm == 'true' && $mkgAfterDiscInGmPresent == 'YES') { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                        <?php
                                        if ($totMkgAfterDisInGm > 0 && $sttrIndicator != 'stockCrystal') {
                                            echo $totMkgAfterDisInGm . ' GM';
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td> 
                                <?php } ?>
                                <?php if ($valLb == 'true') { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">
                                        <table>

                    <?php if ($sttr_valuation != 0 && $sttr_valuation != '') { ?>

                                                <tr> 
                                                    <td align="center" valign="top" class="ff_calibri ">
                                                        <div class="paddingRight5 ">
                                                            (V)
                                                        </div>
                                                    </td>
                                                    <td align="center" valign="top"  class="ff_calibri ">
                                                        <div class="">
                                                            <?php
                                                            //if ($slPrindicator=='stockCrystal') {
                                                            //echo formatInIndianStyle($sttr_valuation+$sttr_metal_discount_amt);
                                                            // }

                                                            echo formatInIndianStyle($sttr_valuation);
                                                            $totValuation += $sttr_valuation;
                                                            ?></div>
                                                    </td>
                                                </tr>
                                                <?php
                                                if ($sttr_making_charges != '' && $sttr_making_charges != 0) {
                                                    ?>

                                                    <tr> 
                                                        <td align="center" valign="top"  class="ff_calibri ">
                                                            <div class="">
                                                                (M)
                                                            </div>
                                                        </td>
                                                        <td align="center" valign="top" class="ff_calibri ">
                                                            <div class="paddingRight5 ">

                                                                <?php
                                                                echo formatInIndianStyle($sttr_total_making_charges - $totalOtherCharges); // Code for Other Charges @Author:PRIYANKA-12OCT2018
                                                                ?></div>
                                                        </td>

                                                    </tr>
                                                <?php } ?>
                                                <?php
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </table>
                                    </td> 
                                <?php } ?>

                                <?php if ($labourVal == 'true') { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                        <?php
                                        if ($slPrItemLabChargsVal != 0) {
                                            echo $slPrItemLabChargsVal;
                                        } else {
                                            echo"-";
                                        }
                                        ?>
                                    </td>
                                <?php }
                                ?>
                                <?php if ($metal_val == 'true') { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                        <?php
                                        if ($sttr_valuation != 0) {
                                            if (($paymentMode == 'NoRateCut' && $sttrIndicator == 'stockCrystal') || $paymentMode != 'NoRateCut') {
                                                if ($sttrIndicator == 'stockCrystal') {
                                                    echo formatInIndianStyle($sttr_valuation);
                                                } else {
                                                    echo formatInIndianStyle($sttr_metal_amt);
                                                }
                                            } else {
                                                echo '-';
                                            }
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                <?php }
                                ?>
                                <?php
                                if ($itemMakingChrgValLb == 'true') {
                                    $fieldName = 'mkg_chrg_val';
                                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                        <?php
                                        if ($sttr_total_making_charges != 0) {
                                            echo ($sttr_total_making_charges - $totalOtherCharges); // Code for Other Charges @Author:PRIYANKA-12OCT2018
                                        } else {
                                            echo"-";
                                        }
                                        ?>
                                    </td>
                                    <?php
                                }
                                ?>
                                <?php if ($othChrg == 'true') { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                        <?php
                                        if ($totalOtherCharges > 0) {
                                            echo $totalOtherCharges;
                                            $totOtherChrg += $totalOtherCharges;
                                        } else {
                                            echo"-";
                                        }
                                        ?>
                                    </td> 
                                <?php } ?>
                                <?php if ($TotalVa == 'true') { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                        <?php
                                        echo formatInIndianStyle($slpr_value_added + $sttr_total_making_charges + $slPrCryValuation);
                                        ?>
                                    </td>
                                <?php }
                                ?>
                                <?php if ($total_valwithmkg == 'true') { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                    <?php echo formatInIndianStyle($sttr_valuation + $sttr_total_making_charges); ?> 
                                    </td>
                                <?php }
                                ?>
                                <?php if ($totalCrystal == 'true') { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                        <?php
                                        echo formatInIndianStyle($slPrCryValuation);
                                        $totCrystalValuation += $slPrCryValuation;
                                        ?> 
                                    </td>
                                <?php } ?>

                                <?php if ($cgstAmt == 'true' && $cgstpresent == 'yes') { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                        <table>
                                            <tr> 
                                                <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                    <div class="paddingRight5 <?php
                                                    if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                        echo"border-color-grey-b";
                                                    }
                                                    ?>">
                                                             <?php
                                                             echo '$sttr_tot_price_cgst_per=' . $sttr_tot_price_cgst_per;
                                                             if ($sttr_tot_price_cgst_per != 0 && $sttr_tot_price_cgst_per != '') {
                                                                 echo ($sttr_tot_price_cgst_per) . '%';
                                                             } else {
                                                                 echo"-";
                                                             }
                                                             ?></div>
                                                </td>
                                                <td align="right" valign="top" width = "50%">
                                                    <div class="paddingRight5  <?php
                                                    if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                        echo"border-color-grey-b";
                                                    }
                                                    ?>">

                                                        <?php
                                                        if ($sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '') {
                                                            echo decimalVal($sttr_tot_price_cgst_chrg, 2);
                                                        } else {
                                                            echo"-";
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr> 
                                                <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                    <div class="paddingRight5 ">
                                                        <?php
                                                        if ($sttr_mkg_cgst_per != '' && $sttr_mkg_cgst_per != 0) {
                                                            echo ($sttr_mkg_cgst_per) . '%';
                                                        }
                                                        ?></div>
                                                </td>
                                                <td align="right" valign="top" width = "50%">
                                                    <div class="paddingRight5 ff_calibri">
                                                        <?php
                                                        if ($sttr_mkg_cgst_chrg != 0 && $sttr_mkg_cgst_chrg != '') {
                                                            echo decimalVal($sttr_mkg_cgst_chrg, 2);
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                <?php } ?>
                                <?php if ($totcgstAmt == 'true' && $sttr_tot_price_cgst_per > 0 && $sttr_tot_price_cgst_chrg > 0) { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                        <table>
                                            <tr> 
                                                <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                    <div class="paddingRight5 <?php
                                                    if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                        echo"border-color-grey-b";
                                                    }
                                                    ?>">
                                                             <?php
                                                             if ($sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '' && $sttr_mkg_cgst_chrg != 0 || $sttr_mkg_cgst_chrg != '') {
                                                                 $totcgstamt = decimalVal($sttr_tot_price_cgst_chrg, 2) + decimalVal($sttr_mkg_cgst_chrg, 2);
                                                                 $totalamount = $sttr_valuation + $sttr_total_making_charges;
                                                                 //$totcgstper=($sttr_tot_price_cgst_per+$sttr_mkg_cgst_per)/2;
                                                                 $totcgstper = ($totcgstamt * 100 ) / $totalamount;
                                                                 echo decimalVal($totcgstper, 1) . "%";
                                                             } else if ($sttr_tot_price_cgst_chrg == 0 && $sttr_tot_price_cgst_chrg == '' && $sttr_mkg_cgst_chrg != 0 || $sttr_mkg_cgst_chrg != '') {
                                                                 echo $sttr_mkg_cgst_per . "%";
                                                             } else if ($sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '' && $sttr_mkg_cgst_chrg == 0 || $sttr_mkg_cgst_chrg == '') {
                                                                 echo $sttr_tot_price_cgst_chrg . "%";
                                                             } else {
                                                                 echo"-";
                                                             }
                                                             ?></div>
                                                </td>
                                                <td align="right" valign="top" width = "50%">
                                                    <div class="paddingRight5  <?php
                                                    if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                        echo"border-color-grey-b";
                                                    }
                                                    ?>">
                                                             <?php
                                                             if ($sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '' && $sttr_mkg_cgst_chrg != 0 && $sttr_mkg_cgst_chrg != '') {
                                                                 echo decimalVal($sttr_tot_price_cgst_chrg, 2) + decimalVal($sttr_mkg_cgst_chrg, 2);
                                                             } else if ($sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '' || $sttr_mkg_cgst_chrg == 0 && $sttr_mkg_cgst_chrg == '') {
                                                                 echo decimalVal($sttr_tot_price_cgst_chrg, 2);
                                                             } else if ($sttr_tot_price_cgst_chrg == 0 && $sttr_tot_price_cgst_chrg == '' || $sttr_mkg_cgst_chrg != 0 && $sttr_mkg_cgst_chrg != '') {
                                                                 echo decimalVal($sttr_mkg_cgst_chrg, 2);
                                                             } else {
                                                                 echo"-";
                                                             }
                                                             ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>  
                                <?php } ?>
                                <?php if ($sgstAmt == 'true' && $sgstpresent == 'yes') { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                        <table>
                                            <tr> 
                                                <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                    <div class="paddingRight5 <?php
                                                    if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                        echo"border-color-grey-b";
                                                    }
                                                    ?>">
                                                             <?php
                                                             if ($sttr_tot_price_sgst_per != '' && $sttr_tot_price_sgst_per != 0) {
                                                                 echo ($sttr_tot_price_sgst_per) . '%';
                                                             } else {
                                                                 echo"-";
                                                             }
                                                             ?>
                                                    </div>
                                                </td>
                                                <td align="right" valign="top" width = "50%">
                                                    <div class="paddingRight5  <?php
                                                    if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                        echo"border-color-grey-b";
                                                    }
                                                    ?> ">


                                                        <?php
                                                        if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '') {
                                                            echo decimalVal($sttr_tot_price_sgst_chrg, 2);
                                                        } else {
                                                            echo "-";
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr> 
                                                <td align="right" width = "50%" valign="top" class="fw_n ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                    <div class="paddingRight5 ">
                                                        <?php
                                                        if ($sttr_mkg_sgst_per != '' && $sttr_mkg_sgst_per != 0) {
                                                            echo ($sttr_mkg_sgst_per) . '%';
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td align="right" valign="top" width = "50%">
                                                    <div class="paddingRight5">
                                                        <?php
                                                        if ($sttr_mkg_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != '') {
                                                            echo decimalVal($sttr_mkg_sgst_chrg, 2);
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                <?php } ?>

                                <?php if ($totsgstAmt == 'true' && $sttr_tot_price_sgst_per > 0 && $sttr_tot_price_sgst_chrg > 0) { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                        <table>
                                            <tr> 
                                                <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                    <div class="paddingRight5 <?php
                                                    if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                        echo"border-color-grey-b";
                                                    }
                                                    ?>">

                                                        <?php
                                                        if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '' && $sttr_mkg_sgst_chrg != 0 || $sttr_mkg_sgst_chrg != '') {

                                                            $totsgstamt = decimalVal($sttr_tot_price_sgst_chrg, 2) + decimalVal($sttr_mkg_sgst_chrg, 2);
                                                            $totalamount = $sttr_valuation + $sttr_total_making_charges;
                                                            //$totcgstper=($sttr_tot_price_cgst_per+$sttr_mkg_cgst_per)/2;
                                                            $totsgstper = ($totsgstamt * 100 ) / $totalamount;
                                                            echo decimalVal($totsgstper, 1) . "%";
                                                        } else if ($sttr_tot_price_sgst_chrg == 0 && $sttr_tot_price_sgst_chrg == '' && $sttr_mkg_sgst_chrg != 0 || $sttr_mkg_sgst_chrg != '') {
                                                            echo $sttr_mkg_sgst_per . "%";
                                                        } else if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '' && $sttr_mkg_sgst_chrg == 0 || $sttr_mkg_sgst_chrg == '') {
                                                            echo $sttr_tot_price_sgst_chrg . "%";
                                                        } else {
                                                            echo"-";
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td align="right" valign="top" width = "50%">
                                                    <div class="paddingRight5  <?php
                                                    if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                        echo"border-color-grey-b";
                                                    }
                                                    ?> ">
                                                             <?php
                                                             if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '' && $sttr_mkg_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != '') {
                                                                 echo decimalVal($sttr_tot_price_sgst_chrg, 2) + decimalVal($sttr_mkg_sgst_chrg, 2);
                                                             } else if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '' || $sttr_mkg_sgst_chrg == 0 && $sttr_mkg_sgst_chrg == '') {
                                                                 echo decimalVal($sttr_tot_price_sgst_chrg, 2);
                                                             } else if ($sttr_tot_price_sgst_chrg == 0 && $sttr_tot_price_sgst_chrg == '' || $sttr_mkg_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != '') {
                                                                 echo decimalVal($sttr_mkg_sgst_chrg, 2);
                                                             } else {
                                                                 echo"-";
                                                             }
                                                             ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td> 
                                <?php } ?>
                                <?php if ($igstAmt == 'true' && $igstpresent == 'yes') { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                        <table>

                    <?php if ($sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0) { ?>

                                                <tr> 
                                                    <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                        <div class="paddingRight5 <?php
                                                        if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                            echo"border-color-grey-b";
                                                        }
                                                        ?>">
                                                                 <?php
                                                            echo ($sttr_tot_price_igst_per) . '%';
                                                            ?></div>
                                                    </td>
                                                    <td align="right" valign="top" width = "50%">
                                                        <div class="paddingRight5 <?php
                                                        if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                            echo"border-color-grey-b";
                                                        }
                                                        ?>">
                                                                 <?php
                                                            echo decimalVal($sttr_tot_price_igst_chrg, 2);
                                                            ?></div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                    <?php if ($sttr_mkg_igst_per != '' && $sttr_mkg_igst_per != 0) { ?>

                                                <tr> 
                                                    <td align="right" width = "50%" valign="top" class="fw_n ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                        <div class="paddingRight5 ">
                                                            <?php
                                                            echo ($sttr_mkg_igst_per) . '%';
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td align="right" valign="top" width = "50%">
                                                        <div class="paddingRight5 ">
                                                            <?php
                                                            echo decimalVal($sttr_mkg_igst_chrg, 2);
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                    <?php } ?>
                                        </table>
                                    </td>
                                <?php } ?>

                                <?php if ($totigstAmt == 'true' && $sttr_tot_price_igst_per > 0 && $sttr_tot_price_igst_chrg > 0) { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                        <table>

                    <?php if ($sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0) { ?>

                                                <tr> 
                                                    <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                        <div class="paddingRight5 <?php
                                                        if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                            echo"border-color-grey-b";
                                                        }
                                                        ?>">

                                                            <?php
                                                            if ($sttr_tot_price_igst_chrg != 0 && $sttr_tot_price_igst_chrg != '' && $sttr_mkg_igst_chrg != 0 || $sttr_mkg_igst_chrg != '') {

                                                                $totigstamt = decimalVal($sttr_tot_price_igst_chrg, 2) + decimalVal($sttr_mkg_igst_chrg, 2);
                                                                $totalamount = $sttr_valuation + $sttr_total_making_charges;
                                                                //$totcgstper=($sttr_tot_price_cgst_per+$sttr_mkg_cgst_per)/2;
                                                                $totigstper = ($totigstamt * 100 ) / $totalamount;
                                                                echo $totigstper . "%";
                                                            } else if ($sttr_tot_price_igst_chrg == 0 && $sttr_tot_price_igst_chrg == '' && $sttr_mkg_igst_chrg != 0 || $sttr_mkg_igst_chrg != '') {
                                                                echo $sttr_mkg_igst_per . "%";
                                                            } else if ($sttr_tot_price_igst_chrg != 0 && $sttr_tot_price_igst_chrg != '' && $sttr_mkg_igst_chrg == 0 || $sttr_mkg_igst_chrg == '') {
                                                                echo $sttr_tot_price_igst_chrg . "%";
                                                            } else {
                                                                echo"-";
                                                            }
                                                            ?></div>
                                                    </td>
                                                    <td align="right" valign="top" width = "50%">
                                                        <div class="paddingRight5 <?php
                                                        if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                            echo"border-color-grey-b";
                                                        }
                                                        ?>">
                                                                 <?php
                                                                 if ($sttr_tot_price_igst_chrg != 0 && $sttr_tot_price_igst_chrg != '' && $sttr_mkg_igst_chrg != 0 && $sttr_mkg_igst_chrg != '') {
                                                                     echo decimalVal($sttr_tot_price_igst_chrg, 2) + decimalVal($sttr_mkg_igst_chrg, 2);
                                                                 } else if ($sttr_tot_price_igst_chrg != 0 && $sttr_tot_price_igst_chrg != '' || $sttr_mkg_igst_chrg == 0 && $sttr_mkg_igst_chrg == '') {
                                                                     echo decimalVal($sttr_tot_price_igst_chrg, 2);
                                                                 } else if ($sttr_tot_price_igst_chrg == 0 && $sttr_tot_price_igst_chrg == '' || $sttr_mkg_igst_chrg != 0 && $sttr_mkg_igst_chrg != '') {
                                                                     echo decimalVal($sttr_mkg_igst_chrg, 2);
                                                                 } else {
                                                                     echo"-";
                                                                 }
                                                                 ?></div>
                                                    </td>
                                                </tr>
                    <?php } ?>
                                        </table>
                                    </td> 

                                <?php } ?>

                                <?php if ($totgstAmt == 'true') { ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                        <table>
                                            <tr> 
                                                <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                                    <div class="paddingRight5 <?php
                                                    if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                        echo"border-color-grey-b";
                                                    }
                                                    ?>">

                                                        <?php
                                                        if ($sttr_tot_price_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != 0 && $sttr_tot_price_cgst_chrg != 0 &&
                                                                $sttr_mkg_cgst_chrg != 0
                                                        ) {

                                                            $totsgstamt = decimalVal($sttr_tot_price_sgst_chrg, 2) + decimalVal($sttr_mkg_sgst_chrg, 2);
                                                            $totalamount = $sttr_valuation + $sttr_total_making_charges;

                                                            $totsgstper = ($totsgstamt * 100 ) / $totalamount;
                                                            $totcgstamt = decimalVal($sttr_tot_price_cgst_chrg, 2) + decimalVal($sttr_mkg_cgst_chrg, 2);
                                                            $totalamount = $sttr_valuation + $sttr_total_making_charges;

                                                            $totcgstper = ($totcgstamt * 100 ) / $totalamount;
                                                            echo decimalVal($totsgstper + $totcgstper, 2) . "%";
                                                        } else if ($sttr_tot_price_sgst_chrg == 0 && $sttr_tot_price_cgst_chrg == 0 && $sttr_mkg_sgst_chrg != 0 &&
                                                                $sttr_mkg_cgst_chrg != 0) {
                                                            echo decimalVal($sttr_mkg_sgst_per + $sttr_mkg_cgst_per) . "%";
                                                        } else if ($sttr_tot_price_sgst_chrg != 0 &&
                                                                $sttr_tot_price_cgst_chrg != 0 &&
                                                                $sttr_mkg_sgst_chrg == 0 &&
                                                                $sttr_mkg_cgst_chrg == 0) {
                                                            echo decimalVal($sttr_tot_price_sgst_per + $sttr_tot_price_cgst_per) . "%";
                                                        } else if ($sttr_tot_price_igst_chrg != 0 &&
                                                                $sttr_mkg_igst_chrg != 0) {
                                                            $totigstamt = decimalVal($sttr_tot_price_igst_chrg, 2) + decimalVal($sttr_mkg_igst_chrg, 2);
                                                            $totalamount = $sttr_valuation + $sttr_total_making_charges;
                                                            //$totcgstper=($sttr_tot_price_cgst_per+$sttr_mkg_cgst_per)/2;
                                                            $totigstper = ($totigstamt * 100 ) / $totalamount;
                                                            echo $totigstper . "%";
                                                        } else if ($sttr_tot_price_igst_chrg == 0 && $sttr_mkg_igst_chrg != 0) {
                                                            echo $sttr_mkg_igst_per . "%";
                                                        } else if ($sttr_tot_price_igst_chrg != 0 && $sttr_mkg_igst_chrg == 0) {
                                                            echo $sttr_tot_price_igst_per . "%";
                                                        } else {
                                                            echo"-";
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td align="right" valign="top" width = "50%">
                                                    <div class="paddingRight5  <?php
                                                    if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                                        echo"border-color-grey-b";
                                                    }
                                                    ?> ">
                                                             <?php
                                                             if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '' &&
                                                                     $sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '' &&
                                                                     $sttr_mkg_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != '' &&
                                                                     $sttr_mkg_cgst_chrg != 0 && $sttr_mkg_cgst_chrg != '') {
                                                                 echo decimalVal($sttr_tot_price_sgst_chrg, 2) + decimalVal($sttr_mkg_sgst_chrg, 2) + decimalVal($sttr_tot_price_cgst_chrg, 2) + decimalVal($sttr_mkg_cgst_chrg, 2);
                                                             } else if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '' || $sttr_mkg_sgst_chrg == 0 && $sttr_mkg_sgst_chrg == '' && $sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '' || $sttr_mkg_cgst_chrg == 0 && $sttr_mkg_cgst_chrg == '') {
                                                                 echo decimalVal($sttr_tot_price_sgst_chrg, 2) + decimalVal($sttr_tot_price_cgst_chrg, 2);
                                                             } else if ($sttr_tot_price_sgst_chrg == 0 && $sttr_tot_price_sgst_chrg == '' || $sttr_mkg_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != '' &&
                                                                     $sttr_tot_price_cgst_chrg == 0 && $sttr_tot_price_cgst_chrg == '' || $sttr_mkg_cgst_chrg != 0 && $sttr_mkg_cgst_chrg != '') {
                                                                 echo decimalVal($sttr_mkg_sgst_chrg, 2) + decimalVal($sttr_mkg_cgst_chrg, 2);
                                                             } else if ($sttr_tot_price_igst_chrg != 0 && $sttr_tot_price_igst_chrg != '' && $sttr_mkg_igst_chrg != 0 && $sttr_mkg_igst_chrg != '') {
                                                                 echo decimalVal($sttr_tot_price_igst_chrg, 2) + decimalVal($sttr_mkg_igst_chrg, 2);
                                                             } else if ($sttr_tot_price_igst_chrg != 0 && $sttr_tot_price_igst_chrg != '' || $sttr_mkg_igst_chrg == 0 && $sttr_mkg_igst_chrg == '') {
                                                                 echo decimalVal($sttr_tot_price_igst_chrg, 2);
                                                             } else if ($sttr_tot_price_igst_chrg == 0 && $sttr_tot_price_igst_chrg == '' || $sttr_mkg_igst_chrg != 0 && $sttr_mkg_igst_chrg != '') {
                                                                 echo decimalVal($sttr_mkg_igst_chrg, 2);
                                                             } else {
                                                                 echo"-";
                                                             }
                                                             ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table> 
                                    </td>
                                <?php } ?>
                <?php if ($MetalRate == 'true') { ?>

                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                    <?php echo number_format($slPrMetalRate, 2); ?> 
                                    </td>
                                <?php } ?>
                                <?php
                                if ($itemAmtLb == 'true' && $sttr_final_valuation != 0) {
//                                    echo '$sttr_final_valuation=='.$sttr_final_valuation.'<br>';
                                    $totFinalVal += $sttr_final_valuation;
                                    $fieldName = 'amt';
                                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="middle" align="middle" style="font-size: <?php
                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                        echo $label_field_font_size;
                                    } else {
                                        ?> 14<?php } ?>px;
                                        color: <?php
                                        if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                            echo $label_field_font_color;
                                        } else {
                                            ?> black<?php } ?>">

                                    <?php echo number_format($sttr_final_valuation, 2); ?> 
                                    </td>
                                    <?php
                                }
                            }
                            ?>
                </tr>
            <?php }
            ?>
        </tr>
        <?php
        $SrNo++;
    }
}
?>    
<?php include 'omspInvTaxTot.php'; ?>

</table>
</td>
</tr>
</table>
<table style="width: 100%;">
    <tr>
        <td>
            <table style="width: 100%;">
<?php include 'ogspCombInvTaxPayDetails.php'; ?>
            </table>
        </td>
    </tr>
</table>
<?php
//*******************************************************************************
//END CODE FOR TAX INVOICE ITEM TABLE  : AUTHOR @ DARSHANA 30 SEPT 2021
//*******************************************************************************
?>

