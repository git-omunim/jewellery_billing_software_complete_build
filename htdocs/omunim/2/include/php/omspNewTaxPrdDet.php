<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on jul 14, 2022 19:21:56 PM
 *
 * @FileName: omspNewTaxPrdDet.php
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
<tr>
    <td  align="center">
        <hr style="margin:0;background:#dedede">
    </td>  
</tr>
<tr>
    <td  align="center">
        <?php
        $fieldName = 'invTitle';
        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check,label_field_content,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        $label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
        $label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
        $label_field_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
        $taxInvTitle = $label_field_check;
        if ($taxInvTitle == 'true') {
            ?>
            <div class="headlable" style="color:<?php echo $label_field_font_color; ?>"><?php echo $label_field_content; ?></div>
        <?php } ?>
    </td>
</tr>
<tr>
    <td>
        <table style="width:96%;margin:auto" class="billing-table">
            <?php
            // 
            // =============================================================================================================== //
            // START CODE TO ADD FINANCIAL YEAR CONDITION TO SET DATE STR FOR INVOICE ITEM QUERY  
            // =============================================================================================================== //
            //
            $invoiceDate = date_create($invoiceDate);
            $invoiceDate = date_format($invoiceDate, "d M Y");
            $currentInvoiceDate = strtoupper($invoiceDate);
            //
            if ($currentInvoiceDate != '' && $currentInvoiceDate != NULL) {
                //
                // FINANCIAL YEAR ACCORDING TO SELECTED DATE 
                $todayDate = $currentInvoiceDate;
                //
                $todayDOBDay = substr($todayDate, 0, 2);
                $todayDOBMonth = substr($todayDate, 3, -5);
                $todayDOBYear = substr($todayDate, -4);
                //
                // CURRENT FINANCIAL YEAR 
                $currentFinancialDay = '01';
                if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR') {
                    $todayDOBYear = $todayDOBYear - 1;
                } else {
                    // DO NOTHING
                }
                $currentFinancialMonth = 'APR';
                $currentFinancialYear = $todayDOBYear;
                $currentFinancialYearDate = $currentFinancialDay . ' ' . $currentFinancialMonth . ' ' . $currentFinancialYear;
                //
                // NEXT FINANCIAL YEAR 
                $nextFinancialDay = '01';
                $nextFinancialMonth = 'APR';
                $nextFinancialYear = $todayDOBYear + 1;
                $nextFinancialYearDate = $nextFinancialDay . ' ' . $nextFinancialMonth . ' ' . $nextFinancialYear;
                //        
            } else {
                //
                $todayDOBMonth = strtoupper(date(M));
                // 
                // FINANCIAL YEAR ACCORDING TO TODAY DATE 
                // CURRENT FINANCIAL YEAR 
                $currentFinancialDay = '01';
                $currentFinancialMonth = 'APR';
                if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR') {
                    $currentFinancialYear = date(Y) - 1;
                } else {
                    $currentFinancialYear = date(Y);
                }
                $currentFinancialYearDate = $currentFinancialDay . ' ' . $currentFinancialMonth . ' ' . $currentFinancialYear;
                //
                // NEXT FINANCIAL YEAR 
                $nextFinancialDay = '01';
                $nextFinancialMonth = 'APR';
                if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR') {
                    $nextFinancialYear = date(Y);
                } else {
                    $nextFinancialYear = date(Y) + 1;
                }
                $nextFinancialYearDate = $nextFinancialDay . ' ' . $nextFinancialMonth . ' ' . $nextFinancialYear;
                //
            }
            //
            // CURRENT AND NEXT FINANCIAL YEAR DATE STR 
            $currentFinancialYearDateStr = strtotime($currentFinancialYearDate);
            $nextFinancialYearDateStr = strtotime($nextFinancialYearDate);
            //
            if ($nepaliDateIndicator != 'YES') {
                // 
                // STOCK TRANSACTION TABLE DATE STR 
                $sttr_date_str = " AND $currentFinancialYearDateStr <= UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) "
                        . " AND UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) < $nextFinancialYearDateStr ";
                //
                // USER TRANSACTION INVOICE TABLE DATE STR 
                $utin_date_str = " AND $currentFinancialYearDateStr <= UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) "
                        . " AND UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) < $nextFinancialYearDateStr ";
                //
                $utin_date_str_for_join = " AND $currentFinancialYearDateStr <= UNIX_TIMESTAMP(STR_TO_DATE(u1.utin_date,'%d %b %Y')) "
                        . " AND UNIX_TIMESTAMP(STR_TO_DATE(u1.utin_date,'%d %b %Y')) < $nextFinancialYearDateStr ";
                //
            } else {
                $sttr_date_str = "";
                $utin_date_str = "";
            }
            //
            // ============================================================================================================= //
            // END CODE TO ADD FINANCIAL YEAR CONDITION TO SET DATE STR FOR INVOICE ITEM QUERY  
            // ============================================================================================================= //
            //
            //
//            if ($invName == 'metalPurchase') {
//
//                $qSelSlPrItemDetails = "SELECT sttr_id,sttr_image_id,sttr_firm_id,sttr_item_pre_id,sttr_item_id,sttr_metal_type,sttr_item_name,sttr_quantity,sttr_gs_weight,"
//                        . "sttr_gs_weight_type,sttr_pkt_weight_type,sttr_nt_weight_type,sttr_pkt_weight,sttr_nt_weight,sttr_final_fine_weight,sttr_metal_rate,sttr_sell_rate,"
//                        . "sttr_metal_discount_amt,sttr_mkg_discount_amt,sttr_metal_discount_per,sttr_mkg_discount_per,sttr_stone_discount_amt,sttr_stone_discount_per,"
//                        . "sttr_indicator,sttr_purity,sttr_final_purity,sttr_wastage,sttr_cust_wastage,sttr_valuation,sttr_fixed_price_status,sttr_cust_price,sttr_final_valuation,"
//                        . "sttr_making_charges,sttr_stone_valuation,sttr_total_making_amt,sttr_metal_amt,sttr_stone_amt,sttr_making_charges_type,sttr_final_purity,sttr_value_added,"
//                        . "sttr_final_valuation_by,sttr_total_lab_charges,sttr_lab_charges_type,sttr_hsn_no,sttr_item_code,sttr_transaction_type,sttr_hallmark_uid,sttr_cust_price,"
//                        . "sttr_color,sttr_clarity,"
//                        . "sttr_other_info,sttr_size,sttr_tot_price_cgst_chrg,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_chrg,sttr_total_making_charges,"
//                        . "sttr_making_charges,sttr_cust_wastage,sttr_cust_wastage_wt,sttr_other_charges,sttr_tot_tax,sttr_product_purchase_rate,sttr_product_sell_rate,"
//                        . "sttr_barcode_prefix,sttr_barcode,sttr_mkg_cgst_per,sttr_mkg_cgst_chrg,sttr_mkg_sgst_per,sttr_mkg_sgst_chrg,sttr_mkg_igst_per,sttr_mkg_igst_chrg,"
//                        . "sttr_tot_price_cgst_per,sttr_tot_price_cgst_chrg,sttr_tot_price_sgst_per,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_per,sttr_tot_price_igst_chrg,"
//                        . "sttr_total_making_charges,sttr_making_charges,sttr_making_charges_type,sttr_total_cust_price,sttr_item_other_info,sttr_other_charges_type,sttr_tax,"
//                        . "sttr_fine_weight,sttr_mkg_charges_by,sttr_hallmark_charges FROM stock_transaction_sell_2022_2023 where sttr_owner_id = '$sessionOwnerId' "
//                        . "and sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo' "
//                        . "and sttr_indicator IN ('rawMetal','stockCrystal') "
//                        . "and sttr_transaction_type IN ('PURBYSUPP','sell') $sttr_date_str "
//                        . "and sttr_user_id = '$userId' and sttr_status NOT IN('DELETED') order by sttr_id ASC";
//
//                $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
//
//                //echo '$qSelSlPrItemDetails == '.$qSelSlPrItemDetails;
//
//                $noOf = mysqli_num_rows($resSlPrItemDetails);
//            } else {
//
//               $qSelSlPrItemDetails = "SELECT sttr_id,sttr_sttr_id,sttr_image_id,sttr_firm_id,sttr_item_pre_id,sttr_item_id,sttr_metal_type,"
//                        . "sttr_item_name,sttr_quantity,sttr_gs_weight,sttr_gs_weight_type,sttr_pkt_weight_type,sttr_nt_weight_type,sttr_pkt_weight,"
//                        . "sttr_nt_weight,sttr_final_fine_weight,sttr_metal_rate,sttr_sell_rate,sttr_metal_discount_amt,sttr_mkg_discount_amt,sttr_metal_discount_per,"
//                        . "sttr_mkg_discount_per,sttr_stone_discount_amt,sttr_stone_discount_per,sttr_indicator,sttr_purity,sttr_final_purity,sttr_wastage,sttr_cust_wastage,"
//                        . "sttr_valuation,sttr_fixed_price_status,sttr_cust_price,sttr_final_valuation,sttr_making_charges,sttr_stone_valuation,sttr_total_making_amt,"
//                        . "sttr_metal_amt,sttr_stone_amt,sttr_making_charges_type,sttr_final_purity,sttr_value_added,sttr_final_valuation_by,sttr_total_lab_charges,"
//                        . "sttr_lab_charges_type,sttr_hsn_no,sttr_item_code,sttr_transaction_type,sttr_hallmark_uid,sttr_cust_price,sttr_color,sttr_clarity,sttr_other_info,"
//                        . "sttr_size,sttr_tot_price_cgst_chrg,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_chrg,sttr_total_making_charges,sttr_making_charges,"
//                        . "sttr_cust_wastage,sttr_cust_wastage_wt,sttr_other_charges,sttr_tot_tax,sttr_product_purchase_rate,sttr_product_sell_rate,sttr_barcode_prefix,"
//                        . "sttr_barcode,sttr_mkg_cgst_per,sttr_mkg_cgst_chrg,sttr_mkg_sgst_per,sttr_mkg_sgst_chrg,sttr_mkg_igst_per,sttr_mkg_igst_chrg,sttr_tot_price_cgst_per,"
//                        . "sttr_tot_price_cgst_chrg,sttr_tot_price_sgst_per,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_per,sttr_tot_price_igst_chrg,sttr_total_making_charges,"
//                        . "sttr_making_charges,sttr_making_charges_type,sttr_total_cust_price,sttr_item_other_info,sttr_other_charges_type,sttr_tax,sttr_fine_weight,"
//                        . "sttr_mkg_charges_by,sttr_hallmark_charges FROM stock_transaction_sell_2022_2023 where sttr_owner_id='$sessionOwnerId' "
//                        . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
//                        . "and sttr_indicator IN ('stock','stockCrystal','PURCHASE','rawMetal','APPROVAL','APPROVALREC','crystal','imitation','strsilver','RetailStock','ESTIMATE', 'PurchaseReturn') "
//                        . "and sttr_transaction_type IN('STOCK', 'sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ESTIMATE', 'PurchaseReturn', 'newOrder') $sttr_date_str "
//                        . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') AND sttr_firm_id='$utin_firm_id' order by sttr_id ASC";
//
//                $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
//                $noOf = mysqli_num_rows($resSlPrItemDetails);
//            }
            //echo '$qSelSlPrItemDetails @==@ ' . $qSelSlPrItemDetails . '<br /><br /><br />';

            $slPrindicator = array();

            $designpresent = '';
            $crystalPresent = '';
            foreach ($getStockTransDetails as $item) {
                if ($item['sttr_image_id'] != '' && $item['sttr_image_id'] != NULL) {
                    $designpresent = 'yes';
                }
                if ($item['sttr_indicator'] == 'stockCrystal') {
                    $crystalPresent = 'yes';
                }
            }
//                $slPrindicator[] = $rowSlPrItemDetails;
//                if ($rowSlPrItemDetails['sttr_image_id'] != '') {
//                                           $designpresent = 'yes';
//                } else if ($rowSlPrItemDetails['sttr_sttr_id'] != '') {
//                    parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction "
//                                    . "WHERE sttr_id='$rowSlPrItemDetails[sttr_sttr_id]' $sttr_date_str and sttr_transaction_type NOT IN ('sell','ESTIMATESELL')"));
//                    if ($sttr_image_id != '') {
//                        $designpresent = 'yes';
//                                       }
//                    foreach ($slPrindicator as $cry) {
//                        if ($cry['sttr_indicator'] == 'stockCrystal') {
//                                           $crystalPresent = 'yes';
//                                       }
//                                   }
//                }
//            parse_str(getTableValues("SELECT sttr_transaction_type FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
//                            . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
//                            . "and sttr_indicator IN ('stock','stockCrystal','PURCHASE','rawMetal','APPROVAL','APPROVALREC','crystal','imitation','strsilver','RetailStock','ESTIMATE', 'PurchaseReturn') "
//                            . "and sttr_transaction_type IN('STOCK', 'sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ESTIMATE', 'PurchaseReturn') "
//                            . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') AND sttr_firm_id='$utin_firm_id' order by sttr_id ASC"));
            foreach ($getStockTransDetails as $itemdetails) {
                if ($item['sttr_status'] != 'DELETED' && $item['sttr_firm_id'] == $utin_firm_id) {
                    $sttr_transaction_type = $itemdetails[0]['sttr_transaction_type'];
                }
            }

            if ($labelType == 'APPROVAL' || $panelName == 'Estimate' || $panelName == 'PendingOrderInvoice' || $approvalPanel == 'APPROVAL' || $sttr_transaction_type == 'APPROVAL') {
//                parse_str(getTableValues("SELECT sttr_firm_id "
//                                . "FROM stock_transaction_sell_2022_2023 "
//                                . "where sttr_owner_id='$sessionOwnerId' "
//                                . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' "
//                                . "and sttr_invoice_no='$slPrInvoiceNo' "
//                                . "and sttr_user_id ='$userId' "
//                                . "and sttr_status NOT IN('DELETED')"));

                $sttr_firm_id = $getStockTransDetails[0]['sttr_firm_id'];
//              
                $utin_firm_id = $sttr_firm_id;
            } else {
//                parse_str(getTableValues("SELECT utin_payment_mode AS paymentMode,utin_transaction_type,utin_type,utin_firm_id "
//                                . "FROM user_transaction_invoice "
//                                . "where utin_owner_id='$sessionOwnerId' "
//                                . "and utin_pre_invoice_no='$slPrPreInvoiceNo' "
//                                . "and utin_invoice_no='$slPrInvoiceNo' "
//                                . "and utin_user_id ='$userId' "
//                                . "and utin_status NOT IN('DELETED') "));
                $paymentMode = $getUserTransDetails[0]['utin_payment_mode'];
                $utin_transaction_type = $getUserTransDetails[0]['utin_transaction_type'];
                $utin_type = $getUserTransDetails[0]['utin_type'];
                $utin_firm_id = $getUserTransDetails[0]['utin_firm_id'];
            }

            /*             * *** Start Code To GET Firm Details ********* */
            if (isset($_GET['selFirmId'])) {
                $selFirmId = $_GET['selFirmId'];
            } else {
                // if not selected assign session firm
                $selFirmId = $_SESSION['setFirmSession'];
            }
            if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
//                $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                foreach ($getFirmDetails as $firmdetails) {
                    if ($firmdetails['firm_type'] == 'Public') {
                        $firm_id = $firmdetails['firm_id'];
                    }
                }
            } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
//                $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
                $firm_id = $getFirmDetails['firm_id'];
                $firm_name = $getFirmDetails['firm_name'];
                $firm_type = $getFirmDetails['firm_type'];
            }
            if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
//                $resFirmCount = mysqli_query($conn, $qSelFirmCount);
                $strFrmId = '0';
                // Set String for Public Firms
