<?php 
/*
 * **************************************************************************************
 * @tutorial: Sell Invoice Details
 * **************************************************************************************
 * 
 * Created on Dec 19, 2013 2:54:49 PM
 *
 * @FileName: omspinvnewtaxRetailWholesaleItemDetails.php
 * @Author: SIMRAN:05JAM2023
 * @AuthorEmailId:  info@softwaregen.com*/
?>
<?php 
parse_str(getTableValues("SELECT sttr_transaction_type FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
                . "and sttr_indicator IN ('stock','stockCrystal','PURCHASE','rawMetal','APPROVAL','APPROVALREC','crystal','imitation','strsilver','RetailStock','ESTIMATE', 'PurchaseReturn') "
                . "and sttr_transaction_type IN('STOCK', 'sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ESTIMATE', 'PurchaseReturn') "
                . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') AND sttr_firm_id='$utin_firm_id' order by sttr_id ASC"));

if ($labelType == 'APPROVAL' || $panelName == 'Estimate' || $approvalPanel == 'APPROVAL' || $sttr_transaction_type == 'APPROVAL') {
    parse_str(getTableValues("SELECT sttr_firm_id "
                    . "FROM stock_transaction "
                    . "where sttr_owner_id='$sessionOwnerId' "
                    . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' "
                    . "and sttr_invoice_no='$slPrInvoiceNo' "
                    . "and sttr_user_id ='$userId' "
                    . "and sttr_status NOT IN('DELETED')"));
    $utin_firm_id = $sttr_firm_id;
} else {
    parse_str(getTableValues("SELECT utin_payment_mode AS paymentMode,utin_transaction_type,utin_type,utin_firm_id "
                    . "FROM user_transaction_invoice "
                    . "where utin_owner_id='$sessionOwnerId' "
                    . "and utin_pre_invoice_no='$slPrPreInvoiceNo' "
                    . "and utin_invoice_no='$slPrInvoiceNo' "
                    . "and utin_user_id ='$userId' "
                    . "and utin_status NOT IN('DELETED') "));
}
//
//echo '$utin_firm_id == ' . $utin_firm_id.'<br>';
//
/* * *** Start Code To GET Firm Details ********* */
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    // if not selected assign session firm
    $selFirmId = $_SESSION['setFirmSession'];
}
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
}
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
    // Set String for Public Firms
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}
//
if ($strFrmId != '' && $strFrmId != NULL) {
    $stockTransFirmStr = " and sttr_firm_id IN ($strFrmId) ";
} else {
    $stockTransFirmStr = " and sttr_firm_id = '$utin_firm_id' ";
}
//
?>
<?php
if ($invName == 'metalPurchase') {

                                       $qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' "
                                               . "and sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo' "
                                               . "and sttr_indicator IN ('rawMetal','stockCrystal') "
                                               . "and sttr_transaction_type IN ('PURBYSUPP') $sttr_date_str "
                                               . "and sttr_user_id = '$userId' and sttr_status NOT IN('DELETED') order by sttr_id ASC";

                                       $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);

                                       //echo '$qSelSlPrItemDetails == '.$qSelSlPrItemDetails;

                                       $noOf = mysqli_num_rows($resSlPrItemDetails);
                                   } else {

                                       $qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                                               . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
                                               . "and sttr_indicator IN ('stock','stockCrystal','PURCHASE','rawMetal','APPROVAL','APPROVALREC','crystal','imitation','strsilver','RetailStock','ESTIMATE', 'PurchaseReturn') "
                                               . "and sttr_transaction_type IN('STOCK', 'sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ESTIMATE', 'PurchaseReturn') $sttr_date_str "
                                               . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') AND sttr_firm_id='$utin_firm_id' order by sttr_id ASC";

                                       $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);

                                       $noOf = mysqli_num_rows($resSlPrItemDetails);
                                   }

                                   //echo '$qSelSlPrItemDetails @==@ ' . $qSelSlPrItemDetails . '<br /><br /><br />';

                                   $slPrindicator = array();

                                   while ($rowSlPrItemDetails = mysqli_fetch_array($resSlPrItemDetails)) {
                                       $slPrindicator[] = $rowSlPrItemDetails;
//                                       echo 'rowSlPrItemDetails[sttr_image_id]'.$rowSlPrItemDetails['sttr_image_id'].'<br>';
                                       if ($rowSlPrItemDetails['sttr_image_id'] != '') {

                                           $designpresent = 'yes';
                                       } else if ($rowSlPrItemDetails['sttr_sttr_id'] != '') {
                                           $sttr_image_id = '';
                                           parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction "
                                                           . "WHERE sttr_id='$rowSlPrItemDetails[sttr_sttr_id]' $sttr_date_str and sttr_transaction_type NOT IN ('sell','ESTIMATESELL') AND sttr_indicator != 'stockCrystal'"));
