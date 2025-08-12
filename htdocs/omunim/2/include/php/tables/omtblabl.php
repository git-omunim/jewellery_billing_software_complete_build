<?php

/*
 * **************************************************************************************
 * @tutorial: Labels
 * **************************************************************************************
 * 
 * Created on Jun 5, 2014 2:52:01 PM
 *
 * @FileName: omtblabl.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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

if ($ownerId == '') {
    $ownerId = $dgGUId;
}
if ($ownerId == '') {
    $ownerId = $_SESSION['sessionOwnerId'];
}
if ($ownerId == '') {
    $ownerId = $_SESSION['sessiondgGUId'];
}
$query = "CREATE TABLE IF NOT EXISTS labels (
label_id                          INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
label_own_id                      VARCHAR(50),
label_type                        VARCHAR(50),
label_field_name                  VARCHAR(50),
label_field_content               VARCHAR(2000),
label_field_font_size             VARCHAR(50),
label_field_font_color            VARCHAR(20),
label_field_font_weight           VARCHAR(20),  
label_field_check                 VARCHAR(6),
label_noprint                     VARCHAR(6),
label_table_name                  VARCHAR(30),
label_table_column_name           VARCHAR(100),
label_name                        VARCHAR(50),
last_column                VARCHAR(1))AUTO_INCREMENT=1";
// YUVRAJ ADD IN $query THIS COLOM FONT WEIGHT @09082022
if (!mysqli_query($conn, $query)) {
    die('Error Labels: ' . mysqli_error($conn));
}
//To check new columns added into table or not 
include 'ommptbauprdwrfl.php';
//
//
include "$documentRootIncludePhp/ommptbupd_update_label_col_name_upd.php";
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO INSERT LABEL ENTRIES FOE SCHEME PASSBOOK IN LABEL TABLE AT NEW DATABASE @AUTHOR:MADHUREE-23JULY2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// 
$qSchemeLabelsDetails = "SELECT label_field_name FROM labels WHERE label_type = 'SchemeBook'";
$resSchemeLabelsDetails = mysqli_query($conn, $qSchemeLabelsDetails) or die(mysqli_error($conn));
$totalSchemeLabelsDetails = mysqli_num_rows($resSchemeLabelsDetails);
if ($totalSchemeLabelsDetails <= 0) {
    $schemelabelType = 'SchemeBook';
    $querySchemeLabel = "INSERT INTO labels(    
           label_own_id, label_type, label_field_name, label_field_content,label_field_check)
           VALUES
           ('$ownerId','$schemelabelType','rowTopMargin','0',''),"
            . "('$ownerId','$schemelabelType','rowBottomMargin','0',''),"
            . "('$ownerId','$schemelabelType','formBorderCheck','on','true'),"
            . "('$ownerId','$schemelabelType','insNoWidth','',''),"
            . "('$ownerId','$schemelabelType','DateWidth','',''),"
            . "('$ownerId','$schemelabelType','receiptnoWidth','',''),"
            . "('$ownerId','$schemelabelType','installAmtWidth','',''),"
            . "('$ownerId','$schemelabelType','collectiveAmtWidth','',''),"
            . "('$ownerId','$schemelabelType','paidAmtWidth','',''),"
            . "('$ownerId','$schemelabelType','paymentModeWidth','',''),"
            . "('$ownerId','$schemelabelType','statusWidth','',''),"
            . "('$ownerId','$schemelabelType','insNoCheck','','true'),"
            . "('$ownerId','$schemelabelType','DateCheck','','true'),"
            . "('$ownerId','$schemelabelType','receiptnoCheck','','true'),"
            . "('$ownerId','$schemelabelType','installAmtCheck','','true'),"
            . "('$ownerId','$schemelabelType','collectiveAmtCheck','','true'),"
            . "('$ownerId','$schemelabelType','paidAmtCheck','','true'),"
            . "('$ownerId','$schemelabelType','paymentModeCheck','','true'),"
            . "('$ownerId','$schemelabelType','statusCheck','','true')";
    //
    if (!mysqli_query($conn, $querySchemeLabel)) {
        die('Error: ' . mysqli_error($conn));
    }
}
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO INSERT LABEL ENTRIES FOE SCHEME PASSBOOK IN LABEL TABLE AT NEW DATABASE @AUTHOR:MADHUREE-23JULY2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// 
// 
//*********************************************************************************************************************
//START CODE FOR INSERT ENTRIES FOR QUOTATION @AUTHOR :DARSHANA 2 APRIL 2021
//*********************************************************************************************************************
//
$qQuotationLabelsDetails = "SELECT label_field_name FROM labels WHERE label_type = 'quotation'";
$resQutationLabelsDetails = mysqli_query($conn, $qQuotationLabelsDetails) or die(mysqli_error($conn));
$totalQuotationtLabelsDetails = mysqli_num_rows($resQutationLabelsDetails);

if ($totalQuotationtLabelsDetails <= 0) {
    $quotationlabelType = 'quotation';
    $queryQuotation = "INSERT INTO labels(    
           label_own_id, label_type, label_field_name, label_field_content,label_field_check)
           VALUES
           ('$ownerId','$quotationlabelType','topMargin','0',''),"
            . "('$ownerId','$quotationlabelType','bottomMargin','0',''),"
            . "('$ownerId','$quotationlabelType','formBorderCheck','on','true'),"
            . "('$ownerId','$quotationlabelType','quotationWidth','',''),"
            . "('$ownerId','$quotationlabelType','leftMargin','',''),"
            . "('$ownerId','$quotationlabelType','rightMargin','',''),"
            . "('$ownerId','$quotationlabelType','custqoutprodId','',''),"
            . "('$ownerId','$quotationlabelType','custqoutname','','true'),"
            . "('$ownerId','$quotationlabelType','custqoutgswt','','true'),"
            . "('$ownerId','$quotationlabelType','custqoutnetwt','',''),"
            . "('$ownerId','$quotationlabelType','custqoutpurity','',''),"
            . "('$ownerId','$quotationlabelType','custqoutfnwt','',''),"
            . "('$ownerId','$quotationlabelType','custqoutwastage','',''),"
            . "('$ownerId','$quotationlabelType','custqoutffnwt','',''),"
            . "('$ownerId','$quotationlabelType','custqoutvaper','','true'),"
            . "('$ownerId','$quotationlabelType','custqoutvawt','',''),"
            . "('$ownerId','$quotationlabelType','custqoutvaamt','',''),"
            . "('$ownerId','$quotationlabelType','custqoutmkg','',''),"
            . "('$ownerId','$quotationlabelType','custqoutmkgchrg','','true'),"
            . "('$ownerId','$quotationlabelType','custqouttotamt','','true'),"
            . "('$ownerId','$quotationlabelType','custqoutPrdId','PID',''),"
            . "('$ownerId','$quotationlabelType','custqoutNameLb','NAME','true'),"
            . "('$ownerId','$quotationlabelType','custqoutGsWtLb','GS WT','true'),"
            . "('$ownerId','$quotationlabelType','custqoutNetWtLb','NET WT',''),"
            . "('$ownerId','$quotationlabelType','custqoutPurityLb','PURITY',''),"
            . "('$ownerId','$quotationlabelType','custqoutFnWtLb','FN WT',''),"
            . "('$ownerId','$quotationlabelType','custqoutWastageLb','WASTAGE',''),"
            . "('$ownerId','$quotationlabelType','custqoutFfnWtLb','FFN WT',''),"
            . "('$ownerId','$quotationlabelType','custqoutVAPerLb','V/A%','true'),"
            . "('$ownerId','$quotationlabelType','custqoutVAWtLb','V/A WT',''),"
            . "('$ownerId','$quotationlabelType','custqoutVAAmtLb','V/A AMT',''),"
            . "('$ownerId','$quotationlabelType','custqoutMkgLb','MKG',''),"
            . "('$ownerId','$quotationlabelType','custqoutMkgChrgLb','MKG CHRG','true'),"
            . "('$ownerId','$quotationlabelType','custqoutTotAmtLb','TOT AMT','true')";
    if (!mysqli_query($conn, $queryQuotation)) {
        die('Error: ' . mysqli_error($conn));
    }
}
//*********************************************************************************************************************
//START CODE FOR INSERT ENTRIES FOR RAW METAL PURCHASE @AUTHOR :DARSHANA 19 JAN 2021
//*********************************************************************************************************************
//
$qRawmetalPurchaseLabelsDetails = "SELECT label_field_name FROM labels WHERE label_type = 'RawMetalPurchase'";
$resRawmetalPurchaseLabelsDetails = mysqli_query($conn, $qRawmetalPurchaseLabelsDetails) or die(mysqli_error($conn));
$totalRawmetalPurchasetLabelsDetails = mysqli_num_rows($resRawmetalPurchaseLabelsDetails);

if ($totalRawmetalPurchasetLabelsDetails <= 0) {
    $RawMetalPurchaselabelType = 'RawMetalPurchase';
    $queryRawMetalPurchase = "INSERT INTO labels(    
           label_own_id, label_type, label_field_name, label_field_content,label_field_font_size,label_field_font_color,label_field_check)
           VALUES
           ('$ownerId','$RawMetalPurchaselabelType','firmFormHeader','','22','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmLongName','','20','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmDesc','','16','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmRegNoLabel','REGISTRATION NO','16','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmRegNo','','16','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmAddress','','16','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmPhone','PHONE','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmEmail','EMAIL','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmLeftLogoCheck','','','','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmRightLogoCheck','','','','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmTinLb','GSTIN','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmTin','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmPanLb','PAN','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmPan','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userNameLb','NAME','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userName','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userAddressLb','ADDRESS','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userAddress','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userContactLb','PHONE','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userContact','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userSoLb','FATHER NAME','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userSo','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userDoLb','MOTHER NAME','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userDo','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userWoLb','SPOUSE NAME','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userWo','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userCoLb','GUARDIAN NAME','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userCo','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtSoLb','FATHER NAME','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtSo','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtDoLb','FATHER NAME','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtDo','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtWoLb','SPOUSE NAME','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtWo','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtCoLb','GUARDIAN NAME','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtCo','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmTinTopLabel','GST','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmTinTop','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmPanTopLb','PAN','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmPanTop','','14','black',''),"
            // Author:AMOL 
            . "('$ownerId','$RawMetalPurchaselabelType','userPanLb','PAN','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userPan','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userGstInLb','GSTIN','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userGstIn','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userAdhaarLb','ADHAAR NO','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userAdhaar','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','tableHeightLb','TABLE HEIGHT','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','tableHeight','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','cgstLb','CGST','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','cgstAmt','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','sgstLb','SGST','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','sgstAmt','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','igstLb','IGST','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','igstAmt','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','invNoTitleLb','INVOICE NO','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','invNoTitle','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','dateTitleLb','DATE','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','dateTitle','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','invTitle','CASH INVOICE','14','blue','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemIdLb','IT ID','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','designLb','DESIGN','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemDescLb','DESC','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemBrandNameLb','BRAND','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemHallMarkLb',' H-UID','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','hallMarkUid','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemHid','','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','unitPriceLb','UNIT PRICE','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemHSNLb','HSN','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemGsWtLb','GS WT','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemPktWtLb','PKT WT','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemNtWtLb','NT WT','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemProcessWtLb','PROCESS WT','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','valAddedLb','VA WT','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemWsWtLb','WS WT','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemFFNWtLb','FFN WT','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','metalRateLb','RATE','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','labourLb','LABOUR','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','valLb','VAL','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','labourLbVal','LABOUR VAL','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','taxLb','TAX','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','valAddedAmtLb','VAL ADD','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemQtyLb','QTY','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemQty','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemShapeLb','SHAPE','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemShape','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemSizeLb','SIZE','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemSize','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','metalRwTnch','','14','black',''),"
            //Author:Amol 9Sept2017
            . "('$ownerId','$RawMetalPurchaselabelType','amtLb','AMOUNT','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','amtLb','AMOUNT','14','black','true'),"
            // 
            // START TO ADD CODE FOR HALLMARKING CHARGES LABEL AND HALLMARKING CHARGES @AUTHOR:PRIYANKA-10JUNE2022
            . "('$ownerId','$RawMetalPurchaselabelType','hallmarkingChargesLb','HALLMARK CHARGES','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','hallmarkingCharges','HALLMARK CHARGES','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','hallmarkChrgsLb','HALLMARK CHARGES','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','hallmarkChrgs','HALLMARK CHARGES','14','black',''),"
            // END TO ADD CODE FOR HALLMARKING CHARGES LABEL AND HALLMARKING CHARGES @AUTHOR:PRIYANKA-10JUNE2022
            //
            . "('$ownerId','$RawMetalPurchaselabelType','itemId','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','design','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemDesc','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','brandName','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','unitPrice','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemHSN','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemGsWt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemPktWt','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemNtWt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemWSWt','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemProcessWt','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','valAdded','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','metalRate','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','labour','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','val','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','labourVal','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','tax','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','valAddedAmt','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','amt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','totalLb','TOTAL','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','total','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','metalRateByPurity','','14','black',''),"
            //Author:AMOL13SEPT2017
            . "('$ownerId','$RawMetalPurchaselabelType','amtsLb','AMOUNT','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','amts','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','settleAmtLb','URD AMT','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','settleAmt','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','mkgChrgLb','MAKING CHARGE','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','mkgChrg','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jRecCourierChgsAmtLb','COURIER CHARGES','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jRecCourierChgsAmt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jRecCashLb','CASH RECEIVED','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jRecCash','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jRecCheqLb','CHEQUE RECEIVED','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jRecCheq','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jRecCardLb','CARD RECEIVED','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jRecCard','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jRecOnlinePayLb','ONLINE PAYMENT','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jRecOnlinePay','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jRecDiscLb','DISCOUNT','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jRecDisc','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtRecCourierChgsAmtLb','COURIER CHARGES','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtRecCourierChgsAmt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtRecCashLb','CASH RECEIVED','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtRecCash','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtRecCheqLb','CHEQUE RECEIVED','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtRecCheq','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtRecCardLb','CARD RECEIVED','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtRecCard','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtRecOnlinePayLb','ONLINE PAYMENT','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtRecOnlinePay','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtRecDiscLb','DISCOUNT','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtRecDisc','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jCgstLb','CGST','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jCgst','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jSgstLb','SGST','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jSgst','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jIgstLb','IGST','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jIgst','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jMkgChrgCgstLb','MAKING CHRG CGST','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jMkgChrgCgst','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','jMkgChrgSgstLb','MAKING CHRG SGST','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jMkgChrgSgst','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','jMkgChrgIgstLb','MAKING CHRG IGST','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jMkgChrgIgst','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','jOtherTaxAmtLb','OTHER TAX AMT','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jOtherTaxAmt','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','jCourierChgsAmtLb','COURIER CHARGES','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jCourierChgsAmt','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','jTotAmtLb','TOTAL AMOUNT','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jTotAmt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imttaxableamtLb','TAXABLE AMT','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imttaxableamt','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtCgstLb','CGST','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtCgst','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtSgstLb','SGST','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtSgst','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtIgstLb','IGST','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtIgst','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtMkgChrgCgstLb','MAKING CHRG CGST','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtMkgChrgCgst','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtMkgChrgSgstLb','MAKING CHRG SGST','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtMkgChrgSgst','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtMkgChrgIgstLb','MAKING CHRG IGST','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtMkgChrgIgst','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtOtherTaxAmtLb','OTHER TAX AMT','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtOtherTaxAmt','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtCourierChgsAmtLb','COURIER CHARGES','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtCourierChgsAmt','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','metalRecLb','METAL RECEIVED','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','metalRec','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','metalRecAmtLb','METAL REC','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','metalRecAmt','','14','black','true'),"
            //Author:AMOL15Sept2017
            . "('$ownerId','$RawMetalPurchaselabelType','urdLessLb','URD LESS','12','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','urdLessAmt','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','cashPaidLb','CASH RECIEVED','12','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','cashPaid','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','discLb','DISCOUNT','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','disc','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jRoundOffLb','ROUND OFF','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','jRoundOff','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtRoundOffLb','ROUND OFF','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtRoundOff','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','totalBalLb','TOTAL REC. AMOUNT','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','totalBal','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','finBalLb','AMT BALANCE','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','finBal','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','payableAmtLb','PAYABLE AMOUNT','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','payableAmt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','finalPayableAmtLb','FINAL AMOUNT','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','finalPayableAmt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtPayableAmtLb','PAYABLE AMOUNT','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtPayableAmt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtFinalPayableAmtLb','FINAL AMOUNT','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','imtFinalPayableAmt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','tncLb','Terms and Conditions','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','tnc','All disputes are subject to the jurisdiction of the competent courts in Delhi.','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','authSignLb','Authorized Signatory','14','black','true'),"

            //Author:AMOL15Sept2017
            . "('$ownerId','$RawMetalPurchaselabelType','authCustSignLb','Customer Signatory','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','footer','Thank You For Your Business!','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','slPrValueAddedOp','byAmount','','','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','udhaarEMI','','14','black','true'),"  //added @Author:SHRI10JUN15
            . "('$ownerId','$RawMetalPurchaselabelType','udhaarEMILb','TOT UDHAAR EMI AMT','14','black','true')," //added @Author:SHRI10JUN15
            . "('$ownerId','$RawMetalPurchaselabelType','rawMetalWt','METAL','14','black','true'),"//added @Author:SHRI07AUG15,modified @Author:SHRI30JAN17 
            . "('$ownerId','$RawMetalPurchaselabelType','rawMetalTnch','TUNCH','14','black',''),"//added @Author:SHRI07AUG15
            . "('$ownerId','$RawMetalPurchaselabelType','rawMetalFnWt','FN WT','14','black','true'),"//added @Author:SHRI07AUG15
            . "('$ownerId','$RawMetalPurchaselabelType','rawMetalRt','RATE','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmImtFormHeader','','22','black','true')," //Imitation Area
            . "('$ownerId','$RawMetalPurchaselabelType','firmImtLongName','','20','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmImtDesc','','16','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmImtRegNoLabel','REGISTRATION NO','16','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmImtRegNo','','16','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmImtAddress','','16','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmImtPhone','PHONE','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmImtEmail','EMAIL','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmImtLeftLogoCheck','','','','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmImtRightLogoCheck','','','','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmImtTinLb','GSTIN','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmImtTin','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmImtPanLb','PAN','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','firmImtPan','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtNameLb','NAME','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtName','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtAddressLb','ADDRESS','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtAddress','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtContactLb','PHONE','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtContact','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtPanLb','PAN','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtPan','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtGstinLb','GSTIN','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtGstin','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtAdhaarLb','ADHAAR NO','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','userImtAdhaar','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','invImtNoTitleLb','INVOICE NO','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','invImtNoTitle','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','dateImtTitleLb','DATE','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','dateImtTitle','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','dueDateTitleLb','DUE DATE','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','dueDateTitle','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','invImtTitle','CASH INVOICE','14','blue','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemImtIdLb','IT ID','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','designImtLb','DESIGN','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemImtDescLb','DESC','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','QTYLB','QTY','14','black','true'),"     // add for Qty label author:DIKSHA 19April2019
            . "('$ownerId','$RawMetalPurchaselabelType','itemImtHSNLb','HSN','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemImtGsWtLb','GS WT','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemImtNtWtLb','NT WT','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','valImtAddedLb','VA WT','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','metalImtRateLb','RATE','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','labourImtLb','LABOUR','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','valImtLb','VAL','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','taxImtLb','TAX','14','black','true'),"
            //author:Amol 9Sept2017
            . "('$ownerId','$RawMetalPurchaselabelType','cgstImtLb','CGST','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','sgstImtLb','SGST','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','igstImtLb','IGST','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','valImtAddedAmtLb','VAL ADD','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','amtImtLb','AMOUNT','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemImtId','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','designImt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemImtDesc','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemImtHSN','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','itemImtGsWt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','metalImtRate','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','labourImt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','valImt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','taxImt','','14','black','true'),"
            //author:Amol 9Sept2017
            . "('$ownerId','$RawMetalPurchaselabelType','cgstImtAmt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','sgstImtAmt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','igstImtAmt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','valImtAddedAmt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','amtImt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','totalImtLb','TOTAL','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','totalImt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','totalFinImtLb','TOTAL FINAL AMT','12','black','true')," // ADDED @Author:SHRI13OCT16
            . "('$ownerId','$RawMetalPurchaselabelType','totalFinImt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','totalMkgImtLb','MAKING CHARGE','12','black','true')," // ADDED FOR IMITATION & STERLING INVOICE SHOW MKG CHRG:DIKSHA 04JAN2019
            . "('$ownerId','$RawMetalPurchaselabelType','totalMkgImt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','totalVatImtLb','OTHER TAX AMT','12','black','true')," // ADDED @Author:SHRI13OCT16
            . "('$ownerId','$RawMetalPurchaselabelType','totalVatImt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','metalImtRecLb','METAL RECEIVED','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','metalImtRec','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','cashImtPaidLb','CASH PAID','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','cashImtPaid','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','discImtLb','DISCOUNT','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','discImt','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','totalImtBalLb','TOTAL BAL','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','totalImtBal','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','finImtBalLb','TOTAL','12','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','finImtBal','','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','tncImtLb','Terms and Conditions','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','tncImt','All disputes are subject to the jurisdiction of the competent courts in Delhi.','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','authImtSignLb','Authorized Signatory','14','black','true'),"
            //Author:Amol15Sept2017
            . "('$ownerId','$RawMetalPurchaselabelType','authImtCustSignLb','Customer Signatory','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','authCryCustSignLb','Customer Signatory','14','black','true'),"
            . "('$ownerId','$RawMetalPurchaselabelType','footerImt','Thank You For Your Business!','14','black','true'),"
            //darshana : 22 july 2021
            . "('$ownerId','$RawMetalPurchaselabelType','othChrgLb','OTH CHRG','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','othChrg','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','othChPayLb','OTHER CHARGES','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','othChPay','','14','black',''),"
            . "('$ownerId','$RawMetalPurchaselabelType','forNameLb','FOR NAME','14','black','')";

//     echo '$queryRawMetalPurchase='.$queryRawMetalPurchase;
    if (!mysqli_query($conn, $queryRawMetalPurchase)) {
        die('Error: ' . mysqli_error($conn));
    }
}
//*********************************************************************************************************************
//END CODE FOR INSERT ENTRIES FOR RAW METAL PURCHASE @AUTHOR :DARSHANA 19 JAN 2021
//*********************************************************************************************************************
//
//*********************************************************************************************************************
//START CODE FOR INSERT ENTRIES FOR PURCHASE RETURN : AUTHOR @DARSHANA 3 FEB 2022
//*********************************************************************************************************************
//
$qPurchaseReturnLabelsDetails = "SELECT label_field_name FROM labels WHERE label_type = 'PurchaseReturn'";
$resPurchaseRetrunLabelsDetails = mysqli_query($conn, $qPurchaseReturnLabelsDetails) or die(mysqli_error($conn));
$totalPurchaseReturnLabelsDetails = mysqli_num_rows($resPurchaseRetrunLabelsDetails);

if ($totalPurchaseReturnLabelsDetails <= 0) {
    $PurchaseReturnlabelType = 'PurchaseReturn';
    $queryPurchaseReturn = "INSERT INTO labels(    
           label_own_id, label_type, label_field_name, label_field_content,label_field_font_size,label_field_font_color,label_field_check)
           VALUES
           ('$ownerId','$PurchaseReturnlabelType','firmFormHeader','','22','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmLongName','','20','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmDesc','','16','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmRegNoLabel','REGISTRATION NO','16','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmRegNo','','16','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmAddress','','16','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmPhone','PHONE','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmEmail','EMAIL','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmLeftLogoCheck','','','','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmRightLogoCheck','','','','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmTinLb','GSTIN','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmTin','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmPanLb','PAN','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','firmPan','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userNameLb','NAME','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userName','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userAddressLb','ADDRESS','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userAddress','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userContactLb','PHONE','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userContact','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userSoLb','FATHER NAME','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userSo','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userDoLb','MOTHER NAME','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userDo','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userWoLb','SPOUSE NAME','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userWo','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userCoLb','GUARDIAN NAME','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userCo','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtSoLb','FATHER NAME','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtSo','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtDoLb','FATHER NAME','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtDo','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtWoLb','SPOUSE NAME','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtWo','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtCoLb','GUARDIAN NAME','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtCo','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','firmTinTopLabel','GST','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','firmTinTop','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','firmPanTopLb','PAN','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','firmPanTop','','14','black',''),"
            // Author:AMOL 
            . "('$ownerId','$PurchaseReturnlabelType','userPanLb','PAN','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userPan','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userGstInLb','GSTIN','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userGstIn','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userAdhaarLb','ADHAAR NO','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userAdhaar','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','tableHeightLb','TABLE HEIGHT','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','tableHeight','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','cgstLb','CGST','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','cgstAmt','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','sgstLb','SGST','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','sgstAmt','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','igstLb','IGST','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','igstAmt','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','invNoTitleLb','INVOICE NO','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','invNoTitle','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','dateTitleLb','DATE','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','dateTitle','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','invTitle','CASH INVOICE','14','blue','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemIdLb','IT ID','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','designLb','DESIGN','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemDescLb','DESC','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemBrandNameLb','BRAND','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','itemHallMarkLb',' H-UID','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','hallMarkUid','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','itemHid','','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','unitPriceLb','UNIT PRICE','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','itemHSNLb','HSN','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemGsWtLb','GS WT','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemPktWtLb','PKT WT','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','itemNtWtLb','NT WT','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemProcessWtLb','PROCESS WT','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','valAddedLb','VA WT','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','itemWsWtLb','WS WT','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','itemFFNWtLb','FFN WT','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','metalRateLb','RATE','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','labourLb','LABOUR','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','valLb','VAL','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','labourLbVal','LABOUR VAL','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','taxLb','TAX','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','valAddedAmtLb','VAL ADD','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','itemQtyLb','QTY','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','itemQty','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemShapeLb','SHAPE','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','itemShape','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','itemSizeLb','SIZE','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','itemSize','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','metalRwTnch','','14','black',''),"
            //Author:Amol 9Sept2017
            . "('$ownerId','$PurchaseReturnlabelType','amtLb','AMOUNT','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','amtLb','AMOUNT','14','black','true'),"
            // 
            // START TO ADD CODE FOR HALLMARKING CHARGES LABEL AND HALLMARKING CHARGES @AUTHOR:PRIYANKA-10JUNE2022
            . "('$ownerId','$PurchaseReturnlabelType','hallmarkingChargesLb','HALLMARK CHARGES','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','hallmarkingCharges','HALLMARK CHARGES','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','hallmarkChrgsLb','HALLMARK CHARGES','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','hallmarkChrgs','HALLMARK CHARGES','14','black',''),"
            // END TO ADD CODE FOR HALLMARKING CHARGES LABEL AND HALLMARKING CHARGES @AUTHOR:PRIYANKA-10JUNE2022
            //
            . "('$ownerId','$PurchaseReturnlabelType','itemId','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','design','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemDesc','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','brandName','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','unitPrice','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','itemHSN','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemGsWt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemPktWt','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','itemNtWt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemWSWt','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','itemProcessWt','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','valAdded','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','metalRate','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','labour','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','val','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','labourVal','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','tax','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','valAddedAmt','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','amt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','totalLb','TOTAL','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','total','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','metalRateByPurity','','14','black',''),"
            //Author:AMOL13SEPT2017
            . "('$ownerId','$PurchaseReturnlabelType','amtsLb','AMOUNT','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','amts','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','settleAmtLb','URD AMT','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','settleAmt','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','mkgChrgLb','MAKING CHARGE','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','mkgChrg','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jRecCourierChgsAmtLb','COURIER CHARGES','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jRecCourierChgsAmt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jRecCashLb','CASH RECEIVED','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jRecCash','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jRecCheqLb','CHEQUE RECEIVED','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jRecCheq','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jRecCardLb','CARD RECEIVED','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jRecCard','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jRecOnlinePayLb','ONLINE PAYMENT','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jRecOnlinePay','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jRecDiscLb','DISCOUNT','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jRecDisc','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtRecCourierChgsAmtLb','COURIER CHARGES','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtRecCourierChgsAmt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtRecCashLb','CASH RECEIVED','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtRecCash','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtRecCheqLb','CHEQUE RECEIVED','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtRecCheq','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtRecCardLb','CARD RECEIVED','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtRecCard','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtRecOnlinePayLb','ONLINE PAYMENT','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtRecOnlinePay','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtRecDiscLb','DISCOUNT','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtRecDisc','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jCgstLb','CGST','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jCgst','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jSgstLb','SGST','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jSgst','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jIgstLb','IGST','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jIgst','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jMkgChrgCgstLb','MAKING CHRG CGST','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jMkgChrgCgst','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','jMkgChrgSgstLb','MAKING CHRG SGST','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jMkgChrgSgst','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','jMkgChrgIgstLb','MAKING CHRG IGST','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jMkgChrgIgst','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','jOtherTaxAmtLb','OTHER TAX AMT','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jOtherTaxAmt','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','jCourierChgsAmtLb','COURIER CHARGES','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jCourierChgsAmt','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','jTotAmtLb','TOTAL AMOUNT','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jTotAmt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imttaxableamtLb','TAXABLE AMT','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imttaxableamt','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','imtCgstLb','CGST','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtCgst','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','imtSgstLb','SGST','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtSgst','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','imtIgstLb','IGST','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtIgst','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','imtMkgChrgCgstLb','MAKING CHRG CGST','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtMkgChrgCgst','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','imtMkgChrgSgstLb','MAKING CHRG SGST','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtMkgChrgSgst','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','imtMkgChrgIgstLb','MAKING CHRG IGST','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtMkgChrgIgst','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','imtOtherTaxAmtLb','OTHER TAX AMT','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtOtherTaxAmt','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','imtCourierChgsAmtLb','COURIER CHARGES','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtCourierChgsAmt','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','metalRecLb','METAL RECEIVED','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','metalRec','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','metalRecAmtLb','METAL REC','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','metalRecAmt','','14','black','true'),"
            //Author:AMOL15Sept2017
            . "('$ownerId','$PurchaseReturnlabelType','urdLessLb','URD LESS','12','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','urdLessAmt','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','cashPaidLb','CASH RECIEVED','12','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','cashPaid','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','discLb','DISCOUNT','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','disc','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jRoundOffLb','ROUND OFF','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','jRoundOff','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtRoundOffLb','ROUND OFF','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtRoundOff','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','totalBalLb','TOTAL REC. AMOUNT','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','totalBal','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','finBalLb','AMT BALANCE','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','finBal','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','payableAmtLb','PAYABLE AMOUNT','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','payableAmt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','finalPayableAmtLb','FINAL AMOUNT','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','finalPayableAmt','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','imtPayableAmtLb','PAYABLE AMOUNT','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtPayableAmt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtFinalPayableAmtLb','FINAL AMOUNT','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','imtFinalPayableAmt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','tncLb','Terms and Conditions','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','tnc','All disputes are subject to the jurisdiction of the competent courts in Delhi.','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','authSignLb','Authorized Signatory','14','black','true'),"

            //Author:AMOL15Sept2017
            . "('$ownerId','$PurchaseReturnlabelType','authCustSignLb','Customer Signatory','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','footer','Thank You For Your Business!','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','slPrValueAddedOp','byAmount','','','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','udhaarEMI','','14','black','true'),"  //added @Author:SHRI10JUN15
            . "('$ownerId','$PurchaseReturnlabelType','udhaarEMILb','TOT UDHAAR EMI AMT','14','black','true')," //added @Author:SHRI10JUN15
            . "('$ownerId','$PurchaseReturnlabelType','rawMetalWt','METAL','14','black','true'),"//added @Author:SHRI07AUG15,modified @Author:SHRI30JAN17 
            . "('$ownerId','$PurchaseReturnlabelType','rawMetalTnch','TUNCH','14','black',''),"//added @Author:SHRI07AUG15
            . "('$ownerId','$PurchaseReturnlabelType','rawMetalFnWt','FN WT','14','black','true'),"//added @Author:SHRI07AUG15
            . "('$ownerId','$PurchaseReturnlabelType','rawMetalRt','RATE','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmImtFormHeader','','22','black','true')," //Imitation Area
            . "('$ownerId','$PurchaseReturnlabelType','firmImtLongName','','20','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmImtDesc','','16','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmImtRegNoLabel','REGISTRATION NO','16','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmImtRegNo','','16','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmImtAddress','','16','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmImtPhone','PHONE','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmImtEmail','EMAIL','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmImtLeftLogoCheck','','','','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmImtRightLogoCheck','','','','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmImtTinLb','GSTIN','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmImtTin','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmImtPanLb','PAN','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','firmImtPan','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtNameLb','NAME','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtName','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtAddressLb','ADDRESS','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtAddress','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtContactLb','PHONE','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtContact','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtPanLb','PAN','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtPan','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtGstinLb','GSTIN','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtGstin','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtAdhaarLb','ADHAAR NO','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','userImtAdhaar','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','invImtNoTitleLb','INVOICE NO','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','invImtNoTitle','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','dateImtTitleLb','DATE','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','dateImtTitle','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','dueDateTitleLb','DUE DATE','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','dueDateTitle','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','invImtTitle','CASH INVOICE','14','blue','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemImtIdLb','IT ID','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','designImtLb','DESIGN','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemImtDescLb','DESC','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','QTYLB','QTY','14','black','true'),"     // add for Qty label author:DIKSHA 19April2019
            . "('$ownerId','$PurchaseReturnlabelType','itemImtHSNLb','HSN','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemImtGsWtLb','GS WT','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemImtNtWtLb','NT WT','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','valImtAddedLb','VA WT','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','metalImtRateLb','RATE','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','labourImtLb','LABOUR','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','valImtLb','VAL','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','taxImtLb','TAX','14','black','true'),"
            //author:Amol 9Sept2017
            . "('$ownerId','$PurchaseReturnlabelType','cgstImtLb','CGST','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','sgstImtLb','SGST','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','igstImtLb','IGST','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','valImtAddedAmtLb','VAL ADD','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','amtImtLb','AMOUNT','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemImtId','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','designImt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemImtDesc','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemImtHSN','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','itemImtGsWt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','metalImtRate','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','labourImt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','valImt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','taxImt','','14','black','true'),"
            //author:Amol 9Sept2017
            . "('$ownerId','$PurchaseReturnlabelType','cgstImtAmt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','sgstImtAmt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','igstImtAmt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','valImtAddedAmt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','amtImt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','totalImtLb','TOTAL','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','totalImt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','totalFinImtLb','TOTAL FINAL AMT','12','black','true')," // ADDED @Author:SHRI13OCT16
            . "('$ownerId','$PurchaseReturnlabelType','totalFinImt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','totalMkgImtLb','MAKING CHARGE','12','black','true')," // ADDED FOR IMITATION & STERLING INVOICE SHOW MKG CHRG:DIKSHA 04JAN2019
            . "('$ownerId','$PurchaseReturnlabelType','totalMkgImt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','totalVatImtLb','OTHER TAX AMT','12','black','true')," // ADDED @Author:SHRI13OCT16
            . "('$ownerId','$PurchaseReturnlabelType','totalVatImt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','metalImtRecLb','METAL RECEIVED','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','metalImtRec','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','cashImtPaidLb','CASH PAID','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','cashImtPaid','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','discImtLb','DISCOUNT','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','discImt','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','totalImtBalLb','TOTAL BAL','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','totalImtBal','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','finImtBalLb','TOTAL','12','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','finImtBal','','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','tncImtLb','Terms and Conditions','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','tncImt','All disputes are subject to the jurisdiction of the competent courts in Delhi.','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','authImtSignLb','Authorized Signatory','14','black','true'),"
            //Author:Amol15Sept2017
            . "('$ownerId','$PurchaseReturnlabelType','authImtCustSignLb','Customer Signatory','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','authCryCustSignLb','Customer Signatory','14','black','true'),"
            . "('$ownerId','$PurchaseReturnlabelType','footerImt','Thank You For Your Business!','14','black','true'),"
            //darshana : 22 july 2021
            . "('$ownerId','$PurchaseReturnlabelType','othChrgLb','OTH CHRG','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','othChrg','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','othChPayLb','OTHER CHARGES','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','othChPay','','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','forNameLb','FOR NAME','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','mkg_lb','MKG','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','total_valwith_mkglb','Total Amount','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','totalCrystallb','Crystal Amt','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','cry_lb','Crystal','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','discwithouttaxLb','DISC WITHOUT TAX','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','additionalChrgsLb','Additional Chrg','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','taxableamtLb','TAXABLE AMT ','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','amtwithmkglb','AMOUNT WITH MKG ','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','amtwithmkg_crylb','AMT WITH MKG AND CRY','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','jtotmkgCgstLb','TOTAL MKG CGST METAL CGST','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','jtotmkgSgstLb','TOTAL MKG SGST METAL SGST','14','black',''),"
            . "('$ownerId','$PurchaseReturnlabelType','jtotmkgIgstLb','TOTAL MKG SGST METAL IGST','14','black','')";

    if (!mysqli_query($conn, $queryPurchaseReturn)) {
        die('Error: ' . mysqli_error($conn));
    }
}
//
//*********************************************************************************************************************
//END CODE FOR INSERT ENTRIES FOR PURCHASE RETURN : AUTHOR @DARSHANA 3 FEB 2022
//*********************************************************************************************************************
//
//*********************************************************************************************************************
//START CODE FOR INSERT ENTRIES FOR SCHEME EMI INVOICE @AUTHOR :SIMRAN:25APR2023
//*********************************************************************************************************************
//
$qschemeInvoiceLabelsDetails = "SELECT label_field_name FROM labels WHERE label_type = 'schemeInvoice'";
$resschemeInvoiceLabelsDetails = mysqli_query($conn, $qschemeInvoiceLabelsDetails) or die(mysqli_error($conn));
$totalschemeInvoiceLabelsDetails = mysqli_num_rows($resschemeInvoiceLabelsDetails);
if ($totalschemeInvoiceLabelsDetails <= 0) {
    $schemeInvoicelabelType = 'schemeInvoice';
    $queryschemeInvoice = "INSERT INTO labels(    
           label_own_id, label_type, label_field_name, label_field_content,label_field_font_size,label_field_font_color,label_field_check)
           VALUES
               ('$ownerId', '$schemeInvoicelabelType', 'firmSchemeFormHeader', '', '22', 'blue', 'true'),"
            . "('$ownerId', '$schemeInvoicelabelType', 'firmSchemeLongName', '', '20', 'brightBlue', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'firmSchemeDesc', '', '16', 'blue', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'firmschemeRegNoLabel', 'FIRM REGISTRATION NUMBER', '16', 'lightBlue', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'firmschemeRegNo', '', '16', 'lightBlue', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'firmschemeAddress', '', '16', 'lightBlue', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'firmschemePhoneLb', 'PHONE', '14', 'lightBlue', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'firmschemePhone', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'firmschemeEmail', 'EMAIL', '14', 'lightBlue', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'firmSchemeLeftLogoCheck', '14', '', '', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'firmSchemeRightLogoCheck', '14', '', '', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'firmschemeTinLb', 'TIN', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'firmschemeTin', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'firmschemePanLb', 'PAN', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'firmschemePan', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'userschemeNameLb', 'NAME', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'userschemeName', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'userschemeAddressLb', 'ADDRESS', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'userschemeAddress', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'userschemeContactLb', 'PHONE', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'userschemeContact', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'userschemeNoLb', 'SCHEME NO', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'userschemeNo', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'userschemePanLb', 'PAN', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'userschemePan', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'userschemeGstLb', 'GST', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'userschemeGst', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'invschemeNoTitleLb', 'INVOICE NO', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'invschemeNoTitle', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'SchemeStartDateLb', 'START DATE', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'SchemeStartDate', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'SchemeEndDateLb', 'END DATE', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'SchemeEndDate', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'invschemeTitle', 'SCHEME EMI INVOICE', '14', 'blue', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'schemeEmiNoLb', 'EMI NO', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'schemeEmiNo', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'schemepaidDateLb', 'DATE OF PAYMENT', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'schemepaidDate', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'schemeReceiptNoLb', 'RECEIPT NO', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'schemeReceiptNo', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'invschemeNoTitle', 'SCHEME INVOICE', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'schemePaidAmtLb', 'PAID DATE', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'schemePaidAmt', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'schemeCumulativeAmtLb', 'CUMULATIVE AMOUNT', '14', 'blue', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'schemeCumulativeAmt', '', '14', 'black', 'true'), "
            ."('$ownerId', '$schemeInvoicelabelType', 'schemeCumulativeWtLb', 'CUMULATIVE WT', '14', 'blue', 'true'),"
            ."('$ownerId', '$schemeInvoicelabelType', 'schemeCumulativeWt', '', '14', 'black', 'true'),"
            . "('$ownerId', '$schemeInvoicelabelType', 'schemePaymentLb', 'PAYMENT', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'schemePayment', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'schemeStatusLb', 'STATUS', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'schemeStatus', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'termsschemeTop', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'tncschemeLb', 'TERMS AND CONDITIONS', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'tncscheme', 'All disputes are subject to the jurisdiction of the competent courts in Delhi.', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'authSchemeCustSignLb', 'OWNER SIGNATURE', '14', 'blue', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'authSchemeSignLb', 'CUSTOMER SIGNATURE', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvoicelabelType', 'footerSchemeLb', 'THANKS FOR BUSINESS', '14', 'blue', 'true')"
    ;

    if (!mysqli_query($conn, $queryschemeInvoice)) {
        die('Error: ' . mysqli_error($conn));
    }
}
//
//*********************************************************************************************************************
//END CODE FOR INSERT ENTRIES FOR SCHEME EMI INVOICE @AUTHOR :SIMRAN:25APR2023
//*********************************************************************************************************************
//
//
//*********************************************************************************************************************
//START CODE FOR INSERT ENTRIES FOR SCHEME INVOICE @AUTHOR :SIMRAN:25APR2023
//*********************************************************************************************************************
//
$qschemeInvLabelsDetails = "SELECT label_field_name FROM labels WHERE label_type = 'schemeInv'";
$resschemeInvLabelsDetails = mysqli_query($conn, $qschemeInvLabelsDetails) or die(mysqli_error($conn));
$totalschemeInvLabelsDetails = mysqli_num_rows($resschemeInvLabelsDetails);
if ($totalschemeInvLabelsDetails <= 0) {
    $schemeInvlabelType = 'schemeInv';
    $queryschemeInv = "INSERT INTO labels(    
           label_own_id, label_type, label_field_name, label_field_content,label_field_font_size,label_field_font_color,label_field_check)
           VALUES
               ('$ownerId', '$schemeInvlabelType', 'firmSchemeInvFormHeader', '', '22', 'blue', 'true'),"
            . "('$ownerId', '$schemeInvlabelType', 'firmSchemeInvLongName', '', '20', 'brightBlue', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'firmSchemeInvDesc', '', '16', 'blue', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'firmschemeInvRegNoLabel', 'FIRM REGISTRATION NUMBER', '16', 'lightBlue', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'firmschemeInvRegNo', '', '16', 'lightBlue', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'firmschemeInvAddress', '', '16', 'lightBlue', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'firmschemeInvPhoneLb', 'PHONE', '14', 'blue', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'firmschemeInvPhone', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'firmschemeInvEmail', 'EMAIL', '14', 'lightBlue', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'firmSchemeInvLeftLogoCheck', '14', '', '', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'firmSchemeInvRightLogoCheck', '14', '', '', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'firmschemeInvTinLb', 'TIN', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'firmschemeInvTin', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'firmschemeInvPanLb', 'PAN', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'firmschemeInvPan', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvNameLb', 'NAME', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvName', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvAddressLb', 'ADDRESS', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvAddress', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvContactLb', 'PHONE', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvContact', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvNoLb', 'SCHEME NO', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvNo', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvDobLb', 'BIRTH DATE', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvDob', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvEmailLb', 'EMAIL', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvEmail', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvBankLb', 'USER ACC NO', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvBank', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvPanLb', 'PAN', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvPan', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvGstLb', 'GST', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'userschemeInvGst', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'invschemeInvNoTitleLb', 'INVOICE NO', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'invschemeInvNoTitle', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'SchemeInvJoinDateLb', 'JOIN DATE', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'SchemeInvJoinDate', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'SchemeInvMaturityDateLb', 'MATURITY DATE', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'SchemeInvMaturityDate', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'schemeInvTitle', 'SCHEME INVOICE', '14', 'blue', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'schemeInstalAmtLb', 'INSTAL. AMT', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'schemeInstalAmt', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'schemeInvNoOfInstalLb', 'NO OF INSTAL.', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'schemeInvNoOfInstal', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'schemeInvTokenNoLb', 'TOKEN NO', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'schemeInvTokenNo', '', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'tncschemeInvLb', 'TERMS AND CONDITIONS', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'tncschemeInv', 'All disputes are subject to the jurisdiction of the competent courts in Delhi.', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'authSchemeInvCustSignLb', 'CUSTOMER SIGNATURE', '14', 'blue', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'authSchemeInvSignLb', 'OWNER SIGNATURE', '14', 'black', 'true'), "
            . "('$ownerId', '$schemeInvlabelType', 'footerSchemeInvLb', 'THANKS FOR BUSINESS', '14', 'blue', 'true')"
    ;

    if (!mysqli_query($conn, $queryschemeInv)) {
        die('Error: ' . mysqli_error($conn));
    }
}
//
//*********************************************************************************************************************
//END CODE FOR INSERT ENTRIES FOR SCHEME INVOICE @AUTHOR :SIMRAN:25APR2023
//*********************************************************************************************************************
//
//$queryschemeInvoice
include 'omtbplab.php';
//
include 'omtbclab.php';
//
//
include 'omEstiSellInsUpd.php';
//
// FOR DEFAULT CUSTOMIZED INVOICE LABEL SETUP (PENDING, ASSIGNED AND READY ORDERS) @AUTHOR:PRIYANKA-30AUG2021
include 'omOrderCustomizedInvLabelSetupFile.php';
//
?>