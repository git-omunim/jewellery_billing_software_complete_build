<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 2 May, 2018 9:47:35 PM
 *
 * @FileName: omsetupformstocktrans_jewellery.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php

// ***************************************************************************
// Start Code To Create Array For Fine Jwellery Form Setup
// ***************************************************************************
//
//
$fineJewelleryPurchase = array("sttr_add_date", "sttr_firm_id", "sttr_product_type", "sttr_item_pre_id",
    "sttr_item_id", "sttr_brand_id", "sttr_barcode", "sttr_account_id",
    "sttr_bis_mark",
    "sttr_image_id", "sttr_item_category", "sttr_item_name", "sttr_size",
    "sttr_quantity", "sttr_hsn_no", "sttr_shape", "sttr_gs_weight",
    "sttr_gs_weight_type", "sttr_pkt_weight", "sttr_pkt_weight_type", "sttr_nt_weight",
    "sttr_nt_weight_type", "sttr_fine_weight", "sttr_purity", "sttr_wastage",
    "sttr_final_purity", "sttr_cust_wastage", "sttr_cust_wastage_wt", "sttr_value_added",
    "sttr_item_length", "sttr_item_width", "sttr_color", "sttr_clarity",
    "sttr_lab_charges", "sttr_lab_charges_type", "sttr_making_charges", "sttr_making_charges_type",
    "sttr_final_fine_weight", "sttr_sell_final_fine_weight", "sttr_product_purchase_rate", "sttr_product_sell_rate",
    "sttr_item_other_info", "sttr_metal_amt", "sttr_metal_discount_per", "sttr_metal_discount_amt",
    "sttr_total_lab_amt", "sttr_lab_discount_per", "sttr_lab_discount_amt", "sttr_valuation",
    "sttr_tot_price_cgst_per", "sttr_tot_price_cgst_chrg", "sttr_tot_price_sgst_per", "sttr_tot_price_sgst_chrg",
    "sttr_tot_price_igst_per", "sttr_tot_price_igst_chrg", "sttr_total_lab_charges", "sttr_mkg_cgst_per",
    "sttr_mkg_cgst_chrg", "sttr_mkg_sgst_per", "sttr_mkg_sgst_chrg", "sttr_mkg_igst_per",
    "sttr_mkg_igst_chrg", "sttr_final_taxable_amt", "sttr_tax", "sttr_other_tax_amt",
    "sttr_tot_tax", "sttr_final_valuation");
//
//
$fineJewelleryPurchaseHorizontal = array("sttr_item_category", "sttr_quantity", "sttr_gs_weight", "sttr_gs_weight_type",
    "sttr_pkt_weight", "sttr_pkt_weight_type", "sttr_nt_weight", "sttr_nt_weight_type",
    "sttr_fine_weight", "sttr_final_fine_weight", "sttr_product_purchase_rate", "sttr_metal_amt",
    "sttr_metal_discount_per", "sttr_metal_discount_amt", "sttr_valuation", "sttr_tot_price_cgst_per",
    "sttr_tot_price_cgst_chrg", "sttr_tot_price_sgst_per", "sttr_tot_price_sgst_chrg", "sttr_tot_price_igst_per",
    "sttr_tot_price_igst_chrg", "sttr_item_name", "sttr_hsn_no", "sttr_purity",
    "sttr_wastage", "sttr_final_purity", "sttr_cust_wastage", "sttr_cust_wastage_wt",
    "sttr_value_added", "sttr_lab_charges", "sttr_lab_charges_type", "sttr_sell_final_fine_weight",
    "sttr_product_sell_rate", "sttr_total_lab_amt", "sttr_lab_discount_per", "sttr_lab_discount_amt",
    "sttr_total_lab_charges", "sttr_mkg_cgst_per", "sttr_mkg_cgst_chrg", "sttr_mkg_sgst_per",
    "sttr_mkg_sgst_chrg", "sttr_mkg_igst_per", "sttr_mkg_igst_chrg", "sttr_size",
    "sttr_shape", "sttr_item_length", "sttr_item_width", "sttr_color",
    "sttr_clarity", "sttr_making_charges", "sttr_making_charges_type", "sttr_item_other_info",
    "sttr_final_taxable_amt", "sttr_tax", "sttr_other_tax_amt", "sttr_tot_tax", "sttr_final_valuation");