//                                          echo 'sttr_image_id'.$sttr_image_id .'<br>';
                                           if ($sttr_image_id != '') {
                                               $designpresent = 'yes';
                                           }
                                       }
                                   }

                                   foreach ($slPrindicator as $cry) {
                                       if ($cry['sttr_indicator'] == 'stockCrystal') {
                                           $crystalPresent = 'yes';
                                       }
                                   }

                                   if ($invName == 'metalPurchase') {

                                       $qgetqueryforvaluespresent = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                                               . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
                                               . "and sttr_indicator IN ('rawMetal','stockCrystal') "
                                               . "and sttr_transaction_type IN ('PURBYSUPP') $sttr_date_str "
                                               . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') AND sttr_firm_id='$utin_firm_id' order by sttr_id ASC";
                                       $resSlPrItemDetails = mysqli_query($conn, $qgetqueryforvaluespresent);

                                       //echo '$qgetqueryforvaluespresent == '.$qgetqueryforvaluespresent;
                                   } else {


                                       $qgetqueryforvaluespresent = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                                               . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
                                               . "and sttr_indicator IN ('stock','stockCrystal','PURCHASE','rawMetal','APPROVAL','APPROVALREC','crystal','imitation','strsilver','RetailStock', 'ESTIMATE', 'PurchaseReturn') "
                                               . "and sttr_transaction_type IN('STOCK', 'sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ESTIMATE', 'PurchaseReturn') $sttr_date_str "
                                               . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') $stockTransFirmStr order by sttr_id ASC";
                                       $resSlPrItemDetails = mysqli_query($conn, $qgetqueryforvaluespresent);
                                   }

                                   //echo '$qgetqueryforvaluespresent #==# ' . $qgetqueryforvaluespresent . '<br /><br /><br />';

                                   while ($rowSlPrItemDetails = mysqli_fetch_array($resSlPrItemDetails)) {
                                       $slPrItemPKTW = $rowSlPrItemDetails['sttr_pkt_weight'] . ' ' . $rowSlPrItemDetails['sttr_pkt_weight_type']; //add code for pkt wt Author:SANT08APR17
                                       if ($slPrItemPKTW != '') {
                                           $pkwtpresent = 'yes';
                                       }

                                       $slPrMetalPutity = $rowSlPrItemDetails['sttr_purity'];
                                       if ($slPrMetalPutity != '') {
                                           $puritypresent = 'yes';
                                       }

                                       $slPrItemLabChargs = $rowSlPrItemDetails['sttr_making_charges'];
                                       if ($slPrItemLabChargs != '') {
                                           $labpresent = 'yes';
                                       }

                                       $slPrItemLabChargsVal = $rowSlPrItemDetails['sttr_total_lab_charges'];
                                       if ($slPrItemLabChargsVal != '') {
                                           $labchargepresent = 'yes';
                                       }

                                       $slPrOtherInfo = $rowSlPrItemDetails['sttr_other_info'];
                                       if ($slPrOtherInfo != '') {
                                           $labpresent = 'yes';
                                       }

                                       $slPrItemHSN = $rowSlPrItemDetails['sttr_hsn_no'];
                                       if ($slPrItemHSN != '') {
                                           $hsnpresent = 'yes';
                                       }
                                       $slPrHallMark = $rowSlPrItemDetails['sttr_hallmark_uid'];
                                       if ($slPrHallMark != '' && $slPrHallMark != NULL) {
                                           $hallMark = 'yes';
                                       }

                                       $other_info = $rowSlPrItemDetails['sttr_other_info'];

                                       if ($other_info != '' && $other_info != NULL) {
                                           $otherinfo = 'yes';
                                       }

                                       $productSize = $rowSlPrItemDetails['sttr_size'];

                                       if ($productSize != '' && $productSize != NULL) {
                                           $sizePresent = 'yes';
                                       }

                                       $sttr_tot_price_cgst_chrg = $rowSlPrItemDetails['sttr_tot_price_cgst_chrg'];
                                       if ($sttr_tot_price_cgst_chrg != 0 || $sttr_tot_price_cgst_chrg != 0.00) {
                                           $cgstpresent = 'yes';
                                       }

                                       $sttr_tot_price_sgst_chrg = $rowSlPrItemDetails['sttr_tot_price_sgst_chrg'];
                                       if ($sttr_tot_price_sgst_chrg != 0 || $sttr_tot_price_sgst_chrg != 0.00) {
                                           $sgstpresent = 'yes';
                                       }

                                       $sttr_tot_price_igst_chrg = $rowSlPrItemDetails['sttr_tot_price_igst_chrg'];
                                       if ($sttr_tot_price_igst_chrg != '' || $sttr_tot_price_igst_chrg != 0 || $sttr_tot_price_igst_chrg != 0.00) {
                                           $igstpresent = 'yes';
                                       }

                                       $sttr_total_making_charges = $rowSlPrItemDetails['sttr_total_making_charges'];
                                       if ($sttr_total_making_charges != '') {
                                           $sttrtotalmkgpresent = 'yes';
                                       }

                                       $sttr_making_charges = $rowSlPrItemDetails['sttr_making_charges'];
                                       if ($sttr_making_charges != '') {
                                           $mkgresent = 'yes';
                                       }

                                       $slcustPrWastage = $rowSlPrItemDetails['sttr_cust_wastage'];

                                       if ($slcustPrWastage != '' && $slcustPrWastage <> 0) {
                                           $custwasatagepresent = 'yes';
                                       }

                                       if ($rowSlPrItemDetails['sttr_cust_wastage_wt'] != '' && $rowSlPrItemDetails['sttr_cust_wastage_wt'] != NULL) {
                                           $slPrItemProcessWeightNew = decimalVal($rowSlPrItemDetails['sttr_cust_wastage_wt'], 3);
                                       } else {
                                           $slPrItemProcessWeightNew = decimalVal($rowSlPrItemDetails['sttr_final_fine_weight'] - $rowSlPrItemDetails['sttr_nt_weight'], 3);
                                       }

                                       if ($slPrItemProcessWeightNew > 0) {
                                           $processwtpresent = 'yes';
                                       }

                                       // INDICATOR SET FOR OTHER CHARGES @AUTHOR:MADHUREE17DEC19
                                       $otherCharges = $rowSlPrItemDetails['sttr_other_charges'];

                                       if ($otherCharges != '' && $otherCharges != NULL) {
                                           $otherChargesPresent = 'yes';
                                       }

                                       if ($rowSlPrItemDetails['sttr_metal_discount_amt'] > 0) {
                                           $metalDiscountPresent = 'YES';
                                       }
                                       if ($rowSlPrItemDetails['sttr_mkg_discount_amt'] > 0) {
                                           $mkgDiscountPresent = 'YES';
                                       }
                                       if ($rowSlPrItemDetails['sttr_stone_discount_amt'] > 0) {
                                           $stoneDiscountPresent = 'YES';
                                       }
                                       if ($rowSlPrItemDetails['sttr_mkg_discount_amt'] > 0) {
                                           $mkgAfterDiscInGmPresent = 'YES';
                                           $mkgAfterDiscInPerPresent = 'YES';
                                       }
                                   }


                                   if ($invName == 'metalPurchase') {
                                       //
                                       $qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' "
                                               . "and sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo' "
                                               . "and sttr_indicator IN ('rawMetal','stockCrystal') $sttr_date_str "
                                               . "and sttr_transaction_type IN('PURBYSUPP') "
                                               . "and sttr_user_id = '$userId' and sttr_status NOT IN('DELETED') AND sttr_firm_id='$utin_firm_id' order by sttr_id ASC";
                                       //
                                       $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
                                       $noOf = mysqli_num_rows($resSlPrItemDetails);
                                       //
                                       //echo '$qSelSlPrItemDetails == '.$qSelSlPrItemDetails;
                                   //
                                   } else {
                                       //  sarvesh
                                       //
                                       if ($diamondWt_check == 'true' || $stRate_check == 'true' || $diamondValuetion_check == 'true') {
                                           $qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                                                   . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
                                                   . "and sttr_indicator IN ('stock','PURCHASE','rawMetal','APPROVAL','APPROVALREC','ItemReturn','imitation','strsilver','RetailStock', 'ESTIMATE', 'PurchaseReturn') "
                                                   . "and sttr_transaction_type IN('STOCK','sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ItemReturn','ESTIMATE', 'PurchaseReturn') $sttr_date_str "
                                                   . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') $stockTransFirmStr and sttr_status NOT IN('RETURNED') order by sttr_id ASC";

                                           $qSelSlPrItemCrystalDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                                                   . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
                                                   . "and sttr_indicator IN ('stockCrystal') "
                                                   . "and sttr_transaction_type IN('STOCK','stockCrystal','sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ItemReturn','ESTIMATE', 'PurchaseReturn') $sttr_date_str "
                                                   . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') $stockTransFirmStr and sttr_status NOT IN('RETURNED') order by sttr_id ASC";

                                           $resSlPrItemCrystalDetails = mysqli_query($conn, $qSelSlPrItemCrystalDetails);
                                           $noOfCrystalAvaliable = mysqli_num_rows($resSlPrItemCrystalDetails);
                                           while ($rowSlPrItemCrystalDetails = mysqli_fetch_array($resSlPrItemCrystalDetails)) {
                                               $crystalRateCalcualtion += $rowSlPrItemCrystalDetails['sttr_sell_rate'];
                                           }
                                           if ($noOfCrystalAvaliable > 0) {
                                               $crystalRateCalcualtion = round($crystalRateCalcualtion / $noOfCrystalAvaliable);
                                           }
                                           //
                                           //sarvesh
                                       } else {
                                           $qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                                                   . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
                                                   . "and sttr_indicator IN ('stock','stockCrystal','PURCHASE','rawMetal','APPROVAL','APPROVALREC','ItemReturn','imitation','strsilver','RetailStock', 'ESTIMATE', 'PurchaseReturn') "
                                                   . "and sttr_transaction_type IN('STOCK','sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ItemReturn','ESTIMATE', 'PurchaseReturn') $sttr_date_str "
                                                   . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') $stockTransFirmStr and sttr_status NOT IN('RETURNED') order by sttr_id ASC";
                                       }
                                       //
                                       //
                                       $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
                                       $noOf = mysqli_num_rows($resSlPrItemDetails);
                                       $noOfRows = mysqli_num_rows($resSlPrItemDetails);   //ADD FOR COUNT ROWS AUTHOR: DIKSHA 28NOV2018
                                   }

                                   //  echo '$qSelSlPrItemDetails **==** ' . $qSelSlPrItemDetails . '<br /><br /><br />';

                                   $slPrindicator = array();
                                   $slPrItemValforpaymentpanel = 0;
                                   $SrNo = 1;
                                   $totalOthChgs = 0; // Added for Other Charges by @Author:PRIYANKA-12OCT2018
                                   //ADD FOR SHOW TOTAL GSWT, NTWT & FNWT AUTHOR: DIKSHA 28NOV2018
                                   $totalItemGSW = 0;
                                   $totalItemGSWS = 0; //for silver Gswt Author:DIKSHA 18APRIL2019
                                   $totalItemNTW = 0;
                                   $totalFfnWt = 0;
                                   $totalGoldFfnWt = 0;
                                   $totalSilverFfnWt = 0;
                                   $totalGoldQty = 0;
                                   $totalSlverQTY = 0;
                                   $totalCounter = 1;
                                   $totalColumns = 0;
                                   $totalQTY = 0;
                                   $TotGsWt = 0;
                                   $goldTotGsWt = 0;
                                   $silverTotGsWt = 0;
                                   $TotVal = 0;
                                   ?>
<?php
            $fieldName = 'sNo';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemSNoLb = $label_field_check;
//
            $fieldName = 'itemId';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemIdLb = $label_field_check;
//
            $fieldName = 'design';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $design = $label_field_check;
//
            $fieldName = 'itemDesc';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemDescLb = $label_field_check;
//
            $fieldName = 'brandName';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $brandName = $label_field_check;
//
            $fieldName = 'hallMarkUid';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $hallMarkUid = $label_field_check;
//            echo '$hallMarkUid=='.$hallMarkUid.'<br>';
//
            $fieldName = 'totalQty';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//
            $fieldName = 'itemGsWt';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemGsWt = $label_field_check;
//
            $fieldName = 'itemNtWt';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemNtWt = $label_field_check;
            
             $fieldName = 'labour';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $labour = $label_field_check;
            
             $fieldName = 'mkg_chrg_val';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $mkg_chrg_val = $label_field_check;
            
             $fieldName = 'itemPurity';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemPurity = $label_field_check;
            
             $fieldName = 'QTY';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $QtyLb = $label_field_check;