//                while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
                foreach ($getFirmDetails as $rowFirm) {
//                     }
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
//
//
//            if ($invName == 'metalPurchase') {
//
//                $qSelSlPrItemDetails = "SELECT sttr_id,sttr_image_id,sttr_firm_id,sttr_item_pre_id,sttr_item_id,sttr_metal_type,sttr_item_name,sttr_quantity,sttr_gs_weight,"
//                        . "sttr_gs_weight_type,sttr_pkt_weight_type,sttr_nt_weight_type,sttr_pkt_weight,sttr_nt_weight,sttr_final_fine_weight,sttr_metal_rate,sttr_sell_rate,"
//                        . "sttr_metal_discount_amt,sttr_mkg_discount_amt,sttr_metal_discount_per,sttr_mkg_discount_per,sttr_stone_discount_amt,sttr_stone_discount_per,sttr_indicator,"
//                        . "sttr_purity,sttr_final_purity,sttr_wastage,sttr_cust_wastage,sttr_valuation,sttr_fixed_price_status,sttr_cust_price,sttr_final_valuation,sttr_making_charges,"
//                        . "sttr_stone_valuation,sttr_total_making_amt,sttr_metal_amt,sttr_stone_amt,sttr_making_charges_type,sttr_final_purity,sttr_value_added,sttr_final_valuation_by,"
//                        . "sttr_total_lab_charges,sttr_lab_charges_type,sttr_hsn_no,sttr_item_code,sttr_transaction_type,sttr_hallmark_uid,sttr_cust_price,sttr_color,sttr_clarity,"
//                        . "sttr_other_info,sttr_size,sttr_tot_price_cgst_chrg,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_chrg,sttr_total_making_charges,sttr_making_charges,"
//                        . "sttr_cust_wastage,sttr_cust_wastage_wt,sttr_other_charges,sttr_tot_tax,sttr_product_purchase_rate,sttr_product_sell_rate,sttr_barcode_prefix,sttr_barcode,"
//                        . "sttr_mkg_cgst_per,sttr_mkg_cgst_chrg,sttr_mkg_sgst_per,sttr_mkg_sgst_chrg,sttr_mkg_igst_per,sttr_mkg_igst_chrg,sttr_tot_price_cgst_per,sttr_tot_price_cgst_chrg,"
//                        . "sttr_tot_price_sgst_per,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_per,sttr_tot_price_igst_chrg,sttr_total_making_charges,sttr_making_charges,"
//                        . "sttr_making_charges_type,sttr_total_cust_price,sttr_item_other_info,sttr_other_charges_type,sttr_tax,sttr_fine_weight,sttr_mkg_charges_by,sttr_hallmark_charges,"
//                        . "sttr_total_hallmark_charges,sttr_purchase_rate FROM stock_transaction_sell_2022_2023 where sttr_owner_id = '$sessionOwnerId' "
//                        . "and sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo' "
//                        . "and sttr_indicator IN ('rawMetal','stockCrystal') $sttr_date_str "
//                        . "and sttr_transaction_type IN('PURBYSUPP','sell') "
//                        . "and sttr_user_id = '$userId' and sttr_status NOT IN('DELETED') $stockTransFirmStr order by sttr_id ASC";
//                $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
//                $noOf = mysqli_num_rows($resSlPrItemDetails);
//            } else {
//                $qSelSlPrItemDetails = "SELECT sttr_id,sttr_image_id,sttr_firm_id,sttr_item_pre_id,sttr_item_id,sttr_metal_type,sttr_item_name,sttr_item_category,sttr_quantity,"
//                        . "sttr_gs_weight,sttr_gs_weight_type,sttr_pkt_weight_type,sttr_nt_weight_type,sttr_pkt_weight,sttr_nt_weight,sttr_final_fine_weight,sttr_metal_rate,sttr_sell_rate,"
//                        . "sttr_metal_discount_amt,sttr_mkg_discount_amt,sttr_metal_discount_per,sttr_mkg_discount_per,sttr_stone_discount_amt,sttr_stone_discount_per,sttr_indicator,"
//                        . "sttr_purity,sttr_final_purity,"
//                        . "sttr_wastage,sttr_cust_wastage,sttr_valuation,sttr_fixed_price_status,sttr_cust_price,sttr_final_valuation,sttr_making_charges,sttr_stone_valuation,"
//                        . "sttr_total_making_amt,sttr_metal_amt,sttr_stone_amt,sttr_making_charges_type,sttr_final_purity,sttr_value_added,sttr_final_valuation_by,sttr_total_lab_charges,"
//                        . "sttr_lab_charges_type,sttr_hsn_no,sttr_item_code,sttr_transaction_type,sttr_hallmark_uid,sttr_cust_price,sttr_color,sttr_clarity,sttr_other_info,"
//                        . "sttr_size,sttr_tot_price_cgst_chrg,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_chrg,sttr_total_making_charges,sttr_making_charges,sttr_cust_wastage,"
//                        . "sttr_cust_wastage_wt,sttr_other_charges,sttr_tot_tax,sttr_product_purchase_rate,sttr_product_sell_rate,sttr_barcode_prefix,sttr_barcode,sttr_mkg_cgst_per,"
//                        . "sttr_mkg_cgst_chrg,sttr_mkg_sgst_per,sttr_mkg_sgst_chrg,sttr_mkg_igst_per,sttr_mkg_igst_chrg,sttr_tot_price_cgst_per,sttr_tot_price_cgst_chrg,"
//                        . "sttr_tot_price_sgst_per,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_per,sttr_tot_price_igst_chrg,sttr_total_making_charges,sttr_making_charges,"
//                        . "sttr_making_charges_type,sttr_total_cust_price,sttr_item_other_info,sttr_other_charges_type,sttr_tax,sttr_fine_weight,sttr_mkg_charges_by,sttr_hallmark_charges,"
//                        . "sttr_total_hallmark_charges FROM stock_transaction_sell_2022_2023 where sttr_owner_id='$sessionOwnerId' "
//                        . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
//                        . "and sttr_indicator IN ('stock','stockCrystal','PURCHASE','rawMetal','APPROVAL','APPROVALREC','ItemReturn','crystal','imitation','strsilver','RetailStock', 'ESTIMATE', 'PurchaseReturn') "
//                        . "and sttr_transaction_type IN('STOCK','sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ItemReturn','ESTIMATE', 'PurchaseReturn','newOrder') $sttr_date_str "
//                        . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') $stockTransFirmStr and sttr_status NOT IN('RETURNED') order by sttr_id ASC";
//                $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
//                $noOf = mysqli_num_rows($resSlPrItemDetails);
//                $noOfRows = mysqli_num_rows($resSlPrItemDetails);
//            }
            //echo '$qSelSlPrItemDetails=='.$qSelSlPrItemDetails;
//echo '$qSelSlPrItemDetails=='.$rowSlPrItemDetails['sttr_item_category'];
//
//
            $slPrindicator = array();
            $slPrItemValforpaymentpanel = 0;
            $SrNo = 1;
            $totalOthChgs = 0; // Added for Other Charges by @Author:PRIYANKA-12OCT2018
//ADD FOR SHOW TOTAL GSWT, NTWT & FNWT AUTHOR: DIKSHA 28NOV2018//
            $totalItemGSW = 0;
            $totalItemGSWS = 0; //for silver Gswt Author:DIKSHA 18APRIL2019
            $totalItemNTW = 0;
            $totalFfnWt = 0;
            $totalGoldFnWt = 0;
            $totalSilverFnWt = 0;
            $totalGoldFfnWt = 0;
            $totalSilverFfnWt = 0;
            $totalGoldQty = 0;
            $totalSlverQTY = 0;
            $totalCounter = 1;
            $totalColumns = 0;
            $totalQTY = 0;
            $TotGsWt = 0;
            $goldTotNetWt = 0;
            $goldFinalAmt = 0;
            $goldTotalVal = 0;
            $totalSilverFfnWt = 0;
            $silverTotFFineWt1 = 0;
            $silverTotFFineWt = 0;
            $totalOthSlChgs = 0;
            $totalCrystalVal = 0;
            $crystalTotFFineWt1WithPP = 0;
            $crystalTotFFineWtWithPP = 0;
            $goldTotFFineWt1 = 0;
            $crystalTotFFineWt1 = 0;
            $crystalTotFFineWt = 0;
            $goldTotFFineWt = 0;
            $goldTotGsWt = 0;
            $silverTotGsWt = 0;
            $TotVal = 0;
            $goldStoneCnt=0;
            $silverStoneCnt=0;
            $noOfRows = 0;
            $silverTotGsWt = 0;
            $silverTotNetWt = 0;
            $totalOthGdChgs = 0;
            $silverTotGsWt = 0;
            $totalSlverQTY = 0;
            $brand = null;
            $pkwtpresent = null;
            $puritypresent = null;
            $labpresent = null;
            $labchargepresent = null;
            $hsnpresent = null;
            $hallMark = null;
            $otherinfo = null;
            $sizePresent = null;
            $cgstpresent = null;
            $sgstpresent = null;
            $igstpresent = null;
            $sttrtotalmkgpresent = null;
            $mkgresent = null;
            $custwasatagepresent = null;
            $otherChargesPresent = null;
            $metalDiscountPresent = null;
            $stoneDiscountPresent = null;
            $mkgAfterDiscInGmPresent = null;
            $mkgAfterDiscInPerPresent = null;
//            echo '<pre>';
//            print_r($getStockTransDetails);
//            echo '</pre>';
//            while ($rowSlPrItemDetails = mysqli_fetch_array($resSlPrItemDetails)) {
            sort($getStockTransDetails);
            foreach ($getStockTransDetails as $rowSlPrItemDetails) {
                if (($rowSlPrItemDetails['sttr_indicator'] == 'rawMetal') && ($rowSlPrItemDetails['sttr_transaction_type'] == 'RECEIVED' || $rowSlPrItemDetails['sttr_transaction_type'] == 'PAID' )) {
                    continue;
                }
                $noOfRows++;
                $slPrId = $rowSlPrItemDetails['sttr_id'];
                $slPrItemId = $rowSlPrItemDetails['sttr_item_pre_id'] . ' ' . $rowSlPrItemDetails['sttr_item_id'];
                $slPrMetalType = $rowSlPrItemDetails['sttr_metal_type'];
                $slPrItemName = $rowSlPrItemDetails['sttr_item_name'];
                $slPrItemQty = $rowSlPrItemDetails['sttr_quantity'];
                $slPrItemGSW = $rowSlPrItemDetails['sttr_gs_weight'] . ' ' . $rowSlPrItemDetails['sttr_gs_weight_type'];
                $slPrItemCategory = $rowSlPrItemDetails['sttr_item_category'];
                $sttr_counter_name = $rowSlPrItemDetails['sttr_counter_name'];
                $sttr_indicator = $rowSlPrItemDetails['sttr_indicator'];

                //echo"slPrItemCategory===".$slPrItemCategory;
                //
                 //FOR GOLD ST GS WT
                if($sttr_indicator == 'stock' && $slPrMetalType == 'Gold')
                {
                    $slGdId = $rowSlPrItemDetails['sttr_id'];
                }
                if($rowSlPrItemDetails['sttr_indicator'] == 'stockCrystal' && $rowSlPrItemDetails['sttr_gs_weight_type'] == 'CT' && $rowSlPrItemDetails['sttr_sttr_id'] == $slGdId){
                  $goldStoneCnt = $goldStoneCnt + $rowSlPrItemDetails['sttr_gs_weight'];
                }
                if($rowSlPrItemDetails['sttr_indicator'] == 'stockCrystal' && $rowSlPrItemDetails['sttr_gs_weight_type'] == 'GM' && $rowSlPrItemDetails['sttr_sttr_id'] == $slGdId){
                  $goldStoneCnt = $goldStoneCnt + ($rowSlPrItemDetails['sttr_gs_weight']*5);
                }
                 if($rowSlPrItemDetails['sttr_indicator'] == 'stockCrystal' && $rowSlPrItemDetails['sttr_gs_weight_type'] == 'KG' && $rowSlPrItemDetails['sttr_sttr_id'] == $slGdId){
                   $goldStoneCnt = $goldStoneCnt + ($rowSlPrItemDetails['sttr_gs_weight']*5000);
                }
                 if($rowSlPrItemDetails['sttr_indicator'] == 'stockCrystal' && $rowSlPrItemDetails['sttr_gs_weight_type'] == 'MG' && $rowSlPrItemDetails['sttr_sttr_id'] == $slGdId){
                   $goldStoneCnt = $goldStoneCnt + ($rowSlPrItemDetails['sttr_gs_weight']*0.005);
                }
                //
                 //FOR SL ST GS WT
                if($sttr_indicator == 'stock' && $slPrMetalType == 'Silver')
                {
                    $slSlId = $rowSlPrItemDetails['sttr_id'];
                }
                if($rowSlPrItemDetails['sttr_indicator'] == 'stockCrystal' && $rowSlPrItemDetails['sttr_gs_weight_type'] == 'CT' && $rowSlPrItemDetails['sttr_sttr_id'] == $slSlId){
                    $silverStoneCnt = $silverStoneCnt + $rowSlPrItemDetails['sttr_gs_weight'];
                }
                if($rowSlPrItemDetails['sttr_indicator'] == 'stockCrystal' && $rowSlPrItemDetails['sttr_gs_weight_type'] == 'GM' && $rowSlPrItemDetails['sttr_sttr_id'] == $slSlId){
                    $silverStoneCnt = $silverStoneCnt + ($rowSlPrItemDetails['sttr_gs_weight']*5);
                }
                 if($rowSlPrItemDetails['sttr_indicator'] == 'stockCrystal' && $rowSlPrItemDetails['sttr_gs_weight_type'] == 'KG' && $rowSlPrItemDetails['sttr_sttr_id'] == $slSlId){
                    $silverStoneCnt = $silverStoneCnt + ($rowSlPrItemDetails['sttr_gs_weight']*5000);
                }
                 if($rowSlPrItemDetails['sttr_indicator'] == 'stockCrystal' && $rowSlPrItemDetails['sttr_gs_weight_type'] == 'MG' && $rowSlPrItemDetails['sttr_sttr_id'] == $slSlId){
                    $silverStoneCnt = $silverStoneCnt + ($rowSlPrItemDetails['sttr_gs_weight']*0.005);
                }
                //
//                echo "<pre>";
//                print_r($rowSlPrItemDetails);
//                echo "</pre>";
//               
//                $fieldName = 'itemWtType';
//                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                $itemWtType = $itemWtType_check;

                if ($itemWtType == 'true') {
                    $pktWtType = $rowSlPrItemDetails['sttr_pkt_weight_type'];
//                                           $ntWtType = $rowSlPrItemDetails['sttr_nt_weight_type'];
                    $fnWtType = $rowSlPrItemDetails['sttr_nt_weight_type'];
                }
                //
                $slPrItemPKTW = $rowSlPrItemDetails['sttr_pkt_weight'] . ' ' . $pktWtType; //add code for pkt wt Author:SANT08APR17
                $slPrItemNTW = $rowSlPrItemDetails['sttr_nt_weight'] . ' ' . $rowSlPrItemDetails['sttr_nt_weight_type'];
                $slprFnWt = $rowSlPrItemDetails['sttr_fine_weight'] . ' ' . $fnWtType;
                $slprFfnWt = $rowSlPrItemDetails['sttr_final_fine_weight'] . ' ' . $fnWtType;
                $slPrMetalRate = $rowSlPrItemDetails['sttr_metal_rate'];
                if ($invName == 'metalPurchase') {
                    $slPrPurchaseRate = $rowSlPrItemDetails['sttr_purchase_rate'];
                } else {
                    $slPrPurchaseRate = $rowSlPrItemDetails['sttr_sell_rate'];
                }
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
                $slPrItemModelNo = $rowSlPrItemDetails['sttr_item_model_no'];
                //
                // FOR FIXED MRP VALULATION @SIMRAN:04JAN2023
                if ($rowSlPrItemDetails['sttr_fixed_price_status'] == 'TRUE') {
                    if ($rowSlPrItemDetails['sttr_cust_price'] > 0) {
                        $slPrItemFinVal = $rowSlPrItemDetails['sttr_cust_price'];
                    } else {
                        $slPrItemFinVal = $rowSlPrItemDetails['sttr_final_valuation'];
                    }
                } else {
                    $slPrItemFinVal = $rowSlPrItemDetails['sttr_final_valuation'];
                }
                //
                //
                $sttrFixedPriceStatus = $rowSlPrItemDetails['sttr_fixed_price_status'];
                //
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
                $sttr_color = $resSumQuery['sttr_color'];
                $sttr_clarity = $resSumQuery['sttr_clarity'];
                $metalType = $rowSlPrItemDetails['sttr_metal_type'];
                $sttr_total_hallmark_charges = $rowSlPrItemDetails['sttr_total_hallmark_charges'];
                if ($sttr_total_hallmark_charges != 0) {
                    if ($metalType == 'Gold') {
                        $totalHallGold += $sttr_total_hallmark_charges;
                    } else if ($metalType == 'Silver') {
                        $totalHallSilver += $sttr_total_hallmark_charges;
                    }
                }
                $sttr_hallmark_charges = $rowSlPrItemDetails['sttr_hallmark_charges'];   // ADDED HALLMARK CHARGES #SIMRAN24APR2023
                //
                if ($slPrHallMark != '' && $slPrHallMark != NULL) {
                    $hallMark = 'yes';
                }
                if ($slPrBrandName != '' && $slPrBrandName != NULL) {
                    $brand = 'yes';
                }
                if ($sltranstype == 'ESTIMATESELL') {
                    $omly_value = $getLayoutDetails['sellEstimateItemPayamentDetails'];
//                    parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'sellEstimateItemPayamentDetails'"));
                    if ($omly_value == 'YES') {
                        $sellEstimateDetails = 'YES';
                    } else {
                        $sellEstimateDetails = 'NO';
                    }
                }
                //
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
                if (($sttr_tot_price_cgst_chrg != 0 || $sttr_tot_price_cgst_chrg != 0.00) && $sttr_tot_price_cgst_chrg > 0) {
                    $cgstpresent = 'yes';
                }

                $sttr_tot_price_sgst_chrg = $rowSlPrItemDetails['sttr_tot_price_sgst_chrg'];
                if (($sttr_tot_price_sgst_chrg != 0 || $sttr_tot_price_sgst_chrg != 0.00) && $sttr_tot_price_sgst_chrg > 0) {
                    $sgstpresent = 'yes';
                }

                $sttr_tot_price_igst_chrg = $rowSlPrItemDetails['sttr_tot_price_igst_chrg'];
                if (($sttr_tot_price_igst_chrg != '' || $sttr_tot_price_igst_chrg != 0 || $sttr_tot_price_igst_chrg != 0.00 ) && $sttr_tot_price_igst_chrg > 0) {
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
//                    $itemReturnedPresent = noOfRowsCheck('sttr_id', 'stock_transaction_sell_2022_2023', "sttr_item_code='$slPrItmCode' AND sttr_transaction_type='ItemReturn'");
                    //echo '$itemReturnedPresent : ' . $itemReturnedPresent;
                    $itemReturnedPresent = 0;
                    foreach ($getStockTransDetails as $row) {
                        if ($row['sttr_transaction_type'] == 'ItemReturn') {
                            $itemReturnedPresent++;
                        }
                    }
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

                    $sttr_hsn_no_pay = $rowSlPrItemDetails['sttr_hsn_no'];
                }
                $totalHallmarkCharges += $sttr_hallmark_charges;
                //
                if ($slPrMetalType == 'Gold' || $slPrMetalType == 'GOLD' || $slPrMetalType == 'gold') {     //for Gold Gswt total Author:DIKSHA 18APRIL2019
                    $totalItemGSW += $slPrItemGSW;
                    $totalGoldFnWt += $slprFnWt;
                    $totalGoldFfnWt += $slprFfnWt;

                    $totalGoldQty += $slPrItemQty;
                    $goldTotGsWt += getTotalWeight($rowSlPrItemDetails['sttr_gs_weight'], $rowSlPrItemDetails['sttr_gs_weight_type'], 'weight');
                    $goldTotNetWt += getTotalWeight($rowSlPrItemDetails['sttr_nt_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight');
                    //                
                    $totalGstPerGold = $sttr_tot_price_cgst_per + $sttr_tot_price_sgst_per + $sttr_tot_price_igst_per;
                    $totalGstAmtGold = $sttr_tot_price_cgst_chrg + $sttr_tot_price_sgst_chrg + $sttr_tot_price_igst_chrg;
                    //
                    $goldTotalVal += $rowSlPrItemDetails['sttr_valuation'] + $sttr_total_making_charges + $slPrCryValuation + $totalGstAmtGold;
                    if ($rowSlPrItemDetails['sttr_fixed_price_status'] == TRUE) {
                        $goldFinalAmt += $rowSlPrItemDetails['sttr_cust_price'];
                    } else {
                        $goldFinalAmt += $rowSlPrItemDetails['sttr_final_valuation'];
                    }

                    $goldMkgChrg += $sttr_total_making_charges;
                    $goldMetalAmt += $sttr_metal_amt;
                    //
                    $goldPresent = 'yes';
                    $goldFixedPrice += $sttr_cust_price;

                    $mainTotalGstAmtGold += $totalGstAmtGold;
                }

                if ($slPrMetalType == 'Silver' || $slPrMetalType == 'SILVER' || $slPrMetalType == 'silver') {    //for silver Gswt total Author:DIKSHA 18APRIL2019
                    $totalItemGSWS += $slPrItemGSW;
                    $totalSilverFfnWt += $slprFfnWt;
                    $totalSilverFnWt += $slprFnWt;
                    $totalSlverQTY += $slPrItemQty;
                    $silverTotGsWt += getTotalWeight($rowSlPrItemDetails['sttr_gs_weight'], $rowSlPrItemDetails['sttr_gs_weight_type'], 'weight');
                    $silverTotNetWt += getTotalWeight($rowSlPrItemDetails['sttr_nt_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight');
                    //
                    $totalGstPerSilver = $sttr_tot_price_cgst_per + $sttr_tot_price_sgst_per + $sttr_tot_price_igst_per;
                    $totalGstAmtSilver = $sttr_tot_price_cgst_chrg + $sttr_tot_price_sgst_chrg + $sttr_tot_price_igst_chrg;
                    //
                    $silverTotalVal += $rowSlPrItemDetails['sttr_valuation'] + $sttr_total_making_charges + $slPrCryValuation;

                    if ($rowSlPrItemDetails['sttr_fixed_price_status'] == TRUE) {
                        $silverFinalAmt += $rowSlPrItemDetails['sttr_cust_price'];
                    } else {
                        $silverFinalAmt += $rowSlPrItemDetails['sttr_final_valuation'];
                    }
                    //
                    $silverMkgChrg += $sttr_total_making_charges;
                    $silverMetalAmt += $sttr_metal_amt;
                    //
                    $silverPresent = 'yes';
                    //
                    $silverFixedPrice += $sttr_cust_price;

                    $mainTotalGstAmtSilver += $totalGstAmtSilver;
                }

                if ($slPrindicator != 'stockCrystal') {
                    $GswtType = $rowSlPrItemDetails['sttr_gs_weight_type'];
                    $totalItemNTW += $slPrItemNTW;
                    $totalFfnWt += $slprFfnWt;

                    $prodBarcode = $rowSlPrItemDetails['sttr_barcode_prefix'] . $rowSlPrItemDetails['sttr_barcode'];
                    $prodHallmarkUid = $rowSlPrItemDetails['sttr_hallmark_uid'];
                }

                $sttr_valuation = $rowSlPrItemDetails['sttr_valuation'];

                $sttr_mkg_cgst_per = $rowSlPrItemDetails['sttr_mkg_cgst_per'];
                $sttr_mkg_cgst_chrg = $rowSlPrItemDetails['sttr_mkg_cgst_chrg'];
                $sttr_mkg_sgst_per = $rowSlPrItemDetails['sttr_mkg_sgst_per'];
                $sttr_mkg_sgst_chrg = $rowSlPrItemDetails['sttr_mkg_sgst_chrg'];
                $sttr_mkg_igst_per = $rowSlPrItemDetails['sttr_mkg_igst_per'];
                $sttr_mkg_igst_chrg = $rowSlPrItemDetails['sttr_mkg_igst_chrg'];

                //ON TOTAL PRICE CGST,SGST,IGST
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
                $sttr_item_other_info = $rowSlPrItemDetails['sttr_item_other_info'];

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
//                parse_str(getTableValues("SELECT met_rate_tax_check,met_rate_tax_percentage FROM metal_rates WHERE met_rate_own_id = '$_SESSION[sessionOwnerId]' AND met_rate_value = '$slPrMetalRate' AND met_rate_metal_name = '$slPrMetalType'"));
               if ($getRatesDetails != '') {
                foreach ($getRatesDetails as $MetalRates) {
                    if ($MetalRates['met_rate_value'] == $slPrMetalRate && $MetalRates['met_rate_metal_name'] == $slPrMetalType) {
                        $met_rate_tax_check = $MetalRates['met_rate_tax_check'];
                        $met_rate_tax_percentage = $MetalRates['met_rate_tax_percentage'];
                    }
                }
               }
                //
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
                    $goldMkg_ch += $sttr_total_making_charges - $totalOtherCharges;
                }

                if ($rowSlPrItemDetails['sttr_metal_type'] == 'Silver') {
                    $silverTotFFineWt1 += getTotalWeight($rowSlPrItemDetails['sttr_final_fine_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight');
                    $silverTotFFineWt += getTotalWeight($rowSlPrItemDetails['sttr_gs_weight'], $rowSlPrItemDetails['sttr_gs_weight_type'], 'weight');
                    $silverTotFFineWtType = 'GM';

                    $silverRate = $rowSlPrItemDetails['sttr_metal_rate'];
                    $otherSilverCharges = $slPrItemTotalTaxChrg + $slPrTotItemLabChrg + $slpr_value_added;
                    $totalOthSlChgs += $otherSilverCharges;
                    $silverMkg_ch = $sttr_total_making_charges - $totalOtherCharges;
                }

//                    echo '$rowSlPrItemDetails'.$rowSlPrItemDetails['sttr_metal_type'];
//                    if ($rowSlPrItemDetails['sttr_metal_type'] == 'crystal' || $rowSlPrItemDetails['sttr_metal_type'] == 'Crystal' || $rowSlPrItemDetails['sttr_metal_type'] == 'CRYSTAL') {
//                                       
//                        }

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
//                if ($slPrindicator != 'stockCrystal') {
//                    $qSelCrystalDet = "SELECT sttr_id,sttr_image_id,sttr_firm_id,sttr_item_pre_id,sttr_item_id,sttr_metal_type,sttr_item_name,sttr_quantity,"
//                            . "sttr_gs_weight,sttr_gs_weight_type,sttr_pkt_weight_type,sttr_nt_weight_type,sttr_pkt_weight,sttr_nt_weight,sttr_final_fine_weight,"
//                            . "sttr_metal_rate,sttr_sell_rate,sttr_metal_discount_amt,sttr_mkg_discount_amt,sttr_metal_discount_per,sttr_mkg_discount_per,"
//                            . "sttr_stone_discount_amt,sttr_stone_discount_per,sttr_indicator,sttr_purity,sttr_final_purity,sttr_wastage,sttr_cust_wastage,"
//                            . "sttr_valuation,sttr_fixed_price_status,sttr_cust_price,sttr_final_valuation,sttr_making_charges,sttr_stone_valuation,"
//                            . "sttr_total_making_amt,sttr_metal_amt,sttr_stone_amt,sttr_making_charges_type,sttr_final_purity,sttr_value_added,sttr_final_valuation_by,"
//                            . "sttr_total_lab_charges,sttr_lab_charges_type,sttr_hsn_no,sttr_item_code,sttr_transaction_type,sttr_hallmark_uid,sttr_cust_price,sttr_color,"
//                            . "sttr_clarity,sttr_other_info,sttr_size,sttr_tot_price_cgst_chrg,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_chrg,sttr_total_making_charges,"
//                            . "sttr_making_charges,sttr_cust_wastage,sttr_cust_wastage_wt,sttr_other_charges,sttr_tot_tax,sttr_product_purchase_rate,sttr_product_sell_rate,"
//                            . "sttr_barcode_prefix,sttr_barcode,sttr_mkg_cgst_per,sttr_mkg_cgst_chrg,sttr_mkg_sgst_per,sttr_mkg_sgst_chrg,sttr_mkg_igst_per,sttr_mkg_igst_chrg,"
//                            . "sttr_tot_price_cgst_per,sttr_tot_price_cgst_chrg,sttr_tot_price_sgst_per,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_per,"
//                            . "sttr_tot_price_igst_chrg,sttr_total_making_charges,sttr_making_charges,sttr_making_charges_type,sttr_total_cust_price,sttr_item_other_info,"
//                            . "sttr_other_charges_type,sttr_tax,sttr_fine_weight,sttr_mkg_charges_by FROM stock_transaction_sell_2022_2023 WHERE sttr_owner_id = '$sessionOwnerId' "
//                            . "AND sttr_sttr_id = '$slPrId' AND sttr_indicator = 'stockCrystal' ORDER BY sttr_id asc limit 0,10";
//                    //
//                    $resCrystalDet = mysqli_query($conn, $qSelCrystalDet);
//                    $noOfCry = mysqli_num_rows($resCrystalDet);
//                }
                // echo '$noOfCry==='.$noOfCry;
//                if ($noOfCry > 0) {
                $noOfCry = 0;
                foreach ($getStockTransDetails as $rescrystal) {
                    if ($rescrystal['sttr_indicator'] == 'stockCrystal') {
                        $noOfCry++;
                        $crystalTotFFineWt1 += $rescrystal['sttr_gs_weight'] . ' ' . $rescrystal['sttr_gs_weight_type'];
//                                               echo '$crystalTotFFineWt1='.$crystalTotFFineWt1;
                        $crystalTotFFineWt += getTotalWeight($rescrystal['sttr_gs_weight'], $rescrystal['sttr_gs_weight_type'], 'weight');
//                                               echo '$crystalTotFFineWt='.$crystalTotFFineWt;
                        $crystalTotFFineWtType = $rescrystal['sttr_gs_weight_type'];
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
//                    $qSelSlPrTotAmtDetails = "SELECT SUM(sttr_stone_amt) as crystalAmt,SUM(sttr_metal_amt) as metalAmt,SUM(sttr_total_making_charges) as makingCharges, 
//                    SUM(sttr_mkg_discount_amt) as makingDiscAmt, "
//                            . " SUM(sttr_stone_discount_amt) as crystalDiscAmt,SUM(sttr_metal_discount_amt) as metalDiscAmt,"
//                            . " SUM(sttr_mkg_cgst_chrg) as mkgCgstAmt,SUM(sttr_mkg_sgst_chrg) as mkgSgstAmt,SUM(sttr_mkg_igst_chrg) as mkgIgstAmt,"
//                            . " SUM(sttr_tot_price_cgst_chrg) as totPriceCgstAmt,SUM(sttr_tot_price_sgst_chrg) as totPriceSgstAmt,SUM(sttr_tot_price_igst_chrg) as totPriceIgstAmt"
//                            . " FROM stock_transaction_sell_2022_2023 where (sttr_id='$slPrId' OR sttr_sttr_id='$slPrId') and sttr_owner_id='$sessionOwnerId'";
//                    $resSlPrTotAmtDetails = mysqli_query($conn, $qSelSlPrTotAmtDetails);
//                    $totAmtNoOfRows = mysqli_num_rows($resSlPrTotAmtDetails);
//                    $rowSlPrTotAmtDetails = mysqli_fetch_array($resSlPrTotAmtDetails);
        $totAmtNoOfRows = 0;
        foreach ($getStockTransDetails as $rowSlPrTotAmtDetails) {
            if ($rowSlPrTotAmtDetails['sttr_indicator'] != 'stockCrystal') {
                $totAmtNoOfRows++;
                $crystalAmt += $rowSlPrTotAmtDetails['sttr_stone_amt'];
                $metalAmt += $rowSlPrTotAmtDetails['sttr_metal_amt'];
                $makingCharges += $rowSlPrTotAmtDetails['sttr_total_making_charges'];
                $makingDiscAmt += $rowSlPrTotAmtDetails['sttr_mkg_discount_amt'];
                $crystalDiscAmt += $rowSlPrTotAmtDetails['sttr_stone_discount_amt'];
                $metalDiscAmt += $rowSlPrTotAmtDetails['sttr_metal_discount_amt'];
                $mkgCgstAmt += $rowSlPrTotAmtDetails['sttr_mkg_cgst_chrg'];
                $mkgSgstAmt += $rowSlPrTotAmtDetails['sttr_mkg_sgst_chrg'];
                $mkgIgstAmt += $rowSlPrTotAmtDetails['sttr_mkg_igst_chrg'];
                $totPriceCgstAmt += $rowSlPrTotAmtDetails['sttr_tot_price_cgst_chrg'];
                $totPriceSgstAmt += $rowSlPrTotAmtDetails['sttr_tot_price_sgst_chrg'];
                $totPriceIgstAmt += $rowSlPrTotAmtDetails['sttr_tot_price_igst_chrg'];
            }
        }
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
    //
    $totalGstPer = $sttr_tot_price_cgst_per + $sttr_tot_price_sgst_per + $sttr_tot_price_igst_per;
    //echo '$totalGstPer=='.$totalGstPer;
    $totalGstAmt = $sttr_tot_price_cgst_chrg + $sttr_tot_price_sgst_chrg + $sttr_tot_price_igst_chrg;
//
//                $mainTotalGstAmt += $totalGstAmt;
    include 'omspnewtaxTblRight.php';

    if ($slPrindicator != 'stockCrystal') {

        //if ($rowSlPrItemDetails['sttr_fixed_price_status'] == TRUE) {
        //    $slPrItemValforpaymentpanel = $slPrItemValforpaymentpanel + $rowSlPrItemDetails['sttr_cust_price'];
        //} else {
        $slPrItemValforpaymentpanel = $slPrItemValforpaymentpanel + $slPrItemVal;
        //}

        $totaItemslFinalBalance += ($sttr_valuation + $sttr_total_making_charges + $slPrCryValuation); // get items final valuation  @AUTHOR:SHRI05OCT19
    }

    if ($slPrindicator != 'stockCrystal') {
        $SrNo++;
    }
    $totalCounter++;

//                echo '$totalColumns=='.$totalColumns.'<br>';
//                if ($slPrindicator != 'stockCrystal') {
//                    $totalColumns = $totalColumns - 2;
//                } else {
//                   
//                }
//                echo '$totalColumns=='.$totalColumns.'<br>';
//                 $totalColumns = $totalColumns - 1;
}
?>
                         <tr height="">  <?php
                                    if ($cgstColPresent == 'YES') {
                                        $totalColumns = $totalColumns + 1;
                                    }
                                    if ($sgstColPresent == 'YES') {
                                        $totalColumns = $totalColumns + 1;
                                    }
                                    for ($tc = 1; $tc <= $totalColumns; $tc++) {
                                        ?>
                                        <td align="center" height="" class="border-color-grey-rb" valign="top">
                                            
                                        </td>
                                    <?php } ?>
                           </tr>
            <?php
            $fieldName = 'sNo';
            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $label_field_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
            $itemSNoLb = $label_field_check;

//            $fieldName = 'itemId';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemIdLb = $itemId_check;
//
//            $fieldName = 'design';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $design = $design_check;
//
//            $fieldName = 'itemDesc';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemDescLb = $itemDesc_check;

//           $fieldName = 'itemCategory';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//            $itemCategory = $label_field_check;
            $itemcategoryLb = $itemCategory_check; //ADDED ITEM CATEGORY @SIMRAN-02FEB2023
//            echo '$itemcategoryLb_check=='.$itemcategoryLb;
//            $fieldName = 'brandName';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemCounter = $itemCounter_check;
            //
            $fieldName = 'discwithouttaxper';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check AS discwithouttaxperCheck FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $discwithouttaxperCheck = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
            $discwithouttaxper = $discwithouttaxperCheck;
            //
            //
            $fieldName = 'discPer';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check AS discPerCheck FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $discPerCheck = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
            $discPer = $discPerCheck;
            //
            //
            $brandName = $brandName_check;
//
//            $fieldName = 'hallMarkUid';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $hallMarkUid = $hallMarkUid_check;
//          echo '$hallMarkUid=='.$hallMarkUid.'<br>';
//
//            $fieldName = 'totalQty';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//
//            $fieldName = 'itemGsWt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemGsWt = $itemGsWt_check;

            $itemWtType = $itemWtType_check;
//
//            $fieldName = 'itemNtWt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemNtWt = $itemNtWt_check;

            $itemFnWt = $itemFnWt_check;
//
//            $fieldName = 'itemFfnWt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemFfnWt = $itemFfnWt_check;
//
//            $fieldName = 'itemProcessWt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemProcessWt = $itemProcessWt_check;
//
//            $fieldName = 'itemPurity';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemPurity = $itemPurity_check;
//
//            $fieldName = 'itemWSWt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemWSWt = $itemWSWt_check;
//        
            $itemWstgWt = $itemWstgWt_check;
//        
//            $fieldName = 'itemFinalPurity';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//            echo "SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
            $itemFinalPurity = $itemFinalPurity_check;
//
//            $fieldName = 'valAdded';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $valAdded = $valAdded_check;
//
//            $fieldName = 'itemFinalPurityWtCsWs';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemFinalPurityWtCsWs = $itemFinalPurityWtCsWs_check;
//
//            $fieldName = 'QTY';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $QtyLb = $QTY_check;
            $itemmodelNocheck = $itemmodelNo_check;
//            $fieldName = 'QTYLB';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $Qty = $QTYLB_check;
//
//            $fieldName = 'unitPrice';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $unitPriceLb = $unitPrice_check;
//
//            $fieldName = 'itemHSN';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemHSNLb = $itemHSN_check;

//            $fieldName = 'itemSize';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemSizeLb = $itemSize_check;
//
//            $fieldName = 'itemPktWt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemPktWtLb = $itemPktWt_check;

//            $fieldName = 'valAddedAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//metalRate
//            $fieldName = 'metalRate';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $metalRate = $metalRate_check;
//
//metalRate BY purity
//            $fieldName = 'metalRateByPurity';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $metalRateByPurity = $metalRateByPurity_check;
            //
            $rateByPurity = $rateByPurity_check;
            //
            $itemCustWsWt = $itemCustWsWt_check;
            //
//val
//            $fieldName = 'val';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $val = $val_check;
//            echo '$val=='.$val.'<br>';
//mkg_chrg_val
//            $fieldName = 'mkg_chrg_val';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $mkg_chrg_val = $mkg_chrg_val_check;
//brandName
//            $fieldName = 'brandName';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $brandName = $brandName_check;
//hallMarkUid
//            $fieldName = 'hallMarkUid';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $hallMarkUid = $hallMarkUid_check;
//OtherInfo
//            $fieldName = 'OtherInfo';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $OtherInfo = $OtherInfo_check;
//labour
//            $fieldName = 'labour';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $labour = $labour_check;
//metal_val
//            $fieldName = 'metal_val';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $metal_val = $metal_val_check;
//total_valwithmkg
//            $fieldName = 'total_valwithmkg';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $total_valwithmkg = $total_valwithmkg_check;
//totalCrystal
//            $fieldName = 'totalCrystal';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $totalCrystal = $totalCrystal_check;
//valAddedAmt
//            $fieldName = 'valAddedAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $valAddedAmt = $valAddedAmt_check;
            //combine gst %
//            $fieldName = 'itemCombineGstPer';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemCombineGstPer = $itemCombineGstPer_check;
            //combine gst amt
//            $fieldName = 'itemCombineGstAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemCombineGstAmt = $itemCombineGstAmt_check;
//cgstAmt
//            $fieldName = 'cgstAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $cgstAmt = $cgstAmt_check;
//totcgstAmt
//            $fieldName = 'totcgstAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $totcgstAmt = $totcgstAmt_check;
// sgstAmt
//            $fieldName = 'sgstAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $sgstAmt = $sgstAmt_check;
//totsgstAmt
//            $fieldName = 'totsgstAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $totsgstAmt = $totsgstAmt_check;
//igstAmt
//            $fieldName = 'igstAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $igstAmt = $igstAmt_check;
//totigstAmt
//            $fieldName = 'totigstAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $totigstAmt = $totigstAmt_check;
//totgstAmt
//            $fieldName = 'totgstAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $totgstAmt = $totgstAmt_check;
//totalmkgbfdisc
//            $fieldName = 'totalmkgbfdisc';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $totalmkgbfdisc = $totalmkgbfdisc_check;
//discountchargeAmt
//            $fieldName = 'discountchargeAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $discountchargeAmt = $discountchargeAmt_check;
//othChrg
//            $fieldName = 'othChrg';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $othChrg = $othChrg_check;
//TotalVa
//            $fieldName = 'TotalVa';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $TotalVa = $TotalVa_check;
//mkgAfterDisPer
//            $fieldName = 'mkgAfterDisPer';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $mkgAfterDisPer = $mkgAfterDisPer_check;
//stColor
//            $fieldName = 'stColor';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $stColor = $stColor_check;

//             $fieldName = 'hallmarkingCharges';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $hallmarkingCharges = $hallmarkingCharges_check;                      //ADDED HALLAMRK CHARGES @SIMRAN:24APR2023
            // START CODE TO ADDED TAX PERCENTAGE @SIMRAN:24APR2023
            $taxPercentage = $taxPercentage_check;                      //ADDED TAX PERCENTAGE @SIMRAN:24APR2023
            // END CODE TO ADDED TAX PERCENTAGE @SIMRAN:24APR2023
//stClarity
//            $fieldName = 'stClarity';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $stClarity = $stClarity_check;
//mkgAfterDisGm
//            $fieldName = 'mkgAfterDisGm';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $mkgAfterDisGm = $mkgAfterDisGm_check;

//            $fieldName = 'amt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemFinalAmt = $amt_check;
//
//            $fieldName = 'itemWtType';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemWtType = $itemWtType_check;
//Adding code for diamond valuation by default
            $fieldName = 'diamondValuetion';
            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$diafieldName' and label_type = '$labelType'"));
            $label_field_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
            $diamondValuechk = $label_field_check;

            if ($itemWtType == 'true') {
                $iWtType = 'GM';
            }

//            $fieldName = 'totalMetalLb';
//            parse_str(getTableValues("SELECT label_field_check,label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $totalMetalLb = $totalMetalLb_check;
            $totalMetalLbVal = $totalMetalLb_content;
            //
            $metalLbColSpan = 4;
            if ($itemSNoLb != true) {
                $metalLbColSpan = $metalLbColSpan - 1;
            }
            if ($itemIdLb != true) {
                $metalLbColSpan = $metalLbColSpan - 1;
            }
            if ($design != true) {
                $metalLbColSpan = $metalLbColSpan - 1;
            }
            if ($itemDescLb != true) {
                $metalLbColSpan = $metalLbColSpan - 1;
            }
            if ($hallMarkUid != true) {
                $metalLbColSpan = $metalLbColSpan - 1;
            }
//
            $fieldName = 'totalGsWt';
//            parse_str(getTableValues("SELECT label_field_check AS totalGsWtCheck FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $totalGsWtCheck = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
            $fieldName = 'totalNtwt';
//            parse_str(getTableValues("SELECT label_field_check AS totalFnWtCheck FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $totalFnWtCheck = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
//            if ($totalMetalLb == 'true') {
            if ($goldPresent == 'yes' && $totalMetalLb_check == 'true') {
                ?>
                <tr class="total-bottom"> 
                <?php
                $totaColspan = '';
                ?>
                <?php
                if ($itemSNoLb == 'true') {
                    $totaColspan += 1;
                }
                if ($itemIdLb == 'true') {
                    $totaColspan += 1;
                }
                if ($design == 'true' && $designpresent == 'yes') {
                    $totaColspan += 1;
                }
                if ($itemDescLb == 'true') {
                    $totaColspan += 1;
                }
                    if ($itemcategoryLb == 'true') {
                         $totaColspan += 1;
                     }
                if ($brandName == 'true' && $brand == 'yes') {
                    $totaColspan += 1;
                }
                if ($hallMarkUid == 'true') {
                    $totaColspan += 1;
                }
                    if ($itemCounter == 'true') {
                        $totaColspan += 1;
                    }
                //echo '$totaColspan=='. $totaColspan;
                ?>
                    <td align="left" valign="top" colspan="<?php echo $totaColspan; ?>">
                        <!--<div class="paddingLeft5" style ="font-size:<?php echo $qtyLabelFontSize; ?>px;color:<?php echo $qtyLabelColor; ?>;display: inline;">-->
                    <?php echo '<b>' . $totalMetalLbVal . " GOLD :"; ?>
                        <!--</div>--> 
                    </td>

                        <?php
//                    $fieldName = 'totalQtyLb';
//                    $label_field_font_size = '';
//                    $label_field_font_color = '';
//                    $label_field_content = '';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $qtyLabelContent = $totalQtyLb_content;
                        $qtyLabelFontSize = $totalQtyLb_size;
                        $qtyLabelColor = $totalQtyLb_color;
                        //
//                    $fieldName = 'totalQty';
//                    $label_field_font_size = '';
//                    $label_field_font_color = '';
//                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $totalQtyLabelFeildCheck = $totalQty_check;
                        ?>
                    <!-----------START CODE TO SHOW TOTAL METAL AMOUNT PROPERLY,@AUTHOR:HEMA10SEP2020------>


                    <!--------END CODE TO SHOW TOTAL METAL AMOUNT PROPERLY,@AUTHOR:HEMA10SEP2020-------->
                    <?php
                    if ($hallMarkUid == 'true') {
                        ?>
        <!--                        <td align="center" valign="top"> 
                            </td>-->
                    <?php } ?>
                    <?php
                    if ($QtyLb == 'true') {
                        ?>
                        <td align="center" valign="top">                  
                            <!--<div class="paddingLeft5" style ="font-size:<?php echo $totalQty_size; ?>px;color:<?php echo $totalQty_color; ?>;display: inline;">-->
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
                            <!--</div>-->
                        </td>
                        <?php }  if ($itemmodelNocheck == 'true' && $slPrItemModelNo != '') { ?>
                                                <td align="center" class="paddingRight5">
                                                       
                                                    </td>
                                                <?php } ?>
                        <?php if ($design == 'true' && $designpresent == 'yes') { ?>
        <!--                        <td align="center" valign="top">
                            
                        </td>-->
                    <?php } ?>
                    <?php if ($itemSNoLb == 'true') { ?>
        <!--                        <td align="center" valign="top">
                            
                        </td>-->
                    <?php } ?>
                    <!------START CODE TO SHOW TOTAL METAL AMOUNT PROPERLY,@AUTHOR:HEMA10SEP2020------>
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
                        <?php
                        if ($itemHSNLb == 'true' && $hsnpresent == 'yes') {
//                        echo 'kkk';
                            ?>
                        <td align="center" valign="top">
                            <!--<div class="paddingLeft5" style ="font-size:<?php echo $qtyLabelFontSize; ?>px;color:<?php echo $qtyLabelColor; ?>;display: inline;">-->
                        <?php
                        if ($itemIdLb != true && $design != true && $itemDescLb != true && $QtyLb != true && $unitPriceLb != true) {
                            echo "GOLD :";
                            ?>
                            <?php } ?>
                            <!--</div>--> 
                        </td>
                   <?php }  if ($itemDescLb == 'true') { ?>
<!--                        <td></td>-->
                        <?php } ?>
    <?php
                    if ($OtherInfo == 'true' && $otherinfo == 'yes') {
                    ?>
                    <td align="center" class="paddingRight5">

                     </td>
                    <?php } ?>
                    <?php //if ($sizePresent == 'yes') { ?>
    <!--                        <td align="center" class="paddingRight5">

    </td> -->
                    <?php //}  ?>
                    <!------END CODE TO SHOW TOTAL METAL AMOUNT PROPERLY,@AUTHOR:HEMA10SEP2020------->
    <?php
//                    $fieldName = 'totalGsWtLb';
//                    $label_field_font_size = '';
//                    $label_field_font_color = '';
//                    $label_field_content = '';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
    $GsWtLabelContent = $totalGsWtLb_content;
    $GsWtLabelFontSize = $totalGsWtLb_size;
    $GsWtLabelColor = $totalGsWtLb_color;
    //
//                    $fieldName = 'totalGsWt';
//                    $label_field_font_size = '';
//                    $label_field_font_color = '';
//                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check "
//                                    . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
//                                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
    $totalGsWtLabelFeildCheck = $totalGsWt_check;

//                    if ($itemGsWt == 'true') {
// //                        
    ?>
    <!--                         <td valign="top" style="text-align: right; padding-right: 6px !important; ">
    //                             <div class="paddingLeft5" style ="font-size://<?php echo $ltotalGsWt_size; ?>px;color:<?php echo $totalGsWt_color; ?>;display: inline;"> -->

                    <?php
//                             if ($itemIdLb == true && $design != true && $itemDescLb != true && $QtyLb != true && $unitPriceLb != true) {
//                                 echo "GOLD :";
//                                 
                    ?>
                    <?php //} ?>
                    <!--</td>-->
                    <?php //}   ?>
                    <?php if ($itemSize_check == 'true') { ?>
                        <td align="center" class="paddingRight5">

                        </td> 
                    <?php } ?>  

    <?php
    // commented to get total gross wt
     if ($itemGsWt == 'true') {
      ?>
                        <td align="right" valign="top" style="text-align: right; padding-right: 6px !important;">
                            <?php echo number_format($goldTotGsWt, 3) . ' ' . $iWtType; 
                                if ($totalStGsWt_check == 'true') { ?>
                                    <div> <?php 
                                      if ($goldStoneCnt!= 0){
                                         echo number_format($goldStoneCnt, 3); 
                                      } ?>
                                    </div>
                                <?php  } ?>
                        </td>
                    <?php } ?>
                    <!--</div>-->

                    <!----------START CODE TO SHOW TOTAL METAL AMOUNT PROPERLY,@AUTHOR:HEMA10SEP2020-------->
                    <?php if ($itemPktWtLb == 'true') { ?>
                        <td align="right" valign="top">
                            <!--<div class="paddingLeft5" style ="font-size:<?php echo $qtyLabelFontSize; ?>px;color:<?php echo $qtyLabelColor; ?>;display: inline;">-->


                            <!--</div>--> 
                        </td>
    <?php } ?>
    <?php if ($itemNtWt == true) { ?>
                        <td align="right" valign="top" style="text-align: right; padding-right: 6px !important;">
                            <!--<div class="" style ="font-size:<?php echo $totalGsWt_size; ?>px;color:<?php echo $totalGsWt_color; ?>; padding-right:5px;">-->
                        <?php echo number_format($goldTotNetWt, 3) . ' ' . $iWtType; ?> 
                            <!--</div>--> 
                        </td>
    <?php } ?>
                        <?php if ($itemWtType == 'true') { ?>
                        <!--<td></td>-->
    <?php } ?>
                    <?php
                    if ($itemProcessWt == true && $processwtpresent == 'yes') {
//                                                    echo 'hoo';
                        ?>
                        <td align="center" valign="top">
                            
                        </td>
                    <?php } ?>
                    <?php if ($valAddedAmt == 'true') {
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>
                        <?php
                    }
                    if ($itemPurity == 'true') {
                        ?>
                        <td align="center" valign="top">
                            
                        </td>
                    <?php } ?>
                    <?php if ($itemCustWsWt == 'true') { ?>
                        <td align="center" class="paddingRight5">

                        </td> 
                    <?php } if($itemWstgWt == 'true'){ ?>
                        <td align="center" valign="top">

                        </td>
                        
                    <?php
                    }
                    if ($itemWSWt == 'true') {
//                                                    echo '$itemWSWt'.$itemWSWt;
                        ?>
                        <td align="center" valign="top">

                        </td>
                    <?php } ?>

    <?php
//                    echo '$itemFinalPurity=='.$itemFinalPurity.'<br>';
    if ($itemFinalPurity == 'true') {
//                                                    echo '$itemFinalPurity'.$itemFinalPurity;
        ?>
                        <td align="center" valign="top">

                        </td>
                    <?php } ?>
                    <?php
                    if ($itemFinalPurityWtCsWs == 'true') {
//                                                    echo '$itemFinalPurityWtCsWs'.$itemFinalPurityWtCsWs;
                        ?>
                        <td align="center" valign="top">

                        </td>
                    <?php } ?>
                    <!--START CODE FOR VA WT @AUTHOR SIMRAN:1NOV2022-->
    <?php
    if ($valAdded == 'true' && $custwasatagepresent == 'yes') {
//                                                    echo '$valAdded'.$valAdded;
        ?>
                        <td align="center" valign="top">

                        </td>
                    <?php } ?>
                    <?php
                    if ($itemFnWt == 'true' && $invoicePanel != 'sellInvLayA6' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                        ?>
                        <td align="right" valign="top" style="text-align: right;padding-right: 6px !important;">

                        <?php
//                            if ($totalNtwtLabelFieldCheck == 'true') { // commented to get total fine wt
                        if ($itemFnWt == 'true') {
                            echo decimalVal($totalGoldFnWt, 3) . ' ' . $iWtType;
                        }
                        ?>
                        </td> 
                        <?php } ?>
                    <!--START CODE FOR VA WT @AUTHOR SIMRAN:1NOV2022-->  
                    <!--------END CODE TO SHOW TOTAL METAL AMOUNT PROPERLY5555555555555556,@AUTHOR:HEMA10SEP2020-------->
                        <?php
//                    $fieldName = 'totalNtwtLb';
//                    $label_field_font_size = '';
//                    $label_field_font_color = '';
//                    $label_field_content = '';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $ffnWtLabelContent = $totalNtwtLb_content;
                        $ffnWtLabelFontSize = $totalNtwtLb_size;
                        $ffnWtLabelColor = $totalNtwtLb_color;
                        //
//                    $fieldName = 'totalNtwt';
//                    $label_field_font_size = '';
//                    $label_field_font_color = '';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
//                                    . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
//                                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $totalNtwtLabelFieldCheck = $totalNtwt_check;
                        if ($itemFfnWt == 'true' && $invoicePanel != 'sellInvLayA6' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                            ?>
                        <td align="right" valign="top" style="text-align: right;padding-right: 6px !important;">

                        <?php
//                            if ($totalNtwtLabelFieldCheck == 'true') { // commented to get total fine wt
                        if ($itemFfnWt == 'true') {
                            echo decimalVal($totalGoldFfnWt, 3) . ' ' . $iWtType;
                        }
                        ?>
                        </td> 
                        <?php } ?>
                        <?php
//                    if ($itemWtType == 'true') {
//                        if ($metalRate == 'true' && $metalRateByPurity == 'true') {  // added and condition by sarvesh
                            ?>
<!--                            <td align="center" class="paddingRight5">

                            </td>-->
                            <?php
//                        }
//                    } else {
                        if ($metalRate == 'true' || $metalRateByPurity == 'true') {  // added and condition by sarvesh
                            ?>
                            <td align="center" class="paddingRight5">
                            </td>
                            <?php
                        }
//                    }
                    if ($rateByPurity == 'true') {
                        ?>
                        <td align="center" class="paddingRight5">
                        </td>
                        <?php
                    }
                    if ($labour_check == 'true' && ($mkgresent == 'yes' || $labpresent == 'yes')) {
//                        echo 'hi 1';
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>
                        <?php
                    }
                    if ($mkgAfterDisPer == 'true' && $mkgAfterDiscInPerPresent == 'YES') {
//                        echo 'hi 2';
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>
                        <?php
                    }
                    if ($mkg_chrg_val == 'true') {
                        if ($sttr_total_making_charges == '0.00' || $sttr_total_making_charges != '0.00' || $sttr_total_making_charges == NULL || $sttr_total_making_charges == '') {
                            ?>
                            <td align="right" class="paddingRight5" style ="font-size:<?php echo $totalNtwt_size; ?>px;color:<?php echo $totalNtwt_color; ?>;">
                            <?php echo number_format(($goldMkg_ch), 2); ?>
                            </td>
                            <?php
                        }
                    }
                            if ($hallmarkingCharges == 'true') {
//                        echo 'hi 2';
                        ?>
                        <td align="center" class="paddingRight5">
                            <?php //echo number_format($totalHallmarkCharges,2).'HHHH';  ?>
                            <?php echo number_format($totalHallGold, 2); ?>
                        </td>
                        <?php
                    }
                    if ($stColor == 'true' && ($noOfCry > 0 || $crystalPresent == 'yes')) {
//                        echo 'hi 2';
                        ?>                       
                        <td align="center" class="paddingRight5">
-
                        </td>
                        <?php
                    }
                    if ($stClarity == 'true' && ($noOfCry > 0 || $crystalPresent == 'yes')) {
//                        echo 'hi 2';
                        ?>
                        <td align="center" class="paddingRight5">
-
                        </td>
                        <?php
                    }
                    if ($mkgAfterDisGm == 'true' && $mkgAfterDiscInGmPresent == 'YES') {
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>
                        <?php
                    }
                    if ($val == 'true') {
//                        echo 'k$val == 11='.$val.'<br>';
                        ?>
                        <td align="center" class="paddingRight5" style ="font-size:<?php echo $totalNtwt_size; ?>px;color:<?php echo $totalNtwt_color; ?>;">
                        <?php echo $goldTotalVal; ?>
                        </td>
                        <?php
                    }
                    if ($metal_val == 'true') {
                        ?>
                        <td align="center" class="paddingRight5" style ="font-size:<?php echo $totalNtwt_size; ?>px;color:<?php echo $totalNtwt_color; ?>;">
                        <?php echo number_format($goldMetalAmt, 2); ?>
                        </td>
                        <?php
                    }
                    if ($totalmkgbfdisc == 'true') {
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>
                        <?php
                    }
                    if ($discountchargeAmt == 'true' && (($sttr_stone_discount_amt != 0 && $sttr_stone_discount_amt != '') || ($sttr_metal_discount_amt != 0 && $sttr_metal_discount_amt != '') || ($sttr_mkg_discount_amt != '' && $sttr_mkg_discount_amt != 0) || ($mkgDiscountPresent == 'YES') || ($metalDiscountPresent == 'YES') || ($stoneDiscountPresent == 'YES')) && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>
                        <?php
                    }

                    //START CODE TO ADDED HALLAMARK CHARGES TOTAL DIV @SIMRAN@24APR2023  


                    //END CODE TO ADDED HALLAMARK CHARGES TOTAL DIV @SIMRAN@24APR2023
                    //START CODE TO ADDED TAX PERCENTAGE TOTAL DIV @SIMRAN@24APR2023
                    if ($taxPercentage_check == 'true') {
                        ?> 
                        <td align="center" class="paddingRight5">

                        </td>
                        <?php
                    }
                    //START CODE TO ADDED TAX PERCENTAGE TOTAL DIV @SIMRAN@24APR2023

                    if ($othChrg == 'true') {
                        ?>
                        <td align="center" class="paddingRight5">
                            
                        </td>
                        <?php
                    }
                    if ($TotalVa == 'true') {
//                        echo 'kkk';
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>
                        <?php
                    }
                    if ($total_valwithmkg == 'true') {
//                        echo 'llll';
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>
                        <?php
                    }
                    if ($totalCrystal == 'true' && $crystalPresent == 'yes') {
                        ?>
                        <td align="center" class="paddingRight5">
                        </td>
                        <?php
                    }
                    if ($fieldName == 'true' && $cgstpresent == 'yes') {
//                            echo 'hi 13';
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>
                        <?php
                    }
                    if ($itemCombineGstPer == 'true' && ($cgstpresent == 'yes' || $sgstpresent == 'yes' || $igstpresent == 'yes')) {
                        ?>
                        <td align="center" class="paddingRight5"> </td> 
                        <?php
                    }
                    if ($itemCombineGstAmt == 'true' && ($cgstpresent == 'yes' || $sgstpresent == 'yes' || $igstpresent == 'yes')) {
                        ?>
                        <td align="center" class="paddingRight5">  <?php echo $mainTotalGstAmtGold; ?> </td> 
                        <?php
                    }

                    if ($cgstAmt == 'true' && $cgstpresent == 'yes') {
                        ?>
                        <td align="center" class="paddingRight5"> </td> 
                        <?php
                    }
                    if ($totcgstAmt == 'true' && $sttr_tot_price_cgst_per > 0 && $sttr_tot_price_cgst_chrg > 0) {
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>
                        <?php
                    }
                    if ($sgstAmt == 'true' && $sgstpresent == 'yes') {
                        ?>
                        <td align="center" class="paddingRight5">

                        </td> 
                        <?php
                    }
                    if ($totsgstAmt == 'true' && $sttr_tot_price_sgst_per > 0 && $sttr_tot_price_sgst_chrg > 0) {
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>
                        <?php
                    }
                    if ((($sttr_mkg_igst_per != '' && $sttr_mkg_igst_per != 0)) || (($sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0)) && $custInvLay != 'InvLayWoGst') {
                        if ($igstAmt == 'true' && $igstpresent == 'yes') {
                            ?>
                            <td align="center" class="paddingRight5">

                            </td>
                            <?php
                        }
                    }
                    if ($totigstAmt == 'true' && $sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0) {
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>
                        <?php
                    }
                    if ($totgstAmt == 'true' && $sttr_tot_price_igst_per > 0 && $sttr_tot_price_igst_chrg > 0) {
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>  
                        <?php
                    }
//                    $fieldName = 'itemFixedMrpPrice';
//                    $label_field_check = '';
//                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($itemFixedMrpPrice_check == 'true') {
                        ?>
                        <td align="right" class="paddingRight5" style="text-align:right;">
                        <?php echo number_format($goldFixedPrice); ?>
                        </td>
                        <?php
                    }
                    if ($crystalPresent == 'yes' && $paymentMode == 'NoRateCut') {
                        ?>
                        <td align="right" class="paddingRight5" style="text-align:right;">
                        <?php echo ' ' ?> 
                        </td>
                        <?php
                    }
                    //Diamond valuation
                    // echo "diamond value check".$diamondValuechk;
                    if ($diamondValuechk == 'true' && $crystalPresent == 'yes') {
                        ?>
                        <td align="right" class="paddingRight5" style="text-align:right;">

                        </td>
                    <?php }
                     if ($diaWt_check == 'true' && $crystalPresent == 'yes') {
                    ?>
                                <td align="center" class="paddingRight5">
                                    -
                                </td>
    <?php
                            }
                            if ($stoneWt_check == 'true' && $crystalPresent == 'yes') {
                                ?>
                                <td align="center" class="paddingRight5">
                                    -
                                </td>
                                <?php
                            }
    if ($itemFinalAmt == 'true' && ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes')) {
        ?>
                        <!--<td></td>-->
                        <td align="left" class="" style ="padding-right: 6px !important;font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>; text-align:left;">
                        <?php
                        echo number_format($goldTotalVal + $totalHallGold, 2);
//                                        echo '-';
                        ?>
                        </td>
                    <?php }else if ($itemFinalAmt == 'true' && ($paymentMode == 'NoRateCut' || $crystalPresent == 'yes')) {
                            ?>
                        <td align="left" class="" style ="padding-right: 6px !important;font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>; text-align:left;">
                            <?php
                            echo number_format($goldTotalVal + $totalHallGold, 2);
                            ?>
                        </td>
                        <?php } ?>
                </tr>
                        <?php
                    } if ($silverPresent == 'yes' && $totalMetalLb_check == 'true') {
                        ?>
                <tr class="total-bottom"> 
                <?php
                $totaColspan = '';
                ?>
                <?php
                if ($itemSNoLb == 'true') {
                    $totaColspan += 1;
                }
                if ($itemIdLb == 'true') {
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
                    if ($itemCounter == 'true') {
                        $totaColspan += 1;
                    }
                // echo '$totaColspan=='. $totaColspan;
                ?>
                    <td align="left" valign="top" colspan="<?php echo $totaColspan; ?>">
                        <!--<div class="paddingLeft5" style ="font-size:<?php echo $qtyLabelFontSize; ?>px;color:<?php echo $qtyLabelColor; ?>;display: inline;">-->
                    <?php echo '<b>' . $totalMetalLbVal . " SILVER :"; ?>
                        <!--</div>--> 
                    </td>

                        <?php
//                    $fieldName = 'totalQtyLb';
//                    $label_field_font_size = '';
//                    $label_field_font_color = '';
//                    $label_field_content = '';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $qtyLabelContent = $totalQtyLb_content;
                        $qtyLabelFontSize = $totalQtyLb_size;
                        $qtyLabelColor = $totalQtyLb_color;
                        //
//                    $fieldName = 'totalQty';
//                    $label_field_font_size = '';
//                    $label_field_font_color = '';
//                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $totalQtyLabelFeildCheck = $totalQty_check;
                        ?>
                    <!-----------START CODE TO SHOW TOTAL METAL AMOUNT PROPERLY,@AUTHOR:HEMA10SEP2020------>


                    <!--------END CODE TO SHOW TOTAL METAL AMOUNT PROPERLY,@AUTHOR:HEMA10SEP2020-------->
                    <?php
                    if ($hallMarkUid == 'true') {
                        ?>
        <!--                        <td align="center" valign="top">  
                            </td>-->
                    <?php } ?>                    
                    <?php
                    if ($QtyLb == 'true') {
                        ?>
                        <td align="center" valign="top">                       
                            <!--<div class="paddingLeft5" style ="font-size:<?php echo $totalQty_size; ?>px;color:<?php echo $totalQty_color; ?>;display: inline;">-->
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
                            <!--</div>-->
                        </td>
                        <?php }  if ($itemmodelNocheck == 'true' && $slPrItemModelNo != '') { ?>
                                                <td align="center" class="paddingRight5">
                                                       
                                                    </td>
                                                <?php } ?>
                        <?php if ($design == 'true' && $designpresent == 'yes') { ?>
        <!--                        <td align="center" valign="top">

                        </td>-->
                    <?php } ?>
                    <?php if ($itemSNoLb == 'true') { ?>
        <!--                        <td align="center" valign="top">

                        </td>-->
                    <?php } ?>                    
                    <!------START CODE TO SHOW TOTAL METAL AMOUNT PROPERLY,@AUTHOR:HEMA10SEP2020------>
    <?php if ($unitPriceLb == 'true') { ?>
                        <td align="center" valign="top">
                            <!--<div class="paddingLeft5" style ="font-size:<?php echo $qtyLabelFontSize; ?>px;color:<?php echo $qtyLabelColor; ?>;display: inline;">-->
                        <?php
                        if ($itemSNoLb != true && $itemIdLb != true && $design != true && $itemDescLb != true && $QtyLb != true) {
                            echo "SILVER :";
                            ?>
                            <?php } ?>
                            <!--</div>--> 
                        </td>
                        <?php } ?>
                        <?php
                        if ($itemHSNLb == 'true' && $hsnpresent == 'yes') {
//                        echo 'kkk';
                            ?>
                        <td align="center" valign="top">
                            <!--<div class="paddingLeft5" style ="font-size:<?php echo $qtyLabelFontSize; ?>px;color:<?php echo $qtyLabelColor; ?>;display: inline;">-->
                        <?php
                        if ($itemSNoLb != true && $itemIdLb != true && $design != true && $itemDescLb != true && $QtyLb != true && $unitPriceLb != true) {
                            echo "SILVER :";
                            ?>
                            <?php } ?>
                            <!--</div>--> 
                        </td>
                    <?php } if ($itemCategory_check == 'true') { ?>
                        <td align="center" class="paddingRight5">

                        </td>
                    <?php }  if ($itemDescLb == 'true') { ?>
                        <!--<td></td>-->
    <?php } ?>
    <?php
                    if ($OtherInfo == 'true' && $otherinfo == 'yes') {
                        
    ?>
                            <td align="center" class="paddingRight5">

</td> 
                    <?php } ?>
                    <?php if ($itemSize_check == 'true') { ?>
                            <td align="center" class="paddingRight5">

                            </td> 
                    <?php }  ?>
                    <!------END CODE TO SHOW TOTAL METAL AMOUNT PROPERLY,@AUTHOR:HEMA10SEP2020------->
    <?php
//                    $fieldName = 'totalGsWtLb';
//                    $label_field_font_size = '';
//                    $label_field_font_color = '';
//                    $label_field_content = '';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
    $GsWtLabelContent = $totalGsWtLb_content;
    $GsWtLabelFontSize = $totalGsWtLb_size;
    $GsWtLabelColor = $totalGsWtLb_color;
    //
//                    $fieldName = 'totalGsWt';
//                    $label_field_font_size = '';
//                    $label_field_font_color = '';
//                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check "
//                                    . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
//                                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
    $totalGsWtLabelFeildCheck = $totalGsWt_check;

    // if ($itemGsWt == 'true') {
    ?>
                    <!--    <td valign="top" style="text-align: right; padding-right: 6px !important; ">
                            <!--<div class="paddingLeft5" style ="font-size:<?php echo $ltotalGsWt_size; ?>px;color:<?php echo $totalGsWt_color; ?>;display: inline;">-->

                    <?php
                    //if ($itemSNoLb != true && $itemIdLb != true && $design != true && $itemDescLb != true && $QtyLb != true && $unitPriceLb != true) {
                    //  echo "SILVER :";
                    ?>
                    <?php // }     ?>
                    <!--  </td> -->
                    <?php // }    ?>

                    <?php
                    // commented to get total gross wt
                    if ($itemGsWt == 'true') {
                        ?>
                        <td align="right" valign="top" style="text-align: right; padding-right: 6px !important;">

                            <?php
                            echo number_format($silverTotGsWt, 3) . ' ' . $iWtType; 
                               if ($totalStGsWt_check == 'true') { ?>
                                    <div>
                                        <?php 
                                            if($silverStoneCnt != 0){
                                               echo number_format($silverStoneCnt, 3);
                                           } 
                                           ?>
                                    </div>
                            <?php  } ?>
                        </td>
                    <?php } ?>


                    <!--</div>-->

                    <!----------START CODE TO SHOW TOTAL METAL AMOUNT PROPERLY,@AUTHOR:HEMA10SEP2020-------->
    <?php if ($itemPktWtLb == 'true') { ?>
                        <td align="right" valign="top">
                            <!--<div class="paddingLeft5" style ="font-size:<?php echo $qtyLabelFontSize; ?>px;color:<?php echo $qtyLabelColor; ?>;display: inline;">-->
        <?php
        if ($itemSNoLb != true && $itemIdLb != true && $design != true && $itemDescLb != true && $QtyLb != true && $unitPriceLb != true && $itemHSNLb != true && $itemGsWt != true) {
//                                                                echo "GOLD :";
        }
        ?>
                            <?php //}        ?>
                            <!--</div>--> 
                        </td>
                        <?php } ?>
                        <?php if ($itemNtWt == true) { ?>
                        <td align="right" valign="top" style="text-align: right; padding-right: 6px !important;">
                            <!--<div class="" style ="font-size:<?php echo $totalGsWt_size; ?>px;color:<?php echo $totalGsWt_color; ?>; padding-right:5px;">-->
                        <?php echo number_format($silverTotNetWt, 3) . ' ' . $iWtType; ?> 
                            <!--</div>--> 
                        </td>
    <?php } ?>
                        <?php
                        if ($itemProcessWt == true && $processwtpresent == 'yes') {
//                                                    echo 'hoo';
                            ?>
                        <td align="center" valign="top">

                        </td>
                    <?php } ?>
                    <?php if ($valAddedAmt == 'true') {
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>
                        <?php
                    } if ($itemPurity == 'true') {
                        ?>
                        <td align="center" valign="top">
                            
                        </td>
                    <?php } ?>
                    <?php if ($itemCustWsWt == 'true') { ?>
                        <td align="center" class="paddingRight5">
                        </td>
                    <?php } if($itemWstgWt == 'true'){ ?>
                        <td align="center" valign="top">

                        </td>
                        
                    <?php
                    } 
                    if ($itemWSWt == 'true') {
//                                                    echo '$itemWSWt'.$itemWSWt;
                        ?>
                        <td align="center" valign="top">

                        </td>
                    <?php } ?>

    <?php
//                    echo '$itemFinalPurity=='.$itemFinalPurity.'<br>';
    if ($itemFinalPurity == 'true') {
//                                                    echo '$itemFinalPurity'.$itemFinalPurity;
        ?>
                        <td align="center" valign="top">

                        </td>
                    <?php } ?>
                    <?php
    if ($itemFinalPurityWtCsWs == 'true') {
//                                                    echo '$itemFinalPurityWtCsWs'.$itemFinalPurityWtCsWs;
        ?>
                        <td align="center" valign="top">

                        </td>
    <?php } ?>
                    <!--START CODE FOR VA WT @AUTHOR SIMRAN:1NOV2022-->
                    <?php
                    if ($valAdded == 'true' && $custwasatagepresent == 'yes') {
//                                                    echo '$valAdded'.$valAdded;
                        ?>
                        <td align="center" valign="top">

                        </td>
    <?php } ?>
                        <?php
                         if ($itemFnWt == 'true' && $invoicePanel != 'sellInvLayA6' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                        ?>
                        <td align="right" valign="top" style="text-align: right;padding-right: 6px !important;">

                            <?php
//                            if ($totalNtwtLabelFieldCheck == 'true') { // commented to get total fine wt
                            if ($itemFnWt == 'true') {
                                echo decimalVal($totalSilverFnWt, 3) . ' ' . $iWtType;
                            }
                            ?>
                        </td> 
                    <?php } ?>
                    <!--START CODE FOR VA WT @AUTHOR SIMRAN:1NOV2022-->
                    <!--------END CODE TO SHOW TOTAL METAL AMOUNT PROPERLY,@AUTHOR:HEMA10SEP2020-------->
                    <?php
//                    $fieldName = 'totalNtwtLb';
//                    $label_field_font_size = '';
//                    $label_field_font_color = '';
//                    $label_field_content = '';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $ffnWtLabelContent = $totalNtwtLb_content;
                    $ffnWtLabelFontSize = $totalNtwtLb_size;
                    $ffnWtLabelColor = $totalNtwtLb_color;
                    //
//                    $fieldName = 'totalNtwt';
//                    $label_field_font_size = '';
//                    $label_field_font_color = '';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
//                                    . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
//                                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $totalNtwtLabelFieldCheck = $totalNtwt_check;
                    if ($itemFfnWt == 'true' && $invoicePanel != 'sellInvLayA6' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                        ?>
                        <td align="right" valign="top" style="text-align: right;padding-right: 6px !important;">

                        <?php
//                            if ($totalNtwtLabelFieldCheck == 'true') { // commented to get total fine wt
                        if ($itemFfnWt == 'true') {
                            echo decimalVal($totalSilverFfnWt, 3) . ' ' . $iWtType;
                        }
                        ?>
                        </td> 
                        <?php } ?>
                        <?php
        if ($itemWtType == 'true') {
                        if ($metalRate == 'true' && $metalRateByPurity == 'true') {  // added and condition by sarvesh
                            ?>
                            <td align="center" class="paddingRight5">

                            </td>
                            <?php
                        }
                    } else {
                        if ($metalRate == 'true' || $metalRateByPurity == 'true') {  // added and condition by sarvesh
                            ?>
                            <td align="center" class="paddingRight5">

                            </td>
                            <?php
                        }
                    }
//                    }
                    if ($rateByPurity == 'true') {
                        ?>
                        <td align="center" class="paddingRight5">
                        </td>
                        <?php
                    }

                    if ($labour == 'true' && ($mkgresent == 'yes' || $labpresent == 'yes')) {
//                        echo 'hi 1';
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }
    if ($mkgAfterDisPer == 'true' && $mkgAfterDiscInPerPresent == 'YES') {
//                        echo 'hi 2';
        ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }
    if ($mkg_chrg_val == 'true') {
        if ($sttr_total_making_charges == '0.00' || $sttr_total_making_charges != '0.00' || $sttr_total_making_charges == NULL || $sttr_total_making_charges == '') {
            ?>
                            <td align="right" class="paddingRight5" style ="font-size:<?php echo $totalNtwt_size; ?>px;color:<?php echo $totalNtwt_color; ?>;">
                                <?php echo number_format($silverMkg_ch, 2); ?>
                            </td>
                                <?php
                            }
                        }
                        if ($stColor == 'true' && ($noOfCry > 0 || $crystalPresent == 'yes')) {
//                        echo 'hi 2';         
                            ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }
    if ($stClarity == 'true' && ($noOfCry > 0 || $crystalPresent == 'yes')) {
//                        echo 'hi 2';
        ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }

    if (empty($mkgAfterDisGm) || $mkgAfterDisGm != 'true')
 {
        ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }
    if ($val == 'true') {
//                        echo 'k$val == 11='.$val.'<br>';
        ?>
                        <td align="center" class="paddingRight5" style ="font-size:<?php echo $totalNtwt_size; ?>px;color:<?php echo $totalNtwt_color; ?>;">
                        <?php echo $silverTotalVal; ?>
                        </td>
                            <?php
                        }
                        if ($metal_val == 'true') {
                            ?>
                        <td align="center" class="paddingRight5" style ="font-size:<?php echo $totalNtwt_size; ?>px;color:<?php echo $totalNtwt_color; ?>;">
                        <?php echo number_format($silverMetalAmt, 2); ?>
                        </td>
                            <?php
                        }
                        if ($totalmkgbfdisc == 'true') {
                            ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }
    if ($discountchargeAmt == 'true' && (($sttr_stone_discount_amt != 0 && $sttr_stone_discount_amt != '') || ($sttr_metal_discount_amt != 0 && $sttr_metal_discount_amt != '') || ($sttr_mkg_discount_amt != '' && $sttr_mkg_discount_amt != 0) || ($mkgDiscountPresent == 'YES') || ($metalDiscountPresent == 'YES') || ($stoneDiscountPresent == 'YES')) && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
        ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }

    //START CODE TO ADDED HALLAMARK CHARGES TOTAL DIV @SIMRAN@24APR2023
    if ($hallmarkingCharges == 'true') {
//                        echo 'hi 2';
        ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }
    //END CODE TO ADDED HALLAMARK CHARGES TOTAL DIV @SIMRAN@24APR2023
    //START CODE TO ADDED TAX PERCENTAGE TOTAL DIV @SIMRAN@24APR2023
    if ($taxPercentage_check == 'true') {
        ?> 
                        <td align="center" class="paddingRight5">
                            
                        </td>
        <?php
    }
    //END CODE TO ADDED TAX PERCENTAGE TOTAL DIV @SIMRAN@24APR2023
    if ($othChrg == 'true' && $otherChargesPresent == 'yes') {
        ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }
    if ($TotalVa == 'true') {
//                        echo 'kkk';
        ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }
    if ($total_valwithmkg == 'true') {
//                        echo 'llll';
        ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }
    if ($totalCrystal == 'true' && $crystalPresent == 'yes') {
        ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }
    if ($fieldName == 'true' && $cgstpresent == 'yes') {
//                            echo 'hi 13';
        ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }
    if ($itemCombineGstPer == 'true' && ($cgstpresent == 'yes' || $sgstpresent == 'yes' || $igstpresent == 'yes')) {
        ?>
                        <td align="center" class="paddingRight5"> </td> 
                        <?php
                    }
                    if ($itemCombineGstAmt == 'true' && ($cgstpresent == 'yes' || $sgstpresent == 'yes' || $igstpresent == 'yes')) {
                        ?>
                        <td align="center" class="paddingRight5">  <?php echo $mainTotalGstAmtGold; ?> </td> 
                        <?php
                    }

                    if ($cgstAmt == 'true' && $cgstpresent == 'yes') {
                        ?>
                        <td align="center" class="paddingRight5"> </td> 
                        <?php
                    }
                    if ($totcgstAmt == 'true' && $sttr_tot_price_cgst_per > 0 && $sttr_tot_price_cgst_chrg > 0) {
                        ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }
    if ($sgstAmt == 'true' && $sgstpresent == 'yes') {
        ?>
                        <td align="center" class="paddingRight5">

                        </td> 
        <?php
    }
    if ($totsgstAmt == 'true' && $sttr_tot_price_sgst_per > 0 && $sttr_tot_price_sgst_chrg > 0) {
        ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }
    if ((($sttr_mkg_igst_per != '' && $sttr_mkg_igst_per != 0)) || (($sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0)) && $custInvLay != 'InvLayWoGst') {
        if ($igstAmt == 'true' && $igstpresent == 'yes') {
            ?>
                            <td align="center" class="paddingRight5">

                            </td>
            <?php
        }
    }
    if ($totigstAmt == 'true' && $sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0) {
        ?>
                        <td align="center" class="paddingRight5">

                        </td>
        <?php
    }
    if ($totgstAmt == 'true' && $sttr_tot_price_igst_per > 0 && $sttr_tot_price_igst_chrg > 0) {
        ?>
                        <td align="center" class="paddingRight5">

                        </td>  
        <?php
    }
//                    $fieldName = 'itemFixedMrpPrice';
//                    $label_field_check = '';
//                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
    if ($itemFixedMrpPrice_check == 'true') {
        ?>
                        <td align="right" class="paddingRight5" style="text-align:right;">
                        <?php echo number_format($silverFixedPrice); ?>
                        </td>
                            <?php
                        }
                        //Diamond valuation
                        if ($diamondValuechk == 'true' && $crystalPresent == 'yes') {
                            ?>
                        <td align="right" class="paddingRight5" style="text-align:right;">

                        </td>
        <?php
    }
                    if ($diaWt_check == 'true' && $crystalPresent == 'yes') {
                                ?>
                                <td align="center" class="paddingRight5">
                                    -
                                </td>
                                <?php
                            }
                            if ($stoneWt_check == 'true' && $crystalPresent == 'yes') {
                                ?>
                                <td align="center" class="paddingRight5">
                                    -
                                </td>
                                <?php
                            }
                            
    if ($itemFinalAmt == 'true' && ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes')) {
        ?>
                        <td align="left" class="" style ="padding-right: 6px !important;font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>; text-align:left;">
                        <?php
                        echo number_format($silverTotalVal + $totalHallSilver, 2);
//                                        echo '-';
                        ?>
                        </td>
                    <?php }else if ($itemFinalAmt == 'true' && ($paymentMode == 'NoRateCut' || $crystalPresent == 'yes')) {
                            ?>
                        <td align="left" class="" style ="padding-right: 6px !important;font-size:<?php echo $label_field_font_size; ?>px;color:<?php echo $label_field_font_color; ?>; text-align:left;">
                            <?php
                            echo number_format($silverTotalVal + $totalHallSilver, 2);
                            ?>
                        </td>
                        <?php } ?>
                </tr>
                    <?php
                }
//            }
                $totalColumns;
                include 'omtaxpayinfo.php';
                ?>

        </tbody>

    </table>
</td>
</tr>
<?php
//
// **********************************************************************************
// START CODE TO SHOW ON SAMPLE4 TAX DIV DEATILS @AUTHOR:SIMRAN-02MAR2023    
// **********************************************************************************
//
//$selsample4InvTaxDetails = "SELECT omly_value FROM omlayout WHERE omly_option = 'sample4InvTaxDetails'";
//$ressample4InvTaxDetails = mysqli_query($conn, $selsample4InvTaxDetails);
//$rowsample4InvTaxDetails = mysqli_fetch_array($ressample4InvTaxDetails);
$sample4InvTaxDetails = $getLayoutDetails['sample4InvTaxDetails'];
//
// ********************************************************************************
// END CODE TO ON SAMPLE4 TAX DIV DEATILS @AUTHOR:SIMRAN-02MAR2023  
// ********************************************************************************
//
//<!--START CODE TO SHOW/HIDE TOTAL TAX DIV ON SAMPLE 4 INV @SIMRAN:02MAR2023-->
//
if ($sample4InvTaxDetails == 'YES') {
    ?>
    <tr>
        <td>
            <table style="width:96%;margin:2px auto;background:#fff" class="billing-table2">
                <tr class="table-head">
                    <th align="center">hsn code</th>
                    <th align="center">taxable value</th>
                    <th align="center">cgst</th>
                    <th align="center">amt</th>
                    <th align="center">sgst</th>
                    <th align="center">amt</th>
                    <th colspan="2" align="right" style="text-align: right;">total</th>

                </tr>
                <tbody class="table-innerSec">
                    <tr>
                        <td align="center"><?php echo $sttr_hsn_no_pay; ?></td>
                        <td align="center"><?php
    if ($utin_pay_tax_on_total_amt_chk == 'checked') {
        echo formatInIndianStyle($utin_pay_tax_tot_amt);
    } else {
        echo formatInIndianStyle($utin_pay_tax_tot_amt + $totOtherChags);
                                    }?>
                        </td>
                        <td align="center"><?php echo number_format($utin_pay_cgst_chrg, 2); ?></td>
                        <td align="center"><?php echo number_format($utin_pay_cgst_amt, 2); ?></td>
                        <td align="center"><?php echo number_format($utin_pay_sgst_chrg, 2); ?></td>
                        <td align="center"><?php echo number_format($utin_pay_sgst_amt, 2); ?></td>
                        <td colspan="2" align="right" style="text-align: right;"><?php echo number_format($utin_tot_payable_amt - $utin_discount_amt, 2); ?></td>
                    </tr>
                    <tr style="background-color:#FFEAEA">
                        <td colspan="7"  style="text-align:right;padding:5px 10px;color:#000"><b>Closing Balance</b></td>
                        <td style="text-align:right;padding:0px 5px;color:#000"><b><?php echo number_format($utin_cash_balance, 2); ?></b></td>
                    </tr>
                </tbody>

            </table>
        </td>
    </tr>
<?Php } ?>
<!--END CODE TO SHOW/HIDE TOTAL TAX DIV ON SAMPLE 4 INV @Vinod:07June2023-->

<tr>
    <td width="100%">
        <table width="100%" border="0">
            <tr>
                <td width="65%" align="left" valign="top" style="text-align: left; padding-left: 19px;">
                    <table width="95%" style="text-align: left; " align="left" valign="top">
<?php
$fieldName = 'payableAmt';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$label_field_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
$label_field_font_size = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
$label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
$label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
//
$amtsFont = $label_field_font_size;
if ($label_field_check == 'true') {
    $fieldName = 'payableAmtLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
    $label_field_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
    $label_field_font_size = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
    $label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
    $label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
    $fieldName = 'payableAmtLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
    $label_field_font_size = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
    $label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
    $label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
    if ($payableAmtLb_size == 0) {
        $payableAmtLb_size = 12;
    }
    ?>
                        <?php if (($utin_payment_mode == 'NoRateCut' && ($utin_courier_chgs_amt != 0 || $utin_crystal_amt != 0 || $utin_oth_chgs_amt != 0)) || $utin_payment_mode != 'NoRateCut' || $utin_cash_amt_rec != 0) { ?>
                            <?php if ($totalAmount != 0) { ?>
                                <tr>
                                    <td align="left" style="width: 36%;"  class="border-color-grey-bottom border-color-grey-top itemAddPnLabels12Arial font_color_<?php echo $payableAmtLb_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <b style="font-size:<?php echo $payableAmtLb_size; ?>px"> <?php echo $label_field_content; ?> :</b>
                                    </td>                
                                    <td align="left" class="border-color-grey-bottom border-color-grey-top">
        <?php
                                        $totalAmount = round($totalAmount + $roundPlus-$utin_discount_amt-$utin_lp_redeem);
        if ($roundPlus != '' && $roundPlus != 0) {
            echo "$globalCurrency" . ' ' . ucwords(numToWords(round((abs($totalAmount + $roundPlus) + 0)))) . ' Only/-';
//                                echo "$globalCurrency" . ' ' . ucwords(numToWords((abs(($utin_tot_amt_rec + $utin_cash_amt_rec + $utin_pay_cheque_amt + ($utin_pay_card_amt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid))) + 0))) . ' Only/-';
        } else {
            echo "$globalCurrency" . ' ' . ucwords(numToWords((abs($totalAmount - $roundMinus) + 0))) . ' Only/-';
//                                echo "$globalCurrency" . ' ' . ucwords(numToWords((abs(($utin_tot_amt_rec + $utin_cash_amt_rec + $utin_pay_cheque_amt + ($utin_pay_card_amt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid))) + 0))) . ' Only/-';
        }
        ?>
                                    </td>
                                        <?php
                                    }
                        }
                                }
                                ?>
                        </tr>
                        <tr>
                            <!--START CODE TO ADDED FINAL AMT IN WORDS LABEL @Vinod:07June2023-->
                            <td align="left" class="border-color-grey-bottom border-color-grey-top  font_color_<?php echo $cashPaidInWords_color; ?>" style="font-size:<?php echo $amtsFont; ?>px;border: none;">
<?php
//                $fieldName = 'finalPayableAmt';
//                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$fieldName = 'finalPayableAmt';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$label_field_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
$label_field_font_size = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
$label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
$label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
$amtsFont = $label_field_font_size;
if ($label_field_check == 'true') {
    $fieldName = 'finalPayableAmtLb';
//                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
    $label_field_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
    $label_field_font_size = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
    $label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
    $label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
    if ($finalPayableAmtLb_size == 0) {
        $finalPayableAmtLb_size = 12;
    }
    ?>
                                    <b><?php echo $label_field_content; ?> : </b> 
                                </td>
                                <td>
    <?php echo "$globalCurrency" . ' ' . ucwords(numToWords(abs($utin_cash_balance + 0))) . ' Only/-'; ?>
                                </td>
                            </tr>
<?php } ?>
                        <?php
                        $fieldName = 'cashPaidInWords';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check AS cashPaidInWordsCheck FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $cashPaidInWordsCheck = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
                        $label_field_font_size = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
                        $label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
                        $label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
                        $amtsFont = $label_field_font_size;
                        if ($cashPaidInWordsCheck == 'true') {
                            $fieldName = 'cashPaidInWordsLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $label_field_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
                            $label_field_font_size = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
                            $label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
                            $label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];

                            $fieldName = 'cashPaidInWordsLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size as amtsFont,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $amtsFont = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
                            $label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
                            $label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
                            if ($cashPaidInWordsLb_size == 0) {
                                $cashPaidInWordsLb_size = 12;
                            }
                            ?>
                            <tr>
                                <td align="left" style="width: 36%;"  class="border-color-grey-bottom border-color-grey-top itemAddPnLabels12Arial  font_color_<?php echo $cashPaidInWords_color; ?>" >
                                    <b style="font-size:<?php echo $cashPaidInWordsLb_size; ?>px">  <?php
                        if ($label_field_check != '') {
                            echo $label_field_content;
                        } else {
                            echo 'PAID AMOUNT';
                        }
                            ?> :</b>
                                </td>
                                        <?php
//                        $fieldName = 'cashPaidInWords';  // ADD SELECT QUERY FOR AMOUNT FONT-SIZE AND FONT-COLOR  AUTHOR: DIKSHA 03JAN2019
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                <td align="left" class="border-color-grey-bottom border-color-grey-top">
                                <?php
                                $cashPaid = $utin_cash_amt_rec + $utin_pay_cheque_amt + ($utin_pay_card_amt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid);
                                echo "$globalCurrency" . ' ' . ucwords(numToWords(abs($cashPaid + 0))) . ' Only/-';
                                ?>
                                </td>

                            </tr>
<?php } ?>
                        <!--END CODE TO ADDED FINAL AMT IN WORDS LABEL @Vinod:07June2023-->                          
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td width="30%" align="right" style="text-align: right; " valign="top">
                    <table width="100% " align="right" style="text-align: right; " valign="right">
                        <tr>
<?php
$fieldName = 'bankDetails';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$label_field_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
$label_field_font_size = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
$label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
$label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
$amtsFont = $label_field_font_size;
if ($label_field_check == 'true') {
    $fieldName = 'bankDetailsLb';

//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));                  
    $label_field_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
    $label_field_font_size = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
    $label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
    $label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
    if ($bankDetailsLb_size == 0) {
        $bankDetailsLb_size = 12;
    }
    ?>
                                <td width="100%"  align="right" style="text-align: right; " valign="right">
                                    <table width="100%">
    <?php if ($firm_bank_details != '' && $firm_bank_details != NULL) { ?>
                                            <tr>
                                                <td align="left"><b>Bank Name  </b></td>
                                                <td align="center">&nbsp; : &nbsp;</td>
                                                <td align="left"> <?php echo $firm_bank_details; ?></td>
                                            </tr>
        <?php
    }
    if ($firm_bank_acc_no != '' && $firm_bank_acc_no != NULL) {
        ?>
                                            <tr>
                                                <td align="left" ><b>Bank Acc No  </b></td>
                                                <td align="center"> &nbsp;:&nbsp; </td>
                                                <td align="left"> <?php echo $firm_bank_acc_no; ?></td> 
                                            </tr>
        <?php
    }
    if ($firm_bank_ifsc_code != '' && $firm_bank_ifsc_code != NULL) {
        ?>
                                            <tr>
                                                <td align="left"><b>Bank IFSC No  </b></td>
                                                <td align="center"> &nbsp;:&nbsp; </td>
                                                <td align="left"> <?php echo $firm_bank_ifsc_code; ?></td> 
                                            </tr>
        <?php
    }
    if ($firm_bank_declaration != '' && $firm_bank_declaration != NULL) {
        ?>
                                            <tr>
                                                <td align="left"><b>Bank Declaration  </b></td>
                                                <td align="center"> &nbsp;: &nbsp;</td>
                                                <td align="left"> <?php echo $firm_bank_declaration; ?></td> 
                                            </tr>
    <?php } ?>
                                    </table>
                                </td>
<?php } ?>
                        </tr>
                    </table>
                </td> 
            </tr>
        </table>
    </td>
</tr>
<tr align="left" style="justify-content: space-between;">
        <td colspan="<?php echo $colspan; ?>">
            <?php
            // START CODE TO GET INSURANCE DETAILS FROM STOCK_TRANSACTION
//            $qSelSlPrItemCOIDetails = "SELECT sttr_insurance_api,sttr_item_name,sttr_insurance_policy_no,sttr_insurance_pdf_url FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
//                    . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
//                    . "and sttr_indicator IN ('stock') and sttr_transaction_type IN ('sell','ESTIMATESELL') "
//                    . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') AND sttr_firm_id='$utin_firm_id' order by sttr_id ASC";
////        echo $qSelSlPrItemCOIDetails;
//            $resSlPrItemCOIDetailsForJewelAssure = mysqli_query($conn, $qSelSlPrItemCOIDetails);
//            $resSlPrItemCOIDetailsForOlocker = mysqli_query($conn, $qSelSlPrItemCOIDetails);
//            $noOfRowsJA = mysqli_num_rows($resSlPrItemCOIDetailsForJewelAssure);
//            $noOfRowsOL = mysqli_num_rows($resSlPrItemCOIDetailsForOlocker);
                  $noOfRowsOL = 0;
                    $noOfRowsJA = 0;
                    foreach ($getStockTransDetails as $rowSlPrItemCOIDetailsForJewelAssure) {
                        if (($rowSlPrItemCOIDetailsForJewelAssure['sttr_transaction_type'] == 'sell' || $rowSlPrItemCOIDetailsForJewelAssure['sttr_transaction_type'] == 'ESTIMATESELL') && $rowSlPrItemCOIDetailsForJewelAssure['sttr_indicator'] == 'stock') {
                            $sttr_insurance_policy_no = $rowSlPrItemCOIDetailsForJewelAssure['sttr_insurance_policy_no'];
                            $sttr_insurance_pdf_url = $rowSlPrItemCOIDetailsForJewelAssure['sttr_insurance_pdf_url'];
                            $sttr_insurance_api = $rowSlPrItemCOIDetailsForJewelAssure['sttr_insurance_api'];
                            $noOfRowsJA++;
                            $noOfRowsOL++;
                        }
                    }
            if ($noOfRowsJA > 0 || $noOfRowsOL > 0) {
                ?>
<table width="100%" style="padding-right:10px; padding-left: 20px;">
                    <?php
//                    $rowSlPrItemCOIDetailsForJewelAssure = mysqli_fetch_array($resSlPrItemCOIDetailsForJewelAssure, MYSQLI_ASSOC);
                    if ($rowSlPrItemCOIDetailsForJewelAssure['sttr_insurance_api'] == 'jewelAssure') {
                        ?>
                        <tr>
                            <td><span style="font-weight: bold">INSURANCE POLICY NUMBER :</span></td>
                            <td><?php echo $rowSlPrItemCOIDetailsForJewelAssure['sttr_insurance_policy_no']; ?></td>
                        </tr>
                        <tr>
                            <td><span style="font-weight: bold">INSURANCE CERTIFICATE LINK :</span></td>
                            <td><a href="http://<?php echo $rowSlPrItemCOIDetailsForJewelAssure['sttr_insurance_pdf_url']; ?>" target="_blank"><?php echo $rowSlPrItemCOIDetailsForJewelAssure['sttr_insurance_pdf_url']; ?></a></td>
                        </tr>
                        <?php
                    }
                       foreach ($getStockTransDetails as $rowSlPrItemCOIDetailsForJewelAssure) {
                        if ($rowSlPrItemCOIDetailsForOlocker['sttr_insurance_api'] == 'oLocker') {
                            ?>
                                                                                                                                                                                                                        <!--                            <tr>
                                                                                                                                                                                                                        <td><span style="font-weight: bold">INSURANCE POLICY NUMBER :</span></td>
                                                                                                                                                                                                                        <td><?php echo $rowSlPrItemCOIDetailsForOlocker['sttr_insurance_policy_no']; ?></td>
                                                                                                                                                                                                                        </tr>-->
                            <tr>
                                <!--<td><span style="font-weight: bold">INSURANCE CERTIFICATE LINK :</span></td>-->
                                <td><a href="<?php echo $rowSlPrItemCOIDetailsForOlocker['sttr_insurance_pdf_url']; ?>" target="_blank"><?php echo $rowSlPrItemCOIDetailsForOlocker['sttr_insurance_pdf_url']; ?></a></td>
                            </tr>
                            <?php
                            // 
                        }
                    } // WHILE
                    ?>
                </table>
            <?php } ?>
        </td>
    </tr>
<tr>

<tr>
    <td>
        <table width="100%" style="padding-right:10px; padding-left: 20px;">
            <tr align="left" style="justify-content: space-between;">
<?php
//hrushali
$fieldName = 'tnc';
$label_field_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
$label_field_font_size = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
$label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
$label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
if ($label_field_check == 'true') {
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
    ?>
                    <td valign="bottom" >
                        <h4 class="termandconditaminvoice" style="font-size: <?php echo $tncLb_size; ?>px; ">
                    <?php echo $tncLb_content; ?>
                        </h4>
                    </td>
                        <?php } ?>
            </tr>  
            <tr>
                <td style="margin-bottom: 30px; width: 100%; ">
                    <div class="termsDetailsCondition">
<?php
//                        $fieldName = 'tnc';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//$noOfRows = substr_count($label_field_content, "\n") + 2;
//$height = $noOfRows * ($label_field_font_size * 3);
$noOfRows = substr_count($tnc_content, "\n") + 2;
$height = $noOfRows * ($tnc_size * 3);
?>
                        <span id="tncLabel" spellcheck="false" name="tncLabel" class="ff_calibri font_color_<?php echo $tnc_color; ?>" rows="<?php echo $noOfRows; ?>"
                              style="text-align:left;width:50%;height:<?php echo $height; ?>;font-size:<?php echo $tnc_size; ?>px;word-break: break; width:100%;">  
                            <!--// YUVRAJ ADD THIS CODE white-space: pre-wrap; word-break: break; IN CSS YUVRAJ @18082022 --> 
                        <?php echo preg_replace('/\\\\/i', ' ', $tnc_content); ?>                                  
                        </span>  
                    </div>
                </td>
            </tr>
            <tr style="justify-content: space-between;">
                <td>
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td width="50%" style="float:left;">
                            <tr>
<?php
$fieldName = 'authCustSignLb';
//                                $qSelectCustSnap = "SELECT user_sign_snap FROM user WHERE user_id='$userId'";
//                                $resCustSnap = mysqli_query($conn, "$qSelectCustSnap");
//                                $rowCustSnap = mysqli_fetch_array($resCustSnap);
$custSnapFiletype = 'png';
$custSnap = $getUserDetails['user_sign_snap'];
//header("Content-type: $custSnapFiletype"); 
?>
                            </tr>            
                            <tr style="justify-content: space-between; margin:10px 0; ">                   
                                <?php
//                                $fieldName = 'authCustSignLb';
////
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,"
//                                                . "label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
//                                                . "label_field_name = '$fieldName' and label_type = '$labelType'"));
//
                                if ($authCustSignLb_check == 'true') {
//                                    if ($custSnap != "") {
                                    ?>
                                    <td style="width: 50%; font-size:12px; padding:5px;" >
                                        <table>
                                            <tr>
                                                <td width="200px">
    <?php
    if ($custSnap != "") {
        $firmId = $firm_id;
        $noEcho = 'Y';
        include('omfcustsign.php');
        $noEcho = '';
        ?>
                                                        <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($userThumb); ?>"
                                                             id="sign" border="0" style="border-color: #B8860B;width:150px; height:75px;" alt=""/>
                                                           <!-- <img src="<?php echo $documentRootBSlash; ?>/include/php/omccsnim.php?cust_id=<?php echo "$userId"; ?>" 
                                                                 id="sign" border="0" style="border-color: #B8860B;width:150px; height:75px;" alt=""/> -->
                                                    </td>
    <?php } else {
        ?>
                                                    <td style="height:75px;"></td>
                                                <?php }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td style="font-size: <?php echo $authCustSignLb_size; ?>px; font-weight: bold;"><?php echo $authCustSignLb_content; ?></td>
                                            </tr>                                        
                                        </table>
                                    </td>
    <?php
//                                    }
} else {
    ?>                                
                                    <td style="height: 50px !important; float: left; width: 50%;"></td>
                                <?php } ?>
                                <!-- This is checking new authsign is available or not done by CHETAN 02 MAY 2022 -->
                                <?php
//                                $fieldName = 'authSignLb';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                if ($authSignLb_check == 'true') {
                                    ?>
                                    <td style=" height: 40px;width: 50%;" align="right">
                                        <table>
                                            <tr>
                                                <td style="height: 75px; text-align: right;">
    <?php
    if ($firm_owner_sign_ftype != NULL || $firm_owner_sign_ftype != '') {
        $firmId = $firm_id;
        $noEcho = 'Y';
        include('omffoteri.php');
        $noEcho = '';
        ?>

                                                        <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($ownThumb); ?>"  
                                                             alt="" style="width:75px; "/>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: <?php echo $authSignLb_size; ?>px; font-weight: bold;"><?php echo $authSignLb_content; ?></td>
                                            </tr>
                                        </table>
                                    </td>
<?php } else {
    ?>
                                    <td style="height: 50px !important; width: 50%;" align="right"></td>
                                <?php }
                                ?>
                                <!-- This code end here  -->
                            </tr>    
                                <?php
                                if ($_SESSION['sessionOwnIndStr'][41] == "Y") {
                                    ?>
                                <tr>
                                    <td valign="bottom">
                                <?php
//                                        $fieldName = 'authCustSignLb';
//                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                if ($authCustSignLb_check == 'true') {
                                    ?>
                                            <div id = "customerSignUpdate" class = "modal" style="width:100%;height:100%;margin:auto;padding-top:15px!important;"></div>
                                            <?php if ($whatsappStatus == 'Yes' || $emailStatus == 'Yes') { ?>
                                                <button class="btn1 om_btn_style btn1Hover noPrint" 
                                                        style="border-radius: 5px !important;margin:unset;height:25px;width:50%;
                                                        font-weight:bold;font-size:10px;text-align:center;color:#5146D6;background-color: #F3E59A;display: none;"
                                                        name="updateCustSign" id="updateCustSign" onclick="OpenUpdateCustomerSignModal('<?php echo $userId; ?> ');">
                                                    UPDATE CUSTOMER SIGN                                                            
                                                </button>
        <?php } else { ?>
                                                <button class="btn1 om_btn_style btn1Hover noPrint" 
                                                        style="border-radius: 5px !important;margin:unset;height:25px;width:50%;
                                                        font-weight:bold;font-size:10px;text-align:center;color:#5146D6;background-color: #F3E59A;"
                                                        name="updateCustSign" id="updateCustSign" onclick="OpenUpdateCustomerSignModal('<?php echo $userId; ?> ');">
                                                    UPDATE CUSTOMER SIGN                                                            
                                                </button>
            <?php
        }
    }
    ?>
                                    </td>
                                </tr>
                                        <?php
                                    }
                                    ?>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
 <?php
                                        $fieldName = 'footer';
                                          $label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
                                    $label_field_font_size = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
                                    $label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
                                    $label_field_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
//                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                      
                                    if ($label_field_check == 'true') {
//                                            $fieldName = 'footer';
//                                              $label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
//                                    $label_field_font_size = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
//                                    $label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
//                                    $label_field_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
//                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            ?>
                                            <td align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo  $label_field_font_size; ?>px" colspan="<?php echo $colspan; ?>">
                                                <?php echo $label_field_content; ?>
    </td> 
                                        <?php } ?>  
</tr>
    <td colspan="2">
<?php
//        $fieldName = 'footer_ad_img';
//        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
if ($footer_ad_img_check == 'true') {
    ?>
            <?php
            // parse_str(getTableValues("SELECT image_id,image_user_id,image_user_type FROM image WHERE image_snap_desc = 'SellPurchaseInvAds'"));
            $image_id = $result_home['image']['SellPurchaseInvAds'];
            ?>
            <?php if ($image_id != '') { ?>
                <img width="100%" src="<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo $image_id; ?>" alt=" "
                     />
            <?php } else { ?>
                <img width="100%" src="<?php echo $documentRoot; ?>/images/invoice/1280x500xh.png" alt=" "/>
                 <?php } ?>
             <?php } ?>  
    </td>
</tr>
<!--- bottom sec-->
<tr style="background:#000080">
    <td style="color:transparent"></td>
</tr>
<tr>
    <td align="center">
<?php if ($whatsappStatus == 'Yes' || $emailStatus == 'Yes') { ?>
            <table style="display: none;">
        <?php } else { ?>
                <table>
            <?php } ?>
                <tr>
                    <td align="center" class="noPrint" colspan="<?php echo $colspan; ?>">
                        <a style="cursor: pointer;" 
                           onClick="window.print();">
                            <img src="<?php echo $documentRootBSlash; ?>/images/printer32.png" alt='Print' title='Print'
                                 width="32px" height="32px" /> 
                        </a>
                    </td>

                    <td align="center" class="noPrint">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>

                    <td align="center" class="noPrint" colspan="<?php echo $colspan; ?>">
                        <!-- <a style="cursor: pointer;" 
                           href='localexplorer:D:\lrearth\live\live\htdocs\omunim\2\include\php\bat\omprint.bat' > -->
                        <a style="cursor: pointer;" 
                           href='localexplorer:C:\COM\bat\omprint.bat' >
                            <img src="<?php echo $documentRootBSlash; ?>/images/printer_wifi_32.png" alt='Print' title='Print'
                                 width="32px" height="32px" /> 
                        </a>
                    </td>

                    <td align="center" class="noPrint" colspan="<?php echo $colspan; ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a style="cursor: pointer;" 
                           onClick="var url = window.location.href;
                                   url += '&emailStatus=Yes';
                                   window.location.href = url;" >
                            <img src="<?php echo $documentRootBSlash; ?>/images/email_48x48.png" alt="Send Email" title='Send Email' width="32px" height="32px" />
                        </a>
                    </td>

                    <!-- ADD WHATSAPP OPTION @AUTHOR ashwini solanki 3/6/23 -->
                    <td align="center" class="noPrint" colspan="<?php echo $colspan; ?>">
                        <div id="whatsappInvoiceDiv">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a style="cursor: pointer;" 
                               onClick="document.getElementById('whatsappInvoiceDiv').style.visibility = 'hidden';
                                       document.getElementById('whatsappInvoiceProcessingDiv').style.visibility = 'visible';
                                       var url = window.location.href;
                                       url += '&whatsappStatus=Yes';
                                       window.location.href = url;" >
                                <img src="<?php echo $documentRootBSlash; ?>/images/whatsapp24.png" alt='Send Whatsapp' title='Send Whatsapp' width="32px" height="32px" /> 
                            </a>
                        </div><!-- comment -->
                        <!--                    <a style="cursor: pointer;" 
                                               onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ominvoicepdf.php');" >
                                                <img src="<?php echo $documentRootBSlash; ?>/images/whatsapp24.png" alt='Send Whatsapp' title='Send Whatsapp'
                                                     width="32px" height="32px" /> 
                                            </a>-->
                    </td>
                    <td align="center" class="noPrint" colspan="<?php echo $colspan; ?>">
                        <div id="whatsappInvoiceProcessingDiv" style="visibility:hidden; ">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sending...
                        </div>
                    </td>

                </tr>
            </table>
    </td>
</tr>