//
//
$fineJewelleryPurchaseSize = array("132px", "90px", "120px", "100px",
    "100px", "120px", "171px", "",
    "",
    "", "90px", "80px", "60px",
    "30px", "40px", "60px", "50px",
    "40px", "50px", "40px", "50px",
    "40px", "50px", "40px", "34px",
    "46px", "35px", "40px", "50px",
    "60px", "60px", "65px", "60px",
    "50px", "30px", "50px", "30px",
    "50px", "50px", "50px", "50px",
    "255px", "80px", "35px", "50px",
    "80px", "35px", "50px", "80px",
    "30px", "55px", "30px", "55px",
    "30px", "55px", "80px", "30px",
    "55px", "30px", "55px", "30px",
    "55px", "155px", "45px", "60px",
    "100px", "180px");
//
//
$fineJewelleryPurchaseMandatory = array("Y", "Y", "Y", "Y",
    "Y", "N", "N", "Y",
    "N",
    "N", "Y", "Y", "N",
    "Y", "N", "N", "Y",
    "Y", "N", "N", "Y",
    "Y", "Y", "Y", "N",
    "Y", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "Y", "N", "Y", "N",
    "N", "Y", "N", "N",
    "N", "N", "N", "Y",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N");
//
//
$fineJewelleryPurchaseLable = array("Bill Date |BILLDATE", "Firm - Name |FIRM", "Product Type |TYPE", "Item Pre-Id |CODE",
    "Item Id |NUM ID", "Brand Name |BRAND NAME", "Barcode |BAR-CODE", "Account Name |ACCOUNT NAME",
    "BIS |BIS",
    "Images |PATH", "Category |CATEGORY", "Item Name |NAME", "Size |SIZE",
    "Quantity |QTY", "HSN |HSN", "Shape |SHAPE", "Gross Weight |GS WT",
    "Gross Weight Type |TYPE", "Less Weight |LESS WT ", "Less Weight Type |TYPE", "Net Weight |NT WT",
    "Net Weight Type |TYPE", "Fine Weight |FINE WT", "Item Tunch |PURITY", "Wastage |WSTG",
    "Final Purity |F.PURITY", "Customer Wastage |V/A %", "Customer Wastage Weight |V/A WT", "Value Added |V/A AMT",
    "Item Length |LENGTH", "Item Width |WIDTH", "Color |COLOR", "Clarity |CLARITY",
    "Labour Charges |LB.CHRG", "Labour Charges Type |TYPE", "Making Charges |MK.CHRGS", "Making Charges Type |TYPE",
    "Final Fine Weight |FFNWT", "Sell Final Fine Weight |S.FWT", "Purchase Rate |P.RATE", "Sell Rate |S.RATE",
    "Other Info |OTHER INFO", "Metal Amount |MET AMT", "Metal Discount Percentage |DIS.%", "Metal Discount Amount |DIS.AMT",
    "Total Labour Amount |TOT LAB AMT", "Labour Discount Percentage |DIS.%", "Labour Discount Amount |DIS.AMT", "Valuation |T.AMOUNT",
    "CGST Percentage |C.%", "CGST Charge |CGST.AMT", "SGST Percentage |S.%", "SGST Charge |SGST.AMT",
    "IGST Percentage |I.%", "IGST Charge |IGST.AMT", "Total Labour Charge |TOT LAB AMT", "Making CGST Percentage |C.%",
    "Making CGST Charge |CGST.AMT", "Making SGST Percentage |S.%", "Making SGST Charge |SGST.AMT", "Making IGST Percentage |I.%",
    "Making IGST Charge |IGST.AMT", "Final Taxable Amount|FINAL.TAXABLE.AMTOUNT", "Tax |OTAX.%", "Other Tax Amount |OTAX.AMT",
    "Total Tax |TOTAL TAX AMT", "Final Valuation |TOTAL AMOUNT");
//
// Google Suggestion Table Array @PRIYANKA-06MAY18
$fineGoogleSuggTableArray = array("", "", "", "",
    "", "", "", "",
    "",
    "", "item_name", "item_name", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "item_tunch", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "metal_rates", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "");
//
// Google Suggestion Column Array @PRIYANKA-06MAY18
$fineGoogleSuggColumnArray = array("", "", "", "",
    "", "", "", "",
    "",
    "", "itm_nm_category", "itm_nm_name", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "itm_tunch_value", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "met_rate_value", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "");
//
// Google Suggestion Column Display Array @PRIYANKA-06MAY18
$fineGoogleSuggColumnDisplayArray = array("", "", "", "",
    "", "", "", "",
    "",
    "", "itm_nm_category", "itm_nm_name", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "itm_tunch_value", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "met_rate_value", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "");
//
// Google Suggestion Where Condition Array @PRIYANKA-06MAY18
$fineGoogleSuggWhereCondArray = array("", "", "", "",
    "", "", "", "",
    "",
    "", "category", "name", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "tunch", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "metal rate", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "");
//
/* **************************************************************************
 *  End Code To  Create Array For Fine Jwellery Form Setup
 * ***************************************************************************
 * 
 */
// ***************************************************************************
// Start Code To Create Array For  Fine Jwellery Wholesale Form Setup
// ***************************************************************************
//
//
$fineJewelleryWholesalePurchase = array("sttr_add_date", "sttr_firm_id", "sttr_product_type", "sttr_item_pre_id",
    "sttr_brand_id", "sttr_barcode", "sttr_account_id",
    "sttr_bis_mark",
    "sttr_image_id", "sttr_item_category", "sttr_item_name", "sttr_size",
    "sttr_quantity", "sttr_hsn_no", "sttr_shape", "sttr_gs_weight",
    "sttr_gs_weight_type", "sttr_pkt_weight", "sttr_pkt_weight_type", "sttr_nt_weight",
    "sttr_nt_weight_type", "sttr_fine_weight", "sttr_purity", "sttr_wastage",
    "sttr_final_purity", "sttr_cust_wastage", "sttr_cust_wastage_wt", "sttr_value_added",
    "sttr_item_length", "sttr_item_width", "sttr_color", "sttr_clarity",
    "sttr_lab_charges", "sttr_lab_charges_type", "sttr_making_charges", "sttr_making_charges_type",
    "sttr_final_fine_weight", "sttr_sell_final_fine_weight", "sttr_product_purchase_rate", "sttr_product_sell_rate",
    "sttr_item_other_info", "sttr_metal_amt", "sttr_metal_discount_per", "sttr_metal_discount_amt",
    "sttr_total_lab_amt", "sttr_lab_discount_per", "sttr_lab_discount_amt", "sttr_valuation",
    "sttr_tot_price_cgst_per", "sttr_tot_price_cgst_chrg", "sttr_tot_price_sgst_per", "sttr_tot_price_sgst_chrg",
    "sttr_tot_price_igst_per", "sttr_tot_price_igst_chrg", "sttr_total_lab_charges", "sttr_mkg_cgst_per",
    "sttr_mkg_cgst_chrg", "sttr_mkg_sgst_per", "sttr_mkg_sgst_chrg", "sttr_mkg_igst_per",
    "sttr_mkg_igst_chrg", "sttr_final_taxable_amt", "sttr_tax", "sttr_other_tax_amt",
    "sttr_tot_tax", "sttr_final_valuation");
//
//
$fineJewelleryPurchaseWholesaleHorizontal = array("sttr_item_category", "sttr_quantity", "sttr_gs_weight", "sttr_gs_weight_type",
    "sttr_pkt_weight", "sttr_pkt_weight_type", "sttr_nt_weight", "sttr_nt_weight_type",
    "sttr_fine_weight", "sttr_final_fine_weight", "sttr_product_purchase_rate", "sttr_metal_amt",
    "sttr_metal_discount_per", "sttr_metal_discount_amt", "sttr_valuation", "sttr_tot_price_cgst_per",
    "sttr_tot_price_cgst_chrg", "sttr_tot_price_sgst_per", "sttr_tot_price_sgst_chrg", "sttr_tot_price_igst_per",
    "sttr_tot_price_igst_chrg", "sttr_item_name", "sttr_hsn_no", "sttr_purity",
    "sttr_wastage", "sttr_final_purity", "sttr_cust_wastage", "sttr_cust_wastage_wt",
    "sttr_value_added", "sttr_lab_charges", "sttr_lab_charges_type", "sttr_sell_final_fine_weight",
    "sttr_product_sell_rate", "sttr_total_lab_amt", "sttr_lab_discount_per", "sttr_lab_discount_amt",
    "sttr_total_lab_charges", "sttr_mkg_cgst_per", "sttr_mkg_cgst_chrg", "sttr_mkg_sgst_per",
    "sttr_mkg_sgst_chrg", "sttr_mkg_igst_per", "sttr_mkg_igst_chrg", "sttr_size",
    "sttr_shape", "sttr_item_length", "sttr_item_width", "sttr_color",
    "sttr_clarity", "sttr_making_charges", "sttr_making_charges_type", "sttr_item_other_info",
    "sttr_final_taxable_amt", "sttr_tax", "sttr_other_tax_amt", "sttr_tot_tax", "sttr_final_valuation");
//
//
$fineJewelleryWholesalePurchaseSize = array("132px", "90px", "120px", "200px",
    "120px", "171px", "",
    "",
    "", "90px", "80px", "60px",
    "30px", "40px", "60px", "50px",
    "40px", "50px", "40px", "50px",
    "40px", "50px", "40px", "34px",
    "46px", "35px", "40px", "50px",
    "60px", "60px", "65px", "60px",
    "50px", "30px", "50px", "30px",
    "50px", "50px", "50px", "50px",
    "255px", "80px", "35px", "50px",
    "80px", "35px", "50px", "80px",
    "30px", "55px", "30px", "55px",
    "30px", "55px", "80px", "30px",
    "55px", "30px", "55px", "30px",
    "55px", "155px", "45px", "60px",
    "100px", "180px");
//
//
$fineJewelleryWholesalePurchaseMandatory = array("Y", "Y", "Y", "Y",
    "N", "N", "Y",
    "N",
    "N", "Y", "Y", "N",
    "N", "N", "N", "Y",
    "N", "N", "N", "N",
    "N", "Y", "N", "N",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "Y", "N", "N",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "Y", "Y");
//
//
$fineJewelleryWholesalePurchaseLable = array("Bill Date |BILLDATE", "Firm - Name |FIRM", "Product Type |TYPE", "Item Pre-Id |CODE",
    "Brand Name |BRAND NAME", "Barcode |BAR-CODE", "Account Name |ACCOUNT NAME",
    "BIS |BIS",
    "Images |PATH", "Category |CATEGORY", "Item Name |NAME", "Size |SIZE",
    "Quantity |QTY", "HSN |HSN", "Shape |SHAPE", "Gross Weight |GS WT",
    "Gross Weight Type |TYPE", "Less Weight |LESS WT ", "Less Weight Type |TYPE", "Net Weight |NT WT",
    "Net Weight Type |TYPE", "Fine Weight |FINE WT", "Item Tunch |PURITY", "Wastage |WSTG",
    "Final Purity |F.PURITY", "Customer Wastage |V/A %", "Customer Wastage Weight |V/A WT", "Value Added |V/A AMT",
    "Item Length |LENGTH", "Item Width |WIDTH", "Color |COLOR", "Clarity |CLARITY",
    "Labour Charges |LB.CHRG", "Labour Charges Type |TYPE", "Making Charges |MK.CHRGS", "Making Charges Type |TYPE",
    "Final Fine Weight |FFNWT", "Sell Final Fine Weight |S.FWT", "Purchase Rate |P.RATE", "Sell Rate |S.RATE",
    "Other Info |OTHER INFO", "Metal Amount |MET AMT", "Metal Discount Percentage |DIS.%", "Metal Discount Amount |DIS.AMT",
    "Total Labour Amount |TOT LAB AMT", "Labour Discount Percentage |DIS.%", "Labour Discount Amount |DIS.AMT", "Valuation |T.AMOUNT",
    "CGST Percentage |C.%", "CGST Charge |CGST.AMT", "SGST Percentage |S.%", "SGST Charge |SGST.AMT",
    "IGST Percentage |I.%", "IGST Charge |IGST.AMT", "Total Labour Charge |TOT LAB AMT", "Making CGST Percentage |C.%",
    "Making CGST Charge |CGST.AMT", "Making SGST Percentage |S.%", "Making SGST Charge |SGST.AMT", "Making IGST Percentage |I.%",
    "Making IGST Charge |IGST.AMT", "Final Taxable Amount|FINAL.TAXABLE.AMTOUNT", "Tax |OTAX.%", "Other Tax Amount |OTAX.AMT",
    "Total Tax |TOTAL TAX AMT", "Final Valuation |TOTAL AMOUNT");
//
// Google Suggestion Table Array @PRIYANKA-06MAY18
$fineWholesaleGoogleSuggTableArray = array("", "", "", "",
    "", "", "",
    "",
    "", "item_name", "item_name", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "item_tunch", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "metal_rates", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "");
//
// Google Suggestion Column Array @PRIYANKA-06MAY18
$fineWholesaleGoogleSuggColumnArray = array("", "", "", "",
    "", "", "",
    "",
    "", "itm_nm_category", "itm_nm_name", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "itm_tunch_value", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "met_rate_value", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "");
//
// Google Suggestion Column Display Array @PRIYANKA-06MAY18
$fineWholesaleGoogleSuggColumnDisplayArray = array("", "", "", "",
    "", "", "",
    "",
    "", "itm_nm_category", "itm_nm_name", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "itm_tunch_value", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "met_rate_value", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "");
//
// Google Suggestion Where Condition Array @PRIYANKA-06MAY18
$fineWholesaleGoogleSuggWhereCondArray = array("", "", "", "",
    "", "", "",
    "",
    "", "category", "name", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "tunch", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "metal rate", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "");
//
/* **************************************************************************
 *  End Code To  Create Array For Fine Jwellery Wholesale Form Setup
 * ***************************************************************************
 * 
 */
// ***************************************************************************
// Start Code To Create Array For Fine Jwellery Sell Form Setup
// ***************************************************************************
//
//
$fineJewellerySell = array("sttr_add_date", "sttr_firm_id", "sttr_product_type", "sttr_item_pre_id",
    "sttr_item_id", "sttr_brand_id", "sttr_barcode", "sttr_account_id",
    "sttr_bis_mark","sttr_pre_invoice_no","sttr_invoice_no",
    "sttr_image_id", "sttr_item_category", "sttr_item_name", "sttr_size",
    "sttr_quantity", "sttr_hsn_no", "sttr_shape", "sttr_gs_weight",
    "sttr_gs_weight_type", "sttr_pkt_weight", "sttr_pkt_weight_type", "sttr_nt_weight",
    "sttr_nt_weight_type", "sttr_fine_weight", "sttr_purity", "sttr_wastage",
    "sttr_final_purity", "sttr_cust_wastage", "sttr_cust_wastage_wt", "sttr_value_added",
    "sttr_item_length", "sttr_item_width", "sttr_color", "sttr_clarity",
    "sttr_lab_charges", "sttr_lab_charges_type", "sttr_making_charges", "sttr_making_charges_type",
    "sttr_final_fine_weight", "sttr_sell_final_fine_weight", "sttr_product_purchase_rate", "sttr_product_sell_rate",
    "sttr_item_other_info", "sttr_metal_amt", "sttr_metal_discount_per", "sttr_metal_discount_amt",
    "sttr_total_lab_amt", "sttr_lab_discount_per", "sttr_lab_discount_amt", "sttr_valuation",
    "sttr_tot_price_cgst_per", "sttr_tot_price_cgst_chrg", "sttr_tot_price_sgst_per", "sttr_tot_price_sgst_chrg",
    "sttr_tot_price_igst_per", "sttr_tot_price_igst_chrg", "sttr_total_lab_charges", "sttr_mkg_cgst_per",
    "sttr_mkg_cgst_chrg", "sttr_mkg_sgst_per", "sttr_mkg_sgst_chrg", "sttr_mkg_igst_per",
    "sttr_mkg_igst_chrg", "sttr_final_taxable_amt", "sttr_tax", "sttr_other_tax_amt",
    "sttr_tot_tax", "sttr_final_valuation");
//
//
$fineJewellerySellHorizontal = array("sttr_item_category", "sttr_quantity", "sttr_gs_weight", "sttr_gs_weight_type",
    "sttr_pkt_weight", "sttr_pkt_weight_type", "sttr_nt_weight", "sttr_nt_weight_type",
    "sttr_fine_weight", "sttr_final_fine_weight", "sttr_product_purchase_rate", "sttr_metal_amt",
    "sttr_metal_discount_per", "sttr_metal_discount_amt", "sttr_valuation", "sttr_tot_price_cgst_per",
    "sttr_tot_price_cgst_chrg", "sttr_tot_price_sgst_per", "sttr_tot_price_sgst_chrg", "sttr_tot_price_igst_per",
    "sttr_tot_price_igst_chrg", "sttr_item_name", "sttr_hsn_no", "sttr_purity",
    "sttr_wastage", "sttr_final_purity", "sttr_cust_wastage", "sttr_cust_wastage_wt",
    "sttr_value_added", "sttr_lab_charges", "sttr_lab_charges_type", "sttr_sell_final_fine_weight",
    "sttr_product_sell_rate", "sttr_total_lab_amt", "sttr_lab_discount_per", "sttr_lab_discount_amt",
    "sttr_total_lab_charges", "sttr_mkg_cgst_per", "sttr_mkg_cgst_chrg", "sttr_mkg_sgst_per",
    "sttr_mkg_sgst_chrg", "sttr_mkg_igst_per", "sttr_mkg_igst_chrg", "sttr_size",
    "sttr_shape", "sttr_item_length", "sttr_item_width", "sttr_color",
    "sttr_clarity", "sttr_making_charges", "sttr_making_charges_type", "sttr_item_other_info",
    "sttr_final_taxable_amt", "sttr_tax", "sttr_other_tax_amt", "sttr_tot_tax", "sttr_final_valuation");
//
//
$fineJewellerySellSize = array("132px", "90px", "120px", "100px",
    "100px", "120px", "171px", "",
    "","100px","100px",
    "", "90px", "80px", "60px",
    "30px", "40px", "60px", "50px",
    "40px", "50px", "40px", "50px",
    "40px", "50px", "40px", "34px",
    "46px", "35px", "40px", "50px",
    "60px", "60px", "65px", "60px",
    "50px", "30px", "50px", "30px",
    "50px", "50px", "50px", "50px",
    "255px", "80px", "35px", "50px",
    "80px", "35px", "50px", "80px",
    "30px", "55px", "30px", "55px",
    "30px", "55px", "80px", "30px",
    "55px", "30px", "55px", "30px",
    "55px", "155px", "45px", "60px",
    "100px", "180px");
//
//
$fineJewellerySellMandatory = array("Y", "Y", "Y", "Y",
    "Y", "N", "N", "Y",
    "N","Y","Y",
    "N", "Y", "Y", "N",
    "Y", "N", "N", "Y",
    "Y", "N", "N", "Y",
    "Y", "Y", "Y", "N",
    "Y", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "Y", "N", "Y", "N",
    "N", "Y", "N", "N",
    "N", "N", "N", "Y",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N");
//
//
$fineJewellerySellLable = array("Bill Date |BILLDATE", "Firm - Name |FIRM", "Product Type |TYPE", "Item Pre-Id |CODE",
    "Item Id |NUM ID", "Brand Name |BRAND NAME", "Barcode |BAR-CODE", "Account Name |ACCOUNT NAME",
    "BIS |BIS","Inv Code |INV CODE","Inv ID |INV ID",
    "Images |PATH", "Category |CATEGORY", "Item Name |NAME", "Size |SIZE",
    "Quantity |QTY", "HSN |HSN", "Shape |SHAPE", "Gross Weight |GS WT",
    "Gross Weight Type |TYPE", "Less Weight |LESS WT ", "Less Weight Type |TYPE", "Net Weight |NT WT",
    "Net Weight Type |TYPE", "Fine Weight |FINE WT", "Item Tunch |PURITY", "Wastage |WSTG",
    "Final Purity |F.PURITY", "Customer Wastage |V/A %", "Customer Wastage Weight |V/A WT", "Value Added |V/A AMT",
    "Item Length |LENGTH", "Item Width |WIDTH", "Color |COLOR", "Clarity |CLARITY",
    "Labour Charges |LB.CHRG", "Labour Charges Type |TYPE", "Making Charges |MK.CHRGS", "Making Charges Type |TYPE",
    "Final Fine Weight |FFNWT", "Sell Final Fine Weight |S.FWT", "Purchase Rate |P.RATE", "Sell Rate |S.RATE",
    "Other Info |OTHER INFO", "Metal Amount |MET AMT", "Metal Discount Percentage |DIS.%", "Metal Discount Amount |DIS.AMT",
    "Total Labour Amount |TOT LAB AMT", "Labour Discount Percentage |DIS.%", "Labour Discount Amount |DIS.AMT", "Valuation |T.AMOUNT",
    "CGST Percentage |C.%", "CGST Charge |CGST.AMT", "SGST Percentage |S.%", "SGST Charge |SGST.AMT",
    "IGST Percentage |I.%", "IGST Charge |IGST.AMT", "Total Labour Charge |TOT LAB AMT", "Making CGST Percentage |C.%",
    "Making CGST Charge |CGST.AMT", "Making SGST Percentage |S.%", "Making SGST Charge |SGST.AMT", "Making IGST Percentage |I.%",
    "Making IGST Charge |IGST.AMT", "Final Taxable Amount|FINAL.TAXABLE.AMTOUNT", "Tax |OTAX.%", "Other Tax Amount |OTAX.AMT",
    "Total Tax |TOTAL TAX AMT", "Final Valuation |TOTAL AMOUNT");
//
// Google Suggestion Table Array @PRIYANKA-06MAY18
$fineGoogleSuggTableArray = array("", "", "", "",
    "", "", "", "",
    "","","",
    "", "item_name", "item_name", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "item_tunch", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "metal_rates", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "");
//
// Google Suggestion Column Array @PRIYANKA-06MAY18
$fineGoogleSuggColumnArray = array("", "", "", "",
    "", "", "", "",
    "", "", "",
    "", "itm_nm_category", "itm_nm_name", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "itm_tunch_value", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "met_rate_value", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "");
//
// Google Suggestion Column Display Array @PRIYANKA-06MAY18
$fineGoogleSuggColumnDisplayArray = array("", "", "", "",
    "", "", "", "",
    "", "", "",
    "", "itm_nm_category", "itm_nm_name", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "itm_tunch_value", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "met_rate_value", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "");
//
// Google Suggestion Where Condition Array @PRIYANKA-06MAY18
$fineGoogleSuggWhereCondArray = array("", "", "", "",
    "", "", "", "",
    "", "", "",
    "", "category", "name", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "tunch", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "metal rate", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
    "", "");
//
/* **************************************************************************
 *  End Code To  Create Array For Fine Jwellery Form Setup
 * ***************************************************************************
 * 
 */
?>