//
            $fieldName = 'QTYLB';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $Qty = $label_field_check;
            
            $fieldName = 'metal_val';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $metal_val = $label_field_check;
            
             $fieldName = 'vat';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $vat = $label_field_check;
            
             $fieldName = 'vatAmt';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $vatAmt = $label_field_check;
            
             $fieldName = 'amt';
            $label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $amt = $label_field_check;
            
            
             $fieldName = 'itemFixedMrpPrice';
            //$label_field_check = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemFixedMrpPrice = $label_field_check;
            
      
            
//

                                if ($itemWtTypeCheck == 'true') {
                                    $iWtType = 'GM';
                                }
                                ?>
                                            
<table class="invoicecenter" width="100%" style="border:0;">
         <tr>
            <td>
                     
                <table style="width:100%;margin:auto;" class="billing-table">

                    <tr class="table-head">
                                      <?php
        $fieldName = 'sNo';
        $label_field_check = '';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $totalColumns++;
            $fieldName = 'itemSNoLb';
            $srNoPresent = 'Y';
            $label_field_content = '';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>
                        <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $label_field_content; ?></th> 
                    <?php } ?>
                        <?php
                    $fieldName = 'itemId';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));

                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'itemIdLb';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>
                        <th align="left" style="padding-left: 5px; font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?></th>
                    <?php
                    }
                    $fieldName = 'itemDesc';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'itemDescLb';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>
                        <th align="left" style="font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?></th>
                        <?php
                    }?>
                        <?php 
                         $fieldName = 'QTY';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'QTYLb';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>
                        <th align="right" style="font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?></th>
                        <?php
                    }?>
                        <?php
                    $fieldName = 'itemGsWt';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'itemGsWtLb';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>
                        <th align="right" style="font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?></th>
                        <?php
                    }
                    $fieldName = 'itemPurity';
                    $label_field_content = '';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'itemPurityLb';
                        echo parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//            echo "SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
                        ?>
                        <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?></th> 
                        <?php }
                    ?>
                    <?php
                    $fieldName = 'itemNtWt';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'itemNtWtLb';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>
                        <th align="right" style="font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?></th>
                        <?php }
                    ?>
                         <?php
                    $fieldName = 'labour';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'labourLb';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>
                        <th align="right" style="font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?></th>
                        <?php }
                    ?>
                        <?php
                    $fieldName = 'mkg_chrg_val';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'mkg_lb';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>
                        <th align="right" style="font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?></th>
                        <?php }
                    ?>
                    <?Php
                    $fieldName = 'metal_val';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'metal_vallb';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//            echo '$label_field_content=='.$label_field_content.'<br>';
                        ?>
                        <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?></th> 
                        <?php }
                    ?>

                    <?Php
                    $fieldName = 'vat';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'vatLb';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//            echo '$label_field_content=='.$label_field_content.'<br>';
                        ?>
                        <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?></th> 
                        <?php }
                    ?>
                    <?Php
                    $fieldName = 'vatAmt';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'vatAmtLb';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//            echo '$label_field_content=='.$label_field_content.'<br>';
                        ?>
                        <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?></th> 
                        <?php }
                    ?>
                    <?Php
                    $fieldName = 'amt';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'amtLb';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//            echo '$label_field_content=='.$label_field_content.'<br>';
                        ?>
                        <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?></th> 
                        <?php }
                    ?>
                      </tr>

     
                      <tbody class="table-innerSec table_main">
