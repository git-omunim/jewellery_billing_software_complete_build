<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 2 May, 2018 9:53:03 PM
 *
 * @FileName: omsetupformstocktrans_crystal.php
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

//* ***************************************************************************
// *  Start Code To  Create Array For Crystal  Form Setup
// * ***************************************************************************

$Crystal = array("sttr_add_date", "sttr_firm_id", "sttr_product_type", "sttr_item_pre_id",
    "sttr_item_id", "sttr_brand_id", "sttr_barcode", "sttr_account_id",
    "sttr_bis_mark",
    "sttr_image_id", "sttr_item_category", "sttr_item_name", "sttr_size",
    "sttr_quantity", "sttr_hsn_no", "sttr_shape", "sttr_gs_weight",
    "sttr_gs_weight_type", "sttr_pkt_weight", "sttr_pkt_weight_type", "sttr_nt_weight",
    "sttr_nt_weight_type", "", "", "",
    "", "", "", "",
    "sttr_item_length", "sttr_item_width", "sttr_color", "sttr_clarity",
    "sttr_lab_charges", "sttr_lab_charges_type", "sttr_making_charges", "sttr_making_charges_type",
    "", "", "sttr_product_purchase_rate", "sttr_product_sell_rate",
    "sttr_item_other_info", "sttr_metal_amt", "sttr_metal_discount_per", "sttr_metal_discount_amt",
    "sttr_total_lab_amt", "sttr_lab_discount_per", "sttr_lab_discount_amt", "sttr_valuation",
    "sttr_tot_price_cgst_per", "sttr_tot_price_cgst_chrg", "sttr_tot_price_sgst_per", "sttr_tot_price_sgst_chrg",
    "sttr_tot_price_igst_per", "sttr_tot_price_igst_chrg", "sttr_total_lab_charges", "sttr_mkg_cgst_per",
    "sttr_mkg_cgst_chrg", "sttr_mkg_sgst_per", "sttr_mkg_sgst_chrg", "sttr_mkg_igst_per",
    "sttr_mkg_igst_chrg", "sttr_final_taxable_amt", "sttr_tax", "sttr_other_tax_amt",
    "sttr_tot_tax", "sttr_final_valuation");

$CrystalHorizontal = array("sttr_item_category", "sttr_quantity", "sttr_gs_weight", "sttr_gs_weight_type",
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

$CrystalSize = array("132px", "90px", "120px", "100px",
    "100px", "120px", "171px", "",
    "",
    "", "90px", "184px", "60px",
    "30px", "60px", "60px", "50px",
    "40px", "50px", "40px", "50px",
    "40px", "", "", "",
    "", "", "", "",
    "60px", "60px", "65px", "60px",
    "140px", "30px", "60px", "30px",
    "", "", "90px", "90px",
    "245px", "100px", "35px", "50px",
    "100px", "35px", "50px", "120px",
    "30px", "55px", "30px", "55px",
    "30px", "55px", "120px", "30px",
    "55px", "30px", "55px", "30px",
    "55px", "155px", "45px", "60px",
    "100px", "180px");
//
//
$CystalMandatory = array("Y", "Y", "Y", "Y",
    "Y", "N", "N", "Y",
    "N",
    "N", "Y", "Y", "N",
    "Y", "N", "N", "Y",
    "Y", "N", "N", "Y",
    "Y", "N", "", "",
    "", "", "", "",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "", "Y", "N",
    "N", "Y", "N", "N",
    "N", "N", "N", "Y",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N", "N", "N",
    "N", "N");

$CystalPurchaseLable = array("Bill Date |BILLDATE", "Firm - Name |FIRM", "Product Type |TYPE", "Item Pre-Id |CODE",
    "Item Id |NUM ID", "Brand Name |BRAND NAME", "Barcode |BAR-CODE", "Account Name |ACCOUNT NAME",
    "BIS |BIS",
    "Images |PATH", "Category |CATEGORY", "Item Name |NAME", "Size |SIZE",
    "Quantity |QTY", "HSN |HSN", "Shape |SHAPE", "Gross Weight |GS WT",
    "Gross Weight Type |TYPE", "Less Weight |LESS WT ", "Less Weight Type |TYPE", "Net Weight |NT WT",
    "Net Weight Type |TYPE", "", "", "",
    "", "", "", "",
    "Item Length |LENGTH", "Item Width |WIDTH", "Color |COLOR", "Clarity |CLARITY",
    "Labour Charges | CRY LB.CHRG", "Labour Charges Type |TYPE", "Making Charges |MK.CHRGS", "Making Charges Type |TYPE",
    "", "", "Purchase Rate |P.RATE", "Sell Rate |S.RATE",
    "Other Info |OTHER INFO", "Crystal Amount |CRY AMT", "Metal Discount Percentage |DIS.%", "Metal Discount Amount |DIS.AMT",
    "Total Labour Amount |TOT LAB AMT", "Labour Discount Percentage |DIS.%", "Labour Discount Amount |DIS.AMT", "Valuation |T.AMOUNT",
    "CGST Percentage |C.%", "CGST Charge |CGST.AMT", "SGST Percentage |S.%", "SGST Charge |SGST.AMT",
    "IGST Percentage |I.%", "IGST Charge |IGST.AMT", "Total Labour Charge |TOT LAB CHRG", "Making CGST Percentage |C.%",
    "Making CGST Charge |CGST.AMT", "Making SGST Percentage |S.%", "Making SGST Charge |SGST.AMT", "Making IGST Percentage |I.%",
    "Making IGST Charge |IGST.AMT", "Final Taxable Amount|FINAL.TAXABLE.AMTOUNT", "Tax |OTAX.%", "Other Tax Amount |OTAX.AMT",
    "Total Tax |TOTAL TAX AMT", "Final Valuation |TOTAL AMOUNT");
//
// Google Suggestion Table Array @PRIYANKA-06MAY18
$CystalGoogleSuggTableArray = array("", "", "", "",
    "", "", "", "",
    "",
    "", "item_name", "item_name", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
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
$CystalGoogleSuggColumnArray = array("", "", "", "",
    "", "", "", "",
    "",
    "", "itm_nm_category", "itm_nm_name", "",
    "", "", "", "",
    "", "", "", "",
    "", "", "", "",
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
$CystalGoogleSuggColumnDisplayArray = array("", "", "", "",
    "", "", "", "",
    "",
    "", "", "itm_nm_name", "",
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
$CystalGoogleSuggWhereCondArray = array("", "", "", "",
    "", "", "", "",
    "",
    "", "", "name", "",
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
//* * **************************************************************************
// * End Code To  Create Array For Crystal  Form Setup
// * ***************************************************************************
?>