<?php
                                   while ($rowSlPrItemDetails = mysqli_fetch_array($resSlPrItemDetails)) {
                                       $slPrId = $rowSlPrItemDetails['sttr_id'];
                                       $slPrItemId = $rowSlPrItemDetails['sttr_item_pre_id'] . ' ' . $rowSlPrItemDetails['sttr_item_id'];
                                       $slPrMetalType = $rowSlPrItemDetails['sttr_metal_type'];
                                       $slPrItemName = $rowSlPrItemDetails['sttr_item_name'];
                                       $slPrItemCategory = $rowSlPrItemDetails['sttr_item_category'];  //ADDED ITEM CATEGORY @25NOV2022
                                       $slPrItemQty = $rowSlPrItemDetails['sttr_quantity'];
                                       $slPrItemGSW = $rowSlPrItemDetails['sttr_gs_weight'] . ' ' . $rowSlPrItemDetails['sttr_gs_weight_type'];

//
//                                       $fieldName = 'itemWtType';
//                                       parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                       $itemWtTypeCheck = $itemWtType_check;

                                       if ($itemWtTypeCheck == 'true') {
                                           $pktWtType = $rowSlPrItemDetails['sttr_pkt_weight_type'];
//                                           $ntWtType = $rowSlPrItemDetails['sttr_nt_weight_type'];
                                           $fnWtType = $rowSlPrItemDetails['sttr_nt_weight_type'];
                                       }
                                       //
                                       $slPrItemPKTW = $rowSlPrItemDetails['sttr_pkt_weight'] . ' ' . $pktWtType; //add code for pkt wt Author:SANT08APR17
                                       $slPrItemNTW = $rowSlPrItemDetails['sttr_nt_weight'] . ' ' . $rowSlPrItemDetails['sttr_nt_weight_type'];
                                       $slprFfnWt = $rowSlPrItemDetails['sttr_final_fine_weight'] . ' ' . $fnWtType;
                                       $slPrMetalRate = $rowSlPrItemDetails['sttr_metal_rate'];
                                       $slPrPurchaseRate = $rowSlPrItemDetails['sttr_sell_rate'];
                                       $sttr_metal_discount_amt = $rowSlPrItemDetails['sttr_metal_discount_amt'];
                                       $sttr_mkg_discount_amt = $rowSlPrItemDetails['sttr_mkg_discount_amt'];
                                       $sttr_metal_discount_per = $rowSlPrItemDetails['sttr_metal_discount_per'];
                                       $sttr_mkg_discount_per = $rowSlPrItemDetails['sttr_mkg_discount_per'];
                                       $sttr_stone_discount_amt = $rowSlPrItemDetails['sttr_stone_discount_amt'];
                                       $sttr_stone_discount_per = $rowSlPrItemDetails['sttr_stone_discount_per'];
                                       $slPrindicator = $rowSlPrItemDetails['sttr_indicator']; // change column name for crystal rate @ratnakar 05MAR2018
                                       $slPrMetalPutity = $rowSlPrItemDetails['sttr_purity'];
                                       $slPrMetalFinalPutity = $rowSlPrItemDetails['sttr_final_purity'];
                                       $slPrWastage = $rowSlPrItemDetails['sttr_wastage'];
                                       $slcustPrWastage = $rowSlPrItemDetails['sttr_cust_wastage'];
                                       $slPrItemVal = $rowSlPrItemDetails['sttr_valuation'];                               
                                       // FOR MRP FIXED PRICE
                                       if ($rowSlPrItemDetails['sttr_fixed_price_status'] == 'TRUE') {
                                           if ($rowSlPrItemDetails['sttr_cust_price'] > 0) {
                                               $slPrItemFinVal = $rowSlPrItemDetails['sttr_cust_price'];
                                           } else {
                                               $slPrItemFinVal = $rowSlPrItemDetails['sttr_final_valuation'];                                            
                                           }
                                       } else {
                                           $slPrItemFinVal = $rowSlPrItemDetails['sttr_final_valuation'];
                                       }                               
                                       $sttrFixedPriceStatus = $rowSlPrItemDetails['sttr_fixed_price_status'];
                                       //                                                                         
                                       $slPrItemLabChargs = $rowSlPrItemDetails['sttr_making_charges'];
                                       $stone_valuation = $rowSlPrItemDetails['sttr_stone_valuation'];
                                       $sttr_total_making_amt = $rowSlPrItemDetails['sttr_total_making_amt'];
                                       $sttr_metal_amt = $rowSlPrItemDetails['sttr_metal_amt'];
                                       $sttr_stone_amt = $rowSlPrItemDetails['sttr_stone_amt'];
                                       $slPrItemLabChrgsType = $rowSlPrItemDetails['sttr_making_charges_type'];
                                       $slPrItemValueAdded = $rowSlPrItemDetails['sttr_value_add'];
                                       $totalFinalBalance += $slPrItemFinVal;             
                                       $valueByWeight = ($rowSlPrItemDetails['sttr_final_purity'] - 100) / 100;
                                       $slpr_value_added = $rowSlPrItemDetails['sttr_value_added'];
                                       $slPrItemLabourChgsBy = $rowSlPrItemDetails['sttr_other_charges_by'];
                                       $slPrItemWtBy = $rowSlPrItemDetails['sttr_final_valuation_by'];
                                       $slPrCryValuation = $rowSlPrItemDetails['sttr_stone_valuation'];
                                       $sttrIndicator = $rowSlPrItemDetails['sttr_indicator'];
                                       $slPrItemLabChargsVal = $rowSlPrItemDetails['sttr_total_lab_charges'];
                                       $slPrItemLabType = $rowSlPrItemDetails['sttr_lab_charges_type'];
                                       $slPrItemHSN = $rowSlPrItemDetails['sttr_hsn_no'];
                                       $slPrItmCode = $rowSlPrItemDetails['sttr_item_code'];
                                       $sltranstype = $rowSlPrItemDetails['sttr_transaction_type'];
                                       $slPrHallMark = $rowSlPrItemDetails['sttr_hallmark_uid'];
                                       $sttr_cust_price = $rowSlPrItemDetails['sttr_cust_price'];
                                       $mkgBeforeDisPer = $rowSlPrItemDetails['sttr_mkg_discount_per'];
                                       $mkgBeforeDisAmt = $rowSlPrItemDetails['sttr_mkg_discount_amt'];
                                       $stDisPer = $rowSlPrItemDetails['sttr_stone_discount_per'];
                                       $stDisAmt = $rowSlPrItemDetails['sttr_stone_discount_amt'];
                                       $stStoneWtDetails = $rowSlPrItemDetails['sttr_stone_wt'] . ' ' . $rowSlPrItemDetails['sttr_stone_wt_type'];
                                       $sttr_tax = $rowSlPrItemDetails['sttr_tax'];
                                       // **********************************************************************************      
                                       // START TO ADD CODE FOR HALLMARKING CHARGES @AUTHOR:PRIYANKA-10JUNE2022
                                       // **********************************************************************************
                                       //
                                       $totalHallmarkCharges = $rowSlPrItemDetails['sttr_total_hallmark_charges'];
                                       //
                                       $sttr_hallmark_charges = $rowSlPrItemDetails['sttr_hallmark_charges'];
                                       $sttr_hallmark_charges_type = $rowSlPrItemDetails['sttr_hallmark_charges_type'];
                                       $sttr_total_hallmark_charges = $rowSlPrItemDetails['sttr_total_hallmark_charges'];
                                       //
                                       $sttr_hallmark_cgst_per = $rowSlPrItemDetails['sttr_hallmark_cgst_per'];
                                       $sttr_hallmark_cgst_amt = $rowSlPrItemDetails['sttr_hallmark_cgst_amt'];
                                       $sttr_hallmark_sgst_per = $rowSlPrItemDetails['sttr_hallmark_sgst_per'];
                                       $sttr_hallmark_sgst_amt = $rowSlPrItemDetails['sttr_hallmark_sgst_amt'];
                                       $sttr_hallmark_igst_per = $rowSlPrItemDetails['sttr_hallmark_igst_per'];
                                       $sttr_hallmark_igst_amt = $rowSlPrItemDetails['sttr_hallmark_igst_amt'];
                                       // 
                                       // **********************************************************************************
                                       // END TO ADD CODE FOR HALLMARKING CHARGES @AUTHOR:PRIYANKA-10JUNE2022
                                       // **********************************************************************************
                                       // ******************************************************************************************************
                                       // START CODE TO CALCULATE TOTAL OTHER CHARGES @PRIYANKA-12OCT2018
                                       // ******************************************************************************************************
                                       $OtherCharges = $rowSlPrItemDetails['sttr_other_charges']; // OTHER CHARGES
                                       $sttr_other_info = $rowSlPrItemDetails['sttr_other_info']; // OTHER INFO
                                       $OtherChargesType = $rowSlPrItemDetails['sttr_other_charges_type']; // OTHER CHARGES TYPE
                                       $OtherChargesBy = $rowSlPrItemDetails['sttr_nt_weight']; // OTHER CHARGES BY NET WEIGHT
                                       $otherWeightType = $rowSlPrItemDetails['sttr_nt_weight_type']; // NET WEIGHT TYPE
                                       $totalOtherCharges = 0;                              
                                       //
                                       //
                                       if ($slPrHallMark != '' && $slPrHallMark != NULL) {
                                           $hallMark = 'yes';
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
                                       //
                                       //ON TODTAL MAKING CHARGE CGST,SGST,IGST
                                       //TOTAL WEIGHT OF GSWT, NTWT & FNWT AUTHOR: DIKSHA 28NOV2018
                                       $slcustwastagewt = $rowSlPrItemDetails['sttr_cust_wastage_wt'];
                                       $slTax = $rowSlPrItemDetails['sttr_tot_tax'];

                                       // ADDED CODE FOR PRODUCT RATE (OMUNIM 3.0.0 RELEASE) @AUTHOR:PRIYANKA-17SEP2019
                                       if ($slPrMetalRate == '' || $slPrMetalRate == NULL) {
                                           //
                                           if ($rowSlPrItemDetails['sttr_product_purchase_rate'] != '' &&
                                                   $rowSlPrItemDetails['sttr_product_purchase_rate'] != NULL) {
                                               //
                                               $slPrMetalRate = $rowSlPrItemDetails['sttr_product_purchase_rate'];
                                               //
                                           }
                                           //
                                       }
                                       //
                                       /* START CODE TO GET ITEM RETURN DETAILS FOR HIGHLIGHTING IF IT IS RETURNED@AUTHOR:MADHUREE-03MAR2020 */
                                       //echo '$invName : ' . $invName;
                                       if ($invName != 'ItemReturn') {
                                           $itemReturnedPresent = noOfRowsCheck('sttr_id', 'stock_transaction', "sttr_item_code='$slPrItmCode' AND sttr_transaction_type='ItemReturn'");
                                           //echo '$itemReturnedPresent : ' . $itemReturnedPresent;
                                       }
                                       /* END CODE TO GET ITEM RETURN DETAILS FOR HIGHLIGHTING IF IT IS RETURNED@AUTHOR:MADHUREE-03MAR2020 */
                                       //
                                       $productSize = $rowSlPrItemDetails['sttr_size'];

                                       if ($slPrPurchaseRate == '' || $slPrPurchaseRate == NULL) {
                                           //
                                           if ($rowSlPrItemDetails['sttr_product_sell_rate'] != '' &&
                                                   $rowSlPrItemDetails['sttr_product_sell_rate'] != NULL) {
                                               //
                                               $slPrPurchaseRate = $rowSlPrItemDetails['sttr_product_sell_rate'];
                                               //
                                           }
                                           //
                                       }
                                       if ($slPrItemQty > 0) {
                                           $slUnitPrice = $slPrItemVal / $slPrItemQty;
                                       } else {
                                           $slUnitPrice = $slPrItemVal;
                                       }
                                       if ($slPrindicator != 'stockCrystal') {
                                           $totalQTY += $slPrItemQty;
                                           $TotGsWt += getTotalWeight($rowSlPrItemDetails['sttr_gs_weight'], $rowSlPrItemDetails['sttr_gs_weight_type'], 'weight');
                                           $TotVal += $rowSlPrItemDetails['sttr_valuation'];
                                       }
                                       if ($slPrMetalType == 'Gold' || $slPrMetalType == 'GOLD' || $slPrMetalType == 'gold') {     //for Gold Gswt total Author:DIKSHA 18APRIL2019
                                           $totalItemGSW += $slPrItemGSW;
                                           $totalGoldFfnWt += $slprFfnWt;
                                           $totalGoldQty += $slPrItemQty;
                                           $goldTotGsWt += getTotalWeight($rowSlPrItemDetails['sttr_gs_weight'], $rowSlPrItemDetails['sttr_gs_weight_type'], 'weight');
                                           $goldTotNetWt += getTotalWeight($rowSlPrItemDetails['sttr_nt_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight');                                   
                                           $goldTotalVal += $rowSlPrItemDetails['sttr_valuation'] + $sttr_total_making_amt + $slPrCryValuation + $sttr_hallmark_charges;
                                          if ($rowSlPrItemDetails['sttr_fixed_price_status'] == 'TRUE') {
                                               if ($rowSlPrItemDetails['sttr_cust_price'] > 0) {
                                                   $goldFinalAmt += $rowSlPrItemDetails['sttr_cust_price'];
                                               } else {
                                                   $goldFinalAmt += $rowSlPrItemDetails['sttr_final_valuation'];
                                               }
                                           }
                                           $goldMkgChrg += $sttr_total_making_amt;
                                           $goldMetalAmt += $sttr_metal_amt;
                                           $goldPresent = 'yes';
                                           $goldFixedPrice += $sttr_cust_price;
                                           $vatGoldTotAmt += $slTax;                                           
                                       }                            
                                       if ($slPrMetalType == 'Silver' || $slPrMetalType == 'SILVER' || $slPrMetalType == 'silver') {    //for silver Gswt total Author:DIKSHA 18APRIL2019
                                           $totalItemGSWS += $slPrItemGSW;
                                           $totalSilverFfnWt += $slprFfnWt;
                                           $totalSlverQTY += $slPrItemQty;
                                           $silverTotGsWt += getTotalWeight($rowSlPrItemDetails['sttr_gs_weight'], $rowSlPrItemDetails['sttr_gs_weight_type'], 'weight');
                                           $silverTotNetWt += getTotalWeight($rowSlPrItemDetails['sttr_nt_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight');
                                           $silverTotalVal += $rowSlPrItemDetails['sttr_valuation'] + $sttr_total_making_amt + $slPrCryValuation + $sttr_hallmark_charges;
                                            $vatSilverTotAmt += $slTax;
                                           //$silverFinalAmt += $rowSlPrItemDetails['sttr_final_valuation'];
                                           if ($rowSlPrItemDetails['sttr_fixed_price_status'] == 'TRUE') {
                                               if ($rowSlPrItemDetails['sttr_cust_price'] > 0) {
                                                   $silverFinalAmt += $rowSlPrItemDetails['sttr_cust_price'];
                                               } else {
                                                   $silverFinalAmt += $rowSlPrItemDetails['sttr_final_valuation'];
                                               }
                                           }
                                           $silverMkgChrg += $sttr_total_making_amt;
                                           $silverMetalAmt += $sttr_metal_amt;
                                           $silverPresent = 'yes';
                                           $silverFixedPrice += $sttr_cust_price;                                            
                                       }
                                       if ($slPrindicator != 'stockCrystal') {
                                           $GswtType = $rowSlPrItemDetails['sttr_gs_weight_type'];
                                           $totalItemNTW += $slPrItemNTW;
                                           $totalFfnWt += $slprFfnWt;
                                           $prodBarcode = $rowSlPrItemDetails['sttr_barcode_prefix'] . $rowSlPrItemDetails['sttr_barcode'];
                                           $prodHallmarkUid = $rowSlPrItemDetails['sttr_hallmark_uid'];                                          
                                       }                                       
                                       // $finalSilverTotAmt += $silverTotalVal;                                        
                                       $sttr_valuation = $rowSlPrItemDetails['sttr_valuation'];
                                       $sttr_mkg_cgst_per = $rowSlPrItemDetails['sttr_mkg_cgst_per'];
                                       $sttr_mkg_cgst_chrg = $rowSlPrItemDetails['sttr_mkg_cgst_chrg'];
                                       $sttr_mkg_sgst_per = $rowSlPrItemDetails['sttr_mkg_sgst_per'];
                                       $sttr_mkg_sgst_chrg = $rowSlPrItemDetails['sttr_mkg_sgst_chrg'];
                                       $sttr_mkg_igst_per = $rowSlPrItemDetails['sttr_mkg_igst_per'];
                                       $sttr_mkg_igst_chrg = $rowSlPrItemDetails['sttr_mkg_igst_chrg'];
                                       //
                                       // ON TOTAL PRICE CGST,SGST,IGST
                                       $sttr_tot_price_cgst_per = $rowSlPrItemDetails['sttr_tot_price_cgst_per'];
                                       $sttr_tot_price_cgst_chrg = $rowSlPrItemDetails['sttr_tot_price_cgst_chrg'];
                                       $sttr_tot_price_sgst_per = $rowSlPrItemDetails['sttr_tot_price_sgst_per'];
                                       $sttr_tot_price_sgst_chrg = $rowSlPrItemDetails['sttr_tot_price_sgst_chrg'];
                                       $sttr_tot_price_igst_per = $rowSlPrItemDetails['sttr_tot_price_igst_per'];
                                       $sttr_tot_price_igst_chrg = $rowSlPrItemDetails['sttr_tot_price_igst_chrg'];
                                       $sttr_total_making_charges = $rowSlPrItemDetails['sttr_total_making_charges'];
                                       $sttr_making_charges = $rowSlPrItemDetails['sttr_making_charges'];
                                       $sttr_making_charges_type = $rowSlPrItemDetails['sttr_making_charges_type'];
                                       $sttr_total_cust_price = $rowSlPrItemDetails['sttr_total_cust_price'];
                                       //
                                       $sttr_item_other_info = $rowSlPrItemDetails['sttr_item_other_info'];
                                       //
                                       //
                                       if ($rowSlPrItemDetails['sttr_cust_wastage_wt'] != '' && $rowSlPrItemDetails['sttr_cust_wastage_wt'] != NULL) {
                                           $slPrItemProcessWeightNew = decimalVal($rowSlPrItemDetails['sttr_cust_wastage_wt'], 3);
                                           $slPrItemProcessW = decimalVal($rowSlPrItemDetails['sttr_cust_wastage_wt'], 3) . ' ' . $rowSlPrItemDetails['sttr_nt_weight_type'];
                                       } else {
                                           $slPrItemProcessWeightNew = decimalVal($rowSlPrItemDetails['sttr_final_fine_weight'] - $rowSlPrItemDetails['sttr_nt_weight'], 3);
                                           $slPrItemProcessW = $slPrItemProcessWeightNew . ' ' . $rowSlPrItemDetails['sttr_nt_weight_type'];
                                       }  
                                       if ($slPrItemWtBy == 'byNetWt') {
                                           $wt = $rowSlPrItemDetails['sttr_nt_weight'];
                                           $wtType = $rowSlPrItemDetails['sttr_nt_weight_type'];
                                       } else if ($slPrItemWtBy == 'byGrossWt') {
                                           $wt = $rowSlPrItemDetails['sttr_gs_weight'];
                                           $wtType = $rowSlPrItemDetails['sttr_gs_weight_type'];
                                       }

                                       if ($slPrItemLabourChgsBy == 'lbByNetWt') {
                                           $slPrItemFFNW = $rowSlPrItemDetails['sttr_nt_weight'];
                                       } else if ($slPrItemLabourChgsBy == 'lbByGrossWt') {
                                           $slPrItemFFNW = $rowSlPrItemDetails['sttr_gs_weight'];
                                       } else {
                                           $slPrItemFFNW = $wt;
                                       }

                                       if ($utin_payment_mode == 'ByCash' && $sttrIndicator != 'stockCrystal') {
                                           $slPrItemCGSTTotalTaxChrg = $rowSlPrItemDetails['sttr_final_valuation'] * ($cgstChrg / 100);
                                           $slPrItemSGSTTotalTaxChrg = $rowSlPrItemDetails['sttr_final_valuation'] * ($sgstChrg / 100);
                                           $slPrItemIGSTTotalTaxChrg = $rowSlPrItemDetails['sttr_final_valuation'] * ($igstChrg / 100);
                                       }

                                       $slPrTotItemLabChrg = 0;
                                       if ($rowSlPrItemDetails['sttr_making_charges'] != '') {
                                           if ($rowSlPrItemDetails['sttr_making_charges_type'] == 'KG') {
                                               if ($wtType == 'KG')
                                                   $slPrTotItemLabChrg = $rowSlPrItemDetails['sttr_making_charges'] * $slPrItemFFNW;
                                               else if ($wtType == 'GM')
                                                   $slPrTotItemLabChrg = ($rowSlPrItemDetails['sttr_making_charges'] / 1000) * $slPrItemFFNW;
                                               else
                                                   $slPrTotItemLabChrg = ($rowSlPrItemDetails['sttr_making_charges'] / (1000 * 1000)) * $slPrItemFFNW;
                                           } else if ($rowSlPrItemDetails['sttr_making_charges_type'] == 'GM') {
                                               if ($wtType == 'KG')
                                                   $slPrTotItemLabChrg = $rowSlPrItemDetails['sttr_making_charges'] * 1000 * $slPrItemFFNW;
                                               else if ($wtType == 'GM')
                                                   $slPrTotItemLabChrg = $rowSlPrItemDetails['sttr_making_charges'] * $slPrItemFFNW;
                                               else
                                                   $slPrTotItemLabChrg = ($rowSlPrItemDetails['sttr_making_charges'] / 1000) * $slPrItemFFNW;
                                           } else if ($rowSlPrItemDetails['sttr_making_charges_type'] == 'MG') {
                                               if ($wtType == 'KG')
                                                   $slPrTotItemLabChrg = $rowSlPrItemDetails['sttr_making_charges'] * 1000 * 1000 * $slPrItemFFNW;
                                               else if ($wtType == 'GM')
                                                   $slPrTotItemLabChrg = $rowSlPrItemDetails['sttr_making_charges'] * 1000 * $slPrItemFFNW;
                                               else
                                                   $slPrTotItemLabChrg = $rowSlPrItemDetails['sttr_making_charges'] * $slPrItemFFNW;
                                           } else if ($rowSlPrItemDetails['sttr_making_charges_type'] == 'PP') {
                                               $slPrTotItemLabChrg = $rowSlPrItemDetails['sttr_making_charges'] * $rowSlPrItemDetails['sttr_quantity'];
                                           } else if ($rowSlPrItemDetails['sttr_making_charges_type'] == 'per') {
                                               $gsWt = $rowSlPrItemDetails['sttr_gs_weight'];
                                               $gsWtTyp = $rowSlPrItemDetails['sttr_gs_weight_type'];
                                               $labNOthCharges = ($rowSlPrItemDetails['sttr_making_charges'] * $gsWt) / 100;
                                               if ($slPrItemMetal == 'Gold') {
                                                   if ($gsWtTyp == 'KG') {
                                                       $slPrTotItemLabChrg = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) * 100);
                                                   } else if ($gsWtTyp == 'GM') {
                                                       $slPrTotItemLabChrg = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / 10);
                                                   } else if ($gsWtTyp == 'MG') {
                                                       $slPrTotItemLabChrg = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / (100 * 100));
                                                   }
                                               } else if ($slPrItemMetal == 'Silver') {
                                                   if ($gsWtTyp == 'KG') {
                                                       $slPrTotItemLabChrg = ($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']);
                                                   } else if ($gsWtTyp == 'GM') {
                                                       $slPrTotItemLabChrg = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / 1000);
                                                   } else if ($gsWtTyp == 'MG') {
                                                       $slPrTotItemLabChrg = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / (1000 * 1000) );
                                                   }
                                               }
                                           }
                                           //
                                           // ================================================================================================== //
                                           // START CODE TO CALCULATE MAKING CHARGES AFTER DISCOUNT IN PERCENTAGE & GM @AUTHOR:MADHUREE-02AUGUST //
                                           // ================================================================================================== //
                                           //
                                           $itemMetalType = $rowSlPrItemDetails['sttr_metal_type'];
                                           $itemMetalValution = $rowSlPrItemDetails['sttr_valuation'];
                                           $itemsQTY = $rowSlPrItemDetails['sttr_quantity'];
                                           $itemGSW = $rowSlPrItemDetails['sttr_gs_weight'];
                                           $itemGSWT = $rowSlPrItemDetails['sttr_gs_weight_type'];
                                           $newItemNTW = $rowSlPrItemDetails['sttr_nt_weight'];
                                           $itemFNWT = $rowSlPrItemDetails['sttr_fine_weight'];
                                           $itemFFNWT = $rowSlPrItemDetails['sttr_final_fine_weight'];
                                           $itemMkChrgBy = $rowSlPrItemDetails['sttr_mkg_charges_by'];
                                           $itemCustLabChrg = $rowSlPrItemDetails['sttr_making_charges'];
                                           $itemCustLabChrgT = $rowSlPrItemDetails['sttr_making_charges_type'];
                                           $itemCustLabChrgDiscAmt = $rowSlPrItemDetails['sttr_mkg_discount_amt'];
                                           //
                                           if ($itemMkChrgBy == 'mkgByGrossWt') {
                                               $itemWeight = $itemGSW;
                                           } else if ($itemMkChrgBy == 'mkgByNetWt') {
                                               $itemWeight = $newItemNTW;
                                           } else if ($itemMkChrgBy == 'mkgByFineWt') {
                                               $itemWeight = $itemFNWT;
                                           } else if ($itemMkChrgBy == 'mkgByFFineWt') {
                                               $itemWeight = $itemFFNWT;
                                           } else {
                                               $itemWeight = $itemFFNWT;
                                           }
                                           //
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
                                       }
                                       //
                                       // ================================================================================================== //
                                       // END CODE TO CALCULATE MAKING CHARGES AFTER DISCOUNT IN PERCENTAGE & GM @AUTHOR:MADHUREE-02AUGUST //
                                       // ================================================================================================== //
                                       //
                                       
                                       //echo '$OtherCharges @@##== '.$OtherCharges.'<br />';
                                       //echo '$OtherChargesType @@##== ' . $OtherChargesType . '<br />';
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

                                       // ******************************************************************************************************
                                       // END CODE TO CALCULATE TOTAL OTHER CHARGES @PRIYANKA-12OCT2018
                                       // ******************************************************************************************************
                                       //echo '$totalOtherCharges @@== '.$totalOtherCharges.'<br />';

                                       $slPrItemTotalTaxChrg = (($rowSlPrItemDetails['sttr_valuation'] + $slPrItemLabChargsVal + $slpr_value_added) * $rowSlPrItemDetails['sttr_tax'] / 100);
                                       parse_str(getTableValues("SELECT met_rate_tax_check,met_rate_tax_percentage FROM metal_rates WHERE met_rate_own_id = '$_SESSION[sessionOwnerId]' AND met_rate_value = '$slPrMetalRate' AND met_rate_metal_name = '$slPrMetalType'"));

                                       if ($met_rate_tax_check == 'true') {
                                           $rateWithTaxVal = $rowSlPrItemDetails['sttr_valuation'] * ($met_rate_tax_percentage / 100);
                                           $slPrItemTotalTaxChrg -= $rateWithTaxVal;
                                       }

                                       if ($rowSlPrItemDetails['sttr_metal_type'] == 'Gold') {
                                           $goldTotFFineWt1 += getTotalWeight($rowSlPrItemDetails['sttr_final_fine_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight');
                                           $goldTotFFineWt += getTotalWeight($rowSlPrItemDetails['sttr_gs_weight'], $rowSlPrItemDetails['sttr_gs_weight_type'], 'weight');
                                           $goldTotFFineWtType = 'GM';

                                           $goldRate = $rowSlPrItemDetails['sttr_metal_rate'];
                                           $otherGoldCharges = $slPrItemTotalTaxChrg + $slPrTotItemLabChrg + $slpr_value_added;

                                           $totalOthGdChgs += $otherGoldCharges;
                                       }

                                       if ($rowSlPrItemDetails['sttr_metal_type'] == 'Silver') {
                                           $silverTotFFineWt1 += getTotalWeight($rowSlPrItemDetails['sttr_final_fine_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight');
                                           $silverTotFFineWt += getTotalWeight($rowSlPrItemDetails['sttr_gs_weight'], $rowSlPrItemDetails['sttr_gs_weight_type'], 'weight');
                                           $silverTotFFineWtType = 'GM';

                                           $silverRate = $rowSlPrItemDetails['sttr_metal_rate'];
                                           $otherSilverCharges = $slPrItemTotalTaxChrg + $slPrTotItemLabChrg + $slpr_value_added;
                                           $totalOthSlChgs += $otherSilverCharges;
                                       }

//                                           echo '$rowSlPrItemDetails'.$rowSlPrItemDetails['sttr_metal_type'];
//                                           if ($rowSlPrItemDetails['sttr_metal_type'] == 'crystal' || $rowSlPrItemDetails['sttr_metal_type'] == 'Crystal' || $rowSlPrItemDetails['sttr_metal_type'] == 'CRYSTAL') {
//                                               
//                                           }

                                       $totalCrystalVal += $slPrCryValuation;
                                       $crystalValuation = $totalCrystalVal;

                                       $itemMetalRate = $rowSlPrItemDetails['sttr_metal_rate'];

                                       if ($otherChgsBy == 'byWt') {
                                           if ($rowSlPrItemDetails['sttr_metal_type'] == 'Gold') {
                                               if ($goldTotFFineWtType == 'KG') {
                                                   $othChgsGdFnWt = ($totalOthGdChgs) / (100 * $itemMetalRate);
                                               } else if ($goldTotFFineWtType == 'GM') {
                                                   $othChgsGdFnWt = (($totalOthGdChgs) * 10) / $itemMetalRate;
                                               } else if ($goldTotFFineWtType == 'MG') {
                                                   $othChgsGdFnWt = (($totalOthGdChgs) * 10000) / $itemMetalRate;
                                               }
                                           }
                                           if ($rowSlPrItemDetails['sttr_metal_type'] == 'Silver') {
                                               if ($silverTotFFineWtType == 'KG') {
                                                   $othChgsSlFnWt = ($totalOthSlChgs) / ($itemMetalRate);
                                               } else if ($silverTotFFineWtType == 'GM') {
                                                   $othChgsSlFnWt = (($totalOthSlChgs) * 1000) / $itemMetalRate;
                                               } else if ($silverTotFFineWtType == 'MG') {
                                                   $othChgsSlFnWt = (($totalOthSlChgs) * (1000 * 1000)) / $itemMetalRate;
                                               }
                                           }
                                       }


                                       //
                                       $totFinGdWt = om_round(($othChgsGdFnWt + $goldTotFFineWt1), 3);
                                       $totFinSlWt = om_round(($othChgsSlFnWt + $silverTotFFineWt1), 3);
                                       $totFinStWt = om_round($crystalTotFFineWt1, 3);
                                       //
                                       $qSelCrystalDet = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                                               . "AND sttr_sttr_id = '$slPrId' AND sttr_indicator = 'stockCrystal' ORDER BY sttr_id asc";
                                       //
                                       $resCrystalDet = mysqli_query($conn, $qSelCrystalDet);
                                       $noOfCry = mysqli_num_rows($resCrystalDet);
                                       if ($noOfCry > 0) {
                                           while ($rescrystal = mysqli_fetch_array($resCrystalDet)) {
                                               $crystalTotFFineWt1 += $rescrystal['sttr_gs_weight'] . ' ' . $rescrystal['sttr_gs_weight_type'];
//                                               echo '$crystalTotFFineWt1='.$crystalTotFFineWt1;
                                               $crystalTotFFineWt += getTotalWeight($rescrystal['sttr_gs_weight'], $rescrystal['sttr_gs_weight_type'], 'weight');
//                                               echo '$crystalTotFFineWt='.$crystalTotFFineWt;
                                               $crystalTotFFineWtType = 'CT';
                                               $crystalRate = $rescrystal['sttr_metal_rate'];
                                               $otherCrystalCharges = $slPrItemTotalTaxChrg + $slPrTotItemLabChrg + $slpr_value_added;
                                               $totalOthStChgs += $otherCrystalCharges;
                                               //
                                               $totFinStWt = om_round($crystalTotFFineWt1, 3);
                                           }
                                       }
                                       //
                                       if ($counter == 1) {
                                           if ($qRowSlrn > 0) {
                                               ?>
                                            <tr> 
                                                <td valign="middle" align="center" colspan="<?php echo $colspan; ?>">
                                                    <div class="ff_arial fs_14  reddish padBott3" onClick="this.contentEditable = 'true';">ORIGINAL INVOICE</div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }

                                    // START CODE TO GET FINAL DISCOUNT AMT AND FINAL AMOUNT WITHOUT DISCOUNT @AUTHOR:SHRI24OCT19
                                    if ($slPrindicator != 'stockCrystal') {
                                        $totalItemValuation = 0;
                                        $totalItemDiscountAmt = 0;
                                        $qSelSlPrTotAmtDetails = "SELECT SUM(sttr_stone_amt) as crystalAmt,SUM(sttr_metal_amt) as metalAmt,SUM(sttr_total_making_charges) as makingCharges, SUM(sttr_mkg_discount_amt) as makingDiscAmt, "
                                                . " SUM(sttr_stone_discount_amt) as crystalDiscAmt,SUM(sttr_metal_discount_amt) as metalDiscAmt,"
                                                . " SUM(sttr_mkg_cgst_chrg) as mkgCgstAmt,SUM(sttr_mkg_sgst_chrg) as mkgSgstAmt,SUM(sttr_mkg_igst_chrg) as mkgIgstAmt,"
                                                . " SUM(sttr_tot_price_cgst_chrg) as totPriceCgstAmt,SUM(sttr_tot_price_sgst_chrg) as totPriceSgstAmt,SUM(sttr_tot_price_igst_chrg) as totPriceIgstAmt FROM stock_transaction where (sttr_id='$slPrId' OR sttr_sttr_id='$slPrId') and sttr_owner_id='$sessionOwnerId'";

                                        $resSlPrTotAmtDetails = mysqli_query($conn, $qSelSlPrTotAmtDetails);
                                        $totAmtNoOfRows = mysqli_num_rows($resSlPrTotAmtDetails);
                                        $rowSlPrTotAmtDetails = mysqli_fetch_array($resSlPrTotAmtDetails);

                                        if ($totAmtNoOfRows > 0) {
                                            $totalItemDiscountAmt = $rowSlPrTotAmtDetails['crystalDiscAmt'] + $rowSlPrTotAmtDetails['metalDiscAmt'] + $rowSlPrTotAmtDetails['makingDiscAmt'];
                                            $totalItemValuation = $rowSlPrTotAmtDetails['crystalAmt'] + $rowSlPrTotAmtDetails['metalAmt'] + $rowSlPrTotAmtDetails['makingCharges'] + $rowSlPrTotAmtDetails['makingDiscAmt'] +
                                                    $rowSlPrTotAmtDetails['mkgCgstAmt'] + $rowSlPrTotAmtDetails['mkgSgstAmt'] + $rowSlPrTotAmtDetails['mkgIgstAmt'] +
                                                    $rowSlPrTotAmtDetails['totPriceCgstAmt'] + $rowSlPrTotAmtDetails['totPriceSgstAmt'] + $rowSlPrTotAmtDetails['totPriceIgstAmt'];
                                        }
                                    }
                                    // END CODE TO GET FINAL DISCOUNT AMT AND FINAL AMOUNT WITHOUT DISCOUNT @AUTHOR:SHRI24OCT19
                                    // 
                                    //include 'ogspindtRight.php';

                                    
                                        include 'omspinvnewtaxRetailWholesaleTblRight.php';
                                    

                                    if ($slPrindicator != 'stockCrystal') {
                                        $slPrItemValforpaymentpanel = $slPrItemValforpaymentpanel + $slPrItemVal;
                                        $totaItemslFinalBalance += ($sttr_valuation + $sttr_total_making_charges + $slPrCryValuation); // get items final valuation  @AUTHOR:SHRI05OCT19
                                    }

                                    if ($slPrindicator != 'stockCrystal') {
                                        $SrNo++;
                                    }
                                    $totalCounter++;
                                    $counter++;
                                }
                                
                                ?>
                                            <?php
                        $fieldName = 'totalMetalLb';
                        parse_str(getTableValues("SELECT label_field_check,label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $totalMetalLb = $label_field_check;
                        $totalMetalLbVal = $label_field_content;
                        //
                        $fieldName = 'totalGsWt';
                        parse_str(getTableValues("SELECT label_field_check AS totalGsWtCheck FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $fieldName = 'totalNtwt';
                        parse_str(getTableValues("SELECT label_field_check AS totalFnWtCheck FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($goldPresent == 'yes') {
                   ?>
                                            <tr class="total-bottom"> 
                            <?php
                            $totaColspan = '';
                            ?>
                            <?php
                            if ($itemSNoLb == 'true') {
                                $totaColspan += 1;
                            }
                            if ($itemIdLb == 'true' && $sellEstimateDetails != 'NO') {
                                $totaColspan += 1;
                            }
                            if ($design == 'true' && $designpresent == 'yes') {
                                $totaColspan += 1;
                            }
                            if ($itemDescLb == 'true') {
                                $totaColspan += 1;
                            }
                            if ($brandName == 'true' && $brand == 'yes') {
                                $totaColspan += 1;
                            }
                            if ($hallMarkUid == 'true') {
                                $totaColspan += 1;
                            }
                            ?>
                            <td colspan="3" style="text-align:right">

                                <?php echo '<b>' . $totalMetalLbVal . "TOTIAL GOLD :"; ?>

                            </td>
                            <?php
                            $fieldName = 'totalQtyLb';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            $label_field_content = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $qtyLabelContent = $label_field_content;
                            $qtyLabelFontSize = $label_field_font_size;
                            $qtyLabelColor = $label_field_font_color;
                            //
                            $fieldName = 'totalQty';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $totalQtyLabelFeildCheck = $label_field_check;


                            if ($QtyLb == 'true') {
                                ?>
                                <td align="center" valign="top">                       
                                    <div class="paddingLeft5" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>;display: inline;">
                                    <?php
                                    if ($itemSNoLb != true && $itemIdLb != true && $design != true && $itemDescLb != true) {
                                        echo "GOLD :";
                                        ?>
                                    <?php } ?>
                                    <?php
                                    if ($totalQtyLabelFeildCheck == 'true') {
                                        echo $totalGoldQty;
                                    }
                                    ?>
                                <?php } ?>
                                <?php if ($unitPriceLb == 'true') { ?>
                                <td align="center" valign="top">
                                    <!--<div class="paddingLeft5" style ="font-size:<?php echo $qtyLabelFontSize; ?>px;color:<?php echo $qtyLabelColor; ?>;display: inline;">-->
                                    <?php
                                    if ($itemSNoLb != true && $itemIdLb != true && $design != true && $itemDescLb != true && $QtyLb != true) {
                                        echo "GOLD :";
                                        ?>
                                    <?php } ?>
                                    <!--</div>--> 
                                </td>
                            <?php } ?>
                            </td>
                            <?php
                            $fieldName = 'totalGsWtLb';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            $label_field_content = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $GsWtLabelContent = $label_field_content;
                            $GsWtLabelFontSize = $label_field_font_size;
                            $GsWtLabelColor = $label_field_font_color;
                            //
                            $fieldName = 'totalGsWt';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check "
                                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                                            . "label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $totalGsWtLabelFeildCheck = $label_field_check;

                            if ($itemGsWt == 'true') {
                                ?>
                                <td align="center" class="paddingRight5" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>;">                     
                                <?php } ?>
                                <?php
                                if ($totalGsWtLabelFeildCheck == 'true') {
                                    echo decimalVal($goldTotGsWt, 3) . ' ' . $iWtType;
                                }
                                ?>
                                <!--</div>-->
                            </td>
                       
                        <?php if ($itemPurity == 'true') {
                            ?>
                            <td> - </td>   
                        <?php } ?>
                        <?php
                        $fieldName = 'totalNtwtLb';
                        $label_field_font_size = '';
                        $label_field_font_color = '';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $ffnWtLabelContent = $label_field_content;
                        $ffnWtLabelFontSize = $label_field_font_size;
                        $ffnWtLabelColor = $label_field_font_color;
                        //
                        $fieldName = 'totalNtwt';
                        $label_field_font_size = '';
                        $label_field_font_color = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                                        . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                                        . "label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $totalNtwtLabelFieldCheck = $label_field_check;
                        ?>
                        <?php if ($itemNtWt == 'true') { ?>
                            <td align="center" class="paddingRight5" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>;">
                                 <!--<div class="" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>; padding-right:5px;">-->
                                <?php
                                if ($totalNtwtLabelFieldCheck == 'true') {
                                    echo number_format($goldTotNetWt, 3) . ' ' . $iWtType;
                                }
                                ?> 
                                <!--</div>--> 
                            </td>
                        <?php } ?>
                             <?php if ($labour == 'true') { ?>
                            <td align="center" class="paddingRight5" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>;">
                                 <!--<div class="" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>; padding-right:5px;">-->
                               
                                   -
                                <!--</div>--> 
                            </td>
                        <?php } ?>
                            <?php
                           if ($mkg_chrg_val == 'true') {
//                                                    echo '$goldMkgChrg';
                                                    ?>
                                                    <td align="center" class="paddingRight5" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>;">
                                                        <?php echo number_format($goldMkgChrg, 2); ?>
                                                    </td>
                                                    <?php
                                                }?>
                        <?php
                        if ($metal_val == 'true') {
                            ?>
                            <td align="center" class="paddingRight5" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>;">
                                <?php echo number_format($goldMetalAmt, 2); ?>
                            </td>
                            <?php }
                        ?>
                        <?php if ($vat == 'true') {
                            ?>
                            <td> - </td>   
                        <?php } ?>
                        <?php
                        if ($vatAmt == 'true') {
                            ?>
                            <td align="center" class="paddingRight5" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>; text-align:right;">
                                <?php
                                echo number_format($vatGoldTotAmt, 2);
                                ?>
                            </td>
                        <?php } ?>
                        <?php                       
                        
                        if ($amt == 'true') {
                            ?>
                            <td align="center" class="paddingRight5" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>; text-align:right;">
                                <?php
                                echo number_format($slPrItemFinVal, 2);
                                ?>
                            </td>
                       
                    </tr>
                <?php }
                      } if($silverPresent == 'yes'){
                    ?>
                    <tr class="total-bottom"> 
                            <?php
                            $totaColspan = '';
                            ?>
                            <?php
                            if ($itemSNoLb == 'true') {
                                $totaColspan += 1;
                            }
                            if ($itemIdLb == 'true' && $sellEstimateDetails != 'NO') {
                                $totaColspan += 1;
                            }
                            if ($design == 'true' && $designpresent == 'yes') {
                                $totaColspan += 1;
                            }
                            if ($itemDescLb == 'true') {
                                $totaColspan += 1;
                            }
                            if ($brandName == 'true' && $brand == 'yes') {
                                $totaColspan += 1;
                            }
                            if ($hallMarkUid == 'true') {
                                $totaColspan += 1;
                            }
                            ?>
                        <td colspan="3" style="text-align:right">

                                <?php echo '<b>' . $totalMetalLbVal . "TOTIAL SILVER :"; ?>

                            </td>
                             <?php
                            $fieldName = 'totalQtyLb';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            $label_field_content = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $qtyLabelContent = $label_field_content;
                            $qtyLabelFontSize = $label_field_font_size;
                            $qtyLabelColor = $label_field_font_color;
                            //
                            $fieldName = 'totalQty';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $totalQtyLabelFeildCheck = $label_field_check;


                            if ($QtyLb == 'true') {
                                ?>
                                <td align="center" valign="top">                       
                                    <div class="paddingLeft5" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>;display: inline;">
                                    <?php
                                    if ($itemSNoLb != true && $itemIdLb != true && $design != true && $itemDescLb != true) {
                                        echo "SILVER :";
                                        ?>
                                    <?php } ?>
                                    <?php
                                    if ($totalQtyLabelFeildCheck == 'true') {
                                        echo $totalSlverQTY;
                                    }
                                    ?>
                                <?php } ?>
                                <?php if ($unitPriceLb == 'true') { ?>
                                <td align="center" valign="top">
                                    <div class="paddingLeft5" style ="font-size:<?php echo $qtyLabelFontSize; ?>px;color:<?php echo $qtyLabelColor; ?>;display: inline;">
                                    <?php
                                    if ($itemSNoLb != true && $itemIdLb != true && $design != true && $itemDescLb != true && $QtyLb != true) {
                                        echo "SILVER :";
                                        ?>
                                    <?php } ?>
                                    </div> 
                                </td>
                            <?php } ?>
                            </td>
                            <?php
                            $fieldName = 'totalGsWtLb';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            $label_field_content = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $GsWtLabelContent = $label_field_content;
                            $GsWtLabelFontSize = $label_field_font_size;
                            $GsWtLabelColor = $label_field_font_color;
                            //
                            $fieldName = 'totalGsWt';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check "
                                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                                            . "label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $totalSlvrGsWtLabelFeildCheck = $label_field_check;

                            if ($itemGsWt == 'true') {
                                ?>
                                <td align="center" class="paddingRight5" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>;">                     
                                <?php } ?>
                                <?php
                                if ($totalSlvrGsWtLabelFeildCheck == 'true') {
                                    echo decimalVal($silverTotGsWt, 3) . ' ' . $iWtType;
                                }
                                ?>
                                </div>
                            </td>
                        
                        <?php if ($itemPurity == 'true') {
                            ?>
                            <td> - </td>   
                        <?php } ?>
                        <?php
                        $fieldName = 'totalNtwtLb';
                        $label_field_font_size = '';
                        $label_field_font_color = '';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $ffnWtLabelContent = $label_field_content;
                        $ffnWtLabelFontSize = $label_field_font_size;
                        $ffnWtLabelColor = $label_field_font_color;
                        //
                        $fieldName = 'totalNtwt';
                        $label_field_font_size = '';
                        $label_field_font_color = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                                        . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                                        . "label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $totalSlvrNtwtLabelFieldCheck = $label_field_check;
                        ?>
                        <?php if ($itemNtWt == 'true') { ?>
                            <td align="center" class="paddingRight5" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>;">
                                 <div class="" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>; padding-right:5px;">
                                <?php
                                if ($totalSlvrNtwtLabelFieldCheck == 'true') {
                                    echo number_format($silverTotNetWt, 3) . ' ' . $iWtType;
                                }
                                ?> 
                                </div> 
                            </td>
                        <?php } ?>
                             <?php if ($labour == 'true') { ?>
                            <td align="center" class="paddingRight5" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>;">
                                 <!--<div class="" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>; padding-right:5px;">-->
                               
                                   -
                                <!--</div>--> 
                            </td>
                        <?php } ?>
                            <?php
                           if ($mkg_chrg_val == 'true') {
//                                                    echo '$goldMkgChrg';
                                                    ?>
                                                    <td align="center" class="paddingRight5" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>;">
                                                        <?php echo number_format($silverMkgChrg, 2); ?>
                                                    </td>
                                                    <?php
                                                }?>
                        <?php
                        if ($metal_val == 'true') {
                            ?>
                            <td align="center" class="paddingRight5" style ="font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>;">
                                <?php echo number_format($silverMetalAmt, 2); ?>
                            </td>
                            <?php }
                        ?>
                        <?php if ($vat == 'true') {
                            ?>
                            <td> - </td>   
                        <?php } ?>
                        <?php
                        if ($vatAmt == 'true') {
                            ?>
                            <td align="center" class="" style ="paddingRight5: 6px !important;font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>; text-align:right;">
                                <?php
                                echo number_format($vatSilverTotAmt, 2);
                                ?>
                            </td>
                        <?php } ?>
                        <?php
                        if ($amt == 'true') {
                            ?>
                            <td align="center" class="" style ="padding-right: 6px !important;font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>; text-align:right;">
                                <?php
                                echo number_format($slPrItemFinVal, 2);
                                ?>
                            </td>
                       
                    </tr>
                <?php } }?>
<!--                             <tr class="total-bottom">
                            <td colspan="3" style="text-align:right">Totial</td>
                            <td>60.63</td>
                            <td></td>
                            <td>60.570</td>
                            <td>1249.559</td>
                            <td></td>
                            <td>124.956</td>
                            <td style="border-right:0;">1374.515</td>
                        </tr>-->
                      <?php include 'omspinvnewtaxRetailWholesaleItemPayInfo.php' ; ?>
                                            </tbody>
                      
                </table>
                
            </td>
         </tr>
</table>
